<?php
session_start();
//データベース認証
require_once(dirname(__FILE__).'/../database/connect-databese.php');
//必要機能呼び出し
require_once(dirname(__FILE__).'/material.php') ;
//nonce
$nonce_id = nonce();
//ログインチェック
is_login();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./admin.min.css">
    <script src='../js/global.min.js'></script>
    <title>駐車場車室管理</title>
    <?php alert('message');?>
</head>
<body>
    <form method="post" action="./logout.php">
        <div class="header">
            <div class="title">駐車場車室管理</div>
            <button name='logout' class="logout">ログアウト→</button>
        </div>
    </form>
    <div class="main">
        <form method="post" action="./update_data.php">
            <input type='hidden' name='nonce_id' value="<?=$nonce_id;?>">
            <div class="cabins">
                <?php cabin(); ?>
            </div>
        </form>
    </div>
</body>
</html>

<?php
//データベース認証
require_once(dirname(__FILE__).'/../database/disconnect-database.php');
?>