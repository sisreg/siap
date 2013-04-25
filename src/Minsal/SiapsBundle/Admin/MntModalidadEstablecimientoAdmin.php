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
            ->add('id')
            ->add('idEstablecimiento')
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('idEstablecimiento')  
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->add('idEstablecimiento')  
        ;
    }
    
    public function validate(ErrorElement $errorElement, $object) {  
    }
    
  /*  public function __toString() {
        return $this->id($entity);
    }*/
    
    public function getBatchActions(){
       $actions = parent::getBatchActions();
       $actions['delete'] = null;
   }
}
?>