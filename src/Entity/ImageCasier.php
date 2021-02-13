<?php

namespace App\Entity;

use App\Repository\ImageCasierRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ImageCasierRepository::class)
 */
class ImageCasier
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=casier::class, inversedBy="imageCasiers")
     */
    private $annonceId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAnnonceId(): ?casier
    {
        return $this->annonceId;
    }

    public function setAnnonceId(?casier $annonceId): self
    {
        $this->annonceId = $annonceId;

        return $this;
    }
}
