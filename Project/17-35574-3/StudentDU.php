<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Student Information Edit Page</title>
  </head>
  <body>
    <?php
    	$userid="";
    	$err_userid="";
    	$name="";
    	$err_name="";
    	$password="";
    	$err_password="";
      $email="";
      $err_email="";
      $phone="";
      $err_phone="";
    	$gender="";
    	$err_gender="";
    	$dating="";
    	$err_dating="";
      $Month="";
    	$err_Month="";
      $year="";
    	$err_year="";
    	$hobbies=[];
    	$err_hobbies="";
    	$blood=[];
    	$err_blood="";
      $religion=[];
      $err_religion="";
      $payment="";
      $err_payment="";
      $address="";
      $err_address="";
      $cer=[];
      $err_cer="";


    	$hasError=false;

    	$array= array("Jaunary","February","March","April","May","June", "July" ,"August","September","Octobar","November","December");
      $array2= array("A+","A-","B+","B-","O+","O-", "AB+" ,"AB-");
      $array3 = array("Muslim","Hindu","Christain", "Buddist","Others");

      $array4= array("JSC","SSC","HSC");

  	function cerExist($cer){
  		global $cer;
  		foreach($cer as $c){
  			if($c == $cer) return true;
  		}
  		return false;
  	}


      function regilionExist($religion)
      {
        global $religion;
        foreach ($religion as $r) {
          if($r == $religion) return true;
        }
        return false;

      }


      function bloodExist($blood)
      {
        global $blood;
        foreach ($blood as $b) {
          if($b == $hobbies) return true;
        }
        return false;

      }

    	function hobbyExist($hobby){
    		global $hobbies;
    		foreach($hobbies as $h){
    			if($h == $hobby) return true;
    		}
    		return false;
    	}


    	//if($_SERVER["REQUEST_METHOD"]=="POST"){
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

    			if(empty($_POST["password"]))
          {
            $hasError=true;
    				$err_password="Password Required";
          }
          else if(isset($_POST[""])){
    		       echo htmlspecialchars($_POST["pass"]);
    		    }
    			 else if(strlen($_POST["password"])<8){
            $hasError=true;
    				 $err_password="Password Must Be 8 Charachter Long";
    		 }
    			 else if(!strpos($_POST["password"],"#")){
             $hasError=true;
    			 $err_password="Password should contain special character";
    		    }
    		 else if(!strpos($_POST["password"],"1")){
             $hasError=true;
    			    $err_password="Password should contain Numeric values";
    		   }
    		   else if(!ctype_upper($_POST["password"])){
              $hasError=true;
    			     $err_password="Password should contain UpperCase values";
    		    }
    		     else if(!ctype_lower($_POST["password"])){
               $hasError=true;
    			    $err_password="Password should contain LowerCase values";
    		     }
    		   else if(strpos($_POST["password"]," ")){
              $hasError=true;
    			    $err_password="Password should not contain white space";
    		    }
    			 else{
    				 $password=$_POST["password"];
    			 }
    #confirm strart
    if(empty($_POST["Cpassword"]))
    {
    	$hasError = true;
    	$err_Cpassword="Cofirm Password Required";
    }
    else if($_POST["password"]!=$_POST["Cpassword"])
    {
      $hasError = true;
     $err_Cpassword="Password doesn't match";
    }
    else {

    	$Cpassword=$_POST["Cpassword"];
    }

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

     if (empty($_POST["email"])) {
      $hasError=true;
      $err_email = "Email is required";   }
     elseif(strpos($_POST["email"],"@.")){
              $hasError=true;
    			     $err_email="Email must contain @ and .";
    		     }

    			 else {
                     $email =$_POST["email"];
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
          echo  $_POST["address"]."<br>";
          echo  $_POST["payment"]."<br>";
    			$arr = $_POST["hobbies"];

    			foreach($arr as $e){
    				echo "$e<br>";
    			}
    		}

    		//we will otherwise DB CRUD or authenticate
    		///header("Location: index.php");
    	}

    ?>








    <h1 align="middle"><b> STUDENT INFORMATION EDIT  PAGE</b>  </h1>




  <form class="" action="" method="post">
  <fieldset>
    <table>
      <tr>
  					<td>Id</td>
  					<td>: <input type="text" name="id" value="<?php echo $userid;?>" placeholder="Your id ...."> </td>
  					<td><span> <?php echo $err_userid;?> </span></td>
  				</tr>
  				<tr>
  					<td>Name</td>
  					<td>: <input type="text" name="name" value="<?php echo $name;?>" placeholder="Your Name........">  </td>
  					<td><span> <?php echo $err_name;?> </span></td>
  				</tr>
          <tr>
            <td>Email</td>
            <td>: <input type="text" name="email" value="<?php echo $email;?>" placeholder="Your Email........">  </td>
            <td><span> <?php echo $err_email;?> </span></td>
          </tr>

  					<td>Gender</td>
  					<td>: <input type="radio" value="Male" <?php if($gender=="Male") echo "checked"; ?> name="gender"> Male <input name="gender" <?php if($gender=="Female") echo "checked"; ?> value="Female" type="radio"> Female </td>
  					<td><span> <?php echo $err_gender;?> </span></td>
  				</tr>
          <tr>
            <td>Blood Group :</td>
            <td>: <select name="blood"><option disabled selected>---select---</option>
              <?php
          foreach($array2 as $k)
          {

            echo "<option> $k </option>";


          }
          ?>
            </select>
            </tr>

            <tr>
            <td>Date of Birth</td>
  					<td>: <select name="date"><option disabled selected>---Date---</option>
              <?php
          for($i=1; $i<=31; $i++)
          {

            echo "<option> $i </option>";


          }
          ?>
            </select>

              <select name="Month"> <option disabled selected>---Month---</option>
                <?php
    							foreach($array as $p){
    									echo "<option selected>$p</option>";

    							}
    						?>
              </select>
               <select name="year">
                <option disabled selected>---year---</option>
                <?php
        for($j=1920; $j<=2010; $j++)
        {
          echo "<option> $j </option>";
        }
        ?>

  						</select>
  					</td>
  					<td><span> <?php echo $err_dating;?></span>
              <span><?php echo $err_Month;?></span>
                <span><?php echo $err_year;?> </span></td>
  				</tr>

            <tr>
              <td>Religion :</td>
              <td>: <select name="religion"><option disabled selected>---select---</option>
                <?php
            foreach($array3 as $l)
            {

              echo "<option> $l </option>";


            }
            ?>
              </select>
              </tr>


          <tr>
            <td>Nationality</td>
            <td>: <input type="radio" value="gender" <?php if($gender=="Bangladeshi") echo "checked"; ?> name="gender"> Bangladeshi <input name="gender" <?php if($gender=="Forigner") echo "checked"; ?> value="Forigner" type="radio"> Foriger </td>
            <td><span> <?php echo $err_gender;?> </span></td>
          </tr>
          <tr>
            <td>Father's Name</td>
            <td>: <input type="text" name="name" value="<?php echo $name;?>" placeholder="Your Name........">  </td>
            <td><span> <?php echo $err_name;?> </span></td>
          </tr>
          <tr>
            <td>Mother's Name</td>
            <td>: <input type="text" name="name" value="<?php echo $name;?>" placeholder="Your Name........">  </td>
            <td><span> <?php echo $err_name;?> </span></td>
          </tr>
  				<tr>
            <td>Admission Date :</td>
            <td>: <select name="date"><option disabled selected>---Date---</option>
              <?php
          for($i=1; $i<=31; $i++)
          {

            echo "<option> $i </option>";


          }
          ?>
            </select>

              <select name="Month"> <option disabled selected>---Month---</option>
                <?php
                  foreach($array as $p){
                      echo "<option selected>$p</option>";

                  }
                ?>
              </select>
               <select name="year">
                <option disabled selected>---year---</option>
                <?php
        for($j=1920; $j<=2010; $j++)
        {
          echo "<option> $j </option>";
        }
        ?>

              </select>
            </td>
            <td><span> <?php echo $err_dating;?></span>
              <span><?php echo $err_Month;?></span>
                <span><?php echo $err_year;?> </span></td>

  				</tr>

          <tr>

        <tr>
        <td>Graduation Date </td>
        <td>: <select name="date"><option disabled selected>---Date---</option>
          <?php
      for($i=1; $i<=31; $i++)
      {

        echo "<option> $i </option>";


      }
      ?>
        </select>

          <select name="Month"> <option disabled selected>---Month---</option>
            <?php
              foreach($array as $p){
                  echo "<option selected>$p</option>";

              }
            ?>
          </select>
           <select name="year">
            <option disabled selected>---year---</option>
            <?php
    for($j=1920; $j<=2010; $j++)
    {
      echo "<option> $j </option>";
    }
    ?>

          </select>
        </td>
        <td><span> <?php echo $err_dating;?></span>
          <span><?php echo $err_Month;?></span>
            <span><?php echo $err_year;?> </span></td>
      </tr>

