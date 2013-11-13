<?php

namespace Minsal\SiapsBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController as Controller;

class MntExpedienteAdminController extends Controller {

    public function listAction() {
        if (false === $this->admin->isGranted('LIST')) {
            return $this->render('MinsalSiapsBundle::Accesso_denegado.html.twig', array('admin_pool' => $this->container->get('sonata.admin.pool'),
                        'layout' => $this->container->get('sonata.admin.pool')->getTemplate('layout')
            ));
        }
        $em = $this->getDoctrine()->getManager();
        $establecimiento = $em->getRepository("MinsalSiapsBundle:CtlEstablecimiento")->obtenerEstablecimientoConfigurado();
        
        return $this->render($this->admin->getTemplate('list'), array(
                    'action' => 'list',
                    'establecimiento' => $establecimiento
        ));
    }
    
}
