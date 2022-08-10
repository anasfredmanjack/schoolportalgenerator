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
    <title>Accounts | <?php echo $fullname; ?></title>
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
                    <h2 class="text-themecolor" style="color: black; font-weight: 500;">Accounts</h2>
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
                          <div class="col-sm-4">
                            <select class=" form-control chimaPrimaryBorderColor" id="filterinstitution" name="location">
                                <option value="0">Select Institution To filter</option>
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
                                                        echo'<option value="1">No Institution Available</option>';
                                                        
                                                    }
                                
                                ?>
                        </select>
                </div>
                    
                       
            
                  <div class="col-2">
                            <center><button type="button" style="margin-top:5px;" class="btn-sm btn-block btn-primary" id="filterbtn">Load</button></center>
                        </div>
                      <div class="col-sm-2"></div>
                        <div class="col-sm-2">
                            <button type="button" class="btn-sm btn-block btn-success " id="addaccountbtn" data-toggle="modal" data-target="#addccountmodal"><i class="fa fa-plus"></i> Add Account</button>
                        </div>
                      </div>
                      
                      <div id="filterresponse" style="margin:10px;"></div>
                      
                      <div class="row" style="margin-top:10px;">
                        <div class="col-12">
                            <div class="card">
                              <div class="card-body">
                                  <table class="table table-striped table-responsive">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Institution Name</th>
                                   <th scope="col">Institution Bank</th>
                                    <th scope="col"> Account Name</th>
                                    <th scope="col">Account Number</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                      <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                     <th scope="col"></th>
                                </tr>
                              </thead >
                              <tbody id="fetchallbankdetails">
                              </tbody>
                            
                        </table>
                             
                              </div>
                            </div>  
                        </div>
                      </div>

                    <!--Modal to add Account-->
                    <div class="modal fade" id="addccountmodal" tabindex="-1" role="dialog" aria-labelledby="addccountmodalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Add Account</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                              <div id="addccountresponse"></div>
                                    
                                <div class="row">
                                    <div class="col-12" style="margin-top: 20px;" id="accountbody">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                            <label for="accountname"> Select Institution:</label>
                                                        <select class=" form-control chimaPrimaryBorderColor" id="addaccountinstitution" name="location">
                                                                <option value="0">Select Institution:</option>
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
                                                                                        echo'<option value="1">No Institution Available</option>';
                                                                                        
                                                                                    }
                                                                
                                                                ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12" style="margin-top: 10px;">
                                                       <label for="accountname"> Account Name:</label>
                                                        <input id="accountname"  type="text" class="form-control" >
                                                    </div>
                                                </div>
                                                   <div class="row">
                                                    <div class="col-12" style="margin-top: 10px;">
                                                       <label for="accountnumber"> Account Number:</label>
                                                        <input id="accountnumber"  type="number" class="form-control" >
                                                    </div>
                                                </div>
                                                
                                                  <div class="row">
                                                    <div class="col-12" style="margin-top: 10px;">
                                                       <label for="accountbank"> Bank Name:</label>
                                                        <input id="accountbank"  type="text" class="form-control" >
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                  
                                    </div>
                                </div>
                          </div>
                         <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="createaccount"><i class="fa fa-plus"></i> Create Account</button>
                      </div>
                        </div>
                      </div>
                    </div>
                    <!--Modal to add Account-->
                    
                    <!--modal to set main account-->
                    <div class="modal fade" id="setmainaccountmodal" tabindex="-1" role="dialog" aria-labelledby="setmainaccountmodalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="setmainaccountmodalLabel"><i class="fa fa-bank"></i> Set Main Account</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                              <div id="setmainaccresponse"></div>
                              <input type="hidden" id="instbankid">
                              <input type="hidden" id="institutionid">
                              <div class="row">
                                  <div class="col-12">
                                      <center>
                                          <i class="fa fa-5x fa-bank"></i>
                                      </center>
                                  </div>
                              </div>
                              <div class="row" style="margin-top:10px;">
                                  <div class="col-12">
                                      <center>
                                          <span>Are you sure you want to set This account as Main account for: <p style="color:green;" id="instname"></p></span>
                                      </center>
                                  </div>
                              </div>
                              
                                 <div class="row" style="margin-top:20px;">
                                  <div class="col-12">
                                      <center>
                                      <button type="button" class="btn-sm btn-block btn-success " id="setmainfinalaccountbtn">Save</button>
                                      </center>
                                  </div>
                              </div>
                           
                          </div>
                         
                        </div>
                      </div>
                    </div>
                    <!--modal to set main account--->


                      <!--modal to set main account-->
                    <div class="modal fade" id="setdisplayaccountmodal" tabindex="-1" role="dialog" aria-labelledby="setdisplayaccountmodalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="setdisplayaccountmodalLabel"><i class="fa fa-eye"></i> Set Display Account</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                              <div id="setdisplayaccresponse"></div>
                              <input type="hidden" id="setdisplayinstbankid">
                              <input type="hidden" id="setdisplayinstitutionid">
                              <div class="row">
                                  <div class="col-12">
                                      <center>
                                          <i style="color:green;" class="fa fa-5x fa-eye"></i>
                                      </center>
                                  </div>
                              </div>
                              <div class="row" style="margin-top:10px;">
                                  <div class="col-12">
                                      <center>
                                          <span>Are you sure you want to set This account as Display account for: <p style="color:green;" id="setdisplayinstname"></p></span>
                                      </center>
                                  </div>
                              </div>
                              
                                 <div class="row" style="margin-top:20px;">
                                  <div class="col-12">
                                      <center>
                                      <button type="button" class="btn-sm btn-block btn-success " id="setdisplayfinalaccountbtn">Save</button>
                                      </center>
                                  </div>
                              </div>
                           
                          </div>
                         
                        </div>
                      </div>
                    </div>
                    <!--modal to set main account--->
                    
                      <!--modal to edit main account-->
                    <div class="modal fade" id="editaccountmodal" tabindex="-1" role="dialog" aria-labelledby="editaccountmodalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="editaccountmodalLabel"><i class="fa fa-eye"></i> Edit Account</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                              <input type="hidden"  id="editaccountid">
                              <div id="editaccresponse"></div>
                              <div class="row">
                                  <div class="col-12">
                                      <div class="card">
                                          <div class="card-body">
                                            <div id="editbankbody"></div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                                   
                            
                           
                          </div>
                         
                        </div>
                      </div>
                    </div>
                    <!--modal to edit main account--->
                 
                 <!--Modal to delete bank--->
                     <div class="modal fade" id="deleteaccountmodal" tabindex="-1" role="dialog" aria-labelledby="deleteaccountmodalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i style="color:red;" class="fa fa-times-rectangle"></i> Delete Account </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                              <div id="deleteaccountresponse"></div>
                              <input type="hidden" id="deleteaccountid">
                                    <div class="col-12" style="margin-top: 20px; padding:5px;" id="deleteaccountbody">
                                       <Center> <i style="color:red;" class="fa fa-3x fa-times-rectangle"></i> 
                                       <p>Are you Sure You Want To delete this Account ?</p>

                                       </Center>
                                  
                                    </div>
                          </div>
                          <div class="modal-footer" id="deleteaccountfooter">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="deleteaccountmainbtn" style="background-color:red; border-color:red;"><i  class="fa fa-times-rectangle"></i> Delete Account</button>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--Modal to delete bank--->
                    
                    
                    
                    
                    
              
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
$(document).ready(function(){
    

                    $('#filterresponse').html('<div class="alert alert-warning" role="alert"><center><i class="fa fa-warning"></i> Filter to load table.</center></div>');//Show fetched data from database
           
    
}); 

