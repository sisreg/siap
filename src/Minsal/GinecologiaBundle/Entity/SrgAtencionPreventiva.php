<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgAtencionPreventiva
 *
 * @ORM\Table(name="srg_atencion_preventiva", indexes={@ORM\Index(name="IDX_57564CC930F3FEEA", columns={"id_consulta_gine_pf"})})
 * @ORM\Entity
 */
class SrgAtencionPreventiva
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_atencion_preventiva_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="dispenzarizacion_grupo", type="string", length=5, nullable=true)
     */
    private $dispenzarizacionGrupo;

    /**
     * @var string
     *
     * @ORM\Column(name="dispenzarizacion_tipo", type="string", length=5, nullable=true)
     */
    private $dispenzarizacionTipo;

    /**
     * @var string
     *
     * @ORM\Column(name="lactancia_materna", type="string", length=5, nullable=true)
     */
    private $lactanciaMaterna;

    /**
     * @var string
     *
     * @ORM\Column(name="citologias_prostata_e_ivaa", type="string", length=5, nullable=true)
     */
    private $citologiasProstataEIvaa;

    /**
     * @var string
     *
     * @ORM\Column(name="semanas_de_amenorrea", type="string", length=15, nullable=true)
     */
    private $semanasDeAmenorrea;

    /**
     * @var \SrgConsultaGinePf
     *
     * @ORM\OneToOne(targetEntity="SrgConsultaGinePf", inversedBy="SrgAtencionPreventiva")
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
     * Set dispenzarizacionGrupo
     *
     * @param string $dispenzarizacionGrupo
     * @return SrgAtencionPreventiva
     */
    public function setDispenzarizacionGrupo($dispenzarizacionGrupo)
    {
        $this->dispenzarizacionGrupo = $dispenzarizacionGrupo;

        return $this;
    }

    /**
     * Get dispenzarizacionGrupo
     *
     * @return string 
     */
    public function getDispenzarizacionGrupo()
    {
        return $this->dispenzarizacionGrupo;
    }

    /**
     * Set dispenzarizacionTipo
     *
     * @param string $dispenzarizacionTipo
     * @return SrgAtencionPreventiva
     */
    public function setDispenzarizacionTipo($dispenzarizacionTipo)
    {
        $this->dispenzarizacionTipo = $dispenzarizacionTipo;

        return $this;
    }

    /**
     * Get dispenzarizacionTipo
     *
     * @return string 
     */
    public function getDispenzarizacionTipo()
    {
        return $this->dispenzarizacionTipo;
    }

    /**
     * Set lactanciaMaterna
     *
     * @param string $lactanciaMaterna
     * @return SrgAtencionPreventiva
     */
    public function setLactanciaMaterna($lactanciaMaterna)
    {
        $this->lactanciaMaterna = $lactanciaMaterna;

        return $this;
    }

    /**
     * Get lactanciaMaterna
     *
     * @return string 
     */
    public function getLactanciaMaterna()
    {
        return $this->lactanciaMaterna;
    }

    /**
     * Set citologiasProstataEIvaa
     *
     * @param string $citologiasProstataEIvaa
     * @return SrgAtencionPreventiva
     */
    public function setCitologiasProstataEIvaa($citologiasProstataEIvaa)
    {
        $this->citologiasProstataEIvaa = $citologiasProstataEIvaa;

        return $this;
    }

    /**
     * Get citologiasProstataEIvaa
     *
     * @return string 
     */
    public function getCitologiasProstataEIvaa()
    {
        return $this->citologiasProstataEIvaa;
    }

    /**
     * Set semanasDeAmenorrea
     *
     * @param string $semanasDeAmenorrea
     * @return SrgAtencionPreventiva
     */
    public function setSemanasDeAmenorrea($semanasDeAmenorrea)
    {
        $this->semanasDeAmenorrea = $semanasDeAmenorrea;

        return $this;
    }

    /**
     * Get semanasDeAmenorrea
     *
     * @return string 
     */
    public function getSemanasDeAmenorrea()
    {
        return $this->semanasDeAmenorrea;
    }

    /**
     * Set idConsultaGinePf
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgConsultaGinePf $idConsultaGinePf
     * @return SrgAtencionPreventiva
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
