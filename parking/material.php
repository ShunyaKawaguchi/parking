<?php 
//nonce
function nonce(){
    $nonce_id = generateRandomString();
    $_SESSION['nonce_id'] = $nonce_id;
    return $nonce_id;
}

function generateRandomString($length = 10) {
    $bytes = random_bytes($length);
    return bin2hex($bytes);
}

//アラート
function alert($alert_name){
    if(!empty($_SESSION["$alert_name"])){ ?>
        <script> 
            alert("<?php echo $_SESSION["$alert_name"];?>");
        </script>
    <?php
        unset($_SESSION["$alert_name"]);
        }
}

function cabin(){
    $sql = "SELECT * FROM cabins";
    global $parking_access;
    $stmt = $parking_access->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()):?>
            <div class="cabin">
                <div class="top">
                    <div class="number"><?=$row['id']?></div>
                    <div class="type"><?=$row['type'];?></div>
                </div>
                <?php if($row['status']==0 || $row['status']==null):?>
                    <div class="availability">◯</div>
                <?php else:?>
                    <div class="availability_red">×</div>
                    <div class="status_red"><?php status( $row['status'] );?></div>
                <?php endif;?>
                <div class="status">
                    <?php create_button($row['id'],$row['status']); ?>
                </div>
            </div>
<?php    endwhile;
    }
}

function create_button($id,$status){
    if($status==0 || $status==null){
        echo "<button name='stay' value=".$id.">宿泊</button>";
        echo "<button name='temporary' value=".$id.">時間貸し</button>";
    }else{
        echo "<button name='leave' value=".$id.">出庫</button>";
    }
}

function status( $status ){
    if($status == 0){
        echo '';
    }elseif($status == 1){
        echo '宿泊';
    }elseif($status == 2){
        echo '時間貸し';
    }
}

function is_login(){
    if(isset($_SESSION['login']) && $_SESSION['login']== 'on'){
        return true;
    }else{
        $_SESSION["login_message"] = "ログインしてください。";
        header("Location: ./login.php");
        exit;
    }
}