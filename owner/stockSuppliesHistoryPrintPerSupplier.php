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
    <![endif]--><style>
        @media print {
         .no_print {display:none;}
      }
    </style>
</head>

<body class="fix-header card-no-border logo-center">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader no_print">
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
        <header class="topbar chimaPrimaryColor no_print">
        <?php include ('../includes/header-owner.php'); ?>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- Sidebar navigation-->
         <aside class="left-sidebar no_print">
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
            <?php
                $InstitutionID = $_GET["InstitutionID"];
                $InvoiceNo = $_GET['InvoiceNo'];
                $sqlGetSuppliedItems = ("SELECT * FROM stockactivity
                LEFT JOIN stockitems ON stockitems.StockItemID = stockactivity.StockItemID
                WHERE stockactivity.InstitutionID='$InstitutionID' AND stockactivity.InvoiceNo='$InvoiceNo'
                ORDER BY stockactivity.DateRegistered DESC");
                $resultGetSuppliedItems = mysqli_query($link, $sqlGetSuppliedItems);
                $rowGetSuppliedItems  = mysqli_fetch_assoc($resultGetSuppliedItems);
                $row_cntGetSuppliedItems = mysqli_num_rows($resultGetSuppliedItems);

                $SupplierID = $rowGetSuppliedItems["SupplierID"];

            ?>
            
            <div class="row page-titles no_print">
                
                <div class="col-sm-7 align-self-center">
                     
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
                                <input id="InstitutionID" type="hidden" value="<?php echo $rowGetInstDetails["InstitutionID"]; ?>">
                        </div>
                    </form>
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
                                <div class="row">
                                    <div class="col-md-12" style="margin-top: 20px; color: black;"><h2 class="pull-right"><i class="fa fa-file"></i> Invoice</h2></div>

                                </div>
                                <div class="" id="addStockItemsModalOutput"></div>
                                <form action="" method="POST" style="margin-top: 10px;">
                                    <div class="row" style="margin: 12px auto; padding:20px; text-align:center;">
                                        
                                            <div class="col-sm-12">
                                                <div class="row" style="margin-bottom: 40px; display:block; clear:both;">
                                                    <img src="../img/logo/<?php echo $Logo; ?>" class="img-fluid" alt="..." style="margin-bottom: 10px; width:auto; height:100px;">
                                                </div>
                                                
                                                <span style="color:<?php echo $PrimaryColor; ?>; font-size: 42px; text-align: center; margin:12px auto; font-weight: 600; display:block; clear:both;" class="schname"><?php echo str_replace('OWNER', '', $PrimaryName).'<br>'. str_replace('OWNER', '', $SecondaryName);  ?></span>
                                                <em class="schloc" style="margin:12px auto; font-size: 18px;"><?php echo $Address . ', ' . $Country . ', ' . $Phone ; ?></em>
                                                <hr>
                                            </div>
                                            <div class="col-sm-12" style="font-size: calc(12px + (15 - 12) * ((100vw - 300px) / (1600 - 300))); font-weight: 400;">
                                                <div class="col-sm-12"></div>
                                                <div class="col-sm-12">Email : <?php echo $Email ; ?></div>
                                                <div class="col-sm-12">Website : <?php echo $Website ; ?></div>
                                                <div class="col-sm-12"><em style="color:<?php echo $PrimaryColor; ?>; font-size: calc(12px + (19 - 12) * ((100vw - 300px) / (1600 - 300))); font-weight:bold;"><?php echo $Motto ; ?></em></div>
                                                <hr>
                                            </div>
                                            
                                    </div>
                                    <div class="row">
                                        <?php
                                        
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
                                                <div class="col-sm-12">
                                                    <h3 style="font-weight: 600;">SUPPLIER DETAILS:</h3>
                                                </div>
                                                <div class="col-sm-4">
                                                    <img src="../img/suppliers/<?php echo $photo; ?>" style="width: 180px;" alt="" class="img-thumbnail" />                 

                                                </div>
                                                <div class="col-sm-5">
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
                                                <div class="col-sm-3">
                                                    <span class="pull-right"> 

                                                        <strong>Invoice Date:</strong>
                                                        <div class="form-group">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text"><i class="fa fa-calendar"></i> </span>
                                                                </div>
                                                                <?php
                                                                    date_default_timezone_set("Africa/Lagos");
                                                                    $DateRegistered = $rowGetSuppliedItems["DateRegistered"];
                                                                ?>
                                                                <input type="date" disabled class="form-control" placeholder="<?php echo $DateRegistered; ?>" aria-label="DateInvoice" aria-describedby="DateInvoice" id="DateInvoice" value="<?php echo $DateRegistered; ?>">
                                                            </div>
                                                        </div><br>
                                                        <?php  
                                                            date_default_timezone_set("Africa/Lagos");
                                                            $InvoiceNo = $rowGetSuppliedItems["InvoiceNo"];
                                                            
                                                        ?>
                                                        <strong>Invoice No:</strong>
                                                        <div class="form-group">
                                                            <div class="input-group mb-3">
                                                                <div class="input-group-prepend">
                                                                    <span class="input-group-text" id="basic-addon2"><i class="fa fa-file-text"></i> </span>
                                                                </div>
                                                                <input type="text" class="form-control" disabled placeholder="InvoiceNo" aria-label="InvoiceNo" aria-describedby="InvoiceNo" id="InvoiceNo" value="<?php echo $InvoiceNo; ?>">
                                                            </div>
                                                        </div>
                                                
                                                    </span> 
                                                </div>

                                            </div>
                                        </div>
                                        <?php 
                                            } else { 
                                                echo '<p class="text-danger">No supplier found!</p>';
                                            }
                                            
                                        ?>
                                        <div class="col-md-12" style="margin:24px 0;">
                                            <div class="row">
                                                

                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                                
                                            <div id="dynamicField">
                                                <div class="table-responsive m-t-40">
                                                    <table id="myStockItemsTable" class="table display table-striped">
                                                        <thead>
                                                            <tr>
                                                                
                                                                <th>Item Name</th>
                                                                <th>Quantity</th>
                                                                <th>Invoice Date</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="StockItemsList">                                         
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-12 no_print">
                                                <div class="button-group" style="float: right;"><button onclick="window.print()" id="addStockItemsModalBtn" type="button" class="btn btn-primary"><span class="fa fa-print"></span> Print</button></div>
                                            </div>
                                                            
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
            <div class="no_print"><?php include ('../includes/footer.php'); ?></div>
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
            $.fn.reloadStockItemsTable = function(){
                var InvoiceNo = "<?php echo $rowGetSuppliedItems["InvoiceNo"]; ?>";
                var InstitutionID = $("#InstitutionID").val();
                 
                $('#StockItemsList').html('<div style="margin: 0 auto;"><img src="../img/preloader.gif" /></div>');
                $.ajax({
                    type: "POST",
                    url: "../controller/scripts/storekeeper/loadSupplierHistoryPrint.php",
                    data: 'InstitutionID='+InstitutionID+'&InvoiceNo='+InvoiceNo,
                    success: function(result){
                        $('#StockItemsList').html(result);

                         
                    }
                });
            }
            $.fn.reloadStockItemsTable();
        });
    </script>

</body>

</html>
