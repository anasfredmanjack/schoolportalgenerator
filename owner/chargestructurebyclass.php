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
    <title>Charge Structure by class | <?php echo $fullname; ?></title>
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
  
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

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
            <div class="row page-titles">
                <div class="col-md-10 align-self-center">
                    <h2 class="text-themecolor" style="color: black; font-weight: 500;">Charge Structure By Class</h2>
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

                
                  <div class="row">
                        <div class="col-sm-2">
                          <select style="margin-top:10px;"  id="chargefiltersession" class="form-control chimaPrimaryBorderColor" style="background: white; border-width: 1px; border-style: solid; font-size: 14px;">
                                                 <option value="0">Session</option> 
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
                          <div class="col-sm-2">
                                    <select  style="margin-top:10px;" id="chargefilterterm" class="form-control chimaPrimaryBorderColor" style="background: white; border-width: 1px; border-style: solid; font-size: 14px;">
                                    <option  value='0' >Term</option>
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
                             <div class="col-sm-2">
                                 <select  style="margin-top:10px;" class=" form-control chimaPrimaryBorderColor" id="filterinstitution" name="location">
                                <option value="0">Select Institution </option>
                                <?php
                                $sqlgetcats = mysqli_query($link,"SELECT * FROM `institution` WHERE `AgencyOrSchoolOwnerID`='$UserID'");
                                $numofcats = mysqli_num_rows($sqlgetcats);
                                if($numofcats > 0)
                                                {
                                                    while($fetch = mysqli_fetch_assoc($sqlgetcats))
                                                    {
                                                     echo'<option value="'.$fetch['InstitutionID'].'">'.$fetch['InstitutionName'].' '.$fetch['InstitutionNameTwo'].'</option>';     
                                                    }
                                                    
                                                    
                                                }
                                                else
                                                    {
                                                        echo'<option value="0">No Institution Available</option>';
                                                        
                                                    }
                                
                                ?>
                        </select>
                             </div>
                          <div class="col-sm-2">
                                    <select  style="margin-top:10px;" id="chargefilterclass" class="form-control chimaPrimaryBorderColor" style="background: white; border-width: 1px; border-style: solid; font-size: 14px;">
                                        <option value='0'>Class</option>
                                    </select>
   
                </div>
            
                  <div class="col-sm-2"  style="margin-top:10px;">
                            <center><button type="button" style="margin-top:5px;" class="btn-sm btn-block btn-primary" id="chargefilterbtn">Load</button></center>
                        </div>
                      
                        <div class="col-sm-2"></div>
                      </div>
                      
                       <div class="row" style="margin-top:20px;">
                        <div class="col-12">
                            <div class="card">
                              <div class="card-body">
                                                    <div class="table-responsive">
                                    <table class="table table-striped">
                              <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Class</th>
                                    <th scope="col">Term</th>
                                    <th scope="col">Session</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                              </thead >
                              <tbody id="fetchallcharge">
                                    <tr>
                                        <td colspan="8">
                                            <div class="alert alert-warning" role="alert"><center><i class="fa fa-bell"></i> Please Filter To load Table</center></div>
                                            </td>
                               
                                    </tr>
                              </tbody>
                            
                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                  
                                
                       

                      
        
                     
                     <!--Modal to view charge-->
                     <div class="modal fade" id="viewchargeModal" tabindex="-1" role="dialog" aria-labelledby="viewchargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i style="color:orangered;" class="fa fa-eye"></i> View Modal</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body" id="viewchargebody">
                
                      </div>
                    </div>
                  </div>
                </div>
                     <!--end Modal to view charge-->
                     
                 
                     <div id="userInfo"></div>
                     
                  
                     
                           <!--Modal To print charge structure-->
                     <div class="modal fade" id="printchargeModal" tabindex="-1" role="dialog" aria-labelledby="#printchargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" >
                       <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i style="color:blue;" class="fa fa-print"></i> Print Charge</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                            <div class="modal-body">
                                <div class="row">
                                  <div class="col-sm-10"></div>
                                      <div class="col-sm-2">
                                            <button type="button" id="finalprintbtn"  class="btn-sm btn-block btn-success text-right"><center><i class="fa fa-print"></i> Print</center></button>
                                      </div>
                                </div>
                                      <div class="row">
                                          <div class="col-12">
                                              <div class="card" style="margin-top:10px;">
                                                <div class="card-body"> 
                                                     <div id="printbody">
                                                  
                                                    </div>
                                                </div>
                                            </div>
                                          </div>
                                      </div>
                                      
                            
                            </div>

                        </div>
                      </div>
                    </div>
                     <!--end Modal charge charge-->
                     
                        </div>
                      </div>
                    </div>
                     <!--Modal to add charge-->
            
                
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


