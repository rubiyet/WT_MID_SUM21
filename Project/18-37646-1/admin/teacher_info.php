<?php
	$teacherid="";
	$error_teacherid="";
	$name="";
	$error_name="";
	$salary="";
	$error_salary="";
	$email="";
	$error_email="";
	$gender="";
	$error_gender="";
	$input_day="";
	$input_month="";
	$input_year="";
	$error_input_date_of_birth="";
	$nationality="";
	$error_nationality="";
	$religion="";
	$error_religion="";
	$blood_group="";
	$error_blood_group="";
	$father_name="";
	$error_father_name="";
	$mother_name="";
	$error_mother_name="";
	$join_day="";
	$join_month="";
	$join_year="";
	$error_join_date="";
	$left_day="";
	$left_month="";
	$left_year="";
	$error_left_date="";
	$qualifications=[];
	$error_qualifications="";
	$present_address="";
	$error_present_address="";
	$parmanent_address="";
	$error_parmanent_address="";
	$contact_number="";
	$error_contact_number="";
	
	
	$error = false;
	
	$year=array(2001,2002,2003,2004,2005,2006,2007,2008,2009,2010);
	$month=array("January","February","March","April","May","June","July","August","September","Octobeer","November","December");
	$day= array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31);
	$blood=array("AB+","AB-","O+","O-","A+","A-","B+","B-");
	
	function qualificationExist($qualification){
		global $qualifications;
		foreach($qualifications as $q){
			if($q == $qualification) return true;
		}
		return false;
	}
	
	if(isset($_POST["submit"])){
		if(empty($_POST["teacherid"])){
			$error = true;
			$error_teacherid = "need Teacher Id";
		}
		else if(is_numeric($_POST["teacherid"])==false){
			$error = true;
			$error_teacherid= "teacher id must be number";
		}
		else{
			$teacherid = $_POST["teacherid"];
		}
		if(empty($_POST["name"])){
            $error = true;
            $error_name = "Must be need Name";
        }
        else if(strlen($_POST["name"]) < 4){
            $error = true;
            $error_name = "Name is greater then 3 carecter";
        }
        else{
            $count=0;
            $num=0;
            $array_name = str_split($_POST["name"]);
            foreach($array_name as $n){
                if($n >= 'A' && $n <= 'Z')
                    $count++;
                else if($n >= 'a' && $n <= 'z')
                    $count++;
                else if($n >= 0)
                    $num++;
            }
            if($num >= 1){
                $error_name = "Name must be Letter";
            }
            else{
                $name = $_POST["name"];
			}
		}
		if(empty($_POST["salary"])){
			$error = true;
			$error_salary = "need salary";
		}
		else if(is_numeric($_POST["salary"])==false){
			$error = true;
			$error_salary= "salary must be number";
		}
		else{
			$salary = $_POST["salary"];
		}	
		if(empty($_POST["email"])){
			$error = true;
			$error_email="email Required";
		}
        else if(strpos($_POST["email"],"@") == false){
            $error = true;
			$error_email="Email must contain @ character";
        }
        else if(strpos($_POST["email"],".") == false){
            $error = true;
			$error_email="Email must contain . character";
        }
        else{
            $email=$_POST["email"];
        }
		if(!isset($_POST["gender"])){
			$error = true;
			$error_gender="Gender not select";
		}
		else{
			$gender = $_POST["gender"];
		}
		if (!isset($_POST["input_day"])){
			$error = true;
			$error_input_date_of_birth="birth date not select";
		}
		else if (!isset($_POST["input_month"])){
			$error = true;
			$error_input_date_of_birth="birth date not select";
		}
		else if (!isset($_POST["input_year"])){
			$error = true;
			$error_input_date_of_birth="birth date not select";
		}
		else{
			$input_day = $_POST["input_day"];
			$input_month = $_POST["input_month"];
			$input_year = $_POST["input_year"];
		}
		if(empty($_POST["nationality"])){
            $error = true;
            $error_nationality = "Must be need Nationality";
        }
        else if(strlen($_POST["nationality"]) < 4){
            $error = true;
            $error_nationality = "Nationality is greater then 3 carecter";
        }
        else{
            $count1=0;
            $num1=0;
            $array_nationality = str_split($_POST["nationality"]);
            foreach($array_nationality as $n1){
                if($n1 >= 'A' && $n1 <= 'Z')
                    $count1++;
                else if($n1 >= 'a' && $n1 <= 'z')
                    $count1++;
                else if($n1 >= 0)
                    $num1++;
            }
            if($num1 >= 1){
                $error_nationality = "Nationality must be Letter";
            }
            else{
                $nationality = $_POST["nationality"];
			}
		}
		if(empty($_POST["religion"])){
            $error = true;
            $error_religion = "Must be need Religion";
        }
        else if(strlen($_POST["religion"]) < 4){
            $error = true;
            $error_religion = "Religionis greater then 3 carecter";
        }
        else{
            $count2=0;
            $num2=0;
            $array_religion = str_split($_POST["religion"]);
            foreach($array_religion as $r){
                if($r >= 'A' && $r <= 'Z')
                    $count2++;
                else if($r >= 'a' && $r <= 'z')
                    $count2++;
                else if($r >= 0)
                    $num2++;
            }
            if($num2 >= 1){
                $error_religion = "religion must be Letter";
            }
            else{
                $religion = $_POST["religion"];
			}
		}
		if (!isset($_POST["blood_group"])){
			$error = true;
			$error_blood_group="blood group not select";
		}
		else{
			$blood_group = $_POST["blood_group"];
		}
		if(empty($_POST["father_name"])){
            $error = true;
            $error_father_name = "Must be need Father Name";
        }
        else if(strlen($_POST["father_name"]) < 4){
            $error = true;
            $error_father_name = "Father Name is greater then 3 carecter";
        }
        else{
            $count3=0;
            $num3=0;
            $array_fathername = str_split($_POST["father_name"]);
            foreach($array_fathername as $f){
                if($f >= 'A' && $f <= 'Z')
                    $count3++;
                else if($f >= 'a' && $f <= 'z')
                    $count3++;
                else if($f >= 0)
                    $num3++;
            }
            if($num3 >= 1){
                $error_father_name = "Father Name must be Letter";
            }
            else{
                $father_name = $_POST["father_name"];
			}
		}
		if(empty($_POST["mother_name"])){
            $error = true;
            $error_mother_name = "Must be need Mother Name";
        }
        else if(strlen($_POST["mother_name"]) < 4){
            $error = true;
            $error_mother_name = "Mother Name is greater then 3 carecter";
        }
        else{
            $count4=0;
            $num4=0;
            $array_mothername = str_split($_POST["mother_name"]);
            foreach($array_mothername as $m){
                if($m >= 'A' && $m <= 'Z')
                    $count4++;
                else if($m >= 'a' && $m <= 'z')
                    $count4++;
                else if($m >= 0)
                    $num4++;
            }
            if($num4 >= 1){
                $error_mother_name = "Mother Name must be Letter";
            }
            else{
                $mother_name = $_POST["mother_name"];
			}
		}
		if (!isset($_POST["join_day"])){
			$error = true;
			$error_join_date="join date not select";
		}
		else if (!isset($_POST["join_month"])){
			$error = true;
			$error_join_date="join date not select";
		}
		else if (!isset($_POST["join_year"])){
			$error = true;
			$error_join_date="join date not select";
		}
		else{
			$join_day = $_POST["join_day"];
			$join_month = $_POST["join_month"];
			$join_year = $_POST["join_year"];
		}
		if (!isset($_POST["left_day"])){
			$error = true;
			$error_left_date="left date not select";
		}
		else if (!isset($_POST["left_month"])){
			$error = true;
			$error_left_date="left date not select";
		}
		else if (!isset($_POST["left_year"])){
			$error = true;
			$error_left_date="left date not select";
		}
		else{
			$left_day = $_POST["left_day"];
			$left_month = $_POST["left_month"];
			$left_year = $_POST["left_year"];
		}
		if(!isset($_POST["qualifications"])){
			$error = true;
			$error_qualifications="not select";
		}
		else{
			$qualifications = $_POST["qualifications"];
		}
		if(empty($_POST["present_address"])){
			$error = true;
			$error_present_address= "need present address";
		}
		else{
			$present_address = $_POST["present_address"];
		}
		if(empty($_POST["parmanent_address"])){
			$error = true;
			$error_parmanent_address= "need parmanent address";
		}
		else{
			$parmanent_address = $_POST["parmanent_address"];
		}
		if(empty($_POST["contact_number"])){
			$error = true;
			$error_contact_number = "need contact number";
		}
		else if(is_numeric($_POST["contact_number"])==false){
			$error = true;
			$error_contact_number= "contact number must be number";
		}
		else{
			$contact_number = $_POST["contact_number"];
		}
	}
