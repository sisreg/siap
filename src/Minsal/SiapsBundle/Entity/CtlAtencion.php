<?php

namespace Minsal\SiapsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlAtencion
 */
class CtlAtencion
{
    /**
     * @var string
     */
    private $nombre;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Minsal\SiapsBundle\Entity\CtlTipoAtencion
     */
    private $idTipoAtencion;

    /**
     * @var \Minsal\SiapsBundle\Entity\CtlAtencion
     */
    private $idAtencionPadre;


    /**
     * Set nombre
     *
     * @param string $nombre
     * @return CtlAtencion
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idTipoAtencion
     *
     * @param \Minsal\SiapsBundle\Entity\CtlTipoAtencion $idTipoAtencion
     * @return CtlAtencion
     */
    public function setIdTipoAtencion(\Minsal\SiapsBundle\Entity\CtlTipoAtencion $idTipoAtencion = null)
    {
        $this->idTipoAtencion = $idTipoAtencion;
    
        return $this;
    }

    /**
     * Get idTipoAtencion
     *
     * @return \Minsal\SiapsBundle\Entity\CtlTipoAtencion 
     */
    public function getIdTipoAtencion()
    {
        return $this->idTipoAtencion;
    }

    /**
     * Set idAtencionPadre
     *
     * @param \Minsal\SiapsBundle\Entity\CtlAtencion $idAtencionPadre
     * @return CtlAtencion
     */
    public function setIdAtencionPadre(\Minsal\SiapsBundle\Entity\CtlAtencion $idAtencionPadre = null)
    {
        $this->idAtencionPadre = $idAtencionPadre;
    
        return $this;
    }

    /**
     * Get idAtencionPadre
     *
     * @return \Minsal\SiapsBundle\Entity\CtlAtencion 
     */
    public function getIdAtencionPadre()
    {
        return $this->idAtencionPadre;
    }
}
