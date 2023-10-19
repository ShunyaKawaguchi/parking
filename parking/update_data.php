<?php 
session_start();
//データベース認証
require_once(dirname(__FILE__).'/../database/connect-databese.php');

if($_POST['nonce_id'] == $_SESSION['nonce_id']){
    if(isset($_POST['stay'])){
        $status = 1;
        $id = $_POST['stay'];
    }elseif(isset($_POST['temporary'])){
        $status = 2;
        $id = $_POST['temporary'];
    }elseif(isset($_POST['leave'])){
        $status = 0;
        $id = $_POST['leave'];
    }else{
        $_SESSION['message'] = 'エラーが発生しました。やり直してください。';
        header("Location: ./admin.php");
        exit;
    }

    $sql = 'UPDATE cabins SET status = ? WHERE id = ?';
    $stmt = $parking_access->prepare($sql);
    $stmt->bind_param('ii', $status,$id);

    // クエリの実行とエラーハンドリング
    if ($stmt->execute()) {
        $stmt->close();
        header("Location: ./admin.php");
    exit;
    }
    
}else{
    $_SESSION['message'] = '不正な遷移です。やり直してください。';
    header("Location: ./admin.php");
    exit;
}

//データベース認証
require_once(dirname(__FILE__).'/../database/disconnect-database.php');
