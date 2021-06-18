<?php
	$name="";
	$err_name="";
	$username="";
	$err_username="";
	$password="";
	$err_password="";
    $confirmpassword="";
    $err_confirmpassword="";
    $email="";
    $err_email="";
    $phonenumber="";
    $err_phonenumber="";
	$phonenumbercode="";
	$address="";
	$err_address="";
	$city="";
	$state="";
	$err_citystate="";
	$postalzipcode="";
	$err_postalzipcode="";
	$inputday="";
	$inputmonth="";
	$inputyear="";
	$err_inputdaymonthyear="";
	$gender="";
	$err_gender="";
	$profession="";
	$err_profession="";
	$wheres=[];
	$err_wheres="";
	$bio="";
	$err_bio="";
	
	$hasError=false;
	
	$day= array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31);
	$month=array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
	$year=array(1997,1998,1999,2000,2001,2002,2003,2004,2005,2006,2007,2008,2009,2010,2011,2012,2013,2014,2015,2016,2017,2018,2019,2020,2021);

	function whereExist($where){
		global $wheres;
		foreach($wheres as $w){
			if($w == $where) return true;
		}
		return false;
	}
	
	if(isset($_POST["submit"])){
		if(empty($_POST["name"])){
			$hasError = true;
			$err_name="Name Required";
		}
		else{
			$name = $_POST["name"];
		}
        if(empty($_POST["username"])){
			$hasError = true;
			$err_username="Username Required";
		}
		else if(strlen($_POST["username"]) <= 5){
			$hasError = true;
			$err_username="Username must contain at least 6 character";
		}
        else if(strpos($_POST["username"], ' ') !== false){
            $err_username= "Space found in username, Space is not allowed";
        }
		else{
			$username = $_POST["username"];
		}
        if(empty($_POST["password"])){
			$hasError = true;
			$err_password="Password Required";
		}
		else if(strlen($_POST["password"]) <= 7){
			$hasError = true;
			$err_password="Password must contain at least 8 character";   
		}
		else if(strpos($_POST["password"], '#') == false || strpos($_POST["password"], "?") == false){
            $err_password= "Password must contain at least 8 character,one # character and one ? character";
		}
		else{
			$upper = 0;
			$lower = 0;
			$number = 0;
			$arr = str_split($_POST["password"]);
			foreach($arr as $a){
				if($a >= 'A' && $a <= 'Z')
					$upper++;
				else if($a >= 'a' && $a <= 'z')
					$lower++;
				else if ($a >= 0)
					$number++;
			}
			if($upper >= 1 && $lower >= 1 && $number >= 1){
				$password = $_POST["password"];
			}
			else{
				$err_password= "Password must contain at least 8 character, 1 special character(# or ?),1 number and combination of uppercase and lowercase alphabet";
			}
		}	
        if(empty($_POST["confirmpassword"])){
			$hasError = true;
			$err_confirmpassword="confirmpassword Required";
		}
        else if($_POST["password"] !== $_POST["confirmpassword"]){
            $hasError = true;
			$err_confirmpassword="password and confirm password not match";
        }
        else{
            $confirmpassword=$_POST["confirmpassword"];
        }
        if(empty($_POST["email"])){
			$hasError = true;
			$err_email="email Required";
		}
        else if(strpos($_POST["email"], "@") == false || strpos($_POST["email"], ".") == false){
            $hasError = true;
			$err_email="Email must contain @ character and . character";
        }
        else{
            $email=$_POST["email"];
        }
        if(empty($_POST["phonenumber"]) || empty($_POST["phonenumbercode"])){
			$hasError = true;
			$err_phonenumber="phone number & code Required";
		}
        else if(is_numeric($_POST["phonenumber"]) == false || is_numeric($_POST["phonenumbercode"]) == false){
            $hasError = true;
			$err_phonenumber="phone number & code must contain number";
        }
        else{
            $phonenumber=$_POST["phonenumber"];
			$phonenumbercode=$_POST["phonenumbercode"];
        }
		if(empty($_POST["address"])){
			$hasError = true;
			$err_address="Address Required";
		}
		else{
			$address=$_POST["address"];
		}
		if(empty($_POST["city"]) || empty($_POST["state"])){
			$hasError = true;
			$err_citystate="City and State Required";
		}
		else{
			$city=$_POST["city"];
			$state=$_POST["state"];
		}
		if(empty($_POST["postalzipcode"])){
			$hasError = true;
			$err_postalzipcode="Postal/Zip Code Required";
		}
		else if(is_numeric($_POST["postalzipcode"]) == false){
            $hasError = true;
			$err_postalzipcode="Postal/Zip Code must contain number";
        }
		else{
			$postalzipcode=$_POST["postalzipcode"];
		}
		if (!isset($_POST["inputday"]) || !isset($_POST["inputmonth"]) || !isset($_POST["inputyear"])){
			$hasError = true;
			$err_inputdaymonthyear="Day, Month & Year Required";
		}
		else{
			$inputday = $_POST["inputday"];
			$inputmonth = $_POST["inputmonth"];
			$inputyear = $_POST["inputyear"];
		}
		if(!isset($_POST["gender"])){
			$hasError = true;
			$err_gender="Gender Required";
		}
		else{
			$gender = $_POST["gender"];
		}
		if(!isset($_POST["wheres"])){
			$hasError = true;
			$err_wheres="wheres Required";
		}
		else{
			$wheres = $_POST["wheres"];
		}
		if(empty($_POST["bio"])){
			$hasError = true;
			$err_bio = "Bio Required";
		}
		else{
			$bio = $_POST["bio"];
		}
	}	
