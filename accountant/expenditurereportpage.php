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
    <title>Reports | <?php echo $PrimaryName.' '.$SecondaryName; ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="../library/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="../library/plugins/morrisjs/morris.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/style-accountant.php" rel="stylesheet">

    <!-- You can change the theme colors from here -->

    <!--Date Picker css---->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">


  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

  
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
}
.search {
  position: absolute;
  height: 50px;
  margin-left: 50px;
  margin-top: 50px;
}
.input-search {
  font-size: 20px;
  width: 100px;
  height: 50px;
  margin: 0;
  border: 10px;
  padding: 10px;
  transition: width 0.3s ease;
  border-radius: 30px;
  

}
.btn-search {
  position: absolute;
  margin-left: 0px;
  height: 50px;
  width: 100px;
  left: 0;
  border: 0;
  background-color:grey;
 
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
        <nav class="navbar navbar-expand-lg navbar-white bg-white">
                               
        <?php include ('../includes/menu-accountant.php'); ?>
            
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
            <div class="row page-titles no-print">
                <div class="col-md-10 align-self-center">
                    <h2 class="text-themecolor" style="color: black; font-weight: 500;">Expenditure Report</h2>
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
                                <select class="form-control chimaPrimaryBorderColor" id="expendituresession" style="background: white; border-width: 1px; border-style: solid; margin-top:10px;">
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

                                <select class="form-control chimaPrimaryBorderColor" id="expenditureterm" style="background: white; border-width: 1px; border-style: solid; margin-top:10px;">
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

                            <div class="col-sm-2">
                                <select class="form-control chimaPrimaryBorderColor" id="expenditureclass" style="background: white; border-width: 1px; border-style: solid; margin-top:10px;">
                                    <option  value="0">Select class</option>
                                    <?php  
                                        $class = ("SELECT * FROM `classordepartment` ORDER BY `ClassOrDepartmentID` ASC");
                                        $resultClass= mysqli_query($link, $class);
                                        $fetchClass = mysqli_fetch_assoc($resultClass);
                                        $rowClass= mysqli_num_rows($resultClass);
                                        
                                        do{
                                            echo '<option value="' . $fetchClass['ClassOrDepartmentID']. '"> ' . $fetchClass['ClassOrDepartmentName'] . '</option>';
                                    
                                        }while($fetchClass = mysqli_fetch_assoc($resultClass));
                                        ?>
                                </select>
                            </div>

                            <div class="col-sm-2">
                                <select class="form-control chimaPrimaryBorderColor" id="expenditurecategory" style="background: white; border-width: 1px; border-style: solid; margin-top:10px;">
                                    <option  value="0">Select Category</option>
                                    <?php  
                                        $cat1 = ("SELECT * FROM `category` WHERE InstitutionID = '$InstitutionID'  ORDER BY `categoryID` ASC");
                                        $catQuery1 = mysqli_query($link, $cat1);
                                        $fetchCat1 = mysqli_fetch_assoc($catQuery1);
                                        $rowCat1 = mysqli_num_rows($catQuery1);
                                        
                                        do{
                                            echo '<option value="' . $fetchCat1['categoryID'].'"> ' . $fetchCat1['categoryTitle'] . '</option>';
                                    
                                        }while($fetchCat1 = mysqli_fetch_assoc($catQuery1));
                                        ?>
                                </select>
                            </div>

                            <div class="col-sm-2">
                                <select class="form-control chimaPrimaryBorderColor" id="expendituresubCategory" style="background: white; border-width: 1px; border-style: solid; margin-top:10px;">
                                    <option  value="0">Select Sub-Category</option>
                                </select>
                            </div>
                            <div class="col-sm-2 align-self-center" style="margin-top:10px;">
                                <input id="expenditurestartdate" type="text" class="form-control" placeholder="Start Date">
                            </div>
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2"></div>
                            <div class="col-sm-2"></div>
  
                         <div class="col-sm-2"></div>
                            <div class="col-sm-2 align-self-center" style="margin-top:10px;">
                                <input id="expenditureenddate" type="text" class="form-control" placeholder="End Date">
                            </div>

                            <div class="col-sm-2 " style="margin-top:10px;">
                            
                                <button type="button" id="loadexpendituretable" style="width:100%;" class="btn waves-effect waves-light btn-sm btn-success">
                                        Load
                                        </button>   
                            </div>
                        </div>
                    </div>
                </div>

                <!---Modal to view Reports-->
                <div class="modal fade" id="loadviewcontentmodal" tabindex="-1" role="dialog" aria-labelledby="loadviewcontentmodalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg ">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i style="color:orangered;" class="fa fa-eye"></i>Expenditure Details</h5>
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
                                                    <h4 class="m-b-0 text-white"><i style="color:white;" class="fa fa-eye"></i>Expenditure Details</h4>
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

                                                        <div id="viewmodalbody" class="table-reponsive">

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

                  <!--Modal to print all Expenditures-->
                  <div class="modal fade" id="printallcontentmodal" tabindex="-1" role="dialog" aria-labelledby="printallcontentmodalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><i style="color:green;" class="fa fa-print"></i> All Expenditure Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                             
                            <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card card-outline-info">
                                                <div class="card-header">
                                                    <h4 class="m-b-0 text-white"><i style="color:white;" class="fa fa-print"></i> All Expenditure Details</h4>
                                                </div>
                                                
                                                <div class="card-body">
                                                    <div class="row">
                                                            <div class="col-sm-10"></div>
                                                                <div class="col-sm-2">
                                                                        <button type="button" id="finalprintallexpenditurebtn"  class="btn-sm btn-block btn-success text-right"><center><i class="fa fa-print"></i> Print</center></button>
                                                                </div>
                                                        </div>

                                                        <div id="printallcontentbody"></div>

                                                </div>

                                            </div>
                                        </div>
                            </div>
                          </div>
                        
                        </div>
                      </div>
                    </div>
                  <!--Modal to print all Expenditures-->
              
                        <div id="loadtableresponse"></div>

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
            $("#expenditurestartdate").datepicker({
                changeMonth: true,
			    changeYear: true,
                dateFormat: 'yy-mm-dd'
            });
            $("#expenditureenddate").datepicker({
    
                changeMonth: true,
			    changeYear: true,
                dateFormat: 'yy-mm-dd'
            });
        });
    </script>
    <script src="../js/jquery-ui.min.js"></script>
