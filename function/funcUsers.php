<?php

include "../servers/bdconnect.php";
 if(isset($_POST["ud_id"]))
 {
     $mass=$_POST["ud_id"];
     $i=0;
     while($mass[$i])
 {
 
 $sql="DELETE FROM users WHERE id=$mass[$i]";
 $result1 = mysqli_query($link,$sql) or die("Query failed");
 $i++;
 }
 Header("Location:./menu_users.php");
 }
?>

<?php


 function show_tovars(){
  include "../servers/bdconnect.php";
  $sql="SELECT id,firstName,twoName,login,img,city FROM users";

if(isset($_POST["sort"])){
    $loginn=$_POST["loginn"];
    if($loginn=="0")
    $sql="SELECT id,firstName,twoName,login,img,city FROM users";
    if($loginn=="az")
    $sql="SELECT id,firstName,twoName,login,img,city FROM users ORDER BY login ";
    if($loginn=="za")
    $sql="SELECT id,firstName,twoName,login,img,city FROM users ORDER BY login DESC";
    }

   
if(isset($_POST["search"])){
    $name =$_POST["name"];
    $sql="SELECT id,firstName,twoName,login,img,city FROM users WHERE login LIKE '$name%'"; 
    }
  
    $result = mysqli_query($link,$sql) or die ("Query failed");
    echo "<form method=post action=./funcUsers.php>";
    echo "<div class=delete_tovars>";
    echo "<input type=submit id=delete_tovars name=ud value=Удалить>";
    echo "</div>";
  
    echo "<table class='table-3' id='table_cat'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Имя</th>";
    echo "<th>Фамилия</th>";
    echo "<th>Логин</th>";
    echo "<th>Город</th>";
    echo "<th>Аватар</th>";
    echo "<th>Удалить</th>";
    echo "<tr>";
    echo "</thead>";
    echo "</tbody>";
    while($row = mysqli_fetch_array($result))
    {
        $id=$row[0];
        echo "<tr>";
        printf(" %s %s %s %s %s %s <br>","<td data-label=ID>" .$row['id'],
        "<td data-label=Имя>" .$row['firstName'],"<td data-label=Фамилия>" .$row['twoName'],
        "<td data-label=Логин>" .$row['login'],
        "<td data-label=Город >" .$row['city'],
        "<td data-label=Изображение><img src='../images/users/". $row["img"]."'>");
        ?>
      <td data-label=Удалить>
        <input type=checkbox name=ud_id[] value="<?php echo $id ?>">
        <?php echo " </td>
      </tr>";
     
    }
    
    echo "</tbody>";
    echo "</table>";
 
    echo "</form>";
    mysqli_close($link);
    }
 ?>   

 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./table.css">
   <title>Таблица Пользователей</title>
 </head>
 <body>
   
 </body>
 </html>