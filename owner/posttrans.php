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
    <title>Post Income Transaction | <?php echo $fullname; ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="../library/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    
    <link rel="stylesheet" href="../library/plugins/morrisjs/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    
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

<style>
.dott {
  height: 15px;
  width: 15px;
  background-color: #b4becb;
  Opacity: 0.8;
  border-radius: 50%;
  display: inline-block;
}
.dottt {
  height: 15px;
  width: 15px;
  background-color: #01c0c8;
  Opacity: 0.8;
  border-radius: 50%;
  display: inline-block;
}
</style>
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
                    <h2 class="text-themecolor" style="color: black; font-weight: 500;">Post Income Transaction</h2>
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
                    <div class="row">
                        <div class="col-sm-11"></div>
                        <div class="col-sm-1">
                            <a href="incometrans.php" style="text-decoration:underline; color:blue;"><i class="fa fa-backward"></i> Back</a>
                        </div>
                    </div>
                    <div class="row" style="margin-top:10px;">
                        <div class="col-12">
                            <div class="card table-responsive">
                                
                                <div class="card-body">
                                  
                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Income From Fee</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Income From Other Sources</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            
                                            <div class="row" style="padding-top:10px;">
                                                
                                                <div class="col-md-2">
                                                    <form>
                                                        <div class="form-group">
                                                            <select class="form-control" id="feeinstitution" style="background: white; border-width: 1px; border-style: solid;">
                                                                <option value="0" selected>Select Institution</option>
                                                                <?php  
                                            					    $sqlGetinstitution = ("SELECT * FROM `institution` WHERE `AgencyOrSchoolOwnerID`='$UserID'");
                                            					    $resultGetinstitution = mysqli_query($link, $sqlGetinstitution);
                                            					    $rowGetinstitution = mysqli_fetch_assoc($resultGetinstitution);
                                            					    $row_cntGetinstitution = mysqli_num_rows($resultGetinstitution);
                                             					 
                                             					  do{
                                                                        echo '<option value="' . $rowGetinstitution['InstitutionID']. '"> ' . $rowGetinstitution['InstitutionName'] . ' ' . $rowGetinstitution['InstitutionNameTwo'] . '</option>';
                                                                
                                                                	}while($rowGetinstitution = mysqli_fetch_assoc($resultGetinstitution));
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-md-2">
                                                    <form>
                                                        <div class="form-group">
                                                            <select class="form-control" id="session" style="background: white; border-width: 1px; border-style: solid;">
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
                                                    </form>
                                                </div>
                                                <div class="col-md-2">
                                                    <form>
                                                        <div class="form-group">
                                                            <select class="form-control" id="faculty" style="background: white; border-width: 1px; border-style: solid;">
                                                                <option value="0" selected>Select Faculty</option>
                                                            </select>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-md-1">
                                                    <form>
                                                        <div class="form-group">
                                                            <select class="form-control" id="class" style="background: white; border-width: 1px; border-style: solid;">
                                                                <option value="0" selected>Select Class</option>
                                                              
                                                            </select>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-md-2">
                                                    <form>
                                                        <div class="form-group">
                                                            <select class="form-control" id="term" style="background: white; border-width: 1px; border-style: solid;">
                                                                <option value="0" selected>Select Term/Semester</option>
                                                              
                                                            </select>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-md-2">
                                                    <form>
                                                        <div class="form-group">
                                                            <select class="form-control" id="student" style="background: white; border-width: 1px; border-style: solid;">
                                                                <option value="0" selected>Select Student</option>
                                                            </select>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-md-1">
                                                    <a href="#" id="loadStudfeedetails" type="button" class="btn chimaNormalBtn" style="width: 80px;">
                                                        <span style="font-size: 13px;">Load</span>
                                                    </a>                
                                                </div>
                                            </div>
                                            
                                            <div class="row" style="margin-top:10px;">
                                                <div class="col-12">
                                                    <div class="card table-responsive">
                                                        
                                                        <div class="card-body" id="body">
                                                            <div class="alert alert-primary" role="alert">
                                                                <center>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                                                    </svg>
                                                                    Please Filter Before Clicking Load
                                                                </center>
                                                            </div>
                                                        </div>
                                                    </div>  
                                                </div>
                                              </div>
                                        </div>
                                        
                                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                            
                                            <div class="row" style="padding-top:10px;">
                                                
                                                <div class="col-md-3">
                                                    
                                                </div>
                                                <div class="col-md-2">
                                                    <form>
                                                        <div class="form-group">
                                                            <select class="form-control" id="institution" style="background: white; border-width: 1px; border-style: solid;">
                                                                <option value="0" selected>Select Institution</option>
                                                                <?php  
                                            					    $sqlGetinstitution = ("SELECT * FROM `institution` WHERE `AgencyOrSchoolOwnerID`='$UserID'");
                                            					    $resultGetinstitution = mysqli_query($link, $sqlGetinstitution);
                                            					    $rowGetinstitution = mysqli_fetch_assoc($resultGetinstitution);
                                            					    $row_cntGetinstitution = mysqli_num_rows($resultGetinstitution);
                                             					 
                                             					  do{
                                                                        echo '<option value="' . $rowGetinstitution['InstitutionID']. '"> ' . $rowGetinstitution['InstitutionName'] . ' ' . $rowGetinstitution['InstitutionNameTwo'] . '</option>';
                                                                
                                                                	}while($rowGetinstitution = mysqli_fetch_assoc($resultGetinstitution));
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-md-2">
                                                    <form>
                                                        <div class="form-group">
                                                            <select class="form-control" id="othercategory" style="background: white; border-width: 1px; border-style: solid;">
                                                                <option value="0" selected>Select Category</option>
                                                                
                                                            </select>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="col-md-2">
                                                    <form>
                                                        <div class="form-group">
                                                            <select class="form-control" id="othersession" style="background: white; border-width: 1px; border-style: solid;">
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
                                                    </form>
                                                </div>
                                                <div class="col-md-2">
                                                    <form>
                                                        <div class="form-group">
                                                            <select class="form-control" id="otherterm" style="background: white; border-width: 1px; border-style: solid;">
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
                                                    </form>
                                                </div>
                                                <div class="col-md-1">
                                                    <a href="#" id="loadothertransdetails" type="button" class="btn chimaNormalBtn" style="width: 80px;">
                                                        <span style="font-size: 13px;">Load</span>
                                                    </a>                
                                                </div>
                                            </div>
                                            
                                            <div class="row" style="margin-top:10px;">
                                                <div class="col-12">
                                                    <div class="card table-responsive">
                                                        
                                                        <div class="card-body" id="otherbody">
                                                            <div class="alert alert-primary" role="alert">
                                                                <center>
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                                                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                                                    </svg>
                                                                    Please Filter Before Clicking Load
                                                                </center>
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

    <script>
        $(document).ready(function(){
  
            $("#feeinstitution").change(function(){
                    
                $('#session').html('');
                $('#session').append($('<option>').val(0).text('Loading...'));
                
                var institution = $('#feeinstitution').val();
                
                var dataString = 'institution='+ institution;
                
                if(institution == '0' || institution == '')
                {
                    $('#session').html('');
                    $('#session').append($('<option>').val(0).text('Select Institution First'));
                }
                else
                {
                    // alert(dataString);
                    
                    $.ajax({
                        type : 'post',
                        url: "../controller/scripts/owner/gettrans_session.php",
                        data :  dataString,
                        success : function(result)
                        {
                            var obj1 = JSON.parse(result);
                            console.log(obj1);
                            
                            var z;
                            var sessionname = "";
                            var sessionID = "";
                            
                            $('#session').html('');
                            $('#session').append($('<option>').val(0).text('Select Session'));
                    
                            for (z = 0; z < obj1.length; z++) 
                            {
                                sessionname = obj1[z].sessionName;
                                sessionID = obj1[z].sessionID;
                                $('#session').append($('<option>').val(sessionname).text(sessionname));
    
                            }
                        }
                    });
                
                }
                
            });
            
            $("#session").change(function(){
                    
                $('#faculty').html('');
                $('#faculty').append($('<option>').val(0).text('Loading...'));
                
                var institution = $('#feeinstitution').val();
                var session = $("#session").val();
                
                var dataString = 'institution='+ institution + '&session='+ session;
                
                if(session == '0' || session == '')
                {
                    $('#faculty').html('');
                    $('#faculty').append($('<option>').val(0).text('Select Session First'));
                }
                else
                {
                    // alert(dataString);
                    
                    $.ajax({
                        type : 'post',
                        url: "../controller/scripts/owner/gettrans_faculty.php",
                        data :  dataString,
                        success : function(result)
                        {
                            var obj1 = JSON.parse(result);
                            console.log(obj1);
                            
                            var z;
                            var facultyname = "";
                            var facultyID = "";
                            
                            $('#faculty').html('');
                            $('#faculty').append($('<option>').val(0).text('Select Faculty'));
                    
                            for (z = 0; z < obj1.length; z++) 
                            {
                                facultyname = obj1[z].FacultyOrSchoolName;
                                facultyID = obj1[z].FacultyOrSchoolID;
                                $('#faculty').append($('<option>').val(facultyID).text(facultyname));
    
                            }
                        }
                    });
                
                }
                
            });
            
            $("#faculty").change(function(){
                    
                $('#class').html('');
                $('#class').append($('<option>').val(0).text('Loading...'));
                
                var institution = $('#feeinstitution').val();
                var faculty = $("#faculty").val();
                
                var dataString = 'institution='+ institution + '&faculty='+ faculty;
                
                if(faculty == '0' || faculty == '')
                {
                    $('#class').html('');
                    $('#class').append($('<option>').val(0).text('Select Faculty First'));
                }
                else
                {
                    // alert(dataString);
                    
                    $.ajax({
                        type : 'post',
                        url: "../controller/scripts/owner/gettrans_class.php",
                        data :  dataString,
                        success : function(result)
                        {
                            var obj1 = JSON.parse(result);
                            console.log(obj1);
                            
                            var z;
                            var classname = "";
                            var classID = "";
                            
                            $('#class').html('');
                            $('#class').append($('<option>').val(0).text('Select Class'));
                    
                            for (z = 0; z < obj1.length; z++) 
                            {
                                classname = obj1[z].ClassOrDepartmentName;
                                classID = obj1[z].ClassOrDepartmentID;
                                $('#class').append($('<option>').val(classID).text(classname));
    
                            }
                        }
                    });
                
                }
                
            });
            
            $("#class").change(function(){
                    
                $('#term').html('');
                $('#term').append($('<option>').val(0).text('Loading...'));
                
                var institution = $('#feeinstitution').val();
                var classid = $("#class").val();
                
                var dataString = 'institution='+ institution + '&classid='+ classid;
                
                if(classid == '0' || classid == '')
                {
                    $('#term').html('');
                    $('#term').append($('<option>').val(0).text('Select Class First'));
                }
                else
                {
                    // alert(dataString);
                    
                    $.ajax({
                        type : 'post',
                        url: "../controller/scripts/owner/gettrans_term.php",
                        data :  dataString,
                        success : function(result)
                        {
                            var obj1 = JSON.parse(result);
                            console.log(obj1);
                            
                            var z;
                            var termname = "";
                            var termID = "";
                            
                            $('#term').html('');
                            $('#term').append($('<option>').val(0).text('Select Term'));
                    
                            for (z = 0; z < obj1.length; z++) 
                            {
                                termname = obj1[z].TermOrSemesterName;
                                termID = obj1[z].TermOrSemesterID;
                                $('#term').append($('<option>').val(termname).text(termname));
    
                            }
                        }
                    });
                
                }
                
            });
            
            $("#term").change(function(){
                    
                $('#student').html('');
                $('#student').append($('<option>').val(0).text('Loading...'));
                
                var institution = $('#feeinstitution').val();
                var termid = $("#term").val();
                var classid = $("#class").val();
                var session = $("#session").val();
                
                var dataString = 'institution='+ institution + '&termid='+ termid + '&classid='+ classid + '&session='+ session;
                
                if(termid == '0' || termid == '')
                {
                    $('#student').html('');
                    $('#student').append($('<option>').val(0).text('Select Term First'));
                }
                else
                {
                    $.ajax({
                        type : 'post',
                        url: "../controller/scripts/owner/gettrans_student.php",
                        data :  dataString,
                        success : function(result)
                        {
                           
                            $('#student').html(result);
    
                        }
                    });
                
                }
                
            });
            
            $("#loadStudfeedetails").click(function(){
                
                $("#loadStudfeedetails").html('<i class="fa fa-spinner fa-spin"></i>');
                $("#body").html('<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');
                
                var institution = $('#feeinstitution').val();
                var session = $("#session").val();
                var faculty = $("#faculty").val();
                var classid = $("#class").val();
                var termid = $("#term").val();
                var student = $("#student").val();
                
                var dataString = 'institution='+ institution + '&termid='+ termid + '&classid='+ classid + '&session='+ session + '&faculty='+ faculty + '&student='+ student;
                
                if(session == ' ' || session == "0")
                {
                    $("#loadStudfeedetails").html('Load');
                    $("#body").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Please Select Session</center></div>');
                }
                else if(faculty == '' || faculty == '0')
                {
                    $("#loadStudfeedetails").html('Load');
                    $("#body").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Please Select Faculty</center></div>');
                }
                else if(classid == '' || classid == '0')
                {
                    $("#loadStudfeedetails").html('Load');
                    $("#body").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Please Select Class</center></div>');
                }
                else if(termid == '' || termid == '0')
                {
                    $("#loadStudfeedetails").html('Load');
                    $("#body").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Please Select Term</center></div>');
                }
                else if(student == '' || student == '0')
                {
                    $("#loadStudfeedetails").html('Load');
                    $("#body").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Please Select Student</center></div>');
                }
                else
                {
                    
                    $.ajax({
                        type : 'post',
                        url: "../controller/scripts/owner/getstudfeeinfo.php",
                        data :  dataString,
                        success : function(result)
                        {
                            $("#loadStudfeedetails").html('Load');
                            $("#body").html(result);
                            
                            $('.sunnycheckbox').change(function(){
                                
                                    var multipleSelSubcatId = [];
                                    $.each($("input[name='multipleSelSubcatId']:checked"), function(){
                                        multipleSelSubcatId.push($(this).val());
                                    });
                                    var institution = $('#feeinstitution').val();
                                    var session = $("#session").val();
                                    var faculty = $("#faculty").val();
                                    var classid = $("#class").val();
                                    var termid = $("#term").val();
                                    var student = $("#student").val();
                                    
                    
                                    var dataString = '&multipleSelSubcatId='+ multipleSelSubcatId + '&institution=' + institution + '&student=' + student + '&termid=' + termid + '&classid=' + classid + '&faculty=' + faculty + '&session=' + session;
                                    // alert(dataString);
                                    
                                        $("#msg").html('<i class="fa fa-spinner fa-spin"></i>');
                               
                                   
                                    $.ajax({
                                        type: "POST",
                                        url: "../controller/scripts/owner/display-summary.php",
                                        data: dataString,
                                        cache: false,
                                        
                                        success: function(result){
                                            $('#summary').html(result);
                                            
                                            $("#msg").html('');
                               
                                        }
                                    });
                                    
                            });
                            
                        }
                    });
                }
                
            });
            
            $("#institution").change(function(){
                    
                $('#othercategory').html('');
                $('#othercategory').append($('<option>').val(0).text('Loading...'));
                
                var institution = $('#institution').val();
                
                var dataString = 'institution='+ institution;
                
                if(institution == '0' || institution == '')
                {
                    $('#othercategory').html('');
                    $('#othercategory').append($('<option>').val(0).text('Select Institution First'));
                }
                else
                {
                    // alert(dataString);
                    
                    $.ajax({
                        type : 'post',
                        url: "../controller/scripts/owner/gettrans_catergory.php",
                        data :  dataString,
                        success : function(result)
                        {
                            var obj1 = JSON.parse(result);
                            console.log(obj1);
                            
                            var z;
                            var othercategoryname = "";
                            var othercategoryID = "";
                            
                            $('#othercategory').html('');
                            $('#othercategory').append($('<option>').val(0).text('Select Category'));
                    
                            for (z = 0; z < obj1.length; z++) 
                            {
                                othercategoryname = obj1[z].categoryTitle;
                                othercategoryID = obj1[z].categoryID;
                                $('#othercategory').append($('<option>').val(othercategoryID).text(othercategoryname));
    
                            }
                        }
                    });
                
                }
                
            });
            
            $('#loadothertransdetails').click(function(){
                
                $("#loadothertransdetails").html('<i class="fa fa-spinner fa-spin"></i>');
                $("#otherbody").html('<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');
                
                var institution = $('#institution').val();
                var othersession = $("#othersession").val();
                var othercategory = $("#othercategory").val();
                var otherterm = $("#otherterm").val();
                
                var dataString = 'institution=' + institution + '&othersession=' + othersession + '&othercategory=' + othercategory + '&otherterm=' + otherterm;
                
                if(othersession == '0' || othercategory == '0' || institution == '0' || institution == '0' || otherterm == '0' || othersession == '' || othercategory == '' || otherterm == '')
                {
                    $("#loadothertransdetails").html('Load');
                    $("#otherbody").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Please Filter Before Proceeding</center></div>');
                
                }
                else
                {
                    $.ajax({
                        type: "POST",
                        url: "../controller/scripts/owner/get-subcatlist.php",
                        data: dataString,
                        cache: false,
                        
                        success: function(result){
                            $("#loadothertransdetails").html('Load');
                            $('#otherbody').html(result);
                            
                            $('.sunnycheckboxsecond').change(function(){
                                
                                var multipleSelSubcatId = [];
                                $.each($("input[name='multipleSelSubcatId']:checked"), function(){
                                    multipleSelSubcatId.push($(this).val());
                                });
                                var institution = $('#institution').val();
                                var othersession = $("#othersession").val();
                                var othercategory = $("#othercategory").val();
                                var otherterm = $("#otherterm").val();
                                
                                var dataString = 'institution=' + institution + '&othersession=' + othersession + '&othercategory=' + othercategory + '&otherterm=' + otherterm + '&multipleSelSubcatId=' + multipleSelSubcatId;                                // alert(dataString);
                                
                                $("#msg").html('<i class="fa fa-spinner fa-spin"></i>');
                                
                                // alert(multipleSelSubcatId);
                               
                                $.ajax({
                                    type: "POST",
                                    url: "../controller/scripts/owner/display-othersummary.php",
                                    data: dataString,
                                    cache: false,
                                    
                                    success: function(result){
                                        $('#summary').html(result);
                                        $("#msg").html('');
                                        
                                    }
                                });
                                    
                            });
                             
                        }
                    });
                }
                
            });
            
            
        });
        
        $('body').on("change","#sunny",function(){
            
            var status = $('#sunny').val();
            
            if(status == 10 || status == 1)
            {
                $('#hidemop').show();
                $('#hidedepositorrecipientname').show();
                $('#hidepop').show();
            }
            else if(status == 0)
            {
                $('#hidemop').hide();
                $('#hidepop').hide();
            }
            else if(status == 2)
            {
                
                $('#hidemop').hide();
                $('#hidedepositorrecipientname').hide();
                $('#hidepop').hide();
            }
            else
            {
                
                $('#hidemop').hide();
                $('#hidedepositorrecipientname').hide();
                $('#hidepop').hide();
            }
            
        });
        
        $("body").on("click","#postpaymentbtn",function(){
                    
            $("#postpaymentbtn").html('<i class="fa fa-spinner fa-spin"></i> Post Payment');
            
            var multipleSelSubcatId = [];
            $.each($("input[name='multipleSelSubcatId']:checked"), function(){
                multipleSelSubcatId.push($(this).val());
            });
            var studstatus = $('#studstatus').val();
            var institution = $('#feeinstitution').val();
            var userid = "<?php echo $UserID; ?>";
            var usertype = "<?php echo $userType; ?>";
            var depositorrecipientname = $("#depositorrecipientname").val();
            var session = $("#session").val();
            var mop = $("#mop").val();
            var faculty = $("#faculty").val();
            var classid = $("#class").val();
            var termid = $("#term").val();
            var student = $("#student").val();
            var status = $('#sunny').val();
            
            var formData = new FormData();
            var pop = $('#pop')[0].files[0];
            formData.append('pop', pop);
            formData.append('institution', institution);
            formData.append('userid', userid);
            formData.append('usertype', usertype);
            formData.append('depositorrecipientname', depositorrecipientname);
            formData.append('session', session);
            formData.append('mop', mop);
            formData.append('faculty', faculty);
            formData.append('classid', classid);
            formData.append('termid', termid);
            formData.append('student', student);
            formData.append('status', status);
            formData.append('multipleSelSubcatId', multipleSelSubcatId);
            
            if(multipleSelSubcatId == '')
            {
                $("#postpaymentbtn").html('Post Payment');
                $("#msg").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Nothing has Been Selected</center></div>');
            }
            else
            { 
                
                
                $.ajax({
                    type: "POST",
                    url: "../controller/scripts/owner/posttransofstud.php",
                    method:'POST',
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    
                    success: function(dataouput){
                        $("#msg").html(dataouput);
                        $("#postpaymentbtn").html('Post Payment');
                        // location.reload();
                        
                        var institution = $('#feeinstitution').val();
                        var session = $("#session").val();
                        var faculty = $("#faculty").val();
                        var classid = $("#class").val();
                        var termid = $("#term").val();
                        var student = $("#student").val();
                        
                        var dataString = 'institution='+ institution + '&termid='+ termid + '&classid='+ classid + '&session='+ session + '&faculty='+ faculty + '&student='+ student;
                        
                        $.ajax({
                            type : 'post',
                            url: "../controller/scripts/owner/getstudfeeinfo.php",
                            data :  dataString,
                            success : function(result)
                            {
                                $("#body").html(result);
                                
                                $("#msg").html(dataouput);
                            }
                        });
                      
                    }
                });

            }
            
        });

        
        $("body").on("click","#postotherpaymentbtn",function(){
                                        
            $("#postotherpaymentbtn").html('<i class="fa fa-spinner fa-spin"></i> Post Payment');
            
            var subcatid = [];
           
            
            var amount = [];
            $.each($(".norms"), function(){
                amount.push($(this).val());
                 subcatid.push($(this).data('id'));
            });
            
            console.log(amount);
            
            console.log(subcatid);
            
            var institution = $('#institution').val();
            var userid = "<?php echo $UserID; ?>";
            var usertype = "<?php echo $userType; ?>";
            var depositorrecipientname = $("#depositorrecipientname").val();
            var session = $("#othersession").val();
            var mop = $("#mop").val();
            var category = $("#othercategory").val();
            var termid = $("#otherterm").val();
            var student = $("#student").val();
            
            var formData = new FormData();
            var popayment = $('#popayment')[0].files[0];
            formData.append('popayment', popayment);
            formData.append('institution', institution);
            formData.append('userid', userid);
            formData.append('usertype', usertype);
            formData.append('depositorrecipientname', depositorrecipientname);
            formData.append('session', session);
            formData.append('mop', mop);
            formData.append('subcatid', subcatid);
            formData.append('amount', amount);
            formData.append('termid', termid);
            formData.append('category', category);
            
            if(amount == '' || amount == ',')
            {
                $("#postotherpaymentbtn").html('Post Payment');
                $("#msg").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Please Input Amount</center></div>');
            }
            else
            {
                
                $.ajax({
                    type: "POST",
                    url: "../controller/scripts/owner/Insert-otherpaymenttrans.php",
                    method:'POST',
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    
                    success: function(result){
                        $("#msg").html(result);
                        $("#postotherpaymentbtn").html('Post Payment');
                        
                    }
                });

            }
            
        });
    </script>
</body>

</html>
