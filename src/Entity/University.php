<?php

namespace App\Entity;

use App\Repository\UniversityRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniversityRepository::class)]
class University
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 400)]
    private ?string $etablissement = null;

    #[ORM\OneToMany(mappedBy: 'university', targetEntity: Master::class)]
    private Collection $masters;


    public function __toString()
    {
        return $this->etablissement;
    }

    public function __construct()
    {
        $this->masters = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection<int, Master>
     */
    public function getMasters(): Collection
    {
        return $this->masters;
    }

    public function addMaster(Master $master): self
    {
        if (!$this->masters->contains($master)) {
            $this->masters->add($master);
            $master->setUniversity($this);
        }

        return $this;
    }

    public function removeMaster(Master $master): self
    {
        if ($this->masters->removeElement($master)) {
            // set the owning side to null (unless already changed)
            if ($master->getUniversity() === $this) {
                $master->setUniversity(null);
            }
        }

        return $this;
    }
}
