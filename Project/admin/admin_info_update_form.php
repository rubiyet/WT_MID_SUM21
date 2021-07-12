<?php

    include '../db_config.php';

    $adminid = "";
    $error_adminid = "";
    $name = "";
    $error_name = "";
    $salary = "";
    $error_salary = "";
    $email = "";
    $error_email = "";
    $gender ="";
    $error_gender = "";
    $inputbdday="";
	$inputbdmonth="";
	$inputbdyear="";
	$error_inputbddaymonthyear="";
    $inputnationality = "";
    $error_nationality = "";
    $inputreligion = "";
    $error_religion = "";
    $inputbloodgroup = "";
    $error_inputbloodgroup = "";
    $fathername = "";
    $error_fathername = "";
    $mothername = "";
    $error_mothername = "";
    $inputjday = "";
    $inputjmonth = "";
    $inputjyear = "";
    $error_inputjdaymonthyear = "";
    $inputlday = "";
    $inputlmonth = "";
    $inputlyear = "";
    $qualifications = array();
    $error_qualifications = "";
    $error_inputldaymonthyear = "";
    $presentaddress = "";
    $error_presentaddress = "";
    $parmanentaddress = "";
    $error_parmanentaddress = "";
    $hide = 0;
    $contactnumber = "";
    $error_contactnumber = "";
    $filename = "";
    $folder = "";
    $error_img = "";
    $error_massage1 = "";
    $error_massage2 = "";

    $error = false;
    $error1 = false;

    $day = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31);
	$month = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
	$year = array(1997,1998,1999,2000,2001,2002,2003,2004,2005,2006,2007,2008,2009,2010,2011,2012,2013,2014,2015,2016,2017,2018,2019,2020,2021);
    $nationality = array("America","Bangladesh","India","Pakisthan","Uganda");
    $religion = array("Muslim","Hindu","Buddhist","Chrustian","other");
    $bloodgroup = array("AB+","AB-","A+","A-","B+","B-","O+","O-");

    if(isset($_POST["enter"])){
        if(empty($_POST["adminid"])){
			$error1 = true;
			$error_adminid = "Admin ID required.";
		}
		else if(strlen($_POST["adminid"]) != 7){
			$error1 = true;
			$error_adminid = "Admin Id must be 7 character.";
		}
		else{
			$hypen = 0;
			$number = 0;
			$bug =0;
			$arr_adminid = str_split($_POST["adminid"]);
            if(strlen($_POST["adminid"]) == 7){
                if($arr_adminid[2] == "-"){
                    foreach($arr_adminid as $aa){
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
                    $error1 = true;
                    $error_adminid = "Admin Id like as (**-1***)";
                }
                if($arr_adminid[3] != "1"){
                    $error1 = true;
                    $error_adminid = "Admin Id like as (**-1***)";
                }
            }
			if($hypen > 1 || $bug > 0){
				$error1 = true;
				$error_adminid = "User Id like as (**-1***)";
			}
			else{
				$adminid = $_POST["adminid"];
			}	
		}
        if(!$error1){
            $query =  "select * from admin where userid = '$adminid'";
            if($connect){
                if($connectqurey = mysqli_query($connect,$query)){
                    if($admin = mysqli_fetch_assoc($connectqurey)){
                        $id = $admin["id"];
                        $name = $admin["name"];
                        $salary = $admin["salary"];
                        $email = $admin["email"];
                        $gender = $admin["gender"];
                        $birthday = $admin["birthday"];
                        $birthdayarray = explode(" ",$birthday);
                        $inputbdday = $birthdayarray[0];
                        $inputbdmonth = $birthdayarray[1];
                        $inputbdyear = $birthdayarray[2];
                        $inputnationality = $admin["nationality"];
                        $inputreligion = $admin["religion"];
                        $inputbloodgroup = $admin["bloodgroup"];
                        $fathername = $admin["fathername"];
                        $mothername = $admin["mothername"];
                        $joiningdate = $admin["joiningdate"];
                        $joiningdatearray = explode(" ",$joiningdate);
                        $inputjday = $joiningdatearray[0];
                        $inputjmonth = $joiningdatearray[1];
                        $inputjyear = $joiningdatearray[2];
                        $leftdate = $admin["leftdate"];
                        $leftdatearray = explode(" ",$leftdate);
                        $inputlday = $leftdatearray[0];
                        $inputlmonth = $leftdatearray[1];
                        $inputlyear = $leftdatearray[2];
                        $qualificationsarray = $admin["qualification"];
                        $qualifications = explode(" ",$qualificationsarray);
                        $presentaddress = $admin["presentaddress"];
                        $parmanentaddress = $admin["parmanentaddress"];
                        $contactnumber = $admin["contactnumber"];
                        $image = $admin["img"];
                    }
                }
                else{
                    echo mysqli_errno($connect);
                }
            }
            else{
                echo mysqli_errno($connect);
            }
        }
    }

    if(isset($_POST["insert"])){
        $userid= $admin["userid"];;
        if(empty($_POST["name"])){
            $error = true;
            $error_name = "Must be need Name";
        }
        else if(strlen($_POST["name"]) < 3){
            $error = true;
            $error_name = "Name must be greater then 2 letter";
        }
        else{
            $letter=0;
            $number=0;
            $arr_name = str_split($_POST["name"]);
            foreach($arr_name as $an){
                if($an >= 'A' && $an <= 'Z')
                    $letter++;
                else if($an >= 'a' && $an <= 'z')
                    $letter++;
                else if(is_numeric($an))
                    $number++;
            }
            if($number >= 1){
                $error = true;
                $error_name = "Name must be contain only Letter";
            }
            else{
                $name = $_POST["name"];
            }
        }
        if(empty($_POST["salary"])){
            $error = true;
            $error_salary = "Must be need Salary";
        } 
        else if(is_numeric($_POST["salary"]) == false){
            $error = true;
            $error_salary = "Salary must be contain only number";
        }
        else{
            $salary = $_POST["salary"];
        }
        if(empty($_POST["email"])){
			$error = true;
			$error_email = "Must be need email";
		}
        else if(strpos($_POST["email"], "@gmail.com") == false){
            $hasError = true;
			$error_email = "Email must contain someone@gmail.com";
        }
        else{
            $letter4 = 0;
            $number4 = 0;
            $atsign = 0;
            $fullstop = 0;
            $bug = 0;
            $arr_email = str_split($_POST["email"]);
            foreach($arr_email as $ae){
                if($ae >= "a" && $ae <= "z")
                    $letter4++;
                else if(is_numeric($ae))
                    $number++;
                else if($ae == "@")
                    $atsign++;
                else if($ae == ".")
                    $fullstop++;
                else
                    $bug++;
            }
            if($atsign > 1 || $bug > 0){
                $error_email = "Sorry, someone only letters (a-z), numbers (0-9), and periods (.) are allowed.";
            }
            else{  
                $email=$_POST["email"];
            }
        }
        if(!isset($_POST["gender"])){
			$error = true;
			$error_gender = "Gender Must be Required";
		}
		else{
			$gender = $_POST["gender"];
		}
        if (!isset($_POST["inputbdday"]) || !isset($_POST["inputbdmonth"]) || !isset($_POST["inputbdyear"])){
			$error = true;
			$error_inputbddaymonthyear = "Birth Day, Month & Year Required";
		}
		else{
			$inputbdday = $_POST["inputbdday"];
			$inputbdmonth = $_POST["inputbdmonth"];
			$inputbdyear = $_POST["inputbdyear"];
		}
        if(empty($_POST["inputnationality"])){
            $error = true;
            $error_nationality = "Must be need Nationality";
        }
        else{
            $inputnationality = $_POST["inputnationality"];
        }
        if(empty($_POST["inputreligion"])){
            $error = true;
            $error_religion = "Must be need religion";
        }
        else{
            $inputreligion = $_POST["inputreligion"];
        }
        
        if(!isset($_POST["inputbloodgroup"])){
			$error = true;
			$error_inputbloodgroup="Blood Group Must be Required";
		}
		else{
			$inputbloodgroup = $_POST["inputbloodgroup"];
		}
        if(empty($_POST["fathername"])){
            $error = true;
            $error_fathername = "Must be need Father Name";
        }
        else if(strlen($_POST["fathername"]) < 3){
            $error = true;
            $error_fathername = "Father Name must be greater then 2 letter";
        }
        else{
            $letter5=0;
            $number5=0;
            $arr_fathername = str_split($_POST["fathername"]);
            foreach($arr_fathername as $afn){
                if($afn >= 'A' && $afn <= 'Z')
                    $letter5++;
                else if($afn >= 'a' && $afn <= 'z')
                    $letter5++;
                else if(is_numeric($afn))
                    $number5++;
            }
            if($number5 >= 1){
                $error = true;
                $error_fathername = "Father Name must be contain only Letter";
            }
            else{
                $fathername = $_POST["fathername"];
            }
        }
        if(empty($_POST["mothername"])){
            $error = true;
            $error_mothername = "Must be need Mother Name";
        }
        else if(strlen($_POST["mothername"]) < 3){
            $error = true;
            $error_mothername = "Mother Name must be greater then 2 letter";
        }
        else{
            $letter6=0;
            $number6=0;
            $arr_mothername = str_split($_POST["mothername"]);
            foreach($arr_mothername as $amn){
                if($amn >= 'A' && $amn <= 'Z')
                    $letter6++;
                else if($amn >= 'a' && $amn <= 'z')
                    $letter6++;
                else if(is_numeric($amn))
                    $number6++;
            }
            if($number6 >= 1){
                $error = true;
                $error_mothername = "Mother Name must be contain only Letter";
            }
            else{
                $mothername = $_POST["mothername"];
            }
        }
        if (!isset($_POST["inputjday"]) || !isset($_POST["inputjmonth"]) || !isset($_POST["inputjyear"])){
			$error = true;
			$error_inputjdaymonthyear="Join Day, Month & Year Required";
		}
		else{
			$inputjday = $_POST["inputjday"];
			$inputjmonth = $_POST["inputjmonth"];
			$inputjyear = $_POST["inputjyear"];
		}
        if (!isset($_POST["inputlday"]) || !isset($_POST["inputlmonth"]) || !isset($_POST["inputlyear"])){
			$error = true;
			$error_inputldaymonthyear="Left Day, Month & Year Required";
		}
		else{
			$inputlday = $_POST["inputlday"];
			$inputlmonth = $_POST["inputlmonth"];
			$inputlyear = $_POST["inputlyear"];
		}
        if(empty($_POST["presentaddress"])){
			$error = true;
			$error_presentaddress ="Present Address Must be Required";
		}
		else{
			$presentaddress = $_POST["presentaddress"];
		}
        if(isset($_POST["sameaspresentaddress"])){
            $parmanentaddress = $_POST["presentaddress"];
		}
        if(empty($_POST["parmanentaddress"]) && !isset($_POST["sameaspresentaddress"])){
			$error = true;
			$error_parmanentaddress ="Parmanent Address Must be Required";
		}
        else if(!empty($_POST["parmanentaddress"]) && !isset($_POST["sameaspresentaddress"])){
			$parmanentaddress = $_POST["parmanentaddress"];
		}

        if(empty($_POST["contactnumber"])){
            $error = true;
            $error_contactnumber = "Contact Number Must be Required";
        }
        else if(!is_numeric($_POST["contactnumber"])){
            $error = true;
            $error_contactnumber = "Contact Number Must be Number";
        }
        else{
            $contactnumber = $_POST["contactnumber"];
        }
        if(empty($_POST["qualifications"])){
            $error = true;
            $error_qualifications = "Qualification must be Required";
        }
        else{
            $qualifications = $_POST["qualifications"];
        }
        if(isset($_FILES['image'])){
            $filename = $_FILES['image']['name'];
            $filesize =$_FILES['image']['size'];
            $filetmp =$_FILES['image']['tmp_name'];
            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $arr_ext = array("png","jpg","jpeg");

            if(empty($filename)){
                $error = true;
                $error_img = "Image required";
            }
            else if (!in_array($ext,$arr_ext)) {
                $error = true;
                $error_img = "Please choose only png, jpg or jpeg file";
            }
            else if($filesize > 524288){
                $error = true;
                $error_img = 'File size must be excately .5 MB or 512 KB';
            }
            else{
                move_uploaded_file($filetmp,"image/admin/".$filename);
            }   
        }
        if(!$error){
            $birthday = $inputbdday." ".$inputbdmonth." ".$inputbdyear;
            $joiningdate = $inputjday." ".$inputjmonth." ".$inputjyear;
            $leftdate = $inputlday." ".$inputlmonth." ".$inputlyear;
            $qualificationsstring = implode(", ",$qualifications);
            //$query = "insert into admin values(Null,'$adminid','$name','$salary','$email','$gender','$birthday','$inputnationality','$inputreligion','$inputbloodgroup','$fathername','$mothername','$joiningdate','$leftdate','$qualificationsstring','$presentaddress','$parmanentaddress','$contactnumber','$filename')";
            if($connect){
                if(mysqli_query($connect,$query)){
                    $error_massage2 = "Successfully added Admin ID ".$adminid;
                    $adminid = "";
                    $error_adminid = "";
                    $name = "";
                    $error_name = "";
                    $salary = "";
                    $error_salary = "";
                    $email = "";
                    $error_email = "";
                    $gender ="";
                    $error_gender = "";
                    $inputbdday="";
                    $inputbdmonth="";
                    $inputbdyear="";
                    $error_inputbddaymonthyear="";
                    $inputnationality = "";
                    $error_nationality = "";
                    $inputreligion = "";
                    $error_religion = "";
                    $inputbloodgroup = "";
                    $error_inputbloodgroup = "";
                    $fathername = "";
                    $error_fathername = "";
                    $mothername = "";
                    $error_mothername = "";
                    $inputjday = "";
                    $inputjmonth = "";
                    $inputjyear = "";
                    $error_inputjdaymonthyear = "";
                    $inputlday = "";
                    $inputlmonth = "";
                    $inputlyear = "";
                    $qualifications = array();
                    $error_qualifications = "";
                    $error_inputldaymonthyear = "";
                    $presentaddress = "";
                    $error_presentaddress = "";
                    $parmanentaddress = "";
                    $error_parmanentaddress = "";
                    $contactnumber = "";
                    $error_contactnumber = "";
                }
                else{
                    if(mysqli_errno($connect) == 1062){
                        $error_massage1 = "Admin ID ".$adminid." already exists";
                    }
                }
            }
            else{
                $error_massage1 = mysqli_errno($connect);
            }
        }
    }
    if(isset($_POST["sameaspresentaddress"])){
        $hide = 1;
    }
?>
<html>
    <head>
        <link rel="stylesheet" href="admin_info_update_form.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
    </head>
    <body>
        <form action = "" method = "POST" enctype="multipart/form-data">
            <table id="table1">
                <tr>
                    <td colspan="3" id="title" valign="center">ADMIN PERSONAL INFORMATION UPDATE</td>
                </tr>
                <tr>
                    <td>
                        <table id="table3">
                        <form action = "" method = "POST" enctype="multipart/form-data">
                            <tr>
                                <td align="right" width="44%" id="subtitle">Admin ID: </td>
                                <td width=""><input type="text" name="adminid" placeholder="**-1***"value="<?php echo $adminid; ?>"></td>
                                <td><input type="submit" name="enter" value="Enter" id="button"></td>
                                <td width="45%"><?php echo $error_adminid?></td>
                            </tr>
                        </form>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <table id="table2">
                        <form action = "" method = "POST" enctype="multipart/form-data">
                            <tr>
                                <td align="right" id="subtitle" width="50%">Name: </td>
                                <td><input type="text" name="name" value="<?php if(!empty($name)){echo $name;}?>"></td>
                                <td width="50%"><?php echo $error_name;?></td>
                            </tr>
                            <tr>
                                <td align="right" id="subtitle">Salary: </td>
                                <td><input type="text" name="salary" value="<?php if(!empty($salary)){echo $salary;}?>"></td>
                                <td><?php echo $error_salary;?></td>
                            </tr>
                            <tr>
                                <td align="right" id="subtitle">Email: </td>
                                <td><input type="text" name="email" placeholder="someone@gmail.com"value="<?php echo $email; ?>" ></td>
                                <td><?php echo $error_email;?></td>
                            </tr>
                            <tr>
                                <td align="right" id="subtitle">Gender: </td>
                                <td><input type="radio" value="Male" <?php if($gender=="Male") echo "checked"; ?> name="gender"> <span id="subtitle1">Male</span> <input name="gender" <?php if($gender=="Female") echo "checked"; ?> value="Female" type="radio"> <span id="subtitle1">Female</span> </td>
                                <td><?php echo $error_gender;?></td>
                            </tr>
                            <tr>
                                <td align="right" id="subtitle">Birth Date: </td>
                                <td>
                                    <select name="inputbdday"><option disabled selected>Day</option><?php foreach($day as $d){if($d == $inputbdday) echo "<option selected>$d</option>"; else echo "<option>$d</option>";}?></select> <select name="inputbdmonth"><option disabled selected>Month</option><?php foreach($month as $m){if($m == $inputbdmonth) echo "<option selected>$m</option>"; else  echo "<option>$m</option>";}?></select> <select name="inputbdyear"><option disabled selected>Year</option><?php foreach($year as $y){if($y == $inputbdyear) echo "<option selected>$y</option>"; else  echo "<option>$y</option>";}?></select>
                                </td>   
                                <td><?php echo $error_inputbddaymonthyear;?></td>
                            <tr>
                            <tr>
                                <td align="right" id="subtitle">Nationality: </td>
                                <td><select name="inputnationality"><option disabled selected>Select</option><?php foreach($nationality as $n){if($n == $inputnationality) echo "<option selected>$n</option>"; else echo "<option>$n</option>";}?></select></td>
                                <td><?php echo $error_nationality;?></td>
                            </tr>
                            <tr>
                                <td align="right" id="subtitle">Religion: </td>
                                <td>
                                    <select name="inputreligion"><option disabled selected>Select</option><?php foreach($religion as $r){if($r == $inputreligion) echo "<option selected>$r</option>"; else echo "<option>$r</option>";}?></select>
                                </td>
                                <td><?php echo $error_religion;?></td>
                            </tr>
                            <tr>
                                <td align="right" id="subtitle">
                                    Blood Group:
                                </td>
                                <td>
                                <select name="inputbloodgroup"><option disabled selected>Select</option><?php foreach($bloodgroup as $bg){if($bg == $inputbloodgroup) echo "<option selected>$bg</option>"; else echo "<option>$bg</option>";}?></select>
                                </td>
                                <td><?php echo $error_inputbloodgroup;?></td>
                            </tr>
                            <tr>
                                <td align="right" id="subtitle">
                                    Father Name: 
                                </td>
                                <td>
                                    <input type="text" name="fathername" value="<?php echo $fathername?>">
                                </td>
                                <td><?php echo $error_fathername;?></td>
                            </tr>
                            <tr>
                                <td align="right" id="subtitle">
                                    Mother Name: 
                                </td>
                                <td>
                                    <input type="text" name="mothername" value="<?php echo $mothername?>">
                                </td>
                                <td><?php echo $error_mothername;?></td>
                            </tr>
                            <tr>
                                <td align="right" id="subtitle">
                                Joining Date:
                                </td>
                                <td>
                                    <select name="inputjday"><option disabled selected>Day</option><?php foreach($day as $d){if($d == $inputjday) echo "<option selected>$d</option>"; else echo "<option>$d</option>";}?></select> <select name="inputjmonth"><option disabled selected>Month</option><?php foreach($month as $m){if($m == $inputjmonth) echo "<option selected>$m</option>"; else  echo "<option>$m</option>";}?></select> <select name="inputjyear"><option disabled selected>Year</option><?php foreach($year as $y){if($y == $inputjyear) echo "<option selected>$y</option>"; else  echo "<option>$y</option>";}?></select>
                                </td>   
                                <td><?php echo $error_inputjdaymonthyear;?></td>
                            <tr>
                            <tr>
                                <td align="right" id="subtitle">
                                Left Date:
                                </td>
                                <td>
                                    <select name="inputlday"><option disabled selected>Day</option><?php foreach($day as $d){if($d == $inputlday) echo "<option selected>$d</option>"; else echo "<option>$d</option>";}?></select> <select name="inputlmonth"><option disabled selected>Month</option><?php foreach($month as $m){if($m == $inputlmonth) echo "<option selected>$m</option>"; else  echo "<option>$m</option>";}?></select> <select name="inputlyear"><option disabled selected>Year</option><?php foreach($year as $y){if($y == $inputlyear) echo "<option selected>$y</option>"; else  echo "<option>$y</option>";}?></select>
                                </td>   
                                <td><?php echo $error_inputldaymonthyear;?></td>
                            <tr>
                            <tr>
                                <td align="right" id="subtitle">
                                    Qualification:
                                </td>
                                <td><input type="checkbox" name="qualifications[]" value="SSC" <?php foreach($qualifications as $qu){if($qu == "SSC") echo "checked";} ?>> <span id="subtitle1">SSC</span> <input type="checkbox" name="qualifications[]" value="HSC" <?php foreach($qualifications as $qu){if($qu == "HSC") echo "checked";} ?>> <span id="subtitle1">HSC</span> <input type="checkbox" name="qualifications[]" value="Other" <?php foreach($qualifications as $qu){if($qu == "Other") echo "checked";} ?>> <span id="subtitle1">Other</span></td>
                                <td><?php echo $error_qualifications;?></td>
                            </tr>
                            <tr>
                                <td align="right" id="subtitle">
                                    Present Address: 
                                </td>
                                <td>
                                    <input type="text" name="presentaddress" value="<?php echo $presentaddress?>">
                                </td>
                                <td><?php echo $error_presentaddress;?></td>
                            </tr>
                            <tr>
                                <td align="right" id="subtitle">
                                    Parmanent address: 
                                </td>
                                <td>
                                    <input type="checkbox" name="sameaspresentaddress" <?php if($presentaddress != ""){if($presentaddress == $parmanentaddress) echo "checked";}?>> <span id="sameaspresentaddress">Same as present address</span> <br>
                                    <input type="text" name="parmanentaddress" value="<?php echo $parmanentaddress?>">
                                </td>
                                <td><?php echo $error_parmanentaddress;?></td>
                            </tr>
                            <tr>
                                <td align="right" id="subtitle">
                                    Contact Number: 
                                </td>
                                <td>
                                    <input type="text" name="contactnumber" value="<?php echo $contactnumber?>">
                                </td>
                                <td><?php echo $error_contactnumber;?></td>
                            </tr>
                            <tr>
                                <td align="right" id="subtitle">
                                    Image: 
                                </td>
                                <td>
                                    <input type="file" name="image" id="image">
                                </td>
                                <td><?php echo $error_img;?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td id="errormassage1"><?php if(!empty($error_massage1)){echo $error_massage1;}?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td id="errormassage2"><?php if(!empty($error_massage2)){echo $error_massage2;}?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td id="buttonbox">
                                    <input type="submit" name="insert" value="Insert" id="button">&emsp;<input type="submit" name="clear" value="Clear" id="button">
                                </td>
                            </tr>
                        </form>
                        </table>
                    </td>
                </tr>
            </table>
    </body>
</html>