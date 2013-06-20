<?php
namespace Minsal\SiapsBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController as Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;

class MntPacienteAdminController extends Controller {
    
    public function viewAction(){
        if (false === $this->admin->isGranted('VIEW')) {
            return $this->render('MinsalSiapsBundle::Accesso_denegado.html.twig', 
                    array('admin_pool' => $this->container->get('sonata.admin.pool'),
            'layout' => $this->container->get('sonata.admin.pool')->getTemplate('layout')
            ));
        }
       $em = $this->getDoctrine()->getEntityManager();
       $valor=$this->get('request')->get('id');
       $datos_paciente = $em->getRepository("MinsalSiapsBundle:MntPaciente")->obtenerDatosPaciente($valor);
       $valores=array();
       foreach ($datos_paciente as $fila) {
           $valores[]=$fila['primerApellido'];
           /*.' '.$fila['segundoApellido'].' '.$fila['apellidoCasada'].' '.$fila['primerNombre']
                    .' '.$fila['segundoNombre'].' '.$fila['tercerNombre'];
            /*$valores['fechaNacimiento']=$fila['fechaNacimiento'];
            $valores['lugarNacimiento']=$fila['departamentoNacimiento'].','.$fila['municipioNacimiento'];
            $valores['direccion']=$fila['direccion'];
            $valores['nombrePadre']=$fila['nombrePadre'];
            $valores['nombreMadre']=$fila['nombreMadre'];
            $valores['nombreResponsable']=$fila['nombreResponsable'];
            $valores['direccionResponsable']=$fila['direccionResponsable'];
            $valores['fechaRegistro']=$fila['fecha_registro'];
            $valores['usuario']=$fila['firstname'].' '.$fila['lastname'];
            $valores['expediente']=$fila['numero'];*/
            
        }
        return $this->render($this->admin->getTemplate('view'), array(
                    'action' => 'view'
        ));
               
    }
    
    public function redirectTo($object)
    {
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
          $url = $this->admin->generateUrl('view',$params);
        }

        return new RedirectResponse($url);
    }
}
?>
