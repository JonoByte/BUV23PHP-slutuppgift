<?php

class GameDAO{

    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function add(Game $game) : void
    {
        $sql = "INSERT INTO games (title, agerating) VALUES (:title, :agerating)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(":title", $game->getTitle());
        $statement->bindValue(":agerating", $game->getRating());
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