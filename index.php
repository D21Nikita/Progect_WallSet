<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Веб-сервис по продаже обоев WellSet</title>
    <link rel="stylesheet" href="css/index.css">
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
</head>

<body>
    <?php

    // Запускаем сессию
    session_start();
    // Подключаем файлы для шапки и меню
    include ('inc/header.php');
    include ('dbconnect.php');
    ?>

    <div class="container">
        <div class="left-section">
            <img src="img/introduction.png" alt="Картинка введения">
        </div>
        <div class="block-panel">
            <div class="right-section">
                <p>Добро пожаловать на наш веб-сервис, где вы найдете самый большой выбор обоев для вашего дома или
                    офиса. У
                    нас есть обои разных стилей, цветов, которые подойдут для любого интерьера и бюджета. Вы можете
                    легко
                    найти и заказать обои, которые вам нравятся, используя наш удобный каталог. Мы также предлагаем
                    бесплатную доставку, гарантию качества. Наш сайт - это ваш источник вдохновения и красоты для вашего
                    дома. Приятных покупок!</p>
            </div>
        </div>
    </div>

    <div class="container2">
        <div class="block-recommendation">
            <div class="text-recommendation">
                Почему именно мы?
            </div>
        </div>
        <div class="section1">
            <img src="img/quality.png" class="quality" alt="Качество">
            <div class="block-selection1">
                <div class="text-quality">Наша компания гарантирует высочайшее качество обоев,
                    которые прослужат вам долгие годы, сохраняя свой первоначальный вид и яркость цветов.</div>
            </div>


        </div>
        <div class="section2">
            <div class="block-selection2">
                <div class="text-tech-support">
                    Если у вас есть какие либо вопросы или проблемы с выбором,
                    мы можем обратиться к нашей службе поддержки,
                    которая работает круглосуточно.Мы оперативно решим любую ситуацию и предоставим вам консультацию.
                </div>
            </div>
            <img src="img/tech-support.png" class="tech-support" alt="Поддержка">
        </div>
        <div class="section3">
            <img src="img/warrranty.png" class="warranty" alt="гарантия">
            <div class="block-selection3">
                <div class="text-warranty">Если у вас есть какие либо вопросы или проблемы с выбором,
                    мы можем обратиться к нашей службе поддержки,
                    которая работает круглосуточно.Мы оперативно решим любую ситуацию и предоставим вам консультацию.
                </div>
            </div>
        </div>
        <div class="form-section">
            <div class="form-selection-glav">
                <p>Остались вопросы?</p>
            </div>
            <div class="form-selection">
                <div class="form-selection-text">
                    <div class="form-selection-text1">
                        <p>Если у вас остались вопросы по поводу выбора или способу поклейки обоев.</p>
                    </div>
                    <div class="form-selection-text2">
                        <p>Заполните форму и в ближайшее время мы с вами свяжимся.</p>
                    </div>
                </div>

                <form action="process_form.php" class="forma" method="post">
                    <h1>Форма заполнения обращения</h1>
                    <input type="text" placeholder="Ваше имя:" class="name" id="name" name="name" required>

                    <input type="tel" placeholder="Номер телефона:" class="telephone" id="phone" name="phone"
                        pattern="[0-9]{11}" required>

                    <input type="email" placeholder="Электронная почта:" class="email" id="email" name="email" required>

                    <textarea id="message" placeholder="Обращение:" class="obrachenie" name="message" rows="4" cols="50"
                        required></textarea>

                    <input type="submit" name="submit" value="Отправить">
                </form>
            </div>
        </div>
    </div>

</body>

</html>