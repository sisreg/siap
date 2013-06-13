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
                ->add('primerApellido', null, array('attr' => array('class' => 'span5 limpiar'))) 
                ->add('segundoApellido', null, array('attr' => array('class' => 'span5 limpiar'))) 
                ->add('apellidoCasada', null, array('attr' => array('class' => 'span5 limpiar'))) 
                ->add('primerNombre', null, array('attr' => array('class' => 'span5 limpiar'))) 
                ->add('segundoNombre', null, array('attr' => array('class' => 'span5 limpiar'))) 
                ->add('tercerNombre', null, array('attr' => array('class' => 'span5 limpiar'))) 
                ->add('fechaNacimiento','date',array(
                 'years' => range(date('Y') - 110, date('Y') + 5),
                 'empty_value' => array('year' => 'Año', 'month' => 'Mes', 'day' => 'Día')))
                ->add('horaNacimiento','time',array('empty_value'=>array('hour'=>'Hora','minute'=>'Minutos'),'required' => false))
                ->add('numeroDocIdePaciente',null,array('label'=>$this->getTranslator()->trans('numeroDocIdePaciente')))
                ->add('direccion', null, array('required'=>true,'attr' => array('class' => 'span5 mayuscula'))) 
                ->add('telefonoCasa',null, array('label'=>$this->getTranslator()->trans('telefonoCasa'), 'attr' => array('class' => 'span5 telefono')))
                ->add('lugarTrabajo', null, array('attr' => array('class' => 'span5 mayuscula'))) 
                ->add('telefonoTrabajo',null, array('label'=>$this->getTranslator()->trans('telefonotrabajo'),'attr' => array('class' => 'span5 telefono')))
                ->add('idAreaCotizacion',null,array('empty_value' => 'Seleccione...',
                    'label'=>$this->getTranslator()->trans('idAreaCotizacion')))
                ->add('asegurado')
                ->add('cotizante') 
                ->add('numeroAfiliacion', null)
                ->add('nombrePadre', null, array('attr' => array('class' => 'span5 limpiar'))) 
                ->add('nombreMadre',null,array('required'=>true,'attr' => array('class' => 'span5 limpiar')))
                ->add('nombreConyuge', null, array('attr' => array('class' => 'span5 limpiar'))) 
                ->add('nombreResponsable',null,array('required'=>true,'attr' => array('class' => 'span5 limpiar')))
                ->add('direccionResponsable', null, array('attr' => array('class' => 'span5 mayuscula'))) 
                ->add('telefonoResponsable',null, array('label'=>$this->getTranslator()->trans('telefonoResponsable'), 'attr' => array('class' => 'span5 telefono')))
                ->add('numeroDocIdeResponsable',null, array('label'=>$this->getTranslator()->trans('numeroDocIdeResponsable')))
                ->add('nombreProporcionoDatos',null, array('required'=>true,'label'=>$this->getTranslator()->trans('nombreProporcionoDatos'),'attr' => array('class' => 'span5 limpiar')))
                ->add('numeroDocIdeProporDatos',null, array('label'=>$this->getTranslator()->trans('numeroDocIdeProporDatos')))
                ->add('observacion', null, array('attr' => array('class' => 'span5 mayuscula'))) 
                ->add('conocidoPor', null, array('attr' => array('class' => 'span5 limpiar'))) 
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
                    'label'=>$this->getTranslator()->trans('idDepartamentoNacimiento')))                
                ->add('idMunicipioNacimiento',null, array('empty_value' => 'Seleccione...',
                    'label'=>$this->getTranslator()->trans('idMunicipioNacimiento')))
                ->add('idNacionalidad',null, array('empty_value' => 'Seleccione...',
                    'label'=>$this->getTranslator()->trans('idNacionalidad')))
                ->add('idOcupacion',null, array('empty_value' => 'Seleccione...',
                    'required'=>true,'label'=>$this->getTranslator()->trans('idOcupacion')))
                ->add('idPaisNacimiento',null, array('empty_value' => 'Seleccione...',
                    'required'=>true,'label'=>$this->getTranslator()->trans('idPaisNacimiento')))
                ->add('idParentescoResponsable',null, array('empty_value' => 'Seleccione...',
                    'required'=>true,'label'=>$this->getTranslator()->trans('idParentescoResponsable')))
                ->add('idParentescoProporDatos',null, array('empty_value' => 'Seleccione...',
                    'required'=>true,'label'=>$this->getTranslator()->trans('idParentescoProporDatos')))
                ->add('idSexo',null,array('empty_value' => 'Seleccione...',
                    'label'=>'Sexo'))
                    ->add('expedientes', 'sonata_type_collection', array(
                        'label' => 'Expedientes Clínicos',
                        'required' => true), array(
                        'edit' => 'inline',
                        'inline' => 'table'
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
    
    public function preUpdate($paciente) {
        foreach( $paciente->getExpedientes() as $expediente ){
            $expediente->setIdPaciente($paciente);
        }
    }
        
    public function validate(ErrorElement $errorElement, $object) {
       //Verificando que haya ingresado número de expediente
       if (count($object->getExpedientes()) == 0){
            $errorElement->with('expedientes')
                    ->addViolation('Debe agregar un número de expediente')
                    ->end();
        }
        elseif(count($object->getExpedientes()) > 1){
            $errorElement->with('expedientes')
                    ->addViolation('No puede agregar más de un número de expediente')
                    ->end();
        }
        else{
             $establecimiento = $this->getModelManager()
                    ->findOneBy('MinsalSiapsBundle:CtlEstablecimiento', array('configurado' => true));
             $formatoExpediente=$establecimiento->getTipoExpediente();
             if($formatoExpediente=='G'){
             foreach ($object->getExpedientes() as $expediente) {
                 if(preg_match('/[\d]{1,}-[\d]{2}/', $expediente->getNumero()) == 0){
                     $errorElement->with('numero')
                      ->addViolation('El formato del número de expediente es incorrecto')
                      ->end();
                 }
             }
             }
            else{
                 foreach ($object->getExpedientes() as $expediente) {
                    if(preg_match('/[0-9]{1,}/', $expediente->getNumero()) == 0){
                        $errorElement->with('numeroDocIdePaciente')
                         ->addViolation('El formato del número de DUI es incorrecto')
                         ->end();
                    }
             }
             }
        }
        //Verificando los formatos de acuerdo el documento seleccionado
        if ($object->getIdDocPaciente() == 'DUI'){
              $numero_doc = $object->getNumeroDocIdePaciente();
              if (preg_match('/[0-9]{8}-[0-9]{1}/', $numero_doc) == 0) {
                $errorElement->with('numeroDocIdePaciente')
                      ->addViolation('El formato del número de DUI es incorrecto')
                      ->end();
              }
        }
        elseif($object->getIdDocPaciente() == 'NIT'){
            $numero_doc = $object->getNumeroDocIdePaciente();
              if (preg_match('/[0-9]{4}-[0-9]{6}-[0-9]{3}-[0-9]{1}/', $numero_doc) == 0) {
                $errorElement->with('numeroDocIdePaciente')
                      ->addViolation('El formato del número de NIT es incorrecto')
                      ->end();
              }
        }
        else{
            if($object->getIdDocPaciente() == 'Carné ISSS'){
                $numero_doc = $object->getNumeroDocIdePaciente();
                if (preg_match('/[0-9]{9}/', $numero_doc) == 0) {
                    $errorElement->with('numeroDocIdePaciente')
                            ->addViolation('El formato del número de documento es incorrecto')
                            ->end();
                }
            }
        }
      //Validando número de documento para el responsable  
        if ($object->getIdDocResponsable() == 'DUI'){
              $numero_doc = $object->getNumeroDocIdeResponsable();
              if (preg_match('/[0-9]{8}-[1-9]{1}/', $numero_doc) == 0) {
                $errorElement->with('numeroDocIdeResponsable')
                      ->addViolation('El formato del número de DUI es incorrecto')
                      ->end();
              }
        }
        elseif($object->getIdDocResponsable() == 'NIT'){
            $numero_doc = $object->getNumeroDocIdeResponsable();
              if (preg_match('/[0-9]{4}-[0-9]{6}-[0-9]{3}-[0-9]{1}/', $numero_doc) == 0) {
                $errorElement->with('numeroDocIdeResponsable')
                      ->addViolation('El formato del número de NIT es incorrecto')
                      ->end();
              }
        }
        else{
            if($object->getIdDocResponsable() == 'Carné ISSS'){
                $numero_doc = $object->getNumeroDocIdeResponsable();
                if (preg_match('/[0-9]{9}/', $numero_doc) == 0) {
                    $errorElement->with('numeroDocIdeResponsable')
                            ->addViolation('El formato del número de documento es incorrecto')
                            ->end();
                }
            }
        }
        //Validando número de documento para la persona que proporcionó datos
        if ($object->getIdDocProporcionoDatos() == 'DUI'){
              $numero_doc = $object->getNumeroDocIdeProporDatos();
              if (preg_match('/[0-9]{8}-[1-9]{1}/', $numero_doc) == 0) {
                $errorElement->with('numeroDocIdeProporDatos')
                      ->addViolation('El formato del número de DUI es incorrecto')
                      ->end();
              }
        }
        elseif($object->getIdDocProporcionoDatos() == 'NIT'){
            $numero_doc = $object->getNumeroDocIdeProporDatos();
              if (preg_match('/[0-9]{4}-[0-9]{6}-[0-9]{3}-[0-9]{1}/', $numero_doc) == 0) {
                $errorElement->with('numeroDocIdeProporDatos')
                      ->addViolation('El formato del número de NIT es incorrecto')
                      ->end();
              }
        }
        else{
            if($object->getIdDocProporcionoDatos() == 'Carné ISSS'){
                $numero_doc = $object->getNumeroDocIdeProporDatos();
                if (preg_match('/[0-9]{9}/', $numero_doc) == 0) {
                    $errorElement->with('numeroDocIdeProporDatos')
                            ->addViolation('El formato del número de documento es incorrecto')
                            ->end();
                }
            }
        }
        
    }
}

?>
