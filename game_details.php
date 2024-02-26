<!doctype html>
<html lang="en">

<head>
    <title>Gamescore</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="stylesheet" href="CSS/game_details.css">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>

    <div class="container-xxl">
        <header>
            <!-- <img src="img/header-pic.jpg" alt="lololol"> -->
            <div class=header-text>
                <h1>Gamescore</h1>
                <h2>Play, Review, Connect Your Gaming Community Awaits!</h2>
                <h3>Game details</h3>
            </div>
        </header>
        <div class="nav">
        <?php
            echo '<a href="main.php">Home</a>';
            echo '<a href="browse.php">Browse</a>';
            echo isset($username) ? "<a href='friends.php'>$username</a>" : "";
            echo isset($username) ? "<a href='src/controller/logoutController.php'>Logout</a>" : "<a href='login.php'>Login</a>";
            ?>
        </div>
        <div class="container">
            <?php
            $gameId = $_GET['id'];
            $games = json_decode(file_get_contents('filtered_games.json'), true);

            $game = array_values(array_filter($games, function ($g) use ($gameId) {
                return $g['id'] == $gameId;
            }))[0];
            ?>
            <h1 class="game-name">
                <?php echo htmlspecialchars($game['name']); ?>
            </h1>
            <img class="game-image" src="<?php echo htmlspecialchars($game['image_background']); ?>" alt="Game image">
            <p class="game-release-date">Release date:
                <?php echo $game['release_date']; ?>
            </p>
            <p class="game-rating">Rating:
                <?php echo $game['rating']; ?>
            </p>
            <p class="game-metacritic">Metacritic:
                <?php echo $game['metacritic']; ?>
            </p>
        </div>
</body>

</html>