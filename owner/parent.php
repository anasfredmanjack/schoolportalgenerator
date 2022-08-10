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
    <title>Parents | <?php echo $fullname; ?></title>
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
                <div class="col-sm-3 align-self-center">
                    <h2 class="text-themecolor" style="color: black; font-weight: 400;">Parents</h2>
                
                </div>
                <div class="col-sm-2 align-self-center" style="margin-bottom: -20px;">
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
               
                <div class="col-sm-1 align-self-center">
                <button type="button" id="loadfilterbutton" class="btn chimaNormalBtn" style="width: 80px;">
                        <span style="font-size: 13px;" >Load</span>
                            </button>
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
                                <h4 class="card-title" style="color: red;">Parents List</h4>
                                <h6 class="card-subtitle">Full list of Parents in all Institution/Schools</h6>

                                
                                <div class="table-responsive m-t-40">
                                <table class="table m-t-30 table-hover no-wrap contact-list table-striped">
                                                                            
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Name</th>
                                                                                    <th>Role</th>
                                                                                    <th>Username</th>
                                                                                    <th>Password</th>
                                                                                    <th>Email</th>
                                                                                    <th>Contact Number</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody id="loadparentdata">





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
                 'csv', 'pdf', 'print'
            ]
        });

///==========loadtabledata============================
$(document).ready(function(){
    var owneridvar = "<?php echo $AgencyOrSchoolOwnerID;?>";
    $('#loadparentdata').html('<i class="fa fa-circle-o-notch fa-spin"></i>..loading');
            $.ajax({

        method:'post',
        url:'../controller/scripts/owner/loadownerparenttable.php',
        data:'owneridvar='+ owneridvar,
        success: function(loaddata){
    $('#loadparentdata').html(loaddata);

        }

        });


});


//====================================================




        //=============handle institution change========================
$("#selinstitution").change(function(){
   var selectedinstitution = $("#selinstitution").val();
  

   $("#selschool").html('<option>Waiting</option>');
    $.ajax({

    method:'post',
    url:'../controller/scripts/owner/loadschoolforparentfilter.php',
    data:'selectedinstitution='+ selectedinstitution,
    success: function(institutiondata){
    $("#selschool").html(institutiondata);
    var selectedschool = $("#selschool").val();
    $("#classid").html('<option>Waiting</option>');
                $.ajax({

                method:'post',
                url:'../controller/scripts/owner/loadclassforparentfilter.php',
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
                url:'../controller/scripts/owner/loadclassforparentfilter.php',
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
        var institutionidvar = $("#selinstitution").val();
    
        
        $.ajax({

        method:'post',
        url:'../controller/scripts/owner/loadownerfilter.php',
        data:'classvar='+ classvar+'&selectschool='+selectschool+'&sessionidvar='+sessionidvar+'&institutionidvar='+institutionidvar,
        success: function(outputdata){
            $("#loadfilterbutton").html('load');
     var mainoutput =   $('#loadparentdata').html(outputdata);
    
        }

        });

});
//====================================================================



      </script>
</body>

</html>
