<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgSeguimientoSubsecuente
 *
 * @ORM\Table(name="srg_seguimiento_subsecuente", indexes={@ORM\Index(name="IDX_475A141630F3FEEA", columns={"id_consulta_gine_pf"}), @ORM\Index(name="IDX_475A141633455C07", columns={"id_ctl_anticonceptivo"}), @ORM\Index(name="IDX_475A141645888FEA", columns={"id_ctl_anticonceptivo_cambio"}), @ORM\Index(name="IDX_475A1416402D9B96", columns={"id_tipo_consulta_pf"})})
 * @ORM\Entity
 */
class SrgSeguimientoSubsecuente
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_seguimiento_subsecuente_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="sintomas_gripales", type="boolean", nullable=true)
     */
    private $sintomasGripales;

    /**
     * @var boolean
     *
     * @ORM\Column(name="continua_metodo", type="boolean", nullable=true)
     */
    private $continuaMetodo;

    /**
     * @var string
     *
     * @ORM\Column(name="motivo_cambio", type="string", length=200, nullable=true)
     */
    private $motivoCambio;

    /**
     * @var string
     *
     * @ORM\Column(name="diagnostico", type="text", nullable=true)
     */
    private $diagnostico;

    /**
     * @var string
     *
     * @ORM\Column(name="toma_pap", type="text", nullable=true)
     */
    private $tomaPap;

    /**
     * @var string
     *
     * @ORM\Column(name="indicaciones", type="text", nullable=true)
     */
    private $indicaciones;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_control_anual", type="date", nullable=true)
     */
    private $fechaControlAnual;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_proximo_abasto", type="date", nullable=true)
     */
    private $fechaProximoAbasto;

    /**
     * @var \SrgConsultaGinePf
     *
     * @ORM\OneToOne(targetEntity="SrgConsultaGinePf", inversedBy="SrgSeguimientoSubsecuente")
     *   @ORM\JoinColumn(name="id_consulta_gine_pf", referencedColumnName="id")
     */
    private $idConsultaGinePf;







    /**
     * @var \SrgCtlAnticonceptivo
     *
     * @ORM\ManyToOne(targetEntity="SrgCtlAnticonceptivo", inversedBy="SrgSeguimientoSubsecuente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_ctl_anticonceptivo", referencedColumnName="id")
     * })
     */
    private $idCtlAnticonceptivo;

    /**
     * @var \SrgCtlAnticonceptivo
     *
     * @ORM\ManyToOne(targetEntity="SrgCtlAnticonceptivo", inversedBy="SrgSeguimientoSubsecuenteCambio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_ctl_anticonceptivo_cambio", referencedColumnName="id")
     * })
     */
    private $idCtlAnticonceptivoCambio;




    /**
     * @var \SrgTipoConsultaPf
     *
     * @ORM\ManyToOne(targetEntity="SrgTipoConsultaPf", inversedBy="SrgSeguimientoSubsecuente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_consulta_pf", referencedColumnName="id")
     * })
     */
    private $idTipoConsultaPf;


    /**
     * @ORM\OneToMany(targetEntity="SrgSeguiSubsecHistoHallazgo", mappedBy="idSeguimientoSubsecuente", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgSeguiSubsecHistoHallazgo;










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
     * Set sintomasGripales
     *
     * @param boolean $sintomasGripales
     * @return SrgSeguimientoSubsecuente
     */
    public function setSintomasGripales($sintomasGripales)
    {
        $this->sintomasGripales = $sintomasGripales;

        return $this;
    }

    /**
     * Get sintomasGripales
     *
     * @return boolean 
     */
    public function getSintomasGripales()
    {
        return $this->sintomasGripales;
    }

    /**
     * Set continuaMetodo
     *
     * @param boolean $continuaMetodo
     * @return SrgSeguimientoSubsecuente
     */
    public function setContinuaMetodo($continuaMetodo)
    {
        $this->continuaMetodo = $continuaMetodo;

        return $this;
    }

    /**
     * Get continuaMetodo
     *
     * @return boolean 
     */
    public function getContinuaMetodo()
    {
        return $this->continuaMetodo;
    }

    /**
     * Set motivoCambio
     *
     * @param string $motivoCambio
     * @return SrgSeguimientoSubsecuente
     */
    public function setMotivoCambio($motivoCambio)
    {
        $this->motivoCambio = $motivoCambio;

        return $this;
    }

    /**
     * Get motivoCambio
     *
     * @return string 
     */
    public function getMotivoCambio()
    {
        return $this->motivoCambio;
    }

    /**
     * Set diagnostico
     *
     * @param string $diagnostico
     * @return SrgSeguimientoSubsecuente
     */
    public function setDiagnostico($diagnostico)
    {
        $this->diagnostico = $diagnostico;

        return $this;
    }

    /**
     * Get diagnostico
     *
     * @return string 
     */
    public function getDiagnostico()
    {
        return $this->diagnostico;
    }

    /**
     * Set tomaPap
     *
     * @param string $tomaPap
     * @return SrgSeguimientoSubsecuente
     */
    public function setTomaPap($tomaPap)
    {
        $this->tomaPap = $tomaPap;

        return $this;
    }

    /**
     * Get tomaPap
     *
     * @return string 
     */
    public function getTomaPap()
    {
        return $this->tomaPap;
    }

    /**
     * Set indicaciones
     *
     * @param string $indicaciones
     * @return SrgSeguimientoSubsecuente
     */
    public function setIndicaciones($indicaciones)
    {
        $this->indicaciones = $indicaciones;

        return $this;
    }

    /**
     * Get indicaciones
     *
     * @return string 
     */
    public function getIndicaciones()
    {
        return $this->indicaciones;
    }

    /**
     * Set fechaControlAnual
     *
     * @param \DateTime $fechaControlAnual
     * @return SrgSeguimientoSubsecuente
     */
    public function setFechaControlAnual($fechaControlAnual)
    {
        $this->fechaControlAnual = $fechaControlAnual;

        return $this;
    }

    /**
     * Get fechaControlAnual
     *
     * @return \DateTime 
     */
    public function getFechaControlAnual()
    {
        return $this->fechaControlAnual;
    }

    /**
     * Set fechaProximoAbasto
     *
     * @param \DateTime $fechaProximoAbasto
     * @return SrgSeguimientoSubsecuente
     */
    public function setFechaProximoAbasto($fechaProximoAbasto)
    {
        $this->fechaProximoAbasto = $fechaProximoAbasto;

        return $this;
    }

    /**
     * Get fechaProximoAbasto
     *
     * @return \DateTime 
     */
    public function getFechaProximoAbasto()
    {
        return $this->fechaProximoAbasto;
    }

    /**
     * Set idConsultaGinePf
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgConsultaGinePf $idConsultaGinePf
     * @return SrgSeguimientoSubsecuente
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
     * Set idCtlAnticonceptivo
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgCtlAnticonceptivo $idCtlAnticonceptivo
     * @return SrgSeguimientoSubsecuente
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
     * Set idCtlAnticonceptivoCambio
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgCtlAnticonceptivo $idCtlAnticonceptivoCambio
     * @return SrgSeguimientoSubsecuente
     */
    public function setIdCtlAnticonceptivoCambio(\Minsal\GinecologiaBundle\Entity\SrgCtlAnticonceptivo $idCtlAnticonceptivoCambio = null)
    {
        $this->idCtlAnticonceptivoCambio = $idCtlAnticonceptivoCambio;

        return $this;
    }

    /**
     * Get idCtlAnticonceptivoCambio
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgCtlAnticonceptivo 
     */
    public function getIdCtlAnticonceptivoCambio()
    {
        return $this->idCtlAnticonceptivoCambio;
    }

    /**
     * Set idTipoConsultaPf
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgTipoConsultaPf $idTipoConsultaPf
     * @return SrgSeguimientoSubsecuente
     */
    public function setIdTipoConsultaPf(\Minsal\GinecologiaBundle\Entity\SrgTipoConsultaPf $idTipoConsultaPf = null)
    {
        $this->idTipoConsultaPf = $idTipoConsultaPf;

        return $this;
    }

    /**
     * Get idTipoConsultaPf
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgTipoConsultaPf 
     */
    public function getIdTipoConsultaPf()
    {
        return $this->idTipoConsultaPf;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->SrgSeguiSubsecHistoHallazgo = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add SrgSeguiSubsecHistoHallazgo
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgSeguiSubsecHistoHallazgo $srgSeguiSubsecHistoHallazgo
     * @return SrgSeguimientoSubsecuente
     */
    public function addSrgSeguiSubsecHistoHallazgo(\Minsal\GinecologiaBundle\Entity\SrgSeguiSubsecHistoHallazgo $srgSeguiSubsecHistoHallazgo)
    {
        $this->SrgSeguiSubsecHistoHallazgo[] = $srgSeguiSubsecHistoHallazgo;

        return $this;
    }

    /**
     * Remove SrgSeguiSubsecHistoHallazgo
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgSeguiSubsecHistoHallazgo $srgSeguiSubsecHistoHallazgo
     */
    public function removeSrgSeguiSubsecHistoHallazgo(\Minsal\GinecologiaBundle\Entity\SrgSeguiSubsecHistoHallazgo $srgSeguiSubsecHistoHallazgo)
    {
        $this->SrgSeguiSubsecHistoHallazgo->removeElement($srgSeguiSubsecHistoHallazgo);
    }

    /**
     * Get SrgSeguiSubsecHistoHallazgo
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSrgSeguiSubsecHistoHallazgo()
    {
        return $this->SrgSeguiSubsecHistoHallazgo;
    }

   public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }


}
