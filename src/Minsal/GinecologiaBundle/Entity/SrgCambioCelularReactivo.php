<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgCambioCelularReactivo
 *
 * @ORM\Table(name="srg_cambio_celular_reactivo", indexes={@ORM\Index(name="IDX_EEBD9501C2E87B78", columns={"id_examen_cervico_vaginal"})})
 * @ORM\Entity
 */
class SrgCambioCelularReactivo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_cambio_celular_reactivo_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="radiacion", type="boolean", nullable=true)
     */
    private $radiacion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="inflamacion", type="boolean", nullable=true)
     */
    private $inflamacion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="diu", type="boolean", nullable=true)
     */
    private $diu;

    /**
     * @var boolean
     *
     * @ORM\Column(name="atrofia", type="boolean", nullable=true)
     */
    private $atrofia;

    /**
     * @var boolean
     *
     * @ORM\Column(name="celulas_glandu_histerec", type="boolean", nullable=true)
     */
    private $celulasGlanduHisterec;

    /**
     * @var boolean
     *
     * @ORM\Column(name="celulas_endo_cuarenta", type="boolean", nullable=true)
     */
    private $celulasEndoCuarenta;

    /**
     * @var \SrgExamenCervicoVaginal
     *
     * @ORM\OneToOne(targetEntity="SrgExamenCervicoVaginal", inversedBy="SrgCambioCelularReactivo")
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
     * Set radiacion
     *
     * @param boolean $radiacion
     * @return SrgCambioCelularReactivo
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
     * Set inflamacion
     *
     * @param boolean $inflamacion
     * @return SrgCambioCelularReactivo
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
     * Set diu
     *
     * @param boolean $diu
     * @return SrgCambioCelularReactivo
     */
    public function setDiu($diu)
    {
        $this->diu = $diu;

        return $this;
    }

    /**
     * Get diu
     *
     * @return boolean 
     */
    public function getDiu()
    {
        return $this->diu;
    }

    /**
     * Set atrofia
     *
     * @param boolean $atrofia
     * @return SrgCambioCelularReactivo
     */
    public function setAtrofia($atrofia)
    {
        $this->atrofia = $atrofia;

        return $this;
    }

    /**
     * Get atrofia
     *
     * @return boolean 
     */
    public function getAtrofia()
    {
        return $this->atrofia;
    }

    /**
     * Set celulasGlanduHisterec
     *
     * @param boolean $celulasGlanduHisterec
     * @return SrgCambioCelularReactivo
     */
    public function setCelulasGlanduHisterec($celulasGlanduHisterec)
    {
        $this->celulasGlanduHisterec = $celulasGlanduHisterec;

        return $this;
    }

    /**
     * Get celulasGlanduHisterec
     *
     * @return boolean 
     */
    public function getCelulasGlanduHisterec()
    {
        return $this->celulasGlanduHisterec;
    }

    /**
     * Set celulasEndoCuarenta
     *
     * @param boolean $celulasEndoCuarenta
     * @return SrgCambioCelularReactivo
     */
    public function setCelulasEndoCuarenta($celulasEndoCuarenta)
    {
        $this->celulasEndoCuarenta = $celulasEndoCuarenta;

        return $this;
    }

    /**
     * Get celulasEndoCuarenta
     *
     * @return boolean 
     */
    public function getCelulasEndoCuarenta()
    {
        return $this->celulasEndoCuarenta;
    }

    /**
     * Set idExamenCervicoVaginal
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgExamenCervicoVaginal $idExamenCervicoVaginal
     * @return SrgCambioCelularReactivo
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
