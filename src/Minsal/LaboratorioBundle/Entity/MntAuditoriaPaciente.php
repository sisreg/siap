<?php

namespace Minsal\LaboratorioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MntAuditoriaPaciente
 *
 * @ORM\Table(name="mnt_auditoria_paciente")
 * @ORM\Entity
 */
class MntAuditoriaPaciente
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="mnt_auditoria_paciente_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_paciente", type="bigint", nullable=false)
     */
    private $idPaciente;

    /**
     * @var string
     *
     * @ORM\Column(name="primer_nombre", type="string", length=25, nullable=true)
     */
    private $primerNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="segundo_nombre", type="string", length=25, nullable=true)
     */
    private $segundoNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="tercer_nombre", type="string", length=25, nullable=true)
     */
    private $tercerNombre;

    /**
     * @var string
     *
     * @ORM\Column(name="primer_apellido", type="string", length=25, nullable=true)
     */
    private $primerApellido;

    /**
     * @var string
     *
     * @ORM\Column(name="segundo_apellido", type="string", length=25, nullable=true)
     */
    private $segundoApellido;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido_casada", type="string", length=25, nullable=true)
     */
    private $apellidoCasada;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_nacimiento", type="date", nullable=true)
     */
    private $fechaNacimiento;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora_nacimiento", type="time", nullable=true)
     */
    private $horaNacimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=100, nullable=true)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_padre", type="string", length=80, nullable=true)
     */
    private $nombrePadre;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_madre", type="string", length=80, nullable=true)
     */
    private $nombreMadre;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_responsable", type="string", length=80, nullable=true)
     */
    private $nombreResponsable;

    /**
     * @var string
     *
     * @ORM\Column(name="observacion", type="text", nullable=true)
     */
    private $observacion;

    /**
     * @var string
     *
     * @ORM\Column(name="conocido_por", type="string", length=20, nullable=true)
     */
    private $conocidoPor;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_modificacion", type="date", nullable=false)
     */
    private $fechaModificacion;

    /**
     * @var \CtlAreaGeografica
     *
     * @ORM\ManyToOne(targetEntity="CtlAreaGeografica")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="area_geografica_domicilio", referencedColumnName="id")
     * })
     */
    private $areaGeograficaDomicilio;

    /**
     * @var \CtlCanton
     *
     * @ORM\ManyToOne(targetEntity="CtlCanton")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_canton_domicilio", referencedColumnName="id")
     * })
     */
    private $idCantonDomicilio;

    /**
     * @var \CtlDepartamento
     *
     * @ORM\ManyToOne(targetEntity="CtlDepartamento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_departamento_domicilio", referencedColumnName="id")
     * })
     */
    private $idDepartamentoDomicilio;

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
     *   @ORM\JoinColumn(name="id_municipio_domicilio", referencedColumnName="id")
     * })
     */
    private $idMunicipioDomicilio;

    /**
     * @var \CtlSexo
     *
     * @ORM\ManyToOne(targetEntity="CtlSexo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_sexo", referencedColumnName="id")
     * })
     */
    private $idSexo;

    /**
     * @var \FosUserUser
     *
     * @ORM\ManyToOne(targetEntity="FosUserUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_user", referencedColumnName="id")
     * })
     */
    private $idUser;



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
     * Set idPaciente
     *
     * @param integer $idPaciente
     * @return MntAuditoriaPaciente
     */
    public function setIdPaciente($idPaciente)
    {
        $this->idPaciente = $idPaciente;
    
        return $this;
    }

    /**
     * Get idPaciente
     *
     * @return integer 
     */
    public function getIdPaciente()
    {
        return $this->idPaciente;
    }

    /**
     * Set primerNombre
     *
     * @param string $primerNombre
     * @return MntAuditoriaPaciente
     */
    public function setPrimerNombre($primerNombre)
    {
        $this->primerNombre = $primerNombre;
    
        return $this;
    }

    /**
     * Get primerNombre
     *
     * @return string 
     */
    public function getPrimerNombre()
    {
        return $this->primerNombre;
    }

    /**
     * Set segundoNombre
     *
     * @param string $segundoNombre
     * @return MntAuditoriaPaciente
     */
    public function setSegundoNombre($segundoNombre)
    {
        $this->segundoNombre = $segundoNombre;
    
        return $this;
    }

    /**
     * Get segundoNombre
     *
     * @return string 
     */
    public function getSegundoNombre()
    {
        return $this->segundoNombre;
    }

    /**
     * Set tercerNombre
     *
     * @param string $tercerNombre
     * @return MntAuditoriaPaciente
     */
    public function setTercerNombre($tercerNombre)
    {
        $this->tercerNombre = $tercerNombre;
    
        return $this;
    }

    /**
     * Get tercerNombre
     *
     * @return string 
     */
    public function getTercerNombre()
    {
        return $this->tercerNombre;
    }

    /**
     * Set primerApellido
     *
     * @param string $primerApellido
     * @return MntAuditoriaPaciente
     */
    public function setPrimerApellido($primerApellido)
    {
        $this->primerApellido = $primerApellido;
    
        return $this;
    }

    /**
     * Get primerApellido
     *
     * @return string 
     */
    public function getPrimerApellido()
    {
        return $this->primerApellido;
    }

    /**
     * Set segundoApellido
     *
     * @param string $segundoApellido
     * @return MntAuditoriaPaciente
     */
    public function setSegundoApellido($segundoApellido)
    {
        $this->segundoApellido = $segundoApellido;
    
        return $this;
    }

    /**
     * Get segundoApellido
     *
     * @return string 
     */
    public function getSegundoApellido()
    {
        return $this->segundoApellido;
    }

    /**
     * Set apellidoCasada
     *
     * @param string $apellidoCasada
     * @return MntAuditoriaPaciente
     */
    public function setApellidoCasada($apellidoCasada)
    {
        $this->apellidoCasada = $apellidoCasada;
    
        return $this;
    }

    /**
     * Get apellidoCasada
     *
     * @return string 
     */
    public function getApellidoCasada()
    {
        return $this->apellidoCasada;
    }

    /**
     * Set fechaNacimiento
     *
     * @param \DateTime $fechaNacimiento
     * @return MntAuditoriaPaciente
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
     * Set horaNacimiento
     *
     * @param \DateTime $horaNacimiento
     * @return MntAuditoriaPaciente
     */
    public function setHoraNacimiento($horaNacimiento)
    {
        $this->horaNacimiento = $horaNacimiento;
    
        return $this;
    }

    /**
     * Get horaNacimiento
     *
     * @return \DateTime 
     */
    public function getHoraNacimiento()
    {
        return $this->horaNacimiento;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     * @return MntAuditoriaPaciente
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    
        return $this;
    }

    /**
     * Get direccion
     *
     * @return string 
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set nombrePadre
     *
     * @param string $nombrePadre
     * @return MntAuditoriaPaciente
     */
    public function setNombrePadre($nombrePadre)
    {
        $this->nombrePadre = $nombrePadre;
    
        return $this;
    }

    /**
     * Get nombrePadre
     *
     * @return string 
     */
    public function getNombrePadre()
    {
        return $this->nombrePadre;
    }

    /**
     * Set nombreMadre
     *
     * @param string $nombreMadre
     * @return MntAuditoriaPaciente
     */
    public function setNombreMadre($nombreMadre)
    {
        $this->nombreMadre = $nombreMadre;
    
        return $this;
    }

    /**
     * Get nombreMadre
     *
     * @return string 
     */
    public function getNombreMadre()
    {
        return $this->nombreMadre;
    }

    /**
     * Set nombreResponsable
     *
     * @param string $nombreResponsable
     * @return MntAuditoriaPaciente
     */
    public function setNombreResponsable($nombreResponsable)
    {
        $this->nombreResponsable = $nombreResponsable;
    
        return $this;
    }

    /**
     * Get nombreResponsable
     *
     * @return string 
     */
    public function getNombreResponsable()
    {
        return $this->nombreResponsable;
    }

    /**
     * Set observacion
     *
     * @param string $observacion
     * @return MntAuditoriaPaciente
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;
    
        return $this;
    }

    /**
     * Get observacion
     *
     * @return string 
     */
    public function getObservacion()
    {
        return $this->observacion;
    }

    /**
     * Set conocidoPor
     *
     * @param string $conocidoPor
     * @return MntAuditoriaPaciente
     */
    public function setConocidoPor($conocidoPor)
    {
        $this->conocidoPor = $conocidoPor;
    
        return $this;
    }

    /**
     * Get conocidoPor
     *
     * @return string 
     */
    public function getConocidoPor()
    {
        return $this->conocidoPor;
    }

    /**
     * Set fechaModificacion
     *
     * @param \DateTime $fechaModificacion
     * @return MntAuditoriaPaciente
     */
    public function setFechaModificacion($fechaModificacion)
    {
        $this->fechaModificacion = $fechaModificacion;
    
        return $this;
    }

    /**
     * Get fechaModificacion
     *
     * @return \DateTime 
     */
    public function getFechaModificacion()
    {
        return $this->fechaModificacion;
    }

    /**
     * Set areaGeograficaDomicilio
     *
     * @param \Minsal\LaboratorioBundle\Entity\CtlAreaGeografica $areaGeograficaDomicilio
     * @return MntAuditoriaPaciente
     */
    public function setAreaGeograficaDomicilio(\Minsal\LaboratorioBundle\Entity\CtlAreaGeografica $areaGeograficaDomicilio = null)
    {
        $this->areaGeograficaDomicilio = $areaGeograficaDomicilio;
    
        return $this;
    }

    /**
     * Get areaGeograficaDomicilio
     *
     * @return \Minsal\LaboratorioBundle\Entity\CtlAreaGeografica 
     */
    public function getAreaGeograficaDomicilio()
    {
        return $this->areaGeograficaDomicilio;
    }

    /**
     * Set idCantonDomicilio
     *
     * @param \Minsal\LaboratorioBundle\Entity\CtlCanton $idCantonDomicilio
     * @return MntAuditoriaPaciente
     */
    public function setIdCantonDomicilio(\Minsal\LaboratorioBundle\Entity\CtlCanton $idCantonDomicilio = null)
    {
        $this->idCantonDomicilio = $idCantonDomicilio;
    
        return $this;
    }

    /**
     * Get idCantonDomicilio
     *
     * @return \Minsal\LaboratorioBundle\Entity\CtlCanton 
     */
    public function getIdCantonDomicilio()
    {
        return $this->idCantonDomicilio;
    }

    /**
     * Set idDepartamentoDomicilio
     *
     * @param \Minsal\LaboratorioBundle\Entity\CtlDepartamento $idDepartamentoDomicilio
     * @return MntAuditoriaPaciente
     */
    public function setIdDepartamentoDomicilio(\Minsal\LaboratorioBundle\Entity\CtlDepartamento $idDepartamentoDomicilio = null)
    {
        $this->idDepartamentoDomicilio = $idDepartamentoDomicilio;
    
        return $this;
    }

    /**
     * Get idDepartamentoDomicilio
     *
     * @return \Minsal\LaboratorioBundle\Entity\CtlDepartamento 
     */
    public function getIdDepartamentoDomicilio()
    {
        return $this->idDepartamentoDomicilio;
    }

    /**
     * Set idEstablecimiento
     *
     * @param \Minsal\LaboratorioBundle\Entity\CtlEstablecimiento $idEstablecimiento
     * @return MntAuditoriaPaciente
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
     * Set idMunicipioDomicilio
     *
     * @param \Minsal\LaboratorioBundle\Entity\CtlMunicipio $idMunicipioDomicilio
     * @return MntAuditoriaPaciente
     */
    public function setIdMunicipioDomicilio(\Minsal\LaboratorioBundle\Entity\CtlMunicipio $idMunicipioDomicilio = null)
    {
        $this->idMunicipioDomicilio = $idMunicipioDomicilio;
    
        return $this;
    }

    /**
     * Get idMunicipioDomicilio
     *
     * @return \Minsal\LaboratorioBundle\Entity\CtlMunicipio 
     */
    public function getIdMunicipioDomicilio()
    {
        return $this->idMunicipioDomicilio;
    }

    /**
     * Set idSexo
     *
     * @param \Minsal\LaboratorioBundle\Entity\CtlSexo $idSexo
     * @return MntAuditoriaPaciente
     */
    public function setIdSexo(\Minsal\LaboratorioBundle\Entity\CtlSexo $idSexo = null)
    {
        $this->idSexo = $idSexo;
    
        return $this;
    }

    /**
     * Get idSexo
     *
     * @return \Minsal\LaboratorioBundle\Entity\CtlSexo 
     */
    public function getIdSexo()
    {
        return $this->idSexo;
    }

    /**
     * Set idUser
     *
     * @param \Minsal\LaboratorioBundle\Entity\FosUserUser $idUser
     * @return MntAuditoriaPaciente
     */
    public function setIdUser(\Minsal\LaboratorioBundle\Entity\FosUserUser $idUser = null)
    {
        $this->idUser = $idUser;
    
        return $this;
    }

    /**
     * Get idUser
     *
     * @return \Minsal\LaboratorioBundle\Entity\FosUserUser 
     */
    public function getIdUser()
    {
        return $this->idUser;
    }
}