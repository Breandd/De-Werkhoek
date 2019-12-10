<?php

// src/Entity/User.php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Reservatie", mappedBy="User")
     */
    private $reservaties;
    public function __construct()
    {
        parent::__construct();
        $this->reservaties = new ArrayCollection();
        // your own logic
    }

    /**
     * @return Collection|Reservatie[]
     */
    public function getReservaties(): Collection
    {
        return $this->reservaties;
    }

    public function addReservaty(Reservatie $reservaty): self
    {
        if (!$this->reservaties->contains($reservaty)) {
            $this->reservaties[] = $reservaty;
            $reservaty->setUser($this);
        }

        return $this;
    }

    public function removeReservaty(Reservatie $reservaty): self
    {
        if ($this->reservaties->contains($reservaty)) {
            $this->reservaties->removeElement($reservaty);
            // set the owning side to null (unless already changed)
            if ($reservaty->getUser() === $this) {
                $reservaty->setUser(null);
            }
        }

        return $this;
    }
}