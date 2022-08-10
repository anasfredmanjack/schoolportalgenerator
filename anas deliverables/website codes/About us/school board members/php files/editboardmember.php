<?php
 include ('../../config/config.php');

 $anasboardmemberid = $_POST['anasboardmemberid'];
 $anaseditmembertitle = $_POST['anaseditmembertitle'];
 $anaseditmembername = $_POST['anaseditmembername'];

 if($anaseditmembertitle == ''){

    echo'
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                   Fields Must Not be empty
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                         </button> </div> ';


 }else if( $anaseditmembername == ''){
            echo'
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                          Fields Must Not be empty
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                  </button>
        </div>';

 }
 else{



if(!empty($_FILES["anasfilesend"]["name"]))
{
//File uplaod configuration
$result = 0;
$uploadDir = "../../../website/demo/images/boardmember/";
$fileName = time().'_'.basename($_FILES["anasfilesend"]["name"]);
$imageFileType = pathinfo($fileName,PATHINFO_EXTENSION);
$targetPath = $uploadDir. $fileName;

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
{
     
echo '<div class="alert alert-warning  fade show" role="alert">
 <div class="alert-icon"><i class="flaticon-warning"></i></div>
 <div class="alert-text">Unsupported File Format. Only png,jpeg or gif is accepted</div>
 <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
</div>';	
}
else
{
if ($_FILES["anasfilesend"]["size"] > 10000000) 
{
 echo '<div class="alert alert-warning  fade show" role="alert">
     <div class="alert-icon"><i class="flaticon-warning"></i></div>
     <div class="alert-text">Sorry, File Size is too much. Kindly get another file and re-upload</div>
     <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
 </div>';
}
else
{
 //Upload file to server
 if(@move_uploaded_file($_FILES['anasfilesend']['tmp_name'], $targetPath))
 {

     //Get current user ID from session
 
     //Update picture name in the database
     $sqlUploadUserImage = ("UPDATE `school_board` SET `board_name`='$anaseditmembername',`board_title`='$anaseditmembertitle',`board_image`='$fileName'
      WHERE `board_id`='$anasboardmemberid'");
     $resultUploadUserImage = mysqli_query($link, $sqlUploadUserImage);
                     
     //Update status
     if($resultUploadUserImage)
     {
            

         echo '<div style="margin:20px;" class="alert alert-success  fade show" role="alert">
         <div class="alert-icon"><i class="flaticon2-check-mark"></i></div>
         <div class="alert-text">Great! Board Member  Successfuly Updated
         <div class="alert-close" style="position:relative; bottom:10px;">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true"><i class="fa fa-close"></i></span>
         </button>
         </div>
         </div>
        
         </div>';
     }

 }
}
}
}
else
{
$sqlUploadUserImage = ("UPDATE `school_board` SET `board_name`='$anaseditmembername',`board_title`='$anaseditmembertitle'
WHERE `board_id`='$anasboardmemberid'");
$resultUploadUserImage = mysqli_query($link, $sqlUploadUserImage);

echo '<div style="margin:20px;" class="alert alert-success  fade show" role="alert">
<div class="alert-icon"><i class="flaticon2-check-mark"></i></div>
<div class="alert-text">Great! Board Member  Successfuly Updated
<div class="alert-close" style="position:relative; bottom:10px;">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true"><i class="fa fa-close"></i></span>
</button>
</div>
</div>

</div>';


}
 



 }

 

 ?>