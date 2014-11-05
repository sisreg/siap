<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgHistoriaPersonal
 *
 * @ORM\Table(name="srg_historia_personal", indexes={@ORM\Index(name="IDX_C1875858CF23C1F", columns={"id_examen_mama"})})
 * @ORM\Entity
 */
class SrgHistoriaPersonal
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_historia_personal_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cancer_mama", type="boolean", nullable=true)
     */
    private $cancerMama;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cancer_ovario", type="boolean", nullable=true)
     */
    private $cancerOvario;

    /**
     * @var \SrgExamenMama
     *
     * @ORM\OneToOne(targetEntity="SrgExamenMama", inversedBy="SrgHistoriaPersonal")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_examen_mama", referencedColumnName="id")
     * })
     */
    private $idExamenMama;



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
     * Set cancerMama
     *
     * @param boolean $cancerMama
     * @return SrgHistoriaPersonal
     */
    public function setCancerMama($cancerMama)
    {
        $this->cancerMama = $cancerMama;

        return $this;
    }

    /**
     * Get cancerMama
     *
     * @return boolean 
     */
    public function getCancerMama()
    {
        return $this->cancerMama;
    }

    /**
     * Set cancerOvario
     *
     * @param boolean $cancerOvario
     * @return SrgHistoriaPersonal
     */
    public function setCancerOvario($cancerOvario)
    {
        $this->cancerOvario = $cancerOvario;

        return $this;
    }

    /**
     * Get cancerOvario
     *
     * @return boolean 
     */
    public function getCancerOvario()
    {
        return $this->cancerOvario;
    }

    /**
     * Set idExamenMama
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgExamenMama $idExamenMama
     * @return SrgHistoriaPersonal
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


   public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }

    
}
