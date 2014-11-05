<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgResultadoExploraFisica
 *
 * @ORM\Table(name="srg_resultado_explora_fisica", indexes={@ORM\Index(name="IDX_F10493621B531ED9", columns={"id_resultado_examen_fisico"}), @ORM\Index(name="IDX_F10493628CF23C1F", columns={"id_examen_mama"})})
 * @ORM\Entity
 */
class SrgResultadoExploraFisica
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_resultado_explora_fisica_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="detalle_especifico_resultado", type="string", length=20, nullable=true)
     */
    private $detalleEspecificoResultado;

    /**
     * @var \SrgCtlResultadoExamenFisico
     *
     * @ORM\ManyToOne(targetEntity="SrgCtlResultadoExamenFisico", inversedBy="SrgResultadoExploraFisica")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_resultado_examen_fisico", referencedColumnName="id")
     * })
     */
    private $idResultadoExamenFisico;

    /**
     * @var \SrgExamenMama
     *
     * @ORM\OneToOne(targetEntity="SrgExamenMama", inversedBy="SrgResultadoExploraFisica")
     *   @ORM\JoinColumn(name="id_examen_mama", referencedColumnName="id")
     */
    private $idExamenMama;


    /**
     *
     * @ORM\OneToMany(targetEntity="SrgHallazgoMamaDer", mappedBy="idResultadoExploraFisica", cascade={"all"}, orphanRemoval=true)
     *
     */
    private $SrgHallazgoMamaDer;



    /**
     *
     * @ORM\OneToMany(targetEntity="SrgHallazoMamaIzq", mappedBy="idResultadoExploraFisica", cascade={"all"}, orphanRemoval=true)
     *
     */
    private $SrgHallazoMamaIzq;









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
     * Set detalleEspecificoResultado
     *
     * @param string $detalleEspecificoResultado
     * @return SrgResultadoExploraFisica
     */
    public function setDetalleEspecificoResultado($detalleEspecificoResultado)
    {
        $this->detalleEspecificoResultado = $detalleEspecificoResultado;

        return $this;
    }

    /**
     * Get detalleEspecificoResultado
     *
     * @return string 
     */
    public function getDetalleEspecificoResultado()
    {
        return $this->detalleEspecificoResultado;
    }

    /**
     * Set idResultadoExamenFisico
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgCtlResultadoExamenFisico $idResultadoExamenFisico
     * @return SrgResultadoExploraFisica
     */
    public function setIdResultadoExamenFisico(\Minsal\GinecologiaBundle\Entity\SrgCtlResultadoExamenFisico $idResultadoExamenFisico = null)
    {
        $this->idResultadoExamenFisico = $idResultadoExamenFisico;

        return $this;
    }

    /**
     * Get idResultadoExamenFisico
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgCtlResultadoExamenFisico 
     */
    public function getIdResultadoExamenFisico()
    {
        return $this->idResultadoExamenFisico;
    }

    /**
     * Set idExamenMama
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgExamenMama $idExamenMama
     * @return SrgResultadoExploraFisica
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->SrgHallazgoMamaDer = new \Doctrine\Common\Collections\ArrayCollection();
        $this->SrgHallazoMamaIzq = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add SrgHallazgoMamaDer
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgHallazgoMamaDer $srgHallazgoMamaDer
     * @return SrgResultadoExploraFisica
     */
    public function addSrgHallazgoMamaDer(\Minsal\GinecologiaBundle\Entity\SrgHallazgoMamaDer $srgHallazgoMamaDer)
    {
        $this->SrgHallazgoMamaDer[] = $srgHallazgoMamaDer;

        return $this;
    }

    /**
     * Remove SrgHallazgoMamaDer
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgHallazgoMamaDer $srgHallazgoMamaDer
     */
    public function removeSrgHallazgoMamaDer(\Minsal\GinecologiaBundle\Entity\SrgHallazgoMamaDer $srgHallazgoMamaDer)
    {
        $this->SrgHallazgoMamaDer->removeElement($srgHallazgoMamaDer);
    }

    /**
     * Get SrgHallazgoMamaDer
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSrgHallazgoMamaDer()
    {
        return $this->SrgHallazgoMamaDer;
    }

    /**
     * Add SrgHallazoMamaIzq
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgHallazoMamaIzq $srgHallazoMamaIzq
     * @return SrgResultadoExploraFisica
     */
    public function addSrgHallazoMamaIzq(\Minsal\GinecologiaBundle\Entity\SrgHallazoMamaIzq $srgHallazoMamaIzq)
    {
        $this->SrgHallazoMamaIzq[] = $srgHallazoMamaIzq;

        return $this;
    }

    /**
     * Remove SrgHallazoMamaIzq
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgHallazoMamaIzq $srgHallazoMamaIzq
     */
    public function removeSrgHallazoMamaIzq(\Minsal\GinecologiaBundle\Entity\SrgHallazoMamaIzq $srgHallazoMamaIzq)
    {
        $this->SrgHallazoMamaIzq->removeElement($srgHallazoMamaIzq);
    }

    /**
     * Get SrgHallazoMamaIzq
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSrgHallazoMamaIzq()
    {
        return $this->SrgHallazoMamaIzq;
    }

   public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }

    
}
