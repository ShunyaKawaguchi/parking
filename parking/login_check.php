<?php 
session_start();

if(($_POST["nonce_id"]) == $_SESSION["nonce_id"]){
    if($_POST['user']=='drh-parking' && $_POST['password']=='drh-parking'){
        $_SESSION['login'] = 'on';
        header("Location: ./admin.php");
        exit;
    }else{
        $_SESSION["login_message"] = "ユーザーIDまたはパスワードが違います。";
    }
}

header("Location: ./login.php");
exit;