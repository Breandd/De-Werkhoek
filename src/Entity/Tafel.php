<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TafelRepository")
 */
class Tafel
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $Stoelen;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Reservatie", inversedBy="tafels")
     */
    private $Tafel;

    public function __construct()
    {
        $this->Tafel = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStoelen(): ?int
    {
        return $this->Stoelen;
    }

    public function setStoelen(int $Stoelen): self
    {
        $this->Stoelen = $Stoelen;

        return $this;
    }

    /**
     * @return Collection|Reservatie[]
     */
    public function getTafel(): Collection
    {
        return $this->Tafel;
    }

    public function addTafel(Reservatie $tafel): self
    {
        if (!$this->Tafel->contains($tafel)) {
            $this->Tafel[] = $tafel;
        }

        return $this;
    }

    public function removeTafel(Reservatie $tafel): self
    {
        if ($this->Tafel->contains($tafel)) {
            $this->Tafel->removeElement($tafel);
        }

        return $this;
    }
}
