<?php

namespace Minsal\GinecologiaBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class SrgReferenciaExtendidaAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('impresionDiagnostica')
            ->add('detalleMotivoReferencia')
            ->add('datosPositivosInterrogatorio')
            ->add('informacionRelevantePaciente')
            ->add('tratamiento')
            ->add('resumenRetornoRecibido')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('impresionDiagnostica')
            ->add('detalleMotivoReferencia')
            ->add('datosPositivosInterrogatorio')
            ->add('informacionRelevantePaciente')
            ->add('tratamiento')
            ->add('resumenRetornoRecibido')
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
            ->add('idTipoReferenciaRetorno')
            ->add('idMotivoReferencia')
            ->add('impresionDiagnostica')
            ->add('detalleMotivoReferencia')
            ->add('datosPositivosInterrogatorio')
            ->add('informacionRelevantePaciente')
            ->add('tratamiento')
            ->add('resumenRetornoRecibido')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('impresionDiagnostica')
            ->add('detalleMotivoReferencia')
            ->add('datosPositivosInterrogatorio')
            ->add('informacionRelevantePaciente')
            ->add('tratamiento')
            ->add('resumenRetornoRecibido')
        ;
    }
}
