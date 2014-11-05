<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgAntecedenteGinecologico
 *
 * @ORM\Table(name="srg_antecedente_ginecologico", indexes={@ORM\Index(name="IDX_B1CD43DA30F3FEEA", columns={"id_consulta_gine_pf"})})
 * @ORM\Entity
 */
class SrgAntecedenteGinecologico
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_antecedente_ginecologico_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fur1", type="date", nullable=true)
     */
    private $fur1;

    /**
     * @var boolean
     *
     * @ORM\Column(name="dismenorrea", type="boolean", nullable=true)
     */
    private $dismenorrea;

    /**
     * @var string
     *
     * @ORM\Column(name="ciclos_menstruales", type="string", length=3, nullable=true)
     */
    private $ciclosMenstruales;

    /**
     * @var string
     *
     * @ORM\Column(name="duracion_del_ciclo", type="decimal", precision=3, scale=0, nullable=true)
     */
    private $duracionDelCiclo;

    /**
     * @var string
     *
     * @ORM\Column(name="sangramientos", type="string", length=4, nullable=true)
     */
    private $sangramientos;

    /**
     * @var string
     *
     * @ORM\Column(name="duracion_del_sangramiento", type="decimal", precision=2, scale=0, nullable=true)
     */
    private $duracionDelSangramiento;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_ultimo_pap", type="date", nullable=true)
     */
    private $fechaUltimoPap;

    /**
     * @var string
     *
     * @ORM\Column(name="resultado_ultimo_pap", type="string", length=200, nullable=true)
     */
    private $resultadoUltimoPap;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="text", nullable=true)
     */
    private $observaciones;

    /**
     * @var boolean
     *
     * @ORM\Column(name="esta_lactando", type="boolean", nullable=false)
     */
    private $estaLactando;

    /**
     * @var \SrgConsultaGinePf
     *
     * @ORM\OneToOne(targetEntity="SrgConsultaGinePf", inversedBy="SrgAntecedenteGinecologico")
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
     * Set fur1
     *
     * @param \DateTime $fur1
     * @return SrgAntecedenteGinecologico
     */
    public function setFur1($fur1)
    {
        $this->fur1 = $fur1;

        return $this;
    }

    /**
     * Get fur1
     *
     * @return \DateTime 
     */
    public function getFur1()
    {
        return $this->fur1;
    }

    /**
     * Set dismenorrea
     *
     * @param boolean $dismenorrea
     * @return SrgAntecedenteGinecologico
     */
    public function setDismenorrea($dismenorrea)
    {
        $this->dismenorrea = $dismenorrea;

        return $this;
    }

    /**
     * Get dismenorrea
     *
     * @return boolean 
     */
    public function getDismenorrea()
    {
        return $this->dismenorrea;
    }

    /**
     * Set ciclosMenstruales
     *
     * @param string $ciclosMenstruales
     * @return SrgAntecedenteGinecologico
     */
    public function setCiclosMenstruales($ciclosMenstruales)
    {
        $this->ciclosMenstruales = $ciclosMenstruales;

        return $this;
    }

    /**
     * Get ciclosMenstruales
     *
     * @return string 
     */
    public function getCiclosMenstruales()
    {
        return $this->ciclosMenstruales;
    }

    /**
     * Set duracionDelCiclo
     *
     * @param string $duracionDelCiclo
     * @return SrgAntecedenteGinecologico
     */
    public function setDuracionDelCiclo($duracionDelCiclo)
    {
        $this->duracionDelCiclo = $duracionDelCiclo;

        return $this;
    }

    /**
     * Get duracionDelCiclo
     *
     * @return string 
     */
    public function getDuracionDelCiclo()
    {
        return $this->duracionDelCiclo;
    }

    /**
     * Set sangramientos
     *
     * @param string $sangramientos
     * @return SrgAntecedenteGinecologico
     */
    public function setSangramientos($sangramientos)
    {
        $this->sangramientos = $sangramientos;

        return $this;
    }

    /**
     * Get sangramientos
     *
     * @return string 
     */
    public function getSangramientos()
    {
        return $this->sangramientos;
    }

    /**
     * Set duracionDelSangramiento
     *
     * @param string $duracionDelSangramiento
     * @return SrgAntecedenteGinecologico
     */
    public function setDuracionDelSangramiento($duracionDelSangramiento)
    {
        $this->duracionDelSangramiento = $duracionDelSangramiento;

        return $this;
    }

    /**
     * Get duracionDelSangramiento
     *
     * @return string 
     */
    public function getDuracionDelSangramiento()
    {
        return $this->duracionDelSangramiento;
    }

    /**
     * Set fechaUltimoPap
     *
     * @param \DateTime $fechaUltimoPap
     * @return SrgAntecedenteGinecologico
     */
    public function setFechaUltimoPap($fechaUltimoPap)
    {
        $this->fechaUltimoPap = $fechaUltimoPap;

        return $this;
    }

    /**
     * Get fechaUltimoPap
     *
     * @return \DateTime 
     */
    public function getFechaUltimoPap()
    {
        return $this->fechaUltimoPap;
    }

    /**
     * Set resultadoUltimoPap
     *
     * @param string $resultadoUltimoPap
     * @return SrgAntecedenteGinecologico
     */
    public function setResultadoUltimoPap($resultadoUltimoPap)
    {
        $this->resultadoUltimoPap = $resultadoUltimoPap;

        return $this;
    }

    /**
     * Get resultadoUltimoPap
     *
     * @return string 
     */
    public function getResultadoUltimoPap()
    {
        return $this->resultadoUltimoPap;
    }

    /**
     * Set observaciones
     *
     * @param string $observaciones
     * @return SrgAntecedenteGinecologico
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
     * Set estaLactando
     *
     * @param boolean $estaLactando
     * @return SrgAntecedenteGinecologico
     */
    public function setEstaLactando($estaLactando)
    {
        $this->estaLactando = $estaLactando;

        return $this;
    }

    /**
     * Get estaLactando
     *
     * @return boolean 
     */
    public function getEstaLactando()
    {
        return $this->estaLactando;
    }

    /**
     * Set idConsultaGinePf
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgConsultaGinePf $idConsultaGinePf
     * @return SrgAntecedenteGinecologico
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
