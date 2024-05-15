<?php
session_start();
require("../connection.php");

// Определение текущей страницы
if (isset($_GET['page'])) {
    $pages = array("products", "cart");
    if (in_array($_GET['page'], $pages)) {
        $_page = $_GET['page'];
    } else {
        $_page = "products";
    }
} else {
    $_page = "products";
}

// Проверка авторизации пользователя
if (!isset($_SESSION['id'])) {
    // Пользователь не авторизован
    echo "Перед оформлением заказа вам нужно зарегистрироваться. Сейчас вы будете перенесены на страницу регистрации через 10 секунд.";
    header("Refresh: 10; url=../sign_up_and_in/signup_and_in.php"); // Перенаправление на страницу регистрации через 5 секунд
    exit;
}

// Обработка заказа
if (isset($_POST['place_order'])) {
    $success = true; // Флаг успешности операции
    $error_message = ''; // Сообщение об ошибке
    $id_user = $_SESSION['id']; // ID пользователя из сессии

    if (!empty($_POST['quantity']) && is_array($_POST['quantity'])) {
        foreach ($_POST['quantity'] as $id_wallpaper => $quantity) {
            if ($quantity > 0) {
                $price = (int) $_POST['price'][$id_wallpaper]; // Цена за единицу
                $items_price = $quantity * $price; // Общая стоимость товара

                // Подготовка запроса на вставку с учетом ID пользователя
                $stmt = mysqli_prepare($connection, "INSERT INTO orders (id_wallpaper, id_user, quantity, price, items_price) VALUES (?, ?, ?, ?, ?)");

                // Проверка на успешность подготовки запроса
                if (!$stmt) {
                    die('Ошибка подготовки запроса: ' . mysqli_error($connection));
                }

                mysqli_stmt_bind_param($stmt, 'iiiid', $id_wallpaper, $id_user, $quantity, $price, $items_price);

                // Выполнение запроса и проверка результата
                if (!mysqli_stmt_execute($stmt)) {
                    $success = false;
                    $error_message = mysqli_error($connection);
                    break; // Прерываем цикл при возникновении ошибки
                }

                mysqli_stmt_close($stmt); // Закрытие подготовленного запроса
            }
        }
    } else {
        $success = false;
        $error_message = 'Данные о количестве не переданы.';
    }

    // Если заказ успешно оформлен, очищаем корзину
    if ($success) {
        $_SESSION['cart'] = array(); // Очистка корзины
        echo "Заказ успешно оформлен!";
    } else {
        echo "Ошибка при оформлении заказа: " . $error_message;
    }
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Корзина покупок</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Стили для кнопки возврата в каталог */
        .return-button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 20px;
            text-decoration: none;
            color: #fff;
            background-color: #48577D;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .return-button:hover {
            background-color: #4cae4c;
        }
    </style>
</head>

<body>
    <div id="container">
        <!-- Кнопка возврата в каталог -->
        <div id="return-to-catalog">
            <a href="../catalogs/fliz-catalog.php" class="return-button">Вернуться в каталог</a>
        </div>

        <div id="main">
            <?php require ($_page . ".php"); ?>
        </div><!--end of main-->
        <div id="sidebar">
            <h1>Корзина</h1>
            <div id="perehod"><a href="index.php?page=cart">Перейти к заказу</a></div>
            <form method="post" action="index.php?page=cart">
                <?php
                if (isset($_SESSION['cart'])) {
                    $sql = "SELECT * FROM wallpaper WHERE id IN (";
                    foreach ($_SESSION['cart'] as $id => $value) {
                        $sql .= $id . ",";
                    }
                    $sql = substr($sql, 0, -1) . ") ORDER BY name_wall ASC";
                    $result = mysqli_query($connection, $sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="cart-item">';
                        echo '<span class="item-name">' . $row['name_wall'] . $row['style_wall'] . '</span>';
                        echo '<input type="number" name="quantity[' . $row['id'] . ']" value="' . $_SESSION['cart'][$row['id']]['quantity'] . '">';
                        echo '<input type="hidden" name="price[' . $row['id'] . ']" value="' . $row['price'] . '">';
                        echo '</div>';
                    }
                } else {
                    echo "<p>Ваша корзина пуста. Пожалуйста, добавьте некоторые продукты.</p>";
                }
                ?>
                <button type="submit" name="place_order">Оформить заказ</button>
            </form>
        </div><!--end of sidebar-->
    </div><!--end container-->
</body>

</html>