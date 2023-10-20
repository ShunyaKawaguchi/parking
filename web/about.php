<?php 
require_once(dirname(__FILE__).'/../database/connect-databese.php');
//必要機能呼び出し
require_once('../hotel/material.php') ;
$hiroof = about_hiroof_web();
$common = about_common_web();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>駐車場空き状況</title>
</head>
<body>
    <p>定型駐車場：大和ハウスパーキング空き状況<br>
        【ハイルーフ車】空車：<?=$hiroof;?>台 / 20台<br>
        【普通車】空車：<?=$common;?>台 / 20台
    </p>
</body>
</html>

<?php
//データベース認証
require_once(dirname(__FILE__).'/../database/disconnect-database.php');
?>