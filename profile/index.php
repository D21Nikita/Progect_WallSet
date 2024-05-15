<?php

include "../inc/header.php";

?>
<?php
// Подключение к базе данных
$db = new PDO('mysql:host=localhost;dbname=DATA_BASE_WALLPAPER;charset=utf8', 'root', '');

// Получение данных администратора
$stmt = $db->query("SELECT * FROM user WHERE id = 1");
$adminData = $stmt->fetch(PDO::FETCH_ASSOC);

// Получение обращений пользователей
$userIssues = $db->query("SELECT * FROM message")->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Личный кабинет администратора</title>
    <style>
            .logo {
                height: 130px;
                width: 130px;
            }

            .navbar {
                display: flex;
                justify-content: space-between;
                align-items: center;
                background-color: #0C1D25;
                width: 100%;
            }

            li {

                display: inline-block;
                position: relative;
                color: #FCF3D4;
                font-family: sans-serif;
                font-size: 30px;
                cursor: pointer;
                margin-right: 50px;
                transition: color 0.4s ease;
            }

            a {
                text-decoration: none;
                color: inherit;
            }

            li:hover {
                color: #cdcdcd;
                /* Плавное изменение цвета текста при наведении */
            }

            li::after {
                content: '';
                position: absolute;
                width: 100%;
                height: 4px;
                bottom: -5px;
                left: 0;
                background-color: #4711AE;
                transform: scaleX(0);
                transform-origin: bottom right;
                transition: transform 1s ease-out;
                /* Исправлено для плавности появления полоски */
            }

            li:hover::after {
                transform: scaleX(1);
                transform-origin: bottom left;
                /* Плавное расширение полоски при наведении */
            }

            .dropbtn {
                background-color: #0C1D25;
                color: #FCF3D4;
                padding: 16px;
                font-size: 30px;
                border: none;
            }

            /* Контейнер <div> - необходим для размещения выпадающего содержимого */
            .dropdown {
                position: relative;
                display: inline-block;
            }

            /* Выпадающее содержимое (скрыто по умолчанию) */
            .dropdown-content {
                display: none;
                position: absolute;
                background-color: #0C1D25;
                min-width: 325px;
                box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
                z-index: 1;
            }

            /* Ссылки внутри выпадающего списка */
            .dropdown-content a {
                color: #FCF3D4;
                padding: 12px 16px;
                text-decoration: none;
                display: block;
            }

            /* Изменение цвета выпадающих ссылок при наведении курсора */
            .dropdown-content a:hover {
                background-color: #183c4d;
            }

            /* Показать выпадающее меню при наведении курсора */
            .dropdown:hover .dropdown-content {
                display: block;
            }

            
        </style>
    <style>
        /* Добавляем стили для кнопок */
        .but button{
            background-color: #4CAF50; /* Зеленый */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 12px;
            transition-duration: 0.4s;
        }

        .but button:hover {
            background-color: #45a049; /* Темно-зеленый */
            color: white;
        }
    </style>
    <style>
        body {
            font-family: Arial, sans-serif; /* Изменение шрифта для всего документа */
            margin: 0;
            padding: 0;
            background-color: #f4f4f4; /* Цвет фона для всей страницы */
        }
        .table-container {
            width: 80%; /* Ширина контейнера таблицы */
            margin: 20px auto; /* Выравнивание по центру и добавление отступов сверху и снизу */
            background-color: #fff; /* Цвет фона для контейнера таблицы */
            padding: 20px; /* Отступы внутри контейнера */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Тень вокруг контейнера */
            border-radius: 8px; /* Скругление углов контейнера */
        }
        table {
            width: 100%; /* Ширина таблицы */
            border-collapse: collapse; /* Удаление двойных границ */
            margin: 0 auto; /* Выравнивание таблицы по центру */
        }
        th, td {
            padding: 10px; /* Отступы внутри ячеек */
            text-align: left; /* Выравнивание текста в ячейках */
            border-bottom: 1px solid #ddd; /* Граница снизу ячеек */
        }
        th {
            background-color: #4CAF50; /* Цвет фона для заголовков */
            color: white; /* Цвет текста для заголовков */
        }
        tr:hover {
            background-color: #f5f5f5; /* Цвет фона для строк при наведении */
        }
    </style>
</head>

<body>
    <div style="text-align: center; font-size: 25px; ">
        <h1>Личный кабинет администратора</h1>
    </div>  
    <div style="font-size: 20px; border: solid 3px; border-radius: 10px; padding: 15px; width: 380px">
        <p><strong>ФИО:</strong> <?= $adminData['fullname'] ?></p>
        <p><strong>Email:</strong> <?= $adminData['email'] ?></p>
        <p><strong>Login:</strong> <?= $adminData['login'] ?></p>
    </div>

    <div style="text-align: center; margin-top: 30px;  ">
        <div class="but"><button onclick="location.href='../profile/index1.php';">Просмотр всех заказов</button></div>
    </div>
        
    
    <div style="text-align: center; margin-top: 30px;">
    <h2>Обращения пользователей</h2>
    </div>
    <div class="table-container">
        <table>
        <tr>
            <th>ФИО</th>
            <th>Телефон</th>
            <th>Email</th>
            <th>Текст обращения</th>
        </tr>
        <?php foreach ($userIssues as $issue): ?>
            <tr>
                <td><?= $issue['name'] ?></td>
                <td><?= $issue['telephone'] ?></td>
                <td><?= $issue['email'] ?></td>
                <td><?= $issue['content'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    </div>
    
</body>

</html>