<?php

namespace Minsal\CitasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CitProgramacionExams
 *
 * @ORM\Table(name="cit_programacion_exams", indexes={@ORM\Index(name="fki_fos_user_user_cit_programacion_exams", columns={"idusuarioreg"}), @ORM\Index(name="fki_lab_examen_establecimiento_cit_programacion_examen", columns={"id_examen_establecimiento"}), @ORM\Index(name="fki_mnt_aten_area_mod_estab_cit_programacion_exams", columns={"id_aten_area_mod_estab"})})
 * @ORM\Entity
 */
class CitProgramacionExams
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="cit_programacion_exams_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="rangotiempoprev", type="integer", nullable=true)
     */
    private $rangotiempoprev;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_aten_area_mod_estab", type="integer", nullable=true)
     */
    private $idAtenAreaModEstab;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_establecimiento", type="integer", nullable=true)
     */
    private $idEstablecimiento;

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
     * @ORM\Column(name="id_examen_establecimiento", type="integer", nullable=true)
     */
    private $idExamenEstablecimiento;


}
