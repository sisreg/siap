<?php

namespace Minsal\CitasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CitCitasDia
 *
 * @ORM\Table(name="cit_citas_dia", indexes={@ORM\Index(name="fki_fos_user_user_reg_cit_citas_diaa", columns={"idusuarioreg"}), @ORM\Index(name="fki_mnt_empleado_cit_citas_dia", columns={"id_empleado"}), @ORM\Index(name="fki_mnt_expediente_cit_citas_dia", columns={"id_expediente"}), @ORM\Index(name="IDX_92DF133E6A540E", columns={"id_estado"}), @ORM\Index(name="IDX_92DF133E3FCE8D8B", columns={"id_motivo"}), @ORM\Index(name="IDX_92DF133ECFE0D83", columns={"id_tipocita"})})
 * @ORM\Entity
 */
class CitCitasDia
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="cit_citas_dia_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \Minsal\SiapsBundle\MntAtenAreaModEstab
     *
     * @ORM\ManyToOne(targetEntity="Minsal\SiapsBundle\Entity\MntAtenAreaModEstab")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_aten_area_mod_estab", referencedColumnName="id")
     * })
     */
    private $idAtenAreaModEstab;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=true)
     */
    private $fecha;

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
     * @ORM\Column(name="ipconfirmado", type="string", length=15, nullable=true)
     */
    private $ipconfirmado;

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
     * @var \Minsal\SiapsBundle\MntExpediente
     *
     * @ORM\ManyToOne(targetEntity="Minsal\SiapsBundle\Entity\MntExpediente")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_expediente", referencedColumnName="id")
     * })
     */
    private $idExpediente;

    /**
     * @var \Minsal\SiapsBundle\CtlEstablecimiento
     *
     * @ORM\ManyToOne(targetEntity="Minsal\SiapsBundle\Entity\CtlEstablecimiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_establecimiento", referencedColumnName="id")
     * })
     */
    private $idEstablecimiento;

    /**
     * @var \Minsal\SiapsBundle\CtlEstablecimiento
     *
     * @ORM\ManyToOne(targetEntity="Minsal\SiapsBundle\Entity\CtlEstablecimiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_establecimiento_referencia", referencedColumnName="id")
     * })
     */
    private $idEstablecimientoReferencia;

    /**
     * @var \CitEstadoCita
     *
     * @ORM\ManyToOne(targetEntity="CitEstadoCita")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_estado", referencedColumnName="id")
     * })
     */
    private $idEstado;

    /**
     * @var \CitMotivoagregados
     *
     * @ORM\ManyToOne(targetEntity="CitMotivoagregados")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_motivo", referencedColumnName="id")
     * })
     */
    private $idMotivo;

    /**
     * @var \CitTipocita
     *
     * @ORM\ManyToOne(targetEntity="CitTipocita")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipocita", referencedColumnName="id")
     * })
     */
    private $idTipocita;


}
