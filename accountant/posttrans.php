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
    <title>Post Income Transaction | <?php echo $PrimaryName.' '.$SecondaryName; ?></title>
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
            
         </nav>
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
                    <h2 class="text-themecolor" style="color: black; font-weight: 500;">Post Income Transaction</h2>
                </div>
                <div class="col-md-2 align-self-center" style="margin-bottom: -20px;">
                   
                </div>
                <div class="">
                    <!--<button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>-->
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
                        <div class="col-sm-4">
                            
                        </div>
                        <div class="col-sm-7">
                        </div>
                        <div class="col-sm-1">
                            <a href="incometrans.php" style="text-decoration:underline; color:blue;"><i class="fa fa-backward"></i> Back</a>
                        </div>
                    </div>
                    
                    <div class="row" style="margin-top:10px;">
                                <div class="col-12">
                                    <div class="card table-responsive">
                                        
                                        <div class="card-body">
                                        
                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Complete Fee</a>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Income From Other Sources</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                    
                                                    <div class="row" style="padding-top:10px;">
                                                        
                                                        <div class="col-md-1">
                                                            
                                                        </div>
                                                        <div class="col-md-2">
                                                            <form>
                                                                <div class="form-group">
                                                                    <select class="form-control" id="session" style="background: white; border-width: 1px; border-style: solid;">
                                                                        <option value="0" selected>Select Session</option>
                                                                        <?php  
                                                                            $sqlGetsession = ("SELECT * FROM `session`");
                                                                            $resultGetsession = mysqli_query($link, $sqlGetsession);
                                                                            $rowGetsession = mysqli_fetch_assoc($resultGetsession);
                                                                            $row_cntGetsession = mysqli_num_rows($resultGetsession);
                                                                        
                                                                        do{
                                                                                echo '<option value="' . $rowGetsession['sessionName']. '"> ' . $rowGetsession['sessionName'] . '</option>';
                                                                        
                                                                            }while($rowGetsession = mysqli_fetch_assoc($resultGetsession));
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <form>
                                                                <div class="form-group">
                                                                    <select class="form-control" id="faculty" style="background: white; border-width: 1px; border-style: solid;">
                                                                        <option value="0" selected>Select Faculty</option>
                                                                    </select>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <form>
                                                                <div class="form-group">
                                                                    <select class="form-control" id="class" style="background: white; border-width: 1px; border-style: solid;">
                                                                        <option value="0" selected>Select Class</option>
                                                                    
                                                                    </select>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <form>
                                                                <div class="form-group">
                                                                    <select class="form-control" id="term" style="background: white; border-width: 1px; border-style: solid;">
                                                                        <option value="0" selected>Select Term/Semester</option>
                                                                    
                                                                    </select>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <form>
                                                                <div class="form-group">
                                                                    <select class="form-control" id="student" style="background: white; border-width: 1px; border-style: solid;">
                                                                        <option value="0" selected>Select Student</option>
                                                                    </select>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <a href="#" id="loadStudfeedetails" type="button" class="btn chimaNormalBtn" style="width: 80px;">
                                                                <span style="font-size: 13px;">Load</span>
                                                            </a>                
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row" style="margin-top:10px;">
                                                        <div class="col-9">
                                                             
                                                        </div>
                                                        <div class="col-3">
                                                            <span id="hideoldbebtbtn" style="font-size:15px;">
                                                                <i class="fa fa-plus" style="color:#008E89;"></i>
                                                                <b>
                                                                    <a href="#" id="polddebtemtm" data-toggle="modal" data-target="#uploadolddeptmodal" style="color:color:#008E89;font-size 20px;text-decoration:underline;"> POST OLD DEBT</a> 
                                                                    | 
                                                                    <img src="https://img.icons8.com/fluency-systems-regular/20/85bf4b/pay.png"/><a href="#" id="payolddebtemtm" data-toggle="modal" data-target="#payolddeptmodal" style="color:color:#85bf4b;font-size 20px;text-decoration:underline;"> PAY OLD DEBT</a>
                                                                </b>
                                                            </span>
							
                                                        </div>
                                                    </div>
                                                    <!-- Modal to uploadolddeptmodal -->
                                        				<div class="modal fade" id="uploadolddeptmodal" tabindex="-1" role="dialog" aria-labelledby="uploadolddeptmodalLabel" aria-hidden="true">
                                        					<div class="modal-dialog" role="document">
                                        						<div class="modal-content">
                                        							<div class="modal-header">
                                        								<h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Post Student Old Debt</h5>
                                        								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        									<span aria-hidden="true">&times;</span>
                                        								</button>
                                        							</div>
                                        							<div class="modal-body">
                                        								<div id="olddeptuploadresponse"></div>
                                        								<div class="row">
                                        									<div class="col-12">
                                        										<div class="form-group">
                                        											<input type="number" class="form-control" id="olddeptupload" placeholder="Enter Amount"><br>
                                        										</div>
                                        									</div>
                                        								</div>
                                        							</div>
                                        							<div class="modal-footer">
                                        								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        								<button type="button" class="btn btn-primary" id="uploadstudolddeptbtn"><i class="fa fa-plus"></i> Post</button>
                                        							</div>
                                        						</div>
                                        					</div>
                                        				</div>
                                        			<!--Modal to uploadolddeptmodal-->
                                        			
                                        			<!-- Modal to uploadolddeptmodal -->
                                        				<div class="modal fade" id="payolddeptmodal" tabindex="-1" role="dialog" aria-labelledby="payolddeptmodalLabel" aria-hidden="true">
                                        					<div class="modal-dialog" role="document">
                                        						<div class="modal-content">
                                        							<div class="modal-header">
                                        								<h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Pay Student Old Debt</h5>
                                        								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        									<span aria-hidden="true">&times;</span>
                                        								</button>
                                        							</div>
                                        							<div class="modal-body">
                                        								<div id="olddeptpayresponse"></div>
                                        								<div class="row">
                                        								    <div class="col-lg-12">
                                                                                <div class="form-group">
                                                        							<select class="form-control" id="podmop" style="background: white; border-width: 1px; border-style: solid;">
                                                        								<option value="0" selected>Mode of Payment</option>
                                                        								<option value="transfer">Bank Transfer</option>
                                                        								<option value="deposit">Bank Deposit</option>
                                                        								<option value="cash">Cash Deposit</option>
                                                        								<option value="pos">P.O.S</option>
                                                        							</select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-lg-12">
                                                                                <div class="form-group">
                                                        							<input type="text" class="form-control" id="poddepositorrecipientname" placeholder="Depositor Name">
                                                                                </div>
                                                                            </div>
                                        									<div class="col-12">
                                        										<div class="form-group">
                                        											<input type="number" class="form-control" id="podolddeptpay" placeholder="Enter Amount"><br>
                                        										</div>
                                        									</div>
                                        									<div class="col-lg-12" style="display: none;">
                                                                                <div class="form-group">
                                                                                    <label>Proof of Payment <small>(Optional)</small>:</label>
                                                        							<input type="file" class="form-control" id="podpop">
                                                                                </div>
                                                                            </div>
                                        								</div>
                                        							</div>
                                        							<div class="modal-footer">
                                        								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        								<button type="button" class="btn btn-primary" id="paystudolddeptbtn"><img src="https://img.icons8.com/fluency-systems-regular/25/FFFFFF/pay.png"/> Pay</button>
                                        							</div>
                                        						</div>
                                        					</div>
                                        				</div>
                                        			<!--Modal to uploadolddeptmodal-->
                                        			
                                        			<!-- Modal to uploadolddeptmodal -->
                                        				<div class="modal fade" id="payolddeptfromdepositmodal" tabindex="-1" role="dialog" aria-labelledby="payolddeptfromdepositmodalLabel" aria-hidden="true">
                                        					<div class="modal-dialog" role="document">
                                        						<div class="modal-content">
                                        							<div class="modal-header">
                                        								<h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Pay Student Old Debt (From Deposit Balance)</h5>
                                        								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        									<span aria-hidden="true">&times;</span>
                                        								</button>
                                        							</div>
                                        							<div class="modal-body">
                                        								<div id="olddeptpayfromdepositresponse"></div>
                                        								<div class="row">
                                        									<div class="col-12">
                                        										<div class="form-group">
                                        											<input type="number" class="form-control" id="podolddeptpayfromdeposit" placeholder="Enter Amount"><br>
                                        										</div>
                                        									</div>
                                        								</div>
                                        							</div>
                                        							<div class="modal-footer">
                                        								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        								<button type="button" class="btn btn-primary" id="paystudolddepfromdeposittbtn"><img src="https://img.icons8.com/fluency-systems-regular/25/FFFFFF/pay.png"/> Pay</button>
                                        							</div>
                                        						</div>
                                        					</div>
                                        				</div>
                                        			<!--Modal to uploadolddeptmodal-->
                                        			
                                        			<!-- Modal to deleteolddeptmodal -->
                                        				<div class="modal fade" id="deleteolddeptmodal" tabindex="-1" role="dialog" aria-labelledby="deleteolddeptmodalLabel" aria-hidden="true">
                                        					<div class="modal-dialog" role="document">
                                        						<div class="modal-content">
                                        							<div class="modal-header">
                                        								<h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Delete Student Old Debt</h5>
                                        								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        									<span aria-hidden="true">&times;</span>
                                        								</button>
                                        							</div>
                                        							<div class="modal-body">
                                        								<div id="olddeptdeleteresponse"></div>
                                        								<div class="row">
                                        									<div class="col-12">
                                        										<div class="form-group">
                                        											<span style="color:red;">Are you sure you want to delete this student old debt?</span>
                                        										</div>
                                        									</div>
                                        								</div>
                                        							</div>
                                        							<div class="modal-footer">
                                        								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        								<button type="button" class="btn btn-danger" id="deletestudolddeptbtn"><i class="fa fa-trash"></i> Delete</button>
                                        							</div>
                                        						</div>
                                        					</div>
                                        				</div>
                                        			<!--Modal to uploadolddeptmodal-->
                                        			
                                        			<!-- Modal to deleteolddeptmodal -->
                                        				<div class="modal fade" id="postdepositpaymentmodal" tabindex="-1" role="dialog" aria-labelledby="postdepositpaymentmodalLabel" aria-hidden="true">
                                        					<div class="modal-dialog" role="document">
                                        						<div class="modal-content">
                                        							<div class="modal-header">
                                        								<h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Fee Deposit</h5>
                                        								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        									<span aria-hidden="true">&times;</span>
                                        								</button>
                                        							</div>
                                        							<div class="modal-body">
                                        								<div class="card-body">
                                                                            <div class="card-body">
                                                                                <div class="row">
                                                                                    <div class="col-lg-12">
                                                                                        <form>
                                                                                            <div class="form-group">
                                                                                                <label for="exampleInputName">Mode of Payment:</label>
                                                                                                <select class="form-control" id="depositpaymentmop" style="background: white; border-width: 1px; border-style: solid;">
                                                                                                    <option value="0" selected>Mode of Payment</option>
                                                                                                    <option value="transfer">Bank Transfer</option>
                                                                                                    <option value="deposit">Bank Deposit</option>
                                                                                                    <option value="cash">Cash Deposit</option>
                                                                                                    <option value="pos">P.O.S</option>
                                                                                                </select>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="exampleInputName">Name of Depositor:</label>
                                                                                                <input type="text" class="form-control" id="depositpaymentdepositorrecipientname" placeholder="Enter Name">
                                                                                            </div>
                                                                                            
                                                                                            <div class="form-group" style="display:none;">
                                                                                                <label for="exampleInputName">Proof of Payment (optional):</label>
                                                                                                <input type="file" name="pop" class="form-control" id="depositpaymentpop">
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <label for="exampleInputName">Amount:</label>
                                                                                                <input type="number" class="form-control depositamount" id="depositamount" placeholder="Amount">
                                                                                            </div>
                                                                                                    
                                                                                        </form>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="row" style="padding-top:10px;">
                                                                                <div class="col-lg-12" id="depositpaymentmsg">
                                                                                    <div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Please Input Amount Before Proceeding</center></div>
                                                                                </div>
                                                                                <div class="col-lg-12">
                                                                                    <button class="btn btn-info" id="postStuddepositpaymentbtn" type="submit" style="width:100%;">Post Payment</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                        							</div>
                                        						</div>
                                        					</div>
                                        				</div>
                                        			<!--Modal to uploadolddeptmodal-->
                                        			
                                        			<!-- Modal to deleteolddeptmodal -->
                                        				<div class="modal fade" id="depositpaymentmodal" tabindex="-1" role="dialog" aria-labelledby="depositpaymentmodalLabel" aria-hidden="true">
                                        					<div class="modal-dialog" role="document">
                                        						<div class="modal-content">
                                        							<div class="modal-header">
                                        								<h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Transfer Deposit Balance</h5>
                                        								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        									<span aria-hidden="true">&times;</span>
                                        								</button>
                                        							</div>
                                        							<div class="modal-body">
                                        								<div id="successmsgupdatedepositbal"></div>
                                        								<div class="row">
                                    										<div class="col-md-12">
                                                                                <form>
                                                                                    <div class="form-group">
                                                                                        <select class="form-control" id="depositpaymentmodalsession" style="background: white; border-width: 1px; border-style: solid;">
                                                                                            <option value="0" selected>Select Session</option>
                                                                                            <?php  
                                                                                                $sqlGetsession = ("SELECT * FROM `session`");
                                                                                                $resultGetsession = mysqli_query($link, $sqlGetsession);
                                                                                                $rowGetsession = mysqli_fetch_assoc($resultGetsession);
                                                                                                $row_cntGetsession = mysqli_num_rows($resultGetsession);
                                                                                            
                                                                                            do{
                                                                                                    echo '<option value="' . $rowGetsession['sessionName']. '"> ' . $rowGetsession['sessionName'] . '</option>';
                                                                                            
                                                                                                }while($rowGetsession = mysqli_fetch_assoc($resultGetsession));
                                                                                            ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                        								</div>
                                        								<div class="row">
                                    										<div class="col-md-12">
                                                                                <form>
                                                                                    <div class="form-group">
                                                                                        <select class="form-control" id="depositpaymentmodalterm" style="background: white; border-width: 1px; border-style: solid;">
                                                                                            <option value="0" selected>Select Term</option>
                                                                                            <?php  
                                                                                                $sqlGettermorsemester = ("SELECT * FROM `termorsemester`");
                                                                                                $resultGettermorsemester = mysqli_query($link, $sqlGettermorsemester);
                                                                                                $rowGettermorsemester = mysqli_fetch_assoc($resultGettermorsemester);
                                                                                                $row_cntGettermorsemester = mysqli_num_rows($resultGettermorsemester);
                                                                                            
                                                                                            do{
                                                                                                    echo '<option value="' . $rowGettermorsemester['TermOrSemesterName']. '"> ' . $rowGettermorsemester['TermOrSemesterName'] . '</option>';
                                                                                            
                                                                                                }while($rowGettermorsemester = mysqli_fetch_assoc($resultGettermorsemester));
                                                                                            ?>
                                                                                        </select>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                        								</div>
                                        								<div class="row">
                                        									<div class="col-12">
                                        										<div class="form-group">
                                        											<input type="number" class="form-control" id="depositbalanceamt" placeholder="Enter Amount"><br>
                                        										</div>
                                        									</div>
                                        								</div>
                                        							</div>
                                        							<div class="modal-footer">
                                        								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        								<button type="button" class="btn btn-info" id="updatedepositbalbtn"> Update</button>
                                        							</div>
                                        						</div>
                                        					</div>
                                        				</div>
                                        			<!--Modal to uploadolddeptmodal-->
                                        			
                                        			
                                        			<!-- Modal to adddeposittofeemodal -->
                                        				<div class="modal fade" id="adddeposittofeemodal" tabindex="-1" role="dialog" aria-labelledby="adddeposittofeemodalLabel" aria-hidden="true">
                                        					<div class="modal-dialog modal-xl" role="document">
                                        						<div class="modal-content">
                                        							<div class="modal-header">
                                        								<h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Add Deposit To Fee</h5>
                                        								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        									<span aria-hidden="true">&times;</span>
                                        								</button>
                                        							</div>
                                        							<div class="modal-body">
                                        								<div id="adddeposittofeeresponse"></div>
                                        								<div class="row">
                                        									<div class="col-12" id="adddeposittofeebody">
                                        										
                                        									</div>
                                        								</div>
                                        							</div>
                                        						</div>
                                        					</div>
                                        				</div>
                                        			<!--Modal to adddeposittofeemodal-->
                                        			
                                        			
                                                    <!-- Modal to morepayment -->
                                                    <div class="modal fade" id="morepaymentnewmodal" tabindex="-1" role="dialog" aria-labelledby="morepaymentnewmodalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> More Payment (Compulsory Payment)</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div id="morepaymentresponse"></div>
                                									<div class="row">
                                										<div class="col-12" id="Modalbodymorepayment">
                                										    
                                										</div>
                                									</div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <input id="holdmorepaymentamt" type="hidden">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary" id="morepaymentbtn"><i class="fa fa-plus"></i> Proceed</button>
                                                            
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Modal to morepayment-->
                                                    
                                                                                    
                                                    <!-- Modal to morepayment -->
                                                    <div class="modal fade" id="moreoptionalpaymentmodal" tabindex="-1" role="dialog" aria-labelledby="morepaymentmodalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> More Payment (Optional Payment)</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div id="moreoptionalpaymentresponse"></div>
                                									<div class="row">
                                										<div class="col-12" id="Modalbodymoreoptionalpayment">
                                										</div>
                                									</div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <input id="holdmoreoptionalpaymentamt" type="hidden">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary" id="moreoptionalpaymentbtn"><i class="fa fa-plus"></i> Proceed</button>
                                                            
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Modal to morepayment-->
                                                    
                                                    <div class="row" style="margin-top:10px;">
                                                        <div class="col-12">
                                                            <div class="card table-responsive">
                                                                
                                                                <div class="card-body" id="body">
                                                                    
                                                                    <div class="alert alert-primary" role="alert">
                                                                        <center>
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                                                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                                                            </svg>
                                                                            Please Filter Before Proceeding
                                                                        </center>
                                                                    </div>
                                                                </div>
                                                            </div>  
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                    
                                                    <div class="row" style="padding-top:10px;">
                                                        
                                                        <div class="col-md-5">
                                                            
                                                        </div>
                                                        <div class="col-md-2">
                                                            <form>
                                                                <div class="form-group">
                                                                    <select class="form-control" id="othercategory" style="background: white; border-width: 1px; border-style: solid;">
                                                                        <option value="0" selected>Select Category</option>
                                                                        <?php  
                                                                            $sqlGetcategory = ("SELECT * FROM `category` WHERE `InstitutionID`='$InstitutionID' AND `categoryType`='others' AND `configType`='income'");
                                                                            $resultGetcategory = mysqli_query($link, $sqlGetcategory);
                                                                            $rowGetcategory = mysqli_fetch_assoc($resultGetcategory);
                                                                            $row_cntGetcategory = mysqli_num_rows($resultGetcategory);

                                                                            if($row_cntGetcategory > 0)
                                                                            {
                                                                                do{
                                                                                    echo '<option value="' . $rowGetcategory['categoryID']. '"> ' . $rowGetcategory['categoryTitle'] . '</option>';
                                                                            
                                                                                }while($rowGetcategory = mysqli_fetch_assoc($resultGetcategory));
                                                                            }
                                                                            else
                                                                            {

                                                                            }
                                                                        
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <form>
                                                                <div class="form-group">
                                                                    <select class="form-control" id="othersession" style="background: white; border-width: 1px; border-style: solid;">
                                                                        <option value="0" selected>Select Session</option>
                                                                        <?php  
                                                                            $sqlGetsession = ("SELECT * FROM `session`");
                                                                            $resultGetsession = mysqli_query($link, $sqlGetsession);
                                                                            $rowGetsession = mysqli_fetch_assoc($resultGetsession);
                                                                            $row_cntGetsession = mysqli_num_rows($resultGetsession);
                                                                        
                                                                        do{
                                                                                echo '<option value="' . $rowGetsession['sessionName']. '"> ' . $rowGetsession['sessionName'] . '</option>';
                                                                        
                                                                            }while($rowGetsession = mysqli_fetch_assoc($resultGetsession));
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <form>
                                                                <div class="form-group">
                                                                    <select class="form-control" id="otherterm" style="background: white; border-width: 1px; border-style: solid;">
                                                                        <option value="0" selected>Select Term</option>
                                                                        <?php  
                                                                            $sqlGettermorsemester = ("SELECT * FROM `termorsemester`");
                                                                            $resultGettermorsemester = mysqli_query($link, $sqlGettermorsemester);
                                                                            $rowGettermorsemester = mysqli_fetch_assoc($resultGettermorsemester);
                                                                            $row_cntGettermorsemester = mysqli_num_rows($resultGettermorsemester);
                                                                        
                                                                        do{
                                                                                echo '<option value="' . $rowGettermorsemester['TermOrSemesterName']. '"> ' . $rowGettermorsemester['TermOrSemesterName'] . '</option>';
                                                                        
                                                                            }while($rowGettermorsemester = mysqli_fetch_assoc($resultGettermorsemester));
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="col-md-1">
                                                            <button id="loadothertransdetails" type="button" class="btn chimaNormalBtn" style="width: 80px;">
                                                                <span style="font-size: 13px;">Load</span>
                                                            </button>                
                                                        </div>
                                                    </div>
                                                    <div class="row" style="margin-top:10px;">
                                                        <div class="col-12">
                                                            <div class="card table-responsive">
                                                                
                                                                <div class="card-body" id="otherbody">
                                                                    <div class="alert alert-primary" role="alert">
                                                                        <center>
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                                                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                                                            </svg>
                                                                            Please Filter Before Proceeding
                                                                        </center>
                                                                    </div>
                                                                </div>
                                                            </div>  
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                    
                                        </div>
                                    </div>  
                                </div>
                            </div>
                    
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
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
 
     <script>
            //========COMPLETE FEE START=======//
                $(document).ready(function(){
                    $('#hideoldbebtbtn').hide();
                });
            
                $("#session").change(function(){
                        
                    $('#faculty').html('');
                    $('#faculty').append($('<option>').val(0).text('Loading...'));
                    
                    var institution = "<?php echo $InstitutionID; ?>";
                    var session = $("#session").val();
                    
                    var dataString = 'institution='+ institution + '&session='+ session;
                    
                    if(session == '0' || session == '')
                    {
                        $('#faculty').html('');
                        $('#faculty').append($('<option>').val(0).text('Select Session First'));
                    }
                    else
                    {
                        // alert(dataString);
                        
                        $.ajax({
                            type : 'post',
                            url: "../controller/scripts/owner/gettrans_faculty.php",
                            data :  dataString,
                            success : function(result)
                            {
                                var obj1 = JSON.parse(result);
                                console.log(obj1);
                                
                                var z;
                                var facultyname = "";
                                var facultyID = "";
                                
                                $('#faculty').html('');
                                $('#faculty').append($('<option>').val(0).text('Select Faculty'));
                        
                                for (z = 0; z < obj1.length; z++) 
                                {
                                    facultyname = obj1[z].FacultyOrSchoolName;
                                    facultyID = obj1[z].FacultyOrSchoolID;
                                    $('#faculty').append($('<option>').val(facultyID).text(facultyname));
        
                                }
                            }
                        });
                    
                    }
                    
                });
                
                $("#faculty").change(function(){
                        
                    $('#class').html('');
                    $('#class').append($('<option>').val(0).text('Loading...'));
                    
                    var institution = "<?php echo $InstitutionID; ?>";
                    var faculty = $("#faculty").val();
                    
                    var dataString = 'institution='+ institution + '&faculty='+ faculty;
                    
                    if(faculty == '0' || faculty == '')
                    {
                        $('#class').html('');
                        $('#class').append($('<option>').val(0).text('Select Faculty First'));
                    }
                    else
                    {
                        // alert(dataString);
                        
                        $.ajax({
                            type : 'post',
                            url: "../controller/scripts/owner/gettrans_class.php",
                            data :  dataString,
                            success : function(result)
                            {
                                var obj1 = JSON.parse(result);
                                console.log(obj1);
                                
                                var z;
                                var classname = "";
                                var classID = "";
                                
                                $('#class').html('');
                                $('#class').append($('<option>').val(0).text('Select Class'));
                        
                                for (z = 0; z < obj1.length; z++) 
                                {
                                    classname = obj1[z].ClassOrDepartmentName;
                                    classID = obj1[z].ClassOrDepartmentID;
                                    $('#class').append($('<option>').val(classID).text(classname));
        
                                }
                            }
                        });
                    
                    }
                    
                });
                
                $("#class").change(function(){
                        
                    $('#term').html('');
                    $('#term').append($('<option>').val(0).text('Loading...'));
                    
                    var institution = "<?php echo $InstitutionID; ?>";
                    var classid = $("#class").val();
                    
                    var dataString = 'institution='+ institution + '&classid='+ classid;
                    
                    if(classid == '0' || classid == '')
                    {
                        $('#term').html('');
                        $('#term').append($('<option>').val(0).text('Select Class First'));
                    }
                    else
                    {
                        // alert(dataString);
                        
                        $.ajax({
                            type : 'post',
                            url: "../controller/scripts/owner/gettrans_term.php",
                            data :  dataString,
                            success : function(result)
                            {
                                var obj1 = JSON.parse(result);
                                console.log(obj1);
                                
                                var z;
                                var termname = "";
                                var termID = "";
                                
                                $('#term').html('');
                                $('#term').append($('<option>').val(0).text('Select Term'));
                        
                                for (z = 0; z < obj1.length; z++) 
                                {
                                    termname = obj1[z].TermOrSemesterName;
                                    termID = obj1[z].TermOrSemesterID;
                                    $('#term').append($('<option>').val(termname).text(termname));
        
                                }
                            }
                        });
                    
                    }
                    
                });
                
                $("#term").change(function(){
                        
                    $('#student').html('');
                    $('#student').append($('<option>').val(0).text('Loading...'));
                    
                    var institution = "<?php echo $InstitutionID; ?>";
                    var termid = $("#term").val();
                    var classid = $("#class").val();
                    var session = $("#session").val();
                    
                    var dataString = 'institution='+ institution + '&termid='+ termid + '&classid='+ classid + '&session='+ session;
                    
                    if(termid == '0' || termid == '')
                    {
                        $('#student').html('');
                        $('#student').append($('<option>').val(0).text('Select Term First'));
                    }
                    else
                    {
                        $.ajax({
                            type : 'post',
                            url: "../controller/scripts/owner/gettrans_student.php",
                            data :  dataString,
                            success : function(result)
                            {
                            
                                $('#student').html(result);
        
                            }
                        });
                    
                    }
                    
                });
                
                $("#loadStudfeedetails").click(function(){
                    
                    $("#loadStudfeedetails").html('<i class="fa fa-spinner fa-spin"></i>');
                    $("#body").html('<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');
                    
                    var institution = "<?php echo $InstitutionID; ?>";
                    var userid = "<?php echo $UserID; ?>";
                    var usertype = "<?php echo $userType; ?>";
                    var session = $("#session").val();
                    var faculty = $("#faculty").val();
                    var classid = $("#class").val();
                    var termid = $("#term").val();
                    var student = $("#student").val();
                    
                    var dataString = 'institution='+ institution + '&termid='+ termid + '&classid='+ classid + '&session='+ session + '&faculty='+ faculty + '&userid='+ userid + '&usertype='+ usertype + '&student='+ student;
                    
                    if(session == ' ' || session == "0")
                    {
                        $("#loadStudfeedetails").html('Load');
                        $("#body").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Please Select Session</center></div>');
                    }
                    else if(faculty == '' || faculty == '0')
                    {
                        $("#loadStudfeedetails").html('Load');
                        $("#body").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Please Select Faculty</center></div>');
                    }
                    else if(classid == '' || classid == '0')
                    {
                        $("#loadStudfeedetails").html('Load');
                        $("#body").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Please Select Class</center></div>');
                    }
                    else if(termid == '' || termid == '0')
                    {
                        $("#loadStudfeedetails").html('Load');
                        $("#body").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Please Select Term</center></div>');
                    }
                    else if(student == '' || student == '0')
                    {
                        $("#loadStudfeedetails").html('Load');
                        $("#body").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Please Select Student</center></div>');
                    }
                    else
                    {
                        
                        $.ajax({
                            type : 'post',
                            url: "../controller/scripts/owner/studcompletefeeinfo.php",
                            data :  dataString,
                            success : function(result)
                            {
                                $("#loadStudfeedetails").html('Load');
                                $("#body").html(result);
                                $('#hideoldbebtbtn').show();
                                $("#hidetransportone").hide();
                                $("#hidetotalamount").hide();
                                $("#totalll").hide();
                                $("#hidetransportoneadddeposittofee").hide();
                                $("#hidetotalamountadddeposittofee").hide();
                                $("#totallladddeposittofee").hide();
                            }
                        });
                    }
                    
                });
                
                $("#uploadstudolddeptbtn").click(function(){
                    
                    // alert('suuny');
                    $("#uploadstudolddeptbtn").html('<i class="fa fa-spinner fa-spin"></i>');
                    
                    var institution = "<?php echo $InstitutionID; ?>";
                    var userid = "<?php echo $UserID; ?>";
                    var usertype = "<?php echo $userType; ?>";
                    var session = $("#session").val();
                    var faculty = $("#faculty").val();
                    var classid = $("#class").val();
                    var termid = $("#term").val();
                    var student = $("#student").val();
                    var olddeptuploadamt = $("#olddeptupload").val();
                    
                    var dataString = 'institution='+ institution + '&termid='+ termid + '&classid='+ classid + '&session='+ session + '&faculty='+ faculty + '&userid='+ userid + '&usertype='+ usertype + '&student='+ student + '&olddeptuploadamt='+ olddeptuploadamt;
                    
                    if(session == '' || session == "0" || faculty == '' || faculty == '0' || classid == '' || classid == '0' || termid == '' || termid == '0' || student == '' || student == '0')
                    {
                        $("#uploadstudolddeptbtn").html('Post');
                        $("#olddeptuploadresponse").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Please Filter Before Proceeding</center></div>');
                    }
                    else if(olddeptuploadamt == '' || olddeptuploadamt == "0")
                    {
                        $("#uploadstudolddeptbtn").html('Post');
                        $("#olddeptuploadresponse").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Please Type in Amount</center></div>');
                    }
                    else
                    {
                        
                        $.ajax({
                            type : 'post',
                            url: "../controller/scripts/owner/postStudolddebt.php",
                            data :  dataString,
                            success : function(result)
                            {
                                
                                
                                              $.ajax({
                                                type : 'post',
                                                url: "../controller/scripts/owner/GetStudolddebt.php",
                                                data :  dataString,
                                                success : function(resultoutput)
                                                {
                                                    $("#getolddept").html(resultoutput);
                                                            
                                                }
                                              });
                                              
                                     //=======================================================         
                                              $.ajax({
                                                    type : 'post',
                                                    url: "../controller/scripts/owner/studcompletefeeinfo.php",
                                                    data :  dataString,
                                                    success : function(result)
                                                    {
                                                        $("#loadStudfeedetails").html('Load');
                                                        $("#body").html(result);
                                                        $('#hideoldbebtbtn').show();
                                                    }
                                                });
                                
                                
                                $("#uploadstudolddeptbtn").html('Post');
                                
                                $("#olddeptuploadresponse").html(result);
                                        
                            }
                        });
                    }
                    
                });
                
                $("#paystudolddeptbtn").click(function(){
                    
                    // alert('suuny');
                    $("#paystudolddeptbtn").html('<i class="fa fa-spinner fa-spin"></i>');
                    
                    var institution = "<?php echo $InstitutionID; ?>";
                    var userid = "<?php echo $UserID; ?>";
                    var usertype = "<?php echo $userType; ?>";
                    var session = $("#session").val();
                    var faculty = $("#faculty").val();
                    var classid = $("#class").val();
                    var termid = $("#term").val();
                    var student = $("#student").val();
                    var podolddeptpay = $("#podolddeptpay").val();
                    var podmop = $("#podmop").val();
                    var poddepositorrecipientname = $("#poddepositorrecipientname").val();
                    
                    var dataString = 'institution='+ institution + '&termid='+ termid + '&classid='+ classid + '&session='+ session + '&faculty='+ faculty + '&userid='+ userid + '&usertype='+ usertype + '&student='+ student + '&podolddeptpay='+ podolddeptpay + '&podmop='+ podmop + '&poddepositorrecipientname='+ poddepositorrecipientname;
                    
                    var formData = new FormData();
                    var podpop = $('#podpop')[0].files[0];
                    formData.append('podpop', podpop);
                    formData.append('institution', institution);
                    formData.append('userid', userid);
                    formData.append('usertype', usertype);
                    formData.append('session', session);
                    formData.append('faculty', faculty);
                    formData.append('classid', classid);
                    formData.append('termid', termid);
                    formData.append('student', student);
                    formData.append('podolddeptpay', podolddeptpay);
                    formData.append('podmop', podmop);
                    formData.append('poddepositorrecipientname', poddepositorrecipientname);
                    
                    if(session == '' || session == "0" || faculty == '' || faculty == '0' || classid == '' || classid == '0' || termid == '' || termid == '0' || student == '' || student == '0')
                    {
                        $("#paystudolddeptbtn").html('Post');
                        $("#olddeptpayresponse").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Please Filter Before Proceeding</center></div>');
                    }
                    else if(podolddeptpay == '' || podolddeptpay == "0")
                    {
                        $("#paystudolddeptbtn").html('Post');
                        $("#olddeptpayresponse").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Please Type in Amount</center></div>');
                    }
                    else
                    {
                        
                        $.ajax({
                            type: "POST",
                            url: "../controller/scripts/owner/PayStudolddebt.php",
                            method:'POST',
                            data: formData,
                            cache:false,
                            contentType: false,
                            processData: false,
                            success : function(result)
                            {
                                
                                
                                              $.ajax({
                                                type : 'post',
                                                url: "../controller/scripts/owner/GetStudolddebt.php",
                                                data :  dataString,
                                                success : function(resultoutput)
                                                {
                                                    $("#getolddept").html(resultoutput);
                                                            
                                                }
                                              });
                                              
                                     //=======================================================         
                                              $.ajax({
                                                    type : 'post',
                                                    url: "../controller/scripts/owner/studcompletefeeinfo.php",
                                                    data :  dataString,
                                                    success : function(result)
                                                    {
                                                        $("#loadStudfeedetails").html('Load');
                                                        $("#body").html(result);
                                                        $('#hideoldbebtbtn').show();
                                                    }
                                                });
                                
                                
                                $("#paystudolddeptbtn").html('<img src="https://img.icons8.com/fluency-systems-regular/25/FFFFFF/pay.png"/> Pay');
                                
                                $("#olddeptpayresponse").html(result);
                                        
                            }
                        });
                    }
                    
                });
                
                $("#polddebtemtm").click(function(){
                    $("#olddeptuploadresponse").html('');
                    $("#olddeptupload").val('');
                });
                
                $("#payolddebtemtm").click(function(){
                    $("#olddeptpayresponse").html('');
                    $("#podolddeptpay").val('');
                    $("#poddepositorrecipientname").val('');
                    $("#podpop").val('');
                    $('#podmop').val(0);
                });
                
                $('#deleteolddeptmodal').on('show.bs.modal', function (e) {
                    $("#olddeptdeleteresponse").html('');
                });
                
                $("body").on("click","#deletestudolddeptbtn",function(){
                    
                    // alert('suuny');
                     $("#deletestudolddeptbtn").html('<i class="fa fa-spinner fa-spin"></i>');
                    
                    var institution = "<?php echo $InstitutionID; ?>";
                    var userid = "<?php echo $UserID; ?>";
                    var usertype = "<?php echo $userType; ?>";
                    var session = $("#session").val();
                    var faculty = $("#faculty").val();
                    var classid = $("#class").val();
                    var termid = $("#term").val();
                    var student = $("#student").val();
                    
                    var dataString = 'institution='+ institution + '&termid='+ termid + '&classid='+ classid + '&session='+ session + '&faculty='+ faculty + '&userid='+ userid + '&usertype='+ usertype + '&student='+ student;
                    
                    $.ajax({
                        type : 'post',
                        url: "../controller/scripts/owner/Deletestudolddebt.php",
                        data :  dataString,
                        success : function(result)
                        {
                                     $.ajax({
                                        type : 'post',
                                        url: "../controller/scripts/owner/GetStudolddebt.php",
                                        data :  dataString,
                                        success : function(resultoutput)
                                        {
                                            $("#getolddept").html(resultoutput);
                                                    
                                        }
                                      });
                                      
                                      //=======================================================         
                                              $.ajax({
                                                    type : 'post',
                                                    url: "../controller/scripts/owner/studcompletefeeinfo.php",
                                                    data :  dataString,
                                                    success : function(result)
                                                    {
                                                        $("#loadStudfeedetails").html('Load');
                                                        $("#body").html(result);
                                                        $('#hideoldbebtbtn').show();
                                                    }
                                                });
                              
                              
                              
                              
                            $("#deletestudolddeptbtn").html('Delete');
                            $("#olddeptdeleteresponse").html(result);
                                    
                        }
                    });
                });
                
                $('body').on("change",".sunnycheckbox",function(){
                    
                    $(".removeall").show();
                    $("#totalll").show();
                    $('#transchangehide').show();
                    $('#hidetotalamount').hide();
        
                    var multipleSelSubcatId = $(this).val();
                    var sunnystatus = $("#sunnystatus").val();
                    var Subcatname = $(this).data('subcatname');
                    var amount = $(this).data('amount');
                    var msgg = $(this).data('msgg');
                    var amountchecked = [];
                    var SubcatId = [];
                    
                    if(msgg == '' || msgg == 0)
                    {
                        var checkicon = '';
                    }
                    else
                    {
                        var checkicon = '<i class="fa fa-check" aria-hidden="true" style="color:green;"></i>';
                    }
        
                    $.each($("input[name='multipleSelSubcatId']:checked"), function(){
                        amountchecked.push($(this).data('amount'));
                        SubcatId.push($(this).val());
                    });
        
                    var routamounttotalamount = $("#routamount").val();
                    var totalamount = $("#totalamount").val();
                    
                    var sumtall = amountchecked.reduce(function(a, b){
                        return a + b;
                    }, 0);
                    
                    // alert(totalamount);
                    var checkall = $(this).prop("checked");

                    if(sunnystatus == 0)
                    {
                        statname = 'Credit';
                    }
                    else if(sunnystatus == 1)
                    {
                        statname = 'Normal';
                    }
                    else if(sunnystatus == 2)
                    {
                        statname = 'Discount';
                    }
                    else if(sunnystatus == 3)
                    {
                        statname = 'Scholarship';
                    }

                    if(((routamounttotalamount == 0 || routamounttotalamount == '') || (routamounttotalamount != 0 || routamounttotalamount != '')) && (sunnystatus == '2' || sunnystatus == '3'))
                    {
                        $(".topostdissch").val(0);
                        if(checkall == false)
                        {
                            var totalamount = $("#totalamount").val();
                            var addedamount = $('#total'+multipleSelSubcatId).val();

                            // alert(addedamount);

                            if(amountchecked == 0 || amountchecked == '' || amountchecked == undefined)
                            {
                                $("#totalamount").val(0);
                                $('#row'+multipleSelSubcatId).remove();
                                $('#totalll').hide();
                                $("#msg").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Nothing has been selected</center></div>');
                                $('#transchangehide').hide();
                                $("#transprechangehide").hide();
                                $('#postpaymentbtn').html('Post Payment');
                            }
                            else
                            {
                                // alert(addedamount);
                                $('#row'+multipleSelSubcatId).remove();
                                $("#msg").html('');

                                var sum = (+totalamount) - (+addedamount);
                                var commasum = sum.toLocaleString();
                                $('#totalll').show();
                                $('#totalamount').val(sum);
                                $('#postpaymentbtn').html('Post Payment (&#8358; '+commasum+')');
                            }
                        }
                        else
                        {
                            if(sunnystatus == '2' || sunnystatus == '3')
                            {
                                $('#summary').append('<form><div align="left" id="row'+multipleSelSubcatId+'" class="form-group row" style="color:black;"><label for="inputPassword" class="col-lg-3 col-form-label">'+Subcatname+'</label><div class="col-lg-4"><input type="number" class="form-control fixedamount" disabled value="'+amount+'"><input type="hidden" class="form-control subcatid" disabled value="'+multipleSelSubcatId+'"></div><div class="col-lg-2"><input type="number" id="totaldissch'+multipleSelSubcatId+'" data-subcatname="'+Subcatname+'" data-fixedamount="'+amount+'" data-id="'+multipleSelSubcatId+'" class="form-control disschamount" placeholder="Amount" value="0"><br><small>'+statname+'</small></div><div class="col-lg-3"><a href="javascript:;" class="btn_schodis" data-subcatname="'+amount+'" data-subcatid="'+multipleSelSubcatId+'" data-selamount="'+amount+'" id="'+multipleSelSubcatId+'"><i class="fa fa-times fa-2x text-danger"></i></a></div></div></form>');
                                $("#msg").html('');
                                $('#transchangehide').hide();
                                $("#transprechangehide").hide();
                                $('#totalll').hide(); 
                            }
                        }
                    }
                    else
                    {
                        if(checkall == false)
                        {
                            if((sumtall == 0 || sumtall == '' || sumtall == undefined) && (routamounttotalamount == '0' || routamounttotalamount == ''))
                            {
                                $("#totalamount").val(0);
                                $('#row'+multipleSelSubcatId).remove();
                                $('#totalll').hide();
                                $("#msg").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Nothing has been selected</center></div>');
                                $('#transchangehide').hide();
                                $("#transprechangehide").hide();
                                
                                $('#postpaymentbtn').html('Post Payment');
                            }
                            else
                            {
                                // alert(addedamount);
                                $('#row'+multipleSelSubcatId).remove();
                                $("#msg").html('');
        
                                var sum = (+sumtall) + (+routamounttotalamount);
                                var commasum = sum.toLocaleString();
                                $('#totalll').show();
                                $('#totalamount').val(sum);
                                $('#postpaymentbtn').html('Post Payment (&#8358;'+commasum+')');
                            }
                        }
                        else
                        {
                            if(routamounttotalamount == 0 || routamounttotalamount == '')
                            {
                                var newtotalamount = (+sumtall);
                            
                                $('#summary').append('<form><div align="left" id="row'+multipleSelSubcatId+'" class="form-group row" style="color:black;"><label for="inputPassword" class="col-lg-3 col-form-label">'+Subcatname+'</label><div class="col-lg-4"><input type="number" class="form-control" disabled value="'+amount+'"><br><small style="color:green;">'+msgg+' '+checkicon+'</small></div><div class="col-lg-3"><a href="javascript:;" class="btn_remove" data-subcatname="'+amount+'" data-catid="'+multipleSelSubcatId+'" data-selamount="'+amount+'" id="'+multipleSelSubcatId+'"><i class="fa fa-times fa-2x text-danger"></i></a></div></div></form>'); //add input box
                                
                                var commasum = newtotalamount.toLocaleString();
                                $('#totalll').show();
                                $('#totalamount').val(newtotalamount);
                                $('#postpaymentbtn').html('Post Payment (&#8358;'+commasum+')');
                                $("#msg").html('');
                        
                            }
                            else
                            {
                                var newtotalamount = (+amount) + (+totalamount);
                            
                                $('#summary').append('<form><div align="left" id="row'+multipleSelSubcatId+'" class="form-group row" style="color:black;"><label for="inputPassword" class="col-lg-3 col-form-label">'+Subcatname+'</label><div class="col-lg-4"><input type="number" class="form-control" disabled value="'+amount+'"><br><small style="color:green;">'+msgg+' '+checkicon+'</small></div><div class="col-lg-3"><a href="javascript:;" class="btn_remove" data-subcatname="'+amount+'" data-catid="'+multipleSelSubcatId+'" data-selamount="'+amount+'" id="'+multipleSelSubcatId+'"><i class="fa fa-times fa-2x text-danger"></i></a></div></div></form>'); //add input box
                                
                                var commasum = newtotalamount.toLocaleString();
                                $('#totalll').show();
                                $('#totalamount').val(newtotalamount);
                                $('#postpaymentbtn').html('Post Payment (&#8358;'+commasum+')');
                                $("#msg").html('');
                        
                            }
                            
                        }
                    }
        
                });
        
                $('body').on("change",".radiobtn",function(){
                    
                    var routamount = $(this).val();
                    var routid = $(this).data('routid');
                    var routname = $(this).data('routname');
                    var msggtp = $(this).data('msggtp');
                    var student = $('#transportstudent').val();
                    var classid = $('#transportclass').val();
                    var term = $('#transportterm').val();
                    var session = $('#transportsession').val();
                    var sunnystatus = $("#sunnystatus").val();
        
        
                    if(msggtp == '' || msggtp == 0)
                    {
                        var checkicon = '';
                    }
                    else
                    {
                        var checkicon = '<i class="fa fa-check" aria-hidden="true" style="color:green;"></i>';
                    }
        
                    var routamounttotalamount = $("#routamount").val();
                    
                    $('#routename').html(routname);
                    $('#routenamesec').val(routname);
                    $('#routamount').val(routamount);
                    $('#routid').val(routid);
                    $('#feequantity').val(1);
                    
                    var totalamount = $("#totalamount").val();
                    
                    // alert(totalamount);
                    if(sunnystatus == '1')
                    {
                        
                        $("#hidetransportone").show();
                    
                        $('#statustitle').html('Normal');
                        $('#statustitleapplied').html(msggtp+' '+checkicon);
                        
                        if(totalamount == 0 || totalamount == '' || totalamount == undefined)
                        {
                            $("#totalll").show();
                            $("#totalamount").val(routamount);
                            var sum = parseInt(routamount);
                            var commasum = sum.toLocaleString();
                            $("#msg").html('');
                            $('#postpaymentbtn').html('Post Payment (&#8358;'+commasum+')');
                        
                        }
                        else
                        {
                            var newtotamt = (+totalamount) - (+routamounttotalamount);
                            
                            var sum = parseInt((+newtotamt) + (+routamount));
                        
                            var commasum = sum.toLocaleString();
                            $('#totalll').show();
                            $('#totalamount').val(sum);
                            $("#msg").html('');
                            $('#postpaymentbtn').html('Post Payment (&#8358;'+commasum+')');
                            
                        }
                    }
                    else if(sunnystatus == '3')
                    {
                        $('#statustitle').html('Scholarship');
                        $('.feequantitytransport').val(0);
                        $("#msg").html('');

                        $('#summary').append('<form><div align="left" id="row'+routid+'" class="form-group row" style="color:black;"><label for="inputPassword" class="col-lg-3 col-form-label">'+routname+'</label><div class="col-lg-4"><input type="number" class="form-control fixedamount" disabled value="'+routamount+'"><input type="hidden" class="form-control subcatid" disabled value="'+routid+'"></div><div class="col-lg-2"><input type="number" id="totaldissch'+routid+'" data-subcatname="'+routname+'" data-fixedamount="'+routamount+'" data-id="'+routid+'" class="form-control disschamount" placeholder="Amount" value="0"><br><small>Scholarship</small></div><div class="col-lg-3"><a href="javascript:;" class="btn_schodis" data-subcatname="'+routamount+'" data-subcatid="'+routid+'" data-selamount="'+routamount+'" id="'+routid+'"><i class="fa fa-times fa-2x text-danger"></i></a></div></div></form>');
                        
                    }
                    else if(sunnystatus == '2')
                    {
                        $('#statustitle').html('Discount');
                        $('.feequantitytransport').val(0);
                        $("#msg").html('');

                        $('#summary').append('<form><div align="left" id="row'+routid+'" class="form-group row" style="color:black;"><label for="inputPassword" class="col-lg-3 col-form-label">'+routname+'</label><div class="col-lg-4"><input type="number" class="form-control fixedamount" disabled value="'+routamount+'"><input type="hidden" class="form-control subcatid" disabled value="'+routid+'"></div><div class="col-lg-2"><input type="number" id="totaldissch'+routid+'" data-subcatname="'+routname+'" data-fixedamount="'+routamount+'" data-id="'+routid+'" class="form-control disschamount topostdissch" placeholder="Amount" value="0"><br><small>Discount</small></div><div class="col-lg-3"><a href="javascript:;" class="btn_schodis" data-subcatname="'+routamount+'" data-subcatid="'+routid+'" data-selamount="'+routamount+'" id="'+routid+'"><i class="fa fa-times fa-2x text-danger"></i></a></div></div></form>');
                        
                    }
                    else
                    {
                        $('#statustitle').html('Credit');
                        $('.feequantitytransport').val(1);
                       
                        if(totalamount == 0 || totalamount == '' || totalamount == undefined)
                        {
                            
                            var commasum = routamount.toLocaleString();
                            $("#msg").html('');
                            $("#totalll").show();
                            $("#totalamount").val(routamount);
                            $('#postpaymentbtn').html('Post Payment (&#8358; '+commasum+')');
                        
                        }
                        else
                        {
                            if(routamounttotalamount == 0 || routamounttotalamount == '')
                            {
                                var newtotamt = (+totalamount) - (+routamounttotalamount);
                                
                                var sum = parseInt((+totalamount) + (+routamount));
                            
                                var commasum = sum.toLocaleString();
                                $('#totalll').show();
                                $('#totalamount').val(sum);
                                $("#msg").html('');
                                $('#postpaymentbtn').html('Post Payment (&#8358; '+commasum+')');
                            }
                            else
                            {
                                if(transportamountfeequan == routamounttotalamount || transportamountfeequan == 0)
                                {
                                    var sum = parseInt(((+totalamount) - (+routamounttotalamount)) + (+routamount));
                            
                                    var commasum = sum.toLocaleString();
                                    $('#totalll').show();
                                    $('#totalamount').val(sum);
                                    $("#msg").html('');
                                    $('#postpaymentbtn').html('Post Payment (&#8358; '+commasum+')');
                                }
                                else
                                {
                                    var sum = parseInt(((+totalamount) - (+transportamountfeequan)) + (+routamount));
                            
                                    var commasum = sum.toLocaleString();
                                    $('#totalll').show();
                                    $('#totalamount').val(sum);
                                    $("#msg").html('');
                                    $('#postpaymentbtn').html('Post Payment (&#8358; '+commasum+')');
                                }
                                
                            }
        
                        }
                    }
                    
                });
                
                $('body').on('click','.btn_remove', function(){
                    
                    var button_id = $(this).data("catid");
                    $(this).parents('#row'+button_id).remove();
                    
                    $('input:checkbox[value="' + button_id + '"]').prop('checked', false);

                    var button_quan = $('#total'+button_id).val();

                    // alert(button_id);
                    var totalamount = $("#totalamount").val();
                    // alert('total='+totalamount);

                    if(button_quan == '0' || button_quan == '' || button_quan == undefined)
                    {
                        var button_idamt = $(this).data("selamount");

                        var sum = (+totalamount) - (+button_idamt);
                        var commasum = sum.toLocaleString();
                        $('#totalamount').val(sum);
                        $('#postpaymentbtn').html('Post Payment (&#8358; '+commasum+')');

                        $('.btn_remove').data('selamount', 0);

                        // alert(sum);
                        if(sum == '0' || sum == '' || sum == undefined)
                        {
                            $('#totalll').hide();
                            $("#msg").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Nothing has been selected</center></div>');
                            $('#transchangehide').hide();
                            $("#transprechangehide").hide();
                            $('#postpaymentbtn').html('Post Payment');
                        }
                    }
                    else
                    {
                        
                        var sum = (+totalamount) - (+button_quan);
                        var commasum = sum.toLocaleString();
                        $('#totalamount').val(sum);
                        $('#postpaymentbtn').html('Post Payment (&#8358;'+commasum+')');
                        
                        $('.btn_remove').data('selamount', 0);

                        // alert('button_quan='+button_quan);
                        $('#total'+button_id).val(0);
                        if(totalamount == '0' || totalamount == '' || totalamount == undefined)
                        {
                            
                            $('#totalll').hide();
                            $("#msg").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Nothing has been selected</center></div>');
                            $('#transchangehide').hide();
                            $("#transprechangehide").hide();
                            $('#postpaymentbtn').html('Post Payment');
                        }
                    }
                    
                });

                $('body').on('click','.transportbtn_remove', function(){
                    
                    $('#hidetransportone').hide();
                    
                    $('.radiobtn').prop('checked', false);

                    var button_quan = $('#transportamountfeequan').val();
                    
                    var totalamount = $("#totalamount").val();
                    // alert('total='+totalamount);

                    if(button_quan == '0' || button_quan == '' || button_quan == undefined)
                    {
                        var routamounttotalamount = $("#routamount").val();

                        var sum = (+totalamount) - (+routamounttotalamount);
                        var commasum = sum.toLocaleString();
                        $('#totalamount').val(sum);
                        $('#postpaymentbtn').html('Post Payment (&#8358; '+commasum+')');

                        $("#routamount").val(0);
                        
                        if(sum == '0' || sum == '' || sum == undefined)
                        {
                            $('#totalll').hide();
                            $("#msg").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Nothing has been selected</center></div>');
                            $('#transchangehide').hide();
                            $("#transprechangehide").hide();
                            $('#postpaymentbtn').html('Post Payment');
                        }
                    }
                    else
                    {
                        
                        var sum = (+totalamount) - (+button_quan);
                        var commasum = sum.toLocaleString();
                        $('#totalamount').val(sum);
                        $('#postpaymentbtn').html('Post Payment (&#8358;'+commasum+')');
                        
                        $("#routamount").val(0);
                        
                        if(totalamount == '0' || totalamount == '' || totalamount == undefined)
                        {
                            
                            $('#totalll').hide();
                            $("#msg").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Nothing has been selected</center></div>');
                            $('#transchangehide').hide();
                            $("#transprechangehide").hide();
                            $('#postpaymentbtn').html('Post Payment');
                        }
                    }
                });
                
                $("body").on("click","#postpaymentbtn",function(){

                    $("#postpaymentbtn").html('<i class="fa fa-spinner fa-spin"></i> Post Payment');
                    
                    var sunnystatus = $("#sunnystatus").val(); 
                    
                    if(sunnystatus == '0')
                    {
                        var multipleSelSubcatId = [];
                        $.each($("input[name='multipleSelSubcatId']:checked"), function(){
                            multipleSelSubcatId.push($(this).val());
                        });
                        
                        var SubcatId = [];
                        $.each($("input[name='SubcatId']:checked"), function(){
                            SubcatId.push($(this).val());
                        });
                        
                        var institution = "<?php echo $InstitutionID; ?>";
                        var userid = "<?php echo $UserID; ?>";
                        var usertype = "<?php echo $userType; ?>";
                        var depositorrecipientname = $("#depositorrecipientname").val();
                        var session = $("#session").val();
                        var mop = $("#mop").val();
                        var faculty = $("#faculty").val();
                        var classid = $("#class").val();
                        var termid = $("#term").val();
                        var student = $("#student").val();
                        var routname = $("#routenamesec").val();
                        var routid = $("#routid").val();
    
                        var formData = new FormData();
                        // var pop = $('#pop')[0].files[0];
                        // formData.append('pop', pop);
                        formData.append('institution', institution);
                        formData.append('userid', userid);
                        formData.append('usertype', usertype);
                        formData.append('depositorrecipientname', depositorrecipientname);
                        formData.append('session', session);
                        formData.append('mop', mop);
                        formData.append('faculty', faculty);
                        formData.append('classid', classid);
                        formData.append('termid', termid);
                        formData.append('student', student);
                        formData.append('multipleSelSubcatId', multipleSelSubcatId);
                        formData.append('routname', routname);
                        formData.append('routid', routid);
                        formData.append('SubcatId', SubcatId);
                        
    
                        // alert('routid = '+routid + 'routname = '+routname);
                        
                            $.ajax({
                                type: "POST",
                                url: "../controller/scripts/owner/PostStudCreditTransaction.php",
                                method:'POST',
                                data: formData,
                                cache:false,
                                contentType: false,
                                processData: false,
                                
                                success: function(dataouput){
                                    $("#msg").html(dataouput);
                                    $("#postpaymentbtn").html('Post Payment');
                                    
                                    $("#body").html('<i class="fa fa-spinner fa-spin" style="font-size:18px;"></i>');
                                    // location.reload();
                                    var institution = "<?php echo $InstitutionID; ?>";
                                    var userid = "<?php echo $UserID; ?>";
                                    var usertype = "<?php echo $userType; ?>";
                                    var session = $("#session").val();
                                    var faculty = $("#faculty").val();
                                    var classid = $("#class").val();
                                    var termid = $("#term").val();
                                    var student = $("#student").val();
                                    
                                    var dataString = 'institution='+ institution + '&termid='+ termid + '&classid='+ classid + '&session='+ session + '&faculty='+ faculty + '&userid='+ userid + '&usertype='+ usertype + '&student='+ student;
                                    
                                    $.ajax({
                                        type : 'post',
                                        url: "../controller/scripts/owner/studcompletefeeinfo.php",
                                        data :  dataString,
                                        success : function(result)
                                        {
                                            $("#body").html(result);
                                            
                                            $("#msg").html(dataouput);
                                            $('#hideoldbebtbtn').show();
                                            $("#hidetransportone").hide();
                                            $("#hidetotalamount").hide();
                                            $("#totalll").hide();
                                            $("html, body").animate({ scrollTop: $(document).height() }, 1000);
                                        }
                                    });
                                    
                                }
                            });
      
                    }
                    else if(sunnystatus == '1')
                    {
                        var multipleSelSubcatId = [];
                        $.each($("input[name='multipleSelSubcatId']:checked"), function(){
                            multipleSelSubcatId.push($(this).val());
                        });
                        
                        var SubcatId = [];
                        $.each($("input[name='SubcatId']:checked"), function(){
                            SubcatId.push($(this).val());
                        });
                        // alert(multipleSelSubcatId);
                        var institution = "<?php echo $InstitutionID; ?>";
                        var userid = "<?php echo $UserID; ?>";
                        var usertype = "<?php echo $userType; ?>";
                        var depositorrecipientname = $("#depositorrecipientname").val();
                        var session = $("#session").val();
                        var mop = $("#mop").val();
                        var faculty = $("#faculty").val();
                        var classid = $("#class").val();
                        var termid = $("#term").val();
                        var student = $("#student").val();
                        var routname = $("#routenamesec").val();
                        var routid = $("#routid").val();
    
                        var formData = new FormData();
                        // var pop = $('#pop')[0].files[0];
                        // formData.append('pop', pop);
                        formData.append('institution', institution);
                        formData.append('userid', userid);
                        formData.append('usertype', usertype);
                        formData.append('depositorrecipientname', depositorrecipientname);
                        formData.append('session', session);
                        formData.append('mop', mop);
                        formData.append('faculty', faculty);
                        formData.append('classid', classid);
                        formData.append('termid', termid);
                        formData.append('student', student);
                        formData.append('multipleSelSubcatId', multipleSelSubcatId);
                        formData.append('routname', routname);
                        formData.append('routid', routid);
                        formData.append('SubcatId', SubcatId);
                        
    
                        // alert('routid = '+routid + 'routname = '+routname);
                        
                        if(depositorrecipientname == '' || depositorrecipientname == 0 || mop == '' || mop == 0)
                        {
                            var totalamount = $("#totalamount").val();
                            // alert('total='+totalamount);
                            
                            var commasum = totalamount.toLocaleString();
                            $('#postpaymentbtn').html('Post Payment (&#8358; '+commasum+')');
                            
                            $("#msg").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Please Select at least a Mode of Payment and Input Depositors name before proceeding</center></div>');
                        }
                        else
                        {
                            $.ajax({
                                type: "POST",
                                url: "../controller/scripts/owner/PostStudTransaction.php",
                                method:'POST',
                                data: formData,
                                cache:false,
                                contentType: false,
                                processData: false,
                                
                                success: function(dataouput){
                                    $("#msg").html(dataouput);
                                    $("#postpaymentbtn").html('Post Payment');
                                    
                                    $("#body").html('<i class="fa fa-spinner fa-spin" style="font-size:18px;"></i>');
                                    // location.reload();
                                    
                                    var institution = "<?php echo $InstitutionID; ?>";
                                    var userid = "<?php echo $UserID; ?>";
                                    var usertype = "<?php echo $userType; ?>";
                                    var session = $("#session").val();
                                    var faculty = $("#faculty").val();
                                    var classid = $("#class").val();
                                    var termid = $("#term").val();
                                    var student = $("#student").val();
                                    
                                    var dataString = 'institution='+ institution + '&termid='+ termid + '&classid='+ classid + '&session='+ session + '&faculty='+ faculty + '&userid='+ userid + '&usertype='+ usertype + '&student='+ student;
                                    
                                    $.ajax({
                                        type : 'post',
                                        url: "../controller/scripts/owner/studcompletefeeinfo.php",
                                        data :  dataString,
                                        success : function(result)
                                        {
                                            $("#body").html(result);
                                            
                                            $("#msg").html(dataouput);
                                            $('#hideoldbebtbtn').show();
                                            $("#hidetransportone").hide();
                                            $("#hidetotalamount").hide();
                                            $("#totalll").hide();
                                            $("html, body").animate({ scrollTop: $(document).height() }, 1000);
                                        }
                                    });
                                    
                                }
                            });
    
                        }
                              
                    }
                    else if(sunnystatus == '3' || sunnystatus == '2')
                    {
                        var subcatid = [];
                        var fixedamount = [];
                        var subcatname = [];
                        var disschamount = [];
                        $.each($(".disschamount"), function(){
                            disschamount.push($(this).val());
                            subcatname.push($(this).data('subcatname'));
                            fixedamount.push($(this).data('fixedamount'));
                            subcatid.push($(this).data('id'));
                        });
                        
                        // alert(disschamount);
                        
                        // let rled = disschamount.pop();
                        // let rlef = fixedamount.pop();
                        // let rles = subcatid.pop();
                        // let rlesu = subcatname.pop();
    
                        var arrlength =subcatid.length;
                        var arrfixedamount =fixedamount.length;
                        var arrdisschamount =disschamount.length;

                        if(arrlength == arrdisschamount)
                        {
                            if(disschamount == '' || disschamount == 0)
                            {
                                $('#totalll').html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Please no quantity should be 0 or empty</center></div>');
                                $('#postpaymentbtn').hide();
                            }
                            else
                            {
                               
                                var institution = "<?php echo $InstitutionID; ?>";
                                var userid = "<?php echo $UserID; ?>";
                                var usertype = "<?php echo $userType; ?>";
                                var session = $("#session").val();
                                var faculty = $("#faculty").val();
                                var classid = $("#class").val();
                                var termid = $("#term").val();
                                var student = $("#student").val();
                                
                                var disamttransport = $(".topostdissch").val();
                                var disamttransportroutid = $("#routid").val();
                                var disamttransportroutamount = $("#routamount").val();
                                var disamttransportroutenamesec = $("#routenamesec").val();
                                
                                // alert(disamttransportroutid);
                                
                                var formData = new FormData();
                                
                                formData.append('institution', institution);
                                formData.append('userid', userid);
                                formData.append('usertype', usertype);
                                formData.append('subcatid', subcatid);
                                formData.append('fixedamount', fixedamount);
                                formData.append('student', student);
                                formData.append('disschamount', disschamount);
                                formData.append('sunnystatus', sunnystatus);
                                formData.append('faculty', faculty);
                                formData.append('classid', classid);
                                formData.append('termid', termid);
                                formData.append('session', session);
                                formData.append('subcatname', subcatname);
                                formData.append('disamttransport', disamttransport);
                                formData.append('disamttransportroutid', disamttransportroutid);
                                formData.append('disamttransportroutamount', disamttransportroutamount);
                                formData.append('disamttransportroutenamesec', disamttransportroutenamesec);


                                $.ajax({
                                    type: "POST",
                                    url: "../controller/scripts/owner/postonlydisschpayment.php",
                                    method:'POST',
                                    data: formData,
                                    cache:false,
                                    contentType: false,
                                    processData: false,
                                    
                                    success: function(dataouput)
                                    {
                                        $("#msg").html(dataouput);
                                        $("#postpaymentbtn").html('Post Payment');
                                        
                                        $("#body").html('<i class="fa fa-spinner fa-spin" style="font-size:18px;"></i>');
                                        // location.reload();
                                        var institution = "<?php echo $InstitutionID; ?>";
                                        var userid = "<?php echo $UserID; ?>";
                                        var usertype = "<?php echo $userType; ?>";
                                        var session = $("#session").val();
                                        var faculty = $("#faculty").val();
                                        var classid = $("#class").val();
                                        var termid = $("#term").val();
                                        var student = $("#student").val();
                                        
                                        var dataString = 'institution='+ institution + '&termid='+ termid + '&classid='+ classid + '&session='+ session + '&faculty='+ faculty + '&userid='+ userid + '&usertype='+ usertype + '&student='+ student;
                                        
                                        $.ajax({
                                            type : 'post',
                                            url: "../controller/scripts/owner/studcompletefeeinfo.php",
                                            data :  dataString,
                                            success : function(result)
                                            {
                                                $("#body").html(result);
                                                
                                                $("#msg").html(dataouput);
                                                $('#hideoldbebtbtn').show();
                                                $("#hidetransportone").hide();
                                                $("#hidetotalamount").hide();
                                                $("#totalll").hide();
                                                $("html, body").animate({ scrollTop: $(document).height() }, 1000);
                                            }
                                        });
                                        
                                    }
                                });
                                
                            }
                            
                        }
                    }
                   
                });
                
                $("body").on("click","#morepaymentbtn",function(){

                    $("#morepaymentbtn").html('<i class="fa fa-spinner fa-spin"></i> Post Payment');
                    
                    var multipleSelSubcatId = [];
                    $.each($("input[name='multipleSelSubcatId']:checked"), function(){
                        multipleSelSubcatId.push($(this).val());
                    });
                    
                    var SubcatId = [];
                    $.each($("input[name='SubcatId']:checked"), function(){
                        SubcatId.push($(this).val());
                    });
                    // alert(multipleSelSubcatId);
                    var institution = "<?php echo $InstitutionID; ?>";
                    var userid = "<?php echo $UserID; ?>";
                    var usertype = "<?php echo $userType; ?>";
                    var depositorrecipientname = $("#depositorrecipientname").val();
                    var session = $("#session").val();
                    var mop = $("#mop").val();
                    var faculty = $("#faculty").val();
                    var classid = $("#class").val();
                    var termid = $("#term").val();
                    var student = $("#student").val();
                    var routname = $("#routenamesec").val();
                    var routid = $("#routid").val();

                    var formData = new FormData();
                    // var pop = $('#pop')[0].files[0];
                    // formData.append('pop', pop);
                    formData.append('institution', institution);
                    formData.append('userid', userid);
                    formData.append('usertype', usertype);
                    formData.append('depositorrecipientname', depositorrecipientname);
                    formData.append('session', session);
                    formData.append('mop', mop);
                    formData.append('faculty', faculty);
                    formData.append('classid', classid);
                    formData.append('termid', termid);
                    formData.append('student', student);
                    formData.append('multipleSelSubcatId', multipleSelSubcatId);
                    formData.append('routname', routname);
                    formData.append('routid', routid);
                    formData.append('SubcatId', SubcatId);
                    

                    // alert('routid = '+routid + 'routname = '+routname);
                    
                    if(depositorrecipientname == '' || depositorrecipientname == 0 || mop == '' || mop == 0)
                    {
                        var totalamount = parseInt($("#holdmorepaymentamt").val());
                        // alert('total='+totalamount);
                        
                        var commasum = totalamount.toLocaleString();
                        $('#morepaymentbtn').html('Proceed to Pay (&#8358;'+commasum+')');
                        
                        $("#morepaymentresponse").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Please Select at least a Mode of Payment and Input Depositors name before proceeding</center></div>');
                    }
                    else
                    {
                        $.ajax({
                            type: "POST",
                            url: "../controller/scripts/owner/PostStudTransaction.php",
                            method:'POST',
                            data: formData,
                            cache:false,
                            contentType: false,
                            processData: false,
                            
                            success: function(dataouput){
                                $("#morepaymentresponse").html(dataouput);
                                $("#morepaymentbtn").html('Proceed');
                                
                                var institution = "<?php echo $InstitutionID; ?>";
                                var userid = "<?php echo $UserID; ?>";
                                var usertype = "<?php echo $userType; ?>";
                                var session = $("#session").val();
                                var faculty = $("#faculty").val();
                                var classid = $("#class").val();
                                var termid = $("#term").val();
                                var student = $("#student").val();
                                
                                var dataString = 'institution='+ institution + '&termid='+ termid + '&classid='+ classid + '&session='+ session + '&faculty='+ faculty + '&userid='+ userid + '&usertype='+ usertype + '&student='+ student;
                                
                                $.ajax({
                                    type : 'post',
                                    url: "../controller/scripts/owner/studcompletefeeinfo.php",
                                    data :  dataString,
                                    success : function(result)
                                    {
                                        $("#body").html(result);
                                        
                                        $('#hideoldbebtbtn').show();
                                        $("#hidetransportone").hide();
                                        $("#hidetotalamount").hide();
                                        $("#totalll").hide();
                                    }
                                });
                                
                            }
                        });
                        
                    }
                     
                });
                
                $("body").on("click","#moreoptionalpaymentbtn",function(){

                    $("#moreoptionalpaymentbtn").html('<i class="fa fa-spinner fa-spin"></i> Post Payment');
                    
                    var multipleSelSubcatId = [];
                    $.each($("input[name='multipleSelSubcatId']:checked"), function(){
                        multipleSelSubcatId.push($(this).val());
                    });
                    
                    var SubcatId = [];
                    $.each($("input[name='optionalSubcatId']:checked"), function(){
                        SubcatId.push($(this).val());
                    });
                    // alert(multipleSelSubcatId);
                    var institution = "<?php echo $InstitutionID; ?>";
                    var userid = "<?php echo $UserID; ?>";
                    var usertype = "<?php echo $userType; ?>";
                    var depositorrecipientname = $("#depositorrecipientname").val();
                    var session = $("#session").val();
                    var mop = $("#mop").val();
                    var faculty = $("#faculty").val();
                    var classid = $("#class").val();
                    var termid = $("#term").val();
                    var student = $("#student").val();
                    var routname = $("#routenamesec").val();
                    var routid = $("#routid").val();

                    var formData = new FormData();
                    // var pop = $('#pop')[0].files[0];
                    // formData.append('pop', pop);
                    formData.append('institution', institution);
                    formData.append('userid', userid);
                    formData.append('usertype', usertype);
                    formData.append('depositorrecipientname', depositorrecipientname);
                    formData.append('session', session);
                    formData.append('mop', mop);
                    formData.append('faculty', faculty);
                    formData.append('classid', classid);
                    formData.append('termid', termid);
                    formData.append('student', student);
                    formData.append('multipleSelSubcatId', multipleSelSubcatId);
                    formData.append('routname', routname);
                    formData.append('routid', routid);
                    formData.append('SubcatId', SubcatId);
                    

                    // alert('routid = '+routid + 'routname = '+routname);
                    
                    if(depositorrecipientname == '' || depositorrecipientname == 0 || mop == '' || mop == 0)
                    {
                        var totalamount = parseInt($("#holdmoreoptionalpaymentamt").val());
                        // alert('total='+totalamount);
                        
                        var commasum = totalamount.toLocaleString();
                        $('#moreoptionalpaymentbtn').html('Proceed to Pay (&#8358;'+commasum+')');
                        
                        $("#moreoptionalpaymentresponse").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Please Select at least a Mode of Payment and Input Depositors name before proceeding</center></div>');
                    }
                    else
                    {
                        $.ajax({
                            type: "POST",
                            url: "../controller/scripts/owner/PostStudTransaction.php",
                            method:'POST',
                            data: formData,
                            cache:false,
                            contentType: false,
                            processData: false,
                            
                            success: function(dataouput){
                                $("#moreoptionalpaymentresponse").html(dataouput);
                                $("#moreoptionalpaymentbtn").html('Proceed');
                                
                                var institution = "<?php echo $InstitutionID; ?>";
                                var userid = "<?php echo $UserID; ?>";
                                var usertype = "<?php echo $userType; ?>";
                                var session = $("#session").val();
                                var faculty = $("#faculty").val();
                                var classid = $("#class").val();
                                var termid = $("#term").val();
                                var student = $("#student").val();
                                
                                var dataString = 'institution='+ institution + '&termid='+ termid + '&classid='+ classid + '&session='+ session + '&faculty='+ faculty + '&userid='+ userid + '&usertype='+ usertype + '&student='+ student;
                                
                                $.ajax({
                                    type : 'post',
                                    url: "../controller/scripts/owner/studcompletefeeinfo.php",
                                    data :  dataString,
                                    success : function(result)
                                    {
                                        $("#body").html(result);
                                        
                                        $('#hideoldbebtbtn').show();
                                        $("#hidetransportone").hide();
                                        $("#hidetotalamount").hide();
                                        $("#totalll").hide();
                                    }
                                });
                                
                            }
                        });
                        
                    }
                     
                });
                
                $('body').on("change",".sunnycheckboxmore",function(){
                                    
                    $(".removeall").show();
                    $('#hidetotalamount').hide();
        
                    var multipleSelSubcatId = $(this).val();
                    var sunnystatus = $("#sunnystatus").val();
                    var Subcatname = $(this).data('subcatname');
                    var amount = $(this).data('amount');
                    var msgg = $(this).data('msgg');
                    var amountchecked = [];
                    var SubcatId = [];
                    
                    if(msgg == '' || msgg == 0)
                    {
                        var checkicon = '';
                    }
                    else
                    {
                        var checkicon = '<i class="fa fa-check" aria-hidden="true" style="color:green;"></i>';
                    }
        
                    $.each($("input[name='SubcatId']:checked"), function(){
                        amountchecked.push($(this).data('amount'));
                        SubcatId.push($(this).val());
                    });
        
                    var routamounttotalamount = $("#routamount").val();
                    var totalamount = $("#totalamount").val();
                    
                    var sumtall = amountchecked.reduce(function(a, b){
                        return a + b;
                    }, 0);
                    
                    // alert(totalamount);
                    var checkall = $(this).prop("checked");

                    if(checkall == false)
                    {
                        if((sumtall == 0 || sumtall == '' || sumtall == undefined) && (routamounttotalamount == '0' || routamounttotalamount == ''))
                        {
                            $("#totalamount").val(0);
                            $('#row'+multipleSelSubcatId).remove();
                            $('#totalll').hide();
                            $("#msg").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Nothing has been selected</center></div>');
                            
                            $('#morepaymentbtn').html('Proceed');
                        }
                        else
                        {
                            // alert(addedamount);
                            $('#row'+multipleSelSubcatId).remove();
                            var sum = (+sumtall) + (+routamounttotalamount);
                            $("#holdmorepaymentamt").val(sum);
                            var commasum = sum.toLocaleString();
                            $('#morepaymentbtn').html('Proceed to Pay (&#8358;'+commasum+')');
                        }
                    }
                    else
                    {
                        if(routamounttotalamount == 0 || routamounttotalamount == '')
                        {
                            var newtotalamount = (+sumtall);
                            $("#holdmorepaymentamt").val(newtotalamount);
                            var commasum = newtotalamount.toLocaleString();
                            $('#morepaymentbtn').html('Proceed to Pay (&#8358;'+commasum+')');
                    
                        }
                        else
                        {
                            var newtotalamount = (+amount) + (+totalamount);
                            $("#holdmorepaymentamt").val(newtotalamount);
                            var commasum = newtotalamount.toLocaleString();
                            $('#morepaymentbtn').html('Proceed to Pay (&#8358;'+commasum+')');
                    
                        }
                        
                    }
                });
                
                $('body').on("change",".sunnycheckboxmoreoptional",function(){
                                    
                    $(".removeall").show();
                    $('#hidetotalamount').hide();
        
                    var multipleSelSubcatId = $(this).val();
                    var sunnystatus = $("#sunnystatus").val();
                    var Subcatname = $(this).data('subcatname');
                    var amount = $(this).data('amount');
                    var msgg = $(this).data('msgg');
                    var amountchecked = [];
                    var SubcatId = [];
                    
                    if(msgg == '' || msgg == 0)
                    {
                        var checkicon = '';
                    }
                    else
                    {
                        var checkicon = '<i class="fa fa-check" aria-hidden="true" style="color:green;"></i>';
                    }
        
                    $.each($("input[name='optionalSubcatId']:checked"), function(){
                        amountchecked.push($(this).data('amount'));
                        SubcatId.push($(this).val());
                    });
        
                    var routamounttotalamount = $("#routamount").val();
                    var totalamount = $("#totalamount").val();
                    
                    var sumtall = amountchecked.reduce(function(a, b){
                        return a + b;
                    }, 0);
                    
                    // alert(totalamount);
                    var checkall = $(this).prop("checked");

                    if(checkall == false)
                    {
                        if((sumtall == 0 || sumtall == '' || sumtall == undefined) && (routamounttotalamount == '0' || routamounttotalamount == ''))
                        {
                            $("#totalamount").val(0);
                            $('#row'+multipleSelSubcatId).remove();
                            $('#totalll').hide();
                            $("#msg").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Nothing has been selected</center></div>');
                            
                            $('#moreoptionalpaymentbtn').html('Proceed');
                        }
                        else
                        {
                            // alert(addedamount);
                            $('#row'+multipleSelSubcatId).remove();
                            var sum = (+sumtall) + (+routamounttotalamount);
                            $("#holdmoreoptionalpaymentamt").val(sum);
                            var commasum = sum.toLocaleString();
                            $('#moreoptionalpaymentbtn').html('Proceed to Pay (&#8358;'+commasum+')');
                        }
                    }
                    else
                    {
                        if(routamounttotalamount == 0 || routamounttotalamount == '')
                        {
                            var newtotalamount = (+sumtall);
                            $("#holdmoreoptionalpaymentamt").val(newtotalamount);
                            var commasum = newtotalamount.toLocaleString();
                            $('#moreoptionalpaymentbtn').html('Proceed to Pay (&#8358;'+commasum+')');
                    
                        }
                        else
                        {
                            var newtotalamount = (+amount) + (+totalamount);
                            $("#holdmoreoptionalpaymentamt").val(newtotalamount);
                            var commasum = newtotalamount.toLocaleString();
                            $('#moreoptionalpaymentbtn').html('Proceed to Pay (&#8358;'+commasum+')');
                    
                        }
                        
                    }
                });
                
                $("body").on("change","#sunnystatus", function(){
                    
                    $(".btn_schodis").click();
                    $(".btn_remove").click();
                    $(".btn_removesecond").click();
                    $('.rowtransport1').prop('checked', false);
                    $('.radiobtn').prop('checked', false);
                    $("#totalll").hide();
                    $("#hidetransportone").hide();
                    $('#postpaymentbtn').html('Post Payment');
                    
                    $("#totalamount").val(0);
                    $("#totalamounttransport").val(0); 
                    $("#routamount").val(0);
                    $('#postotherpaymentbtn').show();

                    $("#msg").html('<div class="alert alert-info" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Please Select Before Proceeding</center></div>');
                    
                    
                    var sunnystatus = $("#sunnystatus").val(); 

                    if(sunnystatus == '2')
                    {
                        $("input[data-status='3']").prop("disabled", true);
                        $("input[data-status='0']").prop("disabled", true);
                        $("input[data-status='2']").prop("disabled", false);
                        // alert(sunnystatus);
                        $('#hidemop').hide();
                        $('#hidedepositorrecipientname').hide();
                        $("#hidemorepaymentbtn").hide();
                        $("#hidemorepaymentbtnsec").hide();
                        $("#hideoldbebtbtn").hide();
                        $("#hidemorepaymentbtn").hide();
                        $("#hidemoreoptionalpaymentbtn").hide();
                    
                    }
                    else if(sunnystatus == '3')
                    {
                        $("input[data-status='2']").prop("disabled", true);
                        $("input[data-status='0']").prop("disabled", true);
                        $("input[data-status='3']").prop("disabled", false);
                        // alert(sunnystatus);
                        $('#hideod').hide();
                        $('#hidemop').hide();
                        $("#hidemorepaymentbtn").hide();
                        $("#hidemorepaymentbtnsec").hide();
                        $("#hideoldbebtbtn").hide();
                        $('#hidedepositorrecipientname').hide();
                        $("#hidemorepaymentbtn").hide();
                        $("#hidemoreoptionalpaymentbtn").hide();
                    }
                    else if(sunnystatus == '0')
                    {
                        $("input[data-status='2']").prop("disabled", true);
                        $("input[data-status='3']").prop("disabled", true);
                        $("input[data-status='0']").prop("disabled", false);
                        
                        // alert(sunnystatus);
                        $('#hidemop').hide();
                        $('#hidedepositorrecipientname').show();
                        $('#showdepositorrecipientname').html('(Optional)');
                        $("#hidemorepaymentbtn").hide();
                        $("#hidemorepaymentbtnsec").hide();
                        $("#hideoldbebtbtn").hide();
                        $("#hidemorepaymentbtn").hide();
                        $("#hidemoreoptionalpaymentbtn").hide();
                    }
                    else
                    {
                        $("input[data-status='0']").prop("disabled", false);
                        $("input[data-status='2']").prop("disabled", false);
                        $("input[data-status='3']").prop("disabled", false);
                        $('#hidemop').show();
                        $('#hidedepositorrecipientname').show();
                        $('#showdepositorrecipientname').html('');
                        $("#hidemorepaymentbtn").show();
                        $("#hidemorepaymentbtnsec").show();
                        $("#hideoldbebtbtn").show();
                        $("#hidemorepaymentbtn").show();
                        $("#hidemoreoptionalpaymentbtn").show();
                    }
                    
                }); 

                $('body').on('click','.btn_schodis', function(){
                    
                    var button_id = $(this).data("subcatid");

                    var button_quan = $('#totaldissch'+button_id).val();

                    // alert(button_quan);

                    $(this).parents('#row'+button_id).remove();

                    $('input:checkbox[value="' + button_id + '"]').prop('checked', false);

                    
                    var totalamount = $("#totalamount").val();
                    // alert('total='+totalamount);
                    
                    var sum = (+totalamount) - (+button_quan);
                    var commasum = sum.toLocaleString();
                    $('#totalamount').val(sum);
                    $('#postpaymentbtn').html('Post Payment (&#8358; '+commasum+')');
                    
                    var totalamountch = $("#totalamount").val();
                    var routid = $("#routid").val();

                    var multipleSelSubcatId = [];
                    $.each($("input[name='multipleSelSubcatId']:checked"), function(){
                        multipleSelSubcatId.push($(this).val());
                    });
                    var arrlength =multipleSelSubcatId.length;

                    // alert(arrlength);

                    if((arrlength == 0) && (routid == 0 || routid == ''))
                    {
                        $('#totalll').hide();
                        $("#msg").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Nothing has been selected</center></div>');
                        $('#transchangehide').hide();
                        $("#transprechangehide").hide();
                        $('#postpaymentbtn').html('Post Payment');
                    }
                });

                $("body").on("keyup change",".disschamount", function(){
        
                    $("#totalll").show();
                    $("#totalll").html('<i class="fa fa-spinner fa-spin"></i>');
                    var feequantitycheck = $(this).val();
        
                    if(feequantitycheck == '0' || feequantitycheck == '')
                    {
                        $('#totalll').html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Please no quantity should be 0 or empty</center></div>');
                        $('#postpaymentbtn').hide();
                    }
                    else
                    {
                        var sunnystatus = $("#sunnystatus").val(); 
                        var feequantity = [];
                        var subcatname = [];
                        var amount = [];
                        var catid = [];
                        $.each($(".disschamount"), function(){
                            feequantity.push($(this).val());
                            subcatname.push($(this).data('subcatname'));
                            amount.push($(this).data('fixedamount'));
                            catid.push($(this).data('id'));
                        });
        
                        var dataString = '&feequantity='+ feequantity + '&sunnystatus=' + sunnystatus + '&catid=' + catid + '&subcatname=' + subcatname + '&amount=' + amount;
                        $.ajax({
                            type: "POST",
                            url: "../controller/scripts/owner/displaydissch-total.php",
                            data: dataString,
                            cache: false,
                            
                            success: function(result){
                                
                                $('#totalll').html(result);
                                $('#postpaymentbtn').show();
        
                                var totalamount = $("#totalamount").val();
                                
                                var commasum = totalamount.toLocaleString();
                                $('#totalamount').val(totalamount);
                                $('#postpaymentbtn').html('Post Payment (&#8358; '+commasum+')');
                                
                            }
                        });
                            
                    }
        
                });
                
                $('#adddeposittofeemodal').on('show.bs.modal', function (e) {
                     $("#adddeposittofeebody").html('<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');
                    
                    var institution = "<?php echo $InstitutionID; ?>";
                    var userid = "<?php echo $UserID; ?>";
                    var usertype = "<?php echo $userType; ?>";
                    var session = $("#session").val();
                    var faculty = $("#faculty").val();
                    var classid = $("#class").val();
                    var termid = $("#term").val();
                    var student = $("#student").val();
                    
                    var dataString = 'institution='+ institution + '&termid='+ termid + '&classid='+ classid + '&session='+ session + '&faculty='+ faculty + '&userid='+ userid + '&usertype='+ usertype + '&student='+ student;
                    
                    $.ajax({
                        type : 'post',
                        url: "../controller/scripts/owner/adddeposittofeeModalContent.php",
                        data :  dataString,
                        success : function(result)
                        {
                            $("#adddeposittofeebody").html(result);
                            $('#hideoldbebtbtn').show();
                            $("#hidetransportoneadddeposittofee").hide();
                            $("#hidetotalamountadddeposittofee").hide();
                            $("#totallladddeposittofee").hide();
                        }
                    });
                });
                
                $('body').on("change",".sunnycheckboxadddeposittofee",function(){
                    
                    $(".removealladddeposittofee").show();
                    $("#totallladddeposittofee").show();
                    $('#transchangehideadddeposittofee').show();
                    $('#hidetotalamountadddeposittofee').hide();
                    $("#successmsg").html('');

                    var multipleSelSubcatId = $(this).val();
                    var Subcatname = $(this).data('subcatname');
                    var amount = $(this).data('amount');
                    var msgg = $(this).data('msgg');
                    var amountchecked = [];
                    var SubcatId = [];
                    
                    if(msgg == '' || msgg == 0)
                    {
                        var checkicon = '';
                    }
                    else
                    {
                        var checkicon = '<i class="fa fa-check" aria-hidden="true" style="color:green;"></i>';
                    }
        
                    $.each($("input[name='adddeposittofeemultipleSelSubcatId']:checked"), function(){
                        amountchecked.push($(this).data('amount'));
                        SubcatId.push($(this).val());
                    });
        
                    var routamounttotalamount = $("#routamountadddeposittofee").val();
                    var totalamount = $("#totalamountadddeposittofee").val();
                    
                    var sumtall = amountchecked.reduce(function(a, b){
                        return a + b;
                    }, 0);
                    
                    // alert(totalamount);
                    var checkall = $(this).prop("checked");

                    if(checkall == false)
                    {
                        if((sumtall == 0 || sumtall == '' || sumtall == undefined) && (routamounttotalamount == '0' || routamounttotalamount == ''))
                        {
                            $("#totalamountadddeposittofee").val(0);
                            $('#rowadddeposittofee'+multipleSelSubcatId).remove();
                            $('#totallladddeposittofee').hide();
                            $("#msgadddeposittofee").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Nothing has been selected</center></div>');
                            $('#transchangehideadddeposittofee').hide();
                            $("#transprechangehideadddeposittofee").hide();
                            
                            $('#postpaymentbtnadddeposittofee').html('Post Payment');
                        }
                        else
                        {
                            // alert(addedamount);
                            $('#rowadddeposittofee'+multipleSelSubcatId).remove();
                            $("#msgadddeposittofee").html('');
    
                            var sum = (+sumtall) + (+routamounttotalamount);
                            var commasum = sum.toLocaleString();
                            $('#totallladddeposittofee').show();
                            $('#totalamountadddeposittofee').val(sum);
                            $('#postpaymentbtnadddeposittofee').html('Post Payment (&#8358;'+commasum+')');
                        }
                    }
                    else
                    {
                        if(routamounttotalamount == 0 || routamounttotalamount == '')
                        {
                            var newtotalamount = (+sumtall);
                        
                            $('#summaryadddeposittofee').append('<form><div align="left" id="rowadddeposittofee'+multipleSelSubcatId+'" class="form-group row" style="color:black;"><label for="inputPassword" class="col-lg-3 col-form-label">'+Subcatname+'</label><div class="col-lg-4"><input type="number" class="form-control" disabled value="'+amount+'"><br><small style="color:green;">'+msgg+' '+checkicon+'</small></div><div class="col-lg-3"><a href="javascript:;" class="btn_removeadddeposittofee" data-subcatname="'+amount+'" data-catid="'+multipleSelSubcatId+'" data-selamount="'+amount+'" id="'+multipleSelSubcatId+'"><i class="fa fa-times fa-2x text-danger"></i></a></div></div></form>'); //add input box
                            
                            var commasum = newtotalamount.toLocaleString();
                            $('#totallladddeposittofee').show();
                            $('#totalamountadddeposittofee').val(newtotalamount);
                            $('#postpaymentbtnadddeposittofee').html('Post Payment (&#8358;'+commasum+')');
                            $("#msgadddeposittofee").html('');
                    
                        }
                        else
                        {
                            var newtotalamount = (+amount) + (+totalamount);
                        
                            $('#summaryadddeposittofee').append('<form><div align="left" id="rowadddeposittofee'+multipleSelSubcatId+'" class="form-group row" style="color:black;"><label for="inputPassword" class="col-lg-3 col-form-label">'+Subcatname+'</label><div class="col-lg-4"><input type="number" class="form-control" disabled value="'+amount+'"><br><small style="color:green;">'+msgg+' '+checkicon+'</small></div><div class="col-lg-3"><a href="javascript:;" class="btn_removeadddeposittofee" data-subcatname="'+amount+'" data-catid="'+multipleSelSubcatId+'" data-selamount="'+amount+'" id="'+multipleSelSubcatId+'"><i class="fa fa-times fa-2x text-danger"></i></a></div></div></form>'); //add input box
                            
                            var commasum = newtotalamount.toLocaleString();
                            $('#totallladddeposittofee').show();
                            $('#totalamountadddeposittofee').val(newtotalamount);
                            $('#postpaymentbtnadddeposittofee').html('Post Payment (&#8358;'+commasum+')');
                            $("#msgadddeposittofee").html('');
                    
                        }
                        
                    }
                    
                });
                
                $('body').on("change",".radiobtnadddeposittofee",function(){
                    $("#successmsg").html('');
                    var routamount = $(this).val();
                    var routid = $(this).data('routid');
                    var routname = $(this).data('routname');
                    var msggtp = $(this).data('msggtp');
        
        
                    if(msggtp == '' || msggtp == 0)
                    {
                        var checkicon = '';
                    }
                    else
                    {
                        var checkicon = '<i class="fa fa-check" aria-hidden="true" style="color:green;"></i>';
                    }
        
                    var routamounttotalamount = $("#routamountadddeposittofee").val();
                    
                    $('#routenameadddeposittofee').html(routname);
                    $('#routenamesecadddeposittofee').val(routname);
                    $('#routamountadddeposittofee').val(routamount);
                    $('#routidadddeposittofee').val(routid);
                    $('#feequantityadddeposittofee').val(1);
                    
                    var totalamount = $("#totalamountadddeposittofee").val();
                    
                    $("#hidetransportoneadddeposittofee").show();
                
                    $('#statustitleadddeposittofee').html('Normal');
                    $('#statustitleappliedadddeposittofee').html(msggtp+' '+checkicon);
                    
                    if(totalamount == 0 || totalamount == '' || totalamount == undefined)
                    {
                        $("#totallladddeposittofee").show();
                        $("#totalamountadddeposittofee").val(routamount);
                        var sum = parseInt(routamount);
                        var commasum = sum.toLocaleString();
                        $("#msgadddeposittofee").html('');
                        $('#postpaymentbtnadddeposittofee').html('Post Payment (&#8358;'+commasum+')');
                    
                    }
                    else
                    {
                        var newtotamt = (+totalamount) - (+routamounttotalamount);
                        
                        var sum = parseInt((+newtotamt) + (+routamount));
                    
                        var commasum = sum.toLocaleString();
                        $('#totallladddeposittofeeadddeposittofee').show();
                        $('#totalamountadddeposittofee').val(sum);
                        $("#msgadddeposittofee").html('');
                        $('#postpaymentbtnadddeposittofee').html('Post Payment (&#8358;'+commasum+')');
                        
                    }
                });
                
                $('body').on('click','.btn_removeadddeposittofee', function(){
                    
                    var button_id = $(this).data("catid");
                    $(this).parents('#rowadddeposittofee'+button_id).remove();
                    
                    $('input:checkbox[value="' + button_id + '"]').prop('checked', false);

                    var button_quan = $('#total'+button_id).val();

                    // alert(button_id);
                    var totalamount = $("#totalamountadddeposittofee").val();
                    // alert('total='+totalamount);

                    if(button_quan == '0' || button_quan == '' || button_quan == undefined)
                    {
                        var button_idamt = $(this).data("selamount");

                        var sum = (+totalamount) - (+button_idamt);
                        var commasum = sum.toLocaleString();
                        $('#totalamountadddeposittofee').val(sum);
                        $('#postpaymentbtnadddeposittofee').html('Post Payment (&#8358; '+commasum+')');

                        $('.btn_removeadddeposittofee').data('selamount', 0);

                        // alert(sum);
                        if(sum == '0' || sum == '' || sum == undefined)
                        {
                            $('#totallladddeposittofee').hide();
                            $("#msgadddeposittofee").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Nothing has been selected</center></div>');
                            $('#transchangehideadddeposittofee').hide();
                            $("#transprechangehideadddeposittofee").hide();
                            $('#postpaymentbtnadddeposittofee').html('Post Payment');
                        }
                    }
                    else
                    {
                        
                        var sum = (+totalamount) - (+button_quan);
                        var commasum = sum.toLocaleString();
                        $('#totalamountadddeposittofee').val(sum);
                        $('#postpaymentbtnadddeposittofee').html('Post Payment (&#8358;'+commasum+')');
                        
                        $('.btn_removeadddeposittofee').data('selamount', 0);

                        // alert('button_quan='+button_quan);
                        $('#totaladddeposittofee'+button_id).val(0);
                        if(totalamount == '0' || totalamount == '' || totalamount == undefined)
                        {
                            
                            $('#totallladddeposittofee').hide();
                            $("#msgadddeposittofee").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Nothing has been selected</center></div>');
                            $('#transchangehideadddeposittofee').hide();
                            $("#transprechangehideadddeposittofee").hide();
                            $('#postpaymentbtnadddeposittofee').html('Post Payment');
                        }
                    }
                    
                });

                $('body').on('click','.transportbtn_removeadddeposittofee', function(){
                    
                    $('#hidetransportoneadddeposittofee').hide();
                    
                    $('.radiobtnadddeposittofee').prop('checked', false);

                    var button_quan = $('#transportamountfeequanadddeposittofee').val();
                    
                    var totalamount = $("#totalamountadddeposittofee").val();
                    // alert('total='+totalamount);

                    if(button_quan == '0' || button_quan == '' || button_quan == undefined)
                    {
                        var routamounttotalamount = $("#routamountadddeposittofee").val();

                        var sum = (+totalamount) - (+routamounttotalamount);
                        var commasum = sum.toLocaleString();
                        $('#totalamountadddeposittofee').val(sum);
                        $('#postpaymentbtnadddeposittofee').html('Post Payment (&#8358; '+commasum+')');

                        $("#routamounadddeposittofeet").val(0);
                        
                        if(sum == '0' || sum == '' || sum == undefined)
                        {
                            $('#totallladddeposittofee').hide();
                            $("#msgadddeposittofee").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Nothing has been selected</center></div>');
                            $('#transchangehideadddeposittofee').hide();
                            $("#transprechangehideadddeposittofee").hide();
                            $('#postpaymentbtnadddeposittofee').html('Post Payment');
                        }
                    }
                    else
                    {
                        
                        var sum = (+totalamount) - (+button_quan);
                        var commasum = sum.toLocaleString();
                        $('#totalamountadddeposittofee').val(sum);
                        $('#postpaymentbtnadddeposittofee').html('Post Payment (&#8358;'+commasum+')');
                        
                        $("#routamountadddeposittofee").val(0);
                        
                        if(totalamount == '0' || totalamount == '' || totalamount == undefined)
                        {
                            
                            $('#totallladddeposittofee').hide();
                            $("#msgadddeposittofee").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Nothing has been selected</center></div>');
                            $('#transchangehideadddeposittofee').hide();
                            $("#transprechangehideadddeposittofee").hide();
                            $('#postpaymentbtnadddeposittofee').html('Post Payment');
                        }
                    }
                });
                
                $("body").on("click","#postpaymentbtnadddeposittofee",function(){

                    $("#postpaymentbtnadddeposittofee").html('<i class="fa fa-spinner fa-spin"></i> Post Payment');
                    
                    var remainingdepositamount = parseInt($("#remainingdepositamount").val()); 
                    
                        var multipleSelSubcatId = [];
                        $.each($("input[name='adddeposittofeemultipleSelSubcatId']:checked"), function(){
                            multipleSelSubcatId.push($(this).val());
                        });
                        
                        var totalamt = parseInt($('#totalamountadddeposittofee').val());
                        
                        // alert(totalamt+' '+remainingdepositamount);
                        var institution= "<?php echo $InstitutionID; ?>";
                        var userid = "<?php echo $UserID; ?>";
                        var usertype = "<?php echo $userType; ?>";
                        var session = $("#session").val();
                        var faculty = $("#faculty").val();
                        var classid = $("#class").val();
                        var termid = $("#term").val();
                        var student = $("#student").val();
                        var routname = $("#routenamesecadddeposittofee").val();
                        var routid = $("#routidadddeposittofee").val();
                        
                        var dataStringone = 'multipleSelSubcatId=' + multipleSelSubcatId + '&institution=' + institution + '&userid=' + userid + '&usertype=' + usertype + '&session=' + session + '&faculty=' + faculty + '&classid=' + classid + '&termid=' + termid + '&student=' + student + '&routname=' + routname + '&routid=' + routid;
                        
                        if(totalamt > remainingdepositamount)
                        {
                            $("#successmsg").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Sorry the total amount is greater than the amount deposited, Please remove some items selected or add to your deposit </center></div>');
                            $("#postpaymentbtnadddeposittofee").html('Post Payment');
                            $("#adddeposittofeemodal").scrollTop(0);
                        }
                        else
                        {
                            $.ajax({
                                type : 'post',
                                url: "../controller/scripts/owner/PostStudDepositpayment.php",
                                data :  dataStringone,
                                success : function(dataouput)
                                {
                                    
                                    $("#msgadddeposittofee").html(dataouput);
                                    $("#postpaymentbtnadddeposittofee").html('Post Payment');
                                    $("#hidetransportoneadddeposittofee").hide();
                                    $("#hidetotalamountadddeposittofee").hide();
                                    $("#totallladddeposittofee").hide();
                                    $("#summaryadddeposittofee").hide();
                                    
                                    $("#body").html('<i class="fa fa-spinner fa-spin" style="font-size:18px;"></i>');
                                    // location.reload();
                                    $("#adddeposittofeebody").html('<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');
                        
                                    var institution = "<?php echo $InstitutionID; ?>";
                                    var userid = "<?php echo $UserID; ?>";
                                    var usertype = "<?php echo $userType; ?>";
                                    var session = $("#session").val();
                                    var faculty = $("#faculty").val();
                                    var classid = $("#class").val();
                                    var termid = $("#term").val();
                                    var student = $("#student").val();
                                    
                                    var dataString = 'institution='+ institution + '&termid='+ termid + '&classid='+ classid + '&session='+ session + '&faculty='+ faculty + '&userid='+ userid + '&usertype='+ usertype + '&student='+ student;
                                    
                                    $.ajax({
                                        type : 'post',
                                        url: "../controller/scripts/owner/adddeposittofeeModalContent.php",
                                        data :  dataString,
                                        success : function(resultsec)
                                        {
                                            $("#adddeposittofeebody").html(resultsec);
                                            $('#hideoldbebtbtn').show();
                                            $("#hidetransportoneadddeposittofee").hide();
                                            $("#hidetotalamountadddeposittofee").hide();
                                            $("#totallladddeposittofee").hide();
                                            $("#successmsg").html(dataouput);
                                            
                                            $.ajax({
                                                type : 'post',
                                                url: "../controller/scripts/owner/studcompletefeeinfo.php",
                                                data :  dataString,
                                                success : function(result)
                                                {
                                                    $("#body").html(result);
                                                    
                                                    $('#hideoldbebtbtn').show();
                                                    $("#hidetransportone").hide();
                                                    $("#hidetotalamount").hide();
                                                    $("#totalll").hide();
                                                }
                                            });
                                            
                                        }
                                    });
                                    
                                }
                            });
                        }
                        
                });
                
                $("body").on("click","#updatedepositbalbtn",function(){
                    
                    // alert('suuny');
                    $("#updatedepositbalbtn").html('<i class="fa fa-spinner fa-spin"></i>');
                    
                    var institution = "<?php echo $InstitutionID; ?>";
                    var userid = "<?php echo $UserID; ?>";
                    var usertype = "<?php echo $userType; ?>";
                    var session = $("#depositpaymentmodalsession").val();
                    var termid = $("#depositpaymentmodalterm").val();
                    var sessionpresent = $("#session").val();
                    var termidpresent = $("#term").val();
                    var depositbalanceamt = $("#depositbalanceamt").val();
                    var remainingdepositamount = parseInt($("#remainingdepositamount").val()); 
                    var student = $("#student").val();
                    
                    var dataStringfst = 'institution='+ institution + '&termid='+ termid + '&session='+ session + '&userid='+ userid + '&usertype='+ usertype + '&student='+ student + '&depositbalanceamt='+ depositbalanceamt + '&sessionpresent='+ sessionpresent + '&termidpresent='+ termidpresent;
                    
                    if(session == 0 || session == '' || termid == 0 || termid == '')
                    {
                        $("#successmsgupdatedepositbal").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Please Select Session And Term</center></div>');
                        $("#updatedepositbalbtn").html('Update');
                    }
                    else if(depositbalanceamt == 0 || depositbalanceamt == '')
                    {
                        $("#successmsgupdatedepositbal").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Please Type in Amount</center></div>');
                        $("#updatedepositbalbtn").html('Update');
                    }
                    else if(depositbalanceamt > remainingdepositamount)
                    {
                        $("#successmsgupdatedepositbal").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Sorry the amount entered is greater than the Deposit Balance</center></div>');
                        $("#updatedepositbalbtn").html('Update');
                    }
                    else
                    {
                        $.ajax({
                            type : 'post',
                            url: "../controller/scripts/owner/transferDepositBalance.php",
                            data :  dataStringfst,
                            success : function(result)
                            {
                                
                                var institution = "<?php echo $InstitutionID; ?>";
                                var userid = "<?php echo $UserID; ?>";
                                var usertype = "<?php echo $userType; ?>";
                                var session = $("#session").val();
                                var faculty = $("#faculty").val();
                                var classid = $("#class").val();
                                var termid = $("#term").val();
                                var student = $("#student").val();
                                
                                var dataString = 'institution='+ institution + '&termid='+ termid + '&classid='+ classid + '&session='+ session + '&faculty='+ faculty + '&userid='+ userid + '&usertype='+ usertype + '&student='+ student;
                                             
                                $.ajax({
                                    type : 'post',
                                    url: "../controller/scripts/owner/studcompletefeeinfo.php",
                                    data :  dataString,
                                    success : function(result)
                                    {
                                        
                                        $("#body").html(result);
                                        $('#hideoldbebtbtn').show();
                                    }
                                });
                                  
                                $("#updatedepositbalbtn").html('Update');
                                $("#successmsgupdatedepositbal").html(result);
                                        
                            }
                        });
                    }
                    
                });
                
                $("#paystudolddepfromdeposittbtn").click(function(){
                    
                    // alert('suuny');
                    $("#paystudolddepfromdeposittbtn").html('<i class="fa fa-spinner fa-spin"></i>');
                    
                    var institution = "<?php echo $InstitutionID; ?>";
                    var userid = "<?php echo $UserID; ?>";
                    var usertype = "<?php echo $userType; ?>";
                    var session = $("#session").val();
                    var faculty = $("#faculty").val();
                    var classid = $("#class").val();
                    var termid = $("#term").val();
                    var student = $("#student").val();
                    var podolddeptpayfromdeposit = parseInt($("#podolddeptpayfromdeposit").val());
                    var remainingdepositamount = parseInt($("#remainingdepositamount").val()); 
                     
                    var dataString = 'institution='+ institution + '&termid='+ termid + '&classid='+ classid + '&session='+ session + '&faculty='+ faculty + '&userid='+ userid + '&usertype='+ usertype + '&student='+ student + '&podolddeptpayfromdeposit='+ podolddeptpayfromdeposit;
                    
                    if(podolddeptpayfromdeposit > remainingdepositamount)
                    {
                        $("#olddeptpayfromdepositresponse").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Sorry the amount entered is greater than the Deposit Balance</center></div>');
                        $("#paystudolddepfromdeposittbtn").html('<img src="https://img.icons8.com/fluency-systems-regular/25/FFFFFF/pay.png"/> Pay');
                    }
                    else
                    {
                        
                        $.ajax({
                            type: "POST",
                            url: "../controller/scripts/owner/PayStudolddebtfromdepositbal.php",
                            data :  dataString,
                            success : function(result)
                            {
                                $("#body").html('<i class="fa fa-spinner fa-spin"></i>');
                                
                                 var institution = "<?php echo $InstitutionID; ?>";
                                var userid = "<?php echo $UserID; ?>";
                                var usertype = "<?php echo $userType; ?>";
                                var session = $("#session").val();
                                var faculty = $("#faculty").val();
                                var classid = $("#class").val();
                                var termid = $("#term").val();
                                var student = $("#student").val();
                                
                                var dataStringsec = 'institution='+ institution + '&termid='+ termid + '&classid='+ classid + '&session='+ session + '&faculty='+ faculty + '&userid='+ userid + '&usertype='+ usertype + '&student='+ student;
                                             
                                $.ajax({
                                    type : 'post',
                                    url: "../controller/scripts/owner/studcompletefeeinfo.php",
                                    data :  dataStringsec,
                                    success : function(resultoutput)
                                    {
                                        
                                        $("#body").html(resultoutput);
                                        $('#hideoldbebtbtn').show();
                                    }
                                });
                                $("#paystudolddepfromdeposittbtn").html('<img src="https://img.icons8.com/fluency-systems-regular/25/FFFFFF/pay.png"/> Pay');
                                
                                $("#olddeptpayfromdepositresponse").html(result);
                                        
                            }
                        });
                    }
                    
                });
                
                $('#morepaymentnewmodal').on('show.bs.modal', function (e){
                    $('#morepaymentbtn').html('Proceed');
                            
                    $("#morepaymentresponse").html('');
                    
                    $("#Modalbodymorepayment").html('<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');
                    
                    var institution = "<?php echo $InstitutionID; ?>";
                    var userid = "<?php echo $UserID; ?>";
                    var usertype = "<?php echo $userType; ?>";
                    var session = $("#session").val();
                    var faculty = $("#faculty").val();
                    var classid = $("#class").val();
                    var termid = $("#term").val();
                    var student = $("#student").val();
                    
                    var dataString = 'institution='+ institution + '&termid='+ termid + '&classid='+ classid + '&session='+ session + '&faculty='+ faculty + '&userid='+ userid + '&usertype='+ usertype + '&student='+ student;
                    
                    $.ajax({
                            type : 'post',
                            url: "../controller/scripts/owner/LoadMorePaymentModalContent.php",
                            data :  dataString,
                            success : function(result)
                            {
                                
                                $("#Modalbodymorepayment").html(result);
                            }
                        });
                });
                
                $('#moreoptionalpaymentmodal').on('show.bs.modal', function (e){
                    
                    $('#moreoptionalpaymentbtn').html('Proceed');
                    $("#moreoptionalpaymentresponse").html('');
                    $("#Modalbodymoreoptionalpayment").html('<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');
                    
                    var institution = "<?php echo $InstitutionID; ?>";
                    var userid = "<?php echo $UserID; ?>";
                    var usertype = "<?php echo $userType; ?>";
                    var session = $("#session").val();
                    var faculty = $("#faculty").val();
                    var classid = $("#class").val();
                    var termid = $("#term").val();
                    var student = $("#student").val();
                    
                    var dataString = 'institution='+ institution + '&termid='+ termid + '&classid='+ classid + '&session='+ session + '&faculty='+ faculty + '&userid='+ userid + '&usertype='+ usertype + '&student='+ student;
                    
                    $.ajax({
                            type : 'post',
                            url: "../controller/scripts/owner/LoadMoreoptionalPaymentModalContent.php",
                            data :  dataString,
                            success : function(result)
                            {
                                
                                $("#Modalbodymoreoptionalpayment").html(result);
                            }
                        });
                });
                
            //========COMPLETE FEE END=======// 
            
            //========FEE DEPOSIT START=======// 
            
                // $("#depositpaymentsession").change(function(){
                    
                //     $('#depositpaymentfaculty').html('');
                //     $('#depositpaymentfaculty').append($('<option>').val(0).text('Loading...'));
                    
                //     var institution = "<?php echo $InstitutionID; ?>";
                //     var session = $("#depositpaymentsession").val();
                    
                //     var dataString = 'institution='+ institution + '&session='+ session;
                    
                //     if(session == '0' || session == '')
                //     {
                //         $('#depositpaymentfaculty').html('');
                //         $('#depositpaymentfaculty').append($('<option>').val(0).text('Select Session First'));
                //     }
                //     else
                //     {
                //         // alert(dataString);
                        
                //         $.ajax({
                //             type : 'post',
                //             url: "../controller/scripts/owner/gettrans_faculty.php",
                //             data :  dataString,
                //             success : function(result)
                //             {
                //                 var obj1 = JSON.parse(result);
                //                 console.log(obj1);
                                
                //                 var z;
                //                 var facultyname = "";
                //                 var facultyID = "";
                                
                //                 $('#depositpaymentfaculty').html('');
                //                 $('#depositpaymentfaculty').append($('<option>').val(0).text('Select Faculty'));
                        
                //                 for (z = 0; z < obj1.length; z++) 
                //                 {
                //                     facultyname = obj1[z].FacultyOrSchoolName;
                //                     facultyID = obj1[z].FacultyOrSchoolID;
                //                     $('#depositpaymentfaculty').append($('<option>').val(facultyID).text(facultyname));
        
                //                 }
                //             }
                //         });
                    
                //     }
                    
                // });
                
                // $("#depositpaymentfaculty").change(function(){
                        
                //     $('#depositpaymentclass').html('');
                //     $('#depositpaymentclass').append($('<option>').val(0).text('Loading...'));
                    
                //     var institution = "<?php echo $InstitutionID; ?>";
                //     var faculty = $("#depositpaymentfaculty").val();
                    
                //     var dataString = 'institution='+ institution + '&faculty='+ faculty;
                    
                //     if(faculty == '0' || faculty == '')
                //     {
                //         $('#depositpaymentclass').html('');
                //         $('#depositpaymentclass').append($('<option>').val(0).text('Select Faculty First'));
                //     }
                //     else
                //     {
                //         // alert(dataString);
                        
                //         $.ajax({
                //             type : 'post',
                //             url: "../controller/scripts/owner/gettrans_class.php",
                //             data :  dataString,
                //             success : function(result)
                //             {
                //                 var obj1 = JSON.parse(result);
                //                 console.log(obj1);
                                
                //                 var z;
                //                 var classname = "";
                //                 var classID = "";
                                
                //                 $('#depositpaymentclass').html('');
                //                 $('#depositpaymentclass').append($('<option>').val(0).text('Select Class'));
                        
                //                 for (z = 0; z < obj1.length; z++) 
                //                 {
                //                     classname = obj1[z].ClassOrDepartmentName;
                //                     classID = obj1[z].ClassOrDepartmentID;
                //                     $('#depositpaymentclass').append($('<option>').val(classID).text(classname));
        
                //                 }
                //             }
                //         });
                    
                //     }
                    
                // });
                
                // $("#depositpaymentclass").change(function(){
                        
                //     $('#depositpaymentterm').html('');
                //     $('#depositpaymentterm').append($('<option>').val(0).text('Loading...'));
                    
                //     var institution = "<?php echo $InstitutionID; ?>";
                //     var classid = $("#depositpaymentclass").val();
                    
                //     var dataString = 'institution='+ institution + '&classid='+ classid;
                    
                //     if(classid == '0' || classid == '')
                //     {
                //         $('#depositpaymentterm').html('');
                //         $('#depositpaymentterm').append($('<option>').val(0).text('Select Class First'));
                //     }
                //     else
                //     {
                //         // alert(dataString);
                        
                //         $.ajax({
                //             type : 'post',
                //             url: "../controller/scripts/owner/gettrans_term.php",
                //             data :  dataString,
                //             success : function(result)
                //             {
                //                 var obj1 = JSON.parse(result);
                //                 console.log(obj1);
                                
                //                 var z;
                //                 var termname = "";
                //                 var termID = "";
                                
                //                 $('#depositpaymentterm').html('');
                //                 $('#depositpaymentterm').append($('<option>').val(0).text('Select Term'));
                        
                //                 for (z = 0; z < obj1.length; z++) 
                //                 {
                //                     termname = obj1[z].TermOrSemesterName;
                //                     termID = obj1[z].TermOrSemesterID;
                //                     $('#depositpaymentterm').append($('<option>').val(termname).text(termname));
        
                //                 }
                //             }
                //         });
                    
                //     }
                    
                // });
                
                // $("#depositpaymentterm").change(function(){
                        
                //     $('#depositpaymentstudent').html('');
                //     $('#depositpaymentstudent').append($('<option>').val(0).text('Loading...'));
                    
                //     var institution = "<?php echo $InstitutionID; ?>";
                //     var termid = $("#depositpaymentterm").val();
                //     var classid = $("#depositpaymentclass").val();
                //     var session = $("#depositpaymentsession").val();
                    
                //     var dataString = 'institution='+ institution + '&termid='+ termid + '&classid='+ classid + '&session='+ session;
                    
                //     if(termid == '0' || termid == '')
                //     {
                //         $('#depositpaymentstudent').html('');
                //         $('#depositpaymentstudent').append($('<option>').val(0).text('Select Term First'));
                //     }
                //     else
                //     {
                //         $.ajax({
                //             type : 'post',
                //             url: "../controller/scripts/owner/gettrans_student.php",
                //             data :  dataString,
                //             success : function(result)
                //             {
                                
                //                 $('#depositpaymentstudent').html(result);
        
                //             }
                //         });
                    
                //     }
                    
                // });
                
                // $("#loadStuddepositpaymentdetails").click(function(){
                    
                //     $("#loadStuddepositpaymentdetails").html('<i class="fa fa-spinner fa-spin"></i>');
                //     $("#depositpaymentbody").html('<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');
                    
                //     var institution = "<?php echo $InstitutionID; ?>";
                //     var session = $("#depositpaymentsession").val();
                //     var faculty = $("#depositpaymentfaculty").val();
                //     var classid = $("#depositpaymentclass").val();
                //     var termid = $("#depositpaymentterm").val();
                //     var student = $("#depositpaymentstudent").val();
                    
                //     var dataString = 'institution='+ institution + '&termid='+ termid + '&classid='+ classid + '&session='+ session + '&faculty='+ faculty + '&student='+ student;
                    
                //     if(session == ' ' || session == "0")
                //     {
                //         $("#loadStuddepositpaymentdetails").html('Load');
                //         $("#depositpaymentbody").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Please Select Session</center></div>');
                //     }
                //     else if(faculty == '' || faculty == '0')
                //     {
                //         $("#loadStuddepositpaymentdetails").html('Load');
                //         $("#depositpaymentbody").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Please Select Faculty</center></div>');
                //     }
                //     else if(classid == '' || classid == '0')
                //     {
                //         $("#loadStuddepositpaymentdetails").html('Load');
                //         $("#depositpaymentbody").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Please Select Class</center></div>');
                //     }
                //     else if(termid == '' || termid == '0')
                //     {
                //         $("#loadStuddepositpaymentdetails").html('Load');
                //         $("#depositpaymentbody").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Please Select Term</center></div>');
                //     }
                //     else if(student == '' || student == '0')
                //     {
                //         $("#loadStuddepositpaymentdetails").html('Load');
                //         $("#depositpaymentbody").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Please Select Student</center></div>');
                //     }
                //     else
                //     {
                        
                //         $.ajax({
                //             type : 'post',
                //             url: "../controller/scripts/owner/getstuddepositpaymentinfo.php",
                //             data :  dataString,
                //             success : function(result)
                //             {
                //                 $("#loadStuddepositpaymentdetails").html('Load');
                //                 $("#depositpaymentbody").html(result);
                                
                //             }
                //         });
                //     }
                    
                // });
        
                $('body').on("keyup change","#depositamount",function(){
                                    
                    var amount = parseInt($(this).val());
        
                    if(amount == '0' || amount == '')
                    {
                        $('#postStuddepositpaymentbtn').html('Post Payment');
                        $('#depositpaymentmsg').html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Please Input Amount Before Proceeding</center></div>');
                    }
                    else
                    {
                        var commasum = amount.toLocaleString();
                        $('#postStuddepositpaymentbtn').html('Post Payment (&#8358; '+commasum+')');
                        $('#depositpaymentmsg').html('');
                        
                    }
                    
                });
        
                $("body").on("click","#postStuddepositpaymentbtn",function(){
                                                
                    $("#postStuddepositpaymentbtn").html('<i class="fa fa-spinner fa-spin"></i> Post Payment');
                    
                    
                    var institution = "<?php echo $InstitutionID; ?>";
                    var userid = "<?php echo $UserID; ?>";
                    var usertype = "<?php echo $userType; ?>";
                    var session = $("#session").val();
                    var faculty = $("#faculty").val();
                    var classid = $("#class").val();
                    var termid = $("#term").val();
                    var student = $("#student").val();
                    var depositorrecipientname = $("#depositpaymentdepositorrecipientname").val();
                    var mop = $("#depositpaymentmop").val();
                    var amount = $("#depositamount").val();
                    
                    var formData = new FormData();
                    var pop = $('#depositpaymentpop')[0].files[0];
                    formData.append('pop', pop);
                    formData.append('mop', mop);
                    formData.append('institution', institution);
                    formData.append('userid', userid);
                    formData.append('usertype', usertype);
                    formData.append('student', student);
                    formData.append('faculty', faculty);
                    formData.append('classid', classid);
                    formData.append('termid', termid);
                    formData.append('session', session);
                    formData.append('amount', amount);
                    formData.append('depositorrecipientname', depositorrecipientname);

                    if(depositorrecipientname == '' || depositorrecipientname == 0 || mop == '' || mop == 0)
                    {
                        $("#postStuddepositpaymentbtn").html('Post Payment');
                        $("#depositpaymentmsg").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Please Select Mode of Payment and input Depositors name before proceeding</center></div>');
                    }
                    else
                    {
                        
                        $.ajax({
                            type: "POST",
                            url: "../controller/scripts/owner/postdepositpaymentofstud.php",
                            method:'POST',
                            data: formData,
                            cache:false,
                            contentType: false,
                            processData: false,
                            
                            success: function(result){
                                $("#depositpaymentmsg").html(result);
                                $("#postStuddepositpaymentbtn").html('Post Payment');
                                
                                
                                var institution = "<?php echo $InstitutionID; ?>";
                                var userid = "<?php echo $UserID; ?>";
                                var usertype = "<?php echo $userType; ?>";
                                var session = $("#session").val();
                                var faculty = $("#faculty").val();
                                var classid = $("#class").val();
                                var termid = $("#term").val();
                                var student = $("#student").val();
                                
                                var dataString = 'institution='+ institution + '&termid='+ termid + '&classid='+ classid + '&session='+ session + '&faculty='+ faculty + '&userid='+ userid + '&usertype='+ usertype + '&student='+ student;
                                
                                $.ajax({
                                    type : 'post',
                                    url: "../controller/scripts/owner/studcompletefeeinfo.php",
                                    data :  dataString,
                                    success : function(resultsec)
                                    {
                                        $("#loadStudfeedetails").html('Load');
                                        $("#body").html(resultsec);
                                        $('#hideoldbebtbtn').show();
                                        $("#hidetransportone").hide();
                                        $("#hidetotalamount").hide();
                                        $("#totalll").hide();
                                        $("#hidetransportoneadddeposittofee").hide();
                                        $("#hidetotalamountadddeposittofee").hide();
                                        $("#totallladddeposittofee").hide();
                                    }
                                });
                            }
                        });

                    }
                    
                });
                
            //========FEE DEPOSIT END=======// 
            
            //========OTHER SOURCE OF INCOME START=======// 
            
                $('#loadothertransdetails').click(function(){
                        
                    $("#loadothertransdetails").html('<i class="fa fa-spinner fa-spin"></i>');
                    $("#otherbody").html('<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');
                    
                    var institution = "<?php echo $InstitutionID; ?>";
                    var othersession = $("#othersession").val();
                    var othercategory = $("#othercategory").val();
                    var otherterm = $("#otherterm").val();
                    
                    var dataString = 'institution=' + institution + '&othersession=' + othersession + '&othercategory=' + othercategory + '&otherterm=' + otherterm;
                    
                    if(othersession == '0' || othercategory == '0' || otherterm == '0' || othersession == '' || othercategory == '' || otherterm == '')
                    {
                        $("#loadothertransdetails").html('Load');
                        $("#otherbody").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Please Filter Before Proceeding</center></div>');
                    
                    }
                    else
                    {
                        $.ajax({
                            type: "POST",
                            url: "../controller/scripts/owner/get-subcatlist.php",
                            data: dataString,
                            cache: false,
                            
                            success: function(result){
                                $("#loadothertransdetails").html('Load');
                                $('#otherbody').html(result);
                                
                            }
                        });
                    }
                    
                });
                  
                $('body').on("change",".sunnycheckboxother",function(){
                    
                    var multipleSelSubcatId = $(this).val();
                    var Subcatname = $(this).data('subcatname');
                    var sunnydefamount = $(this).data('amount');
                    var SubcatId = [];
                    var secamount = [];

                    $.each($("input[name='othermultipleSelSubcatId']:checked"), function(){
                        SubcatId.push($(this).val());
                        secamount.push($(this).data('amount'));
                    });
                    
                    var checkall = $(this).prop("checked");

                    var dataString = '&multipleSelSubcatId=' + multipleSelSubcatId + '&Subcatname=' + Subcatname + '&sunnydefamount=' + sunnydefamount;
                    var dataStringchecked = 'SubcatId=' + SubcatId + '&secamount=' + secamount;
                    // alert(multipleSelSubcatId);
                    if(checkall == false)
                    {
                        var totalamount = $("#othertotalamount").val();
                        var addedamount = $('#othertotal'+multipleSelSubcatId).val();

                        if((totalamount == 0 || totalamount == '' || totalamount == undefined) && SubcatId.length === 0)
                        {
                            // alert(totalamount);
                            $('#otherrow'+multipleSelSubcatId).remove();
                            $('#othertotalll').hide();
                            $("#othermsg").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Nothing has been selected</center></div>');
                            $('#postotherpaymentbtn').html('Post Payment');
                        }
                        else
                        {
                            // alert(addedamount);
                            $('#otherrow'+multipleSelSubcatId).remove();
                            $("#othermsg").html('');

                            var sum = (+totalamount) - (+addedamount);
                            var commasum = sum.toLocaleString();
                            $('#othertotalll').show();
                            $('#othertotalamount').val(sum);
                            $('#postotherpaymentbtn').html('Post Payment (&#8358; '+commasum+')');

                        }
                        
                    }
                    else
                    {
                        
                        $.ajax({
                            type: "POST",
                            url: "../controller/scripts/owner/display-othersummary.php",
                            data: dataString,
                            cache: false,
                            
                            success: function(result){
                                $('#othersummary').append(result);
                                $("#othermsg").html('');
                            
                            }
                        });

                        var othertotalamount = $("#othertotalamount").val();
                            // alert(othertotalamount);
                        if(othertotalamount == 0 || othertotalamount == '' || othertotalamount == undefined)
                        {
                            // alert(dataStringchecked);
                            $.ajax({
                                type: "POST",
                                url: "../controller/scripts/owner/display-getothertotal.php",
                                data: dataStringchecked,
                                cache: false,
                                
                                success: function(result){
                                    $('#othertotalll').show();
                                    $('#othertotalll').html(result);
                                    
                                    var commasum = sunnydefamount.toLocaleString();
                                    
                                    $('#postotherpaymentbtn').html('Post Payment (&#8358; '+commasum+')');
                                }
                            });
                        }
                        else{
                            $.ajax({
                                type: "POST",
                                url: "../controller/scripts/owner/display-getothertotal.php",
                                data: dataStringchecked,
                                cache: false,
                                
                                success: function(result){
                                    $('#othertotalll').show();
                                    $('#othertotalll').html(result);

                                    var sum = (+totalamount) + (+amount);
                                    var commasum = sum.toLocaleString();
                                    
                                    $('#postotherpaymentbtn').html('Post Payment (&#8358; '+commasum+')');
                                }
                            });
                            var sum = (+totalamount) + (+amount);
                            var commasum = sum.toLocaleString();
                            $('#othertotalll').show();
                            $('#othertotalamount').val(sum)
                            $('#postotherpaymentbtn').html('Post Payment (&#8358; '+commasum+')');
                        
                        }
                    }
                        
                });

                $("body").on("keyup change",".otherquantity", function(){

                    $("#othertotalll").html('<i class="fa fa-spinner fa-spin"></i>');
                    $('#postotherpaymentbtn').hide();
                    var otherquantitycheck = $(this).val();

                    // alert(otherquantitycheck);
                    if(otherquantitycheck == 0 || otherquantitycheck == '' || otherquantitycheck == ' ' || otherquantitycheck == undefined)
                    {
                        $('#othertotalll').html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Please no amount should be 0 or empty</center></div>');
                        $('#postotherpaymentbtn').hide();
                    }
                    else{

                        // alert('sunny');
                        var otherquantity = [];
                        var catid = [];
                        $.each($(".otherquantity"), function(){
                            otherquantity.push($(this).val());
                            catid.push($(this).data('catid'));
                        });

                        var dataString = '&otherquantity='+ otherquantity + '&catid=' + catid;
                        $.ajax({
                            type: "POST",
                            url: "../controller/scripts/owner/display-othertotal.php",
                            data: dataString,
                            cache: false,
                            
                            success: function(result){
                                $('#othertotalll').html(result);
                                $('#postotherpaymentbtn').show();

                                var totalamount = $("#othertotalamount").val();
                                var sum = parseInt(totalamount);
                                var commasum = sum.toLocaleString();
                                // alert(totalamount);
                                $('#postotherpaymentbtn').html('Post Payment (&#8358; '+commasum+')');
                                
                            }
                        });
                            
                    }

                });
                
                $('body').on('click','.btn_removeother', function(){
                    
                    var button_id = $(this).data("catid");
                    
                    
                    var button_quan = $('#othertotal'+button_id).val();

                    $(this).parents('#otherrow'+button_id).remove();

                    $('input:checkbox[value="' + button_id + '"]').prop('checked', false);

                    // alert(button_quan);
                    var totalamount = $("#othertotalamount").val();
                    // alert('total='+totalamount);
                    
                    var sum = (+totalamount) - (+button_quan);
                    var commasum = sum.toLocaleString();
                    $('#othertotalamount').val(sum);
                    $('#postotherpaymentbtn').html('Post Payment (&#8358; '+commasum+')');
                    
                    var totalamountch = $("#othertotalamount").val();

                    var SubcatId = [];
                    var secamount = [];

                    $.each($("input[name='othermultipleSelSubcatId']:checked"), function(){
                        SubcatId.push($(this).val());
                        secamount.push($(this).data('amount'));
                    });
                    
                    if((totalamountch == 0 || totalamountch == '' || totalamountch == undefined) && SubcatId.length===0)
                    {
                        $('#othertotalll').hide();
                        $("#othermsg").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Nothing has been selected</center></div>');
                        $('#postotherpaymentbtn').html('Post Payment');
                    }
                });
                
                $("body").on("click","#postotherpaymentbtn",function(){
                                                
                    $("#postotherpaymentbtn").html('<i class="fa fa-spinner fa-spin"></i> Post Payment');
                    
                    var subcatid = [];
                
                    var amount = [];
                    $.each($(".norms"), function(){
                        var checker = $(this).val();
                        
                        if(checker == '0' || checker == '')
                        {
                        
                        }
                        else
                        {
                            amount.push(checker);
                            subcatid.push($(this).data('catid'));
                        }
                        
                    });

                    var amountlength =amount.length;

                    var SubcatId = [];

                    $.each($("input[name='othermultipleSelSubcatId']:checked"), function(){
                        SubcatId.push($(this).val());
                    });

                    var SubcatIdlength = SubcatId.length;
                    
                    // alert(amount);
                    
                    console.log(amount);
                    
                    console.log(subcatid);
                    
                    var institution = "<?php echo $InstitutionID; ?>";
                    var userid = "<?php echo $UserID; ?>";
                    var usertype = "<?php echo $userType; ?>";
                    var depositorrecipientname = $("#depositorrecipientname").val();
                    var session = $("#othersession").val();
                    var mop = $("#mop").val();
                    var category = $("#othercategory").val();
                    var termid = $("#otherterm").val();
                    var student = $("#student").val();
                    
                    var formData = new FormData();
                    var popayment = $('#popayment')[0].files[0];
                    formData.append('popayment', popayment);
                    formData.append('institution', institution);
                    formData.append('userid', userid);
                    formData.append('usertype', usertype);
                    formData.append('depositorrecipientname', depositorrecipientname);
                    formData.append('session', session);
                    formData.append('mop', mop);
                    formData.append('subcatid', subcatid);
                    formData.append('amount', amount);
                    formData.append('termid', termid);
                    formData.append('category', category);
                    
                    if(depositorrecipientname == '' || depositorrecipientname == 0 || mop == '' || mop == 0)
                    {
                        $("#postotherpaymentbtn").html('Post Payment');
                        $("#othermsg").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Please Select Mode of Payment and input Depositors name before proceeding</center></div>');
                    }
                    else if(amountlength != SubcatIdlength)
                    {
                        $("#postotherpaymentbtn").html('Post Payment');
                        $("#othermsg").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Please Input Amount</center></div>');
                    }
                    else
                    {
                        
                        $.ajax({
                            type: "POST",
                            url: "../controller/scripts/owner/Insert-otherpaymenttrans.php",
                            method:'POST',
                            data: formData,
                            cache:false,
                            contentType: false,
                            processData: false,
                            
                            success: function(result){
                                
                                var institution = "<?php echo $InstitutionID; ?>";
                                var othersession = $("#othersession").val();
                                var othercategory = $("#othercategory").val();
                                var otherterm = $("#otherterm").val();
                                
                                var dataString = 'institution=' + institution + '&othersession=' + othersession + '&othercategory=' + othercategory + '&otherterm=' + otherterm;
                                
                                $.ajax({
                                    type: "POST",
                                    url: "../controller/scripts/owner/get-subcatlist.php",
                                    data: dataString,
                                    cache: false,
                                    
                                    success: function(data){
                                        $("#loadothertransdetails").html('Load');
                                        $('#otherbody').html(data);
                                        $("#othermsg").html(result);
                                        $("html, body").animate({ scrollTop: $(document).height() }, 1000);
                                        
                                    }
                                });
                            }
                        });

                    }
                    
                });

            //========OTHER SOURCE OF INCOME END=======// 
            </script>
   
</body>

</html>
