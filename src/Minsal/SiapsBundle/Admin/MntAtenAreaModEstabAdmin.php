<?php

namespace Minsal\SiapsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Validator\ErrorElement;

class MntAtenAreaModEstabAdmin extends Admin {

    protected $datagridValues = array(
        '_page' => 1, // Display the first page (default = 1)
        '_sort_order' => 'ASC', // Descendant ordering (default = 'ASC')
        '_sort_by' => 'idAreaModEstab' // name of the ordered field (default = the model id field, if any)
    );

    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
                ->add('idEstablecimiento', 'entity', array('label' => $this->getTranslator()->trans('establecimiento'),
                    'read_only'=>true,                    
                    'class' => 'MinsalSiapsBundle:CtlEstablecimiento',
                    'query_builder' => function($repositorio) {
                        return $repositorio->obtenerEstabConfigurado();
                    }))
                ->add('idAreaModEstab', 'entity', array('label' => $this->getTranslator()->trans('id_modalidad'),
                    'empty_value' => 'Seleccione la modalidad',
                    'class' => 'MinsalSiapsBundle:MntAreaModEstab',
                    
                    ))
                ->add('idAtencion', 'entity', array(
                    'empty_value' => 'Seleccione la atención',
                    'class' => 'MinsalSiapsBundle:CtlAtencion',
                     'query_builder' => function($repositorio) {
                        return $repositorio->createQueryBuilder('caa')
                                           ->where('caa.idAtencionPadre IS NULL');
                     },
                    'required' => true,
                    'multiple' => true,
                    'expanded' => true
                    ))
            ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
                ->add('idAreaModEstab', null, array('label' => 'Area de Atención'))
                ->add('idAtencion', null, array('label' => 'Atención a brindar'))
        ;
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->add('idAreaModEstab', null, array('label' => 'Área de atención'))
                ->addIdentifier('idAtencion', null, array('label' => 'Atención a brindar'))
        ;
    }

    public function validate(ErrorElement $errorElement, $object) {
        
    }

    public function getBatchActions() {
        $actions = parent::getBatchActions();
        $actions['delete'] = null;
    }

}

?>