<?php

namespace Minsal\SeguimientoBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Doctrine\ORM\EntityRepository;
use Sonata\AdminBundle\Route\RouteCollection;
use Minsal\Metodos\Funciones;

class SecIngresoAdmin extends Admin {

    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
                ->add('idProcedenciaIngreso', 'entity', array('label' => 'Procedencia de ingreso',
                    'class' => 'MinsalSeguimientoBundle:SecProcedenciaIngreso',
                    'empty_value' => 'Seleccione la procedencia del ingreso',
                    'query_builder' => function(EntityRepository $repositorio) {
                        return $repositorio
                                ->createQueryBuilder('spi')
                                ->where('spi.habilitado = true');
                    }))
                ->add('idCircunstanciaIngreso', 'entity', array('label' => 'Circunstancia de ingreso',
                    'class' => 'MinsalSeguimientoBundle:SecCircunstanciaIngreso',
                    'empty_value' => 'Seleccione la circunstancia del ingreso',
                    'query_builder' => function(EntityRepository $repositorio) {
                        return $repositorio
                                ->createQueryBuilder('sci')
                                ->where('sci.habilitado = true');
                    }))
                ->add('fecha', 'date', array('required' => true, 
                    'label' => 'Fecha del Ingreso',
                    'widget' => 'single_text', 'format' => 'dd-MM-yyyy',
                    'attr'=>(array('value'=>date("d-m-Y")))))
                ->add('hora', 'time', array('required' => true, 'label' => 'Hora del Ingreso'))
                ->add('embarazada', null, array('label' => 'Embarazada','required' => false,))
                ->add('semanasAmenorrea', 'number', array('required' => false, 'label' => 'Semanas de amenorrea'))
                ->add('fechaProbableParto', 'date', array('required' => false,
                    'label' => 'Fecha Probable de Parto',
                    'widget' => 'single_text', 'format' => 'dd-MM-yyyy'))
                ->add('diagnostico', 'textarea', array('required' => true, 'label' => 'Diagnóstico de Ingreso'))
                //->add('idCie10', null, array('label' => 'Código CIE-10'))
                ->add('idTipoAccidente', 'entity', array('label' => 'Tipo de Accidente',
                    'class' => 'MinsalSeguimientoBundle:SecTipoAccidente','required' => false,
                    'empty_value' => 'Seleccione si existierá',
                    'query_builder' => function(EntityRepository $repositorio) {
                        return $repositorio
                                ->createQueryBuilder('spi')
                                ->where('spi.habilitado = true');
                    }))
                ->add('idEmpleado', null, array('required' => false, 'label' => 'Nombre del médico que indico el ingreso'))
                ->add('idEstablecimientoReferencia', 'entity', array('label' => 'Nombre del Establecimiento','required' => false,
                    'class' => 'MinsalSiapsBundle:CtlEstablecimiento',
                    'empty_value' => 'Seleccione..',
                    'query_builder' => function(EntityRepository $repositorio) {
                        return $repositorio
                                ->createQueryBuilder('e')                                
                                ->where('e.idTipoEstablecimiento NOT IN (12,13)');
                    }))
                ->add('motivoReferencia', 'textarea', array('required' => false, 'label' => 'Motivo'))         
        ;
    }

    public function validate(ErrorElement $errorElement, $ingreso) {
       
        var_dump( $ingreso->getHora()->format('H:i'));exit();
    }

    public function getTemplate($name) {
        switch ($name) {
            case 'edit':
                return 'MinsalSeguimientoBundle:SecIngreso:edit.html.twig';
                break;
            default:
                return parent::getTemplate($name);
                break;
        }
    }

    public function preUpdate($ingreso) {
        
    }

    public function prePersist($ingreso) {
        
    }
    
    protected function configureRoutes(RouteCollection $collection)
    {
       
       $collection->add('create', 'create/'.'id_paciente');//POR SI SE ENVIA PARAMETROS
    }

}

?>
