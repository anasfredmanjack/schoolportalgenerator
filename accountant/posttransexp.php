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
    <title>Post Income Transaction | <?php echo $PrimaryName.' '.$SecondaryName; ?></title>
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
                    <h2 class="text-themecolor" style="color: black; font-weight: 500;">Post Expenditure Transaction</h2>
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
                        <div class="col-sm-11"></div>
                        <div class="col-sm-1">
                            <a href="expendituretrans.php" style="text-decoration:underline;"><i class="fa fa-backward"></i> Back</a>
                        </div>
                    </div>
                    <div class="row" style="margin-top:10px;">
                        <div class="col-12">
                            <div class="card table-responsive">
                                
                                <div class="card-body">
                                  
                                    <div class="row" style="padding-top:10px;">
                                        
                                        <div class="col-md-5">
                                            
                                        </div>
                                        <div class="col-md-2">
                                            <form>
                                                <div class="form-group">
                                                    <select class="form-control" id="othercategory" style="background: white; border-width: 1px; border-style: solid;">
                                                        <option value="0" selected>Select Category</option>
                                                        <?php  
                                                            $sqlGetcategory = ("SELECT * FROM `category` WHERE `InstitutionID`='$InstitutionID' AND `categoryType`='others' AND `configType`='expenditure'");
                                                            $resultGetcategory = mysqli_query($link, $sqlGetcategory);
                                                            $rowGetcategory = mysqli_fetch_assoc($resultGetcategory);
                                                            $row_cntGetcategory = mysqli_num_rows($resultGetcategory);

                                                            if($row_cntGetcategory > 0)
                                                            {
                                                                do{
                                                                    echo '<option value="' . $rowGetcategory['categoryID']. '"> ' . $rowGetcategory['categoryTitle'] . '</option>';
                                                            
                                                                }while($rowGetcategory = mysqli_fetch_assoc($resultGetcategory));
                                                            }
                                                            else
                                                            {

                                                            }
                                                            
                                                        ?>
                                                    </select>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-md-2">
                                            <form>
                                                <div class="form-group">
                                                    <select class="form-control" id="othersession" style="background: white; border-width: 1px; border-style: solid;">
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
                                            </form>
                                        </div>
                                        <div class="col-md-2">
                                            <form>
                                                <div class="form-group">
                                                    <select class="form-control" id="otherterm" style="background: white; border-width: 1px; border-style: solid;">
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
                                            </form>
                                        </div>
                                        <div class="col-md-1">
                                            <button id="loadothertransdetails" type="button" class="btn chimaNormalBtn" style="width: 80px;">
                                                <span style="font-size: 13px;">Load</span>
                                            </button>                
                                        </div>
                                    </div>
                                    <div class="row" style="margin-top:10px;">
                                        <div class="col-12">
                                            <div class="card table-responsive">
                                                
                                                <div class="card-body" id="otherbody">
                                                    <div class="alert alert-primary" role="alert">
                                                        <center>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                                            </svg>
                                                            Please Filter Before Clicking Load
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>  
                                        </div>
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
       
        $('#loadothertransdetails').click(function(){
                
                $("#loadothertransdetails").html('<i class="fa fa-spinner fa-spin"></i>');
                $("#otherbody").html('<div class="d-flex justify-content-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');
                
                var institution = "<?php echo $InstitutionID; ?>";
                var othersession = $("#othersession").val();
                var othercategory = $("#othercategory").val();
                var otherterm = $("#otherterm").val();
                
                var dataString = 'institution=' + institution + '&othersession=' + othersession + '&othercategory=' + othercategory + '&otherterm=' + otherterm;
                
                if(othersession == '0' || othercategory == '0' || otherterm == '0' || othersession == '' || othercategory == '' || otherterm == '')
                {
                    $("#loadothertransdetails").html('Load');
                    $("#otherbody").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Please Filter Before Proceeding</center></div>');
                
                }
                else
                {
                    $.ajax({
                        type: "POST",
                        url: "../controller/scripts/accountant/get-expsubcatlist.php",
                        data: dataString,
                        cache: false,
                        
                        success: function(result){
                            $("#loadothertransdetails").html('Load');
                            $('#otherbody').html(result);
                           
                        }
                    });
                }
                
            });
            
        $('body').on("change",".sunnycheckboxother",function(){
            

            var multipleSelSubcatId = $(this).val();
            var Subcatname = $(this).data('subcatname');
            var sunnydefamount = $(this).data('amount');
            var SubcatId = [];
            var secamount = [];

            $.each($("input[name='othermultipleSelSubcatId']:checked"), function(){
                SubcatId.push($(this).val());
                secamount.push($(this).data('amount'));
            });
            
            var checkall = $(this).prop("checked");

            var dataString = '&multipleSelSubcatId=' + multipleSelSubcatId + '&Subcatname=' + Subcatname + '&sunnydefamount=' + sunnydefamount;
            var dataStringchecked = 'SubcatId=' + SubcatId + '&secamount=' + secamount;
            // alert(multipleSelSubcatId);
            if(checkall == false)
            {
                var totalamount = $("#othertotalamount").val();
                var addedamount = $('#othertotal'+multipleSelSubcatId).val();

                if((totalamount == 0 || totalamount == '' || totalamount == undefined) && SubcatId.length === 0)
                {
                    // alert(totalamount);
                    $('#otherrow'+multipleSelSubcatId).remove();
                    $('#othertotalll').hide();
                    $("#othermsg").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Nothing has been selected</center></div>');
                    $('#postotherpaymentbtn').html('Post Payment');
                }
                else
                {
                    // alert(addedamount);
                    $('#otherrow'+multipleSelSubcatId).remove();
                    $("#othermsg").html('');

                    var sum = (+totalamount) - (+addedamount);
                    var commasum = sum.toLocaleString();
                    $('#othertotalll').show();
                    $('#othertotalamount').val(sum);
                    $('#postotherpaymentbtn').html('Post Payment (&#8358; '+commasum+')');

                }
                
            }
            else
            {
                
                $.ajax({
                    type: "POST",
                    url: "../controller/scripts/accountant/display-expothersummary.php",
                    data: dataString,
                    cache: false,
                    
                    success: function(result){
                        $('#othersummary').append(result);
                        $("#othermsg").html('');
                     
                    }
                });

                var othertotalamount = $("#othertotalamount").val();
                    // alert(othertotalamount);
                if(othertotalamount == 0 || othertotalamount == '' || othertotalamount == undefined)
                {
                    // alert(dataStringchecked);
                    $.ajax({
                        type: "POST",
                        url: "../controller/scripts/accountant/display-getexpothertotal.php",
                        data: dataStringchecked,
                        cache: false,
                        
                        success: function(result){
                            $('#othertotalll').show();
                            $('#othertotalll').html(result);
                            
                            var commasum = sunnydefamount.toLocaleString();
                            
                            $('#postotherpaymentbtn').html('Post Payment (&#8358; '+commasum+')');
                        }
                    });
                }
                else{
                    $.ajax({
                        type: "POST",
                        url: "../controller/scripts/accountant/display-getexpothertotal.php",
                        data: dataStringchecked,
                        cache: false,
                        
                        success: function(result){
                            $('#othertotalll').show();
                            $('#othertotalll').html(result);

                            var sum = (+totalamount) + (+amount);
                            var commasum = sum.toLocaleString();
                            
                            $('#postotherpaymentbtn').html('Post Payment (&#8358; '+commasum+')');
                        }
                    });
                    var sum = (+totalamount) + (+amount);
                    var commasum = sum.toLocaleString();
                    $('#othertotalll').show();
                    $('#othertotalamount').val(sum)
                    $('#postotherpaymentbtn').html('Post Payment (&#8358; '+commasum+')');
                
                }
            }
                
        });

        $("body").on("keyup",".otherquantity", function(){

            $("#othertotalll").html('<i class="fa fa-spinner fa-spin"></i>');
            $('#postotherpaymentbtn').hide();
            var otherquantitycheck = $(this).val();

            // alert(otherquantitycheck);
            if(otherquantitycheck == 0 || otherquantitycheck == '' || otherquantitycheck == ' ' || otherquantitycheck == undefined)
            {
                $('#othertotalll').html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Please no amount should be 0 or empty</center></div>');
                $('#postotherpaymentbtn').hide();
            }
            else{

                // alert('sunny');
                var otherquantity = [];
                var catid = [];
                $.each($(".otherquantity"), function(){
                    otherquantity.push($(this).val());
                    catid.push($(this).data('catid'));
                });

                var dataString = '&otherquantity='+ otherquantity + '&catid=' + catid;
                $.ajax({
                    type: "POST",
                    url: "../controller/scripts/accountant/display-expothertotal.php",
                    data: dataString,
                    cache: false,
                    
                    success: function(result){
                        $('#othertotalll').html(result);
                        $('#postotherpaymentbtn').show();

                        var totalamount = $("#othertotalamount").val();
                        var sum = parseInt(totalamount);
                        var commasum = sum.toLocaleString();
                        // alert(totalamount);
                        $('#postotherpaymentbtn').html('Post Payment (&#8358; '+commasum+')');
                        
                    }
                });
                    
            }

        });
        $("body").on("change",".otherquantity", function(){

            $("#othertotalll").html('<i class="fa fa-spinner fa-spin"></i>');
            $('#postotherpaymentbtn').hide();
            var otherquantitycheck = $(this).val();

            // alert(otherquantitycheck);
            if(otherquantitycheck == 0 || otherquantitycheck == '' || otherquantitycheck == ' ' || otherquantitycheck == undefined)
            {
                $('#othertotalll').html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Please no amount should be 0 or empty</center></div>');
                $('#postotherpaymentbtn').hide();
            }
            else{

                // alert('sunny');
                var otherquantity = [];
                var catid = [];
                $.each($(".otherquantity"), function(){
                    otherquantity.push($(this).val());
                    catid.push($(this).data('catid'));
                });

                var dataString = '&otherquantity='+ otherquantity + '&catid=' + catid;
                $.ajax({
                    type: "POST",
                    url: "../controller/scripts/accountant/display-expothertotal.php",
                    data: dataString,
                    cache: false,
                    
                    success: function(result){
                        $('#othertotalll').html(result);
                        $('#postotherpaymentbtn').show();

                        var totalamount = $("#othertotalamount").val();
                        var sum = parseInt(totalamount);
                        var commasum = sum.toLocaleString();
                        // alert(commasum);
                        $('#postotherpaymentbtn').html('Post Payment (&#8358; '+commasum+')');
                        
                    }
                });
                    
            }

        });  

        $('body').on('click','.btn_removeother', function(){
            
            var button_id = $(this).data("catid");
            
            
            var button_quan = $('#othertotal'+button_id).val();

            $(this).parents('#otherrow'+button_id).remove();

            $('input:checkbox[value="' + button_id + '"]').prop('checked', false);

            // alert(button_quan);
            var totalamount = $("#othertotalamount").val();
            alert('total='+totalamount);
            
            var sum = (+totalamount) - (+button_quan);
            var commasum = sum.toLocaleString();
            $('#othertotalamount').val(sum);
            $('#postotherpaymentbtn').html('Post Payment (&#8358; '+commasum+')');
            
            var totalamountch = $("#othertotalamount").val();

            var SubcatId = [];
            var secamount = [];

            $.each($("input[name='othermultipleSelSubcatId']:checked"), function(){
                SubcatId.push($(this).val());
                secamount.push($(this).data('amount'));
            });
            
            if((totalamountch == 0 || totalamountch == '' || totalamountch == undefined) && SubcatId.length===0)
            {
                $('#othertotalll').hide();
                $("#othermsg").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Nothing has been selected</center></div>');
                $('#postotherpaymentbtn').html('Post Payment');
            }
        });
 
        $("body").on("click","#postotherpaymentbtn",function(){
                                        
            $("#postotherpaymentbtn").html('<i class="fa fa-spinner fa-spin"></i> Post Payment');
            
            var subcatid = [];
           
            var amount = [];
            $.each($(".norms"), function(){
                var checker = $(this).val();
                 
                if(checker == '0' || checker == '')
                {
                  
                }
                else
                {
                    amount.push(checker);
                    subcatid.push($(this).data('catid'));
                }
                
            });

            var amountlength =amount.length;

            var SubcatId = [];

            $.each($("input[name='othermultipleSelSubcatId']:checked"), function(){
                SubcatId.push($(this).val());
            });

            var SubcatIdlength = SubcatId.length;
              
            // alert(amount);
            
            console.log(amount);
            
            console.log(subcatid);
            
            var institution = "<?php echo $InstitutionID; ?>";
            var userid = "<?php echo $UserID; ?>";
            var usertype = "<?php echo $userType; ?>";
            var depositorrecipientname = $("#depositorrecipientname").val();
            var session = $("#othersession").val();
            var mop = $("#mop").val();
            var category = $("#othercategory").val();
            var termid = $("#otherterm").val();
            var student = $("#student").val();
            
            var formData = new FormData();
            var popayment = $('#popayment')[0].files[0];
            formData.append('popayment', popayment);
            formData.append('institution', institution);
            formData.append('userid', userid);
            formData.append('usertype', usertype);
            formData.append('depositorrecipientname', depositorrecipientname);
            formData.append('session', session);
            formData.append('mop', mop);
            formData.append('subcatid', subcatid);
            formData.append('amount', amount);
            formData.append('termid', termid);
            formData.append('category', category);
            
            if(depositorrecipientname == '' || depositorrecipientname == 0 || mop == '' || mop == 0)
            {
                $("#postotherpaymentbtn").html('Post Payment');
                $("#othermsg").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Please Select Mode of Payment and input Depositors name before proceeding</center></div>');
            }
            else if(amountlength != SubcatIdlength)
            {
                $("#postotherpaymentbtn").html('Post Payment');
                $("#othermsg").html('<div class="alert alert-primary" role="alert"><center><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16"><path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/></svg>Please Input Amount</center></div>');
            }
            else
            {
                
                $.ajax({
                    type: "POST",
                    url: "../controller/scripts/accountant/Insert-expotherpaymenttrans.php",
                    method:'POST',
                    data: formData,
                    cache:false,
                    contentType: false,
                    processData: false,
                    
                    success: function(result){
                        
                        var institution = "<?php echo $InstitutionID; ?>";
                        var othersession = $("#othersession").val();
                        var othercategory = $("#othercategory").val();
                        var otherterm = $("#otherterm").val();
                        
                        var dataString = 'institution=' + institution + '&othersession=' + othersession + '&othercategory=' + othercategory + '&otherterm=' + otherterm;
                        
                        $.ajax({
                            type: "POST",
                            url: "../controller/scripts/accountant/get-expsubcatlist.php",
                            data: dataString,
                            cache: false,
                            
                            success: function(data){
                                $("#loadothertransdetails").html('Load');
                                $('#otherbody').html(data);
                                $("#othermsg").html(result);
                                
                            }
                        });
                    }
                });

            }
            
        });
    </script>
</body>

</html>
