<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgPap
 *
 * @ORM\Table(name="srg_pap", indexes={@ORM\Index(name="IDX_C6684E21C2E87B78", columns={"id_examen_cervico_vaginal"})})
 * @ORM\Entity
 */
class SrgPap
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_pap_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pap_previo", type="boolean", nullable=true)
     */
    private $papPrevio;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_pap_previo", type="decimal", precision=2, scale=0, nullable=true)
     */
    private $numeroPapPrevio;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pap_primera_vez", type="boolean", nullable=true)
     */
    private $papPrimeraVez;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pap_sub_vigente", type="boolean", nullable=true)
     */
    private $papSubVigente;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pap_sub_atrasado", type="boolean", nullable=true)
     */
    private $papSubAtrasado;

    /**
     * @var \SrgExamenCervicoVaginal
     *
     * @ORM\OneToOne(targetEntity="SrgExamenCervicoVaginal", inversedBy="SrgPap")
     *   @ORM\JoinColumn(name="id_examen_cervico_vaginal", referencedColumnName="id")
     */
    private $idExamenCervicoVaginal;





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
     * Set papPrevio
     *
     * @param boolean $papPrevio
     * @return SrgPap
     */
    public function setPapPrevio($papPrevio)
    {
        $this->papPrevio = $papPrevio;

        return $this;
    }

    /**
     * Get papPrevio
     *
     * @return boolean 
     */
    public function getPapPrevio()
    {
        return $this->papPrevio;
    }

    /**
     * Set numeroPapPrevio
     *
     * @param string $numeroPapPrevio
     * @return SrgPap
     */
    public function setNumeroPapPrevio($numeroPapPrevio)
    {
        $this->numeroPapPrevio = $numeroPapPrevio;

        return $this;
    }

    /**
     * Get numeroPapPrevio
     *
     * @return string 
     */
    public function getNumeroPapPrevio()
    {
        return $this->numeroPapPrevio;
    }

    /**
     * Set papPrimeraVez
     *
     * @param boolean $papPrimeraVez
     * @return SrgPap
     */
    public function setPapPrimeraVez($papPrimeraVez)
    {
        $this->papPrimeraVez = $papPrimeraVez;

        return $this;
    }

    /**
     * Get papPrimeraVez
     *
     * @return boolean 
     */
    public function getPapPrimeraVez()
    {
        return $this->papPrimeraVez;
    }

    /**
     * Set papSubVigente
     *
     * @param boolean $papSubVigente
     * @return SrgPap
     */
    public function setPapSubVigente($papSubVigente)
    {
        $this->papSubVigente = $papSubVigente;

        return $this;
    }

    /**
     * Get papSubVigente
     *
     * @return boolean 
     */
    public function getPapSubVigente()
    {
        return $this->papSubVigente;
    }

    /**
     * Set papSubAtrasado
     *
     * @param boolean $papSubAtrasado
     * @return SrgPap
     */
    public function setPapSubAtrasado($papSubAtrasado)
    {
        $this->papSubAtrasado = $papSubAtrasado;

        return $this;
    }

    /**
     * Get papSubAtrasado
     *
     * @return boolean 
     */
    public function getPapSubAtrasado()
    {
        return $this->papSubAtrasado;
    }

    /**
     * Set idExamenCervicoVaginal
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgExamenCervicoVaginal $idExamenCervicoVaginal
     * @return SrgPap
     */
    public function setIdExamenCervicoVaginal(\Minsal\GinecologiaBundle\Entity\SrgExamenCervicoVaginal $idExamenCervicoVaginal = null)
    {
        $this->idExamenCervicoVaginal = $idExamenCervicoVaginal;

        return $this;
    }

    /**
     * Get idExamenCervicoVaginal
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgExamenCervicoVaginal 
     */
    public function getIdExamenCervicoVaginal()
    {
        return $this->idExamenCervicoVaginal;
    }

   public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }

    
}
