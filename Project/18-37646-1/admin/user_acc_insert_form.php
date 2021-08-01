<?php

	include '../../model/db_config.php';

	$userid = "";
	$error_userid = "";
	$type = "";
	$error_type = "";
	$password = "";
	$error_password = "";
	$success_connect = "";
	$success_connect1 ="";
	$status = "";

	$error = false;
	
	$array_type= array("Admin","Teacher","Student");
	$array_status = array("Active","Inactive");

	function generateRandomString($length = 6) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = array("#","@");
		$randomString1 = "";
		for ($i = 0; $i < $length; $i++) {
			array_push($randomString,$characters[rand(0, $charactersLength - 1)]);
		}
		shuffle($randomString);
		foreach($randomString as $rs){
			$randomString1 .= $rs;
		}
		return $randomString1;
	}
	
	if(isset($_POST["submit"])){
		if(empty($_POST["userid"])){
			$error = true;
			$error_userid = "User Id required.";
		}
		else if(strlen($_POST["userid"]) != 7){
			$error = true;
			$error_userid = "User Id must be 7 character.";
		}
		else{
			$hypen = 0;
			$number = 0;
			$bug =0;
			$array_userid = str_split($_POST["userid"]);
			if(strlen($_POST["userid"]) == 7){
				if($array_userid[2] == "-"){
					foreach($array_userid as $au){
						if($au == "-"){
							$hypen++;
						}
						else if($au >= 0){
							$number++;
						}
						else{
							$bug++;
						}
					}
				}
				else{
					$error = true;
					$error_userid = "User Id like as (00-0000)";
				}
			}
			if($hypen > 1 || $bug > 0){
				$error = true;
				$error_userid = "User Id like as (00-0000)";
			}
			else{
				$userid = $_POST["userid"];
			}	
		}
		if(!isset($_POST["type"])){
			$error = true;
			$error_type = "Type required.";
		}
		else{
			$type = $_POST["type"];
		}
		if(isset($_POST["status"])){
			$status = $_POST["status"];
		}
		if(isset($_POST["type"])){
			if(strlen($_POST["userid"]) == 7){
				if($type == "Admin"){
					$array_userid = str_split($_POST["userid"]);
					if($array_userid[3] != 1){
						$error = true;
						$error_userid = " Admin User Id like as (**-1***) with 7 character";
					}
				}
				else if($type == "Teacher"){
					$array_userid = str_split($_POST["userid"]);
					if($array_userid[3] != 2){
						$error = true;
						$error_userid = " Teacher User Id like as (**-2***) with 7 character";
					}
				}
				else if($type == "Student"){
					$array_userid = str_split($_POST["userid"]);
					if($array_userid[3] != 3){
						$error = true;
						$error_userid = " Student User Id like as (**-3***) with 7 character";
					}
				}
			}
		}
		if(!$error){
			$password = generateRandomString();
			$query = "insert into alluser values(Null,'$userid','$password','$type','$status')";
			if($connect){
				if(mysqli_query($connect,$query)){
					$success_connect1 = "Successfully insert User ID ".$userid;
				}
				else{
					if(mysqli_errno($connect) == 1062){
						$success_connect = "User ID ".$userid." already exists.";
					}
				}
			}
			else{
				$success_connect = mysqli_errno($connect);
			}
		}
	}
?>
<html>
	<body>
		<form action=""method="POST">
			<table>
				<tr>
					<td>
						<h1>User Insert</h1>
					</td>
				</tr>
				<tr>
					<td align ="right">
						User ID:
					</td>
					<td>
						<input type="text" name="userid" value="<?php echo $userid?>">
					</td>
					<td><span><?php echo $error_userid;?></span></td>
				</tr>
				<tr>
					<td align ="right">
						Type:
					</td>
					<td><select name="type">
							<option disabled selected>Type</option>
							<?php 
								foreach($array_type as $t){
									if($t == $type) 
										echo "<option selected>$t</option>"; 
									else 
										echo "<option>$t</option>";}
							?>
						</select>
					</td>
					<td><span><?php echo $error_type;?></span></td>
				</tr>
				<tr>
					<td align ="right">
						Status:
					</td>
					<td><select name="status">
							<?php 
								foreach($array_status as $s){
									if($s == $status) 
										echo "<option selected>$s</option>"; 
									else 
										echo "<option>$s</option>";}
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<?php echo $success_connect;?>
						<?php echo $success_connect1;?>
					</td>
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