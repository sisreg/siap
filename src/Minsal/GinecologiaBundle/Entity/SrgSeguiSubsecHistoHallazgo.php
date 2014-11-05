<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgSeguiSubsecHistoHallazgo
 *
 * @ORM\Table(name="srg_segui_subsec_histo_hallazgo", indexes={@ORM\Index(name="IDX_DC97A20FD42682C7", columns={"id_historia_hallazgo"}), @ORM\Index(name="IDX_DC97A20F39A7AED1", columns={"id_seguimiento_subsecuente"})})
 * @ORM\Entity
 */
class SrgSeguiSubsecHistoHallazgo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_segui_subsec_histo_hallazgo_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \SrgCtlHistoriaHallazgo
     *
     * @ORM\ManyToOne(targetEntity="SrgCtlHistoriaHallazgo", inversedBy="SrgSeguiSubsecHistoHallazgo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_historia_hallazgo", referencedColumnName="id")
     * })
     */
    private $idHistoriaHallazgo;

    /**
     * @var \SrgSeguimientoSubsecuente
     *
     * @ORM\ManyToOne(targetEntity="SrgSeguimientoSubsecuente", inversedBy="SrgSeguiSubsecHistoHallazgo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_seguimiento_subsecuente", referencedColumnName="id")
     * })
     */
    private $idSeguimientoSubsecuente;



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
     * Set idHistoriaHallazgo
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgCtlHistoriaHallazgo $idHistoriaHallazgo
     * @return SrgSeguiSubsecHistoHallazgo
     */
    public function setIdHistoriaHallazgo(\Minsal\GinecologiaBundle\Entity\SrgCtlHistoriaHallazgo $idHistoriaHallazgo = null)
    {
        $this->idHistoriaHallazgo = $idHistoriaHallazgo;

        return $this;
    }

    /**
     * Get idHistoriaHallazgo
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgCtlHistoriaHallazgo 
     */
    public function getIdHistoriaHallazgo()
    {
        return $this->idHistoriaHallazgo;
    }

    /**
     * Set idSeguimientoSubsecuente
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgSeguimientoSubsecuente $idSeguimientoSubsecuente
     * @return SrgSeguiSubsecHistoHallazgo
     */
    public function setIdSeguimientoSubsecuente(\Minsal\GinecologiaBundle\Entity\SrgSeguimientoSubsecuente $idSeguimientoSubsecuente = null)
    {
        $this->idSeguimientoSubsecuente = $idSeguimientoSubsecuente;

        return $this;
    }

    /**
     * Get idSeguimientoSubsecuente
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgSeguimientoSubsecuente 
     */
    public function getIdSeguimientoSubsecuente()
    {
        return $this->idSeguimientoSubsecuente;
    }
    

   public function __toString() {
        return $this->id? (string) $this->id: ''; 
    }


}
