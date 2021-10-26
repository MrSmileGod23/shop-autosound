<?php
error_reporting(0);
include "../servers/bdconnect.php";
if(isset($_POST["reg"])){
    $login=htmlspecialchars($_POST["login"]);
    $password=htmlspecialchars($_POST["password"]);
    $img="";
    $firstName="";
    $twoName="";
    $city="";
    $hash=password_hash($password,PASSWORD_BCRYPT);
    $q=mysqli_query($link,"SELECT * FROM users WHERE login='".$login."'");
    $nq=mysqli_num_rows($q);
    if($nq==0){
        $hasErrors=true;
        $sql="INSERT INTO users (firstName,twoName,hash,login,img,city) VALUES ('$firstName','$twoName','$hash','$login','$img','$city')";
      echo $sql;
        $result=mysqli_query($link,$sql);
        $mfq=mysqli_fetch_array($q);
        $_SESSION["logged"]=1;
        $sql="SELECT max(id) FROM users";
        $result=mysqli_query($link,$sql);
        $mfq=mysqli_fetch_array($q);
        $_SESSION["userid"] = $mfq[0];
       header("Location:./login.php");
             }else {
                 echo "Логин уже занят";
             }
             
    }

 ?>
 <!DOCTYPE html>
 <html lang="ru">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="register_style.css">
     <link rel="stylesheet" href="../fonts/font.css">
     <title>Регистрация</title>
 </head>
 <body>
     <form action="" method="post">


     <div class="group">      
      <input type="text" name="login" id="" placeholder="Логин" required>
    </div>
      
    <div class="group">      
      <input type="password" name="password" id=""  placeholder="Пароль" required>
    </div>


         <input type="submit" value="Зарегистрироваться" name="reg">
    </form>
 </body>
 </html>