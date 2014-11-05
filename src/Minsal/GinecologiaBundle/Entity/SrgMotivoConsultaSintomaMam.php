<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgMotivoConsultaSintomaMam
 *
 * @ORM\Table(name="srg_motivo_consulta_sintoma_mam", indexes={@ORM\Index(name="IDX_5AE96F0DB2C63F84", columns={"id_sintoma_mama"}), @ORM\Index(name="IDX_5AE96F0DCD0E2589", columns={"id_motivo_consulta"})})
 * @ORM\Entity
 */
class SrgMotivoConsultaSintomaMam
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_motivo_consulta_sintoma_mam_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \SrgCtlSintomaMama
     *
     * @ORM\ManyToOne(targetEntity="SrgCtlSintomaMama", inversedBy="SrgMotivoConsultaSintomaMam")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_sintoma_mama", referencedColumnName="id")
     * })
     */
    private $idSintomaMama;

    /**
     * @var \SrgMotivoConsulta
     *
     * @ORM\ManyToOne(targetEntity="SrgMotivoConsulta", inversedBy="SrgMotivoConsultaSintomaMam")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_motivo_consulta", referencedColumnName="id")
     * })
     */
    private $idMotivoConsulta;















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
     * @return SrgMotivoConsultaSintomaMam
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
     * Set idMotivoConsulta
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgMotivoConsulta $idMotivoConsulta
     * @return SrgMotivoConsultaSintomaMam
     */
    public function setIdMotivoConsulta(\Minsal\GinecologiaBundle\Entity\SrgMotivoConsulta $idMotivoConsulta = null)
    {
        $this->idMotivoConsulta = $idMotivoConsulta;

        return $this;
    }

    /**
     * Get idMotivoConsulta
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgMotivoConsulta 
     */
    public function getIdMotivoConsulta()
    {
        return $this->idMotivoConsulta;
    }


   public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }

    
}
