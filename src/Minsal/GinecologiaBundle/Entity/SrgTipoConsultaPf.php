<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgTipoConsultaPf
 *
 * @ORM\Table(name="srg_tipo_consulta_pf")
 * @ORM\Entity
 */
class SrgTipoConsultaPf
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_tipo_consulta_pf_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_consulta_pf", type="string", length=20, nullable=true)
     */
    private $tipoConsultaPf;



    /**
     * @ORM\OneToMany(targetEntity="SrgSeguimientoSubsecuente", mappedBy="idTipoConsultaPf", cascade={"all"}, orphanRemoval=true))
     **/
    private $SrgSeguimientoSubsecuente;








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
     * Set tipoConsultaPf
     *
     * @param string $tipoConsultaPf
     * @return SrgTipoConsultaPf
     */
    public function setTipoConsultaPf($tipoConsultaPf)
    {
        $this->tipoConsultaPf = $tipoConsultaPf;

        return $this;
    }

    /**
     * Get tipoConsultaPf
     *
     * @return string 
     */
    public function getTipoConsultaPf()
    {
        return $this->tipoConsultaPf;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->SrgSeguimientoSubsecuente = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add SrgSeguimientoSubsecuente
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgSeguimientoSubsecuente $srgSeguimientoSubsecuente
     * @return SrgTipoConsultaPf
     */
    public function addSrgSeguimientoSubsecuente(\Minsal\GinecologiaBundle\Entity\SrgSeguimientoSubsecuente $srgSeguimientoSubsecuente)
    {
        $this->SrgSeguimientoSubsecuente[] = $srgSeguimientoSubsecuente;

        return $this;
    }

    /**
     * Remove SrgSeguimientoSubsecuente
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgSeguimientoSubsecuente $srgSeguimientoSubsecuente
     */
    public function removeSrgSeguimientoSubsecuente(\Minsal\GinecologiaBundle\Entity\SrgSeguimientoSubsecuente $srgSeguimientoSubsecuente)
    {
        $this->SrgSeguimientoSubsecuente->removeElement($srgSeguimientoSubsecuente);
    }

    /**
     * Get SrgSeguimientoSubsecuente
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSrgSeguimientoSubsecuente()
    {
        return $this->SrgSeguimientoSubsecuente;
    }


   public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }

    
}
