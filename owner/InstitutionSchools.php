<?php  include ('../controller/session/session-checker-owner.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
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
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-10 align-self-center">
                    <h2 class="text-themecolor" style="color: black; font-weight: 400;">Institutions/Schools</h2>
                </div>
                <div class="col-md-2 align-self-center">
                    <a href="createSchoolsInstitution.php" type="button" class="btn chimaNormalBtn" style="width: 100px; margin-left: 40px;">
                        <span style="font-size: 13px;">Create New</span>
                    </a>
                </div>
                <!--<div class="">
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
            <?php
	   if(isset($_POST['ProceedToChangeLogo'])){
		  //Get current user ID from session
            $selAgencyForLogoUpdateID = $_POST['selAgencyForLogoUpdateID'];
			
			if(!empty($_FILES['AgencyLogoChange']['name']))
	        {
				 //File uplaod configuration
				$result = 0;
				$uploadDir = "../img/logo/";
				$fileName = time().'_'.basename($_FILES['AgencyLogoChange']['name']);
				$imageFileType = pathinfo($fileName,PATHINFO_EXTENSION);
				$targetPath = $uploadDir. $fileName;
				
						 if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
						 {
										
										echo '<div class="alert alert-warning  fade show" role="alert">
												<div class="alert-icon"><i class="flaticon-warning"></i></div>
												<div class="alert-text">Unsupported File Format. Only png,jpeg or gif is accepted</div>
												<div class="alert-close">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true"><i class="la la-close"></i></span>
													</button>
												</div>
											</div>';	
						  }
						  else
						  {
										 if ($_FILES["AgencyLogoChange"]["size"] > 10000000) {
												   echo '<div class="alert alert-warning  fade show" role="alert">
														<div class="alert-icon"><i class="flaticon-warning"></i></div>
														<div class="alert-text">Sorry, File Size is too much. Kindly get another file and re-upload</div>
														<div class="alert-close">
															<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																<span aria-hidden="true"><i class="la la-close"></i></span>
															</button>
														</div>
													</div>';
									        }
											else{
											   //Upload file to server
												  if(@move_uploaded_file($_FILES['AgencyLogoChange']['tmp_name'], $targetPath))
												  {
												//Get current user ID from session
												
												 //Update picture name in the database
		$sqlUploadUserImage = ("UPDATE `institution` SET `InstitutionLogo` = '$fileName' WHERE `InstitutionID` = '$selAgencyForLogoUpdateID'");
							$resultUploadUserImage = mysqli_query($link, $sqlUploadUserImage);
																   
													//Update status
													    if($resultUploadUserImage)
													         {
															 echo '<div class="alert alert-success  fade show" role="alert">
																<div class="alert-icon"><i class="flaticon2-check-mark"></i></div>
																<div class="alert-text">Great! Agency/School Owners\'s Logo Updated Successfuly</div>
																<div class="alert-close">
																	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																		<span aria-hidden="true"><i class="la la-close"></i></span>
																	</button>
																</div>
															</div>';
																}
																//header('Location: index.php');
											        }
													}
						  }
			}
			else{
			 echo '<div class="alert alert-warning  fade show" role="alert">
					<div class="alert-icon"><i class="flaticon-warning"></i></div>
					<div class="alert-text">Opps! Please Select a File for upload</div>
					<div class="alert-close">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true"><i class="la la-close"></i></span>
						</button>
					</div>
				</div>';	
			}
	   }				   
	?>

<?php
	   if(isset($_POST['ProceedToChangeLoginBgImage'])){
		  //Get current user ID from session
            $selAgencyForLoginBgImageID = $_POST['selAgencyForLoginBgImageID'];
			
			if(!empty($_FILES['AgencyBgLoginImageChange']['name']))
	        {
				 //File uplaod configuration
				$result = 0;
				$uploadDir = "../img/bg/";
				$fileName = time().'_'.basename($_FILES['AgencyBgLoginImageChange']['name']);
				$imageFileType = pathinfo($fileName,PATHINFO_EXTENSION);
				$targetPath = $uploadDir. $fileName;
				
						 if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
						 {
										
										echo '<div class="alert alert-warning  fade show" role="alert">
												<div class="alert-icon"><i class="flaticon-warning"></i></div>
												<div class="alert-text">Unsupported File Format. Only png,jpeg or gif is accepted</div>
												<div class="alert-close">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true"><i class="la la-close"></i></span>
													</button>
												</div>
											</div>';	
						  }
						  else
						  {
										 if ($_FILES["AgencyBgLoginImageChange"]["size"] > 10000000) {
												   echo '<div class="alert alert-warning  fade show" role="alert">
														<div class="alert-icon"><i class="flaticon-warning"></i></div>
														<div class="alert-text">Sorry, File Size is too much. Kindly get another file and re-upload</div>
														<div class="alert-close">
															<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																<span aria-hidden="true"><i class="la la-close"></i></span>
															</button>
														</div>
													</div>';
									        }
											else{
											   //Upload file to server
												  if(move_uploaded_file($_FILES['AgencyBgLoginImageChange']['tmp_name'], $targetPath))
												  {
												//Get current user ID from session
												
												 //Update picture name in the database
		$sqlUploadUserImage = ("UPDATE `institution` SET LoginBgImage = '".$fileName."' WHERE `InstitutionID` = '$selAgencyForLoginBgImageID'");
							$resultUploadUserImage = mysqli_query($link, $sqlUploadUserImage);
																   
													//Update status
													    if($resultUploadUserImage)
													         {
															 echo '<div class="alert alert-success  fade show" role="alert">
																<div class="alert-icon"><i class="flaticon2-check-mark"></i></div>
																<div class="alert-text">Great! Agency/School Owners\'s Login Bg Image Updated Successfuly</div>
																<div class="alert-close">
																	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																		<span aria-hidden="true"><i class="la la-close"></i></span>
																	</button>
																</div>
															</div>';
																}
																//header('Location: index.php');
																$secondsWait = 1;
																header("Refresh:$secondsWait");
											        }
													}
						  }
			}
			else{
			 echo '<div class="alert alert-warning  fade show" role="alert">
					<div class="alert-icon"><i class="flaticon-warning"></i></div>
					<div class="alert-text">Opps! Please Select a File for upload</div>
					<div class="alert-close">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true"><i class="la la-close"></i></span>
						</button>
					</div>
				</div>';	
			}
	   }				   
	?>


<?php
	   if(isset($_POST['ProceedToChangeIcon'])){
		  //Get current user ID from session
            $selAgencyForIcon = $_POST['selAgencyForIcon'];
			
			if(!empty($_FILES['AgencyIconImage']['name']))
	        {
				 //File uplaod configuration
				$result = 0;
				$uploadDir = "../img/favicon/";
				$fileName = time().'_'.basename($_FILES['AgencyIconImage']['name']);
				$imageFileType = pathinfo($fileName,PATHINFO_EXTENSION);
				$targetPath = $uploadDir. $fileName;
				
						 if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
						 {
										
										echo '<div class="alert alert-warning  fade show" role="alert">
												<div class="alert-icon"><i class="flaticon-warning"></i></div>
												<div class="alert-text">Unsupported File Format. Only png,jpeg or gif is accepted</div>
												<div class="alert-close">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true"><i class="la la-close"></i></span>
													</button>
												</div>
											</div>';	
						  }
						  else
						  {
										 if ($_FILES["AgencyIconImage"]["size"] > 10000000) {
												   echo '<div class="alert alert-warning  fade show" role="alert">
														<div class="alert-icon"><i class="flaticon-warning"></i></div>
														<div class="alert-text">Sorry, File Size is too much. Kindly get another file and re-upload</div>
														<div class="alert-close">
															<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																<span aria-hidden="true"><i class="la la-close"></i></span>
															</button>
														</div>
													</div>';
									        }
											else{
											   //Upload file to server
												  if(move_uploaded_file($_FILES['AgencyIconImage']['tmp_name'], $targetPath))
												  {
												//Get current user ID from session
												
												 //Update picture name in the database
		$sqlUploadUserImage = ("UPDATE `institution` SET InstitutionFavicon = '".$fileName."' WHERE `InstitutionID` = '$selAgencyForIcon'");
							$resultUploadUserImage = mysqli_query($link, $sqlUploadUserImage);
																   
													//Update status
													    if($resultUploadUserImage)
													         {
															 echo '<div class="alert alert-success  fade show" role="alert">
																<div class="alert-icon"><i class="flaticon2-check-mark"></i></div>
																<div class="alert-text">Great! Agency/School Owners\'s Login Bg Image Updated Successfuly</div>
																<div class="alert-close">
																	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
																		<span aria-hidden="true"><i class="la la-close"></i></span>
																	</button>
																</div>
															</div>';
																}
																//header('Location: index.php');
											        }
													}
						  }
			}
			else{
			 echo '<div class="alert alert-warning  fade show" role="alert">
					<div class="alert-icon"><i class="flaticon-warning"></i></div>
					<div class="alert-text">Opps! Please Select a File for upload</div>
					<div class="alert-close">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true"><i class="la la-close"></i></span>
						</button>
					</div>
				</div>';	
			}
	   }				   
	?>
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    
                    <div class="col-12">
                    <?php
                    $sqlGetInstitutionList = ("SELECT * FROM `institution` WHERE AgencyOrSchoolOwnerID ='$UserID'");
                    $resultGetInstitutionList = mysqli_query($link, $sqlGetInstitutionList)or die(mysqli_error($link));
                    $rowGetInstitutionList = mysqli_fetch_assoc($resultGetInstitutionList);
                    $countGetInstitutionList = mysqli_num_rows($resultGetInstitutionList);    
                ?>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title" style="color: red;">Institutions/Schools List</h4>
                                <h6 class="card-subtitle">Full list of Institutions/Schools</h6>
                                
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="table m-t-30 table-hover no-wrap contact-list table-striped" style="font-size: 13px;">                                        
                                        <thead>
                                            <tr>
                                                <th>ID #</th>
                                                <th>Institutions/Schools Name</th>
                                                <th>Logo</th>
                                                <th>Logo Bg</th>
                                                <th>Icon</th>
                                                <th>Email</th>
                                                <th>Phone No.</th>
                                                <th>Username</th>
                                                <th>Password</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                                if($countGetInstitutionList > 0){
					                                $count = 0;
                                                    do{ 
                                                        $count = $count + 1;

                                                        $photo = $rowGetInstitutionList['photo'];
                                                        if($photo == ''){
                                                            $photo = 'No_Photo.png';
                                                        }

                                                        $logo = $rowGetInstitutionList['InstitutionLogo'];
                                                        if($logo == ''){
                                                            $logo = 'No_Photo.png';
                                                        }
                                                        $bg = $rowGetInstitutionList['LoginBgImage'];
                                                        if($bg == ''){
                                                            $bg = 'No_Photo.png';
                                                        }
                                                        $icon = $rowGetInstitutionList['InstitutionFavicon'];
                                                        if($icon == ''){
                                                            $icon = 'No_Photo.png';
                                                        }


                                            ?>
                                                 <?php
                                                    $InstitutionID = $rowGetInstitutionList['InstitutionID'];

                                                    $sqlIfLoginIsCreated = ("SELECT * FROM `userlogin` WHERE UserID ='$InstitutionID' AND UserType='institution'");
                                                    $resultIfLoginIsCreated = mysqli_query($link, $sqlIfLoginIsCreated)or die(mysqli_error($link));
                                                    $rowIfLoginIsCreated = mysqli_fetch_assoc($resultIfLoginIsCreated);
                                                    $countIfLoginIsCreated = mysqli_num_rows($resultIfLoginIsCreated);
  
                                                ?>
                                            <tr>
                                                <td><?php echo $count; ?></td>
                                                <td>              
                                                   <?php echo $rowGetInstitutionList['InstitutionName']; ?>                                                         
                                                </td>
                                                
                                                <td>
                                                    <a href="#" data-toggle="modal" data-target="#ChangeLogoModal" data-id="<?php echo $InstitutionID; ?>">
                                                        <img src="../img/logo/<?php echo $logo; ?>" style="width: 30px; height: 30px;" alt="user" class="img-circle" /> 
                                                    </a>
                                                </td>
                                                <td>
                                                <a href="#" data-toggle="modal" data-target="#ChangeLoginBackground" data-id="<?php echo $InstitutionID; ?>">
                                                    <img src="../img/bg/<?php echo $bg; ?>" alt="user" style="width: 30px; height: 30px;" class="img-circle" /> 
                                                    </a>
                                                </td>
                                                <td>
                                                <a href="#" data-toggle="modal" data-target="#ChangeIcon" data-id="<?php echo $InstitutionID; ?>">
                                                    <img src="../img/favicon/<?php echo $icon;?>" style="width: 30px; height: 30px;" alt="user" class="img-circle" /> 
                                                    </a>
                                                </td>
                                                <td><?php echo $rowGetInstitutionList['InstitutionEmail']; ?></td>
                                                <td><?php echo $rowGetInstitutionList['InstitutionPhone']; ?></td>
                                                <td><?php echo @$rowIfLoginIsCreated['UserRegNumberOrUsername']; ?></td>
                                                <td><?php echo @$rowIfLoginIsCreated['UserPassword']; ?></td>
                                                <td>
                                                    <a href="editSchoolsInstitution.php?itemid=<?php echo $rowGetInstitutionList['InstitutionID']; ?>" class="btn btn-sm btn-icon btn-pure btn-outline" data-toggle="tooltip">
                                                        <i class="fa fa-pencil fa-lg" aria-hidden="true"></i>
                                                    </a>
                                                    <a href="#" data-toggle="modal" data-target="#exampleModalDelete" data-id="<?php echo $rowGetInstitutionList['InstitutionID']; ?>">
                                                        <i class="fa fa-trash-o fa-lg" style="color: red;" aria-hidden="true"></i>
                                                    </a>
                                                    <?php
                                                        if($countIfLoginIsCreated > 0){
                                                    ?>
                                                    <a href=editSchoolsInstitutionLogin.php?itemid=<?php echo $rowGetInstitutionList['InstitutionID']; ?>" type="button" class="btn btn-primary" style="background: #3BCDFB; border:#3BCDFB; margin-left: 10px; font-size: 13px; border-radius: 30px;">
                                                            Edit Login
                                                        </a>
                                                    <?php
                                                        }
                                                        else{
                                                    ?>
                                                    <a href="createSchoolsInstitutionLogin.php?itemid=<?php echo $rowGetInstitutionList['InstitutionID']; ?>" type="button" class="btn btn-primary" style="margin-left: 10px; font-size: 13px; border-radius: 30px;"  id="dependentBtn">
                                                        Create Login
                                                    </a>
                                                    <?php
                                                        }
                                                    ?>
                                                </td>


                                                </tr>
                                                <?php }while($rowGetInstitutionList = mysqli_fetch_assoc($resultGetInstitutionList)); 
					  
                    }
                    else
                    {
                        
                       echo 'No record found Yet.';  
                    }
                    
                    ?>
                                                
                                        
                                        </tbody>
                                    </table>
                                </div>
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
                <!-- End Right sidebar -->
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
                'csv',  'pdf', 'print'
            ]
        });



        //==============Single================== // 
