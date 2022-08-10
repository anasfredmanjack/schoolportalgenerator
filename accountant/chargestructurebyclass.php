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
    <title>Charge Structure  | <?php echo $PrimaryName.' '.$SecondaryName; ?></title>
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

#createchargemodal {
  overflow-y:auto;
}

#secondaddcatmodal {
  overflow-y:auto;
}

#editsecondaddcatmodal {
  overflow-y:auto;
}

#editchargeModal {
  overflow-y:auto;
}

.search {
  position: relative;
  height: 50px;
}
      .input-search {
  font-size: 20px;
  width: 100px;
  height: 50px;
  margin: 0;
  border: 2px;
  padding: 10px;
  transition: width 0.3s ease;
  border-radius: 30px;
  

}
.btn-search {
  position: absolute;
  height: 50px;
  width: 100px;
  left: 0;
  border: 0;
  background-color: #fff;
 
  cursor: pointer;
  border-radius: 30px;
  transition: transform 0.3s ease;
}
.input-search:focus,
.btn-search:focus {
  outline: none;
}
.search.active .input {
  width: 300px;
}
.search.active .btn-search {
  transform: translateX(250px);
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
                <div class="row" style="margin-bottom:20px;">
                     <div class="col-sm-10"></div>
                      <div class="col-sm-2" >
                                        <button type="button" class="btn-sm btn-block btn-success " id="cretaechargebtn" data-toggle="modal" data-target="#createchargemodal"><i class="fa fa-plus"></i> Create Charge</button>
                        </div>
                </div>
                
                  <div class="row">
                        <div class="col-sm-2" style="margin-top:10px;">
                          <select id="chargefiltersession" class="form-control chimaPrimaryBorderColor" style="background: white; border-width: 1px; border-style: solid; font-size: 14px;">
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
                          <div class="col-sm-2" style="margin-top:10px;">
                                    <select id="chargefilterterm" class="form-control chimaPrimaryBorderColor" style="background: white; border-width: 1px; border-style: solid; font-size: 14px;">
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
                          <div class="col-sm-2" style="margin-top:10px;">
                                    <select id="chargefilterclass" class="form-control chimaPrimaryBorderColor" style="background: white; border-width: 1px; border-style: solid; font-size: 14px;">
                                    <option value='0'>Class</option>
                                        <?php  
                                    $sql = mysqli_query($link,"SELECT * FROM `classordepartment` WHERE `InstitutionID`='$InstitutionID'");
                                    $row = mysqli_fetch_array($sql);
                                    do{
                                    echo '<option value="'.$row['ClassOrDepartmentID'].'">'.$row['ClassOrDepartmentName'].'</option>';
                                    }
                                    while($row = mysqli_fetch_array($sql));
                                ?> 
                                    </select>
   
                </div>
            
                  <div class="col-sm-2" style="margin-top:10px;">
                            <center><button type="button" style="margin-top:5px;" class="btn-sm btn-block btn-primary" id="chargefilterbtn">Load</button></center>
                        </div>
                      
                        <div class="col-sm-4"></div>
                      </div>
                      
                       <div class="row" style="margin-top:10px;">
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
                                  
                                
                       

                      
                     <!--Modal to add charge-->
                    <div class="modal fade" id="createchargemodal" tabindex="-1" role="dialog" aria-labelledby="createchargemodalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Create Charge</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div> 
                          <div class="modal-body" id="chargeaddmodalbody">
                             
                              <div class="card">
                            <div class="card-body collapse show">

                                            <label for="addchargefiltersession">Select Session</label>
                                            <select id="addchargefiltersession" class="form-control chimaPrimaryBorderColor" style="background: white; border-width: 1px; border-style: solid; font-size: 14px;">
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
                            
                                <label for="createchargefilterterm" style="margin-top:10px;">Select Term</label>
                               <select id="createchargefilterterm" class="form-control chimaPrimaryBorderColor" style="background: white; border-width: 1px; border-style: solid; font-size: 14px;">
                                          <option  value="0" >Term</option>
                                        
                            <?php
                                
                                    $sql = mysqli_query($link,"SELECT * FROM `termorsemester`");
                                    $row = mysqli_fetch_array($sql);
                                    
                              do{
                    
                                    
                                echo '<option value="'.$row['TermOrSemesterName'].'">'.$row['TermOrSemesterName'].'</option>';
                                }  while($row = mysqli_fetch_array($sql));
                            ?>
                              </select>
                           
                          
                              <div id="createchargefilterclass" style="margin-top:17px;">
                              </div>
                        
                                
                                                            

                            </div>
                        </div>
                            <div id="loadsubcats"></div>
                            <div id="loadcats"></div>
                   
                                  <center>
                                    <button type="button" style="margin-top:20px;"  id="loadproceedbtn" class="btn waves-effect waves-light btn-rounded btn-secondary ">
                                        Proceed <i class="fa  fa-chevron-circle-right"></i></button>
                                    
                                </center>
                              
                       
                                  
                         
                            
                          </div>
                        
                        </div>
                      </div>
                    </div>
                     <!--Modal to add charge-->
                              
                     <!--modal to load second add body-->
                     <div class="modal fade" id="secondaddcatmodal" tabindex="-1" role="dialog" aria-labelledby="viewchargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i>Create Charge</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div id="addchargeresponse" style="margin: 20px;"></div>
                      <div class="modal-body" id="secondchargebody">
                
                      </div>
                    </div>
                  </div>
                </div>
                       <!---Modal to load second body-->
                       
                                        
                     <!--modal to load second edit charge body-->
                     <div class="modal fade" id="editsecondaddcatmodal" tabindex="-1" role="dialog" aria-labelledby="editsecondaddcatmodalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-pencil"></i> Edit Charge</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body" id="editsecondchargebody">
                
                      </div>
                    </div>
                  </div>
                </div>
                       <!---Modal to load edit charge body--> 

                   
                     
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
                     
                     <!--Modal To edit charge-->
                     <div class="modal fade" id="editchargeModal" tabindex="-1" role="dialog" aria-labelledby="editchargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" >
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-pencil"></i> Edit Charge</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div id="editchrageresponse"></div>
                              <div id="editchargebody">
                                  
                              </div>
                              <div class="row">
                                  <div class="col-12">
                            <center>
                                <button type="button" style="margin-top:20px;"  id="editloadproceedbtn" class="btn waves-effect waves-light btn-rounded btn-secondary ">
                                    Proceed <i class="fa  fa-chevron-circle-right"></i></button>
                            </center>
                                  </div>
                              </div>
                          </div>
        
                        </div>
                      </div>
                    </div>
                     <!--end modal to edit charge-->
                     <div id="userInfo"></div>
                     
                     <!--Modal To delete charge structure-->
                     <div class="modal fade" id="deletechargeModal" tabindex="-1" role="dialog" aria-labelledby="#deletechargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                       <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i style="color:red;" class="fa fa-times-rectangle"></i> Delete Charge</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                              <input type="hidden" id="delsession">
                                <input type="hidden" id="delterm">
                                <input type="hidden" id="delclass">
                                
                              <div id="deletechargeresponse"></div>
                              <input type="hidden" id="deletecharge">
                                    <div class="col-12" style="margin-top: 20px; padding:5px;" id="deletecategorybody">
                                       <Center> <i style="color:red;" class="fa fa-3x fa-times-rectangle"></i> 
                                       <p>Are you Sure You Want To Clear This Charge ?</p>
                                       <p style="margin-top:-5px;"><strong>NOTE:</strong> All Charges for this Term:<strong><span id="displayclassterm"></span></strong> And Session:<strong><span id="displayclasssession"></span></strong>   Set  To this Class Would be cleared</p>
                                       
                                   
                                       
                                       </Center>
                                  
                                    </div>
                          </div>
                          <div class="modal-footer" id="deletecategoryfooter">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="deleteclasschargemainbtn" style="background-color:red; border-color:red;"><i  class="fa fa-times-rectangle"></i> Delete Category</button>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                     <!--end Modal charge charge-->
                     
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
$(document).ready(function(){
   $("#loadproceedbtn").hide();
   $("#fetchallcharge").html('<center><i class="fa fa-spinner fa-spin"></i></center>');
   var institution = "<?php echo $InstitutionID; ?>";
   var UserID = "<?php echo $UserID; ?>";
  
   $.ajax({
                        type : 'post',
                        url : '../controller/scripts/accountant/loadchargestructuretab.php', //Here you will fetch records 
                        data : 'institution='+institution+'&UserID='+UserID, //Pass $id
                        success : function(data){
                            $('#fetchallcharge').html(data);//Show fetched data from database
                              $("#chargefilterbtn").html('Load');
                        }
                    });
   
 
    
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
  var UserID = "<?php echo $UserID; ?>";
   var institution = "<?php echo $InstitutionID; ?>";
  
  $("#printbody").html("<center><i class='fa fa-spinner fa-spin'></i></center>"); 
  
  $.ajax({
                    type : 'post',
                    url : '../controller/scripts/accountant/printchargestructure.php', //Here you will fetch records 
                    data : 'sessionmain='+sessionmain+'&classmain='+classmain+'&termmain='+termmain+'&UserID='+UserID+'&institution='+institution, //Pass $id
                    success : function(data){
                        $('#printbody').html(data);//Show fetched data from database
                    }
                });
    
});

$("body").on("click","#deletechargebtn", function(){
    var sessionmain = $(this).data("session");
    var storesession = $("#delsession").val(sessionmain);   
    var storesession2 = $("#displayclasssession").text(sessionmain);
    var termmain = $(this).data("term");
    var storeterm = $("#displayclassterm").text(termmain);
    var storeterm = $("#delterm").val(termmain);
    var classmain = $(this).data("id");
    var storeclass = $("#delclass").val(classmain);
    
});

$("body").on("click","#deleteclasschargemainbtn", function(){
    $('#deleteclasschargemainbtn').html("<center><i class='fa fa-spinner fa-spin'></i></center>"); 
var session = $("#delsession").val();
var term = $("#delterm").val();
var classid = $("#delclass").val();
var UserID = "<?php echo $UserID; ?>";

 $.ajax({
                        type : 'post',
                        url : '../controller/scripts/accountant/deletechargeclass.php', //Here you will fetch records 
                        data : 'session='+session+'&term='+term+'&classid='+classid+'&UserID='+UserID, //Pass $id
                        success : function(data){
                            $('#deletechargeresponse').html(data);//Show fetched data from database
                            $("#deleteclasschargemainbtn").html('<i  class="fa fa-times-rectangle"></i> Delete Category');
                          
                            $("#fetchallcharge").html('<center><i class="fa fa-spinner fa-spin"></i></center>');
                                var institution = "<?php echo $InstitutionID; ?>";
                                var UserID = "<?php echo $UserID; ?>";
                                
                                $.ajax({
                                                      type : 'post',
                                                      url : '../controller/scripts/accountant/loadchargestructuretab.php', //Here you will fetch records 
                                                      data : 'institution='+institution+'&UserID='+UserID, //Pass $id
                                                      success : function(data){
                                                          $('#fetchallcharge').html(data);//Show fetched data from database
                                                            $("#chargefilterbtn").html('Load');
                                                      }
                                                  });
                                         
                            
                            
                            
                        }
                    })


    
});

$("body").on("click",'#submiteditsubsbtn', function(){
      $("#submiteditsubsbtn").html("<center><i class='fa fa-spinner fa-spin'></i></center>"); 
    var countsubcats = $(".edittotalsubcats").length;
    var optionstatus = [];
    var amount = [];
    var categoryid = [];
    var subcatid = [];
    
  var classid = $("#editclassval").val();
    var sessionid = $("#editsessionval").val();
    var termid = $("#edittermval").val();
    var institution = "<?php echo $InstitutionID; ?>";
     var UserID = "<?php echo $UserID; ?>";
    var usertype = 'accountant';
    
    $.each($(".editoptionstatus:checked"), function(){
        optionstatus.push($(this).val());
        categoryid.push($(this).data('id'));
    });
    
     $.each($(".editsubcatamount"), function(){
       
            if($(this).val() !== ''){
                 amount.push($(this).val());
            }else{
                
            }
    });
   
    
 var amountlength = amount.length;
    
       $.each($(".edittotalsubcats"), function(){
        subcatid.push($(this).data('id'));
    });
 
    
    var optionslength = optionstatus.length;
    

    
    
    
  if(countsubcats == optionslength)
  {
          if(amountlength == countsubcats)
          {
              
              $.ajax({
                                type : 'post',
                                url : '../controller/scripts/accountant/finaleditchargestructure.php', //Here you will fetch records 
                                data : 'classid='+classid+'&sessionid='+sessionid+'&termid='+termid+'&institution='+institution+'&optionstatus='+optionstatus+'&amount='+amount+'&categoryid='+categoryid+'&subcatid='+subcatid+'&UserID='+UserID+'&usertype='+usertype, //Pass $id
                                success : function(data){
                                     $('#editaddchargeresponse').html(data);//Show fetched data from database
                                     $("#submiteditsubsbtn").html('Submit <i class="fa  fa-chevron-circle-right"></i>');
                                         $('#editchargeModal').animate({
                                                    scrollTop : 0
                                                }, 'slow');
                                                location.reload();
                                }
                            });
                            
          }
          else{
               $("#editaddchargeresponse").html('<div class="alert alert-warning" role="alert"><i class="fa fa-warning"></i> <strong>oops</strong> Please Make sure all fields Are Filled Before Proceeding</div>');  
                                             $("#submiteditsubsbtn").html('Submit <i class="fa  fa-chevron-circle-right"></i>');
        
        $('#editchargeModal').animate({
        scrollTop : 0
    }, 'slow');
              
          }
      
      
  }
  else
  {
        $("#editaddchargeresponse").html('<div class="alert alert-warning" role="alert"><i class="fa fa-warning"></i> <strong>oops</strong> Please Make sure all fields Are Selected Before Proceeding</div>');  
                                             $("#submiteditsubsbtn").html('Submit <i class="fa  fa-chevron-circle-right"></i>');
                                             
        
        $('#editchargeModal').animate({
        scrollTop : 0
    }, 'slow');

  }
  
  
    
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


   
    
    
});

$("body").on("click","#viewstructurebtn", function(){
    $('#viewchargebody').html("<center><i class='fa fa-spinner fa-spin'></i></center>"); 
  var sessionmain = $(this).data("session");
  var termmain = $(this).data("term");
  var classmain = $(this).data("id");
  var UserID = "<?php echo $UserID; ?>";

     $.ajax({
                        type : 'post',
                        url : '../controller/scripts/accountant/loadviewchargestructure.php', //Here you will fetch records 
                        data : 'sessionmain='+sessionmain+'&termmain='+termmain+'&classmain='+classmain+'&UserID='+UserID, //Pass $id
                        success : function(data){
                            $('#viewchargebody').html(data);//Show fetched data from database
                        }
                    });
  
    
});


$("body").on("click","#editchargebtn", function(){
      $('#editchargebody').html("<center><i class='fa fa-spinner fa-spin'></i></center>"); 
      
  var sessionmain = $(this).data("session");
  var termmain = $(this).data("term");
  var classmain = $(this).data("id");
  var UserID = "<?php echo $UserID; ?>";
    var institution = "<?php echo $InstitutionID; ?>";
  
    $.ajax({
                        type : 'post',
                        url : '../controller/scripts/accountant/loadeditchargestructurebody.php', //Here you will fetch records 
                        data : 'sessionmain='+sessionmain+'&termmain='+termmain+'&classmain='+classmain+'&UserID='+UserID+'&institution='+institution, //Pass $id
                        success : function(data){
                            $('#editchargebody').html(data);//Show fetched data from database
                            
                        }
                    });

    
});

$("body").on("click","#chargefilterbtn", function(){
      $("#chargefilterbtn").html("<center><i class='fa fa-spinner fa-spin'></i></center>"); 
    var sessionid = $("#chargefiltersession").val();
    var term = $("#chargefilterterm").val();
    var classid = $("#chargefilterclass").val();
    var UserID = "<?php echo $UserID; ?>";
             

   if(sessionid =='0' && term =='0' && classid =='0')
   {
    $("#fetchallcharge").html('<center><i class="fa fa-spinner fa-spin"></i></center>');
   var institution = "<?php echo $InstitutionID; ?>";
   var UserID = "<?php echo $UserID; ?>";
  
   $.ajax({
                        type : 'post',
                        url : '../controller/scripts/accountant/loadchargestructuretab.php', //Here you will fetch records 
                        data : 'institution='+institution+'&UserID='+UserID, //Pass $id
                        success : function(data){
                            $('#fetchallcharge').html(data);//Show fetched data from database
                              $("#chargefilterbtn").html('Load');
                        }
                    });
       
   }
   else
   {
          $.ajax({
                        type : 'post',
                        url : '../controller/scripts/accountant/filtertoloadchargestructuretable.php', //Here you will fetch records 
                        data : 'classid='+classid+'&sessionid='+sessionid+'&term='+term+'&UserID='+UserID, //Pass $id
                        success : function(data){
                            $('#fetchallcharge').html(data);//Show fetched data from database
                              $("#chargefilterbtn").html('Load');
                        }
                    });
            

   }
    
});

$("body").on("change","#createchargefilterterm", function(){
  $("#addchargeresponse").html('');
  $("#loadcats").html('');
  var institution = "<?php echo $InstitutionID; ?>";
  var termid = $("#createchargefilterterm").val();
  var sessionid = $("#addchargefiltersession").val();
  $("#createchargefilterclass").html("<center><i class='fa fa-spinner fa-spin'></i> </center>");
  if(termid == '0')
            {
                $("#addchargeresponse").html('<div class="alert alert-warning" role="alert"><i class="fa fa-warning"></i> <strong>oops</strong> Please select Term To Proceed</div>');    
                   $("#createchargefilterclass").html('');
                
            }
            else if(sessionid == '0')
            {
              $("#addchargeresponse").html('<div class="alert alert-warning" role="alert"><i class="fa fa-warning"></i> <strong>oops</strong> Please select Session To Proceed</div>');    
                   $("#createchargefilterclass").html(''); 
            }
            else
            {
             
              $.ajax({
                        type : 'post',
                        url : '../controller/scripts/accountant/loadclasstocreatecharge.php', //Here you will fetch records 
                        data : 'institution='+institution, //Pass $id
                        success : function(data){
                            $('#createchargefilterclass').html(data);//Show fetched data from database
                        }
                    });

            }

});

$("body").on("click","#selectedclassbtnload", function(){
      $("#addchargeresponse").html('');
        $("#selectedclassbtnload").html("<center><i class='fa fa-spinner fa-spin'></i></center>"); 
  $("#loadcats").html("<center><i class='fa fa-spinner fa-spin'></i></center>"); 
        var sessionid = $("#addchargefiltersession").val();
        var termid = $("#createchargefilterterm").val();
        var institution = "<?php echo $InstitutionID; ?>";
         var UserID = "<?php echo $UserID; ?>";

         var selTotalSingle = $('.selclasscreatecharge:checked').length;


         if(selTotalSingle > 0)
         {
          var classid = [];
          $.each($('.selclasscreatecharge:checked'), function(){            
            classid.push($(this).val());
            });


            if(sessionid == '0')
                            {
                              $("#addchargeresponse").html('<div class="alert alert-warning" role="alert"><i class="fa fa-warning"></i> <strong>oops</strong> Please select Session To proceed</div>');          
                                $("#loadcats").html('');
                                $("#selectedclassbtnload").html('Proceed');
                                
                            }
                            else if(termid == '0')
                            {
                                $("#addchargeresponse").html('<div class="alert alert-warning" role="alert"><i class="fa fa-warning"></i> <strong>oops</strong> Please select Term To proceed</div>');    
                                  $("#loadcats").html('');
                                  $("#selectedclassbtnload").html('Proceed');
                                
                            }
                            
                            else if(sessionid == '0' && termid == '0')
                            {
                                
                                $("#addchargeresponse").html('<div class="alert alert-warning" role="alert"><i class="fa fa-warning"></i> <strong>oops</strong> Please select all Fields To proceed</div>');  
                                $("#selectedclassbtnload").html('Proceed');
                                  $("#loadcats").html('');
                            }
                          
                            else
                            {

                                $.ajax({
                                        type : 'post',
                                        url : '../controller/scripts/accountant/loadcattocreatecharge.php', //Here you will fetch records 
                                        data : 'classid='+classid+'&institution='+institution+'&UserID='+UserID+'&sessionid='+sessionid+'&termid='+termid, //Pass $id
                                        success : function(data){
                                            $('#loadcats').html(data);//Show fetched data from database
                                            $("#selectedclassbtnload").html('Proceed');
                                        }
                                    });
                            
                                
                            
                            
                            }

            
          }
          else
          {
                
            $("#addchargeresponse").html('<div class="alert alert-warning" role="alert"><center><i class="fa fa-warning"></i> <strong>oops</strong> Please select A Class to proceed</center></div>');          
                 $("#loadcats").html('');
                 $("#selectedclassbtnload").html('Proceed');
            
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

$("body").on('click','#editloadproceedbtn', function(){
    
    var editsession = $("#editsession").val();
    var editterm = $("#editterm").val();
    var editclass = $("#editclass").val();
     var categoryid = [];
    var subcategoryid = [];
      var UserID = "<?php echo $UserID; ?>";
    
     $.each($(".editaddeachcat:checked"), function(){            
        categoryid.push($(this).val());
     });
        

    $.each($(".editaddeachcat:checked"), function(){            
        subcategoryid.push($(this).data('id'));
     });
     

     var selTotalcatSingle = $('.editaddeachcat:checked').length;
     if( selTotalcatSingle > 0)
      {

                   $("#editsecondaddcatmodal").modal('show');
                   $("#editchargeModal").modal('hide');

              $('#editsecondchargebody').html("<center><i class='fa fa-spinner fa-spin fa-5x ' style='color:<?php echo $PrimaryColor; ?>;'></i></center>"); 
          
              $.ajax({
                              type : 'post',
                              url : '../controller/scripts/accountant/loadsubcatstoeditcharge.php', //Here you will fetch records 
                              data : 'editclass='+editclass+'&categoryid='+categoryid+'&subcategoryid='+subcategoryid+'&editterm='+editterm+'&editsession='+editsession+'&UserID='+UserID, //Pass $id
                              success : function(data){
                                  $('#editsecondchargebody').html(data);
                              }
                          });
      }
      else
      {
        $("#editchrageresponse").html('<div class="alert alert-warning" role="alert"><i class="fa fa-warning"></i> <strong>oops</strong> Please select all Fields To proceed</div>');  
        $('#editchargeModal').animate({
                          scrollTop : 0
                      }, 'slow'); 
                      
      }                   
    
});

$("body").on("click","#editbackbuttonbtn", function(){
  $("#editsecondaddcatmodal").modal('hide');
  $("#editchargeModal").modal('toggle');


});

$("body").on('click','#loadproceedbtn', function(){

    var categoryid = [];
    var subcategoryid = [];

    var sessionid = $("#addchargefiltersession").val();
    var termid = $("#createchargefilterterm").val();
         var UserID = "<?php echo $UserID; ?>";


         var selTotalclassSingle = $('.selclasscreatecharge:checked').length;
         var selTotalcatSingle = $('.addeachcat:checked').length;

if(selTotalclassSingle > 0 && selTotalcatSingle > 0)
{
 var classid = [];
 $.each($('.selclasscreatecharge:checked'), function(){            
   classid.push($(this).val());
   });
   $.each($(".addeachcat:checked"), function(){            
      categoryid.push($(this).val());
  });      
                      

    $.each($(".addeachcat:checked"), function(){            
        subcategoryid.push($(this).data('id'));
    });


   if(sessionid == '0')
                   {
                     $("#addchargeresponse").html('<div class="alert alert-warning" role="alert"><i class="fa fa-warning"></i> <strong>oops</strong> Please select Session To proceed</div>');          
                     $('#createchargemodal').animate({
                          scrollTop : 0
                      }, 'slow'); 
                       
                   }
                   else if(termid == '0')
                   {
                       $("#addchargeresponse").html('<div class="alert alert-warning" role="alert"><i class="fa fa-warning"></i> <strong>oops</strong> Please select Term To proceed</div>');    
                       $('#createchargemodal').animate({
                            scrollTop : 0
                        }, 'slow'); 
                   
                       
                   }
                   
                   else if(sessionid == '0' && termid == '0')
                   {
                       
                       $("#addchargeresponse").html('<div class="alert alert-warning" role="alert"><i class="fa fa-warning"></i> <strong>oops</strong> Please select all Fields To proceed</div>');  
                       $('#createchargemodal').animate({
                          scrollTop : 0
                      }, 'slow'); 
                      
                      
                  
                   }
                 
                   else
                   {  
                    $("#secondchargebody").html("<center><i class='fa fa-spinner fa-spin fa-5x ' style='color:<?php echo $PrimaryColor; ?>;'></i></center>"); 
       

                   $("#secondaddcatmodal").modal('show');
                   $("#createchargemodal").modal('hide');
                      
                        
                      $.ajax({
                                      type : 'post',
                                      url : '../controller/scripts/accountant/loadsubcatstocreatecharge.php', //Here you will fetch records 
                                      data : 'classid='+classid+'&categoryid='+categoryid+'&subcategoryid='+subcategoryid+'&termid='+termid+'&sessionid='+sessionid+'&UserID='+UserID, //Pass $id
                                      success : function(data){
                                          $('#secondchargebody').html(data);
                                      }
                                  });
    

                   }
}
else
{
  $('#loadproceedbtn').hide();
  $("#loadcats").html('');    
  $("#addchargeresponse").html('<div class="alert alert-warning" role="alert"><i class="fa fa-warning"></i> <strong>oops</strong> Please select all Fields To proceed</div>');  
  $('#createchargemodal').animate({
        scrollTop : 0
    }, 'slow');        
}
 
    
    
});


$("body").on("click","#backbuttonbtn", function(){
  $("#secondaddcatmodal").modal('hide');
                   $("#createchargemodal").modal('toggle');
    
});



$("body").on("click",'#submitcreatesubsbtn', function(){
      $("#submitcreatesubsbtn").html("<center><i class='fa fa-spinner fa-spin'></i></center>"); 
    var countsubcats = $(".totalsubcats").length;
    var optionstatus = [];
    var amount = [];
    var categoryid = [];
    var subcatid = [];
    
  var classid = $("#newclassval").val();
    var sessionid = $("#newsessionval").val();
    var termid = $("#newtermval").val();
    var institution = "<?php echo $InstitutionID; ?>";
     var UserID = "<?php echo $UserID; ?>";
                var usertype = 'accountant';
    
    $.each($(".optionstatus:checked"), function(){
        optionstatus.push($(this).val());
        categoryid.push($(this).data('id'));
    });
    
     $.each($(".subcatamount"), function(){
       
            if($(this).val() !== ''){
                 amount.push($(this).val());
            }else{
                
            }
    });
    
 var amountlength = amount.length;
    
       $.each($(".totalsubcats"), function(){
        subcatid.push($(this).data('id'));
    });
 
    
    var optionslength = optionstatus.length;
    

    
    
    
  if(countsubcats == optionslength)
  {
          if(amountlength == countsubcats)
          {
              
              $.ajax({
                                type : 'post',
                                url : '../controller/scripts/accountant/finalcreatechargestructure.php', //Here you will fetch records 
                                data : 'classid='+classid+'&sessionid='+sessionid+'&termid='+termid+'&institution='+institution+'&optionstatus='+optionstatus+'&amount='+amount+'&categoryid='+categoryid+'&subcatid='+subcatid+'&UserID='+UserID+'&usertype='+usertype, //Pass $id
                                success : function(data){
                                     $('#addchargeresponse').html(data);//Show fetched data from database
                                     $("#submitcreatesubsbtn").html('Submit <i class="fa  fa-chevron-circle-right"></i>');
                                         $('#createchargemodal').animate({
                                                    scrollTop : 0
                                                }, 'slow');
                                                location.reload();
                                }
                            });
                            
          }
          else{
               $("#addchargeresponse").html('<div class="alert alert-warning" role="alert"><i class="fa fa-warning"></i> <strong>oops</strong> Please Make sure all fields Are Filled Before Proceeding</div>');  
                                             $("#submitcreatesubsbtn").html('Submit <i class="fa  fa-chevron-circle-right"></i>');
        
        $('#createchargemodal').animate({
        scrollTop : 0
    }, 'slow');
              
          }
      
      
  }
  else
  {
        $("#addchargeresponse").html('<div class="alert alert-warning" role="alert"><i class="fa fa-warning"></i> <strong>oops</strong> Please Make sure all fields Are Selected Before Proceeding</div>');  
                                             $("#submitcreatesubsbtn").html('Submit <i class="fa  fa-chevron-circle-right"></i>');
                                             
        
        $('#createchargemodal').animate({
        scrollTop : 0
    }, 'slow');

  }
  
  
    
});


     //=================jquery search filter=================//
     $("body").on("keyup","#myInput", function() {
            var value = $(this).val().toLowerCase();
            $("#myDIV *").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
    });
        $("body").on("click",".btn-search", function(){
            $(".search").toggleClass('active');
            $(".input-search").focus();

        });
      //===============end search filter====================//

</script>



   



</body>

</html>
