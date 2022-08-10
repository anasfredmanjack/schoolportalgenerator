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
                font-size: 14px; 
                
            } 
            .centered {
                text-align: center;
                align-content: center;
                display: block;
                clear: both;
                width: 155px; 
                font-weight: bolder;
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
            .tablerow{
                background-color:grey;
                -webkit-print-color-adjust: exact; 
            }
        </style>
    </head>
    <body>
        <div class="ticket"> 
            
            <button id="btnPrint" class="hidden-print" style="background-color: #00bfff; padding: 10px; border-radius: 10px; border: none; margin: 25px auto; display: block">Print</button>
            
            <div id="printterminalcontentbody">
            <?php
                $PaymentRefNo = $_GET['data-id'];
                $institution = $_GET['data-inst'];
                
                $sqlcategory = mysqli_query($link,"SELECT DISTINCT(PaymentRefNo),StudentName,ClassOrDepartmentID,sessionName,termOrsemesterName,dateCreated,timeCreated,studentID,StudentRegNumber,depositorOrReciepientName FROM `depositpayment` WHERE `PaymentRefNo`='$PaymentRefNo' AND `InstitutionID`='$institution' AND deleteStatus='0'");
                $rowcategory = mysqli_fetch_assoc($sqlcategory);
                $cntcategory = mysqli_num_rows($sqlcategory);

                
                $studid = $rowcategory['studentID'];

                $getinst = mysqli_query($link,"SELECT * FROM `institution` WHERE `InstitutionID`='$institution'");
                $fetchinstdet = mysqli_fetch_assoc($getinst);

                $getstudent = mysqli_query($link,"SELECT * FROM `student` WHERE `InstitutionID`='$institution' AND StudentID='$studid'");
                $fetchstudent = mysqli_fetch_assoc($getstudent);

                $institutionname = $fetchinstdet['InstitutionName'].' '.$fetchinstdet['InstitutionNameTwo'];
                $institutitonlogo = $fetchinstdet['InstitutionLogo'];
                $institutitonWebsite = $fetchinstdet['InstitutionWebsite'];
                $studphoto = $fetchstudent['StudentPhoto'];

                if($institutionname == '')
                {
                    $institutionnamenew = 'No Institution Name Found';
                }
                else
                {
                $institutionnamenew = $fetchinstdet['InstitutionName'].' '.$fetchinstdet['InstitutionNameTwo']; 
                }
                if($institutitonWebsite == '')
                {
                    $institutitonWebsitenew = 'No Institution Name Found';
                }
                else
                {
                $institutitonWebsitenew = $fetchinstdet['InstitutionWebsite']; 
                }
                
                if($institutitonlogo == '')
                {
                    $institutitonlogonew = 'No_Photo.png';
                }
                else
                {
                $institutitonlogonew = $fetchinstdet['InstitutionLogo']; 
                }
                
                $institutionaddress = $fetchinstdet['InstitutionAddress'];
                
                if($institutionaddress == '')
                {
                    $institutionaddressnew = 'School Address not Available';
                }
                else
                {
                    $institutionaddressnew = $fetchinstdet['InstitutionAddress'];   
                }
                
                $institutionphone = $fetchinstdet['InstitutionPhone'];
                
                if($institutionphone == '')
                {
                $institutionphone = 'School phone not available'; 
                }
                else
                {
                $institutionphone = $fetchinstdet['InstitutionPhone'];   
                }
                if($studphoto == '' || $studphoto == 0)
                {
                    $studphoto = 'No_Photo.png'; 
                }
                else
                {
                
                $studphoto = $fetchstudent['StudentPhoto']; 
                }

                echo'<div class="row" align="center">
                                                        
                        <table class="table table-borderedp" style="font-size: 14px;">
                            <thead>
                                <tr">
                                    
                                    <th><center><img src="../../../img/logo/'.$institutitonlogonew.'" style="width:90px;"></center></th>

                                    <th><center><strong><h3 style="font-weight:bold;">'.$institutionnamenew.'<h3></strong></center>
                                    <br><center><h5 style="margin-top:-35px;">'.$institutionaddressnew.'. <span>'.$institutionphone.'</span></h5></center>
                                    <br><center><h6 style="margin-top:-30px;">'.$institutitonWebsitenew.'</h6></center></th>

                                    <th><center><img src="../../../img/logo/'.$studphoto.'" style="width:90px;"></center></th> 

                                </tr>    
                            </thead>
                        </table>   
                    </div>';
                    
                    echo'<center><u><h4 style="font-weight:bold;margin-top:-10px;">Receipt</h4></u></center>';
                    $sqltransactionchange = ("SELECT SUM(changeAmount) AS total FROM transactionchange WHERE `InstitutionID` = '$institution' AND StudentID = '$studid'");
                    $resulttransactionchange = mysqli_query($link, $sqltransactionchange);
                    $rowtransactionchange = mysqli_fetch_assoc($resulttransactionchange);
                    $row_cnttransactionchange = mysqli_num_rows($resulttransactionchange);
                    
                    if($row_cnttransactionchange > 0)
                    {
                        // echo '<span style="font-weight:600; style="font-weight:bold;margin-top:-10px;">REFUND : &#8358;'.number_format($rowtransactionchange['total']).'</span>';
                    }
                    else
                    {
                        echo '';

                    }
                    
                if($cntcategory > 0)
                {
                    $classid = $rowcategory['ClassOrDepartmentID'];
                    $session = $rowcategory['sessionName'];
                    $term = $rowcategory['termOrsemesterName'];
                    $date = $rowcategory['dateCreated'];
                    $time = $rowcategory['timeCreated'];
                    $datetime = $date.' '.$time;

                    $sqlamount = mysqli_query($link,"SELECT SUM(amountPaid) AS amount FROM `transaction` WHERE `PaymentRefNo`='$PaymentRefNo' AND `InstitutionID`='$institution' AND deleteStatus='0'");
                    $rowamount = mysqli_fetch_assoc($sqlamount);
                    $cntamount = mysqli_num_rows($sqlamount);   

                    $amount = $rowamount['amount'];

                    $sqlclassordepartment = mysqli_query($link,"SELECT * FROM `classordepartment` WHERE `InstitutionID`='$institution' AND `ClassOrDepartmentID`='$classid'");
                    $rowclassordepartment = mysqli_fetch_assoc($sqlclassordepartment);

                    echo '<div class="row">
                            <div class="col-12">
                                <center>
                                    <table class="table" style="font-size: 14px;margin-top:-5px;">
                                        <thead>
                                            <tr class="tablerow" style="color:white;">
                                                
                                                <th>Scholarship</th>
                                                <th>Disc.</th>
                                                <th>Cr.</th>
                                                <th>Tot. Fee</th>
                                                <th>Tot. Amt. Payable</th>
                                                <th>Tot. Amt. Paid</th>';

                                                $sqlolddeptupload = ("SELECT SUM(amount) AS total FROM olddept WHERE `InstitutionID` = '$institution' AND StudentID = '$studid' AND UploadType = 'olddeptupload'");
                                                $resultolddeptupload = mysqli_query($link, $sqlolddeptupload);
                                                $rowolddeptupload = mysqli_fetch_assoc($resultolddeptupload);
                                                $row_cntolddeptupload = mysqli_num_rows($resultolddeptupload);
                                                
                                                if($row_cntolddeptupload > 0)
                                                {
                                                    $olddeptupload = $rowolddeptupload['total'];
                                                }
                                                else
                                                {
                                                    $olddeptupload = 0;
                                                }
                                                
                                                $sqlolddeptpayment = ("SELECT SUM(amount) AS total FROM olddept WHERE `InstitutionID` = '$institution' AND StudentID = '$studid' AND UploadType = 'olddeptpayment'");
                                                $resultolddeptpayment = mysqli_query($link, $sqlolddeptpayment);
                                                $rowolddeptpayment = mysqli_fetch_assoc($resultolddeptpayment);
                                                $row_cntolddeptpayment = mysqli_num_rows($resultolddeptpayment);
                                                
                                                if($row_cntolddeptpayment > 0)
                                                {
                                                    $olddeptpayment = $rowolddeptpayment['total'];
                                                }
                                                else
                                                {
                                                    $olddeptpayment = 0;
                                                }
                                                $olddept = $olddeptupload - $olddeptpayment;
                                    
                                                if($olddept > 0)
                                                {
                                                    echo '<th>Old Dept.</th>';
                                                }
                                                else
                                                {
                                    
                                                }
                        
                                        echo '<th>Bal.</th>
                                        </tr>
                                        </thead>
                                        <tbody>';

                                        $sqltrans = mysqli_query($link,"SELECT DISTINCT amountPaid, sessionName, termOrSemesterName, dateCreated, timeCreated, modeofPayment FROM depositpayment WHERE InstitutionID='$institution' AND studentID='$studid' AND termOrSemesterName='$term' AND sessionName='$session' AND deleteStatus='0' AND PaymentRefNo='$PaymentRefNo'");
                                        $rowtrans = mysqli_fetch_assoc($sqltrans);
                                        $cnttrans = mysqli_num_rows($sqltrans);

                                        $sqltransscholarship = mysqli_query($link,"SELECT SUM(feewaver.WaverAmount) AS total FROM feewaver INNER JOIN chargestructure ON feewaver.subCategoryID=chargestructure.subCategoryID AND feewaver.ClassOrDepartmentID=chargestructure.ClassOrDepartmentID WHERE feewaver.InstitutionID='$institution' AND feewaver.studentID='$studid' AND chargestructure.status='1' AND feewaver.status='3' AND chargestructure.termOrSemesterName='$term' AND chargestructure.sessionName='$session' AND feewaver.deleteStatus='0'");
                                        $rowtransscholarship = mysqli_fetch_assoc($sqltransscholarship);
                                        $cnttransscholarship = mysqli_num_rows($sqltransscholarship);

                                        if($cnttransscholarship > 0)
                                        {
                                            $scholarshipamountfst = $rowtransscholarship['total'];
                                            $scholarshipamount = number_format($rowtransscholarship['total']);
                                        }
                                        else
                                        {
                                            $scholarshipamountfst = 0;
                                            $scholarshipamount =0;
                                        }
                                        if($rowtrans['modeofPayment'] == 'transfer')
                                        {
                                            $checkmsg = '<span style="color:red;">Note: This is a temporary Receipt until payment verification</span>';
                                        }
                                        else
                                        {
                                            $checkmsg = '';

                                        }

                                        $sqltransdiscount = mysqli_query($link,"SELECT SUM(feewaver.WaverAmount) AS total FROM feewaver INNER JOIN chargestructure ON feewaver.subCategoryID=chargestructure.subCategoryID AND feewaver.ClassOrDepartmentID=chargestructure.ClassOrDepartmentID WHERE feewaver.InstitutionID='$institution' AND feewaver.studentID='$studid' AND chargestructure.status='1' AND feewaver.status='2' AND chargestructure.termOrSemesterName='$term' AND chargestructure.sessionName='$session' AND feewaver.deleteStatus='0'");
                                        $rowtransdiscount = mysqli_fetch_assoc($sqltransdiscount);
                                        $cnttransdiscount = mysqli_num_rows($sqltransdiscount);

                                        if($cnttransdiscount > 0)
                                        {
                                            $discountamountfst = $rowtransdiscount['total'];
                                            $discountamount = number_format($rowtransdiscount['total']);
                                        }
                                        else
                                        {
                                            $discountamountfst = 0;
                                            $discountamount =0;
                                        }

                                        $sqltranscredit = mysqli_query($link,"SELECT SUM(feewaver.FixedAmount) AS total FROM feewaver INNER JOIN chargestructure ON feewaver.subCategoryID=chargestructure.subCategoryID AND feewaver.ClassOrDepartmentID=chargestructure.ClassOrDepartmentID WHERE feewaver.InstitutionID='$institution' AND feewaver.studentID='$studid' AND chargestructure.status='1' AND feewaver.status='0' AND chargestructure.termOrSemesterName='$term' AND chargestructure.sessionName='$session' AND feewaver.deleteStatus='0'");
                                        $rowtranscredit = mysqli_fetch_assoc($sqltranscredit);
                                        $cnttranscredit = mysqli_num_rows($sqltranscredit);

                                        if($cnttranscredit > 0)
                                        {
                                            $creditamountfst = $rowtranscredit['total'];
                                            $creditamount = number_format($rowtranscredit['total']);
                                        }
                                        else
                                        {
                                            $creditamountfst = 0;
                                            $creditamount =0;
                                        }

                                        $sqlchargestructureamount = mysqli_query($link,"SELECT SUM(amount) AS total FROM `chargestructure` WHERE `InstitutionID`='$institution' AND status='1' AND ClassOrDepartmentID='$classid' AND sessionName='$session' AND termOrSemesterName='$term'");
                                        $rowchargestructureamount = mysqli_fetch_assoc($sqlchargestructureamount);
                                        $cntchargestructureamount = mysqli_num_rows($sqlchargestructureamount); 
                                        
                                        if($cntchargestructureamount > 0)
                                        {
                                            $chargestructureamountfst = $rowchargestructureamount['total'] + $olddeptpayment;
                                            $chargestructureamount = number_format($rowchargestructureamount['total'] + $olddeptpayment);
                                        }
                                        else
                                        {
                                            $chargestructureamountfst = 0;
                                            $chargestructureamount = 0;
                                        }

                                        $amountpayablefst = $chargestructureamountfst - ($discountamountfst + $scholarshipamountfst);

                                        $amountpayable = number_format($amountpayablefst);

                                        $sqltransnormal = mysqli_query($link,"SELECT SUM(amountPaid) AS total FROM depositpayment WHERE InstitutionID='$institution' AND studentID='$studid' AND termOrSemesterName='$term' AND sessionName='$session' AND deleteStatus='0' AND PaymentRefNo='$PaymentRefNo'");
                                        $rowtransnormal = mysqli_fetch_assoc($sqltransnormal);
                                        $cnttransnormal = mysqli_num_rows($sqltransnormal);

                                        if($cnttransnormal > 0)
                                        {
                                            $normalamountfst = $rowtransnormal['total'];
                                            $normalamount = number_format($rowtransnormal['total']);
                                        }
                                        else
                                        {
                                            $normalamountfst = 0;
                                            $normalamount =0;
                                        }

                                        if($scholarshipamountfst != 0 && $discountamountfst != 0)
                                        {
                                            $msg = '(A total of &#8358;'.number_format($scholarshipamountfst + $discountamountfst).' from Scholarship and Discount has been deducted from your Total Fee)';
                                        }
                                        elseif($scholarshipamountfst != 0)
                                        {
                                            $msg = '(&#8358;'.number_format($scholarshipamountfst).' Scholarship has been applied to your Total Fee)';
                                        }
                                        elseif($discountamountfst != 0)
                                        {
                                            $msg = '(&#8358;'.number_format($discountamountfst).' Discount has been applied to your Total Fee)';
                                            
                                        }
                                        else
                                        {
                                            $msg = '';
                                        }

                                        $deptfst = $chargestructureamountfst - $normalamountfst;
                                        $deptfstsec = $chargestructureamountfst - $normalamountfst;
                                        
                                        if($deptfst < 0)
                                        {
                                            $dept = 0;

                                        }
                                        else
                                        {
                                            $dept = number_format($deptfst);

                                        }
                                        
                                        echo '<tr>
                                                <td style="border:1px solid #000; width:100px" align="right">'.$scholarshipamount.'</td>
                                                <td style="border:1px solid #000; width:100px" align="right">'.$discountamount.'</td>
                                                <td style="border:1px solid #000; width:100px" align="right">'.$creditamount.'</td>
                                                <td style="border:1px solid #000; width:100px" align="right">&#x20A6;'.$chargestructureamount.'</td>
                                                <td style="border:1px solid #000; width:100px" align="right">&#x20A6;'.$amountpayable.'</td>
                                                
                                                <td style="border:1px solid #000; width:100px" align="right">&#x20A6;'.$normalamount.'</td>';
                                                
                                                $sqlolddeptupload = ("SELECT SUM(amount) AS total FROM olddept WHERE `InstitutionID` = '$institution' AND StudentID = '$studid' AND UploadType = 'olddeptupload'");
                                                $resultolddeptupload = mysqli_query($link, $sqlolddeptupload);
                                                $rowolddeptupload = mysqli_fetch_assoc($resultolddeptupload);
                                                $row_cntolddeptupload = mysqli_num_rows($resultolddeptupload);
                                                
                                                if($row_cntolddeptupload > 0)
                                                {
                                                    $olddeptupload = $rowolddeptupload['total'];
                                                }
                                                else
                                                {
                                                    $olddeptupload = 0;
                                                }
                                                
                                                $sqlolddeptpayment = ("SELECT SUM(amount) AS total FROM olddept WHERE `InstitutionID` = '$institution' AND StudentID = '$studid' AND UploadType = 'olddeptpayment'");
                                                $resultolddeptpayment = mysqli_query($link, $sqlolddeptpayment);
                                                $rowolddeptpayment = mysqli_fetch_assoc($resultolddeptpayment);
                                                $row_cntolddeptpayment = mysqli_num_rows($resultolddeptpayment);
                                                
                                                if($row_cntolddeptpayment > 0)
                                                {
                                                    $olddeptpayment = $rowolddeptpayment['total'];
                                                }
                                                else
                                                {
                                                    $olddeptpayment = 0;
                                                }
                                                $olddept = $olddeptupload - $olddeptpayment;
                                    
                                                $totdeptbf = $olddept + $deptfst;
                                    
                                                if($olddept > 0)
                                                {
                                                    echo '<td style="border:1px solid #000; width:100px" align="right">&#x20A6;'.number_format($olddept).'</td>';
                                                }
                                                else
                                                {
                                    
                                                }
                                                
                                            echo '<td style="border:1px solid #000; width:100px" align="right">&#x20A6;'.$dept.'</td>
                                            </tr>

                                            <tr align="right">
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td style="border:1px solid #000;">&#x20A6;'.$amountpayable.'<br><small align="left" style="font-weight:600;">'.$msg.'</small></td>
                                                
                                                <td></td>';

                                                $sqlolddeptupload = ("SELECT SUM(amount) AS total FROM olddept WHERE `InstitutionID` = '$institution' AND StudentID = '$studid' AND UploadType = 'olddeptupload'");
                                                $resultolddeptupload = mysqli_query($link, $sqlolddeptupload);
                                                $rowolddeptupload = mysqli_fetch_assoc($resultolddeptupload);
                                                $row_cntolddeptupload = mysqli_num_rows($resultolddeptupload);
                                                
                                                if($row_cntolddeptupload > 0)
                                                {
                                                    $olddeptupload = $rowolddeptupload['total'];
                                                }
                                                else
                                                {
                                                    $olddeptupload = 0;
                                                }
                                                
                                                $sqlolddeptpayment = ("SELECT SUM(amount) AS total FROM olddept WHERE `InstitutionID` = '$institution' AND StudentID = '$studid' AND UploadType = 'olddeptpayment'");
                                                $resultolddeptpayment = mysqli_query($link, $sqlolddeptpayment);
                                                $rowolddeptpayment = mysqli_fetch_assoc($resultolddeptpayment);
                                                $row_cntolddeptpayment = mysqli_num_rows($resultolddeptpayment);
                                                
                                                if($row_cntolddeptpayment > 0)
                                                {
                                                    $olddeptpayment = $rowolddeptpayment['total'];
                                                }
                                                else
                                                {
                                                    $olddeptpayment = 0;
                                                }
                                                $olddept = $olddeptupload - $olddeptpayment;
                                    
                                                $totdeptbf = $olddept + $deptfst;
                                    
                                                if($olddept > 0)
                                                {
                                                    echo '<td></td>';
                                                }
                                                else
                                                {
                                    
                                                }
                                                
                                                if($deptfstsec < 0)
                                                {
                                                    
                                                    echo '<td style="border:1px solid #000;">&#x20A6;'.number_format(- $deptfstsec).'<br><small align="left" style="font-weight:600;">(Refund)</small></td>';
        
                                                }
                                                else
                                                {
                                                    
                                                    echo '<td style="border:1px solid #000;">&#x20A6;'.number_format($deptfstsec).'<br><small align="left" style="font-weight:600;">(compulsory Fees)</small></td>';
                                                }
                                                echo '
                                            </tr>
                                    </tbody>
                                    </table>
                                </center>
                            </div>
                        </div>';
                        
                        echo '<div class="row" style="margin-top: 5%;">
                                <div class="col-12">
                                    <center>
                                        <table class="table" style="font-size: 14px;">';

                                            $sqltrans = mysqli_query($link,"SELECT DISTINCT amountPaid, sessionName, termOrSemesterName, dateCreated, timeCreated, modeofPayment FROM depositpayment WHERE InstitutionID='$institution' AND studentID='$studid' AND termOrSemesterName='$term' AND sessionName='$session' AND deleteStatus='0' AND PaymentRefNo='$PaymentRefNo'");
                                            $rowtrans = mysqli_fetch_assoc($sqltrans);
                                            $cnttrans = mysqli_num_rows($sqltrans);

                                            $sqltransscholarship = mysqli_query($link,"SELECT SUM(feewaver.WaverAmount) AS total FROM feewaver INNER JOIN chargestructure ON feewaver.subCategoryID=chargestructure.subCategoryID AND feewaver.ClassOrDepartmentID=chargestructure.ClassOrDepartmentID WHERE feewaver.InstitutionID='$institution' AND feewaver.studentID='$studid' AND chargestructure.status='1' AND feewaver.status='3' AND chargestructure.termOrSemesterName='$term' AND chargestructure.sessionName='$session' AND feewaver.deleteStatus='0'");
                                            $rowtransscholarship = mysqli_fetch_assoc($sqltransscholarship);
                                            $cnttransscholarship = mysqli_num_rows($sqltransscholarship);

                                            if($cnttransscholarship > 0)
                                            {
                                                $scholarshipamountfst = $rowtransscholarship['total'];
                                                $scholarshipamount = number_format($rowtransscholarship['total']);
                                            }
                                            else
                                            {
                                                $scholarshipamountfst = 0;
                                                $scholarshipamount =0;
                                            }
                                            if($rowtrans['modeofPayment'] == 'transfer')
                                            {
                                                $checkmsg = '<span style="color:red;">Note: This is a temporary Receipt until payment verification</span>';
                                            }
                                            else
                                            {
                                                $checkmsg = '';

                                            }

                                            $sqltransdiscount = mysqli_query($link,"SELECT SUM(feewaver.WaverAmount) AS total FROM feewaver INNER JOIN chargestructure ON feewaver.subCategoryID=chargestructure.subCategoryID AND feewaver.ClassOrDepartmentID=chargestructure.ClassOrDepartmentID WHERE feewaver.InstitutionID='$institution' AND feewaver.studentID='$studid' AND chargestructure.status='1' AND feewaver.status='2' AND chargestructure.termOrSemesterName='$term' AND chargestructure.sessionName='$session' AND feewaver.deleteStatus='0'");
                                            $rowtransdiscount = mysqli_fetch_assoc($sqltransdiscount);
                                            $cnttransdiscount = mysqli_num_rows($sqltransdiscount);

                                            if($cnttransdiscount > 0)
                                            {
                                                $discountamountfst = $rowtransdiscount['total'];
                                                $discountamount = number_format($rowtransdiscount['total']);
                                            }
                                            else
                                            {
                                                $discountamountfst = 0;
                                                $discountamount =0;
                                            }

                                            $sqltranscredit = mysqli_query($link,"SELECT SUM(feewaver.FixedAmount) AS total FROM feewaver INNER JOIN chargestructure ON feewaver.subCategoryID=chargestructure.subCategoryID AND feewaver.ClassOrDepartmentID=chargestructure.ClassOrDepartmentID WHERE feewaver.InstitutionID='$institution' AND feewaver.studentID='$studid' AND chargestructure.status='1' AND feewaver.status='0' AND chargestructure.termOrSemesterName='$term' AND chargestructure.sessionName='$session' AND feewaver.deleteStatus='0'");
                                            $rowtranscredit = mysqli_fetch_assoc($sqltranscredit);
                                            $cnttranscredit = mysqli_num_rows($sqltranscredit);

                                            if($cnttranscredit > 0)
                                            {
                                                $creditamountfst = $rowtranscredit['total'];
                                                $creditamount = number_format($rowtranscredit['total']);
                                            }
                                            else
                                            {
                                                $creditamountfst = 0;
                                                $creditamount =0;
                                            }

                                            $sqlchargestructureamount = mysqli_query($link,"SELECT SUM(amount) AS total FROM `chargestructure` WHERE `InstitutionID`='$institution' AND status='1' AND ClassOrDepartmentID='$classid' AND sessionName='$session' AND termOrSemesterName='$term'");
                                            $rowchargestructureamount = mysqli_fetch_assoc($sqlchargestructureamount);
                                            $cntchargestructureamount = mysqli_num_rows($sqlchargestructureamount); 
                                            
                                            if($cntchargestructureamount > 0)
                                            {
                                                $chargestructureamountfst = $rowchargestructureamount['total'] + $olddeptpayment;
                                                $chargestructureamount = number_format($rowchargestructureamount['total'] + $olddeptpayment);
                                            }
                                            else
                                            {
                                                $chargestructureamountfst = 0;
                                                $chargestructureamount = 0;
                                            }

                                            $amountpayablefst = $chargestructureamountfst - ($discountamountfst + $scholarshipamountfst);

                                            $amountpayable = number_format($amountpayablefst);

                                            $sqltransnormal = mysqli_query($link,"SELECT SUM(amountPaid) AS total FROM depositpayment WHERE InstitutionID='$institution' AND studentID='$studid' AND termOrSemesterName='$term' AND sessionName='$session' AND deleteStatus='0' AND PaymentRefNo='$PaymentRefNo'");
                                            $rowtransnormal = mysqli_fetch_assoc($sqltransnormal);
                                            $cnttransnormal = mysqli_num_rows($sqltransnormal);

                                            if($cnttransnormal > 0)
                                            {
                                                $normalamountfst = $rowtransnormal['total'];
                                                $normalamount = number_format($rowtransnormal['total']);
                                            }
                                            else
                                            {
                                                $normalamountfst = 0;
                                                $normalamount =0;
                                            }

                                            if($scholarshipamountfst != 0 && $discountamountfst != 0)
                                            {
                                                $msg = '(A total of &#8358;'.number_format($scholarshipamountfst + $discountamountfst).' from Scholarship and Discount has been deducted from your Total Fee)';
                                            }
                                            elseif($scholarshipamountfst != 0)
                                            {
                                                $msg = '(&#8358;'.number_format($scholarshipamountfst).' Scholarship has been applied to your Total Fee)';
                                            }
                                            elseif($discountamountfst != 0)
                                            {
                                                $msg = '(&#8358;'.number_format($discountamountfst).' Discount has been applied to your Total Fee)';
                                                
                                            }
                                            else
                                            {
                                                $msg = '';
                                            }

                                            $deptfst = $chargestructureamountfst - $normalamountfst;

                                            echo '<tbody>
                                            <tr>
                                                
                                                <td>Name Of Depositor: '.$rowcategory['depositorOrReciepientName'].'</td>
                                                <td>Student Name: '.$fetchstudent['StudentLastName'].' '.$fetchstudent['StudentMiddleName'].' '.$fetchstudent['StudentFirstName'].' ('.$rowcategory['StudentRegNumber'].')</td>
                                                <td>Session: '.$rowtrans['sessionName'].'</td>
                                                <td>Term: '.$rowtrans['termOrSemesterName'].'</td>
                                                

                                            </tr>
                                            <tr>
                                                <td>Class: '.$rowclassordepartment['ClassOrDepartmentName'].'</td>
                                                <td>Amount Paid: &#8358;'.$normalamount.' </td>
                                                <td>Date/Time: '.date("M jS, Y", strtotime($rowcategory['dateCreated'])).' / '.$rowcategory['timeCreated'].'</td>
                                                <td></td>
                                            </tr>
                                            <tr>';
                                                
                                                if($deptfst < 0)
                                                {
                                                    $dept = number_format(- $deptfst);
                                                    echo '<td>Balance: &#8358;0</td>
                                                    <td>Refund: &#8358;'.$dept.'</td>';
        
                                                }
                                                else
                                                {
                                                    $dept = number_format($deptfst);
                                                    echo '<td>Balance: &#8358;'.$dept.'</td>
                                                    <td></td>';
        
                                                }
                                                echo '<td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </center>
                            </div>
                        </div>
                        <div class="row" style="margin-top: 2%;">
                            <div class="col-12" style="color:red;">
                                <center>
                                    '.$checkmsg.'
                                </center>
                            </div>
                        </div>';
                }
                else
                {
                    echo 'Transaction Ref. No does not exist';
                }
            ?>
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

        const $btnPrint = document.querySelector("#btnPrint");
        $btnPrint.addEventListener("click", () => {
            window.print();
            var htmlToPrint = '' +
                '<style type="text/css">' +
                'table th td {' +
                'border:1px solid #000;' +
            
                '}' +
                'table  {' +
                '}' +
                '.tablerow {' +
                    'background-color:#999999;'+
                    '-webkit-print-color-adjust: exact;' +
                '}'+
    
                '.printf {' +
                    'display: inline-block;'+
                '}'+
                'table{ border-collapse: collapse; width:100%;}'+
                '</style>';
               
        });

    
        /* $("body").on("click","#finalprint", function(){
            
            window.print();
        }); */

 

    </script>
</body>

</html>
