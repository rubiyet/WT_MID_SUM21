<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Grade Report Page</title>
  </head>

   <h1 align="middle"><b> STUDENT GRADE PAGE</b> </h1>
  <body>
    <?php

      $studentid="";
      $err_studentid="";
      $class="";
      $err_class="";
      $subject="";
      $err_subject="";
      $year="";
      $err_year="";
      $hasError=false;










  ?>

    <form method="post">
    <fieldset>
      <table>

            <tr>

                <td colspan="10" align="right"><input  type="text" name="courseid" value="" placeholder="search by subject id.."><input  type="submit" name="search" value="Search"></td>
  </tr>

        <tr>
    					<td>Student Id</td>
    					<td>: <input type="text" name="studentid" value="<?php echo $studentid;?>" placeholder="Your id ...."> </td>
    					<td><span> <?php echo $err_studentid;?> </span></td>
    				</tr>
    				<tr>
              <tr>
          					<td>Course</td>
          					<td>: <input type="text" name="subject" value="<?php echo $subject;?>" placeholder="Your course ...."> </td>
          					<td><span> <?php echo $err_subject;?> </span></td>
          				</tr>

                  <tr>
                        <td>Class</td>
                        <td>: <input type="text" name="class" value="<?php echo $class;?>" placeholder="Your class ...."> </td>
                        <td><span> <?php echo $err_class;?> </span></td>
                      </tr>
          				<tr>


    					<td>Year</td>
    					<td>: <input type="text" name="year" value="<?php echo $year;?>" placeholder="Year........">  </td>
    					<td><span> <?php echo $err_year;?> </span></td>
    				</tr>

<tr>
      <td colspan="2" align="right"><input type="submit" name="submit" value="Submit"></td>
      <td colspan="2" align="right"> <input type="reset" name="reset" value="Reset"></td>
      <td><a  href="PasswordC.php"> Password Change Page</a></td> <br> <br>
      <a href="Studentlogin.php"> Go To First Page </a>

    </tr>

  	</table>
    </fieldset>
    </form>
  </body>
</html>
