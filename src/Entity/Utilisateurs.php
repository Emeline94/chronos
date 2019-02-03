<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UtilisateursRepository")
 */
class Utilisateurs
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
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Prenoms;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $emails;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lieux;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Formateurs;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $stagiaires;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Administrateurs;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $code_acces;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Plannings", mappedBy="users")
     */
    private $plannings;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Reservations", mappedBy="utilisateurs")
     */
    private $reservations;

    public function __construct()
    {
        $this->plannings = new ArrayCollection();
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenoms(): ?string
    {
        return $this->Prenoms;
    }

    public function setPrenoms(string $Prenoms): self
    {
        $this->Prenoms = $Prenoms;

        return $this;
    }

    public function getEmails(): ?string
    {
        return $this->emails;
    }

    public function setEmails(string $emails): self
    {
        $this->emails = $emails;

        return $this;
    }

    public function getLieux(): ?string
    {
        return $this->lieux;
    }

    public function setLieux(string $lieux): self
    {
        $this->lieux = $lieux;

        return $this;
    }

    public function getFormateurs(): ?string
    {
        return $this->Formateurs;
    }

    public function setFormateurs(string $Formateurs): self
    {
        $this->Formateurs = $Formateurs;

        return $this;
    }

    public function getStagiaires(): ?string
    {
        return $this->stagiaires;
    }

    public function setStagiaires(string $stagiaires): self
    {
        $this->stagiaires = $stagiaires;

        return $this;
    }

    public function getAdministrateurs(): ?string
    {
        return $this->Administrateurs;
    }

    public function setAdministrateurs(string $Administrateurs): self
    {
        $this->Administrateurs = $Administrateurs;

        return $this;
    }

    public function getCodeAcces()
    {
        return $this->code_acces;
    }

    public function setCodeAcces($code_acces): self
    {
        $this->code_acces = $code_acces;

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
            $planning->setUsers($this);
        }

        return $this;
    }

    public function removePlanning(Plannings $planning): self
    {
        if ($this->plannings->contains($planning)) {
            $this->plannings->removeElement($planning);
            // set the owning side to null (unless already changed)
            if ($planning->getUsers() === $this) {
                $planning->setUsers(null);
            }
        }

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
            $reservation->setUtilisateurs($this);
        }

        return $this;
    }

    public function removeReservation(Reservations $reservation): self
    {
        if ($this->reservations->contains($reservation)) {
            $this->reservations->removeElement($reservation);
            // set the owning side to null (unless already changed)
            if ($reservation->getUtilisateurs() === $this) {
                $reservation->setUtilisateurs(null);
            }
        }

        return $this;
    }
}
