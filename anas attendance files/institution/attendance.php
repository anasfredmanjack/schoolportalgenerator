<?php  include ('../controller/session/session-checker-teacher.php'); ?>
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
    <title>Attendance | <?php echo $PrimaryName.' '.$SecondaryName; ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="../library/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="../library/plugins/morrisjs/morris.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/style-teacher.php" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="../css/blueTeacher.php" id="theme" rel="stylesheet">
  
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
        <?php include ('../includes/header-teacher.php'); ?>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- Sidebar navigation-->
        <aside class="left-sidebar">
                               
            <?php include ('../includes/menu-teacher.php'); ?>
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
                <div class="col-sm-3 align-self-center">
                    <h2 class="text-themecolor" style="color: black; font-weight: 400;">Student Attendence</h2>
                </div>
                <div class="col-md-2">
                    <form>
                        <div class="form-group">
                            <select id="sessionid" class="form-control">
                            <option disabled selected value="0">Session</option> 
                                                                    <?php  
                                                                        $sql = mysqli_query($link,"SELECT * FROM `session`");
                                                                        $row = mysqli_fetch_array($sql);
                                                                        do{
                                                            
                                                                            
                                                                        echo '<option value="'.$row['sessionName'].'">'.$row['sessionName'].'</option>';
                                                                        }
                                                                        while($row = mysqli_fetch_array($sql));
                                                            

                                                                    ?>  
                            </select>
                        </div>
                    </form>
                </div>
               
                <div class="col-md-2">
                    <form>
                        <div class="form-group">
                            <select  class="form-control" id="termid">
                                <option disabled selected value="0">Term</option>
                                <?php  
                                $sql = mysqli_query($link,"SELECT * FROM `termorsemester`");
                                $row = mysqli_fetch_array($sql);
                                do{
                    
                                    
                                echo '<option value="'.$row['TermOrSemesterName'].'">'.$row['TermOrSemesterName'].'</option>';
                                }
                                while($row = mysqli_fetch_array($sql));
                    

                            ?> 
                            </select>
                        </div>
                    </form>
                </div>
                <div class="col-md-2">
                    <form>
                        <div class="form-group">
                            <select  class="form-control"  id="classid">
                                <option disabled selected value="0">Class</option>
                                <?php  
                        $sql = mysqli_query($link,"SELECT * FROM `classordepartment` WHERE `InstitutionID`='$InstitutionID' AND `HODOrFormTeacherUserID`='$UserID'");
                        $row = mysqli_fetch_array($sql);
                        if(mysqli_num_rows($sql) > 0){
                        do{
            
                            
                        echo '<option value="'.$row['ClassOrDepartmentID'].'">'.$row['ClassOrDepartmentName'].'</option>';
                        }
                        while($row = mysqli_fetch_array($sql));
                    }
                    else
                    {
                       echo' <option disabled selected>No Class Available</option>';
                    }

                    ?> 
                            </select>
                        </div>
                    </form>
                </div>
                
                <div class="col-md-2">
                    <form>
                        <div class="form-group">
                            <input class="form-control" type="date"  id="dateid"/>
                        </div>
                    </form>
                </div>
                <div class="col-md-1">
                    <a href="#" type="button" class="btn chimaNormalBtn" style="width: 80px;">
                        <span style="font-size: 13px;" id="loadbtnid">Load</span>
                    </a>
                </div>
                <div class="">
                    <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                </div>
            </div>
            <!-- ============================================================== -->
         
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12" >
                            <div id="contentgenresponse"></div>
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title" style="color: red;">Student Attendence</h4>
                                
                            <div class="row" style="float:right;">
                                <div class="col-6">
                                        <form>
                                            <div class="form-group">
                                                <select  class="form-control"  id="markallvalue">
                                                    <option disabled selected value="0">Mark All Attendance</option> 
                                                    <option  value="1">Present</option> 
                                                    <option  value="2">Absent</option> 
                                                    <option  value="3">Excused</option> 
                                                </select>
                                            </div>
                                        </form>
                                </div>
                                <div class="col-md-1">
                                        <a href="#" type="button" class="btn chimaNormalBtn" style="width: 80px;">
                                            <span style="font-size: 13px;" id="markallbutton">Mark all</span>
                                        </a>
                                 </div>
                            </div>
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table bs-table table-striped table-bordered text-nowrap">
                                        <thead>
                                            <tr>
                                                <th class="text-left">ID #</th>
                                                <th class="text-left">Students</th>
                                                <th style="color:#18C853;"><i class="fa fa-check"></i> Present </th>
                                                <th style="color:#ff0000;"><i class="fa fa-times"></i> Absent </th>
                                                <th style="color: yellow"><i class="fa fa-minus"></i> Execused </th>
                                               
                                            </tr>
                                        </thead>
                                        <tbody id="attendancebody" >
                                         
                                          
                                           
                                          
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
               
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
          <!-- footer -->
            <!-- ============================================================== -->
            <?php include ('../includes/footer.php'); ?>
            <!-- ============================================================== -->
            <!-- End footer -->
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
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        </script>
         
    <script src="../library/plugins/moment/moment.js"></script>
    <script src="../library/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
    <!-- Clock PlugilibraryScript -->
    <script src="../library/plugins/clockpicker/dist/jquery-clockpicker.min.js"></script>
    <!-- Color Picker Plugin JavaScript -->
    <script src="../library/plugins/jquery-asColorPicker-master/libs/jquery-asColor.js"></script>
    <script src="../library/plugins/jquery-asColorPicker-master/libs/jquery-asGradient.js"></script>
    <script src="../library/plugins/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js"></script>
    <!-- Date Pickerlibraryn JavaScript -->
    <script src="../library/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- Date range library JavaScript -->
    <script src="../library/plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <script src="../library/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script>
    // MAterial Date picker    
    $('#mdate').bootstrapMaterialDatePicker({ weekStart : 0, time: false });
         $('#timepicker').bootstrapMaterialDatePicker({ format : 'HH:mm', time: true, date: false });
    $('#date-format').bootstrapMaterialDatePicker({ format : 'dddd DD MMMM YYYY - HH:mm' });
   
        $('#min-date').bootstrapMaterialDatePicker({ format : 'DD/MM/YYYY HH:mm', minDate : new Date() });
    // Clock pickers
    $('#single-input').clockpicker({
        placement: 'bottom',
        align: 'left',
        autoclose: true,
        'default': 'now'
    });
    $('.clockpicker').clockpicker({
        donetext: 'Done',
    }).find('input').change(function() {
        console.log(this.value);
    });
    $('#check-minutes').click(function(e) {
        // Have to stop propagation here
        e.stopPropagation();
        input.clockpicker('show').clockpicker('toggleView', 'minutes');
    });
    if (/mobile/i.test(navigator.userAgent)) {
        $('input').prop('readOnly', true);
    }
    // Colorpicker
    $(".colorpicker").asColorPicker();
    $(".complex-colorpicker").asColorPicker({
        mode: 'complex'
    });
    $(".gradient-colorpicker").asColorPicker({
        mode: 'gradient'
    });
    // Date Picker
    jQuery('.mydatepicker, #datepicker').datepicker();
    jQuery('#datepicker-autoclose').datepicker({
        autoclose: true,
        todayHighlight: true
    });
    jQuery('#date-range').datepicker({
        toggleActive: true
    });
    jQuery('#datepicker-inline').datepicker({
        todayHighlight: true
    });
    // Daterange picker
    $('.input-daterange-datepicker').daterangepicker({
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse'
    });
    $('.input-daterange-timepicker').daterangepicker({
        timePicker: true,
        format: 'MM/DD/YYYY h:mm A',
        timePickerIncrement: 30,
        timePicker12Hour: true,
        timePickerSeconds: false,
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse'
    });
    $('.input-limit-datepicker').daterangepicker({
        format: 'MM/DD/YYYY',
        minDate: '06/01/2015',
        maxDate: '06/30/2015',
        buttonClasses: ['btn', 'btn-sm'],
        applyClass: 'btn-danger',
        cancelClass: 'btn-inverse',
        dateLimit: {
            days: 6
        }
    });

    //=================filter load =========================//
    $("body").on("click","#loadbtnid", function(){
            $(this).html('<center><i class="fa fa-spinner fa-spin"></i></center>');
                var classid = $("#classid").val();
                var dateid = $("#dateid").val();
                var sessionid = $("#sessionid").val();
                var termid = $("#termid").val();
                
                if(classid == '' ||classid == 0 )
                {
                    $("#loadbtnid").html('Load');
                        $("#attendancebody").html('<td colspan="8"><div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin:10px;"><strong>Oops!!</strong> Select All fields before filtering!!!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></td>');

                }
                else if(dateid == '' ||dateid == 0 )
                {
                    $("#loadbtnid").html('Load');
                    $("#attendancebody").html('<td colspan="8"><div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin:10px;"><strong>Oops!!</strong>Select All fields before filtering!!!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></td>');

                }
                else if(sessionid == '' ||sessionid == 0 )
                {
                    $("#loadbtnid").html('Load');
                    $("#attendancebody").html(' <td colspan="8"><div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin:10px;"><strong>Oops!!</strong>Select All fields before filtering!!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></td>');


                }else if(termid == '' ||termid == 0 )
                {
                    $("#loadbtnid").html('Load');
                    $("#attendancebody").html(' <td colspan="8"><div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin:10px;"><strong>Oops!!</strong>Select All fields before filtering!!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></td>');


                }
                else if(termid == '' && sessionid == '' && dateid == '' && classid == '')
                {
                    $("#attendancebody").html(' <td colspan="8"><div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin:10px;"><strong>Oops!!</strong> Select All fields before filtering!!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></td>');
                   
                    $("#loadbtnid").html('Load');

                }
                else
                {
                   
                    var data = 'classid=' + classid + '&dateid=' + dateid + '&sessionid='+sessionid + '&termid=' + termid;

                                $.ajax({
                            type : 'post',
                            url : '../controller/scripts/teacher/filtertoloadstudentsattendance.php', //Here you will fetch records 
                            data : data, //Pass $id
                            success : function(data){
                            $("#loadbtnid").html('Load');
                            $('#attendancebody').html(data);//Show fetched data from database
                                
                                    
                            }
                        });
                }
 
    });
   //=================filter load  end=========================//

   //=================load all students to table ================//
