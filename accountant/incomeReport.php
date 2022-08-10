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
    <title>Income Fee Configuration | <?php echo $PrimaryName.' '.$SecondaryName; ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="../library/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="../library/plugins/morrisjs/morris.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/style-accountant.php" rel="stylesheet">
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
            
            </div>
          </nav>
        <!-- End Sidebar navigation -->
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper" style="margin-top: -60px;">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-3 align-self-center">
                    <h2 class="text-themecolor" style="color: black; font-weight: 400;">Charge Structure</h2>
                </div>
                <div class="col-sm-2 align-self-center" style="margin-bottom: -20px;">
                    <form>
                        <div class="form-group">
                            <select class="form-control chimaPrimaryBorderColor" style="background: white; border-width: 1px; border-style: solid; font-size: 14px;">
                                <option disabled selected>Schools</option>                              
                            </select>
                        </div>
                    </form>
                </div>
                
                <div class="col-sm-2 align-self-center" style="margin-bottom: -20px;">
                    <form>
                        <div class="form-group">
                            <select class="form-control chimaPrimaryBorderColor" style="background: white; border-width: 1px; border-style: solid; font-size: 14px;">
                                <option disabled selected>Class</option>                              
                            </select>
                        </div>
                    </form>
                </div>
                <div class="col-sm-2 align-self-center" style="margin-bottom: -20px;">
                    <form>
                        <div class="form-group">
                            <select class="form-control chimaPrimaryBorderColor" style="background: white; border-width: 1px; border-style: solid; font-size: 14px;">
                                <option disabled selected>Session</option>                              
                            </select>
                        </div>
                    </form>
                </div>
                <div class="col-sm-2 align-self-center" style="margin-bottom: -20px;">
                    <form>
                        <div class="form-group">
                            <select class="form-control chimaPrimaryBorderColor" style="background: white; border-width: 1px; border-style: solid; font-size: 14px;">
                                <option disabled selected>Term/Semester</option>                              
                            </select>
                        </div>
                    </form>
                </div>
                <div class="col-sm-1 align-self-center">
                    <a href="#" type="button" class="btn chimaNormalBtn" style="width: 80px;">
                        <span style="font-size: 13px;">Load</span>
                    </a>
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
                    <div class="col-12">
                            
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title" style="color: red;">The Charge Structure of JSS 1</h4>
                                <h6 class="card-subtitle">The full Charge Structure of JSS 1</h6>

                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="table m-t-30 table-hover no-wrap contact-list table-striped">                                        
                                        <thead>
                                            <tr>
                                                <th style="font-weight: 700;">ID#</th>
                                                <th style="font-weight: 700;">Term</th>
                                                <th style="font-weight: 700;">Title</th>
                                                <th style="font-weight: 700;">Amount</th>
                                                <th style="font-weight: 700;">Action</th>
                                            </tr>
                                              <!--========================================================================================-->
                                                <!--========================================================================================-->
                                                <!--========================================================================================-->
                                                <!--==== Delete Modal==== -->
                                                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <div style="margin-left: 50%;"><i style="color: red;" class="fa fa-times fa-2x" ></i></div>
                                        
                                                            </div>
                                    
                                                            <div class="modal-body" align="Center">
                                                                <p>Are you sure you want to delete this<br>Charge. <br>Note that this action cannot be reversed</p>
                                                            </div>

                                                            <div align="Center" style="margin-bottom: 40px;">
                                                                <button type="button" class="btn chimaProceedBtn">Proceed</button>
                                                                <button type="button" class="btn chimaCancelBtn" data-dismiss="modal">Cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <!--==== Delete Modal==== -->
                                            <!--========================================================================================-->
                                            <!--========================================================================================-->
                                            <!--========================================================================================-->

                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>01</td>
                                                <td>1st Term</td>
                                                <td>School Fees</td>
                                                <td>#70,000</td>
                                                <td>
                                                    <a href="#" data-toggle="modal" data-target="#deleteModal">
                                                        <i class="fa fa-trash-o" style="color: red; margin-left: 20px;" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>02</td>
                                                <td>1st Term</td>
                                                <td>Books</td>
                                                <td>#30,000</td>
                                                <td>
                                                    <a href="#" data-toggle="modal" data-target="#deleteModal">
                                                        <i class="fa fa-trash-o" style="color: red; margin-left: 20px;" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>03</td>
                                                <td>1st Term</td>
                                                <td>School Bus</td>
                                                <td>#10,000</td>
                                                <td>
                                                    <a href="#" data-toggle="modal" data-target="#deleteModal">
                                                        <i class="fa fa-trash-o" style="color: red; margin-left: 20px;" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>04</td>
                                                <td>1st Term</td>
                                                <td>Medical Fee</td>
                                                <td>#30,000</td>
                                                <td>
                                                    <a href="#" data-toggle="modal" data-target="#deleteModal">
                                                        <i class="fa fa-trash-o" style="color: red; margin-left: 20px;" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>05</td>
                                                <td>1st Term</td>
                                                <td>Uniform(New Student)</td>
                                                <td>#20,000</td>
                                                <td>
                                                    <a href="#" data-toggle="modal" data-target="#deleteModal">
                                                        <i class="fa fa-trash-o" style="color: red; margin-left: 20px;" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>06</td>
                                                <td>1st Term</td>
                                                <td>Sport Wear</td>
                                                <td>#5,000</td>
                                                <td>
                                                    <a href="#" data-toggle="modal" data-target="#deleteModal">
                                                        <i class="fa fa-trash-o" style="color: red; margin-left: 20px;" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>07</td>
                                                <td>1st Term</td>
                                                <td>P.T.A Levy</td>
                                                <td>#5,000</td>
                                                <td>
                                                    <a href="#" data-toggle="modal" data-target="#deleteModal">
                                                        <i class="fa fa-trash-o" style="color: red; margin-left: 20px;" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                            
                                           
                                        
                                        </tbody>
                                    </table>
                                </div>
                                <!--Right sidebar-->

                                <div class="right-sidebar">
                                    <div class="slimscrollright">
                                        <div class="rpanel-title">School Accountant Documentation<span><i class="ti-close right-side-toggle"></i></span> </div>
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
                                                        <span style="margin-left: 5px;">Profile</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="documentation.html" class="chimaTextPrimary">
                                                        <i class="fa fa-folder"></i>
                                                        <span style="margin-left: 5px;">Charges</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="documentation.html" class="chimaTextPrimary">
                                                        <i class="fa fa-folder"></i>
                                                        <span style="margin-left: 5px;">Payments</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="documentation.html" class="chimaTextPrimary">
                                                        <i class="fa fa-folder"></i>
                                                        <span style="margin-left: 5px;">Income & Expenditure</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="documentation.html" class="chimaTextPrimary">
                                                        <i class="fa fa-folder"></i>
                                                        <span style="margin-left: 5px;">School Staff</span>
                                                    </a>
                                                </li>
                                               
                                            
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!--Right sidebar-->
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
</body>

</html>
