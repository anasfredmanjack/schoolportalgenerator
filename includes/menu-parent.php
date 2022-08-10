 <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" style="margin-left: -10px;">
                        
                        <li>
                            <a href="index.php" aria-expanded="false"  style="font-size: 14px;" class="chimaTextPrimary">
                                 <i  class="mdi mdi-gauge" style="font-size: 15px;"></i><span class="hide-menu" style="margin-top: 10px; margin-left: -10px;">Dashboard</span>
                            </a>
                        </li>

    <!--
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:;" aria-expanded="false"><i class="mdi mdi-chart-bar"></i><span class="hide-menu" style="margin-left: -8px;">Payments</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="testingPage.php">Wallet</a></li>
                                <li><a href="testingPage.php">Fees/Payments</a></li>
                               
                            </ul>
                        </li>

                        <li>
                            <a href="testingPage.php" aria-expanded="false"  style="font-size: 14px;" class="chimaTextPrimary">
                                <i class="mdi mdi-note" aria-hidden="true" style="font-size: 15px;"></i><span style="margin-left: -10px;" class="hide-menu">Internal Notice</span>
                            </a>
                        </li>

                        <li>
                            <a href="testingPage.php" aria-expanded="false"  style="font-size: 14px;" class="chimaTextPrimary">
                                <i class="mdi mdi-book" aria-hidden="true" style="font-size: 15px;"></i><span style="margin-left: -10px;" class="hide-menu">Books</span>
                            </a>
                        </li>

                        <li>
                            <a href="testingPage.php" aria-expanded="false"  style="font-size: 14px;" class="chimaTextPrimary">
                                <i class="fa fa-laptop" aria-hidden="true" style="font-size: 15px;"></i><span style="margin-left: -10px;" class="hide-menu">E-Learning</span>
                            </a>
                        </li>

                        <li>
                            <a href="testingPage.php" aria-expanded="false"  style="font-size: 14px;" class="chimaTextPrimary">
                                <i class="mdi mdi-account-multiple" aria-hidden="true" style="font-size: 15px;"></i><span style="margin-left: -10px;" class="hide-menu">Attendance</span>
                            </a>
                        </li>


                        <li>
                            <a href="testingPage.php" aria-expanded="false"  style="font-size: 14px;" class="chimaTextPrimary">
                                <i class="mdi mdi-chart-bar" aria-hidden="true" style="font-size: 15px;"></i><span style="margin-left: -10px;" class="hide-menu">Performance Journey</span>
                            </a>
                        </li>

                        <li>
                            <a href="testingPage.php" aria-expanded="false"  style="font-size: 14px;" class="chimaTextPrimary">
                                <i class="mdi mdi-camcorder" aria-hidden="true" style="font-size: 15px;"></i><span style="margin-left: -10px;" class="hide-menu">Surveillance</span>
                            </a>
                        </li>
-->
                        <li>
                            <a href="studresultSort.php" aria-expanded="false"  style="font-size: 14px;" class="chimaTextPrimary">
                                <i class="mdi mdi-file-outline" aria-hidden="true" style="font-size: 15px;"></i><span style="margin-left: -10px;" class="hide-menu">Check Result</span>
                            </a>
                        </li>
                        
                        <li>
                            <a href="feestructure.php" aria-expanded="false"  style="font-size: 14px;" class="chimaTextPrimary">
                            <i class="mdi mdi-domain"></i>Fee Structure</span>
                            </a>
                        </li>

                    </ul>
                     
                    <div style="float: right;">
                        <div style="margin-top: 10px; font-size: 10px;">
                            <?php

                                $sqlgetchild = ("SELECT * FROM `student` WHERE InstitutionID = '$InstitutionID' AND ParentID = '$UserID'");
                                $resultGetchild = mysqli_query($link, $sqlgetchild);
                                $rowGetchild = mysqli_fetch_assoc($resultGetchild);
                                $row_cntGetchild = mysqli_num_rows($resultGetchild);                            

                            ?>
                            <select class="form-control chimaPrimaryBorderColor" id="selectchild" style="background: white; border-width: 1px; border-style: solid; font-size: 14px;">
                                <?php
                                    if($row_cntGetchild > 0)
                                    {
                                        do{
                                ?>
                                        <option value="<?php echo $rowGetchild['StudentID'] ; ?>"><?php echo $rowGetchild['StudentFirstName'] . ' ' . $rowGetchild['StudentLastName'] ; ?></option>
                                    
                                <?php
                                        }while($rowGetchild = mysqli_fetch_assoc($resultGetchild));
                                    }
                                ?>
                            </select>
     
                        </div>
                    </div>
                </nav>
                <!-- End Sidebar navigation -->
            </div>