
<?php
    include "./funcTable.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="table.css">

</head>

<body>
    <style>
        img {
            width: 100px
        }
    </style>
   
    <div class="container">
    <form method="post" class="form_sortiorovka">
    <div class="container_menu">
        <a href="../index.php">Главная</a>
        <a href="../menu_admin.php">Админка</a>
        <a href="./add_tovar.php">Добавить товар</a><br>
    </div>
        <div class="container_menu">
    <label for="category">Выбор по категории </label>
        <select name="category">
            <option value="Все">Все</option>
            <?php 
                echo show_category();
            ?>
        </select>

        <input type="submit" value="Фильтр" name="filtr">
        </div>
        <div class="container_menu">
        <label for="cena">Сортировка </label>
        <select name="cena">
            <option value="0">Без сортировки</option>
            <option value="min">По убыванию цены</option>
            <option value="max">По возрастанию цены</option>
        </select>
        <input type="submit" value="Сортировка" name="sort">
        </div>
        <div class="container_menu">
    <label for="name">Поиск </label>
    <input type="search" value="" name="name" id="name">
    <input type="submit" value="Найти" name="search">
    </div>
    </form>
    <br>
    
        <?php
if(isset($_POST["filtr"]) OR isset($_POST["sort"]) OR isset($_POST["search"])){

    echo show_tovars();

}

?>

    </table>
    </div>
   
</body>

</html>