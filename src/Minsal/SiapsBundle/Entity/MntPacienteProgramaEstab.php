<?php

namespace Minsal\SiapsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MntPacienteProgramaEstab
 */
class MntPacienteProgramaEstab
{
    /**
     * @var \DateTime
     */
    private $fechaInscripcion;

    /**
     * @var \DateTime
     */
    private $fechaAlta;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Minsal\SiapsBundle\Entity\MntProgramaEstablecimiento
     */
    private $idProgramaEstablecimiento;

    /**
     * @var \Minsal\SiapsBundle\Entity\MntPaciente
     */
    private $idPaciente;

    /**
     * @var \Minsal\SiapsBundle\Entity\CtlEstablecimiento
     */
    private $idEstablecimiento;


    /**
     * Set fechaInscripcion
     *
     * @param \DateTime $fechaInscripcion
     * @return MntPacienteProgramaEstab
     */
    public function setFechaInscripcion($fechaInscripcion)
    {
        $this->fechaInscripcion = $fechaInscripcion;
    
        return $this;
    }

    /**
     * Get fechaInscripcion
     *
     * @return \DateTime 
     */
    public function getFechaInscripcion()
    {
        return $this->fechaInscripcion;
    }

    /**
     * Set fechaAlta
     *
     * @param \DateTime $fechaAlta
     * @return MntPacienteProgramaEstab
     */
    public function setFechaAlta($fechaAlta)
    {
        $this->fechaAlta = $fechaAlta;
    
        return $this;
    }

    /**
     * Get fechaAlta
     *
     * @return \DateTime 
     */
    public function getFechaAlta()
    {
        return $this->fechaAlta;
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
     * Set idProgramaEstablecimiento
     *
     * @param \Minsal\SiapsBundle\Entity\MntProgramaEstablecimiento $idProgramaEstablecimiento
     * @return MntPacienteProgramaEstab
     */
    public function setIdProgramaEstablecimiento(\Minsal\SiapsBundle\Entity\MntProgramaEstablecimiento $idProgramaEstablecimiento = null)
    {
        $this->idProgramaEstablecimiento = $idProgramaEstablecimiento;
    
        return $this;
    }

    /**
     * Get idProgramaEstablecimiento
     *
     * @return \Minsal\SiapsBundle\Entity\MntProgramaEstablecimiento 
     */
    public function getIdProgramaEstablecimiento()
    {
        return $this->idProgramaEstablecimiento;
    }

    /**
     * Set idPaciente
     *
     * @param \Minsal\SiapsBundle\Entity\MntPaciente $idPaciente
     * @return MntPacienteProgramaEstab
     */
    public function setIdPaciente(\Minsal\SiapsBundle\Entity\MntPaciente $idPaciente = null)
    {
        $this->idPaciente = $idPaciente;
    
        return $this;
    }

    /**
     * Get idPaciente
     *
     * @return \Minsal\SiapsBundle\Entity\MntPaciente 
     */
    public function getIdPaciente()
    {
        return $this->idPaciente;
    }

    /**
     * Set idEstablecimiento
     *
     * @param \Minsal\SiapsBundle\Entity\CtlEstablecimiento $idEstablecimiento
     * @return MntPacienteProgramaEstab
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
}