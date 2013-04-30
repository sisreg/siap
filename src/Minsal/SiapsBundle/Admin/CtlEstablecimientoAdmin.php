<?php
namespace Minsal\SiapsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Route\RouteCollection;
Use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CtlEstablecimientoAdmin extends Admin
{
    protected $datagridValues = array(
        '_page' => 1, // Display the first page (default = 1)
        '_sort_order' => 'ASC', // Descendant ordering (default = 'ASC')
        '_sort_by' => 'idEstablecimiento' // name of the ordered field (default = the model id field, if any)
    );
    
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('nombre')
            ->add('tipoExpediente','choice',array('choices'=> array('G' => 'Utiliza guión (xxx-xx)', 'I' => 'Infinito'),
                                                   'empty_value' => 'Seleccione una opción','required'=>true))                
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('nombre')
            ->add('idMunicipio')
            ->add('idTipoEstablecimiento')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('nombre')
            ->add('idMunicipio')
            ->add('idTipoEstablecimiento')
            ->add('configurado')
        ;
    }
     
    public function getBatchActions(){
       $actions = parent::getBatchActions();
       $actions['delete'] = null;
   }
   
   protected function configureRoutes(RouteCollection $collection)
    {
        $collection->remove('create');
        $collection->remove('delete');
    }
    
    public function preUpdate($establecimiento)
    {
        $establecimiento->setConfigurado(true);
    }

}
?>