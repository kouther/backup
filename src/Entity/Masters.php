<?php

namespace App\Entity;

use App\Repository\MastersRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MastersRepository::class)]
class Masters
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $formation = null;

    #[ORM\Column(length: 255)]
    private ?string $etablissement = null;

    #[ORM\Column(length: 255)]
    private ?string $abreviation = null;

    #[ORM\Column(length: 255)]
    private ?string $diplome = null;

    #[ORM\Column(length: 255)]
    private ?string $parcours = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $opendate = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $EndDate = null;
    public function __toString(): string
    {
    return $this->formation.' '.$this->etablissement.' '.$this->diplome;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFormation(): ?string
    {
        return $this->formation;
    }

    public function setFormation(string $formation): self
    {
        $this->formation = $formation;

        return $this;
    }

    public function getEtablissement(): ?string
    {
        return $this->etablissement;
    }

    public function setEtablissement(string $etablissement): self
    {
        $this->etablissement = $etablissement;

        return $this;
    }

    public function getAbreviation(): ?string
    {
        return $this->abreviation;
    }

    public function setAbreviation(string $abreviation): self
    {
        $this->abreviation = $abreviation;

        return $this;
    }

    public function getDiplome(): ?string
    {
        return $this->diplome;
    }

    public function setDiplome(string $diplome): self
    {
        $this->diplome = $diplome;

        return $this;
    }

    public function getParcours(): ?string
    {
        return $this->parcours;
    }

    public function setParcours(string $parcours): self
    {
        $this->parcours = $parcours;

        return $this;
    }

    public function getOpendate(): ?\DateTimeInterface
    {
        return $this->opendate;
    }

    public function setOpendate(?\DateTimeInterface $opendate): self
    {
        $this->opendate = $opendate;

        return $this;
    }

    public function getEndDate(): ?\DateTimeInterface
    {
        return $this->EndDate;
    }

    public function setEndDate(?\DateTimeInterface $EndDate): self
    {
        $this->EndDate = $EndDate;

        return $this;
    }
}
