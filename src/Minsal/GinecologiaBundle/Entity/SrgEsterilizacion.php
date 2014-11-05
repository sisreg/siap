<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgEsterilizacion
 *
 * @ORM\Table(name="srg_esterilizacion", indexes={@ORM\Index(name="IDX_505CC6C630F3FEEA", columns={"id_consulta_gine_pf"})})
 * @ORM\Entity
 */
class SrgEsterilizacion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_esterilizacion_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_responsable_esterilizaci", type="string", length=80, nullable=true)
     */
    private $nombreResponsableEsterilizaci;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_esterilizacion", type="date", nullable=true)
     */
    private $fechaEsterilizacion;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones_responsable_ester", type="text", nullable=true)
     */
    private $observacionesResponsableEster;

    /**
     * @var \SrgConsultaGinePf
     *
     * @ORM\OneToOne(targetEntity="SrgConsultaGinePf", inversedBy="SrgEsterilizacion")
     *   @ORM\JoinColumn(name="id_consulta_gine_pf", referencedColumnName="id")
     */
    private $idConsultaGinePf;

    /**
     * @ORM\OneToOne(targetEntity="SrgUsoAnticonceptivo", mappedBy="idEsterilizacion", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgUsoAnticonceptivo;


    /**
     * @ORM\OneToOne(targetEntity="SrgMotivoEsterilizacion", mappedBy="idEsterilizacion", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgMotivoEsterilizacion;


    /**
     * @ORM\OneToOne(targetEntity="SrgProcedimientoRealizado", mappedBy="idEsterilizacion", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgProcedimientoRealizado;








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
     * Set nombreResponsableEsterilizaci
     *
     * @param string $nombreResponsableEsterilizaci
     * @return SrgEsterilizacion
     */
    public function setNombreResponsableEsterilizaci($nombreResponsableEsterilizaci)
    {
        $this->nombreResponsableEsterilizaci = $nombreResponsableEsterilizaci;

        return $this;
    }

    /**
     * Get nombreResponsableEsterilizaci
     *
     * @return string 
     */
    public function getNombreResponsableEsterilizaci()
    {
        return $this->nombreResponsableEsterilizaci;
    }

    /**
     * Set fechaEsterilizacion
     *
     * @param \DateTime $fechaEsterilizacion
     * @return SrgEsterilizacion
     */
    public function setFechaEsterilizacion($fechaEsterilizacion)
    {
        $this->fechaEsterilizacion = $fechaEsterilizacion;

        return $this;
    }

    /**
     * Get fechaEsterilizacion
     *
     * @return \DateTime 
     */
    public function getFechaEsterilizacion()
    {
        return $this->fechaEsterilizacion;
    }

    /**
     * Set observacionesResponsableEster
     *
     * @param string $observacionesResponsableEster
     * @return SrgEsterilizacion
     */
    public function setObservacionesResponsableEster($observacionesResponsableEster)
    {
        $this->observacionesResponsableEster = $observacionesResponsableEster;

        return $this;
    }

    /**
     * Get observacionesResponsableEster
     *
     * @return string 
     */
    public function getObservacionesResponsableEster()
    {
        return $this->observacionesResponsableEster;
    }

    /**
     * Set idConsultaGinePf
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgConsultaGinePf $idConsultaGinePf
     * @return SrgEsterilizacion
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
     * Set SrgUsoAnticonceptivo
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgUsoAnticonceptivo $srgUsoAnticonceptivo
     * @return SrgEsterilizacion
     */
    public function setSrgUsoAnticonceptivo(\Minsal\GinecologiaBundle\Entity\SrgUsoAnticonceptivo $srgUsoAnticonceptivo = null)
    {
        $this->SrgUsoAnticonceptivo = $srgUsoAnticonceptivo;

        return $this;
    }

    /**
     * Get SrgUsoAnticonceptivo
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgUsoAnticonceptivo 
     */
    public function getSrgUsoAnticonceptivo()
    {
        return $this->SrgUsoAnticonceptivo;
    }

    /**
     * Set SrgMotivoEsterilizacion
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgMotivoEsterilizacion $srgMotivoEsterilizacion
     * @return SrgEsterilizacion
     */
    public function setSrgMotivoEsterilizacion(\Minsal\GinecologiaBundle\Entity\SrgMotivoEsterilizacion $srgMotivoEsterilizacion = null)
    {
        $this->SrgMotivoEsterilizacion = $srgMotivoEsterilizacion;

        return $this;
    }

    /**
     * Get SrgMotivoEsterilizacion
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgMotivoEsterilizacion 
     */
    public function getSrgMotivoEsterilizacion()
    {
        return $this->SrgMotivoEsterilizacion;
    }

    /**
     * Set SrgProcedimientoRealizado
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgProcedimientoRealizado $srgProcedimientoRealizado
     * @return SrgEsterilizacion
     */
    public function setSrgProcedimientoRealizado(\Minsal\GinecologiaBundle\Entity\SrgProcedimientoRealizado $srgProcedimientoRealizado = null)
    {
        $this->SrgProcedimientoRealizado = $srgProcedimientoRealizado;

        return $this;
    }

    /**
     * Get SrgProcedimientoRealizado
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgProcedimientoRealizado 
     */
    public function getSrgProcedimientoRealizado()
    {
        return $this->SrgProcedimientoRealizado;
    }


   public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }


    
}
