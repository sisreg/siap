<?php

namespace Minsal\EnfermeriaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * EnfCarnetVacuna
 *
 * @ORM\Table(name="enf_carnet_vacuna", indexes={@ORM\Index(name="IDX_7AA0120701624C4", columns={"id_expediente"}), @ORM\Index(name="IDX_7AA01207DFA12F6", columns={"id_establecimiento"}), @ORM\Index(name="IDX_7AA0120890253C7", columns={"id_empleado"}), @ORM\Index(name="IDX_7AA0120BE654634", columns={"id_aplicacion_dosis"})})
 * @ORM\Entity
 */
class EnfCarnetVacuna
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="enf_carnet_vacuna_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=true)
     */
    private $fecha;

    /**
     * @var \MntExpediente
     *
     * @ORM\ManyToOne(targetEntity="MntExpediente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_expediente", referencedColumnName="id")
     * })
     */
    private $idExpediente;

    /**
     * @var \CtlEstablecimiento
     *
     * @ORM\ManyToOne(targetEntity="CtlEstablecimiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_establecimiento", referencedColumnName="id")
     * })
     */
    private $idEstablecimiento;

    /**
     * @var \MntEmpleado
     *
     * @ORM\ManyToOne(targetEntity="MntEmpleado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_empleado", referencedColumnName="id")
     * })
     */
    private $idEmpleado;

    /**
     * @var \EnfAplicacionDosis
     *
     * @ORM\ManyToOne(targetEntity="EnfAplicacionDosis")
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
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return EnfCarnetVacuna
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set idExpediente
     *
     * @param \Minsal\EnfermeriaBundle\Entity\MntExpediente $idExpediente
     * @return EnfCarnetVacuna
     */
    public function setIdExpediente(\Minsal\EnfermeriaBundle\Entity\MntExpediente $idExpediente = null)
    {
        $this->idExpediente = $idExpediente;

        return $this;
    }

    /**
     * Get idExpediente
     *
     * @return \Minsal\EnfermeriaBundle\Entity\MntExpediente 
     */
    public function getIdExpediente()
    {
        return $this->idExpediente;
    }

    /**
     * Set idEstablecimiento
     *
     * @param \Minsal\EnfermeriaBundle\Entity\CtlEstablecimiento $idEstablecimiento
     * @return EnfCarnetVacuna
     */
    public function setIdEstablecimiento(\Minsal\EnfermeriaBundle\Entity\CtlEstablecimiento $idEstablecimiento = null)
    {
        $this->idEstablecimiento = $idEstablecimiento;

        return $this;
    }

    /**
     * Get idEstablecimiento
     *
     * @return \Minsal\EnfermeriaBundle\Entity\CtlEstablecimiento 
     */
    public function getIdEstablecimiento()
    {
        return $this->idEstablecimiento;
    }

    /**
     * Set idEmpleado
     *
     * @param \Minsal\EnfermeriaBundle\Entity\MntEmpleado $idEmpleado
     * @return EnfCarnetVacuna
     */
    public function setIdEmpleado(\Minsal\EnfermeriaBundle\Entity\MntEmpleado $idEmpleado = null)
    {
        $this->idEmpleado = $idEmpleado;

        return $this;
    }

    /**
     * Get idEmpleado
     *
     * @return \Minsal\EnfermeriaBundle\Entity\MntEmpleado 
     */
    public function getIdEmpleado()
    {
        return $this->idEmpleado;
    }

    /**
     * Set idAplicacionDosis
     *
     * @param \Minsal\EnfermeriaBundle\Entity\EnfAplicacionDosis $idAplicacionDosis
     * @return EnfCarnetVacuna
     */
    public function setIdAplicacionDosis(\Minsal\EnfermeriaBundle\Entity\EnfAplicacionDosis $idAplicacionDosis = null)
    {
        $this->idAplicacionDosis = $idAplicacionDosis;

        return $this;
    }

    /**
     * Get idAplicacionDosis
     *
     * @return \Minsal\EnfermeriaBundle\Entity\EnfAplicacionDosis 
     */
    public function getIdAplicacionDosis()
    {
        return $this->idAplicacionDosis;
    }
}
