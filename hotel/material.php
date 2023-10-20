<?php 
function cabin_hotel(){
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
                    <div class="status_value"><?php status_hotel( $row['status'] );?></div>
                <?php else:?>
                    <div class="availability_red">×</div>
                    <div class="status_value"><?php status_hotel( $row['status'] );?></div>
                <?php endif;?>
            </div>
<?php    endwhile;
    }
}

function status_hotel( $status ){
    if($status == 0){
        echo '空車';
    }elseif($status == 1){
        echo '宿泊';
    }elseif($status == 2){
        echo '時間貸し';
    }
}

function about(){
    about_hiroof();
    about_common();
    about_plane();
}

function about_hiroof(){
    $hiroof = 20;
    $hiroof_stay = 0;
    $hiroof_temporary = 0;

    for ($cabin = 1; $cabin <= 20; $cabin++) {
        $sql = "SELECT * FROM cabins WHERE id = ?";
        global $parking_access;
        $stmt = $parking_access->prepare($sql);
        $stmt->bind_param("i", $cabin); 
        $stmt->execute();
        $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
            if( $row["status"] == 1 ){
                $hiroof_stay++;
            }elseif($row["status"] == 2){
                $hiroof_temporary++;
            }
        }
    }
    $hiroof_vacant = $hiroof -  $hiroof_stay - $hiroof_temporary;
    $hiroof_full = $hiroof_stay + $hiroof_temporary;

    echo "<div class='class'>【ハイルーフ】空車 : ".$hiroof_vacant."台 / 入庫中 : ".$hiroof_full."台 ( 宿泊：".$hiroof_stay."台 / 時間貸し：".$hiroof_temporary."台 )</div>";

}

function about_common(){
    $common = 20;
    $common_stay = 0;
    $common_temporary = 0;

    for ($cabin = 21; $cabin <= 40; $cabin++) {
        $sql = "SELECT * FROM cabins WHERE id = ?";
        global $parking_access;
        $stmt = $parking_access->prepare($sql);
        $stmt->bind_param("i", $cabin); 
        $stmt->execute();
        $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
            if( $row["status"] == 1 ){
                $common_stay++;
            }elseif($row["status"] == 2){
                $common_temporary++;
            }
        }
    }
    $common_vacant = $common -  $common_stay - $common_temporary;
    $common_full = $common_stay + $common_temporary;

    echo "<div class='class'>【普通車】空車 : ".$common_vacant."台 / 入庫中 : ".$common_full."台 ( 宿泊：".$common_stay."台 / 時間貸し：".$common_temporary."台 )</div>";

}

function about_plane(){
    $plane = 4;
    $plane_stay = 0;
    $plane_temporary = 0;

    for ($cabin = 41; $cabin <= 44; $cabin++) {
        $sql = "SELECT * FROM cabins WHERE id = ?";
        global $parking_access;
        $stmt = $parking_access->prepare($sql);
        $stmt->bind_param("i", $cabin); 
        $stmt->execute();
        $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
            if( $row["status"] == 1 ){
                $plane_stay++;
            }elseif($row["status"] == 2){
                $plane_temporary++;
            }
        }
    }
    $plane_vacant = $plane -  $plane_stay - $plane_temporary;
    $plane_full = $plane_stay + $plane_temporary;

    echo "<div class='class'>【平置き】空車 : ".$plane_vacant."台 / 入庫中 : ".$plane_full."台 ( 宿泊：".$plane_stay."台 / 時間貸し：".$plane_temporary."台 )</div>";

}

function about_hiroof_web(){
    $hiroof = 20;
    $hiroof_stay = 0;
    $hiroof_temporary = 0;

    for ($cabin = 1; $cabin <= 20; $cabin++) {
        $sql = "SELECT * FROM cabins WHERE id = ?";
        global $parking_access;
        $stmt = $parking_access->prepare($sql);
        $stmt->bind_param("i", $cabin); 
        $stmt->execute();
        $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
            if( $row["status"] == 1 ){
                $hiroof_stay++;
            }elseif($row["status"] == 2){
                $hiroof_temporary++;
            }
        }
    }
    $hiroof_vacant = $hiroof -  $hiroof_stay - $hiroof_temporary;

    return $hiroof_vacant;

}

function about_common_web(){
    $common = 20;
    $common_stay = 0;
    $common_temporary = 0;

    for ($cabin = 21; $cabin <= 40; $cabin++) {
        $sql = "SELECT * FROM cabins WHERE id = ?";
        global $parking_access;
        $stmt = $parking_access->prepare($sql);
        $stmt->bind_param("i", $cabin); 
        $stmt->execute();
        $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
            if( $row["status"] == 1 ){
                $common_stay++;
            }elseif($row["status"] == 2){
                $common_temporary++;
            }
        }
    }
    $common_vacant = $common -  $common_stay - $common_temporary;

    return $common_vacant;    
}