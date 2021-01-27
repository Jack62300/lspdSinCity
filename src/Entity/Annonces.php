<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AnnoncesRepository")
 */
class Annonces
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;


    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Images", mappedBy="annonces",cascade={"persist"})
     */
    private $images;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $numero;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $droit;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $arrestation;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $inculpation;

    /**
     * @ORM\Column(type="text")
     */
    private $detail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $amende;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $tigGav;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $biens;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $comparution;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $avocat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cloture;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $archives;

    public function __construct()
    {
        $this->images = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }


    /**
     * @return Collection|Images[]
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Images $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images[] = $image;
            $image->setAnnonces($this);
        }

        return $this;
    }

    public function removeImage(Images $image): self
    {
        if ($this->images->contains($image)) {
            $this->images->removeElement($image);
            // set the owning side to null (unless already changed)
            if ($image->getAnnonces() === $this) {
                $image->setAnnonces(null);
            }
        }

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

    public function getDroit(): ?string
    {
        return $this->droit;
    }

    public function setDroit(string $droit): self
    {
        $this->droit = $droit;

        return $this;
    }

    public function getArrestation(): ?string
    {
        return $this->arrestation;
    }

    public function setArrestation(?string $arrestation): self
    {
        $this->arrestation = $arrestation;

        return $this;
    }

    public function getInculpation(): ?string
    {
        return $this->inculpation;
    }

    public function setInculpation(string $inculpation): self
    {
        $this->inculpation = $inculpation;

        return $this;
    }

    public function getDetail(): ?string
    {
        return $this->detail;
    }

    public function setDetail(string $detail): self
    {
        $this->detail = $detail;

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

    public function setTigGav(?string $tigGav): self
    {
        $this->tigGav = $tigGav;

        return $this;
    }

    public function getBiens(): ?string
    {
        return $this->biens;
    }

    public function setBiens(?string $biens): self
    {
        $this->biens = $biens;

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

    public function getAvocat(): ?string
    {
        return $this->avocat;
    }

    public function setAvocat(?string $avocat): self
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

    public function getArchives(): ?bool
    {
        return $this->archives;
    }

    public function setArchives(?bool $archives): self
    {
        $this->archives = $archives;

        return $this;
    }
}

