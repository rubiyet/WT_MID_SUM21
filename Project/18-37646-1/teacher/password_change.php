<?php
	$old_password="";
	$error_old_password="";
	$new_password="";
	$error_new_password="";
	$confirm_password="";
	$error_confirm_password="";
	
	$error = false;
	
	if(isset($_POST["submit"])){	
		if(empty($_POST["old_password"])){
			$error = true;
			$error_old_password="Old Password required";
		}
		else{
			$old_password = $_POST["old_password"];
		}
		if(empty($_POST["new_password"])){
				$error = true;
				$error_new_password="New Password required";
		}
		else if(strlen($_POST["new_password"]) <= 7){
			$error = true;
			$error_new_password="password must contain >7 character";
		}
		else{
			 if(strpos($_POST["new_password"],"#") ==false){
				$error_new_password="must contain at least # character";
			}
			else if(strpos($_POST["new_password"],"?") ==false){
				$error_new_password="must contain at least ? character";
			}
			else{
				$new_password = $_POST["new_password"];
			}
		}
		if(empty($_POST["confirm_password"])){
			$error = true;
			$error_confirm_password="confirm Password required";
		}
		else{
			$confirm_password = $_POST["confirm_password"];
		}
	}
	
?>

<html>
	<head></head>
	<body>
		<form action=""method="POST">
			<table>
				<tr>
					<td>
						<h1>PASWORD CHANGE</h1>
					</td>
				</tr>
				<tr>
					<td align="right">Old Password:</td>
					<td><input type="password" name="old_password" value="<?php echo $old_password; ?>"></td>
					<td><?php echo $error_old_password;?></td>
				</tr>
				<tr>
					<td align="right">New Password:</td>
					<td><input type="password" name="new_password" value="<?php echo $new_password; ?>"></td>
					<td><?php echo $error_new_password;?></td>
				</tr>
				
				<tr>
					<td align="right">Confirm Password:</td>
					<td><input type="password" name="confirm_password" value="<?php echo $confirm_password; ?>"></td>
					<td><?php echo $error_confirm_password;?></td>
				</tr>
				<tr>
					<td align="right">
						<input type="Submit" name="submit" value="Insert">
					</td>
				</tr>
			</table>
		</form>
	</body>
</html>