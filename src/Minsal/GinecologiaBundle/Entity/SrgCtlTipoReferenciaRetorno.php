<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgCtlTipoReferenciaRetorno
 *
 * @ORM\Table(name="srg_ctl_tipo_referencia_retorno")
 * @ORM\Entity
 */
class SrgCtlTipoReferenciaRetorno
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_ctl_tipo_referencia_retorno_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo", type="string", length=30, nullable=false)
     */
    private $tipo;

    /**
     *
     * @ORM\OneToMany(targetEntity="SrgRetornoExtendido", mappedBy="idTipoReferenciaRetorno", cascade={"all"}, orphanRemoval=true)
     *
     */

    private $SrgRetornoExtendido;


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
     * Set tipo
     *
     * @param string $tipo
     * @return SrgCtlTipoReferenciaRetorno
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->SrgRetornoExtendido = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add SrgRetornoExtendido
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgRetornoExtendido $srgRetornoExtendido
     * @return SrgCtlTipoReferenciaRetorno
     */
    public function addSrgRetornoExtendido(\Minsal\GinecologiaBundle\Entity\SrgRetornoExtendido $srgRetornoExtendido)
    {
        $this->SrgRetornoExtendido[] = $srgRetornoExtendido;

        return $this;
    }

    /**
     * Remove SrgRetornoExtendido
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgRetornoExtendido $srgRetornoExtendido
     */
    public function removeSrgRetornoExtendido(\Minsal\GinecologiaBundle\Entity\SrgRetornoExtendido $srgRetornoExtendido)
    {
        $this->SrgRetornoExtendido->removeElement($srgRetornoExtendido);
    }

    /**
     * Get SrgRetornoExtendido
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSrgRetornoExtendido()
    {
        return $this->SrgRetornoExtendido;
    }

   public function __toString() {
        return $this->tipo? (string) $this->tipo: ''; 
    }
    
}
