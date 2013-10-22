<?php

namespace Minsal\SiapsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Doctrine\ORM\EntityRepository;

class MntAmbienteAreaEstablecimientoAdmin extends Admin {

    protected $datagridValues = array(
        '_page' => 1, // Display the first page (default = 1)
        '_sort_order' => 'ASC', // Descendant ordering (default = 'ASC')
        '_sort_by' => 'nombre' // name of the ordered field (default = the model id field, if any)
    );

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
                ->add('nombre', null, array('label' => 'Ambiente'))
                ->add('idAtenAreaModEstab.idAreaModEstab', null, array('label' => 'Área Atención'), null, array('required' => false,
                    'query_builder' => function(EntityRepository $er) {
                        $qb = $er->createQueryBuilder('o');
                        $qb->select('o')
                        ->Join('o.idAreaAtencion', 'a')
                        ->where('a.id = 3')
                        ;

                        return $qb;
                    }))
        ;
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->addIdentifier('nombre', null, array('label' => 'Nombre del Ambiente'))
                ->add('idAtenAreaModEstab', 'text', array('label' => 'Especialidad'))
                ->add('idAtenAreaModEstab.idAreaModEstab', 'text', array('label' => 'Área de atención'))
                ->add('_action', 'actions', array(
                    'label' => $this->getTranslator()->trans('Action'),
                    'actions' => array(
                        'edit' => array()
                    )
                ))
        ;
    }

    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
                ->add('idAtenAreaModEstab', null, array('label' => 'Especialidad', 'empty_value' => 'Seleccione...'))
                ->add('nombre')

        ;
    }

    public function validate(ErrorElement $errorElement, $object) {
        
    }

    public function getTemplate($name) {
        switch ($name) {
            case 'edit':
                return 'MinsalSiapsBundle:MntAmbienteAreaEstablecimiento:edit.html.twig';
                break;
            default:
                return parent::getTemplate($name);
                break;
        }
    }

    public function preUpdate($ambiente) {
        
    }

    public function prePersist($ambiente) {
        $establecimiento = $this->getModelManager()
                ->findOneBy('MinsalSiapsBundle:CtlEstablecimiento', array('configurado' => true));
        $ambiente->setIdEstablecimiento($establecimiento);
    }

   

}

?>
