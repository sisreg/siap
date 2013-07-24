<?php

namespace Minsal\LaboratorioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LabAreaLaboratorio
 *
 * @ORM\Table(name="lab_area_laboratorio")
 * @ORM\Entity
 */
class LabAreaLaboratorio
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="lab_area_laboratorio_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="codigo", type="string", length=4, nullable=false)
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=30, nullable=true)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="administrativa", type="string", nullable=true)
     */
    private $administrativa;

    /**
     * @var integer
     *
     * @ORM\Column(name="idusuarioreg", type="smallint", nullable=true)
     */
    private $idusuarioreg;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechahorareg", type="datetime", nullable=true)
     */
    private $fechahorareg;

    /**
     * @var integer
     *
     * @ORM\Column(name="idusuariomod", type="smallint", nullable=true)
     */
    private $idusuariomod;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechahoramod", type="datetime", nullable=true)
     */
    private $fechahoramod;



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
     * @return LabAreaLaboratorio
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
     * Set nombre
     *
     * @param string $nombre
     * @return LabAreaLaboratorio
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
     * Set administrativa
     *
     * @param string $administrativa
     * @return LabAreaLaboratorio
     */
    public function setAdministrativa($administrativa)
    {
        $this->administrativa = $administrativa;
    
        return $this;
    }

    /**
     * Get administrativa
     *
     * @return string 
     */
    public function getAdministrativa()
    {
        return $this->administrativa;
    }

    /**
     * Set idusuarioreg
     *
     * @param integer $idusuarioreg
     * @return LabAreaLaboratorio
     */
    public function setIdusuarioreg($idusuarioreg)
    {
        $this->idusuarioreg = $idusuarioreg;
    
        return $this;
    }

    /**
     * Get idusuarioreg
     *
     * @return integer 
     */
    public function getIdusuarioreg()
    {
        return $this->idusuarioreg;
    }

    /**
     * Set fechahorareg
     *
     * @param \DateTime $fechahorareg
     * @return LabAreaLaboratorio
     */
    public function setFechahorareg($fechahorareg)
    {
        $this->fechahorareg = $fechahorareg;
    
        return $this;
    }

    /**
     * Get fechahorareg
     *
     * @return \DateTime 
     */
    public function getFechahorareg()
    {
        return $this->fechahorareg;
    }

    /**
     * Set idusuariomod
     *
     * @param integer $idusuariomod
     * @return LabAreaLaboratorio
     */
    public function setIdusuariomod($idusuariomod)
    {
        $this->idusuariomod = $idusuariomod;
    
        return $this;
    }

    /**
     * Get idusuariomod
     *
     * @return integer 
     */
    public function getIdusuariomod()
    {
        return $this->idusuariomod;
    }

    /**
     * Set fechahoramod
     *
     * @param \DateTime $fechahoramod
     * @return LabAreaLaboratorio
     */
    public function setFechahoramod($fechahoramod)
    {
        $this->fechahoramod = $fechahoramod;
    
        return $this;
    }

    /**
     * Get fechahoramod
     *
     * @return \DateTime 
     */
    public function getFechahoramod()
    {
        return $this->fechahoramod;
    }
}