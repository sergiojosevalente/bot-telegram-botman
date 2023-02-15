<?php

$host = "localhost";
$user = "root";
$pass = "";
$db   = "get_attached";
// $db   = "bot";
// $db   = "server_ubuntu";
// $db   = "telegram_bot";

$mysqli = new mysqli($host, $user, $pass, $db);

if (mysqli_connect_errno()) {
    error_log("Error: Could not connect to database.");
    exit;
}