$(document).ready(function(){
  
  $('#exampleModalDelete').on('show.bs.modal', function (e) {
      var selDeleteID = $(e.relatedTarget).data('id');
      
      var dataString = '&selDeleteID='+ selDeleteID;
                    $.ajax({
                           type: "POST",
                           url: "../controller/scripts/owner/loadSelSingleSchoolDelPrompt.php",
                           data: dataString,
                           cache: false,
                           
                           success: function(result){
                              $('#displayDeleteMsg').html(result);	
                                                     
                           }
                       });
});	 
   
});

//============================================
$(document).ready(function(){
   $("#ProcToDelSelAgency").click(function(){
   
       var selSingleAgencyForDelID = $("#selSingleAgencyForDelID").val();
       
       
		    var dataString = '&selSingleAgencyForDelID='+ selSingleAgencyForDelID;
			$('#ProcToDelSelAgency').html('Deleting...<i class="fa fa-spinner fa-spin"></i>');
	                  
					  $.ajax({
							type: "POST",
							url: "../controller/scripts/owner/ProceedToDelSingleInstitution.php",
							data: dataString,
							cache: false,
							
							success: function(result){
							   $('#CompleteAgentDeleteOutput').html(result);				   
							   location.reload();	
							//$('#ProcToDelSelAgency').html('Yes! Delete');									   
							}
						});
		});	 
    
});
//=================================

