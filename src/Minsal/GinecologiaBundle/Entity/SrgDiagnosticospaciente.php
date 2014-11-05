<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgDiagnosticospaciente
 *
 * @ORM\Table(name="srg_diagnosticospaciente", indexes={@ORM\Index(name="IDX_39754375DE2271F9", columns={"id_historialclinico"}), @ORM\Index(name="IDX_39754375D881C2B3", columns={"id_diagnostico1"}), @ORM\Index(name="IDX_3975437541889309", columns={"id_diagnostico2"}), @ORM\Index(name="IDX_39754375368FA39F", columns={"id_diagnostico3"})})
 * @ORM\Entity
 */
class SrgDiagnosticospaciente
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_diagnosticospaciente_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="procedimientos", type="text", nullable=true)
     */
    private $procedimientos;

    /**
     * @var string
     *
     * @ORM\Column(name="examenesgabinete", type="text", nullable=true)
     */
    private $examenesgabinete;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcioncie101", type="text", nullable=true)
     */
    private $descripcioncie101;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcioncie102", type="text", nullable=true)
     */
    private $descripcioncie102;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcioncie103", type="text", nullable=true)
     */
    private $descripcioncie103;

    /**
     * @var \SecHistorialClinico
     *
     * @ORM\OneToOne(targetEntity="Minsal\SiapsBundle\Entity\SecHistorialClinico")
     *   @ORM\JoinColumn(name="id_historialclinico", referencedColumnName="id")
     */
    private $idHistorialclinico;

    /**
     * @var \SrgCie10
     *
     * @ORM\ManyToOne(targetEntity="SrgCie10", inversedBy="SrgDiagnostico1")
     *   @ORM\JoinColumn(name="id_diagnostico1", referencedColumnName="id")
     */
    private $idDiagnostico1;

    /**
     * @var \SrgCie10
     *
     * @ORM\ManyToOne(targetEntity="SrgCie10", inversedBy="SrgDiagnostico2")
     *   @ORM\JoinColumn(name="id_diagnostico2", referencedColumnName="id")
     */
    private $idDiagnostico2;

    /**
     * @var \SrgCie10
     *
     * @ORM\ManyToOne(targetEntity="SrgCie10", inversedBy="SrgDiagnostico3")
     *   @ORM\JoinColumn(name="id_diagnostico3", referencedColumnName="id")
     */
    private $idDiagnostico3;



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
     * Set procedimientos
     *
     * @param string $procedimientos
     * @return SrgDiagnosticospaciente
     */
    public function setProcedimientos($procedimientos)
    {
        $this->procedimientos = $procedimientos;

        return $this;
    }

    /**
     * Get procedimientos
     *
     * @return string 
     */
    public function getProcedimientos()
    {
        return $this->procedimientos;
    }

    /**
     * Set examenesgabinete
     *
     * @param string $examenesgabinete
     * @return SrgDiagnosticospaciente
     */
    public function setExamenesgabinete($examenesgabinete)
    {
        $this->examenesgabinete = $examenesgabinete;

        return $this;
    }

    /**
     * Get examenesgabinete
     *
     * @return string 
     */
    public function getExamenesgabinete()
    {
        return $this->examenesgabinete;
    }

    /**
     * Set descripcioncie101
     *
     * @param string $descripcioncie101
     * @return SrgDiagnosticospaciente
     */
    public function setDescripcioncie101($descripcioncie101)
    {
        $this->descripcioncie101 = $descripcioncie101;

        return $this;
    }

    /**
     * Get descripcioncie101
     *
     * @return string 
     */
    public function getDescripcioncie101()
    {
        return $this->descripcioncie101;
    }

    /**
     * Set descripcioncie102
     *
     * @param string $descripcioncie102
     * @return SrgDiagnosticospaciente
     */
    public function setDescripcioncie102($descripcioncie102)
    {
        $this->descripcioncie102 = $descripcioncie102;

        return $this;
    }

    /**
     * Get descripcioncie102
     *
     * @return string 
     */
    public function getDescripcioncie102()
    {
        return $this->descripcioncie102;
    }

    /**
     * Set descripcioncie103
     *
     * @param string $descripcioncie103
     * @return SrgDiagnosticospaciente
     */
    public function setDescripcioncie103($descripcioncie103)
    {
        $this->descripcioncie103 = $descripcioncie103;

        return $this;
    }

    /**
     * Get descripcioncie103
     *
     * @return string 
     */
    public function getDescripcioncie103()
    {
        return $this->descripcioncie103;
    }

    /**
     * Set idHistorialclinico
     *
     * @param \Minsal\SiapsBundle\Entity\SecHistorialClinico $idHistorialclinico
     * @return SrgDiagnosticospaciente
     */
    public function setIdHistorialclinico(\Minsal\SiapsBundle\Entity\SecHistorialClinico $idHistorialclinico = null)
    {
        $this->idHistorialclinico = $idHistorialclinico;

        return $this;
    }

    /**
     * Get idHistorialclinico
     *
     * @return \Minsal\SiapsBundle\Entity\SecHistorialClinico 
     */
    public function getIdHistorialclinico()
    {
        return $this->idHistorialclinico;
    }

    /**
     * Set idDiagnostico1
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgCie10 $idDiagnostico1
     * @return SrgDiagnosticospaciente
     */
    public function setIdDiagnostico1(\Minsal\GinecologiaBundle\Entity\SrgCie10 $idDiagnostico1 = null)
    {
        $this->idDiagnostico1 = $idDiagnostico1;

        return $this;
    }

    /**
     * Get idDiagnostico1
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgCie10 
     */
    public function getIdDiagnostico1()
    {
        return $this->idDiagnostico1;
    }

    /**
     * Set idDiagnostico2
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgCie10 $idDiagnostico2
     * @return SrgDiagnosticospaciente
     */
    public function setIdDiagnostico2(\Minsal\GinecologiaBundle\Entity\SrgCie10 $idDiagnostico2 = null)
    {
        $this->idDiagnostico2 = $idDiagnostico2;

        return $this;
    }

    /**
     * Get idDiagnostico2
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgCie10 
     */
    public function getIdDiagnostico2()
    {
        return $this->idDiagnostico2;
    }

    /**
     * Set idDiagnostico3
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgCie10 $idDiagnostico3
     * @return SrgDiagnosticospaciente
     */
    public function setIdDiagnostico3(\Minsal\GinecologiaBundle\Entity\SrgCie10 $idDiagnostico3 = null)
    {
        $this->idDiagnostico3 = $idDiagnostico3;

        return $this;
    }

    /**
     * Get idDiagnostico3
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgCie10 
     */
    public function getIdDiagnostico3()
    {
        return $this->idDiagnostico3;
    }



   public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }

    
}
