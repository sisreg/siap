<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgAntecedenteObstetrico
 *
 * @ORM\Table(name="srg_antecedente_obstetrico", indexes={@ORM\Index(name="IDX_8C7C903E701624C4", columns={"id_expediente"}), @ORM\Index(name="IDX_8C7C903EE2546312", columns={"id_ultimo_evento_obstetrico"})})
 * @ORM\Entity
 */
class SrgAntecedenteObstetrico
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_antecedente_obstetrico_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="embarazos", type="decimal", precision=2, scale=0, nullable=true)
     */
    private $embarazos;

    /**
     * @var string
     *
     * @ORM\Column(name="partos_termino", type="decimal", precision=2, scale=0, nullable=true)
     */
    private $partosTermino;

    /**
     * @var string
     *
     * @ORM\Column(name="partos_prematuros", type="decimal", precision=2, scale=0, nullable=true)
     */
    private $partosPrematuros;

    /**
     * @var string
     *
     * @ORM\Column(name="abortos", type="decimal", precision=2, scale=0, nullable=true)
     */
    private $abortos;

    /**
     * @var string
     *
     * @ORM\Column(name="vivos_actualmente", type="decimal", precision=2, scale=0, nullable=true)
     */
    private $vivosActualmente;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_ulti_event_obtetrico", type="date", nullable=true)
     */
    private $fechaUltiEventObtetrico;

    /**
     * @var string
     *
     * @ORM\Column(name="menarquia", type="decimal", precision=2, scale=0, nullable=true)
     */
    private $menarquia;

    /**
     * @var string
     *
     * @ORM\Column(name="menopausea", type="decimal", precision=2, scale=0, nullable=true)
     */
    private $menopausea;

    /**
     * @var \MntExpediente
     *
     * @ORM\OneToOne(targetEntity="Minsal\SiapsBundle\Entity\MntExpediente")
     *   @ORM\JoinColumn(name="id_expediente", referencedColumnName="id")
     */
    private $idExpediente;

    /**
     * @var \SrgCtlEventoObstetrico
     *
     * @ORM\ManyToOne(targetEntity="SrgCtlEventoObstetrico", inversedBy="SrgAntecedenteObstetrico")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_ultimo_evento_obstetrico", referencedColumnName="id")
     * })
     */
    private $idUltimoEventoObstetrico;



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
     * Set embarazos
     *
     * @param string $embarazos
     * @return SrgAntecedenteObstetrico
     */
    public function setEmbarazos($embarazos)
    {
        $this->embarazos = $embarazos;

        return $this;
    }

    /**
     * Get embarazos
     *
     * @return string 
     */
    public function getEmbarazos()
    {
        return $this->embarazos;
    }

    /**
     * Set partosTermino
     *
     * @param string $partosTermino
     * @return SrgAntecedenteObstetrico
     */
    public function setPartosTermino($partosTermino)
    {
        $this->partosTermino = $partosTermino;

        return $this;
    }

    /**
     * Get partosTermino
     *
     * @return string 
     */
    public function getPartosTermino()
    {
        return $this->partosTermino;
    }

    /**
     * Set partosPrematuros
     *
     * @param string $partosPrematuros
     * @return SrgAntecedenteObstetrico
     */
    public function setPartosPrematuros($partosPrematuros)
    {
        $this->partosPrematuros = $partosPrematuros;

        return $this;
    }

    /**
     * Get partosPrematuros
     *
     * @return string 
     */
    public function getPartosPrematuros()
    {
        return $this->partosPrematuros;
    }

    /**
     * Set abortos
     *
     * @param string $abortos
     * @return SrgAntecedenteObstetrico
     */
    public function setAbortos($abortos)
    {
        $this->abortos = $abortos;

        return $this;
    }

    /**
     * Get abortos
     *
     * @return string 
     */
    public function getAbortos()
    {
        return $this->abortos;
    }

    /**
     * Set vivosActualmente
     *
     * @param string $vivosActualmente
     * @return SrgAntecedenteObstetrico
     */
    public function setVivosActualmente($vivosActualmente)
    {
        $this->vivosActualmente = $vivosActualmente;

        return $this;
    }

    /**
     * Get vivosActualmente
     *
     * @return string 
     */
    public function getVivosActualmente()
    {
        return $this->vivosActualmente;
    }

    /**
     * Set fechaUltiEventObtetrico
     *
     * @param \DateTime $fechaUltiEventObtetrico
     * @return SrgAntecedenteObstetrico
     */
    public function setFechaUltiEventObtetrico($fechaUltiEventObtetrico)
    {
        $this->fechaUltiEventObtetrico = $fechaUltiEventObtetrico;

        return $this;
    }

    /**
     * Get fechaUltiEventObtetrico
     *
     * @return \DateTime 
     */
    public function getFechaUltiEventObtetrico()
    {
        return $this->fechaUltiEventObtetrico;
    }

    /**
     * Set menarquia
     *
     * @param string $menarquia
     * @return SrgAntecedenteObstetrico
     */
    public function setMenarquia($menarquia)
    {
        $this->menarquia = $menarquia;

        return $this;
    }

    /**
     * Get menarquia
     *
     * @return string 
     */
    public function getMenarquia()
    {
        return $this->menarquia;
    }

    /**
     * Set menopausea
     *
     * @param string $menopausea
     * @return SrgAntecedenteObstetrico
     */
    public function setMenopausea($menopausea)
    {
        $this->menopausea = $menopausea;

        return $this;
    }

    /**
     * Get menopausea
     *
     * @return string 
     */
    public function getMenopausea()
    {
        return $this->menopausea;
    }

    /**
     * Set idExpediente
     *
     * @param \Minsal\SiapsBundle\Entity\MntExpediente $idExpediente
     * @return SrgAntecedenteObstetrico
     */
    public function setIdExpediente(\Minsal\SiapsBundle\Entity\MntExpediente $idExpediente = null)
    {
        $this->idExpediente = $idExpediente;

        return $this;
    }

    /**
     * Get idExpediente
     *
     * @return \Minsal\SiapsBundle\Entity\MntExpediente 
     */
    public function getIdExpediente()
    {
        return $this->idExpediente;
    }

    /**
     * Set idUltimoEventoObstetrico
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgCtlEventoObstetrico $idUltimoEventoObstetrico
     * @return SrgAntecedenteObstetrico
     */
    public function setIdUltimoEventoObstetrico(\Minsal\GinecologiaBundle\Entity\SrgCtlEventoObstetrico $idUltimoEventoObstetrico = null)
    {
        $this->idUltimoEventoObstetrico = $idUltimoEventoObstetrico;

        return $this;
    }

    /**
     * Get idUltimoEventoObstetrico
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgCtlEventoObstetrico 
     */
    public function getIdUltimoEventoObstetrico()
    {
        return $this->idUltimoEventoObstetrico;
    }


   public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }



    
}
