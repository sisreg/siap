<?php

namespace Minsal\SeguimientoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class SecIngresoController extends Controller {

    /**
     * @Route("/obtener/especialidades/ingresos", name="get_especialidad_ingresos", options={"expose"=true})
     */
    public function getEspecialidadesIngresoAction() {

        $em = $this->getDoctrine()->getManager();

        $dql = "SELECT A.id as id,
                        (CASE WHEN F.nombre IS NOT NULL THEN CONCAT(C.nombre, '-',F.nombre) 
                                ELSE C.nombre
                        END)  as nombre  
                FROM MinsalSiapsBundle:MntAtenAreaModEstab A
                JOIN A.idAreaModEstab B
                JOIN A.idAtencion C
                JOIN B.idAreaAtencion D
                LEFT JOIN B.idServicioExternoEstab E
                LEFT JOIN E.idServicioExterno F
                WHERE C.idTipoAtencion = 1
                      AND A.nombreAmbiente IS NULL
                      AND D.id = 3
                ORDER BY nombre";
        $especialidades['especialidades'] = $em->createQuery($dql)
                ->getArrayResult();

        return new Response(json_encode($especialidades));
    }

    /**
     * @Route("/obtener/servicios/hospitalarios", name="get_servicios_hospitalarios", options={"expose"=true})
     */
    public function getServiciosHospitalariosAction() {
        $request = $this->getRequest();
        
        $especialidad = $request->get('idAtenAreaModEstab');
        $em = $this->getDoctrine()->getManager();

        $idAtenAreaModEstab=$em->getRepository('MinsalSiapsBundle:MntAtenAreaModEstab')->find($especialidad);
        $dql = "SELECT A.id as id, A.nombreAmbiente
                FROM MinsalSiapsBundle:MntAtenAreaModEstab A
                WHERE A.idAreaModEstab =:area AND A.idAtencion =:atencion
                      AND A.nombreAmbiente IS NOT NULL";
        $especialidades['especialidades'] = 
                $em->createQuery($dql)
                ->setParameters(array(
                    'area' => $idAtenAreaModEstab->getIdAreaModEstab(),
                    'atencion' => $idAtenAreaModEstab->getIdAtencion()
                ))
                ->getArrayResult();

        return new Response(json_encode($especialidades));
    }
    
    /**
     * @Route("/obtener/servicios/hospitalarios/otros", name="get_servicios_hospitalarios_otros", options={"expose"=true})
     */
    public function getServiciosHospitalariosOtrosAction() {
        $request = $this->getRequest();
        
        $especialidad = $request->get('idAtenAreaModEstab');
        $em = $this->getDoctrine()->getManager();

        $idAtenAreaModEstab=$em->getRepository('MinsalSiapsBundle:MntAtenAreaModEstab')->find($especialidad);
        $dql = "SELECT A.id as id, A.nombreAmbiente
                FROM MinsalSiapsBundle:MntAtenAreaModEstab A
                WHERE A.nombreAmbiente IS NOT NULL AND
                      A.id NOT IN(SELECT B.id
                                  FROM MinsalSiapsBundle:MntAtenAreaModEstab B
                                  WHERE B.idAreaModEstab =:area AND B.idAtencion =:atencion
                                  AND B.nombreAmbiente IS NOT NULL)";
        $especialidades['especialidades'] = 
                $em->createQuery($dql)
                ->setParameters(array(
                    'area' => $idAtenAreaModEstab->getIdAreaModEstab(),
                    'atencion' => $idAtenAreaModEstab->getIdAtencion()
                ))
                ->getArrayResult();

        return new Response(json_encode($especialidades));
    }

}

?>
