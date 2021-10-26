<?php
    include "./funcPostav.php";
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../components/add_.css">
    <title>Добавление Магазина</title>
</head>

<body>

<?php
include "../servers/bdconnect.php";
if(isset($_POST["insert"]))
 {
  $adress =htmlspecialchars($_POST['adress'], ENT_QUOTES,'UTF-8');
  $sql = "INSERT INTO magazins(adress) VALUES('$adress')";
  $result = mysqli_query($link,$sql) or die("Query failed"); 
  Header("Location:./menu_magazin.php");
 }



?>
    <form action="" method="post" name="form1">
    <div>
<a href="./menu_magazin.php">Вернуться назад</a>
    </div>
        <div>
            Адрес магазина
            <input type="text" name="adress" require />
        </div>
        <input type="submit" name="insert" value="Добавить">
</body>

</html>