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
        <title>Stock Suppliers | <?php echo $fullname; ?></title>
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
                <div class="col-sm-7 align-self-center">
                    <h2 class="text-themecolor" style="color: black; font-weight: 400;">Suppliers</h2>
                </div>
                <div class="col-sm-4 align-self-center" style="margin-bottom: -20px;">
                    <form>
                        <div class="form-group">
                                
                                <?php 
                                $sqlGetInstDetails = ("SELECT * FROM `institution` WHERE AgencyOrSchoolOwnerID = '$AgencyOrSchoolOwnerID'");
                                $resultGetInstDetails = mysqli_query($link, $sqlGetInstDetails);
                                $rowGetInstDetails = mysqli_fetch_assoc($resultGetInstDetails);
                                $row_cntGetInstDetails = mysqli_num_rows($resultGetInstDetails);
            
                                ?>
                                <select class="form-control chimaPrimaryBorderColor" id="institution" style="background: white; border-width: 1px; border-style: solid; font-size: 14px;">
                                <option value="0" selected>Schools/Institutions</option>

                                <?php
                                    if($row_cntGetInstDetails > 0)
                                    {
                                
                                        do{

                                ?>
                                        <option value="<?php echo $rowGetInstDetails['InstitutionID'] ; ?>"> <?php echo $rowGetInstDetails['InstitutionName'] ; ?></option>
                                    
                                <?php
                                        }while($rowGetInstDetails = mysqli_fetch_assoc($resultGetInstDetails));
                                    }
                                ?>
                            </select>
                        </div>
                    </form>
                </div> 
                
                <div class="col-sm-1 align-self-center">
                    <a id="loadStudinSchl" href="#" type="button" class="btn chimaNormalBtn" style="width: 80px;">
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
                                <h4 class="card-title" style="color: red;">Supplier Lists</h4>
                                <h6 class="card-subtitle">Full list of Suppliers in all Institution/Schools</h6>

                                <div class="row m-t-40" style="margin: 30px;">
                                    <!-- Column -->
                                    <!-- <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="card">
                                            <div align="Center" class="card-body analytics-info">
                                                <h2 class="counter text-purple" id="totnumStud"></h2>
                                                <span class="text-right">
                                                    <span style="color: black; font-size: 14px; font-weight: 600;">Total No. of Stock Items</span>
                                                    <i class="ti-arrow-up text-purple"></i> 
                                                    <span class="counter text-purple" id="totnumStud2"></span>
                                                </span>
                                                <p></p>
                                                <div id="sparklinedash2" style="margin-bottom: 25px;"></div>
                                            </div>
                                        </div>
                                    </div> -->
                                    
                                    <!-- Column -->
                                    <!-- <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="card">
                                            <div align="Center" class="card-body analytics-info">
                                                <h2 class="counter text-success" id="IssuedCount1"></h2>
                                                <span class="text-right">
                                                    <span style="color: black; font-size: 14px; font-weight: 600;">Total No. of Stocks <br>(Available)</span>
                                                    <i class="ti-arrow-up text-success"></i> 
                                                    <span class="counter text-success" id="IssuedCount2"></span>
                                                </span>
                                                <p></p>
                                                <div id="sparklinedash"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="card">
                                            <div align="Center" class="card-body analytics-info">
                                                <h2 class="counter text-danger" id="NoIssuedCount1"></h2>
                                                <span class="text-right">
                                                    <span style="color: black; font-size: 14px; font-weight: 600;">Total No. of Stocks <br>(Finished)</span>
                                                    <i class="ti-arrow-up text-danger"></i> 
                                                    <span class="counter text-danger" id="NoIssuedCount1"></span>
                                                </span>
                                                <p></p>
                                                <div id="sparklinedash4" ></div>
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- Column -->
                                </div>
                                <div id="spinner"></div>
                                
                                <!-- Preview Supplier Modal -->
                                <div class="modal fade" id="previewSupplierModal" tabindex="-1" role="dialog" aria-labelledby="previewSupplierModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="previewSupplierModalLabel"><i class="fa fa-eye"></i> Preview Supplier</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                </button>
                                            </div>
                                            <div class="modal-body" id="previewSupplierModalOutput">
                                                <div align="center"><img src="../img/preloader.gif" /></div>
                                            </div>

                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.Preview Supplier Modal -->
                                <div class="table-responsive m-t-40">
                                    <table id="myStockItemsTable" class="table m-t-30 table-hover no-wrap contact-list table-striped" style="font-size: 15px;">                                        
                                        <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>School Institutions</th>
                                                <th>Photo/Logo</th>
                                                <th>Supplier Name</th>
                                                <th>Phone</th>
                                                <th>Preview</th>                                                                             
                                                <th>History</th> 
                                            </tr>
                                        </thead>
                                        <tbody id="table-Data">
                                    
                                        </tbody>
                                    </table>
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
    <script>

        // on doc ready
        $(document).ready(function(){

            $('#table-Data').html('<tr><td style="color: #FF2B2B" align="center" colspan="12"> Please Select Institution Before Proceeding...</td></tr>');

        });

         

        $("#loadStudinSchl").click(function(){
            
            $('#loadStudinSchl').html('<i class="fa fa-spinner fa-spin"></i>');
            
            var inst = $('#institution').val(); 
            
            var ownerid = "<?php echo $AgencyOrSchoolOwnerID ; ?>"

            var dataString = 'InstitutionID=' + inst + '&ownerid=' + ownerid;

            if(inst == '0' || inst == "")
            {
                $('#loadStudinSchl').html('Load');
                
                $('#table-Data').html('<tr><td style="color: #FF2B2B" align="center" colspan="8"> Please Select Institution </td></tr>');

            } 
            else 
            {
                $('#spinner').html('<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');
                 
                if(inst != '0')
                {
                    $.ajax({
                        type : 'post',
                        url : '../controller/scripts/owner/loadSupplierOwner.php', //Here you will fetch records
                        data :  dataString, //Pass $id
                        success : function(data){
                            $('#table-Data').html(data);//Show fetched data from database
                            $('#loadStudinSchl').html('Load');
                            $('#spinner').html('');
                            $('#myStockItemsTable').DataTable();  
                        }
                    });
                    $("#previewSupplierModal").on('show.bs.modal', function (e) {
                        var rowid =  $(e.relatedTarget).data('id');
                        var InstitutionID = inst;

                        $("#previewSupplierModalOutput").html('<div style="margin: 0 auto;"><img src="../img/preloader.gif" /></div>');
                        $.ajax({
                            type: "POST",
                            url: "../controller/scripts/storekeeper/loadSupplierPreviewModal.php",
                            data: 'SupplierID='+ rowid+'&InstitutionID='+InstitutionID,
                            success: function(result) {
                                $("#previewSupplierModalOutput").html(result);
                            }
                        });
                    });
                }           
                                 
            }

        });
 
        </script>

</body>

</html>
