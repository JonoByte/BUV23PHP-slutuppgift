<?php

class FriendsReqDAO
{
    private $pdo;

    public function sendFriendRequest($userA, $userB)
    {
        // Assuming you have a method to insert a friend request into your database
        $query = "INSERT INTO friends (user_id_a, user_id_b, status, created_at)
                  VALUES (user_id_a, user_id_b, 'pending', current_timestamp())";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam('user_id_a', $userA);
        $stmt->bindParam('user_id_b', $userB);

        // Execute the query
        if ($stmt->execute()) {
            // If the query is successful, you might also want to store the message in another table
            // or perform additional actions

            return true;
        } else {
            // Handle the case where the query fails
            return false;
        }
    }
}
