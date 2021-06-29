<?php
	$student_id="";
	$error_student_id="";
	$teacher_id="";
	$error_teacher_id="";
	$admin_id="";
	$error_admin_id="";
	
	$error=false;
	
	if(isset($_POST["submit"])){
		if(empty($_POST["student_id"])){
			$error = true;
			$error_student_id = "need Student ID";
		}
		else if(is_numeric($_POST["student_id"])==false){
			$error = true;
			$error_student_id= "Student ID must be number";
		}
		else{
			$student_id = $_POST["student_id"];
		}
		
	}
	if(isset($_POST["submit1"])){
		if(empty($_POST["teacher_id"])){
			$error = true;
			$error_teacher_id = "need Teacher ID";
		}
		else if(is_numeric($_POST["teacher_id"])==false){
			$error = true;
			$error_teacher_id= "teacher ID must be number";
		}
		else{
			$teacher_id = $_POST["teacher_id"];
		}
		
	}
	if(isset($_POST["submit2"])){
		if(empty($_POST["admin_id"])){
			$error = true;
			$error_admin_id = "need Admin ID";
		}
		else if(is_numeric($_POST["admin_id"])==false){
			$error = true;
			$error_admin_id= "Admin ID must be number";
		}
		else{
			$admin_id = $_POST["admin_id"];
		}
		
	}
?>
<html>
	<head></head>
	<body>
		<form action=""method="POST">
			<table>
				<tr>
					<td><h1>Search</h1></td>
				</tr>
				<tr>
					<td></td>
					<td align="right"><input type="text" placeholder="Enter Student ID" name="student_id" value="<?php echo $student_id; ?>"> <input type="Submit" name="submit" value="Enter"></td>
					<td><?php echo $error_student_id;?></td>
				</tr>
				<tr>
					<td></td>
					<td align="right"><input type="text" placeholder="Enter Teacher ID" name="teacher_id" value="<?php echo $teacher_id; ?>"> <input type="Submit" name="submit1" value="Enter"></td>
					<td><?php echo $error_teacher_id;?></td>
				</tr>
				<tr>
					<td></td>
					<td align="right"><input type="text" placeholder="Enter Admin ID" name="admin_id" value="<?php echo $admin_id; ?>"> <input type="Submit" name="submit2" value="Enter"></td>
					<td><?php echo $error_admin_id;?></td>
				</tr>
			</table>
		</form>
	</body>
</html>