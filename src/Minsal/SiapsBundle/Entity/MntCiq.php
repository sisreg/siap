<?php

namespace Minsal\SiapsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MntCiq
 *
 * @ORM\Table(name="mnt_ciq")
 * @ORM\Entity
 */
class MntCiq
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="ctl_ciq_id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    
}
