<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <h1>Välkommen, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
    <p>Du är nu inloggad.</p>
    <p>OBS!!!! denna sida är inte klar, eventuellt ska inte visas alls xD</p>
    <a href="main.php">gå tillbaka till huvudsidan</a><br>
    <a href="logout.php">Logga ut</a>
</body>
</html>