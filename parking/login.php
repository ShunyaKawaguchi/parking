<?php 
session_start();
require_once(dirname(__FILE__).'/material.php') ;
$nonce_id = nonce();
alert('login_message');
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./login.min.css">
    <title>ログイン</title>
</head>
<body>
    <div class="login">
        <div class="title">ログイン</div>
        <form method="post" action="./login_check.php">
            <label for="user">ユーザーID</label>
            <input type="text" name="user" id="user">
            <label for="password">パスワード</label>
            <input type="password" name="password" id="password">
            <input type="hidden" name="nonce_id" value="<?=$nonce_id;?>">
            <input type="submit" value="ログイン">
        </form>
    </div>
</body>
</html>

