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
        $em             = $this->getDoctrine()->getManager();
        $request        = $this->getRequest();
        $session        = $request->getSession();
        $calendarDate   = new \DateTime($request->get('calendarDate'));
        $lowerLimit     = date('Y-m-01', $calendarDate->getTimestamp());
        $upperLimit     = date('Y-m-t',  $calendarDate->getTimestamp());
        $idEmpleado     = $request->get('idEmpleado');
        $especialidad   = $request->get('idEmpleadoEspecialidadEstab');
        $idAreaModEstab = $em->getRepository('MinsalSiapsBundle:MntAtenAreaModEstab')->findOneById($especialidad)->getIdAreaModEstab()->getId();

        /*****************************************************************************************
         * SQL que determina la cantidad de citas por primera vez, subsecuentes, agregados, aten-
         * didos y total de citas para cada dia de un mes determinado por usuario y especialidad
         ****************************************************************************************/
        $sql = "SELECT TO_CHAR(t05.date, 'YYYY/MM/DD') AS date, COALESCE(t06.primeraVez,0) AS primera_vez, 
                       COALESCE(t06.subsecuentes,0) AS subsecuentes, 
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
        $stm->bindValue(':especialidad', $especialidad);
        $stm->execute();
        $result = $stm->fetchAll();

        $citcita['data1'] = $result;

        /*****************************************************************************************
         * SQL que determina los eventos que un empleado tiene para un mes en especifico, asi como
         * tambien las fechas festivas o no laborables
         ****************************************************************************************/
        $sql = "SELECT TO_CHAR(t01.date, 'YYYY/MM/DD') AS date,
                       CASE WHEN t01.date BETWEEN t02.fechaini AND t02.fechafin THEN 'true'
                                                                                ELSE 'false'
                       END AS bloqueado,
                       COALESCE(t02.tipo_evento, 'N/A') AS tipo_evento,
                       COALESCE(t03.citas_programadas, 0) AS citas_programadas
                FROM ( 
                      SELECT to_date('$lowerLimit', 'YYYY-MM-DD') + serie AS date 
                      FROM generate_series(0, 31, 1) AS serie
                      WHERE to_date('$lowerLimit', 'YYYY-MM-DD') + serie <= '$upperLimit') t01
                LEFT OUTER JOIN (
                      SELECT fechaini, fechafin,
                             CASE WHEN idempleado = :idEmpleado THEN 'personal'
                                                                ELSE 'festivo' 
                             END AS tipo_evento
                      FROM cit_evento
                      WHERE idempleado = :idEmpleado OR idempleado IS NULL) t02 ON (t01.date BETWEEN t02.fechaini AND t02.fechafin)
                LEFT OUTER JOIN (
                      SELECT fecha, COUNT(*) AS citas_programadas
                      FROM cit_citas_dia
                      WHERE id_empleado = :idEmpleado AND (id_estado = 1 OR id_estado = 6)
                      GROUP BY fecha) t03 ON (t01.date = t03.fecha)";
        
        $stm = $this->container->get('database_connection')->prepare($sql);
        $stm->bindValue(':idEmpleado',   $idEmpleado);
        $stm->execute();
        $result = $stm->fetchAll();

        $citcita['data2'] = $result;

        /*****************************************************************************************
         * SQL que determina la distribucion de un médico, para un mes especifico
         ****************************************************************************************/
        $sql = "SELECT TO_CHAR(t01.date, 'YYYY/MM/DD') AS date,
                       COALESCE(t02.distribucion, 0) AS distribucion
                FROM (
                      SELECT serie::date AS date, EXTRACT(DOW FROM serie) AS DOW
                      FROM generate_series ('$lowerLimit'::timestamp, '$upperLimit'::timestamp, '1 day'::interval) serie) t01
                LEFT OUTER JOIN (
                      SELECT yrs, mes, dia, COUNT(*) AS distribucion FROM  cit_distribucion
                      WHERE id_empleado = :idEmpleado
                            AND id_aten_area_mod_estab = :especialidad
                            AND id_area_mod_estab = :idAreaModEstab
                      GROUP BY yrs, mes, dia) t02 ON (t02.yrs = EXTRACT(YEAR FROM t01.date::timestamp)
                                  AND t02.mes = EXTRACT(MONTH FROM t01.date::timestamp)
                                  AND t02.dia = EXTRACT(DOW FROM t01.date::timestamp))";
        
        $stm = $this->container->get('database_connection')->prepare($sql);
        $stm->bindValue(':idEmpleado',   $idEmpleado);
        $stm->bindValue(':especialidad', $especialidad);
        $stm->bindValue(':idAreaModEstab', $idAreaModEstab);
        $stm->execute();
        $result = $stm->fetchAll();

        $citcita['data3'] = $result;
        
        return new Response(json_encode($citcita));
    }

    /**
     * @Route("/citas/horario/medico/get", name="citashorariomedico", options={"expose"=true})
     * @Method("GET")
     */
    public function getHorarioMedicoAction() {
        $em             = $this->getDoctrine()->getManager();
        $request        = $this->getRequest();
        $session        = $request->getSession();
        $date           = new \DateTime($request->get('date'));
        $idEmpleado     = $request->get('idEmpleado');
        $especialidad   = $request->get('idEmpleadoEspecialidadEstab');
        $idAreaModEstab = $em->getRepository('MinsalSiapsBundle:MntAtenAreaModEstab')->findOneById($especialidad)->getIdAreaModEstab()->getId();

        /*****************************************************************************************
         * SQL que determina el horario de atencion de pacientes de un medico para una fecha de-
         * terminada
         ****************************************************************************************/
        $sql = "SELECT t02.id, t02.hora_ini::text
                FROM cit_distribucion t01
                INNER JOIN mnt_rangohora t02 ON (t02.id = t01.id_rangohora)
                WHERE t01.id_empleado = :idEmpleado
                      AND t01.id_aten_area_mod_estab = :idAtenAreaModEstab
                      AND t01.id_area_mod_estab      = :idAreaModEstab
                      AND t01.dia                    = :dia
                      AND t01.mes                    = :mes
                      AND t01.yrs                    = :yrs
                GROUP BY t02.id, t02.hora_ini
                ORDER BY t02.hora_ini::text";

        $stm = $this->container->get('database_connection')->prepare($sql);
        $stm->bindValue(':idEmpleado', $idEmpleado);
        $stm->bindValue(':idAtenAreaModEstab', $especialidad);
        $stm->bindValue(':idAreaModEstab', $idAreaModEstab);
        $stm->bindValue(':dia', date( "w", $date->getTimestamp()));
        $stm->bindValue(':mes', date( "n", $date->getTimestamp()));
        $stm->bindValue(':yrs', date( "Y", $date->getTimestamp()));
        $stm->execute();
        $result = $stm->fetchAll();

        $citcita['data1'] = $result;

        return new Response(json_encode($citcita));
    }

    /**
     * @Route("/citas/detalle/hora/get", name="citasdetallehora", options={"expose"=true})
     * @Method("GET")
     */
    public function getDetalleCitaHoraAction() {
        $em           = $this->getDoctrine()->getManager();
        $request      = $this->getRequest();
        $session      = $request->getSession();
        $date         = new \DateTime($request->get('date'));
        $idEmpleado   = $request->get('idEmpleado');
        $especialidad = $request->get('idEmpleadoEspecialidadEstab');
        $idRangohora  = $request->get('hora');

        /*****************************************************************************************
         * SQL que determina el detalle de la cita por hora
         ****************************************************************************************/

        $dql = "SELECT IDENTITY(t01.idExpediente) AS idExpediente,
                       t02.numero AS codExpediente,
                       CONCAT(CONCAT(t04.primerApellido, ' '),CONCAT(CONCAT(t04.segundoApellido, ', '),CONCAT(CONCAT(t04.primerNombre,' '),CONCAT(CONCAT(t04.segundoNombre,' '), t04.tercerNombre)))) AS nombrePaciente,
                       IDENTITY(t01.idEstado) AS idEstado, t06.estado AS nombreEstado
                      FROM MinsalCitasBundle:CitCitasDia t01
                      INNER JOIN MinsalSiapsBundle:MntExpediente t02 WITH (t02.id = t01.idExpediente)
                      INNER JOIN MinsalCitasBundle:CitFechas     t03 WITH (t01.id = t03.idCita)
                      INNER JOIN MinsalSiapsBundle:MntPaciente   t04 WITH (t04.id = t02.idPaciente)
                      INNER JOIN MinsalSiapsBundle:MntEmpleado   t05 WITH (t05.id = t01.idEmpleado)
                      INNER JOIN MinsalCitasBundle:CitEstadoCita t06 WITH (t06.id = t01.idEstado)";
        
        $where = " WHERE t01.fecha = :fecha
                        AND t01.idEmpleado = :idEmpleado
                        AND t01.idTipocita = :idTipocita
                        AND t01.idAtenAreaModEstab = :especialidad
                        AND t03.idRangohora = :hora
                        AND t01.idMotivo IS NULL
                   ORDER BY t06.estado DESC";
        
        $result = $em->createQuery($dql."".$where)
                     ->setParameter(':fecha', date('Y-m-d', $date->getTimestamp()))
                     ->setParameter(':idEmpleado', $idEmpleado)
                     ->setParameter(':idTipocita', 1)
                     ->setParameter(':especialidad', $especialidad)
                     ->setParameter(':hora', $idRangohora)
                     ->getArrayResult();

        $citcita['data1'] = $result;

        $result = $em->createQuery($dql.$where)
                     ->setParameter(':fecha', date('Y-m-d', $date->getTimestamp()))
                     ->setParameter(':idEmpleado', $idEmpleado)
                     ->setParameter(':idTipocita', 2)
                     ->setParameter(':especialidad', $especialidad)
                     ->setParameter(':hora', $idRangohora)
                     ->getArrayResult();

        $citcita['data2'] = $result;

        $where = " WHERE t01.fecha = :fecha
                        AND t01.idEmpleado = :idEmpleado
                        AND t01.idAtenAreaModEstab = :especialidad
                        AND t03.idRangohora = :hora
                        AND t01.idMotivo >= 1
                   ORDER BY t06.estado DESC";

        $result = $em->createQuery($dql.$where)
                     ->setParameter(':fecha', date('Y-m-d', $date->getTimestamp()))
                     ->setParameter(':idEmpleado', $idEmpleado)
                     ->setParameter(':especialidad', $especialidad)
                     ->setParameter(':hora', $idRangohora)
                     ->getArrayResult();

        $citcita['data3'] = $result;

        return new Response(json_encode($citcita));
    }
    
    /**
     * @Route("/citas/expediente/paciente/get", name="citasexpedientepaciente", options={"expose"=true})
     * @Method("GET")
     */
    public function getExpedientePacienteAction() {
        $em      = $this->getDoctrine()->getManager();
        $request = $this->getRequest();
        $clue    = $request->get('clue');
        $limit   = $request->get('page_limit');
        $page    = $request->get('page');
        
        $dql = "SELECT t01.id, 
                    CONCAT(COALESCE(CONCAT(t01.numero, ' - '), ''), 
                    CONCAT(COALESCE(CONCAT(t02.primerApellido, ' '), ''), 
                    CONCAT(COALESCE(CONCAT(t02.segundoApellido, ', '), ''), 
                    CONCAT(COALESCE(CONCAT(t02.primerNombre,' '), ''), 
                    CONCAT(COALESCE(CONCAT(t02.segundoNombre,' '), ''), 
                    COALESCE(t02.tercerNombre,'')))))) AS text
                FROM MinsalSiapsBundle:MntExpediente t01
                INNER JOIN MinsalSiapsBundle:MntPaciente t02 WITH (t02.id = t01.idPaciente)
                WHERE LOWER(
                        CONCAT(COALESCE(CONCAT(t01.numero, ' - '), ''), 
                        CONCAT(COALESCE(CONCAT(t02.primerApellido, ' '), ''), 
                        CONCAT(COALESCE(CONCAT(t02.segundoApellido, ', '), ''), 
                        CONCAT(COALESCE(CONCAT(t02.primerNombre,' '), ''), 
                        CONCAT(COALESCE(CONCAT(t02.segundoNombre,' '), ''), 
                        COALESCE(t02.tercerNombre,''))))))) LIKE '%$clue%'
                ORDER BY text";
         
        $result = $em->createQuery($dql)
                    ->setMaxResults($limit)
                    ->setFirstResult($page)
                    ->getArrayResult();
        
        $citcita['data1'] = $result;
        
        $dql = "SELECT COUNT(t01) as Total
                FROM MinsalSiapsBundle:MntExpediente t01
                INNER JOIN MinsalSiapsBundle:MntPaciente t02 WITH (t02.id = t01.idPaciente)
                WHERE LOWER(
                        CONCAT(COALESCE(CONCAT(t01.numero, ' - '), ''), 
                        CONCAT(COALESCE(CONCAT(t02.primerApellido, ' '), ''), 
                        CONCAT(COALESCE(CONCAT(t02.segundoApellido, ', '), ''), 
                        CONCAT(COALESCE(CONCAT(t02.primerNombre,' '), ''), 
                        CONCAT(COALESCE(CONCAT(t02.segundoNombre,' '), ''), 
                        COALESCE(t02.tercerNombre,''))))))) LIKE '%$clue%'";
         
        $result = $em->createQuery($dql)
                    ->getArrayResult();
        
        $citcita['data2'] = $result[0];
        
        return new Response(json_encode($citcita));
    }
    
    /**
     * @Route("/citas/medicos/get", name="citasgetmedico", options={"expose"=true})
     * @Method("GET")
     */
    public function getMedicoAction() {
        $em  = $this->getDoctrine()->getManager();
        
        $dql = "SELECT t01.id,
                       CONCAT(COALESCE(CONCAT(t01.nombre, ' '), ''), COALESCE(t01.apellido, '')) AS nombre,
                       IDENTITY(t01.idEstablecimiento) AS idEstablecimiento
                FROM MinsalSiapsBundle:MntEmpleado              t01
                INNER JOIN MinsalSiapsBundle:MntTipoEmpleado    t02 WITH (t02.id = t01.idTipoEmpleado)
                INNER JOIN MinsalSiapsBundle:CtlEstablecimiento t03 WITH (t03.id = t01.idEstablecimiento)
                WHERE t02.codigo = 'MED'";
        
        $result = $em->createQuery($dql)
                    ->getArrayResult();
        
        $citcita['data1'] = $result;
        
        return new Response(json_encode($citcita));
    }
    
    /**
     * @Route("/citas/medicos/especilidad/estab/get", name="citasgetmedicoespecilidadestab", options={"expose"=true})
     * @Method("GET")
     */
    public function getMedicoEspecilidadEstabAction() {
        $em         = $this->getDoctrine()->getManager();
        $request    = $this->getRequest();
        $idEmpleado = $request->get('idEmpleado');
        
        $dql = "SELECT t01.id,
                       t02.nombre,
                       t05.id AS idEstablecimiento
                FROM MinsalSiapsBundle:MntEmpleadoEspecialidadEstab t00
                INNER JOIN MinsalSiapsBundle:MntAtenAreaModEstab t01 WITH (t01.id = t00.idAtenAreaModEstab)
                INNER JOIN MinsalSiapsBundle:CtlAtencion         t02 WITH (t02.id = t01.idAtencion)
                INNER JOIN MinsalSiapsBundle:MntAreaModEstab     t03 WITH (t03.id = t01.idAreaModEstab)
                INNER JOIN MinsalSiapsBundle:CtlAreaAtencion     t04 WITH (t04.id = t03.idAreaAtencion)
                INNER JOIN MinsalSiapsBundle:MntEmpleado         t05 WITH (t05.id = t00.idEmpleado)
                INNER JOIN MinsalSiapsBundle:MntTipoEmpleado     t06 WITH (t06.id = t05.idTipoEmpleado)
                WHERE t03.id = 1 AND t00.idEmpleado = :idEmpleado AND t06.codigo = :codigoEmpleado";
        
        $result = $em->createQuery($dql)
                    ->setParameter(':idEmpleado', $idEmpleado)
                    ->setParameter(':codigoEmpleado', 'MED')
                    ->getArrayResult();
        
        $citcita['data1'] = $result;
        
        return new Response(json_encode($citcita));
    }
}
