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
                <h3>Register</h3>
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
                <h2 class="login">Register new user</h2>
            </div>
            <div>
                <form action="process-register.php" method="post" id="signup" novalidate>
                    <div>
                        <label class="label-style" for="name">Username: </label>
                        <input type="text" id="name" name="name">
                    </div>

                    <div>
                        <label class="label-style" for="email">Email: </label>
                        <input type="email" id="email" name="email">
                    </div>

                    <div>
                        <label class="label-style" for="password">Password: </label>
                        <input type="password" id="password" name="password">
                    </div>

                    <div>
                        <label class="label-style" for="password_confirmation">Repeat password: </label>
                        <input type="password" id="password_confirmation" name="password_confirmation">
                    </div>

                    <input type="submit" value="Register">
                </form>
            </div>
        </div>

    </div>




    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>