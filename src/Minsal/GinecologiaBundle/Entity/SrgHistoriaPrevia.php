<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgHistoriaPrevia
 *
 * @ORM\Table(name="srg_historia_previa", indexes={@ORM\Index(name="IDX_514D3AE8CF23C1F", columns={"id_examen_mama"})})
 * @ORM\Entity
 */
class SrgHistoriaPrevia
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_historia_previa_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="biopsias_anteriores", type="boolean", nullable=true)
     */
    private $biopsiasAnteriores;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_toma", type="date", nullable=true)
     */
    private $fechaToma;

    /**
     * @var string
     *
     * @ORM\Column(name="resultado", type="string", length=200, nullable=true)
     */
    private $resultado;

    /**
     * @var boolean
     *
     * @ORM\Column(name="mastitis", type="boolean", nullable=true)
     */
    private $mastitis;

    /**
     * @var string
     *
     * @ORM\Column(name="otros", type="string", length=50, nullable=true)
     */
    private $otros;

    /**
     * @var \SrgExamenMama
     *
     * @ORM\OneToOne(targetEntity="SrgExamenMama", inversedBy="SrgHistoriaPrevia")
     *   @ORM\JoinColumn(name="id_examen_mama", referencedColumnName="id")
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
     * Set biopsiasAnteriores
     *
     * @param boolean $biopsiasAnteriores
     * @return SrgHistoriaPrevia
     */
    public function setBiopsiasAnteriores($biopsiasAnteriores)
    {
        $this->biopsiasAnteriores = $biopsiasAnteriores;

        return $this;
    }

    /**
     * Get biopsiasAnteriores
     *
     * @return boolean 
     */
    public function getBiopsiasAnteriores()
    {
        return $this->biopsiasAnteriores;
    }

    /**
     * Set fechaToma
     *
     * @param \DateTime $fechaToma
     * @return SrgHistoriaPrevia
     */
    public function setFechaToma($fechaToma)
    {
        $this->fechaToma = $fechaToma;

        return $this;
    }

    /**
     * Get fechaToma
     *
     * @return \DateTime 
     */
    public function getFechaToma()
    {
        return $this->fechaToma;
    }

    /**
     * Set resultado
     *
     * @param string $resultado
     * @return SrgHistoriaPrevia
     */
    public function setResultado($resultado)
    {
        $this->resultado = $resultado;

        return $this;
    }

    /**
     * Get resultado
     *
     * @return string 
     */
    public function getResultado()
    {
        return $this->resultado;
    }

    /**
     * Set mastitis
     *
     * @param boolean $mastitis
     * @return SrgHistoriaPrevia
     */
    public function setMastitis($mastitis)
    {
        $this->mastitis = $mastitis;

        return $this;
    }

    /**
     * Get mastitis
     *
     * @return boolean 
     */
    public function getMastitis()
    {
        return $this->mastitis;
    }

    /**
     * Set otros
     *
     * @param string $otros
     * @return SrgHistoriaPrevia
     */
    public function setOtros($otros)
    {
        $this->otros = $otros;

        return $this;
    }

    /**
     * Get otros
     *
     * @return string 
     */
    public function getOtros()
    {
        return $this->otros;
    }

    /**
     * Set idExamenMama
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgExamenMama $idExamenMama
     * @return SrgHistoriaPrevia
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
