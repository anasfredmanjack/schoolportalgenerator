<?php
ob_start();
session_start();
if(!isset($_SESSION['checkResultMsg']) && empty($_SESSION['checkResultMsg'])) {
$checkResultMsg ='';
}
else{
    $checkResultMsg = $_SESSION['checkResultMsg'];
}
include ('../controller/config/config.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="../img/favicon/<?php echo $Favicon; ?>">
    <title><?php echo $PrimaryName.' '.$SecondaryName; ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="../library/bootstrap/bootstrap.min.css" rel="stylesheet">
   
    <!-- Custom CSS -->
    <link href="../css/style1.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="../css/blue.css" id="theme" rel="stylesheet">
    <!-- Preloader - style -->
    
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../library/fontawesome/css/all.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper" class="login-register login-sidebar" style="background-image:url(../img/bg/<?php echo $LoginBgImage; ?>);">
    <div class="row">
        <div class="col-sm-8 col-md-8 col-lg-8 col-xs-8 d-lg-block d-none">
             <div align="center" style="margin-top: 100px;">
                <img width="100" src="../img/logo/<?php echo $Logo; ?>">
            </div>

             <H1 align="center" class="chimaLoginTxtColor" style="font-weight: bold; margin-top: 40px; font-size: 60px; line-height: 90%; margin-left: 5%; color:<?php echo $LoginTitleColor ; ?>;"><?php echo $PrimaryName; ?><p></p><?php echo $SecondaryName; ?>.</H1>

            <p>
            <h2 class="chimaLoginTxtColor" style="margin-top: -10px; text-align: center; font-weight: bold; color:<?php echo $LoginTitleColor ; ?>;"><?php echo $Motto; ?></h2>
            
            <h4 class="chimaLoginTxtColor" style="text-align: center; margin-top: 20px; font-weight: bold; color:<?php echo $LoginTitleColor ; ?>;">
                Address:<br>  
                <?php echo $Address; ?><br>
                
                <?php echo $City; ?>, <?php echo $LGA; ?>, <?php echo $State; ?>, <?php echo $Country; ?><br>
                <p style="margin-bottom: 50px;"></p>
                <?php echo $Phone; ?><br>
               <?php echo $Email; ?><br>
               <?php echo $Website; ?>
            </h4>

        </div>
        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-4">
            <div class="login-box card" style="height: 100vh;">
                <div class="card-body">
                    <form method="POST" class="form-horizontal form-material" id="loginform" action="../student/studResult.php?<?php echo $username; ?>">
                        <h1 class="box-title m-t-40 m-b-0 general-color chimaPrimarycolor" style="font-weight: bold; margin-top: 20px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color:<?php echo $PrimaryColor; ?>;">Check Result</h1><small>Enter your details to access your result</small>
                        <div id="output">
                            <?php echo $checkResultMsg; ?>
                        </div>
                        <div class="form-group m-t-40">
                            <div class="col-xs-12">
                                <input name="regno" class="form-control" type="text" placeholder="Reg No.">
                                <input name="institution" class="form-control" type="hidden" value="<?php echo $userID; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input name="pword" class="form-control" type="password" placeholder="Pin">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="pull-left">
                                    <?php 
                                    $sqlGetSession = ("SELECT * FROM `session`");
                                    $resultGetSession = mysqli_query($link, $sqlGetSession);
                                    $rowGetSession = mysqli_fetch_assoc($resultGetSession); 
                                    $row_cntGetSession = mysqli_num_rows($resultGetSession);	
                
                                    ?>
                                    <select class="form-control" name="sunnyresultsession" style="width: 160px;">
                                        <option value="0" selected>Session</option>

                                        <?php 
                                            if($row_cntGetSession > 0)
                                            {
                                        
                                                do{

                                        ?>
                                                <option value="<?php echo $rowGetSession['sessionName'] ; ?>"><?php echo $rowGetSession['sessionName'] ; ?></option>
                                            
                                        <?php
                                                }while($rowGetSession = mysqli_fetch_assoc($resultGetSession));
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div  class="pull-right">
                                <?php 
                                    $sqlGetTerm = ("SELECT * FROM `termorsemester`");
                                    $resultGetTerm = mysqli_query($link, $sqlGetTerm);
                                    $rowGetTerm = mysqli_fetch_assoc($resultGetTerm); 
                                    $row_cntGetTerm = mysqli_num_rows($resultGetTerm);
                
                                    ?>
                                    <select class="form-control" name="sunnyterm" style="width: 160px;">
                                        <option value="0" selected>Term/Semester</option>

                                        <?php 
                                            if($row_cntGetTerm > 0)
                                            {
                                        
                                                do{

                                        ?>
                                                <option value="<?php echo $rowGetTerm['TermOrSemesterName'] ; ?>"><?php echo $rowGetTerm['TermOrSemesterName'] ; ?></option>
                                            
                                        <?php
                                                }while($rowGetTerm = mysqli_fetch_assoc($resultGetTerm));
                                            }
                                        ?>
                                    </select>
                                </div> 
                            </div>
                        </div>

                        <div class="form-group text-center m-t-20">
                            
                               <input type="submit" name="checkResultBtn" style="padding:10px; width:100%; background-color:black; color:white; border-radius:50px; border-color: black;" value="Check Result">
                            
                        </div>
                       



                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                                <div class="social"><a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fab fa-facebook-f"></i> </a> <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fab fa-google-plus"></i> </a> </div>
                            </div>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="col-sm-12 text-center">
                                <p style="color: black; margin-left: 10%;"><i class="fa fa-arrow-right"></i>Wish to Login? click here</p> 
                                <p></p> 
                                <a href="login.php?<?php echo $username; ?>" class="text-primary m-l-5">
                                    <b class="chimaPrimarycolor" style="font-size: 30px; font-weight: bold;color:<?php echo $PrimaryColor; ?>;">Log In</b>
                                </a>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</section>
    

    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../js/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../library/bootstrap/popper.min.js"></script>
    <script src="../library/bootstra/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="../js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../js/sticky-kit.min.js"></script>
    <script src="../js/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="../js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- Style switcher -->
    <!-- ============================================================== -->
    <script src="../js/jQuery.style.switcher.js"></script>


    <script>

        $(document).ready(function(){
            
            alert('working');
            //$('#checkresultbtn').click(function(){

                var regno = $('#regno').val();
                var pword = $('#pword').val();
                var sunnyterm = $('#sunnyterm').val();
                var sunnyresultsession = $('#sunnyresultsession').val();
                
                var institution = "<?php echo $InstitutionID; ?>";

                var dataString = 'regno='+ regno + '&institution='+ institution + '&pword='+ pword + '&sunnyterm='+ sunnyterm + '&sunnyresultsession='+ sunnyresultsession;

                //alert(dataString);

                if(regno == 0 || regno == ""){

                    $('#output').html('<div class="alert alert-warning alert-dismissible mb-2" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Please Type in Your Registration Number</div>');
                }

                else{
                    if(pword == 0 || pword == ""){

                        $('#output').html('<div class="alert alert-warning alert-dismissible mb-2" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Please Type in Your Pin</div>');


                    }
                    else{
                        if(sunnyresultsession == 0 || sunnyresultsession == ""){

                            $('#output').html('<div class="alert alert-warning alert-dismissible mb-2" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Please Select Session</div>');


                        }
                        else{
                            if(sunnyterm == 0 || sunnyterm == ""){

                                $('#output').html('<div class="alert alert-warning alert-dismissible mb-2" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Please Select Term</div>');


                            }
                            else{
                                $.ajax({
                                    type : 'post',
                                    url: "../controller/scripts/institution/checkresultindex.php",
                                    data :  dataString,
                                    success : function(result)
                                    {
                                        $('#output').html(result);

                                    }
                                });
                            }
                        }
                    }
                }

                
            });

        });

    </script>
</body>

</html>