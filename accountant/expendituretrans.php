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
    <title>Income Transaction | <?php echo $PrimaryName.' '.$SecondaryName; ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="../library/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="../library/plugins/morrisjs/morris.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/style-accountant.php" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    
    <link href="../js/jquery-ui.min.css"  rel="stylesheet">
  
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
            
         </nav>
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
                    <h2 class="text-themecolor" style="color: black; font-weight: 500;">Expenditure Transaction</h2>
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
                    <div class="row" style="padding-top:10px;">
                        <div class="col-sm-10"></div>
                        <div class="col-sm-2">
                            <a href="posttransexp.php"><button type="button" class="btn-sm btn-block btn-success" style="border:none; background-color:<?php echo $PrimaryColor;?>; color:white;"><i class="fa fa-plus"></i> Post Expense</button></a>
                        </div>
                    </div>
                    <div class="row" style="margin-top:10px;">
                        <div class="col-12">
                            <div class="card table-responsive">
                                
                                <div class="card-body">
                                  
                                    <div class="row" style="padding-top:10px;">
                                        
                                        <div class="col-md-3 align-self-center" id="hideclass">
                                            
                                        </div>
                                        <div class="col-md-2 align-self-center">
                                            <select class=" form-control" id="othercategory">
                                                <option value="0" selected>Select Category</option>
                                                    <?php  
                                                        $sqlGetcategory = ("SELECT * FROM `category` WHERE `InstitutionID`='$InstitutionID' AND `categoryType`='others' AND `configType`='expenditure'");
                                                        $resultGetcategory = mysqli_query($link, $sqlGetcategory);
                                                        $rowGetcategory = mysqli_fetch_assoc($resultGetcategory);
                                                        $row_cntGetcategory = mysqli_num_rows($resultGetcategory);
                                                        
                                                        do{
                                                            echo '<option value="' . $rowGetcategory['categoryID']. '"> ' . $rowGetcategory['categoryTitle'] . '</option>';
                                                    
                                                        }while($rowGetcategory = mysqli_fetch_assoc($resultGetcategory));
                                                    ?>
                                            </select>
                                        </div>
                                        <div class="col-md-2 align-self-center">
                                            <select class=" form-control" id="othersubcategory">
                                                <option value="0">Select SubCateogry</option>
                                                    <?php  
                                                        $sqlGetsubcategory = ("SELECT * FROM category INNER JOIN subcategory ON category.categoryID = subcategory.categoryID WHERE category.configType='expenditure' AND category.categoryType='others' AND `InstitutionID`='$InstitutionID'");
                                                        $resultGetsubcategory = mysqli_query($link, $sqlGetsubcategory);
                                                        $rowGetsubcategory = mysqli_fetch_assoc($resultGetsubcategory);
                                                        $row_cntGetsubcategory = mysqli_num_rows($resultGetsubcategory);
                                                        
                                                        do{
                                                            echo '<option value="' . $rowGetsubcategory['subCategoryID']. '"> ' . $rowGetsubcategory['subCategoryTitle'] . '</option>';
                                                    
                                                        }while($rowGetsubcategory = mysqli_fetch_assoc($resultGetsubcategory));
                                                    ?>
                                            </select>
                                        </div>
                                        <div class="col-md-2 align-self-center">
                                            <select class=" form-control" id="othersession">
                                                <option value="0" selected>Select Session</option>
                                                    <?php  
                                                        $sqlGetsession = ("SELECT * FROM `session`");
                                                        $resultGetsession = mysqli_query($link, $sqlGetsession);
                                                        $rowGetsession = mysqli_fetch_assoc($resultGetsession);
                                                        $row_cntGetsession = mysqli_num_rows($resultGetsession);
                                                        
                                                        do{
                                                            echo '<option value="' . $rowGetsession['sessionName']. '"> ' . $rowGetsession['sessionName'] . '</option>';
                                                    
                                                        }while($rowGetsession = mysqli_fetch_assoc($resultGetsession));
                                                    ?>
                                            </select>
                                        </div>
                                        <div class="col-md-2 align-self-center">
                                            <select class=" form-control" id="otherterm">
                                                <option value="0" selected>Select Term</option>
                                                    <?php  
                                                        $sqlGettermorsemester = ("SELECT * FROM `termorsemester`");
                                                        $resultGettermorsemester = mysqli_query($link, $sqlGettermorsemester);
                                                        $rowGettermorsemester = mysqli_fetch_assoc($resultGettermorsemester);
                                                        $row_cntGettermorsemester = mysqli_num_rows($resultGettermorsemester);
                                                        
                                                        do{
                                                            echo '<option value="' . $rowGettermorsemester['TermOrSemesterName']. '"> ' . $rowGettermorsemester['TermOrSemesterName'] . '</option>';
                                                    
                                                        }while($rowGettermorsemester = mysqli_fetch_assoc($resultGettermorsemester));
                                                    ?>
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-1 align-self-center" id="hideclass">
                                            
                                        </div>
                                    </div>
                                    
                                    <div class="row" style="padding-top:10px;">
                                        
                                        <div class="col-md-7 align-self-center">
                                            
                                        </div>
                                        <div class="col-md-2 align-self-center">
                                            <input id="othersdate" type="text" class="form-control" placeholder="Start Date">
                                        </div>
                                        <div class="col-md-2 align-self-center">
                                            <input id="otheredate" type="text" class="form-control" placeholder="End Date">
                                        </div>
                                        <div class="col-md-1 align-self-center">
                                            <a href="#" id="loadothertable" type="button" class="btn chimaNormalBtn" style="width: 80px;">
                                                <span style="font-size: 13px;">Load</span>
                                            </a>    
                                        </div>
                                        <div class="">
                                            <button class="right-side-toggle waves-effect waves-light btn-inverse btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:10px;">
                                        <div class="col-12">
                                            <div class="card table-responsive">
                                                
                                                <div class="card-body" id="otherbody">
                                                   
                                                    <center><i class='fa fa-spinner fa-spin'></i></center>
                                                </div>
                                            </div>  
                                        </div>
                                    </div>
                                    <!--Modal to edit feeothers-->
                                    <div class="modal fade" id="deleteincomefeetransmodal" tabindex="-1" role="dialog" aria-labelledby="deleteincomefeetransmodalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><i class="fa fa-trash"></i> Delete Transaction(Expenditure)</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <div id="deleteincomefeetransmodalresponse"></div>
                                                <input type="hidden" id="editcatid">
                                                    <div class="col-12" style="margin-top: 20px;" id="deleteincomefeetransmodalbody">
                                                    
                                                    </div>
                                            </div>
                                            <div class="modal-footer" id="deleteincomefeetransmodalfooter">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" id="deleteincomefeetransmodalmainbtn"><i class="fa fa-trash"></i> Delete</button>
                                            
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <!--Modal to edit feeothers-->
                                    
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
     <!-- All Jquery UI -->
    <script src="../js/jquery-ui.min.js"></script>
    
    <script language="javascript">
        $(document).ready(function () {
            $("#othersdate").datepicker({
                changeMonth: true,
			    changeYear: true
            });
            $("#otheredate").datepicker({
                maxDate: 0,
                changeMonth: true,
			    changeYear: true,
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            var institution = "<?php echo $InstitutionID ; ?>"

            var dataString = 'institution=' + institution;
            $.ajax({
                type : 'post',
                url: "../controller/scripts/accountant/getexpothertableall.php",
                data :  dataString,
                success : function(result)
                {
                    $("#otherbody").html(result);

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
                                        $(rows).eq(i).before();
                                        last = group;
                                    }
                                    
                                });
                            }
                        });
                        // Order by the grouping
                        $('#example tbody').on('click', function() {
                            var currentOrder = table.order()[0];
                            if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                                table.order([2, 'desc']).draw();
                            } else {
                                table.order([2, 'asc']).draw();
                            }
                        });
                    });
                    $('#otherexample23').DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                            'pdf', 'print'
                        ]
                    });
                }
            });
           
        });
        $("body").on('change','#othercategory',function(){
                        
            $('#othersubcategory').html('');
            $('#othersubcategory').append($('<option>').val(0).text('Loading...'));
            
            var institution = "<?php echo $InstitutionID ; ?>"
            var category = $("#othercategory").val();
            
            var dataString = 'institution=' + institution + '&category=' + category;

            $.ajax({
                type : 'post',
                url: "../controller/scripts/accountant/sunnygetsubcategory.php",
                data :  dataString,
                success : function(result)
                {
                    var obj1 = JSON.parse(result);
                    console.log(obj1);
                    
                    var z;
                    var subcategoryname = "";
                    var subcategoryID = "";
                    
                    $('#othersubcategory').html('');
                    $('#othersubcategory').append($('<option>').val(0).text('Select Sub-Category'));
            
                    for (z = 0; z < obj1.length; z++) 
                    {
                        subcategoryname = obj1[z].subCategoryTitle;
                        subcategoryID = obj1[z].subCategoryID;
                        $('#othersubcategory').append($('<option>').val(subcategoryID).text(subcategoryname));

                    }
                }
            });

        });
        
        $("#loadothertable").click(function(){
                
            $("#loadothertable").html('<i class="fa fa-spinner fa-spin"></i>');
            $("#otherbody").html('<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');
            
            var institution = "<?php echo $InstitutionID; ?>";
            var category = $("#othercategory").val();
            var subcategory = $("#othersubcategory").val();
            var session = $("#othersession").val();
            var term = $("#otherterm").val();
            var sdate = $("#othersdate").val();
            var edate = $("#otheredate").val();
            var userid = "<?php echo $UserID; ?>";
            var usertype = "<?php echo $userType; ?>";
            
            var dataString = 'institution='+ institution + '&userid='+ userid + '&usertype='+ usertype + '&sdate='+ sdate + '&edate='+ edate + '&category='+ category + '&subcategory='+ subcategory + '&session='+ session + '&term='+ term;
            
            // alert(dataString);
            if(institution == '0' || institution == '')
            {
                $("#loadothertable").html('Load');
                $("#otherbody").html('<center><div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>You do not  belong to any institution</center></div></center>');
            }
            else
            {
                // alert(dataString);
                    
                $.ajax({
                    type : 'post',
                    url: "../controller/scripts/accountant/getexpothertable.php",
                    data :  dataString,
                    success : function(result)
                    {
                        $("#loadothertable").html('Load');
                        $("#otherbody").html(result);
                        
                    }
                });
            
            }
            
        });
            
        $("body").on("click", "#deleteincomefeetransmodalbtn", function(){

            $("#deleteincomefeetransmodalbody").html('<span style=" color:red;">Are you sure you want to delete  this transaction?<br>Note that this process can not be undone</span>');

            var PaymentRefNo = $(this).data('id');
            var catid = $(this).data('catid');
            var subcatid = $(this).data('subcatid');
            var depositorOrReciepientName = $(this).data('depositorOrReciepientName');
            var userid = "<?php echo $UserID; ?>";
            var usertype = "<?php echo $userType; ?>";
            var institution = "<?php echo $InstitutionID; ?>";

            var dataString = 'institution='+ institution + '&subcatid='+ subcatid + '&catid='+ catid + '&depositorOrReciepientName='+ depositorOrReciepientName + '&PaymentRefNo='+ PaymentRefNo + '&userid='+ userid + '&usertype='+ usertype;
                
            // alert(dataString);
            $("body").on("click", "#deleteincomefeetransmodalmainbtn", function(){
                
                // alert(dataString);
                $.ajax({
                    type : 'post',
                    url : '../controller/scripts/accountant/proceeddelexpbody.php', //Here you will fetch records 
                    data : dataString, //Pass $id
                    success : function(data){
                        $('#deleteincomefeetransmodalresponse').html(data);//Show fetched data from database;//Show fetched data from database
                        $("#deleteincomefeetransmodalmainbtn").html('<i class="fa fa-trash"></i> Delete');

                        $("#deleteincomefeetransmodalbody").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
                        location.reload();
                    }
                });   
            });  
        }); 
        
    </script>
</body>

</html>
