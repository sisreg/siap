<?php

namespace Minsal\SiapsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;


class MntExpedienteAdmin extends Admin {

    protected function configureFormFields(FormMapper $formMapper) {
        $esdomed=$this->getModelManager()
                ->findOneBy('MinsalSiapsBundle:CtlCreacionExpediente', array('id' => 3));
                
        $formMapper
                ->add('numero', null, array('required' => true, 'label' => $this->getTranslator()->trans('numero')))
                ->add('idCreacionExpediente', null, array('required' => true,
                    'preferred_choices' => array($esdomed),
                    'label' => $this->getTranslator()->trans('idCreacionExpediente')))
        ;
    }
     public function getTemplate($name) {
        switch ($name) {
            case 'list':
                return 'MinsalSiapsBundle:MntExpedienteAdmin:list.html.twig';
                break;
            default:
                return parent::getTemplate($name);
                break;
        }
    }

}

?>
