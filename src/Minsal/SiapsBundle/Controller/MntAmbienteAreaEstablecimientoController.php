<?php

namespace Minsal\SiapsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\DBAL as DBAL;

class MntAmbienteAreaEstablecimientoController extends Controller {

    /**
     * @Route("/areas/modalidades/get", name="get_areas_modalidades", options={"expose"=true})
     * @Method("GET")
     */
    public function getAreaModalidadAction() {

        $em = $this->getDoctrine()->getEntityManager();
        $dql = "SELECT A.id as id,CONCAT(D.nombre, '-',B.nombre) as nombre
                FROM MinsalSiapsBundle:MntAreaModEstab A
                JOIN A.idAreaAtencion B
                JOIN A.idModalidadEstab C
                JOIN C.idModalidad D
                WHERE B.id = 3";
        $areas['areas'] = $em->createQuery($dql)
                ->getArrayResult();

        return new Response(json_encode($areas));
    }

    /**
     * @Route("/especialidades/get", name="get_especialidades", options={"expose"=true})
     * @Method("GET")
     */
    public function getEspecialidadesHospitalizacionAction() {
        $request = $this->getRequest();
        $idAreaModEstab = $request->get('idAreaModEstab');
        $em = $this->getDoctrine()->getEntityManager();
        $dql = "SELECT A.id as id,C.nombre as nombre
                FROM MinsalSiapsBundle:MntAtenAreaModEstab A
                JOIN A.idAreaModEstab B
                JOIN A.idAtencion C
                WHERE A.idAreaModEstab = :idAreaModEstab 
                        AND C.idTipoAtencion = 1";
        $especialidades['especialidades'] = $em->createQuery($dql)
                ->setParameter('idAreaModEstab', $idAreaModEstab)
                ->getArrayResult();

        return new Response(json_encode($especialidades));
    }

    /**
     * @Route("/servicios/get", name="get_servicios", options={"expose"=true})
     * @Method("GET")
     */
    public function getServiciosHospitalariosAction() {
        $request = $this->getRequest();
        $idAreaModEstab = $request->get('idAreaModEstab');
        $em = $this->getDoctrine()->getEntityManager();
        $dql = "SELECT A.id as id,C.nombre as nombre
                FROM MinsalSiapsBundle:MntAtenAreaModEstab A
                JOIN A.idAreaModEstab B
                JOIN A.idAtencion C
                WHERE A.idAreaModEstab = :idAreaModEstab 
                        AND C.idTipoAtencion = 1";
        $especialidades['especialidades'] = $em->createQuery($dql)
                ->setParameter('idAreaModEstab', $idAreaModEstab)
                ->getArrayResult();

        return new Response(json_encode($especialidades));
    }

    /**
     * @Route("/servicios/hospitalarios/generar", name="generar_servicios_hospitalarios", options={"expose"=true})
     * @Method("GET")
     */
    public function generarServiciosHospitalariosAction() {
        $request = $this->getRequest();

        $em = $this->getDoctrine()->getEntityManager();
        if ($request->get('idAtenAreaModEstab')!='') {
            $dql = "SELECT B.nombre as nombre
                FROM MinsalSiapsBundle:MntAtenAreaModEstab A
                JOIN A.idAtencion B
                WHERE A.id= :id";

            try {
                $especialidad = $em->createQuery($dql)
                        ->setParameter('id', $request->get('idAtenAreaModEstab'))
                        ->getSingleResult();
            } catch (\Doctrine\ORM\NoResultException $e) {
                $especialidad = new \Minsal\SiapsBundle\Entity\CtlAtencion();
            }
        }
        else
            $especialidad = new \Minsal\SiapsBundle\Entity\CtlAtencion();

        if ($request->get('idServicioExterno')!='') {
            $dql = "SELECT B.abreviatura
                FROM MinsalSiapsBundle:MntServicioExternoEstablecimiento A
                JOIN A.idServicioExterno B
                WHERE A.id= :id";

            try {
                $servicioExterno = $em->createQuery($dql)
                        ->setParameter('id', $request->get('idServicioExterno'))
                        ->getSingleResult();
            } catch (\Doctrine\ORM\NoResultException $e) {
                $servicioExterno = new \Minsal\SiapsBundle\Entity\MntServicioExternoEstablecimiento();
            }
        }
        else
            $servicioExterno = new \Minsal\SiapsBundle\Entity\MntServicioExternoEstablecimiento();
        
        return $this->render('MinsalSiapsBundle:MntAmbienteAreaEstablecimiento:generar_servicios.html.twig', array('especialidades' => $especialidad,
                    'serviciosExternos' => $servicioExterno,
                    'porSexo' => $request->get('porSexo'),
                    'numeroAmbientes' => $request->get('numeroAmbientes')
        ));
    }

}