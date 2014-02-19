<?php

namespace Minsal\SeguimientoBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Minsal\Metodos\Funciones;

class SecIngresoAdminController extends Controller {

    /**
     * return the Response object associated to the create action
     *
     * @throws \Symfony\Component\Security\Core\Exception\AccessDeniedException
     * @return Response
     */
    public function createAction() {
        // the key used to lookup the template
        $templateKey = 'edit';

        if (false === $this->admin->isGranted('CREATE')) {
            return $this->render('MinsalSiapsBundle::Accesso_denegado.html.twig', array('admin_pool' => $this->container->get('sonata.admin.pool'),
                        'layout' => $this->container->get('sonata.admin.pool')->getTemplate('layout')
            ));
        }

        $em = $this->getDoctrine()->getManager();
        $datos_paciente = $em->getRepository("MinsalSiapsBundle:MntPaciente")->obtenerDatosPaciente($this->get('request')->get('id_paciente'));
        $conn = $em->getConnection();
        $calcular = new Funciones();
        $edad = $calcular->calcularEdad($conn, $datos_paciente->getFechaNacimiento()->format('d-m-Y'));
        $aux = explode(' ', $edad);
        if (strstr($aux[1], 'año')) {
            if ($aux[0] >= 11 && $aux[0] <= 50)
                $embarazo = '1';
            else
                $embarazo = '0';
        }
        else
            $embarazo = '0';
        //DECLARO EL OBJETO INGRESO EN ESTE CASO
        $object = $this->admin->getNewInstance();
        
        //ASIGNO EL NUMERO DE EXPEDIENTE
        foreach ($datos_paciente->getExpedientes() as $expediente)
            $object->setIdExpediente($expediente);
        
        $this->admin->setSubject($object);

        /** @var $form \Symfony\Component\Form\Form */
        $form = $this->admin->getForm();
        $form->setData($object);

        if ($this->getRestMethod() == 'POST') {
            $form->bind($this->get('request'));

            $isFormValid = $form->isValid();

            // persist if the form was valid and if in preview mode the preview was approved
            if ($isFormValid && (!$this->isInPreviewMode() || $this->isPreviewApproved())) {
                $this->admin->create($object);

                if ($this->isXmlHttpRequest()) {
                    return $this->renderJson(array(
                                'result' => 'ok',
                                'objectId' => $this->admin->getNormalizedIdentifier($object)
                    ));
                }

                $this->addFlash('sonata_flash_success', $this->admin->trans('flash_create_success', array('%name%' => $this->admin->toString($object)), 'SonataAdminBundle'));

                // redirect to edit mode
                return $this->redirectTo($object);
            }

            // show an error message if the form failed validation
            if (!$isFormValid) {
                if (!$this->isXmlHttpRequest()) {
                    $this->addFlash('sonata_flash_error', $this->admin->trans('flash_create_error', array('%name%' => $this->admin->toString($object)), 'SonataAdminBundle'));
                }
            } elseif ($this->isPreviewRequested()) {
                // pick the preview template if the form was valid and preview was requested
                $templateKey = 'preview';
                $this->admin->getShow();
            }
        }

        $view = $form->createView();

        // set the theme for the current Admin Form
        $this->get('twig')->getExtension('form')->renderer->setTheme($view, $this->admin->getFormTheme());

        /* OBTENER DATOS DE PACIENTE PARA MOSTRAR EN LA VISTA */

        return $this->render($this->admin->getTemplate($templateKey), array(
                    'action' => 'create',
                    'form' => $view,
                    'object' => $object,
                    'datos' => $datos_paciente,
                    'edad' => $edad,
                    'embarazo' => $embarazo
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
            $url = $this->admin->generateObjectUrl('edit', $object);
        }

        return new RedirectResponse($url);
        
        $params = array();
        $params['id'] = $object->getId();
        $url = $this->admin->generateUrl('view', $params);

        return new RedirectResponse($url);
    }

}

?>
