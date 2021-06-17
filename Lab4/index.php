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
	$gender="";
	$err_gender="";
	$profession="";
	$err_profession="";
	$hobbies=[];
	$err_hobbies="";
	$bio="";
	$err_bio="";
	
	$hasError=false;
	
	$array= array("Teaching","Business","Service","Nothing");
	
	function hobbyExist($hobby){
		global $hobbies;
		foreach($hobbies as $h){
			if($h == $hobby) return true;
		}
		return false;
	}
	
	//if($_SERVER["REQUEST_METHOD"]=="POST"){
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
			$err_username="username Required";
		}
		else if(strlen($_POST["username"]) <= 5){
			$hasError = true;
			$err_username="Username must contain at least 6 character";
		}
        else if(strpos($_POST["username"], ' ') !== false){
            $err_username= "Space found in username";
        }
		else{
			$username = $_POST["username"];
		}
        if(empty($_POST["password"])){
			$hasError = true;
			$err_password="password Required";
		}
		else if(strlen($_POST["password"]) <= 7){
			$hasError = true;
			$err_password="Password must contain at least 8 character";   
		}
		else{
            if(strpos($_POST["password"], '#') == false){
                $err_password= "Password must contain at least 8 character and one # character";
            }
            else if(strpos($_POST["password"], "?") == false){
                $err_password= "Password must contain at least 8 character and one # character and one ? character";
            }
            else{
                $password = $_POST["password"];
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
        else if(strpos($_POST["email"], "@") == false){
            $hasError = true;
			$err_email="Email must contain @ character";
        }
        else if(strpos($_POST["email"], ".") == false){
            $hasError = true;
			$err_email="Email must contain . character";
        }
        else{
            $email=$_POST["email"];
        }
        if(empty($_POST["phonenumber"])){
			$hasError = true;
			$err_email="phone number Required";
		}
        else if(is_numeric($_POST["phonenumber"]) == false){
            $hasError = true;
			$err_phonenumber="phone number must contain number";
        }
        else{
            $phonenumber=$_POST["phonenumber"];
        }
		if(!isset($_POST["gender"])){
			$hasError = true;
			$err_gender="Gender Required";
		}
		else{
			$gender = $_POST["gender"];
		}
		if(!isset($_POST["hobbies"])){
			$hasError = true;
			$err_hobbies="Hobbies Required";
		}
		else{
			$hobbies = $_POST["hobbies"];
		}
		if (!isset($_POST["profession"])){
			$hasError = true;
			$err_profession="Profession Required";
		}
		else{
			$profession = $_POST["profession"];
		}
		if(empty($_POST["bio"])){
			$hasError = true;
			$err_bio = "Bio Required";
		}
		else{
			$bio = $_POST["bio"];
		}
		
		
		if(!$hasError){
			echo "<h1>Form submitted</h1>";
			echo $_POST["name"]."<br>";
			echo $_POST["username"]."<br>";
			echo $_POST["password"]."<br>";
			echo $_POST["gender"]."<br>";
			echo $_POST["profession"]."<br>";
			echo $_POST["bio"]."<br>";
			$arr = $_POST["hobbies"];

			foreach($arr as $e){
				echo "$e<br>";
			}
		}
		
		//we will otherwise DB CRUD or authenticate
		///header("Location: index.php");
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
					<td align="right">Name</td>
					<td>: <input type="text" name="name" value="<?php echo $name; ?>"> </td>
					<td><span> <?php echo $err_name;?> </span></td>
				</tr>
				<tr>
					<td align="right">Username</td>
					<td>: <input type="text" name="username" value="<?php echo $username; ?>">  </td>
					<td><span> <?php echo $err_username;?> </span></td>
				</tr>
				<tr>
					<td align="right">Password</td>
					<td>: <input type="password" name="password" value="<?php echo $password; ?>">  </td>
					<td><span> <?php echo $err_password;?> </span></td>
				</tr>
                <tr>
					<td align="right">Confirm Password</td>
					<td>: <input type="password" name="confirmpassword"value="<?php echo $confirmpassword; ?>">  </td>
					<td><span> <?php echo $err_confirmpassword;?> </span></td>
				</tr>
                <tr>
					<td align="right">Email</td>
					<td>: <input type="text" name="email" value="<?php echo $email; ?>"> </td>
					<td><span> <?php echo $err_email;?> </span></td>
				</tr>
                <tr>
					<td align="right">Phone Number</td>
					<td>: <input type="text" name="phonenumber" value="<?php echo $phonenumber; ?>"> - <input type="text" name="phonenumber" value="<?php echo $phonenumber; ?>"> </td>
					<td><span> <?php echo $err_phonenumber;?> </span></td>
				</tr>
				<tr>
					<td>Gender</td>
					<td>: <input type="radio" value="Male" <?php if($gender=="Male") echo "checked"; ?> name="gender"> Male <input name="gender" <?php if($gender=="Female") echo "checked"; ?> value="Female" type="radio"> Female </td>
					<td><span> <?php echo $err_gender;?> </span></td>
				</tr>
				<tr>
					<td>Profession</td>
					<td>: <select name="profession">
						<option disabled selected>---Select---</option>
						<?php
							foreach($array as $p){
								if($p == $profession) 
									echo "<option selected>$p</option>";
								else
									echo "<option>$p</option>";
							}
						?>
						</select>
					</td>
					<td><span> <?php echo $err_profession;?> </span></td>
				</tr>
				<tr>
					<td>Hobbies</td>
					<td>: <input type="checkbox" name="hobbies[]" <?php if(hobbyExist("Movies")) echo "checked";?> value="Movies"> Movies 
					<input type="checkbox" name="hobbies[]" <?php if(hobbyExist("Music")) echo "checked";?> value="Music"> Music<br>
					<input type="checkbox" name="hobbies[]" <?php if(hobbyExist("Sports")) echo "checked";?> value="Sports"> Sports
					</td>
					<td><span> <?php echo $err_hobbies;?> </span></td>
				</tr>
				<tr>
					<td>Bio</td>
					<td>: <textarea name="bio" ><?php echo $bio; ?></textarea>
					<td><span> <?php echo $err_bio;?> </span></td>
					</td>
				</tr>
				<tr>
					<td colspan="2" align="right"><input type="submit" name="submit" value="Submit"></td>
					
				</tr>
			</table>
		</fieldset>
		</form>
	</body>
</html>