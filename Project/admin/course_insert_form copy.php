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

    if(isset($_POST["insert"])){
        if(empty($_POST["courseid"])){
			$error = true;
            $error_courseid = "Must Need Course ID";
		}
		else if(strlen($_POST["courseid"]) != 7){
			$error = true;
			$error_courseid = "Course ID must be 7 character.";
		}
		else{
			$hypen = 0;
			$number = 0;
			$bug =0;
			$arr_courseid = str_split($_POST["courseid"]);
            if(strlen($_POST["courseid"]) == 7){
                if($arr_courseid[2] == "-"){
                    foreach($arr_courseid as $aa){
                        if($aa == "-"){
                            $hypen++;
                        }
                        else if($aa >= 0){
                            $number++;
                        }
                        else{
                            $bug++;
                        }
                    }
                }
                else{
                    $error = true;
                    $error_courseid = "Course Id like as (**-4***)";
                }
                if($arr_courseid[3] != "4"){
                    $error = true;
                    $error_courseid = "Course Id like as (**-4***)";
                }
            }
			if($hypen > 1 || $bug > 0){
				$error = true;
				$error_courseid = "Course Id like as (**-4***)";
			}
			else{
				$courseid = $_POST["courseid"];
			}	
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
        else if($_POST["class"] >= 1 && $_POST["class"] >= 10){
            $error = true;
            $error_class = "Class must be contain 1 to 10";
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
            $error_section = "Section must be contain only one letter";
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
                $error_section = "Section must be contain only one Letter";
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
        else{
            $arr_teacherid = str_split($_POST["teacherid"]);
            //courseid like C4001,c4,C40009,c400000002
            if($arr_teacherid[0] == 'T' || $arr_teacherid[0] == 't'){
                $counter5 = 0;
                $counter6 = 0;
                foreach($arr_teacherid as $at){
                    if($at >= 'A' && $at <= 'Z'){
                        $counter5++;
                    }
                    else if($at >= 'a' && $at <= 'z'){
                        $counter5++;
                    }
                    else if(is_numeric($at)){
                        $counter6++;
                    }
                }
                if($counter5 > 1 || $counter6 < 1){
                    $error = true;
                    $error_teacherid = "Only First Index of Teacher ID must be Letter as T/t then only number.";
                }
                else{
                    $teacherid = $_POST["teacherid"];
                }
            }
            else{
                $error = true;
                $error_teacherid = "Only First Index of Teacher ID must be Letter as T/t then only number.";
            }
        } 
    }
?>
<html>
    <head>
    
    </head>
    <body>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>
                        <h1>COURSE INSERT</h1>
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
                    <td><?php echo $error_coursename;?></td>
                </tr>
                <tr>
                    <td align="right">
                        Class: 
                    </td>
                    <td>
                        <input type="text" name="class" value="<?php echo $class?>">
                    </td>
                    <td><?php echo $error_class;?></td>
                </tr>
                <tr>
                    <td align="right">
                        Section: 
                    </td>
                    <td>
                        <input type="text" name="section" value="<?php echo $section?>">
                    </td>
                    <td><?php echo $error_section;?></td>
                </tr>
                <tr>
                    <td align="right">
                        Year: 
                    </td>
                    <td>
                        <input type="text" name="year" value="<?php echo $year?>">
                    </td>
                    <td><?php echo $error_year;?></td>
                </tr>
                <tr>
                    <td align="right">
                        Teacher ID: 
                    </td>
                    <td>
                        <input type="text" name="teacherid" value="<?php echo $teacherid?>">
                    </td>
                    <td><?php echo $error_teacherid;?></td>
                </tr>
                <tr>
                    <td></td>
                    <td align="center">
                        <input type="Submit" name="insert" value="Insert">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>