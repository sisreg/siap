<?php

namespace Minsal\SiapsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlEspecialidad
 *
 * @ORM\Table(name="ctl_especialidad")
 * @ORM\Entity
 */
class CtlEspecialidad
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ctl_especialidad_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", nullable=true)
     */
    private $nombre;

    /**
     * @var \CtlEspecialidad
     *
     * @ORM\ManyToOne(targetEntity="CtlEspecialidad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_especialidad_padre", referencedColumnName="id")
     * })
     */
    private $idEspecialidadPadre;



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
     * Set nombre
     *
     * @param string $nombre
     * @return CtlEspecialidad
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
     * Set idEspecialidadPadre
     *
     * @param \Minsal\SiapsBundle\Entity\CtlEspecialidad $idEspecialidadPadre
     * @return CtlEspecialidad
     */
    public function setIdEspecialidadPadre(\Minsal\SiapsBundle\Entity\CtlEspecialidad $idEspecialidadPadre = null)
    {
        $this->idEspecialidadPadre = $idEspecialidadPadre;
    
        return $this;
    }

    /**
     * Get idEspecialidadPadre
     *
     * @return \Minsal\SiapsBundle\Entity\CtlEspecialidad 
     */
    public function getIdEspecialidadPadre()
    {
        return $this->idEspecialidadPadre;
    }
}