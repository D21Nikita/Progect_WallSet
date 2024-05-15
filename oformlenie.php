<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Обращение принято</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
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
            padding: 50px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            color: #27ae60;
            margin-bottom: 20px;
        }
        .message {
            color: #333;
            margin-bottom: 20px;
        }
        .footer {
            color: #999;
            margin-bottom: 20px;
        }
        .home-button {
            display: inline-block;
            padding: 10px 20px;
            text-decoration: none;
            color: white;
            background-color: #27ae60;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .home-button:hover {
            background-color: #2ecc71;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="header">Спасибо за ваше обращение!</h1>
        <p class="message">Мы получили ваш запрос и скоро свяжемся с вами.</p>
        <p class="footer">Если у вас есть срочные вопросы, пожалуйста, свяжитесь с нами по телефону.</p>
        <a href="index.php" class="home-button">Перейти на главную страницу</a>
    </div>
</body>
</html>
