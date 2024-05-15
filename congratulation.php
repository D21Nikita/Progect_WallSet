<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Регистрация завершена</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            text-align: center;
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
        .header {
            color: #27ae60;
            margin-bottom: 30px;
        }
        .message {
            color: #333;
            margin-bottom: 30px;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            color: white;
            background-color: #27ae60;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #2ecc71;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="header">Добро пожаловать!</h1>
        <p class="message">Ваша регистрация прошла успешно. Мы рады видеть вас в числе наших пользователей.</p>
        <p class="message">Теперь вы можете войти в нашу систему.</p>
        <a href="index.php" class="button">Перейти на главную</a>
    </div>
</body>
</html>
