<?php 
session_start();

if(isset($_POST["logout"])){
    unset($_SESSION["login"]);
}

header("Location: ./login.php");
exit;