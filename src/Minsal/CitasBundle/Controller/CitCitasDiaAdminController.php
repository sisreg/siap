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
            $em      = $this->getDoctrine()->getManager();
            $qb      = $em->createQueryBuilder();
            $request = $this->get('request');
            
            $idEmpleado   = $request->get('idEmpleado');
            $especialidad = $request->get('idEmpleadoEspecialidadEstab');
            $date         = new \DateTime($request->get('date'));
            $idRangohora  = $request->get('horarioMedico');
            $idExpediente = $request->get('numExpNomPac');
            $tipoCita     = 2;
            $today        = new \DateTime();
            $usuario   = $this->getSecurityContext()->getToken()->getUser();
            $ipcita       = $request->server->get('REMOTE_ADDR');
            
            $citDistribucion = $em->getRepository('MinsalCitasBundle:CitDistribucion')->findOneBy(
                array(
                    'idEmpleado'         => $idEmpleado,
                    'dia'                => date( "w", $date->getTimestamp()),
                    'mes'                => date( "n", $date->getTimestamp()),
                    'yrs'                => date( "Y", $date->getTimestamp()),
                    'idAtenAreaModEstab' => $especialidad,
                    'idRangohora'        => $idRangohora
                    )
                );
            
            /*Limite de subsecuetnes que pueden ser asignados en el dia y hora al medico*/
            $subsecuentes = $citDistribucion->getSubsecuente();
            
            /*Obteniendo el total de citas que posee el medico*/
            $totalCitas = $qb->select($qb->expr()->count('t01.id'))
                    ->from('MinsalCitasBundle:CitCitasDia', 't01')
                    ->where('t01.fecha = :fecha')
                    ->andWhere('t01.idEmpleado != :idEmpleado')
                    ->andWhere('t01.idTipoCita = :idTipoCita')
                    ->andWhere('t01.idAtenAreaModEstab = :especialidad')
                    ->andWhere('t01.idRangohora = :idRangohora')
                    ->setParameters(array(
                            ':fecha' => date('Y-m-d', $date->getTimestamp()),
                            ':idEmpleado'   => $idEmpleado, 
                            ':idTipoCita'   => $idTipoCita,
                            ':especialidad' => $especilaidad,
                            ':idRangohora'  => $idRangohora))
                    ->$query->getResult();
                
            if($subsecuentes > $totalCitas) {
                $idEstado = 1;
                $idMotivo = NULL;
            } else {
                $idEstado = 6;
                $idMotivo = 2;
            }
            
            /*Preparando los campos para insersion o actualizacion*/
            $mntEmpleado = $em->getRepository('MinsalSiapsBundle:MntEmpleado')->findOneById($idEmpleado);
            $mntAtenAreaModEstab = $em->getRepository('MinsalSiapsBundle:MntAtenAreaModEstab')->findOneById($especialidad);
                
            $parameters = array(
                    'idTipocita'         => $em->getRepository('MinsalCitasBundle:CitTipocita')->findOneById($tipoCita),
                    'idAtenAreaModEstab' => $mntAtenAreaModEstab,
                    'idEstado'           => $em->getRepository('MinsalCitasBundle:CitEstadoCita')->findOneById($idEstado),
                    'fecha'              => $date,
                    'idusuarioreg'       => $usuario,
                    'fechahorareg'       => $today,
                    'idMotivo'           => $idMotivo != NULL ? $em->getRepository('MinsalCitasBundle:CitMotivoagregados')->findOneById($idMotivo) : $idMotivo,
                    'ipcita'             => $ipcita,
                    'idEmpleado'         => $idEmpleado,
                    'idExpediente'       => $em->getRepository('MinsalSiapsBundle:MntExpediente')->findOneById($idExpediente),
                    'idEstablecimiento'  => $mntEmpleado->getIdEstablecimiento(),
                    'idRangohora'        => $em->getRepository('MinsalSiapsBundle:MntRangohora')->findOneById($idRangohora),
                    'idAreaModEstab'     => $mntAtenAreaModEstab->getIdAreaModEstab()
                );
            
            /*Comprando si el paciente tiene una cita asignada que no pertenece a el*/
            $poseeCita = $qb->select('t01')
                         ->from('MinsalCitasBundle:CitCitasDia', 't01')
                         ->where('t01.fecha = :fecha')
                         ->andWhere('t01.idExpediente = :idExpediente')
                         ->setParameters(array(
                                ':fecha' => date('Y-m-d', $date->getTimestamp()),
                                ':idExpediente' => $idExpediente))
                         ->$query->getResult();
            
            /*Comprando si el paciente tiene una cita de procedimiento asignada que no pertenece a el*/
            $poseeProcedimiento = $qb->select('t01')
                         ->from('MinsalCitasBundle:CitCitasprocedimientos', 't01')
                         ->where('t01.fecha = :fecha')
                         ->andWhere('t01.idExpediente = :idExpediente')
                         ->setParameters(array(
                                ':fecha' => date('Y-m-d', $date->getTimestamp()),
                                ':idExpediente' => $idExpediente))
                         ->$query->getResult();
            
            if($poseeCita || $poseeProcedimiento) {
                
                $citaPrevia = $qb->select('t01')
                         ->from('MinsalCitasBundle:CitCitasDia', 't01')
                         ->where('t01.fecha > :today')
                         ->andWhere('t01.idusuarioreg = :idusuarioreg')
                         ->andWhere('t01.idExpediente = :idExpediente')
                         ->andWhrere('t01.idEstado = 1 OR t01.idEstado = 6')
                         ->setParameters(array(
                                ':today' => date('Y-m-d', $today->getTimestamp()),
                                ':idusuarioreg' => $usuario->getId(),
                                ':idExpediente' => $idExpediente))
                         ->$query->getResult();
                
                if($citaPrevia) {
                    $this->updateCita($citaPrevia->getId(), $parameters);
                } else {
                    $this->insertCita($parameters);
                }
                
            } else {
                $this->insertCita($parameters);
            }
            
            
            
            
            $this->addFlash('sonata_flash_success', 'Cita creada exitosamente');
            return new RedirectResponse($this->admin->generateUrl('list'));   
        } else {
            throw new AccessDeniedException();
        }
    }
    
    private function insertCita($parameters) {
        $object  = $this->admin->getNewInstance();
        
        $object->setIdTipocita($parameters['idTipocita']);
        $object->setIdAtenAreaModEstab($parameters['idAtenAreaModEstab']);
        $object->setIdEstado($parameters['idEstado']);
        $object->setFecha($parameters['fecha']);
        $object->setIdusuarioreg($parameters['idusuarioreg']);
        $object->setfechahorareg($parameters['fechahorareg']);
        $object->setIdMotivo($parameters['idMotivo']);
        $object->setIpcita($parameters['ipcita']);
        $object->setIdEmpleado($parameters['idEmpleado']);
        $object->setIdExpediente($parameters['idExpediente']);
        $object->setIdEstablecimiento($parameters['idEstablecimiento']);
        $object->setIdRangohora($parameters['idRangohora']);
        $object->setIdAreaModEstab($parameters['idAreaModEstab']);
        
        $this->admin->create($object);
    }
    
    private function updateCita($id, $parameters) {
        $citCitasDia = $em->getRepository('MinsalCitasBundle:CitCitasDia')->findOneById($id);
        
        $citCitasDia->setIdEstado($parameters['idEstado']);
        $citCitasDia->setFecha($parameters['fecha']);
        $citCitasDia->setIdMotivo($parameters['idMotivo']);
        
        $this->admin->update($citCitasDia);
    }
}
