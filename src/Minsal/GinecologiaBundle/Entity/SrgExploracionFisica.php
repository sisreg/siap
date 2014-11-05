<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgExploracionFisica
 *
 * @ORM\Table(name="srg_exploracion_fisica", indexes={@ORM\Index(name="IDX_F841FB218CF23C1F", columns={"id_examen_mama"})})
 * @ORM\Entity
 */
class SrgExploracionFisica
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_exploracion_fisica_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="tamizaje", type="boolean", nullable=true)
     */
    private $tamizaje;

    /**
     * @var boolean
     *
     * @ORM\Column(name="mujer_aem", type="boolean", nullable=true)
     */
    private $mujerAem;

    /**
     * @var boolean
     *
     * @ORM\Column(name="referida_ecm", type="boolean", nullable=true)
     */
    private $referidaEcm;

    /**
     * @var boolean
     *
     * @ORM\Column(name="otro", type="boolean", nullable=true)
     */
    private $otro;

    /**
     * @var string
     *
     * @ORM\Column(name="detalle_otro", type="string", length=20, nullable=true)
     */
    private $detalleOtro;

    /**
     * @var \SrgExamenMama
     *
     * @ORM\OneToOne(targetEntity="SrgExamenMama", inversedBy="SrgExploracionFisica")
     *   @ORM\JoinColumn(name="id_examen_mama", referencedColumnName="id")
     */
    private $idExamenMama;



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
     * Set tamizaje
     *
     * @param boolean $tamizaje
     * @return SrgExploracionFisica
     */
    public function setTamizaje($tamizaje)
    {
        $this->tamizaje = $tamizaje;

        return $this;
    }

    /**
     * Get tamizaje
     *
     * @return boolean 
     */
    public function getTamizaje()
    {
        return $this->tamizaje;
    }

    /**
     * Set mujerAem
     *
     * @param boolean $mujerAem
     * @return SrgExploracionFisica
     */
    public function setMujerAem($mujerAem)
    {
        $this->mujerAem = $mujerAem;

        return $this;
    }

    /**
     * Get mujerAem
     *
     * @return boolean 
     */
    public function getMujerAem()
    {
        return $this->mujerAem;
    }

    /**
     * Set referidaEcm
     *
     * @param boolean $referidaEcm
     * @return SrgExploracionFisica
     */
    public function setReferidaEcm($referidaEcm)
    {
        $this->referidaEcm = $referidaEcm;

        return $this;
    }

    /**
     * Get referidaEcm
     *
     * @return boolean 
     */
    public function getReferidaEcm()
    {
        return $this->referidaEcm;
    }

    /**
     * Set otro
     *
     * @param boolean $otro
     * @return SrgExploracionFisica
     */
    public function setOtro($otro)
    {
        $this->otro = $otro;

        return $this;
    }

    /**
     * Get otro
     *
     * @return boolean 
     */
    public function getOtro()
    {
        return $this->otro;
    }

    /**
     * Set detalleOtro
     *
     * @param string $detalleOtro
     * @return SrgExploracionFisica
     */
    public function setDetalleOtro($detalleOtro)
    {
        $this->detalleOtro = $detalleOtro;

        return $this;
    }

    /**
     * Get detalleOtro
     *
     * @return string 
     */
    public function getDetalleOtro()
    {
        return $this->detalleOtro;
    }

    /**
     * Set idExamenMama
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgExamenMama $idExamenMama
     * @return SrgExploracionFisica
     */
    public function setIdExamenMama(\Minsal\GinecologiaBundle\Entity\SrgExamenMama $idExamenMama = null)
    {
        $this->idExamenMama = $idExamenMama;

        return $this;
    }

    /**
     * Get idExamenMama
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgExamenMama 
     */
    public function getIdExamenMama()
    {
        return $this->idExamenMama;
    }


   public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }

    
}
