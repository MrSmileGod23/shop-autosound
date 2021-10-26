<?php
    include "./funcTable.php";
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../components/add_.css">
    <title>Добавление товара</title>
</head>

<body>

    <form action="insert_tovars.php" method="post" name="form1" enctype="multipart/form-data">
    <div>
<a href="./menu_table.php">Вернуться назад</a>
    </div>
    <div>
            Название товара 
            <input type="text" name="name" require />
        </div>
        <div>
         
            Информация о товаре   <textarea name="info" id="" cols="35" rows="5" require></textarea>
        </div>
        <div>
            Категория товара
            <select name="category" require>
                <?php
        echo show_category();
    ?>
            </select>
        </div>
        <div>
            Поставщик
            <select name="postavshik" require>
                <?php
        echo show_postavshik();
    ?>
            </select>
        </div>
        <div>
            Магазин
            <select name="magazin" require>
                <?php
        echo show_magazin();
    ?>
            </select>
        </div>
        <div>
            Цена товара <input type="number" name="cena" require />
        </div>
        <div>
            Количество <input type="number" name="kol" require />
        </div>
        <div>
            Фото продукта <input type="file" name="filename" require />
        </div>
        <input type="submit" name="insert" value="Добавить">
</body>

</html>