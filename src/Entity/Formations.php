<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity(repositoryClass="App\Repository\FormationsRepository")
 */
class Formations
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
    private $intitule;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Lieux;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Utilisateurs;
    /**
     * @ORM\Column(type="time")
     */
    private $Duree;
    /**
     * @ORM\Column(type="date")
     */
    private $date_debut;
    /**
     * @ORM\Column(type="date")
     */
    private $date_fin;
    public function getId(): ?int
    {
        return $this->id;
    }
    public function getIntitule(): ?string
    {
        return $this->intitule;
    }
    public function setIntitule(string $intitule): self
    {
        $this->intitule = $intitule;
        return $this;
    }
    public function getLieux(): ?string
    {
        return $this->Lieux;
    }
    public function setLieux(string $Lieux): self
    {
        $this->Lieux = $Lieux;
        return $this;
    }
    public function getUtilisateurs(): ?string
    {
        return $this->Utilisateurs;
    }
    public function setUtilisateurs(string $Utilisateurs): self
    {
        $this->Utilisateurs = $Utilisateurs;
        return $this;
    }
    public function getDuree(): ?\DateTimeInterface
    {
        return $this->Duree;
    }
    public function setDuree(\DateTimeInterface $Duree): self
    {
        $this->Duree = $Duree;
        return $this;
    }
    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }
    public function setDateDebut(\DateTimeInterface $date_debut): self
    {
        $this->date_debut = $date_debut;
        return $this;
    }
    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }
    public function setDateFin(\DateTimeInterface $date_fin): self
    {
        $this->date_fin = $date_fin;
        return $this;
    }
}