<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgCtlProcedimientoEsteriliz
 *
 * @ORM\Table(name="srg_ctl_procedimiento_esteriliz")
 * @ORM\Entity
 */
class SrgCtlProcedimientoEsteriliz
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_ctl_procedimiento_esteriliz_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="procedimiento_esterilizacion", type="string", length=30, nullable=false)
     */
    private $procedimientoEsterilizacion;


    /**
     * @ORM\OneToMany(targetEntity="SrgProcedimientoRealizado", mappedBy="idProcedimientoEsterilizacion", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgProcedimientoRealizado;




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
     * Set procedimientoEsterilizacion
     *
     * @param string $procedimientoEsterilizacion
     * @return SrgCtlProcedimientoEsteriliz
     */
    public function setProcedimientoEsterilizacion($procedimientoEsterilizacion)
    {
        $this->procedimientoEsterilizacion = $procedimientoEsterilizacion;

        return $this;
    }

    /**
     * Get procedimientoEsterilizacion
     *
     * @return string 
     */
    public function getProcedimientoEsterilizacion()
    {
        return $this->procedimientoEsterilizacion;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->SrgProcedimientoRealizado = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add SrgProcedimientoRealizado
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgProcedimientoRealizado $srgProcedimientoRealizado
     * @return SrgCtlProcedimientoEsteriliz
     */
    public function addSrgProcedimientoRealizado(\Minsal\GinecologiaBundle\Entity\SrgProcedimientoRealizado $srgProcedimientoRealizado)
    {
        $this->SrgProcedimientoRealizado[] = $srgProcedimientoRealizado;

        return $this;
    }

    /**
     * Remove SrgProcedimientoRealizado
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgProcedimientoRealizado $srgProcedimientoRealizado
     */
    public function removeSrgProcedimientoRealizado(\Minsal\GinecologiaBundle\Entity\SrgProcedimientoRealizado $srgProcedimientoRealizado)
    {
        $this->SrgProcedimientoRealizado->removeElement($srgProcedimientoRealizado);
    }

    /**
     * Get SrgProcedimientoRealizado
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSrgProcedimientoRealizado()
    {
        return $this->SrgProcedimientoRealizado;
    }


   public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }

    
}
