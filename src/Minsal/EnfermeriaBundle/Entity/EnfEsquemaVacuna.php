<?php

namespace Minsal\EnfermeriaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EnfEsquemaVacuna
 *
 * @ORM\Table(name="enf_esquema_vacuna", indexes={@ORM\Index(name="IDX_49850DA62B60BE1D", columns={"id_esquema"}), @ORM\Index(name="IDX_49850DA6BE654634", columns={"id_aplicacion_dosis"})})
 * @ORM\Entity
 */
class EnfEsquemaVacuna
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="enf_esquema_vacuna_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \CtlAreaAtencion
     *
     * @ORM\ManyToOne(targetEntity="CtlAreaAtencion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_esquema", referencedColumnName="id")
     * })
     */
    private $idEsquema;

    /**
     * @var \CtlAreaAtencion
     *
     * @ORM\ManyToOne(targetEntity="CtlAreaAtencion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_aplicacion_dosis", referencedColumnName="id")
     * })
     */
    private $idAplicacionDosis;



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
     * Set idEsquema
     *
     * @param \Minsal\EnfermeriaBundle\Entity\CtlAreaAtencion $idEsquema
     * @return EnfEsquemaVacuna
     */
    public function setIdEsquema(\Minsal\EnfermeriaBundle\Entity\CtlAreaAtencion $idEsquema = null)
    {
        $this->idEsquema = $idEsquema;

        return $this;
    }

    /**
     * Get idEsquema
     *
     * @return \Minsal\EnfermeriaBundle\Entity\CtlAreaAtencion 
     */
    public function getIdEsquema()
    {
        return $this->idEsquema;
    }

    /**
     * Set idAplicacionDosis
     *
     * @param \Minsal\EnfermeriaBundle\Entity\CtlAreaAtencion $idAplicacionDosis
     * @return EnfEsquemaVacuna
     */
    public function setIdAplicacionDosis(\Minsal\EnfermeriaBundle\Entity\CtlAreaAtencion $idAplicacionDosis = null)
    {
        $this->idAplicacionDosis = $idAplicacionDosis;

        return $this;
    }

    /**
     * Get idAplicacionDosis
     *
     * @return \Minsal\EnfermeriaBundle\Entity\CtlAreaAtencion 
     */
    public function getIdAplicacionDosis()
    {
        return $this->idAplicacionDosis;
    }
}