//==============Cange Logo============================================================ //

$(document).ready(function(){
  
  $('#ChangeLogoModal').on('show.bs.modal', function (e) {

      var AgencyOrownerAgentLogoID = $(e.relatedTarget).data('id');
      var dataString = '&AgencyOrownerAgentLogoID='+ AgencyOrownerAgentLogoID;

            $.ajax({
                    type: "POST",
                    url: "../controller/scripts/owner/editAgencyLogo.php",
                    data: dataString,
                    cache: false,
                    
                    success: function(result){
                        $('#loadAgencyLogo').html(result);	
                                                
                    }
                });
});	 
   
});

//==============End Cange Logo========================================================= //
//============== Change Login Background Image ============================================================ //

$(document).ready(function(){
  
  $('#ChangeLoginBackground').on('show.bs.modal', function (e) {
      var AgencyOrownerLoginBgID = $(e.relatedTarget).data('id');
      
      var dataString = '&AgencyOrownerLoginBgID='+ AgencyOrownerLoginBgID;
                    $.ajax({
                           type: "POST",
                           url: "../controller/scripts/owner/editLoginBackgroundImage.php",
                           data: dataString,
                           cache: false,
                           
                           success: function(result){
                              $('#loadLoginBackround').html(result);	
                                                     
                           }
                       });
});	 
   
});

