<?php

class FriendsDAO
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getFriendsByUserId($userId)
    {
        $query = "SELECT user.id, user.email, user.profilepic, friends.status
                  FROM friends
                  JOIN user ON friends.user_id_b = user.id
                  WHERE friends.user_id_a = :userId
                    AND friends.status = 'accepted'";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':userId', $userId);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
