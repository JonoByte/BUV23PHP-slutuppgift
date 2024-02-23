<?php
session_start();
session_destroy(); // Förstör sessionen
header('Location: ../../login.php'); // Omdirigera till inloggningssidan
exit;
?>