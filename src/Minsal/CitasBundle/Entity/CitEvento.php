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
     * @var integer
     *
     * @ORM\Column(name="idempleado", type="integer", nullable=true)
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
     * @ORM\Column(name="id_ciq_establecimiento", type="integer", nullable=true)
     */
    private $idCiqEstablecimiento;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_rangohora", type="integer", nullable=true)
     */
    private $idRangohora;

    /**
     * @var integer
     *
     * @ORM\Column(name="dia_semana", type="smallint", nullable=true)
     */
    private $diaSemana;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_area_mod_estab", type="integer", nullable=true)
     */
    private $idAreaModEstab;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_establecimiento", type="integer", nullable=true)
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
