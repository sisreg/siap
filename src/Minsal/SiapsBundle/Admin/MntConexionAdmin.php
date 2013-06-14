<?php

namespace Minsal\SiapsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Doctrine\ORM\EntityRepository;

class MntConexionAdmin extends Admin {

    protected $datagridValues = array(
        '_page' => 1, // Display the first page (default = 1)
        '_sort_order' => 'ASC', // Descendant ordering (default = 'ASC')
        '_sort_by' => 'configurado' // name of the ordered field (default = the model id field, if any)
    );

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
                ->add('nombre', null, array('label' => 'Nombre de la conexión'))
                ->add('idEstablecimiento', null, array('label' => $this->getTranslator()->trans('establecimiento')))
        ;
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->addIdentifier('nombre')
                ->add('idEstablecimiento.nombre', 'text', array('label' => $this->getTranslator()->trans('establecimiento')))
                ->add('host')
                ->add('usuario')
                ->add('gestorBase')
                ->add('_action', 'actions', array(
                    'actions' => array(
                        'edit' => array()
                    )
                ))
        ;
    }

    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
                ->add('nombre', 'text', array('required' => true, 'label' => 'Nombre de la conexión'))
                ->add('host', 'text', array('required' => true, 'label' => 'Nombre del Host o IP'))
                ->add('usuario', 'text', array('required' => true, 'label' => 'Usuario de la base de datos'))
                ->add('contrasenia', 'repeated', array(
                    'required' => true,
                    'type' => 'password',
                    'label' => 'Contraseña del usuario',
                    'second_options' => array('label' => 'Confirmación de contraseña'),
                    'invalid_message' => 'Las contraseñas deben coincidir, vuelva a digitarla',
                ))
                ->add('puerto', 'text', array('required' => true, 'label' => 'Puerto'))
                ->add('baseDeDatos', null, array('required' => true, 'label' => 'Nombre de la base de datos'))
                ->add('idEstablecimiento', 'entity', array('label' => $this->getTranslator()->trans('establecimiento'),
                    'class' => 'MinsalSiapsBundle:CtlEstablecimiento',
                    'query_builder' => function(EntityRepository $repositorio) {
                        return $repositorio
                                ->createQueryBuilder('e')
                                ->orderBy('e.nombre', 'ASC');
                    }))
        ;
    }

    public function validate(ErrorElement $errorElement, $object) {
         //Verificando los formatos de acuerdo el documento seleccionado
        
    }

    public function getTemplate($name) {
        switch ($name) {
            case 'edit':
                return 'MinsalSiapsBundle:CRUD:MntConexionAdmin_edit.html.twig';
                break;
            default:
                return parent::getTemplate($name);
                break;
        }
    }

}

?>
