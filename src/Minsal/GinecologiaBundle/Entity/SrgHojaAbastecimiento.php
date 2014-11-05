<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgHojaAbastecimiento
 *
 * @ORM\Table(name="srg_hoja_abastecimiento", indexes={@ORM\Index(name="IDX_E198037430F3FEEA", columns={"id_consulta_gine_pf"}), @ORM\Index(name="IDX_E1980374FF29320", columns={"id_metodo_planificacion"}), @ORM\Index(name="IDX_E198037433455C07", columns={"id_ctl_anticonceptivo"})})
 * @ORM\Entity
 */
class SrgHojaAbastecimiento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_hoja_abastecimiento_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="cantidad_entregada", type="decimal", precision=3, scale=0, nullable=false)
     */
    private $cantidadEntregada;

    /**
     * @var string
     *
     * @ORM\Column(name="usuaria_activa", type="decimal", precision=4, scale=0, nullable=true)
     */
    private $usuariaActiva;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_abasto", type="date", nullable=false)
     */
    private $fechaAbasto;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="text", nullable=true)
     */
    private $observaciones;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="proxima_cita", type="date", nullable=true)
     */
    private $proximaCita;

    /**
     * @var \SrgConsultaGinePf
     *
     * @ORM\OneToOne(targetEntity="SrgConsultaGinePf", inversedBy="SrgHojaAbastecimiento")
     *   @ORM\JoinColumn(name="id_consulta_gine_pf", referencedColumnName="id")
     */
    private $idConsultaGinePf;

    /**
     * @var \SrgCtlMetodoPlanificacion
     *
     * @ORM\ManyToOne(targetEntity="SrgCtlMetodoPlanificacion", inversedBy="SrgHojaAbastecimiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_metodo_planificacion", referencedColumnName="id")
     * })
     */
    private $idMetodoPlanificacion;

    /**
     * @var \SrgCtlAnticonceptivo
     *
     * @ORM\ManyToOne(targetEntity="SrgCtlAnticonceptivo", inversedBy="SrgHojaAbastecimiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_ctl_anticonceptivo", referencedColumnName="id")
     * })
     */
    private $idCtlAnticonceptivo;



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
     * Set cantidadEntregada
     *
     * @param string $cantidadEntregada
     * @return SrgHojaAbastecimiento
     */
    public function setCantidadEntregada($cantidadEntregada)
    {
        $this->cantidadEntregada = $cantidadEntregada;

        return $this;
    }

    /**
     * Get cantidadEntregada
     *
     * @return string 
     */
    public function getCantidadEntregada()
    {
        return $this->cantidadEntregada;
    }

    /**
     * Set usuariaActiva
     *
     * @param string $usuariaActiva
     * @return SrgHojaAbastecimiento
     */
    public function setUsuariaActiva($usuariaActiva)
    {
        $this->usuariaActiva = $usuariaActiva;

        return $this;
    }

    /**
     * Get usuariaActiva
     *
     * @return string 
     */
    public function getUsuariaActiva()
    {
        return $this->usuariaActiva;
    }

    /**
     * Set fechaAbasto
     *
     * @param \DateTime $fechaAbasto
     * @return SrgHojaAbastecimiento
     */
    public function setFechaAbasto($fechaAbasto)
    {
        $this->fechaAbasto = $fechaAbasto;

        return $this;
    }

    /**
     * Get fechaAbasto
     *
     * @return \DateTime 
     */
    public function getFechaAbasto()
    {
        return $this->fechaAbasto;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return SrgHojaAbastecimiento
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
     * Set proximaCita
     *
     * @param \DateTime $proximaCita
     * @return SrgHojaAbastecimiento
     */
    public function setProximaCita($proximaCita)
    {
        $this->proximaCita = $proximaCita;

        return $this;
    }

    /**
     * Get proximaCita
     *
     * @return \DateTime 
     */
    public function getProximaCita()
    {
        return $this->proximaCita;
    }

    /**
     * Set idConsultaGinePf
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgConsultaGinePf $idConsultaGinePf
     * @return SrgHojaAbastecimiento
     */
    public function setIdConsultaGinePf(\Minsal\GinecologiaBundle\Entity\SrgConsultaGinePf $idConsultaGinePf = null)
    {
        $this->idConsultaGinePf = $idConsultaGinePf;

        return $this;
    }

    /**
     * Get idConsultaGinePf
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgConsultaGinePf 
     */
    public function getIdConsultaGinePf()
    {
        return $this->idConsultaGinePf;
    }

    /**
     * Set idMetodoPlanificacion
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgCtlMetodoPlanificacion $idMetodoPlanificacion
     * @return SrgHojaAbastecimiento
     */
    public function setIdMetodoPlanificacion(\Minsal\GinecologiaBundle\Entity\SrgCtlMetodoPlanificacion $idMetodoPlanificacion = null)
    {
        $this->idMetodoPlanificacion = $idMetodoPlanificacion;

        return $this;
    }

    /**
     * Get idMetodoPlanificacion
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgCtlMetodoPlanificacion 
     */
    public function getIdMetodoPlanificacion()
    {
        return $this->idMetodoPlanificacion;
    }

    /**
     * Set idCtlAnticonceptivo
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgCtlAnticonceptivo $idCtlAnticonceptivo
     * @return SrgHojaAbastecimiento
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


   public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }

    
}
