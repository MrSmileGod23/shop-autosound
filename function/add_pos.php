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
    <title>Добавление поставщика</title>
</head>

<body>

<?php
include "../servers/bdconnect.php";
if(isset($_POST["insert"]))
 {
  $posname =htmlspecialchars($_POST['posname'], ENT_QUOTES,'UTF-8');
  $telephone =htmlspecialchars($_POST['telephone'], ENT_QUOTES,'UTF-8');
  $sql = "INSERT INTO postavshiki(posname,telephone) VALUES('$posname','$telephone')";
  $result = mysqli_query($link,$sql) or die("Query failed"); 
  Header("Location:./menu_postavshik.php");
 }



?>
    <form action="" method="post" name="form1">
    <div>
<a href="./menu_postavshik.php">Вернуться назад</a>
    </div>
        <div>
            Название поставщика 
            <input type="text" name="posname" require />
        </div>
        <div>
            Телефон
            <input type="number"  name="telephone"  require/>
        </div>
        <input type="submit" name="insert" value="Добавить">
</body>

</html>