<tr>
  <td>Present Address </td>
  <td>: <input type="text" name="address" value="<?php echo $address;?>" placeholder="Your address ...."> </td>
  <td><span> <?php echo $err_address;?> </span></td>

</tr>
<tr>
  <td>Parmanent Address </td>
  <td>: <input type="text" name="address" value="<?php echo $address;?>" placeholder="Your address ...."> </td>
  <td><span> <?php echo $err_address;?> </span></td>

</tr>

<tr>
  <td>Payment Statues </td>
  <td>: <input type="text" name="payment" value="<?php echo $payment;?>" placeholder="Amount ...."> </td>
  <td><span> <?php echo $payment;?> </span></td>

</tr>

<tr>
<td>Contact Number </td>
<td><input type="text" name="phone"value="<?php echo $phone;?>" placeholder="Number...."> </td>
<td>: <span> <?php echo $err_phone;?> </span></td>
</tr>

<tr>
  <td>Certifate Provided</td>
					<td>: <input type="checkbox" name="cer[]" <?php if(cerExist("Movies")) echo "checked";?> value="Movies"> JSC
					<input type="checkbox" name="cer[]" <?php if(cerExist("Music")) echo "checked";?> value="Music"> HSC<br>
					<input type="checkbox" name="cer[]" <?php if(cerExist("Sports")) echo "checked";?> value="Sports">SSC
					</td>
					<td><span> <?php echo $err_cer;?> </span></td> </td>

</tr>

    <td colspan="2" align="right"><input type="submit" name="DELETE" value="DELETE"></td>
    <td colspan="2" align="right">  <input type="submit" name="UPDATE" value="UPDATE"></td>

  </tr>

<tr>
    <td><a href="Student.php">Go To First page</a></td>
    <td><a href="AdminStudent.php">Go To Top page</a></td>
</tr>
	</table>


  </fieldset>


  </form>
  </body>
</html>
