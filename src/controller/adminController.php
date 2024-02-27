<?php
require '../config.php';

// Kontrollera om användarnamnet är tillgängligt och är inloggat
if (isset($username) && !empty($username)) {
    $db = new Database();
    $userDao = new UserDAO($db->getPdo());

    try {
        //sätter user till admin status
        $userDao->makeAdmin($username);
        
        // Redirect till en bekräftelsesida eller någon annan sida efter borttagningen
        header('Location: ../../friends.php');

        echo $username . ' is now admin status';
        exit;
    } catch (Exception $e) {
        // Hantera eventuella fel här
        echo "An error occurred: " . $e->getMessage();
    }
}

else {
    // Om användarnamnet inte är tillgängligt eller inte är inloggat
    echo "User not logged in or username not provided.";
}
?>