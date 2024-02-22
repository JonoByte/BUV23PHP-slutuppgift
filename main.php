<!doctype html>
<html lang="en">

<head>
    <title>Gamescore</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="stylesheet" href="CSS/main.css">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <?php


    // require __DIR__ . '/src/config/pdo.php';

    // require_once('src/model/database/entity/news.php');

    // require_once('src/model/database/dao/NewsDAO.php');


    // Instantiate the NewsDAO object
    $newsDAO = new NewsDAO($pdo);

    // Get all the articles
    $newsLists = $newsDAO->getAllNews();
    ?>


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
            <a href="forum.php">Forum</a>
            <a href="friends.php">Friends</a>
            <a href="login.php">Login</a>
        </div>

        <div id="main">
            <div class="main-header">

                <!-----Carousel function------>

                <div id="carouselExampleDark" class="carousel carousel-light slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" data-bs-interval="5000">
                            <img src="img/wow.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h1>We have the latest news in the gaming world</h1>
                                <h2>search your favourite game and learn all from tips and tricks to lore</h2>
                                <h3>make friends and join the community</h3>

                            </div>
                        </div>
                        <div class="carousel-item" data-bs-interval="2000">
                            <img src="img/overwatch.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h1>We have the latest news in the gaming world</h1>
                                <h2>search your favourite game and learn all from tips and tricks to lore</h2>
                                <h3>make friends and join the community</h3>

                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="img/pubg.jpg" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h1>We have the latest news in the gaming world</h1>
                                <h2>search your favourite game and learn all from tips and tricks to lore</h2>
                                <h3>make friends and join the community</h3>

                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <!-----Carousel function END------>

            </div>

            <div class="background-image">

                <div class="container">
                    <h1>Latest News</h1>
                    <div class="row justify-content-md-center">
                        <!-- <div class="col"> -->
                        <!-- START: Posts Grid -->
                        <div class="row col-lg-10">
                            <?php foreach ($newsLists as $newsList) : ?>
                                <div class="mb-2 custom-card">
                                    <img class="card-img-top" src="<?php echo $newsList->getImage() ? 'data:image/jpeg;base64,' . base64_encode($newsList->getImage()) : 'placeholder.jpg'; ?>" alt="<?php echo $newsList->getTitle(); ?>">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $newsList->getTitle(); ?></h5>
                                        <p class="card-text"><?php echo $newsList->getContent(); ?></p>
                                        <p class="card-text-Source"><?php echo $newsList->getSource(); ?></p> <!-- Display Source -->
                                        <p class="card-text-Address"><?php echo $newsList->getAddress(); ?></p> <!-- Display Address -->
                                        <a href="<?php echo $newsList->getUrl(); ?>" class="btn btn-primary">Read More</a>
                                    </div>
                                </div>
                            <?php endforeach; ?>

                        </div>

                        <!-- </div> -->
                        <!-- END: Posts Grid -->

                        <div class="col-lg-2">

                            <h1>Latest reviews</h1>
                            <!-- START: Fristående Kort -->
                            <div class="mb-2 custom-card1">
                                <div class="border-0">
                                    <img class="card-img-top" src="img/product-1-sm.jpg" alt="image cap">
                                    <div class="card-body2">
                                        <h5 class="card-title2">title</h5>
                                        <p class="card-text2">Some quick example text to build on the title and make up the bulk of the card's content.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2 custom-card2">
                                <div class="card-transparent">
                                    <img class="card-img-top" src="img/product-9-sm.jpg" alt="image cap">
                                    <div class="card-body2">
                                        <h5 class="card-title2">title</h5>
                                        <p class="card-text2">Some quick example text to build on the title and make up the bulk of the card's content.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-2 custom-card3">
                                <div class="review3">
                                    <img class="card-img-top" src="img/product-6-sm.jpg" alt="image cap">
                                    <div class="card-body2">
                                        <h5 class="card-title2">title</h5>
                                        <p class="card-text2">Some quick example text to build on the title and make up the bulk of the card's content.</p>
                                        <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                </div>
                            </div>

                            <!-- END: Fristående Kort -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>