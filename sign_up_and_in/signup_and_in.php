<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Next Level Login & Registration Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style.css" />
</head>

<body>
    <div class="container">
        <form class="form signup" action="process_signup.php" method="post">
            <h2>Регистрация</h2>
            <div class="inputBox">
                <input type="text" name="fullname" required="required" />
                <i class="fa-regular fa-user"></i>
                <span>ФИО</span>
            </div>
            <div class="inputBox">
                <input type="text" name="email" required="required" />
                <i class="fa-regular fa-envelope"></i>
                <span>Email</span>
            </div>
            <div class="inputBox">
                <input type="login" name="login" required="required" />
                <i class="fa-solid fa-lock"></i>
                <span>Логин</span>
            </div>
            <div class="inputBox">
                <input type="password" name="password" required="required" />
                <i class="fa-solid fa-lock"></i>
                <span>Пароль</span>
            </div>
            <div class="inputBox">
                <input type="submit" name="register" value="Зарегистрироваться" href="process_signup.php" />
            </div>
            <p>Вы уже зарегистрированны? <a href="#" class="login">Войти</a></p>
        </form>

        <form class="form signin" action="process_signin.php" method="post">
            <h2>Вход</h2>
            <div class="inputBox">
                <input type="text" name="login" required="required" />
                <i class="fa-regular fa-user"></i>
                <span>Логин</span>
            </div>
            <div class="inputBox">
                <input type="password" name="password" required="required" />
                <i class="fa-solid fa-lock"></i>
                <span>Пароль</span>
            </div>
            <div class="inputBox">
                <input type="submit" value="Войти" />
            </div>
            <p>
                Вы еще не зарегистрированны? <a href="#" class="create">Зарегистрироваться</a>
            </p>
        </form>
    </div>

    <script>
        let login = document.querySelector(".login");
        let create = document.querySelector(".create");
        let container = document.querySelector(".container");

        login.onclick = function () {
            container.classList.add("signinForm");
        };

        create.onclick = function () {
            container.classList.remove("signinForm");
        };
    </script>
</body>

</html>