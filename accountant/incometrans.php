<?php  include ('../controller/session/session-checker-accountant.php'); ?>
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
    <title>Income Transaction | <?php echo $PrimaryName.' '.$SecondaryName; ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="../library/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="../library/plugins/morrisjs/morris.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/style-accountant.php" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    
    <link href="../js/jquery-ui.min.css"  rel="stylesheet">
  
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<style>
    .modal { overflow: auto !important; }
</style>
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
        <?php include ('../includes/header-accountant.php'); ?>
        </header>
        
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- Sidebar navigation-->
        <nav class="navbar navbar-expand-lg navbar-white bg-white">
                               
        <?php include ('../includes/menu-accountant.php'); ?>
            
         </nav>
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
                    <h2 class="text-themecolor" style="color: black; font-weight: 500;">Income Transaction</h2>
                </div>
                <div class="col-md-2 align-self-center" style="margin-bottom: -20px;">
                   
                </div>
                <div class="">
                    <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
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
                <div class="row" style="padding-top:10px;">
                    <div class="col-sm-10"></div>
                    <div class="col-sm-2">
                        <a href="posttrans.php"><button type="button" class="btn-sm btn-block btn-success" style="border:none; background-color:<?php echo $PrimaryColor;?>; color:white;"><i class="fa fa-plus"></i> Post Fee</button></a>
                    </div>
                </div>
                <div class="row" style="margin-top:10px;">
                    <div class="col-12">
                        <div class="card table-responsive">
                            
                            <div class="card-body">
                                
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Complete Fee</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="transport-tab" data-toggle="tab" href="#transport" role="tab" aria-controls="transport" aria-selected="false">Fee Deposit</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Income From Other Sources</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        
                                        <div class="row" style="padding-top:10px;">
                                            
                                            <div class="col-md-1 align-self-center" id="hideclass">
                                                
                                            </div>
                                            <div class="col-md-2 align-self-center">
                                                <select class=" form-control" id="session">
                                                    <option value="0" selected>Select Session</option>
                                                    <?php  
                                                        $sqlGetsession = ("SELECT * FROM `session`");
                                                        $resultGetsession = mysqli_query($link, $sqlGetsession);
                                                        $rowGetsession = mysqli_fetch_assoc($resultGetsession);
                                                        $row_cntGetsession = mysqli_num_rows($resultGetsession);
                                                        
                                                        do{
                                                            echo '<option value="' . $rowGetsession['sessionName']. '"> ' . $rowGetsession['sessionName'] . '</option>';
                                                    
                                                        }while($rowGetsession = mysqli_fetch_assoc($resultGetsession));
                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2 align-self-center">
                                                <select class=" form-control" id="term">
                                                    <option value="0" selected>Select Term</option>
                                                        <?php  
                                                            $sqlGettermorsemester = ("SELECT * FROM `termorsemester`");
                                                            $resultGettermorsemester = mysqli_query($link, $sqlGettermorsemester);
                                                            $rowGettermorsemester = mysqli_fetch_assoc($resultGettermorsemester);
                                                            $row_cntGettermorsemester = mysqli_num_rows($resultGettermorsemester);
                                                            
                                                            do{
                                                                echo '<option value="' . $rowGettermorsemester['TermOrSemesterName']. '"> ' . $rowGettermorsemester['TermOrSemesterName'] . '</option>';
                                                        
                                                            }while($rowGettermorsemester = mysqli_fetch_assoc($resultGettermorsemester));
                                                        ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2 align-self-center" id="hideclass">
                                                <select class=" form-control" id="class">
                                                    <option value="0">Select Class</option>
                                                    <?php
                                                        $sqlGetclassordepartment = ("SELECT * FROM `classordepartment` WHERE `InstitutionID`='$InstitutionID'");
                                                        $resultGetclassordepartment = mysqli_query($link, $sqlGetclassordepartment);
                                                        $rowGetclassordepartment = mysqli_fetch_assoc($resultGetclassordepartment);
                                                        $row_cntGetclassordepartment = mysqli_num_rows($resultGetclassordepartment);
                                                        
                                                        do{
                                                            echo '<option value="' . $rowGetclassordepartment['ClassOrDepartmentID']. '"> ' . $rowGetclassordepartment['ClassOrDepartmentName'] . '</option>';
                                                    
                                                        }while($rowGetclassordepartment = mysqli_fetch_assoc($resultGetclassordepartment));
                                                    ?>
                                                </select>
                                            </div>
                                            
                                            <div class="col-md-2 align-self-center">
                                                <input id="sdate" type="text" class="form-control" placeholder="Start Date">
                                            </div>
                                            <div class="col-md-2 align-self-center">
                                                <input id="edate" type="text" class="form-control" placeholder="End Date">
                                            </div>
                                            <div class="col-md-1 align-self-center">
                                                <a href="#" id="loadfeetable" type="button" class="btn chimaNormalBtn" style="width: 80px;">
                                                    <span style="font-size: 13px;">Load</span>
                                                </a>  
                                            </div>
                                            <div class="">
                                                <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                                            </div>
                                        </div>
                                        
                                        <div class="row" style="margin-top:20px;">
                                            <div class="col-12">
                                                       
                                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link active" id="normal-tab" data-toggle="tab" href="#normal" role="tab" aria-controls="normal" aria-selected="true">Normal</a>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link" id="discount-tab" data-toggle="tab" href="#discount" role="tab" aria-controls="discount" aria-selected="false">Discount</a>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link" id="scholarship-tab" data-toggle="tab" href="#scholarship" role="tab" aria-controls="scholarship" aria-selected="false">Scholarship</a>
                                                    </li>
                                                    <li class="nav-item" role="presentation">
                                                        <a class="nav-link" id="credit-tab" data-toggle="tab" href="#credit" role="tab" aria-controls="credit" aria-selected="false">Credit</a>
                                                    </li>
                                                </ul>
                                                <div class="tab-content" id="myTabContent">
                                                    <div class="tab-pane fade show active" id="normal" role="tabpanel" aria-labelledby="normal-tab">
                                                                                
                                                        <div class="row" style="margin-top:10px;">
                                                            <div class="col-12">
                                                                <div class="card table-responsive">
                                                                    
                                                                    <div class="card-body">
                                                                        <div class="card-body" id="body">
                                                                            
                                                                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                                                                <center>
                                                                                    <i class='fa fa-spinner fa-spin'></i>
                                                                                </center>
                                                                            </div>
                                                                                        
                                                                        </div>
                                                                    </div>
                                                                </div>  
                                                            </div>
                                                        </div>
                                                    </div>
                                                
                                                    <div class="tab-pane fade" id="discount" role="tabpanel" aria-labelledby="discount-tab">
                                                                                
                                                        <div class="row" style="margin-top:10px;">
                                                            <div class="col-12">
                                                                <div class="card table-responsive">
                                                                    
                                                                    <div class="card-body">
                                                                        <div class="card-body" id="discountbody">
                                                                            
                                                                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                                                                <center>
                                                                                    <i class='fa fa-spinner fa-spin'></i>
                                                                                </center>
                                                                            </div>
                                                                                        
                                                                        </div>
                                                                    </div>
                                                                </div>  
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="tab-pane fade" id="scholarship" role="tabpanel" aria-labelledby="scholarship-tab">
                                                                                
                                                        <div class="row" style="margin-top:10px;">
                                                            <div class="col-12">
                                                                <div class="card table-responsive">
                                                                    
                                                                    <div class="card-body">
                                                                        <div class="card-body" id="scholarshipbody">
                                                                            
                                                                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                                                                <center>
                                                                                    <i class='fa fa-spinner fa-spin'></i>
                                                                                </center>
                                                                            </div>
                                                                                        
                                                                        </div>
                                                                    </div>
                                                                </div>  
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="tab-pane fade" id="credit" role="tabpanel" aria-labelledby="credit-tab">
                                                                                
                                                        <div class="row" style="margin-top:10px;">
                                                            <div class="col-12">
                                                                <div class="card table-responsive">
                                                                    
                                                                    <div class="card-body">
                                                                        <div class="card-body" id="creditbody">
                                                                            
                                                                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                                                                <center>
                                                                                    <i class='fa fa-spinner fa-spin'></i>
                                                                                </center>
                                                                            </div>
                                                                                        
                                                                        </div>
                                                                    </div>
                                                                </div>  
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>   
                                                                    
                                                    <!--Modal to delete feetrans-->
                                                    <div class="modal fade" id="deleteincomefeetransmodal" tabindex="-1" role="dialog" aria-labelledby="deleteincomefeetransmodalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-trash"></i> Delete Income Transaction(fees)</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div id="deleteincomefeetransresponse"></div>
                                                                <input type="hidden" id="editcatid">
                                                                    <div class="col-12" style="margin-top: 20px;" id="deleteincomefeetransbody">
                                                                    
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer" id="deleteincomefeetransfooter">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary" id="deleteincomefeetransmainbtn"><i class="fa fa-trash"></i> Delete</button>
                                                            
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <!--Modal to delete feetrans-->
                
                                                    <!--Modal to view feetrans-->
                                                    <div class="modal fade" id="viewincomefeetransmodal" tabindex="-1" role="dialog" aria-labelledby="viewincomefeetransmodalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-list"></i> Transaction(fees) Breakdown</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body table-responsive">
                                                                <div id="viewincomefeetransresponse"></div>
                                                                <input type="hidden" id="editcatid">
                                                                    <div class="col-12 table-responsive" style="margin-top: 20px;" id="viewincomefeetransbody">
                                                                    
                                                                    </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                
                                                    <!--Modal to delete feetrans-->
                                                    <div class="modal fade modal_1" id="deletesingleincomefeetransmodal" tabindex="-1" role="dialog" aria-labelledby="deletesingleincomefeetransmodalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-trash"></i> Delete Income Transaction(fees)</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div id="deletesingleincomefeetransresponse"></div>
                                                                <input type="hidden" id="editcatid">
                                                                    <div class="col-12" style="margin-top: 20px;" id="deletesingleincomefeetransbody">
                                                                            <span style=" color:red;">Are you sure you want to delete  this transaction?<br>
                                                                            Note that this process can not be undone</span>
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer" id="deletesingleincomefeetransfooter">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="button" class="btn btn-primary" id="deletesingleincomefeetransmainbtn"><i class="fa fa-trash"></i> Delete</button>
                                                            
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <!--Modal to delete feetrans-->
                                                    
                                                    <!--Modal for terminal print -->
                                                    <div class="modal fade" id="terminalprintmodal" tabindex="-1" role="dialog" aria-labelledby="terminalprintmodalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel"><i style="color:green;" class="fa fa-print"></i> Terminal Print</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                
                                                                <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <div class="card card-outline-info">
                                                                                    <div class="card-header">
                                                                                        <h4 class="m-b-0 text-white"><i style="color:white;" class="fa fa-print"></i> Terminal Print</h4>
                                                                                    </div>
                                                                                    
                                                                                    <div class="card-body">
                                                                                        <div class="row">
                                                                                                <div class="col-sm-10"></div>
                                                                                                    <div class="col-sm-2">
                                                                                                            <button type="button" id="finaltermprintbtn"  class="btn-sm btn-block btn-success text-right"><center><i class="fa fa-print"></i> Print</center></button>
                                                                                                    </div>
                                                                                            </div>
                
                                                                                            <div id="printterminalcontentbody" style="width: 250px; max-width: 250px; padding:50px;"></div>
                
                                                                                    </div>
                
                                                                                </div>
                                                                            </div>
                                                                </div>
                                                            </div>
                                                            
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Modal for terminal print -->
                                                    
                                                    <!--Modal to view feetrans-->
                
                                                    <!--Modal To print reciept structure-->
                                                    <div class="modal fade" id="printfeerecieptModal" tabindex="-1" role="dialog" aria-labelledby="#printfeerecieptModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" >
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel"><i style="color:blue;" class="fa fa-print"></i> Print Receipt</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-10"></div>
                                                                            <div class="col-2">
                                                                                <button type="button" id="recieptfinalprintbtn"  class="btn-sm btn-block btn-success text-right"><center><i class="fa fa-print"></i> Print</center></button>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-12">
                                                                                <div class="card" style="margin-top:10px;">
                                                                                    <div class="card-body table-responsive"> 
                                                                                        <div id="printbody">
                                                                                    
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>  
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!--Modal to delete feetrans-->
                                    <div class="modal fade" id="deleteincomefeetransmodal" tabindex="-1" role="dialog" aria-labelledby="deleteincomefeetransmodalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-trash"></i> Delete Income Transaction(fees)</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <div id="deleteincomefeetransresponse"></div>
                                                <input type="hidden" id="editcatid">
                                                    <div class="col-12" style="margin-top: 20px;" id="deleteincomefeetransbody">
                                                    
                                                    </div>
                                            </div>
                                            <div class="modal-footer" id="deleteincomefeetransfooter">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" id="deleteincomefeetransmainbtn"><i class="fa fa-trash"></i> Delete</button>
                                            
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <!--Modal to delete feetrans-->

                                    <!--Modal to view feetrans-->
                                    <div class="modal fade" id="viewincomefeetransmodal" tabindex="-1" role="dialog" aria-labelledby="viewincomefeetransmodalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-list"></i> Transaction(fees) Breakdown</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body table-responsive">
                                                <div id="viewincomefeetransresponse"></div>
                                                <input type="hidden" id="editcatid">
                                                    <div class="col-12 table-responsive" style="margin-top: 20px;" id="viewincomefeetransbody">
                                                    
                                                    </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>

                                    <!--Modal to delete feetrans-->
                                    <div class="modal fade" id="deletesingleincomefeetransmodal" tabindex="-1" role="dialog" aria-labelledby="deletesingleincomefeetransmodalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-trash"></i> Delete Income Transaction(fees)</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <div id="deletesingleincomefeetransresponse"></div>
                                                <input type="hidden" id="editcatid">
                                                    <div class="col-12" style="margin-top: 20px;" id="deletesingleincomefeetransbody">
                                                            <span style=" color:red;">Are you sure you want to delete  this transaction?<br>
                                                            Note that this process can not be undone</span>
                                                    </div>
                                            </div>
                                            <div class="modal-footer" id="deletesingleincomefeetransfooter">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" id="deletesingleincomefeetransmainbtn"><i class="fa fa-trash"></i> Delete</button>
                                            
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <!--Modal to delete feetrans-->
                                    
                                    <!--Modal for terminal print -->
                                    <div class="modal fade" id="terminalprintmodal" tabindex="-1" role="dialog" aria-labelledby="terminalprintmodalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"><i style="color:green;" class="fa fa-print"></i> Terminal Print</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                
                                                <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="card card-outline-info">
                                                                    <div class="card-header">
                                                                        <h4 class="m-b-0 text-white"><i style="color:white;" class="fa fa-print"></i> Terminal Print</h4>
                                                                    </div>
                                                                    
                                                                    <div class="card-body">
                                                                        <div class="row">
                                                                                <div class="col-sm-10"></div>
                                                                                    <div class="col-sm-2">
                                                                                            <button type="button" id="finaltermprintbtn"  class="btn-sm btn-block btn-success text-right"><center><i class="fa fa-print"></i> Print</center></button>
                                                                                    </div>
                                                                            </div>

                                                                            <div id="printterminalcontentbody" style="width: 250px; max-width: 250px; padding:50px;"></div>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                </div>
                                            </div>
                                            
                                            </div>
                                        </div>
                                    </div>
                                    <!--Modal for terminal print -->
                                    
                                    <!--Modal to view feetrans-->

                                    <!--Modal To print reciept structure-->
                                    <div class="modal fade" id="printfeerecieptModal" tabindex="-1" role="dialog" aria-labelledby="#printfeerecieptModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" >
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><i style="color:blue;" class="fa fa-print"></i> Print Receipt</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-10"></div>
                                                        <div class="col-2">
                                                            <button type="button" id="recieptfinalprintbtn"  class="btn-sm btn-block btn-success text-right"><center><i class="fa fa-print"></i> Print</center></button>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="card" style="margin-top:10px;">
                                                                <div class="card-body table-responsive"> 
                                                                    <div id="printbody">
                                                                
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>  
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="transport" role="tabpanel" aria-labelledby="transport-tab">
                                        
                                        <div class="row" style="padding-top:10px;">
                                            
                                            <div class="col-md-1 align-self-center" id="hideclass">
                                                
                                            </div>
                                            <div class="col-md-2 align-self-center">
                                                <select class=" form-control" id="transportsession">
                                                    <option value="0" selected>Select Session</option>
                                                        <?php  
                                                            $sqlGetsession = ("SELECT * FROM `session`");
                                                            $resultGetsession = mysqli_query($link, $sqlGetsession);
                                                            $rowGetsession = mysqli_fetch_assoc($resultGetsession);
                                                            $row_cntGetsession = mysqli_num_rows($resultGetsession);
                                                            
                                                            do{
                                                                echo '<option value="' . $rowGetsession['sessionName']. '"> ' . $rowGetsession['sessionName'] . '</option>';
                                                        
                                                            }while($rowGetsession = mysqli_fetch_assoc($resultGetsession));
                                                        ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2 align-self-center">
                                                <select class=" form-control" id="transportterm">
                                                    <option value="0" selected>Select Term</option>
                                                        <?php  
                                                            $sqlGettermorsemester = ("SELECT * FROM `termorsemester`");
                                                            $resultGettermorsemester = mysqli_query($link, $sqlGettermorsemester);
                                                            $rowGettermorsemester = mysqli_fetch_assoc($resultGettermorsemester);
                                                            $row_cntGettermorsemester = mysqli_num_rows($resultGettermorsemester);
                                                            
                                                            do{
                                                                echo '<option value="' . $rowGettermorsemester['TermOrSemesterName']. '"> ' . $rowGettermorsemester['TermOrSemesterName'] . '</option>';
                                                        
                                                            }while($rowGettermorsemester = mysqli_fetch_assoc($resultGettermorsemester));
                                                        ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2 align-self-center" id="hideclass">
                                                <select class=" form-control" id="transportclass">
                                                    <option value="0">Select Class</option>
                                                    <?php  
                                                            $sqlGetclassordepartment = ("SELECT * FROM `classordepartment` WHERE `InstitutionID`='$InstitutionID'");
                                                            $resultGetclassordepartment = mysqli_query($link, $sqlGetclassordepartment);
                                                            $rowGetclassordepartment = mysqli_fetch_assoc($resultGetclassordepartment);
                                                            $row_cntGetclassordepartment = mysqli_num_rows($resultGetclassordepartment);
                                                            
                                                            do{
                                                                echo '<option value="' . $rowGetclassordepartment['ClassOrDepartmentID']. '"> ' . $rowGetclassordepartment['ClassOrDepartmentName'] . '</option>';
                                                        
                                                            }while($rowGetclassordepartment = mysqli_fetch_assoc($resultGetclassordepartment));
                                                        ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2 align-self-center">
                                                <input id="transportsdate" type="text" class="form-control" placeholder="Start Date">
                                            </div>
                                            <div class="col-md-2 align-self-center">
                                                <input id="transportedate" type="text" class="form-control" placeholder="End Date">
                                            </div>
                                            <div class="col-md-1 align-self-center">
                                                <a href="#" id="loadtransporttable" type="button" class="btn chimaNormalBtn" style="width: 80px;">
                                                    <span style="font-size: 13px;">Load</span>
                                                </a>    
                                            </div>
                                            <div class="">
                                                <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                                            </div>
                                        </div>
                                        
                                        <div class="row" style="margin-top:10px;">
                                            <div class="col-12">
                                                <div class="card table-responsive">
                                                    
                                                    <div class="card-body">
                                                        <div class="card-body" id="transportbody">
                                                            
                                                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                                                <center>
                                                                    Please Filter Before Clicking Load
                                                                </center>
                                                            </div>
                                                                        
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div>
                                            </div>
                                    </div>
                                    <!--Modal to delete feetrans-->
                                    <div class="modal fade" id="deletefeedeposittransmodal" tabindex="-1" role="dialog" aria-labelledby="deletefeedeposittransmodalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-trash"></i> Delete Income Transaction(Deposit)</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <div id="deletefeedeposittransresponse"></div>
                                                <input type="hidden" id="editcatid">
                                                    <div class="col-12" style="margin-top: 20px;" id="deletefeedeposittransbody">
                                                    
                                                    </div>
                                            </div>
                                            <div class="modal-footer" id="deletefeedeposittransfooter">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" id="deletefeedeposittransmainbtn"><i class="fa fa-trash"></i> Delete</button>
                                            
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <!--Modal to delete feetrans-->
                                    
                                    <!--Modal To print reciept structure-->
                                    <div class="modal fade" id="printfeedpositmodal" tabindex="-1" role="dialog" aria-labelledby="#printfeedepositmodalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" >
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel"><i style="color:blue;" class="fa fa-print"></i> Print Receipt</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-10"></div>
                                                        <div class="col-2">
                                                            <button type="button" id="recieptfinalprintfeedepositbtn"  class="btn-sm btn-block btn-success text-right"><center><i class="fa fa-print"></i> Print</center></button>
                                                        </div>
                                                    </div>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="card" style="margin-top:10px;">
                                                                        <div class="card-body table-responsive"> 
                                                                            <div id="printfeedepositbody">
                                                                        
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        
                                        <div class="row" style="padding-top:10px;">
                                            
                                            <div class="col-md-3 align-self-center" id="hideclass">
                                                
                                            </div>
                                            <div class="col-md-2 align-self-center">
                                                <select class=" form-control" id="othercategory">
                                                    <option value="0" selected>Select Category</option>
                                                        <?php  
                                                            $sqlGetcategory = ("SELECT * FROM `category` WHERE `InstitutionID`='$InstitutionID' AND `categoryType`='others' AND `configType`='income'");
                                                            $resultGetcategory = mysqli_query($link, $sqlGetcategory);
                                                            $rowGetcategory = mysqli_fetch_assoc($resultGetcategory);
                                                            $row_cntGetcategory = mysqli_num_rows($resultGetcategory);
                                                            
                                                            if($row_cntGetcategory > 0)
                                                            {
                                                                do{
                                                                    echo '<option value="' . $rowGetcategory['categoryID']. '"> ' . $rowGetcategory['categoryTitle'] . '</option>';
                                                            
                                                                }while($rowGetcategory = mysqli_fetch_assoc($resultGetcategory));
                                                            }
                                                            else
                                                            {
                                                                
                                                            }
                                                            
                                                            
                                                        ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2 align-self-center">
                                                <select class=" form-control" id="othersubcategory">
                                                    <option value="0">Select SubCateogry</option>
                                                        <?php  
                                                            $sqlGetcategory = ("SELECT * FROM `category` WHERE `InstitutionID`='$InstitutionID' AND `categoryType`='others' AND `configType`='income'");
                                                            $resultGetcategory = mysqli_query($link, $sqlGetcategory);
                                                            $rowGetcategory = mysqli_fetch_assoc($resultGetcategory);
                                                            $row_cntGetcategory = mysqli_num_rows($resultGetcategory);
                                                            
                                                            if($row_cntGetcategory > 0)
                                                            {
                                                                do{
                                                                    $catid = $rowGetcategory['categoryID'];
                                                                    
                                                                    $sqlGetsubcategory = ("SELECT * FROM subcategory WHERE categoryID='$catid' AND InstitutionID='$InstitutionID'");
                                                                    $resultGetsubcategory = mysqli_query($link, $sqlGetsubcategory);
                                                                    $rowGetsubcategory = mysqli_fetch_assoc($resultGetsubcategory);
                                                                    $row_cntGetsubcategory = mysqli_num_rows($resultGetsubcategory);
                                                                    
                                                                    if($row_cntGetsubcategory > 0)
                                                                    {
                                                                        do{
                                                                            echo '<option value="' . $rowGetsubcategory['subCategoryID']. '"> ' . $rowGetsubcategory['subCategoryTitle'] . '</option>';
                                                                    
                                                                        }while($rowGetsubcategory = mysqli_fetch_assoc($resultGetsubcategory));
                                                                    }
                                                                    else
                                                                    {
                                                                        
                                                                    }
                                                                    
                                                                }while($rowGetcategory = mysqli_fetch_assoc($resultGetcategory));
                                                                
                                                            }
                                                            else
                                                            {
                                                                
                                                            }
                                                            
                                                        ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2 align-self-center">
                                                <select class=" form-control" id="othersession">
                                                    <option value="0" selected>Select Session</option>
                                                        <?php  
                                                            $sqlGetsession = ("SELECT * FROM `session`");
                                                            $resultGetsession = mysqli_query($link, $sqlGetsession);
                                                            $rowGetsession = mysqli_fetch_assoc($resultGetsession);
                                                            $row_cntGetsession = mysqli_num_rows($resultGetsession);
                                                            
                                                            do{
                                                                echo '<option value="' . $rowGetsession['sessionName']. '"> ' . $rowGetsession['sessionName'] . '</option>';
                                                        
                                                            }while($rowGetsession = mysqli_fetch_assoc($resultGetsession));
                                                        ?>
                                                </select>
                                            </div>
                                            <div class="col-md-2 align-self-center">
                                                <select class=" form-control" id="otherterm">
                                                    <option value="0" selected>Select Term</option>
                                                        <?php  
                                                            $sqlGettermorsemester = ("SELECT * FROM `termorsemester`");
                                                            $resultGettermorsemester = mysqli_query($link, $sqlGettermorsemester);
                                                            $rowGettermorsemester = mysqli_fetch_assoc($resultGettermorsemester);
                                                            $row_cntGettermorsemester = mysqli_num_rows($resultGettermorsemester);
                                                            
                                                            do{
                                                                echo '<option value="' . $rowGettermorsemester['TermOrSemesterName']. '"> ' . $rowGettermorsemester['TermOrSemesterName'] . '</option>';
                                                        
                                                            }while($rowGettermorsemester = mysqli_fetch_assoc($resultGettermorsemester));
                                                        ?>
                                                </select>
                                            </div>
                                            
                                            <div class="col-md-1 align-self-center" id="hideclass">
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="row" style="padding-top:10px;">
                                            
                                            <div class="col-md-7 align-self-center">
                                                
                                            </div>
                                            <div class="col-md-2 align-self-center">
                                                <input id="othersdate" type="text" class="form-control" placeholder="Start Date">
                                            </div>
                                            <div class="col-md-2 align-self-center">
                                                <input id="otheredate" type="text" class="form-control" placeholder="End Date">
                                            </div>
                                            <div class="col-md-1 align-self-center">
                                                <a href="#" id="loadothertable" type="button" class="btn chimaNormalBtn" style="width: 80px;">
                                                    <span style="font-size: 13px;">Load</span>
                                                </a>    
                                            </div>
                                            <div class="">
                                                <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-top:10px;">
                                            <div class="col-12">
                                                <div class="card table-responsive">
                                                    
                                                    <div class="card-body" id="otherbody">
                                                        
                                                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                                                            <center>
                                                                Please Filter Before Clicking Load
                                                            </center>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <!--Modal to delete feetrans-->
                                    <div class="modal fade" id="deleteincomeothertransmodal" tabindex="-1" role="dialog" aria-labelledby="deleteincomeothertransmodalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-trash"></i> Delete Transaction(Other Source of Income)</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <div id="deletesingleincomeothertransresponse"></div>
                                                <input type="hidden" id="editcatid">
                                                    <div class="col-12" style="margin-top: 20px;" id="deletesingleincomeothertransbody">
                                                            <span style=" color:red;">Are you sure you want to delete  this transaction?<br>
                                                            Note that this process can not be undone</span>
                                                    </div>
                                            </div>
                                            <div class="modal-footer" id="deletesingleincomeothertransfooter">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" id="deletesingleincomeothertransmainbtn"><i class="fa fa-trash"></i> Delete</button>
                                            
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <!--Modal to delete feetrans-->
                                    
                                    <!--Modal to edit feeothers-->
                                    <div class="modal fade" id="deleteincomeothertransmodal" tabindex="-1" role="dialog" aria-labelledby="deleteincomeothertransmodalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-trash"></i> Delete Income Transaction(others)</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <div id="deleteincomeothertransresponse"></div>
                                                <input type="hidden" id="editcatid">
                                                    <div class="col-12" style="margin-top: 20px;" id="deleteincomeothertransbody">
                                                    
                                                    </div>
                                            </div>
                                            <div class="modal-footer" id="deleteincomeothertransfooter">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" id="deleteincomeothertransmainbtn"><i class="fa fa-trash"></i> Delete</button>
                                            
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <!--Modal to edit feeothers-->
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
            
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

    <!-- Bootstrap tether Core JavaScript -->
    <!-- slimscrollbar scrollbar JavaScript -->
    <!--Wave Effects -->
    <!--Menu sidebar -->
    <!--stickey kit -->
    <!--Custom JavaScript -->
    <script src="../library/plugins/sparkline/jquery.charts-sparkline.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    



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
     
   
    <script src="../js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    
    <script src="../js/jasny-bootstrap.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../library/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <!--Custom JavaScript -->
     <script src="../js/custom.min.js"></script>
     <script src="../library/plugins/sparkline/jquery.sparkline.min.js"></script>
     <script src="../library/plugins/sparkline/jquery.charts-sparkline.js"></script>
     <!-- ============================================================== -->
     <!-- Style switcher -->
     <!-- ============================================================== -->
     <script src="../library/plugins/styleswitcher/jQuery.style.switcher.js"></script>
     <!-- All Jquery UI -->
    <script src="../js/jquery-ui.min.js"></script>
    
    <script language="javascript">
        $(document).ready(function () {
            $("#transportsdate").datepicker({
                changeMonth: true,
			    changeYear: true
            });
            $("#transportedate").datepicker({
                maxDate: 0,
                changeMonth: true,
			    changeYear: true,
            });
        });
    </script>

    <script language="javascript">
        $(document).ready(function () {
            $("#sdate").datepicker({
                changeMonth: true,
			    changeYear: true
            });
            $("#edate").datepicker({
                maxDate: 0,
                changeMonth: true,
			    changeYear: true,
            });
        });
    </script>

    <script language="javascript">
        $(document).ready(function () {
            $("#othersdate").datepicker({
                changeMonth: true,
			    changeYear: true
            });
            $("#otheredate").datepicker({
                maxDate: 0,
                changeMonth: true,
			    changeYear: true,
            });
        });
    </script>

    <script>

        $(document).ready(function(){

            $("#body").html('<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');
            $("#transportbody").html('<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');
            $("#otherbody").html('<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');
            
            var institution = "<?php echo $InstitutionID; ?>"
            $.ajax({
                type : 'post',
                url: "../controller/scripts/accountant/getfeetableall.php",
                data :  'institution=' + institution,
                success : function(result)
                {
                    $("#loadfeetable").html('Load');
                    $("#body").html(result);

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
                                        $(rows).eq(i).before();
                                        last = group;
                                    }
                                    
                                });
                            }
                        });
                        // Order by the grouping
                        $('#example tbody').on('click', function() {
                            var currentOrder = table.order()[0];
                            if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                                table.order([2, 'desc']).draw();
                            } else {
                                table.order([2, 'asc']).draw();
                            }
                        });
                    });
                    $('#example23').DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                            
                        ]
                    });
                    
                }
            });
            
            $.ajax({
                type : 'post',
                url: "../controller/scripts/accountant/getfeeDiscounttableall.php",
                data :  'institution=' + institution,
                success : function(result)
                {
                    $("#loadfeetable").html('Load');
                    $("#discountbody").html(result);

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
                                        $(rows).eq(i).before();
                                        last = group;
                                    }
                                    
                                });
                            }
                        });
                        // Order by the grouping
                        $('#example tbody').on('click', function() {
                            var currentOrder = table.order()[0];
                            if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                                table.order([2, 'desc']).draw();
                            } else {
                                table.order([2, 'asc']).draw();
                            }
                        });
                    });
                    $('#disexample23').DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                            
                        ]
                    });
                    
                }
            });
            
            $.ajax({
                type : 'post',
                url: "../controller/scripts/accountant/getfeescholarshiptableall.php",
                data :  'institution=' + institution,
                success : function(result)
                {
                    $("#loadfeetable").html('Load');
                    $("#scholarshipbody").html(result);

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
                                        $(rows).eq(i).before();
                                        last = group;
                                    }
                                    
                                });
                            }
                        });
                        // Order by the grouping
                        $('#example tbody').on('click', function() {
                            var currentOrder = table.order()[0];
                            if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                                table.order([2, 'desc']).draw();
                            } else {
                                table.order([2, 'asc']).draw();
                            }
                        });
                    });
                    $('#scholarshipexample23').DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                            
                        ]
                    });
                    
                }
            });
            
            $.ajax({
                type : 'post',
                url: "../controller/scripts/accountant/getfeecredittableall.php",
                data :  'institution=' + institution,
                success : function(result)
                {
                    $("#loadfeetable").html('Load');
                    $("#creditbody").html(result);

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
                                        $(rows).eq(i).before();
                                        last = group;
                                    }
                                    
                                });
                            }
                        });
                        // Order by the grouping
                        $('#example tbody').on('click', function() {
                            var currentOrder = table.order()[0];
                            if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                                table.order([2, 'desc']).draw();
                            } else {
                                table.order([2, 'asc']).draw();
                            }
                        });
                    });
                    $('#creditexample23').DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                            
                        ]
                    });
                    
                }
            });

            $.ajax({
                type : 'post',
                url: "../controller/scripts/accountant/gettransporttableall.php",
                data :  'institution=' + institution,
                success : function(result)
                {
                    $("#transportbody").html(result);

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
                                        $(rows).eq(i).before();
                                        last = group;
                                    }
                                    
                                });
                            }
                        });
                        // Order by the grouping
                        $('#example tbody').on('click', function() {
                            var currentOrder = table.order()[0];
                            if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                                table.order([2, 'desc']).draw();
                            } else {
                                table.order([2, 'asc']).draw();
                            }
                        });
                    });
                    $('#transportexample23').DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                            
                        ]
                    });
                    
                }
            });
            
            $.ajax({
                type : 'post',
                url: "../controller/scripts/accountant/getothertableall.php",
                data :  'institution=' + institution,
                success : function(result)
                {
                    $("#otherbody").html(result);
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
                                        $(rows).eq(i).before();
                                        last = group;
                                    }
                                    
                                });
                            }
                        });
                        // Order by the grouping
                        $('#example tbody').on('click', function() {
                            var currentOrder = table.order()[0];
                            if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                                table.order([2, 'desc']).draw();
                            } else {
                                table.order([2, 'asc']).draw();
                            }
                        });
                    });
                    $('#otherexample23').DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                            
                        ]
                    });
                    
                }
            });
        });

        $("body").on("click","#printrecieptbtn", function(){

            var PaymentRefNo = $(this).data('id');
            var tamount = $(this).data('amount');
            var institution = "<?php echo $InstitutionID; ?>";
            // alert(PaymentRefNo);
            $("#printbody").html("<center><i class='fa fa-spinner fa-spin'></i></center>"); 
            
            $.ajax({
                type : 'post',
                url : '../controller/scripts/accountant/printfeereciept.php', //Here you will fetch records 
                data : 'PaymentRefNo='+PaymentRefNo+'&tamount='+tamount+'&institution='+institution, //Pass $id
                success : function(data){
                    $('#printbody').html(data);//Show fetched data from database
                }
            });
            
        });

        $("body").on("click","#recieptfinalprintbtn", function(){
    
            var printContent = document.getElementById('printbody');
                
            var htmlToPrint = '' +
                '<style type="text/css">' +
                'table th td {' +
                'border:1px solid #000;' +
            
                '}' +
                'table  {' +
                '}' +
                '.tablerow {' +
                    'background-color:#999999;'+
                    '-webkit-print-color-adjust: exact;' +
                '}'+
    
                '.printf {' +
                    'display: inline-block;'+
                '}'+
                'table{ border-collapse: collapse; width:100%;}'+
                '</style>';
                htmlToPrint += printContent.outerHTML;
                newWin = window.open("");
                newWin.document.write(htmlToPrint);
                newWin.print(htmlToPrint);
                newWin.close();
        
            
        });

        $("body").on("click","#printfeedepositrecieptbtn", function(){

            var PaymentRefNo = $(this).data('id');
            var tamount = $(this).data('amount');
            var institution = "<?php echo $InstitutionID; ?>";
            // alert(PaymentRefNo);
            $("#printfeedepositbody").html("<center><i class='fa fa-spinner fa-spin'></i></center>"); 

            $.ajax({
                type : 'post',
                url : '../controller/scripts/accountant/printfeedepositreciept.php', //Here you will fetch records 
                data : 'PaymentRefNo='+PaymentRefNo+'&tamount='+tamount+'&institution='+institution, //Pass $id
                success : function(data){
                    $('#printfeedepositbody').html(data);//Show fetched data from database
                }
            });

        });

        $("body").on("click","#recieptfinalprintfeedepositbtn", function(){

            var printContent = document.getElementById('printfeedepositbody');
                
            var htmlToPrint = '' +
                '<style type="text/css">' +
                'table th td {' +
                'border:1px solid #000;' +

                '}' +
                'table  {' +
                '}' +
                '.tablerow {' +
                    'background-color:#999999;'+
                    '-webkit-print-color-adjust: exact;' +
                '}'+

                '.printf {' +
                    'display: inline-block;'+
                '}'+
                'table{ border-collapse: collapse; width:100%;}'+
                '</style>';
                htmlToPrint += printContent.outerHTML;
                newWin = window.open("");
                newWin.document.write(htmlToPrint);
                newWin.print();
                newWin.close();


        });

        $("body").on("click","#printtransportrecieptbtn", function(){

            var PaymentRefNo = $(this).data('id');
            var institution = "<?php echo $InstitutionID; ?>";
            // alert(PaymentRefNo);
            $("#printtransportbody").html("<center><i class='fa fa-spinner fa-spin'></i></center>"); 
            
            $.ajax({
                type : 'post',
                url : '../controller/scripts/accountant/printtransportfeereciept.php', //Here you will fetch records 
                data : 'PaymentRefNo='+PaymentRefNo+'&institution='+institution, //Pass $id
                success : function(data){
                    $('#printtransportbody').html(data);//Show fetched data from database
                }
            });
            
        });

        $("body").on("click","#recieptfinalprinttransportbtn", function(){
    
            var printContent = document.getElementById('printtransportbody');
                
            var htmlToPrint = '' +
                '<style type="text/css">' +
                'table th td {' +
                'border:1px solid #000;' +
            
                '}' +
                'table  {' +
                '}' +
                '.tablerow {' +
                    'background-color:#999999;'+
                    '-webkit-print-color-adjust: exact;' +
                '}'+
    
                '.printf {' +
                    'display: inline-block;'+
                '}'+
                'table{ border-collapse: collapse; width:100%;}'+
                '</style>';
                htmlToPrint += printContent.outerHTML;
                newWin = window.open("");
                newWin.document.write(htmlToPrint);
                newWin.print();
                newWin.close();
        
            
        });

        $("body").on("click","#viewincomefeetrans", function(){

            var PaymentRefNo = $(this).data('id');
            var institution = "<?php echo $InstitutionID; ?>";
            // alert(PaymentRefNo);
            $("#viewincomefeetransbody").html("<center><i class='fa fa-spinner fa-spin'></i></center>"); 

            $.ajax({
                type : 'post',
                url : '../controller/scripts/accountant/loadstudfeebreakdown.php', //Here you will fetch records 
                data : 'PaymentRefNo='+PaymentRefNo+'&institution='+institution, //Pass $id
                success : function(data){
                    $('#viewincomefeetransbody').html(data);//Show fetched data from database

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
                                        $(rows).eq(i).before();
                                        last = group;
                                    }
                                    
                                });
                            }
                        });
                        // Order by the grouping
                        $('#example tbody').on('click', function() {
                            var currentOrder = table.order()[0];
                            if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                                table.order([2, 'desc']).draw();
                            } else {
                                table.order([2, 'asc']).draw();
                            }
                        });
                    });
                    $('#viewincomeexample23').DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                            
                        ]
                    });
                }
            });

        });

        $("body").on("click","#deletesingleincomefeetransbtn", function(){

            $('#deletesingleincomefeetransbody').html('<span style=" color:red;">Are you sure you want to delete  this transaction?<br>Note that this process can not be undone</span>');

            var PaymentRefNo = $(this).data('id');
            var institution = "<?php echo $InstitutionID; ?>";
            var catid = $(this).data('catid');
            var subcatid = $(this).data('subcatid');
            var catname = $(this).data('catname');
            var subcatname = $(this).data('subcatname');
            var date = $(this).data('date');
            var amount = $(this).data('amount');
            var studid = $(this).data('studid');
            var studname = $(this).data('studname');
            var userid = "<?php echo $UserID; ?>";
            var usertype = "<?php echo $userType; ?>";

            var dataString = 'PaymentRefNo='+PaymentRefNo+'&studid='+studid+'&institution='+institution+'&studname='+studname+'&amount='+amount+'&date='+date+'&subcatname='+subcatname+'&catname='+catname+'&subcatid='+subcatid+'&catid='+catid+'&userid='+userid+'&usertype='+usertype;
            // alert(dataString);

            $("body").on("click","#deletesingleincomefeetransmainbtn", function(){

                $('#deletesingleincomefeetransbody').html("<center><i class='fa fa-spinner fa-spin'></i></center>");

                // alert(dataString);

                $.ajax({
                    type : 'post',
                    url : '../controller/scripts/accountant/delsinglestudfeebreakdown.php', //Here you will fetch records 
                    data : dataString, //Pass $id
                    success : function(data){
                        $('#deletesingleincomefeetransbody').html(data);//Show fetched data from database

                        $("#viewincomefeetransbody").html("<center><i class='fa fa-spinner fa-spin'></i></center>"); 

                        $.ajax({
                            type : 'post',
                            url : '../controller/scripts/accountant/loadstudfeebreakdown.php', //Here you will fetch records 
                            data : dataString, //Pass $id
                            success : function(data){
                                $('#viewincomefeetransbody').html(data);//Show fetched data from 
                                
                                $('#deletesingleincomefeetransmodal').modal('toggle');

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
                                                    $(rows).eq(i).before();
                                                    last = group;
                                                }
                                                
                                            });
                                        }
                                    });
                                    // Order by the grouping
                                    $('#example tbody').on('click', function() {
                                        var currentOrder = table.order()[0];
                                        if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                                            table.order([2, 'desc']).draw();
                                        } else {
                                            table.order([2, 'asc']).draw();
                                        }
                                    });
                                });
                                $('#viewincomeexample23').DataTable({
                                    dom: 'Bfrtip',
                                    buttons: [
                            
                                    ]
                                });
                                
                                
                                $("#loadfeetable").html('<i class="fa fa-spinner fa-spin"></i>');
                                $("#body").html('<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');
                                $("#discountbody").html('<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');
                                $("#scholarshipbody").html('<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');
                                $("#creditbody").html('<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');
                                
                                var institution = "<?php echo $InstitutionID; ?>";
                                // var category = $("#category").val();
                                // var subcategory = $("#subcategory").val();
                                var session = $("#session").val();
                                var term = $("#term").val();
                                var classid = $("#class").val();
                                var sdate = $("#sdate").val();
                                var edate = $("#edate").val();
                                var userid = "<?php echo $UserID; ?>";
                                var usertype = "<?php echo $userType; ?>";
                                
                                var dataString = 'institution='+ institution + '&userid='+ userid + '&usertype='+ usertype + '&sdate='+ sdate + '&edate='+ edate + '&session='+ session + '&term='+ term + '&classid='+ classid;
                                
                                $.ajax({
                                    type : 'post',
                                    url: "../controller/scripts/accountant/getfeetable.php",
                                    data :  dataString,
                                    success : function(result)
                                    {
                                        $("#loadfeetable").html('Load');
                                        $("#body").html(result);
                
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
                                                            $(rows).eq(i).before();
                                                            last = group;
                                                        }
                                                        
                                                    });
                                                }
                                            });
                                            // Order by the grouping
                                            $('#example tbody').on('click', function() {
                                                var currentOrder = table.order()[0];
                                                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                                                    table.order([2, 'desc']).draw();
                                                } else {
                                                    table.order([2, 'asc']).draw();
                                                }
                                            });
                                        });
                                        $('#example23').DataTable({
                                            dom: 'Bfrtip',
                                            buttons: [
                                                
                                            ]
                                        });
                                        
                                    }
                                });
                            }
                        });
                    }
                });

            });
        });

        $("#loadfeetable").click(function(){
            
            $("#loadfeetable").html('<i class="fa fa-spinner fa-spin"></i>');
            $("#body").html('<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');
            $("#discountbody").html('<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');
            $("#scholarshipbody").html('<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');
            $("#creditbody").html('<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');
            
            var institution = "<?php echo $InstitutionID; ?>";
            // var category = $("#category").val();
            // var subcategory = $("#subcategory").val();
            var session = $("#session").val();
            var term = $("#term").val();
            var classid = $("#class").val();
            var sdate = $("#sdate").val();
            var edate = $("#edate").val();
            var userid = "<?php echo $UserID; ?>";
            var usertype = "<?php echo $userType; ?>";
            
            var dataString = 'institution='+ institution + '&userid='+ userid + '&usertype='+ usertype + '&sdate='+ sdate + '&edate='+ edate + '&session='+ session + '&term='+ term + '&classid='+ classid;
            
            // alert(dataString);
            if(institution == '0' || institution == '')
            {
                $("#loadfeetable").html('Load');
                $("#body").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>You do not  belong to any institution</center></div>');
            }
            else
            {
                // alert(dataString
                
                $.ajax({
                    type : 'post',
                    url: "../controller/scripts/accountant/getfeetable.php",
                    data :  dataString,
                    success : function(result)
                    {
                        $("#loadfeetable").html('Load');
                        $("#body").html(result);

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
                                            $(rows).eq(i).before();
                                            last = group;
                                        }
                                        
                                    });
                                }
                            });
                            // Order by the grouping
                            $('#example tbody').on('click', function() {
                                var currentOrder = table.order()[0];
                                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                                    table.order([2, 'desc']).draw();
                                } else {
                                    table.order([2, 'asc']).draw();
                                }
                            });
                        });
                        $('#example23').DataTable({
                            dom: 'Bfrtip',
                            buttons: [
                                
                            ]
                        });
                        
                    }
                });
                
                $.ajax({
                    type : 'post',
                    url: "../controller/scripts/accountant/getfeediscounttable.php",
                    data :  dataString,
                    success : function(result)
                    {
                        $("#loadfeetable").html('Load');
                        $("#discountbody").html(result);

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
                                            $(rows).eq(i).before();
                                            last = group;
                                        }
                                        
                                    });
                                }
                            });
                            // Order by the grouping
                            $('#example tbody').on('click', function() {
                                var currentOrder = table.order()[0];
                                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                                    table.order([2, 'desc']).draw();
                                } else {
                                    table.order([2, 'asc']).draw();
                                }
                            });
                        });
                        $('#disfulexample23').DataTable({
                            dom: 'Bfrtip',
                            buttons: [
                                
                            ]
                        });
                        
                    }
                });
                
                $.ajax({
                    type : 'post',
                    url: "../controller/scripts/accountant/getfeescholarshiptable.php",
                    data :  dataString,
                    success : function(result)
                    {
                        $("#loadfeetable").html('Load');
                        $("#scholarshipbody").html(result);

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
                                            $(rows).eq(i).before();
                                            last = group;
                                        }
                                        
                                    });
                                }
                            });
                            // Order by the grouping
                            $('#example tbody').on('click', function() {
                                var currentOrder = table.order()[0];
                                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                                    table.order([2, 'desc']).draw();
                                } else {
                                    table.order([2, 'asc']).draw();
                                }
                            });
                        });
                        $('#scholarshipfulexample23').DataTable({
                            dom: 'Bfrtip',
                            buttons: [
                                
                            ]
                        });
                        
                    }
                });
                
                $.ajax({
                    type : 'post',
                    url: "../controller/scripts/accountant/getfeecredittable.php",
                    data :  dataString,
                    success : function(result)
                    {
                        $("#loadfeetable").html('Load');
                        $("#creditbody").html(result);

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
                                            $(rows).eq(i).before();
                                            last = group;
                                        }
                                        
                                    });
                                }
                            });
                            // Order by the grouping
                            $('#example tbody').on('click', function() {
                                var currentOrder = table.order()[0];
                                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                                    table.order([2, 'desc']).draw();
                                } else {
                                    table.order([2, 'asc']).draw();
                                }
                            });
                        });
                        $('#creditfulexample23').DataTable({
                            dom: 'Bfrtip',
                            buttons: [
                                
                            ]
                        });
                        
                    }
                });
            
            }
            
        });

        $("#loadtransporttable").click(function(){
                
            $("#loadtransporttable").html('<i class="fa fa-spinner fa-spin"></i>');
            $("#transportbody").html('<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');
            
            var institution = "<?php echo $InstitutionID; ?>";
            var session = $("#transportsession").val();
            var term = $("#transportterm").val();
            var classid = $("#transportclass").val();
            var sdate = $("#transportsdate").val();
            var edate = $("#transportedate").val();
            var userid = "<?php echo $UserID; ?>";
            var usertype = "<?php echo $userType; ?>";
            
            var dataString = 'institution='+ institution + '&userid='+ userid + '&usertype='+ usertype + '&sdate='+ sdate + '&edate='+ edate + '&session='+ session + '&term='+ term + '&classid='+ classid;
            
            // alert(dataString);
            if(institution == '0' || institution == '')
            {
                $("#loadtransporttable").html('Load');
                $("#transportbody").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>You do not  belong to any institution</center></div>');
            }
            else
            {
                // alert(dataString);
                
                $.ajax({
                    type : 'post',
                    url: "../controller/scripts/accountant/gettransporttablefiltr.php",
                    data :  dataString,
                    success : function(result)
                    {
                        $("#loadtransporttable").html('Load');
                        $("#transportbody").html(result);

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
                                            $(rows).eq(i).before();
                                            last = group;
                                        }
                                        
                                    });
                                }
                            });
                            // Order by the grouping
                            $('#example tbody').on('click', function() {
                                var currentOrder = table.order()[0];
                                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                                    table.order([2, 'desc']).draw();
                                } else {
                                    table.order([2, 'asc']).draw();
                                }
                            });
                        });
                        $('#example23sec').DataTable({
                            dom: 'Bfrtip',
                            buttons: [
                                
                            ]
                        });
                    }
                });
            
            }
                
        });

        $("body").on("click", "#deleteloadincometransporttransbtn", function(){

            var PaymentRefNo = $(this).data('id');
            var userid = "<?php echo $UserID; ?>";
            var usertype = "<?php echo $userType; ?>";
            var institution = "<?php echo $InstitutionID; ?>";
           
            var dataString = 'institution='+ institution + '&PaymentRefNo='+ PaymentRefNo + '&userid='+ userid + '&usertype='+ usertype;
                
            // alert(dataString);
            $("body").on("click", "#deletesingleincometptransmainbtn", function(){
                $("#deletesingleincometptransmainbtn").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
                
                
                
                // alert(dataString);
                $.ajax({
                    type : 'post',
                    url : '../controller/scripts/accountant/proceeddelincometptransbody.php', //Here you will fetch records 
                    data : dataString, //Pass $id
                    success : function(data){
                        $('#deletesingleincometptransbody').html(data);//Show fetched data from database;//Show fetched data from database
                        $("#deletesingleincometptransmainbtn").html('<i class="fa fa-trash"></i> Delete');

                        $("#transportbody").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
                        location.reload();

                        var institution = "<?php echo $InstitutionID; ?>"
                    
                        $.ajax({
                            type : 'post',
                            url: "../controller/scripts/accountant/gettransporttableall.php",
                            data :  'institution=' + institution,
                            success : function(result)
                            {
                                $("#transportbody").html(result);

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
                                                    $(rows).eq(i).before();
                                                    last = group;
                                                }
                                                
                                            });
                                        }
                                    });
                                    // Order by the grouping
                                    $('#example tbody').on('click', function() {
                                        var currentOrder = table.order()[0];
                                        if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                                            table.order([2, 'desc']).draw();
                                        } else {
                                            table.order([2, 'asc']).draw();
                                        }
                                    });
                                });
                                $('#transportexample23').DataTable({
                                    dom: 'Bfrtip',
                                    buttons: [
                                        
                                    ]
                                });
                                
                            }
                        });

                    }
                });   
            });  
        });

        $("body").on("click", "#deleteloadincomeothertransbtn", function(){


            var depositorOrReciepientName = $(this).data('depositorOrReciepientName');
            var PaymentRefNo = $(this).data('id');
            var userid = "<?php echo $UserID; ?>";
            var usertype = "<?php echo $userType; ?>";
            var institution = "<?php echo $InstitutionID; ?>";

            var dataString = 'institution='+ institution + '&depositorOrReciepientName='+ depositorOrReciepientName + '&PaymentRefNo='+ PaymentRefNo + '&userid='+ userid + '&usertype='+ usertype;
                
            // alert(dataString);
            $("body").on("click", "#deletesingleincomeothertransmainbtn", function(){
                
                // alert(dataString);
                $.ajax({
                    type : 'post',
                    url : '../controller/scripts/accountant/proceeddelincomeothertransbody.php', //Here you will fetch records 
                    data : dataString, //Pass $id
                    success : function(data){
                        $('#deletesingleincomeothertransbody').html(data);//Show fetched data from database;//Show fetched data from database
                        $("#deletesingleincomeothertransmainbtn").html('<i class="fa fa-trash"></i> Delete');

                        $("#otherbody").html("<center><i class='fa fa-spinner fa-spin'></i></center>");

                        var institution = "<?php echo $InstitutionID; ?>"
                    
                        $.ajax({
                            type : 'post',
                            url: "../controller/scripts/accountant/getothertableall.php",
                            data :  'institution=' + institution,
                            success : function(result)
                            {
                                $("#otherbody").html(result);
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
                                                    $(rows).eq(i).before();
                                                    last = group;
                                                }
                                                
                                            });
                                        }
                                    });
                                    // Order by the grouping
                                    $('#example tbody').on('click', function() {
                                        var currentOrder = table.order()[0];
                                        if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                                            table.order([2, 'desc']).draw();
                                        } else {
                                            table.order([2, 'asc']).draw();
                                        }
                                    });
                                });
                                $('#otherexample23').DataTable({
                                    dom: 'Bfrtip',
                                    buttons: [
                                        
                                    ]
                                });
                                
                            }
                        });

                    }
                });   
            });  
        }); 

        $("body").on('change','#othercategory',function(){
                    
            $('#othersubcategory').html('');
            $('#othersubcategory').append($('<option>').val(0).text('Loading...'));
            
            var institution = "<?php echo $InstitutionID ; ?>"
            var category = $("#othercategory").val();
            
            var dataString = 'institution=' + institution + '&category=' + category;
            $.ajax({
                type : 'post',
                url: "../controller/scripts/accountant/sunnygetsubcategory.php",
                data :  dataString,
                success : function(result)
                {
                    var obj1 = JSON.parse(result);
                    console.log(obj1);
                    
                    var z;
                    var subcategoryname = "";
                    var subcategoryID = "";
                    
                    $('#othersubcategory').html('');
                    $('#othersubcategory').append($('<option>').val(0).text('Select Sub-Category'));
            
                    for (z = 0; z < obj1.length; z++) 
                    {
                        subcategoryname = obj1[z].subCategoryTitle;
                        subcategoryID = obj1[z].subCategoryID;
                        $('#othersubcategory').append($('<option>').val(subcategoryID).text(subcategoryname));

                    }
                }
            });

        });

        $("#loadothertable").click(function(){
                
            $("#loadothertable").html('<i class="fa fa-spinner fa-spin"></i>');
            $("#otherbody").html('<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');
            
            var institution = "<?php echo $InstitutionID; ?>";
            var category = $("#othercategory").val();
            var subcategory = $("#othersubcategory").val();
            var session = $("#othersession").val();
            var term = $("#otherterm").val();
            var sdate = $("#othersdate").val();
            var edate = $("#otheredate").val();
            var userid = "<?php echo $UserID; ?>";
            var usertype = "<?php echo $userType; ?>";
            
            var dataString = 'institution='+ institution + '&userid='+ userid + '&usertype='+ usertype + '&sdate='+ sdate + '&edate='+ edate + '&category='+ category + '&subcategory='+ subcategory + '&session='+ session + '&term='+ term;
            
            // alert(dataString);
            if(institution == '0' || institution == '')
            {
                $("#loadothertable").html('Load');
                $("#otherbody").html('<center><div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>You do not  belong to any institution</center></div></center>');
            }
            else
            {
                // alert(dataString);
                    
                $.ajax({
                    type : 'post',
                    url: "../controller/scripts/accountant/getothertable.php",
                    data :  dataString,
                    success : function(result)
                    {
                        $("#loadothertable").html('Load');
                        $("#otherbody").html(result);
                        
                    }
                });
            
            }
            
        });
  
        $("body").on("click", "#deleteloadfeedeposittransbtn", function(){
            $('#deletefeedeposittransbody').html('');
            $('#deletefeedeposittransresponse').html('');
            $("#deletefeedeposittransbody").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
            
            var PaymentRefNo = $(this).data("id");
            var institution = "<?php echo $InstitutionID; ?>";
           
            var dataString = 'institution='+ institution + '&PaymentRefNo='+ PaymentRefNo;
                
            // alert(dataString);
            $.ajax({
                type : 'post',
                url : '../controller/scripts/accountant/loaddelincomefeetransbody.php', //Here you will fetch records 
                data : dataString, //Pass $id
                success : function(data){
                    $('#deletefeedeposittransbody').html(data);//Show fetched data from database
                }
            });   
        });

        $("body").on("click", "#deletefeedeposittransmainbtn", function(){
            $("#deletefeedeposittransmainbtn").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
            
            $('#deletefeedeposittransresponse').html('');

            var PaymentRefNo = $('#PaymentRefNo').val();
            var userid = "<?php echo $UserID; ?>";
            var usertype = "<?php echo $userType; ?>";
            var institution = "<?php echo $InstitutionID; ?>";
           
            var dataString = 'institution='+ institution + '&PaymentRefNo='+ PaymentRefNo + '&userid='+ userid + '&usertype='+ usertype;
                
            // alert(dataString);
             $.ajax({
                type : 'post',
                url : '../controller/scripts/accountant/proceeddelincomefeetransbody.php', //Here you will fetch records 
                data : dataString, //Pass $id
                success : function(data){
                    $('#deletefeedeposittransresponse').html(data);//Show fetched data from database;//Show fetched data from database
                    $("#deletefeedeposittransmainbtn").html('<i class="fa fa-trash"></i> Delete');
                    $("#transportbody").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
                    // location.reload();

                    var institution = "<?php echo $InstitutionID; ?>"
                    $.ajax({
                        type : 'post',
                        url: "../controller/scripts/accountant/gettransporttableall.php",
                        data :  'institution=' + institution,
                        success : function(result)
                        {
                            $("#transportbody").html(result);
                            $("#deletefeedeposittransmodal").modal('toggle');

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
                                                $(rows).eq(i).before();
                                                last = group;
                                            }
                                            
                                        });
                                    }
                                });
                                // Order by the grouping
                                $('#example tbody').on('click', function() {
                                    var currentOrder = table.order()[0];
                                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                                        table.order([2, 'desc']).draw();
                                    } else {
                                        table.order([2, 'asc']).draw();
                                    }
                                });
                            });
                            $('#transportexample23').DataTable({
                                dom: 'Bfrtip',
                                buttons: [
                                    
                                ]
                            });
                            
                        }
                    });
                }
            });   
        });

        $("body").on("click", "#deleteloadincomefeetransbtn", function(){
            $('#deleteincomefeetransbody').html('');
            $("#deleteincomefeetransbody").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
            
            var PaymentRefNo = $(this).data("id");
            var institution = "<?php echo $InstitutionID; ?>";
           
            var dataString = 'institution='+ institution + '&PaymentRefNo='+ PaymentRefNo;
                
            // alert(dataString);
            $.ajax({
                type : 'post',
                url : '../controller/scripts/accountant/loaddelincomefeetransbody.php', //Here you will fetch records 
                data : dataString, //Pass $id
                success : function(data){
                    $('#deleteincomefeetransbody').html(data);//Show fetched data from database
                }
            });   
        });

        $("body").on("click", "#deleteincomefeetransmainbtn", function(){
            $("#deleteincomefeetransmainbtn").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
            
            $('#deleteincomefeetransresponse').html('');

            var PaymentRefNo = $('#PaymentRefNo').val();
            var userid = "<?php echo $UserID; ?>";
            var usertype = "<?php echo $userType; ?>";
            var institution = "<?php echo $InstitutionID; ?>";
           
            var dataString = 'institution='+ institution + '&PaymentRefNo='+ PaymentRefNo + '&userid='+ userid + '&usertype='+ usertype;
                
            // alert(dataString);
             $.ajax({
                type : 'post',
                url : '../controller/scripts/accountant/proceeddelincomefeetransbody.php', //Here you will fetch records 
                data : dataString, //Pass $id
                success : function(data){
                    $('#deleteincomefeetransresponse').html(data);//Show fetched data from database;//Show fetched data from database
                    $("#deleteincomefeetransmainbtn").html('<i class="fa fa-trash"></i> Delete');
                    location.reload();

                    var institution = "<?php echo $InstitutionID; ?>"
                    $.ajax({
                        type : 'post',
                        url: "../controller/scripts/accountant/getfeetableall.php",
                        data :  'institution=' + institution,
                        success : function(result)
                        {
                            $("#loadfeetable").html('Load');
                            $("#body").html(result);

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
                                                $(rows).eq(i).before();
                                                last = group;
                                            }
                                            
                                        });
                                    }
                                });
                                // Order by the grouping
                                $('#example tbody').on('click', function() {
                                    var currentOrder = table.order()[0];
                                    if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                                        table.order([2, 'desc']).draw();
                                    } else {
                                        table.order([2, 'asc']).draw();
                                    }
                                });
                            });
                            $('#example23').DataTable({
                                dom: 'Bfrtip',
                                buttons: [
                                    
                                ]
                            });
                            
                        }
                    });
                }
            });   
        });

        $("body").on("click", "#viewloadincomefeetransbtn", function(){
            $('#viewincomefeetransbody').html('');
            $("#viewincomefeetransbody").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
            
            var PaymentRefNo = $(this).data("id");
            var institution = "<?php echo $InstitutionID; ?>";
           
            var dataString = 'institution='+ institution + '&PaymentRefNo='+ PaymentRefNo;
                
            // alert(dataString);
            $.ajax({
                type : 'post',
                url : '../controller/scripts/accountant/loadviewincomefeetransbody.php', //Here you will fetch records 
                data : dataString, //Pass $id
                success : function(data){
                    $('#viewincomefeetransbody').html(data);//Show fetched data from database
                }
            });   
        });

        $("body").on("click", "#deleteloadincomeothertransbtn", function(){

            $("#deleteincomeothertransbody").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
            
            var category = $(this).data("catid");
            var subcategory = $(this).data("subcatid");
            var studid = $(this).data("id");
            var session = $(this).data("session");
            var date = $(this).data("date");
            var term = $(this).data("term");
            var classid = $(this).data("class");
            var amount = $(this).data("amount");
            var time = $(this).data("time");
            var depositorOrReciepientName = $(this).data("dep");
            var institution = "<?php echo $InstitutionID; ?>";
           
            var dataString = 'institution='+ institution + '&depositorOrReciepientName='+ depositorOrReciepientName + '&time='+ time + '&date='+ date + '&amount='+ amount + '&studid='+ studid + '&classid='+ classid + '&category='+ category + '&subcategory='+ subcategory + '&session='+ session + '&term='+ term;
                
            // alert(dataString);
            $.ajax({
                type : 'post',
                url : '../controller/scripts/accountant/loaddelincomeothertransbody.php', //Here you will fetch records 
                data : dataString, //Pass $id
                success : function(data){
                    $('#deleteincomeothertransbody').html(data);//Show fetched data from database
                }
            });   
        });

        $("body").on("click", "#deleteincomeothertransmainbtn", function(){

            $("#deleteincomeothertransmainbtn").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
            
            $('#deleteincomeothertransresponse').html('');
            
            var category = $('#othercatid').val();
            var subcategory = $('#othersubcatid').val();
            var studid = $('#otherstudid').val();
            var session = $('#othersessionname').val();
            var date = $('#otherdate').val();
            var term = $('#termid').val();
            var time = $('#othertime').val();
            var classid = $('#otherclass').val();
            var depositorOrReciepientName = $('#otherdepositorOrReciepientName').val();
            var amount = $('#otheramount').val();
            var userid = "<?php echo $UserID; ?>";
            var usertype = "<?php echo $userType; ?>";
            var institution = "<?php echo $InstitutionID; ?>";
           
            var dataString = 'institution='+ institution + '&depositorOrReciepientName='+ depositorOrReciepientName + '&time='+ time + '&userid='+ userid + '&date='+ date + '&usertype='+ usertype + '&amount='+ amount + '&studid='+ studid + '&classid='+ classid + '&category='+ category + '&subcategory='+ subcategory + '&session='+ session + '&term='+ term;
                
            // alert(dataString);
            $.ajax({
                type : 'post',
                url : '../controller/scripts/accountant/proceeddelincomeothertransbody.php', //Here you will fetch records 
                data : dataString, //Pass $id
                success : function(data){
                    $('#deleteincomeothertransresponse').html(data);//Show fetched data from database;//Show fetched data from database
                    $("#deleteincomeothertransmainbtn").html('<i class="fa fa-trash"></i> Delete');
                    $("#deleteincomeothertransbody").html('');
                    location.reload();
                }
            });   
        });

        $("body").on("click","#printtreminalbtn", function(){
            $("#printterminalcontentbody").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
            var instid = $(this).data("inst");
            var refnumb = $(this).data("id");
            
                $.ajax({
                type : 'post',
                url : '../controller/scripts/accountant/loadterminalprint.php', //Here you will fetch records 
                data : 'instid='+instid+'&refnumb='+refnumb, //Pass $id
                success : function(data){
                    $("#printterminalcontentbody").html(data);
                }
            }); 
           
        });

        $("body").on("click","#finaltermprintbtn", function(){
            var printContent = document.getElementById('printterminalcontentbody');
 
            var htmlToPrint = '' +
            '<style type="text/css">' +
            '*{' +
            'font-size: 15px;' +
            'font-family: "Times New Roman";' +
            '}' +

            'td, th, tr,table{ border-top: 1px solid black;'+
            'border-collapse: collapse;' +
            'border-bottom:dashed;'+
            '}'+
            'td.description,th.description {'+
            'width: 155px;' +
            'max-width: 155px;' +
            '}'+
            'td.quantity, th.quantity {'+
            'width: 50px;' +
            'max-width: 50px;' +
            'word-break: break-all;' +
            '}'+
            'td.price,th.price {'+
            'width: 50px;'+
            'max-width: 50px;'+
            'word-break: break-all;'+
            '}'+
            '.centered {'+
            'text-align: center;'+
            'align-content: center;'+
            '}'+
            '.ticket {'+
            'width: 155px;'+
            'max-width: 155px;'+
            '}'+
            '@media print{'+
            'table{'+
            'border-style:dotted;'+
            '}'+
            '}'+

            '</style>';
            
          
              
          
      
            htmlToPrint += printContent.outerHTML;
           
            newWin.print(htmlToPrint);
            newWin.close();
  
        });

    </script>
</body>

</html>
