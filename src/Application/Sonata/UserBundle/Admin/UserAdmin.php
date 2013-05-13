<?php

/*
 * This file is part of the Sonata package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Application\Sonata\UserBundle\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\UserBundle\Admin\Model\UserAdmin as BaseUserAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;

class UserAdmin extends BaseUserAdmin
{
   public function configureFormFields(FormMapper $formMapper)
    {
        //parent::configureFormFields($formMapper);
        $formMapper
                ->with('Datos Usuario')
                ->add('firstname', null, array('required' => true))
                ->add('lastname', null, array('required' => true))
                ->add('username')
                ->add('email')
                ->add('plainPassword', 'text', array('required' => false))
                ->add('idEstablecimiento','entity',array(
                    'read_only'=>true,
                    'label'=>'Establecimiento',
                    'class' => 'MinsalSiapsBundle:CtlEstablecimiento',
                    'query_builder' => function($repositorio) {
                        return $repositorio->obtenerEstabConfigurado();
                    }))
                ->end()
                ->with('Groups')
                ->add('groups', 'sonata_type_model', array('required' => true, 'expanded' => false, 'multiple' => true))
                ->end()
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
                ->addIdentifier('username')
                ->add('email')
                ->add('groups')
                ->add('enabled', null, array('editable' => true))
                ->add('locked', null, array('editable' => true))
                ->add('createdAt')
            ->add('idEstablecimiento',null,array('label'=>'Establecimiento de salud'))
        ;
    }

    
     

    
}