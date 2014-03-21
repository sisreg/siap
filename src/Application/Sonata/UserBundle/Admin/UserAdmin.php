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
use Sonata\DoctrineORMAdminBundle\Datagrid\ProxyQuery;

class UserAdmin extends BaseUserAdmin {

    public function configureFormFields(FormMapper $formMapper) {
        $usuario = $this->getConfigurationPool()->getContainer()->get('security.context')->getToken()->getUser();
        if ($usuario->getId() != 1) {
            $grupos = $usuario->getGroups();
            if ($grupos[0]->getId() != 1) {
                list($nombre) = explode('Admin', $grupos[0]->getName());
                $query = $this
                        ->modelManager
                        ->getEntityManager('ApplicationSonataUserBundle:Group')
                        ->createQuery(" 
                            SELECT g
                            FROM ApplicationSonataUserBundle:Group g
                            WHERE g.name LIKE '$nombre'");
            } else {
                $establecimiento = $this->getModelManager()
                        ->findOneBy('MinsalSiapsBundle:CtlEstablecimiento', array('configurado' => true));
                if ($establecimiento->getIdTipoEstablecimiento()->getId() == 1)
                    $nombre = 'Hos';
                else
                    $nombre = 'Us';
                $query = $this
                        ->modelManager
                        ->getEntityManager('ApplicationSonataUserBundle:Group')
                        ->createQuery(" 
                            SELECT g
                            FROM ApplicationSonataUserBundle:Group g
                            WHERE g.name LIKE '%$nombre%'");
            }
        }else {
            $query = $this
                    ->modelManager
                    ->getEntityManager('ApplicationSonataUserBundle:Group')
                    ->createQuery(" 
                            SELECT g
                            FROM ApplicationSonataUserBundle:Group g");
        }
        $formMapper
                ->with('Datos Usuario')
                ->add('firstname', null, array('required' => true))
                ->add('lastname', null, array('required' => true))
                ->add('username')
                ->add('email', null, array('required' => false))
                ->add('plainPassword', 'repeated', array(
                    'required' => true,
                    'type' => 'password',
                    'label' => 'Contraseña del usuario',
                    'second_options' => array('label' => 'Confirmación de contraseña'),
                    'invalid_message' => 'Las contraseñas deben coincidir, vuelva a digitarla',
                ))
                ->add('idEstablecimiento', 'entity', array(
                    'read_only' => true,
                    'label' => 'Establecimiento',
                    'class' => 'MinsalSiapsBundle:CtlEstablecimiento',
                    'query_builder' => function($repositorio) {
                return $repositorio->obtenerEstabConfigurado();
            }))
                ->add('enabled', null, array('required' => true))
                ->add('groups', 'sonata_type_model', array('required' => true, 'expanded' => true,
                    'multiple' => true,
                    'by_reference' => true,
                    'query' => $query))
                ->end()
        ;
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->addIdentifier('username')
                ->add('groups')
                ->add('enabled', null, array('editable' => true))
                ->add('createdAt')
        ;
    }

    public function getTemplate($name) {
        switch ($name) {
            case 'edit':
                return 'MinsalSiapsBundle:UserAdmin:edit.html.twig';
                break;
            default:
                return parent::getTemplate($name);
                break;
        }
    }

    public function createQuery($context = 'list') {
        $query = parent::createQuery($context);
        $usuario = $this->getConfigurationPool()->getContainer()->get('security.context')->getToken()->getUser();
        if ($usuario->getId() != 1) {
            $grupos = $usuario->getGroups();
            if ($grupos[0]->getId() != 1) {
                list($nombre) = explode('Admin', $grupos[0]->getName());

                return new ProxyQuery(
                        $query
                                ->where("s_groups.name LIKE '$nombre%'")
                );
            } else {
                $establecimiento = $this->getModelManager()
                        ->findOneBy('MinsalSiapsBundle:CtlEstablecimiento', array('configurado' => true));
                if (!is_null($establecimiento)) {
                    if ($establecimiento->getIdTipoEstablecimiento()->getId() == 1)
                        $nombre = 'Hos';
                    else
                        $nombre = 'Us';
                    return new ProxyQuery(
                            $query
                                    ->where("s_groups.name LIKE '%$nombre%'")
                    );
                }else
                    return $query;
            }
        } else {
            return $query;
        }
    }

}
