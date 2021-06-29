<!--------PHP PART----->

<?php
	$rid="";
	$err_rid="";
	
	$sid="";
	$err_sid="";
	
	$result="";
	$err_result="";
	
    $wheres=[];
	$err_wheres="";
	
	$bio="";
	$err_bio="";
	
	$hasError=false;
	
	function whereExist($where){
		global $wheres;
		foreach($wheres as $w){
			if($w == $where) return true;
		}
		return false;
	}
	if(isset($_POST["submit"])){
		if(empty($_POST["rid"])){
			$hasError = true;
			$err_rid="Result Id Required";
		}
		else{
			$name = $_POST["rid"];
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
            <legend><h1>Student Entry In The Result Update Sheet:</h1></legend>
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
					<td align="right">Updated List: </td>
					<td><input type="checkbox" name="wheres[]" <?php if(whereExist("Subject")) echo "checked";?> value="Subject"> Subject<br>
					<input type="checkbox" name="wheres[]" <?php if(whereExist("Student Id")) echo "checked";?> value="Student Id"> Subject Id<br>
					<input type="checkbox" name="wheres[]" <?php if(whereExist("Stdent Address")) echo "checked";?> value="Stdent Address"> Stdent Address<br>
					<input type="checkbox" name="wheres[]" <?php if(whereExist("Student Blood Group")) echo "checked";?> value="Student Blood Group"> Student Blood Group
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
					<td colspan="2" align="center"><input type="submit" name="submit" value="update"></td>
				</tr>
                
			</table>
			
		</fieldset>
		</form>
	</body>
</html>