$("body").on("click","#deleteaccountbtn", function(){
    var delid = $(this).data("id");
    var storeid = $("#deleteaccountid").val(delid);
  
    
});

$("body").on("click","#deleteaccountmainbtn", function(){
        $("#deleteaccountmainbtn").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
        var storeid = $("#deleteaccountid").val();
         var UserID = "<?php echo $UserID; ?>";
           $.ajax({
                type : 'post',
                url : '../controller/scripts/owner/deletebankaccount.php', //Here you will fetch records 
                data : 'storeid='+storeid, //Pass $id
                success : function(data)
                {
                    $('#deleteaccountmainbtn').html("<i  class='fa fa-times-rectangle'></i> Delete Account");//Show fetched data from database
                    $("#deleteaccountresponse").html(data);
                    
                            $("#fetchallbankdetails").html("<td colspan='8'><center><i class='fa fa-spinner fa-spin'></i></center></td>");
                            $.ajax({
                                    type : 'post',
                                    url : '../controller/scripts/owner/loadinstitutionaccounttable.php', //Here you will fetch records 
                                    data : 'UserID='+UserID, //Pass $id
                                    success : function(data)
                                    {
                                        $('#fetchallbankdetails').html(data);//Show fetched data from database
                                    }
                                });
                    
                    
                }
            });
        
});

$("body").on("click","#editaccountbtn", function(){
    $("#editbankbody").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
                      $("#editaccresponse").html('');
    var bankid = $(this).data("id");
    var editaccountid = $("#editaccountid").val(bankid);
      $.ajax({
                type : 'post',
                url : '../controller/scripts/owner/loadeditaccountbody.php', //Here you will fetch records 
                data : 'bankid='+bankid, //Pass $id
                success : function(data)
                {
                    $('#editbankbody').html(data);//Show fetched data from database
                }
            });
   
    
});

