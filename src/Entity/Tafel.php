<?php

namespace App\Entity;

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
    private $stoelen;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStoelen(): ?int
    {
        return $this->stoelen;
    }

    public function setStoelen(int $stoelen): self
    {
        $this->stoelen = $stoelen;

        return $this;
    }
}
