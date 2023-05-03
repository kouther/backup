<?php

namespace App\Entity;

use App\Repository\MasterRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MasterRepository::class)]
class Master
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $master = null;

    #[ORM\ManyToOne(inversedBy: 'masters')]
    private ?University $university = null;


    
    public function __toString()
    {
        return $this->master;
    }


    public function getId(): ?int
    {
        return $this->id;
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

    public function getUniversity(): ?University
    {
        return $this->university;
    }

    public function setUniversity(?University $university): self
    {
        $this->university = $university;

        return $this;
    }
}
