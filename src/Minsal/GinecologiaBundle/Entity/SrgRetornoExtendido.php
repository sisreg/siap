<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgRetornoExtendido
 *
 * @ORM\Table(name="srg_retorno_extendido", indexes={@ORM\Index(name="IDX_41BA650B695EA351", columns={"id_atencion"}), @ORM\Index(name="IDX_41BA650B7DFA12F6", columns={"id_establecimiento"}), @ORM\Index(name="IDX_41BA650B30F3FEEA", columns={"id_consulta_gine_pf"}), @ORM\Index(name="IDX_41BA650B7D6A022", columns={"id_tipo_referencia_retorno"})})
 * @ORM\Entity
 */
class SrgRetornoExtendido
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_retorno_extendido_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_llenado_formulario", type="date", nullable=true)
     */
    private $fechaLlenadoFormulario;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_que_se_recibe", type="date", nullable=true)
     */
    private $fechaQueSeRecibe;

    /**
     * @var string
     *
     * @ORM\Column(name="criterios_interconsultate", type="text", nullable=true)
     */
    private $criteriosInterconsultate;

    /**
     * @var string
     *
     * @ORM\Column(name="datos_positivos_interrogatorio", type="text", nullable=true)
     */
    private $datosPositivosInterrogatorio;

    /**
     * @var string
     *
     * @ORM\Column(name="informacion_relevante_paciente", type="text", nullable=true)
     */
    private $informacionRelevantePaciente;

    /**
     * @var string
     *
     * @ORM\Column(name="impresion_diagnostica", type="string", length=80, nullable=true)
     */
    private $impresionDiagnostica;

    /**
     * @var string
     *
     * @ORM\Column(name="tratamiento", type="text", nullable=true)
     */
    private $tratamiento;

    /**
     * @var string
     *
     * @ORM\Column(name="conducta_a_seguir", type="text", nullable=true)
     */
    private $conductaASeguir;

    /**
     * @var boolean
     *
     * @ORM\Column(name="dejar_control_paciente", type="boolean", nullable=true)
     */
    private $dejarControlPaciente;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_llenado_proxima_cita", type="date", nullable=true)
     */
    private $fechaLlenadoProximaCita;

    /**
     * @var string
     *
     * @ORM\Column(name="detalle_valoracion_pertinencia", type="text", nullable=true)
     */
    private $detalleValoracionPertinencia;

    /**
     * @var boolean
     *
     * @ORM\Column(name="valoracion_necesaria", type="boolean", nullable=true)
     */
    private $valoracionNecesaria;

    /**
     * @var boolean
     *
     * @ORM\Column(name="valoracion_oportuna", type="boolean", nullable=true)
     */
    private $valoracionOportuna;

    /**
     * @var \CtlAtencion
     *
     * @ORM\ManyToOne(targetEntity="\Minsal\SiapsBundle\Entity\CtlAtencion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_atencion", referencedColumnName="id")
     * })
     */
    private $idAtencion;

    /**
     * @var \CtlEstablecimiento
     *
     * @ORM\ManyToOne(targetEntity="\Minsal\SiapsBundle\Entity\CtlEstablecimiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_establecimiento", referencedColumnName="id")
     * })
     */
    private $idEstablecimiento;

    /**
     * @var \SrgConsultaGinePf
     *
     * @ORM\OneToOne(targetEntity="SrgConsultaGinePf", inversedBy="SrgRetornoExtendido")
     *   @ORM\JoinColumn(name="id_consulta_gine_pf", referencedColumnName="id")
     */
    private $idConsultaGinePf;

    /**
     * @var \SrgCtlTipoReferenciaRetorno
     *
     * @ORM\ManyToOne(targetEntity="SrgCtlTipoReferenciaRetorno", inversedBy="SrgRetornoExtendido")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_referencia_retorno", referencedColumnName="id")
     * })
     */
    private $idTipoReferenciaRetorno;



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
     * Set fechaLlenadoFormulario
     *
     * @param \DateTime $fechaLlenadoFormulario
     * @return SrgRetornoExtendido
     */
    public function setFechaLlenadoFormulario($fechaLlenadoFormulario)
    {
        $this->fechaLlenadoFormulario = $fechaLlenadoFormulario;

        return $this;
    }

    /**
     * Get fechaLlenadoFormulario
     *
     * @return \DateTime 
     */
    public function getFechaLlenadoFormulario()
    {
        return $this->fechaLlenadoFormulario;
    }

    /**
     * Set fechaQueSeRecibe
     *
     * @param \DateTime $fechaQueSeRecibe
     * @return SrgRetornoExtendido
     */
    public function setFechaQueSeRecibe($fechaQueSeRecibe)
    {
        $this->fechaQueSeRecibe = $fechaQueSeRecibe;

        return $this;
    }

    /**
     * Get fechaQueSeRecibe
     *
     * @return \DateTime 
     */
    public function getFechaQueSeRecibe()
    {
        return $this->fechaQueSeRecibe;
    }

    /**
     * Set criteriosInterconsultate
     *
     * @param string $criteriosInterconsultate
     * @return SrgRetornoExtendido
     */
    public function setCriteriosInterconsultate($criteriosInterconsultate)
    {
        $this->criteriosInterconsultate = $criteriosInterconsultate;

        return $this;
    }

    /**
     * Get criteriosInterconsultate
     *
     * @return string 
     */
    public function getCriteriosInterconsultate()
    {
        return $this->criteriosInterconsultate;
    }

    /**
     * Set datosPositivosInterrogatorio
     *
     * @param string $datosPositivosInterrogatorio
     * @return SrgRetornoExtendido
     */
    public function setDatosPositivosInterrogatorio($datosPositivosInterrogatorio)
    {
        $this->datosPositivosInterrogatorio = $datosPositivosInterrogatorio;

        return $this;
    }

    /**
     * Get datosPositivosInterrogatorio
     *
     * @return string 
     */
    public function getDatosPositivosInterrogatorio()
    {
        return $this->datosPositivosInterrogatorio;
    }

    /**
     * Set informacionRelevantePaciente
     *
     * @param string $informacionRelevantePaciente
     * @return SrgRetornoExtendido
     */
    public function setInformacionRelevantePaciente($informacionRelevantePaciente)
    {
        $this->informacionRelevantePaciente = $informacionRelevantePaciente;

        return $this;
    }

    /**
     * Get informacionRelevantePaciente
     *
     * @return string 
     */
    public function getInformacionRelevantePaciente()
    {
        return $this->informacionRelevantePaciente;
    }

    /**
     * Set impresionDiagnostica
     *
     * @param string $impresionDiagnostica
     * @return SrgRetornoExtendido
     */
    public function setImpresionDiagnostica($impresionDiagnostica)
    {
        $this->impresionDiagnostica = $impresionDiagnostica;

        return $this;
    }

    /**
     * Get impresionDiagnostica
     *
     * @return string 
     */
    public function getImpresionDiagnostica()
    {
        return $this->impresionDiagnostica;
    }

    /**
     * Set tratamiento
     *
     * @param string $tratamiento
     * @return SrgRetornoExtendido
     */
    public function setTratamiento($tratamiento)
    {
        $this->tratamiento = $tratamiento;

        return $this;
    }

    /**
     * Get tratamiento
     *
     * @return string 
     */
    public function getTratamiento()
    {
        return $this->tratamiento;
    }

    /**
     * Set conductaASeguir
     *
     * @param string $conductaASeguir
     * @return SrgRetornoExtendido
     */
    public function setConductaASeguir($conductaASeguir)
    {
        $this->conductaASeguir = $conductaASeguir;

        return $this;
    }

    /**
     * Get conductaASeguir
     *
     * @return string 
     */
    public function getConductaASeguir()
    {
        return $this->conductaASeguir;
    }

    /**
     * Set dejarControlPaciente
     *
     * @param boolean $dejarControlPaciente
     * @return SrgRetornoExtendido
     */
    public function setDejarControlPaciente($dejarControlPaciente)
    {
        $this->dejarControlPaciente = $dejarControlPaciente;

        return $this;
    }

    /**
     * Get dejarControlPaciente
     *
     * @return boolean 
     */
    public function getDejarControlPaciente()
    {
        return $this->dejarControlPaciente;
    }

    /**
     * Set fechaLlenadoProximaCita
     *
     * @param \DateTime $fechaLlenadoProximaCita
     * @return SrgRetornoExtendido
     */
    public function setFechaLlenadoProximaCita($fechaLlenadoProximaCita)
    {
        $this->fechaLlenadoProximaCita = $fechaLlenadoProximaCita;

        return $this;
    }

    /**
     * Get fechaLlenadoProximaCita
     *
     * @return \DateTime 
     */
    public function getFechaLlenadoProximaCita()
    {
        return $this->fechaLlenadoProximaCita;
    }

    /**
     * Set detalleValoracionPertinencia
     *
     * @param string $detalleValoracionPertinencia
     * @return SrgRetornoExtendido
     */
    public function setDetalleValoracionPertinencia($detalleValoracionPertinencia)
    {
        $this->detalleValoracionPertinencia = $detalleValoracionPertinencia;

        return $this;
    }

    /**
     * Get detalleValoracionPertinencia
     *
     * @return string 
     */
    public function getDetalleValoracionPertinencia()
    {
        return $this->detalleValoracionPertinencia;
    }

    /**
     * Set valoracionNecesaria
     *
     * @param boolean $valoracionNecesaria
     * @return SrgRetornoExtendido
     */
    public function setValoracionNecesaria($valoracionNecesaria)
    {
        $this->valoracionNecesaria = $valoracionNecesaria;

        return $this;
    }

    /**
     * Get valoracionNecesaria
     *
     * @return boolean 
     */
    public function getValoracionNecesaria()
    {
        return $this->valoracionNecesaria;
    }

    /**
     * Set valoracionOportuna
     *
     * @param boolean $valoracionOportuna
     * @return SrgRetornoExtendido
     */
    public function setValoracionOportuna($valoracionOportuna)
    {
        $this->valoracionOportuna = $valoracionOportuna;

        return $this;
    }

    /**
     * Get valoracionOportuna
     *
     * @return boolean 
     */
    public function getValoracionOportuna()
    {
        return $this->valoracionOportuna;
    }

    /**
     * Set idAtencion
     *
     * @param \Minsal\SiapsBundle\Entity\CtlAtencion $idAtencion
     * @return SrgRetornoExtendido
     */
    public function setIdAtencion(\Minsal\SiapsBundle\Entity\CtlAtencion $idAtencion = null)
    {
        $this->idAtencion = $idAtencion;

        return $this;
    }

    /**
     * Get idAtencion
     *
     * @return \Minsal\SiapsBundle\Entity\CtlAtencion 
     */
    public function getIdAtencion()
    {
        return $this->idAtencion;
    }

    /**
     * Set idEstablecimiento
     *
     * @param \Minsal\SiapsBundle\Entity\CtlEstablecimiento $idEstablecimiento
     * @return SrgRetornoExtendido
     */
    public function setIdEstablecimiento(\Minsal\SiapsBundle\Entity\CtlEstablecimiento $idEstablecimiento = null)
    {
        $this->idEstablecimiento = $idEstablecimiento;

        return $this;
    }

    /**
     * Get idEstablecimiento
     *
     * @return \Minsal\SiapsBundle\Entity\CtlEstablecimiento 
     */
    public function getIdEstablecimiento()
    {
        return $this->idEstablecimiento;
    }

    /**
     * Set idConsultaGinePf
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgConsultaGinePf $idConsultaGinePf
     * @return SrgRetornoExtendido
     */
    public function setIdConsultaGinePf(\Minsal\GinecologiaBundle\Entity\SrgConsultaGinePf $idConsultaGinePf = null)
    {
        $this->idConsultaGinePf = $idConsultaGinePf;

        return $this;
    }

    /**
     * Get idConsultaGinePf
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgConsultaGinePf 
     */
    public function getIdConsultaGinePf()
    {
        return $this->idConsultaGinePf;
    }

    /**
     * Set idTipoReferenciaRetorno
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgCtlTipoReferenciaRetorno $idTipoReferenciaRetorno
     * @return SrgRetornoExtendido
     */
    public function setIdTipoReferenciaRetorno(\Minsal\GinecologiaBundle\Entity\SrgCtlTipoReferenciaRetorno $idTipoReferenciaRetorno = null)
    {
        $this->idTipoReferenciaRetorno = $idTipoReferenciaRetorno;

        return $this;
    }

    /**
     * Get idTipoReferenciaRetorno
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgCtlTipoReferenciaRetorno 
     */
    public function getIdTipoReferenciaRetorno()
    {
        return $this->idTipoReferenciaRetorno;
    }

   public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }


}
