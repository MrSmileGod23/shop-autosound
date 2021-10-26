<?php

include "../servers/bdconnect.php";
 if(isset($_POST["ud_id"]))
 {
     $mass=$_POST["ud_id"];
     $i=0;
     while($mass[$i])
 {
 
 $sql="DELETE FROM category WHERE category_id=$mass[$i]";
 $result1 = mysqli_query($link,$sql) or die("Категория связана");
 $i++;
 }
 Header("Location:./menu_categories.php");
 }
?>

<?php

 function show_tovars(){
  include "../servers/bdconnect.php";
  $sql="SELECT category_id,catname FROM category";

      
if(isset($_POST["sort"])){
    $catname=$_POST["catname"];
    if($catname=="0")
    $sql="SELECT category_id,catname FROM category";
    if($catname=="az")
    $sql="SELECT category_id,catname FROM category ORDER BY catname DESC";
    if($catname=="za")
    $sql="SELECT category_id,catname FROM category ORDER BY catname ";
    }

   
if(isset($_POST["search"])){
    $name =$_POST["name"];
    $sql="SELECT category_id,catname FROM category WHERE catname LIKE '%$name%'"; 
    }
  
    $result = mysqli_query($link,$sql) or die ("Query failed");
    echo "<form method=post action=funcCategor.php>";
    echo "<div class=delete_tovars>";
    echo "<input type=submit id=delete_tovars name=ud value=Удалить>";
    echo "</div>";
   
    echo "<table class='table-3' id='table_cat'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Категория</th>";
    echo "<th>Редактировать</th>";
    echo "<th>Удалить</th>";
    echo "<tr>";
    echo "</thead>";
    echo "</tbody>";
    while($row = mysqli_fetch_array($result))
    {
        $ids=$row[0];
        echo "<tr>";
        printf(" %s %s<br>","<td data-label=ID>" .$row['category_id'],
        "<td data-label=Категория>" .$row['catname']);
        ?>
        <td data-label=Редактировать>
        <a href="updateCategor.php?ids=<?php echo $ids ?>">Редактировать</a></td>
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
   <title>Таблица Категории</title>
 </head>
 <body>
   
 </body>
 </html>