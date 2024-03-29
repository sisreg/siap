<?php

namespace Minsal\GinecologiaBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class SrgAntecedenteObstetricoAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('embarazos')
            ->add('partosTermino')
            ->add('partosPrematuros')
            ->add('abortos')
            ->add('vivosActualmente')
            ->add('fechaUltiEventObtetrico')
            ->add('menarquia')
            ->add('menopausea')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('embarazos')
            ->add('partosTermino')
            ->add('partosPrematuros')
            ->add('abortos')
            ->add('vivosActualmente')
            ->add('fechaUltiEventObtetrico')
            ->add('menarquia')
            ->add('menopausea')
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

            ->add('embarazos')
            ->add('partosTermino')
            ->add('partosPrematuros')
            ->add('abortos')
            ->add('vivosActualmente')
            ->add('fechaUltiEventObtetrico')
            ->add('menarquia')
            ->add('menopausea')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('embarazos')
            ->add('partosTermino')
            ->add('partosPrematuros')
            ->add('abortos')
            ->add('vivosActualmente')
            ->add('fechaUltiEventObtetrico')
            ->add('menarquia')
            ->add('menopausea')
        ;
    }
}
