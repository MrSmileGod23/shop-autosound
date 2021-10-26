
<?php
include "../servers/bdconnect.php";
$category_id =htmlspecialchars($_POST['category'], ENT_QUOTES,'UTF-8');
$postavshiki_id=htmlspecialchars($_POST['postavshik'], ENT_QUOTES,'UTF-8');
$magazins_id =htmlspecialchars($_POST['magazin'], ENT_QUOTES,'UTF-8');
$name=htmlspecialchars($_POST['name'], ENT_QUOTES,'UTF-8');
$info=htmlspecialchars($_POST['info'], ENT_QUOTES,'UTF-8');
$cena=htmlspecialchars($_POST['cena'], ENT_QUOTES,'UTF-8');
$kol=htmlspecialchars($_POST['kol'], ENT_QUOTES,'UTF-8');

if( is_uploaded_file($_FILES["filename"]["tmp_name"])  )
    {
        $img=$_FILES['filename']['name'];
        move_uploaded_file
        (
            $_FILES["filename"]["tmp_name"],
            __DIR__ . DIRECTORY_SEPARATOR  .  "../images/tovar". 
            DIRECTORY_SEPARATOR.$_FILES["filename"]["name"]
        );
    } else{
        echo("Ошибка загрузки файла");
    }

$sql = "INSERT INTO tovars(category_id,postavshiki_id,magazins_id,name,info,cena,kol,img) VALUES('$category_id','$postavshiki_id','$magazins_id','$name','$info','$cena','$kol','$img')";

$result = mysqli_query($link,$sql) or die("Query failed");
Header("Location:./menu_table.php");
?>