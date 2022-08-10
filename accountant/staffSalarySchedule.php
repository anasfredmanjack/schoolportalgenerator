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
    <title>StaffSalarySchedule  | <?php echo $PrimaryName.' '.$SecondaryName; ?></title>
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
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
                <div class="page-titles">
                    <div class="row">
                        <div class="col-12 align-self-center">
                            <h2 class="text-themecolor" style="color: black; font-weight: 400;">Staff Salary Schedule</h2>
                        </div>
                        
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
                <div class="row" >
                    <div class="col-sm-8"></div>
                    <div class="col-sm-2" >
                        <form>
                            <div class="form-group" >
                                <input class="form-control" type="month" id="monthid"/>
                            </div>
                        </form>
                    </div>
                    <div class="col-sm-2">
                        <button type="button" style="margin-top:5px; margin-bottom:10px;"  class="btn-sm btn-block btn-primary " id="loadbtn">Load</button>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                            
                        <div class="card">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-10">
                                        <h4 class="card-title" style="color: red;">Salary Schedule</h4>
                                        <h6 class="card-subtitle">Staff Disciplinary Full List</h6>
                                    </div>

                                        <div class="col-md-2" >
                                        <button type="button"  style="margin-top:10px;" class="btn-sm btn-block btn-success "  data-toggle="modal" data-target="#addstaffsalaryModal"><i class="fa fa-plus"></i> Add Salary</button>

                                        </div>
                                </div>

                                  
                                
                                                             
                                <div class="table-responsive m-t-40" style="margin-top: -5px;">
                                    <table id="example23" class="table m-t-30 table-hover no-wrap contact-list table-striped" style="font-size: 14px;">                                        
                                        <thead>
                                            <tr>
                                            <th style="font-weight: 700;">Staff Name</th>
                                                <th style="font-weight: 700;">Acct. Name</th>
                                                <th style="font-weight: 700;">Acct. No.</th>
                                                <th style="font-weight: 700;">Bank Name</th>
                                                <th style="font-weight: 700;">Salary</th>
                                                <th style="font-weight: 700;">Penalty Status</th>
                                                <th style="font-weight: 700;">Total Sanction</th>
                                                <th style="font-weight: 700;">Total Waiver</th>
                                                <th style="font-weight: 700;">Total Pay</th>
                                                <th style="font-weight: 700;">Adjust Salary</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tablebody">
                                         

                                       <td colspan="8"> <div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin:10px;"><strong>Please!!</strong> filter To load Table!!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times; </span></button></div></td>
                                             
                                               

                                           
                                        
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    
                    </div>
               
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                  <!--========================================================================================-->
                                              
                                             
                                                <!--========================================================================================-->
                                                <!--==== Adjust Salary Modal==== -->
                                                <div class="modal fade" id="adjustModal" tabindex="-1" aria-labelledby="adjustModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h3 style="color: black; margin-left: 35%; font-weight: 500;">Adjust Salary</h3>
                                        
                                                            </div>
                                                            <div id="salaryresponse"></div>
                                                            <div class="modal-body" id="adjustmodalbody">

                                                               
                                                            </div>

                                                            <div style="margin-bottom: 20px;" id="adjustmodalfooter">
                                                                <button type="button" class="btn chimaCancelBtn1" data-dismiss="modal">Cancel</button>
                                                                <button type="button" class="btn chimaSubmitBtn" id="adjusttotalpaybtn">Apply</button>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
</div>
                                                <!--========================================================================================-->

                                                    <!--========================================================================================-->
                                                <!--==== Add Staff  Salary Modal==== -->
                                                <div class="modal fade" id="addstaffsalaryModal" tabindex="-1" aria-labelledby="addstaffsalaryModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h3 style="color: black; margin-left: 35%; font-weight: 500;"><i class="fa fa-plus"></i> Add Staff Salary</h3>
                                        
                                                            </div>
                                                            <div id="addsalaryresponse" style="margin:10px; ">
                                                                
                                                                        <div class="alert alert-success" role="alert"> 
                                                                            <center>Select Staff To add Salary</center>
                                                                        </div>
                                                                 
                                                            
                                                            </div>
                                                            <div class="modal-body" id="addsalarymodalbody" style="margin-top:-15px;">
                                                            <div class="card">
                                                                <div class="card-body ">
                                                                    <h4 class="card-title">Add Staff Salary</h4>
                                                                    <h6 class="card-subtitle">Add Staff Salary</h6>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <form>
                                                                            <div class="form-group">
                                                                                <select id="staffid" class="form-control">
                                                                                <option disabled selected value="0">Select Staff</option> 
                                                                                                                        <?php  
                                                                                                                            $sql = mysqli_query($link,"SELECT * FROM `staff` WHERE `InstitutionID`='$InstitutionID'");
                                                                                                                            $row = mysqli_fetch_array($sql);
                                                                                                                            do{
                                                                                                                
                                                                                                                                
                                                                                                                            echo '<option value="'.$row['StaffID'].'">'.$row['StaffFirstName'].' '.$row['StaffLastName'].'</option>';
                                                                                                                            }
                                                                                                                            while($row = mysqli_fetch_array($sql));
                                                                                                                

                                                                                                                        ?>  
                                                                                </select>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            <div id="lowermodalbody">
                                                                                    
                                                            </div>
                                                               
                                                               
                                                                    </div>
                                                                </div>
                                                            </div>

                                                           
                                                        </div>
                                                    </div>
</div>
                                                <!--========================================================================================-->
                                                
                                                <!--========================================================================================-->
                                              
                                                <!--========================================================================================-->
                                            
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
   <!-- footer -->
            <!-- ============================================================== -->
            <?php include ('../includes/footer.php'); ?>
            <!-- ============================================================== -->
            <!-- End footer -->
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
    $('#addsalarymodalfooter').hide();
  
   });




