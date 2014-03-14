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
     * @var integer
     *
     * @ORM\Column(name="id_rangohora", type="integer", nullable=false)
     */
    private $idRangohora;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_area_mod_estab", type="integer", nullable=true)
     */
    private $idAreaModEstab;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_empleado", type="integer", nullable=true)
     */
    private $idEmpleado;

    /**
     * @var integer
     *
     * @ORM\Column(name="idusuarioreg", type="integer", nullable=true)
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
