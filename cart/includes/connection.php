<?php
$host = "localhost";
$username = "root";
$password = "";
$db = "DATA_BASE_WALLPAPER";

$connection = mysqli_connect($host, $username, $password);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_select_db($connection, $db) or die("К сожалению, не удается выбрать базу данных.");
?>
