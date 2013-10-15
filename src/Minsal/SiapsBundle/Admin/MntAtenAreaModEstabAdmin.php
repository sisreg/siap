<?php

namespace Minsal\SiapsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Route\RouteCollection;

class MntAtenAreaModEstabAdmin extends Admin {

    public function getTemplate($name) {
        switch ($name) {
            case 'list':
                return 'MinsalSiapsBundle:CRUD:AtenAreaModEstab_list.html.twig';
                break;
            default:
                return parent::getTemplate($name);
                break;
        }
    }

    public function getBatchActions() {
        $actions = parent::getBatchActions();
        $actions['delete'] = null;
    }

   protected function configureRoutes(RouteCollection $collection) {
        $collection->remove('create');
        $collection->remove('delete');
    }
    
}

?>