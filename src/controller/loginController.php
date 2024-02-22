<?php
require '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $db = new Database();
    $userDao = new UserDAO($db->getPdo());
    $user = $userDao->findUser($username); // Anta att du har denna metod

    if ($user && password_verify($password, $user->getPassword())) {
        // Lösenordet är korrekt, starta en session för användaren
        session_start();
        $_SESSION['username'] = $username; // Spara användarnamnet i sessionen
        echo "<h2>Du är inloggad som: " . htmlspecialchars($username) . "</h2>";
        // Omdirigera användaren till en säker sida
        header('Location: profile.php'); // Anpassa till din skyddade sida
        exit;
    } else {
        echo "<h2>Felaktigt användarnamn eller lösenord</h2>";
    }
}
