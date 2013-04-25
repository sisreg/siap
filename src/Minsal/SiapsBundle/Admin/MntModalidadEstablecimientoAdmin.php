<?php
namespace Minsal\SiapsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Validator\ErrorElement;

class MntModalidadEstablecimientoAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('idEstablecimiento',null, array('label'=> $this->getTranslator()->trans('establecimiento')))
            ->add('idModalidad', null, array('label'=>$this->getTranslator()->trans('id_modalidad')))
            ->add('tieneBodega', null, array('label'=>'Tiene bodega para farmacia'))
            ->add('repetitiva', null , array('label'=>'Emite recetas repetitivas'))
                
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('idEstablecimiento',null, array('label'=> $this->getTranslator()->trans('establecimiento')))
            ->add('idModalidad', null, array('label'=>$this->getTranslator()->trans('id_modalidad')))
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('idEstablecimiento',null, array('label'=> $this->getTranslator()->trans('establecimiento')))
            ->add('idModalidad', null, array('label'=>$this->getTranslator()->trans('id_modalidad')))
            ->add('tieneBodega', null, array('label'=>'Tiene bodega para farmacia'))
            ->add('repetitiva', null , array('label'=>'Emite recetas repetitivas'))
        ;
    }
    
    public function validate(ErrorElement $errorElement, $object) {  
    }
  
    public function getBatchActions(){
       $actions = parent::getBatchActions();
       $actions['delete'] = null;
   }
}
?>