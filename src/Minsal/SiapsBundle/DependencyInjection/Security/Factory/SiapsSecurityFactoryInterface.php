<?php
// src/Minsal/SiapsBundle/DependencyInjection/Security/Factory/SiapsSecurityFactoryInterface.php
namespace Minsal\SiapsBundle\DependencyInjection\Security\Factory;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\DefinitionDecorator;
use Symfony\Component\Config\Definition\Builder\NodeDefinition;
use Symfony\Bundle\SecurityBundle\DependencyInjection\Security\Factory\SecurityFactoryInterface as SymfonySecFacInt;

class SiapsSecurityFactoryInterface implements SymfonySecFacInt {

    public function create(ContainerBuilder $container, $id, $config, $userProvider, $defaultEntryPoint) {
        $providerId = 'security.authentication.provider.siaps.'.$id;
        $container
            ->setDefinition($providerId, new DefinitionDecorator('siaps.security.authentication.provider'))
            ->replaceArgument(0, new Reference($userProvider))
        ;

        $listenerId = 'security.authentication.listener.siaps.'.$id;
        $listener = $container->setDefinition($listenerId, new DefinitionDecorator('siaps.security.authentication.listener'));

        return array($providerId, $listenerId, $defaultEntryPoint);
    }

    public function getPosition()
    {
        return 'pre_auth';
    }

    public function getKey()
    {
        return 'rsa';
    }

    public function addConfiguration(NodeDefinition $node)
    {
    }
}