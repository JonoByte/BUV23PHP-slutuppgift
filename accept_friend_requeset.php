<?php
require 'src/config.php';
$db = new Database();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assume you have instantiated the FriendsReqDAO class
    $friendsReqDAO = new FriendsReqDAO($db->getPdo()); // Replace with your actual PDO instance

    // Get the user ID from the AJAX request
    $userA = $_SESSION['username']; // Assuming the user ID is stored in the session

    // Assuming you have a method in FriendsReqDAO to accept the friend request
    if ($friendsReqDAO->acceptFriendRequest($userA, $_POST['userId'])) {
        echo "Friend request accepted successfully!";
    } else {
        echo "Failed to accept friend request.";
    }
} else {
    echo "Invalid request method.";
}
