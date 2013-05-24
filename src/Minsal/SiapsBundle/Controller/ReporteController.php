<?php

namespace Minsal\SiapsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Minsal\SiapsBundle\Util\JasperReport\JasperClient as JasperClient;

class ReporteController extends Controller {

    /**
     * @Route("/report/show/{report_name}/{report_format}", name="_report_show", options={"expose"=true})
     */
    public function showAction($report_name,$report_format) {
        //$report_format='pdf';
        $jasper_url = "http://localhost:8080/jasperserver/services/repository?wsdl";
        $jasper_username = "jasperadmin";
        $jasper_password = "jasperadmin";
        $report_unit = "/reports/" . $report_name;
        $report_params = array();

        $client = new JasperClient($jasper_url, $jasper_username, $jasper_password);          
        
        $contentType=(($report_format=='HTML')?'text':'application').
							'/'.strtolower($report_format);

        $result = $client->requestReport($report_unit, $report_format, $report_params);

        $response = new Response();
        $response->headers->set('Content-Type', $contentType);        
        if (strtoupper($report_format) != 'HTML')
            $response->headers->set('Content-disposition', 'attachment; filename="' . $report_name . '.' . strtolower($report_format) . '"');
        $response->setContent($result);
        
        return $response;
    }

}
?>
