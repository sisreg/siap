<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgOrganismoCervicoMicroorga
 *
 * @ORM\Table(name="srg_organismo_cervico_microorga", indexes={@ORM\Index(name="IDX_83F47F1A5C2159B1", columns={"id_microorganismo"}), @ORM\Index(name="IDX_83F47F1AEB85EB8B", columns={"id_organismo_cervico"})})
 * @ORM\Entity
 */
class SrgOrganismoCervicoMicroorga
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_organismo_cervico_microorga_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \SrgCtlMicroorganismo
     *
     * @ORM\ManyToOne(targetEntity="SrgCtlMicroorganismo", inversedBy="SrgOrganismoCervicoMicroorga")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_microorganismo", referencedColumnName="id")
     * })
     */
    private $idMicroorganismo;

    /**
     * @var \SrgOrganismoCervico
     *
     * @ORM\ManyToOne(targetEntity="SrgOrganismoCervico", inversedBy="SrgOrganismoCervicoMicroorga")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_organismo_cervico", referencedColumnName="id")
     * })
     */
    private $idOrganismoCervico;



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
     * Set idMicroorganismo
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgCtlMicroorganismo $idMicroorganismo
     * @return SrgOrganismoCervicoMicroorga
     */
    public function setIdMicroorganismo(\Minsal\GinecologiaBundle\Entity\SrgCtlMicroorganismo $idMicroorganismo = null)
    {
        $this->idMicroorganismo = $idMicroorganismo;

        return $this;
    }

    /**
     * Get idMicroorganismo
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgCtlMicroorganismo 
     */
    public function getIdMicroorganismo()
    {
        return $this->idMicroorganismo;
    }

    /**
     * Set idOrganismoCervico
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgOrganismoCervico $idOrganismoCervico
     * @return SrgOrganismoCervicoMicroorga
     */
    public function setIdOrganismoCervico(\Minsal\GinecologiaBundle\Entity\SrgOrganismoCervico $idOrganismoCervico = null)
    {
        $this->idOrganismoCervico = $idOrganismoCervico;

        return $this;
    }

    /**
     * Get idOrganismoCervico
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgOrganismoCervico 
     */
    public function getIdOrganismoCervico()
    {
        return $this->idOrganismoCervico;
    }



   public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }
    
}
