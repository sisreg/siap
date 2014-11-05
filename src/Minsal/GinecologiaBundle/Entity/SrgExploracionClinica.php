<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgExploracionClinica
 *
 * @ORM\Table(name="srg_exploracion_clinica", indexes={@ORM\Index(name="IDX_2EF5013C30F3FEEA", columns={"id_consulta_gine_pf"})})
 * @ORM\Entity
 */
class SrgExploracionClinica
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_exploracion_clinica_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="mamas", type="boolean", nullable=true)
     */
    private $mamas;

    /**
     * @var boolean
     *
     * @ORM\Column(name="abdomen", type="boolean", nullable=true)
     */
    private $abdomen;

    /**
     * @var boolean
     *
     * @ORM\Column(name="miembros", type="boolean", nullable=true)
     */
    private $miembros;

    /**
     * @var string
     *
     * @ORM\Column(name="mamas_descripcion", type="string", length=20, nullable=true)
     */
    private $mamasDescripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="abdomen_descripcion", type="string", length=20, nullable=true)
     */
    private $abdomenDescripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="miembros_descripcion", type="string", length=20, nullable=true)
     */
    private $miembrosDescripcion;

    /**
     * @var \SrgConsultaGinePf
     *
     * @ORM\OneToOne(targetEntity="SrgConsultaGinePf", inversedBy="SrgExploracionClinica")
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
     * Set mamas
     *
     * @param boolean $mamas
     * @return SrgExploracionClinica
     */
    public function setMamas($mamas)
    {
        $this->mamas = $mamas;

        return $this;
    }

    /**
     * Get mamas
     *
     * @return boolean 
     */
    public function getMamas()
    {
        return $this->mamas;
    }

    /**
     * Set abdomen
     *
     * @param boolean $abdomen
     * @return SrgExploracionClinica
     */
    public function setAbdomen($abdomen)
    {
        $this->abdomen = $abdomen;

        return $this;
    }

    /**
     * Get abdomen
     *
     * @return boolean 
     */
    public function getAbdomen()
    {
        return $this->abdomen;
    }

    /**
     * Set miembros
     *
     * @param boolean $miembros
     * @return SrgExploracionClinica
     */
    public function setMiembros($miembros)
    {
        $this->miembros = $miembros;

        return $this;
    }

    /**
     * Get miembros
     *
     * @return boolean 
     */
    public function getMiembros()
    {
        return $this->miembros;
    }

    /**
     * Set mamasDescripcion
     *
     * @param string $mamasDescripcion
     * @return SrgExploracionClinica
     */
    public function setMamasDescripcion($mamasDescripcion)
    {
        $this->mamasDescripcion = $mamasDescripcion;

        return $this;
    }

    /**
     * Get mamasDescripcion
     *
     * @return string 
     */
    public function getMamasDescripcion()
    {
        return $this->mamasDescripcion;
    }

    /**
     * Set abdomenDescripcion
     *
     * @param string $abdomenDescripcion
     * @return SrgExploracionClinica
     */
    public function setAbdomenDescripcion($abdomenDescripcion)
    {
        $this->abdomenDescripcion = $abdomenDescripcion;

        return $this;
    }

    /**
     * Get abdomenDescripcion
     *
     * @return string 
     */
    public function getAbdomenDescripcion()
    {
        return $this->abdomenDescripcion;
    }

    /**
     * Set miembrosDescripcion
     *
     * @param string $miembrosDescripcion
     * @return SrgExploracionClinica
     */
    public function setMiembrosDescripcion($miembrosDescripcion)
    {
        $this->miembrosDescripcion = $miembrosDescripcion;

        return $this;
    }

    /**
     * Get miembrosDescripcion
     *
     * @return string 
     */
    public function getMiembrosDescripcion()
    {
        return $this->miembrosDescripcion;
    }

    /**
     * Set idConsultaGinePf
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgConsultaGinePf $idConsultaGinePf
     * @return SrgExploracionClinica
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
