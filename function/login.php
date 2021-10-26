<?php
error_reporting(0);
session_start();
include("../servers/bdconnect.php");

if(isset($_SESSION["logged"]) && $_SESSION["logged"] =="1")
header("Location: ../index.php");

if(isset($_POST["auth"])){
    $login=$_POST["login"];
    $password=$_POST["password"];
    $dataSent=$_POST["dataSent"];
    $hasErrors= false;
    if($dataSent==1){
        $q=mysqli_query($link,"SELECT * FROM users WHERE login='".$login."'");
        $nq=mysqli_num_rows($q);
        if($nq==0){
            $hasErrors=true;
        }
        elseif($nq==1){
            $mfq=mysqli_fetch_array($q);
            $hash=$mfq["hash"];
            if(password_verify($password,$hash)){

                $_SESSION["logged"] = 1;
                $_SESSION["userid"] = $mfq[0];
                header("Location:../index.php");
            }
            }
            else $hasErrors=true;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login_style.css">
     <link rel="stylesheet" href="../fonts/font.css">
    <title>Авторизация</title>
</head>
<body>
    <form method="POST">

    <div class="group">      
      <input type="text" name="login"  placeholder="Логин" required>
    </div>
      
    <div class="group">      
      <input type="password" name="password"   placeholder="Пароль" required>
    </div>
        <input type="hidden" name="dataSent" value="1">
        <input type="submit" value="Войти" name="auth">
    </form>
<?php
    if($hasErrors){
        echo "Вы ввели неправильный логин или пароль";
    }
    ?>
</body>
</html>