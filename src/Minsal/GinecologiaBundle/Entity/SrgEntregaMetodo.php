<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgEntregaMetodo
 *
 * @ORM\Table(name="srg_entrega_metodo", indexes={@ORM\Index(name="IDX_CF5F7BBA33455C07", columns={"id_ctl_anticonceptivo"}), @ORM\Index(name="IDX_CF5F7BBA8B4C5407", columns={"id_inscripcion"})})
 * @ORM\Entity
 */
class SrgEntregaMetodo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_entrega_metodo_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicio_metodo", type="date", nullable=false)
     */
    private $fechaInicioMetodo;

    /**
     * @var string
     *
     * @ORM\Column(name="anticon_oral_nom", type="string", length=200, nullable=true)
     */
    private $anticonOralNom;

    /**
     * @var string
     *
     * @ORM\Column(name="indicaciones", type="string", length=200, nullable=false)
     */
    private $indicaciones;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="string", length=200, nullable=true)
     */
    private $observaciones;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_proxima_consulta", type="date", nullable=true)
     */
    private $fechaProximaConsulta;

    /**
     * @var \SrgCtlAnticonceptivo
     *
     * @ORM\ManyToOne(targetEntity="SrgCtlAnticonceptivo", inversedBy="SrgEntregaMetodo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_ctl_anticonceptivo", referencedColumnName="id")
     * })
     */
    private $idCtlAnticonceptivo;

    /**
     * @var \SrgInscripcion
     *
     * @ORM\OneToOne(targetEntity="SrgInscripcion", inversedBy="SrgEntregaMetodo")
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
     * Set fechaInicioMetodo
     *
     * @param \DateTime $fechaInicioMetodo
     * @return SrgEntregaMetodo
     */
    public function setFechaInicioMetodo($fechaInicioMetodo)
    {
        $this->fechaInicioMetodo = $fechaInicioMetodo;

        return $this;
    }

    /**
     * Get fechaInicioMetodo
     *
     * @return \DateTime 
     */
    public function getFechaInicioMetodo()
    {
        return $this->fechaInicioMetodo;
    }

    /**
     * Set anticonOralNom
     *
     * @param string $anticonOralNom
     * @return SrgEntregaMetodo
     */
    public function setAnticonOralNom($anticonOralNom)
    {
        $this->anticonOralNom = $anticonOralNom;

        return $this;
    }

    /**
     * Get anticonOralNom
     *
     * @return string 
     */
    public function getAnticonOralNom()
    {
        return $this->anticonOralNom;
    }

    /**
     * Set indicaciones
     *
     * @param string $indicaciones
     * @return SrgEntregaMetodo
     */
    public function setIndicaciones($indicaciones)
    {
        $this->indicaciones = $indicaciones;

        return $this;
    }

    /**
     * Get indicaciones
     *
     * @return string 
     */
    public function getIndicaciones()
    {
        return $this->indicaciones;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return SrgEntregaMetodo
     */
    public function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;

        return $this;
    }

    /**
     * Get observaciones
     *
     * @return string 
     */
    public function getObservaciones()
    {
        return $this->observaciones;
    }

    /**
     * Set fechaProximaConsulta
     *
     * @param \DateTime $fechaProximaConsulta
     * @return SrgEntregaMetodo
     */
    public function setFechaProximaConsulta($fechaProximaConsulta)
    {
        $this->fechaProximaConsulta = $fechaProximaConsulta;

        return $this;
    }

    /**
     * Get fechaProximaConsulta
     *
     * @return \DateTime 
     */
    public function getFechaProximaConsulta()
    {
        return $this->fechaProximaConsulta;
    }

    /**
     * Set idCtlAnticonceptivo
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgCtlAnticonceptivo $idCtlAnticonceptivo
     * @return SrgEntregaMetodo
     */
    public function setIdCtlAnticonceptivo(\Minsal\GinecologiaBundle\Entity\SrgCtlAnticonceptivo $idCtlAnticonceptivo = null)
    {
        $this->idCtlAnticonceptivo = $idCtlAnticonceptivo;

        return $this;
    }

    /**
     * Get idCtlAnticonceptivo
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgCtlAnticonceptivo 
     */
    public function getIdCtlAnticonceptivo()
    {
        return $this->idCtlAnticonceptivo;
    }

    /**
     * Set idInscripcion
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgInscripcion $idInscripcion
     * @return SrgEntregaMetodo
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
