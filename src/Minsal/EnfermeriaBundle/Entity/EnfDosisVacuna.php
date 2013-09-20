<?php

namespace Minsal\EnfermeriaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EnfDosisVacuna
 *
 * @ORM\Table(name="enf_dosis_vacuna")
 * @ORM\Entity
 */
class EnfDosisVacuna
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="enf_dosis_vacuna_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=25, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="abreviatura", type="string", length=6, nullable=true)
     */
    private $abreviatura;



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
     * Set nombre
     *
     * @param string $nombre
     * @return EnfDosisVacuna
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set abreviatura
     *
     * @param string $abreviatura
     * @return EnfDosisVacuna
     */
    public function setAbreviatura($abreviatura)
    {
        $this->abreviatura = $abreviatura;

        return $this;
    }

    /**
     * Get abreviatura
     *
     * @return string 
     */
    public function getAbreviatura()
    {
        return $this->abreviatura;
    }
}
