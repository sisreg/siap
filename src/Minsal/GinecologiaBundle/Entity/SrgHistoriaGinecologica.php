<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgHistoriaGinecologica
 *
 * @ORM\Table(name="srg_historia_ginecologica", indexes={@ORM\Index(name="IDX_2DF20ABF8CF23C1F", columns={"id_examen_mama"})})
 * @ORM\Entity
 */
class SrgHistoriaGinecologica
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_historia_ginecologica_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="menor_mayor_anyos", type="decimal", precision=2, scale=0, nullable=true)
     */
    private $menorMayorAnyos;

    /**
     * @var string
     *
     * @ORM\Column(name="nuligesta", type="decimal", precision=2, scale=0, nullable=true)
     */
    private $nuligesta;

    /**
     * @var boolean
     *
     * @ORM\Column(name="metodo_pf", type="boolean", nullable=true)
     */
    private $metodoPf;

    /**
     * @var boolean
     *
     * @ORM\Column(name="oral", type="boolean", nullable=true)
     */
    private $oral;

    /**
     * @var boolean
     *
     * @ORM\Column(name="iny", type="boolean", nullable=true)
     */
    private $iny;

    /**
     * @var boolean
     *
     * @ORM\Column(name="terapia_reemplazo", type="boolean", nullable=true)
     */
    private $terapiaReemplazo;

    /**
     * @var string
     *
     * @ORM\Column(name="duracion", type="decimal", precision=2, scale=0, nullable=true)
     */
    private $duracion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="embarazo_despues_treinta", type="boolean", nullable=true)
     */
    private $embarazoDespuesTreinta;

    /**
     * @var \SrgExamenMama
     *
     * @ORM\OneToOne(targetEntity="SrgExamenMama", inversedBy="SrgHistoriaGinecologica")
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
     * Set menorMayorAnyos
     *
     * @param string $menorMayorAnyos
     * @return SrgHistoriaGinecologica
     */
    public function setMenorMayorAnyos($menorMayorAnyos)
    {
        $this->menorMayorAnyos = $menorMayorAnyos;

        return $this;
    }

    /**
     * Get menorMayorAnyos
     *
     * @return string 
     */
    public function getMenorMayorAnyos()
    {
        return $this->menorMayorAnyos;
    }

    /**
     * Set nuligesta
     *
     * @param string $nuligesta
     * @return SrgHistoriaGinecologica
     */
    public function setNuligesta($nuligesta)
    {
        $this->nuligesta = $nuligesta;

        return $this;
    }

    /**
     * Get nuligesta
     *
     * @return string 
     */
    public function getNuligesta()
    {
        return $this->nuligesta;
    }

    /**
     * Set metodoPf
     *
     * @param boolean $metodoPf
     * @return SrgHistoriaGinecologica
     */
    public function setMetodoPf($metodoPf)
    {
        $this->metodoPf = $metodoPf;

        return $this;
    }

    /**
     * Get metodoPf
     *
     * @return boolean 
     */
    public function getMetodoPf()
    {
        return $this->metodoPf;
    }

    /**
     * Set oral
     *
     * @param boolean $oral
     * @return SrgHistoriaGinecologica
     */
    public function setOral($oral)
    {
        $this->oral = $oral;

        return $this;
    }

    /**
     * Get oral
     *
     * @return boolean 
     */
    public function getOral()
    {
        return $this->oral;
    }

    /**
     * Set iny
     *
     * @param boolean $iny
     * @return SrgHistoriaGinecologica
     */
    public function setIny($iny)
    {
        $this->iny = $iny;

        return $this;
    }

    /**
     * Get iny
     *
     * @return boolean 
     */
    public function getIny()
    {
        return $this->iny;
    }

    /**
     * Set terapiaReemplazo
     *
     * @param boolean $terapiaReemplazo
     * @return SrgHistoriaGinecologica
     */
    public function setTerapiaReemplazo($terapiaReemplazo)
    {
        $this->terapiaReemplazo = $terapiaReemplazo;

        return $this;
    }

    /**
     * Get terapiaReemplazo
     *
     * @return boolean 
     */
    public function getTerapiaReemplazo()
    {
        return $this->terapiaReemplazo;
    }

    /**
     * Set duracion
     *
     * @param string $duracion
     * @return SrgHistoriaGinecologica
     */
    public function setDuracion($duracion)
    {
        $this->duracion = $duracion;

        return $this;
    }

    /**
     * Get duracion
     *
     * @return string 
     */
    public function getDuracion()
    {
        return $this->duracion;
    }

    /**
     * Set embarazoDespuesTreinta
     *
     * @param boolean $embarazoDespuesTreinta
     * @return SrgHistoriaGinecologica
     */
    public function setEmbarazoDespuesTreinta($embarazoDespuesTreinta)
    {
        $this->embarazoDespuesTreinta = $embarazoDespuesTreinta;

        return $this;
    }

    /**
     * Get embarazoDespuesTreinta
     *
     * @return boolean 
     */
    public function getEmbarazoDespuesTreinta()
    {
        return $this->embarazoDespuesTreinta;
    }

    /**
     * Set idExamenMama
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgExamenMama $idExamenMama
     * @return SrgHistoriaGinecologica
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
