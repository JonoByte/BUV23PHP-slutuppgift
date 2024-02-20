<!DOCTYPE html>


<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Gamescore| newsList</title>

    <meta name="description" content="GoodGames - Bootstrap template for communities and games store">
    <meta name="keywords" content="game, gaming, template, HTML template, responsive, Bootstrap, premium">
    <meta name="author" content="_nK">

    <link rel="icon" type="image/png" href="images/favicon.png">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- START: Styles -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7cOpen+Sans:400,700" rel="stylesheet" type="text/css">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <!-- FontAwesome -->
    <script defer src="vendor/fontawesome-free/js/all.js"></script>
    <script defer src="vendor/fontawesome-free/js/v4-shims.js"></script>

    <!-- IonIcons -->
    <link rel="stylesheet" href="ionicons.min.css">

    <!-- Flickity -->
    <link rel="stylesheet" href="flickity.mini.css">

    <!-- Photoswipe -->
    <link rel="stylesheet" type="text/css" href="photoswipe.css">
    <link rel="stylesheet" type="text/css" href="default-skin.css">

    <!-- Seiyria Bootstrap Slider -->
    <link rel="stylesheet" href="vendor/bootstrap-slider/dist/css/bootstrap-slider.min.css">

    <!-- Summernote -->
    <link rel="stylesheet" type="text/css" href="vendor/summernote/dist/summernote-bs4.css">

    <!-- GoodGames -->
    <link rel="stylesheet" href="newsList.css">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="newsList.css">

    <!-- END: Styles -->

    <!-- jQuery -->
    <script src="jquery.mini.js"></script>

    <?php


    require __DIR__ . '/src/config/pdo.php';

    require_once('src/model/database/entity/news.php');

    // Include the NewsDAO class file
    require_once('src/model/database/dao/NewsDAO.php');


    // Instantiate the NewsDAO object
    $newsDAO = new NewsDAO($pdo);

    // Get all the articles
    $newsLists = $newsDAO->getAllNews();
    ?>





</head>