$("body").on("click","#filterbtn", function(){
      $("#filterbtn").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
    var filterinstitution = $("#filterinstitution").val();
    
     $("#fetchallbankdetails").html("<td colspan='8'><center><i class='fa fa-spinner fa-spin'></i></center></td>");
     
      if(filterinstitution == '0')
    {
     $("#filterresponse").html('<div class="alert alert-warning" role="alert"><center><i class="fa fa-warning"></i> Please select Institution Before submitting!!</div>');
     $("#filterbtn").html('Load');
    }
    else if(filterinstitution == '1')
    {
        $("#filterresponse").html('<div class="alert alert-warning" role="alert"><center><i class="fa fa-warning"></i> Please Create Institution Before To create Bank Account!!</div>');
     $("#filterbtn").html('Load');
    }
    else
    {
             $.ajax({
                type : 'post',
                url : '../controller/scripts/owner/filtertoloadbankacc.php', //Here you will fetch records 
                data : 'filterinstitution='+filterinstitution, //Pass $id
                success : function(data)
                {
                    $('#fetchallbankdetails').html(data);//Show fetched data from database
                         $("#filterbtn").html('Load');
                }
            });
        
    }
    
    
    
});

$("body").on("click","#editfinalaccountbtn", function(){
     var editaccountid = $("#editaccountid").val();
    var accountname = $("#editaccountname").val();
    var accountnumber = $("#editaccountnumber").val();
    var accountbank = $("#editaccountbank").val();
    var UserID = "<?php echo $UserID; ?>";
   $("#editfinalaccountbtn").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
   
   if(accountname == '')
    {
        $("#editaccresponse").html('<div class="alert alert-warning" role="alert"><center><i class="fa fa-warning"></i> Please fill All Fields Before submitting!!</div>');
     $("#editfinalaccountbtn").html('Save');  
    }
    else if(accountnumber == '')
    {
    $("#editaccresponse").html('<div class="alert alert-warning" role="alert"><center><i class="fa fa-warning"></i> Please fill All Fields Before submitting!!</div>');
     $("#editfinalaccountbtn").html('Save');  
    }
    else if(accountbank == '')
    {
    $("#editaccresponse").html('<div class="alert alert-warning" role="alert"><center><i class="fa fa-warning"></i> Please fill All Fields Before submitting!!</div>');
     $("#editfinalaccountbtn").html('Save');  
    }
    else
    {
             $.ajax({
                type : 'post',
                url : '../controller/scripts/owner/updateschoolaccount.php', //Here you will fetch records 
                data : 'editaccountid='+editaccountid+'&accountname='+accountname+'&accountnumber='+accountnumber+'&accountbank='+accountbank, //Pass $id
                success : function(data){
                  $("#editaccresponse").html(data);
                  $("#editfinalaccountbtn").html('Save'); 
                  
                            $("#fetchallbankdetails").html("<td colspan='8'><center><i class='fa fa-spinner fa-spin'></i></center></td>");
                          $.ajax({
                                    type : 'post',
                                    url : '../controller/scripts/owner/loadinstitutionaccounttable.php', //Here you will fetch records 
                                    data : 'UserID='+UserID, //Pass $id
                                    success : function(data)
                                    {
                                        $('#fetchallbankdetails').html(data);//Show fetched data from database
                                    }
                                });
                    
                }
       });
        
    }
    
});

$("body").on("click","#setdisplayaccountbtn", function(){
        $('#setdisplayaccresponse').html('');
    var institutionname = $(this).data("instname");
       var bankaccid = $(this).data("id");
       var insid = $(this).data("insid");
      var dispinst = $("#setdisplayinstname").html(institutionname); 
      var storeid = $("#setdisplayinstbankid").val(bankaccid);
        var institutionid = $("#setdisplayinstitutionid").val(insid);
        
});

$("body").on("click","#setdisplayfinalaccountbtn", function(){
$("#setdisplayfinalaccountbtn").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
      var storeid = $("#setdisplayinstbankid").val();
        var institutionid = $("#setdisplayinstitutionid").val();
           var UserID = "<?php echo $UserID; ?>";
        
        $.ajax({
                type : 'post',
                url : '../controller/scripts/owner/setdisplayaccount.php', //Here you will fetch records 
                data : 'storeid='+storeid+'&institutionid='+institutionid, //Pass $id
                success : function(data){
                    $('#setdisplayresponse').html(data);//Show fetched data from database
                    $("#setdisplayaccountbtn").html('Save');
                        $("#fetchallbankdetails").html("<td colspan='8'><center><i class='fa fa-spinner fa-spin'></i></center></td>");
                      $.ajax({
                                type : 'post',
                                url : '../controller/scripts/owner/loadinstitutionaccounttable.php', //Here you will fetch records 
                                data : 'UserID='+UserID, //Pass $id
                                success : function(data){
                                    $('#fetchallbankdetails').html(data);//Show fetched data from database
                                }
                            });
                }
            });
        
});


