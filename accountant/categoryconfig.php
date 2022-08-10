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
    <title>Category  | <?php echo $PrimaryName.' '.$SecondaryName; ?></title>
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
            <div class="row page-titles">
                <div class="col-md-10 align-self-center">
                    <h2 class="text-themecolor" style="color: black; font-weight: 500;">Category</h2>
                </div>
                <div id="responsemaindiv"></div>
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
                         
                        <div class="col-sm-3">
                          <select style="margin-top:10px;" class=" form-control" id="categoryconfigfilter" name="location">
                          <option value="0">Select Category Type</option>       
                          <option value="income">income</option>
                              <option value="expenditure">expenditure</option>
                          </select>
                        </div>
                        <div class="col-sm-3">
                        <select style="margin-top:10px;" class=" form-control" id="configtypefilter" name="location">
                        <option value="0">Select Configuration</option>   
                        <option value="fees">fees</option>
                            <option value="others">others (income from other sources)</option>
                        </select>
                        </div>

                        <div class="col-sm-2">
                          <button type="button" style="margin-top:15px;" class="btn-sm btn-block btn-primary" id="filterbtn">Load</button>
                        </div>
                  <div class="col-sm-2"></div>
                        
                        
                        <div class="col-sm-2">
                            <button type="button"  style="margin-top:10px;" class="btn-sm btn-block btn-success " id="addcategorybtn" data-toggle="modal" data-target="#createcategorymodal"><i class="fa fa-plus"></i> Add category</button>
                        </div>
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
                                  <th scope="col">Title</th>
                                   <th scope="col">Type</th>
                                    <th scope="col">Configuration</th>
                                    <th scope="col"></th>
                                  <th scope="col"></th>
                                   <th scope="col"></th>
                                </tr>
                              </thead >
                              <tbody id="fetchallcategory">
                              </tbody>
                            
                        </table>
                                </div>
                              </div>
                            </div>  
                        </div>
                      </div>

                    <!--Modal to add sub category-->
                    <div class="modal fade" id="addsubcategorymodal" tabindex="-1" role="dialog" aria-labelledby="addsubcategorymodalLabel" aria-hidden="true">
                      <div class="modal-dialog " role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Sub Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                              <div id="addcategoryresponse"></div>
                              <input type="hidden" id="addsubcatid">

                                  <div style="margin-top: 20px;" id="subcategorybody">
                                </div>
                                   
                                  
                                    
                                  
                          </div>
                          <div class="modal-footer" id="subcategoryfooter">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="subcategorymainbtn"><i class="fa fa-plus"></i>Create Sub</button>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--Modal to add sub category-->

                      <!--Modal to edit sub category-->
                      <div class="modal fade" id="editsubcategorymodal" tabindex="-1" role="dialog" aria-labelledby="editsubcategorymodalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-pencil"></i> Edit Sub Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                              <div id="editcategoryresponse"></div>
                              <input type="hidden" id="editsubcatid">
                                    <div class="col-12" style="margin-top: 20px;" id="editsubcategorybody">
                                  
                                    </div>
                                    
                                  
                          </div>
                        
                        </div>
                      </div>
                    </div>
                    <!--Modal to edit sub category-->

                    <!-- Modal to create category -->
                    <div class="modal fade" id="createcategorymodal" tabindex="-1" role="dialog" aria-labelledby="createcategorymodalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Create Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                              <div id="createcategoryresponse"></div>
                                    <div class="col-12">
                                        <div class="card">
                            <div class="card-body p-b-0">
                             <h4 class="card-title">Create Category</h4>
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs customtab2" role="tablist">
                                    <li class="nav-item" > <a class="nav-link active show" data-id="income" data-toggle="tab" href="#income" role="tab" aria-selected="true"><span class="hidden-sm-up"><i class="ti-home"></i></span> <span class="hidden-xs-down">Income</span></a> </li>
                                    <li class="nav-item"> <a class="nav-link show"  data-id="expenditure" data-toggle="tab" href="#expenditure" role="tab" aria-selected="false"><span class="hidden-sm-up"><i class="ti-user"></i></span> <span class="hidden-xs-down">Expenditure</span></a> </li>
                                  
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane  active show" id="income" role="tabpanel">
                                                   <div class="p-20" style="margin-top: 10px;">
                                                   <div class="row">
                                                      <div class="col-12">
                                                      <div class="alert alert-success" role="alert">
                                                        NOTE: You can add multiple categories at the same time seperated by(,)  e.g Tuition,Fee
                                                        </div>
                                                      </div>
                                                      </div>
                                                        <div class="row">
                                                    <div class="col-12">
                                                        <label >Select Income Type:</label>
                                                        <select id="incometype" class="form-control chimaPrimaryBorderColor" style="background: white; border-width: 1px; border-style: solid; font-size: 14px;">
                                                            <option value="0">Select Income Type:</option>   
                                                             <option value="fees">Fees</option>  
                                                             <option value="others">others (income from other sources)</option>  
                                                        </select>
                                                    </div>
                                                </div>
                                                        <div class="col-12" style="margin-top: 10px;">
                                                <label for="incomecategorytitle">Category Title</label>
                                                <input id="incomecategorytitle"  type="text" class="form-control" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane  show" id="expenditure" role="tabpanel">
                                               <div class="p-20" style="margin-top: 10px;">
                                               <div class="row">
                                                      <div class="col-12">
                                                      <div class="alert alert-success" role="alert">
                                                        NOTE: You can add multiple categories at the same time seperated by(,)  e.g Tuition,Fee
                                                        </div>
                                                      </div>
                                                      </div>
                                                        <div class="col-12" style="margin-top: 10px;">
                                                <label for="expenditurecategorytitle">Category Title</label>
                                                <input id="expenditurecategorytitle"  type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                
                                </div>
                            </div>
                        </div>
                       
                                    </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="createcategory"><i class="fa fa-plus"></i> Create Category</button>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--Modal to create category-->
                    
                    <!--Modal to edit category-->
                    <div class="modal fade" id="editcategorymodal" tabindex="-1" role="dialog" aria-labelledby="editcategorymodalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-pencil"></i> Edit Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                              <div id="editcategoryresponse"></div>
                              <input type="hidden" id="editcatid">
                                    <div class="col-12" style="margin-top: 20px;" id="editcategorybody">
                                  
                                    </div>
                          </div>
                          <div class="modal-footer" id="editcategoryfooter">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="editcategorymainbtn"><i class="fa fa-pencil"></i> Edit Category</button>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--Modal to edit category-->
                    
                    
                    
                    <!--Modal to delete category--->
                     <div class="modal fade" id="deletecategorymodal" tabindex="-1" role="dialog" aria-labelledby="deletecategorymodalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i style="color:red;" class="fa fa-times-rectangle"></i> Delete Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                              <div id="deletecategoryresponse"></div>
                              <input type="hidden" id="deletecatid">
                                    <div class="col-12" style="margin-top: 20px; padding:5px;" id="deletecategorybody">
                                       <Center> <i style="color:red;" class="fa fa-3x fa-times-rectangle"></i> 
                                       <p>Are you Sure You Want To delete <strong><span id="displaydelcatname"></span></strong> ?</p>
                                       <p style="margin-top:-5px;"><strong>NOTE:</strong> All Details Related To this Category Would be cleared</p>
                                       
                                   
                                       
                                       </Center>
                                  
                                    </div>
                          </div>
                          <div class="modal-footer" id="deletecategoryfooter">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="deletecategorymainbtn" style="background-color:red; border-color:red;"><i  class="fa fa-times-rectangle"></i> Delete Category</button>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--Modal to delete category--->

              
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

    var UserID = "<?php echo $UserID; ?>";
    var institution = "<?php echo $InstitutionID; ?>";
    var cattype = 'fees';
    var configtype = 'income';  
    $("#editcategoryfooter").hide();
    $("#fetchallcategory").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
     $.ajax({
                type : 'post',
                url : '../controller/scripts/accountant/loadcategorytable.php', //Here you will fetch records 
                data : 'UserID='+UserID+'&cattype='+cattype+'&configtype='+configtype+'&institution='+institution, //Pass $id
                success : function(data){
                    $("#createcategory").html("<i class='fa fa-plus'></i> Create Category");
                    $('#fetchallcategory').html(data);//Show fetched data from database
                }
            });
    
});

