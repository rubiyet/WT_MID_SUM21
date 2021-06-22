<?php
    $courseid = "";
    $error_courseid = "";
    $coursename = "";
    $error_coursename = "";
    $class = "";
    $error_class = "";
    $section = "";
    $error_section = "";
    $year = "";
    $error_year = "";
    $teacherid = "";
    $error_teacherid = "";

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
            $letter=0;
            $number=0;
            $arr = str_split($_POST["coursename"]);
            foreach($arr as $a){
                if($a >= 'A' && $a <= 'Z')
                    $letter++;
                else if($a >= 'a' && $a <= 'z')
                    $letter++;
                else if($a >= 0)
                    $number++;
            }
            if($number >= 1){
                $error_coursename = "Course name must be contain only Letter";
            }
            else{
                $coursename = $_POST["coursename"];
            }
        } 
        if(empty($_POST["class"])){
            $error = true;
            $error_class = "Must Be need Class";
        }
        else if(is_numeric($_POST["class"]) == false){
            $error = true;
            $error_class = "Class must be contain only number";
        }
        else{
            $class = $_POST["class"];
        }
        if(empty($_POST["section"])){
            $error = true;
            $error_section = "Must Be need Section";
        }
        else if(strlen($_POST["section"]) > 1){
            $error = true;
            $error_section = "Section must be contain only 1 letter";
        }
        else{
            $letter1 = 0;
            $number1 = 0;
            $arr1 = str_split($_POST["section"]);
            foreach($arr1 as $a){
                if($a >= 'A' && $a <= 'Z')
                    $letter1++;
                else if($a >= 'a' && $a <= 'z')
                    $letter1++;
                else if($a >= 0)
                    $number1++;
            }
            if($number1 >= 1){
                $error_section = "Section must be contain only 1 Letter";
            }
            else{
                $section = $_POST["section"];
            }
        }
        if(empty($_POST["year"])){
            $error = true;
            $error_year = "Must Need Year";
        }
        else if(is_numeric($_POST["year"]) == false){
            $error = true;
            $error_year = "Year must be contain only number";
        }
        else{
            $year = $_POST["year"];
        }
        if(empty($_POST["teacherid"])){
            $error = true;
            $error_teacherid = "Must Need Teacher ID";
        }
        else if(is_numeric($_POST["teacherid"]) == false){
            $error = true;
            $error_teacherid = "Teacher ID must be contain only number";
        }
        else{
            $teacherid = $_POST["teacherid"];
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
                    <td align="right">
                        Section: 
                    </td>
                    <td>
                        <input type="text" name="section" value="<?php echo $section?>">
                    </td>
                    <td><span><?php echo $error_section;?></span></td>
                </tr>
                <tr>
                    <td align="right">
                        Year: 
                    </td>
                    <td>
                        <input type="text" name="year" value="<?php echo $year?>">
                    </td>
                    <td><span><?php echo $error_year;?></span></td>
                </tr>
                <tr>
                    <td align="right">
                        Teacher ID: 
                    </td>
                    <td>
                        <input type="text" name="teacherid" value="<?php echo $teacherid?>">
                    </td>
                    <td><span><?php echo $error_teacherid;?></span></td>
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