<?php

namespace Minsal\CitasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CitDistribucion
 *
 * @ORM\Table(name="cit_distribucion", indexes={@ORM\Index(name="fki_fos_user_user_cit_distribucion", columns={"idusuarioreg"}), @ORM\Index(name="fki_fos_user_user_mod_cit_distribucion", columns={"idusuariomod"}), @ORM\Index(name="fki_mnt_area_mod_estab_cit_distribucion", columns={"id_area_mod_estab"}), @ORM\Index(name="fki_mnt_consultorios_cit_distribucion", columns={"id_consultorio"}), @ORM\Index(name="fki_mnt_empleados_cit_distribucion", columns={"id_empleado"}), @ORM\Index(name="fki_mnt_rangohoras_cit_distribucion", columns={"id_rangohora"})})
 * @ORM\Entity
 */
class CitDistribucion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="cit_distribucion_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

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
     * @var \Minsal\SiapsBundle\MntEmpleado
     *
     * @ORM\ManyToOne(targetEntity="Minsal\SiapsBundle\Entity\MntEmpleado")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_empleado", referencedColumnName="id")
     * })
     */
    private $idEmpleado;

    /**
     * @var integer
     *
     * @ORM\Column(name="primera", type="integer", nullable=true)
     */
    private $primera;

    /**
     * @var integer
     *
     * @ORM\Column(name="subsecuente", type="integer", nullable=true)
     */
    private $subsecuente;

    /**
     * @var integer
     *
     * @ORM\Column(name="mes", type="integer", nullable=true)
     */
    private $mes;

    /**
     * @var integer
     *
     * @ORM\Column(name="yrs", type="integer", nullable=true)
     */
    private $yrs;

    /**
     * @var integer
     *
     * @ORM\Column(name="dia", type="integer", nullable=true)
     */
    private $dia;

    /**
     * @var \Minsal\SiapsBundle\MntConsultorio
     *
     * @ORM\ManyToOne(targetEntity="Minsal\SiapsBundle\Entity\MntConsultorio")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_consultorio", referencedColumnName="id")
     * })
     */
    private $idConsultorio = '0';

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
     * @var \Minsal\SiapsBundle\MntAtenAreaModEstab
     *
     * @ORM\ManyToOne(targetEntity="Minsal\SiapsBundle\Entity\MntAtenAreaModEstab")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_aten_area_mod_estab", referencedColumnName="id")
     * })
     */
    private $idAtenAreaModEstab;

    /**
     * @var \Minsal\SiapsBundle\User
     *
     * @ORM\ManyToOne(targetEntity="Minsal\SiapsBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idusuariomod", referencedColumnName="id")
     * })
     */
    private $idusuariomod;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechahoramod", type="datetime", nullable=true)
     */
    private $fechahoramod;

    /**
     * @var string
     *
     * @ORM\Column(name="tipocon", type="string", length=5, nullable=true)
     */
    private $tipocon;

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
     * @var string
     *
     * @ORM\Column(name="distribucionmed", type="string", length=6, nullable=true)
     */
    private $distribucionmed;


}
