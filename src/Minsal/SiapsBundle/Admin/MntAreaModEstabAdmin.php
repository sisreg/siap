<?php

namespace Minsal\SiapsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Validator\ErrorElement;

class MntAreaModEstabAdmin extends Admin {

    protected $datagridValues = array(
        '_page' => 1, // Display the first page (default = 1)
        '_sort_order' => 'ASC', // Descendant ordering (default = 'ASC')
        '_sort_by' => 'idModalidadEstab' // name of the ordered field (default = the model id field, if any)
    );

    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
                ->add('idEstablecimiento', 'entity', array('label' => $this->getTranslator()->trans('establecimiento'),
                    'read_only' => true,
                    'class' => 'MinsalSiapsBundle:CtlEstablecimiento',
                    'query_builder' => function($repositorio) {
                        return $repositorio->obtenerEstabConfigurado();
                    }))
                ->add('idModalidadEstab', 'entity', array('label' => $this->getTranslator()->trans('id_modalidad'),
                    'empty_value' => 'Seleccione la modalidad',
                    'class' => 'MinsalSiapsBundle:MntModalidadEstablecimiento'
                ))
                ->add('idAreaAtencion', null, array('empty_value' => 'Seleccione el área',
                    'label' => 'Área de atención',
                    'required' => true
                ))
                ->add('idServicioExternoEstab', null, array('empty_value' => 'Seleccione el servicio externo',
                    'label' => 'Servicio Externo'
                ))
                ->add('atenciones', null, array(
                    'required' => true,
                    'multiple' => true,
                    'expanded' => true
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
                ->add('idEstablecimiento.nombre', 'text', array('label' => 'Establecimiento'))
                ->add('idModalidadEstab.idModalidad', 'text', array('label' => 'Modalidad'))
                ->add('idAreaAtencion', null, array('label' => 'Área de atención'))
                 ->add('idServicioExternoEstab', null, array('label' => 'Servicio Externo'))
                ->add('_action', 'actions', array(
                    'label' => $this->getTranslator()->trans('Action'),
                    'actions' => array(
                        'edit' => array()
                    )
                ))
        ;
    }

    public function validate(ErrorElement $errorElement, $object) {
        if (count($object->getAtenciones()) == 0) {
            $errorElement
                    ->with('atenciones')
                    ->addViolation('Debe seleccionar al menos una atención')
                    ->end();
        }
    }

    public function getTemplate($name) {
        switch ($name) {
            case 'edit':
                return 'MinsalSiapsBundle:CRUD:AreaModEstab_edit.html.twig';
                break;
            default:
                return parent::getTemplate($name);
                break;
        }
    }

    public function getBatchActions() {
        $actions = parent::getBatchActions();
        $actions['delete'] = null;
    }

}

?>