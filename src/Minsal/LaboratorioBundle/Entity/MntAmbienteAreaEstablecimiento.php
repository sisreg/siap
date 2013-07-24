<?php

namespace Minsal\LaboratorioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MntAmbienteAreaEstablecimiento
 *
 * @ORM\Table(name="mnt_ambiente_area_establecimiento")
 * @ORM\Entity
 */
class MntAmbienteAreaEstablecimiento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="mnt_ambiente_area_establecimiento_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=80, nullable=false)
     */
    private $nombre;

    /**
     * @var \MntAtenAreaModEstab
     *
     * @ORM\ManyToOne(targetEntity="MntAtenAreaModEstab")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_aten_area_mod_estab", referencedColumnName="id")
     * })
     */
    private $idAtenAreaModEstab;

    /**
     * @var \CtlEstablecimiento
     *
     * @ORM\ManyToOne(targetEntity="CtlEstablecimiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_establecimiento", referencedColumnName="id")
     * })
     */
    private $idEstablecimiento;

    /**
     * @var \CtlServicioExterno
     *
     * @ORM\ManyToOne(targetEntity="CtlServicioExterno")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_servicio_externo", referencedColumnName="id")
     * })
     */
    private $idServicioExterno;



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
     * Set nombre
     *
     * @param string $nombre
     * @return MntAmbienteAreaEstablecimiento
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
     * Set idAtenAreaModEstab
     *
     * @param \Minsal\LaboratorioBundle\Entity\MntAtenAreaModEstab $idAtenAreaModEstab
     * @return MntAmbienteAreaEstablecimiento
     */
    public function setIdAtenAreaModEstab(\Minsal\LaboratorioBundle\Entity\MntAtenAreaModEstab $idAtenAreaModEstab = null)
    {
        $this->idAtenAreaModEstab = $idAtenAreaModEstab;
    
        return $this;
    }

    /**
     * Get idAtenAreaModEstab
     *
     * @return \Minsal\LaboratorioBundle\Entity\MntAtenAreaModEstab 
     */
    public function getIdAtenAreaModEstab()
    {
        return $this->idAtenAreaModEstab;
    }

    /**
     * Set idEstablecimiento
     *
     * @param \Minsal\LaboratorioBundle\Entity\CtlEstablecimiento $idEstablecimiento
     * @return MntAmbienteAreaEstablecimiento
     */
    public function setIdEstablecimiento(\Minsal\LaboratorioBundle\Entity\CtlEstablecimiento $idEstablecimiento = null)
    {
        $this->idEstablecimiento = $idEstablecimiento;
    
        return $this;
    }

    /**
     * Get idEstablecimiento
     *
     * @return \Minsal\LaboratorioBundle\Entity\CtlEstablecimiento 
     */
    public function getIdEstablecimiento()
    {
        return $this->idEstablecimiento;
    }

    /**
     * Set idServicioExterno
     *
     * @param \Minsal\LaboratorioBundle\Entity\CtlServicioExterno $idServicioExterno
     * @return MntAmbienteAreaEstablecimiento
     */
    public function setIdServicioExterno(\Minsal\LaboratorioBundle\Entity\CtlServicioExterno $idServicioExterno = null)
    {
        $this->idServicioExterno = $idServicioExterno;
    
        return $this;
    }

    /**
     * Get idServicioExterno
     *
     * @return \Minsal\LaboratorioBundle\Entity\CtlServicioExterno 
     */
    public function getIdServicioExterno()
    {
        return $this->idServicioExterno;
    }
}