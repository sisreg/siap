<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgCtlHistoriaHallazgo
 *
 * @ORM\Table(name="srg_ctl_historia_hallazgo")
 * @ORM\Entity
 */
class SrgCtlHistoriaHallazgo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_ctl_historia_hallazgo_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="historia_hallazgo", type="string", length=80, nullable=false)
     */
    private $historiaHallazgo;




    /**
     * @ORM\OneToMany(targetEntity="SrgSeguiSubsecHistoHallazgo", mappedBy="idHistoriaHallazgo", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgSeguiSubsecHistoHallazgo;






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
     * Set historiaHallazgo
     *
     * @param string $historiaHallazgo
     * @return SrgCtlHistoriaHallazgo
     */
    public function setHistoriaHallazgo($historiaHallazgo)
    {
        $this->historiaHallazgo = $historiaHallazgo;

        return $this;
    }

    /**
     * Get historiaHallazgo
     *
     * @return string 
     */
    public function getHistoriaHallazgo()
    {
        return $this->historiaHallazgo;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->SrgSeguiSubsecHistoHallazgo = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add SrgSeguiSubsecHistoHallazgo
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgSeguiSubsecHistoHallazgo $srgSeguiSubsecHistoHallazgo
     * @return SrgCtlHistoriaHallazgo
     */
    public function addSrgSeguiSubsecHistoHallazgo(\Minsal\GinecologiaBundle\Entity\SrgSeguiSubsecHistoHallazgo $srgSeguiSubsecHistoHallazgo)
    {
        $this->SrgSeguiSubsecHistoHallazgo[] = $srgSeguiSubsecHistoHallazgo;

        return $this;
    }

    /**
     * Remove SrgSeguiSubsecHistoHallazgo
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgSeguiSubsecHistoHallazgo $srgSeguiSubsecHistoHallazgo
     */
    public function removeSrgSeguiSubsecHistoHallazgo(\Minsal\GinecologiaBundle\Entity\SrgSeguiSubsecHistoHallazgo $srgSeguiSubsecHistoHallazgo)
    {
        $this->SrgSeguiSubsecHistoHallazgo->removeElement($srgSeguiSubsecHistoHallazgo);
    }

    /**
     * Get SrgSeguiSubsecHistoHallazgo
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSrgSeguiSubsecHistoHallazgo()
    {
        return $this->SrgSeguiSubsecHistoHallazgo;
    }


       public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }
}
