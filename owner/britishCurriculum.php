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
    <link rel="icon" type="image/png" sizes="16x16" href="../img/favicon/<?php echo $Favicon; ?>">
    <title>British Curriculum | <?php echo $fullname; ?></title>
    <!-- Favicon icon -->
    <link href="../library/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Morries chart CSS -->
    <link href="../library/plugins/morrisjs/morris.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/style.php" rel="stylesheet">
    
    <!-- You can change the theme colors from here -->
    <link href="../css/blueOwner.php" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
</head>

<body class="fix-header card-no-border">
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
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-10 align-self-center">
                    <h3 style="color: black;"><span class="fa fa-bookmark"></span>  British Curriculum</h3>
                </div>
               
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
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link active" style="font-size: 14px;" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fa fa-in"></i><span class="fa fa-book"></span> Core Areas</a>
                                    <a class="nav-link"  style="font-size: 14px;" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false"><span class="fa fa-laptop"></span> Essential Aspects</a>
                                    <a class="nav-link"  style="font-size: 14px;" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><span class="fa fa-check"></span> Assessment Keys</a>
                                    <!--<a class="nav-link"  style="font-size: 14px;" id="v-pills-grade-keys-tab" data-toggle="pill" href="#v-pills-grade-keys" role="tab" aria-controls="v-pills-grade-keys" aria-selected="false"><span class="fa fa-map"></span> Grade Keys</a>
                                    <a class="nav-link"  style="font-size: 14px;" id="v-pills-grade-subtitles-tab" data-toggle="pill" href="#v-pills-grade-subtitles" role="tab" aria-controls="v-pills-grade-subtitles" aria-selected="false"><span class="fa fa-desktop"></span> Grade Subtitles</a>-->
                                    <a class="nav-link"  style="font-size: 14px;" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false"><span class="fa fa-upload"></span> Online Entry</a>                                    
                                    <!--<a class="nav-link"  style="font-size: 14px;" id="v-pills-check-result-tab" data-toggle="pill" href="#v-pills-check-result" role="tab" aria-controls="v-pills-check-result" aria-selected="false"><span class="fa fa-search"></span> Check Result</a>-->
                                </div>
                            </div>

                            <div class="col-sm-10">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <!--================ Core Area Settings =================-->
                                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                        <!-- Create CoreArea Modal -->
                                        <div class="modal fade" id="addCoreAreaModal" tabindex="-1" role="dialog" aria-labelledby="addCoreAreaModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="addCoreAreaModalLabel">Create Core Area of Assessment</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="" id="addCoreAreaModalOutput"></div>
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
                                                                            echo '<option value="'.$resultShowInstitution["InstitutionID"].'">'.$resultShowInstitution["InstitutionName"].' '.$resultShowInstitution['InstitutionNameTwo'].'</option>';
                                                                        }while ($resultShowInstitution = mysqli_fetch_assoc($sqlShowInstitution));
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label style="font-weight: 600;">Core Area:</label>
                                                                <input type="text" class="form-control" name="CoreArea" id="CoreArea" placeholder="e.g. Maths Development" required>
                                                            </div>

                                                        <div class="modal-footer background-login">
                                                            <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                                                            <button id="addCoreAreaModalBtn" type="button" class="btn btn-danger"><span class="fa fa-floppy-o"></span> Save Core Area</button>
                                                        </div>
                                                        </form>
                                                    </div>

                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.Create Core Area Modal -->

                                        <!-- Edit CoreArea Modal -->
                                        <div class="modal fade" id="editCoreAreaModal" tabindex="-1" role="dialog" aria-labelledby="editCoreAreaModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="addCoreAreaModalLabel">Edit Core Area of Assessment</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" id="editCoreAreaModalForm">
                                                    </div>

                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.Edit CoreArea Modal -->

                                        <!-- Delete Single CoreArea Modal -->
                                        <div class="modal fade" id="deleteCoreAreaModal" tabindex="-1" role="dialog" aria-labelledby="deleteCoreAreaModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div align="center" class="modal-content">
                                                    <form>
                                                        <div class="modal-body">
                                                            <span id="deleteCoreAreaModalOutput"></span>
                                                            <div id="deleteCoreAreaMsg">
                                                                <div align="center"><img src="../img/preloader.gif" /></div>
                                                            </div> 
                                                        </div>
                                                    
                                                        <div style="margin:auto; padding-bottom: 15px;">
                                                        <button type="button" class="btn btn-info" data-dismiss="modal"> <i class="fa fa-times"></i> Cancel</button>
                                                            <button id="deleteCoreAreaModalBtn" type="button" class="btn btn-danger deleteCoreAreaModalBtn"> <i class="fa fa-trash"></i> Yes! Delete</button>
                                                        </div>
                                                        
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.Delete Single CoreArea Modal -->

                                        <!-- Delet Multiple CoreArea Modal -->
                                        <div class="modal fade" id="deleteMultipleCoreAreaModal" tabindex="-1" role="dialog" aria-labelledby="deleteMultipleCoreAreaModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div align="center" class="modal-content">
                                                    <form>
                                                        <div class="modal-body">
                                                            <span id="deleteMultipleCoreAreaModalOutput"></span>
                                                            <div id="deleteMultipleCoreAreaModalMsg">
                                                                <div align="center"><img src="../img/preloader.gif" /></div>
                                                            </div> 
                                                        </div>
                                                        <div style="margin:auto; padding-bottom: 15px;">
                                                            <button type="button" class="btn btn-info" data-dismiss="modal"> <i class="fa fa-times"></i> Cancel</button>
                                                            <button id="deleteMultipleCoreAreaModalBtn" type="button" class="btn btn-danger deleteMultipleCoreAreaModalBtn"> <i class="fa fa-trash"></i> Yes! Delete</button>
                                                        </div>
                                                        
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /. Delet Multiple CoreArea Modal -->

                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="button-group" style="float: right;">
                                                            <button type="button" data-toggle="modal" data-target="#addCoreAreaModal" class="btn waves-effect waves-light btn-rounded btn-outline-info" style="font-size: 13px;"><i class="fa fa-plus"></i><span style="margin-left: 5px;">Create Core Area</span></button> 
                                                            
                                                        </div>
                                                        <h2 style="margin-top: 20px; color: black;"><span class="fa fa-book"></span> Core Area Settings</h2>
                                                        <a href="#" data-toggle="modal" data-target="#deleteMultipleCoreAreaModal">
                                                            <span style="color: red; display: none;" id="CoreArea_select_count"><i class="fa fa-trash"></i> Delete All</span>  
                                                        </a>
                                                        <div class="table-responsive m-t-40">
                                                            <table id="myTable" class="table display table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <input name="CoreArea_select_all" type="checkbox" id="CoreArea_select_all" class="filled-in chk-col-blue"/>
                                                                            <label style="margin-bottom: -10px;" for="CoreArea_select_all"></label>
                                                                        </th>
                                                                        <th>School </th>
                                                                        <th>Core Area Of Assessments</th>
                                                                        <th>Delete</th>
                                                                        <th>Edit</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="CoreAreaList">                          
                                                                </tbody>
                                                            </table>
                                                        </div>
                            
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/.============== Core Area Settings =================-->
                                    
                                    <!--================ Essential Aspects ===================-->
                                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                        <!-- Create EssentialAspects Modal -->
                                        <div class="modal fade" id="addEssentialAspectsModal" tabindex="-1" role="dialog" aria-labelledby="addEssentialAspectsModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="addEssentialAspectsModalLabel"><span class="fa fa-plus"></span> Create Essential Aspects</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="" id="addEssentialAspectsModalOutput"></div>
                                                        <form action="" method="POST" style="margin-top: 10px;">
                                                            <div class="form-group">
                                                                <label style="font-weight: 600;">School/Institution:</label>
                                                                <select class="form-control" name="InstitutionID" id="InstitutionID_EA" required>
                                                                    <option value="">Select School/Institution</option> 
                                                                    <?php
                                                                        $sqlShowInstitution = mysqli_query($link, "SELECT * FROM `institution` 
                                                                        LEFT JOIN agencyorschoolowner ON agencyorschoolowner.AgencyOrSchoolOwnerID=institution.AgencyOrSchoolOwnerID 
                                                                        WHERE agencyorschoolowner.AgencyOrSchoolOwnerID='$AgencyOrSchoolOwnerID'");
                                                                        $resultShowInstitution = mysqli_fetch_assoc($sqlShowInstitution);
                                                                        $resCount = mysqli_num_rows($sqlShowInstitution);
                                                                        do {
                                                                            echo '<option value="'.$resultShowInstitution["InstitutionID"].'">'.$resultShowInstitution["InstitutionName"].' '.$resultShowInstitution['InstitutionNameTwo'].'</option>';
                                                                        }while ($resultShowInstitution = mysqli_fetch_assoc($sqlShowInstitution));
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="form-group" id="loadCoreAreasFilterOutput"></div>
                                                            <div class="form-group">
                                                                <label style="font-weight: 600;">Essential Aspects:</label>
                                                                <input type="text" class="form-control" name="EssentialAspects" id="EssentialAspects" placeholder="e.g. Listening and Attention" required>
                                                            </div>

                                                            <div class="modal-footer background-login">
                                                                <button type="button" class="btn btn-info" data-dismiss="modal"><span class="fa fa-times"></span> Cancel</button>
                                                                <button id="addEssentialAspectsModalBtn" type="button" class="btn btn-danger"><span class="fa fa-floppy-o"></span> Save Essential Aspects</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.Create EssentialAspects Modal -->

                                        <!-- Edit EssentialApects Modal -->
                                        <div class="modal fade" id="editEssentialAspectsModal" tabindex="-1" role="dialog" aria-labelledby="editEssentialAspectsModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="addEssentialAspectsModalLabel"><span class="fa fa-pencil"></span> Edit Essential Aspects</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" id="editEssentialAspectsModalForm">
                                                    </div>

                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.Edit EssentialAspects Modal -->

                                        <!-- Delete Single EssentialAspects Modal -->
                                        <div class="modal fade" id="deleteEssentialAspectsModal" tabindex="-1" role="dialog" aria-labelledby="deleteEssentialAspectsModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div align="center" class="modal-content">
                                                    <form>
                                                        <div class="modal-body">
                                                            <span id="deleteEssentialAspectsModalOutput"></span>
                                                            <div id="deleteEssentialAspectsMsg">
                                                                <div align="center"><img src="../img/preloader.gif" /></div>
                                                            </div> 
                                                        </div>
                                                    
                                                        <div style="margin:auto; padding-bottom: 15px;">
                                                        <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                                                            <button id="deleteEssentialAspectsModalBtn" type="button" class="btn btn-danger deleteEssentialAspectsModalBtn">Yes! Delete</button>
                                                        </div>
                                                        
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.Delete Single EssentialAspects Modal -->

                                        <!-- Delet Multiple EssentialAspects Modal -->
                                        <div class="modal fade" id="deleteMultipleEssentialAspectsModal" tabindex="-1" role="dialog" aria-labelledby="deleteMultipleEssentialAspectsModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div align="center" class="modal-content">
                                                    <form>
                                                        <div class="modal-body">
                                                            <span id="deleteMultipleEssentialAspectsModalOutput"></span>
                                                            <div id="deleteMultipleEssentialAspectsModalMsg">
                                                                <div align="center"><img src="../img/preloader.gif" /></div>
                                                            </div> 
                                                        </div>
                                                        <div style="margin:auto; padding-bottom: 15px;">
                                                            <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                                                            <button id="deleteMultipleEssentialAspectsModalBtn" type="button" class="btn btn-danger deleteMultipleEssentialAspectsModalBtn">Yes! Delete</button>
                                                        </div>
                                                        
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /. Delet Multiple EssentialAspects Modal -->

                                    
                                    
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="button-group" style="float: right;">
                                                            <button type="button" data-toggle="modal" data-target="#addEssentialAspectsModal" class="btn waves-effect waves-light btn-rounded btn-outline-info" style="font-size: 13px;"><i class="fa fa-plus"></i><span style="margin-left: 5px;">Create Essential Aspects</span></button> 
                                                            
                                                        </div>
                                                        <h2 style="margin-top: 20px; color: black;"><span class="fa fa-laptop"></span> Essential Aspects Settings</h2>
                                                        <a href="#" data-toggle="modal" data-target="#deleteMultipleEssentialAspectsModal">
                                                            <span style="display: none; color: red;" id="select_count">
                                                            <i class="fa fa-trash"></i> Delete All</span>
                                                        </a>
                                                        <div class="table-responsive m-t-40">
                                                            <table id="myEssentialAspectsTable" class="table display table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <input type="checkbox" id="select_all"class="filled-in chk-col-blue">
                                                                            <label style="margin-bottom: -10px;" for="select_all"></label>
                                                                        </th>
                                                                        <th>School </th>
                                                                        <th>Core Area Of Assessments</th>
                                                                        <th>Essential Aspects</th>
                                                                        <th>Delete</th>
                                                                        <th>Edit</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="EssentialAspectsList">                                         
                                                                </tbody>
                                                            </table>
                                                        </div>
                            
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <!--/.============== Essential Aspects Settings =================-->

                                    
                                    <!--============== Assessment Keys Settings =================-->
                                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"> 
                                        <!-- Create AssessmentKeys Modal -->
                                        <div class="modal fade" id="addAssessmentKeysModal" tabindex="-1" role="dialog" aria-labelledby="addAssessmentKeysModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="addAssessmentKeysModalLabel"><span class="fa fa-laptop"></span> Create Assessment Keys</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="" id="addAssessmentKeysModalOutput"></div>
                                                        <form action="" method="POST" style="margin-top: 10px;">
                                                            <div class="form-group">
                                                                <label style="font-weight: 600;">School/Institution:</label>
                                                                <select class="form-control" name="InstitutionID_AK" id="InstitutionID_AK" required>
                                                                    <option value="">Select School/Institution</option> 
                                                                    <?php
                                                                        $sqlShowInstitution = mysqli_query($link, "SELECT * FROM `institution` 
                                                                        LEFT JOIN agencyorschoolowner ON agencyorschoolowner.AgencyOrSchoolOwnerID=institution.AgencyOrSchoolOwnerID 
                                                                        WHERE agencyorschoolowner.AgencyOrSchoolOwnerID='$AgencyOrSchoolOwnerID'");
                                                                        $resultShowInstitution = mysqli_fetch_assoc($sqlShowInstitution);
                                                                        $resCount = mysqli_num_rows($sqlShowInstitution);
                                                                        do {
                                                                            echo '<option value="'.$resultShowInstitution["InstitutionID"].'">'.$resultShowInstitution["InstitutionName"].' '.$resultShowInstitution['InstitutionNameTwo'].'</option>';
                                                                        }while ($resultShowInstitution = mysqli_fetch_assoc($sqlShowInstitution));
                                                                    ?>
                                                                </select>
                                                            </div> 

                                                            <div class="form-group">
                                                                <label style="font-weight: 600;">Assessment Keys:</label>
                                                                <input type="text" class="form-control" name="AssessmentKey" id="AssessmentKey" placeholder="e.g. DAE " required>
                                                            </div>

                                                            
                                                            <div class="form-group">
                                                                <label style="font-weight: 600;">Assessment Description:</label>
                                                                <input type="text" class="form-control" name="AssessmentDescription" id="AssessmentDescription" placeholder="e.g. DAE - Developing As Expected" required>
                                                            </div>

                                                            <div class="modal-footer background-login">
                                                                <button type="button" class="btn btn-info" data-dismiss="modal"><span class="fa fa-times"></span> Cancel</button>
                                                                <button id="addAssessmentKeysModalBtn" type="button" class="btn btn-danger"><span class="fa fa-floppy-o"></span> Save Assessment Key</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.Create AssessmentKeys Modal -->

                                        <!-- Edit AssessmentKeys Modal -->
                                        <div class="modal fade" id="editAssessmentKeysModal" tabindex="-1" role="dialog" aria-labelledby="editAssessmentKeysModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editAssessmentKeysModalLabel"><span class="fa fa-laptop"></span> Edit Assessment Keys</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" id="editAssessmentKeysModalForm">
                                                    </div>

                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>
                                        <!-- /.Edit AssessmentKeys Modal -->

                                        <!-- Delete Single AssessmentKeys Modal -->
                                        <div class="modal fade" id="deleteAssessmentKeysModal" tabindex="-1" role="dialog" aria-labelledby="deleteAssessmentKeysModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div align="center" class="modal-content">
                                                    <form>
                                                        <div class="modal-body">
                                                            <span id="deleteAssessmentKeysModalOutput"></span>
                                                            <div id="deleteAssessmentKeysMsg">
                                                                <div align="center"><img src="../img/preloader.gif" /></div>
                                                            </div> 
                                                        </div>
                                                    
                                                        <div style="margin:auto; padding-bottom: 15px;">
                                                        <button type="button" class="btn btn-info" data-dismiss="modal"> <i class="fa fa-times"></i> Cancel</button>
                                                            <button id="deleteAssessmentKeysModalBtn" type="button" class="btn btn-danger deleteAssessmentKeysModalBtn"> <i class="fa fa-trash"></i> Yes! Delete</button>
                                                        </div>
                                                        
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.Delete Single AssessmentKeys Modal -->

                                        <!-- Delete Multiple AssessmentKeys Modal -->
                                        <div class="modal fade" id="deleteMultipleAssessmentKeysModal" tabindex="-1" role="dialog" aria-labelledby="deleteMultipleAssessmentKeysModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div align="center" class="modal-content">
                                                    <form>
                                                        <div class="modal-body">
                                                            <span id="deleteMultipleAssessmentKeysModalOutput"></span>
                                                            <div id="deleteMultipleAssessmentKeysModalMsg">
                                                                <div align="center"><img src="../img/preloader.gif" /></div>
                                                            </div> 
                                                        </div>
                                                        <div style="margin:auto; padding-bottom: 15px;">
                                                            <button type="button" class="btn btn-info" data-dismiss="modal"> <i class="fa fa-times"></i> Cancel</button>
                                                            <button id="deleteMultipleAssessmentKeysModalBtn" type="button" class="btn btn-danger deleteMultipleAssessmentKeysModalBtn"> <i class="fa fa-trash"></i> Yes! Delete</button>
                                                        </div>
                                                        
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /. Delete Multiple AssessmentKeys Modal -->

                                    
                                    
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="button-group" style="float: right;">
                                                            <button type="button" data-toggle="modal" data-target="#addAssessmentKeysModal" class="btn waves-effect waves-light btn-rounded btn-outline-info" style="font-size: 13px;"><i class="fa fa-plus"></i><span style="margin-left: 5px;">Create Assessment Key</span></button> 
                                                            
                                                        </div>
                                                        <h2 style="margin-top: 20px; color: black;"><span class="fa fa-laptop"></span> Assessment Key Settings</h2>
                                                        <a href="#" data-toggle="modal" data-target="#deleteMultipleAssessmentKeysModal">
                                                            <span style="display: none; color: red;" id="AssessmentKeys_select_count">
                                                            <i class="fa fa-trash"></i> Delete All</span>
                                                        </a>
                                                        <div class="table-responsive m-t-40">
                                                            <table id="myAssessmentKeysTable" class="table display table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th>
                                                                            <!--<input name="emp_checkbox" type="checkbox" id="select_all" />-->
                                                                            <input type="checkbox" id="select_allAssessmentKeys"class="filled-in chk-col-blue">
                                                                            <label style="margin-bottom: -10px;" for="select_allAssessmentKeys"></label>
                                                                        </th>
                                                                        <th>School </th>
                                                                        <th>Assessment Keys</th>
                                                                        <th>Assessment Description</th>
                                                                        <th>Delete</th>
                                                                        <th>Edit</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="AssessmentKeysList">                                         
                                                                </tbody>
                                                            </table>
                                                        </div>
                            
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--/.============== Assessment Keys Settings =================-->

                                    <!--Online Entry Setting-->
                                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                                        <div id="anasresponseforcolors"></div>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h2 class="text-themecolor" style="color: black; font-weight: 400;">Check Results</h2>
                                                        <h4 class="box-title m-b-0" style="color: black;">British Result Sheet</h4>
                                                        <div class="row" style="margin-top: 20px;">
                                                            <div class="col-sm-12 col-xs-12">

                                                                <!-- ============================================================== -->
                                                                <!-- Bread crumb and right sidebar toggle -->
                                                                <!-- ============================================================== -->
                                                                <div class="row page-titles" style="padding:50px;">
                                                                    <div class="col-sm-3 align-self-center" style="margin-bottom: -20px;">
                                                                        <form>
                                                                            <div class="form-group">
                                                                                <select id='selinstitution' class="form-control chimaPrimaryBorderColor" style="background: white; border-width: 1px; border-style: solid; font-size: 14px;">
                                                                                    <option disabled selected>Schools/Institutions</option>
                                                                                    <?php  
                                                                                            $sqlforinstitutionanas = mysqli_query($link,"SELECT * FROM `institution` WHERE `AgencyOrSchoolOwnerID` = '$AgencyOrSchoolOwnerID'");
                                                                                            $rowforinstitutionanas  = mysqli_fetch_assoc($sqlforinstitutionanas );
                                                                                            do{
                                                                                        echo '<option value="'.$rowforinstitutionanas['InstitutionID'].'">'.$rowforinstitutionanas['InstitutionName'].'</option>';
                                                                                            }while($rowforinstitutionanas  = mysqli_fetch_assoc($sqlforinstitutionanas));
                                                                                

                                                                                    ?>
                                                                            
                                                                                </select>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <div class="col-sm-2 align-self-center" style="margin-bottom: -20px;">
                                                                        <form>
                                                                            <div class="form-group">
                                                                                <select id='sessionval'  class="form-control chimaPrimaryBorderColor" style="background: white; border-width: 1px; border-style: solid; font-size: 14px;">
                                                                                    <option disabled selected value="0">Session</option> 
                                                                                    <?php  
                                                                                        $sql = mysqli_query($link,"SELECT * FROM `session`");
                                                                                        $row = mysqli_fetch_array($sql);
                                                                                        do{
                                                                                            echo '<option value="'.$row['sessionName'].'">'.$row['sessionName'].'</option>';
                                                                                        }
                                                                                        while($row = mysqli_fetch_array($sql));                                                                                

                                                                                    ?>                              
                                                                                </select>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <div class="col-sm-2 align-self-center" style="margin-bottom: -20px;">
                                                                        <form>
                                                                            <div class="form-group">
                                                                                <select id='termval' class="form-control chimaPrimaryBorderColor" style="background: white; border-width: 1px; border-style: solid; font-size: 14px;">
                                                                                    <option disabled selected value="0">Term</option> 
                                                                                    <?php  
                                                                                        $termorsemestersql = mysqli_query($link,"SELECT * FROM `termorsemester`");
                                                                                        $termorsemesterrow = mysqli_fetch_array($sql);
                                                                                        do{
                                                                                            echo '<option value="'.$termorsemesterrow['TermOrSemesterID'].'">'.$termorsemesterrow['TermOrSemesterName'].'</option>';
                                                                                        }
                                                                                        while($termorsemesterrow = mysqli_fetch_array($termorsemestersql));
                                                                                    ?>                              
                                                                                </select>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <div class="col-sm-2 align-self-center" style="margin-bottom: -20px;">
                                                                        <form>
                                                                            <div class="form-group">
                                                                                <select id="selschool"  class="form-control chimaPrimaryBorderColor" style="background: white; border-width: 1px; border-style: solid; font-size: 14px;">
                                                                                    <option disabled selected>Grade/Faculty</option>                              
                                                                                </select>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                    <div class="col-sm-2 align-self-center" style="margin-bottom: -20px;">
                                                                        <form>
                                                                            <div class="form-group">
                                                                                <select id="classid"  class="form-control chimaPrimaryBorderColor" style="background: white; border-width: 1px; border-style: solid; font-size: 14px;">
                                                                                    <option disabled selected>Class</option>                             
                                                                                </select>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                
                                                                    <div class="col-sm-1 align-self-center">
                                                                        <button type="button" id="loadfilterbutton" class="btn chimaNormalBtn" style="width: 80px;">
                                                                            <span style="font-size: 13px;" >Load</span>
                                                                        </button>
                                                                    </div>
                                                                    <!--<div class="">
                                                                        <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                                                                    </div>-->
                                                                </div>
                                                                <!-- ============================================================== -->
                                                                <!-- End Bread crumb and right sidebar toggle -->
                                                                <!-- ============================================================== -->


                                                                <div class="modal fade" id="alert1" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-sm modal-dialog-centered">
                                                                        <div class="modal-content bg-success text-white">
                                                                            <div class="modal-body text-center">
                                                                                <h3 class="text-white mb-15">Hurray!!!</h3>
                                                                                <span id="uploadSuccessMsg">British Result Upload Successfully</span><br><br>
                                                                                <button type="button" class="btn btn-light" data-dismiss="modal">Ok</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="modal fade" id="alert2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog modal-sm modal-dialog-centered">
                                                                        <div class="modal-content bg-danger text-white">
                                                                            <div class="modal-body text-center">
                                                                                <h3 class="text-white mb-15">ERROR</h3>
                                                                                <span id="uploadErrMsg">British Result Upload Failed</span><br><br>
                                                                                <button type="button" class="btn btn-light" data-dismiss="modal">Ok</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- ============================================================== -->
                                                                <!-- Container fluid  -->
                                                                <!-- ============================================================== -->
                                                                <div class="container-fluid">
                                                                    
                                                                    <!-- ============================================================== -->
                                                                    <!-- Start Page Content -->
                                                                    <!-- ============================================================== -->
                                                                    
                                                                    
                                                                    <div class="row">
                                                                        <div id="britishResultUploadOutput" class="col-md-12" style="display:block; padding:25px; margin-bottom: 10px; text-align:center;"></div>
                                                                        <div id="loadStudentData" class="col-md-12">
                                                                        </div>
                                                                
                                                                    </div>
                                                                    <!-- ============================================================== -->
                                                                    <!-- End PAge Content -->
                                                                    <!-- ============================================================== -->
                                                                    <!-- ============================================================== -->
                                                                
                                                                </div>
                                                                <!-- ============================================================== -->
                                                                <!-- End Container fluid  -->
                                                                <!-- ============================================================== -->

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- ============================================================== -->
                                        <!-- End Container fluid  -->
                                        <!-- ============================================================== -->
                                        <!-- ============================================================== -->
                                    </div>
                                    <!-- ============================================================== -->
                                    <!-- End Page wrapper  -->
                                    <!-- ============================================================== -->

                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
              <!-- footer -->
            <!-- ============================================================== -->
            <?php include ('../includes/footer.php'); ?>
            <!-- ============================================================== -->
            <!-- End footer -->
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
      <!-- Magnific popup JavaScript -->
      <script src="../assets/plugins/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
      <script src="../assets/plugins/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>

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
            // Load in all the Core Areas

            $.fn.reloadTable = function(){
                var AgencyOrSchoolOwnerID = '<?php echo $AgencyOrSchoolOwnerID; ?>';
                $.ajax({
                    type: "POST",
                    url: "../controller/scripts/owner/loadCoreArea.php",
                    data: 'AgencyOrSchoolOwnerID='+AgencyOrSchoolOwnerID,
                    success: function(result){
                        $('#CoreAreaList').html(result);

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
                    }
                });
            }

            // Load in all the Essential Aspects

            $.fn.reloadEssentialAspectsTable = function(){
                var AgencyOrSchoolOwnerID = '<?php echo $AgencyOrSchoolOwnerID; ?>';
                $.ajax({
                    type: "POST",
                    url: "../controller/scripts/owner/loadEssentialAspects.php",
                    data: 'AgencyOrSchoolOwnerID='+AgencyOrSchoolOwnerID,
                    success: function(result){
                        $('#EssentialAspectsList').html(result);

                        $(document).ready(function() {
                            $('#myEssentialAspectsTable').DataTable();
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
                    }
                });
            }// Load in all the AssessmentKeys

            $.fn.reloadAssessmentKeysTable = function(){
                var AgencyOrSchoolOwnerID = '<?php echo $AgencyOrSchoolOwnerID; ?>';
                $.ajax({
                    type: "POST",
                    url: "../controller/scripts/owner/loadAssessmentKeys.php",
                    data: 'AgencyOrSchoolOwnerID='+AgencyOrSchoolOwnerID,
                    success: function(result){
                        $('#AssessmentKeysList').html(result);

                        $(document).ready(function() {
                            $('#myAssessmentKeysTable').DataTable();
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
                    }
                });


                
                $(document).on('click', '#select_allAssessmentKeys', function() {  
                    $(".checkbox_AssessmentKeyID").prop("checked", this.checked);
                    $("#AssessmentKeys_select_count").html("<i class='fa fa-trash'></i> Delete " +$("input.checkbox_AssessmentKeyID:checked").length+" Selected");

                    if($("input.checkbox_AssessmentKeyID:checked").length < 1){
                        $(this).prop('checked', false);
                        $("#AssessmentKeys_select_count").fadeOut('slow'); 
                    }else{
                        $("#AssessmentKeys_select_count").fadeIn('slow'); 	

                    }
                    
                });	
                
                $(document).on('click', '.checkbox_AssessmentKeyID', function() {	
                    $("#AssessmentKeys_select_count").fadeIn('slow'); 
                    
                    if ($('.checkbox_AssessmentKeyID:checked').length == $('.checkbox_AssessmentKeyID').length) {
                        $('#select_allAssessmentKeys').prop('checked', true);
                    } else {
                        $('#select_allAssessmentKeys').prop('checked', false);
                    }
                    $("#AssessmentKeys_select_count").html("<i class='fa fa-trash'></i> Delete ("+$("input.checkbox_AssessmentKeyID:checked").length+") Selected");
                    
                    if($("input.checkbox_AssessmentKeyID:checked").length < 1){
                        $(this).prop('checked', false);
                        $("#AssessmentKeys_select_count").fadeOut('slow'); 
                    }else{
                        $("#AssessmentKeys_select_count").fadeIn('slow'); 	

                    }
                    
                }); 
            }
            
            
        });
    </script>

    <script>
        //===================COREAREA TAB BEGINS HERE==============================
        $(document).ready(function() {
            
            
            $.fn.reloadTable();

            // Preloader
            $("#addCoreAreaModalBtn").click(function () {
                //alert("Click is firing!");
                var InstitutionID = $("#InstitutionID").val();
                var CoreArea = $("#CoreArea").val();

                var dataString = 'InstitutionID='+InstitutionID+'&CoreArea='+CoreArea;
                $("#addCoreAreaModalBtn").html("<i class='fa fa-spinner fa-spin'></i>  Saving...");
                $.ajax({
                    type: "POST",
                    url: "../controller/scripts/institution/addCoreArea.php",
                    data: dataString,
                    cache: false,
                    success: function(result){
                        $('#addCoreAreaModalOutput').html(result);
                        $("#CoreArea").val('');
                        $("#addCoreAreaModalBtn").html("<span class='fa fa-floppy-o'></span> Save Core Area");
                        // Reload in all the Core Areas List
                        $.fn.reloadTable();
                    }
                });
            });
            $("#addCoreAreaModal").on('show.bs.modal', function (e) {
                $('#addCoreAreaModalOutput').html('');
            });

            $("#editCoreAreaModal").on('show.bs.modal', function (e) {
                var rowid =  $(e.relatedTarget).data('id');
                var AgencyOrSchoolOwnerID = '<?php echo $AgencyOrSchoolOwnerID; ?>';
                
                $("#editCoreAreaModalForm").html('<div style="margin: 0 auto;"><img src="../img/preloader.gif" /></div>');
                $.ajax({
                    type: "POST",
                    url: "../controller/scripts/owner/loadCoreAreaEditModal.php",
                    data: 'CoreAreaID='+ rowid+'&AgencyOrSchoolOwnerID='+AgencyOrSchoolOwnerID,
                    success: function(result) {
                        $("#editCoreAreaModalForm").html(result);
                        // Edit Core Area
                        $("#editCoreAreaModalBtn").click(function () {
                            //alert("Click is firing!");
                            var rowid =  $(e.relatedTarget).data('id');
                            var InstitutionID = $("#InstitutionID_edit").val();
                            var CoreArea = $("#CoreArea_edit").val();
                            var dataString = 'InstitutionID='+InstitutionID+'&CoreArea='+CoreArea+'&rowid='+rowid;

                            $("#editCoreAreaModalBtn").html("<i class='fa fa-spinner fa-spin'></i> Editing...");
                            $.ajax({
                                type: "POST",
                                url: "../controller/scripts/owner/editCoreArea.php",
                                data: dataString,
                                cache: false,
                                success: function(result){
                                    $('#editCoreAreaModalOutput').html(result);
                                    // Reload in all the Core Areas
                                    $("#editCoreAreaModalBtn").html("Edit Core Area");
                                    $.fn.reloadTable();
                                }
                            });
                        });  
                    }
                });
    
            });        

        });


        //==============Delete CoreArea Single======================================== // 
        //load it into modal as a prompt
        $(document).ready(function(){
        
            $('#deleteCoreAreaModal').on('show.bs.modal', function (e) {
                var CoreAreaID = $(e.relatedTarget).data('id');
                var dataString = '&CoreAreaID='+ CoreAreaID;
                $.ajax({
                    type: "POST",
                    url: "../controller/scripts/owner/loadSelSingleCoreAreaForDelete.php",
                    data: dataString,
                    cache: false,
                    
                    success: function(result){
                        $('#deleteCoreAreaMsg').html(result);
                        $('#deleteCoreAreaModalOutput').html('');		
                                    
                        $("#deleteCoreAreaModalBtn").click(function(){
                            var CoreAreaID = $("#CoreAreaID").val();
                            var dataString = '&CoreAreaID='+ CoreAreaID;
                            $('#deleteCoreAreaModalBtn').html('<i class="fa fa-spinner fa-spin"></i> Deleting...');
                            $.ajax({
                                type: "POST",
                                url: "../controller/scripts/owner/ProceedToDelSingleCoreArea.php",
                                data: dataString,
                                cache: false,
                                
                                success: function(result){
                                    $('#deleteCoreAreaModalOutput').html(result);	
                                    $('#deleteCoreAreaMsg').html('');
                                    $('#deleteCoreAreaModalBtn').html('<i class="fa fa-trash"></i>  Delete');
                                    $.fn.reloadTable();								   
                                }
                            });
                        });	  

                    }
                });
            });	 
        
        
        });
        //==============End Delete CoreArea Single=============================================================== // 
    
        $(document).on('click', '#CoreArea_select_all', function() {  
            $(".CoreArea_checkbox").prop("checked", this.checked);
            $("#CoreArea_select_count").html("<i class='fa fa-trash'></i> Delete " +$("input.CoreArea_checkbox:checked").length+" Selected");

            if($("input.CoreArea_checkbox:checked").length < 1){
                $(this).prop('checked', false);
                $("#CoreArea_select_count").fadeOut('slow'); 
            }else{
                $("#CoreArea_select_count").fadeIn('slow'); 	

            }
            
        });	
        
        $(document).on('click', '.CoreArea_checkbox', function() {	
            
            $("#CoreArea_select_count").fadeIn('slow'); 
            
            if ($('.CoreArea_checkbox:checked').length == $('.CoreArea_checkbox').length) {
                $('#CoreArea_select_all').prop('checked', true);
            } else {
                $('#CoreArea_select_all').prop('checked', false);
            }
            $("#CoreArea_select_count").html("<i class='fa fa-trash'></i> Delete ("+$("input.CoreArea_checkbox:checked").length+") Selected");
            
            if($("input.CoreArea_checkbox:checked").length < 1){
                $(this).prop('checked', false);
                $("#CoreArea_select_count").fadeOut('slow'); 
            }else{
                $("#CoreArea_select_count").fadeIn('slow'); 	

            }
            
        }); 

        //==============Delete CoreArea Multiple--================================================================//

        //Load the selected checkboxes into modal========= 
        $(document).ready(function(){
            $('#deleteMultipleCoreAreaModal').on('show.bs.modal', function (e) {
                var multipleDelSelCoreAreaID = [];
                $.each($("input[name='multipleDelSelCoreAreaID']:checked"), function(){            
                    multipleDelSelCoreAreaID.push($(this).val());
                });


                var dataString = '&multipleDelSelCoreAreaID='+ multipleDelSelCoreAreaID;
                
                $.ajax({
                    type: "POST",
                    url: "../controller/scripts/owner/loadMultipleDelCoreAreaCheckBoxPrompt.php",
                    data: dataString,
                    cache: false,
                    
                    success: function(result){
                        $('#deleteMultipleCoreAreaModalMsg').html(result);
                        $('#deleteMultipleCoreAreaModalOutput').html('');	
                         
                        $("#deleteMultipleCoreAreaModalBtn").click(function(){
                            var selcheckboxesToDelMultipleCoreAreaID = $("#selcheckboxesToDelMultipleCoreAreaID").val();
                            var dataString = '&selcheckboxesToDelMultipleCoreAreaID='+ selcheckboxesToDelMultipleCoreAreaID;

                            $('#deleteMultipleCoreAreaModalBtn').html('<i class="fa fa-spinner fa-spin"></i> Deleting...');
                                        
                            $.ajax({
                                type: "POST",
                                url: "../controller/scripts/owner/ProceedToDelCoreAreaForSelCheckBox.php",
                                data: dataString,
                                cache: false,
                                
                                success: function(result){
                                    $('#deleteMultipleCoreAreaModalOutput').html(result);
                                    $('#deleteMultipleCoreAreaModalMsg').html('');
                                    $('#deleteMultipleCoreAreaModalBtn').html('<i class="fa fa-trash"></i>  Delete');	
                                    $('#delBtnSpan').hide();
                                    $("#CoreArea_select_count").fadeIn('slow'); 
                                    $.fn.reloadTable();				   
                                }
                            });
                        });	                         
                    }
                });
            });	
        
        });

        //==============End Delete CoreArea Multiple ========================================== // 

        //=======================================================================
    </script>

    <script>
        //===================ESSENTIAL ASPECTS TAB BEGINS HERE==============================
        $(document).ready(function() {
            
            $.fn.reloadEssentialAspectsTable();

             
            $("#InstitutionID_EA").change(function(){
                var InstitutionID_EA = $(this).children("option:selected").val();
                var AgencyOrSchoolOwnerID = '<?php echo $AgencyOrSchoolOwnerID ?>';
                
                $.ajax({
                    type: "POST",
                    url: "../controller/scripts/owner/loadCoreAreasFilter.php",
                    data: 'InstitutionID='+InstitutionID_EA+'&AgencyOrSchoolOwnerID='+AgencyOrSchoolOwnerID,
                    cache: false,
                    success: function(result){
                        $('#loadCoreAreasFilterOutput').html(result);
                    }
                });
            });

            // Preloader
            $("#addEssentialAspectsModalBtn").click(function () {
                //alert("Click is firing!");
                var InstitutionID = $("#InstitutionID_EA").val(); // EA is used to mark unique ID for Essential Aspects
                var CoreAreaID = $("#CoreAreaID_EA").val();
                var EssentialAspects = $("#EssentialAspects").val();

                var dataString = 'InstitutionID='+InstitutionID+'&CoreAreaID='+CoreAreaID+'&EssentialAspects='+EssentialAspects;
                $("#addEssentialAspectsModalBtn").html("<i class='fa fa-spinner fa-spin'></i>  Saving...");
                $.ajax({
                    type: "POST",
                    url: "../controller/scripts/owner/addEssentialAspects.php",
                    data: dataString,
                    cache: false,
                    success: function(result){
                        $('#addEssentialAspectsModalOutput').html(result);
                        $("#CoreArea").val('');
                        $("#EssentialAspects").val('');
                        $("#addEssentialAspectsModalBtn").html("<span class='fa fa-floppy-o'></span> Save Essential Aspects");
                        $.fn.reloadEssentialAspectsTable();
                    }
                });
            });
            $("#addEssentialAspectsModal").on('show.bs.modal', function (e) {
                $('#addEssentialAspectsModalOutput').html('');                 
            });

            $("#editEssentialAspectsModal").on('show.bs.modal', function (e) {
                var rowid =  $(e.relatedTarget).data('id');
                var AgencyOrSchoolOwnerID = '<?php echo $AgencyOrSchoolOwnerID; ?>';

                $('#editEssentialAspectsModalOutput').html('');
                $('#editEssentialAspectsModalForm').html('<center><img src="../img/preloader.gif" /></center>');

                $.ajax({
                    type: "POST",
                    url: "../controller/scripts/owner/loadEssentialAspectsEditModal.php",
                    data: 'rowid='+ rowid+'&AgencyOrSchoolOwnerID='+AgencyOrSchoolOwnerID,
                    success: function(result) {
                        $("#editEssentialAspectsModalForm").html(result);
                        // Edit Essential Aspects
                        $("#editEssentialAspectsModalBtn").click(function () {
                            //alert("Click is firing!");
                            var rowid =  $(e.relatedTarget).data('id');
                            var InstitutionID = $("#InstitutionID_EA_edit").val();
                            var EssentialAspects = $("#EssentialAspects_EA_edit").val();
                            var CoreAreaID = $("#CoreAreaID_EA_edit").val();
                            var dataString = 'InstitutionID='+InstitutionID+'&CoreAreaID='+CoreAreaID+'&EssentialAspects='+EssentialAspects+'&rowid='+rowid;

                            $("#editEssentialAspectsModalBtn").html('<span class="fa fa-spinner fa-spin"></span> Editing...');
                            $.ajax({
                                type: "POST",
                                url: "../controller/scripts/owner/editEssentialAspects.php",
                                data: dataString,
                                cache: false,
                                success: function(result){
                                    $('#editEssentialAspectsModalOutput').html(result);
                                    // Reload in all the Essential Aspects
                                    $("#editEssentialAspectsModalBtn").html('<span class="fa fa-pencil"></span> Edit Essential Aspects');
                                    $.fn.reloadEssentialAspectsTable();
                                }
                            });
                        });  
                    }
                });
    
            });        

        });


        //==============Handle all checkbox Isuues for Load all EssentialAspects table============================= //  
        $(document).ready(function() {
            $("#delBtnSpanEssentialAspects").hide();	
            $("#select_allEssentialAspects").change(function(){  //"select all" change 
                var checkStatus = $(this).prop('checked');
                if(checkStatus == true){
                    $(".checkbox_EssentialAspectsID").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
                    var selTotal = $('.checkbox_EssentialAspectsID:checked').length;
                    $('#delAllBtnEssentialAspects').html('<i class="ft-trash-2"></i> Delete (' + selTotal+')');
                    $("#delBtnSpanEssentialAspects").fadeIn("slow");
                
                }else if(checkStatus == false){
                    $(".checkbox_EssentialAspectsID").prop('checked', false); //change "select all" checked status to false
                    var selTotal = $('.checkbox_EssentialAspectsID:checked').length;
                    $("#delBtnSpanEssentialAspects").fadeOut("slow");
                }
                
            });

            $('.checkbox_EssentialAspectsID').change(function(){ 
                
                $("#delBtnSpanEssentialAspects").show();	
                if ($('.checkbox_EssentialAspectsID:checked').length == $('.checkbox_EssentialAspectsID').length ){
                    //delAllBtnEssentialAspectsbtn
                    alert($('.checkbox_EssentialAspectsID:checked').length);
                    $("#select_allEssentialAspects").prop('checked', true);
                    var selTotalSingle = $('.checkbox_EssentialAspectsID:checked').length;
                    
                    if(selTotalSingle >0){
                        $('#delAllBtnEssentialAspects').html('<i class="ft-trash-2"></i> Delete (' + selTotalSingle +')');
                        $("#delBtnSpanEssentialAspects").fadeIn("slow");
                    }else{
                        $("#delBtnSpanEssentialAspects").fadeOut("slow");
                    }
                    
                }else if ($('.checkbox_EssentialAspectsID:checked').length != $('.checkbox_EssentialAspectsID').length ){
                    $("#select_allEssentialAspects").prop('checked', false);
                    var selTotalSingle = $('.checkbox_EssentialAspectsID:checked').length;

                    if(selTotalSingle >0){
                        $('#delAllBtnEssentialAspects').html('<i class="ft-trash-2"></i> Delete (' + selTotalSingle +')');
                        $("#delBtnSpanEssentialAspects").fadeIn("slow");
                    }else{
                        $("#delBtnSpanEssentialAspects").fadeOut("slow");
                    }
                }


            });



        });


        //==============Delete EssentialAspects Single======================================== // 
        //load it into modal as a prompt
        $(document).ready(function(){
        
            $('#deleteEssentialAspectsModal').on('show.bs.modal', function (e) {
                var EssentialAspectsID = $(e.relatedTarget).data('id');
                var dataString = '&EssentialAspectsID='+ EssentialAspectsID;

                $('#deleteEssentialAspectsModalOutput').html('');
                $('#deleteEssentialAspectsMsg').html('<center><img src="../img/preloader.gif" /></center>');
                $.ajax({
                    type: "POST",
                    url: "../controller/scripts/owner/loadSelSingleEssentialAspectsForDelete.php",
                    data: dataString,
                    cache: false,
                    
                    success: function(result){
                        $('#deleteEssentialAspectsMsg').html(result);	
                                    
                        $("#deleteEssentialAspectsModalBtn").click(function(){
                            var EssentialAspectsID = $("#EssentialAspectsID").val();
                            var dataString = '&EssentialAspectsID='+ EssentialAspectsID;
                            $('#deleteEssentialAspectsModalBtn').html('<i class="fa fa-spinner fa-spin"></i> Deleting...');
                            $.ajax({
                                type: "POST",
                                url: "../controller/scripts/owner/ProceedToDelSingleEssentialAspects.php",
                                data: dataString,
                                cache: false,
                                
                                success: function(result){
                                    $('#deleteEssentialAspectsModalOutput').html(result);	
                                    $('#deleteEssentialAspectsModalBtn').html('<i class="fa fa-trash"></i> Delete');
                                    $.fn.reloadEssentialAspectsTable();							   
                                }
                            });
                        });	  

                    }
                });
            });	 
        
        
        });
        
        $(document).on('click', '#select_all', function() {  
            
                //$(this).prop('checked', false);
                //$("#select_count").fadeOut('slow'); 
                $(".emp_checkbox").prop("checked", this.checked);
                $("#select_count").html("<i class='fa fa-trash'></i> Delete " +$("input.emp_checkbox:checked").length+" Selected");

                if($("input.emp_checkbox:checked").length < 1){
                    $(this).prop('checked', false);
                    $("#select_count").fadeOut('slow'); 
                }else{
                    $("#select_count").fadeIn('slow'); 	

                }
             
        });	
        
        $(document).on('click', '.emp_checkbox', function() {	
            
            $("#select_count").fadeIn('slow'); 
            
            if ($('.emp_checkbox:checked').length == $('.emp_checkbox').length) {
                $('#select_all').prop('checked', true);
            } else {
                $('#select_all').prop('checked', false);
            }
            $("#select_count").html("<i class='fa fa-trash'></i> Delete ("+$("input.emp_checkbox:checked").length+") Selected");
            
            if($("input.emp_checkbox:checked").length < 1){
                $(this).prop('checked', false);
                $("#select_count").fadeOut('slow'); 
            }else{
                $("#select_count").fadeIn('slow'); 	

            }
            
        }); 

        

        //==============End Delete EssentialAspects Single=============================================================== // 
        //==============Delete School Multiple--================================================================//

        //Load the selected checkboxes into modal========= 
        $(document).ready(function(){
            $('#deleteMultipleEssentialAspectsModal').on('show.bs.modal', function (e) {
                $("#select_count").hide('slow'); 
                var multipleDelSelEssentialAspectsID = [];
                $.each($("input[name='multipleDelSelEssentialAspectsID']:checked"), function(){            
                    multipleDelSelEssentialAspectsID.push($(this).val());
                });


                var dataString = '&multipleDelSelEssentialAspectsID='+ multipleDelSelEssentialAspectsID;
                

                $('#deleteMultipleEssentialAspectsModalOutput').html('');
                
                $('#deleteMultipleEssentialAspectsModalMsg').html('<center><img src="../img/preloader.gif" /></center>');
                $.ajax({
                    type: "POST",
                    url: "../controller/scripts/owner/loadMultipleDelEssentialAspectsCheckBoxPrompt.php",
                    data: dataString,
                    cache: false,
                    
                    success: function(result){
                        $('#deleteMultipleEssentialAspectsModalMsg').html(result);	
                         
                        $("#deleteMultipleEssentialAspectsModalBtn").click(function(){
                            var selcheckboxesToDelMultipleEssentialAspectsID = $("#selcheckboxesToDelMultipleEssentialAspectsID").val();
                            var dataString = '&selcheckboxesToDelMultipleEssentialAspectsID='+ selcheckboxesToDelMultipleEssentialAspectsID;

                            alert(dataString);
                            
                            $('#deleteMultipleEssentialAspectsModalBtn').html('<i class="fa fa-spinner fa-spin"></i> Deleting...');
                                        
                            $.ajax({
                                type: "POST",
                                url: "../controller/scripts/owner/ProceedToDelEssentialAspectsForSelCheckBox.php",
                                data: dataString,
                                cache: false,
                                
                                success: function(result){
                                    $('#deleteMultipleEssentialAspectsModalOutput').html(result);	
                                    $('#delBtnSpan').hide();
                                    $('#deleteMultipleEssentialAspectsModalBtn').html('<i class="fa fa-trash"></i> Delete');
                                    $.fn.reloadEssentialAspectsTable();		   
                                }
                            });
                            
                        });	                         
                    }
                });
            });	
        
        });

        //==============End Delete Multiple Multiple ========================================== // 

        //=======================================================================
    </script>

    <script>
        //===================AssessmentKeys TAB BEGINS HERE==============================
        $(document).ready(function() {
            
            $.fn.reloadAssessmentKeysTable();

            // Preloader
            $("#addAssessmentKeysModalBtn").click(function () {
                //alert("Click is firing!");
                var InstitutionID = $("#InstitutionID_AK").val();
                var AssessmentKey = $("#AssessmentKey").val();
                var AssessmentDescription = $("#AssessmentDescription").val();

                var dataString = 'InstitutionID='+InstitutionID+'&AssessmentKey='+AssessmentKey+'&AssessmentDescription='+AssessmentDescription;
                
                $("#addAssessmentKeysModalBtn").html("<i class='fa fa-spinner fa-spin'></i>  Saving...");
                $.ajax({
                    type: "POST",
                    url: "../controller/scripts/owner/addAssessmentKeys.php",
                    data: dataString,
                    cache: false,
                    success: function(result){
                        $('#addAssessmentKeysModalOutput').html(result);
                        // Reload in all the Assessment Keys List
                        $("#AssessmentKey").val('');
                        $("#AssessmentDescription").val('');
                        $("#addAssessmentKeysModalBtn").html("<i class='fa fa-floppy-o'></i> Save Assessment Key");
                        $.fn.reloadAssessmentKeysTable();
                    }
                });
            });

            $("#addAssessmentKeysModal").on('show.bs.modal', function (e) {
                $('#addAssessmentKeysModalOutput').html('');
            });

            $("#editAssessmentKeysModal").on('show.bs.modal', function (e) {
                var rowid =  $(e.relatedTarget).data('id');
                var AgencyOrSchoolOwnerID = '<?php echo $AgencyOrSchoolOwnerID; ?>';

                $('#editAssessmentKeysModalOutput').html('');
                $.ajax({
                    type: "POST",
                    url: "../controller/scripts/owner/loadAssessmentKeysEditModal.php",
                    data: 'AssessmentKeyID='+ rowid+'&AgencyOrSchoolOwnerID='+AgencyOrSchoolOwnerID,
                    success: function(result) {
                        $("#editAssessmentKeysModalForm").html(result);
                        // Edit Assessment Keys
                        $("#editAssessmentKeysModalBtn").click(function () {
                            //alert("Click is firing!");
                            var rowid =  $(e.relatedTarget).data('id');
                            var InstitutionID = $("#InstitutionID_AK_edit").val();
                            var AssessmentKey = $("#AssessmentKey_edit").val();
                            var AssessmentDescription = $("#AssessmentDescription_edit").val();
                            var dataString = 'InstitutionID='+InstitutionID+'&AssessmentKey='+AssessmentKey+'&AssessmentDescription='+AssessmentDescription+'&rowid='+rowid;

                            
                            $("#editAssessmentKeysModalBtn").html('<i class="fa fa-spinner fa-spin"></i> Editing...');
                            $.ajax({
                                type: "POST",
                                url: "../controller/scripts/owner/editAssessmentKeys.php",
                                data: dataString,
                                cache: false,
                                success: function(result){
                                    $('#editAssessmentKeysModalOutput').html(result);
                                    // Reload in all the Assessment Keys
                                    $("#editAssessmentKeysModalBtn").html('<i class="fa fa-pencil"></i> Edit Assessment Key');
                                    $.fn.reloadAssessmentKeysTable();
                                }
                            });
                        });  
                    }
                });
    
            });        

        });

 


        //==============Delete AssessmentKeys Single======================================== // 
        //load it into modal as a prompt
        $(document).ready(function(){
        
            $('#deleteAssessmentKeysModal').on('show.bs.modal', function (e) {
                var AssessmentKeyID = $(e.relatedTarget).data('id');
                var dataString = '&AssessmentKeyID='+ AssessmentKeyID;
                
                $('#deleteAssessmentKeysModalOutput').html('');	
                $.ajax({
                    type: "POST",
                    url: "../controller/scripts/owner/loadSelSingleAssessmentKeysForDelete.php",
                    data: dataString,
                    cache: false,
                    
                    success: function(result){
                        $('#deleteAssessmentKeysMsg').html(result);	
                                    
                        $("#deleteAssessmentKeysModalBtn").click(function(){
                            var AssessmentKeyID = $("#AssessmentKeyID").val();
                            var dataString = '&AssessmentKeyID='+ AssessmentKeyID;
                            $('#deleteAssessmentKeysModalBtn').html('<i class="fa fa-spinner fa-spin"></i> Deleting...');
                            $.ajax({
                                type: "POST",
                                url: "../controller/scripts/owner/ProceedToDelSingleAssessmentKeys.php",
                                data: dataString,
                                cache: false,
                                
                                success: function(result){
                                    $('#deleteAssessmentKeysModalOutput').html(result);	
                                    $('#deleteAssessmentKeysMsg').html('');	
                                    $('#deleteAssessmentKeysModalBtn').html('<i class="fa fa-trash"></i> Delete');
                                    $.fn.reloadAssessmentKeysTable();							   
                                }
                            });
                        });	  

                    }
                });
            });	 
        
        
        });
        //==============End Delete AssessmentKeys Single=============================================================== // 


        //==============Delete AssessmentKeys Multiple--================================================================//
        //Load the selected checkboxes into modal========= 
        $(document).ready(function(){
            $('#deleteMultipleAssessmentKeysModal').on('show.bs.modal', function (e) {
                $("#AssessmentKeys_select_count").hide('slow'); 
                var multipleDelSelAssessmentKeyID = [];
                $.each($("input[name='multipleDelSelAssessmentKeyID']:checked"), function(){            
                    multipleDelSelAssessmentKeyID.push($(this).val());
                });


                var dataString = '&multipleDelSelAssessmentKeyID='+ multipleDelSelAssessmentKeyID;
                
                $('#deleteMultipleAssessmentKeysModalOutput').html('');	
                $.ajax({
                    type: "POST",
                    url: "../controller/scripts/owner/loadMultipleDelAssessmentKeysCheckBoxPrompt.php",
                    data: dataString,
                    cache: false,
                    
                    success: function(result){
                        $('#deleteMultipleAssessmentKeysModalMsg').html(result);	
                         
                        $("#deleteMultipleAssessmentKeysModalBtn").click(function(){
                            var selcheckboxesToDelMultipleAssessmentKeyID = $("#selcheckboxesToDelMultipleAssessmentKeyID").val();
                            var dataString = '&selcheckboxesToDelMultipleAssessmentKeyID='+ selcheckboxesToDelMultipleAssessmentKeyID;

                            alert(dataString);
                            
                            $('#deleteMultipleAssessmentKeysModalBtn').html('<i class="fa fa-spinner fa-spin"></i> Deleting...');
                                        
                            $.ajax({
                                type: "POST",
                                url: "../controller/scripts/owner/ProceedToDelAssessmentKeysForSelCheckBox.php",
                                data: dataString,
                                cache: false,
                                
                                success: function(result){
                                    $('#deleteMultipleAssessmentKeysModalOutput').html(result);	
                                    $('#deleteMultipleAssessmentKeysModalMsg').html('');
                                    $('#AssessmentKeys_select_count').hide();
                                    $('#deleteMultipleAssessmentKeysModalBtn').html('<i class="fa fa-trash"></i> Delete');
                                    $.fn.reloadAssessmentKeysTable();		   
                                }
                            });
                            
                        });	                         
                    }
                });
            });	
        
        });
        //==============End Delete Multiple Multiple ========================================== // 


    </script>

    <script>
         
        //==================================================== 
        //=============handle institution change========================
        $("#selinstitution").change(function(){
            var selectedinstitution = $("#selinstitution").val();
            $("#selschool").html('<option>Waiting</option>');
            $.ajax({
                method:'post',
                url:'../controller/scripts/owner/loadSchoolForStudentFilter.php',
                data:'selectedinstitution='+ selectedinstitution,
                success: function(institutiondata){
                    $("#selschool").html(institutiondata);
                    var selectedschool = $("#selschool").val();
                    $("#classid").html('<option>Waiting</option>');
                    $.ajax({
                        method:'post',
                        url:'../controller/scripts/owner/loadClassForStudentFilter.php',
                        data:'selectedinstitution='+ selectedinstitution+'&selectedschool='+selectedschool,
                        success: function(institutiondata){
                            $("#classid").html(institutiondata);
                        }
                    });

                    //================handle school change=================
                    $("#selschool").change(function(){
                        var selectedschool = $("#selschool").val();
                        $("#classid").html('<option>Waiting</option>');
                        $.ajax({
                            method:'post',
                            url:'../controller/scripts/owner/loadClassForStudentFilter.php',
                            data:'selectedinstitution='+ selectedinstitution+'&selectedschool='+selectedschool,
                            success: function(institutiondata){
                                $("#classid").html(institutiondata);
                            }
                        });

                    });

                    //==================================================

                }

            });

        });
        //=======================================================


        //========================run filter==================================
        $('body').on("click","#loadfilterbutton",function(){
            $(this).html('<i class="fa fa-circle-o-notch fa-spin"></i>..loading');
            var classvar = $("#classid").val();
            var selectschool =$("#selschool").val();
            var sessionidvar = $('#sessionval').val();
            var termidvar = $('#termval').val();
            var institutionidvar = $("#selinstitution").val();

            if(institutionidvar == ''){
                $('#uploadErrMsg').html("Opps! No Institution selected! <br> British Results sheet could not be loaded for students - try again!");
                $('#alert2').modal('show');
            } else if(sessionidvar == ''){
                $('#uploadErrMsg').html("Opps! No Session selected! <br> British Results sheet could not be loaded for students - try again!");
                $('#alert2').modal('show');
            } else if(termidvar == ''){
                $('#uploadErrMsg').html("Opps! No Term selected! <br> British Results sheet could not be loaded for students - try again!");
                $('#alert2').modal('show');
            } else if(classvar == ''){
                $('#uploadErrMsg').html("Opps! No Class selected! <br> British Results sheet could not be loaded for students - try again!");
                $('#alert2').modal('show');
            } else {   
                $.ajax({

                    method:'post',
                    url:'../controller/scripts/owner/loadOwnerStudentFilter.php',
                    data:'classvar='+ classvar+'&selectschool='+selectschool+'&sessionidvar='+sessionidvar+'&termidvar='+termidvar+'&institutionidvar='+institutionidvar,
                    success: function(outputdata){
                        $("#loadfilterbutton").html('load');
                        var mainoutput =   $('#loadStudentData').html(outputdata);
                                                 
                        $(document).ready(function(){
                            $("#upload_students").click(function () {

                                var InstitutionID = $(".InstitutionID").val();
                                var Session = $(".sessionName").val();
                                var TermOrSemesterID = $(".TermOrSemesterID").val();
                                var ClassOrDepartmentID = $(".ClassOrDepartmentID").val();
                                var StudentID = [];
                                var CoreAreaID = [];
                                var EssentialAspectsID = [];
                                var AssessmentKeyID = [];
                                var remark = [];
                                var comment = [];
                                var teachers_comment_CoreAreaID = [];
                                var teachers_comment_StudentID = [];
                                var teachers_comment = [];
                                var overall_comment_StudentID = [];

                                            
                                var i = 1;

                                $(".overall_comment_StudentID").each(function(){
                                    overall_comment_StudentID.push($(this).val());
                                    i++;
                                });

                                $(".StudentID").each(function(){
                                    StudentID.push($(this).val());
                                    i++;
                                });

                                $(".CoreAreaID").each(function(){
                                    CoreAreaID.push($(this).val());
                                    i++;
                                });

                                $(".EssentialAspectsID").each(function(){
                                    EssentialAspectsID.push($(this).val());
                                    i++;
                                });

                                $(".remark").each(function(){
                                    remark.push($(this).val().replace(/,/g, ""));
                                    i++;
                                });

                                
                                $(".teachers_comment_CoreAreaID").each(function(){
                                    teachers_comment_CoreAreaID.push($(this).val());
                                    i++;
                                });

                                
                                $(".teachers_comment_StudentID").each(function(){
                                    teachers_comment_StudentID.push($(this).val());
                                    i++;
                                });

                                $(".teachers_comment").each(function(){
                                    teachers_comment.push($(this).val().replace(/,/g, ""));
                                    i++;
                                });
                                
                                $(".comment").each(function(){
                                    comment.push($(this).val().replace(/,/g, ""));
                                    i++;
                                });

                                $(".AssessmentKeyID:checked").each(function(){
                                    var AK = $(this).val();
                                    AssessmentKeyID.push(AK);
                                    i++;
                                });
                                

                                /*if(AssessmentKeyID == ''){
                                    $('#uploadErrMsg').html("Opps! Assessment keys <br> were not selected! <br> British Results could not be uploaded for students - try again!");
                                    $('#alert2').modal('show');
                                } else {*/

                                
                                    $.ajax({
                                        type : 'post',
                                        url : '../controller/scripts/owner/addStudentBritishResults.php',
                                        data : 'InstitutionID='+InstitutionID+'&Session='+Session+'&TermOrSemesterID='+TermOrSemesterID+'&ClassOrDepartmentID='+ClassOrDepartmentID+'&StudentID='+StudentID+'&CoreAreaID='+CoreAreaID +'&EssentialAspectsID='+EssentialAspectsID+'&AssessmentKeyID='+AssessmentKeyID+'&remark='+remark+'&comment='+comment+'&teachers_comment_CoreAreaID='+teachers_comment_CoreAreaID+'&teachers_comment_StudentID='+teachers_comment_StudentID+'&teachers_comment='+teachers_comment+'&overall_comment_StudentID='+overall_comment_StudentID,
                                        success: function(result) {
                                            $("#britishResultUploadOutput").html(result);
                                        }
                                    });
                                    

                                //}
                            });
                        });

                        
                        $(document).ready(function(){
                            $("#update_students").click(function () {
                                
                                var InstitutionID = $(".InstitutionID").val();
                                var Session = $(".sessionName").val();
                                var TermOrSemesterID = $(".TermOrSemesterID").val();
                                var ClassOrDepartmentID = $(".ClassOrDepartmentID").val();
                                var StudentID = [];
                                var CoreAreaID = [];
                                var EssentialAspectsID = [];
                                var AssessmentKeyID = [];
                                var remark = [];
                                var comment = [];
                                var teachers_comment_CoreAreaID = [];
                                var teachers_comment_StudentID = [];
                                var teachers_comment = [];
                                var overall_comment_StudentID = [];

                                            
                                var i = 1;

                                $(".overall_comment_StudentID").each(function(){
                                    overall_comment_StudentID.push($(this).val());
                                    i++;
                                });

                                $(".StudentID").each(function(){
                                    StudentID.push($(this).val());
                                    i++;
                                });

                                $(".CoreAreaID").each(function(){
                                    CoreAreaID.push($(this).val());
                                    i++;
                                });

                                $(".EssentialAspectsID").each(function(){
                                    EssentialAspectsID.push($(this).val());
                                    i++;
                                });

                                $(".remark").each(function(){
                                    remark.push($(this).val().replace(/,/g, ""));
                                    i++;
                                });

                                
                                $(".teachers_comment_CoreAreaID").each(function(){
                                    teachers_comment_CoreAreaID.push($(this).val());
                                    i++;
                                });

                                
                                $(".teachers_comment_StudentID").each(function(){
                                    teachers_comment_StudentID.push($(this).val());
                                    i++;
                                });

                                $(".teachers_comment").each(function(){
                                    teachers_comment.push($(this).val().replace(/,/g, ""));
                                    i++;
                                });
                                
                                $(".comment").each(function(){
                                    comment.push($(this).val().replace(/,/g, ""));
                                    i++;
                                });

                                $(".AssessmentKeyID:checked").each(function(){
                                    //Question.push($(this).val());
                                    var AK = $(this).val();
                                    AssessmentKeyID.push(AK);
                                    i++;
                                });
                                

                                /*if(AssessmentKeyID == ''){
                                    $('#uploadErrMsg').html("Opps! Assessment keys <br> were not selected! <br> British Results could not be uploaded for students - try again!");
                                    $('#alert2').modal('show');
                                } else {*/

                                
                                    $.ajax({
                                        type : 'post',
                                        url : '../controller/scripts/owner/editStudentBritishResults.php',
                                        data : 'InstitutionID='+InstitutionID+'&Session='+Session+'&TermOrSemesterID='+TermOrSemesterID+'&ClassOrDepartmentID='+ClassOrDepartmentID+'&StudentID='+StudentID+'&CoreAreaID='+CoreAreaID +'&EssentialAspectsID='+EssentialAspectsID+'&AssessmentKeyID='+AssessmentKeyID+'&remark='+remark+'&comment='+comment+'&teachers_comment_CoreAreaID='+teachers_comment_CoreAreaID+'&teachers_comment_StudentID='+teachers_comment_StudentID+'&teachers_comment='+teachers_comment+'&overall_comment_StudentID='+overall_comment_StudentID,
                                        success: function(result) {
                                            $("#britishResultUploadOutput").html(result);
                                        }
                                    });
                                    
                                //}
                            });
                        });
                    }

                });
            }
            
            

        });
        //====================================================================

    </script>

    <script>
        // reload datatables
        $(document).ready(function() {
            $("#v-pills-home-tab").click(function () {
                $.fn.reloadTable();	
                $.fn.reloadEssentialAspectsTable();
                $.fn.reloadAssessmentKeysTable();
            });
            $("#v-pills-messages-tab").click(function () {
                $.fn.reloadTable();	
                $.fn.reloadEssentialAspectsTable();
                $.fn.reloadAssessmentKeysTable();
            });
            $("#v-pills-profile-tab").click(function () {
                $.fn.reloadTable();	
                $.fn.reloadEssentialAspectsTable();
                $.fn.reloadAssessmentKeysTable();
            });
            $("#v-pills-settings-tab").click(function () {
                $.fn.reloadTable();	
                $.fn.reloadEssentialAspectsTable();
                $.fn.reloadAssessmentKeysTable();
            });
        });
    </script>
</body>
</html>

