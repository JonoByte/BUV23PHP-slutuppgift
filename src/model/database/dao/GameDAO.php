<?php

class GameDAO{

    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function add(Game $game) : void
    {
        $sql = "INSERT INTO Game (title, description, rating, igdbId) VALUES (:1,:2,:3,:4)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(":1", $game->getTitle());
        $statement->bindValue(":2", $game->getDescription());
        $statement->bindValue(":3", $game->getRating());
        $statement->bindValue(":4", $game->getIgdbId());
        $statement->execute();
    }

    public function find(int $id) :?Game
    {
        $sql = "SELECT * FROM Game WHERE id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(":id", $id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_CLASS, Game::class);
    }
}
?>