<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgOrganismoCervico
 *
 * @ORM\Table(name="srg_organismo_cervico", indexes={@ORM\Index(name="IDX_8765FB5FC2E87B78", columns={"id_examen_cervico_vaginal"})})
 * @ORM\Entity
 */
class SrgOrganismoCervico
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_organismo_cervico_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cambios_celu_herpes_simple", type="boolean", nullable=true)
     */
    private $cambiosCeluHerpesSimple;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cambios_flora_vaginosis", type="boolean", nullable=true)
     */
    private $cambiosFloraVaginosis;

    /**
     * @var string
     *
     * @ORM\Column(name="detalle_otros_organismos", type="string", length=100, nullable=true)
     */
    private $detalleOtrosOrganismos;

    /**
     * @var \SrgExamenCervicoVaginal
     *
     * @ORM\OneToOne(targetEntity="SrgExamenCervicoVaginal", inversedBy="SrgOrganismoCervico")
     *   @ORM\JoinColumn(name="id_examen_cervico_vaginal", referencedColumnName="id")
     */
    private $idExamenCervicoVaginal;



    /**
     * @ORM\OneToMany(targetEntity="SrgOrganismoCervicoMicroorga", mappedBy="idOrganismoCervico", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgOrganismoCervicoMicroorga;









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
     * Set cambiosCeluHerpesSimple
     *
     * @param boolean $cambiosCeluHerpesSimple
     * @return SrgOrganismoCervico
     */
    public function setCambiosCeluHerpesSimple($cambiosCeluHerpesSimple)
    {
        $this->cambiosCeluHerpesSimple = $cambiosCeluHerpesSimple;

        return $this;
    }

    /**
     * Get cambiosCeluHerpesSimple
     *
     * @return boolean 
     */
    public function getCambiosCeluHerpesSimple()
    {
        return $this->cambiosCeluHerpesSimple;
    }

    /**
     * Set cambiosFloraVaginosis
     *
     * @param boolean $cambiosFloraVaginosis
     * @return SrgOrganismoCervico
     */
    public function setCambiosFloraVaginosis($cambiosFloraVaginosis)
    {
        $this->cambiosFloraVaginosis = $cambiosFloraVaginosis;

        return $this;
    }

    /**
     * Get cambiosFloraVaginosis
     *
     * @return boolean 
     */
    public function getCambiosFloraVaginosis()
    {
        return $this->cambiosFloraVaginosis;
    }

    /**
     * Set detalleOtrosOrganismos
     *
     * @param string $detalleOtrosOrganismos
     * @return SrgOrganismoCervico
     */
    public function setDetalleOtrosOrganismos($detalleOtrosOrganismos)
    {
        $this->detalleOtrosOrganismos = $detalleOtrosOrganismos;

        return $this;
    }

    /**
     * Get detalleOtrosOrganismos
     *
     * @return string 
     */
    public function getDetalleOtrosOrganismos()
    {
        return $this->detalleOtrosOrganismos;
    }

    /**
     * Set idExamenCervicoVaginal
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgExamenCervicoVaginal $idExamenCervicoVaginal
     * @return SrgOrganismoCervico
     */
    public function setIdExamenCervicoVaginal(\Minsal\GinecologiaBundle\Entity\SrgExamenCervicoVaginal $idExamenCervicoVaginal = null)
    {
        $this->idExamenCervicoVaginal = $idExamenCervicoVaginal;

        return $this;
    }

    /**
     * Get idExamenCervicoVaginal
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgExamenCervicoVaginal 
     */
    public function getIdExamenCervicoVaginal()
    {
        return $this->idExamenCervicoVaginal;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->SrgOrganismoCervicoMicroorga = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add SrgOrganismoCervicoMicroorga
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgOrganismoCervicoMicroorga $srgOrganismoCervicoMicroorga
     * @return SrgOrganismoCervico
     */
    public function addSrgOrganismoCervicoMicroorga(\Minsal\GinecologiaBundle\Entity\SrgOrganismoCervicoMicroorga $srgOrganismoCervicoMicroorga)
    {
        $this->SrgOrganismoCervicoMicroorga[] = $srgOrganismoCervicoMicroorga;

        return $this;
    }

    /**
     * Remove SrgOrganismoCervicoMicroorga
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgOrganismoCervicoMicroorga $srgOrganismoCervicoMicroorga
     */
    public function removeSrgOrganismoCervicoMicroorga(\Minsal\GinecologiaBundle\Entity\SrgOrganismoCervicoMicroorga $srgOrganismoCervicoMicroorga)
    {
        $this->SrgOrganismoCervicoMicroorga->removeElement($srgOrganismoCervicoMicroorga);
    }

    /**
     * Get SrgOrganismoCervicoMicroorga
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSrgOrganismoCervicoMicroorga()
    {
        return $this->SrgOrganismoCervicoMicroorga;
    }


   public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }
    
}
