<?php
$sql = mysqli_query($link,"SELECT * FROM `consultant` WHERE `ConsultantID`='$UserID'");
$fetch = mysqli_fetch_assoc($sql);
$accounttype = $fetch['ServiceProvider'];

$sqlconsultantcourse = mysqli_query($link,"SELECT * FROM `subjectorcourse` WHERE `status`='1'");
$fetchcourse = mysqli_fetch_assoc($sqlconsultantcourse);
$courseid = $fetchcourse['SubjectOrCourseID'];

$sqlcheckpayment = mysqli_query($link,"SELECT * FROM `coursepayment` WHERE `SubjectOrCourseID`='$courseid' AND `ConsultantID`='$UserID'");
$checkpayment = mysqli_num_rows($sqlcheckpayment);

$sqlgetsbtsettingsid = mysqli_query($link,"SELECT * FROM `consultantcbtsettings` WHERE  `SubjectOrCourseID`='$courseid'");
$fetchcbtsettingsid = mysqli_fetch_assoc($sqlgetsbtsettingsid);
$cbtsettingsid = $fetchcbtsettingsid['cbtsettingsID'];

$sqlgetcbtquestions = mysqli_query($link,"SELECT * FROM `consultantcbtsetquestionssettings` WHERE `cbtsettingsID`='$cbtsettingsid'");
$countquestions = mysqli_num_rows($sqlgetcbtquestions);
$fetchquestions = mysqli_fetch_assoc($sqlgetcbtquestions);
$row = 0;
do{
    $cbtsetquestionssettingsid = $fetchquestions['cbtsetquestionssettings'];
    $ans = $fetchquestions['answer'];
    $sqlgetanswers = mysqli_query($link,"SELECT * FROM `consultantcbtquestionsanswers` WHERE `cbtsetquestionssettings`='$cbtsetquestionssettingsid' AND `ConsultantID`='$UserID' AND studentAnswer = '$ans'");
    $rowgetcorrectanswer = mysqli_num_rows($sqlgetanswers);
                                                                   
    $row += $rowgetcorrectanswer;

}while($fetchquestions = mysqli_fetch_assoc($sqlgetcbtquestions));

if($row != 0 && $countquestions != 0)
{
    $percentage = $row / $countquestions;
    $totalscore = $percentage * 100;
}
else{
    $totalscore =0;  
}



