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

class UserAdmin extends BaseUserAdmin
{
   public function configureFormFields(FormMapper $formMapper)
    {
       //parent::configureFormFields($formMapper);
         $formMapper
            ->with('Datos Usuario')
                ->add('username')
                ->add('email')
                ->add('plainPassword', 'text', array('required' => false))
                ->add('idEstablecimiento','entity',array(
                    'label'=>'Establecimiento',
                    'class' => 'MinsalSiapsBundle:CtlEstablecimiento',
                    'query_builder' => function($repositorio) {
                        return $repositorio->obtenerEstabConfigurado();
                    }))
             ->end()
            ->with('Groups')
                ->add('groups', 'sonata_type_model', array('required' => false, 'expanded' => true, 'multiple' => true))
            ->end()
            ->with('Datos Persona')
                ->add('firstname', null, array('required' => false))
                ->add('lastname', null, array('required' => false))
                ->add('phone', null, array('required' => false))
            ->end()
            ;
    }
     

    
}