<?php

namespace App\Entity;

use App\Repository\CursusRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CursusRepository::class)]
class Cursus
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'cursus', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $user = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $bacdate = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $bacmention = null;

    #[ORM\Column(length: 255)]
    private ?string $bacsection = null;

    #[ORM\Column(length: 255)]
    private ?string $bacsession = null;

    #[ORM\Column(length: 255)]
    private ?string $diplome = null;

    #[ORM\Column(length: 255)]
    private ?string $etablissement = null;

    #[ORM\Column(length: 255)]
    private ?string $anneeunivesitaire = null;

    #[ORM\Column(length: 255)]
    private ?string $domaine = null;

    #[ORM\Column(length: 255)]
    private ?string $specialite = null;

    #[ORM\Column]
    private ?int $redoublement = null;

    #[ORM\Column]
    private ?float $bacmoyenne = null;

    #[ORM\Column(length: 255)]
    private ?string $anneeun = null;

    #[ORM\Column(length: 255)]
    private ?string $Mentionun = null;

    #[ORM\Column(length: 255)]
    private ?float $moyenun = null;

    #[ORM\Column]
    private ?int $ratrappageun = null;
  

    #[ORM\Column(length: 255)]
    private ?string $anneedeux = null;

    #[ORM\Column(length: 255)]
    private ?string $Mentiondeux = null;

    #[ORM\Column]
    private ?float $moyendeux = null;

    #[ORM\Column]
    private ?int $ratrappagedeux = null;

    #[ORM\Column(length: 255)]
    private ?string $anneetrois = null;

    #[ORM\Column]
    private ?string $mentiontrois = null;

    #[ORM\Column]
    private ?float $moyentrois = null;

    #[ORM\Column]
    private ?int $ratrappagetrois = null;

    #[ORM\Column]
    private ?float $scoreDossier = null;

    #[ORM\Column(nullable: true)]
    private ?float $scoreEtablissement = null;

    #[ORM\Column(length: 2000, nullable: true)]
    private ?string $formule = null;

    #[ORM\Column(nullable: true)]
    private ?float $total = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getBacdate(): ?string
    {
        return $this->bacdate;
    }

    public function setBacdate(?string $bacdate): self
    {
        $this->bacdate = $bacdate;

        return $this;
    }

    public function getBacmention(): ?string
    {
        return $this->bacmention;
    }

    public function setBacmention(?string $bacmention): self
    {
        $this->bacmention = $bacmention;

        return $this;
    }

    public function getBacsection(): ?string
    {
        return $this->bacsection;
    }

    public function setBacsection(string $bacsection): self
    {
        $this->bacsection = $bacsection;

        return $this;
    }

    public function getBacsession(): ?string
    {
        return $this->bacsession;
    }

    public function setBacsession(string $bacsession): self
    {
        $this->bacsession = $bacsession;

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

    public function getEtablissement(): ?string
    {
        return $this->etablissement;
    }

    public function setEtablissement(string $etablissement): self
    {
        $this->etablissement = $etablissement;

        return $this;
    }

    public function getAnneeunivesitaire(): ?string
    {
        return $this->anneeunivesitaire;
    }

    public function setAnneeunivesitaire(string $anneeunivesitaire): self
    {
        $this->anneeunivesitaire = $anneeunivesitaire;

        return $this;
    }

    public function getDomaine(): ?string
    {
        return $this->domaine;
    }

    public function setDomaine(string $domaine): self
    {
        $this->domaine = $domaine;

        return $this;
    }

    public function getSpecialite(): ?string
    {
        return $this->specialite;
    }

    public function setSpecialite(string $specialite): self
    {
        $this->specialite = $specialite;

        return $this;
    }

    public function getRedoublement(): ?int
    {
        return $this->redoublement;
    }

    public function setRedoublement(int $redoublement): self
    {
        $this->redoublement = $redoublement;

        return $this;
    }

    public function getBacmoyenne(): ?float
    {
        return $this->bacmoyenne;
    }

    public function setBacmoyenne(float $bacmoyenne): self
    {
        $this->bacmoyenne = $bacmoyenne;

        return $this;
    }

    public function getAnneeun(): ?string
    {
        return $this->anneeun;
    }

    public function setAnneeun(string $anneeun): self
    {
        $this->anneeun = $anneeun;

        return $this;
    }

    public function getMentionun(): ?string
    {
        return $this->Mentionun;
    }

    public function setMentionun(string $Mentionun): self
    {
        $this->Mentionun = $Mentionun;

        return $this;
    }

    public function getMoyenun(): ?float
    {
        return $this->moyenun;
    }

    public function setMoyenun(float $moyenun): self
    {
        $this->moyenun = $moyenun;

        return $this;
    }

    public function getRatrappageun(): ?int
    {
        return $this->ratrappageun;
    }

    public function setRatrappageun(int $ratrappageun): self
    {
        $this->ratrappageun = $ratrappageun;

        return $this;
    }

    public function getAnneedeux(): ?string
    {
        return $this->anneedeux;
    }

    public function setAnneedeux(string $anneedeux): self
    {
        $this->anneedeux = $anneedeux;

        return $this;
    }

    public function getMentiondeux(): ?string
    {
        return $this->Mentiondeux;
    }

    public function setMentiondeux(string $Mentiondeux): self
    {
        $this->Mentiondeux = $Mentiondeux;

        return $this;
    }

    public function getMoyendeux(): ?float
    {
        return $this->moyendeux;
    }

    public function setMoyendeux(float $moyendeux): self
    {
        $this->moyendeux = $moyendeux;

        return $this;
    }

    public function getRatrappagedeux(): ?int
    {
        return $this->ratrappagedeux;
    }

    public function setRatrappagedeux(int $ratrappagedeux): self
    {
        $this->ratrappagedeux = $ratrappagedeux;

        return $this;
    }

    public function getAnneetrois(): ?string
    {
        return $this->anneetrois;
    }

    public function setAnneetrois(string $anneetrois): self
    {
        $this->anneetrois = $anneetrois;

        return $this;
    }

    public function getMentiontrois(): ?string
    {
        return $this->mentiontrois;
    }

    public function setMentiontrois(string $mentiontrois): self
    {
        $this->mentiontrois = $mentiontrois;

        return $this;
    }

    public function getMoyentrois(): ?float
    {
        return $this->moyentrois;
    }

    public function setMoyentrois(float $moyentrois): self
    {
        $this->moyentrois = $moyentrois;

        return $this;
    }

    public function getRatrappagetrois(): ?int
    {
        return $this->ratrappagetrois;
    }

    public function setRatrappagetrois(int $ratrappagetrois): self
    {
        $this->ratrappagetrois = $ratrappagetrois;

        return $this;
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

    public function getScoreEtablissement(): ?float
    {
        return $this->scoreEtablissement;
    }

    public function setScoreEtablissement(?float $scoreEtablissement): self
    {
        $this->scoreEtablissement = $scoreEtablissement;

        return $this;
    }

    public function getFormule(): ?string
    {
        return $this->formule;
    }

    public function setFormule(?string $formule): self
    {
        $this->formule = $formule;

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