$(document).ready(function(){
    $("#attendancebody").html(' <td colspan="12"><div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin:10px;"><strong>Oops!!</strong>Filter To load Attendance!!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></td>');
                   
   // var InstitutionID = <?php echo $InstitutionID;?>;
    //var UserID = <?php echo $UserID;?>;

   // var dataString ='InstitutionID='+InstitutionID + '&UserID='+ UserID;
   // $.ajax({
    //            type : 'post',
     //           url : '../controller/scripts/teacher/loadstudentsattendance.php', //Here you will fetch records 
      //          data : dataString, //Pass $id
          //      success : function(data){
               // $('#attendancebody').html(data);//Show fetched data from database
          //      }
           // });


});
   //=====================load all students to table end============//

//======================add all checked to attendance================//
$('body').on('change','.present',function(){
                var classid = $("#classid").val();
                var dateid = $("#dateid").val();
                var sessionid = $("#sessionid").val();
                var termid = $("#termid").val();
                var mark = 1;
                var InstitutionID = <?php echo $InstitutionID;?>;
    
      var multipleDelSelStudentId = [];
                $.each($(".present:checked"), function(){
                    multipleDelSelStudentId.push($(this).data("id"));
                });
            
                var data = 'multipleDelSelStudentId='+multipleDelSelStudentId+'&classid='+classid+'&dateid='+dateid+'&sessionid='+sessionid+'&termid='+termid+'&mark='+mark+'&InstitutionID='+InstitutionID;
                        $.ajax({
                        type : 'post',
                        url : '../controller/scripts/teacher/markeachstudentsattendance.php',
                        data : data, //Pass $id
                        success : function(data){
                            $("#contentgenresponse").html(data);//Show fetched data from database
                           
                            $("#attendancebody").html('<center><i class="fa fa-spinner fa-spin"></i></center>');
                            var classid = $("#classid").val();
                            var dateid = $("#dateid").val();
                            var sessionid = $("#sessionid").val();
                            var termid = $("#termid").val();
                            var data = 'classid=' + classid + '&dateid=' + dateid + '&sessionid='+sessionid + '&termid=' + termid;

                            $.ajax({
                            type : 'post',
                            url : '../controller/scripts/teacher/filtertoloadstudentsattendance.php', //Here you will fetch records 
                            data : data, //Pass $id
                            success : function(data){
                            $("#loadbtnid").html('Load');
                            $('#attendancebody').html(data);//Show fetched data from database
                        
                                
                            }
                            });
                                            
                           
                        
                        }
                    });
      
        
      
  
});

