<?php 
include("models/commons.php");

$model = new Commons();
if(isset($_SESSION['userId']))
{
    require_once('pages/index.php');
}else{
    require_once('login.php');
    //header('location:login.php');
}

?>