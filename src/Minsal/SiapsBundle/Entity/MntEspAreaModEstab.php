<?php

namespace Minsal\SiapsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MntEspAreaModEstab
 *
 * @ORM\Table(name="mnt_esp_area_mod_estab")
 * @ORM\Entity
 */
class MntEspAreaModEstab
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="mnt_esp_area_mod_estab_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \MntAreaModEstab
     *
     * @ORM\ManyToOne(targetEntity="MntAreaModEstab")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_area_mod_estab", referencedColumnName="id")
     * })
     */
    private $idAreaModEstab;

    /**
     * @var \CtlEspecialidad
     *
     * @ORM\ManyToOne(targetEntity="CtlEspecialidad")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_especialidad", referencedColumnName="id")
     * })
     */
    private $idEspecialidad;

    /**
     * @var \CtlEstablecimiento
     *
     * @ORM\ManyToOne(targetEntity="CtlEstablecimiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_establecimiento", referencedColumnName="id")
     * })
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
     * Set idAreaModEstab
     *
     * @param \Minsal\SiapsBundle\Entity\MntAreaModEstab $idAreaModEstab
     * @return MntEspAreaModEstab
     */
    public function setIdAreaModEstab(\Minsal\SiapsBundle\Entity\MntAreaModEstab $idAreaModEstab = null)
    {
        $this->idAreaModEstab = $idAreaModEstab;
    
        return $this;
    }

    /**
     * Get idAreaModEstab
     *
     * @return \Minsal\SiapsBundle\Entity\MntAreaModEstab 
     */
    public function getIdAreaModEstab()
    {
        return $this->idAreaModEstab;
    }

    /**
     * Set idEspecialidad
     *
     * @param \Minsal\SiapsBundle\Entity\CtlEspecialidad $idEspecialidad
     * @return MntEspAreaModEstab
     */
    public function setIdEspecialidad(\Minsal\SiapsBundle\Entity\CtlEspecialidad $idEspecialidad = null)
    {
        $this->idEspecialidad = $idEspecialidad;
    
        return $this;
    }

    /**
     * Get idEspecialidad
     *
     * @return \Minsal\SiapsBundle\Entity\CtlEspecialidad 
     */
    public function getIdEspecialidad()
    {
        return $this->idEspecialidad;
    }

    /**
     * Set idEstablecimiento
     *
     * @param \Minsal\SiapsBundle\Entity\CtlEstablecimiento $idEstablecimiento
     * @return MntEspAreaModEstab
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