$('body').on('change','.absent',function(){
                var classid = $("#classid").val();
                var dateid = $("#dateid").val();
                var sessionid = $("#sessionid").val();
                var termid = $("#termid").val();
                var mark = 2;
                var InstitutionID = <?php echo $InstitutionID;?>;
    
      var multipleDelSelStudentId = [];
                $.each($(".absent:checked"), function(){
                    multipleDelSelStudentId.push($(this).data("id"));
                });
            
                var data = 'multipleDelSelStudentId='+multipleDelSelStudentId+'&classid='+classid+'&dateid='+dateid+'&sessionid='+sessionid+'&termid='+termid+'&mark='+mark+'&InstitutionID='+InstitutionID;
                        $.ajax({
                        type : 'post',
                        url : '../controller/scripts/teacher/markeachstudentsattendance.php',
                        data : data, //Pass $id
                        success : function(data){
                            $("#contentgenresponse").html(data);//Show fetched data from database
                            $("#attendancebody").html('<center><i class="fa fa-spinner fa-spin"></i></center>');
                            var classid = $("#classid").val();
                            var dateid = $("#dateid").val();
                            var sessionid = $("#sessionid").val();
                            var termid = $("#termid").val();
                            var data = 'classid=' + classid + '&dateid=' + dateid + '&sessionid='+sessionid + '&termid=' + termid;

                            $.ajax({
                            type : 'post',
                            url : '../controller/scripts/teacher/filtertoloadstudentsattendance.php', //Here you will fetch records 
                            data : data, //Pass $id
                            success : function(data){
                            $("#loadbtnid").html('Load');
                            $('#attendancebody').html(data);//Show fetched data from database
                        
                                
                            }
                            });
                           
                        
                        }
                    });
      
        
      
  
});

