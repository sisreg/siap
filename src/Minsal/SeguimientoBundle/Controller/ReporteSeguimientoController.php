<?php

namespace Minsal\SeguimientoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Minsal\SeguimientoBundle\Entity\SecEmergencia;

class ReporteSeguimientoController extends Controller {
    /*
     * DESCRIPCIÓN: Método que genera la hoja de ingreso y egresos
     * ANALISTA PROGRAMADOR: Karen Peñate
     * PARAMETROS ENTRADA:
     *          paciente        =>  Id del paciente
     *          ingreso         =>  Id del Ingreso
     *          report_name     =>  Nombre del reporte
     *          report_format   =>  Formato del reporte
     */

    /**
     * @Route("/hoja/ingreso/egreso/{report_name}/{report_format}", name="hoja_ingreso_egreso", options={"expose"=true})
     */
    public function hojaIngresoEgresoAction($report_name, $report_format) {
        $request = $this->getRequest();
        $id_paciente = $request->get('paciente');
        $id_ingreso = $request->get('ingreso');

        $jasperReport = $this->container->get('jasper.build.reports');
        $jasperReport->setReportName($report_name);
        $jasperReport->setReportFormat($report_format);
        $jasperReport->setReportPath("/reports/siaps/seguimiento/");
        $jasperReport->setReportParams(array(
            'id_paciente' => $id_paciente,
            'id_ingreso' => $id_ingreso
        ));
        return $jasperReport->buildReport();
    }

    /*
     * DESCRIPCIÓN: Método que genera la hoja de ingreso y egresos
     * ANALISTA PROGRAMADOR: Karen Peñate
     * PARAMETROS ENTRADA:
     *          fecha_inicio    =>  Fecha de inicio del reporte
     *          fecha_fin       =>  Fecha fin del reporte
     *          id_servicio     =>  Id del ambiento o servicio 
     *          report_name     =>  Nombre del reporte
     *          report_format   =>  Formato del reporte
     */

    /**
     * @Route("/total/ingresos/{report_name}/{report_format}/{fecha_inicio}/{fecha_fin}/{id_servicio}", name="total_ingresos", options={"expose"=true})
     */
    public function totalIngresosAction($report_name, $report_format, $fecha_inicio, $fecha_fin, $id_servicio = 0) {

        $jasperReport = $this->container->get('jasper.build.reports');
        $jasperReport->setReportName($report_name);
        $jasperReport->setReportFormat($report_format);
        $jasperReport->setReportPath("/reports/siaps/seguimiento/");
        $jasperReport->setReportParams(array(
            'fecha_inicio' => $fecha_inicio,
            'fecha_fin' => $fecha_fin,
            'id_servicio' => $id_servicio
        ));
        return $jasperReport->buildReport();
    }

    /*
     * DESCRIPCIÓN: Método que generar la hoja de urgencia y crearle la hoja si
     * no la tuviese
     * ANALISTA PROGRAMADOR: Karen Peñate
     * PARAMETROS ENTRADA:
     *          id_paciente     =>  Id del paciente a generar la hoja 
     *          report_name     =>  Nombre del reporte
     *          report_format   =>  Formato del reporte
     */

    /**
     * @Route("/report/seguimiento/paciente/{report_name}/{report_format}", name="_report_seguimiento_paciente", options={"expose"=true})
     */
    public function pacienteAction($report_name, $report_format) {
        $em = $this->getDoctrine()->getManager();
        $id_paciente=$this->get('request')->get('paciente');
        $emergencia = $em->getRepository("MinsalSeguimientoBundle:SecEmergencia")->findBy(array('idPaciente' => $id_paciente));
        

        if (count($emergencia) == 0) {
            $emergencia = new SecEmergencia();
            $paciente = $em->getRepository("MinsalSiapsBundle:MntPaciente")->find($id_paciente);
            $anio = date("Y");
            $emergencia->setAnioEmergencia($anio);
            $sql = "SELECT COALESCE(MAX(CAST(numero_emergencia AS integer))+1,1) AS numero FROM sec_emergencia WHERE anio_emergencia=" . $anio;
            $con = $em->getConnection();
            $query = $con->query($sql);
            $query = $query->fetch();
            $emergencia->setNumeroEmergencia($query['numero']);
            $emergencia->setIdPaciente($paciente);
            $emergencia->setIdUsuarioRegistra($this->container->get('security.context')->getToken()->getUser());
            $emergencia->setFechaRegistra(new \DateTime());
            $em->persist($emergencia);
            $em->flush();
        }

        $request = $this->getRequest();
        $id_paciente = $request->get('paciente');

        $jasperReport = $this->container->get('jasper.build.reports');
        $jasperReport->setReportName($report_name);
        $jasperReport->setReportFormat($report_format);
        $jasperReport->setReportPath("/reports/siaps/seguimiento/");
        $jasperReport->setReportParams(array('id_paciente' => $id_paciente));

        return $jasperReport->buildReport();
    }

}

?>
