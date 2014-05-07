<?php
// src/Minsal/SiapsBundle/Menu/MenuBuilder.php

namespace Minsal\SiapsBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\DependencyInjection\ContainerAware;

class MenuBuilder extends ContainerAware
{
    private $menu;
    private $cat = array('AD' => array('label' => 'Administración' , 'icon' => 'icon-cog'),
                         'IP' => array('label' => 'Identificación Paciente' , 'icon' => 'icon-folder-open'),
                         'RP' => array('label' => 'Reporte' , 'icon' => 'icon-file'),
                         'US' => array('label' => 'Usuario' , 'icon' => 'icon-asterisk'),
                         'CT' => array('label' => 'Cita' , 'icon' => 'icon-time'));

    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $this->menu = $factory->createItem('root');
        $this->menu->setChildrenAttribute('class','nav');

        $admin = $options['admin'];

        /*Creacion del Menu dinamico*/
        foreach ($admin as $key => $value) {
            if($key == "sonata_user")
                $key = "US-1-Gestión de Usuario";

            list($category,$level,$label) = split("-", $key);

            $this->createDropDownMenu($value['items'],$this->cat[$category]['label'], $label, $level, $this->cat[$category]['icon']);
        }

        /*Creacion del menu estatico*/
        //$this->createStaticMenu();

        return $this->menu;
    }

    private function countItemsGranted(array $items) {
        $array = array();

        foreach ($items as $key => $object) {
            if($object->hasroute('list') && $object->isGranted('LIST')) {
                if($object->getLabel() == "groups") {
                    $array[] = array('label' => "Grupos", 'url' => $object->generateUrl('list'));
                } else {
                    $array[] = array('label' => $object->getLabel(), 'url' => $object->generateUrl('list'));
                }
            }
        }

        return $array;
    }

    private function createDropDownMenu($object, $catLabel, $label, $level, $icon) {
        $contMenu = $this->countItemsGranted($object);

        if(count($contMenu) != 0) {
            if(!$this->menu[$catLabel]) {
                $this->menu->addChild($catLabel)->setAttribute('dropdown',true)->setAttribute('icon',$icon);
            }

            switch ($level) {
                case '1':
                    foreach ($contMenu as $keya => $itema) {
                        $this->menu[$catLabel]->addChild($itema['label'], array('uri' => $itema['url']));
                    }
                    break;
                case '2':
                    if(!$this->menu[$catLabel][$label]) {
                        $this->menu[$catLabel]->addChild($label)->setAttribute('dropdown',true);
                    }

                    foreach ($contMenu as $keyb => $itemb) {
                        $this->menu[$catLabel][$label]->addChild($itemb['label'], array('uri' => $itemb['url']));
                    }
                    break;
                
                default:
                    
                    break;
            }
        }
    }

    /*private function createStaticMenu() {
        $this->menu->addChild('Acerca de', array('uri' => '#myModal'))
            ->setAttribute('icon','icon-info-sign')
            ->setLinkAttribute('id','about_modal')
            ->setLinkAttribute('role','button')
            ->setLinkAttribute('btnCustom','true')
            ->setLinkAttribute('data-toggle','modal');
    }*/
}