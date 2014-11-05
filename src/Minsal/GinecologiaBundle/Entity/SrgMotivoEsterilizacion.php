<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgMotivoEsterilizacion
 *
 * @ORM\Table(name="srg_motivo_esterilizacion", indexes={@ORM\Index(name="IDX_3D66E3A456558889", columns={"id_esterilizacion"})})
 * @ORM\Entity
 */
class SrgMotivoEsterilizacion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_motivo_esterilizacion_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="razones_medicas", type="boolean", nullable=true)
     */
    private $razonesMedicas;

    /**
     * @var boolean
     *
     * @ORM\Column(name="no_mas_hijos", type="boolean", nullable=true)
     */
    private $noMasHijos;

    /**
     * @var boolean
     *
     * @ORM\Column(name="motivos_personales", type="boolean", nullable=true)
     */
    private $motivosPersonales;

    /**
     * @var boolean
     *
     * @ORM\Column(name="intolerancia_anticonceptivos", type="boolean", nullable=true)
     */
    private $intoleranciaAnticonceptivos;

    /**
     * @var boolean
     *
     * @ORM\Column(name="economicas", type="boolean", nullable=true)
     */
    private $economicas;

    /**
     * @var string
     *
     * @ORM\Column(name="detalle_otros", type="string", length=50, nullable=true)
     */
    private $detalleOtros;

    /**
     * @var \SrgEsterilizacion
     *
     * @ORM\OneToOne(targetEntity="SrgEsterilizacion", inversedBy="SrgMotivoEsterilizacion")
     *   @ORM\JoinColumn(name="id_esterilizacion", referencedColumnName="id")
     */
    private $idEsterilizacion;



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
     * Set razonesMedicas
     *
     * @param boolean $razonesMedicas
     * @return SrgMotivoEsterilizacion
     */
    public function setRazonesMedicas($razonesMedicas)
    {
        $this->razonesMedicas = $razonesMedicas;

        return $this;
    }

    /**
     * Get razonesMedicas
     *
     * @return boolean 
     */
    public function getRazonesMedicas()
    {
        return $this->razonesMedicas;
    }

    /**
     * Set noMasHijos
     *
     * @param boolean $noMasHijos
     * @return SrgMotivoEsterilizacion
     */
    public function setNoMasHijos($noMasHijos)
    {
        $this->noMasHijos = $noMasHijos;

        return $this;
    }

    /**
     * Get noMasHijos
     *
     * @return boolean 
     */
    public function getNoMasHijos()
    {
        return $this->noMasHijos;
    }

    /**
     * Set motivosPersonales
     *
     * @param boolean $motivosPersonales
     * @return SrgMotivoEsterilizacion
     */
    public function setMotivosPersonales($motivosPersonales)
    {
        $this->motivosPersonales = $motivosPersonales;

        return $this;
    }

    /**
     * Get motivosPersonales
     *
     * @return boolean 
     */
    public function getMotivosPersonales()
    {
        return $this->motivosPersonales;
    }

    /**
     * Set intoleranciaAnticonceptivos
     *
     * @param boolean $intoleranciaAnticonceptivos
     * @return SrgMotivoEsterilizacion
     */
    public function setIntoleranciaAnticonceptivos($intoleranciaAnticonceptivos)
    {
        $this->intoleranciaAnticonceptivos = $intoleranciaAnticonceptivos;

        return $this;
    }

    /**
     * Get intoleranciaAnticonceptivos
     *
     * @return boolean 
     */
    public function getIntoleranciaAnticonceptivos()
    {
        return $this->intoleranciaAnticonceptivos;
    }

    /**
     * Set economicas
     *
     * @param boolean $economicas
     * @return SrgMotivoEsterilizacion
     */
    public function setEconomicas($economicas)
    {
        $this->economicas = $economicas;

        return $this;
    }

    /**
     * Get economicas
     *
     * @return boolean 
     */
    public function getEconomicas()
    {
        return $this->economicas;
    }

    /**
     * Set detalleOtros
     *
     * @param string $detalleOtros
     * @return SrgMotivoEsterilizacion
     */
    public function setDetalleOtros($detalleOtros)
    {
        $this->detalleOtros = $detalleOtros;

        return $this;
    }

    /**
     * Get detalleOtros
     *
     * @return string 
     */
    public function getDetalleOtros()
    {
        return $this->detalleOtros;
    }

    /**
     * Set idEsterilizacion
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgEsterilizacion $idEsterilizacion
     * @return SrgMotivoEsterilizacion
     */
    public function setIdEsterilizacion(\Minsal\GinecologiaBundle\Entity\SrgEsterilizacion $idEsterilizacion = null)
    {
        $this->idEsterilizacion = $idEsterilizacion;

        return $this;
    }

    /**
     * Get idEsterilizacion
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgEsterilizacion 
     */
    public function getIdEsterilizacion()
    {
        return $this->idEsterilizacion;
    }

   public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }

    
}
