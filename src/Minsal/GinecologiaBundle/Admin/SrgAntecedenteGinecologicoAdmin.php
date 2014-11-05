<?php

namespace Minsal\GinecologiaBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class SrgAntecedenteGinecologicoAdmin extends Admin
{

    protected $datagridValues = array(
        '_page' => 1, // Display the first page (default = 1)
        '_sort_order' => 'ASC', // Descendant ordering (default = 'ASC')
        '_sort_by' => 'idEstablecimiento' // name of the ordered field (default = the model id field, if any)
    );




    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('fur1')
            ->add('dismenorrea')
            ->add('ciclosMenstruales')
            ->add('duracionDelCiclo')
            ->add('sangramientos')
            ->add('duracionDelSangramiento')
            ->add('fechaUltimoPap')
            ->add('resultadoUltimoPap')
            ->add('observaciones')
            ->add('estaLactando')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('fur1')
            ->add('dismenorrea')
            ->add('ciclosMenstruales')
            ->add('duracionDelCiclo')
            ->add('sangramientos')
            ->add('duracionDelSangramiento')
            ->add('fechaUltimoPap')
            ->add('resultadoUltimoPap')
            ->add('observaciones')
            ->add('estaLactando')
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
            ->add('fur1')
            ->add('dismenorrea')
            ->add('ciclosMenstruales')
            ->add('duracionDelCiclo')
            ->add('sangramientos')
            ->add('duracionDelSangramiento')
            ->add('fechaUltimoPap')
            ->add('resultadoUltimoPap')
            ->add('observaciones')
            ->add('estaLactando')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('fur1')
            ->add('dismenorrea')
            ->add('ciclosMenstruales')
            ->add('duracionDelCiclo')
            ->add('sangramientos')
            ->add('duracionDelSangramiento')
            ->add('fechaUltimoPap')
            ->add('resultadoUltimoPap')
            ->add('observaciones')
            ->add('estaLactando')
        ;
    }
}
