<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgCtlCriterioElegibilidad
 *
 * @ORM\Table(name="srg_ctl_criterio_elegibilidad")
 * @ORM\Entity
 */
class SrgCtlCriterioElegibilidad
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_ctl_criterio_elegibilidad_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="criterio", type="string", length=100, nullable=false)
     */
    private $criterio;




    /**
     * @ORM\OneToMany(targetEntity="SrgElegibilidadMedica", mappedBy="idCriterioElegibilidad", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgElegibilidadMedica;





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
     * Set criterio
     *
     * @param string $criterio
     * @return SrgCtlCriterioElegibilidad
     */
    public function setCriterio($criterio)
    {
        $this->criterio = $criterio;

        return $this;
    }

    /**
     * Get criterio
     *
     * @return string 
     */
    public function getCriterio()
    {
        return $this->criterio;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->SrgElegibilidadMedica = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add SrgElegibilidadMedica
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgElegibilidadMedica $srgElegibilidadMedica
     * @return SrgCtlCriterioElegibilidad
     */
    public function addSrgElegibilidadMedica(\Minsal\GinecologiaBundle\Entity\SrgElegibilidadMedica $srgElegibilidadMedica)
    {
        $this->SrgElegibilidadMedica[] = $srgElegibilidadMedica;

        return $this;
    }

    /**
     * Remove SrgElegibilidadMedica
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgElegibilidadMedica $srgElegibilidadMedica
     */
    public function removeSrgElegibilidadMedica(\Minsal\GinecologiaBundle\Entity\SrgElegibilidadMedica $srgElegibilidadMedica)
    {
        $this->SrgElegibilidadMedica->removeElement($srgElegibilidadMedica);
    }

    /**
     * Get SrgElegibilidadMedica
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSrgElegibilidadMedica()
    {
        return $this->SrgElegibilidadMedica;
    }


   public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }


    
}
