<div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile">
                    <!-- User profile image -->
                    <div class="profile-img"> <img src="../img/profile/<?php echo $userPicture; ?>" alt="user" />
                        <!-- this is blinking heartbit-->
                        
                    </div>
                    <!-- User profile text-->
                    <div class="profile-text">
                        <h5 style="color: black;"><?php echo $fullname; ?></h5>
                    </div>
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav" style="overflow-x: hidden;" id="sideBarColor">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        
                        <li> 
                            <a href="index.php" aria-expanded="false">
                                <i class="mdi mdi-gauge"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        
                        <li> 
                            <a href="configurations.php" aria-expanded="false">
                                <i class="fa fa-gears"></i>
                                <span class="hide-menu">Configurations</span>
                            </a>                       
                        </li>

                        <li> 
                            <a class="has-arrow waves-effect waves-dark" href="javascript:;" aria-expanded="false">
                                <i class="fa fa-group"></i>
                                <span class="hide-menu">Manage Users</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a class="generate" href="manageStaff.php">
                                        <i style="color: <?php echo $PrimaryColor; ?>;" class="fa fa-user"></i>
                                        <span style="margin-left: 5px;">Staffs</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="generate" href="students.php">
                                        <i style="color: <?php echo $PrimaryColor; ?>;" class="fa fa-user"></i>
                                        <span style="margin-left: 5px;">Students</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="generate" href="parent.php">
                                        <i style="color: <?php echo $PrimaryColor; ?>;" class="fa fa-user"></i>
                                        <span style="margin-left: 5px;">Parents</span>
                                    </a>
                                </li>
                                
                                
                            </ul>
                        </li>
                        
                        <li> 
                            <a class="has-arrow waves-effect waves-dark" href="javascript:;" aria-expanded="false">
                                <i class="fa fa-file-text-o"></i>
                                <span class="hide-menu">Result Settings</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a class="generate" href="casettings.php">
                                        <i style="color: <?php echo $PrimaryColor; ?>;" class="fa fa-file-text-o"></i>
                                        <span style="margin-left: 5px;">CA Settings</span>
                                    </a>
                                </li>
                                 <li>
                                    <a class="generate" href="gradingmethod.php">
                                        <i style="color: <?php echo $PrimaryColor; ?>;" class="fa fa-file-text-o"></i>
                                        <span style="margin-left: 5px;">Grading Method</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </li>
                        
                       <li> 
                            <a class="has-arrow waves-effect waves-dark" href="javascript:;" aria-expanded="false">
                                <i class="fa fa-file-text-o" ></i>
                                <span class="hide-menu">Result</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a class="generate" href="scoreSheet.php">
                                        <i style="color: <?php echo $PrimaryColor; ?>;" class="fa fa-file-text-o" ></i>
                                        <span style="margin-left: 5px;">Score Sheet</span>
                                    </a>
                                </li>
                             
                                <li>
                                    <a class="generate" href="affectiveDomain.php">
                                        <i style="color: <?php echo $PrimaryColor; ?>;" class="fa fa-file-text-o"></i>
                                        <span style="margin-left: 5px;">Affective Domain</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="generate" href="studentpsychomotor.php">
                                        <i style="color: <?php echo $PrimaryColor; ?>;" class="fa fa-file-text-o"></i>
                                        <span style="margin-left: 5px;">Psychomotor</span>
                                    </a>
                                </li>
                                 <li>
                                    <a class="generate" href="broadSheet.php">
                                        <i style="color: <?php echo $PrimaryColor; ?>;" class="fa fa-file-text-o"></i>
                                        <span style="margin-left: 5px;">Broad Sheet</span>
                                    </a>
                                </li>
                                <!--<li>-->
                                <!--    <a href="viewResult.php" id="generalColor">-->
                                <!--        <i class="fa fa-file-text-o" id="generalColor"></i>-->
                                <!--        <span style="margin-left: 5px;">View Result</span>-->
                                <!--    </a>-->
                                <!--</li>-->
                            </ul>
                        </li>

                        <li> 
                            <a class="has-arrow waves-effect waves-dark" href="javascript:;" aria-expanded="false">
                                <i class="fa fa-gavel" ></i>
                                <span class="hide-menu">Staff Disciplinary</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a class="generate" href="offence_settings.php">
                                        <i style="color: <?php echo $PrimaryColor; ?>;" class="fa fa-user-secret" ></i>
                                        <span style="margin-left: 5px;">Offence Setting</span>
                                    </a>
                                </li>
                             
                                
                            </ul>
                        </li>
                        <li> 
                            <a class="has-arrow waves-effect waves-dark" href="javascript:;" aria-expanded="false">
                                <i class="fa fa-gavel" ></i>
                                <span class="hide-menu">Student Disciplinary</span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a class="generate" href="offence_settings_student.php">
                                        <i style="color: <?php echo $PrimaryColor; ?>;" class="fa fa-user-secret" ></i>
                                        <span style="margin-left: 5px;">Offence Setting</span>
                                    </a>
                                </li>
                          
                             
                                
                            </ul>
                        </li>
                        
                    
                        <li> <a class=" waves-effect waves-dark" href="manage_web_content.php" aria-expanded="false"><i class="mdi mdi-earth"></i>
                                <span class="hide-menu">Manage Web Content</span></a>
                        </li>

                      
                        <li> 
                            <a class="has-arrow waves-effect waves-dark" href="javascript:;" aria-expanded="false">
                                <i class="fa fa-clock-o"></i>
                                <span class="hide-menu">Attendance</span>
                            </a>
                             <ul aria-expanded="false" class="collapse">

                                        <li> <a class=" waves-effect waves-dark" href="attendance.php" aria-expanded="false"><i class="mdi mdi-account-multiple"></i>
                                                <span class="hide-menu">Student Attendance</span></a>
                                        </li>

                                
                                    
                                </ul>
                        </li>
                        <li> <a class=" waves-effect waves-dark" href="staffSalarySchedule.php" aria-expanded="false"><i class="mdi mdi-earth"></i>
                                <span class="hide-menu">Staff Salary Schedule</span></a>
                        </li>

                        
                                
                          <!--

                        <li> 
                            <a href="testingPage.php" id="generalColor" aria-expanded="false">
                                <i class="mdi mdi-email" id="generalColor"></i>
                                <span class="hide-menu">SMS</span>
                            </a>
                        </li>

                        <li> 
                            <a href="testingPage.php" id="generalColor" aria-expanded="false">
                                <i class="mdi mdi-gmail" id="generalColor"></i>
                                <span class="hide-menu">Email</span>
                            </a>
                        </li>

                        <li> 
                            <a href="testingPage.php" id="generalColor" aria-expanded="false">
                                <i class="mdi mdi-gift" id="generalColor"></i>
                                <span class="hide-menu">Birthday Message</span>
                            </a>
                        </li>-->
               
                    </ul>

                    
                </nav>
                <!-- End Sidebar navigation -->
            </div>