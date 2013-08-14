<?php

namespace Minsal\SiapsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\DBAL as DBAL;

class MntExpedienteController extends Controller {

    /**
     * @Route("/expedientes/creados", name="expedientes_creados", options={"expose"=true})
     */
    public function expedientesCreados() {
        //OBTENIENDO PARÁMETROS DE BUSQUEDA
        $datos = array();
        $request = $this->getRequest();
        parse_str($request->get('datos'), $datos);
       
        return $this->render('MinsalSiapsBundle:MntExpedienteAdmin:expedientes_creados.html.twig', array(
                    'fecha_inicio' => $datos['fecha_inicio'], 'fecha_fin' => $datos['fecha_fin']));
    }

    /**
     * @Route("/expedientes/creados/listado", name="expedientes_creados_listado", options={"expose"=true})
     */
    public function expedientesCreadosListado() {
        //OBTENIENDO PARÁMETROS DE BUSQUEDA
        $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        $dql = "SELECT e 
                FROM MinsalSiapsBundle:MntExpediente e 
                JOIN e.idPaciente p
                WHERE e.fechaCreacion>=:fecha_inicio and e.fechaCreacion<=:fecha_fin
                ";
        $expedientes = $em->createQuery($dql)
                ->setParameters(array('fecha_inicio' => $request->get('fecha_inicio'), 'fecha_fin' => $request->get('fecha_fin')))
                ->getResult()
        ;

        $numfilas = count($expedientes);
        $i = 0;
        $rows = array();
        /*'Número Expediente', 'Fecha de Creación', 'Nombre Paciente', 'Sexo', 'Fecha de Nacimiento'*/
        foreach ($expedientes as $aux) {
            $rows[$i]['id'] = $aux->getId();
            $rows[$i]['cell'] = array($aux->getNumero(),
                $aux->getFechaCreacion()->format('d-m-Y'),
                $aux->getIdPaciente()->getPrimerNombre(),
                $aux->getIdPaciente()->getIdSexo()->getNombre(),
                $aux->getIdPaciente()->getFechaNacimiento()->format('d-m-Y')
            );
            $i++;
        }


        $datos = json_encode($rows);
        $pages = floor($numfilas / 10) + 1;

        $jsonresponse = '{
               "page":"1",
               "total":"' . $pages . '",
               "records":"' . $numfilas . '", 
               "rows":' . $datos . '}';

        return new Response($jsonresponse);
    }

}