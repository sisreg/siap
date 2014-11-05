<?php

namespace Minsal\GinecologiaBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class SrgRetornoExtendidoAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('fechaLlenadoFormulario')
            ->add('fechaQueSeRecibe')
            ->add('criteriosInterconsultate')
            ->add('datosPositivosInterrogatorio')
            ->add('informacionRelevantePaciente')
            ->add('impresionDiagnostica')
            ->add('tratamiento')
            ->add('conductaASeguir')
            ->add('dejarControlPaciente')
            ->add('fechaLlenadoProximaCita')
            ->add('detalleValoracionPertinencia')
            ->add('valoracionNecesaria')
            ->add('valoracionOportuna')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('fechaLlenadoFormulario')
            ->add('fechaQueSeRecibe')
            ->add('criteriosInterconsultate')
            ->add('datosPositivosInterrogatorio')
            ->add('informacionRelevantePaciente')
            ->add('impresionDiagnostica')
            ->add('tratamiento')
            ->add('conductaASeguir')
            ->add('dejarControlPaciente')
            ->add('fechaLlenadoProximaCita')
            ->add('detalleValoracionPertinencia')
            ->add('valoracionNecesaria')
            ->add('valoracionOportuna')
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
            ->add('fechaLlenadoFormulario')
            ->add('fechaQueSeRecibe')
            ->add('criteriosInterconsultate')
            ->add('datosPositivosInterrogatorio')
            ->add('informacionRelevantePaciente')
            ->add('impresionDiagnostica')
            ->add('tratamiento')
            ->add('conductaASeguir')
            ->add('dejarControlPaciente')
            ->add('fechaLlenadoProximaCita')
            ->add('detalleValoracionPertinencia')
            ->add('valoracionNecesaria')
            ->add('valoracionOportuna')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('fechaLlenadoFormulario')
            ->add('fechaQueSeRecibe')
            ->add('criteriosInterconsultate')
            ->add('datosPositivosInterrogatorio')
            ->add('informacionRelevantePaciente')
            ->add('impresionDiagnostica')
            ->add('tratamiento')
            ->add('conductaASeguir')
            ->add('dejarControlPaciente')
            ->add('fechaLlenadoProximaCita')
            ->add('detalleValoracionPertinencia')
            ->add('valoracionNecesaria')
            ->add('valoracionOportuna')
        ;
    }
}
