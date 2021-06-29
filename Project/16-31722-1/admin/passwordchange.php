<!--------PHP PART----->

<?php

	$current_password="";
	$err_current_password="";
	
	$new_password="";
	$err_new_password="";
	
	$confirm_new_password="";
	$err_confirm_new_password="";

	$hasError=false;
	
	
if(isset($_POST["submit"])){
		
		if(empty($_POST["currentpassword"])){
			$hasError = true;
			$err_current_password="Current Password Required";
		}
		else if(strlen($_POST["currentpassword"]) <= 7){
			$hasError = true;
			$err_current_password="Current Password must contain at least 8 character";   
		}
		else if(strpos($_POST["currentpassword"], '#') == false || strpos($_POST["currentpassword"], "?") == false){
            $err_current_password= "Current Password must contain at least 8 character,one # character and one ? character";
		}
		else{
			$upper = 0;
			$lower = 0;
			$number = 0;
			$arr = str_split($_POST["currentpassword"]);
			foreach($arr as $a){
				if($a >= 'A' && $a <= 'Z')
					$upper++;
				else if($a >= 'a' && $a <= 'z')
					$lower++;
				else if ($a >= 0)
					$number++;
			}
			if($upper >= 1 && $lower >= 1 && $number >= 1){
				$current_password = $_POST["currentpassword"];
			}
			else{
				$err_current_password= "Current Password must contain at least 8 character, 1 special character(# or ?),1 number and combination of uppercase and lowercase alphabet";
			}
		}
		
		
		if(empty($_POST["newpassword"])){
			$hasError = true;
			$err_new_password="New Password Required";
		}
		else if(strlen($_POST["newpassword"]) <= 7){
			$hasError = true;
			$err_new_password="New Password must contain at least 8 character";   
		}
		else if(strpos($_POST["newpassword"], '#') == false || strpos($_POST["newpassword"], "?") == false){
            $err_new_password= "New Password must contain at least 8 character,one # character and one ? character";
		}
		else{
			$upper = 0;
			$lower = 0;
			$number = 0;
			$arr = str_split($_POST["newpassword"]);
			foreach($arr as $a){
				if($a >= 'A' && $a <= 'Z')
					$upper++;
				else if($a >= 'a' && $a <= 'z')
					$lower++;
				else if ($a >= 0)
					$number++;
			}
			if($upper >= 1 && $lower >= 1 && $number >= 1){
				$new_password = $_POST["newpassword"];
			}
			else{
				$err_new_password= "New Password must contain at least 8 character, 1 special character(# or ?),1 number and combination of uppercase and lowercase alphabet";
			}
		}
		
		
		
		
		
		if(empty($_POST["confirmnewpassword"])){
			$hasError = true;
			$err_confirm_new_password="Confirm new password Required";
		}
        else if($_POST["confirmnewpassword"] !== $_POST["confirmnewpassword"]){
            $hasError = true;
			$err_confirm_new_password="new password and confirm new password not match";
        }
        else{
            $confirm_new_password=$_POST["confirmnewpassword"];
        }
		
}
?>



<!--------HTML PART---------->


<html>
	<head></head>
	<body>
		<form action="" method="post">
		<fieldset>
		<legend><h1>Password Changes:</h1></legend>
			<table>
				<tr>
					<td>Current Password</td>
					<td>: <input type="password" name="currentpassword" value="<?php echo $current_password; ?>" placeholder="Current Password"> </td>
					<td><span> <?php echo $err_current_password;?> </span></td>
				</tr>
				
				<tr>
					<td>New Password</td>
					<td>: <input type="password" name="newpassword" value="<?php echo $new_password; ?>" placeholder="New Password"> </td>
					<td><span> <?php echo $err_new_password;?> </span></td>
				</tr>
				
				<tr>
					<td>Confirm New Password</td>
					<td>: <input type="password" name="confirmnewpassword" value="<?php echo $confirm_new_password; ?>" placeholder="Confirm New Password"> </td>
					<td><span> <?php echo $err_confirm_new_password;?> </span></td>
				</tr>
				
				
				<tr>
					<td colspan="2" align="center"><input type="submit" name="submit" value="Enter"></td>
					
				</tr>
					
			</table>
			
			
			
		</fieldset>
		</form>
	</body>
</html>