$("body").on("change","#staffid", function(){
var staffid = $(this).val();

$('#lowermodalbody').html('<center><i class="fa fa-spinner fa-spin"></i></center>');
$.ajax({
                            type : 'post',
                            url : '../controller/scripts/accountant/loadstaffaccountdetails.php', //Here you will fetch records 
                            data : 'staffid='+staffid, //Pass $id
                            success : function(data){
                       if(data == 0 || data == '0')
                       {
                        $('#lowermodalbody').html('<div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin:10px;"><strong>Oops!!</strong> Staff Default Account Not Set!!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times; </span></button></div>');

                       }else{
                            $('#lowermodalbody').html(data);
                            $('#addsalarymodalfooter').show();
                       }
                            }
                        });

});

$("body").on("click","#addsalarybtn", function(){
    $(this).html('<center><i class="fa fa-spinner fa-spin"></i></center>');
    var staffid = $("#staffid").val();
    var bankdetailsid = $("#bankdetailsid").val();
    var salaryamount = $("#salaryid").val();
    var InstitutionID = <?php echo $InstitutionID; ?>;
    var salarymonthid =  $("#salarymonthid").val();

        if(salaryamount == '')
        {
            $("#addsalaryresponse").html('<div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin:10px;"><strong>Oops!!</strong> Salary Field Must not be empty!!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times; </span></button></div>');
            $("#addsalarybtn").html("Add");
        }else if(salarymonthid == '')
        {
            $("#addsalaryresponse").html('<div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin:10px;"><strong>Oops!!</strong> Please Select Month/Year Before Adding!!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times; </span></button></div>');
            $("#addsalarybtn").html("Add");
        }
            else
                {
                    
                $.ajax({
                            type : 'post',
                            url : '../controller/scripts/accountant/addstaffsalary.php', //Here you will fetch records 
                            data : 'staffid='+staffid +'&InstitutionID='+InstitutionID+'&bankdetailsid='+bankdetailsid+'&salaryamount='+salaryamount+'&salarymonthid='+salarymonthid, //Pass $id
                            success : function(data){
                       
                            $('#addsalaryresponse').html(data);
                            $("#addsalarybtn").html("Add");

                      
                  
                            }
                        });

                    
                }



});


$("body").on("click","#adjustmodalbtn", function(){
var salaryschduleid = $(this).data("id");
var InstitutionID = <?php echo $InstitutionID;?>;
$('#adjustmodalbody').html('<center><i class="fa fa-spinner fa-spin"></i></center>');
$('#adjustmodalfooter').hide();

$.ajax({
                            type : 'post',
                            url : '../controller/scripts/accountant/loadsalaryschdeulemodalbody.php', //Here you will fetch records 
                            data : 'salaryschduleid='+salaryschduleid +'&InstitutionID='+InstitutionID, //Pass $id
                            success : function(data){
                       
                            $('#adjustmodalbody').html(data);
                            $('#adjustmodalfooter').show();//Show fetched data from database
                            }
                        });

                            $("body").on("click","#adjusttotalpaybtn", function(){
                                $(this).html('<center><i class="fa fa-spinner fa-spin"></i></center>');
                                var totalpayedit = $("#edittotalpay").val();
                                var monthval = $("#monthid").val();
                                        $.ajax({
                                    type : 'post',
                                    url : '../controller/scripts/accountant/adjusttotalpay.php', //Here you will fetch records 
                                    data : 'totalpayedit='+totalpayedit +'&salaryschduleid='+salaryschduleid+'&monthval='+monthval, //Pass $id
                                    success : function(data){
                            
                                    $('#salaryresponse').html(data);
                                    $("#adjusttotalpaybtn").html("Apply");//Show fetched data from database

                                    var monthval = $("#monthid").val();
                                    var InstitutionID = <?php echo $InstitutionID;?>;
                                    var data ='monthval='+monthval+'&InstitutionID='+InstitutionID;
                                     $("#tablebody").html('<center><i class="fa fa-spinner fa-spin"></i></center>');
                                    $.ajax({
                                                    type : 'post',
                                                    url : '../controller/scripts/accountant/filtertoloadsalaryschedule.php', //Here you will fetch records 
                                                    data : data, //Pass $id
                                                    success : function(data){
                                                    $("#loadbtn").html('Load');
                                                    $('#tablebody').html(data);//Show fetched data from database
                                                    }
                                                });
                                    }
                                });

                            });

});




   $("body").on("click","#loadbtn", function(){
    $(this).html('<center><i class="fa fa-spinner fa-spin"></i></center>');
    $("#tablebody").html('<center><i class="fa fa-spinner fa-spin"></i></center>');
        var monthval = $("#monthid").val();
        var InstitutionID = <?php echo $InstitutionID;?>;
        if(monthval == '')
        {
          $("#tablebody").html(' <td colspan="8"><div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin:10px;"><strong>Oops!!</strong>Select All fields before filtering!!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></td>');
          $("#loadbtn").html('load');


        }
        else
        {
            var data ='monthval='+monthval+'&InstitutionID='+InstitutionID;
            $("#tablebody").html('<center><i class="fa fa-spinner fa-spin"></i></center>');
            $.ajax({
                            type : 'post',
                            url : '../controller/scripts/accountant/filtertoloadsalaryschedule.php', //Here you will fetch records 
                            data : data, //Pass $id
                            success : function(data){
                            $("#loadbtn").html('Load');
                            $('#tablebody').html(data);//Show fetched data from database
                            }
                        });


        }

   });

   </script>
</body>

</html>
