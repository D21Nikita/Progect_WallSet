<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>

<div class="navbar">
  <img src="../img/logo.png" alt="Логотип" class="logo">
  <ul class="list">
    <li><a href="../index.php">Главная</a></li>
    <li>
      <div class="dropdown">
        <button class="dropbtn">Каталог</button>
        <div class="dropdown-content">
          <a href="../catalogs/fliz-catalog.php">Флизелиновые обои</a>
          <a href="../catalogs/paper-catalog.php">Бумажные обои</a>
          <a href="../catalogs/vinil-catalog.php">Виниловые обои</a>
          <a href="../catalogs/tekstil-catalog.php">Текстильные обои</a>
        </div>
      </div>
    </li>
    <li>Помощь</li>
    <?php
    // Проверяем, пусты ли переменные логина и id пользователя
    if (empty($_SESSION['login']) or empty($_SESSION['id'])) {
      ?>
      <li class="SignUp">
        <a class="button" href="../sign_up_and_in/signup_and_in.php">Войти</a>
      </li>
      <?php
    } else {
      // Если пользователь вошел в систему, отображаем его логин и кнопку выхода
      ?>
      <li>
        <div class="nama">
        <p><?php echo $_SESSION['login']; ?></p> 
        </div>
      </li>
      <li>
        <div class="nama">
        <a href="../exit.php">Выход</a>
        </div>
      </li>
      <?php
    }
    ?>
  </ul>
</div>