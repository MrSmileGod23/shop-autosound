<?php

include "../servers/bdconnect.php";
 if(isset($_POST["ud_id"]))
 {
     $mass=$_POST["ud_id"];
     $i=0;
     while($mass[$i])
 {
 
 $sql="DELETE FROM tovars WHERE id=$mass[$i]";
 $result1 = mysqli_query($link,$sql) or die("Query failed");
 $i++;
 }
 Header("Location:./menu_table.php");
 }
?>

<?php

 function show_category(){
     include "../servers/bdconnect.php";
     $sql = "SELECT * FROM category";

     $result= mysqli_query($link,$sql) or die("Query failed");
     while( $row=mysqli_fetch_array($result)){
         $array_category[$row["category_id"]]=$row["catname"];
     };
     $str="";
     foreach($array_category as $key => $value){
            $str=$str. "<option value='".$key."' >".$value."</option>";
     }
     return $str;
 }

 function show_postavshik(){
  include "../servers/bdconnect.php";
  $sql = "SELECT * FROM postavshiki";

  $result= mysqli_query($link,$sql) or die("Query failed");
  while( $row=mysqli_fetch_array($result)){
      $array_postavshiki[$row["postavshiki_id"]]=$row["posname"];
  };
  $str="";
  foreach($array_postavshiki as $key => $value){
         $str=$str. "<option value='".$key."' >".$value."</option>";
  }
  return $str;
}
function show_magazin(){
  include "../servers/bdconnect.php";
  $sql = "SELECT * FROM magazins";

  $result= mysqli_query($link,$sql) or die("Query failed");
  while( $row=mysqli_fetch_array($result)){
      $array_postavshiki[$row["magazins_id"]]=$row["adress"];
  };
  $str="";
  foreach($array_postavshiki as $key => $value){
         $str=$str. "<option value='".$key."' >".$value."</option>";
  }
  return $str;
}
 function show_tovars(){
  include "../servers/bdconnect.php";
  $sql="SELECT id,catname,posname,adress,name,info,cena,kol,img FROM tovars,category,postavshiki,magazins WHERE
  tovars.category_id=category.category_id && tovars.postavshiki_id=postavshiki.postavshiki_id && tovars.magazins_id=magazins.magazins_id";

        $category=$_POST["category"];
        if($category=="Все")
        $sql="SELECT id,catname,posname,adress,name,info,cena,kol,img FROM tovars,category,postavshiki,magazins WHERE
  tovars.category_id=category.category_id && tovars.postavshiki_id=postavshiki.postavshiki_id && tovars.magazins_id=magazins.magazins_id";
        else 
        $sql="SELECT id,catname,posname,adress,name,info,cena,kol,img FROM tovars,category,postavshiki,magazins WHERE
        tovars.category_id=category.category_id && tovars.postavshiki_id=postavshiki.postavshiki_id && tovars.magazins_id=magazins.magazins_id
        && category.category_id=$category";

if(isset($_POST["sort"])){
    $cena=$_POST["cena"];
    if($cena=="0")
    $sql="SELECT id,catname,posname,adress,name,info,cena,kol,img FROM tovars,category,postavshiki,magazins WHERE
  tovars.category_id=category.category_id && tovars.postavshiki_id=postavshiki.postavshiki_id && tovars.magazins_id=magazins.magazins_id";
    if($cena=="min")
    $sql="SELECT id,catname,posname,adress,name,info,cena,kol,img FROM tovars,category,postavshiki,magazins WHERE
    tovars.category_id=category.category_id && tovars.postavshiki_id=postavshiki.postavshiki_id && tovars.magazins_id=magazins.magazins_id
    ORDER BY cena ";
    if($cena=="max")
    $sql="SELECT id,catname,posname,adress,name,info,cena,kol,img FROM tovars,category,postavshiki,magazins WHERE
    tovars.category_id=category.category_id && tovars.postavshiki_id=postavshiki.postavshiki_id && tovars.magazins_id=magazins.magazins_id
    ORDER BY cena DESC";
    }

   
if(isset($_POST["search"])){
    $name =$_POST["name"];
    $sql="SELECT id,catname,posname,adress,name,info,cena,kol,img FROM tovars,category,postavshiki,magazins WHERE
    tovars.category_id=category.category_id && tovars.postavshiki_id=postavshiki.postavshiki_id && tovars.magazins_id=magazins.magazins_id AND name LIKE '%$name%'"; 
    }
  
    $result = mysqli_query($link,$sql) or die ("Query failed");
    echo "<form method=post action=./funcTable.php>";
    echo "<div class=delete_tovars>";
    echo "<input type=submit id=delete_tovars name=ud value=Удалить>";
    echo "</div>";
  
    echo "<table class='table-3'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Категория</th>";
    echo "<th>Поставщик</th>";
    echo "<th>Магазин</th>";
    echo "<th>Название</th>";
    echo "<th>Инфо</th>";
    echo "<th>Цена</th>";
    echo "<th>Кол-во</th>";
    echo "<th>Изображение</th>";
    echo "<th>Редактировать</th>";
    echo "<th>Удалить</th>";
    echo "<tr>";
    echo "</thead>";
    echo "</tbody>";
    while($row = mysqli_fetch_array($result))
    {
        $ids=$row[0];
        echo "<tr>";
        printf(" %s %s %s %s %s %s %s %s %s<br>","<td data-label=ID>" .$row['id'],
        "<td data-label=Категория>" .$row['catname'],"<td data-label=Поставщик>" .$row['posname'],
        "<td data-label=Магазин>" .$row['adress'],"<td data-label=Название>" .$row['name'],
        "<td data-label=Инфо >" .$row['info'],"<td data-label=Цена>" .$row['cena'],
        "<td data-label=Кол-во>" .$row['kol'],
        "<td data-label=Изображение><img src='../images/tovar/". $row["img"]."'>");
        ?>
        <td data-label=Редактировать>
        <a href="./updateTable.php?ids=<?php echo $ids ?>">Редактировать</a></td>
      <td data-label=Удалить>
        <input type=checkbox name=ud_id[] value="<?php echo $ids ?>">
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
   <title>Таблица Товаров</title>
 </head>
 <body>
   
 </body>
 </html>