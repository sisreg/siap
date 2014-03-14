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
     * @var integer
     *
     * @ORM\Column(name="id_rangohora", type="integer", nullable=true)
     */
    private $idRangohora;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_empleado", type="integer", nullable=true)
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
     * @var integer
     *
     * @ORM\Column(name="id_consultorio", type="integer", nullable=true)
     */
    private $idConsultorio = '0';

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
     * @var integer
     *
     * @ORM\Column(name="id_aten_area_mod_estab", type="integer", nullable=true)
     */
    private $idAtenAreaModEstab;

    /**
     * @var integer
     *
     * @ORM\Column(name="idusuariomod", type="integer", nullable=true)
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
     * @var integer
     *
     * @ORM\Column(name="id_area_mod_estab", type="integer", nullable=true)
     */
    private $idAreaModEstab;

    /**
     * @var string
     *
     * @ORM\Column(name="distribucionmed", type="string", length=6, nullable=true)
     */
    private $distribucionmed;


}