$("body").on("click","#setmainaccountbtn", function(){
    $('#setmainaccresponse').html('');
    var institutionname = $(this).data("instname");
       var bankaccid = $(this).data("id");
       var insid = $(this).data("insid");
      var dispinst = $("#instname").html(institutionname); 
      var storeid = $("#instbankid").val(bankaccid);
        var institutionid = $("#institutionid").val(insid);
 
});



$("body").on("click","#setmainfinalaccountbtn", function(){
   $("#setmainfinalaccountbtn").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
     var storeid = $("#instbankid").val();
      var institutionid = $("#institutionid").val();
      var UserID = "<?php echo $UserID; ?>";
     
       $.ajax({
                type : 'post',
                url : '../controller/scripts/owner/setmainbankaccount.php', //Here you will fetch records 
                data : 'storeid='+storeid+'&institutionid='+institutionid, //Pass $id
                success : function(data){
                    $('#setmainaccresponse').html(data);//Show fetched data from database
                    $("#setmainfinalaccountbtn").html('Save');
                        $("#fetchallbankdetails").html("<td colspan='8'><center><i class='fa fa-spinner fa-spin'></i></center></td>");
                      $.ajax({
                                type : 'post',
                                url : '../controller/scripts/owner/loadinstitutionaccounttable.php', //Here you will fetch records 
                                data : 'UserID='+UserID, //Pass $id
                                success : function(data){
                                    $('#fetchallbankdetails').html(data);//Show fetched data from database
                                }
                            });
                }
            });
     
     
    
});




$("body").on("click","#createaccount", function(){
       $("#createaccount").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
    var addaccountinstitution = $("#addaccountinstitution").val();
    var accountname = $("#accountname").val();
    var accountnumber = $("#accountnumber").val();
    var accountbank = $("#accountbank").val();
     var UserID = "<?php echo $UserID; ?>";
    
 
    if(addaccountinstitution == '0')
    {
     $("#addccountresponse").html('<div class="alert alert-warning" role="alert"><center><i class="fa fa-warning"></i> Please select Institution Before submitting!!</div>');
     $("#createaccount").html('<i class="fa fa-plus"></i> Create Account');
    }
    else if(addaccountinstitution == '1')
    {
        $("#addccountresponse").html('<div class="alert alert-warning" role="alert"><center><i class="fa fa-warning"></i> Please Create Institution Before Creating Account!!</div>');
     $("#createaccount").html('<i class="fa fa-plus"></i> Create Account');
    }
    else if(accountname == '')
    {
        $("#addccountresponse").html('<div class="alert alert-warning" role="alert"><center><i class="fa fa-warning"></i> Please fill All Fields Before submitting!!</div>');
     $("#createaccount").html('<i class="fa fa-plus"></i> Create Account');  
    }
    else if(accountnumber == '')
    {
    $("#addccountresponse").html('<div class="alert alert-warning" role="alert"><center><i class="fa fa-warning"></i> Please fill All Fields Before submitting!!</div>');
     $("#createaccount").html('<i class="fa fa-plus"></i> Create Account');  
    }
    else if(accountbank == '')
    {
    $("#addccountresponse").html('<div class="alert alert-warning" role="alert"><center><i class="fa fa-warning"></i> Please fill All Fields Before submitting!!</div>');
     $("#createaccount").html('<i class="fa fa-plus"></i> Create Account');  
    }
    else
    {
          
       $.ajax({
                type : 'post',
                url : '../controller/scripts/owner/addschoolaccount.php', //Here you will fetch records 
                data : 'addaccountinstitution='+addaccountinstitution+'&accountname='+accountname+'&accountnumber='+accountnumber+'&accountbank='+accountbank, //Pass $id
                success : function(data){
                  $("#addccountresponse").html(data);
                $("#createaccount").html('<i class="fa fa-plus"></i> Create Account');  
                
                   $("#fetchallbankdetails").html("<td colspan='8'><center><i class='fa fa-spinner fa-spin'></i></center></td>");
                          $.ajax({
                                    type : 'post',
                                    url : '../controller/scripts/owner/loadinstitutionaccounttable.php', //Here you will fetch records 
                                    data : 'UserID='+UserID, //Pass $id
                                    success : function(data)
                                    {
                                        $('#fetchallbankdetails').html(data);//Show fetched data from database
                                    }
                                });
                    
                }
       });
    }
    
    
    
});






</script>

   



</body>

</html>
