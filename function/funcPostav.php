<?php

include "../servers/bdconnect.php";
 if(isset($_POST["ud_id"]))
 {
     $mass=$_POST["ud_id"];
     $i=0;
     while($mass[$i])
 {
 
 $sql="DELETE FROM postavshiki WHERE postavshiki_id=$mass[$i]";
 $result1 = mysqli_query($link,$sql) or die("Поставщик связан");
 $i++;
 }
 Header("Location:./menu_postavshik.php");
 }
?>

<?php

 function show_tovars(){
  include "../servers/bdconnect.php";
  $sql="SELECT postavshiki_id,posname,telephone FROM postavshiki";

      
if(isset($_POST["sort"])){
    $posname=$_POST["posname"];
    if($posname=="0")
    $sql="SELECT postavshiki_id,posname,telephone FROM postavshiki";
    if($posname=="az")
    $sql="SELECT postavshiki_id,posname,telephone FROM postavshiki ORDER BY posname DESC";
    if($posname=="za")
    $sql="SELECT postavshiki_id,posname,telephone FROM postavshiki ORDER BY posname ";
    }

   
if(isset($_POST["search"])){
    $name =$_POST["name"];
    $sql="SELECT postavshiki_id,posname,telephone FROM postavshiki WHERE posname LIKE '%$name%'"; 
    }
  
    $result = mysqli_query($link,$sql) or die ("Query failed");
    echo "<form method=post action=funcPostav.php>";
    echo "<div class=delete_tovars>";
    echo "<input type=submit id=delete_tovars name=ud value=Удалить>";
    echo "</div>";
   
    echo "<table class='table-3' id='table_cat'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Название</th>";
    echo "<th>Телефон</th>";
    echo "<th>Редактировать</th>";
    echo "<th>Удалить</th>";
    echo "<tr>";
    echo "</thead>";
    echo "</tbody>";
    while($row = mysqli_fetch_array($result))
    {
        $ids=$row[0];
        echo "<tr>";
        printf(" %s %s %s<br>","<td data-label=ID>" .$row['postavshiki_id'],
        "<td data-label=Название>" .$row['posname'],"<td data-label=Телефон>" .$row['telephone']);
        ?>
        <td data-label=Редактировать>
        <a href="updatePostav.php?ids=<?php echo $ids ?>">Редактировать</a></td>
      <td data-label=Удалить>
        <input type=checkbox name=ud_id[] value="<?php echo $ids ?>">
        <?php echo "</td>
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
   <title>Таблица Поставщиков</title>
 </head>
 <body>
   
 </body>
 </html>