<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./fonts/font.css">
  <link rel="stylesheet" href="./components/menu_admin.css">
  <title>Меню Админа</title>
</head>

<body></body>
<?php   
include "./components/header.php";
?>
<div class="menu">
  <div class="menu_element">
    <form method="post" action="./function/menu_table.php">
      <input type="submit" name="tovars" value="Добавить товары">
    </form>
  </div>
  <div class="menu_element">
    <form method="post" action="./function/menu_categories.php">
      <input type="submit" name="category" value="Добавить категорию">
    </form>
  </div>
  <div class="menu_element">
    <form method="post" action="./function/menu_postavshik.php">
      <input type="submit" name="postav" value="Добавить поставщика">
    </form>
  </div>
  <div class="menu_element">
    <form method="post" action="./function/menu_magazin.php">
      <input type="submit" name="magaz" value="Добавить магазин">
    </form>
  </div>
  <div class="menu_element">
    <form method="post" action="./function/menu_users.php">
      <input type="submit" name="user" value="Таблица user's">
    </form>
  </div>
</div>
</body>

</html>