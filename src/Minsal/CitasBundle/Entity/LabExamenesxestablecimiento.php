<?php

namespace Minsal\CitasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LabExamenesxestablecimiento
 *
 * @ORM\Table(name="lab_examenesxestablecimiento")
 * @ORM\Entity
 */
class LabExamenesxestablecimiento
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="lab_examenesxestablecimiento_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="idexam", type="string", length=8, nullable=true)
     */
    private $idexam;

    /**
     * @var \Minsal\SiapsBundle\CtlEstablecimiento
     *
     * @ORM\ManyToOne(targetEntity="Minsal\SiapsBundle\Entity\CtlEstablecimiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idestablecimiento", referencedColumnName="id")
     * })
     */
    private $idestablecimiento;

    /**
     * @var string
     *
     * @ORM\Column(name="condicion", type="string", length=255, nullable=true)
     */
    private $condicion;

    /**
     * @var integer
     *
     * @ORM\Column(name="idformulario", type="integer", nullable=true)
     */
    private $idformulario;

    /**
     * @var integer
     *
     * @ORM\Column(name="idestandarrep", type="integer", nullable=true)
     */
    private $idestandarrep;

    /**
     * @var integer
     *
     * @ORM\Column(name="urgente", type="integer", nullable=true)
     */
    private $urgente;

    /**
     * @var string
     *
     * @ORM\Column(name="idplanilla", type="string", length=1, nullable=true)
     */
    private $idplanilla;

    /**
     * @var string
     *
     * @ORM\Column(name="impresion", type="string", length=1, nullable=true)
     */
    private $impresion;

    /**
     * @var integer
     *
     * @ORM\Column(name="ubicacion", type="integer", nullable=true)
     */
    private $ubicacion;

    /**
     * @var string
     *
     * @ORM\Column(name="codigosumi", type="string", length=8, nullable=true)
     */
    private $codigosumi;

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
     * @var boolean
     *
     * @ORM\Column(name="habilitado", type="boolean", nullable=true)
     */
    private $habilitado;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_examen", type="integer", nullable=true)
     */
    private $idExamen;
}