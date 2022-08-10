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
    <title>School Proceed | <?php echo $fullname; ?></title>
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
                    <h2 class="text-themecolor" style="color: black; font-weight: 500;">School Proceed</h2>
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
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-sm-2">
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
                                <select class="form-control chimaPrimaryBorderColor" id="session" style="background: white; border-width: 1px; border-style: solid; margin-top:10px;">
                                    <option  value="0">Select Session</option>
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

                            <div class="col-sm-2">

                                <select class="form-control chimaPrimaryBorderColor" id="term" style="background: white; border-width: 1px; border-style: solid; margin-top:10px;">
                                    <option  value="0">Select Term</option>
                                    <?php  
                                        $term = ("SELECT * FROM `termorsemester` ORDER BY `TermOrSemesterID` ASC");
                                        $resultTerm = mysqli_query($link, $term);
                                        $fetchTerm = mysqli_fetch_assoc($resultTerm);
                                        $rowTerm = mysqli_num_rows($resultTerm);
                                    
                                    do{
                                            echo '<option value="' . $fetchTerm['TermOrSemesterName']. '"> ' . $fetchTerm['TermOrSemesterName'] . '</option>';
                                    
                                        }while($fetchTerm = mysqli_fetch_assoc($resultTerm));
                                        ?>
                                </select>

                            </div>

                       

                    
                            <div class="col-sm-2 " style="margin-top:10px;">
                            
                            <button type="button" id="loadbtn" style="width:100%;" class="btn waves-effect waves-light btn-sm btn-success">
                                    Load
                                    </button>   
                        </div>
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2"></div>
      
                           
                        </div>
                    </div>
                </div>

                <!---Modal to view Reports-->
                <div class="modal fade" id="loadviewcontentmodal" tabindex="-1" role="dialog" aria-labelledby="loadviewcontentmodalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg ">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i style="color:orangered;" class="fa fa-eye"></i>School Proceed</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                                <div id="viewresponse"></div>
                                <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card card-outline-info">
                                                <div class="card-header">
                                                    <h4 class="m-b-0 text-white"><i style="color:white;" class="fa fa-eye"></i>School Proceed</h4>
                                                </div>
                                                <div class="card-body">
                                                    <div>
                                                    <div class="row">
                                                        <div class="col-sm-10"></div>
                                                            <div class="col-sm-2">
                                                                    <button type="button" id="finalprintbtn"  class="btn-sm btn-block btn-success text-right"><center><i class="fa fa-print"></i> Print</center></button>
                                                            </div>
                                                    </div>
                                                        <input type="hidden" id="viewid">

                                                        <div id="viewmodalbody">

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
                </div>
                  <!---Modal to view Reports-->    

                  <!--Modal to print all transactions-->
                  <div class="modal fade" id="printallcontentmodal" tabindex="-1" role="dialog" aria-labelledby="printallcontentmodalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i style="color:green;" class="fa fa-print"></i> Print School Proceeds</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                             
                            <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card card-outline-info">
                                                <div class="card-header">
                                                    <h4 class="m-b-0 text-white"><i style="color:white;" class="fa fa-print"></i> Print School Proceeds</h4>
                                                </div>
                                                
                                                <div class="card-body">
                                                    <div class="row">
                                                            <div class="col-sm-10"></div>
                                                                <div class="col-sm-2">
                                                                        <button type="button" id="finalprintallincomebtn"  class="btn-sm btn-block btn-success text-right"><center><i class="fa fa-print"></i> Print</center></button>
                                                                </div>
                                                        </div>

                                                        <div id="printallcontentbody" class="table-responsive"></div>

                                                </div>

                                            </div>
                                        </div>
                            </div>
                          </div>
                        
                        </div>
                      </div>
                    </div>
                  <!--Modal to print all transactions-->
              
                        <div class="row">
                            <div class="col-12">
                                <div id="loadtableresponse" style="margin:10px;"></div>
                            </div>
                        </div>
                        

                    <div class="row" style="margin-top:10px;">

                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                                            <div class="col-sm-10"></div>
                                                    
                                                                <div class="col-sm-2">
                                                                        <button type="button" id="loadallincprintbtn"  data-toggle="modal" data-target="#printallcontentmodal" class="btn-sm btn-block btn-primary text-right"><center><i class="fa fa-print"></i> Print</center></button>
                                                                </div>
                                    </div>
                                    <div id="reporttable" class="table-responsive"> 

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div> 
            
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
     <script language="javascript">
        $(document).ready(function () {
            $("#incomestartdate").datepicker({
                changeMonth: true,
			    changeYear: true,
                dateFormat: 'yy-mm-dd'
            });
            $("#incomeenddate").datepicker({
    
                changeMonth: true,
			    changeYear: true,
                dateFormat: 'yy-mm-dd'
            });
        });
    </script>
    <script src="../js/jquery-ui.min.js"></script>