?>
<html>
	<head></head>
	<body>
		<form action="" method="post">
		<fieldset>
            <legend><h1>Club Member Registration</h1></legend>
			<table>
				<tr>
					<td align="right">Name: </td>
					<td><input type="text" name="name" value="<?php echo $name; ?>"> </td>
					<td><span> <?php echo $err_name;?> </span></td>
				</tr>
				<tr>
					<td align="right">Username: </td>
					<td><input type="text" name="username" value="<?php echo $username; ?>">  </td>
					<td><span> <?php echo $err_username;?> </span></td>
				</tr>
				<tr>
					<td align="right">Password: </td>
					<td><input type="password" name="password" value="<?php echo $password; ?>">  </td>
					<td><span> <?php echo $err_password;?> </span></td>
				</tr>
                <tr>
					<td align="right">Confirm Password: </td>
					<td><input type="password" name="confirmpassword"value="<?php echo $confirmpassword; ?>">  </td>
					<td><span> <?php echo $err_confirmpassword;?> </span></td>
				</tr>
                <tr>
					<td align="right">Email: </td>
					<td><input type="text" name="email" value="<?php echo $email; ?>"> </td>
					<td><span> <?php echo $err_email;?> </span></td>
				</tr>
                <tr>
					<td align="right">Phone Number: </td>
					<td><input style="width: 50px" type="text" placeholder="code" name="phonenumbercode" value="<?php echo $phonenumbercode; ?>"> - <input placeholder="Number" style="width:114px" type="text" name="phonenumber" value="<?php echo $phonenumber; ?>"></td>
					<td><span> <?php echo $err_phonenumber;?> </span></td>
				</tr>
				<tr>
					<td align="right">Address: </td>
					<td><input type="text" name="address" placeholder="Street Address" value="<?php echo $address; ?>"></td>
					<td><span> <?php echo $err_address;?> </span></td>
				</tr>
				<tr>
					<td></td>
					<td> <input style="width: 65px" type="text" name="city" placeholder="City" value="<?php echo $city; ?>"> - <input style="width:100px" type="text" name="state" placeholder="State" value="<?php echo $state; ?>"></td>
					<td><span> <?php echo $err_citystate;?> </span></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="text" name="postalzipcode" placeholder="Postal/Zip Code" value="<?php echo $postalzipcode; ?>"></td>
					<td><span> <?php echo $err_postalzipcode;?> </span></td>
				</tr>
				<tr>
					<td align="right">Birth Date: </td>
					<td><select name="inputday"><option disabled selected>Day</option><?php foreach($day as $d){if($d == $inputday) echo "<option selected>$d</option>"; else echo "<option>$d</option>";}?></select><select name="inputmonth"><option disabled selected>Month</option><?php foreach($month as $m){if($m == $inputmonth) echo "<option selected>$m</option>"; else  echo "<option>$m</option>";}?></select><select name="inputyear"><option disabled selected>Year</option><?php foreach($year as $y){if($y == $inputyear) echo "<option selected>$y</option>"; else  echo "<option>$y</option>";}?></select></td>   
					<td><span> <?php echo $err_inputdaymonthyear;?> </span></td>
				</tr>
				<tr>
					<td align="right">Gender: </td>
					<td><input type="radio" value="Male" <?php if($gender=="Male") echo "checked"; ?> name="gender"> Male <input name="gender" <?php if($gender=="Female") echo "checked"; ?> value="Female" type="radio"> Female </td>
					<td><span> <?php echo $err_gender;?> </span></td>
				</tr>
				<tr>
					<td align="right">Where did you hear<br>about us?: </td>
					<td><input type="checkbox" name="wheres[]" <?php if(whereExist("A Friend or Colleague")) echo "checked";?> value="A Friend or Colleague"> A Friend or Colleague<br>
					<input type="checkbox" name="wheres[]" <?php if(whereExist("Google")) echo "checked";?> value="Google"> Google<br>
					<input type="checkbox" name="wheres[]" <?php if(whereExist("Blog Post")) echo "checked";?> value="Blog Post"> Blog Post<br>
					<input type="checkbox" name="wheres[]" <?php if(whereExist("News Article")) echo "checked";?> value="News Article"> News Article
					</td>
					<td><span> <?php echo $err_wheres;?> </span></td>
				</tr>
				<tr>
					<td align="right">Bio: </td>
					<td><textarea name="bio" ><?php echo $bio; ?></textarea>
					<td><span> <?php echo $err_bio;?> </span></td>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" name="submit" value="register"></td>
				</tr>
			</table>
		</fieldset>
		</form>
	</body>
</html>