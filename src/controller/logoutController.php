<?php
session_start();
session_destroy(); // Förstör sessionen
header('Location: ../../main.php'); // Omdirigera till inloggningssidan
exit;
?>