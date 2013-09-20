<?php

namespace Minsal\EnfermeriaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EnfAplicacionVacuna
 *
 * @ORM\Table(name="enf_aplicacion_vacuna", indexes={@ORM\Index(name="fki_catalogo_producto_aplicacion_vacuna", columns={"id_catalogo_producto"})})
 * @ORM\Entity
 */
class EnfAplicacionVacuna
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="enf_aplicacion_vacuna_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="edad_minima", type="smallint", nullable=true)
     */
    private $edadMinima;

    /**
     * @var string
     *
     * @ORM\Column(name="unidad_minima", type="string", length=10, nullable=true)
     */
    private $unidadMinima;

    /**
     * @var integer
     *
     * @ORM\Column(name="edad_maxima", type="smallint", nullable=true)
     */
    private $edadMaxima;

    /**
     * @var string
     *
     * @ORM\Column(name="unidad_maxima", type="string", length=10, nullable=true)
     */
    private $unidadMaxima;

    /**
     * @var string
     *
     * @ORM\Column(name="via_administracion", type="string", length=20, nullable=true)
     */
    private $viaAdministracion;

    /**
     * @var \FarmCatalogoProducto
     *
     * @ORM\ManyToOne(targetEntity="FarmCatalogoProducto")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_catalogo_producto", referencedColumnName="id")
     * })
     */
    private $idCatalogoProducto;



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
     * Set edadMinima
     *
     * @param integer $edadMinima
     * @return EnfAplicacionVacuna
     */
    public function setEdadMinima($edadMinima)
    {
        $this->edadMinima = $edadMinima;

        return $this;
    }

    /**
     * Get edadMinima
     *
     * @return integer 
     */
    public function getEdadMinima()
    {
        return $this->edadMinima;
    }

    /**
     * Set unidadMinima
     *
     * @param string $unidadMinima
     * @return EnfAplicacionVacuna
     */
    public function setUnidadMinima($unidadMinima)
    {
        $this->unidadMinima = $unidadMinima;

        return $this;
    }

    /**
     * Get unidadMinima
     *
     * @return string 
     */
    public function getUnidadMinima()
    {
        return $this->unidadMinima;
    }

    /**
     * Set edadMaxima
     *
     * @param integer $edadMaxima
     * @return EnfAplicacionVacuna
     */
    public function setEdadMaxima($edadMaxima)
    {
        $this->edadMaxima = $edadMaxima;

        return $this;
    }

    /**
     * Get edadMaxima
     *
     * @return integer 
     */
    public function getEdadMaxima()
    {
        return $this->edadMaxima;
    }

    /**
     * Set unidadMaxima
     *
     * @param string $unidadMaxima
     * @return EnfAplicacionVacuna
     */
    public function setUnidadMaxima($unidadMaxima)
    {
        $this->unidadMaxima = $unidadMaxima;

        return $this;
    }

    /**
     * Get unidadMaxima
     *
     * @return string 
     */
    public function getUnidadMaxima()
    {
        return $this->unidadMaxima;
    }

    /**
     * Set viaAdministracion
     *
     * @param string $viaAdministracion
     * @return EnfAplicacionVacuna
     */
    public function setViaAdministracion($viaAdministracion)
    {
        $this->viaAdministracion = $viaAdministracion;

        return $this;
    }

    /**
     * Get viaAdministracion
     *
     * @return string 
     */
    public function getViaAdministracion()
    {
        return $this->viaAdministracion;
    }

    /**
     * Set idCatalogoProducto
     *
     * @param \Minsal\EnfermeriaBundle\Entity\FarmCatalogoProducto $idCatalogoProducto
     * @return EnfAplicacionVacuna
     */
    public function setIdCatalogoProducto(\Minsal\EnfermeriaBundle\Entity\FarmCatalogoProducto $idCatalogoProducto = null)
    {
        $this->idCatalogoProducto = $idCatalogoProducto;

        return $this;
    }

    /**
     * Get idCatalogoProducto
     *
     * @return \Minsal\EnfermeriaBundle\Entity\FarmCatalogoProducto 
     */
    public function getIdCatalogoProducto()
    {
        return $this->idCatalogoProducto;
    }
}
