<?php

namespace Minsal\SiapsBundle\Entity;

use Sonata\UserBundle\Entity\BaseUser as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\GroupInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user_user")
 */
class User extends BaseUser {

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var \Minsal\SiapsBundle\Entity\CtlEstablecimiento
     *
     * @ORM\ManyToOne(targetEntity="Minsal\SiapsBundle\Entity\CtlEstablecimiento")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_establecimiento", referencedColumnName="id")
     * })
     */
    protected $idEstablecimiento;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set idEstablecimiento
     *
     * @param \Minsal\SiapsBundle\Entity\CtlEstablecimiento $idEstablecimiento
     * @return User
     */
    public function setIdEstablecimiento(\Minsal\SiapsBundle\Entity\CtlEstablecimiento $idEstablecimiento = null) {
        $this->idEstablecimiento = $idEstablecimiento;

        return $this;
    }

    /**
     * Get idEstablecimiento
     *
     * @return \Minsal\SiapsBundle\Entity\CtlEstablecimiento 
     */
    public function getIdEstablecimiento() {
        return $this->idEstablecimiento;
    }

    /* Método __toString */

    public function __toString() {
        return $this->firstname . ' ' . $this->lastname ? : '';
    }

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @Assert\NotBlank()
     */
    protected $groups;

    /**
     * Constructor
     */
    public function __construct() {
        parent::__construct();
        $this->groups = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add groups
     *
     * @param GroupInterface $groups
     * @return User
     */
    public function addGroup(GroupInterface $groups) {
        $this->groups[] = $groups;

        return $this;
    }

    /**
     * Remove groups
     *
     * @param GroupInterface $groups
     */
    public function removeGroup(GroupInterface $groups) {
        $this->groups->removeElement($groups);
    }

    /**
     * Get groups
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGroups() {
        return $this->groups;
    }

}