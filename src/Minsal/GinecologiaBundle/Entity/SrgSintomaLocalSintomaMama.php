<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgSintomaLocalSintomaMama
 *
 * @ORM\Table(name="srg_sintoma_local_sintoma_mama", indexes={@ORM\Index(name="idx_76211bbbb2c63f84", columns={"id_sintoma_mama"}), @ORM\Index(name="idx_76211bbbab403071", columns={"id_sintoma_local"})})
 * @ORM\Entity
 */
class SrgSintomaLocalSintomaMama
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_sintoma_local_sintoma_mama_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \SrgCtlSintomaMama
     *
     * @ORM\ManyToOne(targetEntity="SrgCtlSintomaMama", inversedBy="SrgSintomaLocalSintomaMama")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_sintoma_mama", referencedColumnName="id")
     * })
     */
    private $idSintomaMama;

    /**
     * @var \SrgSintomaLocal
     *
     * @ORM\ManyToOne(targetEntity="SrgSintomaLocal", inversedBy="SrgSintomaLocalSintomaMama")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_sintoma_local", referencedColumnName="id")
     * })
     */
    private $idSintomaLocal;







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
     * Set idSintomaMama
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgCtlSintomaMama $idSintomaMama
     * @return SrgSintomaLocalSintomaMama
     */
    public function setIdSintomaMama(\Minsal\GinecologiaBundle\Entity\SrgCtlSintomaMama $idSintomaMama = null)
    {
        $this->idSintomaMama = $idSintomaMama;

        return $this;
    }

    /**
     * Get idSintomaMama
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgCtlSintomaMama 
     */
    public function getIdSintomaMama()
    {
        return $this->idSintomaMama;
    }

    /**
     * Set idSintomaLocal
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgSintomaLocal $idSintomaLocal
     * @return SrgSintomaLocalSintomaMama
     */
    public function setIdSintomaLocal(\Minsal\GinecologiaBundle\Entity\SrgSintomaLocal $idSintomaLocal = null)
    {
        $this->idSintomaLocal = $idSintomaLocal;

        return $this;
    }

    /**
     * Get idSintomaLocal
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgSintomaLocal 
     */
    public function getIdSintomaLocal()
    {
        return $this->idSintomaLocal;
    }


   public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }

    
}