if($accounttype == 'serviceprovider')
{
    echo'
    
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                            <!-- User profile -->
                            <div class="user-profile">
                                <!-- User profile image -->
                                <div class="profile-img"> <img src="../img/profile/'.$userPicture.'"alt="user" />';
                                
                                    echo $userType;
                                    
                            echo' </div>
                                <!-- User profile text-->
                                <div class="profile-text">
                                    <h5 style="color: black;"';
                                    echo $fullname;
                                    echo'</h5>
                                </div>
                            </div>
                            <!-- End User profile text-->
                            <!-- Sidebar navigation-->
                            <nav class="sidebar-nav" style="overflow-x: hidden;" id="sideBarColor">
                                <ul id="sidebarnav">
                                    <li class="nav-devider"></li>
                                    
                                    <li> 
                                        <a href="index.php" aria-expanded="false">
                                            <i class="mdi mdi-gauge" id="generalColor1"></i>
                                            <span class="hide-menu">Dashboard</span>
                                        </a>
                                    </li>
                                    
                                    <li> 
                                        <a href="owners.php"  aria-expanded="false">
                                            <i class="fa fa-group"></i>
                                            <span class="hide-menu">School Owners</span>
                                        </a>                       
                                    </li>

                                    <li> 
                                        <a href="institutionSchoolPage.php" aria-expanded="false">
                                            <i class="fa fa-institution"></i>
                                            <span class="hide-menu">Institutions/Schools</span>
                                        </a>                       
                                    </li>
                                    <li> 
                                        <a class="has-arrow waves-effect waves-dark" href="javascript:;" aria-expanded="false">
                                            <i class="fa fa-superpowers"></i>
                                            <span class="hide-menu">Consultant Config</span>
                                        </a>
                                        <ul aria-expanded="false" class="collapse">
                                        <li>
                                            <a class="generate" href="courses.php">
                                            <i style="color:'.$PrimaryColor.'"';  echo' class="fa fa-ravelry"></i>
                                                <span style="margin-left: 5px;">Courses</span>
                                            </a>
                                        </li>
                                            <li>
                                                    <a class="generate" href="admincbtSetting.php">
                                                    <i style="color:'.$PrimaryColor.'"';  echo' class="fa fa-bar-chart-o"></i>
                                                        <span style="margin-left: 5px;">CBT Settings</span>
                                                    </a>
                                            </li>
                                            <li><a href="admincbtResult.php"  href="javascript:;"  aria-expanded="false"><i style="color:'.$PrimaryColor.'"';  echo'  class="fa fa-list-alt" aria-hidden="true"></i> Result</a></li>
                                            <li>
                                                <a class="generate" href="setelearning.php">
                                                <i style="color:'.$PrimaryColor.'"';  echo' class="fa  fa-desktop"></i>
                                                    <span style="margin-left: 5px;">E-Learning Settings</span>
                                                </a>
                                            </li>
                                         
                                        </ul>
                                    </li>

                                    <li> 
                                        <a class="has-arrow waves-effect waves-dark" href="javascript:;" aria-expanded="false">
                                            <i class="fa fa-share-alt"></i>
                                            <span class="hide-menu">Pin Management</span>
                                        </a>
                                        <ul aria-expanded="false" class="collapse">
                                            <li>
                                                <a class="generate" href="generatePin.php" >
                                                <i style="color: '.$PrimaryColor.'"';
                                                    echo' class="fa fa-share-alt"></i>
                                                    <span style="margin-left: 5px;">Generate Pin</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="generate" href="orderHistory.php">
                                                <i style="color: '.$PrimaryColor.'"';
                                                    echo' class="fa fa-history"></i>
                                                    <span style="margin-left: 5px;">Order History</span>
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a class="generate" href="manageAllPins.php">
                                                    <i style="color:'.$PrimaryColor.'"';  echo' class="fa fa-share-alt"></i>
                                                    <span style="margin-left: 5px;">Manage All Pins</span>
                                                </a>
                                            </li>
                                    
                                            <li>
                                            <a class="generate" href="manageAllPins.php">
                                                <i style="color:'.$PrimaryColor.'"';  echo' class="fa fa-share-alt"></i>
                                                <span style="margin-left: 5px;">Manage All Pins</span>
                                            </a>
                                        </li>
                                        </ul>
                                    </li>
                                    
                                    <li> 
                                        <a class="has-arrow waves-effect waves-dark" href="javascript:;" aria-expanded="false">
                                            <i class="fa fa-gears"></i>
                                            <span class="hide-menu">Settings</span>
                                        </a>
                                        <ul aria-expanded="false" class="collapse">
                                            <li>
                                                <a id="pe1" class="generate" href="profile.php" >
                                                <i style="color:'.$PrimaryColor.'"';  echo' class="fa fa-user-circle-o"></i>
                                                    <span style="margin-left: 5px;">Account</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a id="pe1" class="generate" href="consultantCustomization.php">
                                                <i style="color:'.$PrimaryColor.'"';  echo' class="fa fa-gear"></i>
            
                                                    <span style="margin-left: 5px;">Customization</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    
                                </ul>

                                <span style="bottom: 0; margin-left: 10px; position: absolute;">
                                    <a href="../login/login.html">
                                        <i class="fa fa-power-off" id="generalColor"></i>
                                        <span class="hide-menu" id="generalColor">Logout</span>
                                    </a>
                                </span>
                            </nav>
                            <!-- End Sidebar navigation -->
                        </div>
                        <!-- End Sidebar scroll-->
                ';



}
else if($checkpayment == "0")
{


    echo'
    
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
                    <!-- User profile -->
                    <div class="user-profile">
                        <!-- User profile image -->
                        <div class="profile-img"> <img src="../img/profile/'.$userPicture.'"alt="user" />';
                        
                            echo $userType;
                            
                    echo' </div>
                        <!-- User profile text-->
                        <div class="profile-text">
                            <h5 style="color: black;"';
                            echo $fullname;
                            echo'</h5>
                        </div>
                    </div>
                    <!-- End User profile text-->
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav" style="overflow-x: hidden;" id="sideBarColor">
                        <ul id="sidebarnav">
                            <li class="nav-devider"></li>
                            
                            <li> 
                                <a href="javascript:void(0)" aria-expanded="false">
                                    <i class="mdi mdi-gauge" id="generalColor1"></i>
                                    <span class="hide-menu">Dashboard</span>
                                </a>
                            </li>
                            
                            <li> 
                                <a href="javascript:void(0)" aria-expanded="false" >
                                    <i class="fa fa-group"></i>
                                    <span class="hide-menu">School Owners</span>
                                </a>                       
                            </li>

                            <li> 
                                <a href="javascript:void(0)" aria-expanded="false">
                                    <i class="fa fa-institution"></i>
                                    <span class="hide-menu">Institutions/Schools</span>
                                </a>                       
                            </li>

                        
                          
                                <li>
                                        <a class="generate" href="javascript:void(0)">
                                        <i style="color:'.$PrimaryColor.'"';  echo' class="fa fa-bar-chart-o"></i>
                                            <span style="margin-left: 5px;">CBT</span>
                                        </a>
                                </li>
                                <li>
                                    <a class="generate" href="studentfirstelearning.php">
                                    <i style="color:'.$PrimaryColor.'"';  echo' class="fa  fa-desktop"></i>
                                        <span style="margin-left: 5px;">E-Learning</span>
                                    </a>
                                </li>
                                <li>
                                <a class="generate" href="javascript:void(0)">
                                <i style="color:'.$PrimaryColor.'"';  echo' class="fa fa-file-pdf-o"></i>
                                    <span style="margin-left: 5px;">Certificate</span>
                                </a>
                            </li>
                             
                           
                        

                            <li> 
                                <a class="has-arrow waves-effect waves-dark" href="javascript:;" aria-expanded="false">
                                    <i class="fa fa-share-alt"></i>
                                    <span class="hide-menu">Pin Management</span>
                                </a>
                                <ul aria-expanded="false" class="collapse">
                                    <li>
                                        <a class="generate" href="javascript:void(0)" >
                                        <i style="color: '.$PrimaryColor.'"';
                                            echo' class="fa fa-share-alt"></i>
                                            <span style="margin-left: 5px;">Generate Pin</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="generate" href="javascript:void(0)">
                                        <i style="color: '.$PrimaryColor.'"';
                                            echo' class="fa fa-history"></i>
                                            <span style="margin-left: 5px;">Order History</span>
                                        </a>
                                    </li>
                                    
                                    <li>
                                        <a class="generate" href="javascript:void(0)">
                                            <i style="color:'.$PrimaryColor.'"';  echo' class="fa fa-share-alt"></i>
                                            <span style="margin-left: 5px;">Manage All Pins</span>
                                        </a>
                                    </li>
        
                                    <li>
                                    <a class="generate" href="javascript:void(0)">
                                        <i style="color:'.$PrimaryColor.'"';  echo' class="fa fa-share-alt"></i>
                                        <span style="margin-left: 5px;">Manage All Pins</span>
                                    </a>
                                </li>
                                </ul>
                            </li>
                            
                            <li> 
                                <a class="has-arrow waves-effect waves-dark" href="javascript:;" aria-expanded="false">
                                    <i class="fa fa-gears"></i>
                                    <span class="hide-menu">Settings</span>
                                </a>
                                <ul aria-expanded="false" class="collapse">
                                    <li>
                                        <a id="pe1" class="generate" href="javascript:void(0)" >
                                        <i style="color:'.$PrimaryColor.'"';  echo' class="fa fa-user-circle-o"></i>
                                            <span style="margin-left: 5px;">Account</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a id="pe1" class="generate" href="javascript:void(0)">
                                        <i style="color:'.$PrimaryColor.'"';  echo' class="fa fa-gear"></i>
    
                                            <span style="margin-left: 5px;">Customization</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            
                        </ul>

                        <span style="bottom: 0; margin-left: 10px; position: absolute;">
                            <a href="../login/login.html">
                                <i class="fa fa-power-off" id="generalColor"></i>
                                <span class="hide-menu" id="generalColor">Logout</span>
                            </a>
                        </span>
                    </nav>
                    <!-- End Sidebar navigation -->
                </div>
                <!-- End Sidebar scroll-->
        ';


}
else if($checkpayment > "0" && $totalscore < 70)
{


    echo'
    
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
                    <!-- User profile -->
                    <div class="user-profile">
                        <!-- User profile image -->
                        <div class="profile-img"> <img src="../img/profile/'.$userPicture.'"alt="user" />';
                        
                            echo $userType;
                            
                    echo' </div>
                        <!-- User profile text-->
                        <div class="profile-text">
                            <h5 style="color: black;"';
                            echo $fullname;
                            echo'</h5>
                        </div>
                    </div>
                    <!-- End User profile text-->
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav" style="overflow-x: hidden;" id="sideBarColor">
                        <ul id="sidebarnav">
                            <li class="nav-devider"></li>
                            
                            <li> 
                                <a href="javascript:void(0)" aria-expanded="false">
                                    <i class="mdi mdi-gauge" id="generalColor1"></i>
                                    <span class="hide-menu">Dashboard</span>
                                </a>
                            </li>
                            
                            <li> 
                                <a href="javascript:void(0)" aria-expanded="false" >
                                    <i class="fa fa-group"></i>
                                    <span class="hide-menu">School Owners</span>
                                </a>                       
                            </li>

                            <li> 
                                <a href="javascript:void(0)" aria-expanded="false">
                                    <i class="fa fa-institution"></i>
                                    <span class="hide-menu">Institutions/Schools</span>
                                </a>                       
                            </li>
                                            
                                <li>
                                        <a class="generate" href="cbtSettings.php">
                                        <i style="color:'.$PrimaryColor.'"';  echo' class="fa fa-bar-chart-o"></i>
                                            <span style="margin-left: 5px;">CBT</span>
                                        </a>
                                </li>
                                <li>
                                    <a class="generate" href="studentfirstelearning.php">
                                    <i style="color:'.$PrimaryColor.'"';  echo' class="fa  fa-desktop"></i>
                                        <span style="margin-left: 5px;">E-Learning</span>
                                    </a>
                                </li>
                                <li>
                                <a class="generate" href="javascript:void(0)">
                                <i style="color:'.$PrimaryColor.'"';  echo' class="fa fa-file-pdf-o"></i>
                                    <span style="margin-left: 5px;">Certificate</span>
                                </a>
                            </li>

                            <li> 
                                <a class="has-arrow waves-effect waves-dark" href="javascript:;" aria-expanded="false">
                                    <i class="fa fa-share-alt"></i>
                                    <span class="hide-menu">Pin Management</span>
                                </a>
                                <ul aria-expanded="false" class="collapse">
                                    <li>
                                        <a class="generate" href="javascript:void(0)" >
                                        <i style="color: '.$PrimaryColor.'"';
                                            echo' class="fa fa-share-alt"></i>
                                            <span style="margin-left: 5px;">Generate Pin</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="generate" href="javascript:void(0)">
                                        <i style="color: '.$PrimaryColor.'"';
                                            echo' class="fa fa-history"></i>
                                            <span style="margin-left: 5px;">Order History</span>
                                        </a>
                                    </li>
                                    
                                    <li>
                                        <a class="generate" href="javascript:void(0)">
                                            <i style="color:'.$PrimaryColor.'"';  echo' class="fa fa-share-alt"></i>
                                            <span style="margin-left: 5px;">Manage All Pins</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="generate" href="javascript:void(0)">
                                        <i style="color:'.$PrimaryColor.'"';  echo' class="fa fa-share-alt"></i>
                                            <span style="margin-left: 5px;">CBT</span>
                                        </a>
                                    </li>
                                    <li>
                                    <a class="generate" href="">
                                    <i style="color:'.$PrimaryColor.'"';  echo' class="fa fa-share-alt"></i>
                                        <span style="margin-left: 5px;">E-Learning Settings</span>
                                    </a>
                                </li>
                                    <li>
                                    <a class="generate" href="javascript:void(0)">
                                    <i style="color:'.$PrimaryColor.'"';  echo' class="fa fa-share-alt"></i>
                                        <span style="margin-left: 5px;">Courses</span>
                                    </a>
                                </li>
                                    <li>
                                    <a class="generate" href="javascript:void(0)">
                                        <i style="color:'.$PrimaryColor.'"';  echo' class="fa fa-share-alt"></i>
                                        <span style="margin-left: 5px;">Manage All Pins</span>
                                    </a>
                                </li>
                                </ul>
                            </li>
                            
                            <li> 
                                <a class="has-arrow waves-effect waves-dark" href="javascript:;" aria-expanded="false">
                                    <i class="fa fa-gears"></i>
                                    <span class="hide-menu">Settings</span>
                                </a>
                                <ul aria-expanded="false" class="collapse">
                                    <li>
                                        <a id="pe1" class="generate" href="javascript:void(0)" >
                                        <i style="color:'.$PrimaryColor.'"';  echo' class="fa fa-user-circle-o"></i>
                                            <span style="margin-left: 5px;">Account</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a id="pe1" class="generate" href="javascript:void(0)">
                                        <i style="color:'.$PrimaryColor.'"';  echo' class="fa fa-gear"></i>
    
                                            <span style="margin-left: 5px;">Customization</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            
                        </ul>

                        <span style="bottom: 0; margin-left: 10px; position: absolute;">
                            <a href="../login/login.html">
                                <i class="fa fa-power-off" id="generalColor"></i>
                                <span class="hide-menu" id="generalColor">Logout</span>
                            </a>
                        </span>
                    </nav>
                    <!-- End Sidebar navigation -->
                </div>
                <!-- End Sidebar scroll-->
        ';


}
else
{
    echo'
    
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                            <!-- User profile -->
                            <div class="user-profile">
                                <!-- User profile image -->
                                <div class="profile-img"> <img src="../img/profile/'.$userPicture.'"alt="user" />';
                                
                                    echo $userType;
                                    
                            echo' </div>
                                <!-- User profile text-->
                                <div class="profile-text">
                                    <h5 style="color: black;"';
                                    echo $fullname;
                                    echo'</h5>
                                </div>
                            </div>
                            <!-- End User profile text-->
                            <!-- Sidebar navigation-->
                            <nav class="sidebar-nav" style="overflow-x: hidden;" id="sideBarColor">
                                <ul id="sidebarnav">
                                    <li class="nav-devider"></li>
                                    
                                    <li> 
                                        <a href="index.php" aria-expanded="false">
                                            <i class="mdi mdi-gauge" id="generalColor1"></i>
                                            <span class="hide-menu">Dashboard</span>
                                        </a>
                                    </li>
                                    
                                    <li> 
                                        <a href="owners.php"  aria-expanded="false">
                                            <i class="fa fa-group"></i>
                                            <span class="hide-menu">School Owners</span>
                                        </a>                       
                                    </li>

                                    <li> 
                                        <a href="institutionSchoolPage.php" aria-expanded="false">
                                            <i class="fa fa-institution"></i>
                                            <span class="hide-menu">Institutions/Schools</span>
                                        </a>                       
                                    </li>
                                                        
                                    <li>
                                            <a class="generate" href="cbtSettings.php">
                                            <i style="color:'.$PrimaryColor.'"';  echo' class="fa fa-bar-chart-o"></i>
                                                <span style="margin-left: 5px;">CBT</span>
                                            </a>
                                    </li>
                                    <li>
                                        <a class="generate" href="studentfirstelearning.php">
                                        <i style="color:'.$PrimaryColor.'"';  echo' class="fa  fa-desktop"></i>
                                            <span style="margin-left: 5px;">E-Learning</span>
                                        </a>
                                    </li>
                                    <li>
                                    <a class="generate" href="courses.php">
                                    <i style="color:'.$PrimaryColor.'"';  echo' class="fa fa-file-pdf-o"></i>
                                        <span style="margin-left: 5px;">Certificate</span>
                                    </a>
                                </li>

                                    <li> 
                                        <a class="has-arrow waves-effect waves-dark" href="javascript:;" aria-expanded="false">
                                            <i class="fa fa-share-alt"></i>
                                            <span class="hide-menu">Pin Management</span>
                                        </a>
                                        <ul aria-expanded="false" class="collapse">
                                            <li>
                                                <a class="generate" href="generatePin.php" >
                                                <i style="color: '.$PrimaryColor.'"';
                                                    echo' class="fa fa-share-alt"></i>
                                                    <span style="margin-left: 5px;">Generate Pin</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a class="generate" href="orderHistory.php">
                                                <i style="color: '.$PrimaryColor.'"';
                                                    echo' class="fa fa-history"></i>
                                                    <span style="margin-left: 5px;">Order History</span>
                                                </a>
                                            </li>
                                            
                                            <li>
                                                <a class="generate" href="manageAllPins.php">
                                                    <i style="color:'.$PrimaryColor.'"';  echo' class="fa fa-share-alt"></i>
                                                    <span style="margin-left: 5px;">Manage All Pins</span>
                                                </a>
                                            </li>
                                    
                                            <li>
                                            <a class="generate" href="manageAllPins.php">
                                                <i style="color:'.$PrimaryColor.'"';  echo' class="fa fa-share-alt"></i>
                                                <span style="margin-left: 5px;">Manage All Pins</span>
                                            </a>
                                        </li>
                                        </ul>
                                    </li>
                                    
                                    <li> 
                                        <a class="has-arrow waves-effect waves-dark" href="javascript:;" aria-expanded="false">
                                            <i class="fa fa-gears"></i>
                                            <span class="hide-menu">Settings</span>
                                        </a>
                                        <ul aria-expanded="false" class="collapse">
                                            <li>
                                                <a id="pe1" class="generate" href="profile.php" >
                                                <i style="color:'.$PrimaryColor.'"';  echo' class="fa fa-user-circle-o"></i>
                                                    <span style="margin-left: 5px;">Account</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a id="pe1" class="generate" href="consultantCustomization.php">
                                                <i style="color:'.$PrimaryColor.'"';  echo' class="fa fa-gear"></i>
            
                                                    <span style="margin-left: 5px;">Customization</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    
                                </ul>

                                <span style="bottom: 0; margin-left: 10px; position: absolute;">
                                    <a href="../login/login.html">
                                        <i class="fa fa-power-off" id="generalColor"></i>
                                        <span class="hide-menu" id="generalColor">Logout</span>
                                    </a>
                                </span>
                            </nav>
                            <!-- End Sidebar navigation -->
                        </div>
                        <!-- End Sidebar scroll-->
                ';



}



?>

