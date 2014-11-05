<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgAntecedPersonalContributo
 *
 * @ORM\Table(name="srg_anteced_personal_contributo", indexes={@ORM\Index(name="IDX_B38E486230F3FEEA", columns={"id_consulta_gine_pf"})})
 * @ORM\Entity
 */
class SrgAntecedPersonalContributo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_anteced_personal_contributo_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var boolean
     *
     * @ORM\Column(name="uso_metodo", type="boolean", nullable=true)
     */
    private $usoMetodo;

    /**
     * @var string
     *
     * @ORM\Column(name="metodo_usado", type="string", length=80, nullable=true)
     */
    private $metodoUsado;

    /**
     * @var string
     *
     * @ORM\Column(name="tiempo_uso", type="string", length=20, nullable=true)
     */
    private $tiempoUso;

    /**
     * @var string
     *
     * @ORM\Column(name="porque_dejo_de_usarlo", type="string", length=100, nullable=true)
     */
    private $porqueDejoDeUsarlo;

    /**
     * @var string
     *
     * @ORM\Column(name="donde_lo_obtubo", type="string", length=100, nullable=true)
     */
    private $dondeLoObtubo;

    /**
     * @var \SrgConsultaGinePf
     *
     * @ORM\OneToOne(targetEntity="SrgConsultaGinePf")
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
     * Set usoMetodo
     *
     * @param boolean $usoMetodo
     * @return SrgAntecedPersonalContributo
     */
    public function setUsoMetodo($usoMetodo)
    {
        $this->usoMetodo = $usoMetodo;

        return $this;
    }

    /**
     * Get usoMetodo
     *
     * @return boolean 
     */
    public function getUsoMetodo()
    {
        return $this->usoMetodo;
    }

    /**
     * Set metodoUsado
     *
     * @param string $metodoUsado
     * @return SrgAntecedPersonalContributo
     */
    public function setMetodoUsado($metodoUsado)
    {
        $this->metodoUsado = $metodoUsado;

        return $this;
    }

    /**
     * Get metodoUsado
     *
     * @return string 
     */
    public function getMetodoUsado()
    {
        return $this->metodoUsado;
    }

    /**
     * Set tiempoUso
     *
     * @param string $tiempoUso
     * @return SrgAntecedPersonalContributo
     */
    public function setTiempoUso($tiempoUso)
    {
        $this->tiempoUso = $tiempoUso;

        return $this;
    }

    /**
     * Get tiempoUso
     *
     * @return string 
     */
    public function getTiempoUso()
    {
        return $this->tiempoUso;
    }

    /**
     * Set porqueDejoDeUsarlo
     *
     * @param string $porqueDejoDeUsarlo
     * @return SrgAntecedPersonalContributo
     */
    public function setPorqueDejoDeUsarlo($porqueDejoDeUsarlo)
    {
        $this->porqueDejoDeUsarlo = $porqueDejoDeUsarlo;

        return $this;
    }

    /**
     * Get porqueDejoDeUsarlo
     *
     * @return string 
     */
    public function getPorqueDejoDeUsarlo()
    {
        return $this->porqueDejoDeUsarlo;
    }

    /**
     * Set dondeLoObtubo
     *
     * @param string $dondeLoObtubo
     * @return SrgAntecedPersonalContributo
     */
    public function setDondeLoObtubo($dondeLoObtubo)
    {
        $this->dondeLoObtubo = $dondeLoObtubo;

        return $this;
    }

    /**
     * Get dondeLoObtubo
     *
     * @return string 
     */
    public function getDondeLoObtubo()
    {
        return $this->dondeLoObtubo;
    }

    /**
     * Set idConsultaGinePf
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgConsultaGinePf $idConsultaGinePf
     * @return SrgAntecedPersonalContributo
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