$("body").on("click","#editsubcatmainbutton", function(){
$("#editsubcatmainbutton").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
var editsubcategorytitle = $("#editsubcategorytitle").val();
var stored = $("#editsubcatid").val();
$.ajax({
                type : 'post',
                url : '../controller/scripts/accountant/saveeditedsubcatreponse.php', //Here you will fetch records 
                data : 'editsubcategorytitle='+editsubcategorytitle+'&stored='+stored, //Pass $id
                success : function(data){
                  $('#editcategoryresponse').html(data);
                    $('#editsubcatmainbutton').html('Submit');//Show fetched data from database

                    $("#editcategorybody").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
                    
                    var categoryid = $("#addsubcatid").val();
                        
                        $.ajax({
                                 type : 'post',
                                 url : '../controller/scripts/accountant/loadsubcategories.php', //Here you will fetch records 
                                 data : 'categoryid='+categoryid, //Pass $id
                                 success : function(data){
                                   $("#subcategorybody").html(data);
                                       $("#subcategoryfooter").show();
                                     
                                 }
                        });
                  
                 
                }
            });

});

$("body").on("click","#editsubcategories", function(){
var subcatid = $(this).data("id");
var store = $("#editsubcatid").val(subcatid);
$("#editsubcategorybody").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
$.ajax({
                type : 'post',
                url : '../controller/scripts/accountant/loadeditsubcategorybody.php', //Here you will fetch records 
                data : 'subcatid='+subcatid, //Pass $id
                success : function(data){
             
                    $('#editsubcategorybody').html(data);//Show fetched data from database
                }
            });
});

