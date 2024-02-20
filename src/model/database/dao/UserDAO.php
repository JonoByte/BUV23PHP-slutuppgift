<?php
require 'src/config/pdo.php';
class UserDAO{

    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function addUser(User $user) : void {
        // Hasha lösenordet
        $hashedPassword = password_hash($user->getPassword(), PASSWORD_DEFAULT);
        $sql = "INSERT INTO user (id, password, email) VALUES (:username, :password, :email)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(":username", $user->getUsername());
        $statement->bindValue(":password", $hashedPassword);
        $statement->bindValue(":email", $user->getEmail());
        $statement->execute();
    }

    public function findUser($username) : ?User {
        $sql = "SELECT * FROM user WHERE id = :username"; // Använd rätt kolumnnamn för användarnamn
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(":username", $username);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, User::class);
        return $statement->fetch();
    }
}

?>