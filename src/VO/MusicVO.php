<?php

namespace App\VO;

class MusicVO
{
    const EMPTY_STRING = "";
    private string $name;
    private string $origin;
    private string $city;
    private \DateTimeInterface $start;
    private ?\DateTimeInterface $separation;

    private string $fondateurs;
    private ?int $members;
    private string $courantMusical;
    private string $description;

    public function hydrate(array $data): self
    {
        $this->name = $data[0];
        $this->origin = $data[1];
        $this->city = $data[2];
        $this->start = new \DateTime($data[3]."-01-01");
        $this->separation = $data[4] !== self::EMPTY_STRING ? new \DateTime($data[4]."-01-01") : null;
        $this->fondateurs = $data[5];
        $this->members = $data[6];
        $this->courantMusical = $data[7];
        $this->description = $data[8];

        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getOrigin(): string
    {
        return $this->origin;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @return \DateTimeInterface
     */
    public function getStart(): \DateTimeInterface
    {
        return $this->start;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getSeparation(): ?\DateTimeInterface
    {
        return $this->separation;
    }

    /**
     * @return string
     */
    public function getFondateurs(): string
    {
        return $this->fondateurs;
    }

    /**
     * @return int|null
     */
    public function getMembers(): ?int
    {
        return $this->members;
    }

    /**
     * @return string
     */
    public function getCourantMusical(): string
    {
        return $this->courantMusical;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }
}