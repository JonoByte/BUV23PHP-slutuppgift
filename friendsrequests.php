<?php
require 'src/config.php';
$userId = $_SESSION['username'];

$db = new Database();
$friendsReqDAO = new FriendsReqDAO($db->getPdo());
$friendRequests = $friendsReqDAO->getFriendRequests($userId);
?>

<!doctype html>
<html lang="en">

<head>
    <title>Gamescore</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="stylesheet" href="CSS/friends.css">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            // Handle the click event on "Accept Friend" button
            $(".accept-friend").click(function() {
                var userId = $(this).data("user-id");

                // Make an AJAX request to update the status to 'accepted'
                $.ajax({
                    url: 'accept_friend_request.php', // Update with the correct path
                    type: 'POST',
                    data: {
                        userId: userId
                    },
                    success: function(response) {
                        // Handle the response from the server (e.g., show a success message)
                        console.log(response);
                        // Optionally, remove the card or update the UI after successful acceptance
                    },
                    error: function(error) {
                        // Handle errors (e.g., show an error message)
                        console.error(error);
                    }
                });
            });
        });
    </script>
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


        <div id="friend">
            <div class="container">
                <div class="row justify-content-center">
                    <?php foreach ($friendRequests as $friend) : ?>
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <p>User ID: <?php echo $friend['user_id_a']; ?></p>
                                    <!-- Add a data attribute to store the friend request user ID -->
                                    <a href="#" class="btn btn-primary accept-friend" data-user-id="<?php echo $friend['user_id_b']; ?>">Accept Friend</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>


    </div>











    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>