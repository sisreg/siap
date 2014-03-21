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
     * @Route("/citcitasdiaxmedico/get", name="citcitasdiaxmedico", options={"expose"=true})
     * @Method("GET")
     */
    public function getCitCitasDiaxMedicoAction() {
        $request = $this->getRequest();
        $fecha = $request->get('fecha');
        $idEmpleado = $request->get('idEmpleado');
        $idEspecialidad = $request->get('idEspecialidad');

        $em = $this->getDoctrine()->getManager();
        $dql = "SELECT SUM((CASE WHEN idTipocita = 1 THEN 1 ELSE 0 END) * (CASE WHEN idEstado <> 6 THEN 1 ELSE 0 END))";

        $r_dql1 = $em->createQuery($dql1)
                ->setParameter(':idUnidad', $idUnidad)
                ->getArrayResult();

        $equipinst['dataEI'] = $r_dql1;

        return new Response(json_encode($equipinst));
    }
}
