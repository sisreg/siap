<?php

namespace Minsal\LaboratorioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MntServicioExternoEstablecimiento
 *
 * @ORM\Table(name="mnt_servicio_externo_establecimiento")
 * @ORM\Entity
 */
class MntServicioExternoEstablecimiento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="mnt_servicio_externo_establecimiento_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

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
     * Set idEstablecimiento
     *
     * @param \Minsal\LaboratorioBundle\Entity\CtlEstablecimiento $idEstablecimiento
     * @return MntServicioExternoEstablecimiento
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
     * @return MntServicioExternoEstablecimiento
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