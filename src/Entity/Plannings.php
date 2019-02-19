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
     * @ORM\OneToMany(targetEntity="App\Entity\Reservations", mappedBy="plannings")
     */
    private $reservations;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Utilisateurs", mappedBy="plannings")
     */
    private $utilisateurs;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Plannings", mappedBy="plannings")
     */
    private $plannings;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
        $this->utilisateurs = new ArrayCollection();
        $this->plannings = new ArrayCollection();
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

    /**
     * @return Collection|utilisateurs[]
     */
    public function getUtilisateurs(): Collection
    {
        return $this->utilisateurs;
    }

    public function addUtilisateur(utilisateurs $utilisateur): self
    {
        if (!$this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs[] = $utilisateur;
            $utilisateur->setPlannings($this);
        }

        return $this;
    }

    public function removeUtilisateur(utilisateurs $utilisateur): self
    {
        if ($this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs->removeElement($utilisateur);
            // set the owning side to null (unless already changed)
            if ($utilisateur->getPlannings() === $this) {
                $utilisateur->setPlannings(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Plannings[]
     */
    public function getPlannings(): Collection
    {
        return $this->plannings;
    }

    public function addPlanning(Plannings $planning): self
    {
        if (!$this->plannings->contains($planning)) {
            $this->plannings[] = $planning;
            $planning->setPlannings($this);
        }

        return $this;
    }

    public function removePlanning(Plannings $planning): self
    {
        if ($this->plannings->contains($planning)) {
            $this->plannings->removeElement($planning);
            // set the owning side to null (unless already changed)
            if ($planning->getPlannings() === $this) {
                $planning->setPlannings(null);
            }
        }

        return $this;
    }
}
