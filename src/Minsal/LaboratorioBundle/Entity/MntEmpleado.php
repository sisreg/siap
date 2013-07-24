<?php

namespace Minsal\LaboratorioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MntEmpleado
 *
 * @ORM\Table(name="mnt_empleado")
 * @ORM\Entity
 */
class MntEmpleado
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="mnt_empleado_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido", type="string", length=100, nullable=false)
     */
    private $apellido;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_nacimiento", type="date", nullable=true)
     */
    private $fechaNacimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="nit", type="string", length=17, nullable=true)
     */
    private $nit;

    /**
     * @var string
     *
     * @ORM\Column(name="dui", type="string", length=12, nullable=true)
     */
    private $dui;

    /**
     * @var string
     *
     * @ORM\Column(name="nup", type="string", length=15, nullable=true)
     */
    private $nup;

    /**
     * @var string
     *
     * @ORM\Column(name="inpep", type="string", length=15, nullable=true)
     */
    private $inpep;

    /**
     * @var string
     *
     * @ORM\Column(name="ipsfa", type="string", length=10, nullable=true)
     */
    private $ipsfa;

    /**
     * @var string
     *
     * @ORM\Column(name="isss", type="string", length=10, nullable=true)
     */
    private $isss;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_marcacion", type="string", length=5, nullable=true)
     */
    private $numeroMarcacion;

    /**
     * @var string
     *
     * @ORM\Column(name="pasaporte", type="string", length=15, nullable=true)
     */
    private $pasaporte;

    /**
     * @var string
     *
     * @ORM\Column(name="licencia_conducir", type="string", length=20, nullable=true)
     */
    private $licenciaConducir;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_junta_vigilancia", type="string", length=20, nullable=true)
     */
    private $numeroJuntaVigilancia;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_telefono", type="string", length=10, nullable=true)
     */
    private $numeroTelefono;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_celular", type="string", length=10, nullable=true)
     */
    private $numeroCelular;

    /**
     * @var string
     *
     * @ORM\Column(name="correo_electronico", type="string", length=50, nullable=true)
     */
    private $correoElectronico;

    /**
     * @var string
     *
     * @ORM\Column(name="contacto_emergencia", type="string", length=100, nullable=true)
     */
    private $contactoEmergencia;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono_emergencia", type="string", length=10, nullable=true)
     */
    private $telefonoEmergencia;

    /**
     * @var boolean
     *
     * @ORM\Column(name="seguro_de_vida", type="boolean", nullable=false)
     */
    private $seguroDeVida;

    /**
     * @var boolean
     *
     * @ORM\Column(name="tiene_discapacidad", type="boolean", nullable=true)
     */
    private $tieneDiscapacidad;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_ingreso_publico", type="date", nullable=true)
     */
    private $fechaIngresoPublico;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_ingreso_minsal", type="date", nullable=true)
     */
    private $fechaIngresoMinsal;

    /**
     * @var integer
     *
     * @ORM\Column(name="correlativo", type="smallint", nullable=true)
     */
    private $correlativo;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_farmacia", type="string", length=6, nullable=true)
     */
    private $codigoFarmacia;

    /**
     * @var string
     *
     * @ORM\Column(name="habilitado_farmacia", type="string", nullable=true)
     */
    private $habilitadoFarmacia;

    /**
     * @var string
     *
     * @ORM\Column(name="firma_digital", type="text", nullable=true)
     */
    private $firmaDigital;

    /**
     * @var \LabCargoEmpleadoLaboratorio
     *
     * @ORM\ManyToOne(targetEntity="LabCargoEmpleadoLaboratorio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_cargo_empleado_laboratorio", referencedColumnName="id")
     * })
     */
    private $idCargoEmpleadoLaboratorio;

    /**
     * @var \CtlDepartamento
     *
     * @ORM\ManyToOne(targetEntity="CtlDepartamento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_departamento", referencedColumnName="id")
     * })
     */
    private $idDepartamento;

    /**
     * @var \CtlEstablecimiento
     *
     * @ORM\ManyToOne(targetEntity="CtlEstablecimiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_establecimiento", referencedColumnName="id")
     * })
     */
    private $idEstablecimiento;

    /**
     * @var \CtlMunicipio
     *
     * @ORM\ManyToOne(targetEntity="CtlMunicipio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_municipio", referencedColumnName="id")
     * })
     */
    private $idMunicipio;

    /**
     * @var \CtlPais
     *
     * @ORM\ManyToOne(targetEntity="CtlPais")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pais", referencedColumnName="id")
     * })
     */
    private $idPais;

    /**
     * @var \MntTipoEmpleado
     *
     * @ORM\ManyToOne(targetEntity="MntTipoEmpleado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_empleado", referencedColumnName="id")
     * })
     */
    private $idTipoEmpleado;

    /**
     * @var \LabAreaLaboratorio
     *
     * @ORM\ManyToOne(targetEntity="LabAreaLaboratorio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_area_laboratorio", referencedColumnName="id")
     * })
     */
    private $idAreaLaboratorio;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return MntEmpleado
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellido
     *
     * @param string $apellido
     * @return MntEmpleado
     */
    public function setApellido($apellido)
    {
        $this->apellido = $apellido;
    
        return $this;
    }

    /**
     * Get apellido
     *
     * @return string 
     */
    public function getApellido()
    {
        return $this->apellido;
    }

    /**
     * Set fechaNacimiento
     *
     * @param \DateTime $fechaNacimiento
     * @return MntEmpleado
     */
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;
    
        return $this;
    }

    /**
     * Get fechaNacimiento
     *
     * @return \DateTime 
     */
    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    /**
     * Set nit
     *
     * @param string $nit
     * @return MntEmpleado
     */
    public function setNit($nit)
    {
        $this->nit = $nit;
    
        return $this;
    }

    /**
     * Get nit
     *
     * @return string 
     */
    public function getNit()
    {
        return $this->nit;
    }

    /**
     * Set dui
     *
     * @param string $dui
     * @return MntEmpleado
     */
    public function setDui($dui)
    {
        $this->dui = $dui;
    
        return $this;
    }

    /**
     * Get dui
     *
     * @return string 
     */
    public function getDui()
    {
        return $this->dui;
    }

    /**
     * Set nup
     *
     * @param string $nup
     * @return MntEmpleado
     */
    public function setNup($nup)
    {
        $this->nup = $nup;
    
        return $this;
    }

    /**
     * Get nup
     *
     * @return string 
     */
    public function getNup()
    {
        return $this->nup;
    }

    /**
     * Set inpep
     *
     * @param string $inpep
     * @return MntEmpleado
     */
    public function setInpep($inpep)
    {
        $this->inpep = $inpep;
    
        return $this;
    }

    /**
     * Get inpep
     *
     * @return string 
     */
    public function getInpep()
    {
        return $this->inpep;
    }

    /**
     * Set ipsfa
     *
     * @param string $ipsfa
     * @return MntEmpleado
     */
    public function setIpsfa($ipsfa)
    {
        $this->ipsfa = $ipsfa;
    
        return $this;
    }

    /**
     * Get ipsfa
     *
     * @return string 
     */
    public function getIpsfa()
    {
        return $this->ipsfa;
    }

    /**
     * Set isss
     *
     * @param string $isss
     * @return MntEmpleado
     */
    public function setIsss($isss)
    {
        $this->isss = $isss;
    
        return $this;
    }

    /**
     * Get isss
     *
     * @return string 
     */
    public function getIsss()
    {
        return $this->isss;
    }

    /**
     * Set numeroMarcacion
     *
     * @param string $numeroMarcacion
     * @return MntEmpleado
     */
    public function setNumeroMarcacion($numeroMarcacion)
    {
        $this->numeroMarcacion = $numeroMarcacion;
    
        return $this;
    }

    /**
     * Get numeroMarcacion
     *
     * @return string 
     */
    public function getNumeroMarcacion()
    {
        return $this->numeroMarcacion;
    }

    /**
     * Set pasaporte
     *
     * @param string $pasaporte
     * @return MntEmpleado
     */
    public function setPasaporte($pasaporte)
    {
        $this->pasaporte = $pasaporte;
    
        return $this;
    }

    /**
     * Get pasaporte
     *
     * @return string 
     */
    public function getPasaporte()
    {
        return $this->pasaporte;
    }

    /**
     * Set licenciaConducir
     *
     * @param string $licenciaConducir
     * @return MntEmpleado
     */
    public function setLicenciaConducir($licenciaConducir)
    {
        $this->licenciaConducir = $licenciaConducir;
    
        return $this;
    }

    /**
     * Get licenciaConducir
     *
     * @return string 
     */
    public function getLicenciaConducir()
    {
        return $this->licenciaConducir;
    }

    /**
     * Set numeroJuntaVigilancia
     *
     * @param string $numeroJuntaVigilancia
     * @return MntEmpleado
     */
    public function setNumeroJuntaVigilancia($numeroJuntaVigilancia)
    {
        $this->numeroJuntaVigilancia = $numeroJuntaVigilancia;
    
        return $this;
    }

    /**
     * Get numeroJuntaVigilancia
     *
     * @return string 
     */
    public function getNumeroJuntaVigilancia()
    {
        return $this->numeroJuntaVigilancia;
    }

    /**
     * Set numeroTelefono
     *
     * @param string $numeroTelefono
     * @return MntEmpleado
     */
    public function setNumeroTelefono($numeroTelefono)
    {
        $this->numeroTelefono = $numeroTelefono;
    
        return $this;
    }

    /**
     * Get numeroTelefono
     *
     * @return string 
     */
    public function getNumeroTelefono()
    {
        return $this->numeroTelefono;
    }

    /**
     * Set numeroCelular
     *
     * @param string $numeroCelular
     * @return MntEmpleado
     */
    public function setNumeroCelular($numeroCelular)
    {
        $this->numeroCelular = $numeroCelular;
    
        return $this;
    }

    /**
     * Get numeroCelular
     *
     * @return string 
     */
    public function getNumeroCelular()
    {
        return $this->numeroCelular;
    }

    /**
     * Set correoElectronico
     *
     * @param string $correoElectronico
     * @return MntEmpleado
     */
    public function setCorreoElectronico($correoElectronico)
    {
        $this->correoElectronico = $correoElectronico;
    
        return $this;
    }

    /**
     * Get correoElectronico
     *
     * @return string 
     */
    public function getCorreoElectronico()
    {
        return $this->correoElectronico;
    }

    /**
     * Set contactoEmergencia
     *
     * @param string $contactoEmergencia
     * @return MntEmpleado
     */
    public function setContactoEmergencia($contactoEmergencia)
    {
        $this->contactoEmergencia = $contactoEmergencia;
    
        return $this;
    }

    /**
     * Get contactoEmergencia
     *
     * @return string 
     */
    public function getContactoEmergencia()
    {
        return $this->contactoEmergencia;
    }

    /**
     * Set telefonoEmergencia
     *
     * @param string $telefonoEmergencia
     * @return MntEmpleado
     */
    public function setTelefonoEmergencia($telefonoEmergencia)
    {
        $this->telefonoEmergencia = $telefonoEmergencia;
    
        return $this;
    }

    /**
     * Get telefonoEmergencia
     *
     * @return string 
     */
    public function getTelefonoEmergencia()
    {
        return $this->telefonoEmergencia;
    }

    /**
     * Set seguroDeVida
     *
     * @param boolean $seguroDeVida
     * @return MntEmpleado
     */
    public function setSeguroDeVida($seguroDeVida)
    {
        $this->seguroDeVida = $seguroDeVida;
    
        return $this;
    }

    /**
     * Get seguroDeVida
     *
     * @return boolean 
     */
    public function getSeguroDeVida()
    {
        return $this->seguroDeVida;
    }

    /**
     * Set tieneDiscapacidad
     *
     * @param boolean $tieneDiscapacidad
     * @return MntEmpleado
     */
    public function setTieneDiscapacidad($tieneDiscapacidad)
    {
        $this->tieneDiscapacidad = $tieneDiscapacidad;
    
        return $this;
    }

    /**
     * Get tieneDiscapacidad
     *
     * @return boolean 
     */
    public function getTieneDiscapacidad()
    {
        return $this->tieneDiscapacidad;
    }

    /**
     * Set fechaIngresoPublico
     *
     * @param \DateTime $fechaIngresoPublico
     * @return MntEmpleado
     */
    public function setFechaIngresoPublico($fechaIngresoPublico)
    {
        $this->fechaIngresoPublico = $fechaIngresoPublico;
    
        return $this;
    }

    /**
     * Get fechaIngresoPublico
     *
     * @return \DateTime 
     */
    public function getFechaIngresoPublico()
    {
        return $this->fechaIngresoPublico;
    }

    /**
     * Set fechaIngresoMinsal
     *
     * @param \DateTime $fechaIngresoMinsal
     * @return MntEmpleado
     */
    public function setFechaIngresoMinsal($fechaIngresoMinsal)
    {
        $this->fechaIngresoMinsal = $fechaIngresoMinsal;
    
        return $this;
    }

    /**
     * Get fechaIngresoMinsal
     *
     * @return \DateTime 
     */
    public function getFechaIngresoMinsal()
    {
        return $this->fechaIngresoMinsal;
    }

    /**
     * Set correlativo
     *
     * @param integer $correlativo
     * @return MntEmpleado
     */
    public function setCorrelativo($correlativo)
    {
        $this->correlativo = $correlativo;
    
        return $this;
    }

    /**
     * Get correlativo
     *
     * @return integer 
     */
    public function getCorrelativo()
    {
        return $this->correlativo;
    }

    /**
     * Set codigoFarmacia
     *
     * @param string $codigoFarmacia
     * @return MntEmpleado
     */
    public function setCodigoFarmacia($codigoFarmacia)
    {
        $this->codigoFarmacia = $codigoFarmacia;
    
        return $this;
    }

    /**
     * Get codigoFarmacia
     *
     * @return string 
     */
    public function getCodigoFarmacia()
    {
        return $this->codigoFarmacia;
    }

    /**
     * Set habilitadoFarmacia
     *
     * @param string $habilitadoFarmacia
     * @return MntEmpleado
     */
    public function setHabilitadoFarmacia($habilitadoFarmacia)
    {
        $this->habilitadoFarmacia = $habilitadoFarmacia;
    
        return $this;
    }

    /**
     * Get habilitadoFarmacia
     *
     * @return string 
     */
    public function getHabilitadoFarmacia()
    {
        return $this->habilitadoFarmacia;
    }

    /**
     * Set firmaDigital
     *
     * @param string $firmaDigital
     * @return MntEmpleado
     */
    public function setFirmaDigital($firmaDigital)
    {
        $this->firmaDigital = $firmaDigital;
    
        return $this;
    }

    /**
     * Get firmaDigital
     *
     * @return string 
     */
    public function getFirmaDigital()
    {
        return $this->firmaDigital;
    }

    /**
     * Set idCargoEmpleadoLaboratorio
     *
     * @param \Minsal\LaboratorioBundle\Entity\LabCargoEmpleadoLaboratorio $idCargoEmpleadoLaboratorio
     * @return MntEmpleado
     */
    public function setIdCargoEmpleadoLaboratorio(\Minsal\LaboratorioBundle\Entity\LabCargoEmpleadoLaboratorio $idCargoEmpleadoLaboratorio = null)
    {
        $this->idCargoEmpleadoLaboratorio = $idCargoEmpleadoLaboratorio;
    
        return $this;
    }

    /**
     * Get idCargoEmpleadoLaboratorio
     *
     * @return \Minsal\LaboratorioBundle\Entity\LabCargoEmpleadoLaboratorio 
     */
    public function getIdCargoEmpleadoLaboratorio()
    {
        return $this->idCargoEmpleadoLaboratorio;
    }

    /**
     * Set idDepartamento
     *
     * @param \Minsal\LaboratorioBundle\Entity\CtlDepartamento $idDepartamento
     * @return MntEmpleado
     */
    public function setIdDepartamento(\Minsal\LaboratorioBundle\Entity\CtlDepartamento $idDepartamento = null)
    {
        $this->idDepartamento = $idDepartamento;
    
        return $this;
    }

    /**
     * Get idDepartamento
     *
     * @return \Minsal\LaboratorioBundle\Entity\CtlDepartamento 
     */
    public function getIdDepartamento()
    {
        return $this->idDepartamento;
    }

    /**
     * Set idEstablecimiento
     *
     * @param \Minsal\LaboratorioBundle\Entity\CtlEstablecimiento $idEstablecimiento
     * @return MntEmpleado
     */
    public function setIdEstablecimiento(\Minsal\LaboratorioBundle\Entity\CtlEstablecimiento $idEstablecimiento = null)
    {
        $this->idEstablecimiento = $idEstablecimiento;
    
        return $this;
    }

    /**
     * Get idEstablecimiento
     *
     * @return \Minsal\LaboratorioBundle\Entity\CtlEstablecimiento 
     */
    public function getIdEstablecimiento()
    {
        return $this->idEstablecimiento;
    }

    /**
     * Set idMunicipio
     *
     * @param \Minsal\LaboratorioBundle\Entity\CtlMunicipio $idMunicipio
     * @return MntEmpleado
     */
    public function setIdMunicipio(\Minsal\LaboratorioBundle\Entity\CtlMunicipio $idMunicipio = null)
    {
        $this->idMunicipio = $idMunicipio;
    
        return $this;
    }

    /**
     * Get idMunicipio
     *
     * @return \Minsal\LaboratorioBundle\Entity\CtlMunicipio 
     */
    public function getIdMunicipio()
    {
        return $this->idMunicipio;
    }

    /**
     * Set idPais
     *
     * @param \Minsal\LaboratorioBundle\Entity\CtlPais $idPais
     * @return MntEmpleado
     */
    public function setIdPais(\Minsal\LaboratorioBundle\Entity\CtlPais $idPais = null)
    {
        $this->idPais = $idPais;
    
        return $this;
    }

    /**
     * Get idPais
     *
     * @return \Minsal\LaboratorioBundle\Entity\CtlPais 
     */
    public function getIdPais()
    {
        return $this->idPais;
    }

    /**
     * Set idTipoEmpleado
     *
     * @param \Minsal\LaboratorioBundle\Entity\MntTipoEmpleado $idTipoEmpleado
     * @return MntEmpleado
     */
    public function setIdTipoEmpleado(\Minsal\LaboratorioBundle\Entity\MntTipoEmpleado $idTipoEmpleado = null)
    {
        $this->idTipoEmpleado = $idTipoEmpleado;
    
        return $this;
    }

    /**
     * Get idTipoEmpleado
     *
     * @return \Minsal\LaboratorioBundle\Entity\MntTipoEmpleado 
     */
    public function getIdTipoEmpleado()
    {
        return $this->idTipoEmpleado;
    }

    /**
     * Set idAreaLaboratorio
     *
     * @param \Minsal\LaboratorioBundle\Entity\LabAreaLaboratorio $idAreaLaboratorio
     * @return MntEmpleado
     */
    public function setIdAreaLaboratorio(\Minsal\LaboratorioBundle\Entity\LabAreaLaboratorio $idAreaLaboratorio = null)
    {
        $this->idAreaLaboratorio = $idAreaLaboratorio;
    
        return $this;
    }

    /**
     * Get idAreaLaboratorio
     *
     * @return \Minsal\LaboratorioBundle\Entity\LabAreaLaboratorio 
     */
    public function getIdAreaLaboratorio()
    {
        return $this->idAreaLaboratorio;
    }
}