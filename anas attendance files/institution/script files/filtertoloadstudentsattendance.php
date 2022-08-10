<?php

    include ('../../config/config.php');

$classid = $_POST['classid'];
$dateid = $_POST['dateid'];
$sessionid = $_POST['sessionid'];
$termid = $_POST['termid'];

$counter = 0;

        $sqltocheckstudinclass = mysqli_query($link,"SELECT * FROM `classordepartmentstudentallocation` WHERE `ClassOrDepartmentID`='$classid'");
        $countstud = mysqli_num_rows($sqltocheckstudinclass);
        $rowstud = mysqli_fetch_assoc($sqltocheckstudinclass);
    if($countstud > 0)
    {
        do{
            $counter++;
            $studid = $rowstud['StudentID'];

            $sqltocheckatttable = mysqli_query($link,"SELECT * FROM `studentattendance` where `StudentID` = '$studid' AND `session`='$sessionid' AND `TermOrSemester` = '$termid' AND `Date` = '$dateid'");
            $rowcehcktab = mysqli_fetch_assoc($sqltocheckatttable);
            $countcehckstud = mysqli_num_rows($sqltocheckatttable);

            $getstuddetails = mysqli_query($link,"SELECT * FROM `student` WHERE `StudentID` = '$studid'");
            $row = mysqli_fetch_assoc($getstuddetails);
            

                    if($countcehckstud > 0)
                    {
                        $attendancestatus = $rowcehcktab['Status'];

                       

                            if($attendancestatus == 1)
                            {
                                    echo'
                                    <tr>
                                    <td>'.$counter.'</td>
                                    <td class="text-left">'.$row['StudentFirstName'].' '.$row['StudentLastName'].'</td>
                                    <td>
                            
                                    <label class="custom-control custom-radio " for="present'.$row['StudentID'].'">
                                            <input type="radio" class="custom-control-input present" id="present'.$row['StudentID'].'" name="attendance'.$row['StudentID'].'" data-id="'.$row['StudentID'].'" checked>
                                                <span class="custom-control-label"></span>
                                        </label>
                                    </td>
                                    <td>
                                    <label class="custom-control custom-radio " for="absent'.$row['StudentID'].'">
                                            <input type="radio" class="custom-control-input absent" id="absent'.$row['StudentID'].'" name="attendance'.$row['StudentID'].'" data-id="'.$row['StudentID'].'">
                                                <span class="custom-control-label"></span>
                                        </label>
                                    </td>
                                    <td>
                                    <label class="custom-control custom-radio " for="excused'.$row['StudentID'].'">
                                    <input type="radio" class="custom-control-input excused" id="excused'.$row['StudentID'].'" name="attendance'.$row['StudentID'].'" data-id="'.$row['StudentID'].'">
                                        <span class="custom-control-label"></span>
                                </label>
                                    </td>
                                    
                                </tr>
                                    ';
                            }
                            else if($attendancestatus == 2)
                            {
                                    echo'
                                    <tr>
                                    <td>'.$counter.'</td>
                                    <td class="text-left">'.$row['StudentFirstName'].' '.$row['StudentLastName'].'</td>
                                    <td>
                            
                                    <label class="custom-control custom-radio " for="present'.$row['StudentID'].'">
                                            <input type="radio" class="custom-control-input present" id="present'.$row['StudentID'].'" name="attendance'.$row['StudentID'].'" data-id="'.$row['StudentID'].'">
                                                <span class="custom-control-label"></span>
                                        </label>
                                    </td>
                                    <td>
                                    <label class="custom-control custom-radio " for="absent'.$row['StudentID'].'">
                                            <input type="radio" class="custom-control-input absent" id="absent'.$row['StudentID'].'" name="attendance'.$row['StudentID'].'" data-id="'.$row['StudentID'].'" checked>
                                                <span class="custom-control-label"></span>
                                        </label>
                                    </td>
                                    <td>
                                    <label class="custom-control custom-radio " for="excused'.$row['StudentID'].'">
                                    <input type="radio" class="custom-control-input excused" id="excused'.$row['StudentID'].'" name="attendance'.$row['StudentID'].'" data-id="'.$row['StudentID'].'">
                                        <span class="custom-control-label"></span>
                                </label>
                                    </td>
                                    
                                </tr>
                                    ';
                            }
                            else
                            {
                                    echo'
                                    <tr>
                                    <td>'.$counter.'</td>
                                    <td class="text-left">'.$row['StudentFirstName'].' '.$row['StudentLastName'].'</td>
                                    <td>
                            
                                    <label class="custom-control custom-radio " for="present'.$row['StudentID'].'">
                                            <input type="radio" class="custom-control-input present" id="present'.$row['StudentID'].'" name="attendance'.$row['StudentID'].'" data-id="'.$row['StudentID'].'" >
                                                <span class="custom-control-label"></span>
                                        </label>
                                    </td>
                                    <td>
                                    <label class="custom-control custom-radio " for="absent'.$row['StudentID'].'">
                                            <input type="radio" class="custom-control-input absent" id="absent'.$row['StudentID'].'" name="attendance'.$row['StudentID'].'" data-id="'.$row['StudentID'].'">
                                                <span class="custom-control-label"></span>
                                        </label>
                                    </td>
                                    <td>
                                    <label class="custom-control custom-radio " for="excused'.$row['StudentID'].'">
                                    <input type="radio" class="custom-control-input excused" id="excused'.$row['StudentID'].'" name="attendance'.$row['StudentID'].'" data-id="'.$row['StudentID'].'" checked>
                                        <span class="custom-control-label"></span>
                                </label>
                                    </td>
                                    
                                </tr>
                                    ';
                            }


                    }
                    else
                    {
                                echo'
                                <tr>
                                <td>'.$counter.'</td>
                                <td class="text-left">'.$row['StudentFirstName'].' '.$row['StudentLastName'].'</td>
                                <td>
                        
                                <label class="custom-control custom-radio " for="present'.$row['StudentID'].'">
                                        <input type="radio" class="custom-control-input present" id="present'.$row['StudentID'].'" name="attendance'.$row['StudentID'].'" data-id="'.$row['StudentID'].'">
                                            <span class="custom-control-label"></span>
                                    </label>
                                </td>
                                <td>
                                <label class="custom-control custom-radio " for="absent'.$row['StudentID'].'">
                                        <input type="radio" class="custom-control-input absent" id="absent'.$row['StudentID'].'" name="attendance'.$row['StudentID'].'" data-id="'.$row['StudentID'].'">
                                            <span class="custom-control-label"></span>
                                    </label>
                                </td>
                                <td>
                                <label class="custom-control custom-radio " for="excused'.$row['StudentID'].'">
                                <input type="radio" class="custom-control-input excused" id="excused'.$row['StudentID'].'" name="attendance'.$row['StudentID'].'" data-id="'.$row['StudentID'].'">
                                    <span class="custom-control-label"></span>
                            </label>
                                </td>
                                
                            </tr>
                                ';
                    }
            

        }while($rowstud = mysqli_fetch_assoc($sqltocheckstudinclass));

     

    }
    else
    {
    echo' 
    <div class="alert alert-warning alert-dismissible fade show" role="alert" style="margin:10px;">
    <strong>Oops!!</strong> No Students Available Add Student to class/session !!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';

    }

?>