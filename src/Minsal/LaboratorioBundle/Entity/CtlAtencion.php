<?php

namespace Minsal\LaboratorioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CtlAtencion
 *
 * @ORM\Table(name="ctl_atencion")
 * @ORM\Entity
 */
class CtlAtencion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ctl_atencion_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=false)
     */
    private $nombre;

    /**
     * @var \CtlAtencion
     *
     * @ORM\ManyToOne(targetEntity="CtlAtencion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_atencion_padre", referencedColumnName="id")
     * })
     */
    private $idAtencionPadre;

    /**
     * @var \CtlTipoAtencion
     *
     * @ORM\ManyToOne(targetEntity="CtlTipoAtencion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipo_atencion", referencedColumnName="id")
     * })
     */
    private $idTipoAtencion;



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
     * @return CtlAtencion
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
     * Set idAtencionPadre
     *
     * @param \Minsal\LaboratorioBundle\Entity\CtlAtencion $idAtencionPadre
     * @return CtlAtencion
     */
    public function setIdAtencionPadre(\Minsal\LaboratorioBundle\Entity\CtlAtencion $idAtencionPadre = null)
    {
        $this->idAtencionPadre = $idAtencionPadre;
    
        return $this;
    }

    /**
     * Get idAtencionPadre
     *
     * @return \Minsal\LaboratorioBundle\Entity\CtlAtencion 
     */
    public function getIdAtencionPadre()
    {
        return $this->idAtencionPadre;
    }

    /**
     * Set idTipoAtencion
     *
     * @param \Minsal\LaboratorioBundle\Entity\CtlTipoAtencion $idTipoAtencion
     * @return CtlAtencion
     */
    public function setIdTipoAtencion(\Minsal\LaboratorioBundle\Entity\CtlTipoAtencion $idTipoAtencion = null)
    {
        $this->idTipoAtencion = $idTipoAtencion;
    
        return $this;
    }

    /**
     * Get idTipoAtencion
     *
     * @return \Minsal\LaboratorioBundle\Entity\CtlTipoAtencion 
     */
    public function getIdTipoAtencion()
    {
        return $this->idTipoAtencion;
    }
}