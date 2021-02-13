<?php

namespace App\Entity;

use App\Repository\SuspectRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SuspectRepository::class)
 */
class Suspect
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numero;


    /**
     * @ORM\OneToMany(targetEntity=Annonces::class, mappedBy="suspect")
     */
    private $casier;

    public function __construct()
    {
        $this->casier = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    /**
     * @return Collection|Annonces[]
     */
    public function getCasier(): Collection
    {
        return $this->casier;
    }

    public function addCasier(Annonces $casier): self
    {
        if (!$this->casier->contains($casier)) {
            $this->casier[] = $casier;
            $casier->setSuspect($this);
        }

        return $this;
    }

    public function removeCasier(Annonces $casier): self
    {
        if ($this->casier->removeElement($casier)) {
            // set the owning side to null (unless already changed)
            if ($casier->getSuspect() === $this) {
                $casier->setSuspect(null);
            }
        }

        return $this;
    }
}
