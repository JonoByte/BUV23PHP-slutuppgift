<div>
    <h2 class="login">Register new user</h2>
</div>
<div class="register">
    <form action="" method="post">
        <label class="label-style">Username:</label> <input type="text" name="username" class="input-style"><br>
        <label class="label-style">Password:</label> <input type="password" name="password" class="input-style"><br>
        <label class="label-style">Email:</label> <input type="password" name="password" class="input-style"><br>
        <input type="submit" value="Register">
    </form>
    <?php
    $username = ""; // Initiera $username för att undvika "undefined variable"-varningar
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Hämta användarnamn och lösenord från POST-arrayen
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Kod för att spara användaren till databasen här!
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Skriv ut ett meddelande till användaren
        echo "<h2>Thank you for register, " . htmlspecialchars($username) . "!</h2>";
    }
    ?>
</div>