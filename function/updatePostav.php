<?php
    include "../servers/bdconnect.php"; 
    include "./funcPostav.php";
    if(isset($_GET["ids"])){
    $id=$_GET["ids"];
    $sql="SELECT postavshiki_id,posname,telephone FROM postavshiki WHERE postavshiki_id=$id";
    $result = mysqli_query($link,$sql) or die("товар не найден");
    $row = mysqli_fetch_array($result);
    }
    if(isset($_POST["red"]))
    {
            $id=$_POST["id"];
            $posname=htmlspecialchars($_POST['posname'], ENT_QUOTES,'UTF-8');
            $telephone=htmlspecialchars($_POST['telephone'], ENT_QUOTES,'UTF-8');
                $sql="UPDATE postavshiki SET posname='$posname',telephone='$telephone' WHERE postavshiki_id='$id'";
                echo $sql;
                $result = mysqli_query($link,$sql) or die ("Ошибка во время обновления информации");
                Header("Location:./menu_postavshik.php");
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
<a href="./menu_postavshik.php">Вернуться назад</a>
    </div>   
    <div>
            Название поставщика 
            <input type="text" name="posname" value="<?php echo $row["posname"] ?>"  />
        </div>
        <div>
            Телефон
            <input type="text" name="telephone" value="<?php echo $row["telephone"] ?>"  />
        </div>
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <input type="submit" name="red" value="Редактировать">
</body>

</html>