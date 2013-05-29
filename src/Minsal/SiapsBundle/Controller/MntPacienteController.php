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
     * @Method("POST")
     */
    public function buscarPacienteAction() {
        
        $request = $this->getRequest();
        $idPais = $request->get('idPais');
        $em = $this->getDoctrine()->getEntityManager();
        $departamentos = $em->getRepository("MinsalSiapsBundle:CtlDepartamento")->findBy(
                array(
                    'idPais' => $idPais
                )
        );
        
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
