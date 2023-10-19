<?php
session_start();
//データベース認証
require_once(dirname(__FILE__).'/../database/connect-databese.php');
//必要機能呼び出し
require_once(dirname(__FILE__).'/material.php') ;
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Availability.min.css">
    <script src='../js/global.min.js'></script>
    <title>駐車車室状況</title>
</head>
<body>
    <div class="header">
        <div class="title">駐車場車室状況</div>
    </div>
    <div class="about">
        <?php about(); ?>
    </div>
    <div class="main">
        <input type='hidden' name='nonce_id' value="<?=$nonce_id;?>">
        <div class="cabins">
        <?php cabin_hotel(); ?>
        </div>
    </div>
</body>
</html>

<?php
//データベース認証
require_once(dirname(__FILE__).'/../database/disconnect-database.php');
?>