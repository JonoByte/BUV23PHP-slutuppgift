<?php require 'src/config.php' ?>
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
            <div class=header-text>
                <h1>Gamescore</h1>
                <h2>Play, Review, Connect Your Gaming Community Awaits!</h2>
                <h3>Log in</h3>
            </div>
        </header>
        <div class="nav">
        <?php
        echo '<a href="main.php">Home</a>';
        echo '<a href="browse.php">Browse</a>';
        echo isset($username) ? "<a href='friends.php'>Friends</a>" : "";
        echo isset($username) ? "<a href='logout.php'>Logout</a>" : "<a href='login.php'>Login</a>";

        // if (isset($_SESSION['username'])) {
        //     echo '<a href="main.php">Home</a>';
        //     echo '<a href="browse.php">Browse</a>';
        //     echo '<a href="friends.php">Friends</a>';
        //     echo '<a href="src/controller/logoutController.php">Log out</a>';
        // }

        // else {
        //     echo '<a href="main.php">Home</a>';
        //     echo '<a href="browse.php">Browse</a>';
        //     echo '<a href="login.php">Login</a>';
        // }
        ?>
        </div>

        <div class="main">

            <div>
                <?php

                if (isset($_SESSION['username'])) {
                    $userId = $_SESSION['username'];
                    echo '<h2 class="login">Du är inloggad som:</h2>';
                    echo '<h2 class="login">' . $userId . '</h2><br>';
                    // HTML-koden för logga ut-knappen
                    echo '<form action="src/controller/logoutController.php" method="post">
              <input type="submit" name="logout" value="Log out">
          </form>';
                }
                ?>

            </div>
            <div>
                <form action="src/controller/loginController.php" method="post">
                    <label class="label-style">Username:</label> <input type="text" name="username" class="input-style"><br>
                    <label class="label-style">Password:</label> <input type="password" name="password" class="input-style"><br>
                    <input type="submit" value="Log in">
                </form>

                <!-- kolla upp ajax för att stanna kvar på sidan -->

            </div>

            <div>
                <a href="register.php" class="reglink">New to Gamescore? Register here!</a>
            </div>
        </div>

    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>