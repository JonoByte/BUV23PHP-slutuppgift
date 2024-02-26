<?php
require 'src/config.php';

$db = new Database();
$friendsReqDAO = new FriendsReqDAO($db->getPdo());

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming userA is the session user and userB is the user from the AJAX request
    $userA = isset($_SESSION['username']) ? $_SESSION['username'] : null; // Make sure 'username' session variable exists
    $userB = isset($_POST['userId']) ? $_POST['userId'] : null;

    // Check if both userA and userB are provided
    if ($userA && $userB) {
        try {
            // Attempt to accept the friend request
            if ($friendsReqDAO->acceptFriendRequest($userA, $userB)) {
                echo "Friend request accepted successfully!";
            } else {
                // If the method returns false, but no exception was thrown
                echo "Failed to accept friend request.";
            }
        } catch (PDOException $e) {
            // Log the exception message and return a generic error message
            error_log("PDOException in accept_friend_request.php: " . $e->getMessage());
            echo "An error occurred while processing your request.";
        }
    } else {
        echo "Invalid data provided.";
    }
} else {
    echo "Invalid request method.";
}
