<?php

namespace Minsal\SiapsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SecHistorialClinico
 *
 * @ORM\Table(name="sec_historial_clinico")
 * @ORM\Entity
 */
class SecHistorialClinico
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="sec_historial_clinico_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="datosclinicos", type="string", length=200, nullable=true)
     */
    private $datosclinicos;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaconsulta", type="date", nullable=true)
     */
    private $fechaconsulta;

    /**
     * @var string
     *
     * @ORM\Column(name="seguimientoconsultaext", type="string", nullable=true)
     */
    private $seguimientoconsultaext;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechahorareg", type="date", nullable=true)
     */
    private $fechahorareg;

    /**
     * @var string
     *
     * @ORM\Column(name="piloto", type="string", nullable=true)
     */
    private $piloto;

    /**
     * @var string
     *
     * @ORM\Column(name="ipaddress", type="string", length=15, nullable=true)
     */
    private $ipaddress;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set datosclinicos
     *
     * @param string $datosclinicos
     * @return SecHistorialClinico
     */
    public function setDatosclinicos($datosclinicos)
    {
        $this->datosclinicos = $datosclinicos;

        return $this;
    }

    /**
     * Get datosclinicos
     *
     * @return string 
     */
    public function getDatosclinicos()
    {
        return $this->datosclinicos;
    }

    /**
     * Set fechaconsulta
     *
     * @param \DateTime $fechaconsulta
     * @return SecHistorialClinico
     */
    public function setFechaconsulta($fechaconsulta)
    {
        $this->fechaconsulta = $fechaconsulta;

        return $this;
    }

    /**
     * Get fechaconsulta
     *
     * @return \DateTime 
     */
    public function getFechaconsulta()
    {
        return $this->fechaconsulta;
    }

    /**
     * Set seguimientoconsultaext
     *
     * @param string $seguimientoconsultaext
     * @return SecHistorialClinico
     */
    public function setSeguimientoconsultaext($seguimientoconsultaext)
    {
        $this->seguimientoconsultaext = $seguimientoconsultaext;

        return $this;
    }

    /**
     * Get seguimientoconsultaext
     *
     * @return string 
     */
    public function getSeguimientoconsultaext()
    {
        return $this->seguimientoconsultaext;
    }

    /**
     * Set fechahorareg
     *
     * @param \DateTime $fechahorareg
     * @return SecHistorialClinico
     */
    public function setFechahorareg($fechahorareg)
    {
        $this->fechahorareg = $fechahorareg;

        return $this;
    }

    /**
     * Get fechahorareg
     *
     * @return \DateTime 
     */
    public function getFechahorareg()
    {
        return $this->fechahorareg;
    }

    /**
     * Set piloto
     *
     * @param string $piloto
     * @return SecHistorialClinico
     */
    public function setPiloto($piloto)
    {
        $this->piloto = $piloto;

        return $this;
    }

    /**
     * Get piloto
     *
     * @return string 
     */
    public function getPiloto()
    {
        return $this->piloto;
    }

    /**
     * Set ipaddress
     *
     * @param string $ipaddress
     * @return SecHistorialClinico
     */
    public function setIpaddress($ipaddress)
    {
        $this->ipaddress = $ipaddress;

        return $this;
    }

    /**
     * Get ipaddress
     *
     * @return string 
     */
    public function getIpaddress()
    {
        return $this->ipaddress;
    }
}
