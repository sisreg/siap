<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgCtlSintomaMama
 *
 * @ORM\Table(name="srg_ctl_sintoma_mama")
 * @ORM\Entity
 */
class SrgCtlSintomaMama
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_ctl_sintoma_mama_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="sintoma", type="string", length=50, nullable=false)
     */
    private $sintoma;




    /**
     * @ORM\OneToMany(targetEntity="SrgMotivoConsultaSintomaMam", mappedBy="idSintomaMama", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgMotivoConsultaSintomaMam;




    /**
     * @ORM\OneToMany(targetEntity="SrgSintomaLocalSintomaMama", mappedBy="idSintomaMama", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgSintomaLocalSintomaMama;





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
     * Set sintoma
     *
     * @param string $sintoma
     * @return SrgCtlSintomaMama
     */
    public function setSintoma($sintoma)
    {
        $this->sintoma = $sintoma;

        return $this;
    }

    /**
     * Get sintoma
     *
     * @return string 
     */
    public function getSintoma()
    {
        return $this->sintoma;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->SrgMotivoConsultaSintomaMam = new \Doctrine\Common\Collections\ArrayCollection();
        $this->SrgSintomaLocalSintomaMama = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add SrgMotivoConsultaSintomaMam
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgMotivoConsultaSintomaMam $srgMotivoConsultaSintomaMam
     * @return SrgCtlSintomaMama
     */
    public function addSrgMotivoConsultaSintomaMam(\Minsal\GinecologiaBundle\Entity\SrgMotivoConsultaSintomaMam $srgMotivoConsultaSintomaMam)
    {
        $this->SrgMotivoConsultaSintomaMam[] = $srgMotivoConsultaSintomaMam;

        return $this;
    }

    /**
     * Remove SrgMotivoConsultaSintomaMam
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgMotivoConsultaSintomaMam $srgMotivoConsultaSintomaMam
     */
    public function removeSrgMotivoConsultaSintomaMam(\Minsal\GinecologiaBundle\Entity\SrgMotivoConsultaSintomaMam $srgMotivoConsultaSintomaMam)
    {
        $this->SrgMotivoConsultaSintomaMam->removeElement($srgMotivoConsultaSintomaMam);
    }

    /**
     * Get SrgMotivoConsultaSintomaMam
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSrgMotivoConsultaSintomaMam()
    {
        return $this->SrgMotivoConsultaSintomaMam;
    }

    /**
     * Add SrgSintomaLocalSintomaMama
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgSintomaLocalSintomaMama $srgSintomaLocalSintomaMama
     * @return SrgCtlSintomaMama
     */
    public function addSrgSintomaLocalSintomaMama(\Minsal\GinecologiaBundle\Entity\SrgSintomaLocalSintomaMama $srgSintomaLocalSintomaMama)
    {
        $this->SrgSintomaLocalSintomaMama[] = $srgSintomaLocalSintomaMama;

        return $this;
    }

    /**
     * Remove SrgSintomaLocalSintomaMama
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgSintomaLocalSintomaMama $srgSintomaLocalSintomaMama
     */
    public function removeSrgSintomaLocalSintomaMama(\Minsal\GinecologiaBundle\Entity\SrgSintomaLocalSintomaMama $srgSintomaLocalSintomaMama)
    {
        $this->SrgSintomaLocalSintomaMama->removeElement($srgSintomaLocalSintomaMama);
    }

    /**
     * Get SrgSintomaLocalSintomaMama
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSrgSintomaLocalSintomaMama()
    {
        return $this->SrgSintomaLocalSintomaMama;
    }


   public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }

    
}
