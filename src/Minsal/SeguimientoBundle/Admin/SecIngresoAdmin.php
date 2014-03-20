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
                    'attr' => (array('value' => date("d-m-Y")))))
                ->add('hora', 'time', array('required' => true, 'label' => 'Hora del Ingreso'))
                ->add('idAtenAreaModEstab', 'entity', array('label' => 'Especialidad',
                    'class' => 'MinsalSiapsBundle:MntAtenAreaModEstab', 'read_only' => 'true',
                    'empty_value' => 'Seleccione ...'))
                ->add('idAmbienteIngreso', 'entity', array('label' => 'Servicio de Ingreso',
                    'class' => 'MinsalSiapsBundle:MntAtenAreaModEstab', 'read_only' => 'true',
                    'empty_value' => 'Seleccione ...'))
                ->add('embarazada', null, array('label' => 'Embarazada', 'required' => false,))
                ->add('semanasAmenorrea', 'number', array('required' => false, 'label' => 'Semanas de amenorrea'))
                ->add('fechaProbableParto', 'date', array('required' => false,
                    'label' => 'Fecha Probable de Parto',
                    'widget' => 'single_text', 'format' => 'dd-MM-yyyy'))
                ->add('diagnostico', 'textarea', array('required' => true, 'label' => 'Diagnóstico de Ingreso'))
                //->add('idCie10', null, array('label' => 'Código CIE-10'))
                ->add('idTipoAccidente', 'entity', array('label' => 'Tipo de Accidente',
                    'class' => 'MinsalSeguimientoBundle:SecTipoAccidente', 'required' => false,
                    'empty_value' => 'Seleccione si existierá',
                    'query_builder' => function(EntityRepository $repositorio) {
                return $repositorio
                        ->createQueryBuilder('spi')
                        ->where('spi.habilitado = true');
            }))
                ->add('idEmpleado', 'entity', array('required' => false, 'label' => 'Nombre del médico que indico el ingreso',
                    'class' => 'MinsalSiapsBundle:MntEmpleado',
                    'empty_value' => 'Seleccione',
                    'query_builder' => function(EntityRepository $repositorio) {
                return $repositorio
                        ->createQueryBuilder('me')
                        ->where('me.idTipoEmpleado = 4');
            }))
                ->add('idEstablecimientoReferencia', 'entity', array('label' => 'Nombre del Establecimiento (REFERIDO DE:', 'required' => false,
                    'class' => 'MinsalSiapsBundle:CtlEstablecimiento',
                    'empty_value' => 'Seleccione..',
                    'query_builder' => function(EntityRepository $repositorio) {
                return $repositorio
                        ->createQueryBuilder('e')
                        ->where('e.idTipoEstablecimiento NOT IN (12,13)');
            }))
                ->add('motivoReferencia', 'textarea', array('required' => false, 'label' => 'Motivo de la Referencia'))
        ;
    }

    public function validate(ErrorElement $errorElement, $ingreso) {
        //     var_dump($ingreso->getHora()->format('H'));
        $fechaActual = new \DateTime();
        list($hora, $minutos) = explode(":", $ingreso->getHora()->format('H:i'));
        if ($ingreso->getfecha()->format('d-m-Y') == $fechaActual->format('d-m-Y')) {
            if ($fechaActual->format('H') < $hora)
                $errorElement->with('hora')
                        ->addViolation('La hora del ingreso no puede ser mayor que la hoara actual')
                        ->end();
            elseif ($fechaActual->format('H') == $hora) {
                if ($fechaActual->format('i') < ($minutos-1))
                    $errorElement->with('hora')
                            ->addViolation('La hora del ingreso no puede ser mayor que la hora actual')
                            ->end();
            }
        }elseif ($ingreso->getfecha()->format('d-m-Y') > $fechaActual->format('d-m-Y')) {
            $errorElement->with('fecha')
                    ->addViolation('La fecha del ingreso no puede ser mayor que la fecha actual')
                    ->end();
        }

        if (is_null($ingreso->getId())) {
            $posiblePaciente = $this->getModelManager()
                    ->getEntityManager('MinsalSeguimientoBundle:SecIngreso')
                    ->createQuery("
                    SELECT p.id
                    FROM MinsalSeguimientoBundle:SecIngreso i
                    JOIN i.idExpediente e
                    JOIN e.idPaciente p
                    WHERE p.id= :id AND i.fecha = :actual")
                    ->setParameter('id', $ingreso->getIdExpediente()->getIdPaciente()->getId())
                    ->setParameter('actual', $fechaActual->format('d-m-Y'))
                    ->getResult();
            foreach ($posiblePaciente as $paciente) {
                $errorElement->with('diagnostico')
                        ->addViolation('No se puede ingresar a este paciente porque ha sido ingresado anteriormente')
                        ->end();
            }
        }
    }

    public function getTemplate($name) {
        switch ($name) {
            case 'edit':
                return 'MinsalSeguimientoBundle:SecIngreso:edit.html.twig';
                break;
            case 'list':
                return 'MinsalSeguimientoBundle:SecIngreso:list.html.twig';
                break;
            case 'resumen':
                return 'MinsalSeguimientoBundle:SecIngreso:resumen.html.twig';
                break;
            default:
                return parent::getTemplate($name);
                break;
        }
    }

    public function preUpdate($ingreso) {
        $ingreso->setIdUsuarioModifica($this->getConfigurationPool()->getContainer()->get('security.context')->getToken()->getUser());
        $ingreso->setFechaModificacion(new \DateTime());
    }

    public function prePersist($ingreso) {
        $estado = $this->getModelManager()
                ->find('MinsalSeguimientoBundle:SecEstadoPaciente', 2);
        $ingreso->setIdEstado($estado);
        $ingreso->setIdUsuarioRegistra($this->getConfigurationPool()->getContainer()->get('security.context')->getToken()->getUser());
        $ingreso->setFechaRegistro(new \DateTime());
    }

    protected function configureRoutes(RouteCollection $collection) {
        $collection->add('create', 'create/id_paciente'); //POR SI SE ENVIA PARAMETROS
        $collection->add('resumen', 'resumen/');
    }

}

?>
