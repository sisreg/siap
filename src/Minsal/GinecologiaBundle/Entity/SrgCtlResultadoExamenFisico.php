<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgCtlResultadoExamenFisico
 *
 * @ORM\Table(name="srg_ctl_resultado_examen_fisico")
 * @ORM\Entity
 */
class SrgCtlResultadoExamenFisico
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_ctl_resultado_examen_fisico_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="resultado", type="string", length=80, nullable=false)
     */
    private $resultado;



    /**
     *
     * @ORM\OneToMany(targetEntity="SrgResultadoExploraFisica", mappedBy="idResultadoExamenFisico", cascade={"all"}, orphanRemoval=true)
     *
     */
    private $SrgResultadoExploraFisica;







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
     * Set resultado
     *
     * @param string $resultado
     * @return SrgCtlResultadoExamenFisico
     */
    public function setResultado($resultado)
    {
        $this->resultado = $resultado;

        return $this;
    }

    /**
     * Get resultado
     *
     * @return string 
     */
    public function getResultado()
    {
        return $this->resultado;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->SrgResultadoExploraFisica = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add SrgResultadoExploraFisica
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgResultadoExploraFisica $srgResultadoExploraFisica
     * @return SrgCtlResultadoExamenFisico
     */
    public function addSrgResultadoExploraFisica(\Minsal\GinecologiaBundle\Entity\SrgResultadoExploraFisica $srgResultadoExploraFisica)
    {
        $this->SrgResultadoExploraFisica[] = $srgResultadoExploraFisica;

        return $this;
    }

    /**
     * Remove SrgResultadoExploraFisica
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgResultadoExploraFisica $srgResultadoExploraFisica
     */
    public function removeSrgResultadoExploraFisica(\Minsal\GinecologiaBundle\Entity\SrgResultadoExploraFisica $srgResultadoExploraFisica)
    {
        $this->SrgResultadoExploraFisica->removeElement($srgResultadoExploraFisica);
    }

    /**
     * Get SrgResultadoExploraFisica
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSrgResultadoExploraFisica()
    {
        return $this->SrgResultadoExploraFisica;
    }

   public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }

    
}
