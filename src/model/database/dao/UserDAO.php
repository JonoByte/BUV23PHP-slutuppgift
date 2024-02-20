<?php

class UserDAO{

    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function addUser(User $user, User $password, User $email) : void
    {
        //hasha password här?
        $sql = "INSERT INTO user (id, password, email) VALUES (:id, :password, :email)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(":id", $user->getId());
        $statement->bindValue(":password", $password->getPassword());
        $statement->bindValue(":email", $email->getEmail());
        $statement->execute();
    }



    public function findUser(int $id) :?User
    {
        $sql = "SELECT * FROM user WHERE id = :id";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(":id", $id);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_CLASS, User::class);
    }
}

?>