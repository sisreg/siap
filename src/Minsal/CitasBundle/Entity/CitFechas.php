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


}
