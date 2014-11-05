<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgMotivoConsulta
 *
 * @ORM\Table(name="srg_motivo_consulta", indexes={@ORM\Index(name="IDX_2B6B70C68CF23C1F", columns={"id_examen_mama"})})
 * @ORM\Entity
 */
class SrgMotivoConsulta
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_motivo_consulta_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="otro", type="string", length=50, nullable=true)
     */
    private $otro;

    /**
     * @var \SrgExamenMama
     *
     * @ORM\OneToOne(targetEntity="SrgExamenMama", inversedBy="SrgMotivoConsulta")
     *   @ORM\JoinColumn(name="id_examen_mama", referencedColumnName="id")
     */
    private $idExamenMama;


    /**
     * @ORM\OneToMany(targetEntity="SrgMotivoConsultaSintomaMam", mappedBy="idMotivoConsulta", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgMotivoConsultaSintomaMam;







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
     * Set otro
     *
     * @param string $otro
     * @return SrgMotivoConsulta
     */
    public function setOtro($otro)
    {
        $this->otro = $otro;

        return $this;
    }

    /**
     * Get otro
     *
     * @return string 
     */
    public function getOtro()
    {
        return $this->otro;
    }

    /**
     * Set idExamenMama
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgExamenMama $idExamenMama
     * @return SrgMotivoConsulta
     */
    public function setIdExamenMama(\Minsal\GinecologiaBundle\Entity\SrgExamenMama $idExamenMama = null)
    {
        $this->idExamenMama = $idExamenMama;

        return $this;
    }

    /**
     * Get idExamenMama
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgExamenMama 
     */
    public function getIdExamenMama()
    {
        return $this->idExamenMama;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->SrgMotivoConsultaSintomaMam = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add SrgMotivoConsultaSintomaMam
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgMotivoConsultaSintomaMam $srgMotivoConsultaSintomaMam
     * @return SrgMotivoConsulta
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

   public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }

    
}
