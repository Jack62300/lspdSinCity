<?php

namespace App\Entity;

use App\Repository\CasierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CasierRepository::class)
 */
class Casier
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
    private $nomSuspect;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numero;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $citationDroit;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $gav;

    /**
     * @ORM\Column(type="text")
     */
    private $motif;

    /**
     * @ORM\Column(type="text")
     */
    private $detailFait;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $amende;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $tigGav;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $comparution;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $avocat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cloture;


    /**
     * @ORM\OneToMany(targetEntity=ImageCasier::class, mappedBy="annonceId",cascade={"persist"})
     */
    private $imageCasiers;

    public function __construct()
    {
        $this->imageCasiers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomSuspect(): ?string
    {
        return $this->nomSuspect;
    }

    public function setNomSuspect(string $nomSuspect): self
    {
        $this->nomSuspect = $nomSuspect;

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

    public function getCitationDroit(): ?string
    {
        return $this->citationDroit;
    }

    public function setCitationDroit(string $citationDroit): self
    {
        $this->citationDroit = $citationDroit;

        return $this;
    }

    public function getGav(): ?string
    {
        return $this->gav;
    }

    public function setGav(string $gav): self
    {
        $this->gav = $gav;

        return $this;
    }

    public function getMotif(): ?string
    {
        return $this->motif;
    }

    public function setMotif(string $motif): self
    {
        $this->motif = $motif;

        return $this;
    }

    public function getDetailFait(): ?string
    {
        return $this->detailFait;
    }

    public function setDetailFait(string $detailFait): self
    {
        $this->detailFait = $detailFait;

        return $this;
    }

    public function getAmende(): ?string
    {
        return $this->amende;
    }

    public function setAmende(string $amende): self
    {
        $this->amende = $amende;

        return $this;
    }

    public function getTigGav(): ?string
    {
        return $this->tigGav;
    }

    public function setTigGav(string $tigGav): self
    {
        $this->tigGav = $tigGav;

        return $this;
    }

    public function getComparution(): ?bool
    {
        return $this->comparution;
    }

    public function setComparution(?bool $comparution): self
    {
        $this->comparution = $comparution;

        return $this;
    }

    public function getAvocat(): ?bool
    {
        return $this->avocat;
    }

    public function setAvocat(?bool $avocat): self
    {
        $this->avocat = $avocat;

        return $this;
    }

    public function getCloture(): ?string
    {
        return $this->cloture;
    }

    public function setCloture(string $cloture): self
    {
        $this->cloture = $cloture;

        return $this;
    }


    /**
     * @return Collection|ImageCasier[]
     */
    public function getImageCasiers(): Collection
    {
        return $this->imageCasiers;
    }

    public function addImageCasier(ImageCasier $imageCasier): self
    {
        if (!$this->imageCasiers->contains($imageCasier)) {
            $this->imageCasiers[] = $imageCasier;
            $imageCasier->setAnnonceId($this);
        }

        return $this;
    }

    public function removeImageCasier(ImageCasier $imageCasier): self
    {
        if ($this->imageCasiers->removeElement($imageCasier)) {
            // set the owning side to null (unless already changed)
            if ($imageCasier->getAnnonceId() === $this) {
                $imageCasier->setAnnonceId(null);
            }
        }

        return $this;
    }
}
