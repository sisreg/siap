<?php

namespace Minsal\SeguimientoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SecDetallesolicitudestudios
 *
 * @ORM\Table(name="sec_detallesolicitudestudios")
 * @ORM\Entity
 */
class SecDetallesolicitudestudios {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="sec_detallesolicitudestudios_iddetallesolicitud_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var \SecSolicitudestudios
     *
     * @ORM\ManyToOne(targetEntity="SecSolicitudestudios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_solicitudestudios", referencedColumnName="id")
     * })
     */
    private $idSolicitudestudios;

    /**
     * @var string
     *
     * @ORM\Column(name="id_examenes", type="string", length=8, nullable=true)
     */
    private $idExamenes;

    /**
     * @var string
     *
     * @ORM\Column(name="indicacion", type="string", length=250, nullable=true)
     */
    private $indicacion;

    /**
     * @var string
     *
     * @ORM\Column(name="estado_detalle", type="string", length=2, nullable=true)
     */
    private $estadoDetalle;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_tipomuestra", type="integer", nullable=true)
     */
    private $idTipomuestra;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_origenmuestra", type="integer", nullable=true)
     */
    private $idOrigenmuestra;

    /**
     * @var string
     *
     * @ORM\Column(name="observacion", type="string", length=250, nullable=true)
     */
    private $observacion;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_examenxestablecimiento", type="integer", nullable=true)
     */
    private $idExamenxestablecimiento;
}
