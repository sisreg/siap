<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgHojaindicacionesconsultaexterna
 *
 * @ORM\Table(name="srg_hojaindicacionesconsultaexterna", indexes={@ORM\Index(name="idx_43ef4733de2271f9", columns={"id_historialclinico"})})
 * @ORM\Entity
 */
class SrgHojaindicacionesconsultaexterna
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_hojaindicacionesconsultae_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="indicacionesmedicas", type="text", nullable=true)
     */
    private $indicacionesmedicas;

    /**
     * @var string
     *
     * @ORM\Column(name="plantratamiento", type="text", nullable=true)
     */
    private $plantratamiento;

    /**
     * @var string
     *
     * @ORM\Column(name="otros", type="text", nullable=true)
     */
    private $otros;

    /**
     * @var \SecHistorialClinico
     *
     * @ORM\OneToOne(targetEntity="Minsal\SiapsBundle\Entity\SecHistorialClinico")
     *   @ORM\JoinColumn(name="id_historialclinico", referencedColumnName="id")
     */
    private $idHistorialclinico;



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
     * Set indicacionesmedicas
     *
     * @param string $indicacionesmedicas
     * @return SrgHojaindicacionesconsultaexterna
     */
    public function setIndicacionesmedicas($indicacionesmedicas)
    {
        $this->indicacionesmedicas = $indicacionesmedicas;

        return $this;
    }

    /**
     * Get indicacionesmedicas
     *
     * @return string 
     */
    public function getIndicacionesmedicas()
    {
        return $this->indicacionesmedicas;
    }

    /**
     * Set plantratamiento
     *
     * @param string $plantratamiento
     * @return SrgHojaindicacionesconsultaexterna
     */
    public function setPlantratamiento($plantratamiento)
    {
        $this->plantratamiento = $plantratamiento;

        return $this;
    }

    /**
     * Get plantratamiento
     *
     * @return string 
     */
    public function getPlantratamiento()
    {
        return $this->plantratamiento;
    }

    /**
     * Set otros
     *
     * @param string $otros
     * @return SrgHojaindicacionesconsultaexterna
     */
    public function setOtros($otros)
    {
        $this->otros = $otros;

        return $this;
    }

    /**
     * Get otros
     *
     * @return string 
     */
    public function getOtros()
    {
        return $this->otros;
    }

    /**
     * Set idHistorialclinico
     *
     * @param \Minsal\SiapsBundle\Entity\SecHistorialClinico $idHistorialclinico
     * @return SrgHojaindicacionesconsultaexterna
     */
    public function setIdHistorialclinico(\Minsal\SiapsBundle\Entity\SecHistorialClinico $idHistorialclinico = null)
    {
        $this->idHistorialclinico = $idHistorialclinico;

        return $this;
    }

    /**
     * Get idHistorialclinico
     *
     * @return \Minsal\SiapsBundle\Entity\SecHistorialClinico 
     */
    public function getIdHistorialclinico()
    {
        return $this->idHistorialclinico;
    }



       public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }
    
}
