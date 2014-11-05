<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgDiagnosticoRegistroDiario
 *
 * @ORM\Table(name="srg_diagnostico_registro_diario", indexes={@ORM\Index(name="IDX_2C7D47B730F3FEEA", columns={"id_consulta_gine_pf"})})
 * @ORM\Entity
 */
class SrgDiagnosticoRegistroDiario
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_diagnostico_registro_diario_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_de_consulta", type="string", length=15, nullable=true)
     */
    private $tipoDeConsulta;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_consulta_del_especialista", type="string", length=15, nullable=true)
     */
    private $tipoConsultaDelEspecialista;

    /**
     * @var string
     *
     * @ORM\Column(name="sospecha", type="string", length=15, nullable=true)
     */
    private $sospecha;

    /**
     * @var string
     *
     * @ORM\Column(name="otras_afecciones", type="string", length=15, nullable=true)
     */
    private $otrasAfecciones;

    /**
     * @var string
     *
     * @ORM\Column(name="causas_externas_de_morbilidad", type="string", length=15, nullable=true)
     */
    private $causasExternasDeMorbilidad;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_de_discapacidad", type="string", length=15, nullable=true)
     */
    private $tipoDeDiscapacidad;

    /**
     * @var \SrgConsultaGinePf
     *
     * @ORM\OneToOne(targetEntity="SrgConsultaGinePf", inversedBy="SrgDiagnosticoRegistroDiario")
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
     * Set tipoDeConsulta
     *
     * @param string $tipoDeConsulta
     * @return SrgDiagnosticoRegistroDiario
     */
    public function setTipoDeConsulta($tipoDeConsulta)
    {
        $this->tipoDeConsulta = $tipoDeConsulta;

        return $this;
    }

    /**
     * Get tipoDeConsulta
     *
     * @return string 
     */
    public function getTipoDeConsulta()
    {
        return $this->tipoDeConsulta;
    }

    /**
     * Set tipoConsultaDelEspecialista
     *
     * @param string $tipoConsultaDelEspecialista
     * @return SrgDiagnosticoRegistroDiario
     */
    public function setTipoConsultaDelEspecialista($tipoConsultaDelEspecialista)
    {
        $this->tipoConsultaDelEspecialista = $tipoConsultaDelEspecialista;

        return $this;
    }

    /**
     * Get tipoConsultaDelEspecialista
     *
     * @return string 
     */
    public function getTipoConsultaDelEspecialista()
    {
        return $this->tipoConsultaDelEspecialista;
    }

    /**
     * Set sospecha
     *
     * @param string $sospecha
     * @return SrgDiagnosticoRegistroDiario
     */
    public function setSospecha($sospecha)
    {
        $this->sospecha = $sospecha;

        return $this;
    }

    /**
     * Get sospecha
     *
     * @return string 
     */
    public function getSospecha()
    {
        return $this->sospecha;
    }

    /**
     * Set otrasAfecciones
     *
     * @param string $otrasAfecciones
     * @return SrgDiagnosticoRegistroDiario
     */
    public function setOtrasAfecciones($otrasAfecciones)
    {
        $this->otrasAfecciones = $otrasAfecciones;

        return $this;
    }

    /**
     * Get otrasAfecciones
     *
     * @return string 
     */
    public function getOtrasAfecciones()
    {
        return $this->otrasAfecciones;
    }

    /**
     * Set causasExternasDeMorbilidad
     *
     * @param string $causasExternasDeMorbilidad
     * @return SrgDiagnosticoRegistroDiario
     */
    public function setCausasExternasDeMorbilidad($causasExternasDeMorbilidad)
    {
        $this->causasExternasDeMorbilidad = $causasExternasDeMorbilidad;

        return $this;
    }

    /**
     * Get causasExternasDeMorbilidad
     *
     * @return string 
     */
    public function getCausasExternasDeMorbilidad()
    {
        return $this->causasExternasDeMorbilidad;
    }

    /**
     * Set tipoDeDiscapacidad
     *
     * @param string $tipoDeDiscapacidad
     * @return SrgDiagnosticoRegistroDiario
     */
    public function setTipoDeDiscapacidad($tipoDeDiscapacidad)
    {
        $this->tipoDeDiscapacidad = $tipoDeDiscapacidad;

        return $this;
    }

    /**
     * Get tipoDeDiscapacidad
     *
     * @return string 
     */
    public function getTipoDeDiscapacidad()
    {
        return $this->tipoDeDiscapacidad;
    }

    /**
     * Set idConsultaGinePf
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgConsultaGinePf $idConsultaGinePf
     * @return SrgDiagnosticoRegistroDiario
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
