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
    <title>Dashboad | <?php echo $fullname; ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="../library/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
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
</head>

<body class="fix-header card-no-border logo-center">
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper" class="error-page">
        <div class="error-box">
            <div class="error-body text-center">
                <h2 style="font-size: 50px; margin-top: 10vh;">Undergoing Testing</h2>
               
                <h3 class="text-muted m-t-30 m-b-30">This feature is part of the second batch been tested currently.<br> It would be live and active shortly.</h3>
                <h3 class="text-muted m-t-30 m-b-30">You will be notified as soon as it come to live.</h3>
                <a href="index.php" class="btn btn-info btn-rounded chimaPrimaryColor">Back to home</a> </div>



             <footer class="footer" id="non-printable">
                 <!-- footer -->
            <!-- ============================================================== -->
            <?php include ('../includes/footer.php'); ?>
            <!-- ============================================================== -->
            <!-- End footer -->
            </footer>
        </div>
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../library/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../library/plugins/bootstrap/js/popper.min.js"></script>
    <script src="../library/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!--Wave Effects -->
    <script src="../js/waves.js"></script>
</body>

</html>
