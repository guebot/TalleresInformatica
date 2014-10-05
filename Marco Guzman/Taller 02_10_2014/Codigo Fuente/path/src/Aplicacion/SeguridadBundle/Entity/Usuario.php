<?php

namespace Aplicacion\SeguridadBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * Usuario
 */
class Usuario extends BaseUser {
    // MODIFICACION

    /**
     * @var integer
     */
    protected $id;

    /**
     * @ORM\PrePersist
     */
    public function prePersist() {
        $this->setEmail($this->getUsername());
        $this->setEmailCanonical($this->getUsernameCanonical());
        $this->setCreatedAt(new \DateTime());
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate() {
        $this->setEmail($this->getUsername());
        $this->setEmailCanonical($this->getUsernameCanonical());
        $this->setUpdatedAt(new \DateTime());
    }

    // FIN MODIFICACION

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Usuario
     */
    public function setCreatedAt($createdAt) {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt() {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return Usuario
     */
    public function setUpdatedAt($updatedAt) {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updated_at
     *
     * @return \DateTime 
     */
    public function getUpdatedAt() {
        return $this->updated_at;
    }

}