$("body").on("change","#filterinstitution",function(){
    var filterinstitution = $("#filterinstitution").val();
    var classid = $("#chargefilterclass").html('<option>loading</option>');
    
       if(filterinstitution == '0')
    {
     $("#fetchallcharge").html('<td colspan="8"><div class="alert alert-warning" role="alert"><center><i class="fa fa-warning"></i> Please select Institution Before Filtering!!</div></td>');

    }
    else if(filterinstitution == '1')
    {
        $("#fetchallcharge").html('<td colspan="8"><div class="alert alert-warning" role="alert"><center><i class="fa fa-warning"></i> Please Create Institution  To create Bank Account!!</div></td>');

    }
    else
    {
          $.ajax({
                    type : 'post',
                    url : '../controller/scripts/owner/loadchargestructclass.php', //Here you will fetch records 
                    data : 'filterinstitution='+filterinstitution, //Pass $id
                    success : function(data){
                        $('#chargefilterclass').html(data);//Show fetched data from database
                    }
                });
    }
    
});

$("body").on("click","#finalprintbtn", function(){
    
    
            var printContent = document.getElementById('printbody');
         
        
    var htmlToPrint = '' +
        '<style type="text/css">' +
        'table th, table td {' +
        'border:1px solid #000;' +
      
        '}' +
        'table{ border-collapse: collapse; width:100%;}'+
        '</style>';
    htmlToPrint += printContent.outerHTML;
    newWin = window.open("");
    newWin.document.write(htmlToPrint);
    newWin.print();
    newWin.close();
   
    
});

$("body").on("click","#printstructurebtn", function(){
    var sessionmain = $(this).data("session");
  var termmain = $(this).data("term");
  var classmain = $(this).data("id");
   var institution = $("#filterinstitution").val();
   
  
  $("#printbody").html("<center><i class='fa fa-spinner fa-spin'></i></center>"); 
  
  $.ajax({
                    type : 'post',
                    url : '../controller/scripts/owner/printchargestructure.php', //Here you will fetch records 
                    data : 'sessionmain='+sessionmain+'&classmain='+classmain+'&termmain='+termmain+'&institution='+institution, //Pass $id
                    success : function(data){
                        $('#printbody').html(data);//Show fetched data from database
                    }
                });
    
});


$("body").on("change",".editaddeachcat", function(){
    
    var checkStatus = $(this).prop('checked');
    
     if(checkStatus == true)
    {
            
    }
    else
    {
 
        var classmain = $(this).data("class");
        var sessionmain = $(this).data("session");
        var termmain = $(this).data("term");
        var subcatid =$(this).data("id");
           
             $.ajax({
                        type : 'post',
                        url : '../controller/scripts/accountant/removechargefromedit.php', //Here you will fetch records 
                        data : 'sessionmain='+sessionmain+'&termmain='+termmain+'&classmain='+classmain+'&subcatid='+subcatid, //Pass $id
                        success : function(data){
                       alert(data);
                            
                        }
                    });
        
    }
    
      var selTotalSingle = $('.editaddeachcat:checked').length;


         if(selTotalSingle > 0){
    
            $('#editloadproceedbtn').fadeIn("slow");
          }
          else
          {
                
                $('#editloadproceedbtn').hide();
            
          }
    
    
});

