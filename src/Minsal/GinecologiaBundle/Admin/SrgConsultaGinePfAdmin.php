<?php

namespace Minsal\GinecologiaBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class SrgConsultaGinePfAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('fechaConsulta')
            ->add('horaInicio')
            ->add('horaFin')
            ->add('estadoConsulta')
            ->add('especialidadConsulta')
            ->add('referenciaRecibida')
            ->add('retornoRecibido')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('fechaConsulta')
            ->add('horaInicio')
            ->add('horaFin')
            ->add('estadoConsulta')
            ->add('especialidadConsulta')
            ->add('referenciaRecibida')
            ->add('retornoRecibido')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('fechaConsulta')
            ->add('horaInicio')
            ->add('horaFin')
            ->add('estadoConsulta')
            ->add('especialidadConsulta')
            ->add('referenciaRecibida')
            ->add('retornoRecibido')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('fechaConsulta')
            ->add('horaInicio')
            ->add('horaFin')
            ->add('estadoConsulta')
            ->add('especialidadConsulta')
            ->add('referenciaRecibida')
            ->add('retornoRecibido')
        ;
    }

   
}
