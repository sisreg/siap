<?php
//src/Minsal/CitasBundle/Controller/CitCitasDiaAdminController.php

namespace Minsal\CitasBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\DBAL as DBAL;
use Sonata\AdminBundle\Controller\CRUDController;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpFoundation\RedirectResponse;

class CitCitasDiaAdminController extends CRUDController {

    /**
     * return the Response object associated to the action
	 *
	 * @throws \Symfony\Component\Security\Core\Exception\AccessDeniedException
	 * @return Response
	 */
	public function listAction() {

	if (false === $this->admin->isGranted('LIST')) {
		throw new AccessDeniedException();
	}

	$datagrid = $this->admin->getDatagrid();
	$formView = $datagrid->getForm()->createView();

	// set the theme for the current Admin Form
	$this->get('twig')->getExtension('form')->renderer->setTheme($formView,
	$this->admin->getFilterTheme());

	return

	$this->render('MinsalCitasBundle:Custom:index.html.twig',
		array(
			'action' => 'list',
			'form' => $formView,
		));
	}
    
    /**
     * return the Response object associated to the create action
     *
     * @throws \Symfony\Component\Security\Core\Exception\AccessDeniedException
     * @return Response
     */
    public function createAction() {
        if (false === $this->admin->isGranted('CREATE')) {
            throw new AccessDeniedException();
        }
        
        if ($this->getRestMethod()== 'POST') {
            $request = $this->get('request');
            $object = $this->admin->getNewInstance();
            
            var_dump($request);exit();
            
            $this->addFlash('sonata_flash_success', 'Cita creada exitosamente');
            return new RedirectResponse($this->admin->generateUrl('list'));   
        } else {
            throw new AccessDeniedException();
        }
    }

}
