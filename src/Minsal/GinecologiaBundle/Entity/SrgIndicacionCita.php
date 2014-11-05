<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgIndicacionCita
 *
 * @ORM\Table(name="srg_indicacion_cita", indexes={@ORM\Index(name="IDX_673A2D908CF23C1F", columns={"id_examen_mama"})})
 * @ORM\Entity
 */
class SrgIndicacionCita
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_indicacion_cita_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="proxima_cita", type="date", nullable=true)
     */
    private $proximaCita;

    /**
     * @var boolean
     *
     * @ORM\Column(name="usg", type="boolean", nullable=true)
     */
    private $usg;

    /**
     * @var boolean
     *
     * @ORM\Column(name="mrx", type="boolean", nullable=true)
     */
    private $mrx;

    /**
     * @var boolean
     *
     * @ORM\Column(name="biopsia", type="boolean", nullable=true)
     */
    private $biopsia;

    /**
     * @var boolean
     *
     * @ORM\Column(name="caaf", type="boolean", nullable=true)
     */
    private $caaf;

    /**
     * @var boolean
     *
     * @ORM\Column(name="referida_tercer_nivel", type="boolean", nullable=true)
     */
    private $referidaTercerNivel;

    /**
     * @var string
     *
     * @ORM\Column(name="establecimiento_referida", type="string", length=20, nullable=true)
     */
    private $establecimientoReferida;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_cita_upm", type="date", nullable=true)
     */
    private $fechaCitaUpm;

    /**
     * @var string
     *
     * @ORM\Column(name="diagnostico_probable", type="string", length=200, nullable=true)
     */
    private $diagnosticoProbable;

    /**
     * @var \SrgExamenMama
     *
     * @ORM\OneToOne(targetEntity="SrgExamenMama")
     *   @ORM\JoinColumn(name="id_examen_mama", referencedColumnName="id")
     */
    private $idExamenMama;



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
     * Set proximaCita
     *
     * @param \DateTime $proximaCita
     * @return SrgIndicacionCita
     */
    public function setProximaCita($proximaCita)
    {
        $this->proximaCita = $proximaCita;

        return $this;
    }

    /**
     * Get proximaCita
     *
     * @return \DateTime 
     */
    public function getProximaCita()
    {
        return $this->proximaCita;
    }

    /**
     * Set usg
     *
     * @param boolean $usg
     * @return SrgIndicacionCita
     */
    public function setUsg($usg)
    {
        $this->usg = $usg;

        return $this;
    }

    /**
     * Get usg
     *
     * @return boolean 
     */
    public function getUsg()
    {
        return $this->usg;
    }

    /**
     * Set mrx
     *
     * @param boolean $mrx
     * @return SrgIndicacionCita
     */
    public function setMrx($mrx)
    {
        $this->mrx = $mrx;

        return $this;
    }

    /**
     * Get mrx
     *
     * @return boolean 
     */
    public function getMrx()
    {
        return $this->mrx;
    }

    /**
     * Set biopsia
     *
     * @param boolean $biopsia
     * @return SrgIndicacionCita
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
     * Set caaf
     *
     * @param boolean $caaf
     * @return SrgIndicacionCita
     */
    public function setCaaf($caaf)
    {
        $this->caaf = $caaf;

        return $this;
    }

    /**
     * Get caaf
     *
     * @return boolean 
     */
    public function getCaaf()
    {
        return $this->caaf;
    }

    /**
     * Set referidaTercerNivel
     *
     * @param boolean $referidaTercerNivel
     * @return SrgIndicacionCita
     */
    public function setReferidaTercerNivel($referidaTercerNivel)
    {
        $this->referidaTercerNivel = $referidaTercerNivel;

        return $this;
    }

    /**
     * Get referidaTercerNivel
     *
     * @return boolean 
     */
    public function getReferidaTercerNivel()
    {
        return $this->referidaTercerNivel;
    }

    /**
     * Set establecimientoReferida
     *
     * @param string $establecimientoReferida
     * @return SrgIndicacionCita
     */
    public function setEstablecimientoReferida($establecimientoReferida)
    {
        $this->establecimientoReferida = $establecimientoReferida;

        return $this;
    }

    /**
     * Get establecimientoReferida
     *
     * @return string 
     */
    public function getEstablecimientoReferida()
    {
        return $this->establecimientoReferida;
    }

    /**
     * Set fechaCitaUpm
     *
     * @param \DateTime $fechaCitaUpm
     * @return SrgIndicacionCita
     */
    public function setFechaCitaUpm($fechaCitaUpm)
    {
        $this->fechaCitaUpm = $fechaCitaUpm;

        return $this;
    }

    /**
     * Get fechaCitaUpm
     *
     * @return \DateTime 
     */
    public function getFechaCitaUpm()
    {
        return $this->fechaCitaUpm;
    }

    /**
     * Set diagnosticoProbable
     *
     * @param string $diagnosticoProbable
     * @return SrgIndicacionCita
     */
    public function setDiagnosticoProbable($diagnosticoProbable)
    {
        $this->diagnosticoProbable = $diagnosticoProbable;

        return $this;
    }

    /**
     * Get diagnosticoProbable
     *
     * @return string 
     */
    public function getDiagnosticoProbable()
    {
        return $this->diagnosticoProbable;
    }

    /**
     * Set idExamenMama
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgExamenMama $idExamenMama
     * @return SrgIndicacionCita
     */
    public function setIdExamenMama(\Minsal\GinecologiaBundle\Entity\SrgExamenMama $idExamenMama = null)
    {
        $this->idExamenMama = $idExamenMama;

        return $this;
    }

    /**
     * Get idExamenMama
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgExamenMama 
     */
    public function getIdExamenMama()
    {
        return $this->idExamenMama;
    }


   public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }

    
}
