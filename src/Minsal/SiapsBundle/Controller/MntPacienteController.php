<?php

namespace Minsal\SiapsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class MntPacienteController extends Controller {

    /**
     * @Route("/buscar/paciente", name="buscar_paciente", options={"expose"=true})
     */
    public function buscarPacienteAction() {
        $request = $this->getRequest();
        $primerNombre = $request->get('primerNombre');
        $primerApellido = $request->get('primerApellido');
        return $this->render('MinsalSiapsBundle:MntPacienteAdmin:resultado_busqueda.html.twig', array('registros' => 0));
    }

    /**
     * @Route("/cargar/paciente", name="cargar_paciente", options={"expose"=true})
     */
    public function cargarBusquedaJSON() {
        //      $request = $this->getRequest();
        $em = $this->getDoctrine()->getEntityManager();
        $pacientes = $em->getRepository("MinsalSiapsBundle:MntPaciente")->findAll();
        $numfilas = count($pacientes);
        $i = 0;
        $rows = array();
        foreach ($pacientes as $aux) {
            $rows[$i]['id'] = $aux->getId();
            $rows[$i]['cell'] = array($aux->getId(),
                $aux->getPrimerNombre() + $aux->getSegundoNombre() + $aux->getTercerNombre() + $aux->getPrimerApellido() + $aux->getSegundoApellido() + $aux->getApellidoCasada(),
                $aux->getFechaNacimiento(),
                $aux->getNumeroDocIdePaciente(),
                $aux->getNombreMadre(),
                $aux->getConocidoPor()
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



        $response = new Response($jsonresponse);
        return $response;
    }

    /**
     * @Route("/departamentos/get", name="get_departamentos", options={"expose"=true})
     * @Method("GET")
     */
    public function getDepartamentosAction() {

        $request = $this->getRequest();
        $idPais = $request->get('idPais');
        $em = $this->getDoctrine()->getEntityManager();
        $departamentos = $em->getRepository("MinsalSiapsBundle:CtlDepartamento")->findBy(
                array(
                    'idPais' => $idPais
                )
        );
        $numfilas = count($departamentos);

        $i = 0;
        $rows = array();
        foreach ($departamentos as $aux) {
            $rows[$i]['id'] = $aux->getId();
            $rows[$i]['cell'] = array($aux->getId(),
                $aux->getNombre()
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



        $response = new Response($jsonresponse);
        return $response;
    }

}
