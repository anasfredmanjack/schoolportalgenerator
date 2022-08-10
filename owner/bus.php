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
    <title>Bus | <?php echo $fullname; ?></title>
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
            <div class="scroll-sidebar">
              <?php include ('../includes/menu-owner.php'); ?>
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
                    <h2 class="text-themecolor" style="color: black; font-weight: 500;"><i class="mdi mdi-bus"></i> Bus</h2>
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
                          <div class="col-sm-4">
                              <select style="margin-top:10px;"  class=" form-control chimaPrimaryBorderColor" id="filterinstitution" name="location">
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
                            <div class="col-sm-2">
                                 <center><button type="button" style="margin-top:10px;" class="btn-sm btn-block btn-primary" id="filterbtn">Load</button></center>
                            </div>
                    </div>                                  
                        
                    
                    <div id="filterresponse" style="margin:10px;"></div>
                   
             

                    <div class="row" style="margin-top:10px;">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">   
                                    <div id="buscontent" class="table-responsive">

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

<script>
$("body").on("click","#filterbtn", function(){
     $("#filterbtn").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
    var filterinstitution = $("#filterinstitution").val();

    if(filterinstitution =='0')
    {
         $("#filterresponse").html('<div class="alert alert-warning" role="alert"><center><i class="fa fa-warning"></i> Please Select Institution  To filter</center></div>');
        $("#filterbtn").html("Load");
        
    }
    else if(filterinstitution =='1')
    {
        $("#filterresponse").html('<div class="alert alert-warning" role="alert"><center><i class="fa fa-warning"></i> No institution Available</center></div>');
        $("#filterbtn").html("Load");
    }
    else
    {
        $("#buscontent").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
        $("#filterresponse").html('');
        $("#filterbtn").html("Load");
        $.ajax({
                                type : 'post',
                                url : '../controller/scripts/owner/filtertoloadbus.php', //Here you will fetch records 
                                data : 'filterinstitution='+filterinstitution, //Pass $id
                                success : function(data)
                                {

                                     $('#buscontent').html(data);//Show fetched data from database
                                 
                                     $('#myTable').DataTable({
                                            dom: 'Bfrtip',
                                            buttons: [
                                                'pdf', 'print'
                                            ]
                                        });
                          
                                }
                                 
                            });


    }

});

$(document).ready(function(){
        $("#buscontent").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
        var UserID = "<?php echo $UserID; ?>";

                    $.ajax({
                                type : 'post',
                                url : '../controller/scripts/owner/loadbus.php', //Here you will fetch records 
                                data : 'UserID='+UserID, //Pass $id
                                success : function(data)
                                {

                                     $('#buscontent').html(data);//Show fetched data from database
                                 
                                     $('#myTable').DataTable({
                                            dom: 'Bfrtip',
                                            buttons: [
                                                'pdf', 'print'
                                            ]
                                        });
                          
                                }
                                 
                            });

});


  

</script>

   



</body>

</html>
