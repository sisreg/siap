<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgCtlHallazgoMama
 *
 * @ORM\Table(name="srg_ctl_hallazgo_mama")
 * @ORM\Entity
 */
class SrgCtlHallazgoMama
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_ctl_hallazgo_mama_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="hallazo_mama", type="string", length=60, nullable=false)
     */
    private $hallazoMama;




    /**
     *
     * @ORM\OneToMany(targetEntity="SrgHallazoMamaIzq", mappedBy="idHallazgoMama", cascade={"all"}, orphanRemoval=true)
     *
     */
    private $SrgHallazoMamaIzq;



    /**
     *
     * @ORM\OneToMany(targetEntity="SrgHallazgoMamaDer", mappedBy="idHallazgoMama", cascade={"all"}, orphanRemoval=true)
     *
     */
    private $SrgHallazgoMamaDer;





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
     * Set hallazoMama
     *
     * @param string $hallazoMama
     * @return SrgCtlHallazgoMama
     */
    public function setHallazoMama($hallazoMama)
    {
        $this->hallazoMama = $hallazoMama;

        return $this;
    }

    /**
     * Get hallazoMama
     *
     * @return string 
     */
    public function getHallazoMama()
    {
        return $this->hallazoMama;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->SrgHallazoMamaIzq = new \Doctrine\Common\Collections\ArrayCollection();
        $this->SrgHallazgoMamaDer = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add SrgHallazoMamaIzq
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgHallazoMamaIzq $srgHallazoMamaIzq
     * @return SrgCtlHallazgoMama
     */
    public function addSrgHallazoMamaIzq(\Minsal\GinecologiaBundle\Entity\SrgHallazoMamaIzq $srgHallazoMamaIzq)
    {
        $this->SrgHallazoMamaIzq[] = $srgHallazoMamaIzq;

        return $this;
    }

    /**
     * Remove SrgHallazoMamaIzq
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgHallazoMamaIzq $srgHallazoMamaIzq
     */
    public function removeSrgHallazoMamaIzq(\Minsal\GinecologiaBundle\Entity\SrgHallazoMamaIzq $srgHallazoMamaIzq)
    {
        $this->SrgHallazoMamaIzq->removeElement($srgHallazoMamaIzq);
    }

    /**
     * Get SrgHallazoMamaIzq
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSrgHallazoMamaIzq()
    {
        return $this->SrgHallazoMamaIzq;
    }

    /**
     * Add SrgHallazgoMamaDer
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgHallazgoMamaDer $srgHallazgoMamaDer
     * @return SrgCtlHallazgoMama
     */
    public function addSrgHallazgoMamaDer(\Minsal\GinecologiaBundle\Entity\SrgHallazgoMamaDer $srgHallazgoMamaDer)
    {
        $this->SrgHallazgoMamaDer[] = $srgHallazgoMamaDer;

        return $this;
    }

    /**
     * Remove SrgHallazgoMamaDer
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgHallazgoMamaDer $srgHallazgoMamaDer
     */
    public function removeSrgHallazgoMamaDer(\Minsal\GinecologiaBundle\Entity\SrgHallazgoMamaDer $srgHallazgoMamaDer)
    {
        $this->SrgHallazgoMamaDer->removeElement($srgHallazgoMamaDer);
    }

    /**
     * Get SrgHallazgoMamaDer
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSrgHallazgoMamaDer()
    {
        return $this->SrgHallazgoMamaDer;
    }

   public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }


    
}
