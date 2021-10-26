<!DOCTYPE html>

<head>
  <link rel="stylesheet" href="./components/header_style.css">
  <link rel="stylesheet" href="../fonts/font.css">
</head>
<?php include "ico.php" ?>

<body>
  <header>
    <div class="header_logo">
    <img src="./images/img/logo.png" alt="Логотип">
    <a href="index.php">Главная</a>
    </div>
    <nav class="main_nav">
      <ul>
        <?php
        session_start();
    include "./function/validate_user.php";
     if (isset($_SESSION["logged"]) && $_SESSION["logged"]=="1" && $_SESSION["userid"]=="1"){
      echo "<li><a href=index.php>Товары</a></li>";
      echo "<li><a href=>Магазины</a></li>";
      echo "<li><a href=menu_admin.php>Редактирование БД</a></li></ul>";
      echo "<div class=header_nav_profile><a href=./profile.php>Профиль</a></div>";
    }
 else if(isset($_SESSION["logged"]) && $_SESSION["logged"]=="1"){
    echo "<li><a href=>Товары</a></li>";
    echo "<li><a href=>Магазины</a></li></ul>";
    echo "<div class=header_nav_profile><a href=./profile.php>Профиль</a></div>";
}

else {
    echo "<li><a href=>Товары</a></li>";
    echo "<li><a href=>Магазины</a></li></ul>";
    echo "<div class=header_nav_profile><a href=./function/login.php>Войти</a>";
    echo "<a href=./function/register.php>Регистрация</a></div>";
}
 
   
    ?>


      </ul>
    </nav>
    <nav role="navigation" class="burger_menu">
  <div id="menuToggle">
    <!--
    A fake / hidden checkbox is used as click reciever,
    so you can use the :checked selector on it.
    -->
    <input type="checkbox" />
    
    <!--
    Some spans to act as a hamburger.
    
    They are acting like a real hamburger,
    not that McDonalds stuff.
    -->
    <span></span>
    <span></span>
    <span></span>
    
    <!--
    Too bad the menu has to be inside of the button
    but hey, it's pure CSS magic.
    -->
    <ul id="menu">
        <?php
        session_start();
    include "./function/validate_user.php";
     if (isset($_SESSION["logged"]) && $_SESSION["logged"]=="1" && $_SESSION["userid"]=="1"){
      echo "<li><a href=index.php>Товары</a></li>";
      echo "<li><a href=>Магазины</a></li>";
      echo "<li><a href=menu_admin.php>Редактирование БД</a></li>";
      echo "<div class=header_nav_profile><a href=./profile.php>Профиль</a></div></ul>";
    }
 else if(isset($_SESSION["logged"]) && $_SESSION["logged"]=="1"){
    echo "<li><a href=>Товары</a></li>";
    echo "<li><a href=>Магазины</a></li>";
    echo "<div class=header_nav_profile><a href=./profile.php>Профиль</a></div></ul>";
}

else {
    echo "<li><a href=>Товары</a></li>";
    echo "<li><a href=>Магазины</a></li>";
    echo "<div class=header_nav_profile><a href=./function/login.php>Войти</a>";
    echo "<a href=./function/register.php>Регистрация</a></div></ul>";
}
 
   
    ?>


      </ul>
  </div>
</nav>
  </header>
</body>

</html>