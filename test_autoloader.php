<?php
require 'src/config.php';

$db = new Database();

echo 'här kommer dump';
$test = new UserDAO($db->getPdo());

?>