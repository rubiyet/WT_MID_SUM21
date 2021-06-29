<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <title>Password Change</title>
  </head>
  <body>
<h1 align="middle" > <b>PASSWORD CHANGE</b> </h1>

<?php
   $Opassword="";
   $err_Opassword="";

   $Npassword="";
   $err_Npassword="";

   $Cpassword="";
   $err_Cpassword="";

   $hasError=false;

   if(isset($_POST["submit"])){
   if(empty($_POST["Opassword"])){
  $hasError = true;
  $err_password=" Old  Password Required";

}
else {
      $Opassword=$_POST["Opassword"];
}


 if(empty($_POST["Npassword"])){
    $hasError = true;
    $err_password="Password Required";
  }
  else if(strlen($_POST["Npassword"]) <= 7){
    $hasError = true;
    $err_Npassword="Password must contain at least 8 character";
  }
  else if(strpos($_POST["Npassword"], '#') == false || strpos($_POST["Npassword"], "?") == false){
          $err_Npassword= "Password must contain at least 8 character,one # character and one ? character";
  }
  else{
    $upper = 0;
    $lower = 0;
    $number = 0;
    $arr = str_split($_POST["Npassword"]);
    foreach($arr as $a){
      if($a >= 'A' && $a <= 'Z')
        $upper++;
      else if($a >= 'a' && $a <= 'z')
        $lower++;
      else if ($a >= 0)
        $number++;
    }
    if($upper >= 1 && $lower >= 1 && $number >= 1){
      $Npassword = $_POST["Npassword"];
    }
    else{
      $err_Npassword= "Password must contain at least 8 character, 1 special character(# or ?),1 number and combination of uppercase and lowercase alphabet";
    }
  }
      if(empty($_POST["Cpassword"])){
    $hasError = true;
    $err_Cpassword="confirmpassword Required";
  }
      else if($_POST["Npassword"] !== $_POST["Cpassword"]){
          $hasError = true;
    $err_Cpassword="password and confirm password not match";
      }
      else{
          $Cpassword=$_POST["Cpassword"];
      }


 if(!$hasError){
      echo " <h1> Form Submited</h1>";
      echo $_POST["Opassword"]."<br>";
      echo $_POST["Npassword"]."<br>";
      echo $_POST["Cpassword"]."<br>";

   }

}
   ?>

   <form class="" action="" method="post">
     <fieldset>
       <table>
         <tr>
           <td>Old Password</td>
           	<td>: <input type="password" name="Opassword" value="<?php echo $Opassword;?>" placeholder="Your Old Password ...."> </td>
            <td><?php echo $err_Opassword ?></td>

         </tr>
         <tr>
           <td>New Password</td>
           	<td>: <input type="password" name="Npassword" value="<?php echo $Npassword;?>" placeholder="Your New Password ...."> </td>
            <td><?php echo $err_Npassword ?></td>

         </tr>
         <tr>
           <td>Confirm New Password</td>
             <td>: <input type="password" name="Cpassword" value="<?php echo $Cpassword;?>" placeholder="Your New Password ...."> </td>
             <td> <td><?php echo $err_Cpassword ?></td>
             </td>

         </tr>
<tr>
  <td><input type="submit" name="submit" value="submit"></td>
</tr>
<tr>
 <td>   <a href="Gradereport.php"> Grade Rreport Page </a></td>
</tr>
<tr>
  <a href="Studentlogin.php"> Go To First Page </a>
</tr>
       </table>
     </fieldset>

   </form>
 <h2>  <b>Contact Admin</b>  </h2>

  </body>
</html>
