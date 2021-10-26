<?php
    include "../servers/bdconnect.php"; 
    include "./funcTable.php";
    if(isset($_GET["ids"])){
    $id=$_GET["ids"];
    $sql="SELECT id,catname,posname,adress,name,info,cena,kol,img FROM tovars,category,postavshiki,magazins WHERE
     tovars.category_id=category.category_id && tovars.postavshiki_id=postavshiki.postavshiki_id &&
      tovars.magazins_id=magazins.magazins_id && tovars.id=$id";
    $result = mysqli_query($link,$sql) or die("товар не найден");
    $row = mysqli_fetch_array($result);
    }
    if(isset($_POST["red"]))
    {
            $id=$_POST["id"];
            $postavshiki_id=htmlspecialchars($_POST['postavshik'], ENT_QUOTES,'UTF-8');
            $magazins_id =htmlspecialchars($_POST['magazin'], ENT_QUOTES,'UTF-8');
            $name=htmlspecialchars($_POST['name'], ENT_QUOTES,'UTF-8');
            $info=htmlspecialchars($_POST['info'], ENT_QUOTES,'UTF-8');
            $cena=htmlspecialchars($_POST['cena'], ENT_QUOTES,'UTF-8');
            $kol=htmlspecialchars($_POST['kol'], ENT_QUOTES,'UTF-8');
                $sql="UPDATE tovars SET postavshiki_id='$postavshiki_id',magazins_id='$magazins_id',name='$name',
                info='$info',cena='$cena',kol='$kol' WHERE id='$id'";
                echo $sql;
                $result = mysqli_query($link,$sql) or die ("Ошибка во время обновления информации");
                Header("Location:./menu_table.php");
    }
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

    <form action="" method="post" name="form1" enctype="multipart/form-data">
    <div>
<a href="./menu_table.php">Вернуться назад</a>
    </div>   
    <div>
            Название товара 
            <input type="text" name="name" value="<?php echo $row["name"] ?>"  />
        </div>
        <div>
         
            Информация о товаре   <textarea name="info" id="" cols="35" rows="5"  ><?php echo $row["info"] ?></textarea>
        </div>
        <div>
            Поставщик
            <select name="postavshik" >
                <?php
        echo show_postavshik();
    ?>
            </select>
        </div>
        <div>
            Магазин
            <select name="magazin" >
                <?php
        echo show_magazin();
    ?>
            </select>
        </div>
        <div>
            Цена товара <input type="number" name="cena"   value="<?php echo $row["cena"] ?>"  />
        </div>
        <div>
            Количество <input type="number" name="kol"   value="<?php echo $row["kol"] ?>"  />
        </div>
        <div>
            Фото продукта <input type="file" name="filename"  />
        </div>
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <input type="submit" name="red" value="Редактировать">
</body>

</html>