<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgCalidadMuestra
 *
 * @ORM\Table(name="srg_calidad_muestra", indexes={@ORM\Index(name="IDX_5F896C1C2E87B78", columns={"id_examen_cervico_vaginal"})})
 * @ORM\Entity
 */
class SrgCalidadMuestra
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_calidad_muestra_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="satisfactoria", type="boolean", nullable=true)
     */
    private $satisfactoria;

    /**
     * @var string
     *
     * @ORM\Column(name="detalle_insatisfactoria", type="string", length=100, nullable=true)
     */
    private $detalleInsatisfactoria;

    /**
     * @var boolean
     *
     * @ORM\Column(name="procesada", type="boolean", nullable=true)
     */
    private $procesada;

    /**
     * @var boolean
     *
     * @ORM\Column(name="celularidad_adecuada", type="boolean", nullable=true)
     */
    private $celularidadAdecuada;

    /**
     * @var boolean
     *
     * @ORM\Column(name="fijacion_preser_adecuada", type="boolean", nullable=true)
     */
    private $fijacionPreserAdecuada;

    /**
     * @var boolean
     *
     * @ORM\Column(name="material_extrano", type="boolean", nullable=true)
     */
    private $materialExtrano;

    /**
     * @var boolean
     *
     * @ORM\Column(name="inflamacion", type="boolean", nullable=true)
     */
    private $inflamacion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="sangre", type="boolean", nullable=true)
     */
    private $sangre;

    /**
     * @var boolean
     *
     * @ORM\Column(name="citolisis", type="boolean", nullable=true)
     */
    private $citolisis;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ausencia_componente", type="boolean", nullable=true)
     */
    private $ausenciaComponente;

    /**
     * @var boolean
     *
     * @ORM\Column(name="lamina_quebrada", type="boolean", nullable=true)
     */
    private $laminaQuebrada;

    /**
     * @var boolean
     *
     * @ORM\Column(name="falta_info_clinica", type="boolean", nullable=true)
     */
    private $faltaInfoClinica;

    /**
     * @var boolean
     *
     * @ORM\Column(name="identificacion_inadecuada", type="boolean", nullable=true)
     */
    private $identificacionInadecuada;

    /**
     * @var boolean
     *
     * @ORM\Column(name="negativa_para_lesion", type="boolean", nullable=true)
     */
    private $negativaParaLesion;

    /**
     * @var \SrgExamenCervicoVaginal
     *
     * @ORM\OneToOne(targetEntity="SrgExamenCervicoVaginal", inversedBy="SrgCalidadMuestra")
     *   @ORM\JoinColumn(name="id_examen_cervico_vaginal", referencedColumnName="id")
     */
    private $idExamenCervicoVaginal;



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
     * Set satisfactoria
     *
     * @param boolean $satisfactoria
     * @return SrgCalidadMuestra
     */
    public function setSatisfactoria($satisfactoria)
    {
        $this->satisfactoria = $satisfactoria;

        return $this;
    }

    /**
     * Get satisfactoria
     *
     * @return boolean 
     */
    public function getSatisfactoria()
    {
        return $this->satisfactoria;
    }

    /**
     * Set detalleInsatisfactoria
     *
     * @param string $detalleInsatisfactoria
     * @return SrgCalidadMuestra
     */
    public function setDetalleInsatisfactoria($detalleInsatisfactoria)
    {
        $this->detalleInsatisfactoria = $detalleInsatisfactoria;

        return $this;
    }

    /**
     * Get detalleInsatisfactoria
     *
     * @return string 
     */
    public function getDetalleInsatisfactoria()
    {
        return $this->detalleInsatisfactoria;
    }

    /**
     * Set procesada
     *
     * @param boolean $procesada
     * @return SrgCalidadMuestra
     */
    public function setProcesada($procesada)
    {
        $this->procesada = $procesada;

        return $this;
    }

    /**
     * Get procesada
     *
     * @return boolean 
     */
    public function getProcesada()
    {
        return $this->procesada;
    }

    /**
     * Set celularidadAdecuada
     *
     * @param boolean $celularidadAdecuada
     * @return SrgCalidadMuestra
     */
    public function setCelularidadAdecuada($celularidadAdecuada)
    {
        $this->celularidadAdecuada = $celularidadAdecuada;

        return $this;
    }

    /**
     * Get celularidadAdecuada
     *
     * @return boolean 
     */
    public function getCelularidadAdecuada()
    {
        return $this->celularidadAdecuada;
    }

    /**
     * Set fijacionPreserAdecuada
     *
     * @param boolean $fijacionPreserAdecuada
     * @return SrgCalidadMuestra
     */
    public function setFijacionPreserAdecuada($fijacionPreserAdecuada)
    {
        $this->fijacionPreserAdecuada = $fijacionPreserAdecuada;

        return $this;
    }

    /**
     * Get fijacionPreserAdecuada
     *
     * @return boolean 
     */
    public function getFijacionPreserAdecuada()
    {
        return $this->fijacionPreserAdecuada;
    }

    /**
     * Set materialExtrano
     *
     * @param boolean $materialExtrano
     * @return SrgCalidadMuestra
     */
    public function setMaterialExtrano($materialExtrano)
    {
        $this->materialExtrano = $materialExtrano;

        return $this;
    }

    /**
     * Get materialExtrano
     *
     * @return boolean 
     */
    public function getMaterialExtrano()
    {
        return $this->materialExtrano;
    }

    /**
     * Set inflamacion
     *
     * @param boolean $inflamacion
     * @return SrgCalidadMuestra
     */
    public function setInflamacion($inflamacion)
    {
        $this->inflamacion = $inflamacion;

        return $this;
    }

    /**
     * Get inflamacion
     *
     * @return boolean 
     */
    public function getInflamacion()
    {
        return $this->inflamacion;
    }

    /**
     * Set sangre
     *
     * @param boolean $sangre
     * @return SrgCalidadMuestra
     */
    public function setSangre($sangre)
    {
        $this->sangre = $sangre;

        return $this;
    }

    /**
     * Get sangre
     *
     * @return boolean 
     */
    public function getSangre()
    {
        return $this->sangre;
    }

    /**
     * Set citolisis
     *
     * @param boolean $citolisis
     * @return SrgCalidadMuestra
     */
    public function setCitolisis($citolisis)
    {
        $this->citolisis = $citolisis;

        return $this;
    }

    /**
     * Get citolisis
     *
     * @return boolean 
     */
    public function getCitolisis()
    {
        return $this->citolisis;
    }

    /**
     * Set ausenciaComponente
     *
     * @param boolean $ausenciaComponente
     * @return SrgCalidadMuestra
     */
    public function setAusenciaComponente($ausenciaComponente)
    {
        $this->ausenciaComponente = $ausenciaComponente;

        return $this;
    }

    /**
     * Get ausenciaComponente
     *
     * @return boolean 
     */
    public function getAusenciaComponente()
    {
        return $this->ausenciaComponente;
    }

    /**
     * Set laminaQuebrada
     *
     * @param boolean $laminaQuebrada
     * @return SrgCalidadMuestra
     */
    public function setLaminaQuebrada($laminaQuebrada)
    {
        $this->laminaQuebrada = $laminaQuebrada;

        return $this;
    }

    /**
     * Get laminaQuebrada
     *
     * @return boolean 
     */
    public function getLaminaQuebrada()
    {
        return $this->laminaQuebrada;
    }

    /**
     * Set faltaInfoClinica
     *
     * @param boolean $faltaInfoClinica
     * @return SrgCalidadMuestra
     */
    public function setFaltaInfoClinica($faltaInfoClinica)
    {
        $this->faltaInfoClinica = $faltaInfoClinica;

        return $this;
    }

    /**
     * Get faltaInfoClinica
     *
     * @return boolean 
     */
    public function getFaltaInfoClinica()
    {
        return $this->faltaInfoClinica;
    }

    /**
     * Set identificacionInadecuada
     *
     * @param boolean $identificacionInadecuada
     * @return SrgCalidadMuestra
     */
    public function setIdentificacionInadecuada($identificacionInadecuada)
    {
        $this->identificacionInadecuada = $identificacionInadecuada;

        return $this;
    }

    /**
     * Get identificacionInadecuada
     *
     * @return boolean 
     */
    public function getIdentificacionInadecuada()
    {
        return $this->identificacionInadecuada;
    }

    /**
     * Set negativaParaLesion
     *
     * @param boolean $negativaParaLesion
     * @return SrgCalidadMuestra
     */
    public function setNegativaParaLesion($negativaParaLesion)
    {
        $this->negativaParaLesion = $negativaParaLesion;

        return $this;
    }

    /**
     * Get negativaParaLesion
     *
     * @return boolean 
     */
    public function getNegativaParaLesion()
    {
        return $this->negativaParaLesion;
    }

    /**
     * Set idExamenCervicoVaginal
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgExamenCervicoVaginal $idExamenCervicoVaginal
     * @return SrgCalidadMuestra
     */
    public function setIdExamenCervicoVaginal(\Minsal\GinecologiaBundle\Entity\SrgExamenCervicoVaginal $idExamenCervicoVaginal = null)
    {
        $this->idExamenCervicoVaginal = $idExamenCervicoVaginal;

        return $this;
    }

    /**
     * Get idExamenCervicoVaginal
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgExamenCervicoVaginal 
     */
    public function getIdExamenCervicoVaginal()
    {
        return $this->idExamenCervicoVaginal;
    }


   public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }
    
}