$('body').on('change','.excused',function(){
                var classid = $("#classid").val();
                var dateid = $("#dateid").val();
                var sessionid = $("#sessionid").val();
                var termid = $("#termid").val();
                var mark = 3;
                var InstitutionID = <?php echo $InstitutionID;?>;
    
      var multipleDelSelStudentId = [];
                $.each($(".excused:checked"), function(){
                    multipleDelSelStudentId.push($(this).data("id"));
                });
            
                var data = 'multipleDelSelStudentId='+multipleDelSelStudentId+'&classid='+classid+'&dateid='+dateid+'&sessionid='+sessionid+'&termid='+termid+'&mark='+mark+'&InstitutionID='+InstitutionID;
                        $.ajax({
                        type : 'post',
                        url : '../controller/scripts/teacher/markeachstudentsattendance.php',
                        data : data, //Pass $id
                        success : function(data){
                            $("#contentgenresponse").html(data);//Show fetched data from database
                            $("#attendancebody").html('<center><i class="fa fa-spinner fa-spin"></i></center>');
                            var classid = $("#classid").val();
                            var dateid = $("#dateid").val();
                            var sessionid = $("#sessionid").val();
                            var termid = $("#termid").val();
                            var data = 'classid=' + classid + '&dateid=' + dateid + '&sessionid='+sessionid + '&termid=' + termid;

                            $.ajax({
                            type : 'post',
                            url : '../controller/scripts/teacher/filtertoloadstudentsattendance.php', //Here you will fetch records 
                            data : data, //Pass $id
                            success : function(data){
                            $("#loadbtnid").html('Load');
                            $('#attendancebody').html(data);//Show fetched data from database
                        
                                
                            }
                            });
                           
                        
                        }
                    });
      
        
      
  
});
//======================end all checked to attendance================//



   //============mark all students============================//
   $("body").on("click","#markallbutton", function(){
    $(this).html('<center><i class="fa fa-spinner fa-spin"></i></center>');
    var markallvalue = $("#markallvalue").val();
    if(markallvalue == 1)
    {
        var multipleDelSelStudentId = [];
                $.each($(".present"), function(){
                    multipleDelSelStudentId.push($(this).data("id"));
                });
                var institution = "<?php echo $InstitutionID; ?>";
                var mark = 1;
                var classid = $("#classid").val();
                var dateid = $("#dateid").val();
                var sessionid = $("#sessionid").val();
                var termid = $("#termid").val();
                var InstitutionID = <?php echo $InstitutionID;?>;
                var data ='institution='+institution + '&mark='+mark + '&multipleDelSelStudentId='+multipleDelSelStudentId+'&classid='+classid+'&dateid='+dateid+'&sessionid='+sessionid+'&termid='+termid+'&InstitutionID='+InstitutionID;

                        
            $.ajax({
                type : 'post',
                url : '../controller/scripts/teacher/markallstudentsattendance.php', //Here you will fetch records 
                data : data, //Pass $id
                success : function(data){
                    $("#contentgenresponse").html(data);//Show fetched data from database
                    $("#markallbutton").html('Mark All');
                    $("#attendancebody").html('<center><i class="fa fa-spinner fa-spin"></i></center>');
                            var classid = $("#classid").val();
                            var dateid = $("#dateid").val();
                            var sessionid = $("#sessionid").val();
                            var termid = $("#termid").val();
                            var data = 'classid=' + classid + '&dateid=' + dateid + '&sessionid='+sessionid + '&termid=' + termid;

                            $.ajax({
                            type : 'post',
                            url : '../controller/scripts/teacher/filtertoloadstudentsattendance.php', //Here you will fetch records 
                            data : data, //Pass $id
                            success : function(data){
                            $("#loadbtnid").html('Load');
                            $('#attendancebody').html(data);//Show fetched data from database
                        
                                
                            }
                            });
                
                }
            });
    }
    else if(markallvalue == 2)
    {
        var multipleDelSelStudentId = [];
                $.each($(".absent"), function(){
                    multipleDelSelStudentId.push($(this).data("id"));
                });
                var institution = "<?php echo $InstitutionID; ?>";
                var mark = 2;
                var classid = $("#classid").val();
                var dateid = $("#dateid").val();
                var sessionid = $("#sessionid").val();
                var termid = $("#termid").val();
                var InstitutionID = <?php echo $InstitutionID;?>;
                var data ='institution='+institution + '&mark='+mark + '&multipleDelSelStudentId='+multipleDelSelStudentId+'&classid='+classid+'&dateid='+dateid+'&sessionid='+sessionid+'&termid='+termid+'&InstitutionID='+InstitutionID;


               
                                        
                $.ajax({
                    type : 'post',
                    url : '../controller/scripts/teacher/markallstudentsattendance.php', //Here you will fetch records 
                    data : data, //Pass $id
                    success : function(data){
                        $("#contentgenresponse").html(data);//Show fetched data from database
                        $("#markallbutton").html('Mark All');
                    
                    }
                });
    }
    else if(markallvalue == 3)
    {
        var multipleDelSelStudentId = [];
                $.each($(".excused"), function(){
                    multipleDelSelStudentId.push($(this).data("id"));
                });
                var institution = "<?php echo $InstitutionID; ?>";
                var mark = 3;
                var classid = $("#classid").val();
                var dateid = $("#dateid").val();
                var sessionid = $("#sessionid").val();
                var termid = $("#termid").val();
                var InstitutionID = <?php echo $InstitutionID;?>;
                var data ='institution='+institution + '&mark='+mark + '&multipleDelSelStudentId='+multipleDelSelStudentId+'&classid='+classid+'&dateid='+dateid+'&sessionid='+sessionid+'&termid='+termid+'&InstitutionID='+InstitutionID;
   
            $.ajax({
                type : 'post',
                url : '../controller/scripts/teacher/markallstudentsattendance.php', //Here you will fetch records 
                data : data, //Pass $id
                success : function(data){
                    $("#contentgenresponse").html(data);//Show fetched data from database
                    $("#markallbutton").html('Mark All');
                
                }
            });

    }
    else
    {
        $("#contentgenresponse").html('<div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin:10px;"><strong>Oops!!</strong> Select An Option before marking all !!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div></td>');
 $("#markallbutton").html('Mark All');

    }



   });
   //=================mark all students end================//
    </script>
</body>

</html>
