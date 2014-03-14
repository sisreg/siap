<?php

namespace Minsal\CitasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CitCitasprocedimientos
 *
 * @ORM\Table(name="cit_citasprocedimientos", indexes={@ORM\Index(name="fki_fos_user_user_reg_cit_citasprocedimientos", columns={"idusuarioreg"}), @ORM\Index(name="fki_mnt_ciq_cit_citasprocedimientos", columns={"id_ciq_establecimiento"}), @ORM\Index(name="IDX_511136306A540E", columns={"id_estado"})})
 * @ORM\Entity
 */
class CitCitasprocedimientos
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="cit_citasprocedimientos_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_aten_area_mod_estab", type="integer", nullable=true)
     */
    private $idAtenAreaModEstab;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_expediente", type="integer", nullable=true)
     */
    private $idExpediente;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_empleado", type="integer", nullable=true)
     */
    private $idEmpleado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=true)
     */
    private $fecha;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_rangohora", type="integer", nullable=true)
     */
    private $idRangohora;

    /**
     * @var integer
     *
     * @ORM\Column(name="idusuarioreg", type="integer", nullable=true)
     */
    private $idusuarioreg;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechahorareg", type="datetime", nullable=true)
     */
    private $fechahorareg;

    /**
     * @var string
     *
     * @ORM\Column(name="ipcita", type="string", length=15, nullable=true)
     */
    private $ipcita;

    /**
     * @var string
     *
     * @ORM\Column(name="ipconfirmada", type="string", length=15, nullable=true)
     */
    private $ipconfirmada;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_establecimiento", type="integer", nullable=true)
     */
    private $idEstablecimiento;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_ciq_establecimiento", type="integer", nullable=true)
     */
    private $idCiqEstablecimiento;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_establecimiento_referencia", type="integer", nullable=true)
     */
    private $idEstablecimientoReferencia;

    /**
     * @var string
     *
     * @ORM\Column(name="numero_expediente_referencia", type="string", length=20, nullable=true)
     */
    private $numeroExpedienteReferencia;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_area_mod_estab", type="integer", nullable=true)
     */
    private $idAreaModEstab;

    /**
     * @var \CitEstadoCita
     *
     * @ORM\ManyToOne(targetEntity="CitEstadoCita")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_estado", referencedColumnName="id")
     * })
     */
    private $idEstado;


}
