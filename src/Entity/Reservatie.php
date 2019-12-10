<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReservatieRepository")
 */
class Reservatie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="time")
     */
    private $Tijd;

    /**
     * @ORM\Column(type="date")
     */
    private $Datum;

    /**
     * @ORM\Column(type="integer")
     */
    private $Aantal;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="reservaties")
     * @ORM\JoinColumn(nullable=false)
     */
    private $User;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Tafel", mappedBy="Tafel")
     */
    private $tafels;

    public function __construct()
    {
        $this->tafels = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTijd(): ?\DateTimeInterface
    {
        return $this->Tijd;
    }

    public function setTijd(\DateTimeInterface $Tijd): self
    {
        $this->Tijd = $Tijd;

        return $this;
    }

    public function getDatum(): ?\DateTimeInterface
    {
        return $this->Datum;
    }

    public function setDatum(\DateTimeInterface $Datum): self
    {
        $this->Datum = $Datum;

        return $this;
    }

    public function getAantal(): ?int
    {
        return $this->Aantal;
    }

    public function setAantal(int $Aantal): self
    {
        $this->Aantal = $Aantal;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }

    /**
     * @return Collection|Tafel[]
     */
    public function getTafels(): Collection
    {
        return $this->tafels;
    }

    public function addTafel(Tafel $tafel): self
    {
        if (!$this->tafels->contains($tafel)) {
            $this->tafels[] = $tafel;
            $tafel->addTafel($this);
        }

        return $this;
    }

    public function removeTafel(Tafel $tafel): self
    {
        if ($this->tafels->contains($tafel)) {
            $this->tafels->removeElement($tafel);
            $tafel->removeTafel($this);
        }

        return $this;
    }
}
