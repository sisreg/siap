<?php

namespace Minsal\SiapsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlDepartamento
 *
 * @ORM\Table(name="ctl_departamento")
 * @ORM\Entity
 */
class CtlDepartamento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ctl_departamento_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=150, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo_digestyc", type="string", length=5, nullable=true)
     */
    private $codigoDigestyc;

    /**
     * @var string
     *
     * @ORM\Column(name="abreviatura", type="string", length=5, nullable=true)
     */
    private $abreviatura;

    /**
     * @var \CtlPais
     *
     * @ORM\ManyToOne(targetEntity="CtlPais")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_pais", referencedColumnName="id")
     * })
     */
    private $idPais;



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
     * @return CtlDepartamento
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
     * Set codigoDigestyc
     *
     * @param string $codigoDigestyc
     * @return CtlDepartamento
     */
    public function setCodigoDigestyc($codigoDigestyc)
    {
        $this->codigoDigestyc = $codigoDigestyc;
    
        return $this;
    }

    /**
     * Get codigoDigestyc
     *
     * @return string 
     */
    public function getCodigoDigestyc()
    {
        return $this->codigoDigestyc;
    }

    /**
     * Set abreviatura
     *
     * @param string $abreviatura
     * @return CtlDepartamento
     */
    public function setAbreviatura($abreviatura)
    {
        $this->abreviatura = $abreviatura;
    
        return $this;
    }

    /**
     * Get abreviatura
     *
     * @return string 
     */
    public function getAbreviatura()
    {
        return $this->abreviatura;
    }

    /**
     * Set idPais
     *
     * @param \Minsal\SiapsBundle\Entity\CtlPais $idPais
     * @return CtlDepartamento
     */
    public function setIdPais(\Minsal\SiapsBundle\Entity\CtlPais $idPais = null)
    {
        $this->idPais = $idPais;
    
        return $this;
    }

    /**
     * Get idPais
     *
     * @return \Minsal\SiapsBundle\Entity\CtlPais 
     */
    public function getIdPais()
    {
        return $this->idPais;
    }
    
     public function __toString() {
        return $this->nombre ? : '';
    }
}