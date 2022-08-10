<?php

    include ('../../config/config.php');
    $multipleDelSelStudentId = $_POST['multipleDelSelStudentId'];
    $institution = $_POST['institution'];
    $mark = $_POST['mark'];
    $date = date("Y-m-d");
    $time = date("h:i:s");
    $classid = $_POST['classid'];
    $date = $_POST['dateid'];
    $sessionid = $_POST['sessionid'];
    $termid = $_POST['termid'];
    $mark = $_POST['mark'];
    $InstitutionID = $_POST['InstitutionID'];
    $time = date("h:i:s");

     
            if($mark == 1)
            {
                $markdetails ='Present';
            }
            else if($mark == 2)
            {
                $markdetails = 'Absent';
            }
            else
            {
                $markdetails = 'Excused';
            }

    $str_arr = explode (",", $multipleDelSelStudentId);  
        foreach($str_arr as $studentid) 
        {
            $sqltogetsession = mysqli_query($link,"SELECT * FROM `classordepartmentstudentallocation` WHERE `StudentID`='$studentid' AND `InstitutionID`='$institution'");
            $fetchsesion = mysqli_fetch_assoc($sqltogetsession);
            $session = $fetchsesion['Session'];
            $semester = $fetchsesion['TermOrSemester'];

            $sqltocheckifstudentexist = mysqli_query($link,"SELECT * FROM `studentattendance` WHERE `StudentID`='$studentid' AND `InstitutionID`='$InstitutionID' AND `Date`='$date' AND `TermOrSemester`='$termid' AND `session` = '$sessionid'");
            $countrows = mysqli_num_rows($sqltocheckifstudentexist);

            $sqltogetstudentdetails = mysqli_query($link,"SELECT * FROM `student` WHERE `StudentID`='$studentid' AND `InstitutionID`='$institution'");
            $fetchdetails = mysqli_fetch_assoc($sqltogetstudentdetails);
            $studentfullname = $fetchdetails['StudentFirstName'].' '.$fetchdetails['StudentLastName'];
         

                if($countrows > 0)
                  {
                        $sqltoudate = mysqli_query($link,"UPDATE `studentattendance` SET `Date`='$date',`Time`='$time',`Status`='$mark' WHERE `InstitutionID`='$InstitutionID' AND `Date`='$date' AND `TermOrSemester`='$termid' AND `session` = '$sessionid'");
                        

                        echo' 
                            <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin:10px;">
                            <strong>Great!!</strong> '.$studentfullname.' Attendance Successfully marked ('.$markdetails.') !!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                            </div>';

                  }
                  else
                  {
                    $sqltoinsert = mysqli_query($link,"INSERT INTO `studentattendance`(`InstitutionID`, `StudentID`, `session`, `TermOrSemester`, `Date`, `Time`, `Status`) VALUES 
                    ('$institution','$studentid','$session','$semester','$date','$time','$mark')");
                        

                    echo' 
                        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin:10px;">
                        <strong>Great!!</strong> '.$studentfullname.' Attendance Successfully marked ('.$markdetails.') !!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>';


                  }
            

        }






?>