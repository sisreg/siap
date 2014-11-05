<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgSeguimientoConsulta
 *
 * @ORM\Table(name="srg_seguimiento_consulta", indexes={@ORM\Index(name="IDX_6AE1E42730F3FEEA", columns={"id_consulta_gine_pf"})})
 * @ORM\Entity
 */
class SrgSeguimientoConsulta
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_seguimiento_consulta_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="control", type="string", length=20, nullable=true)
     */
    private $control;

    /**
     * @var string
     *
     * @ORM\Column(name="ingreso", type="string", length=20, nullable=true)
     */
    private $ingreso;

    /**
     * @var boolean
     *
     * @ORM\Column(name="alta", type="boolean", nullable=true)
     */
    private $alta;

    /**
     * @var boolean
     *
     * @ORM\Column(name="consulta_en_espera", type="boolean", nullable=true)
     */
    private $consultaEnEspera;

    /**
     * @var \SrgConsultaGinePf
     *
     * @ORM\OneToOne(targetEntity="SrgConsultaGinePf", inversedBy="SrgSeguimientoConsulta")
     *   @ORM\JoinColumn(name="id_consulta_gine_pf", referencedColumnName="id")
     */
    private $idConsultaGinePf;



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
     * Set control
     *
     * @param string $control
     * @return SrgSeguimientoConsulta
     */
    public function setControl($control)
    {
        $this->control = $control;

        return $this;
    }

    /**
     * Get control
     *
     * @return string 
     */
    public function getControl()
    {
        return $this->control;
    }

    /**
     * Set ingreso
     *
     * @param string $ingreso
     * @return SrgSeguimientoConsulta
     */
    public function setIngreso($ingreso)
    {
        $this->ingreso = $ingreso;

        return $this;
    }

    /**
     * Get ingreso
     *
     * @return string 
     */
    public function getIngreso()
    {
        return $this->ingreso;
    }

    /**
     * Set alta
     *
     * @param boolean $alta
     * @return SrgSeguimientoConsulta
     */
    public function setAlta($alta)
    {
        $this->alta = $alta;

        return $this;
    }

    /**
     * Get alta
     *
     * @return boolean 
     */
    public function getAlta()
    {
        return $this->alta;
    }

    /**
     * Set consultaEnEspera
     *
     * @param boolean $consultaEnEspera
     * @return SrgSeguimientoConsulta
     */
    public function setConsultaEnEspera($consultaEnEspera)
    {
        $this->consultaEnEspera = $consultaEnEspera;

        return $this;
    }

    /**
     * Get consultaEnEspera
     *
     * @return boolean 
     */
    public function getConsultaEnEspera()
    {
        return $this->consultaEnEspera;
    }

    /**
     * Set idConsultaGinePf
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgConsultaGinePf $idConsultaGinePf
     * @return SrgSeguimientoConsulta
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


   public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }


}
