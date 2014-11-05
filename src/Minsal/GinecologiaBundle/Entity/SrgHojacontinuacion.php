<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgHojacontinuacion
 *
 * @ORM\Table(name="srg_hojacontinuacion")
 * @ORM\Entity
 */
class SrgHojacontinuacion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_hojacontinuacion_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="motivoconsulta", type="text", nullable=false)
     */
    private $motivoconsulta;

    /**
     * @var string
     *
     * @ORM\Column(name="evolucionpaciente", type="text", nullable=false)
     */
    private $evolucionpaciente;

    /**
     * @var string
     *
     * @ORM\Column(name="hxexamenes", type="text", nullable=true)
     */
    private $hxexamenes;

    /**
     * @var \SecHistorialClinico
     *
     * @ORM\OneToOne(targetEntity="\Minsal\SiapsBundle\Entity\SecHistorialClinico")
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
     * Set motivoconsulta
     *
     * @param string $motivoconsulta
     * @return SrgHojacontinuacion
     */
    public function setMotivoconsulta($motivoconsulta)
    {
        $this->motivoconsulta = $motivoconsulta;

        return $this;
    }

    /**
     * Get motivoconsulta
     *
     * @return string 
     */
    public function getMotivoconsulta()
    {
        return $this->motivoconsulta;
    }

    /**
     * Set evolucionpaciente
     *
     * @param string $evolucionpaciente
     * @return SrgHojacontinuacion
     */
    public function setEvolucionpaciente($evolucionpaciente)
    {
        $this->evolucionpaciente = $evolucionpaciente;

        return $this;
    }

    /**
     * Get evolucionpaciente
     *
     * @return string 
     */
    public function getEvolucionpaciente()
    {
        return $this->evolucionpaciente;
    }

    /**
     * Set hxexamenes
     *
     * @param string $hxexamenes
     * @return SrgHojacontinuacion
     */
    public function setHxexamenes($hxexamenes)
    {
        $this->hxexamenes = $hxexamenes;

        return $this;
    }

    /**
     * Get hxexamenes
     *
     * @return string 
     */
    public function getHxexamenes()
    {
        return $this->hxexamenes;
    }

    /**
     * Set idHistorialclinico
     *
     * @param \Minsal\SiapsBundle\Entity\SecHistorialClinico $idHistorialclinico
     * @return SrgHojacontinuacion
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
