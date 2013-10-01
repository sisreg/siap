<?php

namespace Minsal\EnfermeriaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EnfAplicacionDosis
 *
 * @ORM\Table(name="enf_aplicacion_dosis", indexes={@ORM\Index(name="fki_aplicacion_vacuna_dosis", columns={"id_aplicacion_vacuna"})})
 * @ORM\Entity
 */
class EnfAplicacionDosis
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="enf_aplicacion_dosis_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \EnfAplicacionVacuna
     *
     * @ORM\ManyToOne(targetEntity="EnfAplicacionVacuna")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_aplicacion_vacuna", referencedColumnName="id")
     * })
     */
    private $idAplicacionVacuna;



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
     * Set idAplicacionVacuna
     *
     * @param \Minsal\EnfermeriaBundle\Entity\EnfAplicacionVacuna $idAplicacionVacuna
     * @return EnfAplicacionDosis
     */
    public function setIdAplicacionVacuna(\Minsal\EnfermeriaBundle\Entity\EnfAplicacionVacuna $idAplicacionVacuna = null)
    {
        $this->idAplicacionVacuna = $idAplicacionVacuna;

        return $this;
    }

    /**
     * Get idAplicacionVacuna
     *
     * @return \Minsal\EnfermeriaBundle\Entity\EnfAplicacionVacuna 
     */
    public function getIdAplicacionVacuna()
    {
        return $this->idAplicacionVacuna;
    }
}
