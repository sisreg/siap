<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgAnormalidadCelulaEscamosa
 *
 * @ORM\Table(name="srg_anormalidad_celula_escamosa", indexes={@ORM\Index(name="IDX_61CF85A2C2E87B78", columns={"id_examen_cervico_vaginal"})})
 * @ORM\Entity
 */
class SrgAnormalidadCelulaEscamosa
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_anormalidad_celula_escamosa_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="asc_us", type="boolean", nullable=true)
     */
    private $ascUs;

    /**
     * @var boolean
     *
     * @ORM\Column(name="asc_h", type="boolean", nullable=true)
     */
    private $ascH;

    /**
     * @var boolean
     *
     * @ORM\Column(name="lei_bajo_grado", type="boolean", nullable=true)
     */
    private $leiBajoGrado;

    /**
     * @var boolean
     *
     * @ORM\Column(name="lei_alto_grado", type="boolean", nullable=true)
     */
    private $leiAltoGrado;

    /**
     * @var boolean
     *
     * @ORM\Column(name="hallazgo_sospechoso_invasion", type="boolean", nullable=true)
     */
    private $hallazgoSospechosoInvasion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="carcinoma_celulas_escamosas", type="boolean", nullable=true)
     */
    private $carcinomaCelulasEscamosas;

    /**
     * @var string
     *
     * @ORM\Column(name="detalle_otras_neoplas_malignas", type="string", length=100, nullable=true)
     */
    private $detalleOtrasNeoplasMalignas;

    /**
     * @var \SrgExamenCervicoVaginal
     *
     * @ORM\OneToOne(targetEntity="SrgExamenCervicoVaginal", inversedBy="SrgAnormalidadCelulaEscamosa")
     *   @ORM\JoinColumn(name="id_examen_cervico_vaginal", referencedColumnName="id")
     */
    private $idExamenCervicoVaginal;



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
     * Set ascUs
     *
     * @param boolean $ascUs
     * @return SrgAnormalidadCelulaEscamosa
     */
    public function setAscUs($ascUs)
    {
        $this->ascUs = $ascUs;

        return $this;
    }

    /**
     * Get ascUs
     *
     * @return boolean 
     */
    public function getAscUs()
    {
        return $this->ascUs;
    }

    /**
     * Set ascH
     *
     * @param boolean $ascH
     * @return SrgAnormalidadCelulaEscamosa
     */
    public function setAscH($ascH)
    {
        $this->ascH = $ascH;

        return $this;
    }

    /**
     * Get ascH
     *
     * @return boolean 
     */
    public function getAscH()
    {
        return $this->ascH;
    }

    /**
     * Set leiBajoGrado
     *
     * @param boolean $leiBajoGrado
     * @return SrgAnormalidadCelulaEscamosa
     */
    public function setLeiBajoGrado($leiBajoGrado)
    {
        $this->leiBajoGrado = $leiBajoGrado;

        return $this;
    }

    /**
     * Get leiBajoGrado
     *
     * @return boolean 
     */
    public function getLeiBajoGrado()
    {
        return $this->leiBajoGrado;
    }

    /**
     * Set leiAltoGrado
     *
     * @param boolean $leiAltoGrado
     * @return SrgAnormalidadCelulaEscamosa
     */
    public function setLeiAltoGrado($leiAltoGrado)
    {
        $this->leiAltoGrado = $leiAltoGrado;

        return $this;
    }

    /**
     * Get leiAltoGrado
     *
     * @return boolean 
     */
    public function getLeiAltoGrado()
    {
        return $this->leiAltoGrado;
    }

    /**
     * Set hallazgoSospechosoInvasion
     *
     * @param boolean $hallazgoSospechosoInvasion
     * @return SrgAnormalidadCelulaEscamosa
     */
    public function setHallazgoSospechosoInvasion($hallazgoSospechosoInvasion)
    {
        $this->hallazgoSospechosoInvasion = $hallazgoSospechosoInvasion;

        return $this;
    }

    /**
     * Get hallazgoSospechosoInvasion
     *
     * @return boolean 
     */
    public function getHallazgoSospechosoInvasion()
    {
        return $this->hallazgoSospechosoInvasion;
    }

    /**
     * Set carcinomaCelulasEscamosas
     *
     * @param boolean $carcinomaCelulasEscamosas
     * @return SrgAnormalidadCelulaEscamosa
     */
    public function setCarcinomaCelulasEscamosas($carcinomaCelulasEscamosas)
    {
        $this->carcinomaCelulasEscamosas = $carcinomaCelulasEscamosas;

        return $this;
    }

    /**
     * Get carcinomaCelulasEscamosas
     *
     * @return boolean 
     */
    public function getCarcinomaCelulasEscamosas()
    {
        return $this->carcinomaCelulasEscamosas;
    }

    /**
     * Set detalleOtrasNeoplasMalignas
     *
     * @param string $detalleOtrasNeoplasMalignas
     * @return SrgAnormalidadCelulaEscamosa
     */
    public function setDetalleOtrasNeoplasMalignas($detalleOtrasNeoplasMalignas)
    {
        $this->detalleOtrasNeoplasMalignas = $detalleOtrasNeoplasMalignas;

        return $this;
    }

    /**
     * Get detalleOtrasNeoplasMalignas
     *
     * @return string 
     */
    public function getDetalleOtrasNeoplasMalignas()
    {
        return $this->detalleOtrasNeoplasMalignas;
    }

    /**
     * Set idExamenCervicoVaginal
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgExamenCervicoVaginal $idExamenCervicoVaginal
     * @return SrgAnormalidadCelulaEscamosa
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



   public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }


    
}
