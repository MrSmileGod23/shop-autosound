<?php

include "../servers/bdconnect.php";
 if(isset($_POST["ud_id"]))
 {
     $mass=$_POST["ud_id"];
     $i=0;
     while($mass[$i])
 {
 
 $sql="DELETE FROM magazins WHERE magazins_id=$mass[$i]";
 $result1 = mysqli_query($link,$sql) or die("Магазин связан");
 $i++;
 
 }
 Header("Location:./menu_magazin.php");
 }
?>

<?php

 function show_tovars(){
  include "../servers/bdconnect.php";
  $sql="SELECT category_id,adress FROM magazins";

      
if(isset($_POST["sort"])){
    $adress=$_POST["adress"];
    if($adress=="0")
    $sql="SELECT magazins_id,adress FROM magazins";
    if($adress=="az")
    $sql="SELECT magazins_id,adress FROM magazins ORDER BY adress DESC";
    if($adress=="za")
    $sql="SELECT magazins_id,adress FROM magazins ORDER BY adress ";
    }

   
if(isset($_POST["search"])){
    $name =$_POST["name"];
    $sql="SELECT magazins_id,adress FROM magazins WHERE adress LIKE '%$name%'"; 
    }
  
    $result = mysqli_query($link,$sql) or die ("Query failed");
    echo "<form method=post action=funcMagaz.php>";
    echo "<div class=delete_tovars>";
    echo "<input type=submit id=delete_tovars name=ud value=Удалить>";
    echo "</div>";
   
    echo "<table class='table-3' id='table_cat'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Адресс</th>";
    echo "<th>Редактировать</th>";
    echo "<th>Удалить</th>";
    echo "<tr>";
    echo "</thead>";
    echo "</tbody>";
    while($row = mysqli_fetch_array($result))
    {
        $ids=$row[0];
        echo "<tr>";
        printf(" %s %s<br>","<td data-label=ID>" .$row['magazins_id'],
        "<td data-label=Категория>" .$row['adress']);
        ?>
        <td data-label=Редактировать>
        <a href="updateMagaz.php?ids=<?php echo $ids ?>">Редактировать</a></td>
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
   <title>Таблица Магазинов</title>
 </head>
 <body>
   
 </body>
 </html>