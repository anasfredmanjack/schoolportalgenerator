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
    <title>Income Fee Sub Category | <?php echo $PrimaryName.' '.$SecondaryName; ?></title>
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
            
            </div>
          </nav>
        <!-- End Sidebar navigation -->
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper" style="margin-top: -60px;">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="row page-titles">
                <div class="col-md-10 align-self-center">
                    <h2 class="text-themecolor" style="color: black; font-weight: 500;">Income Fee Sub Category</h2>
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
                        <div class="col-sm-10"></div>
                        <div class="col-sm-2">
                            <button type="button" class="btn-sm btn-block btn-success " id="addsubcategorybtn" data-toggle="modal" data-target="#createsubcategorymodal"><i class="fa fa-plus"></i> Add Sub category</button>
                        </div>
                      </div>
                      
                      
                      <div class="row" style="margin-top:10px;">
                        <div class="col-12">
                            <div class="card">
                              <div class="card-body">
                                  <table class="table table-striped">
                              <thead>
                                <tr>
                                  <th scope="col">#</th>
                                  <th scope="col">Sub Category  </th>
                                       <th scope="col">Category  </th>
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


                    <!-- Modal to create category -->
                    <div class="modal fade" id="createsubcategorymodal" tabindex="-1" role="dialog" aria-labelledby="createsubcategorymodalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Create Sub Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                              <div id="createsubcategoryresponse"></div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="inputname" class="form-label" style="font-weight: normal; color: black;">Select Category</label>
                                        <select id="filterselectcat" class="form-control chimaPrimaryBorderColor" style="background: white; border-width: 1px; border-style: solid; font-size: 14px;">
                                                 <option value="0">Select Category</option> 
                                                                    <?php  
                                                                        $sql = mysqli_query($link,"SELECT * FROM `category` WHERE `InstitutionID`='$InstitutionID'");
                                                                        $row = mysqli_fetch_array($sql);
                                                                        while($row = mysqli_fetch_array($sql)){
                                                                        echo '<option value="'.$row['categoryID'].'">'.$row['categoryTitle'].'</option>';
                                                                        }
                                                                    ?>                             
                                          </select>
                                    </div>
                                </div>
                                    <div class="col-12" style="margin-top: 20px;">
                                        <label for="inputname" class="form-label " style="font-weight: normal; color: black;">Sub Category Title</label>
                                        <input id="subcategorytitle"  type="text" class="form-control chimaPrimaryBorderColor" >
                                    </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="createsubcategory"><i class="fa fa-plus"></i> Create Sub Category</button>
                            
                          </div>
                        </div>
                      </div>
                    </div>
                    <!--Modal to create category-->
                    
                    <!--Modal to edit category-->
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
                              <div id="editsubcategoryresponse"></div>
                              <input type="hidden" id="editsubcatid">
                                    <div class="col-12" style="margin-top: 20px;" id="editsubcategorybody">
                                  
                                    </div>
                          </div>
                          <div class="modal-footer" id="editsubcategoryfooter">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="editsubcategorymainbtn"><i class="fa fa-pencil"></i> Edit Sub Category</button>
                            
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
     var categorytitle = $("#categorytitle").val();
    var UserID = "<?php echo $UserID; ?>";
    var institution = "<?php echo $InstitutionID; ?>";
    var cattype = 'fees';
    var configtype = 'income';  
    $("#editsubcategoryfooter").hide();
    $("#fetchallcategory").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
     $.ajax({
                type : 'post',
                url : '../controller/scripts/accountant/loadincomefeesubcategory.php', //Here you will fetch records 
                data : 'UserID='+UserID+'&cattype='+cattype+'&configtype='+configtype+'&institution='+institution, //Pass $id
                success : function(data){
                    $("#createsubcategory").html("<i class='fa fa-plus'></i> Create Category");
                    $('#fetchallcategory').html(data);//Show fetched data from database
                }
            });
    
});

