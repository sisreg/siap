<?php

namespace Minsal\SiapsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Route\RouteCollection;
Use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

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
                ->add('fechaNacimiento')
                ->add('horaNacimiento')
                ->add('numeroDocIdePaciente')
                ->add('direccion')
                ->add('telefonoCasa')
                ->add('lugarTrabajo')
                ->add('telefonoTrabajo')
                ->add('idAreaCotizacion')
                ->add('asegurado')
                ->add('numeroAfiliacion')
                ->add('nombrePadre')
                ->add('nombreMadre')
                ->add('nombreConyuge')
                ->add('nombreResponsable')
                ->add('direccionResponsable')
                ->add('telefonoResponsable')
                ->add('numeroDocIdeResponsable')
                ->add('nombreProporcionoDatos')
                ->add('numeroDocIdeProporDatos')
                ->add('observacion')
                ->add('conocidoPor')
                ->add('dispensarizacionIndividual')
                ->add('areaGeograficaDomicilio')
                ->add('idCantonDomicilio')
                ->add('idDepartamentoDomicilio')
                ->add('idDocPaciente')
                ->add('idDocProporcionoDatos')
                ->add('idDocResponsable')
                ->add('idEstadoCivil')
                ->add('idMunicipioDomicilio')
                ->add('idMunicipioNacimiento')
                ->add('idNacionalidad')
                ->add('idOcupacion')
                ->add('idPaisNacimiento')
                ->add('idParentescoResponsable')
                ->add('idSexo')
                
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

}

?>
