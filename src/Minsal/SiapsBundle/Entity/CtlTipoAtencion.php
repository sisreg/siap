<?php

namespace Minsal\SiapsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlTipoAtencion
 */
class CtlTipoAtencion
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
     * Set nombre
     *
     * @param string $nombre
     * @return CtlTipoAtencion
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
}