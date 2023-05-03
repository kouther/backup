<?php

namespace App\Entity;

use App\Repository\SelectMasterRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SelectMasterRepository::class)]
class SelectMaster
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?User $user = null;

    #[ORM\Column(length: 300, nullable: true)]
    private ?string $university = null;

    #[ORM\Column(length: 255)]
    private ?string $master = null;

    
    public function __toString(): string
    {
    return $this->university.' '.$this->master;
    }


    public function getId(): ?int
    {
        return $this->id;
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

    public function getUniversity(): ?string
    {
        return $this->university;
    }

    public function setUniversity(?string $university): self
    {
        $this->university = $university;

        return $this;
    }

    public function getMaster(): ?string
    {
        return $this->master;
    }

    public function setMaster(string $master): self
    {
        $this->master = $master;

        return $this;
    }

}
