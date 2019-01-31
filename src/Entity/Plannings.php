<?php

namespace App\Entity;

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
}
