<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgCtlMicroorganismo
 *
 * @ORM\Table(name="srg_ctl_microorganismo")
 * @ORM\Entity
 */
class SrgCtlMicroorganismo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_ctl_microorganismo_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_microorganismo", type="string", length=100, nullable=false)
     */
    private $tipoMicroorganismo;



    /**
     * @ORM\OneToMany(targetEntity="SrgOrganismoCervicoMicroorga", mappedBy="idMicroorganismo", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgOrganismoCervicoMicroorga;








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
     * Set tipoMicroorganismo
     *
     * @param string $tipoMicroorganismo
     * @return SrgCtlMicroorganismo
     */
    public function setTipoMicroorganismo($tipoMicroorganismo)
    {
        $this->tipoMicroorganismo = $tipoMicroorganismo;

        return $this;
    }

    /**
     * Get tipoMicroorganismo
     *
     * @return string 
     */
    public function getTipoMicroorganismo()
    {
        return $this->tipoMicroorganismo;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->SrgOrganismoCervicoMicroorga = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add SrgOrganismoCervicoMicroorga
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgOrganismoCervicoMicroorga $srgOrganismoCervicoMicroorga
     * @return SrgCtlMicroorganismo
     */
    public function addSrgOrganismoCervicoMicroorga(\Minsal\GinecologiaBundle\Entity\SrgOrganismoCervicoMicroorga $srgOrganismoCervicoMicroorga)
    {
        $this->SrgOrganismoCervicoMicroorga[] = $srgOrganismoCervicoMicroorga;

        return $this;
    }

    /**
     * Remove SrgOrganismoCervicoMicroorga
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgOrganismoCervicoMicroorga $srgOrganismoCervicoMicroorga
     */
    public function removeSrgOrganismoCervicoMicroorga(\Minsal\GinecologiaBundle\Entity\SrgOrganismoCervicoMicroorga $srgOrganismoCervicoMicroorga)
    {
        $this->SrgOrganismoCervicoMicroorga->removeElement($srgOrganismoCervicoMicroorga);
    }

    /**
     * Get SrgOrganismoCervicoMicroorga
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSrgOrganismoCervicoMicroorga()
    {
        return $this->SrgOrganismoCervicoMicroorga;
    }


   public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }

}
