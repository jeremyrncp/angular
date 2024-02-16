<?php

namespace App\Entity;

use App\Repository\MusicRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MusicRepository::class)]
class Music
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: false)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: false)]
    private ?string $origin = null;

    #[ORM\Column(length: 255, nullable: false)]
    private ?string $city = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: false)]
    private ?\DateTimeInterface $start = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $separation = null;

    #[ORM\Column]
    private ?int $members = null;

    #[ORM\Column(length: 255)]
    private ?string $summary = null;

    #[ORM\ManyToOne(inversedBy: 'music')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CourantMusical $courantMusical = null;

    #[ORM\ManyToOne(inversedBy: 'music')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Musician $fondator = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getOrigin(): ?string
    {
        return $this->origin;
    }

    public function setOrigin(?string $origin): static
    {
        $this->origin = $origin;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): static
    {
        $this->city = $city;

        return $this;
    }

    public function getStart(): ?\DateTimeInterface
    {
        return $this->start;
    }

    public function setStart(?\DateTimeInterface $start): static
    {
        $this->start = $start;

        return $this;
    }

    public function getSeparation(): ?\DateTimeInterface
    {
        return $this->separation;
    }

    public function setSeparation(?\DateTimeInterface $separation): static
    {
        $this->separation = $separation;

        return $this;
    }

    public function getMembers(): ?int
    {
        return $this->members;
    }

    public function setMembers(int $members): static
    {
        $this->members = $members;

        return $this;
    }

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function setSummary(string $summary): static
    {
        $this->summary = $summary;

        return $this;
    }

    public function getCourantMusical(): ?CourantMusical
    {
        return $this->courantMusical;
    }

    public function setCourantMusical(?CourantMusical $courantMusical): static
    {
        $this->courantMusical = $courantMusical;

        return $this;
    }

    public function getFondator(): ?Musician
    {
        return $this->fondator;
    }

    public function setFondator(?Musician $fondator): static
    {
        $this->fondator = $fondator;

        return $this;
    }
}
