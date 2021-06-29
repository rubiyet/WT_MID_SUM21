<!--------PHP PART----->

<?php
	$rid="";
	$err_rid="";
	
	$sid="";
	$err_sid="";
	
	$result="";
	$err_result="";
	
	
	$hasError=false;
	
	if(isset($_POST["submit"])){
		if(empty($_POST["rid"])){
			$hasError = true;
			$err_rid="Result Id Required";
		}
		else{
			$rid = $_POST["rid"];
		}
		if(empty($_POST["sid"])){
			$hasError = true;
			$err_sid="Student Enrollment Id Required";
		}
		else if(strlen($_POST["sid"]) <= 5){
			$hasError = true;
			$err_sid="Student Enrollment Id Required must contain at least 6 digit";
		}
        else if(strpos($_POST["sid"], ' ') !== false){
            $err_sid= "Space found in Student Enrollment Id Required, Space is not allowed";
        }
		else{
			$sid = $_POST["sid"];
	
		}
		if(empty($_POST["result"])){
			$hasError = true;
			$err_result="Result Required";
		}
		else{
			$result = $_POST["result"];
		}
		
		
	}	
		
?>
<html>
	<head></head>
	<body>
		<form action="" method="post">
		<fieldset>
            <legend><h1>Student Entry In The Result Sheet:</h1></legend>
			<table>
				<tr>
					<td align="right">Result Id: </td>
					<td><input type="text" name="rid" placeholder="Result Id" value="<?php echo $rid; ?>"> </td>
					<td><span> <?php echo $err_rid;?> </span></td>
				</tr>
				<tr>
					<td align="right">Student Enrollment Id: </td>
					<td><input type="text" name="sid" placeholder="Enrollment Id" value="<?php echo $sid; ?>">  </td>
					<td><span> <?php echo $err_sid;?> </span></td>
				</tr>
				<tr>
					<td align="right">Result: </td>
					<td><input type="text" name="result" placeholder="Result" value="<?php echo $result; ?>">  </td>
					<td><span> <?php echo $err_result;?> </span></td>
				</tr>
				
				
				<tr>
				<td> </td>
					<td colspan="2" align="center"><input type="submit" name="submit" value="insert"> <input type="submit" name="" value="delete"></td>
					
				</tr>
                
			</table>
			
		</fieldset>
		</form>
	</body>
</html>