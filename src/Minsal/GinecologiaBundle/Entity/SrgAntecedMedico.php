<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgAntecedMedico
 *
 * @ORM\Table(name="srg_anteced_medico", indexes={@ORM\Index(name="IDX_21E3CEA630F3FEEA", columns={"id_consulta_gine_pf"})})
 * @ORM\Entity
 */
class SrgAntecedMedico
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_anteced_medico_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="diabetes", type="boolean", nullable=true)
     */
    private $diabetes;

    /**
     * @var boolean
     *
     * @ORM\Column(name="asma", type="boolean", nullable=true)
     */
    private $asma;

    /**
     * @var boolean
     *
     * @ORM\Column(name="hipertencion", type="boolean", nullable=true)
     */
    private $hipertencion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="tratamientos_previos", type="boolean", nullable=true)
     */
    private $tratamientosPrevios;

    /**
     * @var string
     *
     * @ORM\Column(name="trata_previos_descripcion", type="string", length=40, nullable=true)
     */
    private $trataPreviosDescripcion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="transtornos_mentales", type="boolean", nullable=true)
     */
    private $transtornosMentales;

    /**
     * @var string
     *
     * @ORM\Column(name="transtor_menta_descripcion", type="string", length=40, nullable=true)
     */
    private $transtorMentaDescripcion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="transtornos_comportamientos", type="boolean", nullable=true)
     */
    private $transtornosComportamientos;

    /**
     * @var string
     *
     * @ORM\Column(name="transtor_compor_descripcion", type="string", length=40, nullable=true)
     */
    private $transtorComporDescripcion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cancer", type="boolean", nullable=true)
     */
    private $cancer;

    /**
     * @var string
     *
     * @ORM\Column(name="cancer_descripcion", type="string", length=40, nullable=true)
     */
    private $cancerDescripcion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="otros", type="boolean", nullable=true)
     */
    private $otros;

    /**
     * @var string
     *
     * @ORM\Column(name="otros_descripcion", type="string", length=40, nullable=true)
     */
    private $otrosDescripcion;

    /**
     * @var \SrgConsultaGinePf
     *
     * @ORM\OneToOne(targetEntity="SrgConsultaGinePf", inversedBy="SrgAntecedMedico")
     *   @ORM\JoinColumn(name="id_consulta_gine_pf", referencedColumnName="id")
     */
    private $idConsultaGinePf;



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
     * Set diabetes
     *
     * @param boolean $diabetes
     * @return SrgAntecedMedico
     */
    public function setDiabetes($diabetes)
    {
        $this->diabetes = $diabetes;

        return $this;
    }

    /**
     * Get diabetes
     *
     * @return boolean 
     */
    public function getDiabetes()
    {
        return $this->diabetes;
    }

    /**
     * Set asma
     *
     * @param boolean $asma
     * @return SrgAntecedMedico
     */
    public function setAsma($asma)
    {
        $this->asma = $asma;

        return $this;
    }

    /**
     * Get asma
     *
     * @return boolean 
     */
    public function getAsma()
    {
        return $this->asma;
    }

    /**
     * Set hipertencion
     *
     * @param boolean $hipertencion
     * @return SrgAntecedMedico
     */
    public function setHipertencion($hipertencion)
    {
        $this->hipertencion = $hipertencion;

        return $this;
    }

    /**
     * Get hipertencion
     *
     * @return boolean 
     */
    public function getHipertencion()
    {
        return $this->hipertencion;
    }

    /**
     * Set tratamientosPrevios
     *
     * @param boolean $tratamientosPrevios
     * @return SrgAntecedMedico
     */
    public function setTratamientosPrevios($tratamientosPrevios)
    {
        $this->tratamientosPrevios = $tratamientosPrevios;

        return $this;
    }

    /**
     * Get tratamientosPrevios
     *
     * @return boolean 
     */
    public function getTratamientosPrevios()
    {
        return $this->tratamientosPrevios;
    }

    /**
     * Set trataPreviosDescripcion
     *
     * @param string $trataPreviosDescripcion
     * @return SrgAntecedMedico
     */
    public function setTrataPreviosDescripcion($trataPreviosDescripcion)
    {
        $this->trataPreviosDescripcion = $trataPreviosDescripcion;

        return $this;
    }

    /**
     * Get trataPreviosDescripcion
     *
     * @return string 
     */
    public function getTrataPreviosDescripcion()
    {
        return $this->trataPreviosDescripcion;
    }

    /**
     * Set transtornosMentales
     *
     * @param boolean $transtornosMentales
     * @return SrgAntecedMedico
     */
    public function setTranstornosMentales($transtornosMentales)
    {
        $this->transtornosMentales = $transtornosMentales;

        return $this;
    }

    /**
     * Get transtornosMentales
     *
     * @return boolean 
     */
    public function getTranstornosMentales()
    {
        return $this->transtornosMentales;
    }

    /**
     * Set transtorMentaDescripcion
     *
     * @param string $transtorMentaDescripcion
     * @return SrgAntecedMedico
     */
    public function setTranstorMentaDescripcion($transtorMentaDescripcion)
    {
        $this->transtorMentaDescripcion = $transtorMentaDescripcion;

        return $this;
    }

    /**
     * Get transtorMentaDescripcion
     *
     * @return string 
     */
    public function getTranstorMentaDescripcion()
    {
        return $this->transtorMentaDescripcion;
    }

    /**
     * Set transtornosComportamientos
     *
     * @param boolean $transtornosComportamientos
     * @return SrgAntecedMedico
     */
    public function setTranstornosComportamientos($transtornosComportamientos)
    {
        $this->transtornosComportamientos = $transtornosComportamientos;

        return $this;
    }

    /**
     * Get transtornosComportamientos
     *
     * @return boolean 
     */
    public function getTranstornosComportamientos()
    {
        return $this->transtornosComportamientos;
    }

    /**
     * Set transtorComporDescripcion
     *
     * @param string $transtorComporDescripcion
     * @return SrgAntecedMedico
     */
    public function setTranstorComporDescripcion($transtorComporDescripcion)
    {
        $this->transtorComporDescripcion = $transtorComporDescripcion;

        return $this;
    }

    /**
     * Get transtorComporDescripcion
     *
     * @return string 
     */
    public function getTranstorComporDescripcion()
    {
        return $this->transtorComporDescripcion;
    }

    /**
     * Set cancer
     *
     * @param boolean $cancer
     * @return SrgAntecedMedico
     */
    public function setCancer($cancer)
    {
        $this->cancer = $cancer;

        return $this;
    }

    /**
     * Get cancer
     *
     * @return boolean 
     */
    public function getCancer()
    {
        return $this->cancer;
    }

    /**
     * Set cancerDescripcion
     *
     * @param string $cancerDescripcion
     * @return SrgAntecedMedico
     */
    public function setCancerDescripcion($cancerDescripcion)
    {
        $this->cancerDescripcion = $cancerDescripcion;

        return $this;
    }

    /**
     * Get cancerDescripcion
     *
     * @return string 
     */
    public function getCancerDescripcion()
    {
        return $this->cancerDescripcion;
    }

    /**
     * Set otros
     *
     * @param boolean $otros
     * @return SrgAntecedMedico
     */
    public function setOtros($otros)
    {
        $this->otros = $otros;

        return $this;
    }

    /**
     * Get otros
     *
     * @return boolean 
     */
    public function getOtros()
    {
        return $this->otros;
    }

    /**
     * Set otrosDescripcion
     *
     * @param string $otrosDescripcion
     * @return SrgAntecedMedico
     */
    public function setOtrosDescripcion($otrosDescripcion)
    {
        $this->otrosDescripcion = $otrosDescripcion;

        return $this;
    }

    /**
     * Get otrosDescripcion
     *
     * @return string 
     */
    public function getOtrosDescripcion()
    {
        return $this->otrosDescripcion;
    }

    /**
     * Set idConsultaGinePf
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgConsultaGinePf $idConsultaGinePf
     * @return SrgAntecedMedico
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



   public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }




    
}