<script>


$(document).ready(function(){
        $("#reporttable").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
        var UserID = "<?php echo $UserID; ?>";

                    $.ajax({
                                type : 'post',
                                url : '../controller/scripts/owner/loadschoolproceed.php', //Here you will fetch records 
                                data : 'UserID='+UserID, //Pass $id
                                success : function(data)
                                {
                                $('#reporttable').html(data);//Show fetched data from database
                                 
                                $('#myTable').DataTable({
                                        dom: 'Bfrtip',
                                        buttons: [
                                            'pdf', 'print'
                                        ]
                                    });
                          
                                }
                                 
                            });

});

$("body").on("click","#finalprintallincomebtn", function(){
            var printContent = document.getElementById('printallcontentbody');
    

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



$("body").on("click","#loadallincprintbtn", function(){
            $("#printallcontentbody").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
            var session = $("#session").val();
        var term = $("#term").val();
        var UserID = "<?php echo $UserID; ?>";
        var institution = $("#filterinstitution").val();

     
  
                    $.ajax({
                                type : 'post',
                                url : '../controller/scripts/owner/loadallschoolproceed.php', //Here you will fetch records 
                                data : 'institution='+institution+'&session='+session+'&term='+term+'&UserID='+UserID, //Pass $id
                                success : function(data)
                                {
                                    
                                    $('#printallcontentbody').html(data);//Show fetched data from database
                                 
                                }
                                 
                            });

        

    });

    $("body").on("click","#finalprintbtn", function(){
    
                
    var printContent = document.getElementById('viewmodalbody');


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



    $("body").on("click","#loadviewcontent", function(){
            $("#viewmodalbody").html("<center><i class='fa fa-spinner fa-spin'></i></center>");

                        var classid = $(this).data("id");
                        var session = $("#session").val();
                    var term = $("#term").val();
                    var UserID = "<?php echo $UserID; ?>";
                    var institution = $("#filterinstitution").val();

                    $.ajax({
                            type : 'post',
                            url : '../controller/scripts/owner/viewschoolproceed.php', //Here you will fetch records 
                            data : 'institution='+institution+'&session='+session+'&term='+term+'&classid='+classid+'&UserID='+UserID, //Pass $id
                            success : function(data)
                            {
                                $('#viewmodalbody').html(data);//Show fetched data from database
                            }
                        }); 


        });

$("body").on("click","#loadbtn", function(){
        $("#loadbtn").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
        
        var session = $("#session").val();
        var term = $("#term").val();
        var UserID = "<?php echo $UserID; ?>";
        var institution = $("#filterinstitution").val();

        if(session == '0' && term == '0')
        {
            $("#loadtableresponse").html('<div class="alert alert-warning" role="alert"><center><i class="fa fa-warning"></i> Please select all fields to filter</center></div>');
            $("#loadbtn").html('Load');
        }
        else if(institution == '0')
        {
            $("#loadtableresponse").html('<div class="alert alert-warning" role="alert"><center><i class="fa fa-warning"></i> Please select an Institution to filter</center></div>');
            $("#loadbtn").html('Load');
        }
        else if(institution == '1')
        {
            $("#loadtableresponse").html('<div class="alert alert-warning" role="alert"><center><i class="fa fa-warning"></i> No Institution Available</center></div>');
            $("#loadbtn").html('Load');
        }
        else
        {
            $("#loadtableresponse").html(' ');
            $("#reporttable").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
                    $.ajax({
                                type : 'post',
                                url : '../controller/scripts/owner/filterloadschoolproceed.php', //Here you will fetch records 
                                data : 'institution='+institution+'&session='+session+'&term='+term+'&UserID='+UserID, //Pass $id
                                success : function(data)
                                {
                                    
                                     $('#reporttable').html(data);//Show fetched data from database
                                     $("#loadbtn").html('Load');
                                }
                                 
                            });

        }



    });
    </script>
   
</body>

</html>