$("body").on("click", "#editloadfeecategorybtn", function(){
        $("#editcategorybody").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
        var categoryid = $(this).data("id");
        var save = $("#editcatid").val(categoryid);
      
         $.ajax({
                type : 'post',
                url : '../controller/scripts/accountant/loadeditcategorybody.php', //Here you will fetch records 
                data : 'categoryid='+categoryid, //Pass $id
                success : function(data){
                    $("#editcategoryfooter").show();
                    $('#editcategorybody').html(data);//Show fetched data from database
                }
            });
            
          
});

$("body").on("click", "#deleteloadfeecategorybtn", function(){
  var catname = $(this).data("editname");  
  var catid = $(this).data("id");
  var disp = $("#displaydelcatname").html(catname);
  var storeid = $("#deletecatid").val(catid);
  

});


$("body").on("click","#deletecategorymainbtn", function(){
     $("#deletecategorymainbtn").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
        var categoryid = $("#deletecatid").val();
        var institution = "<?php echo $InstitutionID; ?>";
        
          $.ajax({
                type : 'post',
                url : '../controller/scripts/accountant/deletecategorybody.php', //Here you will fetch records 
                data : 'categoryid='+categoryid+'&institution='+institution, //Pass $id
                success : function(data){
             $("#deletecategorymainbtn").html('<i  class="fa fa-times-rectangle"></i> Delete Category');
                    $('#deletecategoryresponse').html(data);//Show fetched data from database
                    
                                                    var categorytitle = $("#categorytitle").val();
                                                    var UserID = "<?php echo $UserID; ?>";
                                                    var institution = "<?php echo $InstitutionID; ?>";
                                                    var cattype = 'fees';
                                                    var configtype = 'income';  
                                                    $("#fetchallcategory").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
                                                     $.ajax({
                                                                type : 'post',
                                                                url : '../controller/scripts/accountant/loadcategorytable.php', //Here you will fetch records 
                                                                data : 'UserID='+UserID+'&cattype='+cattype+'&configtype='+configtype+'&institution='+institution, //Pass $id
                                                                success : function(data){
                                                                    $("#createcategory").html("<i class='fa fa-plus'></i> Create Category");
                                                                    $('#fetchallcategory').html(data);//Show fetched data from database
                                                                }
                                                            });
                }
            });
    
});

  $("body").on("click", "#editcategorymainbtn", function(){
                      $("#editcategorymainbtn").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
                        var editcategorytitle = $("#editcategorytitle").val();
                        var usertype = 'accountant';
                         var institution = "<?php echo $InstitutionID; ?>";
                        var categoryid = $("#editcatid").val();
                        
                          $.ajax({
                                type : 'post',
                                url : '../controller/scripts/accountant/updatecategory.php', //Here you will fetch records 
                                data : 'editcategorytitle='+editcategorytitle+'&categoryid='+categoryid+'&usertype='+usertype+'&institution='+institution, //Pass $id
                                success : function(data){
                                    $("#editcategorymainbtn").html('<i class="fa fa-pencil"></i> Edit Category');
                                    $('#editcategoryresponse').html(data);//Show fetched data from database
                                    
                                                    var categorytitle = $("#categorytitle").val();
                                                    var UserID = "<?php echo $UserID; ?>";
                                                    var institution = "<?php echo $InstitutionID; ?>";
                                                    var cattype = 'fees';
                                                    var configtype = 'income';  
                                                    $("#fetchallcategory").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
                                                     $.ajax({
                                                                type : 'post',
                                                                url : '../controller/scripts/accountant/loadcategorytable.php', //Here you will fetch records 
                                                                data : 'UserID='+UserID+'&cattype='+cattype+'&configtype='+configtype+'&institution='+institution, //Pass $id
                                                                success : function(data){
                                                                    $("#createcategory").html("<i class='fa fa-plus'></i> Create Category");
                                                                    $('#fetchallcategory').html(data);//Show fetched data from database
                                                                }
                                                            });
                                }
                            });
                
            });

   
