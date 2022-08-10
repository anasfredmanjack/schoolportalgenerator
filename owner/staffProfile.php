<?php  include ('../controller/session/session-checker-owner.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="../img/favicon/<?php echo $Favicon; ?>">
        <title>Profile | <?php echo $fullname; ?></title>
        <!-- Bootstrap Core CSS -->
        <link href="../library/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!--This page css - Morris CSS -->
        <link href="../library/plugins/morrisjs/morris.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="../css/style.php" rel="stylesheet">
        <link href="../css/blueOwner.php" rel="stylesheet">
        <!-- You can change the theme colors from here -->
    
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="fix-header card-no-border logo-center">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar chimaPrimaryColor">
        <?php include ('../includes/header-owner.php'); ?>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- Sidebar navigation-->
         <aside class="left-sidebar">
                               
            <?php include ('../includes/menu-owner.php'); ?>
          </aside>
        <!-- Sidebar navigation-->
        <!-- End Sidebar navigation -->
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-10 align-self-center">
                    <h2 class="text-themecolor" style="color: black; font-weight: 500;">Staff Profile</h2>
                </div>
                <div class="col-md-2 align-self-center">
                    
                </div>
            <!--   <div class="">
                    <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                </div>-->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <?php 
                                    $id = $_GET['id'];

                                    $sqlStaffInfo = ("SELECT * FROM staff WHERE StaffID = '$id'");
                                    $resultStaffInfo = mysqli_query($link, $sqlStaffInfo); 
                                    $rowGetStaffInfo = mysqli_fetch_assoc($resultStaffInfo); 
                                    $row_cntStaffInfo = mysqli_num_rows($resultStaffInfo);

                                    $InstitutionID = $rowGetStaffInfo['InstitutionID'];

                                ?>
                                <center class="m-t-30"> <img src="../img/profile/<?php echo $rowGetStaffInfo['StaffPhoto']; ?>" class="img-circle" width="150" />
                                    <h4 class="card-title m-t-10" style="color: black;"><?php echo $rowGetStaffInfo['StaffFirstName'] . " " . $rowGetStaffInfo['StaffMiddleName'] . " " . $rowGetStaffInfo['StaffLastName']; ?></h4>
                                   
                                </center>
                            </div>
                            <div>
                                <hr> 
                            </div>
                            <div class="card-body">
                                <small class="text-muted">Email Address</small>
                                <h6 style="color: black;"><?php echo $rowGetStaffInfo['StaffEmail']; ?></h6>

                                <br>

                                <small class="text-muted">Date of Birth</small>
                                <h6 style="color: black;"><?php echo $rowGetStaffInfo['StaffDOB']; ?></h6>

                                <br>

                                <small class="text-muted">Address</small>
                                <h6 style="color: black;"><?php echo $rowGetStaffInfo['StaffAddress']; ?></h6>

                                <br>

                                <small class="text-muted">Telephone</small>
                                <h6><?php echo $rowGetStaffInfo['StaffPhone']; ?></h6> 
                                
                                <br>
                                
                                <small class="text-muted">State Of Origin</small>
                                <h6><?php echo $rowGetStaffInfo['StaffState']; ?></h6> 
                                
                                <br>
                                
                                <small class="text-muted">L.G.A</small>
                                <h6><?php echo $rowGetStaffInfo['StaffLga']; ?></h6> 
                                
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist" style="font-weight: 500;">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Job Description</a> </li>
                                <!--<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#promotion" role="tab">Promotion</a> </li>-->
                                <!--<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#employment" role="tab">Employment</a> </li>-->
                                <!--<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#leave" role="tab">Leave/Permission</a> </li>-->
                                <!--<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#disciplinary" role="tab">Disciplinary</a> </li>-->
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <?php 

                                    $sqlInst = ("SELECT * FROM `institution` WHERE InstitutionID = '$InstitutionID'");
                                    $resultInst = mysqli_query($link, $sqlInst);
                                    $rowGetInst = mysqli_fetch_assoc($resultInst);
                                    $row_cntInst = mysqli_num_rows($resultInst);
                                ?>
                                <!--first tab-->
                                <div class="tab-pane active" id="description" role="tabpanel">
                                    <div class="card-body">
                                        <h3 style="color: black;">Staff Details</h3>


                                        <div style="margin: 10px;">
                                            <small class="text-muted">School/Institution Name</small>
                                            <h6 style="color: black;"><?php echo $rowGetInst['InstitutionName'] . ' ' . $rowGetInst['InstitutionNameTwo']; ?></h6>
            
                                            <small class="text-muted">Grade/Faculty</small>
                                            <h6 style="color: black;">
                                                <?php
                
                                                    $id = $_GET['id'];
                
                                                    $sqlStaffdept = ("SELECT DISTINCT(ClassOrDepartmentID) FROM `courseorsubjectallocation` WHERE InstitutionID = '$InstitutionID' AND CourseOrSubjectTeacherUserID ='$id'");
                                                    $resultStaffdept = mysqli_query($link, $sqlStaffdept);
                                                    $rowGetStaffdept = mysqli_fetch_assoc($resultStaffdept);
                                                    $row_cntStaffdept = mysqli_num_rows($resultStaffdept);

                                                    if($row_cntStaffdept > 0)
                                                    {
                                                        do{
                                                            
                                                            $classdeptid = $rowGetStaffdept['ClassOrDepartmentID'];

                                                            $sqlStaffdepname = ("SELECT * FROM `classordepartment` WHERE InstitutionID ='$InstitutionID' AND ClassOrDepartmentID ='$classdeptid'");
                                                            $resultStaffdepname = mysqli_query($link, $sqlStaffdepname);
                                                            $rowGetStaffdepname = mysqli_fetch_assoc($resultStaffdepname);
                                                            $row_cntStaffdepname = mysqli_num_rows($resultStaffdepname);

                                                            if($row_cntStaffdepname > 0)
                                                            {
                                                                do{
                                                                    $facid = $rowGetStaffdepname['FacultyOrSchoolID'];

                                                                    $sqlStafffacname = ("SELECT * FROM `facultyorschool` WHERE InstitutionID ='$InstitutionID' AND FacultyOrSchoolID ='$facid'");
                                                                    $resultStafffacname = mysqli_query($link, $sqlStafffacname);
                                                                    $rowGetStafffacname = mysqli_fetch_assoc($resultStafffacname);
                                                                    $row_cntStafffacname = mysqli_num_rows($resultStafffacname);

                                                                    do{
                                                                        echo $rowGetStafffacname['FacultyOrSchoolName'] . '.' . '<br>';

                                                                    }while($rowGetStafffacname = mysqli_fetch_assoc($resultStafffacname));
                                                        
                                                                }while($rowGetStaffdepname = mysqli_fetch_assoc($resultStaffdepname));
                                                            }

                                                        }while($rowGetStaffdept = mysqli_fetch_assoc($resultStaffdept));
                                                    }

                                                
                                                ?>
                                            </h6>
            
                                            <!--<small class="text-muted">Staff Category</small>
                                            <h6 style="color: black;">Academic Staff.</h6>-->
            
                                            <small class="text-muted">Class/Department</small>
                                            <h6 style="color: black;">
                                                <?php
                                                    $id = $_GET['id'];
                
                                                    $sqlStaffdept = ("SELECT DISTINCT(ClassOrDepartmentID) FROM `courseorsubjectallocation` WHERE InstitutionID = '$InstitutionID' AND CourseOrSubjectTeacherUserID ='$id'");
                                                    $resultStaffdept = mysqli_query($link, $sqlStaffdept);
                                                    $rowGetStaffdept = mysqli_fetch_assoc($resultStaffdept);
                                                    $row_cntStaffdept = mysqli_num_rows($resultStaffdept);

                                                    if($row_cntStaffdept > 0)
                                                    {
                                                        do{
                                                            
                                                            $classdeptid = $rowGetStaffdept['ClassOrDepartmentID'];

                                                            $sqlStaffdepname = ("SELECT * FROM `classordepartment` WHERE InstitutionID ='$InstitutionID' AND ClassOrDepartmentID ='$classdeptid'");
                                                            $resultStaffdepname = mysqli_query($link, $sqlStaffdepname);
                                                            $rowGetStaffdepname = mysqli_fetch_assoc($resultStaffdepname);
                                                            $row_cntStaffdepname = mysqli_num_rows($resultStaffdepname);

                                                            if($row_cntStaffdepname > 0)
                                                            {
                                                                do{
                                                                    echo $rowGetStaffdepname['ClassOrDepartmentName'] . '.' . '<br>';
                                                        
                                                                }while($rowGetStaffdepname = mysqli_fetch_assoc($resultStaffdepname));
                                                            }

                                                        }while($rowGetStaffdept = mysqli_fetch_assoc($resultStaffdept));
                                                    }

                                                
                                                ?>
                                            </h6>
                                            
                                            <small class="text-muted">Subject/Course Teaching</small>
                                            <h6 style="color: black;">
                                                <?php
                                                    $id = $_GET['id'];
                
                                                    $sqlStaffInst = ("SELECT DISTINCT(SubjectOrCourseID) FROM `courseorsubjectallocation` WHERE InstitutionID = '$InstitutionID' AND CourseOrSubjectTeacherUserID ='$id'");
                                                    $resultStaffInst = mysqli_query($link, $sqlStaffInst);
                                                    $rowGetStaffInst = mysqli_fetch_assoc($resultStaffInst);
                                                    $row_cntStaffInst = mysqli_num_rows($resultStaffInst);

                                                    if($row_cntStaffInst > 0)
                                                    {
                                                        do{
                                                            
                                                            $subcosid = $rowGetStaffInst['SubjectOrCourseID'];

                                                            $sqlStaffsub = ("SELECT * FROM `subjectorcourse` WHERE InstitutionID ='$InstitutionID' AND SubjectOrCourseID ='$subcosid'");
                                                            $resultStaffsub = mysqli_query($link, $sqlStaffsub);
                                                            $rowGetStaffsub = mysqli_fetch_assoc($resultStaffsub);
                                                            $row_cntStaffsub = mysqli_num_rows($resultStaffsub);

                                                            if($row_cntStaffsub > 0)
                                                            {
                                                                do{
                                                                    echo $rowGetStaffsub['SubjectOrCourseTitle'] . '.' . '<br>';
                                                        
                                                                }while($rowGetStaffsub = mysqli_fetch_assoc($resultStaffsub));
                                                            }

                                                        }while($rowGetStaffInst = mysqli_fetch_assoc($resultStaffInst));
                                                    }

                                                   
                                                ?>
                                            </h6> 
                                            
                                            <small class="text-muted">Work Hour</small>
                                            <h6 style="color: black;"></h6> 

                                            <small class="text-muted">Salary</small>
                                            <h6 style="color: black;"></h6> 
                                        </div>

                                        <h3 style="color: black;">Staff Account Details</h3>

                                        <div style="margin: 10px;">
                                            <small class="text-muted">Account Name</small>
                                            <h6 style="color: black;"></h6>
            
                                            <small class="text-muted">Account Number</small>
                                            <h6 style="color: black;"></h6>
            
                                            <small class="text-muted">Bank Name</small>
                                            <h6 style="color: black;"></h6>
            
                                        </div>
                                    </div>
                                </div>
                                <!--first tab-->


                                <!--second tab-->
                                <!--<div class="tab-pane" id="promotion" role="tabpanel">-->
                                <!--    <div class="card-body">-->
                                <!--        <div class="table-responsive">-->
                                <!--            <table class="table">-->
                                <!--                <thead>-->
                                <!--                    <tr>                                                       -->
                                <!--                        <th style="font-weight: 600;">Previous Postion</th>-->
                                <!--                        <th style="font-weight: 600;">Current Postion</th>-->
                                <!--                        <th style="font-weight: 600;">Date</th>-->
                                <!--                    </tr>-->
                                <!--                </thead>-->
                                <!--                <tbody style="font-size: 14px;">-->
                                <!--                    <tr>-->
                                <!--                        <td>Mathematics Teacher</td>-->
                                <!--                        <td>Math's and Physic Teacher SS1 and SS2</td>-->
                                <!--                        <td>2010-2013</td>-->
                                <!--                    </tr>-->
                                <!--                    <tr>-->
                                <!--                        <td>Math's and Physic Teacher SS1 and SS2</td>-->
                                <!--                        <td>Form Master SS1 A</td>-->
                                <!--                        <td>2013-2015</td>-->
                                <!--                    </tr>-->
                                <!--                    <tr>-->
                                <!--                        <td>Form Master SS1 A</td>-->
                                <!--                        <td>Form Master SS 1 A & Acct. Treasurer PTA</td>-->
                                <!--                        <td>2015-2018</td>-->
                                <!--                    </tr>-->
                                <!--                    <tr>-->
                                <!--                        <td>Form Master  SS 1 A & Acct. Treasurer PTA</td>-->
                                <!--                        <td>Form Master  SS 1 A & Treasurer PTA</td>-->
                                <!--                        <td>2018 till date..</td>-->
                                <!--                    </tr>-->
                                                   
                                <!--                </tbody>-->
                                <!--            </table>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</div>-->
                                <!--second tab-->


                                <!--Third tab-->
                                <!--<div class="tab-pane" id="employment" role="tabpanel">-->
                                <!--    <div class="card-body">-->
                                <!--        <div class="table-responsive">-->
                                <!--            <table class="table">-->
                                <!--                <thead>-->
                                <!--                    <tr>                                                       -->
                                <!--                        <th style="font-weight: 600;">Schools/Institutions</th>-->
                                <!--                        <th style="font-weight: 600;">Role/Department</th>-->
                                <!--                        <th style="font-weight: 600;">Date</th>-->
                                <!--                    </tr>-->
                                <!--                </thead>-->
                                <!--                <tbody style="font-size: 14px;">-->
                                <!--                    <tr>-->
                                <!--                        <td>Deralin Seed of Faith</td>-->
                                <!--                        <td>Math's Teacher</td>-->
                                <!--                        <td>2010-2015</td>-->
                                <!--                    </tr>-->
                                <!--                    <tr>-->
                                <!--                        <td>Wonderful Daycare</td>-->
                                <!--                        <td>Form Master SS1 A</td>-->
                                <!--                        <td>2015-2018</td>-->
                                <!--                    </tr>-->
                                <!--                    <tr>-->
                                <!--                        <td>Sunshine International School</td>-->
                                <!--                        <td>Head of ICT & Form Master SS2 A</td>-->
                                <!--                        <td>2018 till date..</td>-->
                                <!--                    </tr>-->
                                                   
                                <!--                </tbody>-->
                                <!--            </table>-->
                                <!--        </div>-->

                                        


                                <!--    </div>-->
                                <!--</div>-->
                                <!--Third tab-->


                                <!--Fourth tab-->
                                <!--<div class="tab-pane" id="leave" role="tabpanel">-->
                                <!--    <div class="card-body">-->
                                       
                                <!--        <div class="table-responsive">-->
                                <!--            <table class="table">-->
                                <!--                <thead>-->
                                <!--                    <tr>                                                       -->
                                <!--                        <th style="font-weight: 600;">From</th>-->
                                <!--                        <th style="font-weight: 600;">To</th>-->
                                <!--                        <th style="font-weight: 600;">Type Of Request</th>-->
                                <!--                        <th style="font-weight: 600;">Description</th>-->
                                <!--                        <th style="font-weight: 600;">Approved By</th>-->
                                <!--                    </tr>-->
                                <!--                </thead>-->
                                                
                                <!--                <tbody style="font-size: 14px;">-->
                                <!--                    <tr>-->
                                <!--                        <td>02-03-2018</td>-->
                                <!--                        <td>02-04-2018</td>-->
                                <!--                        <td>Leave</td>-->
                                <!--                        <td>------</td>-->
                                <!--                        <td>Mr. Kelechi Obi</td>-->
                                <!--                    </tr>-->
                                <!--                    <tr>-->
                                <!--                        <td>02-09-2018</td>-->
                                <!--                        <td>09-09-2018</td>-->
                                <!--                        <td>Permission</td>-->
                                <!--                        <td>I will be traveling for my Father's Birthday</td>-->
                                <!--                        <td>Mr. Kelechi Obi</td>-->
                                <!--                    </tr>-->
                                <!--                    <tr>-->
                                <!--                        <td>02-09-2019</td>-->
                                <!--                        <td>09-09-20189</td>-->
                                <!--                        <td>Permission</td>-->
                                <!--                        <td>I will be traveling for my Father's Birthday</td>-->
                                <!--                        <td>Mr. Agnes Chime</td>-->
                                <!--                    </tr>-->
                                                   
                                <!--                </tbody>-->
                                <!--            </table>-->
                                <!--        </div>-->



                                <!--    </div>-->
                                <!--</div>-->
                                <!--Fourth tab-->


                                 <!--Fifth tab-->
                                <!-- <div class="tab-pane" id="disciplinary" role="tabpanel">-->
                                <!--    <div class="card-body">-->
                                       
                                <!--        <div class="table-responsive">-->
                                <!--            <table class="table">-->
                                <!--                <thead>-->
                                <!--                    <tr>                                                       -->
                                <!--                        <th style="font-weight: 600;">Disciplinary</th>-->
                                <!--                        <th style="font-weight: 600;">Penalty</th>-->
                                <!--                        <th style="font-weight: 600;">Penalty Strike</th>-->
                                <!--                        <th style="font-weight: 600;">Applied By</th>-->
                                <!--                        <th style="font-weight: 600;">Date Applied</th>-->
                                <!--                    </tr>-->
                                <!--                </thead>-->
                                                
                                <!--                <tbody style="font-size: 14px;">-->
                                <!--                    <tr>-->
                                <!--                        <td>Misconduct</td>-->
                                <!--                        <td>Suspension</td>-->
                                <!--                        <td>5 Days Suspension</td>-->
                                <!--                        <td>Mr. Peter Obi</td>-->
                                <!--                        <td>02-03-2018</td>-->
                                <!--                    </tr>-->
                                <!--                    <tr>-->
                                <!--                        <td>Theft</td>-->
                                <!--                        <td>Probation</td>-->
                                <!--                        <td>2 Weeks Suspension</td>-->
                                <!--                        <td>Mr. Peter Obi</td>-->
                                <!--                        <td>02-03-2019</td>-->
                                <!--                    </tr>-->
                                <!--                    <tr>-->
                                <!--                        <td>Late Coming</td>-->
                                <!--                        <td>Salary Reduction</td>-->
                                <!--                        <td>20% Salary Reduction</td>-->
                                <!--                        <td>Mr. Jude Okafor</td>-->
                                <!--                        <td>02-03-2020</td>-->
                                <!--                    </tr>-->
                                                   
                                <!--                </tbody>-->
                                <!--            </table>-->
                                <!--        </div>-->



                                <!--    </div>-->
                                <!--</div>-->
                                <!--Fifth tab-->
                            </div>
                        </div>
                    </div>
                      <!---=================Right sidebar=======================-->
                      <div class="right-sidebar">
                        <div class="slimscrollright">
                            <div class="rpanel-title">School Owner Documentation<span><i class="ti-close right-side-toggle"></i></span> </div>
                            <div class="r-panel-body">
                                
                                <ul>
                                    <li>
                                        <a href="documentation.html" class="chimaTextPrimary">
                                            <i class="fa fa-folder"></i>
                                            <span style="margin-left: 5px;">Dashboard</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="documentation.html" class="chimaTextPrimary">
                                            <i class="fa fa-folder"></i>
                                            <span style="margin-left: 5px;">Schools/Instituitons</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="documentation.html" class="chimaTextPrimary">
                                            <i class="fa fa-folder"></i>
                                            <span style="margin-left: 5px;">Employees</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="documentation.html" class="chimaTextPrimary">
                                            <i class="fa fa-folder"></i>
                                            <span style="margin-left: 5px;">Students</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="documentation.html" class="chimaTextPrimary">
                                            <i class="fa fa-folder"></i>
                                            <span style="margin-left: 5px;">Finance</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="documentation.html" class="chimaTextPrimary">
                                            <i class="fa fa-folder" ></i>
                                            <span style="margin-left: 5px;">Performance</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="documentation.html" class="chimaTextPrimary">
                                            <i class="fa fa-folder" ></i>
                                            <span style="margin-left: 5px;">P.T.A</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="documentation.html" class="chimaTextPrimary">
                                            <i class="fa fa-folder" ></i>
                                            <span style="margin-left: 5px;">Messages</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="documentation.html" class="chimaTextPrimary">
                                            <i class="fa fa-folder" ></i>
                                            <span style="margin-left: 5px;">Book Inventory</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="documentation.html" class="chimaTextPrimary">
                                            <i class="fa fa-folder" ></i>
                                            <span style="margin-left: 5px;">Surveillance</span>
                                        </a>
                                    </li>
                                
                                </ul>
                            </div>
                        </div>
                    </div>
            <!--==================Right sidebar=======================-->
       
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
           <!-- footer -->
            <!-- ============================================================== -->
            <?php include ('../includes/footer.php'); ?>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../library/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../library/plugins/bootstrap/js/popper.min.js"></script>
    <script src="../library/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="../js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../library/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="../library/plugins/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
     <!--morris JavaScript -->
     <script src="../library/plugins/raphael/raphael-min.js"></script>
     <script src="../library/plugins/morrisjs/morris.min.js"></script>
     <script src="../library/plugins/raphael/raphael-min.js"></script>
     <script src="../library/plugins/morrisjs/morris.js"></script>
     <script src="../js/morris-data.js"></script>
     <!-- sparkline chart -->
     <script src="../library/plugins/sparkline/jquery.sparkline.min.js"></script>
     <script src="../js/dashboard4.js"></script>
     <script src="../library/plugins/echarts/echarts-all.js"></script>
     <script src="../library/plugins/echarts/echarts-init.js"></script>
   
    <script src="../js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    
    <script src="../js/jasny-bootstrap.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../library/plugins/styleswitcher/jQuery.style.switcher.js"></script>
</body>

</html>
