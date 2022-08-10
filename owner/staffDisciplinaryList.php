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
    <title>Disciplinary Offence Setting | <?php echo $fullname; ?></title>
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
        <!-- End Sidebar navigation -->
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper" >
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->

            <?php
                // Get Institution
                $instSql = mysqli_query($link, "SELECT * FROM institution where AgencyOrSchoolOwnerID = '$UserID'");
                $instGetInstitution = mysqli_fetch_assoc($instSql);
                $InstitutionID = $instID = $instGetInstitution["InstitutionID"];
            ?>
            <div class="row page-titles">
                <div class="col-md-7 align-self-center">
                    <h2 class="text-themecolor" style="color: black; font-weight: 400;">Staff Disciplinary List</h2>
                </div>
                <div class="col-md-4 align-self-center" style="margin-bottom: -20px;">
                    <form>
                        <div class="form-group">
                            <select class="form-control chimaPrimaryBorderColor" style="background: white; border-width: 1px; border-style: solid; font-size: 15px;" id="instID">
                                <option value="">Select School/Institution</option> 
                                <?php
                                    $sqlShowInstitution = mysqli_query($link, "SELECT * FROM `institution` 
                                    LEFT JOIN agencyorschoolowner ON agencyorschoolowner.AgencyOrSchoolOwnerID=institution.AgencyOrSchoolOwnerID 
                                    WHERE agencyorschoolowner.AgencyOrSchoolOwnerID='$AgencyOrSchoolOwnerID'");
                                    $resultShowInstitution = mysqli_fetch_assoc($sqlShowInstitution);
                                    $resCount = mysqli_num_rows($sqlShowInstitution);
                                    do {
                                        echo '<option value="'.$resultShowInstitution["InstitutionID"].'">'.$resultShowInstitution["InstitutionName"].' '.$resultShowStaff['InstitutionNameTwo'].'</option>';
                                    }while ($resultShowInstitution = mysqli_fetch_assoc($sqlShowInstitution));
                                ?>
                            </select>
                        </div>
                    </form>
                </div>
                <!--<div class="col-md-2 align-self-center" style="margin-bottom: -20px;">
                    <form>
                        <div class="form-group">
                            <select class="form-control chimaPrimaryBorderColor" style="background: white; border-width: 1px; border-style: solid; font-size: 15px;">
                                <option disabled selected>Grade/Faculty</option>                              
                            </select>
                        </div>
                    </form>
                </div>-->
                <div class="col-md-1 align-self-center">
                    <a href="#" type="button" class="btn chimaNormalBtn" id="institutionLoadBtn" style="width: 90px;">
                        <span style="font-size: 14px;">Load</span>
                    </a>
                </div>
                <div class="">
                    <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                </div>
            </div>
            <div class="row">
                
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
                <div class="row">
                    <div class="col-12">
                            
                        <div class="card">
                            <div class="card-body">
                                
                                <div class="row">
                                    <div class="col-md-7">
                                        <h4 class="card-title" style="color: red;">Staff Disciplinary List</h4>
                                        <h6 class="card-subtitle">Staff Disciplinary Full List</h6>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <!--<select class="form-control chimaPrimaryBorderColor" style="background: white; border-width: 1px; border-style: solid; font-size: 14px;">
                                                <option disabled selected>Disciplinary Type</option>                              
                                            </select>-->
                                            <select class="form-control" name="StaffDisciplinaryOffenceID2" id="StaffDisciplinaryOffenceID2" required>
                                                <option value="">Select Disciplinary Type</option> 
                                                <?php
                                                    $sqlShowOffence = mysqli_query($link, "SELECT * FROM `staffdisciplinaryoffence` 
                                                    LEFT JOIN institution ON institution.InstitutionID = staffdisciplinaryoffence.InstitutionID 
                                                    LEFT JOIN agencyorschoolowner ON agencyorschoolowner.AgencyOrSchoolOwnerID=institution.AgencyOrSchoolOwnerID 
                                                    WHERE agencyorschoolowner.AgencyOrSchoolOwnerID='$AgencyOrSchoolOwnerID'");
                                                    $resultShowOffence = mysqli_fetch_assoc($sqlShowOffence);
                                                    $resCount = mysqli_num_rows($sqlShowOffence);
                                                    do {
                                                        echo '<option value="'.$resultShowOffence["StaffDisciplinaryOffenceID"].'">'.$resultShowOffence["StaffDisciplinaryOffenceTitle"].'</option>';
                                                    }while ($resultShowOffence = mysqli_fetch_assoc($sqlShowOffence));
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <button type="button" data-toggle="modal" data-target="#applyBatchModal" class="btn waves-effect waves-light btn-rounded btn-info" style="font-size: 14px;">Apply</button>
                                    </div>
                                </div>
                                                
                                                <!--========================================================================================-->
                                                <!--========================================================================================-->
                                                <!--========================================================================================-->
                                                <!--==== Reverse Modal==== -->
                                                <div class="modal fade" id="reverseModal" tabindex="-1" aria-labelledby="reverseModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <div style="margin-left: 32%;"><h1 style="color: red;">Warning!!!</h1></div>
                                        
                                                            </div>
                                    
                                                            <div class="modal-body" align="Center">
                                                                <p>Are you sure you really want to reverse the<br> Penalty Strike of Ola Jacob. <br>Note that this action cannot be change.</p>
                                                            </div>

                                                            <div align="Center" style="margin-bottom: 40px;">
                                                                <button type="button" class="btn chimaYesProceedBtn">Yes! Reverse</button>
                                                                <button type="button" class="btn chimaYesCancelBtn" data-dismiss="modal">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--==== Reverse Modal==== -->
                                                <!--========================================================================================-->
                                                <!--========================================================================================-->
                                                <!--========================================================================================-->
                                                

                                                <!--========================================================================================-->
                                                <!--========================================================================================-->
                                                <!--========================================================================================-->
                                                <!--==== Apply Batch Disciplinary Modal==== -->
                                                <div class="modal fade" id="applyBatchModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h3 style="color: black; margin-left: 30%; font-weight: 500;">Apply Batch Disciplinary</h3>
                                        
                                                            </div>
                                    
                                                            <div class="modal-body" id="applyBatchModalOutput">
                                                            
                                                            </div>

                                                            <div style="margin-bottom: 20px;">
                                                                <button type="button" class="btn chimaCancelBtn1" id="cancelBatchDisciplinaryBtn" data-dismiss="modal">Cancel</button>
                                                                <button type="button" class="btn chimaSubmitBtn" id="applyBatchDisciplinary">Apply</button>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--==== Apply Batch Disciplinary Modal==== -->
                                                <!--========================================================================================-->
                                                <!--========================================================================================-->
                                                <!--========================================================================================-->

                                                   
                                                <!--========================================================================================-->
                                                <!--========================================================================================-->
                                                <!--========================================================================================-->
                                                <!--==== Apply Disciplinary Modal==== -->
                                                <div class="modal fade" id="applyModal" tabindex="-1" aria-labelledby="applyModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h3 style="color: black; margin-left: 30%; font-weight: 500;">Apply Disciplinary</h3>
                                        
                                                            </div>
                                    
                                                            <div class="modal-body" id="applyModalOutput">
                                                                

                                                            </div>

                                                            <div style="margin-bottom: 20px;">
                                                                <button type="button" class="btn chimaCancelBtn1" id="cancelDisciplinaryBtn" data-dismiss="modal">Cancel</button>
                                                                <button type="button" class="btn chimaSubmitBtn" id="applyDisciplinary">Apply</button>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--==== Apply Disciplinary Modal==== -->
                                                <!--========================================================================================-->
                                                <!--========================================================================================-->
                                                <!--========================================================================================-->

                                                <!--========================================================================================-->
                                                <!--========================================================================================-->
                                                <!--========================================================================================-->
                                                <!--==== New Disciplinary Modal==== -->
                                                <div class="modal fade" id="newStaffDisciplinaryModal" tabindex="-1" aria-labelledby="newStaffDisciplinaryModal" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h3 style="color: black; margin-left: 30%; font-weight: 500;">Add Disciplinary</h3>
                                        
                                                            </div>
                                    
                                                            <div class="modal-body">
                                                                <p id="CompleteAddDisciplinaryOutput"></p>

                                                                <form action="" method="POST" style="margin-top: 10px;">
                                                                    <div class="form-group">
                                                                        <label style="font-weight: 600;">School/Institution:</label>
                                                                        <select class="form-control" name="InstitutionID" id="InstitutionID" required>
                                                                            <option value="">Select School/Institution</option> 
                                                                            <?php
                                                                                $sqlShowInstitution = mysqli_query($link, "SELECT * FROM `institution` 
                                                                                LEFT JOIN agencyorschoolowner ON agencyorschoolowner.AgencyOrSchoolOwnerID=institution.AgencyOrSchoolOwnerID 
                                                                                WHERE agencyorschoolowner.AgencyOrSchoolOwnerID='$AgencyOrSchoolOwnerID'");
                                                                                $resultShowInstitution = mysqli_fetch_assoc($sqlShowInstitution);
                                                                                $resCount = mysqli_num_rows($sqlShowInstitution);
                                                                                do {
                                                                                    echo '<option value="'.$resultShowInstitution["InstitutionID"].'">'.$resultShowInstitution["InstitutionName"].' '.$resultShowStaff['InstitutionNameTwo'].'</option>';
                                                                                }while ($resultShowInstitution = mysqli_fetch_assoc($sqlShowInstitution));
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label style="font-weight: 600;">Staff ID/Name:</label>
                                                                        <select class="form-control" name="StaffID" id="StaffID" required>
                                                                            <option value="">Select Staff ID/Name</option> 
                                                                            <?php
                                                                                $sqlShowStaff = mysqli_query($link, "SELECT * FROM `staff` 
                                                                                LEFT JOIN institution ON institution.InstitutionID = staff.InstitutionID 
                                                                                LEFT JOIN agencyorschoolowner ON agencyorschoolowner.AgencyOrSchoolOwnerID=institution.AgencyOrSchoolOwnerID 
                                                                                WHERE agencyorschoolowner.AgencyOrSchoolOwnerID='$AgencyOrSchoolOwnerID'");
                                                                                $resultShowStaff = mysqli_fetch_assoc($sqlShowStaff);
                                                                                $resCount = mysqli_num_rows($sqlShowStaff);
                                                                                do {
                                                                                    echo '<option value="'.$resultShowStaff["StaffID"].'">'.$resultShowStaff["StaffFirstName"].' '.$resultShowStaff['StaffMiddleName'].' '.$resultShowStaff["StaffLastName"].'</option>';
                                                                                }while ($resultShowStaff = mysqli_fetch_assoc($sqlShowStaff));
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label style="font-weight: 600;">Offence Type:</label>
                                                                        <select class="form-control" name="StaffDisciplinaryOffenceID" id="StaffDisciplinaryOffenceID" required>
                                                                            <option value="">Select Offence Type</option> 
                                                                            <?php
                                                                                $sqlShowOffence = mysqli_query($link, "SELECT * FROM `staffdisciplinaryoffence` 
                                                                                LEFT JOIN institution ON institution.InstitutionID = staffdisciplinaryoffence.InstitutionID 
                                                                                LEFT JOIN agencyorschoolowner ON agencyorschoolowner.AgencyOrSchoolOwnerID=institution.AgencyOrSchoolOwnerID 
                                                                                WHERE agencyorschoolowner.AgencyOrSchoolOwnerID='$AgencyOrSchoolOwnerID'");
                                                                                $resultShowOffence = mysqli_fetch_assoc($sqlShowOffence);
                                                                                $resCount = mysqli_num_rows($sqlShowOffence);
                                                                                do {
                                                                                    echo '<option value="'.$resultShowOffence["StaffDisciplinaryOffenceID"].'">'.$resultShowOffence["StaffDisciplinaryOffenceTitle"].'</option>';
                                                                                }while ($resultShowOffence = mysqli_fetch_assoc($sqlShowOffence));
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                    
                                                                    <div class="form-group" id="penalty">
                                                                        <label style="font-weight: 600;">Penalty:</label>
                                                                        <select class="form-control" name="StaffDisciplinaryActionID" id="StaffDisciplinaryActionID" required>
                                                                            <option value="">Select Penalty</option> 
                                                                            <?php
                                                                                $sqlShowAction = mysqli_query($link, "SELECT * FROM `staffdisciplinaryaction` 
                                                                                LEFT JOIN staffdisciplinarysanction ON staffdisciplinarysanction.StaffDisciplinaryActionID = staffdisciplinaryaction.StaffDisciplinaryActionID
                                                                                LEFT JOIN institution ON institution.InstitutionID = staffdisciplinaryaction.InstitutionID 
                                                                                LEFT JOIN agencyorschoolowner ON agencyorschoolowner.AgencyOrSchoolOwnerID=institution.AgencyOrSchoolOwnerID 
                                                                                WHERE agencyorschoolowner.AgencyOrSchoolOwnerID='$AgencyOrSchoolOwnerID'");
                                                                                $resultShowAction = mysqli_fetch_assoc($sqlShowAction);
                                                                                $resCount = mysqli_num_rows($sqlShowAction);
                                                                                do {
                                                                                    echo '<option value="'.$resultShowAction["StaffDisciplinaryActionID"].'">'.$resultShowAction["StaffDisciplinaryActionTitle"].'</option>';
                                                                                }while ($resultShowAction = mysqli_fetch_assoc($sqlShowAction));
                                                                            ?>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group" id="penaltyStrike">
                                                                        <label style="font-weight: 600;">Penalty Strike:</label>
                                                                        <select class="form-control" name="StaffDisciplinarySanctionID" id="StaffDisciplinarySanctionID" required>
                                                                            <option>Select Penalty Strike</option>  
                                                                            <?php
                                                                                $sqlShowSanction = mysqli_query($link, "SELECT * FROM `staffdisciplinarysanction` 
                                                                                LEFT JOIN institution ON institution.InstitutionID = staffdisciplinarysanction.InstitutionID 
                                                                                LEFT JOIN agencyorschoolowner ON agencyorschoolowner.AgencyOrSchoolOwnerID=institution.AgencyOrSchoolOwnerID 
                                                                                WHERE agencyorschoolowner.AgencyOrSchoolOwnerID='$AgencyOrSchoolOwnerID'");
                                                                                $resultShowSanction = mysqli_fetch_assoc($sqlShowSanction);
                                                                                $resCount = mysqli_num_rows($sqlShowSanction);
                                                                                do {
                                                                                    echo '<option value="'.$resultShowSanction["StaffDisciplinarySanctionID"].'">'.$resultShowSanction["StaffDisciplinarySanctionTitle"].'</option>';
                                                                                }while ($resultShowSanction = mysqli_fetch_assoc($sqlShowSanction));
                                                                            ?>
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="title" style="font-weight: 600;">Title:</label>
                                                                        <input type="text" placeholder="Title" class="form-control" name="Title" id="Title" required>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="" style="font-weight: 600;">Description:</label>
                                                                        <textarea placeholder="Description" class="form-control" cols="3" rows="5" name="Description" id="Description" required></textarea>
                                                                    </div>
                                
                                                                    
                                                            </div>

                                                            <div style="margin-bottom: 20px;">
                                                                <button type="button" class="btn chimaCancelBtn1" data-dismiss="modal">Cancel</button>
                                                                <button type="button" class="btn chimaSubmitBtn" id="addDisciplinaryBtn">Add</button>
                                                                
                                
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--==== Apply Disciplinary Modal==== -->
                                                <!--========================================================================================-->
                                                <!--========================================================================================-->
                                                <!--========================================================================================-->


                                <p><div class="btn btn-success" data-toggle="modal" data-target="#newStaffDisciplinaryModal"><i class="fa fa-file"></i> Add Staff Disciplinary</div></p>
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="table m-t-30 table-hover no-wrap contact-list table-striped" style="font-size: 14px;">                                        
                                        <thead>
                                            <tr>
                                                <th style="font-weight: 600;">S/N</th>
                                                <th style="font-weight: 600;">Staff Photo</th>
                                                <th style="font-weight: 600;">Staff Name</th>
                                                <th style="font-weight: 600;">School/Institutions</th>
                                                <th style="font-weight: 600;">Offence Type</th>
                                                <th style="font-weight: 600;">Title</th>
                                                <th style="font-weight: 600;">Description</th>
                                                <th style="font-weight: 600;">Disciplinary Action</th>
                                                <th style="font-weight: 600;">Sanction</th>
                                                <th style="font-weight: 600;">Waiver</th>
                                                <th style="font-weight: 600;">Status</th>
                                                <th style="font-weight: 600;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="loadStaffDisciplinaryList">

                                        </tbody>
                                    </table>
                                </div>
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
               
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
               
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer">
                © Sunshine International School
                <br>
                Powered by CHOV LLC
            </footer>
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
    <script src="../js/custom.min.js"></script>
    <!--morris JavaScript -->
    <script src="../library/plugins/raphael/raphael-min.js"></script>
    <script src="../library/plugins/morrisjs/morris.min.js"></script>
    <!-- sparkline chart -->
    <!-- Footable -->
    <script src="../library/plugins/footable/js/footable.all.min.js"></script>
    <script src="../library/plugins/bootstrap-select/bootstrap-select.min.js" type="text/javascript"></script>
    <!--FooTable init-->
    <script src="../js/footable-init.js"></script>

    <script src="../library/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="../js/dashboard4.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../library/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <script src="../library/plugins/datatables/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <!-- end - This is for export functionality only -->
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
            $(document).ready(function() {
                var table = $('#example').DataTable({
                    "columnDefs": [{
                        "visible": false,
                        "targets": 2
                    }],
                    "order": [
                        [2, 'asc']
                    ],
                    "displayLength": 25,
                    "drawCallback": function(settings) {
                        var api = this.api();
                        var rows = api.rows({
                            page: 'current'
                        }).nodes();
                        var last = null;
                        api.column(2, {
                            page: 'current'
                        }).data().each(function(group, i) {
                            if (last !== group) {
                                $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                                last = group;
                            }
                        });
                    }
                });
                // Order by the grouping
                $('#example tbody').on('click', 'tr.group', function() {
                    var currentOrder = table.order()[0];
                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                        table.order([2, 'desc']).draw();
                    } else {
                        table.order([2, 'asc']).draw();
                    }
                });
            });
        });
        $('#example23').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
    </script>
    <script>

            $("document").ready(function(){ 
                $('#loadStaffDisciplinaryList').html('<i class="fa fa-spinner"></i>');
                var instID = "";
                var UserID = "<?php echo $AgencyOrSchoolOwnerID; ?>";
                
                
                var dataString = 'instID=' + instID + '&UserID=' + UserID;
                //alert(dataString);
                $.ajax({
                type : 'post',
                url: "../controller/scripts/owner/loadAllDisciplinaryList.php",
                data :  dataString,
                cache: false,
                    success : function(result)
                    {
                        //alert("Hello");
                        $('#loadStaffDisciplinaryList').html(result);
                    }
                });
            });


            
            $("document").ready(function () {


                $("#institutionLoadBtn").click(function(){
                    $('#loadStaffDisciplinaryList').html('<i class="fa fa-spinner"></i>');
                    var instID = $("#instID").val();
                    var UserID = "<?php echo $AgencyOrSchoolOwnerID; ?>";
                    
                    
                    var dataString = 'instID=' + instID + '&UserID=' + UserID;
                    //alert(dataString);
                    $.ajax({
                    type : 'post',
                    url: "../controller/scripts/owner/loadAllDisciplinaryList.php",
                    data :  dataString,
                    cache: false,
                        success : function(result)
                        {
                            //alert("Hello");
                            $('#loadStaffDisciplinaryList').html(result);
                        }
                    });           
                });

                
                

                
             

                $("#addDisciplinaryBtn").click(function () {
                    var StaffID = $("#StaffID").val();
                    var InstitutionID = $("#InstitutionID").val();
                    //alert("Staff ID:" + StaffID + " Institution ID: " + InstitutionID);
                    var StaffDisciplinaryOffenceID = $("#StaffDisciplinaryOffenceID").val();
                    var Title = $("#Title").val();
                    var Description = $("#Description").val();
                    var StaffDisciplinaryActionID = $("#StaffDisciplinaryActionID").val();
                    var StaffDisciplinarySanctionID = $("#StaffDisciplinarySanctionID").val();
                    if(StaffDisciplinaryActionID == '' || StaffDisciplinarySanctionID == ''){
                        var StaffDisciplinaryActionID = $("#StaffDisciplinaryActionID").val(0);
                        var StaffDisciplinarySanctionID = $("#StaffDisciplinarySanctionID").val(0);
                    }

                    var dataString = 'StaffID='+ StaffID + '&InstitutionID='+ InstitutionID + '&StaffDisciplinaryOffenceID='+ StaffDisciplinaryOffenceID + '&Title='+ Title + '&Description='+ Description + '&StaffDisciplinaryActionID='+ StaffDisciplinaryActionID + '&StaffDisciplinarySanctionID='+ StaffDisciplinarySanctionID;

                    if(Title == ''){
                        alert("No title cannot be empty!");
                    }else if(Description == ''){
                        alert("No title cannot be empty!");
                    }else if(dataString == ''){
                        alert("Fill out the empty fields to continue!");
                    }else{
                        
                        $.ajax({
                            type: "POST",
                            url: "../controller/scripts/owner/addDisciplinary.php",
                            data: dataString,
                            cache: false,
                            success: function(result){
                                    $("#CompleteAddDisciplinaryOutput").html(result);
                                    $("#StaffID").val("");
                                    $("#InstitutionID").val("");
                                    //alert("Staff ID:" + StaffID + " Institution ID: " + InstitutionID);
                                    $("#StaffDisciplinaryOffenceID").val("");
                                    $("#Title").val("");
                                    $("#Description").val("");
                                    $("#StaffDisciplinaryActionID").val("");
                                    $("#StaffDisciplinarySanctionID").val("");
                                    var instID = "";
                                    var UserID = "<?php echo $AgencyOrSchoolOwnerID; ?>";
                                    
                                    var dataString = 'instID=' + instID + '&UserID=' + UserID;
                                    //alert(dataString);
                                    $.ajax({
                                    type : 'post',
                                    url: "../controller/scripts/owner/loadAllDisciplinaryList.php",
                                    data :  dataString,
                                    cache: false,
                                        success : function(result)
                                        {
                                            //alert("Hello");
                                            $('#loadStaffDisciplinaryList').html(result)
                                            //$('#addDisciplinaryBtn').hide();       
                                        }
                                    });                
                            }
                        });

                    }
                    
                });

                
                $("#applyModal").on('show.bs.modal', function (e) {

                    var rowid =  $(e.relatedTarget).data('id');
                    $.ajax({

                        type: "POST",
                        url: "../controller/scripts/owner/loadApplyModal.php",
                        data: 'rowid='+ rowid,
                        success: function(result) {
                            $("#applyModalOutput").html(result);
                        }
                    });

                    $("#applyDisciplinary").click(function () {
                        $.ajax({
                            type: "POST",
                            url: "../controller/scripts/owner/applyDisciplinary.php",
                            data: 'rowid='+ rowid,
                            success: function(result) {
                                $("#applyModalOutput").html(result);
                                $("#cancelDisciplinaryBtn").html("Close");
                                $("#applyDisciplinary").attr({disabled: "disabled"});
                                $('#loadStaffDisciplinaryList').html('<i class="fa fa-spinner"></i>'); // Add Preloader

                                var instID = "<?php echo $InstitutionID; ?>"
                                var UserID = "<?php echo $AgencyOrSchoolOwnerID; ?>";
                                
                                var dataString = 'instID=' + instID + '&UserID=' + UserID;
                                //alert(dataString);
                                $.ajax({
                                type : 'post',
                                url: "../controller/scripts/owner/loadAllDisciplinaryList.php",
                                data :  dataString,
                                cache: false,
                                    success : function(result)
                                    {
                                        //alert("Hello");
                                        $('#loadStaffDisciplinaryList').html(result)
                                    }
                                });
                            }
                        });
                    });


                });

                $("#applyBatchModal").on('show.bs.modal', function (e) {

                    //var rowid =  $(e.relatedTarget).data('id');
                    
                    var rowid = $("#StaffDisciplinaryOffenceID2").find(":selected").val();
                    //alert(rowid);
                    $.ajax({

                        type: "POST",
                        url: "../controller/scripts/owner/loadApplyBatchModal.php",
                        data: 'rowid='+ rowid,
                        success: function(result) {
                            $("#applyBatchModalOutput").html(result);
                            
                        }
                    });

                    $("#applyBatchDisciplinary").click(function () {
                        $.ajax({
                            type: "POST",
                            url: "../controller/scripts/owner/applyBatchDisciplinary.php",
                            data: 'rowid='+ rowid,
                            success: function(result) {
                                $("#applyBatchModalOutput").html(result);
                                $("#cancelBatchDisciplinaryBtn").html("Close");
                                $("#applyBatchDisciplinary").hide();
                                $('#loadStaffDisciplinaryList').html('<i class="fa fa-spinner"></i>'); // Add Preloader

                                var instID = "<?php echo $InstitutionID; ?>"
                                var UserID = "<?php echo $AgencyOrSchoolOwnerID; ?>";
                                
                                var dataString = 'instID=' + instID + '&UserID=' + UserID;
                                //alert(dataString);
                                $.ajax({
                                type : 'post',
                                url: "../controller/scripts/owner/loadAllDisciplinaryList.php",
                                data :  dataString,
                                cache: false,
                                    success : function(result)
                                    {
                                        //alert("Hello");
                                        $('#loadStaffDisciplinaryList').html(result);
                                        
                                        $("#applyDisciplinary").show();
                                        
                                        $("#applyBatchDisciplinary").show();
                                    }
                                });
                            }
                        });
                    });


                });
            });

            $("body").on('change','#StaffDisciplinaryOffenceID',function(){
                var StaffDisciplinaryOffenceID = $("#StaffDisciplinaryOffenceID").val();
                //alert(StaffDisciplinaryOffenceID);
                if(StaffDisciplinaryOffenceID == 3){
                    $("#penalty").show();
                    $("#penaltyStrike").show();
                }else{
                    $("#penalty").hide();
                    $("#penaltyStrike").hide();
                }
            });
    </script>
</body>

</html>
