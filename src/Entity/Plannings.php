<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlanningsRepository")
 */
class Plannings
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
    private $code_formation;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $code_formateur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Administrateur;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Utilisateurs", inversedBy="plannings")
     * @ORM\JoinColumn(nullable=false)
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Reservations", mappedBy="plannings")
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

    public function getCodeFormation()
    {
        return $this->code_formation;
    }

    public function setCodeFormation($code_formation): self
    {
        $this->code_formation = $code_formation;

        return $this;
    }

    public function getCodeFormateur()
    {
        return $this->code_formateur;
    }

    public function setCodeFormateur($code_formateur): self
    {
        $this->code_formateur = $code_formateur;

        return $this;
    }

    public function getAdministrateur(): ?string
    {
        return $this->Administrateur;
    }

    public function setAdministrateur(string $Administrateur): self
    {
        $this->Administrateur = $Administrateur;

        return $this;
    }

    public function getUsers(): ?Utilisateurs
    {
        return $this->users;
    }

    public function setUsers(?Utilisateurs $users): self
    {
        $this->users = $users;

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
            $reservation->setPlannings($this);
        }

        return $this;
    }

    public function removeReservation(Reservations $reservation): self
    {
        if ($this->reservations->contains($reservation)) {
            $this->reservations->removeElement($reservation);
            // set the owning side to null (unless already changed)
            if ($reservation->getPlannings() === $this) {
                $reservation->setPlannings(null);
            }
        }

        return $this;
    }
}
