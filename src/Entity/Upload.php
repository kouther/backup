<?php

namespace App\Entity;

use App\Repository\UploadRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UploadRepository::class)]
class Upload
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 2000, nullable: true)]
    private ?string $Cin = null;

    #[ORM\Column(length: 3000, nullable: true)]
    private ?string $transcriptun = null;

    #[ORM\Column(length: 3000, nullable: true)]
    private ?string $transcriptdeux = null;

    #[ORM\Column(length: 3000, nullable: true)]
    private ?string $bac = null;

    #[ORM\Column(length: 3000, nullable: true)]
    private ?string $transcripttrois = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCin(): ?string
    {
        return $this->Cin;
    }

    public function setCin(?string $Cin): self
    {
        $this->Cin = $Cin;

        return $this;
    }

    public function getTranscriptun(): ?string
    {
        return $this->transcriptun;
    }

    public function setTranscriptun(?string $transcriptun): self
    {
        $this->transcriptun = $transcriptun;

        return $this;
    }

    public function getTranscriptdeux(): ?string
    {
        return $this->transcriptdeux;
    }

    public function setTranscriptdeux(string $transcriptdeux): self
    {
        $this->transcriptdeux = $transcriptdeux;

        return $this;
    }

    public function getBac(): ?string
    {
        return $this->bac;
    }

    public function setBac(?string $bac): self
    {
        $this->bac = $bac;

        return $this;
    }

    public function getTranscripttrois(): ?string
    {
        return $this->transcripttrois;
    }

    public function setTranscripttrois(?string $transcripttrois): self
    {
        $this->transcripttrois = $transcripttrois;

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
}
