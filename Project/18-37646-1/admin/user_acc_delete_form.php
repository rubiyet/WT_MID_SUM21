<?php
	$userid ="";
	$error_userid = "";
	$input_type = "";
	$error_type ="";
	$password = "";
	$error_password = "";
	$error = false;
	
	$type= array("student","teacher","admin");
	
	if(isset($_POST["submit"])){
		if(empty($_POST["userid"])){
			$error = true;
			$error_userid = "need User Id";
		}
		else if(is_numeric($_POST["userid"])==false){
			$error = true;
			$error_userid = "user id must be number";
		}
		else{
			$userid = $_POST["userid"];
		}
		if(!isset($_POST["type"])){
			$error = true;
			$error_type = "need type";
		}
		else{
			$input_type = $_POST["type"];
		}
		if(empty($_POST["password"])){
			$error = true;
			$error_password="password required";
		}
		else{
			$password = $_POST["password"];
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
								foreach($type as $t){
									if($t == $input_type) 
										echo "<option selected>$t</option>"; 
									else 
										echo "<option>$t</option>";}
							?>
						</select>
					<td><span><?php echo $error_type;?></span></td>
				</tr>
				<tr>
					<td align="right">Password :</td>
					<td> <input type="password" name="password" value="<?php echo $password; ?>"></td>
					<td><span> <?php echo $error_password;?> </span></td>
				</tr>
				<tr>
					<td align="right">
						<input type="Submit" name="submit" value="Delete">
					</td>
				</tr>
				
			</table>
		</form>
	</body>
</html>