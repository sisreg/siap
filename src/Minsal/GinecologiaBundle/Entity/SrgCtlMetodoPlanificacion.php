<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgCtlMetodoPlanificacion
 *
 * @ORM\Table(name="srg_ctl_metodo_planificacion")
 * @ORM\Entity
 */
class SrgCtlMetodoPlanificacion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_ctl_metodo_planificacion_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_metodo", type="string", length=60, nullable=false)
     */
    private $tipoMetodo;



    /**
     *
     * @ORM\OneToMany(targetEntity="SrgCtlAnticonceptivo", mappedBy="idMetodoPlanificacion", cascade={"all"}, orphanRemoval=true)
     *
     */
    private $SrgCtlAnticonceptivo;




    /**
     *
     * @ORM\OneToMany(targetEntity="SrgHojaAbastecimiento", mappedBy="idMetodoPlanificacion", cascade={"all"}, orphanRemoval=true)
     *
     */
    private $SrgHojaAbastecimiento;






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
     * Set tipoMetodo
     *
     * @param string $tipoMetodo
     * @return SrgCtlMetodoPlanificacion
     */
    public function setTipoMetodo($tipoMetodo)
    {
        $this->tipoMetodo = $tipoMetodo;

        return $this;
    }

    /**
     * Get tipoMetodo
     *
     * @return string 
     */
    public function getTipoMetodo()
    {
        return $this->tipoMetodo;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->SrgCtlAnticonceptivo = new \Doctrine\Common\Collections\ArrayCollection();
        $this->SrgHojaAbastecimiento = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add SrgCtlAnticonceptivo
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgCtlAnticonceptivo $srgCtlAnticonceptivo
     * @return SrgCtlMetodoPlanificacion
     */
    public function addSrgCtlAnticonceptivo(\Minsal\GinecologiaBundle\Entity\SrgCtlAnticonceptivo $srgCtlAnticonceptivo)
    {
        $this->SrgCtlAnticonceptivo[] = $srgCtlAnticonceptivo;

        return $this;
    }

    /**
     * Remove SrgCtlAnticonceptivo
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgCtlAnticonceptivo $srgCtlAnticonceptivo
     */
    public function removeSrgCtlAnticonceptivo(\Minsal\GinecologiaBundle\Entity\SrgCtlAnticonceptivo $srgCtlAnticonceptivo)
    {
        $this->SrgCtlAnticonceptivo->removeElement($srgCtlAnticonceptivo);
    }

    /**
     * Get SrgCtlAnticonceptivo
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSrgCtlAnticonceptivo()
    {
        return $this->SrgCtlAnticonceptivo;
    }

    /**
     * Add SrgHojaAbastecimiento
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgHojaAbastecimiento $srgHojaAbastecimiento
     * @return SrgCtlMetodoPlanificacion
     */
    public function addSrgHojaAbastecimiento(\Minsal\GinecologiaBundle\Entity\SrgHojaAbastecimiento $srgHojaAbastecimiento)
    {
        $this->SrgHojaAbastecimiento[] = $srgHojaAbastecimiento;

        return $this;
    }

    /**
     * Remove SrgHojaAbastecimiento
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgHojaAbastecimiento $srgHojaAbastecimiento
     */
    public function removeSrgHojaAbastecimiento(\Minsal\GinecologiaBundle\Entity\SrgHojaAbastecimiento $srgHojaAbastecimiento)
    {
        $this->SrgHojaAbastecimiento->removeElement($srgHojaAbastecimiento);
    }

    /**
     * Get SrgHojaAbastecimiento
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSrgHojaAbastecimiento()
    {
        return $this->SrgHojaAbastecimiento;
    }


   public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }

    
}
