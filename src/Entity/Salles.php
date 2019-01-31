<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SallesRepository")
 */
class Salles
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $numeros;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $capacite_max;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $disponibilite;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeros()
    {
        return $this->numeros;
    }

    public function setNumeros($numeros): self
    {
        $this->numeros = $numeros;

        return $this;
    }

    public function getCapaciteMax(): ?string
    {
        return $this->capacite_max;
    }

    public function setCapaciteMax(string $capacite_max): self
    {
        $this->capacite_max = $capacite_max;

        return $this;
    }

    public function getDisponibilite()
    {
        return $this->disponibilite;
    }

    public function setDisponibilite($disponibilite): self
    {
        $this->disponibilite = $disponibilite;

        return $this;
    }
}
