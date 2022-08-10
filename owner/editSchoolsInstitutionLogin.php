<?php  include ('../controller/session/session-checker-owner.php'); ?>
<?php
     $itemid = $_GET['itemid'];

        $sqlGetInstitution = ("SELECT * FROM `institution` WHERE InstitutionID = '$itemid'");
        $resultGetInstitution = mysqli_query($link, $sqlGetInstitution);
        $rowGetInstitution = mysqli_fetch_assoc($resultGetInstitution);
        $row_cntGetInstitution = mysqli_num_rows($resultGetInstitution);

        $sqlCheckIfUserNameExist = "SELECT * FROM `userlogin` WHERE `UserID` ='$itemid' AND UserType ='institution'";
        $sqlCheckIfUserNameResult = mysqli_query($link, $sqlCheckIfUserNameExist);
        $sqlCheckIfUserNameExistRow = mysqli_fetch_assoc($sqlCheckIfUserNameResult);	
        $sqlCheckIfUserNameExistCount = mysqli_num_rows($sqlCheckIfUserNameResult);

        $InstitutionLogo = $rowGetInstitution['InstitutionLogo']; 
        if($InstitutionLogo == ''){
            $InstitutionLogo = 'No_Photo.png';
        }
       

        if($row_cntGetInstitution == 0){
            header("location: InstitutionSchools.php");
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../img/favicon/<?php echo $Favicon; ?>">
    <title>Institutions | <?php echo $fullname; ?></title>
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
                <div class="col-md-10 align-self-center">
                    <h3 class="text-themecolor" style="color: black; font-weight: 400;">Edit Institutions Login Details</h3>
                </div>
                <div class="col-md-2 align-self-center">
                    
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
            <div class="container-fluid" >
                
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                             <div id="output"></div>
                             <div align="center">
                                    <img src="../img/logo/<?php echo $InstitutionLogo; ?>" width="150" class="img-circle">
                                    <h4 style="color: black;"><?php echo $rowGetInstitution['InstitutionName']; ?></h4>
                                </div>

                                <form style="margin: 30px;">
                                <div class="form-group">
                                        <label for="exampleInputName">Username:</label>
                                        <input disabled type="text" class="form-control" id="usernameRegNum" value="<?php echo $sqlCheckIfUserNameExistRow['UserRegNumberOrUsername']; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail">Password:</label>
                                        <input type="text" class="form-control" id="agencyPW" value="<?php echo $sqlCheckIfUserNameExistRow['UserPassword']; ?>">
                                    </div>

                                    <button type="submit" class="btn chimaRegistarSubmitBtn" >Submit</button>
                                    <button type="submit" class="btn btn-inverse waves-effect waves-light" style="width: 100px; margin-top: 30px; border-radius: 30px; margin-left: 10px;">Cancel</button>
                                </form>
                                
                                
                                
                                                            
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

$(".chimaRegistarSubmitBtn").click(function(){
   event.preventDefault(); 
       var IncompleteAccountID = '<?php echo $itemid; ?>';
       var OwnerID = '<?php echo $UserID; ?>';
       var UserLoginID = "<?php echo $sqlCheckIfUserNameExistRow['UserLoginID']; ?>";
       var usernameRegNum = $("#usernameRegNum").val();
       var agencyPW = $("#agencyPW").val();
       

      // alert(dob + phone + email + country + state + city + town + address);
       
       $('.chimaRegistarSubmitBtn').html('Adding...<i class="fa fa-spinner fa-spin"></i>');	
       
       var dataString = '&IncompleteAccountID='+ IncompleteAccountID +  '&UserLoginID='+ UserLoginID +  '&OwnerID='+ OwnerID + '&usernameRegNum='+ usernameRegNum + '&agencyPW='+ agencyPW;
	       
                       $.ajax({
                           type: "POST",
                           url: "../controller/scripts/owner/process_edit_institution_login.php",
                           data: dataString,
                           cache: false,
                           
                           success: function(result){
                              $('#output').html(result);	
                              //location.reload();
                              $('.chimaRegistarSubmitBtn').html('Submit');
                              $("html, body").animate({ scrollTop: 0 }, "slow");								   
                           }
                       });		   
});	


//==============End Create Login/Complete Agency/School Owner/Agencies============================= // 
        </script>
</body>

</html>
