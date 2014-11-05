<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgCtlMotivoReferencia
 *
 * @ORM\Table(name="srg_ctl_motivo_referencia")
 * @ORM\Entity
 */
class SrgCtlMotivoReferencia
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_ctl_motivo_referencia_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="motivo_referencia", type="string", length=30, nullable=false)
     */
    private $motivoReferencia;


    /**
     *
     * @ORM\OneToMany(targetEntity="SrgReferenciaExtendida", mappedBy="idMotivoReferencia", cascade={"all"}, orphanRemoval=true)
     *
     */
    private $SrgReferenciaExtendida;



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
     * Set motivoReferencia
     *
     * @param string $motivoReferencia
     * @return SrgCtlMotivoReferencia
     */
    public function setMotivoReferencia($motivoReferencia)
    {
        $this->motivoReferencia = $motivoReferencia;

        return $this;
    }

    /**
     * Get motivoReferencia
     *
     * @return string 
     */
    public function getMotivoReferencia()
    {
        return $this->motivoReferencia;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->SrgReferenciaExtendida = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add SrgReferenciaExtendida
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgReferenciaExtendida $srgReferenciaExtendida
     * @return SrgCtlMotivoReferencia
     */
    public function addSrgReferenciaExtendida(\Minsal\GinecologiaBundle\Entity\SrgReferenciaExtendida $srgReferenciaExtendida)
    {
        $this->SrgReferenciaExtendida[] = $srgReferenciaExtendida;

        return $this;
    }

    /**
     * Remove SrgReferenciaExtendida
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgReferenciaExtendida $srgReferenciaExtendida
     */
    public function removeSrgReferenciaExtendida(\Minsal\GinecologiaBundle\Entity\SrgReferenciaExtendida $srgReferenciaExtendida)
    {
        $this->SrgReferenciaExtendida->removeElement($srgReferenciaExtendida);
    }

    /**
     * Get SrgReferenciaExtendida
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSrgReferenciaExtendida()
    {
        return $this->SrgReferenciaExtendida;
    }


   public function __toString() {
        return $this->motivoReferencia? (string) $this->motivoReferencia: ''; 
    }

    
}
