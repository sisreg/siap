<?php

namespace Minsal\CitasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CitEstadoCita
 *
 * @ORM\Table(name="cit_estado_cita", indexes={@ORM\Index(name="fki_fos_user_user_reg_cit_estado_cita", columns={"idusuarioreg"})})
 * @ORM\Entity
 */
class CitEstadoCita
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="cit_estado_cita_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="estado", type="string", length=20, nullable=true)
     */
    private $estado;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=250, nullable=true)
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


}
