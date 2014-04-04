<?php
//src/Minsal/CitasBundle/Controller/CitCitasDiaController.php
namespace Minsal\CitasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\DBAL as DBAL;
use Symfony\Component\Security\Core\SecurityContext;
use FOS\UserBundle\Model\User;

class CitCitasDiaController extends Controller  {
	
	/**
     * @Route("/citas/dia/medico/get", name="citasdiaxmedico", options={"expose"=true})
     * @Method("GET")
     */
    public function getCitCitasDiaxMedicoAction() {
        $request = $this->getRequest();
        $fecha = $request->get('fecha');
        $idEmpleado = $request->get('idEmpleado');

        $em = $this->getDoctrine()->getManager();
        $dql = "SELECT SUM((CASE WHEN t01.idTipocita = 1 THEN 1 ELSE 0 END) * (CASE WHEN t01.idEstado <> 6 THEN 1 ELSE 0 END)) as citasPrimeraVez,
        			   SUM((CASE WHEN t01.idTipocita = 2 THEN 1 ELSE 0 END) * (CASE WHEN t01.idEstado <> 6 THEN 1 ELSE 0 END)) as citasSubsecuentes,
        			   SUM(CASE WHEN t01.idEstado = 6 THEN 1 ELSE 0 END) as agregados,
        			   COUNT(t01.idTipocita) as totalCitas,
        			   SUM((CASE WHEN t01.idEstado = 5 THEN 1 ELSE 0 END) + (CASE WHEN t01.idEstado = 7 THEN 1 ELSE 0 END)) atendidos
        		FROM MinsalCitasBundle:CitCitasDia t01
        		INNER JOIN MinsalSiapsBundle:MntExpediente t02 WITH t01.id_expediente = t02.id
        		INNER JOIN MinsalSiapsBundle:MntEmpleado t03 WITH t01.idEmpleado = t03.id
        		INNER JOIN MinsalSiapsBundle:MntEmpleadoEspecialidad t04 WITH t04.idEmpleado = t03.id
        		WHERE t01.fecha = :fecha AND t01.idEmpleado = :idEmpleado AND t04.id_aten_area_mod_estab = :especialidad";

        $result = $em->createQuery($dql)
                ->setParameter(':fecha', $fecha)
                ->setParameter(':idEmpleado', $idEmpleado)
                //->setParameter(':especialidad', $especialidad)
                ->getArrayResult();

        $citcita['data1'] = $result;

        return new Response(json_encode($citcita));
    }
}
