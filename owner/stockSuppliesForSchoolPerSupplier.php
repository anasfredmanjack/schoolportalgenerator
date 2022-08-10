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
                <div class="col-sm-5 align-self-center" style="margin-bottom: -20px;">
                    <form>
                        <div class="form-group">
                                
                                <?php 
                                    $InstitutionID = $_GET["InstitutionID"];
                                    $sqlGetInstDetails = ("SELECT * FROM `institution` WHERE InstitutionID = '$InstitutionID'");
                                    $resultGetInstDetails = mysqli_query($link, $sqlGetInstDetails);
                                    $rowGetInstDetails = mysqli_fetch_assoc($resultGetInstDetails);
                                    $row_cntGetInstDetails = mysqli_num_rows($resultGetInstDetails);
            
                                ?>
                                <select class="form-control chimaPrimaryBorderColor" id="InstitutionID" style="background: white; border-width: 1px; border-style: solid; font-size: 14px;" disabled>
                                    <option value="<?php echo $rowGetInstDetails["InstitutionID"]; ?>" selected><?php echo $rowGetInstDetails['InstitutionName'] .' '. $rowGetInstDetails['InstitutionNameTwo']; ?></option>                                 
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
                
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                            
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12" style="margin-top: 20px; color: black;"><h2 class="pull-right"><i class="fa fa-file"></i> SUPPLIER HISTORY</h2></div>
                                </div>
                                
                                <div class="" id="addStockItemsModalOutput"></div>
                                <form action="" method="POST" style="margin-top: 10px;">
                                    
                                    <div class="row">
                                        <?php
                                            $SupplierID = $_GET["SupplierID"];
                                            $SupplierDetailsSql = mysqli_query($link, "SELECT * FROM stocksuppliers WHERE SupplierID = '$SupplierID'");
                                            $SupplierDetails = mysqli_fetch_assoc($SupplierDetailsSql);
                                            $SupplierDetailsCount = mysqli_num_rows($SupplierDetailsSql);
                                            if($SupplierDetailsCount > 0){
                                                $photo = $SupplierDetails['SupplierPhotoOrCompanyLogo'];

                                                if($photo == ''){
                                                    $photo = 'No_Photo.png';
                                                }
                                        ?>
                                        <div class="col-md-12" id="SupplierDetails"> 
                                            <div class="row">
                                                <br><br>
                                                <!-- <div class="col-md-12">
                                                    <h3 style="font-weight: 600;">SUPPLIER DETAILS:</h3>
                                                </div> -->
                                                <div class="col-md-6">
                                                    <img src="../img/suppliers/<?php echo $photo; ?>" style="width: 180px;" alt="" class="img-thumbnail" />                 

                                                </div>
                                                <div class="col-md-6">
                                                    <i class="fa fa-user"></i> <?php echo $SupplierDetails['SupplierFirstName'].' '.$SupplierDetails['SupplierLastName']; ?>
                                                    <br>
                                                    <i class="fa fa-phone"></i> <?php echo $SupplierDetails['SupplierPhoneNumber']; ?>
                                                    <br>
                                                    <i class="fa fa-envelope"></i> <?php echo $SupplierDetails['SupplierEmailAddress']; ?>
                                                    <br>
                                                    <i class="fa fa-briefcase"></i> <?php echo $SupplierDetails['SupplierCompanyName']; ?>
                                                    <br>
                                                    <i class="fa fa-map-marker"></i> <?php echo $SupplierDetails['SupplierAddress']; ?>
                                                    <input type="hidden" id="SupplierID" name="SupplierID" value="<?php echo $SupplierDetails['SupplierID']; ?>">
                                                </div>
                                                 

                                            </div>
                                        </div>
                                        <?php 
                                            } else { 
                                                echo '<p class="text-danger">No supplier selected!</p>';
                                            }
                                            
                                        ?>
                                        <div class="col-md-12" style="margin:24px 0;">
                                            <div class="row">
                                                

                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-sm-6 col-lg-6" style="margin-top: 15px;">                                                    
                                                    <div class="form-group">                       
                                                        <?php 
                                                        $sqlGetSession = ("SELECT * FROM `session`");
                                                        $resultGetSession = mysqli_query($link, $sqlGetSession);
                                                        $rowGetSession = mysqli_fetch_assoc($resultGetSession); 
                                                        $row_cntGetSession = mysqli_num_rows($resultGetSession);	
                                    
                                                        ?>
                                                        <select class="form-control" id="Session" style="background: white; border-width: 1px; border-style: solid; font-size: 14px;">
                                                            <option value="0" selected>Session</option>

                                                            <?php 
                                                                if($row_cntGetSession > 0)
                                                                {
                                                            
                                                                    do{

                                                            ?>
                                                                    <option value="<?php echo $rowGetSession['sessionName'] ; ?>"><?php echo $rowGetSession['sessionName'] ; ?></option>
                                                                
                                                            <?php
                                                                    }while($rowGetSession = mysqli_fetch_assoc($resultGetSession));
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                        
                                                </div>
                                                <div class="col-sm-5 col-lg-5" style="margin-top: 15px;">
                                                    
                                                    <div class="form-group">  
                                                        <select id="Term" class="form-control">
                                                            <option value="0" selected>Term</option>
                                                        </select>
                                                    </div>
                                                    
                                                </div>
                                                <div class="col-sm-1 align-self-center">
                                                    <button type="button" class="btn chimaNormalBtn btn waves-effect waves-light btn-rounded btn-outline-warning" id="loadFIlter">
                                                        <span style="font-size: 13px;">Load</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div id="dynamicField">
                                                <div class="table-responsive m-t-40">
                                                    <table id="myStockItemsTable" class="table display table-striped">
                                                        <thead>
                                                            <tr>
                                                                
                                                                <th>Invoice No</th>
                                                                <th>Invoice Date</th>
                                                                <th>Session</th>
                                                                <th>Term</th>
                                                                <th>Preview</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="StockItemsList"> 
                                                            <tr><td colspan="5" class="alert alert-default text-center"><span>Select the filter to sort records!</span></td><tr>                                        
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- <div class="col-md-12">
                                                <div class="button-group" style="float: right;"><button id="addStockItemsModalBtn" type="button" class="btn btn-primary"><span class="fa fa-print"></span> Print</button></div>
                                            </div> -->
                                            <!-- <select class="form-control ItemTitle chosen-select" name="ItemTitle'+i+'" id="ItemTitle'+i+'" placeholder="e.g. Mama Lemon Detergent" searchable="Search here.." required><option value=""></option><?php //$StockItemsSql = mysqli_query($link, "SELECT * FROM stockitems"); $StockItemsRow = mysqli_fetch_assoc($StockItemsSql); $StockItemsCount = mysqli_num_rows($StockItemsSql); if($StockItemsCount > 0){ do{ echo '<option value="'.$StockItemsRow["StockItemID"].'">'.$StockItemsRow["ItemTitle"].'</option>';  } while($StockItemsRow = mysqli_fetch_assoc($StockItemsSql)); } ?></select> -->
                                                            
                                        </div>
                                        

                                    </div>

                                    
                                </form>
                                
    
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
        $(document).ready(function() {
            // Load in all the StockItems
            //======= on change of Session ======//
            $("body").on("change", "#Session", function(){
                var Session = $(this).children("option:selected").val(); 
                var institution = $("#InstitutionID").val();
                var dataString = 'Session='+ Session + '&institution=' + institution;

                //alert(institution);
                
                if(Session == 0 || Session == ""){
                    
                    $('#Term').html('');
                    $('#Term').append($('<option>').val(0).text('Select Session First'));
                     
                }
                else{
                    $.ajax({
                        type : 'post',
                        url: "../controller/scripts/storekeeper/load_term.php",
                        data :  dataString,
                        success : function(result)
                        {
                            var obj1 = JSON.parse(result);
                            console.log(obj1);
                            
                            var z;
                            var termName = "";
                            var termID = "";
                            $('#Term').html('');
                            $('#Term').append($('<option>').val(0).text('Select Term'));

                            for (z = 0; z < obj1.length; z++) 
                            {
                                termName = obj1[z].TermOrSemesterName;
                                termID = obj1[z].TermOrSemesterID;
                                $('#Term').append($('<option>').val(termName).text(termName));

                            }

                            //$('#RecepientArea').show();
                            
                        }
                    });
                }
            });
            //=======end of change of selsession ======//

            $("body").on("click", "#loadFIlter", function(){
                
                var Session = $("#Session").val();
                var Term = $("#Term").val();
                var InstitutionID = $("#InstitutionID").val();
                var SupplierID = "<?php echo $SupplierDetails['SupplierID']; ?>"; 
                var dataString = 'InstitutionID='+InstitutionID+'&SupplierID='+SupplierID+'&Session='+Session+'&Term='+Term;
                //alert(dataString);
                $('#StockItemsList').html('<div style="margin: 0 auto;"><img src="../img/preloader.gif" /></div>');
                $.ajax({
                    type: "POST",
                    url: "../controller/scripts/owner/loadSupplierHistoryOwner.php",
                    data: dataString,
                    success: function(result){
                        //alert(result);
                        $('#StockItemsList').html(result);
                        
                        $(document).ready(function() {
                            $('#myStockItemsTable').DataTable();                             
                        });
                         
                    }
                });
            });
 
        });
    </script>

</body>

</html>
