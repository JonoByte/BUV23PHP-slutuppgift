<!doctype html>
<html lang="en">

<head>
    <title>Gamescore</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="stylesheet" href="CSS/login.css">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>

    <div class="container-xxl">
        <header>
            <!-- <img src="img/header-pic.jpg" alt="lololol"> -->
            <div class=header-text>
                <h1>Gamescore</h1>
                <h2>Play, Review, Connect Your Gaming Community Awaits!</h2>
                <h3>Home</h3>
            </div>
        </header>
        <div class="nav">
            <a href="main.php">Home</a>
            <a href="browse.php">Browse</a>
            <a href="forum/forums.html">Forum</a>
            <a href="friends.php">Friends</a>
            <a href="login.php">Login</a>
        </div>

        <div class="main">

            <div>
                <h2>Log in</h2>
            </div>
            <div class="register">
                <form action="" method="post">
                    <label class="label-style">Username:</label> <input type="text" name="username" class="input-style"><br>
                    <label class="label-style">Password:</label> <input type="password" name="password" class="input-style"><br>
                    <input type="submit" value="Log in">
                </form>
                <?php
                $username = ""; // Initiera $username för att undvika "undefined variable"-varningar
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Hämta användarnamn och lösenord från POST-arrayen
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    // Kod för att spara användaren till databasen här!
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                    // Skriv ut ett meddelande till användaren
                    echo "<h2>Du är inloggad som:  " . htmlspecialchars($username) . "!</h2>";
                }
                ?>
            </div>
            <div>
                <h2><br>Or<br></h2>
            </div>

            <div>
                <h2>Register new user</h2>
            </div>
            <div class="register">
                <form action="" method="post">
                    <label class="label-style">Username:</label> <input type="text" name="username" class="input-style"><br>
                    <label class="label-style">Password:</label> <input type="password" name="password" class="input-style"><br>
                    <label class="label-style">Email:</label> <input type="password" name="password" class="input-style"><br>
                    <input type="submit" value="Register">
                </form>
                <?php
                $username = ""; // Initiera $username för att undvika "undefined variable"-varningar
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // Hämta användarnamn och lösenord från POST-arrayen
                    $username = $_POST['username'];
                    $password = $_POST['password'];

                    // Kod för att spara användaren till databasen här!
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                    // Skriv ut ett meddelande till användaren
                    echo "<h2>Thank you for register, " . htmlspecialchars($username) . "!</h2>";
                }
                ?>
            </div>
        </div>

    </div>




    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>
<?php

// innehåller både logga in och registrera

?>