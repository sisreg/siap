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
     * @ORM\Column(name="idcitaservapoyo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="cit_citas_serviciodeapoyo_idcitaservapoyo_seq", allocationSize=1, initialValue=1)
     */
    private $idcitaservapoyo;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=true)
     */
    private $fecha;

    /**
     * @var integer
     *
     * @ORM\Column(name="idsolicitudestudio", type="integer", nullable=true)
     */
    private $idsolicitudestudio;

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
     * @ORM\Column(name="iddetallesolicitud", type="integer", nullable=true)
     */
    private $iddetallesolicitud;


}
