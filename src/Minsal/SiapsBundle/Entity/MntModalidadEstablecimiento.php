<?php

namespace Minsal\SiapsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * MntModalidadEstablecimiento
 *
 * @ORM\Table(name="mnt_modalidad_establecimiento")
 *  @ORM\Entity(repositoryClass="Minsal\SiapsBundle\Repositorio\MntModalidadEstablecimientoRepository")
 */
class MntModalidadEstablecimiento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="mnt_modalidad_establecimiento_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \CtlEstablecimiento
     *
     * @ORM\ManyToOne(targetEntity="CtlEstablecimiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_establecimiento", referencedColumnName="id")
     * })     
     * @Assert\NotNull
     */
    private $idEstablecimiento;

    /**
     * @var boolean
     *
     * @ORM\Column(name="tiene_bodega", type="boolean", nullable=false)
     */
    private $tieneBodega;

    /**
     * @var boolean
     *
     * @ORM\Column(name="repetitiva", type="boolean", nullable=false)
     */
    private $repetitiva;

    /**
     * @var \CtlModalidad
     *
     * @ORM\ManyToOne(targetEntity="CtlModalidad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_modalidad", referencedColumnName="id")
     * })
     * @Assert\NotNull
     */
    private $idModalidad;



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
     * Set tieneBodega
     *
     * @param boolean $tieneBodega
     * @return MntModalidadEstablecimiento
     */
    public function setTieneBodega($tieneBodega)
    {
        $this->tieneBodega = $tieneBodega;
    
        return $this;
    }

    /**
     * Get tieneBodega
     *
     * @return boolean 
     */
    public function getTieneBodega()
    {
        return $this->tieneBodega;
    }

    /**
     * Set repetitiva
     *
     * @param boolean $repetitiva
     * @return MntModalidadEstablecimiento
     */
    public function setRepetitiva($repetitiva)
    {
        $this->repetitiva = $repetitiva;
    
        return $this;
    }

    /**
     * Get repetitiva
     *
     * @return boolean 
     */
    public function getRepetitiva()
    {
        return $this->repetitiva;
    }

    /**
     * Set idModalidad
     *
     * @param \Minsal\SiapsBundle\Entity\CtlModalidad $idModalidad
     * @return MntModalidadEstablecimiento
     */
    public function setIdModalidad(\Minsal\SiapsBundle\Entity\CtlModalidad $idModalidad = null)
    {
        $this->idModalidad = $idModalidad;
    
        return $this;
    }

    /**
     * Get idModalidad
     *
     * @return \Minsal\SiapsBundle\Entity\CtlModalidad 
     */
    public function getIdModalidad()
    {
        return $this->idModalidad;
    }

    /**
     * Set idEstablecimiento
     *
     * @param \Minsal\SiapsBundle\Entity\CtlEstablecimiento $idEstablecimiento
     * @return MntModalidadEstablecimiento
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
    
      
   public function __toString() {
         return (string)$this->idEstablecimiento ? :'';
    }
    
}