//==============End  Cange Login Background Image ============================================================ //
//============== Cange Login Background Image ============================================================ //

$(document).ready(function(){
  
  $('#ChangeIcon').on('show.bs.modal', function (e) {
      var AgencyOrownerIcon = $(e.relatedTarget).data('id');
      
      var dataString = '&AgencyOrownerIcon='+ AgencyOrownerIcon;
                    $.ajax({
                           type: "POST",
                           url: "../controller/scripts/owner/editIcon.php",
                           data: dataString,
                           cache: false,
                           
                           success: function(result){
                              $('#loadIcon').html(result);	
                                                     
                           }
                       });
});	 
   
});

//==============End  Cange Login Background Image ============================================================ //
        </script>

        <!-- Delet Single-->
<div class="modal fade" id="exampleModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div align="center" class="modal-content">
             
			<form>
				<div class="modal-body">
				        
					  <span id="CompleteAgentDeleteOutput"></span>
						
						<div id="displayDeleteMsg">
							<div align="center"><img src="../img/preloader.gif" /></div>
						</div> 
				</div>
			
				<div style="margin:auto; padding-bottom: 15px;">
					
					<button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
					<button id="ProcToDelSelAgency" type="button" class="btn btn-danger ProcToDelAllSelAgency">Yes! Delete</button>
				</div>
				
			</form>
            </div>
       </div>