<body>

    <div class="container-xxl">

        <header class="nk-header nk-header-opaque">

            <div class=header-text>
                <h1>Gamescore</h1>
                <h2>Play, Review, Connect Your Gaming Community Awaits!</h2>
            </div>

        </header>

        <nav class="nk-navbar nk-navbar-top nk-navbar-sticky nk-navbar-autohide">

            <div class="nav">
                <a href="main.php">Home</a>
                <a href="browse.php">Browse</a>
                <a href="forum/forums.html">Forum</a>
                <a href="friends.php">Friends</a>
                <a href="login.php">Login</a>
            </div>

            <ul class="nk-nav nk-nav-right d-none d-lg-table-cell" data-nav-mobile="#nk-nav-mobile">


    </div>


    <div class="nk-main">

        <!-- START: Breadcrumbs -->
        <div class="nk-gap-1"></div>
        <div class="container">
            <ul class="nk-breadcrumbs">
                <li><span class="fa fa-angle-right"></span></li>
                <li><span>news</span></li>
            </ul>
        </div>
        <div class="nk-gap-1"></div>
        <!-- END: Breadcrumbs -->

        <div class="container">
            <div class="row vertical-gap">
                <div class="col-lg-8">

                    <!-- START: Posts Grid -->
                    <div class="nk-blog-grid">
                        <div class="row">

                            <div class="col-md-6">
                            <?php foreach ($newsLists as $newsList) : ?>
                                    <div class="nk-blog-post">
                                        
                                        <a href="<?php echo $newsList->getUrl() ?>" class="nk-post-img">
                                            <?php
                                            // Check if image data exists
                                            if ($newsList->getImage()) {
                                                // Convert binary data to base64-encoded string
                                                $imageData = base64_encode($newsList->getImage());
                                                // Output HTML with embedded image data
                                                echo '<img src="data:image/jpeg;base64,' . $imageData . '" alt="' . $newsList->getTitle() . '">';
                                            } else {
                                                // If no image data is found, use a placeholder image or leave it empty
                                                echo '<img src="placeholder.jpg" alt="' . $newsList->getTitle() . '">';
                                            }
                                            ?>
                                            <span class="nk-post-comments-count">0</span>
                                            <span class="nk-post-categories">
                                                <span class="bg-main-1"><?php echo $newsList->getSource() ?></span>
                                            </span>
                                        </a>
                                        <div class="nk-gap"></div>
                                        <h2 class="nk-post-title h4"><a href="<?php echo $newsList->getUrl() ?>"><?php echo $newsList->getTitle() ?></a></h2>
                                        <div class="nk-post-text">
                                            <p><?php echo $newsList->getContent() ?></p>
                                        </div>
                                        <div class="nk-gap"></div>
                                        <a href="<?php echo $newsList->getUrl() ?>" class="nk-btn nk-btn-rounded nk-btn-color-dark-3 nk-btn-hover-color-main-1">Read More</a>
                                        <div class="nk-post-date float-right"><span class="fa fa-calendar"></span> <?php echo date('M d, Y', strtotime($newsList->getPublishDate())) ?></div>
                                    </div>
                                <?php endforeach; ?>
                            </div>

                        </div>
                        <!-- END: Post 9-->
                        <!-- START: Pagination -->
                        <div class="nk-pagination nk-pagination-center">
                            <a href="#" class="nk-pagination-prev">
                                <span class="ion-ios-arrow-back"></span>
                            </a>
                            <nav>
                                <h3></h3>
                                <a class="nk-pagination-current" href="#">GO TO THE TOP</a>

                            </nav>
                            <a href="#" class="nk-pagination-next">
                                <span class="ion-ios-arrow-forward"></span>
                            </a>
                        </div>
                        <!-- END: Pagination -->
                    </div>
                </div>
                <!-- END: Posts Grid -->
                <!--TOP 3 Recent START--->
                <div class="col-lg-4">
                    <div class="nk-widget nk-widget-highlighted">
                        <h4 class="nk-widget-title"><span><span class="text-main-1">Top 3</span> Recent</span>
                        </h4>
                        <div class="nk-widget-content">

                            <div class="nk-widget-post">
                                <a href="blog-newsList.html" class="nk-post-image">
                                    <img src="images/post-1-sm.jpg" alt="">
                                </a>
                                <h3 class="nk-post-title"><a href="blog-newsList.html">Smell magic in the air. Or
                                        maybe barbecue</a></h3>
                                <div class="nk-post-date"><span class="fa fa-calendar"></span> Sep 18, 2018
                                </div>
                            </div>

                            <div class="nk-widget-post">
                                <a href="blog-newsList.html" class="nk-post-image">
                                    <img src="images/post-2-sm.jpg" alt="">
                                </a>
                                <h3 class="nk-post-title"><a href="blog-newsList.html">Grab your sword and fight
                                        the Horde</a></h3>
                                <div class="nk-post-date"><span class="fa fa-calendar"></span> Sep 5, 2018</div>
                            </div>

                            <div class="nk-widget-post">
                                <a href="blog-newsList.html" class="nk-post-image">
                                    <img src="images/post-3-sm.jpg" alt="">
                                </a>
                                <h3 class="nk-post-title"><a href="blog-newsList.html">We found a witch! May we
                                        burn her?</a></h3>
                                <div class="nk-post-date"><span class="fa fa-calendar"></span> Aug 27, 2018
                                </div>
                            </div>

                        </div>

                    </div>
                    <!--TOP 3 Recent END--->
                    <!--LATEST SCREENSHOT START-->
                    <div class="nk-widget nk-widget-highlighted">
                        <h4 class="nk-widget-title"><span><span class="text-main-1">Latest</span>
                                Screenshots</span></h4>
                        <div class="nk-widget-content">
                            <div class="nk-popup-gallery">
                                <div class="row sm-gap vertical-gap">
                                    <div class="col-sm-6">
                                        <div class="nk-gallery-item-box">
                                            <a href="images/gallery-1.jpg" class="nk-gallery-item" data-size="1016x572">
                                                <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
                                                <img src="images/gallery-1-thumb.jpg" alt="">
                                            </a>
                                            <div class="nk-gallery-item-description">
                                                <h4>Called Let</h4>
                                                Divided thing, land it evening earth winged whose great after.
                                                Were grass night. To Air itself saw bring fly fowl. Fly years
                                                behold spirit day greater of wherein winged and form. Seed open
                                                don't thing midst created dry every greater divided of, be man
                                                is. Second Bring stars fourth gathering he hath face morning
                                                fill. Living so second darkness. Moveth were male. May creepeth.
                                                Be tree fourth.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="nk-gallery-item-box">
                                            <a href="images/gallery-2.jpg" class="nk-gallery-item" data-size="1188x594">
                                                <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
                                                <img src="images/gallery-2-thumb.jpg" alt="">
                                            </a>
                                            <div class="nk-gallery-item-description">
                                                Seed open don't thing midst created dry every greater divided
                                                of, be man is. Second Bring stars fourth gathering he hath face
                                                morning fill. Living so second darkness. Moveth were male. May
                                                creepeth. Be tree fourth.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="nk-gallery-item-box">
                                            <a href="images/gallery-4.jpg" class="nk-gallery-item" data-size="625x350">
                                                <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
                                                <img src="images/gallery-3-thumb.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="nk-gallery-item-box">
                                            <a href="images/gallery-4.jpg" class="nk-gallery-item" data-size="873x567">
                                                <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
                                                <img src="images/gallery-4-thumb.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="nk-gallery-item-box">
                                            <a href="images/gallery-5.jpg" class="nk-gallery-item" data-size="471x269">
                                                <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
                                                <img src="images/gallery-5-thumb.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="nk-gallery-item-box">
                                            <a href="images/gallery-6.jpg" class="nk-gallery-item" data-size="472x438">
                                                <div class="nk-gallery-item-overlay"><span class="ion-eye"></span></div>
                                                <img src="images/gallery-6-thumb.jpg" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--LATEST SCREENSHOT END-->
                    <div class="nk-widget nk-widget-highlighted">
                        <h4 class="nk-widget-title"><span><span class="text-main-1">Most</span> Popular Reviews</span>
                        </h4>
                        <div class="nk-widget-content">

                            <div class="nk-widget-post">
                                <a href="store-product.html" class="nk-post-image">
                                    <img src="images/product-1-xs.jpg" alt="So saying he unbuckled">
                                </a>
                                <h3 class="nk-post-title"><a href="store-product.html">So saying he
                                        unbuckled</a></h3>
                                <div class="nk-product-rating" data-rating="4"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="far fa-star"></i></div>
                                <div class="nk-product-price">USER REVIEW</div>
                            </div>

                            <div class="nk-widget-post">
                                <a href="store-product.html" class="nk-post-image">
                                    <img src="images/product-2-xs.jpg" alt="However, I have reason">
                                </a>
                                <h3 class="nk-post-title"><a href="store-product.html">However, I have
                                        reason</a></h3>
                                <div class="nk-product-rating" data-rating="2.5"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fas fa-star-half"></i> <i class="far fa-star"></i> <i class="far fa-star"></i></div>
                                <div class="nk-product-price">USER REVIEW</div>
                            </div>

                            <div class="nk-widget-post">
                                <a href="store-product.html" class="nk-post-image">
                                    <img src="images/product-3-xs.jpg" alt="It was some time before">
                                </a>
                                <h3 class="nk-post-title"><a href="store-product.html">It was some time
                                        before</a></h3>
                                <div class="nk-product-rating" data-rating="5"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                <div class="nk-product-price">USER REVIEW</div>
                            </div>

                        </div>
                    </div>

                    </aside>
                    <!-- END: Sidebar -->
                </div>
            </div>
        </div>

        <div class="nk-gap-2"></div>



        <!-- START: Footer -->
        <footer class="nk-footer">

            <div class="container">



            </div>
        </footer>
        <!-- END: Footer -->


    </div>




    <!-- START: Page Background -->

    <!-- <img class="nk-page-background-top" src="img/community-bg-trans.png" alt="">
    <img class="nk-page-background-bottom" src="img/review-bg.png" alt=""> -->

    <!-- END: Page Background -->





    <!-- START: Scripts -->

    <!-- Object Fit Polyfill -->
    <script src="vendor/object-fit-images/dist/ofi.min.js"></script>

    <!-- GSAP -->
    <script src="vendor/gsap/src/minified/TweenMax.min.js"></script>
    <script src="vendor/gsap/src/minified/plugins/ScrollToPlugin.min.js"></script>

    <!-- Popper -->
    <script src="vendor/popper.js/dist/umd/popper.min.js"></script>

    <!-- Bootstrap -->
    <script src="vendor/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Sticky Kit -->
    <script src="vendor/sticky-kit/dist/sticky-kit.min.js"></script>

    <!-- Jarallax -->
    <script src="vendor/jarallax/dist/jarallax.min.js"></script>
    <script src="vendor/jarallax/dist/jarallax-video.min.js"></script>

    <!-- imagesLoaded -->
    <script src="vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>

    <!-- Flickity -->
    <script src="vendor/flickity/dist/flickity.pkgd.min.js"></script>

    <!-- Photoswipe -->
    <script src="vendor/photoswipe/dist/photoswipe.min.js"></script>
    <script src="vendor/photoswipe/dist/photoswipe-ui-default.min.js"></script>

    <!-- Jquery Validation -->
    <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>

    <!-- Jquery Countdown + Moment -->
    <script src="vendor/jquery-countdown/dist/jquery.countdown.min.js"></script>
    <script src="vendor/moment/min/moment.min.js"></script>
    <script src="vendor/moment-timezone/builds/moment-timezone-with-data.min.js"></script>

    <!-- Hammer.js -->
    <script src="vendor/hammerjs/hammer.min.js"></script>

    <!-- NanoSroller -->
    <script src="vendor/nanoscroller/bin/javascripts/jquery.nanoscroller.js"></script>

    <!-- SoundManager2 -->
    <script src="vendor/soundmanager2/script/soundmanager2-nodebug-jsmin.js"></script>

    <!-- Seiyria Bootstrap Slider -->
    <script src="vendor/bootstrap-slider/dist/bootstrap-slider.min.js"></script>

    <!-- Summernote -->
    <script src="vendor/summernote/dist/summernote-bs4.min.js"></script>

    <!-- nK Share -->
    <script src="plugins/nk-share/nk-share.js"></script>

    <!-- GoodGames -->
    <script src="js/goodgames.min.js"></script>
    <script src="js/goodgames-init.js"></script>
    <!-- END: Scripts -->


    </div>
</body>

</html>