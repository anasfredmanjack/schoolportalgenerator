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
    <title>Fee Drive | <?php echo $PrimaryName.' '.$SecondaryName; ?></title>
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
        <div class="page-wrapper" >
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-sm-2 align-self-center">
                    <h2 class="text-themecolor" style="color: black; font-weight: 400;">Fee Drive</h2>
                </div>
                
                <div class="col-sm-2 align-self-center" style="margin-bottom: -20px;">
                    <form>
                        <div class="form-group">
                            <select  class="form-control chimaPrimaryBorderColor" id="session" style="background: white; border-width: 1px; border-style: solid; font-size: 14px;">
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
                <div class="col-sm-2 align-self-center" style="margin-bottom: -20px;">
                    <form>
                        <div class="form-group" id="hidefac">
                            <select  class="form-control chimaPrimaryBorderColor" id="sunnygrade" style="background: white; border-width: 1px; border-style: solid; font-size: 14px;">
                                <option value = "0" selected>Grade/Faculty</option>
                                <?php  
                                    $sqlGetfacultyorschool = ("SELECT * FROM `facultyorschool` WHERE `InstitutionID`='$InstitutionID'");
                                    $resultGetfacultyorschool = mysqli_query($link, $sqlGetfacultyorschool);
                                    $rowGetfacultyorschool = mysqli_fetch_assoc($resultGetfacultyorschool);
                                    $row_cntGetfacultyorschool = mysqli_num_rows($resultGetfacultyorschool);
                                    
                                    do{
                                        echo '<option value="' . $rowGetfacultyorschool['FacultyOrSchoolID']. '"> ' . $rowGetfacultyorschool['FacultyOrSchoolName'] . '</option>';
                                
                                    }while($rowGetfacultyorschool = mysqli_fetch_assoc($resultGetfacultyorschool));
                                ?>
                            </select>
                        </div>
                    </form>
                </div>
                <div class="col-sm-2 align-self-center" style="margin-bottom: -20px;">
                    <form>
                        <div class="form-group">
                            <select  class="form-control chimaPrimaryBorderColor" id="class" style="background: white; border-width: 1px; border-style: solid; font-size: 14px;">
                            <option value = "0" selected>Class</option>
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
                    </form>
                </div>
                <div class="col-sm-1 align-self-center" style="margin-bottom: -20px;">
                    <form>
                        <div class="form-group">
                            <select  class="form-control chimaPrimaryBorderColor" id="term" style="background: white; border-width: 1px; border-style: solid; font-size: 14px;">
                            <option value = "0" selected>Term</option>
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
                <div class="col-sm-2 align-self-center" style="margin-bottom: -20px;">
                    <form>
                        <div class="form-group">
                            <select  class="form-control chimaPrimaryBorderColor" id="status" style="background: white; border-width: 1px; border-style: solid; font-size: 14px;">
                                <option value="0" selected>Status</option>
                                <option value="3">Paid</option>
                                <option value="1">Outstanding</option>
                                <option value="2">Not Paid</option>
                                
                            </select>
                        </div>
                    </form>
                </div>
                
                <div class="col-sm-1 align-self-center">
                    <a id="loadfeedrivebtn" href="#" type="button" class="btn chimaNormalBtn" style="width: 80px;">
                        <span style="font-size: 13px;">Load</span>
                    </a>
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
            <div class="container-fluid">
                
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                            
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title" style="color: red;">Fee Drive</h4>
                                <h6 class="card-subtitle">Full list of Students and their Payment Status</h6>

                                <div class="row m-t-40" style="margin: 30px;" id="table-Datasum">
                                    <!-- Column -->
                                    
                                    
                                </div>
                                <div id="spinner"></div>
                                <div class="table-responsive m-t-40" id="table-Data">
                                    
                                </div>
                            </div>
                        </div>
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
            <!-- .right-sidebar -->
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
    <script>
        $(document).ready(function(){
            
            $("#table-Data").html('<center><i class="fa fa-spinner fa-spin" style="font-size:30px;"></i></center>');
            var institution = "<?php echo $InstitutionID; ?>"
            $.ajax({
                type : 'post',
                url: "../controller/scripts/accountant/getsumfeedrivelistall.php",
                data :  'institution=' + institution,
                success : function(result)
                {
                    $("#table-Datasum").html(result);

                }
            });
            $.ajax({
                type : 'post',
                url: "../controller/scripts/accountant/getfeedrivelistall.php",
                data :  'institution=' + institution,
                success : function(result)
                {
                    $("#table-Data").html(result);

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
                            'pdf', 'print'
                        ]
                    });
                    
                }
            });
        });

        $("body").on("change", "#sunnygrade", function(){
            
            var sunnygrade = $('#sunnygrade').val();
            var institution = "<?php echo $InstitutionID; ?>";

            var dataString = 'sunnygrade=' + sunnygrade + '&institution=' + institution;

            // alert(dataString);
            
            $.ajax({
                type : 'post',
                url: "../controller/scripts/accountant/getfeedriveclassdplist.php",
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

        });

        $("body").on("click", "#loadfeedrivebtn", function(){
            $('#loadfeedrivebtn').html('<i class="fa fa-spinner fa-spin"></i>');
            $("#table-Data").html('<center><i class="fa fa-spinner fa-spin" style="font-size:30px;"></i></center>');

            var classid = $('#class').val();
            var session = $('#session').val();
            var status = $('#status').val();
            var term = $('#term').val();
            var institution = "<?php echo $InstitutionID; ?>";

            var dataString = 'term=' + term + '&status=' + status + '&session=' + session + '&classid=' + classid + '&institution=' + institution;

            // alert(dataString);
            
            $.ajax({
                type : 'post',
                url: "../controller/scripts/accountant/getfeedrivelist.php",
                data :  dataString,
                success : function(result)
                {
                    $('#loadfeedrivebtn').html('Load');
                    $("#table-Data").html(result);

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
                            'pdf', 'print'
                        ]
                    });
                }
            });

            $.ajax({
                type : 'post',
                url: "../controller/scripts/accountant/getsumfeedrivelist.php",
                data :  dataString,
                success : function(result)
                {
                    $("#table-Datasum").html(result);

                }
            });
        });

    </script>
</body>

</html>
