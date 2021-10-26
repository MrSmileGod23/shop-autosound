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
    <title>Добавление категории</title>
</head>

<body>

<?php
include "../servers/bdconnect.php";
if(isset($_POST["insert"]))
 {
  $catname =htmlspecialchars($_POST['catname'], ENT_QUOTES,'UTF-8');
  $sql = "INSERT INTO category(catname) VALUES('$catname')";
  $result = mysqli_query($link,$sql) or die("Query failed"); 
  Header("Location:./menu_categories.php");
 }



?>
    <form action="" method="post" name="form1">
    <div>
<a href="./menu_categories.php">Вернуться назад</a>
    </div>
        <div>
            Название категории 
            <input type="text" name="catname" require />
        </div>
        <input type="submit" name="insert" value="Добавить">
</body>

</html>