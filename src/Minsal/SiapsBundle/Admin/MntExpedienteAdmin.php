<?php

namespace Minsal\SiapsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;

class MntExpedienteAdmin extends Admin {

    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
                ->add('numero',null,array('required'=>true,'label'=>$this->getTranslator()->trans('numero')))
                ->add('idCreacionExpediente',null,array('required'=>true,'empty_value' => 'Seleccione...',
                    'label'=>$this->getTranslator()->trans('idCreacionExpediente')))
                ->add('idPaciente',null,array('label'=>$this->getTranslator()->trans('idPaciente')))
        ;
    }
    
     public function getBatchActions() {
        $actions = parent::getBatchActions();
        $actions['delete'] = null;
    }

}
?>
