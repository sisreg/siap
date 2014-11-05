<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgConsejeriaInscripcion
 *
 * @ORM\Table(name="srg_consejeria_inscripcion", indexes={@ORM\Index(name="IDX_B52D9F438B4C5407", columns={"id_inscripcion"})})
 * @ORM\Entity
 */
class SrgConsejeriaInscripcion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_consejeria_inscripcion_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="informo_metodo", type="boolean", nullable=false)
     */
    private $informoMetodo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="mecanismo_accion", type="boolean", nullable=false)
     */
    private $mecanismoAccion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="uso_correcto", type="boolean", nullable=false)
     */
    private $usoCorrecto;

    /**
     * @var boolean
     *
     * @ORM\Column(name="efectos_secundarios", type="boolean", nullable=false)
     */
    private $efectosSecundarios;

    /**
     * @var boolean
     *
     * @ORM\Column(name="tasa_efectividad", type="boolean", nullable=false)
     */
    private $tasaEfectividad;

    /**
     * @var boolean
     *
     * @ORM\Column(name="signos_alarma", type="boolean", nullable=false)
     */
    private $signosAlarma;

    /**
     * @var boolean
     *
     * @ORM\Column(name="seguimiento", type="boolean", nullable=true)
     */
    private $seguimiento;

    /**
     * @var \SrgInscripcion
     *
     * @ORM\OneToOne(targetEntity="SrgInscripcion", inversedBy="SrgConsejeriaInscripcion")
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
     * Set informoMetodo
     *
     * @param boolean $informoMetodo
     * @return SrgConsejeriaInscripcion
     */
    public function setInformoMetodo($informoMetodo)
    {
        $this->informoMetodo = $informoMetodo;

        return $this;
    }

    /**
     * Get informoMetodo
     *
     * @return boolean 
     */
    public function getInformoMetodo()
    {
        return $this->informoMetodo;
    }

    /**
     * Set mecanismoAccion
     *
     * @param boolean $mecanismoAccion
     * @return SrgConsejeriaInscripcion
     */
    public function setMecanismoAccion($mecanismoAccion)
    {
        $this->mecanismoAccion = $mecanismoAccion;

        return $this;
    }

    /**
     * Get mecanismoAccion
     *
     * @return boolean 
     */
    public function getMecanismoAccion()
    {
        return $this->mecanismoAccion;
    }

    /**
     * Set usoCorrecto
     *
     * @param boolean $usoCorrecto
     * @return SrgConsejeriaInscripcion
     */
    public function setUsoCorrecto($usoCorrecto)
    {
        $this->usoCorrecto = $usoCorrecto;

        return $this;
    }

    /**
     * Get usoCorrecto
     *
     * @return boolean 
     */
    public function getUsoCorrecto()
    {
        return $this->usoCorrecto;
    }

    /**
     * Set efectosSecundarios
     *
     * @param boolean $efectosSecundarios
     * @return SrgConsejeriaInscripcion
     */
    public function setEfectosSecundarios($efectosSecundarios)
    {
        $this->efectosSecundarios = $efectosSecundarios;

        return $this;
    }

    /**
     * Get efectosSecundarios
     *
     * @return boolean 
     */
    public function getEfectosSecundarios()
    {
        return $this->efectosSecundarios;
    }

    /**
     * Set tasaEfectividad
     *
     * @param boolean $tasaEfectividad
     * @return SrgConsejeriaInscripcion
     */
    public function setTasaEfectividad($tasaEfectividad)
    {
        $this->tasaEfectividad = $tasaEfectividad;

        return $this;
    }

    /**
     * Get tasaEfectividad
     *
     * @return boolean 
     */
    public function getTasaEfectividad()
    {
        return $this->tasaEfectividad;
    }

    /**
     * Set signosAlarma
     *
     * @param boolean $signosAlarma
     * @return SrgConsejeriaInscripcion
     */
    public function setSignosAlarma($signosAlarma)
    {
        $this->signosAlarma = $signosAlarma;

        return $this;
    }

    /**
     * Get signosAlarma
     *
     * @return boolean 
     */
    public function getSignosAlarma()
    {
        return $this->signosAlarma;
    }

    /**
     * Set seguimiento
     *
     * @param boolean $seguimiento
     * @return SrgConsejeriaInscripcion
     */
    public function setSeguimiento($seguimiento)
    {
        $this->seguimiento = $seguimiento;

        return $this;
    }

    /**
     * Get seguimiento
     *
     * @return boolean 
     */
    public function getSeguimiento()
    {
        return $this->seguimiento;
    }

    /**
     * Set idInscripcion
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgInscripcion $idInscripcion
     * @return SrgConsejeriaInscripcion
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
