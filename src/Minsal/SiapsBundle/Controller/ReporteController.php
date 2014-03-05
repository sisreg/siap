<?php

namespace Minsal\SiapsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Minsal\Util\JasperReport\JasperClient as JasperClient;

include_once (__DIR__ . '/../../Util/JasperReport/_jasperserverreports.php');

class ReporteController extends Controller {
    /*
     * DESCRIPCIÓN: Método que genera la cartera de servicios
     * ANALISTA PROGRAMADOR: Karen Peñate
     * PARAMETROS ENTRADA:
     *          report_name     =>  Nombre del reporte
     *          report_format   =>  Formato del reporte
     */

    /**
     * @Route("/report/show/{report_name}/{report_format}", name="_report_show", options={"expose"=true})
     */
    public function showAction($report_name, $report_format) {
        //$report_format='pdf';
        $jasper_url = JASPER_URL;
        $jasper_username = JASPER_USER;
        $jasper_password = JASPER_PASSWORD;
        $report_unit = "/reports/siaps/cartera/" . $report_name;
        $report_params = array();

        $client = new JasperClient($jasper_url, $jasper_username, $jasper_password);

        $contentType = (($report_format == 'HTML') ? 'text' : 'application') .
                '/' . strtolower($report_format);

        $result = $client->requestReport($report_unit, $report_format, $report_params);

        $response = new Response();
        $response->headers->set('Content-Type', $contentType);
        //if (strtoupper($report_format) != 'HTML')
        //$response->headers->set('Content-disposition', 'attachment; filename="' . $report_name . '.' . strtolower($report_format) . '"');
        $response->setContent($result);

        return $response;
    }

    /*
     * DESCRIPCIÓN: Método que genera la hoja de identificación paciente
     * ANALISTA PROGRAMADOR: Karen Peñate
     * PARAMETROS ENTRADA:
     *          paciente        =>  Id del paciente
     *          report_name     =>  Nombre del reporte
     *          report_format   =>  Formato del reporte
     */

    /**
     * @Route("/report/paciente/{report_name}/{report_format}", name="_report_paciente", options={"expose"=true})
     */
    public function pacienteAction($report_name, $report_format) {
        //$report_format='pdf';
        $jasper_url = JASPER_URL;
        $jasper_username = JASPER_USER;
        $jasper_password = JASPER_PASSWORD;
        $report_unit = "/reports/siaps/administracion/" . $report_name;

        $request = $this->getRequest();
        $id_paciente = $request->get('paciente');
        $report_params = array('id_paciente' => $id_paciente);

        $client = new JasperClient($jasper_url, $jasper_username, $jasper_password);

        $contentType = (($report_format == 'HTML') ? 'text' : 'application') .
                '/' . strtolower($report_format);

        $result = $client->requestReport($report_unit, $report_format, $report_params);

        $response = new Response();
        $response->headers->set('Content-Type', $contentType);
        /*  if (strtoupper($report_format) != 'HTML')
          $response->headers->set('Content-disposition', 'attachment; filename="' . $report_name . '.' . strtolower($report_format) . '"'); */
        $response->setContent($result);

        return $response;
    }

     /*
     * DESCRIPCIÓN: Método que genera la hoja de expedientes realizados en una
     * determinada fecha
     * ANALISTA PROGRAMADOR: Karen Peñate
     * PARAMETROS ENTRADA:
     *          fecha_inicio    =>  Fecha de inicio del reporte
     *          fecha_fin       =>  Fecha de finalización del reporte
     *          report_name     =>  Nombre del reporte
     *          report_format   =>  Formato del reporte
     */
    
    /**
     * @Route("/exportar/{report_name}/{report_format}", name="_exportar_reporte", options={"expose"=true})
     */
    public function exportarReporteAction($report_name, $report_format) {
        $jasper_url = JASPER_URL;
        $jasper_username = JASPER_USER;
        $jasper_password = JASPER_PASSWORD;
        $report_unit = "/reports/siaps/identificacion/" . $report_name;

        $request = $this->getRequest();
        $fecha_inicio = $request->get('fecha_inicio');
        $fecha_fin = $request->get('fecha_fin');

        $report_params = array('fecha_inicio' => $fecha_inicio, 'fecha_fin' => $fecha_fin);
        $client = new JasperClient($jasper_url, $jasper_username, $jasper_password);

        $contentType = (($report_format == 'HTML') ? 'text' : 'application') .
                '/' . strtolower($report_format);

        $result = $client->requestReport($report_unit, $report_format, $report_params);

        $response = new Response();
        $response->headers->set('Content-Type', $contentType);
        if (strtoupper($report_format) != 'PDF')//para cuando sea una hoja de calculo, en este informe sólo  están las opciones PDF y hoja de cálculo
            $response->headers->set('Content-disposition', 'attachment; filename="' . $report_name . '.' . strtolower($report_format) . '"');
        $response->setContent($result);

        return $response;
    }

}

?>
