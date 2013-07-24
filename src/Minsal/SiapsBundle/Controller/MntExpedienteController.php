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
         $request = $this->getRequest();
        parse_str($request->get('datos'), $datos);
       // echo $datos['fecha_inicio'];exit;
        $em=  $this->getDoctrine()->getEntityManager();
        $dql = "SELECT e FROM MinsalSiapsBundle:MntExpediente e 
                WHERE e.fechaCreacion>=:fecha_inicio and e.fechaCreacion<=:fecha_fin
                ";
        $expedientes = $em->createQuery($dql)
                ->setParameters(array(':fecha_inicio'=>$datos['fecha_inicio'],':fecha_fin'=>$datos['fecha_fin']))
                ->getArrayResult();
        
        var_dump($expedientes);exit;
        
        return $this->render('MinsalSiapsBundle:MntExpedienteAdmin:expedientes_creados.html.twig',array(
            'expedientes' => $expedientes));
    }
}