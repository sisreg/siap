<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgAntecedAlergia
 *
 * @ORM\Table(name="srg_anteced_alergia", indexes={@ORM\Index(name="IDX_DCA7969830F3FEEA", columns={"id_consulta_gine_pf"})})
 * @ORM\Entity
 */
class SrgAntecedAlergia
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_anteced_alergia_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="medicamentos", type="boolean", nullable=true)
     */
    private $medicamentos;

    /**
     * @var string
     *
     * @ORM\Column(name="medicamentos_descripcion", type="string", length=200, nullable=true)
     */
    private $medicamentosDescripcion;

    /**
     * @var boolean
     *
     * @ORM\Column(name="otros", type="boolean", nullable=true)
     */
    private $otros;

    /**
     * @var string
     *
     * @ORM\Column(name="otros_descripcion", type="string", length=200, nullable=true)
     */
    private $otrosDescripcion;

    /**
     * @var \SrgConsultaGinePf
     *
     * @ORM\OneToOne(targetEntity="SrgConsultaGinePf", inversedBy="SrgAntecedAlergia")
     *   @ORM\JoinColumn(name="id_consulta_gine_pf", referencedColumnName="id")
     */
    private $idConsultaGinePf;



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
     * Set medicamentos
     *
     * @param boolean $medicamentos
     * @return SrgAntecedAlergia
     */
    public function setMedicamentos($medicamentos)
    {
        $this->medicamentos = $medicamentos;

        return $this;
    }

    /**
     * Get medicamentos
     *
     * @return boolean 
     */
    public function getMedicamentos()
    {
        return $this->medicamentos;
    }

    /**
     * Set medicamentosDescripcion
     *
     * @param string $medicamentosDescripcion
     * @return SrgAntecedAlergia
     */
    public function setMedicamentosDescripcion($medicamentosDescripcion)
    {
        $this->medicamentosDescripcion = $medicamentosDescripcion;

        return $this;
    }

    /**
     * Get medicamentosDescripcion
     *
     * @return string 
     */
    public function getMedicamentosDescripcion()
    {
        return $this->medicamentosDescripcion;
    }

    /**
     * Set otros
     *
     * @param boolean $otros
     * @return SrgAntecedAlergia
     */
    public function setOtros($otros)
    {
        $this->otros = $otros;

        return $this;
    }

    /**
     * Get otros
     *
     * @return boolean 
     */
    public function getOtros()
    {
        return $this->otros;
    }

    /**
     * Set otrosDescripcion
     *
     * @param string $otrosDescripcion
     * @return SrgAntecedAlergia
     */
    public function setOtrosDescripcion($otrosDescripcion)
    {
        $this->otrosDescripcion = $otrosDescripcion;

        return $this;
    }

    /**
     * Get otrosDescripcion
     *
     * @return string 
     */
    public function getOtrosDescripcion()
    {
        return $this->otrosDescripcion;
    }

    /**
     * Set idConsultaGinePf
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgConsultaGinePf $idConsultaGinePf
     * @return SrgAntecedAlergia
     */
    public function setIdConsultaGinePf(\Minsal\GinecologiaBundle\Entity\SrgConsultaGinePf $idConsultaGinePf = null)
    {
        $this->idConsultaGinePf = $idConsultaGinePf;

        return $this;
    }

    /**
     * Get idConsultaGinePf
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgConsultaGinePf 
     */
    public function getIdConsultaGinePf()
    {
        return $this->idConsultaGinePf;
    }


   public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }
    
}
