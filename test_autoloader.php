<?php
require 'src/config.php';

$db = new Database();

$test = new UserDAO($db->getPdo());
$test3 = new User($db->getPdo());
$test2 = new NewsDAO($db->getPdo());

?>