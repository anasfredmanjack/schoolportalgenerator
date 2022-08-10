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
    <title>Profile | <?php echo $fullname; ?></title>
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
                    <h2 class="text-themecolor" style="color: black; font-weight: 500;">Profile</h2>
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
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div id="output"></div>
                <?php  include ('../controller/scripts/owner/change-profile-photo.php'); ?>
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="../img/profile/<?php echo $userPicture; ?>" class="img-circle" width="150" />
                                    <h4 class="card-title m-t-10" style="color: black;"><?php echo $fullname; ?></h4>
                                   
                                </center>
                            </div>
                            <div>
                                <hr> 
                            </div>
                            <div class="card-body">
                                <b class="text-muted">Email address </b>
                                <h6 style="color: black;"><?php echo $Email; ?></h6>

                                <br/>

                                <b class="text-muted">Address</b>
                                <h6 style="color: black;"><?php echo $Address; ?>, <?php echo $City; ?> <?php echo $State; ?>, <?php echo $Country; ?></h6>

                                <small class="text-muted p-t-30 db">Telephone</small>
                                <h6><?php echo $Phone; ?></h6> 
                                
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">Profile Setting</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Change Password</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Change Profile Image</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                            <input id="UserID" type="hidden" class="form-control" value="<?php echo $UserID; ?>">
                            <input id="UserLoginID" type="hidden" class="form-control" value="<?php echo $UserLoginID; ?>">
                            <input id="AgencyOrSchoolOwnerID" type="hidden" class="form-control" value="<?php echo $AgencyOrSchoolOwnerID; ?>">
                            <input id="passworddb" type="hidden" class="form-control" value="<?php echo $passworddb; ?>">
                                
                                <!--first tab-->
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <div class="card-body">
                                    <div class="col-12" style="margin-top: 20px;">
                                                    <label for="inputname" class="form-label" style="font-weight: normal; color: black;">First Name:</label>
                                                    <input id="fname" type="text" class="form-control" value="<?php echo $PrimaryName; ?>" aria-label="name">
                                                </div>

                                                <div class="col-12" style="margin-top: 20px;">
                                                    <label for="inputname" class="form-label" style="font-weight: normal; color: black;">Last name :</label>
                                                    <input id="sname"  type="text" class="form-control" value="<?php echo $SecondaryName; ?>" aria-label="name">
                                                </div>

                                                </br>
                                                <div class="col-12">
                                                    <label for="inputEmail4" class="form-label" style="font-weight: normal; color: black;">Email:</label>
                                                    <input type="email" class="form-control" value="<?php echo $Email; ?>" id="email">
                                                </div>
                                                
                                                </br>
                                                <div class="col-12">
                                                <label for="inputnumber" class="form-label" style="font-weight: normal; color: black;">Telephone:</label>
                                                <input type="number" class="form-control" value="<?php echo $Phone; ?>" id="phone">
                                                </div>

                                                </br>
                                                <div class="col-12">
                                                <label for="inputAddress" class="form-label" style="font-weight: normal; color: black;">Address:</label>
                                                <input id="address" type="text" class="form-control" value="<?php echo $Address; ?>" aria-label="name">
                                                </div>

                                                <div class="col-sm-12" style="margin-top: 50px;">
                                                    <button class="btn btn-success" id="profileBtn" >Update Profile</button>
                                                </div>
                                    </div>
                                </div>
                                <!--first tab-->


                                <!--second tab-->
                                   <div class="tab-pane" id="profile" role="tabpanel">
                                    <div class="card-body">
                                    <form>

                                    <div class="col-12" style="margin-top: 10px;">
                                                <label for="oldPassword" class="form-label" style="font-weight: normal; color: black;">Input Old Password:</label>
                                                <input type="password" class="form-control" id="oldPassword">
                                            </div>

                                            </br>

                                            <div class="col-12" style="margin-top: 10px;">
                                                <label for="newPassword" class="form-label" style="font-weight: normal; color: black;">Input New Password:</label>
                                                <input type="password" class="form-control" id="newPassword">
                                            </div>
                                            
                                            <div class="col-sm-12" style="margin-top: 50px;">
                                                <button class="btn btn-success" id="passwordBtn">Update Password</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>


                                <div class="tab-pane" id="settings" role="tabpanel">
                                    <div class="card-body">
                                    <form id="uploadimage" method="post"  enctype="multipart/form-data">
                                    <div class="card-body">

                                        <div style="margin-top: 30px;">
                                            <input type="file" class="form-control" name="Profilepicture" id="Profilepicture" aria-label="Upload">
                                        </div>
                                        


                                        <div align="center" class="col-sm-12"  style="margin-top: 50px;">
                                            <button name="ProceedToChangePhoto" id="photoBtn" class="btn btn-success" style="border-radius: 30px;">Change Photo</button>
                                        </div>
                                    </form>

                                        


                                    </div>
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
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                
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
     <!--morris JavaScript -->
     <script src="../library/plugins/raphael/raphael-min.js"></script>
     <script src="../library/plugins/morrisjs/morris.min.js"></script>
     <script src="../library/plugins/raphael/raphael-min.js"></script>
     <script src="../library/plugins/morrisjs/morris.js"></script>
     <script src="../js/morris-data.js"></script>
     <!-- sparkline chart -->
     <script src="../library/plugins/sparkline/jquery.sparkline.min.js"></script>
     <script src="../js/dashboard4.js"></script>
     <script src="../library/plugins/echarts/echarts-all.js"></script>
     <script src="../library/plugins/echarts/echarts-init.js"></script>
   
    <script src="../js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    
    <script src="../js/jasny-bootstrap.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../library/plugins/styleswitcher/jQuery.style.switcher.js"></script>
    <script src="../controller/js/owner/profile.js">  </script>
</body>

</html>
