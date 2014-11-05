<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgExamenGineInscripcion
 *
 * @ORM\Table(name="srg_examen_gine_inscripcion", indexes={@ORM\Index(name="IDX_FCD8AC868B4C5407", columns={"id_inscripcion"})})
 * @ORM\Entity
 */
class SrgExamenGineInscripcion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_examen_gine_inscripcion_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="genitales_externos", type="string", length=1, nullable=true)
     */
    private $genitalesExternos;

    /**
     * @var boolean
     *
     * @ORM\Column(name="prolapso_uterino", type="boolean", nullable=true)
     */
    private $prolapsoUterino;

    /**
     * @var string
     *
     * @ORM\Column(name="grado", type="decimal", precision=2, scale=0, nullable=true)
     */
    private $grado;

    /**
     * @var string
     *
     * @ORM\Column(name="vagina", type="string", length=1, nullable=true)
     */
    private $vagina;

    /**
     * @var string
     *
     * @ORM\Column(name="cuello_uterino_movilidad", type="string", length=1, nullable=true)
     */
    private $cuelloUterinoMovilidad;

    /**
     * @var string
     *
     * @ORM\Column(name="cuello_uterino_dolor_mov", type="string", length=1, nullable=true)
     */
    private $cuelloUterinoDolorMov;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cuello_uterino_sangra", type="boolean", nullable=true)
     */
    private $cuelloUterinoSangra;

    /**
     * @var boolean
     *
     * @ORM\Column(name="toma_pap", type="boolean", nullable=true)
     */
    private $tomaPap;

    /**
     * @var string
     *
     * @ORM\Column(name="pap_observaciones", type="string", length=100, nullable=true)
     */
    private $papObservaciones;

    /**
     * @var string
     *
     * @ORM\Column(name="utero_posicion", type="string", length=1, nullable=true)
     */
    private $uteroPosicion;

    /**
     * @var string
     *
     * @ORM\Column(name="utero_tamano", type="string", length=1, nullable=true)
     */
    private $uteroTamano;

    /**
     * @var string
     *
     * @ORM\Column(name="utero_histerometria", type="decimal", precision=2, scale=0, nullable=true)
     */
    private $uteroHisterometria;

    /**
     * @var string
     *
     * @ORM\Column(name="utero_movilidad", type="string", length=1, nullable=true)
     */
    private $uteroMovilidad;

    /**
     * @var boolean
     *
     * @ORM\Column(name="utero_dolor_mov", type="boolean", nullable=true)
     */
    private $uteroDolorMov;

    /**
     * @var boolean
     *
     * @ORM\Column(name="utero_anexo_libre", type="boolean", nullable=true)
     */
    private $uteroAnexoLibre;

    /**
     * @var boolean
     *
     * @ORM\Column(name="utero_anexo_engrosado", type="boolean", nullable=true)
     */
    private $uteroAnexoEngrosado;

    /**
     * @var boolean
     *
     * @ORM\Column(name="utero_dolor_palpacion", type="boolean", nullable=true)
     */
    private $uteroDolorPalpacion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="utero_tumores", type="boolean", nullable=true)
     */
    private $uteroTumores;

    /**
     * @var boolean
     *
     * @ORM\Column(name="utero_fondo_saco", type="boolean", nullable=true)
     */
    private $uteroFondoSaco;

    /**
     * @var string
     *
     * @ORM\Column(name="utero_observaciones", type="string", length=100, nullable=true)
     */
    private $uteroObservaciones;

    /**
     * @var \SrgInscripcion
     *
     * @ORM\OneToOne(targetEntity="SrgInscripcion", inversedBy="SrgExamenGineInscripcion")
     *   @ORM\JoinColumn(name="id_inscripcion", referencedColumnName="id")
     */
    private $idInscripcion;



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
     * Set genitalesExternos
     *
     * @param string $genitalesExternos
     * @return SrgExamenGineInscripcion
     */
    public function setGenitalesExternos($genitalesExternos)
    {
        $this->genitalesExternos = $genitalesExternos;

        return $this;
    }

    /**
     * Get genitalesExternos
     *
     * @return string 
     */
    public function getGenitalesExternos()
    {
        return $this->genitalesExternos;
    }

    /**
     * Set prolapsoUterino
     *
     * @param boolean $prolapsoUterino
     * @return SrgExamenGineInscripcion
     */
    public function setProlapsoUterino($prolapsoUterino)
    {
        $this->prolapsoUterino = $prolapsoUterino;

        return $this;
    }

    /**
     * Get prolapsoUterino
     *
     * @return boolean 
     */
    public function getProlapsoUterino()
    {
        return $this->prolapsoUterino;
    }

    /**
     * Set grado
     *
     * @param string $grado
     * @return SrgExamenGineInscripcion
     */
    public function setGrado($grado)
    {
        $this->grado = $grado;

        return $this;
    }

    /**
     * Get grado
     *
     * @return string 
     */
    public function getGrado()
    {
        return $this->grado;
    }

    /**
     * Set vagina
     *
     * @param string $vagina
     * @return SrgExamenGineInscripcion
     */
    public function setVagina($vagina)
    {
        $this->vagina = $vagina;

        return $this;
    }

    /**
     * Get vagina
     *
     * @return string 
     */
    public function getVagina()
    {
        return $this->vagina;
    }

    /**
     * Set cuelloUterinoMovilidad
     *
     * @param string $cuelloUterinoMovilidad
     * @return SrgExamenGineInscripcion
     */
    public function setCuelloUterinoMovilidad($cuelloUterinoMovilidad)
    {
        $this->cuelloUterinoMovilidad = $cuelloUterinoMovilidad;

        return $this;
    }

    /**
     * Get cuelloUterinoMovilidad
     *
     * @return string 
     */
    public function getCuelloUterinoMovilidad()
    {
        return $this->cuelloUterinoMovilidad;
    }

    /**
     * Set cuelloUterinoDolorMov
     *
     * @param string $cuelloUterinoDolorMov
     * @return SrgExamenGineInscripcion
     */
    public function setCuelloUterinoDolorMov($cuelloUterinoDolorMov)
    {
        $this->cuelloUterinoDolorMov = $cuelloUterinoDolorMov;

        return $this;
    }

    /**
     * Get cuelloUterinoDolorMov
     *
     * @return string 
     */
    public function getCuelloUterinoDolorMov()
    {
        return $this->cuelloUterinoDolorMov;
    }

    /**
     * Set cuelloUterinoSangra
     *
     * @param boolean $cuelloUterinoSangra
     * @return SrgExamenGineInscripcion
     */
    public function setCuelloUterinoSangra($cuelloUterinoSangra)
    {
        $this->cuelloUterinoSangra = $cuelloUterinoSangra;

        return $this;
    }

    /**
     * Get cuelloUterinoSangra
     *
     * @return boolean 
     */
    public function getCuelloUterinoSangra()
    {
        return $this->cuelloUterinoSangra;
    }

    /**
     * Set tomaPap
     *
     * @param boolean $tomaPap
     * @return SrgExamenGineInscripcion
     */
    public function setTomaPap($tomaPap)
    {
        $this->tomaPap = $tomaPap;

        return $this;
    }

    /**
     * Get tomaPap
     *
     * @return boolean 
     */
    public function getTomaPap()
    {
        return $this->tomaPap;
    }

    /**
     * Set papObservaciones
     *
     * @param string $papObservaciones
     * @return SrgExamenGineInscripcion
     */
    public function setPapObservaciones($papObservaciones)
    {
        $this->papObservaciones = $papObservaciones;

        return $this;
    }

    /**
     * Get papObservaciones
     *
     * @return string 
     */
    public function getPapObservaciones()
    {
        return $this->papObservaciones;
    }

    /**
     * Set uteroPosicion
     *
     * @param string $uteroPosicion
     * @return SrgExamenGineInscripcion
     */
    public function setUteroPosicion($uteroPosicion)
    {
        $this->uteroPosicion = $uteroPosicion;

        return $this;
    }

    /**
     * Get uteroPosicion
     *
     * @return string 
     */
    public function getUteroPosicion()
    {
        return $this->uteroPosicion;
    }

    /**
     * Set uteroTamano
     *
     * @param string $uteroTamano
     * @return SrgExamenGineInscripcion
     */
    public function setUteroTamano($uteroTamano)
    {
        $this->uteroTamano = $uteroTamano;

        return $this;
    }

    /**
     * Get uteroTamano
     *
     * @return string 
     */
    public function getUteroTamano()
    {
        return $this->uteroTamano;
    }

    /**
     * Set uteroHisterometria
     *
     * @param string $uteroHisterometria
     * @return SrgExamenGineInscripcion
     */
    public function setUteroHisterometria($uteroHisterometria)
    {
        $this->uteroHisterometria = $uteroHisterometria;

        return $this;
    }

    /**
     * Get uteroHisterometria
     *
     * @return string 
     */
    public function getUteroHisterometria()
    {
        return $this->uteroHisterometria;
    }

    /**
     * Set uteroMovilidad
     *
     * @param string $uteroMovilidad
     * @return SrgExamenGineInscripcion
     */
    public function setUteroMovilidad($uteroMovilidad)
    {
        $this->uteroMovilidad = $uteroMovilidad;

        return $this;
    }

    /**
     * Get uteroMovilidad
     *
     * @return string 
     */
    public function getUteroMovilidad()
    {
        return $this->uteroMovilidad;
    }

    /**
     * Set uteroDolorMov
     *
     * @param boolean $uteroDolorMov
     * @return SrgExamenGineInscripcion
     */
    public function setUteroDolorMov($uteroDolorMov)
    {
        $this->uteroDolorMov = $uteroDolorMov;

        return $this;
    }

    /**
     * Get uteroDolorMov
     *
     * @return boolean 
     */
    public function getUteroDolorMov()
    {
        return $this->uteroDolorMov;
    }

    /**
     * Set uteroAnexoLibre
     *
     * @param boolean $uteroAnexoLibre
     * @return SrgExamenGineInscripcion
     */
    public function setUteroAnexoLibre($uteroAnexoLibre)
    {
        $this->uteroAnexoLibre = $uteroAnexoLibre;

        return $this;
    }

    /**
     * Get uteroAnexoLibre
     *
     * @return boolean 
     */
    public function getUteroAnexoLibre()
    {
        return $this->uteroAnexoLibre;
    }

    /**
     * Set uteroAnexoEngrosado
     *
     * @param boolean $uteroAnexoEngrosado
     * @return SrgExamenGineInscripcion
     */
    public function setUteroAnexoEngrosado($uteroAnexoEngrosado)
    {
        $this->uteroAnexoEngrosado = $uteroAnexoEngrosado;

        return $this;
    }

    /**
     * Get uteroAnexoEngrosado
     *
     * @return boolean 
     */
    public function getUteroAnexoEngrosado()
    {
        return $this->uteroAnexoEngrosado;
    }

    /**
     * Set uteroDolorPalpacion
     *
     * @param boolean $uteroDolorPalpacion
     * @return SrgExamenGineInscripcion
     */
    public function setUteroDolorPalpacion($uteroDolorPalpacion)
    {
        $this->uteroDolorPalpacion = $uteroDolorPalpacion;

        return $this;
    }

    /**
     * Get uteroDolorPalpacion
     *
     * @return boolean 
     */
    public function getUteroDolorPalpacion()
    {
        return $this->uteroDolorPalpacion;
    }

    /**
     * Set uteroTumores
     *
     * @param boolean $uteroTumores
     * @return SrgExamenGineInscripcion
     */
    public function setUteroTumores($uteroTumores)
    {
        $this->uteroTumores = $uteroTumores;

        return $this;
    }

    /**
     * Get uteroTumores
     *
     * @return boolean 
     */
    public function getUteroTumores()
    {
        return $this->uteroTumores;
    }

    /**
     * Set uteroFondoSaco
     *
     * @param boolean $uteroFondoSaco
     * @return SrgExamenGineInscripcion
     */
    public function setUteroFondoSaco($uteroFondoSaco)
    {
        $this->uteroFondoSaco = $uteroFondoSaco;

        return $this;
    }

    /**
     * Get uteroFondoSaco
     *
     * @return boolean 
     */
    public function getUteroFondoSaco()
    {
        return $this->uteroFondoSaco;
    }

    /**
     * Set uteroObservaciones
     *
     * @param string $uteroObservaciones
     * @return SrgExamenGineInscripcion
     */
    public function setUteroObservaciones($uteroObservaciones)
    {
        $this->uteroObservaciones = $uteroObservaciones;

        return $this;
    }

    /**
     * Get uteroObservaciones
     *
     * @return string 
     */
    public function getUteroObservaciones()
    {
        return $this->uteroObservaciones;
    }

    /**
     * Set idInscripcion
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgInscripcion $idInscripcion
     * @return SrgExamenGineInscripcion
     */
    public function setIdInscripcion(\Minsal\GinecologiaBundle\Entity\SrgInscripcion $idInscripcion = null)
    {
        $this->idInscripcion = $idInscripcion;

        return $this;
    }

    /**
     * Get idInscripcion
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgInscripcion 
     */
    public function getIdInscripcion()
    {
        return $this->idInscripcion;
    }


   public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }


    
}
