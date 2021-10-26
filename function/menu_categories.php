
<?php
    include "./funcCategor.php";
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Категории</title>
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
        <a href="./add_cat.php">Добавить категорию</a><br>
    </div>
    
        <div class="container_menu">
        <label for="catname">Сортировка </label>
        <select name="catname">
            <option value="0">Без сортировки</option>
            <option value="az">По алфавиту</option>
            <option value="za">В обратном алфавите</option>
        </select>
        <input type="submit" value="Сортировка" name="sort">
        </div >
        <div class="container_menu">
    <label for="name">Поиск </label>
    <input type="search" value="" name="name" id="name">
    <input type="submit" value="Найти" name="search">
    </div>
    </form>
    <br>
    
        <?php
if(isset($_POST["sort"]) OR isset($_POST["search"])){

    echo show_tovars();

}

?>

    </table>
    </div>
   
</body>

</html>