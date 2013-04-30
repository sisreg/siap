<?php

namespace Minsal\SiapsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlPrograma
 */
class CtlPrograma
{
    /**
     * @var string
     */
    private $nombre;

    /**
     * @var \DateTime
     */
    private $fechaInicio;

    /**
     * @var \DateTime
     */
    private $fechaFin;

    /**
     * @var integer
     */
    private $edadMinima;

    /**
     * @var integer
     */
    private $edadMaxima;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Minsal\SiapsBundle\Entity\CtlSexo
     */
    private $idSexo;


    /**
     * Set nombre
     *
     * @param string $nombre
     * @return CtlPrograma
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    
        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     * @return CtlPrograma
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;
    
        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return \DateTime 
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * Set fechaFin
     *
     * @param \DateTime $fechaFin
     * @return CtlPrograma
     */
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;
    
        return $this;
    }

    /**
     * Get fechaFin
     *
     * @return \DateTime 
     */
    public function getFechaFin()
    {
        return $this->fechaFin;
    }

    /**
     * Set edadMinima
     *
     * @param integer $edadMinima
     * @return CtlPrograma
     */
    public function setEdadMinima($edadMinima)
    {
        $this->edadMinima = $edadMinima;
    
        return $this;
    }

    /**
     * Get edadMinima
     *
     * @return integer 
     */
    public function getEdadMinima()
    {
        return $this->edadMinima;
    }

    /**
     * Set edadMaxima
     *
     * @param integer $edadMaxima
     * @return CtlPrograma
     */
    public function setEdadMaxima($edadMaxima)
    {
        $this->edadMaxima = $edadMaxima;
    
        return $this;
    }

    /**
     * Get edadMaxima
     *
     * @return integer 
     */
    public function getEdadMaxima()
    {
        return $this->edadMaxima;
    }

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
     * Set idSexo
     *
     * @param \Minsal\SiapsBundle\Entity\CtlSexo $idSexo
     * @return CtlPrograma
     */
    public function setIdSexo(\Minsal\SiapsBundle\Entity\CtlSexo $idSexo = null)
    {
        $this->idSexo = $idSexo;
    
        return $this;
    }

    /**
     * Get idSexo
     *
     * @return \Minsal\SiapsBundle\Entity\CtlSexo 
     */
    public function getIdSexo()
    {
        return $this->idSexo;
    }
}
