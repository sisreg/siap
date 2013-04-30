<?php

namespace Minsal\SiapsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MntProgramaEstablecimiento
 */
class MntProgramaEstablecimiento
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Minsal\SiapsBundle\Entity\CtlPrograma
     */
    private $idPrograma;

    /**
     * @var \Minsal\SiapsBundle\Entity\CtlEstablecimiento
     */
    private $idEstablecimiento;


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
     * Set idPrograma
     *
     * @param \Minsal\SiapsBundle\Entity\CtlPrograma $idPrograma
     * @return MntProgramaEstablecimiento
     */
    public function setIdPrograma(\Minsal\SiapsBundle\Entity\CtlPrograma $idPrograma = null)
    {
        $this->idPrograma = $idPrograma;
    
        return $this;
    }

    /**
     * Get idPrograma
     *
     * @return \Minsal\SiapsBundle\Entity\CtlPrograma 
     */
    public function getIdPrograma()
    {
        return $this->idPrograma;
    }

    /**
     * Set idEstablecimiento
     *
     * @param \Minsal\SiapsBundle\Entity\CtlEstablecimiento $idEstablecimiento
     * @return MntProgramaEstablecimiento
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