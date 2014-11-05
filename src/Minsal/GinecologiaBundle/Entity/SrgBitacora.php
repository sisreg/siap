<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgBitacora
 *
 * @ORM\Table(name="srg_bitacora")
 * @ORM\Entity
 */
class SrgBitacora
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_bitacora_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_usuario", type="integer", nullable=true)
     */
    private $idUsuario;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion_accion", type="string", length=100, nullable=true)
     */
    private $descripcionAccion;

    /**
     * @var string
     *
     * @ORM\Column(name="tabla_involucrada", type="string", length=50, nullable=true)
     */
    private $tablaInvolucrada;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_bitacora", type="date", nullable=true)
     */
    private $fechaBitacora;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora_bitacora", type="time", nullable=true)
     */
    private $horaBitacora;



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
     * Set idUsuario
     *
     * @param integer $idUsuario
     * @return SrgBitacora
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get idUsuario
     *
     * @return integer 
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    /**
     * Set descripcionAccion
     *
     * @param string $descripcionAccion
     * @return SrgBitacora
     */
    public function setDescripcionAccion($descripcionAccion)
    {
        $this->descripcionAccion = $descripcionAccion;

        return $this;
    }

    /**
     * Get descripcionAccion
     *
     * @return string 
     */
    public function getDescripcionAccion()
    {
        return $this->descripcionAccion;
    }

    /**
     * Set tablaInvolucrada
     *
     * @param string $tablaInvolucrada
     * @return SrgBitacora
     */
    public function setTablaInvolucrada($tablaInvolucrada)
    {
        $this->tablaInvolucrada = $tablaInvolucrada;

        return $this;
    }

    /**
     * Get tablaInvolucrada
     *
     * @return string 
     */
    public function getTablaInvolucrada()
    {
        return $this->tablaInvolucrada;
    }

    /**
     * Set fechaBitacora
     *
     * @param \DateTime $fechaBitacora
     * @return SrgBitacora
     */
    public function setFechaBitacora($fechaBitacora)
    {
        $this->fechaBitacora = $fechaBitacora;

        return $this;
    }

    /**
     * Get fechaBitacora
     *
     * @return \DateTime 
     */
    public function getFechaBitacora()
    {
        return $this->fechaBitacora;
    }

    /**
     * Set horaBitacora
     *
     * @param \DateTime $horaBitacora
     * @return SrgBitacora
     */
    public function setHoraBitacora($horaBitacora)
    {
        $this->horaBitacora = $horaBitacora;

        return $this;
    }

    /**
     * Get horaBitacora
     *
     * @return \DateTime 
     */
    public function getHoraBitacora()
    {
        return $this->horaBitacora;
    }


   public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }
    
}
