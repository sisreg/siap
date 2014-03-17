<?php

namespace Minsal\CitasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CitCitasServiciodeapoyo
 *
 * @ORM\Table(name="cit_citas_serviciodeapoyo", indexes={@ORM\Index(name="fki_fos_user_user_reg_cit_citas_serviciodeapoyo", columns={"idusuarioreg"})})
 * @ORM\Entity
 */
class CitCitasServiciodeapoyo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="cit_citas_serviciodeapoyo_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=true)
     */
    private $fecha;

    /**
     * @var \Minsal\SeguimientoBundle\SecSolicitudestudios
     *
     * @ORM\ManyToOne(targetEntity="Minsal\SeguimientoBundle\Entity\SecSolicitudestudios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_solicitudestudios", referencedColumnName="id")
     * })
     */
    private $idSolicitudestudios;

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
     * @var \Minsal\SeguimientoBundle\SecDetallesolicitudestudios
     *
     * @ORM\ManyToOne(targetEntity="Minsal\SeguimientoBundle\Entity\SecDetallesolicitudestudios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_detallesolicitudestudios", referencedColumnName="id")
     * })
     */
    private $idDetallesolicitudestudios;


}
