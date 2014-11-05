<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgConsultaGinePf
 *
 * @ORM\Table(name="srg_consulta_gine_pf", indexes={@ORM\Index(name="IDX_D676C7BE643FF516", columns={"id_historial_clinico"})})
 * @ORM\Entity
 */
class SrgConsultaGinePf
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_consulta_gine_pf_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_consulta", type="date", nullable=false)
     */
    private $fechaConsulta;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora_inicio", type="time", nullable=true)
     */
    private $horaInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora_fin", type="time", nullable=true)
     */
    private $horaFin;

    /**
     * @var string
     *
     * @ORM\Column(name="estado_consulta", type="string", length=1, nullable=false)
     */
    private $estadoConsulta;

    /**
     * @var string
     *
     * @ORM\Column(name="especialidad_consulta", type="string", length=2, nullable=false)
     */
    private $especialidadConsulta;

    /**
     * @var boolean
     *
     * @ORM\Column(name="referencia_recibida", type="boolean", nullable=true)
     */
    private $referenciaRecibida;

    /**
     * @var boolean
     *
     * @ORM\Column(name="retorno_recibido", type="boolean", nullable=true)
     */
    private $retornoRecibido;

    /**
     * @var \SecHistorialClinico
     *
     * @ORM\OneToOne(targetEntity="Minsal\SiapsBundle\Entity\SecHistorialClinico")
     *   @ORM\JoinColumn(name="id_historial_clinico", referencedColumnName="id")
     */
    private $idHistorialClinico;


    /**
     * @ORM\OneToOne(targetEntity="SrgRetornoExtendido", mappedBy="idConsultaGinePf", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgRetornoExtendido;


    /**
     * @ORM\OneToOne(targetEntity="SrgReferenciaExtendida", mappedBy="idConsultaGinePf", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgReferenciaExtendida;



    /**
     * @ORM\OneToOne(targetEntity="SrgAtencionPreventiva", mappedBy="idConsultaGinePf", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgAtencionPreventiva;


    /**
     * @ORM\OneToOne(targetEntity="SrgDiagnosticoRegistroDiario", mappedBy="idConsultaGinePf", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgDiagnosticoRegistroDiario;


    /**
     * @ORM\OneToOne(targetEntity="SrgAntecedMedico", mappedBy="idConsultaGinePf", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgAntecedMedico;


    /**
     * @ORM\OneToOne(targetEntity="SrgAntecedQuirurgico", mappedBy="idConsultaGinePf", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgAntecedQuirurgico;

    /**
     * @ORM\OneToOne(targetEntity="SrgAntecedAlergia", mappedBy="idConsultaGinePf", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgAntecedAlergia;


    /**
     * @ORM\OneToOne(targetEntity="SrgExploracionClinica", mappedBy="idConsultaGinePf", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgExploracionClinica;


    /**
     * @ORM\OneToOne(targetEntity="SrgSeguimientoConsulta", mappedBy="idConsultaGinePf", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgSeguimientoConsulta;



    /**
     * @ORM\OneToOne(targetEntity="SrgAntecedenteGinecologico", mappedBy="idConsultaGinePf", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgAntecedenteGinecologico;



    /**
     * @ORM\OneToOne(targetEntity="SrgExamenCervicoVaginal", mappedBy="idConsultaGinePf", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgExamenCervicoVaginal;


    /**
     * @ORM\OneToOne(targetEntity="SrgExamenMama", mappedBy="idConsultaGinePf", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgExamenMama;

    /**
     * @ORM\OneToOne(targetEntity="SrgHojaAbastecimiento", mappedBy="idConsultaGinePf", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgHojaAbastecimiento;

    /**
     * @ORM\OneToOne(targetEntity="SrgInscripcion", mappedBy="idConsultaGinePf", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgInscripcion;


    /**
     * @ORM\OneToOne(targetEntity="SrgSeguimientoSubsecuente", mappedBy="idConsultaGinePf", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgSeguimientoSubsecuente;


    /**
     * @ORM\OneToOne(targetEntity="SrgEsterilizacion", mappedBy="idConsultaGinePf", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgEsterilizacion;




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
     * Set fechaConsulta
     *
     * @param \DateTime $fechaConsulta
     * @return SrgConsultaGinePf
     */
    public function setFechaConsulta($fechaConsulta)
    {
        $this->fechaConsulta = $fechaConsulta;

        return $this;
    }

    /**
     * Get fechaConsulta
     *
     * @return \DateTime 
     */
    public function getFechaConsulta()
    {
        return $this->fechaConsulta;
    }

    /**
     * Set horaInicio
     *
     * @param \DateTime $horaInicio
     * @return SrgConsultaGinePf
     */
    public function setHoraInicio($horaInicio)
    {
        $this->horaInicio = $horaInicio;

        return $this;
    }

    /**
     * Get horaInicio
     *
     * @return \DateTime 
     */
    public function getHoraInicio()
    {
        return $this->horaInicio;
    }

    /**
     * Set horaFin
     *
     * @param \DateTime $horaFin
     * @return SrgConsultaGinePf
     */
    public function setHoraFin($horaFin)
    {
        $this->horaFin = $horaFin;

        return $this;
    }

    /**
     * Get horaFin
     *
     * @return \DateTime 
     */
    public function getHoraFin()
    {
        return $this->horaFin;
    }

    /**
     * Set estadoConsulta
     *
     * @param string $estadoConsulta
     * @return SrgConsultaGinePf
     */
    public function setEstadoConsulta($estadoConsulta)
    {
        $this->estadoConsulta = $estadoConsulta;

        return $this;
    }

    /**
     * Get estadoConsulta
     *
     * @return string 
     */
    public function getEstadoConsulta()
    {
        return $this->estadoConsulta;
    }

    /**
     * Set especialidadConsulta
     *
     * @param string $especialidadConsulta
     * @return SrgConsultaGinePf
     */
    public function setEspecialidadConsulta($especialidadConsulta)
    {
        $this->especialidadConsulta = $especialidadConsulta;

        return $this;
    }

    /**
     * Get especialidadConsulta
     *
     * @return string 
     */
    public function getEspecialidadConsulta()
    {
        return $this->especialidadConsulta;
    }

    /**
     * Set referenciaRecibida
     *
     * @param boolean $referenciaRecibida
     * @return SrgConsultaGinePf
     */
    public function setReferenciaRecibida($referenciaRecibida)
    {
        $this->referenciaRecibida = $referenciaRecibida;

        return $this;
    }

    /**
     * Get referenciaRecibida
     *
     * @return boolean 
     */
    public function getReferenciaRecibida()
    {
        return $this->referenciaRecibida;
    }

    /**
     * Set retornoRecibido
     *
     * @param boolean $retornoRecibido
     * @return SrgConsultaGinePf
     */
    public function setRetornoRecibido($retornoRecibido)
    {
        $this->retornoRecibido = $retornoRecibido;

        return $this;
    }

    /**
     * Get retornoRecibido
     *
     * @return boolean 
     */
    public function getRetornoRecibido()
    {
        return $this->retornoRecibido;
    }

    /**
     * Set idSecHistorialClinico
     *
     * @param \Minsal\SiapsBundle\Entity\SecHistorialClinico $idHistorialClinico
     * @return SrgConsultaGinePf
     */
    public function setIdHistorialClinico(\Minsal\SiapsBundle\Entity\SecHistorialClinico $idHistorialClinico = null)
    {
        $this->idHistorialClinico = $idHistorialClinico;

        return $this;
    }

    /**
     * Get idHistorialClinico
     *
     * @return \Minsal\SiapsBundle\Entity\SecHistorialClinico 
     */
    public function getIdHistorialClinico()
    {
        return $this->idHistorialClinico;
    }





    /**
     * Set SrgRetornoExtendido
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgRetornoExtendido $srgRetornoExtendido
     * @return SrgConsultaGinePf
     */
    public function setSrgRetornoExtendido(\Minsal\GinecologiaBundle\Entity\SrgRetornoExtendido $srgRetornoExtendido = null)
    {
        $this->SrgRetornoExtendido = $srgRetornoExtendido;

        return $this;
    }

    /**
     * Get SrgRetornoExtendido
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgRetornoExtendido 
     */
    public function getSrgRetornoExtendido()
    {
        return $this->SrgRetornoExtendido;
    }

    /**
     * Set SrgReferenciaExtendida
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgReferenciaExtendida $srgReferenciaExtendida
     * @return SrgConsultaGinePf
     */
    public function setSrgReferenciaExtendida(\Minsal\GinecologiaBundle\Entity\SrgReferenciaExtendida $srgReferenciaExtendida = null)
    {
        $this->SrgReferenciaExtendida = $srgReferenciaExtendida;

        return $this;
    }

    /**
     * Get SrgReferenciaExtendida
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgReferenciaExtendida 
     */
    public function getSrgReferenciaExtendida()
    {
        return $this->SrgReferenciaExtendida;
    }

    /**
     * Set SrgAtencionPreventiva
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgAtencionPreventiva $srgAtencionPreventiva
     * @return SrgConsultaGinePf
     */
    public function setSrgAtencionPreventiva(\Minsal\GinecologiaBundle\Entity\SrgAtencionPreventiva $srgAtencionPreventiva = null)
    {
        $this->SrgAtencionPreventiva = $srgAtencionPreventiva;

        return $this;
    }

    /**
     * Get SrgAtencionPreventiva
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgAtencionPreventiva 
     */
    public function getSrgAtencionPreventiva()
    {
        return $this->SrgAtencionPreventiva;
    }

    /**
     * Set SrgDiagnosticoRegistroDiario
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgDiagnosticoRegistroDiario $srgDiagnosticoRegistroDiario
     * @return SrgConsultaGinePf
     */
    public function setSrgDiagnosticoRegistroDiario(\Minsal\GinecologiaBundle\Entity\SrgDiagnosticoRegistroDiario $srgDiagnosticoRegistroDiario = null)
    {
        $this->SrgDiagnosticoRegistroDiario = $srgDiagnosticoRegistroDiario;

        return $this;
    }

    /**
     * Get SrgDiagnosticoRegistroDiario
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgDiagnosticoRegistroDiario 
     */
    public function getSrgDiagnosticoRegistroDiario()
    {
        return $this->SrgDiagnosticoRegistroDiario;
    }

    /**
     * Set SrgAntecedMedico
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgAntecedMedico $srgAntecedMedico
     * @return SrgConsultaGinePf
     */
    public function setSrgAntecedMedico(\Minsal\GinecologiaBundle\Entity\SrgAntecedMedico $srgAntecedMedico = null)
    {
        $this->SrgAntecedMedico = $srgAntecedMedico;

        return $this;
    }

    /**
     * Get SrgAntecedMedico
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgAntecedMedico 
     */
    public function getSrgAntecedMedico()
    {
        return $this->SrgAntecedMedico;
    }

    /**
     * Set SrgAntecedQuirurgico
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgAntecedQuirurgico $srgAntecedQuirurgico
     * @return SrgConsultaGinePf
     */
    public function setSrgAntecedQuirurgico(\Minsal\GinecologiaBundle\Entity\SrgAntecedQuirurgico $srgAntecedQuirurgico = null)
    {
        $this->SrgAntecedQuirurgico = $srgAntecedQuirurgico;

        return $this;
    }

    /**
     * Get SrgAntecedQuirurgico
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgAntecedQuirurgico 
     */
    public function getSrgAntecedQuirurgico()
    {
        return $this->SrgAntecedQuirurgico;
    }

    /**
     * Set SrgAntecedAlergia
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgAntecedAlergia $srgAntecedAlergia
     * @return SrgConsultaGinePf
     */
    public function setSrgAntecedAlergia(\Minsal\GinecologiaBundle\Entity\SrgAntecedAlergia $srgAntecedAlergia = null)
    {
        $this->SrgAntecedAlergia = $srgAntecedAlergia;

        return $this;
    }

    /**
     * Get SrgAntecedAlergia
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgAntecedAlergia 
     */
    public function getSrgAntecedAlergia()
    {
        return $this->SrgAntecedAlergia;
    }

    /**
     * Set SrgExploracionClinica
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgExploracionClinica $srgExploracionClinica
     * @return SrgConsultaGinePf
     */
    public function setSrgExploracionClinica(\Minsal\GinecologiaBundle\Entity\SrgExploracionClinica $srgExploracionClinica = null)
    {
        $this->SrgExploracionClinica = $srgExploracionClinica;

        return $this;
    }

    /**
     * Get SrgExploracionClinica
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgExploracionClinica 
     */
    public function getSrgExploracionClinica()
    {
        return $this->SrgExploracionClinica;
    }

    /**
     * Set SrgSeguimientoConsulta
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgSeguimientoConsulta $srgSeguimientoConsulta
     * @return SrgConsultaGinePf
     */
    public function setSrgSeguimientoConsulta(\Minsal\GinecologiaBundle\Entity\SrgSeguimientoConsulta $srgSeguimientoConsulta = null)
    {
        $this->SrgSeguimientoConsulta = $srgSeguimientoConsulta;

        return $this;
    }

    /**
     * Get SrgSeguimientoConsulta
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgSeguimientoConsulta 
     */
    public function getSrgSeguimientoConsulta()
    {
        return $this->SrgSeguimientoConsulta;
    }

    /**
     * Set SrgAntecedenteGinecologico
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgAntecedenteGinecologico $srgAntecedenteGinecologico
     * @return SrgConsultaGinePf
     */
    public function setSrgAntecedenteGinecologico(\Minsal\GinecologiaBundle\Entity\SrgAntecedenteGinecologico $srgAntecedenteGinecologico = null)
    {
        $this->SrgAntecedenteGinecologico = $srgAntecedenteGinecologico;

        return $this;
    }

    /**
     * Get SrgAntecedenteGinecologico
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgAntecedenteGinecologico 
     */
    public function getSrgAntecedenteGinecologico()
    {
        return $this->SrgAntecedenteGinecologico;
    }

    /**
     * Set SrgExamenCervicoVaginal
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgExamenCervicoVaginal $srgExamenCervicoVaginal
     * @return SrgConsultaGinePf
     */
    public function setSrgExamenCervicoVaginal(\Minsal\GinecologiaBundle\Entity\SrgExamenCervicoVaginal $srgExamenCervicoVaginal = null)
    {
        $this->SrgExamenCervicoVaginal = $srgExamenCervicoVaginal;

        return $this;
    }

    /**
     * Get SrgExamenCervicoVaginal
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgExamenCervicoVaginal 
     */
    public function getSrgExamenCervicoVaginal()
    {
        return $this->SrgExamenCervicoVaginal;
    }

    /**
     * Set SrgExamenMama
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgExamenMama $srgExamenMama
     * @return SrgConsultaGinePf
     */
    public function setSrgExamenMama(\Minsal\GinecologiaBundle\Entity\SrgExamenMama $srgExamenMama = null)
    {
        $this->SrgExamenMama = $srgExamenMama;

        return $this;
    }

    /**
     * Get SrgExamenMama
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgExamenMama 
     */
    public function getSrgExamenMama()
    {
        return $this->SrgExamenMama;
    }

    /**
     * Set SrgHojaAbastecimiento
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgHojaAbastecimiento $srgHojaAbastecimiento
     * @return SrgConsultaGinePf
     */
    public function setSrgHojaAbastecimiento(\Minsal\GinecologiaBundle\Entity\SrgHojaAbastecimiento $srgHojaAbastecimiento = null)
    {
        $this->SrgHojaAbastecimiento = $srgHojaAbastecimiento;

        return $this;
    }

    /**
     * Get SrgHojaAbastecimiento
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgHojaAbastecimiento 
     */
    public function getSrgHojaAbastecimiento()
    {
        return $this->SrgHojaAbastecimiento;
    }

    /**
     * Set SrgInscripcion
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgInscripcion $srgInscripcion
     * @return SrgConsultaGinePf
     */
    public function setSrgInscripcion(\Minsal\GinecologiaBundle\Entity\SrgInscripcion $srgInscripcion = null)
    {
        $this->SrgInscripcion = $srgInscripcion;

        return $this;
    }

    /**
     * Get SrgInscripcion
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgInscripcion 
     */
    public function getSrgInscripcion()
    {
        return $this->SrgInscripcion;
    }

    /**
     * Set SrgSeguimientoSubsecuente
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgSeguimientoSubsecuente $srgSeguimientoSubsecuente
     * @return SrgConsultaGinePf
     */
    public function setSrgSeguimientoSubsecuente(\Minsal\GinecologiaBundle\Entity\SrgSeguimientoSubsecuente $srgSeguimientoSubsecuente = null)
    {
        $this->SrgSeguimientoSubsecuente = $srgSeguimientoSubsecuente;

        return $this;
    }

    /**
     * Get SrgSeguimientoSubsecuente
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgSeguimientoSubsecuente 
     */
    public function getSrgSeguimientoSubsecuente()
    {
        return $this->SrgSeguimientoSubsecuente;
    }

    /**
     * Set SrgEsterilizacion
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgEsterilizacion $srgEsterilizacion
     * @return SrgConsultaGinePf
     */
    public function setSrgEsterilizacion(\Minsal\GinecologiaBundle\Entity\SrgEsterilizacion $srgEsterilizacion = null)
    {
        $this->SrgEsterilizacion = $srgEsterilizacion;

        return $this;
    }

    /**
     * Get SrgEsterilizacion
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgEsterilizacion 
     */
    public function getSrgEsterilizacion()
    {
        return $this->SrgEsterilizacion;
    }


   public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }


}
