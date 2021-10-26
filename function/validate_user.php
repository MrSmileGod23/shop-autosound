<?php
session_start();
include "./servers/bdconnect.php";
$id=-1;
if (isset($_SESSION["logged"]) && $_SESSION["logged"]=="1"){
    $id=$_SESSION["userid"];
    $user_query=mysqli_query($link,"SELECT * FROM users WHERE id='".$id."'");
    $user=mysqli_fetch_array($user_query);
}
?>