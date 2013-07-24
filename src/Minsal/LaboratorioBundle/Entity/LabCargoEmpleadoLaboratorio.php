<?php

namespace Minsal\LaboratorioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LabCargoEmpleadoLaboratorio
 *
 * @ORM\Table(name="lab_cargo_empleado_laboratorio")
 * @ORM\Entity
 */
class LabCargoEmpleadoLaboratorio
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="lab_cargo_empleado_laboratorio_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="cargo", type="string", length=50, nullable=true)
     */
    private $cargo;



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
     * Set cargo
     *
     * @param string $cargo
     * @return LabCargoEmpleadoLaboratorio
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
    
        return $this;
    }

    /**
     * Get cargo
     *
     * @return string 
     */
    public function getCargo()
    {
        return $this->cargo;
    }
}