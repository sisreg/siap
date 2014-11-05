<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgDatoClinico
 *
 * @ORM\Table(name="srg_dato_clinico", indexes={@ORM\Index(name="IDX_673DCC0B33455C07", columns={"id_ctl_anticonceptivo"}), @ORM\Index(name="IDX_673DCC0BC2E87B78", columns={"id_examen_cervico_vaginal"})})
 * @ORM\Entity
 */
class SrgDatoClinico
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_dato_clinico_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="anticonceptivos", type="boolean", nullable=true)
     */
    private $anticonceptivos;

    /**
     * @var boolean
     *
     * @ORM\Column(name="leucorrea", type="boolean", nullable=true)
     */
    private $leucorrea;

    /**
     * @var boolean
     *
     * @ORM\Column(name="sangrado", type="boolean", nullable=true)
     */
    private $sangrado;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cervicitis", type="boolean", nullable=true)
     */
    private $cervicitis;

    /**
     * @var boolean
     *
     * @ORM\Column(name="crio", type="boolean", nullable=true)
     */
    private $crio;

    /**
     * @var boolean
     *
     * @ORM\Column(name="leep", type="boolean", nullable=true)
     */
    private $leep;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cono", type="boolean", nullable=true)
     */
    private $cono;

    /**
     * @var boolean
     *
     * @ORM\Column(name="histerectomia", type="boolean", nullable=true)
     */
    private $histerectomia;

    /**
     * @var boolean
     *
     * @ORM\Column(name="radiacion", type="boolean", nullable=true)
     */
    private $radiacion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="hormonal", type="boolean", nullable=true)
     */
    private $hormonal;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=true)
     */
    private $fecha;

    /**
     * @var boolean
     *
     * @ORM\Column(name="biopsia", type="boolean", nullable=true)
     */
    private $biopsia;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_biopsia", type="date", nullable=true)
     */
    private $fechaBiopsia;

    /**
     * @var string
     *
     * @ORM\Column(name="resultado_biopsia", type="string", length=100, nullable=true)
     */
    private $resultadoBiopsia;

    /**
     * @var \SrgCtlAnticonceptivo
     *
     * @ORM\ManyToOne(targetEntity="SrgCtlAnticonceptivo", inversedBy="SrgDatoClinico")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_ctl_anticonceptivo", referencedColumnName="id")
     * })
     */
    private $idCtlAnticonceptivo;

    /**
     * @var \SrgExamenCervicoVaginal
     *
     * @ORM\OneToOne(targetEntity="SrgExamenCervicoVaginal", inversedBy="SrgDatoClinico")
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
     * Set anticonceptivos
     *
     * @param boolean $anticonceptivos
     * @return SrgDatoClinico
     */
    public function setAnticonceptivos($anticonceptivos)
    {
        $this->anticonceptivos = $anticonceptivos;

        return $this;
    }

    /**
     * Get anticonceptivos
     *
     * @return boolean 
     */
    public function getAnticonceptivos()
    {
        return $this->anticonceptivos;
    }

    /**
     * Set leucorrea
     *
     * @param boolean $leucorrea
     * @return SrgDatoClinico
     */
    public function setLeucorrea($leucorrea)
    {
        $this->leucorrea = $leucorrea;

        return $this;
    }

    /**
     * Get leucorrea
     *
     * @return boolean 
     */
    public function getLeucorrea()
    {
        return $this->leucorrea;
    }

    /**
     * Set sangrado
     *
     * @param boolean $sangrado
     * @return SrgDatoClinico
     */
    public function setSangrado($sangrado)
    {
        $this->sangrado = $sangrado;

        return $this;
    }

    /**
     * Get sangrado
     *
     * @return boolean 
     */
    public function getSangrado()
    {
        return $this->sangrado;
    }

    /**
     * Set cervicitis
     *
     * @param boolean $cervicitis
     * @return SrgDatoClinico
     */
    public function setCervicitis($cervicitis)
    {
        $this->cervicitis = $cervicitis;

        return $this;
    }

    /**
     * Get cervicitis
     *
     * @return boolean 
     */
    public function getCervicitis()
    {
        return $this->cervicitis;
    }

    /**
     * Set crio
     *
     * @param boolean $crio
     * @return SrgDatoClinico
     */
    public function setCrio($crio)
    {
        $this->crio = $crio;

        return $this;
    }

    /**
     * Get crio
     *
     * @return boolean 
     */
    public function getCrio()
    {
        return $this->crio;
    }

    /**
     * Set leep
     *
     * @param boolean $leep
     * @return SrgDatoClinico
     */
    public function setLeep($leep)
    {
        $this->leep = $leep;

        return $this;
    }

    /**
     * Get leep
     *
     * @return boolean 
     */
    public function getLeep()
    {
        return $this->leep;
    }

    /**
     * Set cono
     *
     * @param boolean $cono
     * @return SrgDatoClinico
     */
    public function setCono($cono)
    {
        $this->cono = $cono;

        return $this;
    }

    /**
     * Get cono
     *
     * @return boolean 
     */
    public function getCono()
    {
        return $this->cono;
    }

    /**
     * Set histerectomia
     *
     * @param boolean $histerectomia
     * @return SrgDatoClinico
     */
    public function setHisterectomia($histerectomia)
    {
        $this->histerectomia = $histerectomia;

        return $this;
    }

    /**
     * Get histerectomia
     *
     * @return boolean 
     */
    public function getHisterectomia()
    {
        return $this->histerectomia;
    }

    /**
     * Set radiacion
     *
     * @param boolean $radiacion
     * @return SrgDatoClinico
     */
    public function setRadiacion($radiacion)
    {
        $this->radiacion = $radiacion;

        return $this;
    }

    /**
     * Get radiacion
     *
     * @return boolean 
     */
    public function getRadiacion()
    {
        return $this->radiacion;
    }

    /**
     * Set hormonal
     *
     * @param boolean $hormonal
     * @return SrgDatoClinico
     */
    public function setHormonal($hormonal)
    {
        $this->hormonal = $hormonal;

        return $this;
    }

    /**
     * Get hormonal
     *
     * @return boolean 
     */
    public function getHormonal()
    {
        return $this->hormonal;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return SrgDatoClinico
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set biopsia
     *
     * @param boolean $biopsia
     * @return SrgDatoClinico
     */
    public function setBiopsia($biopsia)
    {
        $this->biopsia = $biopsia;

        return $this;
    }

    /**
     * Get biopsia
     *
     * @return boolean 
     */
    public function getBiopsia()
    {
        return $this->biopsia;
    }

    /**
     * Set fechaBiopsia
     *
     * @param \DateTime $fechaBiopsia
     * @return SrgDatoClinico
     */
    public function setFechaBiopsia($fechaBiopsia)
    {
        $this->fechaBiopsia = $fechaBiopsia;

        return $this;
    }

    /**
     * Get fechaBiopsia
     *
     * @return \DateTime 
     */
    public function getFechaBiopsia()
    {
        return $this->fechaBiopsia;
    }

    /**
     * Set resultadoBiopsia
     *
     * @param string $resultadoBiopsia
     * @return SrgDatoClinico
     */
    public function setResultadoBiopsia($resultadoBiopsia)
    {
        $this->resultadoBiopsia = $resultadoBiopsia;

        return $this;
    }

    /**
     * Get resultadoBiopsia
     *
     * @return string 
     */
    public function getResultadoBiopsia()
    {
        return $this->resultadoBiopsia;
    }

    /**
     * Set idCtlAnticonceptivo
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgCtlAnticonceptivo $idCtlAnticonceptivo
     * @return SrgDatoClinico
     */
    public function setIdCtlAnticonceptivo(\Minsal\GinecologiaBundle\Entity\SrgCtlAnticonceptivo $idCtlAnticonceptivo = null)
    {
        $this->idCtlAnticonceptivo = $idCtlAnticonceptivo;

        return $this;
    }

    /**
     * Get idCtlAnticonceptivo
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgCtlAnticonceptivo 
     */
    public function getIdCtlAnticonceptivo()
    {
        return $this->idCtlAnticonceptivo;
    }

    /**
     * Set idExamenCervicoVaginal
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgExamenCervicoVaginal $idExamenCervicoVaginal
     * @return SrgDatoClinico
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
        return $this->id ? (string) $this->id : ''; 
    }
}
