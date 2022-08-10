<nav class="navbar top-navbar navbar-expand-md navbar-light chimaPrimaryColor">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="../img/logo/<?php echo $Logo; ?>" width="30" alt="Sunshine" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="../img/logo/<?php echo $Logo; ?>" width="30" alt="Sunshine" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span style="font-size: 25px; font-weight: 500; color: white;">
                        <?php echo $PrimaryName; ?> <?php echo $SecondaryName; ?>
                        </span> 
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="#chimaNavBar"><i class="mdi mdi-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                       
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" ><img src="../img/profile/<?php echo $userPicture; ?>" style="height: 30px; width: 30px;" alt="user" class="profile-pic"  /></a>
                            <div class="dropdown-menu dropdown-menu-right scale-up">
                                <ul class="dropdown-user">
                                    <li>
                                        <div class="dw-user-box">
                                            <div class="u-img"><img src="../img/profile/<?php echo $userPicture; ?>" alt="user"></div>
                                            <div class="u-text">
                                                <h4><?php echo $fullname; ?></h4>
                                                <p class="text-muted"><?php echo $Email; ?></p><a href="profile.php" class="btn btn-rounded btn-sm chimaPrimaryColor">View Profile</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="../controller/login/logout_student.php"><i class="fa fa-power-off"></i> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>