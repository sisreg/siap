<?php

namespace Minsal\SiapsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Validator\ErrorElement;

class MntPacienteAdmin extends Admin {

    protected $datagridValues = array(
        '_page' => 1, // Display the first page (default = 1)
        '_sort_order' => 'ASC', // Descendant ordering (default = 'ASC')
        '_sort_by' => 'configurado' // name of the ordered field (default = the model id field, if any)
    );

    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
                ->add('primerApellido')
                ->add('segundoApellido')     
                ->add('apellidoCasada')
                ->add('primerNombre')
                ->add('segundoNombre')
                ->add('tercerNombre')
                ->add('fechaNacimiento','date',array(
                 'years' => range(date('Y') - 110, date('Y') + 5),
                 'empty_value' => array('year' => 'Año', 'month' => 'Mes', 'day' => 'Día')))
                ->add('horaNacimiento','time',array('empty_value'=>array('hour'=>'Hora','minute'=>'Minutos'),'required' => false))
                ->add('numeroDocIdePaciente',null,array('label'=>$this->getTranslator()->trans('numeroDocIdePaciente')))
                ->add('direccion')
                ->add('telefonoCasa',null, array('label'=>$this->getTranslator()->trans('telefonoCasa')))
                ->add('lugarTrabajo')
                ->add('telefonoTrabajo',null, array('label'=>$this->getTranslator()->trans('telefonotrabajo')))
                ->add('idAreaCotizacion',null,array('empty_value' => 'Seleccione...',
                    'required'=>true,'label'=>$this->getTranslator()->trans('idAreaCotizacion')))
                ->add('asegurado')
                ->add('cotizante')
                ->add('numeroAfiliacion')
                ->add('nombrePadre')
                ->add('nombreMadre',null,array('required'=>true))
                ->add('nombreConyuge')
                ->add('nombreResponsable',null,array('required'=>true))
                ->add('direccionResponsable',null,array('required'=>true))
                ->add('telefonoResponsable',null, array('label'=>$this->getTranslator()->trans('telefonoResponsable')))
                ->add('numeroDocIdeResponsable',null, array('label'=>$this->getTranslator()->trans('numeroDocIdeResponsable')))
                ->add('nombreProporcionoDatos',null, array('required'=>true,'label'=>$this->getTranslator()->trans('nombreProporcionoDatos')))
                ->add('numeroDocIdeProporDatos',null, array('label'=>$this->getTranslator()->trans('numeroDocIdeProporDatos')))
                ->add('observacion')
                ->add('conocidoPor')
                ->add('areaGeograficaDomicilio',null,array('empty_value' => 'Seleccione...'))
                ->add('idCantonDomicilio',null, array('empty_value' => 'Seleccione...',
                    'label'=>$this->getTranslator()->trans('idCantonDomicilio')))
                ->add('idDepartamentoDomicilio',null, array('empty_value' => 'Seleccione...',
                    'required'=>true,'label'=>$this->getTranslator()->trans('idDepartamentoDomicilio')))
                ->add('idDocPaciente',null, array('empty_value' => 'Seleccione...',
                    'required'=>true,'label'=>$this->getTranslator()->trans('idDocPaciente')))
                ->add('idDocProporcionoDatos',null, array('empty_value' => 'Seleccione...',
                    'required'=>true,'label'=>$this->getTranslator()->trans('idDocProporcionoDatos')))
                ->add('idDocResponsable',null, array('empty_value' => 'Seleccione...',
                    'required'=>true,'label'=>$this->getTranslator()->trans('idDocResponsable')))
                ->add('idEstadoCivil',null, array('empty_value' => 'Seleccione...',
                    'required'=>true,'label'=>$this->getTranslator()->trans('idEstadoCivil')))
                ->add('idMunicipioDomicilio',null, array('empty_value' => 'Seleccione...',
                    'required'=>true,'label'=>$this->getTranslator()->trans('idMunicipioDomicilio')))
                ->add('idDepartamentoNacimiento',null, array('empty_value' => 'Seleccione...',
                    'required'=>true,'disabled'=>true,'label'=>$this->getTranslator()->trans('idDepartamentoNacimiento')))                
                ->add('idMunicipioNacimiento',null, array('empty_value' => 'Seleccione...',
                    'required'=>true,'label'=>$this->getTranslator()->trans('idMunicipioNacimiento')))
                ->add('idNacionalidad',null, array('empty_value' => 'Seleccione...',
                    'label'=>$this->getTranslator()->trans('idNacionalidad')))
                ->add('idOcupacion',null, array('empty_value' => 'Seleccione...',
                    'required'=>true,'label'=>$this->getTranslator()->trans('idOcupacion')))
                ->add('idPaisNacimiento',null, array('empty_value' => 'Seleccione...',
                    'required'=>true,'label'=>$this->getTranslator()->trans('idPaisNacimiento')))
                ->add('idParentescoResponsable',null, array('empty_value' => 'Seleccione...',
                    'required'=>true,'label'=>$this->getTranslator()->trans('idParentescoResponsable')))
                ->add('idSexo',null,array('empty_value' => 'Seleccione...',
                    'label'=>'Sexo'))
                ->add('expedientes', 'sonata_type_collection', array(
                    'label' => 'Expedientes Clínicos',
                    'required' => true), array(
                    'edit' => 'inline',
                    'inline' => 'table',
                    'sortable' => 'position'
                ))
                
        ;
    }
    
    public function getTemplate($name) {
        switch ($name) {
            case 'list':
                return 'MinsalSiapsBundle:MntPacienteAdmin:list.html.twig';
                break;
            case 'edit':
                return 'MinsalSiapsBundle:MntPacienteAdmin:edit.html.twig';
                break;
            default:
                return parent::getTemplate($name);
                break;
        }
    }
    
    
    public function prePersist($paciente) {
        
        foreach( $paciente->getExpedientes() as $expediente ){
            $expediente->setIdPaciente($paciente);
        }
    }
    
    
}

?>
