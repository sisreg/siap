<?php

namespace Minsal\SiapsBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController as Controller;

class MntAtenAreaModEstabAdminController extends Controller {

    public function listAction() {
        if (false === $this->admin->isGranted('LIST')) {
            throw new AccessDeniedException();
        }

        $em = $this->getDoctrine()->getManager();
        $modalidades = $em->getRepository("MinsalSiapsBundle:MntAtenAreaModEstab")->obtenerModalidadesUtilizada();
        $cartera = array();
        $i = 0;
        foreach ($modalidades as $modalidad) {
            $cartera[$i] = array('nombre' => $modalidad['nombre'], 'estilo' => 'modalidad','label'=>'Modalidad','tipo'=>3);
            $i++;
            $areasAtencion = $em->getRepository("MinsalSiapsBundle:MntAtenAreaModEstab")->obtenerAreaAtencionUtilizada($modalidad['id']);
            foreach ($areasAtencion as $area) {
                $cartera[$i] = array('nombre' => $area['nombre'], 'estilo' => 'areaAtencion','label'=>'Área de Atención','tipo'=>0);
                $i++;
                $atencionesPadres = $em->getRepository("MinsalSiapsBundle:MntAtenAreaModEstab")->obtenerAtencionesPadresModalidad($modalidad['id'], $area['id']);
                foreach ($atencionesPadres as $padre) {
                    $cartera[$i] = array('nombre' => $padre['nombre'], 'estilo' => 'atencion','label'=>'','tipo'=>$padre['tipo']);
                    $i++;
                    $atencionesHijas = $em->getRepository("MinsalSiapsBundle:MntAtenAreaModEstab")->obtenerAtencionesHijasModalidad($modalidad['id'], $area['id'], $padre['id']);
                    foreach ($atencionesHijas as $hija) {
                        $cartera[$i] = array('nombre' => $hija['nombre'], 'estilo' => 'atencionHijo','label'=>'','tipo'=>0);
                        $i++;
                    }
                }
            }
        }
        return $this->render($this->admin->getTemplate('list'), array(
                    'cartera' => $cartera,
                    'action' => 'list'
        ));
    }

}
