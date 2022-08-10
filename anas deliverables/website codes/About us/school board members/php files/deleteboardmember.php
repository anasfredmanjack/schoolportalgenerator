<?php
include ('../../config/config.php');
$anasboardmemberid = $_POST['anasboardmemberid'];
$InstitutionID = $_POST['InstitutionID'];


$sqltodeletemember = mysqli_query($link,"DELETE FROM `school_board` WHERE `board_id`='$anasboardmemberid' AND `InstitutionID`='$InstitutionID'");

if($sqltodeletemember){
    echo '<div class="alert alert-success alert-rounded text-center" style="margin:10px;"> <i class="ti-info-alt"></i>Board Member Deleted Successfully
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>

    </div>';


}
else{


    echo("Error deleting: " . $mysqli -> error);
}
















?>