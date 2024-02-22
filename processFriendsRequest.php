<?php
require 'src/config/autoloader.php';
require __DIR__ . '/src/config/pdo.php';
require 'src/model/database/dao/FriendsReqDAO.php';

$friendsReqDAO = new FriendsReqDAO($pdo);

// Get data from the AJAX request
$userB = $_POST['friendUsername'];

$userA = $_SESSION['username'];


$result = $friendsReqDAO->sendFriendRequest($userA, $userB);

if ($result) {
    echo "Friend request sent successfully!";
} else {
    echo "Error sending friend request.";
}
