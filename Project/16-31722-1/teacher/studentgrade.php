<!--------PHP PART----->

<?php
	$student_id="";
	$err_student_id="";
	
	$class_id="";
	$err_class_id="";
	
	$year="";
	$err_year="";
	
	
	$hasError=false;
	
	if(isset($_POST["submit"])){
		if(empty($_POST["studentid"])){
			$hasError = true;
			$err_student_id="Student Id Required";
		}
		else{
			$student_id = $_POST["studentid"];
		}
	if(empty($_POST["classid"])){
			$hasError = true;
			$err_class_id="Class Id Required";
		}
		else if(strlen($_POST["classid"]) <= 5){
			$hasError = true;
			$err_class_id="Class Id Required must contain at least 6 digit";
		}
        else if(strpos($_POST["classid"], ' ') !== false){
            $err_class_id= "Space found in Student Enrollment Id Required, Space is not allowed";
        }
		else{
			$class_id= $_POST["classid"];
	
		}
		if(empty($_POST["year"])){
			$hasError = true;
			$err_year="Year Required";
		}
		else{
			$year = $_POST["year"];
		}
		
		
	}	
		
?>
<html>
	<head></head>
	<body>
		<form action="" method="post">
		<fieldset>
            <legend><h1>Student Grade Report Sheet:</h1></legend>
			<table>
				<tr>
					<td align="right">Student Id: </td>
					<td><input type="text" name="studentid" placeholder="Student Id" value="<?php echo $student_id; ?>"> </td>
					<td><span> <?php echo $err_student_id;?> </span></td>
				</tr>
				<tr>
					<td align="right">Class Id: </td>
					<td><input type="text" name="classid" placeholder="Class Id" value="<?php echo $class_id; ?>">  </td>
					<td><span> <?php echo $err_class_id;?> </span></td>
				</tr>
				<tr>
					<td align="right">Year: </td>
					<td><input type="text" name="year" placeholder="Year" value="<?php echo $year; ?>">  </td>
					<td><span> <?php echo $err_year;?> </span></td>
				</tr>
				
				
				<tr>
					<td colspan="2" align="center"><input type="submit" name="submit" value="Enter"></td>
					
				</tr>
                
			</table>
			
		</fieldset>
		</form>
	</body>
</html>