<?php

namespace Minsal\SiapsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Validator\ErrorElement;

class CtlProgramaAdmin extends Admin {

    protected $datagridValues = array(
        '_page' => 1, // Display the first page (default = 1)
        '_sort_order' => 'ASC', // Descendant ordering (default = 'ASC')
        '_sort_by' => 'id' // name of the ordered field (default = the model id field, if any)
    );

    protected function configureFormFields(FormMapper $formMapper) {

        $formMapper
                ->add('idEstablecimiento', 'entity', array('label' => $this->getTranslator()->trans('establecimiento'),
                    'read_only' => true,
                    'class' => 'MinsalSiapsBundle:CtlEstablecimiento',
                    'query_builder' => function($repositorio) {
                        return $repositorio->obtenerEstabConfigurado();
                    }))
                ->add('idPrograma', null, array('empty_value' => 'Seleccione el área',
                    'label' => 'Área de atención',
                    'required' => true
                ))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
                ->add('idModalidadEstab', null, array('label' => $this->getTranslator()->trans('idModalidadEstab')))
                ->add('idAreaAtencion', null, array('label' => 'Area de Atención'))
        ;
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->add('idModalidadEstab', null, array('label' => 'Modalidad'))
                ->add('idAreaAtencion', null, array('label' => 'Área de atención'))
        ;
    }

    public function validate(ErrorElement $errorElement, $object) {
        
    }

}

?>