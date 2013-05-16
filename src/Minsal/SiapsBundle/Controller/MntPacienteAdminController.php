<?php

namespace Minsal\SiapsBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController as Controller;

class MntPacienteAdminController extends Controller {

   public function listAction($id = null) {
        $repo = $this->getDoctrine()->getManager()->getRepository('IndicadoresBundle:FichaTecnica');
        $this->admin->setRepository($repo);

        return array();
//parent::editAction($id);
    }   

}
