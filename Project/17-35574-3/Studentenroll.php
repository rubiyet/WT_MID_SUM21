    <!DOCTYPE html>
    <html lang="en" dir="ltr">
      <head>
        <meta charset="utf-8">
        <title>Enroll Page</title>
      </head>
      <body>

        <!DOCTYPE html>
        <html lang="en" dir="ltr">
          <head>
            <meta charset="utf-8">
            <title>Student result enroll</title>
          </head>
          <body>
              <h1> <b> Student Result Enroll </b> </h1>

            <?php
             $resultid="";
             $err_rsultid="";
             $subject="";
             $err_subject="";
             $teacher="";
             $err_teacher="";
             $enrollid="";
             $err_enrollid="";
             $result="";
             $err_result="";

             $hasError=false;





             if(isset($_POST["submit"])){
                 echo " <h1> Form Submited</h1>";
                 echo $_POST["Rid"]."<br>";
                 echo $_POST["subject"]."<br>";
                 echo $_POST["Teacher"]."<br>";
                 echo $_POST["Eid"]."<br>";
                 echo $_POST["Grade"]."<br>";
             }





            ?>











        <form class="" action="" method="post">
          <fieldset>
      <table>
        <tr>
          <td align="left">Result Id</td>
              <td>: <input type="text"name="Rid" value="<?php echo $resultid ?>"  placeholder="Result ID ...."> </td>
        </tr>

        <tr>
          <td align="left">Course Name</td>
              <td>: <input type="text"name="subject" value="<?php echo $subject; ?>"  placeholder="Result ID ...."> </td>
        </tr>
        <tr>
          <td align="left">Teacher Name</td>
              <td>: <input type="text"name="Teacher" value="<?php echo $teacher; ?>"  placeholder="Teacher Name ...."> </td>
        </tr>

        <tr>
          <td align="left">Student Enrollment id</td>
              <td>: <input type="text"name="Eid" value="<?php echo $enrollid;?>"  placeholder="Enroll ...."> </td>
        </tr>
        <tr>
          <td align="left">Grade</td>
              <td>: <input type="text"name="Grade" value="<?php echo $result; ?>"  placeholder="Grade...."> </td>
        </tr>
    <tr>
      <td colspan="2" align="right"><input type="submit" name="submit" value="Submit"></td>

       </tr>

<tr>
     <td><a href="StudentUneroll.php">Go To Edit Page </a></td>
       <td><a href="AdminStudent.php">Go To Top page</a></td>
</tr>



     </table>


     </fieldset>


     </form>
     </body>
   </html>
