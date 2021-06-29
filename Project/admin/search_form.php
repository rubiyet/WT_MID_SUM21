<?php
    $studentid = "";
    $error_studentid = "";
    $teacherid = "";
    $error_teacherid = "";
    $adminid = "";
    $error_adminid = "";

    $error = false;

    if(isset($_POST["enterstudent"])){
        if(empty($_POST["studentid"])){
            $error = true;
            $error_studentid = "Invalid Student ID";
        }
        else{
            $arr_studentid = str_split($_POST["studentid"]);
            //courseid like C4001,c4,C40009,c400000002
            if($arr_studentid[0] == 'S' || $arr_studentid[0] == 's'){
                $counter1 = 0;
                $counter2 = 0;
                foreach($arr_studentid as $as){
                    if($as >= 'A' && $as <= 'Z'){
                        $counter1++;
                    }
                    else if($as >= 'a' && $as <= 'z'){
                        $counter1++;
                    }
                    else if(is_numeric($as)){
                        $counter2++;
                    }
                }
                if($counter1 > 1 || $counter2 < 1){
                    $error = true;
                    $error_studentid = "Invalid Student ID";
                }
                else{
                    $studentid = $_POST["studentid"];
                }
            }
            else{
                $error = true;
                $error_studentid = "Invalid Student ID";
            }
        }
    }
    if(isset($_POST["enterteacher"])){
        if(empty($_POST["teacherid"])){
            $error = true;
            $error_teacherid = "Invalid Teacher ID";
        }
        else{
            $arr_teacherid = str_split($_POST["teacherid"]);
            //courseid like C4001,c4,C40009,c400000002
            if($arr_teacherid[0] == 'T' || $arr_teacherid[0] == 't'){
                $counter3 = 0;
                $counter4 = 0;
                foreach($arr_teacherid as $at){
                    if($at >= 'A' && $at <= 'Z'){
                        $counter3++;
                    }
                    else if($at >= 'a' && $at <= 'z'){
                        $counter3++;
                    }
                    else if(is_numeric($at)){
                        $counter4++;
                    }
                }
                if($counter3 > 1 || $counter4 < 1){
                    $error = true;
                    $error_teacherid = "Invalid Teacher ID";
                }
                else{
                    $teacherid = $_POST["teacherid"];
                }
            }
            else{
                $error = true;
                $error_teacherid = "Invalid Teacher ID";
            }
        }
    }
    if(isset($_POST["enteradmin"])){
        if(empty($_POST["adminid"])){
            $error = true;
            $error_adminid = "Invalid Admin ID";
        }
        else{
            $arr_adminid = str_split($_POST["adminid"]);
            //courseid like C4001,c4,C40009,c400000002
            if($arr_adminid[0] == 'A' || $arr_adminid[0] == 'a'){
                $counter5 = 0;
                $counter6 = 0;
                foreach($arr_adminid as $aa){
                    if($aa >= 'A' && $aa <= 'Z'){
                        $counter5++;
                    }
                    else if($aa >= 'a' && $aa <= 'z'){
                        $counter5++;
                    }
                    else if(is_numeric($aa)){
                        $counter6++;
                    }
                }
                if($counter5 > 1 || $counter6 < 1){
                    $error = true;
                    $error_adminid = "Invalid Admin ID";
                }
                else{
                    $adminid = $_POST["adminid"];
                }
            }
            else{
                $error = true;
                $error_adminid = "Invalid Admin ID";
            }
        }
    }
?>
<html>
    <head>
    
    </head>
    <body>
        <form action = "" method = "POST">
            <table align="center">
                <tr>
                    <td align="center">
                        <img src="./student_logo.png" alt="Student logo" width="194" height="217">
                    </td>
                    <td align="center">
                        <img src="./space.png">
                    </td>
                    <td align="center">
                        <img src="./teacher_logo.png" alt="Teacher logo" width="194" height="217">
                    </td>
                    <td align="center">
                        <img src="./space.png">
                    </td>
                    <td align="center">
                        <img src="./admin_logo.png" alt="Admin logo" width="194" height="217">
                    </td>
                </tr>
                <tr>
                    <td align="center"><input type="text" name="studentid" placeholder="Enter Student ID" value="<?php echo $studentid;?>"> <input type="submit" name="enterstudent" value="Enter"></td>
                    <td></td>
                    <td align="center"><input type="text" name="teacherid" placeholder="Enter Teacher ID" value="<?php echo $teacherid;?>"> <input type="submit" name="enterteacher" value="Enter"></td>
                    <td></td>
                    <td align="center"><input type="text" name="adminid" placeholder="Enter Admin ID" value="<?php echo $adminid;?>"> <input type="submit" name="enteradmin" value="Enter"></td>
                </tr>
                <tr>
                    <td align="center"><?php echo $error_studentid;?></td>
                    <td></td>
                    <td align="center"><?php echo $error_teacherid;?></td>
                    <td></td>
                    <td align="center"><?php echo $error_adminid;?></td>
                </tr>
            </table>
        </form>
    </body>
</html>