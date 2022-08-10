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
    <title>Income and Expenditure Report | <?php echo $fullname; ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="../library/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    
    <link rel="stylesheet" href="../library/plugins/morrisjs/morris.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    
    <!-- Custom CSS -->
    <link href="../css/style.php" rel="stylesheet">
    <link href="../css/blueOwner.php" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    
       <!--Date Picker css---->
     <link href="../js/jquery-ui.min.css"  rel="stylesheet">
  
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<style>
@media print {
    .no-print{
        display:none;
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
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles no-print">
                <div class="col-md-10 align-self-center">
                    <h2 class="text-themecolor" style="color: black; font-weight: 500;">Reports</h2>
                </div>
                <div class="col-md-2 align-self-center" style="margin-bottom: -20px;">
                   
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
                    <div class="row no-print">
                        <div class="col-3">
                        <select class=" form-control" id="inst" name="location">
                            <option value="0">Filter Institute</option>
                            <?php
                            $inst = mysqli_query($link,"SELECT * FROM `institution` WHERE `AgencyOrSchoolOwnerID` = '$UserID'");
                            echo $numofcats = mysqli_num_rows($inst);
                            if($numofcats > 0)
                                 {
                                 while($fetch = mysqli_fetch_assoc($inst)) {
                                                 echo'<option value="'.$fetch['InstitutionID'].'">'.$fetch['InstitutionName'].'</option>';     
                                    }
                                                
                                 }
                                else
                                {
                                 echo'<option value="0">NO INSTITUTION</option>';
                                }
                            ?>
                        </select>
                        </div>
                    </div>
                    <div class="row" style="margin-top:10px;">
                        <div class="col-20">
                            <div class="card table-responsive">
                                
                                <div class="card-body">
                                  
                                    <ul class="nav nav-tabs no-print" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Income Report</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Expenditure Report</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#incomeExpenditure" role="tab" aria-controls="incomeExpenditure" aria-selected="false">Income/Expenditure Report</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            <div class="row" style="padding-top:10px;">
                                                <div class="col-lg-2 no-print">
                                                    <div class="form-group no print">
                                                    <select class="form-control chimaPrimaryBorderColor" id="session1" style="background: white; border-width: 1px; border-style: solid;">
                                                        <option selected value="0">Select Session</option>
                                                        <?php  
                                    					    $sqlGetcategory = ("SELECT * FROM `session` ORDER BY `sessionID` ASC");
                                    					    $resultGetcategory = mysqli_query($link, $sqlGetcategory);
                                    					    $rowGetcategory = mysqli_fetch_assoc($resultGetcategory);
                                    					    $row_cntGetcategory = mysqli_num_rows($resultGetcategory);
                                     					 
                                     					  do{
                                                                echo '<option value="' . $rowGetcategory['sessionName']. '"> ' . $rowGetcategory['sessionName'] . '</option>';
                                                        
                                                        	}while($rowGetcategory = mysqli_fetch_assoc($resultGetcategory));
                                                        ?>
                                                    </select>
                                                </div>
                                                </div>
                                                <div class="col-lg-2 no-print">
                                                    <div class="form-group">
                                                        <select class="form-control chimaPrimaryBorderColor" id="term1" style="background: white; border-width: 1px; border-style: solid;">
                                                            <option selected value = "0">Select Term</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 no-print">
                                                    <div class="form-group">
                                                        <select class="form-control chimaPrimaryBorderColor" id="category1" style="background: white; border-width: 1px; border-style: solid;">
                                                            <option selected value = "0">Select Category</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 no-print">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder = "Start Date" name="" id="startDate"/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 no-print">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"  placeholder = "End Date" name="" id="endDate"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 no-print" style="float:right;">
                                                    <a type="button" class="btn btn-rounded btn-outline-info" id ="loadfilter">
                                                        <span style="font-size: 13px;"><i class="fa fa-spinner"></i>Load</span>
                                                    </a>
                                                </div>
                                                <div class="card table-responsive text-center" id="table">
                                                    <div class="card-body" id="body">
                                                        <div class="alert alert-primary" style= "text-align:center;" role="alert">
                                                             <i class= "fa fa-info-circle "></i> Please Filter Income
                                                        </div>
                                                    </div>
                                                 </div>  
                                            </div>
                                        </div>
                                    <div class="tab-pane fade no-print" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row" style="padding-top:10px;">
                                                <div class="col-lg-2 no-print">
                                                    <div class="form-group">
                                                    <select class="form-control chimaPrimaryBorderColor" id="session2" style="background: white; border-width: 1px; border-style: solid;">
                                                        <option selected disabled>Select Session</option>
                                                        <?php  
                                    					    $sqlGetcategory = ("SELECT * FROM `session` ORDER BY `sessionID` ASC");
                                    					    $resultGetcategory = mysqli_query($link, $sqlGetcategory);
                                    					    $rowGetcategory = mysqli_fetch_assoc($resultGetcategory);
                                    					    $row_cntGetcategory = mysqli_num_rows($resultGetcategory);
                                     					 
                                     					  do{
                                                                echo '<option value="' . $rowGetcategory['sessionName']. '"> ' . $rowGetcategory['sessionName'] . '</option>';
                                                        
                                                        	}while($rowGetcategory = mysqli_fetch_assoc($resultGetcategory));
                                                        ?>
                                                    </select>
                                                </div>
                                                </div>
                                                <div class="col-lg-2 no-print">
                                                    <div class="form-group">
                                                        <select class="form-control chimaPrimaryBorderColor" id="term2" style="background: white; border-width: 1px; border-style: solid;">
                                                            <option selected disabled>Select Term</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 no-print">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder = "Start Date" name="" id="startDate2"/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 no-print">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"  placeholder = "End Date" name="" id="endDate2"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 no-print" style="float:right;">
                                                    <a type="button" class="btn btn-rounded btn-outline-info" id ="load">
                                                        <span style="font-size: 13px;"><i class="fa fa-spinner"></i>Load</span>
                                                    </a>
                                                </div>
                                                <div class="card table-responsive text-center" id="data">
                                                    <div class="card-body" id="body">
                                                        <div class="alert alert-primary" style= "text-align:center;" role="alert">
                                                             <i class= "fa fa-info-circle "></i> Please Filter Expenditure
                                                        </div>
                                                    </div>
                                                 </div>  
                                            </div>
                                        </div>
                                    <div class="tab-pane fade no-print" id="incomeExpenditure" role="tabpanel" aria-labelledby="incomeExpenditure-tab">
                                        <div class="row" style="padding-top:10px;">
                                                <div class="col-lg-2 no-print">
                                                    <div class="form-group">
                                                    <select class="form-control chimaPrimaryBorderColor" id="sessionReport" style="background: white; border-width: 1px; border-style: solid;">
                                                        <option selected disabled>Select Session</option>
                                                        <?php  
                                    					    $sqlGetcategory = ("SELECT * FROM `session` ORDER BY `sessionID` ASC");
                                    					    $resultGetcategory = mysqli_query($link, $sqlGetcategory);
                                    					    $rowGetcategory = mysqli_fetch_assoc($resultGetcategory);
                                    					    $row_cntGetcategory = mysqli_num_rows($resultGetcategory);
                                     					 
                                     					  do{
                                                                echo '<option value="' . $rowGetcategory['sessionName']. '"> ' . $rowGetcategory['sessionName'] . '</option>';
                                                        
                                                        	}while($rowGetcategory = mysqli_fetch_assoc($resultGetcategory));
                                                        ?>
                                                    </select>
                                                </div>
                                                </div>
                                                <div class="col-lg-2 no-print">
                                                    <div class="form-group">
                                                        <select class="form-control chimaPrimaryBorderColor" id="termReport" style="background: white; border-width: 1px; border-style: solid;">
                                                            <option selected disabled>Select Term</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 no-print">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control" placeholder = "Start Date" name="" id="startDateReport"/>
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 no-print">
                                                    <div class="form-group">
                                                        <input type="text" class="form-control"  placeholder = "End Date" name="" id="endDateReport"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 no-print" style="float:right;">
                                                    <a type="button" class="btn btn-rounded btn-outline-info" id ="loadReport">
                                                        <span style="font-size: 13px;"><i class="fa fa-spinner"></i>Load</span>
                                                    </a>
                                                </div>
                                                <div class="card table-responsive text-center" id="report">
                                                    <div class="card-body" id="report">
                                                        <div class="alert alert-primary" style= "text-align:center;" role="alert">
                                                             <i class= "fa fa-info-circle "></i> Please Filter report
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

     <!-- All Jquery UI -->
    <script src="../js/jquery-ui.js"></script>

   
     <script language="javascript">
        $(document).ready(function () {
            $("#startDate").datepicker({
                changeMonth: true,
			    changeYear: true,
                
         });
            $("#endDate").datepicker({
            changeMonth: true,
			changeYear: true
        });
        });
    </script>
     <script language="javascript">
        $(document).ready(function () {
            $("#startDate2").datepicker({
                 changeMonth: true,
			    changeYear: true
               
            }); 
                
            $("#endDate2").datepicker({
                 changeMonth: true,
			    changeYear: true
            });
        });
    </script>
    <script language="javascript">
        $(document).ready(function () {
            $("#startDateReport").datepicker({
                 changeMonth: true,
			    changeYear: true
         });
            $("#endDateReport").datepicker({
                 changeMonth: true,
			    changeYear: true
        });
        });
    </script>

   <!---Filter settings Query----->
 <script>
    $(document).ready(function(){
        $("body").on("change", "#session1", function(){
            
            var inst = $("#inst").val();
            
            if(inst == '0' || inst == ""){
                
                $('#table').html('<i class="fa fa-spinner fa-spin"></i>');
                $('#table').html('<div class="alert alert-danger alert-dismissible d-flex align-items-center fade show"><i class="bi-exclamation-octagon-fill"></i><strong class="mx-2">Please!</strong> You need to filter Institution First.</div>');
            }
            else{
                
                    var session2 = $(this).children("option:selected").val();
        
                    var dataString = 'session1=' + session1;
        
                    $('#term1').html('');
                    $('#term1').append($('<option>').val(0).text('Loading...'));

                    //alert(dataString);
                    if(term1 == '0' || term1 == "")
                    {
        
                        $('#term1').html('');
                        $('#term1').append($('<option>').val(0).text('Select Session First'));
                    }
                    else
                    {
        
                        $.ajax({
                            type : 'post',
                            url: "../controller/scripts/accountant/load_filterSession.php",
                            data :  dataString,
                            success : function(result)
                            {
                                var obj1 = JSON.parse(result);
                                console.log(obj1);
        
                                var z;
                                var termName = "";
                                var termID = "";
                                $('#term1').html('');
                                $('#term1').append($('<option>').val(0).text('Select Term'));
        
                                for (z = 0; z < obj1.length; z++)
                                {
                                    termName = obj1[z].TermOrSemesterName;
                                    termID = obj1[z].TermOrSemesterID;
                                    $('#term1').append($('<option>').val(termName).text(termName));
                                }
                            }
                        });
                    }
                
            }


        });
    });

    // get category
    $(document).ready(function(){

        $("body").on("change", "#term1", function(){

            var term1 = $(this).children("option:selected").val();
            var institution = $("#inst").val();
            var UserID = "<?php echo $UserID ; ?>"
            
            //alert(institution);

            var dataString = 'term1=' + term1 + '&institution=' + institution + '&UserID=' + UserID;

           // alert(dataString);
            if(category1 == '0' || category1 == "")
            {
                $('#category1').html('<i class="fa fa-spinner fa-spin"></i>');
                $('#category1').append($('<option>').val(0).text('Select Term First'));
            }
            else
            {

                $('#category1').html('');
                $('#category1').append($('<option>').val(0).text('Loading...'));


                $.ajax({
                    type : 'post',
                    url: "../controller/scripts/accountant/loadCategory.php",
                    data : dataString,
                    success : function(result){
                        
                        $('#category1').html(result);
                      
                    }
                });
            }

        });
    });
</script>
<!---End Filter settings Query----->



<!---Filter 2 Query----->
<script>
    $(document).ready(function(){
        $("body").on("change", "#session2", function(){
            
            var inst = $("#inst").val();
            
            
            if(inst == '0' || inst == ""){
                
                $('#dat').html('<i class="fa fa-spinner fa-spin"></i>');
                $('#data').html('<div class="alert alert-danger alert-dismissible d-flex align-items-center fade show"><i class="bi-exclamation-octagon-fill"></i><strong class="mx-2">Please!</strong> You need to filter Institution First.</div>');
            }else{

            var session1 = $(this).children("option:selected").val();

            var dataString = 'session1=' + session1;

            $('#term2').html('');
            $('#term2').append($('<option>').val(0).text('Loading...'));

            //alert(dataString);
            if(term2 == '0' || term2 == "")
            {

                $('#term2').html('');
                $('#term2').append($('<option>').val(0).text('Select Session First'));
            }
            else
            {

                $.ajax({
                    type : 'post',
                    url: "../controller/scripts/accountant/load_filterSession.php",
                    data :  dataString,
                    success : function(result)
                    {
                        var obj1 = JSON.parse(result);
                        console.log(obj1);

                        var z;
                        var termName = "";
                        var termID = "";
                        $('#term2').html('');
                        $('#term2').append($('<option>').val(0).text('Select Term'));

                        for (z = 0; z < obj1.length; z++)
                        {
                            termName = obj1[z].TermOrSemesterName;
                            termID = obj1[z].TermOrSemesterID;
                            $('#term2').append($('<option>').val(termName).text(termName));
                        }
                    }
                });
                }
            }

        });
    });
</script>
<!---End Filter settings Query----->

 <!---Filter 3 Query----->
 <script>
    $(document).ready(function(){
        $("body").on("change", "#sessionReport", function(){
            
            var inst = $("#inst").val();
            
            //alert(inst);
            
            if(inst == '0' || inst == ""){
                
                $('#report').html('<i class="fa fa-spinner fa-spin"></i>');
                $('#report').html('<div class="alert alert-danger alert-dismissible d-flex align-items-center fade show"><i class="bi-exclamation-octagon-fill"></i><strong class="mx-2">Please!</strong> You need to filter Institution First.</div>');
            }else{
    
            var session1 = $(this).children("option:selected").val();

            var dataString = 'session1=' + session1;

            $('#termReport').html('');
            $('#termReport').append($('<option>').val(0).text('Loading...'));

            //alert(dataString);
            if(term2 == '0' || term2 == "")
            {

                $('#termReport').html('');
                $('#termReport').append($('<option>').val(0).text('Select Session First'));
            }
            else
            {

                $.ajax({
                    type : 'post',
                    url: "../controller/scripts/accountant/load_filterSession.php",
                    data :  dataString,
                    success : function(result)
                    {
                        var obj1 = JSON.parse(result);
                        console.log(obj1);

                        var z;
                        var termName = "";
                        var termID = "";
                        $('#termReport').html('');
                        $('#termReport').append($('<option>').val(0).text('Select Term'));

                        for (z = 0; z < obj1.length; z++)
                        {
                            termName = obj1[z].TermOrSemesterName;
                            termID = obj1[z].TermOrSemesterID;
                            $('#termReport').append($('<option>').val(termName).text(termName));
                        }
                    }
                });
            }
            
            }

        });
    });
</script>
<!---End Filter settings Query----->


<!---fetch result Income Query----->
<script>
    $(document).ready(function(){
    $("#loadfilter").click(function(){

        $('#loadfilter').html('<i class="fa fa-spinner fa-spin"></i> load');
        $('#table').html('<tr><td style="color: black" align="center" colspan="12"><div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="visually-hidden"></span></div></div></td></tr>');

        var institution = $("#inst").val();
        var UserID = "<?php echo $UserID ; ?>"


        var session1 = $('#session1').val();
        var term1 = $('#term1').val();
        var category1 = $('#category1').val();
        var startDate = $('#startDate').val();
        var endDate = $('#endDate').val();

        //alert(category1);

        var dataString = 'institution=' + institution + '&UserID=' + UserID +'&session1=' + session1 + '&term1=' + term1 + '&category1=' + category1 + '&startDate=' + startDate + '&endDate=' + endDate;

        //alert(dataString);

        if(session1 == '0' || session1 == "" || term1 == '0' || category1 == '0' || startDate == "" || endDate == "")
        {
            $('#loadfilter').html('<i class="fa fa-spinner fa-spin"></i> load', 1000);
            $('#table').html('<div class="alert alert-danger alert-dismissible d-flex align-items-center fade show"><i class="bi-exclamation-octagon-fill"></i><strong class="mx-2">Error!</strong> You need to filter.</div>');
        }
        else
        {
            $('#table').html('<i class="fa fa-spinner fa-spin"></i>', 1000);

            $.ajax({
                type : 'post',
                url: "../controller/scripts/accountant/getIncomeReport.php",
                data :  dataString,
                success : function(result)
                {
                    $('#table').html(result);
                    $('#loadfilter').html('Load');
                    $('#loadfilter').removeAttr("load");

                }
            });

            }

        });
    });
</script>

<!---fetch result Expenditure Query----->
<script>
    $(document).ready(function(){
    $("#load").click(function(){

        $('#load').html('<i class="fa fa-spinner fa-spin"></i> load');
        $('#data').html('<tr><td style="color: black" align="center" colspan="12"><div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="visually-hidden"></span></div></div></td></tr>');

        var institution1 = $("#inst").val();
        var UserID1 = "<?php echo $UserID ; ?>"


        var session1 = $('#session2').val();
        var term1 = $('#term2').val();
        var startDate1 = $('#startDate2').val();
        var endDate1 = $('#endDate2').val();

        //alert(category1);

        var dataString = 'institution1=' + institution1 + '&UserID1=' + UserID1 +'&session1=' + session1 + '&term1=' + term1 + '&startDate1=' + startDate1 + '&endDate1=' + endDate1;

        //alert(dataString);

        if(session1 == '0' || session1 == "" || term1 == "" ||  startDate == "" || endDate == "")
        {
            $('#load').html('<i class="fa fa-spinner fa-spin"></i> load', 1000);
            $('#data').html('<div class="alert alert-danger alert-dismissible d-flex align-items-center fade show"><i class="bi-exclamation-octagon-fill"></i><strong class="mx-2">Error!</strong> You need to filter.</div>');
        }
        else
        {
            $('#data').html('<i class="fa fa-spinner fa-spin"></i>', 1000);

            $.ajax({
                type : 'post',
                url: "../controller/scripts/accountant/getExpenditureReport.php",
                data :  dataString,
                success : function(result)
                {

                   // alert(result);

                    $('#data').html(result);
                    $('#load').html('Load');
                    $('#load').removeAttr("load");

                 }
            });
        }

        });
    });
</script>

<!---fetch result Income/Expenditure Query----->
<script>
    $(document).ready(function(){

    $("#loadReport").click(function(){

        $('#loadReport').html('<i class="fa fa-spinner fa-spin"></i> load');
        $('#report').html('<tr><td style="color: black" align="center" colspan="12"><div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="visually-hidden"></span></div></div></td></tr>');

        var institution1 = $("#inst").val();
        var UserID1 = "<?php echo $UserID ; ?>"


        var session1 = $('#sessionReport').val();
        var term1 = $('#termReport').val();
        var startDate1 = $('#startDateReport').val();
        var endDate1 = $('#endDateReport').val();

        //alert(category1);

        var dataString = 'institution1=' + institution1 + '&UserID1=' + UserID1 +'&session1=' + session1 + '&term1=' + term1 + '&startDate1=' + startDate1 + '&endDate1=' + endDate1;

        //alert(dataString);

        if(session1 == '0' || session1 == "" || term1 == "" ||  startDate1 == "" || endDate1 == "")
        {
            $('#loadReport').html('<i class="fa fa-spinner fa-spin"></i> load', 1000);
            $('#report').html('<div class="alert alert-danger alert-dismissible d-flex align-items-center fade show"><i class="bi-exclamation-octagon-fill"></i><strong class="mx-2">Error!</strong> You need to filter.</div>');
        }
        else
        {
            $('#report').html('<i class="fa fa-spinner fa-spin"></i>', 1000);

            $.ajax({
                type : 'post',
                url: "../controller/scripts/accountant/incomeExpenditureFullReport.php",
                data :  dataString,
                success : function(result)
                {

                    //alert(result);

                    $('#report').html(result);
                    $('#loadReport').html('Load');
                    $('#loadReport').removeAttr("load");

                 }
            });
        }

        });
    });
</script>

<!-----fetch FEE INVOICE TABLE----->
<script>
     $(document).ready(function(){
        $("body").on("click","#invoice", function(){

        var studentID =  $(this).data('id');
        var institution = $("#inst").val();
        var UserID = "<?php echo $UserID ;?>"
        var session1 = $('#session1').val();
        var term1 = $('#term1').val();
        var category = $('#category1').val();

        //alert(category);
            $('#table').html('<i class="fa fa-spinner fa-spin"></i>', 1000);
            
        $('#table').load('../controller/scripts/accountant/singleInvoice.php?studentID='+studentID+'&category='+category+'&institution='+institution+'&UserID='+UserID+'&session1='+session1+'&term1='+term1,function(){
        });
         //alert(studentID);
        });
    });
</script>

<!-----fetch OTHERS INVOICE SINGLE TABLE----->
<script>
     $(document).ready(function(){
        $("body").on("click","#invoice2", function(){

        var studentID =  $(this).data('id');
        var institution = $("#inst").val();
        var UserID = "<?php echo $UserID ;?>"
        var session1 = $('#session1').val();
        var term1 = $('#term1').val();
        var category = $('#category1').val();

        //alert(institution);
        
        $('#table').html('<i class="fa fa-spinner fa-spin"></i>', 1000);
        
        $('#table').load('../controller/scripts/accountant/singleInvoiceOthers.php?studentID='+studentID+'&category='+category+'&institution='+institution+'&UserID='+UserID+'&session1='+session1+'&term1='+term1,function(){
        });
         //alert(studentID);
        });
    });
</script>

<!-----fetch EXPENDITURE INVOICE SINGLE TABLE----->
<script>
     $(document).ready(function(){
        $("body").on("click","#print3", function(){

        var studentID =  $(this).data('id');
        var institution = $("#inst").val();
        var UserID = "<?php echo $UserID ;?>"
        var session1 = $('#session2').val();
        var term1 = $('#term2').val();

        //alert(studentID);
        
        $('#data').html('<i class="fa fa-spinner fa-spin"></i>', 1000);

        $('#data').load('../controller/scripts/accountant/singleInvoiceExpensis.php?studentID='+studentID+'&institution='+institution+'&UserID='+UserID+'&session1='+session1+'&term1='+term1,function(){
        });
         //alert(studentID);
        });
    });
</script>

</body>

</html>