$("body").on("click","#createcategory", function(){
    $("#createcategory").html("<i class='fa fa-spinner fa-spin'></i>");
    $('#createcategoryresponse').html('');
    
    var  configtype = $(".nav-link.active").data("id");

        if(configtype == 'income')
            {
                var categorytitle = $("#incomecategorytitle").val();
                var UserID = "<?php echo $UserID; ?>";
                var institution = "<?php echo $InstitutionID; ?>";
                var usertype = 'accountant';
                var cattype = $("#incometype").val();
                
                    if(cattype == '0')
                    {
                        $("#createcategoryresponse").html('<div class="alert alert-warning" role="alert">oops Please select Income Type Before submitting!!</div>');
                                   $("#createcategory").html("<i class='fa fa-plus'></i> Create Category");
                    }
                    else
                    {
  
                        $.ajax({
                                type : 'post',
                                url : '../controller/scripts/accountant/createcategory.php', //Here you will fetch records 
                                data : 'categorytitle='+categorytitle+'&UserID='+UserID+'&cattype='+cattype+'&configtype='+configtype+'&institution='+institution+'&usertype='+usertype, //Pass $id
                                success : function(data)
                                {
                                    $("#createcategory").html("<i class='fa fa-plus'></i> Create Category");
                                    $('#createcategoryresponse').html(data);//Show fetched data from database
                                    
                                        var UserID = "<?php echo $UserID; ?>";
                                        var institution = "<?php echo $InstitutionID; ?>";
                                        var cattype = 'fees';
                                        var configtype = 'income';  
                                        $("#editcategoryfooter").hide();
                                        $("#fetchallcategory").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
                                         $.ajax({
                                                    type : 'post',
                                                    url : '../controller/scripts/accountant/loadcategorytable.php', //Here you will fetch records 
                                                    data : 'UserID='+UserID+'&cattype='+cattype+'&configtype='+configtype+'&institution='+institution, //Pass $id
                                                    success : function(data){
                                                        $("#createcategory").html("<i class='fa fa-plus'></i> Create Category");
                                                        $('#fetchallcategory').html(data);//Show fetched data from database
                                                    }
                                                });
                                }
                            });

                        
                    }

             
                
            }
            else if(configtype == 'expenditure')
            {
                    var categorytitle = $("#expenditurecategorytitle").val();
                    var UserID = "<?php echo $UserID; ?>";
                    var institution = "<?php echo $InstitutionID; ?>";
                    var usertype = 'accountant';
                    var cattype = 'others';
                    
                        if(cattype == '0')
                        {
                            $("#createcategoryresponse").html('<div class="alert alert-warning" role="alert">oops Please select Expenditure Type Before submitting!!</div>');
                            $("#createcategory").html("<i class='fa fa-plus'></i> Create Category");
                        }
                        else
                        {

                            $.ajax({
                                    type : 'post',
                                    url : '../controller/scripts/accountant/createcategory.php', //Here you will fetch records 
                                    data : 'categorytitle='+categorytitle+'&UserID='+UserID+'&cattype='+cattype+'&configtype='+configtype+'&institution='+institution+'&usertype='+usertype, //Pass $id
                                    success : function(data){
                                        $("#createcategory").html("<i class='fa fa-plus'></i> Create Category");
                                        $('#createcategoryresponse').html(data);//Show fetched data from database
                                        
                                            var UserID = "<?php echo $UserID; ?>";
                                                var institution = "<?php echo $InstitutionID; ?>";
                                                var cattype = 'fees';
                                                var configtype = 'income';  
                                                $("#editcategoryfooter").hide();
                                                $("#fetchallcategory").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
                                                 $.ajax({
                                                            type : 'post',
                                                            url : '../controller/scripts/accountant/loadcategorytable.php', //Here you will fetch records 
                                                            data : 'UserID='+UserID+'&cattype='+cattype+'&configtype='+configtype+'&institution='+institution, //Pass $id
                                                            success : function(data){
                                                                $("#createcategory").html("<i class='fa fa-plus'></i> Create Category");
                                                                $('#fetchallcategory').html(data);//Show fetched data from database
                                                            }
                                                        });
                                    }
                                });
    
                            
                        }
                    
            }


});
    