<script>
$("body").on("click","#finalprintallexpenditurebtn", function(){
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
             var expendituresession = $("#expendituresession").val();
        var expenditureterm = $("#expenditureterm").val();
        var expenditureclass = $("#expenditureclass").val();
        var expenditurecategory = $("#expenditurecategory").val();
        var expendituresubCategory = $("#expendituresubCategory").val();
        var expenditurestartdate = $("#expenditurestartdate").val();
        var expenditureenddate = $("#expenditureenddate").val();
        var institution = "<?php echo $InstitutionID; ?>";

                    $.ajax({
                                type : 'post',
                                url : '../controller/scripts/accountant/loadallexpenditurereport.php', //Here you will fetch records 
                                data : 'institution='+institution+'&expendituresession='+expendituresession+'&expenditureterm='+expenditureterm+'&expenditureclass='+expenditureclass+'&expenditurecategory='+expenditurecategory+'&expenditurestartdate='+expenditurestartdate+'&expenditureenddate='+expenditureenddate+'&expendituresubCategory='+expendituresubCategory, //Pass $id
                                success : function(data)
                                {
                                $('#printallcontentbody').html(data);//Show fetched data from database
                                 
                                $('#myTable').DataTable({
                                        dom: 'Bfrtip',
                                        buttons: [
                                            'pdf', 'print'
                                        ]
                                    });
                          
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



$(document).ready(function(){
        $("#reporttable").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
        var institution = "<?php echo $InstitutionID; ?>";

                    $.ajax({
                                type : 'post',
                                url : '../controller/scripts/accountant/loadexpenditurereporttable.php', //Here you will fetch records 
                                data : 'institution='+institution, //Pass $id
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

$("body").on("click","#loadviewcontent", function(){
    $("#viewmodalbody").html("<center><i class='fa fa-spinner fa-spin'></i></center>");

var viewdata = $(this).data("id");
var viewid = $("#viewid").val();
var institution = "<?php echo $InstitutionID; ?>";

$.ajax({
                            type : 'post',
                            url : '../controller/scripts/accountant/viewexpenditurecontent.php', //Here you will fetch records 
                            data : 'viewdata='+viewdata+'&institution='+institution, //Pass $id
                            success : function(data)
                            {
                                $('#viewmodalbody').html(data);//Show fetched data from database
                            }
                        }); 


});



    $("body").on("change","#expenditurecategory", function(){
        var incomecategory = $("#expenditurecategory").val();
        $("#expendituresubCategory").html("<option selected value='0'>Loading</option>");

                $.ajax({
                            type : 'post',
                            url : '../controller/scripts/accountant/loadincomesubcat.php', //Here you will fetch records 
                            data : 'incomecategory='+incomecategory, //Pass $id
                            success : function(data)
                            {
                                $('#expendituresubCategory').html(data);//Show fetched data from database
                            }
                        }); 


    });

    $("body").on("click","#loadexpendituretable", function(){
        $("#loadexpendituretable").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
        
      
        var expendituresession = $("#expendituresession").val();
        var expenditureterm = $("#expenditureterm").val();
        var expenditureclass = $("#expenditureclass").val();
        var expenditurecategory = $("#expenditurecategory").val();
        var expendituresubCategory = $("#expendituresubCategory").val();
        var expenditurestartdate = $("#expenditurestartdate").val();
        var expenditureenddate = $("#expenditureenddate").val();
        var institution = "<?php echo $InstitutionID; ?>";

        if(expendituresession == '0' && expenditureterm == '0' && expenditureclass == '0' && expenditurecategory == '0' && expendituresubCategory == '0' && expenditurestartdate == '' && expenditureenddate == '')
        {
            $("#loadtableresponse").html('<div class="alert alert-warning" role="alert"><center><i class="fa fa-warning"></i> Please select all fields to filter</center></div>');
            $("#loadexpendituretable").html('Load');
        }
        else
        {
            $("#loadtableresponse").html(' ');
            $("#reporttable").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
                    $.ajax({
                                type : 'post',
                                url : '../controller/scripts/accountant/filterloadexpenditurereporttable.php', //Here you will fetch records 
                                data : 'institution='+institution+'&expendituresession='+expendituresession+'&expenditureterm='+expenditureterm+'&expenditureclass='+expenditureclass+'&expenditurecategory='+expenditurecategory+'&expenditurestartdate='+expenditurestartdate+'&expenditureenddate='+expenditureenddate+'&expendituresubCategory='+expendituresubCategory, //Pass $id
                                success : function(data)
                                {
                                    
                                     $('#reporttable').html(data);//Show fetched data from database
                                     $("#loadexpendituretable").html('Load');
                                }
                                 
                            });

        }



    });


</script>
   
</body>

</html>
