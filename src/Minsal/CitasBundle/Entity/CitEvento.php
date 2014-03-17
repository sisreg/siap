<?php

namespace Minsal\CitasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CitEvento
 *
 * @ORM\Table(name="cit_evento", indexes={@ORM\Index(name="fki_cit_tipoevento_cit_evento", columns={"id_tipoevento"}), @ORM\Index(name="fki_ctl_establecimiento_cit_evento", columns={"id_establecimiento"}), @ORM\Index(name="fki_fos_user_user_reg_cit_evento", columns={"idusuarioreg"}), @ORM\Index(name="fki_mnt_area_mod_estab_cit_evento", columns={"id_area_mod_estab"}), @ORM\Index(name="fki_mnt_ciq_cit_eventos", columns={"id_ciq_establecimiento"}), @ORM\Index(name="fki_mnt_rango_hora_cit_evento", columns={"id_rangohora"})})
 * @ORM\Entity
 */
class CitEvento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="cit_evento_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \Minsal\SiapsBundle\MntEmpleado
     *
     * @ORM\ManyToOne(targetEntity="Minsal\SiapsBundle\Entity\MntEmpleado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idempleado", referencedColumnName="id")
     * })
     */
    private $idempleado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaini", type="date", nullable=true)
     */
    private $fechaini;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="horaini", type="time", nullable=true)
     */
    private $horaini;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechafin", type="date", nullable=true)
     */
    private $fechafin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="horafin", type="time", nullable=true)
     */
    private $horafin;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=750, nullable=true)
     */
    private $descripcion;

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
     * @var \Minsal\SiapsBundle\MntProcedimientoEstablecimiento
     *
     * @ORM\ManyToOne(targetEntity="Minsal\SiapsBundle\Entity\MntProcedimientoEstablecimiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_ciq_establecimiento", referencedColumnName="id")
     * })
     */
    private $idCiqEstablecimiento;

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
     * @var integer
     *
     * @ORM\Column(name="dia_semana", type="smallint", nullable=true)
     */
    private $diaSemana;

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
     * @var \Minsal\SiapsBundle\CtlEstablecimiento
     *
     * @ORM\ManyToOne(targetEntity="Minsal\SiapsBundle\Entity\CtlEstablecimiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_establecimiento", referencedColumnName="id")
     * })
     */
    private $idEstablecimiento;

    /**
     * @var \CitTipoevento
     *
     * @ORM\ManyToOne(targetEntity="CitTipoevento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_tipoevento", referencedColumnName="id")
     * })
     */
    private $idTipoevento;


}
