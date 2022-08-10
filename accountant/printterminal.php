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
    
        <style> 
        
        @import url("https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700");
@import url("https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700");
@import url(../scss/icons/font-awesome/css/font-awesome.min.css);
@import url(../scss/icons/simple-line-icons/css/simple-line-icons.css);
@import url(../scss/icons/weather-icons/css/weather-icons.min.css);
@import url(../scss/icons/linea-icons/linea.css);
@import url(../scss/icons/themify-icons/themify-icons.css);
@import url(../scss/icons/flag-icon-css/flag-icon.min.css);
@import url(../scss/icons/material-design-iconic-font/css/materialdesignicons.min.css);
@import url("https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700");
@import url(../css/spinners.css);
@import url(../css/animate.css);
        
       @page { margin: 0 }
            body{
                font-family: "Poppins", sans-serif;
            }
         
            p{
                font-size: 10px; 
                
            } 
            .centered {
                text-align: center;
                align-content: center;
                display: block;
                clear: both;
                width: 155px; 
                font-weight: bolder;
            }
            
            .ticket {
                width: 200px;
                max-width: 200px;
            }
            
            img {
                max-width: 90%;
                width: 90%;
            } 
            
            @media print {
                .non-printable,
                .hidden-print,
                .hidden-print * {
                    display: none !important;
                }
            }
        </style>
    </head>
    <body>
        <div class="ticket"> 
            
            <button id="btnPrint" class="hidden-print" onlick="window.print()" style="background-color: #00bfff; padding: 10px; border-radius: 10px; border: none; margin: 25px auto; display: block">Print</button>
            
            <div id="printterminalcontentbody">
                
            </div>
            
         

                 
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
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
     
    <script>

        $(document).ready(function(){
                 $("#printterminalcontentbody").html("<center><i class='fa fa-spinner fa-spin'></i></center>");
                 var instid = "<?php echo $_GET['data-inst']; ?>";
            var refnumb ="<?php echo $_GET['data-id']; ?>";
            
                $.ajax({
                type : 'post',
                url : '../controller/scripts/accountant/loadterminalprint.php', //Here you will fetch records 
                data : 'instid='+instid+'&refnumb='+refnumb, //Pass $id
                success : function(data){
                  var aa =  $("#printterminalcontentbody").html(data);
                   
                }
            }); 

       
        });

      

    

        
        const $btnPrint = document.querySelector("#btnPrint");
        $btnPrint.addEventListener("click", () => {
            window.print();
        });

    
        /* $("body").on("click","#finalprint", function(){
            
            window.print();
        }); */

 

    </script>
</body>

</html>
