<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wallpost Section</title>
    <link rel="stylesheet" href="CSS/posterwall.css">
    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>

    <div class="container-xxl">

        <header>
            <!-- <img src="img/header-pic.jpg" alt="lololol"> -->
            <div class="header-text">
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

        <div class="wallpost-section">
            <h2>Wallpost Section</h2>
            <div class="form-group">
                <h3>Create a Post</h3>
                <form id="postForm">
                    <textarea name="post-content" id="post-content" placeholder="Write your post here..."></textarea>
                    <input type="text" name="review-link" id="review-link" placeholder="Review Link (optional)">
                    <button type="submit">Post</button>
                </form>
            </div>
            <div class="posts" id="postsContainer">
                <!-- Posts will be dynamically added here -->
            </div>
        </div>

        <!-- Popup container -->
        <div id="commentPopup" class="comment-popup" style="display:none">
            <div class="comment-popup-content">
                <span class="close" onclick="toggleCommentPopup()">&times;</span>
                <form id="commentForm">
                    <textarea name="comment" placeholder="Write your comment here..."></textarea>
                    <button type="button" onclick="submitComment()">Submit Comment</button>
                </form>
            </div>
        </div>

        <script src="posterwall.js"></script>
    </div>
</body>

</html>
