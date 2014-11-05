<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgExamenMama
 *
 * @ORM\Table(name="srg_examen_mama", indexes={@ORM\Index(name="IDX_9FB9DA530F3FEEA", columns={"id_consulta_gine_pf"})})
 * @ORM\Entity
 */
class SrgExamenMama
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_examen_mama_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \SrgConsultaGinePf
     *
     * @ORM\OneToOne(targetEntity="SrgConsultaGinePf", inversedBy="SrgExamenMama")
     *   @ORM\JoinColumn(name="id_consulta_gine_pf", referencedColumnName="id")
     */
    private $idConsultaGinePf;



    /**
     * @ORM\OneToOne(targetEntity="SrgMotivoConsulta", mappedBy="idExamenMama", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgMotivoConsulta;


    /**
     * @ORM\OneToOne(targetEntity="SrgSintomaLocal", mappedBy="idExamenMama", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgSintomaLocal;



    /**
     * @ORM\OneToOne(targetEntity="SrgHistoriaPrevia", mappedBy="idExamenMama", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgHistoriaPrevia;



    /**
     * @ORM\OneToOne(targetEntity="SrgHistoriaGinecologica", mappedBy="idExamenMama", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgHistoriaGinecologica;



    /**
     * @ORM\OneToOne(targetEntity="SrgHistoriaPersonal", mappedBy="idExamenMama", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgHistoriaPersonal;



    /**
     * @ORM\OneToOne(targetEntity="SrgHabito", mappedBy="idExamenMama", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgHabito;



    /**
     * @ORM\OneToOne(targetEntity="SrgExploracionFisica", mappedBy="idExamenMama", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgExploracionFisica;


    /**
     * @ORM\OneToOne(targetEntity="SrgResultadoExploraFisica", mappedBy="idExamenMama", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgResultadoExploraFisica;













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
     * Set idConsultaGinePf
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgConsultaGinePf $idConsultaGinePf
     * @return SrgExamenMama
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
     * Set SrgMotivoConsulta
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgMotivoConsulta $srgMotivoConsulta
     * @return SrgExamenMama
     */
    public function setSrgMotivoConsulta(\Minsal\GinecologiaBundle\Entity\SrgMotivoConsulta $srgMotivoConsulta = null)
    {
        $this->SrgMotivoConsulta = $srgMotivoConsulta;

        return $this;
    }

    /**
     * Get SrgMotivoConsulta
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgMotivoConsulta 
     */
    public function getSrgMotivoConsulta()
    {
        return $this->SrgMotivoConsulta;
    }

    /**
     * Set SrgSintomaLocal
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgSintomaLocal $srgSintomaLocal
     * @return SrgExamenMama
     */
    public function setSrgSintomaLocal(\Minsal\GinecologiaBundle\Entity\SrgSintomaLocal $srgSintomaLocal = null)
    {
        $this->SrgSintomaLocal = $srgSintomaLocal;

        return $this;
    }

    /**
     * Get SrgSintomaLocal
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgSintomaLocal 
     */
    public function getSrgSintomaLocal()
    {
        return $this->SrgSintomaLocal;
    }

    /**
     * Set SrgHistoriaPrevia
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgHistoriaPrevia $srgHistoriaPrevia
     * @return SrgExamenMama
     */
    public function setSrgHistoriaPrevia(\Minsal\GinecologiaBundle\Entity\SrgHistoriaPrevia $srgHistoriaPrevia = null)
    {
        $this->SrgHistoriaPrevia = $srgHistoriaPrevia;

        return $this;
    }

    /**
     * Get SrgHistoriaPrevia
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgHistoriaPrevia 
     */
    public function getSrgHistoriaPrevia()
    {
        return $this->SrgHistoriaPrevia;
    }

    /**
     * Set SrgHistoriaGinecologica
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgHistoriaGinecologica $srgHistoriaGinecologica
     * @return SrgExamenMama
     */
    public function setSrgHistoriaGinecologica(\Minsal\GinecologiaBundle\Entity\SrgHistoriaGinecologica $srgHistoriaGinecologica = null)
    {
        $this->SrgHistoriaGinecologica = $srgHistoriaGinecologica;

        return $this;
    }

    /**
     * Get SrgHistoriaGinecologica
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgHistoriaGinecologica 
     */
    public function getSrgHistoriaGinecologica()
    {
        return $this->SrgHistoriaGinecologica;
    }

    /**
     * Set SrgHistoriaPersonal
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgHistoriaPersonal $srgHistoriaPersonal
     * @return SrgExamenMama
     */
    public function setSrgHistoriaPersonal(\Minsal\GinecologiaBundle\Entity\SrgHistoriaPersonal $srgHistoriaPersonal = null)
    {
        $this->SrgHistoriaPersonal = $srgHistoriaPersonal;

        return $this;
    }

    /**
     * Get SrgHistoriaPersonal
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgHistoriaPersonal 
     */
    public function getSrgHistoriaPersonal()
    {
        return $this->SrgHistoriaPersonal;
    }

    /**
     * Set SrgHabito
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgHabito $srgHabito
     * @return SrgExamenMama
     */
    public function setSrgHabito(\Minsal\GinecologiaBundle\Entity\SrgHabito $srgHabito = null)
    {
        $this->SrgHabito = $srgHabito;

        return $this;
    }

    /**
     * Get SrgHabito
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgHabito 
     */
    public function getSrgHabito()
    {
        return $this->SrgHabito;
    }

    /**
     * Set SrgExploracionFisica
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgExploracionFisica $srgExploracionFisica
     * @return SrgExamenMama
     */
    public function setSrgExploracionFisica(\Minsal\GinecologiaBundle\Entity\SrgExploracionFisica $srgExploracionFisica = null)
    {
        $this->SrgExploracionFisica = $srgExploracionFisica;

        return $this;
    }

    /**
     * Get SrgExploracionFisica
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgExploracionFisica 
     */
    public function getSrgExploracionFisica()
    {
        return $this->SrgExploracionFisica;
    }

    /**
     * Set SrgResultadoExploraFisica
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgResultadoExploraFisica $srgResultadoExploraFisica
     * @return SrgExamenMama
     */
    public function setSrgResultadoExploraFisica(\Minsal\GinecologiaBundle\Entity\SrgResultadoExploraFisica $srgResultadoExploraFisica = null)
    {
        $this->SrgResultadoExploraFisica = $srgResultadoExploraFisica;

        return $this;
    }

    /**
     * Get SrgResultadoExploraFisica
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgResultadoExploraFisica 
     */
    public function getSrgResultadoExploraFisica()
    {
        return $this->SrgResultadoExploraFisica;
    }



       public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }
    
}