</div>

<!--Change Logo for Agency/School Owner Begins-->

<div id="ChangeLogoModal" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div align="center" class="modal-content">
			<form id="uploadimageLogo" method="post"  enctype="multipart/form-data">
			<div class="imageUploadDisplayPointLogo" id="imageUploadDisplayPointLogo" align="center">
			       
			</div>
			<div id="loadAgencyLogo" class="modal-body">
			             <div align="center"><img src="../img/preloader.gif" /></div>	
			</div>
			<div style="margin:auto;" class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
				<button id="ProceedToChangeLogo" name="ProceedToChangeLogo" type="submit" class="btn btn-danger"><i style="color:white" class="ft-camera"></i> Change Logo</button>
				
	        </div>
			</form>
		</div>
		
	</div>
</div>  
<!--Change Logo for Agency/School Owner ends heer-->


<!--Change Login BG for Agency/School Owner Begins-->

<div id="ChangeLoginBackground" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div align="center" class="modal-content">
			<form id="uploadimageLogo" method="post"  enctype="multipart/form-data">
			<div class="imageUploadDisplayPointLoginBgImage" id="imageUploadDisplayPointLoginBgImage" align="center">
			       
			</div>
			<div id="loadLoginBackround" class="modal-body">
			             <div align="center"><img src="../img/preloader.gif" /></div>	
			</div>
			<div style="margin:auto;" class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
				<button id="ProceedToChangeLoginBgImage" name="ProceedToChangeLoginBgImage"  type="submit" class="btn btn-danger"><i style="color:white" class="ft-camera"></i> Change Login Image</button>
				
	        </div>
			</form>
		</div>
		
	</div>
</div>  
<!--Change Login BG for Agency/School Owner ends heer-->

<!--Change Icon for Agency/School Owner Begins-->

<div id="ChangeIcon" class="modal fade">
	<div class="modal-dialog modal-confirm">
		<div align="center" class="modal-content">
			<form id="uploadimageLogo" method="post"  enctype="multipart/form-data">
			<div class="imageUploadDisplayPointIcon" id="imageUploadDisplayPointIcon" align="center">
			       
			</div>
			<div id="loadIcon" class="modal-body">
			             <div align="center"><img src="../img/preloader.gif" /></div>	
			</div>
			<div style="margin:auto;" class="modal-footer">
				<button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
				<button id="ProceedToChangeIcon" name="ProceedToChangeIcon" style="color: white;  type="submit" class="btn btn-danger"><i style="color:white" class="ft-camera"></i> Change Icon Image</button>
				
	        </div>
			</form>
		</div>
		
	</div>
</div>  
<!--Change Icon for Agency/School Owner ends heer-->
</body>

</html>
