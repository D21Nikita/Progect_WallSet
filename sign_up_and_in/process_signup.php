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

// Регистрация пользователя
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $login = $_POST['login'];
    $password = $_POST['password'];

    // Проверка, существует ли уже пользователь с таким логином
    $stmt = $pdo->prepare('SELECT * FROM user WHERE login = :login');
    $stmt->execute([':login' => $login]);
    $user = $stmt->fetch();

    if ($user) {
        echo 'Пользователь с таким логином уже существует';
    } else {
        // Хеширование пароля
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Вставка данных в базу
        $stmt = $pdo->prepare('INSERT INTO user (fullname, email, login, password) VALUES (:fullname, :email, :login, :password)');
        $stmt->execute([
            ':fullname' => $fullname,
            ':email' => $email,
            ':login' => $login,
            ':password' => $hashed_password
        ]);

        if ($stmt->rowCount()) {
            header('Location: ../congratulation.php');
            exit;
        } else {
            echo "Произошла ошибка при регистрации";
        }
    }
}
?>