$("body").on("click","#addsubcategory", function(){
          $("#addcategoryresponse").html('');
    $("#subcategoryfooter").hide();
    var categoryid = $(this).data("id");
    var subcatid = $("#addsubcatid").val(categoryid);
    $("#subcategorybody").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
    var institution = "<?php echo $InstitutionID; ?>";
    
       $.ajax({
                type : 'post',
                url : '../controller/scripts/accountant/loadsubcategories.php', //Here you will fetch records 
                data : 'categoryid='+categoryid+'&institution='+institution, //Pass $id
                success : function(data){
                  $("#subcategorybody").html(data);
                      $("#subcategoryfooter").show();
                    
                }
       });
    
}); 

$("body").on("click","#subcategorymainbtn", function(){
          $("#addcategoryresponse").html('');
    $(this).html("<center><i class='fa fa-spinner fa-spin'></i></center>");
    var categoryid = $("#addsubcatid").val();
    var institution = "<?php echo $InstitutionID; ?>";
    var subcategorytitle = $("#subcategorytitle").val();
       var UserID = "<?php echo $UserID; ?>";
                var usertype = 'accountant';
     
           $.ajax({
                type : 'post',
                url : '../controller/scripts/accountant/addnewsubcategory.php', //Here you will fetch records 
                data : 'categoryid='+categoryid+'&institution='+institution+'&subcategorytitle='+subcategorytitle+'&UserID='+UserID+'&usertype='+usertype, //Pass $id
                success : function(data){
                  $("#addcategoryresponse").html(data);
                  $("#subcategorymainbtn").html('<i class="fa fa-plus"></i> Create Sub');
                    
                            $("#subcategoryfooter").hide();
                            $("#subcategorybody").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
                            var institution = "<?php echo $InstitutionID; ?>";
                        
                           $.ajax({
                                    type : 'post',
                                    url : '../controller/scripts/accountant/loadsubcategories.php', //Here you will fetch records 
                                    data : 'categoryid='+categoryid+'&institution='+institution, //Pass $id
                                    success : function(data){
                                      $("#subcategorybody").html(data);
                                          $("#subcategoryfooter").show();
                                        
                                    }
                           });
                           
                              var UserID = "<?php echo $UserID; ?>";
                            var institution = "<?php echo $InstitutionID; ?>";
                            $("#editcategoryfooter").hide();
                            $("#fetchallcategory").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
                             $.ajax({
                                        type : 'post',
                                        url : '../controller/scripts/accountant/loadcategorytable.php', //Here you will fetch records 
                                        data : 'UserID='+UserID+'&institution='+institution, //Pass $id
                                        success : function(data){
                                            $("#createcategory").html("<i class='fa fa-plus'></i> Create Category");
                                            $('#fetchallcategory').html(data);//Show fetched data from database
                                        }
                                    });
                    
                   
                    
                }
       });
    
});

