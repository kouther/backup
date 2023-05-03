<?php

namespace App\Entity;

use App\Repository\AdminRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdminRepository::class)]
class Admin
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Grade = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $master = null;

    #[ORM\OneToOne(inversedBy: 'admin', cascade: ['persist', 'remove'])]
    private ?User $user = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $Etablissement = null;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGrade(): ?string
    {
        return $this->Grade;
    }

    public function setGrade(?string $Grade): self
    {
        $this->Grade = $Grade;

        return $this;
    }

    public function getMaster(): ?string
    {
        return $this->master;
    }

    public function setMaster(?string $master): self
    {
        $this->master = $master;

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

    public function getEtablissement(): ?string
    {
        return $this->Etablissement;
    }

    public function setEtablissement(?string $Etablissement): self
    {
        $this->Etablissement = $Etablissement;

        return $this;
    }

}