?>
<html>
	<head>
	</head>
	<body>
		<form action=""method="POST">
			<table>
				<tr>
					<td>
						<h1>TEACHER PERSONAL INFORMATION INSERT</h1>
					</td>
				</tr>
				<tr>
					<td align="right">Teacher ID:</td>
					<td><input type="text" name="teacherid" value="<?php echo $teacherid; ?>"></td>
					<td><?php echo $error_teacherid?></td>
				</tr>
				<tr>
					<td align="right">Name:</td>
					<td><input type="text" name="name" value="<?php echo $name; ?>"> </td>
					<td><?php echo $error_name;?></td>
				</tr>
				<tr>
					<td align="right">Salary:</td>
					<td><input type="text" name="salary" value="<?php echo $salary; ?>"></td>
					<td><?php echo $error_salary?></td>
				</tr>
				<tr>
					<td align="right">Email:</td>
					<td><input type="text" name="email" value="<?php echo $email; ?>"></td>
					<td><?php echo $error_email;?></td>
				</tr>
				<tr>
					<td align="right">Gender</td>
					<td>: <input type="radio" name="gender" value="Male" 
						<?php 
							if($gender=="Male") 
								echo "checked"; 
							?>> Male 
						<input type="radio" name="gender" value="Female"
						<?php 
							if($gender=="Female") 
								echo "checked"; 
							?>> Female </td>
					<td><?php echo $error_gender;?></td>
				</tr>
				<tr>
					<td align="right">Date of Birth:</td>
					<td><select name="input_day">
							<option disabled selected>Day</option>
							<?php 
								foreach($day as $d){
									if($d == $input_day) 
										echo "<option selected>$d</option>"; 
									else 
										echo "<option>$d</option>";}
							?>
						</select>
						<select name="input_month">
							<option disabled selected>Month</option>
								<?php 
									foreach($month as $m){
										if($m == $input_month) 
											echo "<option selected>$m</option>"; 
										else  
											echo "<option>$m</option>";}
								?>
							</select>
							<select name="input_year">
							<option disabled selected>Year</option>
								<?php 
									foreach($year as $y){
										if($y == $input_year) 
											echo "<option selected>$y</option>"; 
										else  
											echo "<option>$y</option>";}
								?>
							</select></td>   
					<td><?php echo $error_input_date_of_birth;?></td>
				</tr>
				<tr>
					<td align="right">Nationality:</td>
					<td><input type="text" name="nationality" value="<?php echo $nationality; ?>"></td>
					<td><?php echo $error_nationality;?></td>
				</tr>
				<tr>
					<td align="right">Religion:</td>
					<td><input type="text" name="religion" value="<?php echo $religion; ?>"></td>
					<td><?php echo $error_religion;?></td>
				</tr>
				<tr>
					<td align="right">Blood Group:</td>
					<td><select name="blood_group">
							<option disabled selected>Blood Group</option>
							<?php 
								foreach($blood as $b){
									if($b == $blood_group) 
										echo "<option selected>$b</option>"; 
									else 
										echo "<option>$b</option>";}
							?>
						</select>   
					<td><?php echo $error_blood_group;?></td>
				</tr>
				<tr>
					<td align="right">Father Name:</td>
					<td><input type="text" name="father_name" value="<?php echo $father_name; ?>"> </td>
					<td><?php echo $error_father_name;?></td>
				</tr>
				<tr>
					<td align="right">Mother Name:</td>
					<td><input type="text" name="mother_name" value="<?php echo $mother_name; ?>"> </td>
					<td><?php echo $error_mother_name;?></td>
				</tr>
				<tr>
					<td align="right">Join Date:</td>
					<td><select name="join_day">
							<option disabled selected>Day</option>
							<?php 
								foreach($day as $d){
									if($d == $join_day) 
										echo "<option selected>$d</option>"; 
									else 
										echo "<option>$d</option>";}
							?>
						</select>
						<select name="join_month">
							<option disabled selected>Month</option>
								<?php 
									foreach($month as $m){
										if($m == $join_month) 
											echo "<option selected>$m</option>"; 
										else  
											echo "<option>$m</option>";}
								?>
							</select>
							<select name="join_year">
							<option disabled selected>Year</option>
								<?php 
									foreach($year as $y){
										if($y == $join_year) 
											echo "<option selected>$y</option>"; 
										else  
											echo "<option>$y</option>";}
								?>
							</select></td>   
					<td><?php echo $error_join_date;?></td>
				</tr>
				<tr>
					<td align="right">Left Date:</td>
					<td><select name="left_day">
							<option disabled selected>Day</option>
							<?php 
								foreach($day as $d){
									if($d == $left_day) 
										echo "<option selected>$d</option>"; 
									else 
										echo "<option>$d</option>";}
							?>
						</select>
						<select name="left_month">
							<option disabled selected>Month</option>
								<?php 
									foreach($month as $m){
										if($m == $left_month) 
											echo "<option selected>$m</option>"; 
										else  
											echo "<option>$m</option>";}
								?>
							</select>
							<select name="left_year">
							<option disabled selected>Year</option>
								<?php 
									foreach($year as $y){
										if($y == $left_year) 
											echo "<option selected>$y</option>"; 
										else  
											echo "<option>$y</option>";}
								?>
							</select></td>   
					<td><?php echo $error_left_date;?></td>
				</tr>
				<tr>
					<td align="right">Qualification:</td>
					<td><input type="checkbox" name="qualifications[]" value="BSC"
						<?php if(qualificationExist("BSC")) 
							echo "checked";
						?>>BSC<br>
					<input type="checkbox" name="qualifications[]" value="MSC"
						<?php if(qualificationExist("MSC")) 
							echo "checked";
						?>> MSC<br>
					<input type="checkbox" name="qualifications[]" value="Other"
						<?php if(qualificationExist("Other")) 
							echo "checked";
						?>> Other<br>
					</td>
					<td><?php echo $error_qualifications;?> </td>
				</tr>
				<tr>
					<td align="right">Present Address:</td>
					<td><input type="text" name="present_address" value="<?php echo $present_address; ?>"></td>
					<td><?php echo $error_present_address?></td>
				</tr>
				<tr>
					<td align="right">Parmanent Address:</td>
					<td><input type="text" name="parmanent_address" value="<?php echo $parmanent_address; ?>"></td>
					<td><?php echo $error_parmanent_address?></td>
				</tr>
				<tr>
					<td align="right">Contact Number:</td>
					<td><input type="text" name="contact_number" value="<?php echo $contact_number; ?>"></td>
					<td><?php echo $error_contact_number?></td>
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