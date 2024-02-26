<?php

class FriendsReqDAO
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function sendFriendRequest($userA, $userB)
    {
        $query = "INSERT INTO friends (user_id_a, user_id_b, status, created_at)
              VALUES (:user_id_a, :user_id_b, 'pending', current_timestamp())";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':user_id_a', $userA);
        $stmt->bindParam(':user_id_b', $userB);

        try {
            if ($stmt->execute()) {
                return true;
            } else {
                throw new Exception("Failed to execute the query");
            }
        } catch (Exception $e) {

            return false;
        }
    }

    public function getFriendRequests($userB)
    {
        $query = "SELECT user_id_a, created_at
        FROM friends
        WHERE user_id_b = :user_id_b
        AND status = 'pending'";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':user_id_b', $userB, PDO::PARAM_INT); // Assuming user IDs are integers
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Method to accept a friend request
    public function acceptFriendRequest($userA, $userB)
    {
        $query = "UPDATE friends
              SET status = 'accepted'
              WHERE ((user_id_a = :user_id_a AND user_id_b = :user_id_b)
                 OR (user_id_a = :user_id_b AND user_id_b = :user_id_a))
                 AND status = 'pending'";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':user_id_a', $userA);
        $stmt->bindParam(':user_id_b', $userB);

        try {
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("PDOException in acceptFriendRequest: " . $e->getMessage());
            return false;
        }
    }
}
