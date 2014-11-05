<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgReferenciaExtendida
 *
 * @ORM\Table(name="srg_referencia_extendida", indexes={@ORM\Index(name="IDX_2B1EB3CF695EA351", columns={"id_atencion"}), @ORM\Index(name="IDX_2B1EB3CF7DFA12F6", columns={"id_establecimiento"}), @ORM\Index(name="IDX_2B1EB3CF30F3FEEA", columns={"id_consulta_gine_pf"}), @ORM\Index(name="IDX_2B1EB3CF7D6A022", columns={"id_tipo_referencia_retorno"}), @ORM\Index(name="IDX_2B1EB3CFC88A4AC1", columns={"id_motivo_referencia"})})
 * @ORM\Entity
 */
class SrgReferenciaExtendida
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_referencia_extendida_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="impresion_diagnostica", type="string", length=200, nullable=true)
     */
    private $impresionDiagnostica;

    /**
     * @var string
     *
     * @ORM\Column(name="detalle_motivo_referencia", type="string", length=80, nullable=true)
     */
    private $detalleMotivoReferencia;

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
     * @ORM\Column(name="tratamiento", type="text", nullable=true)
     */
    private $tratamiento;

    /**
     * @var string
     *
     * @ORM\Column(name="resumen_retorno_recibido", type="text", nullable=true)
     */
    private $resumenRetornoRecibido;

    /**
     * @var \CtlAtencion
     *
     * @ORM\ManyToOne(targetEntity="Minsal\SiapsBundle\Entity\CtlAtencion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_atencion", referencedColumnName="id")
     * })
     */
    private $idAtencion;

    /**
     * @var \CtlEstablecimiento
     *
     * @ORM\ManyToOne(targetEntity="Minsal\SiapsBundle\Entity\CtlEstablecimiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_establecimiento", referencedColumnName="id")
     * })
     */
    private $idEstablecimiento;

    /**
     * @var \SrgConsultaGinePf
     *
     * @ORM\OneToOne(targetEntity="SrgConsultaGinePf", inversedBy="SrgReferenciaExtendida")
     *   @ORM\JoinColumn(name="id_consulta_gine_pf", referencedColumnName="id")
     */
    private $idConsultaGinePf;

    /**
     * @var \SrgCtlTipoReferenciaRetorno
     *
     * @ORM\ManyToOne(targetEntity="SrgCtlTipoReferenciaRetorno")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_referencia_retorno", referencedColumnName="id")
     * })
     */
    private $idTipoReferenciaRetorno;

    /**
     * @var \SrgCtlMotivoReferencia
     *
     * @ORM\ManyToOne(targetEntity="SrgCtlMotivoReferencia", inversedBy="SrgReferenciaExtendida")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_motivo_referencia", referencedColumnName="id")
     * })
     */
    private $idMotivoReferencia;





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
     * Set impresionDiagnostica
     *
     * @param string $impresionDiagnostica
     * @return SrgReferenciaExtendida
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
     * Set detalleMotivoReferencia
     *
     * @param string $detalleMotivoReferencia
     * @return SrgReferenciaExtendida
     */
    public function setDetalleMotivoReferencia($detalleMotivoReferencia)
    {
        $this->detalleMotivoReferencia = $detalleMotivoReferencia;

        return $this;
    }

    /**
     * Get detalleMotivoReferencia
     *
     * @return string 
     */
    public function getDetalleMotivoReferencia()
    {
        return $this->detalleMotivoReferencia;
    }

    /**
     * Set datosPositivosInterrogatorio
     *
     * @param string $datosPositivosInterrogatorio
     * @return SrgReferenciaExtendida
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
     * @return SrgReferenciaExtendida
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
     * Set tratamiento
     *
     * @param string $tratamiento
     * @return SrgReferenciaExtendida
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
     * Set resumenRetornoRecibido
     *
     * @param string $resumenRetornoRecibido
     * @return SrgReferenciaExtendida
     */
    public function setResumenRetornoRecibido($resumenRetornoRecibido)
    {
        $this->resumenRetornoRecibido = $resumenRetornoRecibido;

        return $this;
    }

    /**
     * Get resumenRetornoRecibido
     *
     * @return string 
     */
    public function getResumenRetornoRecibido()
    {
        return $this->resumenRetornoRecibido;
    }

    /**
     * Set idAtencion
     *
     * @param \Minsal\SiapsBundle\Entity\CtlAtencion $idAtencion
     * @return SrgReferenciaExtendida
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
     * @return SrgReferenciaExtendida
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
     * @return SrgReferenciaExtendida
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
     * @return SrgReferenciaExtendida
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

    /**
     * Set idMotivoReferencia
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgCtlMotivoReferencia $idMotivoReferencia
     * @return SrgReferenciaExtendida
     */
    public function setIdMotivoReferencia(\Minsal\GinecologiaBundle\Entity\SrgCtlMotivoReferencia $idMotivoReferencia = null)
    {
        $this->idMotivoReferencia = $idMotivoReferencia;

        return $this;
    }

    /**
     * Get idMotivoReferencia
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgCtlMotivoReferencia 
     */
    public function getIdMotivoReferencia()
    {
        return $this->idMotivoReferencia;
    }


   public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }
    
}