$("body").on("click","#viewstructurebtn", function(){
    $('#viewchargebody').html("<center><i class='fa fa-spinner fa-spin'></i></center>"); 
  var sessionmain = $(this).data("session");
  var termmain = $(this).data("term");
  var classmain = $(this).data("id");


     $.ajax({
                        type : 'post',
                        url : '../controller/scripts/owner/loadviewchargestructure.php', //Here you will fetch records 
                        data : 'sessionmain='+sessionmain+'&termmain='+termmain+'&classmain='+classmain, //Pass $id
                        success : function(data){
                            $('#viewchargebody').html(data);//Show fetched data from database
                        }
                    });
  
    
});


$("body").on("click","#chargefilterbtn", function(){
      $("#chargefilterbtn").html("<center><i class='fa fa-spinner fa-spin'></i></center>"); 
    var sessionid = $("#chargefiltersession").val();
    var term = $("#chargefilterterm").val();
    var classid = $("#chargefilterclass").val();
        var filterinstitution = $("#filterinstitution").val();
             

   if(sessionid =='0' && term =='0' && classid =='0')
   {
       $("#fetchallcharge").html('<td colspan="8"><div class="alert alert-warning" role="alert"><center><i class="fa fa-bell"></i> Please Select Field To filter</center></div></td>');
    $("#chargefilterbtn").html('Load');
      
   }
     else  if(filterinstitution == '0')
    {

      $("#fetchallcharge").html('<td colspan="8"><div class="alert alert-warning" role="alert"><center><i class="fa fa-warning"></i> Please select Institution Before Filtering!!</div></td>');
      $("#chargefilterbtn").html('Load');

    }
    else if(filterinstitution == '1')
    {
      
        $("#fetchallcharge").html('<td colspan="8"><div class="alert alert-warning" role="alert"><center><i class="fa fa-warning"></i> Please select Institution Before Filtering!!</div></td>');
      $("#chargefilterbtn").html('Load');

    }
   else
   {
          $.ajax({
                        type : 'post',
                        url : '../controller/scripts/owner/filtertoloadchargestructuretable.php', //Here you will fetch records 
                        data : 'classid='+classid+'&sessionid='+sessionid+'&term='+term+'&filterinstitution='+filterinstitution, //Pass $id
                        success : function(data){
                            $('#fetchallcharge').html(data);//Show fetched data from database
                              $("#chargefilterbtn").html('Load');
                        }
                    });
            

   }
    
});


   //================for filtercheckbox===============================
$('body').on('change','.addeachcat',function(){
    
  
  
      var selTotalSingle = $('.addeachcat:checked').length;


         if(selTotalSingle > 0){
    
            $('#loadproceedbtn').fadeIn("slow");
          }
          else
          {
                
                $('#loadproceedbtn').hide();
            
          }
      
  

 });
     
//======================================================== 


$("body").on('click','#loadproceedbtn', function(){

    var categoryid = [];
    var subcategoryid = [];
    var classid = $("#createchargefilterclass").val();
    var sessionid = $("#addchargefiltersession").val();
    var termid = $("#createchargefilterterm").val();
         var UserID = "<?php echo $UserID; ?>";

     $.each($(".addeachcat:checked"), function(){            
        categoryid.push($(this).val());
     });
        

    $.each($(".addeachcat:checked"), function(){            
        subcategoryid.push($(this).data('id'));
     });
   
    $("#chargeaddmodalbody").html("<center><i class='fa fa-spinner fa-spin fa-5x ' style='color:<?php echo $PrimaryColor; ?>;'></i></center>"); 
    
        $.ajax({
                        type : 'post',
                        url : '../controller/scripts/accountant/loadsubcatstocreatecharge.php', //Here you will fetch records 
                        data : 'classid='+classid+'&categoryid='+categoryid+'&subcategoryid='+subcategoryid+'&termid='+termid+'&sessionid='+sessionid+'&UserID='+UserID, //Pass $id
                        success : function(data){
                            $('#chargeaddmodalbody').html(data);
                        }
                    });
    
    
    
});





</script>



   



</body>

</html>
