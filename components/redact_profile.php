
<?php
    include "../servers/bdconnect.php"; 
    if(isset($_GET["id"])){
    $id=$_GET["id"];
    $sql="SELECT users.id, id,firstName,twoName,hash,login,img,city FROM users";
    $result = mysqli_query($link,$sql) or die("профиль не найден");

    $row = mysqli_fetch_array($result);
    }
    if(isset($_POST["red"]))
    {
            $id=$_POST["id"];
            $firstName=$_POST["firstName"];
            $twoName=$_POST["twoName"];
            $city=$_POST["city"];
            if( is_uploaded_file($_FILES["filename"]["tmp_name"])  )
    {
        $img=$_FILES['filename']['name'];
        move_uploaded_file
        (
            $_FILES["filename"]["tmp_name"],
            __DIR__ . DIRECTORY_SEPARATOR  .  "../images/users". 
            DIRECTORY_SEPARATOR.$_FILES["filename"]["name"]
        );
    } else{
        echo("Ошибка загрузки файла");
    }
                $sql="UPDATE users SET firstName='$firstName',twoName='$twoName',city='$city',img='$img'  WHERE id=$id";
                echo $sql;
                $result = mysqli_query($link,$sql) or die ("Ошибка во время обновления информации");
                Header("Location:../profile.php");
    }
    ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../components/redact_profile.css">
     <link rel="stylesheet" href="../fonts/font.css">
    <title>Авторизация</title>
</head>
<body>
<h1>Редактирование профиля</h1>
<form action="" method= "post" name="frt" enctype="multipart/form-data">

    <div class="group">      
    <input type="text" size="15" maxlength="15" name="firstName" id="firstName" placeholder="Имя" value="<?php echo $row["firstName"] ?>">
    </div>
      
    <div class="group">      
    <input type="text" size="15" maxlength="15" name="twoName" id="twoName" placeholder="Фамилия" value="<?php echo $row["twoName"] ?>" >
    </div>

    <div class="group">      
    <input type="text" size="15" maxlength="15" name="city" id="city" placeholder="Город" value="<?php echo $row["city"] ?>">
    </div>

    <div class="group" id="group_img"> 
    Аватарка
    <label for="file-upload" class="custom-file-upload">
    <i class="fa fa-cloud-upload"></i> Загрузить
</label>     
    <input type="file" id="file-upload" name="filename" value="<?php echo $row["img"] ?>" />
    </div>
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <input type="submit" name="red" value="Редактировать">
    </form>

</table>

</body>
</html>
       
