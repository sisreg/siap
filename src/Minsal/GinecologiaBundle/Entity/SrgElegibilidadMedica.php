<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgElegibilidadMedica
 *
 * @ORM\Table(name="srg_elegibilidad_medica", indexes={@ORM\Index(name="IDX_2F291A079F7B4D5B", columns={"id_criterio_elegibilidad"}), @ORM\Index(name="IDX_2F291A078B4C5407", columns={"id_inscripcion"})})
 * @ORM\Entity
 */
class SrgElegibilidadMedica
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_elegibilidad_medica_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \SrgCtlCriterioElegibilidad
     *
     * @ORM\ManyToOne(targetEntity="SrgCtlCriterioElegibilidad", inversedBy="SrgElegibilidadMedica")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_criterio_elegibilidad", referencedColumnName="id")
     * })
     */
    private $idCriterioElegibilidad;

    /**
     * @var \SrgInscripcion
     *
     * @ORM\ManyToOne(targetEntity="SrgInscripcion", inversedBy="SrgElegibilidadMedica")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_inscripcion", referencedColumnName="id")
     * })
     */
    private $idInscripcion;



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
     * Set idCriterioElegibilidad
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgCtlCriterioElegibilidad $idCriterioElegibilidad
     * @return SrgElegibilidadMedica
     */
    public function setIdCriterioElegibilidad(\Minsal\GinecologiaBundle\Entity\SrgCtlCriterioElegibilidad $idCriterioElegibilidad = null)
    {
        $this->idCriterioElegibilidad = $idCriterioElegibilidad;

        return $this;
    }

    /**
     * Get idCriterioElegibilidad
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgCtlCriterioElegibilidad 
     */
    public function getIdCriterioElegibilidad()
    {
        return $this->idCriterioElegibilidad;
    }

    /**
     * Set idInscripcion
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgInscripcion $idInscripcion
     * @return SrgElegibilidadMedica
     */
    public function setIdInscripcion(\Minsal\GinecologiaBundle\Entity\SrgInscripcion $idInscripcion = null)
    {
        $this->idInscripcion = $idInscripcion;

        return $this;
    }

    /**
     * Get idInscripcion
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgInscripcion 
     */
    public function getIdInscripcion()
    {
        return $this->idInscripcion;
    }

   public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }


    
}
