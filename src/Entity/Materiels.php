<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MaterielsRepository")
 */
class Materiels
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Type;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $Quantite;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $stock_disponible;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Reservations", inversedBy="materiels")
     */
    private $reservations;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->Type;
    }

    public function setType(string $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    public function getQuantite()
    {
        return $this->Quantite;
    }

    public function setQuantite($Quantite): self
    {
        $this->Quantite = $Quantite;

        return $this;
    }

    public function getStockDisponible()
    {
        return $this->stock_disponible;
    }

    public function setStockDisponible($stock_disponible): self
    {
        $this->stock_disponible = $stock_disponible;

        return $this;
    }

    /**
     * @return Collection|Reservations[]
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservations $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
        }

        return $this;
    }

    public function removeReservation(Reservations $reservation): self
    {
        if ($this->reservations->contains($reservation)) {
            $this->reservations->removeElement($reservation);
        }

        return $this;
    }

}
