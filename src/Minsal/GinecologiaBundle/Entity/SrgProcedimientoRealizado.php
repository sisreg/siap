<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgProcedimientoRealizado
 *
 * @ORM\Table(name="srg_procedimiento_realizado", indexes={@ORM\Index(name="IDX_E0692D2C35600AAE", columns={"id_procedimiento_esterilizacion"}), @ORM\Index(name="IDX_E0692D2C56558889", columns={"id_esterilizacion"})})
 * @ORM\Entity
 */
class SrgProcedimientoRealizado
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_procedimiento_realizado_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="otro_procedimiento", type="boolean", nullable=true)
     */
    private $otroProcedimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="dias_estancia", type="decimal", precision=99, scale=0, nullable=true)
     */
    private $diasEstancia;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones_complicaciones", type="string", length=200, nullable=true)
     */
    private $observacionesComplicaciones;

    /**
     * @var \SrgCtlProcedimientoEsteriliz
     *
     * @ORM\ManyToOne(targetEntity="SrgCtlProcedimientoEsteriliz", inversedBy="SrgProcedimientoRealizado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_procedimiento_esterilizacion", referencedColumnName="id")
     * })
     */
    private $idProcedimientoEsterilizacion;

    /**
     * @var \SrgEsterilizacion
     *
     * @ORM\OneToOne(targetEntity="SrgEsterilizacion", inversedBy="SrgProcedimientoRealizado")
     *   @ORM\JoinColumn(name="id_esterilizacion", referencedColumnName="id")
     */
    private $idEsterilizacion;



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
     * Set idProcedimientoEsterilizacion
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgCtlProcedimientoEsteriliz $idProcedimientoEsterilizacion
     * @return SrgProcedimientoRealizado
     */
    public function setIdProcedimientoEsterilizacion(\Minsal\GinecologiaBundle\Entity\SrgCtlProcedimientoEsteriliz $idProcedimientoEsterilizacion = null)
    {
        $this->idProcedimientoEsterilizacion = $idProcedimientoEsterilizacion;

        return $this;
    }

    /**
     * Get idProcedimientoEsterilizacion
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgCtlProcedimientoEsteriliz 
     */
    public function getIdProcedimientoEsterilizacion()
    {
        return $this->idProcedimientoEsterilizacion;
    }

    /**
     * Set idEsterilizacion
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgEsterilizacion $idEsterilizacion
     * @return SrgProcedimientoRealizado
     */
    public function setIdEsterilizacion(\Minsal\GinecologiaBundle\Entity\SrgEsterilizacion $idEsterilizacion = null)
    {
        $this->idEsterilizacion = $idEsterilizacion;

        return $this;
    }

    /**
     * Get idEsterilizacion
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgEsterilizacion 
     */
    public function getIdEsterilizacion()
    {
        return $this->idEsterilizacion;
    }

    /**
     * Set otroProcedimiento
     *
     * @param boolean $otroProcedimiento
     * @return SrgProcedimientoRealizado
     */
    public function setOtroProcedimiento($otroProcedimiento)
    {
        $this->otroProcedimiento = $otroProcedimiento;

        return $this;
    }

    /**
     * Get otroProcedimiento
     *
     * @return boolean 
     */
    public function getOtroProcedimiento()
    {
        return $this->otroProcedimiento;
    }

    /**
     * Set diasEstancia
     *
     * @param string $diasEstancia
     * @return SrgProcedimientoRealizado
     */
    public function setDiasEstancia($diasEstancia)
    {
        $this->diasEstancia = $diasEstancia;

        return $this;
    }

    /**
     * Get diasEstancia
     *
     * @return string 
     */
    public function getDiasEstancia()
    {
        return $this->diasEstancia;
    }

    /**
     * Set observacionesComplicaciones
     *
     * @param string $observacionesComplicaciones
     * @return SrgProcedimientoRealizado
     */
    public function setObservacionesComplicaciones($observacionesComplicaciones)
    {
        $this->observacionesComplicaciones = $observacionesComplicaciones;

        return $this;
    }

    /**
     * Get observacionesComplicaciones
     *
     * @return string 
     */
    public function getObservacionesComplicaciones()
    {
        return $this->observacionesComplicaciones;
    }

   public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }


    
}
