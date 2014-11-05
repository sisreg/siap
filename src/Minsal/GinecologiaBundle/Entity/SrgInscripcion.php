<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgInscripcion
 *
 * @ORM\Table(name="srg_inscripcion", indexes={@ORM\Index(name="IDX_E45F5BD30F3FEEA", columns={"id_consulta_gine_pf"})})
 * @ORM\Entity
 */
class SrgInscripcion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_inscripcion_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="inscripcion_primera_vez", type="boolean", nullable=true)
     */
    private $inscripcionPrimeraVez;

    /**
     * @var boolean
     *
     * @ORM\Column(name="primera_vez_institucion", type="boolean", nullable=true)
     */
    private $primeraVezInstitucion;

    /**
     * @var string
     *
     * @ORM\Column(name="anyos_escolaridad", type="decimal", precision=2, scale=0, nullable=true)
     */
    private $anyosEscolaridad;

    /**
     * @var \SrgConsultaGinePf
     *
     * @ORM\OneToOne(targetEntity="SrgConsultaGinePf", inversedBy="SrgInscripcion")
     *   @ORM\JoinColumn(name="id_consulta_gine_pf", referencedColumnName="id")
     */
    private $idConsultaGinePf;

    /**
     * @ORM\OneToOne(targetEntity="SrgExamenFisicoInscripcion", mappedBy="idInscripcion", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgExamenFisicoInscripcion;


    /**
     * @ORM\OneToOne(targetEntity="SrgExamenGineInscripcion", mappedBy="idInscripcion", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgExamenGineInscripcion;


    /**
     * @ORM\OneToMany(targetEntity="SrgElegibilidadMedica", mappedBy="idInscripcion", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgElegibilidadMedica;


    /**
     * @ORM\OneToOne(targetEntity="SrgConsejeriaInscripcion", mappedBy="idInscripcion", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgConsejeriaInscripcion;



    /**
     * @ORM\OneToOne(targetEntity="SrgEntregaMetodo", mappedBy="idInscripcion", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgEntregaMetodo;




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
     * Set inscripcionPrimeraVez
     *
     * @param boolean $inscripcionPrimeraVez
     * @return SrgInscripcion
     */
    public function setInscripcionPrimeraVez($inscripcionPrimeraVez)
    {
        $this->inscripcionPrimeraVez = $inscripcionPrimeraVez;

        return $this;
    }

    /**
     * Get inscripcionPrimeraVez
     *
     * @return boolean 
     */
    public function getInscripcionPrimeraVez()
    {
        return $this->inscripcionPrimeraVez;
    }

    /**
     * Set primeraVezInstitucion
     *
     * @param boolean $primeraVezInstitucion
     * @return SrgInscripcion
     */
    public function setPrimeraVezInstitucion($primeraVezInstitucion)
    {
        $this->primeraVezInstitucion = $primeraVezInstitucion;

        return $this;
    }

    /**
     * Get primeraVezInstitucion
     *
     * @return boolean 
     */
    public function getPrimeraVezInstitucion()
    {
        return $this->primeraVezInstitucion;
    }

    /**
     * Set anyosEscolaridad
     *
     * @param string $anyosEscolaridad
     * @return SrgInscripcion
     */
    public function setAnyosEscolaridad($anyosEscolaridad)
    {
        $this->anyosEscolaridad = $anyosEscolaridad;

        return $this;
    }

    /**
     * Get anyosEscolaridad
     *
     * @return string 
     */
    public function getAnyosEscolaridad()
    {
        return $this->anyosEscolaridad;
    }

    /**
     * Set idConsultaGinePf
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgConsultaGinePf $idConsultaGinePf
     * @return SrgInscripcion
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
     * Constructor
     */
    public function __construct()
    {
        $this->SrgElegibilidadMedica = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set SrgExamenFisicoInscripcion
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgExamenFisicoInscripcion $srgExamenFisicoInscripcion
     * @return SrgInscripcion
     */
    public function setSrgExamenFisicoInscripcion(\Minsal\GinecologiaBundle\Entity\SrgExamenFisicoInscripcion $srgExamenFisicoInscripcion = null)
    {
        $this->SrgExamenFisicoInscripcion = $srgExamenFisicoInscripcion;

        return $this;
    }

    /**
     * Get SrgExamenFisicoInscripcion
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgExamenFisicoInscripcion 
     */
    public function getSrgExamenFisicoInscripcion()
    {
        return $this->SrgExamenFisicoInscripcion;
    }

    /**
     * Set SrgExamenGineInscripcion
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgExamenGineInscripcion $srgExamenGineInscripcion
     * @return SrgInscripcion
     */
    public function setSrgExamenGineInscripcion(\Minsal\GinecologiaBundle\Entity\SrgExamenGineInscripcion $srgExamenGineInscripcion = null)
    {
        $this->SrgExamenGineInscripcion = $srgExamenGineInscripcion;

        return $this;
    }

    /**
     * Get SrgExamenGineInscripcion
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgExamenGineInscripcion 
     */
    public function getSrgExamenGineInscripcion()
    {
        return $this->SrgExamenGineInscripcion;
    }

    /**
     * Add SrgElegibilidadMedica
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgElegibilidadMedica $srgElegibilidadMedica
     * @return SrgInscripcion
     */
    public function addSrgElegibilidadMedica(\Minsal\GinecologiaBundle\Entity\SrgElegibilidadMedica $srgElegibilidadMedica)
    {
        $this->SrgElegibilidadMedica[] = $srgElegibilidadMedica;

        return $this;
    }

    /**
     * Remove SrgElegibilidadMedica
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgElegibilidadMedica $srgElegibilidadMedica
     */
    public function removeSrgElegibilidadMedica(\Minsal\GinecologiaBundle\Entity\SrgElegibilidadMedica $srgElegibilidadMedica)
    {
        $this->SrgElegibilidadMedica->removeElement($srgElegibilidadMedica);
    }

    /**
     * Get SrgElegibilidadMedica
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSrgElegibilidadMedica()
    {
        return $this->SrgElegibilidadMedica;
    }

    /**
     * Set SrgConsejeriaInscripcion
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgConsejeriaInscripcion $srgConsejeriaInscripcion
     * @return SrgInscripcion
     */
    public function setSrgConsejeriaInscripcion(\Minsal\GinecologiaBundle\Entity\SrgConsejeriaInscripcion $srgConsejeriaInscripcion = null)
    {
        $this->SrgConsejeriaInscripcion = $srgConsejeriaInscripcion;

        return $this;
    }

    /**
     * Get SrgConsejeriaInscripcion
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgConsejeriaInscripcion 
     */
    public function getSrgConsejeriaInscripcion()
    {
        return $this->SrgConsejeriaInscripcion;
    }

    /**
     * Set SrgEntregaMetodo
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgEntregaMetodo $srgEntregaMetodo
     * @return SrgInscripcion
     */
    public function setSrgEntregaMetodo(\Minsal\GinecologiaBundle\Entity\SrgEntregaMetodo $srgEntregaMetodo = null)
    {
        $this->SrgEntregaMetodo = $srgEntregaMetodo;

        return $this;
    }

    /**
     * Get SrgEntregaMetodo
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgEntregaMetodo 
     */
    public function getSrgEntregaMetodo()
    {
        return $this->SrgEntregaMetodo;
    }

   public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }

    
}
