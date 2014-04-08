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
use  Doctrine\DBAL\Types\Type;

class CitCitasDiaController extends Controller  {
	
	/**
     * @Route("/citas/dia/medico/get", name="citasdiaxmedico", options={"expose"=true})
     * @Method("GET")
     */
    public function getCitCitasDiaxMedicoAction() {
        $request      = $this->getRequest();
        $session      = $request->getSession();
        $calendarDate = new \DateTime($request->get('calendarDate'));
        $lowerLimit   = date('Y-m-01', $calendarDate->getTimestamp());
        $upperLimit   = date('Y-m-t',  $calendarDate->getTimestamp());
        $idEmpleado   = $request->get('idEmpleado');

        $sql = "SELECT t05.date, COALESCE(t06.primeraVez,0) AS primera_vez, COALESCE(t06.subsecuentes,0) AS subsecuentes, 
                       COALESCE(t06.agregados,0) AS agregados, COALESCE(t06.totalCitas,0) AS total_citas,
                       COALESCE(t06.atendidos,0) AS atendidos
                FROM (
                      SELECT to_date('$lowerLimit', 'YYYY-MM-DD') + serie AS date 
                      FROM generate_series(0, 31, 1) AS serie
                      WHERE to_date('$lowerLimit', 'YYYY-MM-DD') + serie <= '$upperLimit') t05
                LEFT OUTER JOIN (
                      SELECT t01.fecha as date,
                             SUM((CASE WHEN t01.id_tipocita = 1 THEN 1 ELSE 0 END) * (CASE WHEN t01.id_estado <> 6 THEN 1 ELSE 0 END)) as primeraVez,
                             SUM((CASE WHEN t01.id_tipocita = 2 THEN 1 ELSE 0 END) * (CASE WHEN t01.id_estado <> 6 THEN 1 ELSE 0 END)) as subsecuentes,
                             SUM(CASE WHEN t01.id_estado = 6 THEN 1 ELSE 0 END) as agregados,
                             COUNT(t01.id_tipocita) as totalCitas,
                             SUM((CASE WHEN t01.id_estado = 5 THEN 1 ELSE 0 END) + (CASE WHEN t01.id_estado = 7 THEN 1 ELSE 0 END)) atendidos
                      FROM cit_citas_dia t01
                      INNER JOIN mnt_expediente                  t02 ON (t01.id_expediente = t02.id)
                      INNER JOIN mnt_empleado                    t03 ON (t01.id_empleado   = t03.id)
                      INNER JOIN mnt_empleado_especialidad_estab t04 ON (t04.id_empleado   = t03.id)
                      WHERE t01.fecha >= '$lowerLimit' AND t01.fecha<= '$upperLimit' 
                            AND t01.id_empleado = :idEmpleado AND t01.id_aten_area_mod_estab = :especialidad
                      GROUP BY t01.fecha) t06 ON (t05.date = t06.date)";
        
        $stm = $this->container->get('database_connection')->prepare($sql);
        $stm->bindValue(':idEmpleado',   $idEmpleado);
        $stm->bindValue(':especialidad', $session->get('_idEmpEspecialidadEstab'));
        $stm->execute();
        $result = $stm->fetchAll();

        $citcita['data1'] = $result;

        /*$sql = "SELECT t05.date, COALESCE(t06.primeraVez,0) AS primera_vez, COALESCE(t06.subsecuentes,0) AS subsecuentes, 
                       COALESCE(t06.agregados,0) AS agregados, COALESCE(t06.totalCitas,0) AS total_citas,
                       COALESCE(t06.atendidos,0) AS atendidos
                FROM (
                      SELECT to_date('$lowerLimit', 'YYYY-MM-DD') + serie AS date 
                      FROM generate_series(0, 31, 1) AS serie
                      WHERE to_date('$lowerLimit', 'YYYY-MM-DD') + serie <= '$upperLimit') t05
                LEFT OUTER JOIN (
                      SELECT t01.fecha as date,
                             SUM((CASE WHEN t01.id_tipocita = 1 THEN 1 ELSE 0 END) * (CASE WHEN t01.id_estado <> 6 THEN 1 ELSE 0 END)) as primeraVez,
                             SUM((CASE WHEN t01.id_tipocita = 2 THEN 1 ELSE 0 END) * (CASE WHEN t01.id_estado <> 6 THEN 1 ELSE 0 END)) as subsecuentes,
                             SUM(CASE WHEN t01.id_estado = 6 THEN 1 ELSE 0 END) as agregados,
                             COUNT(t01.id_tipocita) as totalCitas,
                             SUM((CASE WHEN t01.id_estado = 5 THEN 1 ELSE 0 END) + (CASE WHEN t01.id_estado = 7 THEN 1 ELSE 0 END)) atendidos
                      FROM cit_citas_dia t01
                      INNER JOIN mnt_expediente                  t02 ON (t01.id_expediente = t02.id)
                      INNER JOIN mnt_empleado                    t03 ON (t01.id_empleado   = t03.id)
                      INNER JOIN mnt_empleado_especialidad_estab t04 ON (t04.id_empleado   = t03.id)
                      WHERE t01.fecha >= '$lowerLimit' AND t01.fecha<= '$upperLimit' 
                            AND t01.id_empleado = :idEmpleado AND t01.id_aten_area_mod_estab = :especialidad
                      GROUP BY t01.fecha) t06 ON (t05.date = t06.date)";
        
        $stm = $this->container->get('database_connection')->prepare($sql);
        $stm->bindValue(':idEmpleado',   $idEmpleado);
        $stm->bindValue(':especialidad', $session->get('_idEmpEspecialidadEstab'));
        $stm->execute();
        $result = $stm->fetchAll();

         $citcita['data1'] = $result;*/
         
        return new Response(json_encode($citcita));
    }
}
