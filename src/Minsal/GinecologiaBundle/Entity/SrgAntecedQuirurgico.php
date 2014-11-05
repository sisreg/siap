<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgAntecedQuirurgico
 *
 * @ORM\Table(name="srg_anteced_quirurgico", indexes={@ORM\Index(name="IDX_BB14A50130F3FEEA", columns={"id_consulta_gine_pf"})})
 * @ORM\Entity
 */
class SrgAntecedQuirurgico
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_anteced_quirurgico_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="cirugias_previas", type="string", length=200, nullable=true)
     */
    private $cirugiasPrevias;

    /**
     * @var \SrgConsultaGinePf
     *
     * @ORM\OneToOne(targetEntity="SrgConsultaGinePf", inversedBy="SrgAntecedQuirurgico")
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
     * Set cirugiasPrevias
     *
     * @param string $cirugiasPrevias
     * @return SrgAntecedQuirurgico
     */
    public function setCirugiasPrevias($cirugiasPrevias)
    {
        $this->cirugiasPrevias = $cirugiasPrevias;

        return $this;
    }

    /**
     * Get cirugiasPrevias
     *
     * @return string 
     */
    public function getCirugiasPrevias()
    {
        return $this->cirugiasPrevias;
    }

    /**
     * Set idConsultaGinePf
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgConsultaGinePf $idConsultaGinePf
     * @return SrgAntecedQuirurgico
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