$("body").on("click", "#editloadfeesubcategorybtn", function(){
        $("#editsubcategorybody").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
        var subcategoryid = $(this).data("id");
        var save = $("#editsubcatid").val(subcategoryid);
        var institution = "<?php echo $InstitutionID; ?>";
      
         $.ajax({
                type : 'post',
                url : '../controller/scripts/accountant/loadeditincomefeesubcategorybody.php', //Here you will fetch records 
                data : 'subcategoryid='+subcategoryid+'&institution='+institution, //Pass $id
                success : function(data){
                    $("#editsubcategoryfooter").show();
                    $('#editsubcategorybody').html(data);//Show fetched data from database
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
                url : '../controller/scripts/accountant/deleteincomefeecategorybody.php', //Here you will fetch records 
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
                                                                url : '../controller/scripts/accountant/loadincomefeesubcategory.php', //Here you will fetch records 
                                                                data : 'UserID='+UserID+'&cattype='+cattype+'&configtype='+configtype+'&institution='+institution, //Pass $id
                                                                success : function(data){
                                                                    $("#createsubcategory").html("<i class='fa fa-plus'></i> Create Category");
                                                                    $('#fetchallcategory').html(data);//Show fetched data from database
                                                                }
                                                            });
                }
            });
    
});

  $("body").on("click", "#editsubcategorymainbtn", function(){
                      $("#editsubcategorymainbtn").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
                        var editsubcategorytitle = $("#editsubcategorytitle").val();
                        var usertype = 'accountant';
                         var institution = "<?php echo $InstitutionID; ?>";
                        var categoryid = $("#editcatid").val();
                        
                          $.ajax({
                                type : 'post',
                                url : '../controller/scripts/accountant/updateincomefeecategory.php', //Here you will fetch records 
                                data : 'editsubcategorytitle='+editsubcategorytitle+'&categoryid='+categoryid+'&usertype='+usertype+'&institution='+institution, //Pass $id
                                success : function(data){
                                    $("#editsubcategorymainbtn").html('<i class="fa fa-pencil"></i> Edit Category');
                                    $('#editsubcategoryresponse').html(data);//Show fetched data from database
                                    
                                                    var categorytitle = $("#categorytitle").val();
                                                    var UserID = "<?php echo $UserID; ?>";
                                                    var institution = "<?php echo $InstitutionID; ?>";
                                                    var cattype = 'fees';
                                                    var configtype = 'income';  
                                                    $("#fetchallcategory").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
                                                     $.ajax({
                                                                type : 'post',
                                                                url : '../controller/scripts/accountant/loadincomefeesubcategory.php', //Here you will fetch records 
                                                                data : 'UserID='+UserID+'&cattype='+cattype+'&configtype='+configtype+'&institution='+institution, //Pass $id
                                                                success : function(data){
                                                                    $("#createsubcategory").html("<i class='fa fa-plus'></i> Create Sub Category");
                                                                    $('#fetchallcategory').html(data);//Show fetched data from database
                                                                }
                                                            });
                                }
                            });
                
            });
    

$("body").on("click","#createsubcategory", function(){
    $("#createsubcategory").html("<i class='fa fa-spinner fa-spin'></i>");
    var subcategorytitle = $("#subcategorytitle").val();
    var UserID = "<?php echo $UserID; ?>";
    var institution = "<?php echo $InstitutionID; ?>";
    var categoryid = $("#filterselectcat").val();
    var usertype = 'accountant';
    var subcattype = 'fees';
    var configtype = 'income';

    
    if(categoryid == 0 || categoryid == '')
        {
            $("#createsubcategoryresponse").html('<div class="alert alert-warning" role="alert"><strong>oops!!</strong> Please Select A category beofre Submitting!! </div>');
            $("#createsubcategory").html("<i class='fa fa-plus'></i> Create Sub Category");
            
        }
        else if(subcategorytitle == '')
        {
            
            $("#createsubcategoryresponse").html('<div class="alert alert-warning" role="alert"><strong>oops!!</strong> Fields cannot be empty!! </div>');  
            $("#createsubcategory").html("<i class='fa fa-plus'></i> Create Sub Category");
            
        }
        else{
        
             $.ajax({
                type : 'post',
                url : '../controller/scripts/accountant/createincomefeesubcategory.php', //Here you will fetch records 
                data : 'subcategorytitle='+subcategorytitle+'&UserID='+UserID+'&categoryid='+categoryid+'&subcattype='+subcattype+'&configtype='+configtype+'&institution='+institution+'&usertype='+usertype, //Pass $id
                success : function(data){
                    $("#createsubcategory").html("<i class='fa fa-plus'></i> Create Category");
                    $('#createsubcategoryresponse').html(data);//Show fetched data from database
                    
                                                        var categorytitle = $("#categorytitle").val();
                                                        var UserID = "<?php echo $UserID; ?>";
                                                        var institution = "<?php echo $InstitutionID; ?>";
                                                        var cattype = 'fees';
                                                        var configtype = 'income';  
                                                        $("#fetchallcategory").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
                                                         $.ajax({
                                                                    type : 'post',
                                                                    url : '../controller/scripts/accountant/loadincomefeesubcategory.php', //Here you will fetch records 
                                                                    data : 'UserID='+UserID+'&cattype='+cattype+'&configtype='+configtype+'&institution='+institution, //Pass $id
                                                                    success : function(data){
                                                                        $("#createsubcategory").html("<i class='fa fa-plus'></i> Create Sub Category");
                                                                        $('#fetchallcategory').html(data);//Show fetched data from database
                                                                    }
                                                                });
                }
            });
            
        }

});
</script>

   



</body>

</html>
