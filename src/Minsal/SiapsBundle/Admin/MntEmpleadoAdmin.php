<?php

namespace Minsal\SiapsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\DoctrineORMAdminBundle\Datagrid\ProxyQuery;

class MntEmpleadoAdmin extends Admin {

    protected $datagridValues = array(
        '_page' => 1, // Display the first page (default = 1)
        '_sort_order' => 'ASC', // Descendant ordering (default = 'ASC')
        '_sort_by' => 'configurado' // name of the ordered field (default = the model id field, if any)
    );

    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
                ->add('nombre', null, array('label' => 'Nombre', 'required' => true))
                ->add('apellido', null, array('label' => 'Apellido', 'required' => true))
                ->add('numeroJuntaVigilancia', null, array('label' => 'JVPN', 'required' => false))
                ->add('dui', null, array('label' => 'DUI', 'required' => false))
                ->add('correoElectronico', 'email', array('label' => 'Correo Electrónico', 'required' => false))
                ->add('numeroCelular', null, array('label' => 'Teléfono Contacto', 'required' => false))
        ;
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->addIdentifier('nombreempleado', null, array('label' => 'Nombre Empleado'))
                ->add('idTipoEmpleado', null, array('label' => 'Tipo Empleado'))
                ->add('_action', 'actions', array(
                    'label' => $this->getTranslator()->trans('Action'),
                    'actions' => array(
                        'edit' => array()
                    )
        ));
    }

    public function createQuery($context = 'list') {
        $query = parent::createQuery($context);

        return new ProxyQuery(
                $query
                        ->where($query->getRootAlias() . '.idTipoEmpleado = 4')
        );
    }

    public function getTemplate($name) {
        switch ($name) {
            case 'edit':
                return 'MinsalSiapsBundle:MntEmpleadoAdmin:edit.html.twig';
                break;
            default:
                return parent::getTemplate($name);
                break;
        }
    }

    public function preUpdate($empleado) {
        //ATRIBUTOS DE LA AUDITORIA
        $empleado->setIdusuariomod($this->getConfigurationPool()->getContainer()->get('security.context')->getToken()->getUser());
        $empleado->setFechahoramod(new \DateTime());
        //CONCATENAR LOS NOMBRES PARA FORMAR EL NOMBRE EL EMPLEADO
        $empleado->setNombreempleado($empleado->getNombre() . ' ' . $empleado->getApellido());
        //PARA VERIFICAR SI TIENE NUMERO DE VIGILANCIA
        if ($empleado->getNumeroJuntaVigilancia() != '')
            $empleado->setCodigoFarmacia($empleado->getNumeroJuntaVigilancia());
    }

    public function prePersist($empleado) {
        //ATRIBUTOS DE LA AUDITORIA
        $empleado->setIdusuarioreg($this->getConfigurationPool()->getContainer()->get('security.context')->getToken()->getUser());
        $empleado->setFechahorareg(new \DateTime());
        //CONCATENAR LOS NOMBRES PARA FORMAR EL NOMBRE EL EMPLEADO
        $empleado->setNombreempleado($empleado->getNombre() . ' ' . $empleado->getApellido());
        //PARA VERIFICAR SI TIENE NUMERO DE VIGILANCIA
        if ($empleado->getNumeroJuntaVigilancia() != '') {
            $empleado->setCodigoFarmacia($empleado->getNumeroJuntaVigilancia());
        }
        //LE ASIGNO EL TIPO DE EMPLEADO MÉDICO
        $tipoEmpleado = $this->getModelManager()
                ->getEntityManager('MinsalSiapsBundle:MntTipoEmpleado')
                ->createQuery("
                    SELECT te
                    FROM MinsalSiapsBundle:MntTipoEmpleado te
                    WHERE te.id=4")
                ->getSingleResult();
        $empleado->setIdTipoEmpleado($tipoEmpleado);
    }

}
