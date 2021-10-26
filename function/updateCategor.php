<?php
    include "../servers/bdconnect.php"; 
    include "./funcCategor.php";
    if(isset($_GET["ids"])){
    $id=$_GET["ids"];
    $sql="SELECT category_id,catname FROM category WHERE category_id=$id";
    $result = mysqli_query($link,$sql) or die("товар не найден");
    $row = mysqli_fetch_array($result);
    }
    if(isset($_POST["red"]))
    {
            $id=$_POST["id"];
            $catname=htmlspecialchars($_POST['catname'], ENT_QUOTES,'UTF-8');
                $sql="UPDATE category SET catname='$catname' WHERE category_id='$id'";
                echo $sql;
                $result = mysqli_query($link,$sql) or die ("Ошибка во время обновления информации");
                Header("Location:./menu_categories.php");
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
<a href="./menu_categories.php">Вернуться назад</a>
    </div>   
    <div>
            Название категории 
            <input type="text" name="catname" value="<?php echo $row["catname"] ?>"  />
        </div>
 
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <input type="submit" name="red" value="Редактировать">
</body>

</html>