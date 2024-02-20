<?php

class FriendsDAO
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function getFriendsByUserId($userId)
    {
        $query = "SELECT users.id, users.email, users.profilepic, friends.status
                  FROM friends
                  JOIN users ON friends.user_id_b = users.id
                  WHERE friends.user_id_a = :userId
                    AND friends.status = 'accepted'";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
