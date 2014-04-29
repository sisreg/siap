<?php

namespace Minsal\SiapsBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\DoctrineORMAdminBundle\Datagrid\ProxyQuery;
use Doctrine\ORM\EntityRepository;
use Minsal\SiapsBundle\Entity\User;

class MntEmpleadoAdmin extends Admin {

    protected $datagridValues = array(
        '_page' => 1, // Display the first page (default = 1)
        '_sort_order' => 'ASC', // Descendant ordering (default = 'ASC')
        '_sort_by' => 'configurado' // name of the ordered field (default = the model id field, if any)
    );

    protected function configureFormFields(FormMapper $formMapper) {
        $dql = 'SELECT a.id, b.nombre AS nombre2
                                              FROM MinsalSiapsBundle:MntAtenAreaModEstab a
                                              JOIN a.idEstablecimiento b
                                              ORDER BY a.id ASC';
        $especialidades = $this->getModelManager()
                ->getEntityManager('MinsalSiapsBundle:MntAtenAreaModEstab')
                ->createQuery($dql)
                ->getResult();
        $opciones = array();
        foreach ($especialidades as $aux) {
            $opciones[$aux['id']] = $aux['nombre2'];
        }
        $formMapper
                ->add('nombre', null, array('label' => 'Nombre', 'required' => true))
                ->add('apellido', null, array('label' => 'Apellido', 'required' => true))
                ->add('numeroJuntaVigilancia', null, array('label' => 'JVPN', 'required' => false))
                ->add('dui', null, array('label' => 'DUI', 'required' => false))
                ->add('correoElectronico', 'email', array('label' => 'Correo Electrónico', 'required' => false))
                ->add('numeroCelular', null, array('label' => 'Teléfono Contacto', 'required' => false))
                ->add('especialidadesEstab', 'entity', array(
                    'label' => 'Especialidades con las que trabaja el médico',
                    'required' => true,
                    'multiple' => true,
                    'expanded' => true,
                    'class' => 'MinsalSiapsBundle:MntAtenAreaModEstab',
                    'property' => 'nombreConsulta',
                    'query_builder' => function(EntityRepository $repositorio) {
                return $repositorio
                        ->createQueryBuilder('f')
                        ->join('f.idAtencion', 'a')
                        ->join('f.idAreaModEstab', 'ame')
                        ->where('ame.idAreaAtencion=1')
                        ->andWhere('f.nombreAmbiente IS NULL')
                ;
            }
                ))
                ->add('especialidadesMedico', 'entity', array(
                    'label' => 'Estudios con los que cuenta en médico',
                    'required' => false,
                    'multiple' => true,
                    'expanded' => true,
                    'class' => 'MinsalSiapsBundle:CtlAtencion',
                    'property' => 'nombre',
                    'query_builder' => function(EntityRepository $repositorio) {
                return $repositorio
                        ->createQueryBuilder('a')
                        ->join('a.idTipoAtencion', 'ta')
                        ->where('ta.id=1');
            }
                ))
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
        $empleado->setIdEstablecimiento($establecimiento = $this->getModelManager()
                ->findOneBy('MinsalSiapsBundle:CtlEstablecimiento', array('configurado' => true)));
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

    /*
     * DESCRIPCIÓN: Función que se realiza despues de insertar el empleado.
     * ANALISTA PROGRAMADOR: Karen Peñate
     */

    public function postPersist($empleado) {
        /* Setear los valores generales del usuario */
        $contrasenia = "123";
        $firstname = $empleado->getNombre();
        $lastname = $empleado->getApellido();
        if (strpos($lastname, " "))
            list($primerA, $segundoApellido) = explode(" ", $lastname);
        else
            $primerA = $lastname;
        $bandera = false;
        $i = 0;
        $primero = '';
        $username = '';
        while (!$bandera) {
            $primero.=$firstname[$i];
            $username = strtolower($primero . $primerA);
            $valor = $this->getModelManager()
                    ->findOneBy('MinsalSiapsBundle:User', array('username' => $username));
            if (count($valor) == 0)
                $bandera = true;
            else
                $i++;
        }
        /* Setear los valores especificos de los usuarios */
        /*
         * Se utiliza el User Manager porque el encriptado es especial y con este crearemos
         * el nuevo usuario
         * */
        $userManager = $this->getConfigurationPool()->getContainer()->get('fos_user.user_manager');
        $usuario = $userManager->createUser();
        $usuario->setUsername($username);
        $usuario->setPlainPassword($contrasenia);
        $usuario->setFirstName($firstname);
        $usuario->setLastname($lastname);
        $usuario->setEnabled(true);
        $usuario->setModulo('SEC');
        $usuario->setIdEmpleado($empleado);
        $establecimiento = $this->getModelManager()
                ->findOneBy('MinsalSiapsBundle:CtlEstablecimiento', array('configurado' => true));
        $usuario->setIdEstablecimiento($establecimiento);
        if ($establecimiento->getIdTipoEstablecimiento()->getId() != 1) {
            $grupo = $this->getModelManager()
                    ->getEntityManager('ApplicationSonataUserBundle:Group')
                    ->createQuery("
                    SELECT g
                    FROM ApplicationSonataUserBundle:Group g
                    WHERE g.name = 'Modulo1Hos'")
                    ->getSingleResult();
        } else {
            $grupo = $this->getModelManager()
                    ->getEntityManager('ApplicationSonataUserBundle:Group')
                    ->createQuery("
                    SELECT g
                    FROM ApplicationSonataUserBundle:Group g
                    WHERE g.name = 'Modulo1Us'")
                    ->getSingleResult();
        }
        $usuario->addGroup($grupo);
        $userManager->updateUser($usuario);
    }

    public function validate(ErrorElement $errorElement, $object) {

        if (count($object->getEspecialidadesEstab()) == 0) {
            $errorElement
                    ->with('especialidadesEstab')
                    ->addViolation('Debe seleccionar al menos una especialidad con la que trabaja el médico')
                    ->end();
        }
    }

}
