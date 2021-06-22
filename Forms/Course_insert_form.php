<?php
    $courseid = "";
    $error_courseid = "";
    $coursename = "";
    $error_coursename = "";
    $class = "";
    $error_class = "";

    $error = false;

    if(isset($_POST["submit"])){
        if(empty($_POST["courseid"])){
            $error = true;
            $error_courseid = "Must Need Course ID";
        }
        else if(is_numeric($_POST["courseid"]) == false){
            $error = true;
            $error_courseid = "Course ID must be contain only number";
        }
        else{
            $courseid = $_POST["courseid"];
        }
        if(empty($_POST["coursename"])){
            $error = true;
            $error_coursename = "Must be need Course Name";
        }
        else if(strlen($_POST["coursename"]) < 2){
            $error = true;
            $error_coursename = "Course name must be greater then 1 letter";
        }
        else{
            $letter = 0;
            $number = 0;
            $arr = str_split($_POST["coursename"]);
            foreach($arr as $a){
                if($a >= "A" && $a <= "Z" && $a >= "a" && $a <= "z"){
                    $letter++;
                }
                else{
                    $number++;
                }
            }
            if($number > 0){
                $error_coursename = "Course ID must be contain only Letter";
            }
            else{
                $coursename = $_POST["coursename"];
            }
        }  
    }
?>
<html>
    <head></head>
    <body>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>
                        <h1>Course Insert</h1>
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        Course ID: 
                    </td>
                    <td>
                        <input type="text" name="courseid" value="<?php echo $courseid?>">
                    </td>
                    <td><span><?php echo $error_courseid;?></span></td>
                </tr>
                <tr>
                    <td align="right">
                        Course Name: 
                    </td>
                    <td>
                        <input type="text" name="coursename" value="<?php echo $coursename?>">
                    </td>
                    <td><span><?php echo $error_coursename;?></span></td>
                </tr>
                <tr>
                    <td align="right">
                        Class: 
                    </td>
                    <td>
                        <input type="text" name="class" value="<?php echo $class?>">
                    </td>
                    <td><span><?php echo $error_class;?></span></td>
                </tr>
                <tr>
                    <td></td>
                    <td align="center">
                        <input type="Submit" name="submit" value="Insert">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>