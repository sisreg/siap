<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgHallazgoMamaDer
 *
 * @ORM\Table(name="srg_hallazgo_mama_der", indexes={@ORM\Index(name="IDX_12D104ECD6891B1E", columns={"id_hallazgo_mama"}), @ORM\Index(name="IDX_12D104ECF47A39CB", columns={"id_resultado_explora_fisica"})})
 * @ORM\Entity
 */
class SrgHallazgoMamaDer
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_hallazgo_mama_der_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \SrgCtlHallazgoMama
     *
     * @ORM\ManyToOne(targetEntity="SrgCtlHallazgoMama", inversedBy="SrgHallazgoMamaDer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_hallazgo_mama", referencedColumnName="id")
     * })
     */
    private $idHallazgoMama;

    /**
     * @var \SrgResultadoExploraFisica
     *
     * @ORM\ManyToOne(targetEntity="SrgResultadoExploraFisica", inversedBy="SrgHallazgoMamaDer")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_resultado_explora_fisica", referencedColumnName="id")
     * })
     */
    private $idResultadoExploraFisica;



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
     * Set idHallazgoMama
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgCtlHallazgoMama $idHallazgoMama
     * @return SrgHallazgoMamaDer
     */
    public function setIdHallazgoMama(\Minsal\GinecologiaBundle\Entity\SrgCtlHallazgoMama $idHallazgoMama = null)
    {
        $this->idHallazgoMama = $idHallazgoMama;

        return $this;
    }

    /**
     * Get idHallazgoMama
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgCtlHallazgoMama 
     */
    public function getIdHallazgoMama()
    {
        return $this->idHallazgoMama;
    }

    /**
     * Set idResultadoExploraFisica
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgResultadoExploraFisica $idResultadoExploraFisica
     * @return SrgHallazgoMamaDer
     */
    public function setIdResultadoExploraFisica(\Minsal\GinecologiaBundle\Entity\SrgResultadoExploraFisica $idResultadoExploraFisica = null)
    {
        $this->idResultadoExploraFisica = $idResultadoExploraFisica;

        return $this;
    }

    /**
     * Get idResultadoExploraFisica
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgResultadoExploraFisica 
     */
    public function getIdResultadoExploraFisica()
    {
        return $this->idResultadoExploraFisica;
    }


   public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }

    
}
