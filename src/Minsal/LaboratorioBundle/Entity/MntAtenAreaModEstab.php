<?php

namespace Minsal\LaboratorioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MntAtenAreaModEstab
 *
 * @ORM\Table(name="mnt_aten_area_mod_estab")
 * @ORM\Entity
 */
class MntAtenAreaModEstab
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="mnt_aten_area_mod_estab_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \MntAreaModEstab
     *
     * @ORM\ManyToOne(targetEntity="MntAreaModEstab")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_area_mod_estab", referencedColumnName="id")
     * })
     */
    private $idAreaModEstab;

    /**
     * @var \CtlAtencion
     *
     * @ORM\ManyToOne(targetEntity="CtlAtencion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_atencion", referencedColumnName="id")
     * })
     */
    private $idAtencion;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idAreaModEstab
     *
     * @param \Minsal\LaboratorioBundle\Entity\MntAreaModEstab $idAreaModEstab
     * @return MntAtenAreaModEstab
     */
    public function setIdAreaModEstab(\Minsal\LaboratorioBundle\Entity\MntAreaModEstab $idAreaModEstab = null)
    {
        $this->idAreaModEstab = $idAreaModEstab;
    
        return $this;
    }

    /**
     * Get idAreaModEstab
     *
     * @return \Minsal\LaboratorioBundle\Entity\MntAreaModEstab 
     */
    public function getIdAreaModEstab()
    {
        return $this->idAreaModEstab;
    }

    /**
     * Set idAtencion
     *
     * @param \Minsal\LaboratorioBundle\Entity\CtlAtencion $idAtencion
     * @return MntAtenAreaModEstab
     */
    public function setIdAtencion(\Minsal\LaboratorioBundle\Entity\CtlAtencion $idAtencion = null)
    {
        $this->idAtencion = $idAtencion;
    
        return $this;
    }

    /**
     * Get idAtencion
     *
     * @return \Minsal\LaboratorioBundle\Entity\CtlAtencion 
     */
    public function getIdAtencion()
    {
        return $this->idAtencion;
    }

    /**
     * Set idEstablecimiento
     *
     * @param \Minsal\LaboratorioBundle\Entity\CtlEstablecimiento $idEstablecimiento
     * @return MntAtenAreaModEstab
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
}