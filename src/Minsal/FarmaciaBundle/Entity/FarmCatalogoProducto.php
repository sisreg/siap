<?php

namespace Minsal\FarmaciaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FarmCatalogoProducto
 *
 * @ORM\Table(name="farm_catalogo_producto")
 * @ORM\Entity
 */
class FarmCatalogoProducto
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="farm_catalogo_producto_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=8, nullable=true)
     */
    private $codigo;

    /**
     * @var integer
     *
     * @ORM\Column(name="idtipoproducto", type="integer", nullable=true)
     */
    private $idtipoproducto;

    /**
     * @var integer
     *
     * @ORM\Column(name="idunidadmedida", type="integer", nullable=true)
     */
    private $idunidadmedida;

    /**
     * @var integer
     *
     * @ORM\Column(name="niveluso", type="integer", nullable=true)
     */
    private $niveluso;

    /**
     * @var string
     *
     * @ORM\Column(name="formafarmaceutica", type="string", length=91, nullable=true)
     */
    private $formafarmaceutica;

    /**
     * @var string
     *
     * @ORM\Column(name="presentacion", type="string", length=150, nullable=true)
     */
    private $presentacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="prioridad", type="integer", nullable=true)
     */
    private $prioridad;

    /**
     * @var string
     *
     * @ORM\Column(name="precioactual", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $precioactual;

    /**
     * @var integer
     *
     * @ORM\Column(name="aplicalote", type="integer", nullable=true)
     */
    private $aplicalote;

    /**
     * @var string
     *
     * @ORM\Column(name="existenciaactual", type="decimal", precision=12, scale=2, nullable=true)
     */
    private $existenciaactual;

    /**
     * @var string
     *
     * @ORM\Column(name="especificacionestecnicas", type="string", length=500, nullable=true)
     */
    private $especificacionestecnicas;

    /**
     * @var string
     *
     * @ORM\Column(name="codigonacionesunidas", type="string", length=20, nullable=true)
     */
    private $codigonacionesunidas;

    /**
     * @var integer
     *
     * @ORM\Column(name="pertenecelistadooficial", type="integer", nullable=true)
     */
    private $pertenecelistadooficial;

    /**
     * @var integer
     *
     * @ORM\Column(name="estadoproducto", type="integer", nullable=true)
     */
    private $estadoproducto;

    /**
     * @var string
     *
     * @ORM\Column(name="observacion", type="string", length=500, nullable=true)
     */
    private $observacion;

    /**
     * @var string
     *
     * @ORM\Column(name="auusuariocreacion", type="string", length=15, nullable=true)
     */
    private $auusuariocreacion;

    /**
     * @var string
     *
     * @ORM\Column(name="aufechacreacion", type="string", length=500, nullable=true)
     */
    private $aufechacreacion;

    /**
     * @var string
     *
     * @ORM\Column(name="auusuariomodificacion", type="string", length=15, nullable=true)
     */
    private $auusuariomodificacion;

    /**
     * @var string
     *
     * @ORM\Column(name="aufechamodificacion", type="string", length=500, nullable=true)
     */
    private $aufechamodificacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="estasincronizada", type="integer", nullable=true)
     */
    private $estasincronizada;

    /**
     * @var integer
     *
     * @ORM\Column(name="idestablecimientos", type="integer", nullable=true)
     */
    private $idestablecimientos;

    /**
     * @var string
     *
     * @ORM\Column(name="clasificacion", type="string", length=1, nullable=true)
     */
    private $clasificacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="areatecnica", type="integer", nullable=true)
     */
    private $areatecnica;

    /**
     * @var integer
     *
     * @ORM\Column(name="tipouaci", type="integer", nullable=true)
     */
    private $tipouaci;

    /**
     * @var integer
     *
     * @ORM\Column(name="idespecificogasto", type="integer", nullable=true)
     */
    private $idespecificogasto;

    /**
     * @var string
     *
     * @ORM\Column(name="ultimoprecio", type="decimal", precision=19, scale=16, nullable=true)
     */
    private $ultimoprecio;

    /**
     * @var integer
     *
     * @ORM\Column(name="idterapeutico", type="integer", nullable=true)
     */
    private $idterapeutico;

    /**
     * @var integer
     *
     * @ORM\Column(name="idhospital", type="integer", nullable=true)
     */
    private $idhospital;

    /**
     * @var string
     *
     * @ORM\Column(name="idestado", type="string", length=1, nullable=true)
     */
    private $idestado;

    /**
     * @var integer
     *
     * @ORM\Column(name="idcategoriamedicina", type="integer", nullable=true)
     */
    private $idcategoriamedicina;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=500, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="concentracion", type="string", length=382, nullable=true)
     */
    private $concentracion;



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
     * Set codigo
     *
     * @param string $codigo
     * @return FarmCatalogoProducto
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Get codigo
     *
     * @return string 
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Set idtipoproducto
     *
     * @param integer $idtipoproducto
     * @return FarmCatalogoProducto
     */
    public function setIdtipoproducto($idtipoproducto)
    {
        $this->idtipoproducto = $idtipoproducto;

        return $this;
    }

    /**
     * Get idtipoproducto
     *
     * @return integer 
     */
    public function getIdtipoproducto()
    {
        return $this->idtipoproducto;
    }

    /**
     * Set idunidadmedida
     *
     * @param integer $idunidadmedida
     * @return FarmCatalogoProducto
     */
    public function setIdunidadmedida($idunidadmedida)
    {
        $this->idunidadmedida = $idunidadmedida;

        return $this;
    }

    /**
     * Get idunidadmedida
     *
     * @return integer 
     */
    public function getIdunidadmedida()
    {
        return $this->idunidadmedida;
    }

    /**
     * Set niveluso
     *
     * @param integer $niveluso
     * @return FarmCatalogoProducto
     */
    public function setNiveluso($niveluso)
    {
        $this->niveluso = $niveluso;

        return $this;
    }

    /**
     * Get niveluso
     *
     * @return integer 
     */
    public function getNiveluso()
    {
        return $this->niveluso;
    }

    /**
     * Set formafarmaceutica
     *
     * @param string $formafarmaceutica
     * @return FarmCatalogoProducto
     */
    public function setFormafarmaceutica($formafarmaceutica)
    {
        $this->formafarmaceutica = $formafarmaceutica;

        return $this;
    }

    /**
     * Get formafarmaceutica
     *
     * @return string 
     */
    public function getFormafarmaceutica()
    {
        return $this->formafarmaceutica;
    }

    /**
     * Set presentacion
     *
     * @param string $presentacion
     * @return FarmCatalogoProducto
     */
    public function setPresentacion($presentacion)
    {
        $this->presentacion = $presentacion;

        return $this;
    }

    /**
     * Get presentacion
     *
     * @return string 
     */
    public function getPresentacion()
    {
        return $this->presentacion;
    }

    /**
     * Set prioridad
     *
     * @param integer $prioridad
     * @return FarmCatalogoProducto
     */
    public function setPrioridad($prioridad)
    {
        $this->prioridad = $prioridad;

        return $this;
    }

    /**
     * Get prioridad
     *
     * @return integer 
     */
    public function getPrioridad()
    {
        return $this->prioridad;
    }

    /**
     * Set precioactual
     *
     * @param string $precioactual
     * @return FarmCatalogoProducto
     */
    public function setPrecioactual($precioactual)
    {
        $this->precioactual = $precioactual;

        return $this;
    }

    /**
     * Get precioactual
     *
     * @return string 
     */
    public function getPrecioactual()
    {
        return $this->precioactual;
    }

    /**
     * Set aplicalote
     *
     * @param integer $aplicalote
     * @return FarmCatalogoProducto
     */
    public function setAplicalote($aplicalote)
    {
        $this->aplicalote = $aplicalote;

        return $this;
    }

    /**
     * Get aplicalote
     *
     * @return integer 
     */
    public function getAplicalote()
    {
        return $this->aplicalote;
    }

    /**
     * Set existenciaactual
     *
     * @param string $existenciaactual
     * @return FarmCatalogoProducto
     */
    public function setExistenciaactual($existenciaactual)
    {
        $this->existenciaactual = $existenciaactual;

        return $this;
    }

    /**
     * Get existenciaactual
     *
     * @return string 
     */
    public function getExistenciaactual()
    {
        return $this->existenciaactual;
    }

    /**
     * Set especificacionestecnicas
     *
     * @param string $especificacionestecnicas
     * @return FarmCatalogoProducto
     */
    public function setEspecificacionestecnicas($especificacionestecnicas)
    {
        $this->especificacionestecnicas = $especificacionestecnicas;

        return $this;
    }

    /**
     * Get especificacionestecnicas
     *
     * @return string 
     */
    public function getEspecificacionestecnicas()
    {
        return $this->especificacionestecnicas;
    }

    /**
     * Set codigonacionesunidas
     *
     * @param string $codigonacionesunidas
     * @return FarmCatalogoProducto
     */
    public function setCodigonacionesunidas($codigonacionesunidas)
    {
        $this->codigonacionesunidas = $codigonacionesunidas;

        return $this;
    }

    /**
     * Get codigonacionesunidas
     *
     * @return string 
     */
    public function getCodigonacionesunidas()
    {
        return $this->codigonacionesunidas;
    }

    /**
     * Set pertenecelistadooficial
     *
     * @param integer $pertenecelistadooficial
     * @return FarmCatalogoProducto
     */
    public function setPertenecelistadooficial($pertenecelistadooficial)
    {
        $this->pertenecelistadooficial = $pertenecelistadooficial;

        return $this;
    }

    /**
     * Get pertenecelistadooficial
     *
     * @return integer 
     */
    public function getPertenecelistadooficial()
    {
        return $this->pertenecelistadooficial;
    }

    /**
     * Set estadoproducto
     *
     * @param integer $estadoproducto
     * @return FarmCatalogoProducto
     */
    public function setEstadoproducto($estadoproducto)
    {
        $this->estadoproducto = $estadoproducto;

        return $this;
    }

    /**
     * Get estadoproducto
     *
     * @return integer 
     */
    public function getEstadoproducto()
    {
        return $this->estadoproducto;
    }

    /**
     * Set observacion
     *
     * @param string $observacion
     * @return FarmCatalogoProducto
     */
    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;

        return $this;
    }

    /**
     * Get observacion
     *
     * @return string 
     */
    public function getObservacion()
    {
        return $this->observacion;
    }

    /**
     * Set auusuariocreacion
     *
     * @param string $auusuariocreacion
     * @return FarmCatalogoProducto
     */
    public function setAuusuariocreacion($auusuariocreacion)
    {
        $this->auusuariocreacion = $auusuariocreacion;

        return $this;
    }

    /**
     * Get auusuariocreacion
     *
     * @return string 
     */
    public function getAuusuariocreacion()
    {
        return $this->auusuariocreacion;
    }

    /**
     * Set aufechacreacion
     *
     * @param string $aufechacreacion
     * @return FarmCatalogoProducto
     */
    public function setAufechacreacion($aufechacreacion)
    {
        $this->aufechacreacion = $aufechacreacion;

        return $this;
    }

    /**
     * Get aufechacreacion
     *
     * @return string 
     */
    public function getAufechacreacion()
    {
        return $this->aufechacreacion;
    }

    /**
     * Set auusuariomodificacion
     *
     * @param string $auusuariomodificacion
     * @return FarmCatalogoProducto
     */
    public function setAuusuariomodificacion($auusuariomodificacion)
    {
        $this->auusuariomodificacion = $auusuariomodificacion;

        return $this;
    }

    /**
     * Get auusuariomodificacion
     *
     * @return string 
     */
    public function getAuusuariomodificacion()
    {
        return $this->auusuariomodificacion;
    }

    /**
     * Set aufechamodificacion
     *
     * @param string $aufechamodificacion
     * @return FarmCatalogoProducto
     */
    public function setAufechamodificacion($aufechamodificacion)
    {
        $this->aufechamodificacion = $aufechamodificacion;

        return $this;
    }

    /**
     * Get aufechamodificacion
     *
     * @return string 
     */
    public function getAufechamodificacion()
    {
        return $this->aufechamodificacion;
    }

    /**
     * Set estasincronizada
     *
     * @param integer $estasincronizada
     * @return FarmCatalogoProducto
     */
    public function setEstasincronizada($estasincronizada)
    {
        $this->estasincronizada = $estasincronizada;

        return $this;
    }

    /**
     * Get estasincronizada
     *
     * @return integer 
     */
    public function getEstasincronizada()
    {
        return $this->estasincronizada;
    }

    /**
     * Set idestablecimientos
     *
     * @param integer $idestablecimientos
     * @return FarmCatalogoProducto
     */
    public function setIdestablecimientos($idestablecimientos)
    {
        $this->idestablecimientos = $idestablecimientos;

        return $this;
    }

    /**
     * Get idestablecimientos
     *
     * @return integer 
     */
    public function getIdestablecimientos()
    {
        return $this->idestablecimientos;
    }

    /**
     * Set clasificacion
     *
     * @param string $clasificacion
     * @return FarmCatalogoProducto
     */
    public function setClasificacion($clasificacion)
    {
        $this->clasificacion = $clasificacion;

        return $this;
    }

    /**
     * Get clasificacion
     *
     * @return string 
     */
    public function getClasificacion()
    {
        return $this->clasificacion;
    }

    /**
     * Set areatecnica
     *
     * @param integer $areatecnica
     * @return FarmCatalogoProducto
     */
    public function setAreatecnica($areatecnica)
    {
        $this->areatecnica = $areatecnica;

        return $this;
    }

    /**
     * Get areatecnica
     *
     * @return integer 
     */
    public function getAreatecnica()
    {
        return $this->areatecnica;
    }

    /**
     * Set tipouaci
     *
     * @param integer $tipouaci
     * @return FarmCatalogoProducto
     */
    public function setTipouaci($tipouaci)
    {
        $this->tipouaci = $tipouaci;

        return $this;
    }

    /**
     * Get tipouaci
     *
     * @return integer 
     */
    public function getTipouaci()
    {
        return $this->tipouaci;
    }

    /**
     * Set idespecificogasto
     *
     * @param integer $idespecificogasto
     * @return FarmCatalogoProducto
     */
    public function setIdespecificogasto($idespecificogasto)
    {
        $this->idespecificogasto = $idespecificogasto;

        return $this;
    }

    /**
     * Get idespecificogasto
     *
     * @return integer 
     */
    public function getIdespecificogasto()
    {
        return $this->idespecificogasto;
    }

    /**
     * Set ultimoprecio
     *
     * @param string $ultimoprecio
     * @return FarmCatalogoProducto
     */
    public function setUltimoprecio($ultimoprecio)
    {
        $this->ultimoprecio = $ultimoprecio;

        return $this;
    }

    /**
     * Get ultimoprecio
     *
     * @return string 
     */
    public function getUltimoprecio()
    {
        return $this->ultimoprecio;
    }

    /**
     * Set idterapeutico
     *
     * @param integer $idterapeutico
     * @return FarmCatalogoProducto
     */
    public function setIdterapeutico($idterapeutico)
    {
        $this->idterapeutico = $idterapeutico;

        return $this;
    }

    /**
     * Get idterapeutico
     *
     * @return integer 
     */
    public function getIdterapeutico()
    {
        return $this->idterapeutico;
    }

    /**
     * Set idhospital
     *
     * @param integer $idhospital
     * @return FarmCatalogoProducto
     */
    public function setIdhospital($idhospital)
    {
        $this->idhospital = $idhospital;

        return $this;
    }

    /**
     * Get idhospital
     *
     * @return integer 
     */
    public function getIdhospital()
    {
        return $this->idhospital;
    }

    /**
     * Set idestado
     *
     * @param string $idestado
     * @return FarmCatalogoProducto
     */
    public function setIdestado($idestado)
    {
        $this->idestado = $idestado;

        return $this;
    }

    /**
     * Get idestado
     *
     * @return string 
     */
    public function getIdestado()
    {
        return $this->idestado;
    }

    /**
     * Set idcategoriamedicina
     *
     * @param integer $idcategoriamedicina
     * @return FarmCatalogoProducto
     */
    public function setIdcategoriamedicina($idcategoriamedicina)
    {
        $this->idcategoriamedicina = $idcategoriamedicina;

        return $this;
    }

    /**
     * Get idcategoriamedicina
     *
     * @return integer 
     */
    public function getIdcategoriamedicina()
    {
        return $this->idcategoriamedicina;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     * @return FarmCatalogoProducto
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string 
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set concentracion
     *
     * @param string $concentracion
     * @return FarmCatalogoProducto
     */
    public function setConcentracion($concentracion)
    {
        $this->concentracion = $concentracion;

        return $this;
    }

    /**
     * Get concentracion
     *
     * @return string 
     */
    public function getConcentracion()
    {
        return $this->concentracion;
    }
}
