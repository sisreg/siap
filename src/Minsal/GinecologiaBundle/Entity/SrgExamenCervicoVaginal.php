<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgExamenCervicoVaginal
 *
 * @ORM\Table(name="srg_examen_cervico_vaginal", indexes={@ORM\Index(name="IDX_8E2E017530F3FEEA", columns={"id_consulta_gine_pf"})})
 * @ORM\Entity
 */
class SrgExamenCervicoVaginal
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_examen_cervico_vaginal_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="string", length=200, nullable=true)
     */
    private $observaciones;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_recepcion", type="date", nullable=true)
     */
    private $fechaRecepcion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_reporte", type="date", nullable=true)
     */
    private $fechaReporte;

    /**
     * @var \SrgConsultaGinePf
     *
     * @ORM\OneToOne(targetEntity="SrgConsultaGinePf", inversedBy="SrgExamenCervicoVaginal")
     *   @ORM\JoinColumn(name="id_consulta_gine_pf", referencedColumnName="id")
     */
    private $idConsultaGinePf;



    /**
     * @ORM\OneToOne(targetEntity="SrgDatoClinico", mappedBy="idExamenCervicoVaginal", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgDatoClinico;



    /**
     * @ORM\OneToOne(targetEntity="SrgPap", mappedBy="idExamenCervicoVaginal", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgPap;


    /**
     * @ORM\OneToOne(targetEntity="SrgCalidadMuestra", mappedBy="idExamenCervicoVaginal", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgCalidadMuestra;



    /**
     * @ORM\OneToOne(targetEntity="SrgOrganismoCervico", mappedBy="idExamenCervicoVaginal", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgOrganismoCervico;



    /**
     * @ORM\OneToOne(targetEntity="SrgCambioCelularReactivo", mappedBy="idExamenCervicoVaginal", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgCambioCelularReactivo;


    /**
     * @ORM\OneToOne(targetEntity="SrgAnormalidadCelulaEscamosa", mappedBy="idExamenCervicoVaginal", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgAnormalidadCelulaEscamosa;


    /**
     * @ORM\OneToOne(targetEntity="SrgAnormalidadCelulaGlandula", mappedBy="idExamenCervicoVaginal", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgAnormalidadCelulaGlandula;













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
     * Set observaciones
     *
     * @param string $observaciones
     * @return SrgExamenCervicoVaginal
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
     * Set fechaRecepcion
     *
     * @param \DateTime $fechaRecepcion
     * @return SrgExamenCervicoVaginal
     */
    public function setFechaRecepcion($fechaRecepcion)
    {
        $this->fechaRecepcion = $fechaRecepcion;

        return $this;
    }

    /**
     * Get fechaRecepcion
     *
     * @return \DateTime 
     */
    public function getFechaRecepcion()
    {
        return $this->fechaRecepcion;
    }

    /**
     * Set fechaReporte
     *
     * @param \DateTime $fechaReporte
     * @return SrgExamenCervicoVaginal
     */
    public function setFechaReporte($fechaReporte)
    {
        $this->fechaReporte = $fechaReporte;

        return $this;
    }

    /**
     * Get fechaReporte
     *
     * @return \DateTime 
     */
    public function getFechaReporte()
    {
        return $this->fechaReporte;
    }

    /**
     * Set idConsultaGinePf
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgConsultaGinePf $idConsultaGinePf
     * @return SrgExamenCervicoVaginal
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
     * Set SrgDatoClinico
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgDatoClinico $srgDatoClinico
     * @return SrgExamenCervicoVaginal
     */
    public function setSrgDatoClinico(\Minsal\GinecologiaBundle\Entity\SrgDatoClinico $srgDatoClinico = null)
    {
        $this->SrgDatoClinico = $srgDatoClinico;

        return $this;
    }

    /**
     * Get SrgDatoClinico
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgDatoClinico 
     */
    public function getSrgDatoClinico()
    {
        return $this->SrgDatoClinico;
    }

    /**
     * Set SrgPap
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgPap $srgPap
     * @return SrgExamenCervicoVaginal
     */
    public function setSrgPap(\Minsal\GinecologiaBundle\Entity\SrgPap $srgPap = null)
    {
        $this->SrgPap = $srgPap;

        return $this;
    }

    /**
     * Get SrgPap
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgPap 
     */
    public function getSrgPap()
    {
        return $this->SrgPap;
    }

    /**
     * Set SrgCalidadMuestra
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgCalidadMuestra $srgCalidadMuestra
     * @return SrgExamenCervicoVaginal
     */
    public function setSrgCalidadMuestra(\Minsal\GinecologiaBundle\Entity\SrgCalidadMuestra $srgCalidadMuestra = null)
    {
        $this->SrgCalidadMuestra = $srgCalidadMuestra;

        return $this;
    }

    /**
     * Get SrgCalidadMuestra
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgCalidadMuestra 
     */
    public function getSrgCalidadMuestra()
    {
        return $this->SrgCalidadMuestra;
    }

    /**
     * Set SrgOrganismoCervico
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgOrganismoCervico $srgOrganismoCervico
     * @return SrgExamenCervicoVaginal
     */
    public function setSrgOrganismoCervico(\Minsal\GinecologiaBundle\Entity\SrgOrganismoCervico $srgOrganismoCervico = null)
    {
        $this->SrgOrganismoCervico = $srgOrganismoCervico;

        return $this;
    }

    /**
     * Get SrgOrganismoCervico
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgOrganismoCervico 
     */
    public function getSrgOrganismoCervico()
    {
        return $this->SrgOrganismoCervico;
    }

    /**
     * Set SrgCambioCelularReactivo
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgCambioCelularReactivo $srgCambioCelularReactivo
     * @return SrgExamenCervicoVaginal
     */
    public function setSrgCambioCelularReactivo(\Minsal\GinecologiaBundle\Entity\SrgCambioCelularReactivo $srgCambioCelularReactivo = null)
    {
        $this->SrgCambioCelularReactivo = $srgCambioCelularReactivo;

        return $this;
    }

    /**
     * Get SrgCambioCelularReactivo
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgCambioCelularReactivo 
     */
    public function getSrgCambioCelularReactivo()
    {
        return $this->SrgCambioCelularReactivo;
    }

    /**
     * Set SrgAnormalidadCelulaEscamosa
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgAnormalidadCelulaEscamosa $srgAnormalidadCelulaEscamosa
     * @return SrgExamenCervicoVaginal
     */
    public function setSrgAnormalidadCelulaEscamosa(\Minsal\GinecologiaBundle\Entity\SrgAnormalidadCelulaEscamosa $srgAnormalidadCelulaEscamosa = null)
    {
        $this->SrgAnormalidadCelulaEscamosa = $srgAnormalidadCelulaEscamosa;

        return $this;
    }

    /**
     * Get SrgAnormalidadCelulaEscamosa
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgAnormalidadCelulaEscamosa 
     */
    public function getSrgAnormalidadCelulaEscamosa()
    {
        return $this->SrgAnormalidadCelulaEscamosa;
    }

    /**
     * Set SrgAnormalidadCelulaGlandula
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgAnormalidadCelulaGlandula $srgAnormalidadCelulaGlandula
     * @return SrgExamenCervicoVaginal
     */
    public function setSrgAnormalidadCelulaGlandula(\Minsal\GinecologiaBundle\Entity\SrgAnormalidadCelulaGlandula $srgAnormalidadCelulaGlandula = null)
    {
        $this->SrgAnormalidadCelulaGlandula = $srgAnormalidadCelulaGlandula;

        return $this;
    }

    /**
     * Get SrgAnormalidadCelulaGlandula
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgAnormalidadCelulaGlandula 
     */
    public function getSrgAnormalidadCelulaGlandula()
    {
        return $this->SrgAnormalidadCelulaGlandula;
    }



       public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }
}
