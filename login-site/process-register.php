<!doctype html>
<html lang="en">

<head>
    <title>Gamescore</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="stylesheet" href="../CSS/login.css">

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
            <a href="../main.php">Home</a>
            <a href="../browse.php">Browse</a>
            <a href="../forum/forums.html">Forum</a>
            <a href="../friends.php">Friends</a>
            <a href="login.php">Login</a>
        </div>

        <div class="main">

            <div>
                <h2> </h2>
            </div>
            <div>
                <?php

                // validering för registreringen
                if (empty($_POST["name"])) {
                    die("Username is required");
                }

                if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                    die("Valid email is required");
                }

                if (strlen($_POST["password"]) < 8) {
                    die("Password must be at least 8 characters");
                }

                if (!preg_match("/[a-z]/i", $_POST["password"])) {
                    die("Password must contain at least one letter");
                }

                if (!preg_match("/[0-9]/", $_POST["password"])) {
                    die("Password must contain at least one letter");
                }

                if ($_POST["password"] !== $_POST["password_confirmation"]) {
                    die("Passwords must match");
                }

                $password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
                print_r($_POST);
                var_dump($password_hash);

                // if (!empty($_POST)) {
                //     echo "<h2>Data:</h2>";
                //     echo "<h2>" . "\n" . htmlspecialchars($value) . "</h2>";
                //     foreach ($_POST as $key => $value) {
                //         echo "<h2>" . " " . htmlspecialchars($value) . "</h2>";
                //     }
                // }



                ?>
            </div>
        </div>

    </div>




    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>