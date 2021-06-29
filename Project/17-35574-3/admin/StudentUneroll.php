<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>STUDENT UNENRTOLL PAGE</title>
  </head>
  <body>
    <h1> <b> Student Result  Unenroll Page  </b> </h1>
    <?php
     $resultid="";
     $err_rsult="";
     $enrollid="";
     $err_enrollid="";
     $result="";
     $err_result="";
     if(isset($_POST["submit"])){
       if(empty($_POST["name"])){
         $hasError = true;
         $err_name="Name Required";
       }
       else if(strlen($_POST["name"]) <= 2){
         $hasError = true;
         $err_name="Name must contain >2 character";
       }
       else{
       htmlspecialchars($name = $_POST["name"]);
       }
       if(empty($_POST["username"]))
         {
           $hasError = true;
           $err_username="Username Required";
         }
   else if (strlen($_POST["username"]) <= 5) {
     $hasError=true;
     $err_username="Must be in <5 character";
   }
   else if(strpos($_POST["username"]," ")){
     $hasError=true;
     $err_username="Username should not contain white space";
   }
   else {

     $username=$_POST["username"];
   }


   #confirm strart

   #confirm end

   #phone start
   if(empty($_POST["phone"]))
   {
     $hasError = true;
     $err_phone="Phone Required";
   }
   else if(!is_numeric($_POST["phone"])){
     $hasError = true;
     $err_phone="Phone Required";
   }
   else {

     $phone=$_POST["phone"];
   }
   //phone end

   //address start

   if(empty($_POST["email"])){
   $hasError = true;
   $err_email="email Required";
   }
     else if(strpos($_POST["email"], "@") == false || strpos($_POST["email"], ".") == false){
         $hasError = true;
   $err_email="Email must contain @ character and . character";
     }
     else{
         $email=$_POST["email"];
     }

       if(!isset($_POST["gender"])){
         $hasError = true;
         $err_gender="Gender Required";
       }
       else{
         $gender = $_POST["gender"];
       }
       if(!isset($_POST["hobbies"])){
         $hasError = true;
         $err_hobbies="Checking Required";
       }
       else{
         $hobbies = $_POST["hobbies"];
       }
       if (!isset($_POST["date"])){
         $hasError = true;
         $err_dating="Date Required";
       }
       else{
         $dating = $_POST["date"];
       }
       if (!isset($_POST["Month"])){
         $hasError = true;
         $err_Month="Month Required";
       }
       else{
         $Month = $_POST["Month"];
       }
       if (!isset($_POST["year"])){
         $hasError = true;
         $err_year="year Required";
       }
       else{
         $year = $_POST["year"];
       }

   //Nationality
   if(empty($_POST["Nationality"])){
   $hasError = true;
   $err_nation="Nationality Required";
   }
   else {
       $nation = $_POST["Nationality"];
   }


       if(!$hasError){

         echo "<h1>Form submitted</h1>";
         echo $_POST["id"]."<br>";
         echo $_POST["name"]."<br>";
         echo $_POST["email"]."<br>";
         echo $_POST["phone"]."<br>";
         echo $_POST["gender"]."<br>";
         echo $_POST["date"]."<br>";
         echo $_POST["Month"]."<br>";
         echo $_POST["year"]."<br>";
         echo $_POST["address"]."<br>";
         echo $_POST["Nationality"]."<br>";
        echo $_POST["payment"]."<br>";

         $arr = $_POST["hobbies"];

         foreach($arr as $e){
           echo "$e<br>";}


     $arr2 = $_POST["blood"];
     foreach($arr2 as $b){
             echo "$b<br>";}


     $arr3 = $_POST["religion"];
       foreach($arr2 as $r){
         echo "$r<br>";}



       //we will otherwise DB CRUD or authenticate
       ///header("Location: index.php");
     }
   }
    ?>
        <form class="" action="" method="post">
      <fieldset>
      <table>
                <tr>
                  <td align="left">Result Id</td>
                      <td>: <input type="text" placeholder="Result ID ...."> </td>
                </tr>
                <tr>
                  <td align="left">Student Enrollment id</td>
                      <td>: <input type="text" placeholder="Enroll ...."> </td>
                </tr>
                <tr>
                  <td align="left">Grade</td>
                      <td>: <input type="text" placeholder="Grade...."> </td>
                </tr>


         <td colspan="2" align="right"><input type="submit" name="Delete" value="UPDATE"></td>
          <td colspan="2" align="right"><input type="Submit" name="Udate" value="DELETE"></td>


       </tr>

       <tr>
           <td> <a href="Studentenroll.php">Go To First Page </a></td>
           <td><a href="AdminStudent.php">Go To Top page</a>  </td>

       </tr>

      </table>

        </fieldset>


      </form>



      </body>
    </html>
