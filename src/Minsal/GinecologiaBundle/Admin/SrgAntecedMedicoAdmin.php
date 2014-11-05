<?php

namespace Minsal\GinecologiaBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class SrgAntecedMedicoAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('diabetes')
            ->add('asma')
            ->add('hipertencion')
            ->add('tratamientosPrevios')
            ->add('trataPreviosDescripcion')
            ->add('transtornosMentales')
            ->add('transtorMentaDescripcion')
            ->add('transtornosComportamientos')
            ->add('transtorComporDescripcion')
            ->add('cancer')
            ->add('cancerDescripcion')
            ->add('otros')
            ->add('otrosDescripcion')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('diabetes')
            ->add('asma')
            ->add('hipertencion')
            ->add('tratamientosPrevios')
            ->add('trataPreviosDescripcion')
            ->add('transtornosMentales')
            ->add('transtorMentaDescripcion')
            ->add('transtornosComportamientos')
            ->add('transtorComporDescripcion')
            ->add('cancer')
            ->add('cancerDescripcion')
            ->add('otros')
            ->add('otrosDescripcion')
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
       
            ->add('diabetes')
            ->add('asma')
            ->add('hipertencion')
            ->add('tratamientosPrevios')
            ->add('trataPreviosDescripcion')
            ->add('transtornosMentales')
            ->add('transtorMentaDescripcion')
            ->add('transtornosComportamientos')
            ->add('transtorComporDescripcion')
            ->add('cancer')
            ->add('cancerDescripcion')
            ->add('otros')
            ->add('otrosDescripcion')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('diabetes')
            ->add('asma')
            ->add('hipertencion')
            ->add('tratamientosPrevios')
            ->add('trataPreviosDescripcion')
            ->add('transtornosMentales')
            ->add('transtorMentaDescripcion')
            ->add('transtornosComportamientos')
            ->add('transtorComporDescripcion')
            ->add('cancer')
            ->add('cancerDescripcion')
            ->add('otros')
            ->add('otrosDescripcion')
        ;
    }
}