$("body").on("click","#delsubcategories", function(){
             $("#addcategoryresponse").html('');
    $(this).html("<center><i class='fa fa-spinner fa-spin'></i></center>");
    var subcatid = $(this).data("id");
           $.ajax({
                type : 'post',
                url : '../controller/scripts/accountant/deletesubcategories.php', //Here you will fetch records 
                data : 'subcatid='+subcatid, //Pass $id
                success : function(data){
                   $("#addcategoryresponse").html(data);
                   
                        $("#subcategoryfooter").hide();
                            $("#subcategorybody").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
                            var institution = "<?php echo $InstitutionID; ?>";
                                var categoryid = $("#addsubcatid").val();
                        
                           $.ajax({
                                    type : 'post',
                                    url : '../controller/scripts/accountant/loadsubcategories.php', //Here you will fetch records 
                                    data : 'categoryid='+categoryid+'&institution='+institution, //Pass $id
                                    success : function(data){
                                      $("#subcategorybody").html(data);
                                          $("#subcategoryfooter").show();
                                        
                                    }
                           });
                           
                              var UserID = "<?php echo $UserID; ?>";
                            var institution = "<?php echo $InstitutionID; ?>";
                            $("#editcategoryfooter").hide();
                            $("#fetchallcategory").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
                             $.ajax({
                                        type : 'post',
                                        url : '../controller/scripts/accountant/loadcategorytable.php', //Here you will fetch records 
                                        data : 'UserID='+UserID+'&institution='+institution, //Pass $id
                                        success : function(data){
                                            $("#createcategory").html("<i class='fa fa-plus'></i> Create Category");
                                            $('#fetchallcategory').html(data);//Show fetched data from database
                                        }
                                    });
                
                    
                }
       });
    

    
});

$("body").on("click", "#filterbtn", function(){
     $(this).html("<center><i class='fa fa-spinner fa-spin'></i></center>");
    $("#fetchallcategory").html("<td colspan='8'><center><i class='fa fa-spinner fa-spin'></i></center></td>");
    var catconfigcal = $("#categoryconfigfilter").val();
    var configtypefilter = $("#configtypefilter").val();
    var UserID = "<?php echo $UserID; ?>";
    var institution = "<?php echo $InstitutionID; ?>";
    
    if(catconfigcal == '0' && configtypefilter == '0')
                        {
                            $("#filterbtn").html("<center>Load</center>");
                        var UserID = "<?php echo $UserID; ?>";
                        var institution = "<?php echo $InstitutionID; ?>";
                        var cattype = 'fees';
                        var configtype = 'income';  

                        $("#fetchallcategory").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
                          $.ajax({
                                    type : 'post',
                                    url : '../controller/scripts/accountant/loadcategorytable.php', //Here you will fetch records 
                                    data : 'UserID='+UserID+'&cattype='+cattype+'&configtype='+configtype+'&institution='+institution, //Pass $id
                                    success : function(data){
                                
                                        $('#fetchallcategory').html(data);//Show fetched data from database
                                    }
                                });
                        }
                            else{
                                    $.ajax({
                                            type : 'post',
                                            url : '../controller/scripts/accountant/filtertoloadcattable.php', //Here you will fetch records 
                                            data : 'UserID='+UserID+'&institution='+institution+'&catconfigcal='+catconfigcal+'&configtypefilter='+configtypefilter, //Pass $id
                                            success : function(data){
                                               $("#fetchallcategory").html(data);
                                                $("#filterbtn").html("<center>Load</center>");
                                               
                                            }
                                               
                                            });
                                
                                }
    
    
});

  

</script>

   



</body>

</html>
