<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgHallazoMamaIzq
 *
 * @ORM\Table(name="srg_hallazo_mama_izq", indexes={@ORM\Index(name="IDX_1892A237D6891B1E", columns={"id_hallazgo_mama"}), @ORM\Index(name="IDX_1892A237F47A39CB", columns={"id_resultado_explora_fisica"})})
 * @ORM\Entity
 */
class SrgHallazoMamaIzq
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_hallazo_mama_izq_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \SrgCtlHallazgoMama
     *
     * @ORM\ManyToOne(targetEntity="SrgCtlHallazgoMama", inversedBy="SrgHallazoMamaIzq")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_hallazgo_mama", referencedColumnName="id")
     * })
     */
    private $idHallazgoMama;

    /**
     * @var \SrgResultadoExploraFisica
     *
     * @ORM\ManyToOne(targetEntity="SrgResultadoExploraFisica", inversedBy="SrgHallazoMamaIzq")
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
     * @return SrgHallazoMamaIzq
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
     * @return SrgHallazoMamaIzq
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
