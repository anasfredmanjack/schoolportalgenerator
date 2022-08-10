<?php  include ('../controller/session/session-checker.php'); ?>
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

            <H1 align="center" class="chimaLoginTxtColor" style="font-weight: bold; margin-top: 40px; line-height: 90%; font-size: 60px; margin-left: 5%; color:<?php echo $LoginTitleColor ; ?>;"> <?php echo $PrimaryName; ?><p></p><?php echo $SecondaryName; ?>.</H1>

            <p>
            <h2 class="chimaLoginTxtColor" style="margin-top: -10px; text-align: center; font-weight: bold; color:<?php echo $LoginTitleColor ; ?>"><?php echo $Motto; ?></h2>
            
            <h4 class="chimaLoginTxtColor" style="text-align: center; margin-top: 20px; font-weight: bold; color:<?php echo $LoginTitleColor ; ?>">
                Address:<br>  
                <?php echo $Address; ?><br>
                
                <?php echo $City; ?>, <?php echo $LGA; ?>, <?php echo $State; ?>, <?php echo $Country; ?><br>
                <p style="margin-bottom: 50px;"></p>
                <?php echo $Phone; ?><br>
               <?php echo $Email; ?><br>
               <?php echo $Website; ?>
            </h4>

        </div>
        <div  class="col-sm-4 col-md-4 col-lg-4 col-xs-4" style="height: 100vh;">
            <div class="login-box card">
                <div class="card-body">
                    <!-- <form class="form-horizontal form-material" id="loginform" action="index.html"> -->
                        <h1 class="box-title m-t-40 m-b-0 general-color chimaPrimarycolor" style="margin-top: 0px; font-weight: bold; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; color: <?php echo $PrimaryColor; ?>">Login</h1>
                        <small>Welcome to our login Page. This is a restricted area,<br>
                            Only Staff, Parent and Students can gain access,<br>
                            Kindly Login to gain access.   
                        </small>
                        
                        <div class="form-group m-t-40">
                        <span id="loginMsg"></span>
                            <div class="col-xs-12">
                                <input class="form-control" name="username" id="username" type="text" required="" placeholder="Username">
                                <input class="form-control" name="userID" id="userID" type="hidden" required="" value="<?php echo $userID ; ?>">
                                <input class="form-control" name="instID" id="instID" type="hidden" required="" value="<?php echo $InstitutionID ; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" name="password"  id="password" type="password" required="" placeholder="Password">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <div class="checkbox checkbox-primary pull-left p-t-0">
                                    <input id="checkbox-signup" type="checkbox">
                                    <label for="checkbox-signup"> Remember me </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                            
                                <button id="signInBtn" class="btn btn-info btn-block waves-effect waves-light" type="submit" style="background:<?php echo $PrimaryColor; ?>; border: <?php echo $PrimaryColor; ?>;"><label style="color:white;">Log In</label> </button>
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                                <div class="social"><a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fab fa-facebook-f"></i> </a> <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fab fa-google-plus"></i> </a> </div>
                            </div>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="col-sm-12 text-center">
                                <p style="color: black; margin-left: 10%;"><i class="fa fa-arrow-right"></i>Wish to Check Result? Click here</p> 
                                <p></p> 
                                <a href="index.php?<?php echo $username; ?>" class="text-primary m-l-5">
                                    <b class="chimaPrimarycolor" style="font-size: 30px; font-weight: bold; color: <?php echo $PrimaryColor; ?>">Check Result</b>
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
    $('#signInBtn').on('click', function(e){

        $('#loginMsg').html('');
        
        var username = $("#username").val();
        var password = $("#password").val();
        var userID = $("#userID").val();
        var instID = $("#instID").val();
        
        if(username != '' && password !=''){
                var $this = $(this);
                var loadingText = '<i class="fas fa-circle-notch fa-spin"></i>...Proccessing';
                
                if($(this).html() !== loadingText) {
                        $this.data('original-text', $(this).html());
                        $this.html(loadingText);
                        $this.attr("disabled","disabled");
                    }
                    $("#signInBtn").prop("disabled", true);
                    
                var dataString = 'username='+ username +  '&password='+password + '&userID='+userID + '&instID='+instID;
                
                $.ajax({
                    
                    type : 'post',
                    url : '../controller/login/proccessuserlogin.php', 
                    data :  dataString, //Pass $id
                    success : function(data)
                    {
                        //alert(data);
                            $("#signInBtn").prop("disabled", false);
                            $("#signInBtn").html("Verifying...<i class='fas fa-circle-notch fa-spin'></i>");
                            var userrole = (data);
                           
                                if(userrole == 'consultant'){
                                    $("#signInBtn").prop("disabled", false);
                                    $("#signInBtn").html("Redirecting...<i class='fas fa-circle-notch fa-spin'></i>");
                                    window.location.href = "../consultant/";
                                }
                                else if(userrole == 'superaffiliate'){
                                    $("#signInBtn").prop("disabled", false);
                                    $("#signInBtn").html("Redirecting...<i class='fas fa-circle-notch fa-spin'></i>");
                                    window.location.href = "../superaffiliate/";
                                }
                                 else if(userrole == 'ambassador'){
                                    $("#signInBtn").prop("disabled", false);
                                    $("#signInBtn").html("Redirecting...<i class='fas fa-circle-notch fa-spin'></i>");
                                    window.location.href = "../ambassador/";
                                }
                                else if(userrole == 'owner'){
                                    $("#signInBtn").prop("disabled", false);
                                    $("#signInBtn").html("Redirecting...<i class='fas fa-circle-notch fa-spin'></i>");
                                    window.location.href = "../owner/";
                                }
                                else if(userrole == 'institution'){
                                    $("#signInBtn").prop("disabled", false);
                                    $("#signInBtn").html("Redirecting...<i class='fas fa-circle-notch fa-spin'></i>");
                                    window.location.href = "../institution/";
                                }
                                else if(userrole == 'schoolhead'){
                                    $("#signInBtn").prop("disabled", false);
                                    $("#signInBtn").html("Redirecting...<i class='fas fa-circle-notch fa-spin'></i>");
                                    window.location.href = "../schoolhead/";
                                }
                                else if(userrole == 'teacher'){
                                    $("#signInBtn").prop("disabled", false);
                                    $("#signInBtn").html("Redirecting...<i class='fas fa-circle-notch fa-spin'></i>");
                                    window.location.href = "../teacher/";
                                }
                                else if(userrole == 'accountant'){
                                    $("#signInBtn").prop("disabled", false);
                                    $("#signInBtn").html("Redirecting...<i class='fas fa-circle-notch fa-spin'></i>");
                                    window.location.href = "../accountant/";
                                }
                                else if(userrole == 'student'){
                                    $("#signInBtn").prop("disabled", false);
                                    $("#signInBtn").html("Redirecting...<i class='fas fa-circle-notch fa-spin'></i>");
                                    window.location.href = "../student/";
                                }
                                else if(userrole == 'parent'){
                                    $("#signInBtn").prop("disabled", false);
                                    $("#signInBtn").html("Redirecting...<i class='fas fa-circle-notch fa-spin'></i>");
                                    window.location.href = "../parent/";
                                }
                                else if(userrole == 'transport'){
                                    $("#signInBtn").prop("disabled", false);
                                    $("#signInBtn").html("Redirecting...<i class='fas fa-circle-notch fa-spin'></i>");
                                    window.location.href = "../transport/";
                                }
                                else
                                {
                                    $('#loginMsg').html(data);
                                    $("#signInBtn").html("Sign In");
                                }
                                
                              
                    }
                });
        }
    
    });

</script>
</body>

</html>