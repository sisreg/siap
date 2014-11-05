<?php

namespace Minsal\GinecologiaBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class SrgDatoClinicoAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('anticonceptivos')
            ->add('leucorrea')
            ->add('sangrado')
            ->add('cervicitis')
            ->add('crio')
            ->add('leep')
            ->add('cono')
            ->add('histerectomia')
            ->add('radiacion')
            ->add('hormonal')
            ->add('fecha')
            ->add('biopsia')
            ->add('fechaBiopsia')
            ->add('resultadoBiopsia')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('anticonceptivos')
            ->add('leucorrea')
            ->add('sangrado')
            ->add('cervicitis')
            ->add('crio')
            ->add('leep')
            ->add('cono')
            ->add('histerectomia')
            ->add('radiacion')
            ->add('hormonal')
            ->add('fecha')
            ->add('biopsia')
            ->add('fechaBiopsia')
            ->add('resultadoBiopsia')
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

            ->add('anticonceptivos')
            ->add('idCtlAnticonceptivo')
            ->add('leucorrea')
            ->add('sangrado')
            ->add('cervicitis')
            ->add('crio')
            ->add('leep')
            ->add('cono')
            ->add('histerectomia')
            ->add('radiacion')
            ->add('hormonal')
            ->add('fecha')
            ->add('biopsia')
            ->add('fechaBiopsia')
            ->add('resultadoBiopsia')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('anticonceptivos')
            ->add('leucorrea')
            ->add('sangrado')
            ->add('cervicitis')
            ->add('crio')
            ->add('leep')
            ->add('cono')
            ->add('histerectomia')
            ->add('radiacion')
            ->add('hormonal')
            ->add('fecha')
            ->add('biopsia')
            ->add('fechaBiopsia')
            ->add('resultadoBiopsia')
        ;
    }
}
