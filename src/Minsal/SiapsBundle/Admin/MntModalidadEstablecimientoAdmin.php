<?php

namespace Minsal\SiapsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Validator\ErrorElement;

class MntModalidadEstablecimientoAdmin extends Admin {

    protected $datagridValues = array(
        '_page' => 1, // Display the first page (default = 1)
        '_sort_order' => 'ASC', // Descendant ordering (default = 'ASC')
        '_sort_by' => 'idEstablecimiento' // name of the ordered field (default = the model id field, if any)
    );

    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
                ->add('idEstablecimiento', 'entity', array('label' => $this->getTranslator()->trans('establecimiento'),
                    'disabled'=>true,
                    'class' => 'MinsalSiapsBundle:CtlEstablecimiento',
                    'query_builder' => function($repositorio) {
                        return $repositorio->obtenerEstabConfigurado();
                    }))
                ->add('idModalidad', 'entity', array('label' => $this->getTranslator()->trans('id_modalidad'),
                    'empty_value' => 'Seleccione la modalidad',
                    'class' => 'MinsalSiapsBundle:CtlModalidad',
                    'query_builder' => function($repositorio) {
                        return $repositorio->obtenerModalidades();
                    }))
                ->add('tieneBodega', null, array('label' => 'Tiene bodega para farmacia', 'required' => false))
                ->add('repetitiva', null, array('label' => 'Emite recetas repetitivas', 'required' => false));
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
                ->add('idEstablecimiento', null, array('label' => $this->getTranslator()->trans('establecimiento')))
                ->add('idModalidad', null, array('label' => $this->getTranslator()->trans('id_modalidad')))
        ;
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->add('idEstablecimiento', null, array('label' => $this->getTranslator()->trans('establecimiento')))
                ->addIdentifier('idModalidad', null, array('label' => $this->getTranslator()->trans('id_modalidad')))
                ->add('tieneBodega', null, array('label' => 'Tiene bodega para farmacia'))
                ->add('repetitiva', null, array('label' => 'Emite recetas repetitivas'))
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