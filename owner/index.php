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
    <title>Dashboad | <?php echo $fullname; ?></title>
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
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                               
        <?php include ('../includes/menu-owner.php'); ?>
            </div>
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
                    <h2 class="text-themecolor" style="color: black; font-weight: 500;">School Owner Dashboard</h2>
                </div>
                <div class="col-md-2 align-self-center" style="margin-bottom: -20px;">
                    <form>
                        <div class="form-group">
                            
                                <?php 
                                $sqlGetInstDetails = ("SELECT * FROM `institution` WHERE AgencyOrSchoolOwnerID = '$UserID'");
                                $resultGetInstDetails = mysqli_query($link, $sqlGetInstDetails);
                                $rowGetInstDetails = mysqli_fetch_assoc($resultGetInstDetails);
                                $row_cntGetInstDetails = mysqli_num_rows($resultGetInstDetails);
             
                                ?>
                                <input id="ownerID" type="hidden" value="<?php echo $UserID ; ?>">
                                <select class="form-control chimaPrimaryBorderColor" id="institution" style="background: white; border-width: 1px; border-style: solid; font-size: 14px;">
                                <option value="0" selected>Schools/Institutions</option>

                                <?php
                                    if($row_cntGetInstDetails > 0)
                                    {
                                
                                        do{

                                ?>
                                        <option value="<?php echo $rowGetInstDetails['InstitutionID'] ; ?>"><?php echo $rowGetInstDetails['InstitutionName'] ; ?></option>
                                       
                                <?php
                                        }while($rowGetInstDetails = mysqli_fetch_assoc($resultGetInstDetails));
                                    }
                                ?>
                            </select>
                        </div>
                    </form>
                </div>
            <!--    <div class="">
                    <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                </div>-->
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid" id="sunnyoutput">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->

                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <!-- Row -->
                                <div class="row">
                                    <div class="col-12" id="sunnystudforschl">
                                        <?php
                                        
                                            $sqlstud = ("SELECT DISTINCT(StudentID), institution.AgencyOrSchoolOwnerID AS AgencyOrSchoolOwner_ID, institution.InstitutionID AS Institution_ID, student.StudentID AS student_ID FROM institution,agencyorschoolowner,student WHERE institution.AgencyOrSchoolOwnerID = '$AgencyOrSchoolOwnerID' AND student.InstitutionID=institution.InstitutionID");
                                            $resultstud = mysqli_query($link, $sqlstud);
                                            $rowGetstud = mysqli_fetch_assoc($resultstud);
                                            $row_cntstud = mysqli_num_rows($resultstud);
                                        
                                        ?>
                                        
                                        <h2 style="float: right; margin-top: 5px; color: #0FAE3F;" class="m-b-0"><i class="fa fa-group"></i></h2>
                                        <h3 class="" style="color: #0FAE3F;">+<?php echo $row_cntstud;?></h3>
                                        <h6 class="card-subtitle" style="color: #0FAE3F;">Students</h6></div>
                                    <div class="col-12">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo $row_cntstud;?>%; height: 6px; background-color: #0FAE3F;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <!-- Row -->
                                <div class="row">
                                    <div class="col-12">
                                        <?php
                                        
                                            $sqlstaff = ("SELECT DISTINCT(StaffID), institution.AgencyOrSchoolOwnerID AS AgencyOrSchoolOwner_ID, institution.InstitutionID AS Institution_ID, staff.StaffID AS staff_ID FROM institution,agencyorschoolowner,staff WHERE institution.AgencyOrSchoolOwnerID = '$AgencyOrSchoolOwnerID' AND staff.InstitutionID=institution.InstitutionID");
                                            $resultstaff = mysqli_query($link, $sqlstaff);
                                            $rowGetstaff = mysqli_fetch_assoc($resultstaff);
                                            $row_cntstaff = mysqli_num_rows($resultstaff);
                                        
                                        ?>
                                        
                                        <h2 style="float: right; margin-top: 5px; color: #ff8585;" class="m-b-0"><i class="fa fa-group"></i></h2>
                                        <h3 class="" style="color: #ff8585;">+<?php echo $row_cntstaff;?></h3>
                                        <h6 class="card-subtitle" style="color: #ff8585;">Staff</h6></div>
                                    <div class="col-12">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?php echo $row_cntstaff;?>%; height: 6px; background-color: #ff8585;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <!-- Row -->
                                <div class="row">
                                    <div class="col-12">
                                        <h2 style="float: right; margin-top: 5px; color: #18C853;" class="m-b-0"><i class="fa fa-money"></i></h2>
                                        <h3 class="" style="color: #18C853;">0</h3>
                                        <h6 class="card-subtitle" style="color: #18C853;">Income</h6></div>
                                    <div class="col-12">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 1%; height: 6px; background-color: #18C853;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                     <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <!-- Row -->
                                <div class="row">
                                    <div class="col-12">
                                        <h2 style="float: right; margin-top: 5px; color: #FE903E;" class="m-b-0"><i class="fa fa-money"></i></h2>
                                        <h3 class="" style="color: #FE903E;">0</h3>
                                        <h6 class="card-subtitle" style="color: #FE903E;">Expenses</h6></div>
                                    <div class="col-12">
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 1%; height: 6px; background-color: #FE903E;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>

                <div class="row">
                    <!-- column -->
                    <!-- column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <h4 class="card-title" style="color: black;">AGENCIES/SCHOOL OWNERS OVERVIEW</h4>
                                </div>
                                <ul class="list-inline text-center m-t-40">
                                    <li>
                                        <h5><span class="dott"></span> Income</h5>
                                    </li>
                                    <li>
                                        <h5><span class="dottt"></span> Expenses</h5>
                                    </li>
                                </ul>
                                <p>Amount</p>
                                <div id="sunnychart" width="400" height="300"></div>
                                <h5 align="center" class="card-title">Session</h5>
                                    
                            </div>
                        </div>
                    </div>
                    <!-- column -->
                </div>

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
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
             
             
            Morris.Area({
                element: 'sunnychart',
                data: [{
                    session: '2010',
                    Income: 0,
                    Expenses: 0,
                    
                },{
                    session: '2012',
                    Income: 130,
                    Expenses: 100,
                    
                }],
                xkey: 'session',
                ykeys: ['Income', 'Expenses'],
                labels: ['Income', 'Expenses'],
                pointSize: 0,
                fillOpacity: 0.6,
                pointStrokeColors:['#b4becb', '#01c0c8'],
                behaveLikeLine: true,
                gridLineColor: '#e0e0e0',
                lineWidth: 0,
                smooth: true,
                hideHover: 'auto',
                lineColors: ['#b4becb', '#01c0c8'],
                resize: true
                
            });
             
        });
        
        
        $("#institution").change(function(){
            //alert('working'); 
            
            var instID = $(this).children("option:selected").val();
            var UserID = "<?php echo $AgencyOrSchoolOwnerID; ?>";
            
            var dataString = 'instID=' + instID + '&UserID=' + UserID;
            
            //alert(dataString);
            
            if(instID == '0')
            {
                $.ajax({
                    type : 'post',
                    url: "../controller/scripts/owner/viewalldashboard.php",
                    data :  dataString,
                    success : function(result)
                    {
                        $('#sunnyoutput').html(result);
                        
                        Morris.Area({
                            element: 'sunnychart',
                            data: [{
                                session: '2010',
                                Income: 0,
                                Expenses: 0,
                                
                            }, {
                                session: '2011',
                                Income: 130,
                                Expenses: 100,
                                
                            }],
                            xkey: 'session',
                            ykeys: ['Income', 'Expenses'],
                            labels: ['Income', 'Expenses'],
                            pointSize: 0,
                            fillOpacity: 0.6,
                            pointStrokeColors:['#b4becb', '#01c0c8'],
                            behaveLikeLine: true,
                            gridLineColor: '#e0e0e0',
                            lineWidth: 0,
                            smooth: true,
                            hideHover: 'auto',
                            lineColors: ['#b4becb', '#01c0c8'],
                            resize: true
                            
                        });
                        
                    }
                
                });
                
                // $.ajax({
                //     type : 'post',
                //     url: "../controller/scripts/owner/viewalldashboardgraph.php",
                //     data :  dataString,
                //     success : function(result)
                //     {
                //         $('#sunnyoutput').html(result);
                        
                //         Morris.Area({
                //             element: 'sunnychart',
                //             data: [{
                //                 session: '2010',
                //                 Income: 0,
                //                 Expenses: 0,
                                
                //             }, {
                //                 session: '2011',
                //                 Income: 130,
                //                 Expenses: 100,
                                
                //             }],
                //             xkey: 'session',
                //             ykeys: ['Income', 'Expenses'],
                //             labels: ['Income', 'Expenses'],
                //             pointSize: 0,
                //             fillOpacity: 0.6,
                //             pointStrokeColors:['#b4becb', '#01c0c8'],
                //             behaveLikeLine: true,
                //             gridLineColor: '#e0e0e0',
                //             lineWidth: 0,
                //             smooth: true,
                //             hideHover: 'auto',
                //             lineColors: ['#b4becb', '#01c0c8'],
                //             resize: true
                            
                //         });
                        
                //     }
                
                // });
            }
            else
            {
                $.ajax({
                    type : 'post',
                    url: "../controller/scripts/owner/viewdashboard.php",
                    data :  dataString,
                    success : function(result)
                    {
                        $('#sunnyoutput').html(result);
                        
                        Morris.Area({
                            element: 'sunnychart1',
                            data: [{
                                session: '2010',
                                Income: 0,
                                Expenses: 0,
                                
                            },{
                                session: '2011',
                                Income: 100,
                                Expenses: 400,
                                
                            },  {
                                session: '2012',
                                Income: 130,
                                Expenses: 100,
                                
                            }],
                            xkey: 'session',
                            ykeys: ['Income', 'Expenses'],
                            labels: ['Income', 'Expenses'],
                            pointSize: 0,
                            fillOpacity: 0.4,
                            pointStrokeColors:['#b4becb', '#01c0c8'],
                            behaveLikeLine: true,
                            gridLineColor: '#e0e0e0',
                            lineWidth: 0,
                            smooth: true,
                            hideHover: 'auto',
                            lineColors: ['#b4becb', '#01c0c8'],
                            resize: true
                            
                        });
                    }
                
                });
                
                // $.ajax({
                //     type : 'post',
                //     url: "../controller/scripts/owner/viewdashboardgraph.php",
                //     data :  dataString,
                //     success : function(result)
                //     {
                //         $('#sunnyclass').html(result);
                        
                //         Morris.Area({
                //             element: 'sunnychart1',
                //             data: [{
                //                 session: '2010',
                //                 Income: 0,
                //                 Expenses: 0,
                                
                //             },{
                //                 session: '2011',
                //                 Income: 100,
                //                 Expenses: 400,
                                
                //             },  {
                //                 session: '2011',
                //                 Income: 130,
                //                 Expenses: 100,
                                
                //             }],
                //             xkey: 'session',
                //             ykeys: ['Income', 'Expenses'],
                //             labels: ['Income', 'Expenses'],
                //             pointSize: 0,
                //             fillOpacity: 0.4,
                //             pointStrokeColors:['#b4becb', '#01c0c8'],
                //             behaveLikeLine: true,
                //             gridLineColor: '#e0e0e0',
                //             lineWidth: 0,
                //             smooth: true,
                //             hideHover: 'auto',
                //             lineColors: ['#b4becb', '#01c0c8'],
                //             resize: true
                            
                //         });
                //     }
                
                // });
            }
            
            
        });
     </script>
     

</body>

</html>
