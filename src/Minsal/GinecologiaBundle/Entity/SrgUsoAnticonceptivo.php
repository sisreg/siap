<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgUsoAnticonceptivo
 *
 * @ORM\Table(name="srg_uso_anticonceptivo", indexes={@ORM\Index(name="IDX_9B1282FE33455C07", columns={"id_ctl_anticonceptivo"}), @ORM\Index(name="IDX_9B1282FE56558889", columns={"id_esterilizacion"})})
 * @ORM\Entity
 */
class SrgUsoAnticonceptivo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_uso_anticonceptivo_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="ninguno", type="boolean", nullable=true)
     */
    private $ninguno;

    /**
     * @var string
     *
     * @ORM\Column(name="marca", type="string", length=20, nullable=true)
     */
    private $marca;

    /**
     * @var string
     *
     * @ORM\Column(name="condones_tipo", type="string", length=20, nullable=true)
     */
    private $condonesTipo;

    /**
     * @var string
     *
     * @ORM\Column(name="detalle_otros", type="string", length=20, nullable=true)
     */
    private $detalleOtros;

    /**
     * @var string
     *
     * @ORM\Column(name="donde_obtuvo", type="string", length=20, nullable=true)
     */
    private $dondeObtuvo;

    /**
     * @var \SrgCtlAnticonceptivo
     *
     * @ORM\ManyToOne(targetEntity="SrgCtlAnticonceptivo", inversedBy="SrgUsoAnticonceptivo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_ctl_anticonceptivo", referencedColumnName="id")
     * })
     */
    private $idCtlAnticonceptivo;

    /**
     * @var \SrgEsterilizacion
     *
     * @ORM\OneToOne(targetEntity="SrgEsterilizacion", inversedBy="SrgUsoAnticonceptivo")
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
     * Set ninguno
     *
     * @param boolean $ninguno
     * @return SrgUsoAnticonceptivo
     */
    public function setNinguno($ninguno)
    {
        $this->ninguno = $ninguno;

        return $this;
    }

    /**
     * Get ninguno
     *
     * @return boolean 
     */
    public function getNinguno()
    {
        return $this->ninguno;
    }

    /**
     * Set marca
     *
     * @param string $marca
     * @return SrgUsoAnticonceptivo
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    /**
     * Get marca
     *
     * @return string 
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * Set condonesTipo
     *
     * @param string $condonesTipo
     * @return SrgUsoAnticonceptivo
     */
    public function setCondonesTipo($condonesTipo)
    {
        $this->condonesTipo = $condonesTipo;

        return $this;
    }

    /**
     * Get condonesTipo
     *
     * @return string 
     */
    public function getCondonesTipo()
    {
        return $this->condonesTipo;
    }

    /**
     * Set detalleOtros
     *
     * @param string $detalleOtros
     * @return SrgUsoAnticonceptivo
     */
    public function setDetalleOtros($detalleOtros)
    {
        $this->detalleOtros = $detalleOtros;

        return $this;
    }

    /**
     * Get detalleOtros
     *
     * @return string 
     */
    public function getDetalleOtros()
    {
        return $this->detalleOtros;
    }

    /**
     * Set dondeObtuvo
     *
     * @param string $dondeObtuvo
     * @return SrgUsoAnticonceptivo
     */
    public function setDondeObtuvo($dondeObtuvo)
    {
        $this->dondeObtuvo = $dondeObtuvo;

        return $this;
    }

    /**
     * Get dondeObtuvo
     *
     * @return string 
     */
    public function getDondeObtuvo()
    {
        return $this->dondeObtuvo;
    }

    /**
     * Set idCtlAnticonceptivo
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgCtlAnticonceptivo $idCtlAnticonceptivo
     * @return SrgUsoAnticonceptivo
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
     * Set idEsterilizacion
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgEsterilizacion $idEsterilizacion
     * @return SrgUsoAnticonceptivo
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


   public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }


    
}
