<?php

namespace App\Entity;

use App\Repository\ScoreRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ScoreRepository::class)]
class Score
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?float $scoreDossier = null;
   
    #[ORM\Column(nullable: true)]
    private ?float $scoreEtab = null;

    #[ORM\Column(length: 500, nullable: true)]
    private ?string $formuleEtab = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?User $user = null;

    #[ORM\Column(nullable: true)]
    private ?float $total = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getScoreDossier(): ?float
    {
        return $this->scoreDossier;
    }

    public function setScoreDossier(float $scoreDossier): self
    {
        $this->scoreDossier = $scoreDossier;

        return $this;
    }

    public function getScoreEtab(): ?float
    {
        return $this->scoreEtab;
    }

    public function setScoreEtab(float $scoreEtab): self
    {
        $this->scoreEtab = $scoreEtab;

        return $this;
    }

    public function getFormuleEtab(): ?string
    {
        return $this->formuleEtab;
    }

    public function setFormuleEtab(string $formuleEtab): self
    {
        $this->formuleEtab = $formuleEtab;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setTotal(?float $total): self
    {
        $this->total = $total;

        return $this;
    }
}
