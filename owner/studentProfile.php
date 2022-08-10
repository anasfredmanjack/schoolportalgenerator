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
        <title>Student | <?php echo $fullname; ?></title>
        <!-- Bootstrap Core CSS -->
        <link href="../library/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!--This page css - Morris CSS -->
        <link href="../library/plugins/morrisjs/morris.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="../css/style.php" rel="stylesheet">
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
        <nav class="navbar navbar-expand-lg navbar-white bg-white">
            <?php include ('../includes/menu-owner.php'); ?>
        </nav>
        <!-- End Sidebar navigation -->
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper" style="margin-top: -80px;">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-10 align-self-center">
                    <h2 class="text-themecolor" style="color: black; font-weight: 500;">Students Profile</h2>
                </div>
                <div class="col-md-2 align-self-center">
                    
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
                <!-- Row -->
                <div class="row">
                    <?php 
                        $id = $_GET['id'];

                        $sqlStudInfo = ("SELECT * FROM student WHERE StudentID = '$id'");
                        $resultStudInfo = mysqli_query($link, $sqlStudInfo); 
                        $rowGetStudInfo = mysqli_fetch_assoc($resultStudInfo); 
                        $row_cntStudInfo = mysqli_num_rows($resultStudInfo);

                        $parentid = $rowGetStudInfo['ParentID'] ;
                        $instid = $rowGetStudInfo['InstitutionID'] ;

                        $sqlinstInfo = ("SELECT * FROM institution WHERE institutionID = '$instid'");
                        $resultinstInfo = mysqli_query($link, $sqlinstInfo); 
                        $rowGetinstInfo = mysqli_fetch_assoc($resultinstInfo); 
                        $row_cntinstInfo = mysqli_num_rows($resultinstInfo);

                        $instname = $rowGetinstInfo['InstitutionName'] . " " . $rowGetinstInfo['InstitutionNameTwo'];

                        if($row_cntStudInfo > 0)
                        {
                            $sqlStudclassInfo = ("SELECT * FROM classordepartmentstudentallocation WHERE StudentID = '$id'");
                            $resultStudclassInfo = mysqli_query($link, $sqlStudclassInfo); 
                            $rowGetStudclassInfo = mysqli_fetch_assoc($resultStudclassInfo); 
                            $row_cntStudclassInfo = mysqli_num_rows($resultStudclassInfo);

                            $classid = $rowGetStudclassInfo['ClassOrDepartmentID'];

                            if($row_cntStudclassInfo . 0)
                            {
                                $sqlStudclassdeptInfo = ("SELECT * FROM classordepartment WHERE ClassOrDepartmentID = '$classid'");
                                $resultStudclassdeptInfo = mysqli_query($link, $sqlStudclassdeptInfo); 
                                $rowGetStudclassdeptInfo = mysqli_fetch_assoc($resultStudclassdeptInfo); 
                                $row_cntStudclassdeptInfo = mysqli_num_rows($resultStudclassdeptInfo);

                                $classname = $rowGetStudclassdeptInfo['ClassOrDepartmentName'];
                                $facid = $rowGetStudclassdeptInfo['FacultyOrSchoolID'];

                                if($row_cntStudclassdeptInfo > 0)
                                {
                                    $sqlStudfacInfo = ("SELECT * FROM `facultyorschool` WHERE FacultyOrSchoolID = '$facid'");
                                    $resultStudfacInfo = mysqli_query($link, $sqlStudfacInfo); 
                                    $rowGetStudfacInfo = mysqli_fetch_assoc($resultStudfacInfo); 
                                    $row_cntStudfacInfo = mysqli_num_rows($resultStudfacInfo);

                                    $facname = $rowGetStudfacInfo['FacultyOrSchoolName'];
                                }
                            }
                        }



                    ?>
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <center class="m-t-30"> <img src="../img/profile/<?php echo $rowGetStudInfo['StudentPhoto']; ?>" class="img-circle" width="150" />
                                    <h4 class="card-title m-t-10" style="color: black;"><?php echo $rowGetStudInfo['StudentFirstName'] . " " . $rowGetStudInfo['StudentMiddleName'] . " " . $rowGetStudInfo['StudentLastName']; ?></h4>
                                   
                                </center>
                            </div>
                            <div>
                                <hr> 
                            </div>
                            <div class="card-body">
                                <small class="text-muted">Schools/Institutions</small>
                                <h6 style="color: black;"><?php echo $instname ; ?></h6>

                                <br>

                                <small class="text-muted">Grade/Faculty</small>
                                <h6 style="color: black;"><?php echo $facname ; ?></h6>

                                <br>

                                <small class="text-muted">Class</small>
                                <h6 style="color: black;"><?php echo $classname ; ?></h6>

                                <br>

                                <small class="text-muted">Class/School/Faculty Postion</small>
                                <h6></h6> 
                                
                                <br>
                                
                                <small class="text-muted">Transportation</small>
                                <h6></h6> 
                                
                                <br>
                                
                                <small class="text-muted">School Fees</small><br>
                                <!-- <span class="label label-success font-weight-100" style="background: #4DDC4D;">Paid</span> -->
                                
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist" style="font-weight: 500;">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#information" role="tab">Full Information</a> </li>
                                <!--<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#payment" role="tab">Payment History</a> </li>-->
                                <!--<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#employment" role="tab">Books</a> </li>-->
                                <!--<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#leave" role="tab">Medical History</a> </li>-->
                                <!--<li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#disciplinary" role="tab">Disciplinary</a> </li>-->
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                
                                <!--first tab-->
                                <div class="tab-pane active" id="information" role="tabpanel">
                                    <div class="card-body">
                                        <h3 style="color: black;">Student Information</h3>

                                        <div style="margin: 10px;">
                                            <small class="text-muted">First Name</small>
                                            <h6 style="color: black;"><?php echo $rowGetStudInfo['StudentFirstName'] ; ?></h6>

                                            <small class="text-muted">Last Name</small>
                                            <h6 style="color: black;"><?php echo $rowGetStudInfo['StudentLastName'] ; ?></h6>
            
                                            <small class="text-muted">DOB</small>
                                            <h6 style="color: black;"><?php echo $rowGetStudInfo['StudentDOB'] ; ?></h6>
            
                                            <small class="text-muted">Nationality</small>
                                            <h6 style="color: black;"><?php echo $rowGetStudInfo['StudentCountry'] ; ?></h6>
            
                                            <small class="text-muted">State of Origin</small>
                                            <h6 style="color: black;"><?php echo $rowGetStudInfo['StudentState'] ; ?></h6> 
                                            
                                            <small class="text-muted">LGA</small>
                                            <h6 style="color: black;"><?php echo $rowGetStudInfo['StudentLga'] ; ?></h6> 
                                            
                                            <small class="text-muted">Phone No.</small>
                                            <h6 style="color: black;"><?php echo $rowGetStudInfo['StudentPhone'] ; ?></h6> 

                                            <small class="text-muted">Email Address</small>
                                            <h6 style="color: black;"><?php echo $rowGetStudInfo['StudentEmail'] ; ?></h6>
                                            
                                            <small class="text-muted">Home Address</small>
                                            <h6 style="color: black;"><?php echo $rowGetStudInfo['StudentAddress'] ; ?></h6>

                                            <small class="text-muted">Gender</small>
                                            <h6 style="color: black;"><?php echo $rowGetStudInfo['StudentGender'] ; ?></h6>

                                            <!-- <small class="text-muted">Religious</small>
                                            <h6 style="color: black;">Christian</h6> -->
                                        </div>

                                        <?php 
                                            

                                            $sqlParentInfo = ("SELECT * FROM `parent` WHERE ParentID = '$parentid'");
                                            $resultParentInfo = mysqli_query($link, $sqlParentInfo); 
                                            $rowGetParentInfo = mysqli_fetch_assoc($resultParentInfo); 
                                            $row_cntParentInfo = mysqli_num_rows($resultParentInfo);

                                            if($row_cntParentInfo > 0)
                                            {
                                                $parentfullname = $rowGetParentInfo['ParentFirstName'] . " " . $rowGetParentInfo['ParentMiddleName'] . " " . $rowGetParentInfo['ParentLastName'];
                                                $parentPhone = $rowGetParentInfo['ParentPhone'];
                                                $parentemail = $rowGetParentInfo['ParentEmail'];
                                                $parentAddress = $rowGetParentInfo['ParentHomeAddress'];
                                                $parentoccupation = $rowGetParentInfo['ParentOccupation'];

                                            }
                                            else
                                            {
                                                $parentfullname = 'NA';
                                                $parentPhone = 'NA';
                                                $parentemail = 'NA';
                                                $parentAddress = 'NA';
                                                $parentoccupation = 'NA';
                                            }

                                        ?>

                                        <h3 style="color: black;">Parent/Guardian Information.</h3>

                                        <div style="margin: 10px;">
                                            <small class="text-muted">Name</small>
                                            <h6 style="color: black;"><?php echo $parentfullname ; ?></h6>
            
                                            <small class="text-muted">Phone Number</small>
                                            <h6 style="color: black;"><?php echo $parentPhone ; ?></h6>
            
                                            <small class="text-muted">Email</small>
                                            <h6 style="color: black;"><?php echo $parentemail ; ?></h6>

                                            <small class="text-muted">Home Address</small>
                                            <h6 style="color: black;"><?php echo $parentAddress ; ?></h6>

                                            <small class="text-muted">Occupation</small>
                                            <h6 style="color: black;"><?php echo $parentoccupation ; ?></h6>
            
                                        </div>
                                    </div>
                                </div>
                                <!--first tab-->


                                <!--second tab-->
                                <!--<div class="tab-pane" id="payment" role="tabpanel">-->
                                <!--    <div class="card-body">-->
                                <!--        <div class="row">-->
                                <!--            <div class="col-sm-3">-->
                                               
                                <!--            </div>-->
                                            
                                <!--            <div class="col-sm-2" style="margin-bottom: -20px;">-->
                                <!--                <form>-->
                                <!--                    <div class="form-group">-->
                                <!--                        <select class="form-control chimaPrimaryBorderColor" style="background: white; border-width: 1px; border-style: solid; font-size: 14px;">-->
                                <!--                            <option disabled selected>Session</option>                              -->
                                <!--                        </select>-->
                                <!--                    </div>-->
                                <!--                </form>-->
                                <!--            </div>-->
                                <!--            <div class="col-sm-3" style="margin-bottom: -20px;">-->
                                <!--                <form>-->
                                <!--                    <div class="form-group">-->
                                <!--                        <select class="form-control chimaPrimaryBorderColor" style="background: white; border-width: 1px; border-style: solid; font-size: 14px;">-->
                                <!--                            <option disabled selected>Term/Semester</option>                              -->
                                <!--                        </select>-->
                                <!--                    </div>-->
                                <!--                </form>-->
                                <!--            </div>-->
                                <!--            <div class="col-sm-2" style="margin-bottom: -20px;">-->
                                <!--                <form>-->
                                <!--                    <div class="form-group">-->
                                <!--                        <select class="form-control chimaPrimaryBorderColor" style="background: white; border-width: 1px; width: 80px; border-style: solid; font-size: 14px;">-->
                                <!--                            <option disabled selected>Class</option>                              -->
                                <!--                        </select>-->
                                <!--                    </div>-->
                                <!--                </form>-->
                                <!--            </div>-->
                                <!--            <div class="col-sm-2">-->
                                <!--                <a href="#" type="button" class="btn chimaNormalBtn" style="width: 90px; margin-left: -20px;">-->
                                <!--                    <span style="font-size: 13px;">Load</span>-->
                                <!--                </a>-->
                                <!--            </div>-->
                                <!--            <div class="">-->
                                <!--                <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>-->
                                <!--            </div>-->
                                <!--        </div>-->




                                <!--        <div class="table-responsive" style="margin-top: 30px;">-->
                                <!--            <table class="table">-->
                                <!--                <thead style="font-size: 15px;">-->
                                <!--                    <tr>                                                       -->
                                <!--                        <th style="font-weight: 600;">Type of Payment</th>-->
                                <!--                        <th style="font-weight: 600;">Session</th>-->
                                <!--                        <th style="font-weight: 600;">Term/Semester</th>-->
                                <!--                        <th style="font-weight: 600;">Amount</th>-->
                                <!--                        <th style="font-weight: 600;">Date</th>-->
                                <!--                        <th style="font-weight: 600;">Action</th>-->
                                <!--                    </tr>-->
                                <!--                </thead>-->
                                <!--                <tbody style="font-size: 14px;">-->
                                <!--                    <tr>-->
                                <!--                        <td>School Fees</td>-->
                                <!--                        <td>2020/2021</td>-->
                                <!--                        <td>1st Term</td>-->
                                <!--                        <td>#70,000</td>-->
                                <!--                        <td>03/03/2020</td>-->
                                <!--                        <td>-->
                                <!--                            <a href="#" class="btn btn-sm btn-icon btn-pure btn-outline" data-toggle="modal" data-target="#draft-modal" class="model_img img-responsive">-->
                                <!--                                <i class="fa fa-eye fa-lg" style="color: #8EAAF8;" aria-hidden="true"></i>-->
                                <!--                            </a>-->
                                                            <!--======Draft Modal======-->
                                <!--                                <div id="draft-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">-->
                                <!--                                    <div class="modal-dialog">-->
                                <!--                                        <div class="modal-content">-->
                                <!--                                            <div class="modal-body">-->
                                <!--                                                <span style="float: right; margin-right: 20px;">-->
                                <!--                                                    <a href="#" style="color: black;" ><i class="fa fa-download fa-sm" aria-hidden="true"> Download</a></i>-->
                                <!--                                                    <a href="#" style="color: black; margin-left: 15px;" id="print" ><i class="fa fa-print fa-sm" aria-hidden="true"> Print</a></i>-->
                                <!--                                                </span>    -->
                                <!--                                                <div><img src="../img/draft.png" style="margin-left: -5px;" width="480"></div>-->
                                <!--                                            </div>-->
                                <!--                                            <div class="modal-footer">-->
                                <!--                                                <button type="button" data-dismiss="modal" class="btn btn-dark waves-effect waves-light">Close</button>-->
                                <!--                                            </div>-->
                                <!--                                        </div>-->
                                <!--                                    </div>-->
                                <!--                                </div>-->
                                                             <!--======Draft Modal======-->
                                <!--                         </td>-->
                                <!--                    </tr>-->
                                <!--                    <tr>-->
                                <!--                        <td>Uniforms</td>-->
                                <!--                        <td>2020/2021</td>-->
                                <!--                        <td>1st Term</td>-->
                                <!--                        <td>#30,000</td>-->
                                <!--                        <td>03/03/2020</td>-->
                                <!--                        <td>-->
                                <!--                            <a href="#" class="btn btn-sm btn-icon btn-pure btn-outline" data-toggle="modal" data-target="#draft-modal" class="model_img img-responsive">-->
                                <!--                                <i class="fa fa-eye fa-lg" style="color: #8EAAF8;" aria-hidden="true"></i>-->
                                <!--                            </a>-->
                                <!--                        </td>-->
                                <!--                    </tr>-->
                                <!--                    <tr>-->
                                <!--                        <td>Books</td>-->
                                <!--                        <td>2020/2021</td>-->
                                <!--                        <td>1st Term</td>-->
                                <!--                        <td>#10,000</td>-->
                                <!--                        <td>03/03/2020</td>-->
                                <!--                        <td>-->
                                <!--                            <a href="#" class="btn btn-sm btn-icon btn-pure btn-outline" data-toggle="modal" data-target="#draft-modal" class="model_img img-responsive">-->
                                <!--                                <i class="fa fa-eye fa-lg" style="color: #8EAAF8;" aria-hidden="true"></i>-->
                                <!--                            </a>-->
                                <!--                        </td>-->
                                <!--                    </tr>-->
                                <!--                    <tr>-->
                                <!--                        <td>Sport Wear</td>-->
                                <!--                        <td>2020/2021</td>-->
                                <!--                        <td>1st Term</td>-->
                                <!--                        <td>#15,000</td>-->
                                <!--                        <td>03/03/2020</td>-->
                                <!--                        <td>-->
                                <!--                            <a href="#" class="btn btn-sm btn-icon btn-pure btn-outline" data-toggle="modal" data-target="#draft-modal" class="model_img img-responsive">-->
                                <!--                                <i class="fa fa-eye fa-lg" style="color: #8EAAF8;" aria-hidden="true"></i>-->
                                <!--                            </a>-->
                                <!--                        </td>-->
                                <!--                    </tr>-->
                                                   
                                <!--                </tbody>-->
                                <!--            </table>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</div>-->
                                <!--second tab-->


                                <!--Third tab-->
                                <!--<div class="tab-pane" id="employment" role="tabpanel">-->
                                <!--    <div class="card-body">-->
                                <!--        <div class="row">-->
                                <!--            <div class="col-sm-3">-->
                                               
                                <!--            </div>-->
                                            
                                <!--            <div class="col-sm-2" style="margin-bottom: -20px;">-->
                                <!--                <form>-->
                                <!--                    <div class="form-group">-->
                                <!--                        <select class="form-control chimaPrimaryBorderColor" style="background: white; border-width: 1px; border-style: solid; font-size: 14px;">-->
                                <!--                            <option disabled selected>Session</option>                              -->
                                <!--                        </select>-->
                                <!--                    </div>-->
                                <!--                </form>-->
                                <!--            </div>-->
                                <!--            <div class="col-sm-3" style="margin-bottom: -20px;">-->
                                <!--                <form>-->
                                <!--                    <div class="form-group">-->
                                <!--                        <select class="form-control chimaPrimaryBorderColor" style="background: white; border-width: 1px; border-style: solid; font-size: 14px;">-->
                                <!--                            <option disabled selected>Term/Semester</option>                              -->
                                <!--                        </select>-->
                                <!--                    </div>-->
                                <!--                </form>-->
                                <!--            </div>-->
                                <!--            <div class="col-sm-2" style="margin-bottom: -20px;">-->
                                <!--                <form>-->
                                <!--                    <div class="form-group">-->
                                <!--                        <select class="form-control chimaPrimaryBorderColor" style="background: white; border-width: 1px; width: 80px; border-style: solid; font-size: 14px;">-->
                                <!--                            <option disabled selected>Class</option>                              -->
                                <!--                        </select>-->
                                <!--                    </div>-->
                                <!--                </form>-->
                                <!--            </div>-->
                                <!--            <div class="col-sm-2">-->
                                <!--                <a href="#" type="button" class="btn chimaNormalBtn" style="width: 90px; margin-left: -20px;">-->
                                <!--                    <span style="font-size: 13px;">Load</span>-->
                                <!--                </a>-->
                                <!--            </div>-->
                                <!--            <div class="">-->
                                <!--                <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>-->
                                <!--            </div>-->
                                <!--        </div>-->




                                <!--        <div class="table-responsive" style="margin-top: 30px;">-->
                                <!--            <table class="table">-->
                                <!--                <thead style="font-size: 15px;">-->
                                <!--                    <tr>                                                       -->
                                <!--                        <th style="font-weight: 600;">Type of Books</th>-->
                                <!--                        <th style="font-weight: 600;">Session</th>-->
                                <!--                        <th style="font-weight: 600;">Term/Semester</th>-->
                                <!--                        <th style="font-weight: 600;">Class</th>-->
                                <!--                        <th style="font-weight: 600;">Status</th>-->
                                <!--                        <th style="font-weight: 600;">Date</th>-->
                                <!--                    </tr>-->
                                <!--                </thead>-->
                                <!--                <tbody style="font-size: 14px;">-->
                                <!--                    <tr>-->
                                <!--                        <td>English TextBook</td>-->
                                <!--                        <td>2020/2021</td>-->
                                <!--                        <td>1st Term</td>-->
                                <!--                        <td>SS 1A</td>-->
                                <!--                        <td><span class="label label-success font-weight-100" style="background: #4DDC4D;">Collected</span></td>-->
                                <!--                        <td>03/03/2020</td>-->
                                <!--                    </tr>-->
                                <!--                    <tr>-->
                                <!--                        <td>Math's TextBook</td>-->
                                <!--                        <td>2020/2021</td>-->
                                <!--                        <td>1st Term</td>-->
                                <!--                        <td>SS 1A</td>-->
                                <!--                        <td><span class="label label-success font-weight-100" style="background: #ff0000;">Not Collected</span></td>-->
                                <!--                        <td>------</td>-->
                                <!--                    </tr>-->
                                <!--                    <tr>-->
                                <!--                        <td>Physic TextBook</td>-->
                                <!--                        <td>2020/2021</td>-->
                                <!--                        <td>1st Term</td>-->
                                <!--                        <td>SS 1A</td>-->
                                <!--                        <td><span class="label label-success font-weight-100" style="background: #4DDC4D;">Collected</span></td>-->
                                <!--                        <td>03/03/2020</td>-->
                                <!--                    </tr>-->
                                <!--                    <tr>-->
                                <!--                        <td>Chemistry TextBook</td>-->
                                <!--                        <td>2020/2021</td>-->
                                <!--                        <td>1st Term</td>-->
                                <!--                        <td>SS 1A</td>-->
                                <!--                        <td><span class="label label-success font-weight-100" style="background: #ff0000;">Not Collected</span></td>-->
                                <!--                        <td>------</td>-->
                                <!--                    </tr>-->
                                <!--                    <tr>-->
                                <!--                        <td>Further Math's TextBook</td>-->
                                <!--                        <td>2020/2021</td>-->
                                <!--                        <td>1st Term</td>-->
                                <!--                        <td>SS 1A</td>-->
                                <!--                        <td><span class="label label-success font-weight-100" style="background: #4DDC4D;">Collected</span></td>-->
                                <!--                        <td>03/03/2020</td>-->
                                <!--                    </tr>-->
                                                   
                                <!--                </tbody>-->
                                <!--            </table>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</div>-->
                                <!--Third tab-->


                                <!--Fourth tab-->
                                <!--<div class="tab-pane" id="leave" role="tabpanel">-->
                                <!--    <div class="card-body">-->
                                       
                                <!--        <div class="table-responsive">-->
                                <!--            <table class="table">-->
                                <!--                <thead>-->
                                <!--                    <tr>                                                       -->
                                <!--                        <th style="font-weight: 600;">Disease/Illness</th>-->
                                <!--                        <th style="font-weight: 600;">Drug</th>-->
                                <!--                        <th style="font-weight: 600;">Observation</th>-->
                                <!--                        <th style="font-weight: 600;">Status</th>-->
                                <!--                        <th style="font-weight: 600;">Date</th>-->
                                <!--                    </tr>-->
                                <!--                </thead>-->
                                                
                                <!--                <tbody style="font-size: 14px;">-->
                                <!--                    <tr>-->
                                <!--                        <td>Cough</td>-->
                                <!--                        <td>Arterquin</td>-->
                                <!--                        <td>He was coughing too much<br>Please take a week to rest well.</td>-->
                                <!--                        <td><span class="label label-success font-weight-100" style="background: #4DDC4D;">Treated</span></td>-->
                                <!--                        <td>02-03-2021</td>-->
                                <!--                    </tr>-->
                                <!--                    <tr>-->
                                <!--                        <td>Head Ache</td>-->
                                <!--                        <td>Arterquin</td>-->
                                <!--                        <td>He was coughing too much<br>Please take a week to rest well.</td>-->
                                <!--                        <td><span class="label label-success font-weight-100" style="background: #ff0000;">Not Treated</span></td>-->
                                <!--                        <td>02-03-2021</td>-->
                                <!--                    </tr>-->
                                <!--                    <tr>-->
                                <!--                        <td>Head Ache</td>-->
                                <!--                        <td>Arterquin</td>-->
                                <!--                        <td>He was coughing too much<br>Please take a week to rest well.</td>-->
                                <!--                        <td><span class="label label-success font-weight-100" style="background: #ff0000;">Not Treated</span></td>-->
                                <!--                        <td>02-03-2021</td>-->
                                <!--                    </tr>-->
                                <!--                    <tr>-->
                                <!--                        <td>Head Ache</td>-->
                                <!--                        <td>Arterquin</td>-->
                                <!--                        <td>He was coughing too much<br>Please take a week to rest well.</td>-->
                                <!--                        <td><span class="label label-success font-weight-100" style="background: #4DDC4D;">Treated</span></td>-->
                                <!--                        <td>02-03-2021</td>-->
                                <!--                    </tr>-->
                                                   
                                <!--                </tbody>-->
                                <!--            </table>-->
                                <!--        </div>-->



                                <!--    </div>-->
                                <!--</div>-->
                                <!--Fourth tab-->


                                 <!--Fifth tab-->
                                <!-- <div class="tab-pane" id="disciplinary" role="tabpanel">-->
                                <!--    <div class="card-body">-->
                                       
                                <!--        <div class="table-responsive">-->
                                <!--            <table class="table">-->
                                <!--                <thead>-->
                                <!--                    <tr>                                                       -->
                                <!--                        <th style="font-weight: 600;">Crime Committed</th>-->
                                <!--                        <th style="font-weight: 600;">Description</th>-->
                                <!--                        <th style="font-weight: 600;">Witness</th>-->
                                <!--                        <th style="font-weight: 600;">Penalty</th>-->
                                <!--                        <th style="font-weight: 600;">Date</th>-->
                                <!--                    </tr>-->
                                <!--                </thead>-->
                                                
                                <!--                <tbody style="font-size: 14px;">-->
                                <!--                    <tr>-->
                                <!--                        <td>Theft</td>-->
                                <!--                        <td>He was caught Stealing</td>-->
                                <!--                        <td>Chima Izu</td>-->
                                <!--                        <td>Suspension</td>-->
                                <!--                        <td>02-03-2018</td>-->
                                <!--                    </tr>-->
                                <!--                    <tr>-->
                                <!--                        <td>Fighting</td>-->
                                <!--                        <td>He was caught Stealing</td>-->
                                <!--                        <td>Chima Izu</td>-->
                                <!--                        <td>Flog</td>-->
                                <!--                        <td>02-03-2019</td>-->
                                <!--                    </tr>-->
                                <!--                    <tr>-->
                                <!--                        <td>Insult a teacher</td>-->
                                <!--                        <td>Insult a teacher</td>-->
                                <!--                        <td>Chima Izu</td>-->
                                <!--                        <td>Suspension</td>-->
                                <!--                        <td>02-03-2020</td>-->
                                <!--                    </tr>-->
                                                   
                                <!--                </tbody>-->
                                <!--            </table>-->
                                <!--        </div>-->



                                <!--    </div>-->
                                <!--</div>-->
                                <!--Fifth tab-->
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
</body>

</html>
