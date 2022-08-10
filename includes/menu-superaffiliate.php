<!-- Sidebar scroll-->
<div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile">
                    <!-- User profile image -->
                    <div class="profile-img"> <img src="../img/profile/<?php echo $userPicture; ?>" alt="user" />
                        <!-- this is blinking heartbit-->
                        <?php echo $userType; ?>
                        
                    </div>
                    <!-- User profile text-->
                    <div class="profile-text">
                        <h5 style="color: black;"<?php echo $fullname; ?></h5>
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav" style="overflow-x: hidden;" id="sideBarColor">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        
                        <li> 
                            <a href="index.php" aria-expanded="false">
                                <i class="mdi mdi-gauge" id="generalColor1"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        
                        <li> 
                            <a href="owners.php"  aria-expanded="false">
                                <i class="fa fa-group"></i>
                                <span class="hide-menu">School Owners</span>
                            </a>                       
                        </li>

                        <li> 
                            <a href="institutionSchoolPage.php" aria-expanded="false">
                                <i class="fa fa-institution"></i>
                                <span class="hide-menu">Institutions/Schools</span>
                            </a>                       
                        </li>
                        <li> 
                            <a href="superaffiliatePage" aria-expanded="false">
                                <i class="fa fa-marketing"></i>
                                <span class="hide-menu">Super Affiliates</span>
                            </a>                       
                        </li>
                        <li> 
                            <a href="Ambassador.php" aria-expanded="false">
                                <i class="fa fa-institution"></i>
                                <span class="hide-menu">Brand Ambassadors</span>
                            </a>                       
                        </li>

                        <li> 
                            <a class="has-arrow waves-effect waves-dark" href="javascript:;" aria-expanded="false">
                                <i class="fa fa-share-alt"></i>
                                <span class="hide-menu">Pin Management</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a class="generate" href="generatePin.php" >
                                        <i style="color: <?php echo $PrimaryColor; ?>;" class="fa fa-share-alt"></i>
                                        <span style="margin-left: 5px;">Generate Pin</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="generate" href="orderHistory.php">
                                        <i style="color: <?php echo $PrimaryColor; ?>;" class="fa fa-history"></i>
                                        <span style="margin-left: 5px;">Order History</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="generate" href="manageAllPins.php">
                                        <i style="color: <?php echo $PrimaryColor; ?>;" class="fa fa-share-alt"></i>
                                        <span style="margin-left: 5px;">Manage All Pins</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        <li> 
                            <a class="has-arrow waves-effect waves-dark" href="javascript:;" aria-expanded="false">
                                <i class="fa fa-gears"></i>
                                <span class="hide-menu">Settings</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a id="pe1" class="generate" href="profile.php" >
                                        <i style="color: <?php echo $PrimaryColor; ?>;" class="fa fa-user-circle-o"></i>
                                        <span style="margin-left: 5px;">Account</span>
                                    </a>
                                </li>
                                <li>
                                    <a id="pe1" class="generate" href="consultantCustomization.php">
                                        <i style="color: <?php echo $PrimaryColor; ?>;" class="fa fa-gear"></i>
                                        <span style="margin-left: 5px;">Customization</span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!--<li> -->
                        <!--    <a class="has-arrow waves-effect waves-dark" id="generalColor" href="#" aria-expanded="false">-->
                        <!--        <i class="fa fa-info-circle" id="generalColor"></i>-->
                        <!--        <span class="hide-menu">Help</span>-->
                        <!--    </a>-->
                        <!--    <ul aria-expanded="false" class="collapse">-->
                        <!--        <li>-->
                        <!--            <a href="#" id="generalColor">-->
                        <!--                <i class="fa fa-pencil" id="generalColor"></i>-->
                        <!--                <span style="margin-left: 5px;">Blog</span>-->
                        <!--            </a>-->
                        <!--        </li>-->
                        <!--        <li>-->
                        <!--            <a href="raiseSupport.html" id="generalColor">-->
                        <!--                <i class="fa fa-database" id="generalColor"></i>-->
                        <!--                <span style="margin-left: 5px;">Raise Support</span>-->
                        <!--            </a>-->
                        <!--        </li>-->
                        <!--        <li>-->
                        <!--            <a class="has-arrow waves-effect waves-dark" id="generalColor" href="#" aria-expanded="false">-->
                        <!--                <i class="fa fa-folder" id="generalColor"></i>-->
                        <!--                <span style="margin-left: 5px;">Documentation</span>-->
                        <!--            </a>-->
                        <!--            <ul aria-expanded="false" class="collapse">-->
                        <!--                <li>-->
                        <!--                    <a href="consultantDocumentation.html" id="generalColor">-->
                        <!--                        <i class="fa fa-folder" id="generalColor"></i>-->
                        <!--                        <span style="margin-left: 5px;">Consultant</span>-->
                        <!--                    </a>-->
                        <!--                </li>-->
                        <!--                <li>-->
                        <!--                    <a href="agenciesDocumentation.html" id="generalColor">-->
                        <!--                        <i class="fa fa-folder" id="generalColor"></i>-->
                        <!--                        <span style="margin-left: 5px;">School Owner</span>-->
                        <!--                    </a>-->
                        <!--                </li>-->
                        <!--                <li>-->
                        <!--                    <a href="institutionSchoolDocumentation.html" id="generalColor">-->
                        <!--                        <i class="fa fa-folder" id="generalColor"></i>-->
                        <!--                        <span style="margin-left: 5px;">Institutions</span>-->
                        <!--                    </a>-->
                        <!--                </li>-->
                        <!--                <li>-->
                        <!--                    <a href="ictAdminDocumentation.html" id="generalColor">-->
                        <!--                        <i class="fa fa-folder" id="generalColor"></i>-->
                        <!--                        <span style="margin-left: 5px;">ICT/Admin</span>-->
                        <!--                    </a>-->
                        <!--                </li>-->
                        <!--                <li>-->
                        <!--                    <a href="staffDocumentation.html" id="generalColor">-->
                        <!--                        <i class="fa fa-folder" id="generalColor"></i>-->
                        <!--                        <span style="margin-left: 5px;">Staffs</span>-->
                        <!--                    </a>-->
                        <!--                </li>-->
                        <!--                <li>-->
                        <!--                    <a href="parentDocumentation.html" id="generalColor">-->
                        <!--                        <i class="fa fa-folder" id="generalColor"></i>-->
                        <!--                        <span style="margin-left: 5px;">Parent</span>-->
                        <!--                    </a>-->
                        <!--                </li>-->
                        <!--                <li>-->
                        <!--                    <a href="studentDocumentation.html" id="generalColor">-->
                        <!--                        <i class="fa fa-folder" id="generalColor"></i>-->
                        <!--                        <span style="margin-left: 5px;">Students</span>-->
                        <!--                    </a>-->
                        <!--                </li>-->
                                       
                        <!--            </ul>-->
                        <!--        </li>-->
                        <!--        <li>-->
                        <!--            <a href="termsAndConditions.html" id="generalColor">-->
                        <!--                <i class="fa fa-tag" id="generalColor"></i>-->
                        <!--                <span style="margin-left: 5px;">Terms</span>-->
                        <!--            </a>-->
                        <!--        </li>-->
                        <!--    </ul>-->
                        <!--</li>-->
                       
                        
                        
                    </ul>

                    <span style="bottom: 0; margin-left: 10px; position: absolute;">
                        <a href="../login/login.html">
                            <i class="fa fa-power-off" id="generalColor"></i>
                            <span class="hide-menu" id="generalColor">Logout</span>
                        </a>
                    </span>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->