<?php
require 'src/config.php';


$db = new Database();
$friendsDAO = new FriendsDAO($db->getPdo());
$friends = $friendsDAO->getFriendsByUserId($username);
?>

<!doctype html>
<html lang="en">

<head>
    <title>Gamescore</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="icon" type="webp" href="Logo.webp">
    <link rel="stylesheet" href="CSS/friends.css">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#sendFriendRequest").click(function() {
                var friendUsername = $("#recipient-name").val();
                var message = $("#message-text").val();

                // Make an AJAX request to the server
                $.ajax({
                    url: 'src/controller/processRequestController.php',
                    type: 'POST',
                    data: {
                        friendUsername: friendUsername
                    },
                    success: function(response) {
                        console.log(response);
                        $('#exampleModal').modal('hide');
                        refreshFriendsList();
                    },
                    error: function(error) {
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
                <h3>Profile</h3>
            </div>
        </header>
        <div class="nav">
            <a href="main.php">Home</a>
            <a href="browse.php">Browse</a>
            <a href="posterwall.php">Community</a>
            <?php
            echo isset($username) ? "<a href='friends.php' class='nav-link-active'>$username</a>" : "";
            echo isset($username) ? "<a href='src/controller/logoutController.php'>Logout</a>" : "<a href='login.php'>Login</a>";
            ?>
        </div>

        <div class="main">
            <div class="container">
                <img class="profile" src="img/profile.jpg" alt="profile picture">
                <h1><?php echo $username ?></h1>
            </div>

            <button type="button" class="buttons" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Add Friend</button>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Friend</h1>
                            <button type="button" class="buttons" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Friends Username:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="buttons" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="buttons" id="sendFriendRequest">Send</button>
                        </div>
                    </div>
                </div>
            </div>

            <a href="friendsrequests.php"><button type="button" class="buttons">Friends Requests</button></a>
        </div>

        <div id="friend">
            <div class="container">
                <div class="row justify-content-center">
                    <?php foreach ($friends as $friend) : ?>
                        <div class="col-lg-3 col-md-3 col-sm-6">
                            <div class="card mb-4">
                                <img src="img/profile.jpg" alt="Profile Picture">
                                <div class="card-body">
                                    <p><?php echo $friend['id']; ?></p>
                                    <button class="buttons">Send message</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="adminkey">
            <a href="src/controller/deleteUserController.php">Delete this account!</a>
        </div>
        <div class="adminkey">
            <form action="src/controller/adminController.php">
                <input type="password" name="password" placeholder="Admin-key" class="form-control search-input"><br>
                <input type="submit" value="Uppgrade to Admin">
            </form>
        </div>

    </div>











    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>