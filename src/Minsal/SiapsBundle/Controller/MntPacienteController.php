<?php

namespace Minsal\SiapsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class MntPacienteController extends Controller {

    /**
     * @Route("/departamentos/get", name="get_departamentos", options={"expose"=true})
     * @Method("GET")
     */
    public function getDepartamentosAction() {
        
        $request = $this->getRequest();
        $idPais = $request->get('idPais');
        $em = $this->getDoctrine()->getEntityManager();
        $dql = "SELECT d FROM MinsalSiapsBundle:CtlDepartamento d
                    WHERE d.idPais = :idPais ";
        $departamentos['deptos'] = $em->createQuery($dql)
                ->setParameter('idPais', $idPais)
                ->getArrayResult();
        
        return new Response(json_encode($departamentos));
        
    }
    
     /**
     * @Route("/municipios/get", name="get_municipios", options={"expose"=true})
     * @Method("GET")
     */
    public function getMunicipiosAction() {
           
        $request = $this->getRequest();
        $idDepartamento = $request->get('idDepartamento');
        $em = $this->getDoctrine()->getEntityManager();
        $dql = "SELECT m FROM MinsalSiapsBundle:CtlMunicipio m
                    WHERE m.idDepartamento = :idDepartamento ";
        $municipios['municipios'] = $em->createQuery($dql)
                ->setParameter('idDepartamento', $idDepartamento)
                ->getArrayResult();
        
        return new Response(json_encode($municipios));
    }    
    
     /**
     * @Route("/cantones/get", name="get_cantones", options={"expose"=true})
     * @Method("GET")
     */
    public function getCantonesAction() {
           
        $request = $this->getRequest();
        $idMunicipio = $request->get('idMunicipio');
        $em = $this->getDoctrine()->getEntityManager();
        $dql = "SELECT c FROM MinsalSiapsBundle:CtlCanton c
                    WHERE c.idMunicipio = :idMunicipio ";
        $cantones['cantones'] = $em->createQuery($dql)
                ->setParameter('idMunicipio', $idMunicipio)
                ->getArrayResult();
        
        return new Response(json_encode($cantones));
    }    
    
     /**
     * @Route("/paciente/edad}", name="edad_paciente", options={"expose"=true})
     * @Method("GET")
     */
    public function edad_paciente() {       
       
        $request = $this->getRequest();
        $fecha_nacimiento = $request->get('fecha_nacimiento');
        $fecha_actual = getdate();
        $fecha_actual = $fecha_actual['mday'].'-'. $fecha_actual['mon'].'-'.$fecha_actual['year'];
        $em = $this->getDoctrine()->getEntityManager();
        $conn = $em->getConnection();
        $sql = "SELECT age('$fecha_actual','$fecha_nacimiento')";
        $query = $conn->query($sql);
            if ($query->rowCount() > 0) {
                $edad = $query->fetch();
                $edad=$edad['age'];
                $edad=ereg_replace('years','años,',$edad);
		$edad=ereg_replace('year','año,',$edad);
                $edad=ereg_replace('mons','meses,',$edad);
		$edad=ereg_replace('mon','mes,',$edad);
		$edad=ereg_replace('days','días,',$edad);
		$edad=ereg_replace('day','día,',$edad);
                $edad=ereg_replace('[,]$','',$edad);
                $datos['edad']=$edad;
            }
        
        return new Response(json_encode($datos));
    }  
    
}
