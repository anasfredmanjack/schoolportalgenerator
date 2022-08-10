<?php
 include ('../../config/config.php');

 $InstitutionID = $_POST['InstitutionID'];
 $anasboardmemberid = $_POST['anasboardmemberid'];

 //===========================query to fetch data======================
$sql = mysqli_query($link,"SELECT * FROM `school_board` WHERE InstitutionID ='$InstitutionID' AND board_id='$anasboardmemberid'");
$fetch = mysqli_fetch_assoc($sql);
//========================================fetch query end================== 

echo"




            <div class='row'>
                                                                
            <!--/span-->
            <div class='col-md-12'>
            <div class='form-group'>
            <label>Member's Name</label>
            <input type='text' name='anaseditmembername' id='anaseditmembername'  class='form-control' value=".$fetch['board_name']." required>
            </div>
            </div>


            <div class='col-md-12'>
            <div class='form-group'>
            <label>Member's title</label>
                <textarea rows='2' name='anaseditmembertitle' id='anaseditmembertitle' placeholder='Member Title' 
                class='form-control form-control-line' required>".$fetch['board_title']."</textarea>
            </div>
            </div>
            <!--/span-->

            </div>





            <div class='row'>
            <div class='col-md-12'>
            <div class='form-group'>
            <label>Member's Image</label>
            <input style='background:#F8F8F8; color:#999999; width:100%; font-size: 18px; border: 1px solid #CCCCCC;' name='anaseditboardmemberimage' 
            type='file' class='form-control-file' id='anaseditmemberimage' >

            </div>
            </div>

            </div>	



";










?>