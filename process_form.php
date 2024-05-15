<?php
session_start();
// Подключение к базе данных MySQL
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'DATA_BASE_WALLPAPER';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
die("Ошибка подключения: " . $conn->connect_error);
}

// Получение данных из формы
$name = $_POST['name'];
$message = $_POST['message'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// Вставка данных в базу данных
$sql = "INSERT INTO message (name, telephone, email, content ) VALUES ('$name', '$phone', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    header('Location: ../oformlenie.php');
    exit;
} else {
echo "Ошибка: " . $sql . "
" . $conn->error;
}

$conn->close();
?>