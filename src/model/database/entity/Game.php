<?php

class Game
{
    private int $id;
    private string $title;
    //private string $description;
    private int $rating;
    private ?int $igdbId;

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    // public function getDescription(): string
    // {
    //     return $this->description;
    // }

    // public function setDescription(string $description): void
    // {
    //     $this->description = $description;
    // }

    public function getRating(): int
    {
        return $this->rating;
    }

    public function setRating(int $rating): void
    {
        $this->rating = $rating;
    }

    public function getIgdbId(): ?int
    {
        return $this->igdbId;
    }

    public function setIgdbId(?int $igdbId): void
    {
        $this->igdbId = $igdbId;
    }
}
