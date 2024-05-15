<?php
// Запускаем сессию
session_start();

// Подключение к базе данных
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'DATA_BASE_WALLPAPER';

$dsn = "mysql:host=$host;dbname=$db;";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int) $e->getCode());
}

// Вход пользователя
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = $_POST['login'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare('SELECT * FROM user WHERE login = :login');
    $stmt->execute([':login' => $username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        // Сохраняем логин в сессии
        $_SESSION['login'] = $username;
        // Сохраняем id пользователя в сессии
        $_SESSION['id'] = $user['id'];

        // Перенаправление пользователя с id равным 1 на profile\index.php
        if ($_SESSION['id'] == 1) {
            header('Location: ../profile/index.php');
            exit;
        } else {
            header('Location: ../index.php');
            exit;
        }
    } else {
        echo 'Не верные учетные данные';
    }
}
?>
