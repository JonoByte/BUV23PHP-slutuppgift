<!doctype html>
<html lang="en">
<?php
$apiKey = "43e773150eda4c50b462a6d47a38e5d9";
$url = "https://api.rawg.io/api/games?key=" . $apiKey;
$jsonFilePath = 'games.json';

if (!file_exists($jsonFilePath)) {
    $json = file_get_contents($url);
    file_put_contents($jsonFilePath, $json); // save the json file
}
?>

<head>
    <title>Gamescore</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="stylesheet" href="CSS/browse.css">

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
                <h3>Browse</h3>
            </div>
        </header>
        <div class="nav">
            <a href="main.php">Home</a>
            <a href="browse.php">Browse</a>
            <a href="forum/forums.html">Forum</a>
            <a href="friends.php">Friends</a>
            <a href="login.php">Login</a>
        </div>

        <div id="main">
            <div class="container">
                <div class="row justify-content-center">
                    <?php
                    $games = json_decode(file_get_contents('games.json'), true)['results'];
                    foreach ($games as $game) {
                        echo '<div class="col-lg-3 col-md-3 col-sm-6">';
                        echo '<div class="card mb-4">';
                        $image = isset($game['background_image']) ? $game['background_image'] : 'placeholder.jpg';
                        echo '<img class="card-img-top" src="' . $image . '" alt="Card image">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">' . htmlspecialchars($game['name']) . '</h5>';
                        $description = isset($game['short_description']) ? $game['short_description'] : 'No description available.';
                        echo '<p class="card-text">' . htmlspecialchars($description) . '</p>';
                        echo '<a href="game_details.php?id=' . $game['id'] . '" class="btn btn-primary">Learn More</a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
        </div>

    </div>











    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"></script>
</body>

</html>