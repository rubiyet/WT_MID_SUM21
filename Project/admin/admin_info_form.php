<?php
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


    $error = false;

    $day = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31);
	$month = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
	$year = array(1997,1998,1999,2000,2001,2002,2003,2004,2005,2006,2007,2008,2009,2010,2011,2012,2013,2014,2015,2016,2017,2018,2019,2020,2021);
    $nationality = array("America","Bangladesh","India","Pakisthan","Uganda");
    $religion = array("Muslim","Hindu","Buddhist","Chrustian","other");
    $bloodgroup = array("AB+","AB-","A+","A-","B+","B-","O+","O-");

    if(isset($_POST["insert"])){
        if(empty($_POST["adminid"])){
            $error = true;
            $error_adminid = "Must Need Admin ID";
        }
        else{
            $arr_adminid = str_split($_POST["adminid"]);
            //adminid like A4001,a4,A40009,a400000002
            if($arr_adminid[0] == 'A' || $arr_adminid[0] == 'a'){
                $counter = 0;
                $counter1 = 0;
                foreach($arr_adminid as $aa){
                    if($aa >= 'A' && $aa <= 'Z'){
                        $counter++;
                    }
                    else if($aa >= 'a' && $aa <= 'z'){
                        $counter++;
                    }
                    else if(is_numeric($aa)){
                        $counter1++;
                    }
                }
                if($counter > 1 || $counter1 < 1){
                    $error = true;
                    $error_adminid = "Only First Index of Admin ID must be Letter as A/a then only number.";
                }
                else{
                    $adminid = $_POST["adminid"];
                }
            }
            else{
                $error = true;
                $error_adminid = "Only First Index of Admin ID must be Letter as A/a then only number.";
            }
        } 
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
            $letter4 = 19;
            $number4 = 0;
            $atsign = 2;
            $fullstop = 1;
            $bug = 1;
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
            $inputnationlity = $_POST["inputnationality"];
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
    }
    if(isset($_POST["sameaspresentaddress"])){
        $hide = 1;
    }

    if(isset($_POST["clear"])){
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
?>
<html>
    <head>

    </head>
    <body>
        <form action = "" method = "POST">
            <table>
                <tr>
                    <td><h1>ADMIN PERSONAL INFORMATION INSERT</h1> </td>
                </tr>
                <tr>
                    <td align="right">Admin ID: </td>
                    <td><input type="text" name="adminid" placeholder="A1001"value="<?php echo $adminid; ?>"></td>
                    <td><?php echo $error_adminid?></td>
                </tr>
                <tr>
                    <td align="right">
                        Name: 
                    </td>
                    <td>
                        <input type="text" name="name" value="<?php echo $name?>">
                    </td>
                    <td><?php echo $error_name;?></td>
                </tr>
                <tr>
                    <td align="right">
                        Salary: 
                    </td>
                    <td>
                        <input type="text" name="salary" value="<?php echo $salary?>">
                    </td>
                    <td><?php echo $error_salary;?></td>
                </tr>
                <tr>
					<td align="right">
                        Email:
                    </td>
					<td>
                        <input type="text" name="email" placeholder="someone@gmail.com"value="<?php echo $email; ?>" >
                    </td>
					<td><?php echo $error_email;?></td>
				</tr>
                <tr>
					<td align="right">
                        Gender:
                    </td>
					<td>
                        <input type="radio" value="Male" <?php if($gender=="Male") echo "checked"; ?> name="gender"> Male <input name="gender" <?php if($gender=="Female") echo "checked"; ?> value="Female" type="radio"> Female 
                    </td>
					<td><?php echo $error_gender;?></td>
				</tr>
				<tr>
					<td align="right">
                    Birth Date:
                    </td>
					<td>
                        <select name="inputbdday"><option disabled selected>Day</option><?php foreach($day as $d){if($d == $inputbdday) echo "<option selected>$d</option>"; else echo "<option>$d</option>";}?></select> <select name="inputbdmonth"><option disabled selected>Month</option><?php foreach($month as $m){if($m == $inputbdmonth) echo "<option selected>$m</option>"; else  echo "<option>$m</option>";}?></select> <select name="inputbdyear"><option disabled selected>Year</option><?php foreach($year as $y){if($y == $inputbdyear) echo "<option selected>$y</option>"; else  echo "<option>$y</option>";}?></select>
                    </td>   
					<td><?php echo $error_inputbddaymonthyear;?></td>
				<tr>
                <tr>
                    <td align="right">
                        Nationality: 
                    </td>
                    <td>
                    <select name="inputnationality"><option disabled selected>Select</option><?php foreach($nationality as $n){if($n == $inputnationlity) echo "<option selected>$n</option>"; else echo "<option>$n</option>";}?></select>
                    </td>
                    <td><?php echo $error_nationality;?></td>
                </tr>
                <tr>
                    <td align="right">
                        Religion: 
                    </td>
                    <td>
                        <select name="inputreligion"><option disabled selected>Select</option><?php foreach($religion as $r){if($r == $inputreligion) echo "<option selected>$r</option>"; else echo "<option>$r</option>";}?></select>
                    </td>
                    <td><?php echo $error_religion;?></td>
                </tr>
                <tr>
					<td align="right">
                        Blood Group:
                    </td>
					<td>
                    <select name="inputbloodgroup"><option disabled selected>Select</option><?php foreach($bloodgroup as $bg){if($bg == $inputbloodgroup) echo "<option selected>$bg</option>"; else echo "<option>$bg</option>";}?></select>
                    </td>
					<td><?php echo $error_inputbloodgroup;?></td>
				</tr>
                <tr>
                    <td align="right">
                        Father Name: 
                    </td>
                    <td>
                        <input type="text" name="fathername" value="<?php echo $fathername?>">
                    </td>
                    <td><?php echo $error_fathername;?></td>
                </tr>
                <tr>
                    <td align="right">
                        Mother Name: 
                    </td>
                    <td>
                        <input type="text" name="mothername" value="<?php echo $mothername?>">
                    </td>
                    <td><?php echo $error_mothername;?></td>
                </tr>
                <tr>
					<td align="right">
                    Joining Date:
                    </td>
					<td>
                        <select name="inputjday"><option disabled selected>Day</option><?php foreach($day as $d){if($d == $inputjday) echo "<option selected>$d</option>"; else echo "<option>$d</option>";}?></select> <select name="inputjmonth"><option disabled selected>Month</option><?php foreach($month as $m){if($m == $inputjmonth) echo "<option selected>$m</option>"; else  echo "<option>$m</option>";}?></select> <select name="inputjyear"><option disabled selected>Year</option><?php foreach($year as $y){if($y == $inputjyear) echo "<option selected>$y</option>"; else  echo "<option>$y</option>";}?></select>
                    </td>   
					<td><?php echo $error_inputjdaymonthyear;?></td>
				<tr>
                <tr>
					<td align="right">
                    Left Date:
                    </td>
					<td>
                        <select name="inputlday"><option disabled selected>Day</option><?php foreach($day as $d){if($d == $inputlday) echo "<option selected>$d</option>"; else echo "<option>$d</option>";}?></select> <select name="inputlmonth"><option disabled selected>Month</option><?php foreach($month as $m){if($m == $inputlmonth) echo "<option selected>$m</option>"; else  echo "<option>$m</option>";}?></select> <select name="inputlyear"><option disabled selected>Year</option><?php foreach($year as $y){if($y == $inputlyear) echo "<option selected>$y</option>"; else  echo "<option>$y</option>";}?></select>
                    </td>   
					<td><?php echo $error_inputldaymonthyear;?></td>
				<tr>
                <tr>
                    <td align="right">
                        Qualification:
                    </td>
                    <td><input type="checkbox" name="qualifications[]" value="SSC" <?php foreach($qualifications as $qu){if($qu == "SSC") echo "checked";} ?>> SSC <input type="checkbox" name="qualifications[]" value="HSC" <?php foreach($qualifications as $qu){if($qu == "HSC") echo "checked";} ?>> HSC <input type="checkbox" name="qualifications[]" value="Other" <?php foreach($qualifications as $qu){if($qu == "Other") echo "checked";} ?>> Other</td>
                    <td><?php echo $error_qualifications;?></td>
                </tr>
                <tr>
                    <td align="right">
                        Present Address: 
                    </td>
                    <td>
                        <input type="text" name="presentaddress" value="<?php echo $presentaddress?>">
                    </td>
                    <td><?php echo $error_presentaddress;?></td>
                </tr>
                <tr>
                    <td align="right">
                        Parmanent address: 
                    </td>
                    <td>
                        <input type="checkbox" name="sameaspresentaddress" <?php if($presentaddress != ""){if($presentaddress == $parmanentaddress) echo "checked";}?>> Same as present address <br>
                        <input type="text" name="parmanentaddress" value="<?php echo $parmanentaddress?>" <?php if($hide == 1) echo "disabled";?>>
                    </td>
                    <td><?php echo $error_parmanentaddress;?></td>
                </tr>
                <tr>
                    <td align="right">
                        Contact Number: 
                    </td>
                    <td>
                        <input type="text" name="contactnumber" value="<?php echo $contactnumber?>">
                    </td>
                    <td><?php echo $error_contactnumber;?></td>
                </tr>
                <tr>
                    <td></td>
                    <td align="center">
                        <input type="submit" name="insert" value="Insert"> <input type="submit" name="clear" value="Clear">
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>