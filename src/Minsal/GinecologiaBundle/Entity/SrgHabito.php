<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgHabito
 *
 * @ORM\Table(name="srg_habito", indexes={@ORM\Index(name="IDX_2F9051948CF23C1F", columns={"id_examen_mama"})})
 * @ORM\Entity
 */
class SrgHabito
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_habito_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="obesidad_posmeno", type="boolean", nullable=true)
     */
    private $obesidadPosmeno;

    /**
     * @var boolean
     *
     * @ORM\Column(name="tabaco", type="boolean", nullable=true)
     */
    private $tabaco;

    /**
     * @var boolean
     *
     * @ORM\Column(name="alcohol", type="boolean", nullable=true)
     */
    private $alcohol;

    /**
     * @var \SrgExamenMama
     *
     * @ORM\OneToOne(targetEntity="SrgExamenMama", inversedBy="SrgHabito")
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
     * Set obesidadPosmeno
     *
     * @param boolean $obesidadPosmeno
     * @return SrgHabito
     */
    public function setObesidadPosmeno($obesidadPosmeno)
    {
        $this->obesidadPosmeno = $obesidadPosmeno;

        return $this;
    }

    /**
     * Get obesidadPosmeno
     *
     * @return boolean 
     */
    public function getObesidadPosmeno()
    {
        return $this->obesidadPosmeno;
    }

    /**
     * Set tabaco
     *
     * @param boolean $tabaco
     * @return SrgHabito
     */
    public function setTabaco($tabaco)
    {
        $this->tabaco = $tabaco;

        return $this;
    }

    /**
     * Get tabaco
     *
     * @return boolean 
     */
    public function getTabaco()
    {
        return $this->tabaco;
    }

    /**
     * Set alcohol
     *
     * @param boolean $alcohol
     * @return SrgHabito
     */
    public function setAlcohol($alcohol)
    {
        $this->alcohol = $alcohol;

        return $this;
    }

    /**
     * Get alcohol
     *
     * @return boolean 
     */
    public function getAlcohol()
    {
        return $this->alcohol;
    }

    /**
     * Set idExamenMama
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgExamenMama $idExamenMama
     * @return SrgHabito
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
