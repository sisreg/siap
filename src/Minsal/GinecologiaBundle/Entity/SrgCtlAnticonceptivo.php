<?php

namespace Minsal\GinecologiaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SrgCtlAnticonceptivo
 *
 * @ORM\Table(name="srg_ctl_anticonceptivo", indexes={@ORM\Index(name="IDX_B297AADAFF29320", columns={"id_metodo_planificacion"})})
 * @ORM\Entity
 */
class SrgCtlAnticonceptivo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="srg_ctl_anticonceptivo_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre_anticonceptivo", type="string", length=60, nullable=false)
     */
    private $nombreAnticonceptivo;

    /**
     * @var string
     *
     * @ORM\Column(name="tipo_anticonceptivo", type="string", length=60, nullable=false)
     */
    private $tipoAnticonceptivo;

    /**
     * @var string
     *
     * @ORM\Column(name="material_anticonceptivo", type="string", length=60, nullable=true)
     */
    private $materialAnticonceptivo;

    /**
     * @var \SrgCtlMetodoPlanificacion
     *
     * @ORM\ManyToOne(targetEntity="SrgCtlMetodoPlanificacion", inversedBy="SrgCtlAnticonceptivo")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_metodo_planificacion", referencedColumnName="id")
     * })
     */
    private $idMetodoPlanificacion;


    /**
     *
     * @ORM\OneToMany(targetEntity="SrgDatoClinico", mappedBy="idCtlAnticonceptivo", cascade={"all"}, orphanRemoval=true)
     *
     */
    private $SrgDatoClinico;


    /**
     *
     * @ORM\OneToMany(targetEntity="SrgHojaAbastecimiento", mappedBy="idCtlAnticonceptivo", cascade={"all"}, orphanRemoval=true)
     *
     */
    private $SrgHojaAbastecimiento;



    /**
     *
     * @ORM\OneToMany(targetEntity="SrgUsoAnticonceptivo", mappedBy="idCtlAnticonceptivo", cascade={"all"}, orphanRemoval=true)
     *
     */
    private $SrgUsoAnticonceptivo;



    /**
     *
     * @ORM\OneToMany(targetEntity="SrgEntregaMetodo", mappedBy="idCtlAnticonceptivo", cascade={"all"}, orphanRemoval=true)
     *
     */
    private $SrgEntregaMetodo;


    /**
     *
     * @ORM\OneToMany(targetEntity="SrgSeguimientoSubsecuente", mappedBy="idCtlAnticonceptivo", cascade={"all"}, orphanRemoval=true)
     *
     */
    private $SrgSeguimientoSubsecuente;



    /**
     *
     * @ORM\OneToMany(targetEntity="SrgSeguimientoSubsecuente", mappedBy="idCtlAnticonceptivoCambio", cascade={"all"}, orphanRemoval=true)
     *
     */
    private $SrgSeguimientoSubsecuenteCambio;



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
     * Set nombreAnticonceptivo
     *
     * @param string $nombreAnticonceptivo
     * @return SrgCtlAnticonceptivo
     */
    public function setNombreAnticonceptivo($nombreAnticonceptivo)
    {
        $this->nombreAnticonceptivo = $nombreAnticonceptivo;

        return $this;
    }

    /**
     * Get nombreAnticonceptivo
     *
     * @return string 
     */
    public function getNombreAnticonceptivo()
    {
        return $this->nombreAnticonceptivo;
    }

    /**
     * Set tipoAnticonceptivo
     *
     * @param string $tipoAnticonceptivo
     * @return SrgCtlAnticonceptivo
     */
    public function setTipoAnticonceptivo($tipoAnticonceptivo)
    {
        $this->tipoAnticonceptivo = $tipoAnticonceptivo;

        return $this;
    }

    /**
     * Get tipoAnticonceptivo
     *
     * @return string 
     */
    public function getTipoAnticonceptivo()
    {
        return $this->tipoAnticonceptivo;
    }

    /**
     * Set materialAnticonceptivo
     *
     * @param string $materialAnticonceptivo
     * @return SrgCtlAnticonceptivo
     */
    public function setMaterialAnticonceptivo($materialAnticonceptivo)
    {
        $this->materialAnticonceptivo = $materialAnticonceptivo;

        return $this;
    }

    /**
     * Get materialAnticonceptivo
     *
     * @return string 
     */
    public function getMaterialAnticonceptivo()
    {
        return $this->materialAnticonceptivo;
    }

    /**
     * Set idMetodoPlanificacion
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgCtlMetodoPlanificacion $idMetodoPlanificacion
     * @return SrgCtlAnticonceptivo
     */
    public function setIdMetodoPlanificacion(\Minsal\GinecologiaBundle\Entity\SrgCtlMetodoPlanificacion $idMetodoPlanificacion = null)
    {
        $this->idMetodoPlanificacion = $idMetodoPlanificacion;

        return $this;
    }

    /**
     * Get idMetodoPlanificacion
     *
     * @return \Minsal\GinecologiaBundle\Entity\SrgCtlMetodoPlanificacion 
     */
    public function getIdMetodoPlanificacion()
    {
        return $this->idMetodoPlanificacion;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->SrgDatoClinico = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add SrgDatoClinico
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgDatoClinico $srgDatoClinico
     * @return SrgCtlAnticonceptivo
     */
    public function addSrgDatoClinico(\Minsal\GinecologiaBundle\Entity\SrgDatoClinico $srgDatoClinico)
    {
        $this->SrgDatoClinico[] = $srgDatoClinico;

        return $this;
    }

    /**
     * Remove SrgDatoClinico
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgDatoClinico $srgDatoClinico
     */
    public function removeSrgDatoClinico(\Minsal\GinecologiaBundle\Entity\SrgDatoClinico $srgDatoClinico)
    {
        $this->SrgDatoClinico->removeElement($srgDatoClinico);
    }

    /**
     * Get SrgDatoClinico
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSrgDatoClinico()
    {
        return $this->SrgDatoClinico;
    }




    /**
     * Add SrgHojaAbastecimiento
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgHojaAbastecimiento $srgHojaAbastecimiento
     * @return SrgCtlAnticonceptivo
     */
    public function addSrgHojaAbastecimiento(\Minsal\GinecologiaBundle\Entity\SrgHojaAbastecimiento $srgHojaAbastecimiento)
    {
        $this->SrgHojaAbastecimiento[] = $srgHojaAbastecimiento;

        return $this;
    }

    /**
     * Remove SrgHojaAbastecimiento
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgHojaAbastecimiento $srgHojaAbastecimiento
     */
    public function removeSrgHojaAbastecimiento(\Minsal\GinecologiaBundle\Entity\SrgHojaAbastecimiento $srgHojaAbastecimiento)
    {
        $this->SrgHojaAbastecimiento->removeElement($srgHojaAbastecimiento);
    }

    /**
     * Get SrgHojaAbastecimiento
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSrgHojaAbastecimiento()
    {
        return $this->SrgHojaAbastecimiento;
    }

    /**
     * Add SrgUsoAnticonceptivo
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgUsoAnticonceptivo $srgUsoAnticonceptivo
     * @return SrgCtlAnticonceptivo
     */
    public function addSrgUsoAnticonceptivo(\Minsal\GinecologiaBundle\Entity\SrgUsoAnticonceptivo $srgUsoAnticonceptivo)
    {
        $this->SrgUsoAnticonceptivo[] = $srgUsoAnticonceptivo;

        return $this;
    }

    /**
     * Remove SrgUsoAnticonceptivo
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgUsoAnticonceptivo $srgUsoAnticonceptivo
     */
    public function removeSrgUsoAnticonceptivo(\Minsal\GinecologiaBundle\Entity\SrgUsoAnticonceptivo $srgUsoAnticonceptivo)
    {
        $this->SrgUsoAnticonceptivo->removeElement($srgUsoAnticonceptivo);
    }

    /**
     * Get SrgUsoAnticonceptivo
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSrgUsoAnticonceptivo()
    {
        return $this->SrgUsoAnticonceptivo;
    }

    /**
     * Add SrgEntregaMetodo
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgEntregaMetodo $srgEntregaMetodo
     * @return SrgCtlAnticonceptivo
     */
    public function addSrgEntregaMetodo(\Minsal\GinecologiaBundle\Entity\SrgEntregaMetodo $srgEntregaMetodo)
    {
        $this->SrgEntregaMetodo[] = $srgEntregaMetodo;

        return $this;
    }

    /**
     * Remove SrgEntregaMetodo
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgEntregaMetodo $srgEntregaMetodo
     */
    public function removeSrgEntregaMetodo(\Minsal\GinecologiaBundle\Entity\SrgEntregaMetodo $srgEntregaMetodo)
    {
        $this->SrgEntregaMetodo->removeElement($srgEntregaMetodo);
    }

    /**
     * Get SrgEntregaMetodo
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSrgEntregaMetodo()
    {
        return $this->SrgEntregaMetodo;
    }

    /**
     * Add SrgSeguimientoSubsecuente
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgSeguimientoSubsecuente $srgSeguimientoSubsecuente
     * @return SrgCtlAnticonceptivo
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

    /**
     * Add SrgSeguimientoSubsecuenteCambio
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgSeguimientoSubsecuente $srgSeguimientoSubsecuenteCambio
     * @return SrgCtlAnticonceptivo
     */
    public function addSrgSeguimientoSubsecuenteCambio(\Minsal\GinecologiaBundle\Entity\SrgSeguimientoSubsecuente $srgSeguimientoSubsecuenteCambio)
    {
        $this->SrgSeguimientoSubsecuenteCambio[] = $srgSeguimientoSubsecuenteCambio;

        return $this;
    }

    /**
     * Remove SrgSeguimientoSubsecuenteCambio
     *
     * @param \Minsal\GinecologiaBundle\Entity\SrgSeguimientoSubsecuente $srgSeguimientoSubsecuenteCambio
     */
    public function removeSrgSeguimientoSubsecuenteCambio(\Minsal\GinecologiaBundle\Entity\SrgSeguimientoSubsecuente $srgSeguimientoSubsecuenteCambio)
    {
        $this->SrgSeguimientoSubsecuenteCambio->removeElement($srgSeguimientoSubsecuenteCambio);
    }

    /**
     * Get SrgSeguimientoSubsecuenteCambio
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSrgSeguimientoSubsecuenteCambio()
    {
        return $this->SrgSeguimientoSubsecuenteCambio;
    }



    public function __toString() {
        return $this->tipoAnticonceptivo? (string) $this->tipoAnticonceptivo : ''; 
    }

    
}
