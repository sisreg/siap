<?php

namespace Minsal\SiapsBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Minsal\SiapsBundle\DependencyInjection\Security\Factory\SiapsSecurityFactoryInterface;

class MinsalSiapsBundle extends Bundle {

	public function build(ContainerBuilder $container) {
        parent::build($container);

        $extension = $container->getExtension('security');
        $extension->addSecurityListenerFactory(new SiapsSecurityFactoryInterface());
    }
}
