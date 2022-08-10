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
    <title>Dashboad | <?php echo $PrimaryName.' '.$SecondaryName; ?></title>
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
<style>
    .dropdown-submenu {
  position: relative;
}

.dropdown-submenu .dropdown-menu {
  top: 0;
  left: 100%;
  margin-top: -1px;
}
</style>
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
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                               
        <?php include ('../includes/menu-accountant.php'); ?>
            </div>
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
                    <h2 class="text-themecolor" style="color: black; font-weight: 500;">School Accountant Dashboard</h2>
                </div>
                <div class="col-md-2 align-self-center" style="margin-bottom: -20px;">
                   
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
                        <!-- Column -->
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <!-- Row -->
                                    <div class="row">
                                    
                                        <div class="col-12" id="sunnystudforschl">
                                        <?php  
                                        
                                            // statusforcurrentterm = 1
                                            // statusforpreviousterm = 2

                                                    $dfltsqltermorsemester = mysqli_query($link,"SELECT * FROM `termorsemester` WHERE `status`=2");
                                                    $dfltquerytermorsemester = mysqli_fetch_assoc($dfltsqltermorsemester);
                                                    $dfltcnttermorsemester = mysqli_num_rows($dfltsqltermorsemester);

                                                    if($dfltcnttermorsemester > 0)
                                                    {
                                                        do{
                                                            $dfltterm = $dfltquerytermorsemester['TermOrSemesterName'];

                                                            if($dfltterm == 'Third' || $dfltterm == 'Spring')
                                                            {
                                                                $dfltsqlsession = mysqli_query($link,"SELECT * FROM `session` WHERE `sessionStatus`=2");
                                                                $dfltquerysession = mysqli_fetch_assoc($dfltsqlsession);
                                                                $dfltcntsession = mysqli_num_rows($dfltsqlsession);
                                                                
                                                                $dfltsession = $dfltquerysession['sessionName'];
        
                                                            }
                                                            else
                                                            {
                                                                $dfltsqlsession = mysqli_query($link,"SELECT * FROM `session` WHERE `sessionStatus`=1");
                                                                $dfltquerysession = mysqli_fetch_assoc($dfltsqlsession);
                                                                $dfltcntsession = mysqli_num_rows($dfltsqlsession);
                                                                
                                                                $dfltsession = $dfltquerysession['sessionName'];
    
                                                            }

                                                            $dfltsqlclassordepartmentstudentallocation = mysqli_query($link,"SELECT COUNT(StudentID) AS numofstud,Session,ClassOrDepartmentID FROM `classordepartmentstudentallocation` WHERE InstitutionID='$InstitutionID' AND Session='$dfltsession' GROUP by ClassOrDepartmentID");
                                                            $dfltqueryclassordepartmentstudentallocation = mysqli_fetch_assoc($dfltsqlclassordepartmentstudentallocation);
                                                            $dfltcntclassordepartmentstudentallocation = mysqli_num_rows($dfltsqlclassordepartmentstudentallocation);

                                                            if($dfltcntclassordepartmentstudentallocation > 0)
                                                            {
                                                                do{
                                                                    $dfltclass = $dfltqueryclassordepartmentstudentallocation['ClassOrDepartmentID'];
                                                                    $numofstud = $dfltqueryclassordepartmentstudentallocation['numofstud'];

                                                                    
                                                                    $dfltsqlchargestructure = mysqli_query($link,"SELECT SUM(amount) AS total FROM `chargestructure` WHERE InstitutionID='$InstitutionID' AND termOrSemesterName='$dfltterm' AND sessionName='$dfltsession' AND `status`='1' AND `ClassOrDepartmentID`='$dfltclass'");
                                                                    $dfltquerychargestructure = mysqli_fetch_assoc($dfltsqlchargestructure);
                                                                    $dfltcntchargestructure = mysqli_num_rows($dfltsqlchargestructure);

                                                                    @$dflttotfee += $dfltquerychargestructure['total'] * $numofstud;
                                                                    
                                                                }while($dfltqueryclassordepartmentstudentallocation = mysqli_fetch_assoc($dfltsqlclassordepartmentstudentallocation));
                                                            }
                                                                
                                                            $dfltsqlolddeptupload = ("SELECT SUM(amount) AS total FROM olddept WHERE `InstitutionID` = '$InstitutionID' AND UploadType = 'olddeptupload'");
                                                            $dfltresultolddeptupload = mysqli_query($link, $dfltsqlolddeptupload);
                                                            $dfltrowolddeptupload = mysqli_fetch_assoc($dfltresultolddeptupload);
                                                            $dfltrow_cntolddeptupload = mysqli_num_rows($dfltresultolddeptupload);
                                                            
                                                            if($dfltrow_cntolddeptupload > 0)
                                                            {
                                                                $dfltolddeptupload = $dfltrowolddeptupload['total'];
                                                            }
                                                            else
                                                            {
                                                                $dfltolddeptupload = 0;
                                                            }
                            
                                                            $dfltschooltotfee = $dflttotfee + $dfltolddeptupload;

                                                            $dfltsqltransaction = mysqli_query($link,"SELECT SUM(amountPaid) AS total FROM (SELECT DISTINCT(transaction.studentID),transaction.subCategoryID,transaction.amountPaid FROM `transaction` INNER JOIN chargestructure ON transaction.subCategoryID = chargestructure.subCategoryID WHERE chargestructure.status=1 AND chargestructure.sessionName='$dfltsession' AND chargestructure.termOrSemesterName='$dfltterm' AND transaction.transactionType='income' AND transaction.transactionSubType='fees' AND transaction.status='1' AND transaction.InstitutionID='$InstitutionID' AND transaction.deleteStatus='0' AND transaction.sessionName='$dfltsession' AND transaction.termOrSemesterName='$dfltterm') A");
                                                            $dfltquerytransaction = mysqli_fetch_assoc($dfltsqltransaction);
                                                            $dfltcnttransaction = mysqli_num_rows($dfltsqltransaction);
                                                            
                                                            if($dfltcnttransaction > 0)
                                                            {
                                                                @$dflttransaction += $dfltquerytransaction['total'];
                                                            }
                                                            else
                                                            {
                                                                $dflttransaction = 0;
                                                            }

                                                            $dfltsqlfeewaver = mysqli_query($link,"SELECT SUM(WaverAmount) AS total FROM (SELECT DISTINCT(feewaver.studentID),feewaver.subCategoryID,feewaver.WaverAmount FROM `feewaver` INNER JOIN chargestructure ON feewaver.subCategoryID = chargestructure.subCategoryID WHERE chargestructure.status=1 AND chargestructure.sessionName='$dfltsession' AND chargestructure.termOrSemesterName='$dfltterm' AND feewaver.status!='0' AND feewaver.InstitutionID='$InstitutionID' AND feewaver.deletestatus='0' AND feewaver.sessionName='$dfltsession' AND feewaver.termOrSemesterName='$dfltterm') A");
                                                            $dfltqueryfeewaver = mysqli_fetch_assoc($dfltsqlfeewaver);
                                                            $dfltcntfeewaver = mysqli_num_rows($dfltsqlfeewaver);
                                                        
                                                            if($dfltcntfeewaver > 0)
                                                            {
                                                                @$dfltfeewaver += $dfltqueryfeewaver['total'];
                                                            }
                                                            else
                                                            {
                                                                $dfltfeewaver = 0;
                                                            }

                                                            $dfltsqlolddeptpayment = ("SELECT SUM(amount) AS total FROM olddept WHERE `InstitutionID` = '$InstitutionID' AND UploadType = 'olddeptpayment'");
                                                            $dfltresultolddeptpayment = mysqli_query($link, $dfltsqlolddeptpayment);
                                                            $dfltrowolddeptpayment = mysqli_fetch_assoc($dfltresultolddeptpayment);
                                                            $dfltrow_cntolddeptpayment = mysqli_num_rows($dfltresultolddeptpayment);
                                                            
                                                            if($dfltrow_cntolddeptpayment > 0)
                                                            {
                                                                @$dfltolddeptpayment += $dfltrowolddeptpayment['total'];
                                                            }
                                                            else
                                                            {
                                                                $dfltolddeptpayment = 0;
                                                            }

                                                            
                                                            $dfltsqlDepositPayment = mysqli_query($link,"SELECT SUM(amountPaid) AS total FROM (SELECT DISTINCT(transaction.studentID),transaction.subCategoryID,transaction.amountPaid FROM `transaction` INNER JOIN chargestructure ON transaction.subCategoryID = chargestructure.subCategoryID WHERE chargestructure.status=1 AND chargestructure.sessionName='$dfltsession' AND chargestructure.termOrSemesterName='$dfltterm' AND transaction.transactionType='income' AND transaction.transactionSubType='fees' AND transaction.status='1' AND transaction.InstitutionID='$InstitutionID' AND transaction.deleteStatus='0' AND transaction.modeofPayment='DepositPayment' AND transaction.sessionName='$dfltsession' AND transaction.termOrSemesterName='$dfltterm') A");
                                                            $dfltqueryDepositPayment = mysqli_fetch_assoc($dfltsqlDepositPayment);
                                                            $dfltcntDepositPayment = mysqli_num_rows($dfltsqlDepositPayment);
                                                            
                                                            if($dfltcntDepositPayment > 0)
                                                            {
                                                                @$dfltDepositPayment += $dfltqueryDepositPayment['total'];
                                                            }
                                                            else
                                                            {
                                                                $dfltDepositPayment = 0;
                                                            }

                                                            $dfltsqldepositpaymentsec = mysqli_query($link,"SELECT SUM(amountPaid) AS total FROM `depositpayment` WHERE InstitutionID='$InstitutionID' AND deleteStatus='0' AND sessionName='$dfltsession' AND termOrSemesterName='$dfltterm'");
                                                            $dfltquerydepositpaymentsec = mysqli_fetch_assoc($dfltsqldepositpaymentsec);
                                                            $dfltcntdepositpaymentsec = mysqli_num_rows($dfltsqldepositpaymentsec);
                                                            
                                                            if($dfltcntdepositpaymentsec > 0)
                                                            {
                                                                @$dfltdepositpaymentsec += $dfltquerydepositpaymentsec['total'];
                                                            }
                                                            else
                                                            {
                                                                $dfltdepositpaymentsec = 0;
                                                            }

                                                            $dfltfdepositpayment = $dfltdepositpaymentsec - $dfltDepositPayment;

                                                            $dfltstudfeepaid = $dflttransaction + $dfltfeewaver + $dfltolddeptpayment;

                                                            $dfltamtlefttopay = '&#8358;'.number_format($dfltschooltotfee - $dfltstudfeepaid - $dfltfdepositpayment);
                                                        }while($dfltquerytermorsemester = mysqli_fetch_assoc($dfltsqltermorsemester));
                                                    }
                                                    else
                                                    {

                                                    }
                                                
                                        ?>
                                            
                                            <h2 style="float: right; margin-top: 5px; color: #ff8585;" class="m-b-0"><img src="https://img.icons8.com/ios-filled/30/ff8585/debt.png"/></h2>
                                            <h3 class="" style="color: #ff8585;"><?php echo $dflttotfee;?></h3>
                                            <h6 class="card-subtitle" style="color: #ff8585;">Debt From Last Term</h6></div>
                                        <div class="col-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 50%; height: 6px; background-color: #ff8585;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <!-- Row -->
                                    <div class="row">
                                        <div class="col-12">
                                            <?php  
                                            
                                            // statusforcurrentterm = 1
                                            // statusforpreviousterm = 2
            
                                                    $eittsqltermorsemester = mysqli_query($link,"SELECT * FROM `termorsemester` WHERE status='1'");
                                                    $eittquerytermorsemester = mysqli_fetch_assoc($eittsqltermorsemester);
                                                    $eittcnttermorsemester = mysqli_num_rows($eittsqltermorsemester);
            
                                                    if($eittcnttermorsemester > 0)
                                                    {
                                                        do{
                                                            
                                                            $eittterm = $eittquerytermorsemester['TermOrSemesterName'];
            
                                                            $eittsqlsession = mysqli_query($link,"SELECT * FROM `session` WHERE sessionStatus='1'");
                                                            $eittquerysession = mysqli_fetch_assoc($eittsqlsession);
                                                            $eittcntsession = mysqli_num_rows($eittsqlsession);
                                                            
                                                            $eittsession = $eittquerysession['sessionName'];
    
                                                            $eittsqlclassordepartmentstudentallocation = mysqli_query($link,"SELECT COUNT(StudentID) AS numofstud,Session,ClassOrDepartmentID FROM `classordepartmentstudentallocation` WHERE InstitutionID='$InstitutionID' AND Session='$eittsession' GROUP by ClassOrDepartmentID");
                                                            $eittqueryclassordepartmentstudentallocation = mysqli_fetch_assoc($eittsqlclassordepartmentstudentallocation);
                                                            $eittcntclassordepartmentstudentallocation = mysqli_num_rows($eittsqlclassordepartmentstudentallocation);
    
                                                            if($eittcntclassordepartmentstudentallocation > 0)
                                                            {
                                                                do{
                                                                    $eittclass = $eittqueryclassordepartmentstudentallocation['ClassOrDepartmentID'];
                                                                    $numofstud = $eittqueryclassordepartmentstudentallocation['numofstud'];
    
                                                                    
                                                                    $eittsqlchargestructure = mysqli_query($link,"SELECT SUM(amount) AS total FROM `chargestructure` WHERE InstitutionID='$InstitutionID' AND termOrSemesterName='$eittterm' AND sessionName='$eittsession' AND `status`='1' AND `ClassOrDepartmentID`='$eittclass'");
                                                                    $eittquerychargestructure = mysqli_fetch_assoc($eittsqlchargestructure);
                                                                    $eittcntchargestructure = mysqli_num_rows($eittsqlchargestructure);
    
                                                                    @$eitttotfee += $eittquerychargestructure['total'] * $numofstud;
                                                                    
                                                                }while($eittqueryclassordepartmentstudentallocation = mysqli_fetch_assoc($eittsqlclassordepartmentstudentallocation));
                                                            }
                                                                
                                                        }while($eittquerytermorsemester = mysqli_fetch_assoc($eittsqltermorsemester));
                                                    }
                                                    else
                                                    {
            
                                                    }
                                                    
                                                    $eittsqlolddeptupload = ("SELECT SUM(amount) AS total FROM olddept WHERE `InstitutionID` = '$InstitutionID' AND UploadType = 'olddeptupload'");
                                                    $eittresultolddeptupload = mysqli_query($link, $eittsqlolddeptupload);
                                                    $eittrowolddeptupload = mysqli_fetch_assoc($eittresultolddeptupload);
                                                    $eittrow_cntolddeptupload = mysqli_num_rows($eittresultolddeptupload);
                                                    
                                                    if($eittrow_cntolddeptupload > 0)
                                                    {
                                                        @$eittolddeptupload += $eittrowolddeptupload['total'];
                                                    }
                                                    else
                                                    {
                                                        $eittolddeptupload = 0;
                                                    }
                    
                                                    $eittschooltotfee = $eitttotfee + $eittolddeptupload;
                        
                                                    $eittsqltransaction = mysqli_query($link,"SELECT SUM(amountPaid) AS total FROM (SELECT DISTINCT(transaction.studentID),transaction.subCategoryID,transaction.amountPaid FROM `transaction` INNER JOIN chargestructure ON transaction.subCategoryID = chargestructure.subCategoryID WHERE chargestructure.status=1 AND transaction.transactionType='income' AND transaction.transactionSubType='fees' AND transaction.status='1' AND transaction.InstitutionID='$InstitutionID' AND transaction.deleteStatus='0') A");
                                                    $eittquerytransaction = mysqli_fetch_assoc($eittsqltransaction);
                                                    $eittcnttransaction = mysqli_num_rows($eittsqltransaction);
                                                    
                                                    if($eittcnttransaction > 0)
                                                    {
                                                        @$eitttransaction += $eittquerytransaction['total'];
                                                    }
                                                    else
                                                    {
                                                        $eitttransaction = 0;
                                                    }
            
                                                    $eittsqlDepositPayment = mysqli_query($link,"SELECT SUM(amountPaid) AS total FROM (SELECT DISTINCT(transaction.studentID),transaction.subCategoryID,transaction.amountPaid FROM `transaction` INNER JOIN chargestructure ON transaction.subCategoryID = chargestructure.subCategoryID WHERE chargestructure.status=1 AND transaction.transactionType='income' AND transaction.transactionSubType='fees' AND transaction.status='1' AND transaction.InstitutionID='$InstitutionID' AND transaction.deleteStatus='0' AND transaction.modeofPayment='DepositPayment') A");
                                                    $eittqueryDepositPayment = mysqli_fetch_assoc($eittsqlDepositPayment);
                                                    $eittcntDepositPayment = mysqli_num_rows($eittsqlDepositPayment);
                                                    
                                                    if($eittcntDepositPayment > 0)
                                                    {
                                                        @$eittDepositPayment += $eittqueryDepositPayment['total'];
                                                    }
                                                    else
                                                    {
                                                        $eittDepositPayment = 0;
                                                    }
            
                                                    $eittsqldepositpaymentsec = mysqli_query($link,"SELECT SUM(amountPaid) AS total FROM `depositpayment` WHERE InstitutionID='$InstitutionID' AND deleteStatus='0'");
                                                    $eittquerydepositpaymentsec = mysqli_fetch_assoc($eittsqldepositpaymentsec);
                                                    $eittcntdepositpaymentsec = mysqli_num_rows($eittsqldepositpaymentsec);
                                                    
                                                    if($eittcntdepositpaymentsec > 0)
                                                    {
                                                        @$eittdepositpaymentsec += $eittquerydepositpaymentsec['total'];
                                                    }
                                                    else
                                                    {
                                                        $eittdepositpaymentsec = 0;
                                                    }
            
                                                    $eittsqlfeewaver = mysqli_query($link,"SELECT SUM(WaverAmount) AS total FROM (SELECT DISTINCT(feewaver.studentID),feewaver.subCategoryID,feewaver.WaverAmount FROM feewaver INNER JOIN chargestructure ON feewaver.subCategoryID = chargestructure.subCategoryID WHERE chargestructure.status=1 AND feewaver.status!=0 AND feewaver.subCategoryTitle!='Transportation' AND feewaver.InstitutionID='$InstitutionID' AND feewaver.deletestatus='0') A");
                                                    $eittqueryfeewaver = mysqli_fetch_assoc($eittsqlfeewaver);
                                                    $eittcntfeewaver = mysqli_num_rows($eittsqlfeewaver);
                                                
                                                    if($eittcntfeewaver > 0)
                                                    {
                                                        @$eittfeewaver += $eittqueryfeewaver['total'];
                                                    }
                                                    else
                                                    {
                                                        $eittfeewaver = 0;
                                                    }
            
                                                    $eittsqlolddeptpayment = ("SELECT SUM(amount) AS total FROM olddept WHERE `InstitutionID` = '$InstitutionID' AND UploadType = 'olddeptpayment'");
                                                    $eittresultolddeptpayment = mysqli_query($link, $eittsqlolddeptpayment);
                                                    $eittrowolddeptpayment = mysqli_fetch_assoc($eittresultolddeptpayment);
                                                    $eittrow_cntolddeptpayment = mysqli_num_rows($eittresultolddeptpayment);
                                                    
                                                    if($eittrow_cntolddeptpayment > 0)
                                                    {
                                                        @$eittolddeptpayment += $eittrowolddeptpayment['total'];
                                                    }
                                                    else
                                                    {
                                                        $eittolddeptpayment = 0;
                                                    }
            
                                                
                                                
                                                $fdepositpayment = $eittdepositpaymentsec - $eittDepositPayment;
            
                                                $eittstudfeepaid = $eitttransaction + $eittfeewaver + $eittolddeptpayment;
            
                                                $eittamtlefttopay = '&#8358;'.number_format($eittschooltotfee - $eittstudfeepaid - $fdepositpayment);
                                            
                                        ?>
                                            <h2 style="float: right; margin-top: 5px; color: #FFFF00;" class="m-b-0"><img src="https://img.icons8.com/external-smashingstocks-mixed-smashing-stocks/30/FFFF00/external-income-finance-trading-and-banking-smashingstocks-mixed-smashing-stocks-2.png"/></h2>
                                            <h3 class="" style="color: #FFFF00;">0</h3>
                                            <h6 class="card-subtitle" style="color: #FFFF00;">Number Of Students Owing</h6></div>
                                        <div class="col-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 50%; height: 6px; background-color: #FFFF00;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <!-- Row -->
                                    <div class="row">
                                        <div class="col-12">
                                            
                                            <?php
                                             
                                                        $sqltransaction = mysqli_query($link,"SELECT SUM(amountPaid) AS total FROM `transaction` WHERE InstitutionID='$InstitutionID' AND transactionType='expenditure'");
                                                        $querytransaction = mysqli_fetch_assoc($sqltransaction);
                                                        $cnttransaction = mysqli_num_rows($sqltransaction);

                                                        if($cnttransaction > 0)
                                                        {
                                                            @$expamt += $querytransaction['total'];
                                                        }
                                                        else
                                                        {
                                                            $expamt = '&#8358;0';
                                                        }

                                            ?>

                                            <h2 style="float: right; margin-top: 5px; color: #FE903E;" class="m-b-0"><img src="https://img.icons8.com/ios-glyphs/30/FE903E/cost.png"/></h2>
                                            <h3 class="" style="color: #FE903E;"><?php echo '&#8358;'.number_format($expamt);?></h3>
                                            <h6 class="card-subtitle" style="color: #FE903E;">Total Expenses For This Term</h6></div>
                                        <div class="col-12">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 50%; height: 6px; background-color: #FE903E;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Column -->
                    </div>
                
                    <div class="row">
                        <!-- column -->
                        <!-- column -->
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <div>
                                        <h4 class="card-title" style="color: black;">LAST TERM DEBT OVERVIEW</h4>
                                    </div>
                                    <?php  
                                                
                                        // statusforcurrentterm = 1
                                        // statusforpreviousterm = 2

                                        $chart_data = '';

                                                $graphsqlclassordepartmentstudentallocation = mysqli_query($link,"SELECT DISTINCT(Session) FROM `classordepartmentstudentallocation` WHERE InstitutionID='$InstitutionID' ORDER by Session");
                                                $graphqueryclassordepartmentstudentallocation = mysqli_fetch_assoc($graphsqlclassordepartmentstudentallocation);
                                                $graphcntclassordepartmentstudentallocation = mysqli_num_rows($graphsqlclassordepartmentstudentallocation);
                
                                                if($graphcntclassordepartmentstudentallocation > 0)
                                                {
                                                    do{
                                                        $pinses = $graphqueryclassordepartmentstudentallocation['Session'];
                
                                                        $graphIncomesqltransactionFst = mysqli_query($link,"SELECT SUM(amountPaid) AS total FROM `transaction` WHERE transaction.transactionType='income' AND transaction.transactionSubType='fees' AND transaction.status='1' AND transaction.InstitutionID=' $InstitutionID' AND transaction.deleteStatus='0' AND transaction.sessionName='$pinses' AND transaction.termOrSemesterName='First' OR transaction.termOrSemesterName='Autumn'");
                                                        $graphIncomequerytransactionFst = mysqli_fetch_assoc($graphIncomesqltransactionFst);
                                                        $graphIncomecnttransactionFst = mysqli_num_rows($graphIncomesqltransactionFst);
                                                        
                                                        if($graphIncomecnttransactionFst > 0)
                                                        {
                                                            $graphIncometransactionFst = $graphIncomequerytransactionFst['total'];
                                                        }
                                                        else
                                                        {
                                                            $graphIncometransactionFst = 0;
                                                        }
                    
                                                        $graphIncomesqltransactionscnd = mysqli_query($link,"SELECT SUM(amountPaid) AS total FROM `transaction` WHERE transaction.transactionType='income' AND transaction.transactionSubType='fees' AND transaction.status='1' AND transaction.InstitutionID=' $InstitutionID' AND transaction.deleteStatus='0' AND transaction.sessionName='$pinses' AND transaction.termOrSemesterName='Second' OR transaction.termOrSemesterName='Winter'");
                                                        $graphIncomequerytransactionscnd = mysqli_fetch_assoc($graphIncomesqltransactionscnd);
                                                        $graphIncomecnttransactionscnd = mysqli_num_rows($graphIncomesqltransactionscnd);
                                                        
                                                        if($graphIncomecnttransactionscnd > 0)
                                                        {
                                                            $graphIncometransactionscnd = $graphIncomequerytransactionscnd['total'];
                                                        }
                                                        else
                                                        {
                                                            $graphIncometransactionFst = 0;
                                                        }
                    
                                                        $graphIncomesqltransactionthrd = mysqli_query($link,"SELECT SUM(amountPaid) AS total FROM `transaction` WHERE transaction.transactionType='income' AND transaction.transactionSubType='fees' AND transaction.status='1' AND transaction.InstitutionID=' $InstitutionID' AND transaction.deleteStatus='0' AND transaction.sessionName='$pinses' AND transaction.termOrSemesterName='Third' OR transaction.termOrSemesterName='Spring'");
                                                        $graphIncomequerytransactionthrd = mysqli_fetch_assoc($graphIncomesqltransactionthrd);
                                                        $graphIncomecnttransactionthrd = mysqli_num_rows($graphIncomesqltransactionthrd);
                                                        
                                                        if($graphIncomecnttransactionthrd > 0)
                                                        {
                                                            $graphIncometransactionthrd = $graphIncomequerytransactionthrd['total'];
                                                        }
                                                        else
                                                        {
                                                            $graphIncometransactionthrd = 0;
                                                        }
                        
                                                        $graphIncomesqlolddeptpayment = ("SELECT SUM(amount) AS total FROM olddept WHERE `InstitutionID` = ' $InstitutionID' AND UploadType = 'olddeptpayment'");
                                                        $graphIncomeresultolddeptpayment = mysqli_query($link, $graphIncomesqlolddeptpayment);
                                                        $graphIncomerowolddeptpayment = mysqli_fetch_assoc($graphIncomeresultolddeptpayment);
                                                        $graphIncomerow_cntolddeptpayment = mysqli_num_rows($graphIncomeresultolddeptpayment);
                                                        
                                                        if($graphIncomerow_cntolddeptpayment > 0)
                                                        {
                                                            $graphIncomeolddeptpayment = $graphIncomerowolddeptpayment['total'];
                                                        }
                                                        else
                                                        {
                                                            $graphIncomeolddeptpayment = 0;
                                                        }
                        
                                                        $graphIncomesqlolddeptupload = ("SELECT SUM(amount) AS total FROM olddept WHERE `InstitutionID` = ' $InstitutionID' AND UploadType = 'olddeptupload'");
                                                        $graphIncomeresultolddeptupload = mysqli_query($link, $graphIncomesqlolddeptupload);
                                                        $graphIncomerowolddeptupload = mysqli_fetch_assoc($graphIncomeresultolddeptupload);
                                                        $graphIncomerow_cntolddeptupload = mysqli_num_rows($graphIncomeresultolddeptupload);
                                                        
                                                        if($graphIncomerow_cntolddeptupload > 0)
                                                        {
                                                            $graphIncomeolddeptupload = $graphIncomerowolddeptupload['total'];
                                                        }
                                                        else
                                                        {
                                                            $graphIncomeolddeptupload = 0;
                                                        }
                        
                                                        $ftincome = intval($graphIncometransactionFst);
                        
                                                        $stincome = intval($graphIncometransactionscnd);
                        
                                                        $ttincome = intval($graphIncometransactionthrd);
                                                        
                                                        $chart_data .= "{ Session: '".$pinses."', First: ".$ftincome.", Second: ".$stincome.", Third: ".$ttincome."}, ";
                
                                            
                                                    }while($graphqueryclassordepartmentstudentallocation = mysqli_fetch_assoc($graphsqlclassordepartmentstudentallocation));
                                                    
                                                }
                                                else
                                                {
                
                                                }
                                                
                                            
                
                                            $chart_data = substr($chart_data, 0, -2);
                                       
                                    ?>
                                    <ul class="list-inline text-center m-t-40">
                                        <li>
                                            <h5><span class="dot"></span> First Term</h5>
                                        </li>
                                        <li>
                                            <h5><span class="dott"></span> Second Term</h5>
                                        </li>
                                        <li>
                                            <h5><span class="dottt"></span> Third Term</h5>
                                        </li>   
                                    </ul>
                                    <p>Income</p>
                                    <div id="sunnychart" width="400" height="300"></div>
                                    <h5 align="center" class="card-title">Session</h5>
                                    
                                    <script>
                                    
                                        Morris.Area({
                                        element: 'sunnychart',
                                        data: [ <?php echo $chart_data; ?>

                                            ],
                                            lineColors: ['#55ce63', '#FE903E', '#009efb'],
                                            xkey: 'Session',
                                            ykeys: ['First', 'Second', 'Third'],
                                            labels: ['First Term / Autumn', 'Second Term / Winter', 'Third Term / Spring'],
                                            pointSize: 0,
                                            lineWidth: 0,
                                            resize:true,
                                            fillOpacity: 0.8,
                                            behaveLikeLine: true,
                                            gridLineColor: '#e0e0e0',
                                            hideHover: 'auto'
                                        
                                        });
                                    </script>
                    
                                </div>
                            </div>
                        </div>
                        <!-- column -->
                    </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
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
$(document).ready(function(){
  $('.dropdown-submenu a.test').on("click", function(e){
    $(this).next('ul').toggle();
    e.stopPropagation();
    e.preventDefault();
  });
});
</script>



   



</body>

</html>
