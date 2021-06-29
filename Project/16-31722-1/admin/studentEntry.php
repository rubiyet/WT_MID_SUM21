<!--------PHP PART----->

<?php
	$student_enroll_id="";
	$err_student_enroll_id="";
	
	$student_id="";
	$err_student_id="";
	
	$course_id="";
	$err_course_id="";
	
	
	$hasError=false;
	
	if(isset($_POST["submit"])){
		if(empty($_POST["studentenrollid"])){
			$hasError = true;
			$err_student_enroll_id="Student Enroll Id Required";
		}
		else{
			$student_enroll_id = $_POST["studentenrollid"];
		}
		if(empty($_POST["studentid"])){
			$hasError = true;
			$err_student_id="Student Id Required";
		}
		else if(strlen($_POST["studentid"]) <= 5){
			$hasError = true;
			$err_student_id="Student Id Required must contain at least 6 digit";
		}
        else if(strpos($_POST["studentid"], ' ') !== false){
            $err_student_id= "Space found in Student Id Required, Space is not allowed";
        }
		else{
			$student_id= $_POST["studentid"];
	
		}
		if(empty($_POST["courseid"])){
			$hasError = true;
			$err_course_id="Course Id Required";
		}
		else{
			$course_id = $_POST["courseid"];
		}
		
		
	}	
		
?>
<html>
	<head></head>
	<body>
		<form action="" method="post">
		<fieldset>
            <legend><h1>Student Entry In The Course:</h1></legend>
			<table>
				<tr>
					<td align="right">Student Enrollment Id: </td>
					<td><input type="text" name="studentenrollid" placeholder="Student Enrollment Id" value="<?php echo $student_enroll_id; ?>"> </td>
					<td><span> <?php echo $err_student_enroll_id;?> </span></td>
				</tr>
				<tr>
					<td align="right">Student Id: </td>
					<td><input type="text" name="studentid" placeholder="Student Id" value="<?php echo $student_id; ?>">  </td>
					<td><span> <?php echo $err_student_id;?> </span></td>
				</tr>
				<tr>
					<td align="right">Course Id: </td>
					<td><input type="text" name="courseid" placeholder="Course Id" value="<?php echo $course_id; ?>">  </td>
					<td><span> <?php echo $err_course_id;?> </span></td>
				</tr>
				
				
				<tr>
				<td> </td>
					<td  align="center"><input type="submit" name="submit" value="Insert"> <input type="submit" name="" value="Delete"> <input type="submit" name="submit" value="Update"> <input type="submit" name="submit" value="Clear"></td>
					
					
				</tr>
                
			</table>
			
		</fieldset>
		</form>
	</body>
</html>