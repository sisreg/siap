<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgExamenFisicoInscripcion
 *
 * @ORM\Table(name="srg_examen_fisico_inscripcion", indexes={@ORM\Index(name="IDX_7BFE67068B4C5407", columns={"id_inscripcion"})})
 * @ORM\Entity
 */
class SrgExamenFisicoInscripcion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_examen_fisico_inscripcion_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="estado_mamas", type="string", length=1, nullable=true)
     */
    private $estadoMamas;

    /**
     * @var string
     *
     * @ORM\Column(name="estado_mamas_detalle", type="string", length=100, nullable=true)
     */
    private $estadoMamasDetalle;

    /**
     * @var string
     *
     * @ORM\Column(name="estado_abdomen", type="string", length=1, nullable=true)
     */
    private $estadoAbdomen;

    /**
     * @var string
     *
     * @ORM\Column(name="estado_abdomen_detalle", type="string", length=100, nullable=true)
     */
    private $estadoAbdomenDetalle;

    /**
     * @var string
     *
     * @ORM\Column(name="estado_miembros", type="string", length=1, nullable=true)
     */
    private $estadoMiembros;

    /**
     * @var string
     *
     * @ORM\Column(name="estado_miembros_detalle", type="string", length=100, nullable=true)
     */
    private $estadoMiembrosDetalle;

    /**
     * @var \SrgInscripcion
     *
     * @ORM\OneToOne(targetEntity="SrgInscripcion", inversedBy="SrgExamenFisicoInscripcion")
     *   @ORM\JoinColumn(name="id_inscripcion", referencedColumnName="id")
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
     * Set estadoMamas
     *
     * @param string $estadoMamas
     * @return SrgExamenFisicoInscripcion
     */
    public function setEstadoMamas($estadoMamas)
    {
        $this->estadoMamas = $estadoMamas;

        return $this;
    }

    /**
     * Get estadoMamas
     *
     * @return string 
     */
    public function getEstadoMamas()
    {
        return $this->estadoMamas;
    }

    /**
     * Set estadoMamasDetalle
     *
     * @param string $estadoMamasDetalle
     * @return SrgExamenFisicoInscripcion
     */
    public function setEstadoMamasDetalle($estadoMamasDetalle)
    {
        $this->estadoMamasDetalle = $estadoMamasDetalle;

        return $this;
    }

    /**
     * Get estadoMamasDetalle
     *
     * @return string 
     */
    public function getEstadoMamasDetalle()
    {
        return $this->estadoMamasDetalle;
    }

    /**
     * Set estadoAbdomen
     *
     * @param string $estadoAbdomen
     * @return SrgExamenFisicoInscripcion
     */
    public function setEstadoAbdomen($estadoAbdomen)
    {
        $this->estadoAbdomen = $estadoAbdomen;

        return $this;
    }

    /**
     * Get estadoAbdomen
     *
     * @return string 
     */
    public function getEstadoAbdomen()
    {
        return $this->estadoAbdomen;
    }

    /**
     * Set estadoAbdomenDetalle
     *
     * @param string $estadoAbdomenDetalle
     * @return SrgExamenFisicoInscripcion
     */
    public function setEstadoAbdomenDetalle($estadoAbdomenDetalle)
    {
        $this->estadoAbdomenDetalle = $estadoAbdomenDetalle;

        return $this;
    }

    /**
     * Get estadoAbdomenDetalle
     *
     * @return string 
     */
    public function getEstadoAbdomenDetalle()
    {
        return $this->estadoAbdomenDetalle;
    }

    /**
     * Set estadoMiembros
     *
     * @param string $estadoMiembros
     * @return SrgExamenFisicoInscripcion
     */
    public function setEstadoMiembros($estadoMiembros)
    {
        $this->estadoMiembros = $estadoMiembros;

        return $this;
    }

    /**
     * Get estadoMiembros
     *
     * @return string 
     */
    public function getEstadoMiembros()
    {
        return $this->estadoMiembros;
    }

    /**
     * Set estadoMiembrosDetalle
     *
     * @param string $estadoMiembrosDetalle
     * @return SrgExamenFisicoInscripcion
     */
    public function setEstadoMiembrosDetalle($estadoMiembrosDetalle)
    {
        $this->estadoMiembrosDetalle = $estadoMiembrosDetalle;

        return $this;
    }

    /**
     * Get estadoMiembrosDetalle
     *
     * @return string 
     */
    public function getEstadoMiembrosDetalle()
    {
        return $this->estadoMiembrosDetalle;
    }

    /**
     * Set idInscripcion
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgInscripcion $idInscripcion
     * @return SrgExamenFisicoInscripcion
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
