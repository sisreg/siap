<?php

namespace Minsal\CitasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CitFechas
 *
 * @ORM\Table(name="cit_fechas", indexes={@ORM\Index(name="fki_cit_citasxdia", columns={"id_cita"}), @ORM\Index(name="fki_cit_tipocita_cit_fechas", columns={"tipo_cita"}), @ORM\Index(name="fki_fos_user_user_reg_cit_fechas", columns={"idusuarioreg"}), @ORM\Index(name="fki_mnt_empleados_cit_fechas", columns={"id_empleado"}), @ORM\Index(name="fki_mnt_rangohoras_cit_fechas", columns={"id_rangohora"})})
 * @ORM\Entity
 */
class CitFechas
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="cit_fechas_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=true)
     */
    private $fecha;

    /**
     * @var integer
     *
     * @ORM\Column(name="ag", type="integer", nullable=true)
     */
    private $ag;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechahorareg", type="datetime", nullable=true)
     */
    private $fechahorareg;

    /**
     * @var \Minsal\SiapsBundle\MntRangohora
     *
     * @ORM\ManyToOne(targetEntity="Minsal\SiapsBundle\Entity\MntRangohora")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_rangohora", referencedColumnName="id")
     * })
     */
    private $idRangohora;

    /**
     * @var \Minsal\SiapsBundle\MntAreaModEstab
     *
     * @ORM\ManyToOne(targetEntity="Minsal\SiapsBundle\Entity\MntAreaModEstab")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_area_mod_estab", referencedColumnName="id")
     * })
     */
    private $idAreaModEstab;

    /**
     * @var \Minsal\SiapsBundle\MntEmpleado
     *
     * @ORM\ManyToOne(targetEntity="Minsal\SiapsBundle\Entity\MntEmpleado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_empleado", referencedColumnName="id")
     * })
     */
    private $idEmpleado;

    /**
     * @var \Minsal\SiapsBundle\User
     *
     * @ORM\ManyToOne(targetEntity="Minsal\SiapsBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idusuarioreg", referencedColumnName="id")
     * })
     */
    private $idusuarioreg;

    /**
     * @var \CitCitasDia
     *
     * @ORM\ManyToOne(targetEntity="CitCitasDia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_cita", referencedColumnName="id")
     * })
     */
    private $idCita;

    /**
     * @var \CitTipocita
     *
     * @ORM\ManyToOne(targetEntity="CitTipocita")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipo_cita", referencedColumnName="id")
     * })
     */
    private $tipoCita;



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
     * @return CitFechas
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
     * Set ag
     *
     * @param integer $ag
     * @return CitFechas
     */
    public function setAg($ag)
    {
        $this->ag = $ag;

        return $this;
    }

    /**
     * Get ag
     *
     * @return integer 
     */
    public function getAg()
    {
        return $this->ag;
    }

    /**
     * Set fechahorareg
     *
     * @param \DateTime $fechahorareg
     * @return CitFechas
     */
    public function setFechahorareg($fechahorareg)
    {
        $this->fechahorareg = $fechahorareg;

        return $this;
    }

    /**
     * Get fechahorareg
     *
     * @return \DateTime 
     */
    public function getFechahorareg()
    {
        return $this->fechahorareg;
    }

    /**
     * Set idRangohora
     *
     * @param \Minsal\SiapsBundle\Entity\MntRangohora $idRangohora
     * @return CitFechas
     */
    public function setIdRangohora(\Minsal\SiapsBundle\Entity\MntRangohora $idRangohora = null)
    {
        $this->idRangohora = $idRangohora;

        return $this;
    }

    /**
     * Get idRangohora
     *
     * @return \Minsal\SiapsBundle\Entity\MntRangohora 
     */
    public function getIdRangohora()
    {
        return $this->idRangohora;
    }

    /**
     * Set idAreaModEstab
     *
     * @param \Minsal\SiapsBundle\Entity\MntAreaModEstab $idAreaModEstab
     * @return CitFechas
     */
    public function setIdAreaModEstab(\Minsal\SiapsBundle\Entity\MntAreaModEstab $idAreaModEstab = null)
    {
        $this->idAreaModEstab = $idAreaModEstab;

        return $this;
    }

    /**
     * Get idAreaModEstab
     *
     * @return \Minsal\SiapsBundle\Entity\MntAreaModEstab 
     */
    public function getIdAreaModEstab()
    {
        return $this->idAreaModEstab;
    }

    /**
     * Set idEmpleado
     *
     * @param \Minsal\SiapsBundle\Entity\MntEmpleado $idEmpleado
     * @return CitFechas
     */
    public function setIdEmpleado(\Minsal\SiapsBundle\Entity\MntEmpleado $idEmpleado = null)
    {
        $this->idEmpleado = $idEmpleado;

        return $this;
    }

    /**
     * Get idEmpleado
     *
     * @return \Minsal\SiapsBundle\Entity\MntEmpleado 
     */
    public function getIdEmpleado()
    {
        return $this->idEmpleado;
    }

    /**
     * Set idusuarioreg
     *
     * @param \Minsal\SiapsBundle\Entity\User $idusuarioreg
     * @return CitFechas
     */
    public function setIdusuarioreg(\Minsal\SiapsBundle\Entity\User $idusuarioreg = null)
    {
        $this->idusuarioreg = $idusuarioreg;

        return $this;
    }

    /**
     * Get idusuarioreg
     *
     * @return \Minsal\SiapsBundle\Entity\User 
     */
    public function getIdusuarioreg()
    {
        return $this->idusuarioreg;
    }

    /**
     * Set idCita
     *
     * @param \Minsal\CitasBundle\Entity\CitCitasDia $idCita
     * @return CitFechas
     */
    public function setIdCita(\Minsal\CitasBundle\Entity\CitCitasDia $idCita = null)
    {
        $this->idCita = $idCita;

        return $this;
    }

    /**
     * Get idCita
     *
     * @return \Minsal\CitasBundle\Entity\CitCitasDia 
     */
    public function getIdCita()
    {
        return $this->idCita;
    }

    /**
     * Set tipoCita
     *
     * @param \Minsal\CitasBundle\Entity\CitTipocita $tipoCita
     * @return CitFechas
     */
    public function setTipoCita(\Minsal\CitasBundle\Entity\CitTipocita $tipoCita = null)
    {
        $this->tipoCita = $tipoCita;

        return $this;
    }

    /**
     * Get tipoCita
     *
     * @return \Minsal\CitasBundle\Entity\CitTipocita 
     */
    public function getTipoCita()
    {
        return $this->tipoCita;
    }
}
