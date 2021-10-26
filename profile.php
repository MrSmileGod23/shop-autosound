<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./fonts/font.css">
    <link rel="stylesheet" href="./components/style.css">
    <link rel="stylesheet" href="./components/profile.css">
    <title>Профиль</title>
</head>

<body></body>

<?php   
session_start();
include "./components/header.php";
include "./servers/bdconnect.php";
include "./function/validate_user.php";
?>
<div class="container">
    <div class="container_profile">
<div class="profile_img_login">
<?php echo "<img src='./images/users/". $user["img"]."'>" ?>
<?php echo "Ваш логин: ".$user["login"]."!"; ?>
</div>

<div class="profile_info">
<div><?php echo "Имя: ".$user["firstName"].""; ?></div>
<div><?php echo "Фамилия: ".$user["twoName"].""; ?></div>
<div><?php echo "Город: ".$user["city"].""; ?></div>
</div>

<div class="profile_update">
<a href="./components/redact_profile.php?id=<?php echo $id ?>">Редактировать профиль</a></td>
<a href="./function/logout.php">Выйти из профиля</a></td>
</div>
    </div>
    <div class="container_zakaz">
<h2>Ваши заказы:</h2>

<?php
include "./servers/bdconnect.php";
$sql="SELECT name,cena ,data,img FROM tovars,zakaz WHERE users_id=$id";
$result = mysqli_query($link,$sql) or die ("Query failed");
echo "<table class='table-3'>";
echo "<thead>";
echo "<tr>";
echo "<th>Товар</th>";
echo "<th>Цена</th>";
echo "<th>Дата</th>";
echo "<th>Изображение</th>";
echo "<tr>";
echo "</thead>";
echo "</tbody>";
while($row = mysqli_fetch_array($result))
{
    echo "<tr>";
    printf(" %s %s %s %s<br>","<td data-label=Товар>" .$row['name'],"<td data-label=Цена>" .$row['cena'],"<td data-label=Дата>" .$row['data'],"<td data-label=Изображение><img src='./images/tovar/". $row["img"]."'>");

}
echo "</tbody>";
echo "</table>";
mysqli_close($link);
?>
   
    </div>


</div>


</body>

</html>