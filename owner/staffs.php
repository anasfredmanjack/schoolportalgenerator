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
        <title>Staff | <?php echo $fullname; ?></title>
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
                <div class="col-md-7 align-self-center">
                    <h2 class="text-themecolor" style="color: black; font-weight: 400;">Staffs</h2>
                </div>
                <div class="col-md-2 align-self-center" style="margin-bottom: -20px;">
                    
                </div>
                <div class="col-md-1 align-self-center">
                    
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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        
                    </div>
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        
                    </div>
                    <div class="col-lg-3 col-md-6">
                        
                    </div>
                    <!-- Column -->

                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <!-- Row -->
                                <div class="row">
                                    <div class="col-12">
                                        <h2 style="float: right; margin-top: 5px; color: #18C853;" class="m-b-0"><i class="fa fa-group"></i></h2>
                                        <h3 class="" id="totalno" style="color: #18C853;"></h3>
                                        <h6 class="card-subtitle" style="color: #18C853;">Total Number of staff</h6>
                                    </div>
                                    <div class="col-12">
                                        <div class="progress">
                                            <div class="progress-bar" role="progressbar" style="width: 80%; height: 6px; background-color: #18C853;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>
                
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                
                <div class="row">
                    <div class="col-12">
                            
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title" style="color: red;">Staff List</h4>
                                <h6 class="card-subtitle">Full list of Institutions/Schools Staffs</h6>
                                <div id="spinner"></div>

                                <div class="table-responsive m-t-40">
                                    
                                    <div class="table-reponsive">

                                    <table id="fetch-data" class="table m-t-30 table-hover no-wrap contact-list table-striped example23" style="font-size: 14px;">
                                
                                    
                                    </table>

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
        $(document).ready(function(){
            $('#fetch-data').html('<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div</div>');
            var selInstID = $(this).children("option:selected").val();
            var ownerID = $("#ownerID").val();
            var dataString = 'selInstID='+ selInstID+ '&ownerID='+ ownerID;

            //alert(ownerID);
            $.ajax({
                type : 'post',
                url : "../controller/scripts/owner/fullstafflist.php", //Here you will fetch records 
                data :  dataString, //Pass $id
                success : function(data){
                $('#fetch-data').html(data);//Show fetched data from database
                    //alert(data);
                }
            }); 

            $.ajax({
                type : 'post',
                url : "../controller/scripts/owner/get-totnumstaff.php",
                data :  dataString,
                success : function(data)
                {
                    $('#totalno').html(data);//Show fetched data from database
                        //alert(dataString);
                }
            });
        });
        $("body").on("change", "#institution", function(){
            $('#spinner').html('<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');
            var selInstID = $(this).children("option:selected").val();
            var ownerID = $("#ownerID").val();
            var dataString = 'selInstID='+ selInstID+ '&ownerID='+ ownerID;

            //alert(selInstID);

            if(selInstID == '0')
            {
                $.ajax({
                    type : 'post',
                    url : "../controller/scripts/owner/fullstafflist.php", //Here you will fetch records 
                    data :  dataString, //Pass $id
                    success : function(data){
                    $('#fetch-data').html(data);//Show fetched data from database
                    $('#spinner').html('');
                        //alert(data);
                    }
                }); 
                $.ajax({
                    type : 'post',
                    url : "../controller/scripts/owner/get-totnumstaff.php",
                    data :  dataString,
                    success : function(data)
                    {
                        $('#totalno').html(data);//Show fetched data from database
                        $('#spinner').html('');
                            //alert(dataString);
                    }
                });
            }
            else
            {
                $.ajax({
                    type : 'post',
                    url : "../controller/scripts/owner/get-stafflistcount.php",
                    data :  dataString,
                    success : function(data)
                    {
                        $('#fetch-data').html(data);//Show fetched data from database
                        $('#spinner').html('');
                            //alert(dataString);
                    }
                });
                $.ajax({
                    type : 'post',
                    url : "../controller/scripts/owner/get-totalnumstaff.php",
                    data :  dataString,
                    success : function(data)
                    {
                        $('#totalno').html(data);//Show fetched data from database
                        $('#spinner').html('');
                            //alert(dataString);
                    }
                });
                
            }
        });
        
    </script>
</body>

</html>
