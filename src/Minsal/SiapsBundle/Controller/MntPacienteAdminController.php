<?php

namespace Minsal\SiapsBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Minsal\SiapsBundle\Controller\MntPacienteController;
use Minsal\Metodos\Funciones;

class MntPacienteAdminController extends Controller {

    public function viewAction() {
        if (false === $this->admin->isGranted('VIEW')) {
            return $this->render('MinsalSiapsBundle::Accesso_denegado.html.twig', array('admin_pool' => $this->container->get('sonata.admin.pool'),
                        'layout' => $this->container->get('sonata.admin.pool')->getTemplate('layout')
            ));
        }
        $em = $this->getDoctrine()->getEntityManager();
        $valor = $this->get('request')->get('id');
        $datos_paciente = $em->getRepository("MinsalSiapsBundle:MntPaciente")->obtenerDatosPaciente($valor);
        $conn = $em->getConnection();
        $calcular= new Funciones();
        $edad = $calcular->calcularEdad($conn,$datos_paciente->getFechaNacimiento()->format('d-m-Y'));
       
        return $this->render($this->admin->getTemplate('view'), array(
                    'action' => 'view',
                    'datos' => $datos_paciente,
                    'edad' => $edad
        ));
    }

    public function redirectTo($object) {
        $url = false;

        if ($this->get('request')->get('btn_update_and_list')) {
            $url = $this->admin->generateUrl('list');
        }
        if ($this->get('request')->get('btn_create_and_list')) {
            $url = $this->admin->generateUrl('list');
        }
        if ($this->get('request')->get('btn_create_and_create')) {
            $params = array();
            if ($this->admin->hasActiveSubClass()) {
                $params['subclass'] = $this->get('request')->get('subclass');
            }
            $url = $this->admin->generateUrl('create', $params);
        }
        if (!$url) {
            $params['id'] = $this->get('request')->get('id');
            $url = $this->admin->generateUrl('view', $object->get('id'));
        }

        return new RedirectResponse($url);
    }

}

?>
