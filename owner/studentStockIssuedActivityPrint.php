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
    <link rel="icon" type="image/png" sizes="16x16" href="../img/favicon/<?php echo $Favicon; ?>">
    <title>Print Issued Stock History | <?php echo $fullname; ?></title>
    <!-- Favicon icon -->
    <link href="../library/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     
    <!-- Morries chart CSS -->
    <link href="../library/plugins/morrisjs/morris.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/style.php" rel="stylesheet">
    <link href="../css/blueOwner.php" rel="stylesheet">
    <link href="../css/chosen.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <!-- <link href="../css/blueInstitution.php" id="theme" rel="stylesheet"> -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <style>
        @media print {
         .no_print {display:none;}
      }
    </style>

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
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <?php
                $StudentID = $_GET['StudentID'];   
                $AgencyOrSchoolOwnerID = $UserID;
                $sqlGetIssuedItems = ("SELECT * FROM stockissuedinfo 
                LEFT JOIN classordepartment ON classordepartment.ClassOrDepartmentID = stockissuedinfo.ClassOrDepartmentID
                LEFT JOIN stockissuedactivity ON stockissuedactivity.BatchCode = stockissuedinfo.BatchCode
                LEFT JOIN stockitems ON stockitems.StockItemID = stockissuedactivity.StockItemID
                LEFT JOIN institution ON institution.InstitutionID=stockissuedinfo.InstitutionID 
                LEFT JOIN agencyorschoolowner ON agencyorschoolowner.AgencyOrSchoolOwnerID=institution.AgencyOrSchoolOwnerID 
                WHERE agencyorschoolowner.AgencyOrSchoolOwnerID='$AgencyOrSchoolOwnerID' AND stockissuedinfo.StudentID='$StudentID'
                ORDER BY stockissuedinfo.DateRegistered ASC");
                $resultGetIssuedItems = mysqli_query($link, $sqlGetIssuedItems);
                $rowGetIssuedItems  = mysqli_fetch_assoc($resultGetIssuedItems);
                $row_cntGetIssuedItems = mysqli_num_rows($resultGetIssuedItems);

                //$Notes = $rowGetIssuedItems["Notes"];


            ?>
            <div class="row page-titles no_print">
                <div class="col-md-9 align-self-center">
                    <h3 style="color: black;"><span class="fa fa-bookmark"></span>  Store Keeper</h3>
                </div>
                <div class="col-sm-3 pull-right">
                    <a href="studentIssuedStockActivity.php" type="button" class="btn btn-link waves-effect waves-light pull-right" style="color: <?php echo $PrimaryColor; ?>;">
                        <span style="font-size: 18px;"><i class="fa fa-arrow-left"></i> Go Back</span>
                    </a>
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
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-12" style="margin-top: 20px; color: black;"><h2 class="pull-right"><i class="fa fa-file"></i> Report</h2></div>

                                        </div> 
                                        <?php 
                                            if($row_cntGetIssuedItems > 0){
                                        ?>
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
                                                 
                                                <div class="col-md-12" id="SupplierDetails"> 
                                                    <div class="row">
                                                        <br><br>
                                                        <div class="col-sm-12">
                                                            <h3 style="font-weight: 600;">STOCK DETAILS:</h3>
                                                        </div>
                                                        <div class="col-sm-7">
                                                            <h3>Collected By</h3>                 
                                                            <?php
                                                                if($rowGetIssuedItems['UserType'] == 'Staff'){    
                                                                    $StaffID = $rowGetIssuedItems['CollectedBy'];            
                                                                    $rowGetStaffSql = mysqli_query($link, "SELECT * FROM staff WHERE StaffID = '$StaffID'");
                                                                    $StaffRow = mysqli_fetch_assoc($rowGetStaffSql);
                                                                    echo  $StaffRow["StaffFirstName"] . ' ' . $StaffRow["StaffMiddleName"] . ' ' . $StaffRow["StaffLastName"];
                                                                }else if($rowGetIssuedItems['UserType'] == 'Parent'){
                                                                    $ParentID = $rowGetIssuedItems['CollectedBy'];            
                                                                    $rowGetParentSql = mysqli_query($link, "SELECT * FROM parent WHERE ParentID = '$ParentID'");
                                                                    $ParentRow = mysqli_fetch_assoc($rowGetParentSql);
                                                                    echo $ParentRow["ParentFirstName"] . ' ' . $ParentRow["ParentLastName"];
                                                                }else if($rowGetIssuedItems['UserType'] == 'Student'){
                                                                    $StudentID = $rowGetIssuedItems['CollectedBy'];            
                                                                    $rowGetStudentSql = mysqli_query($link, "SELECT * FROM student WHERE StudentID = '$StudentID'");
                                                                    $StudentRow = mysqli_fetch_assoc($rowGetStudentSql);
                                                                    echo $StudentRow["StudentFirstName"] . ' ' . $StudentRow["StudentMiddleName"] . ' ' . $StudentRow["StudentLastName"];
                                                                }
                                                                echo '<b> ('. $rowGetIssuedItems['UserType'] . ')</b>';
                                                            ?>
                                                            <br><br>
                                                            <h3>Issued To</h3>  
                                                            <?php
                                                                if($rowGetIssuedItems['CollectedFor'] == 'Student'){    
                                                                    $StudentID = $rowGetIssuedItems['StudentID'];            
                                                                    $rowGetStudentSql = mysqli_query($link, "SELECT * FROM student WHERE StudentID = '$StudentID'");
                                                                    $StudentRow = mysqli_fetch_assoc($rowGetStudentSql);
                                                                    echo $StudentRow["StudentFirstName"] . ' ' . $StudentRow["StudentMiddleName"] . ' ' . $StudentRow["StudentLastName"];
                                                                }else if($rowGetIssuedItems['CollectedFor'] == 'Institution'){
                                                                    $SelectedInstitutionID = $rowGetIssuedItems['SelectedInstitutionID'];            
                                                                    $rowGetInstitutionSql = mysqli_query($link, "SELECT * FROM institution WHERE InstitutionID = '$SelectedInstitutionID'");
                                                                    $InstitutionRow = mysqli_fetch_assoc($rowGetInstitutionSql);
                                                                    echo $InstitutionRow["InstitutionName"] . ' ' . $InstitutionRow["InstitutionNameTwo"];
                                                                }
                                                                echo '<b> ('. $rowGetIssuedItems['CollectedFor'] . ')</b>';
                                                            ?>
                                                        </div>
                                                        <div class="col-sm-5">
                                                            <?php
                                                                echo '<h4><b>SESSION: '. $rowGetIssuedItems['Session'] . '</b></h4> <br>';
                                                                echo '<h4><b>TERM: '. $rowGetIssuedItems['Term'] . ' </b></h4><br>';
                                                            ?>
                                                            <?php
                                                                echo '<h4><b>Class: '. $rowGetIssuedItems['ClassOrDepartmentName'] . '</b></h4><br>';
                                                                //echo '<b><h4>TERM: '. $rowGetIssuedItems['Term'] . '</h4></b>';
                                                            ?>
                                                        </div>

                                                    </div>
                                                </div>
                                                 
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
                                                                        <th>Batch Code</th>
                                                                        <th>Item Name</th>
                                                                        <th>Quantity</th>
                                                                        <th>Date</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="StockItemsList"> 
                                                                    <?php 
                                                                        if($row_cntGetIssuedItems > 0){
                                                                            do{
                                                                        ?>
                                                                        <tr>
                                                                            <td><?php echo $rowGetIssuedItems['BatchCode']; ?></td>
                                                                            <td><?php echo $rowGetIssuedItems['ItemTitle']; ?></td>
                                                                            <td><?php echo $rowGetIssuedItems['IssuedStock']; ?></td>
                                                                            <td><?php echo $rowGetIssuedItems['DateRegistered']; ?></td>
                                                                             
                                                                        </tr>
                                                                        <?php
                                                                            }while($rowGetIssuedItems  = mysqli_fetch_assoc($resultGetIssuedItems));
                                                                        }else{
                                                                            echo '<tr><td colspan="3" class="alert alert-danger">No Items in this stock history</td></tr>';
                                                                        }
                                                                    ?>                                        
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <?php 
                                                            /* if(!empty($Notes)){
                                                                echo '<br><br><h4>Notes: <small>(Reasons for issuing stock)</small></h4><p>'. $Notes . '</p><br><br><br>'; 
                                                            }else{
                                                                // No notes
                                                            } */
                                                        
                                                        ?>
                                                    </div>
                                                    <div class="col-md-12 no_print">
                                                        <div class="button-group" style="float: right;"><button onclick="window.print()" id="addStockItemsModalBtn" type="button" class="btn btn-primary"><span class="fa fa-print"></span> Print</button></div>
                                                    </div>
                                                                    
                                                </div>
                                                

                                            </div>

                                            
                                        </form>
                                        <?php
                                            }else{
                                                echo 'No Items has been issued to this student yet!';
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>                            
                    </div>
                </div>

            </div>
              <!-- footer -->
            <!-- ============================================================== -->
            <span class="no_print"><?php include ('../includes/footer.php'); ?></span>
            <!-- ============================================================== -->
            <!-- End footer -->
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
      <!-- Magnific popup JavaScript -->
      <script src="../assets/plugins/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
      <script src="../assets/plugins/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>

    <script src="../library/plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="../js/dashboard4.js"></script>
    <script src="../js/chosen.jquery.js"></script>
    <script src="../js/init.js"></script>
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
 
  
    
</body>
</html>

