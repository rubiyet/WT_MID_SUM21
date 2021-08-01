<?php

    include '../model/db_config.php';

    if(!isset($_COOKIE["__RequestVerificationToken"])){
        header("Location: ../portal.php");
    }
    else{
        $userid = $_COOKIE["__RequestVerificationToken"];
    }

    if(!isset($_COOKIE["adminidforinfo"])){
        $adminidforinfo = "";
    }
    else{
        $adminidforinfo = $_COOKIE["adminidforinfo"];
    }

    if(isset($_POST["logout"])){
        setcookie("__RequestVerificationToken","",time()-1,"/");
        setcookie("adminidforinfo","",time()-1,"/");
        header("Location: ../portal.php");
    }

    if(!isset($_COOKIE["__adminsearch"])){
        $adminidforsearch = "";
    }
    else{
        $adminidforsearch = $_COOKIE["__adminsearch"];
    }
    
    
    function getadmin($userid){
        $query =  "select * from admin inner join users on admin.userid = users.uname where users.id = $userid";
        $data = get($query);
        if(count($data) > 0){
            return $data[0];
        }
        else{
            return false;
        }
    }

    function getadminforsearch($adminidforsearch){
        $query =  "select * from admin where id = $adminidforsearch";
        $data = get($query);
        if(count($data) > 0){
            return $data[0];
        }
        else{
            return false;
        }
    }

    $successfullydeleteadmin = "";
    if(!isset($_COOKIE["successfullydeleteadmin"])){
        $successfullydeleteadmin = "";
    }
    else{
            $successfullydeleteadmin = "Successfully Delete";
    }
    $adminid3 = "";
    $error_adminid3 = "";
    $adminid1 = "";
    $error_adminid1 = "";
    $adminid2 = "";
    $adminid = "";
    $error_adminid = "";
    $name = "";
    $error_name = "";
    $salary = "";
    $error_salary = "";
    $email = "";
    $error_email = "";
    $gender ="";
    $error_gender = "";
    $inputbdday="";
	$inputbdmonth="";
	$inputbdyear="";
	$error_inputbddaymonthyear="";
    $inputnationality = "";
    $error_nationality = "";
    $inputreligion = "";
    $error_religion = "";
    $inputbloodgroup = "";
    $error_inputbloodgroup = "";
    $fathername = "";
    $error_fathername = "";
    $mothername = "";
    $error_mothername = "";
    $inputjday = "";
    $inputjmonth = "";
    $inputjyear = "";
    $error_inputjdaymonthyear = "";
    $inputlday = "";
    $inputlmonth = "";
    $inputlyear = "";
    $qualifications = array();
    $error_qualifications = "";
    $error_inputldaymonthyear = "";
    $presentaddress = "";
    $error_presentaddress = "";
    $parmanentaddress = "";
    $error_parmanentaddress = "";
    $hide = 0;
    $contactnumber = "";
    $error_contactnumber = "";
    $filename = "";
    $filename1 = "";
    $folder = "";
    $image = "";
    $error_img = "";
    $error_massage1 = "";
    $error_massage2 = "";

    $error = false;

    $day = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31);
	$month = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
	$year = array(1997,1998,1999,2000,2001,2002,2003,2004,2005,2006,2007,2008,2009,2010,2011,2012,2013,2014,2015,2016,2017,2018,2019,2020,2021);
    $nationality = array("America","Bangladesh","India","Pakisthan","Uganda");
    $religion = array("Muslim","Hindu","Buddhist","Chrustian","other");
    $bloodgroup = array("AB+","AB-","A+","A-","B+","B-","O+","O-");

    if(isset($_POST["admininsert"])){

        if(empty($_POST["adminid"])){
			$error = true;
			$error_adminid = "Admin ID required.";
		}
		else if(strlen($_POST["adminid"]) != 7){
			$error = true;
			$error_adminid = "Admin Id must be 7 character.";
		}
		else{
			$hypen = 0;
			$number = 0;
			$bug =0;
			$arr_adminid = str_split($_POST["adminid"]);
            if(strlen($_POST["adminid"]) == 7){
                if($arr_adminid[2] == "-"){
                    foreach($arr_adminid as $aa){
                        if($aa == "-"){
                            $hypen++;
                        }
                        else if($aa >= 0){
                            $number++;
                        }
                        else{
                            $bug++;
                        }
                    }
                }
                else{
                    $error = true;
                    $error_adminid = "Admin Id like as (**-1***)";
                }
                if($arr_adminid[3] != "1"){
                    $error_adminid = "Admin Id like as (**-1***)";
                }
            }
			if($hypen > 1 || $bug > 0){
				$error = true;
				$error_adminid = "User Id like as (**-1***)";
			}
			else{
				$adminid = $_POST["adminid"];
			}	
		}
        if(empty($_POST["name"])){
            $error = true;
            $error_name = "Must be need Name";
        }
        else if(strlen($_POST["name"]) < 3){
            $error = true;
            $error_name = "Name must be greater then 2 letter";
        }
        else{
            $letter=0;
            $number=0;
            $arr_name = str_split($_POST["name"]);
            foreach($arr_name as $an){
                if($an >= 'A' && $an <= 'Z')
                    $letter++;
                else if($an >= 'a' && $an <= 'z')
                    $letter++;
                else if(is_numeric($an))
                    $number++;
            }
            if($number >= 1){
                $error = true;
                $error_name = "Name must be contain only Letter";
            }
            else{
                $name = $_POST["name"];
            }
        }
        if(empty($_POST["salary"])){
            $error = true;
            $error_salary = "Must be need Salary";
        } 
        else if(is_numeric($_POST["salary"]) == false){
            $error = true;
            $error_salary = "Salary must be contain only number";
        }
        else{
            $salary = $_POST["salary"];
        }
        if(empty($_POST["email"])){
			$error = true;
			$error_email = "Must be need email";
		}
        else if(strpos($_POST["email"], "@gmail.com") == false){
            $hasError = true;
			$error_email = "Email must contain someone@gmail.com";
        }
        else{
            $letter4 = 0;
            $number4 = 0;
            $atsign = 0;
            $fullstop = 0;
            $bug = 0;
            $arr_email = str_split($_POST["email"]);
            foreach($arr_email as $ae){
                if($ae >= "a" && $ae <= "z")
                    $letter4++;
                else if(is_numeric($ae))
                    $number++;
                else if($ae == "@")
                    $atsign++;
                else if($ae == ".")
                    $fullstop++;
                else
                    $bug++;
            }
            if($atsign > 1 || $bug > 0){
                $error_email = "Sorry, someone only letters (a-z), numbers (0-9), and periods (.) are allowed.";
            }
            else{  
                $email=$_POST["email"];
            }
        }
        if(!isset($_POST["gender"])){
			$error = true;
			$error_gender = "Gender Must be Required";
		}
		else{
			$gender = $_POST["gender"];
		}
        if (!isset($_POST["inputbdday"]) || !isset($_POST["inputbdmonth"]) || !isset($_POST["inputbdyear"])){
			$error = true;
			$error_inputbddaymonthyear = "Birth Day, Month & Year Required";
		}
		else{
			$inputbdday = $_POST["inputbdday"];
			$inputbdmonth = $_POST["inputbdmonth"];
			$inputbdyear = $_POST["inputbdyear"];
		}
        if(empty($_POST["inputnationality"])){
            $error = true;
            $error_nationality = "Must be need Nationality";
        }
        else{
            $inputnationality = $_POST["inputnationality"];
        }
        if(empty($_POST["inputreligion"])){
            $error = true;
            $error_religion = "Must be need religion";
        }
        else{
            $inputreligion = $_POST["inputreligion"];
        }
        
        if(!isset($_POST["inputbloodgroup"])){
			$error = true;
			$error_inputbloodgroup="Blood Group Must be Required";
		}
		else{
			$inputbloodgroup = $_POST["inputbloodgroup"];
		}
        if(empty($_POST["fathername"])){
            $error = true;
            $error_fathername = "Must be need Father Name";
        }
        else if(strlen($_POST["fathername"]) < 3){
            $error = true;
            $error_fathername = "Father Name must be greater then 2 letter";
        }
        else{
            $letter5=0;
            $number5=0;
            $arr_fathername = str_split($_POST["fathername"]);
            foreach($arr_fathername as $afn){
                if($afn >= 'A' && $afn <= 'Z')
                    $letter5++;
                else if($afn >= 'a' && $afn <= 'z')
                    $letter5++;
                else if(is_numeric($afn))
                    $number5++;
            }
            if($number5 >= 1){
                $error = true;
                $error_fathername = "Father Name must be contain only Letter";
            }
            else{
                $fathername = $_POST["fathername"];
            }
        }
        if(empty($_POST["mothername"])){
            $error = true;
            $error_mothername = "Must be need Mother Name";
        }
        else if(strlen($_POST["mothername"]) < 3){
            $error = true;
            $error_mothername = "Mother Name must be greater then 2 letter";
        }
        else{
            $letter6=0;
            $number6=0;
            $arr_mothername = str_split($_POST["mothername"]);
            foreach($arr_mothername as $amn){
                if($amn >= 'A' && $amn <= 'Z')
                    $letter6++;
                else if($amn >= 'a' && $amn <= 'z')
                    $letter6++;
                else if(is_numeric($amn))
                    $number6++;
            }
            if($number6 >= 1){
                $error = true;
                $error_mothername = "Mother Name must be contain only Letter";
            }
            else{
                $mothername = $_POST["mothername"];
            }
        }
        if (!isset($_POST["inputjday"]) || !isset($_POST["inputjmonth"]) || !isset($_POST["inputjyear"])){
			$error = true;
			$error_inputjdaymonthyear="Join Day, Month & Year Required";
		}
		else{
			$inputjday = $_POST["inputjday"];
			$inputjmonth = $_POST["inputjmonth"];
			$inputjyear = $_POST["inputjyear"];
		}
        if (!isset($_POST["inputlday"]) || !isset($_POST["inputlmonth"]) || !isset($_POST["inputlyear"])){
			$error = true;
			$error_inputldaymonthyear="Left Day, Month & Year Required";
		}
		else{
			$inputlday = $_POST["inputlday"];
			$inputlmonth = $_POST["inputlmonth"];
			$inputlyear = $_POST["inputlyear"];
		}
        if(empty($_POST["presentaddress"])){
			$error = true;
			$error_presentaddress ="Present Address Must be Required";
		}
		else{
			$presentaddress = $_POST["presentaddress"];
		}
        if(isset($_POST["sameaspresentaddress"])){
            $parmanentaddress = $_POST["presentaddress"];
		}
        if(empty($_POST["parmanentaddress"]) && !isset($_POST["sameaspresentaddress"])){
			$error = true;
			$error_parmanentaddress ="Parmanent Address Must be Required";
		}
        else if(!empty($_POST["parmanentaddress"]) && !isset($_POST["sameaspresentaddress"])){
			$parmanentaddress = $_POST["parmanentaddress"];
		}

        if(empty($_POST["contactnumber"])){
            $error = true;
            $error_contactnumber = "Contact Number Must be Required";
        }
        else if(!is_numeric($_POST["contactnumber"])){
            $error = true;
            $error_contactnumber = "Contact Number Must be Number";
        }
        else{
            $contactnumber = $_POST["contactnumber"];
        }
        if(empty($_POST["qualifications"])){
            $error = true;
            $error_qualifications = "Qualification must be Required";
        }
        else{
            $qualifications = $_POST["qualifications"];
        }
        if(isset($_FILES['image'])){
            $filename = $_FILES['image']['name'];
            $filesize =$_FILES['image']['size'];
            $filetmp =$_FILES['image']['tmp_name'];
            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $arr_ext = array("png","jpg","jpeg");

            if(empty($filename)){
                $error = true;
                $error_img = "Image required";
            }
            else if (!in_array($ext,$arr_ext)) {
                $error = true;
                $error_img = "Please choose only png, jpg or jpeg file";
            }
            else if($filesize > 524288){
                $error = true;
                $error_img = 'File size must be excately .5 MB or 512 KB';
            }
            else{
                move_uploaded_file($filetmp,"image/admin/".$filename);
            }   
        }
        if(!$error){
            $birthday = $inputbdday." ".$inputbdmonth." ".$inputbdyear;
            $joiningdate = $inputjday." ".$inputjmonth." ".$inputjyear;
            $leftdate = $inputlday." ".$inputlmonth." ".$inputlyear;
            $qualificationsstring = implode(", ",$qualifications);
            $data = insertadmin($adminid,$name,$salary,$email,$gender,$birthday,$inputnationality,$inputreligion,$inputbloodgroup,$fathername,$mothername,$joiningdate,$leftdate,$qualificationsstring,$presentaddress,$parmanentaddress,$contactnumber,$filename);
            if($data === true){
                $error_massage2 = "Successfully added Admin ID ".$adminid;
                $adminid = "";
                $error_adminid = "";
                $name = "";
                $error_name = "";
                $salary = "";
                $error_salary = "";
                $email = "";
                $error_email = "";
                $gender ="";
                $error_gender = "";
                $inputbdday="";
                $inputbdmonth="";
                $inputbdyear="";
                $error_inputbddaymonthyear="";
                $inputnationality = "";
                $error_nationality = "";
                $inputreligion = "";
                $error_religion = "";
                $inputbloodgroup = "";
                $error_inputbloodgroup = "";
                $fathername = "";
                $error_fathername = "";
                $mothername = "";
                $error_mothername = "";
                $inputjday = "";
                $inputjmonth = "";
                $inputjyear = "";
                $error_inputjdaymonthyear = "";
                $inputlday = "";
                $inputlmonth = "";
                $inputlyear = "";
                $qualifications = array();
                $error_qualifications = "";
                $error_inputldaymonthyear = "";
                $presentaddress = "";
                $error_presentaddress = "";
                $parmanentaddress = "";
                $error_parmanentaddress = "";
                $contactnumber = "";
                $error_contactnumber = ""; 
            }
            else if($data = 1062){
                $error_massage1 = "Admin ID ".$adminid." already exists";
            }
        }
    }

    if(isset($_POST["sameaspresentaddress"])){
        $hide = 1;
    }

    if(isset($_POST["clear"])){
        $adminid = "";
        $error_adminid = "";
        $name = "";
        $error_name = "";
        $salary = "";
        $error_salary = "";
        $email = "";
        $error_email = "";
        $gender ="";
        $error_gender = "";
        $inputbdday="";
        $inputbdmonth="";
        $inputbdyear="";
        $error_inputbddaymonthyear="";
        $inputnationality = "";
        $error_nationality = "";
        $inputreligion = "";
        $error_religion = "";
        $inputbloodgroup = "";
        $error_inputbloodgroup = "";
        $fathername = "";
        $error_fathername = "";
        $mothername = "";
        $error_mothername = "";
        $inputjday = "";
        $inputjmonth = "";
        $inputjyear = "";
        $error_inputjdaymonthyear = "";
        $inputlday = "";
        $inputlmonth = "";
        $inputlyear = "";
        $qualifications = array();
        $error_qualifications = "";
        $error_inputldaymonthyear = "";
        $presentaddress = "";
        $error_presentaddress = "";
        $parmanentaddress = "";
        $error_parmanentaddress = "";
        $contactnumber = "";
        $error_contactnumber = "";
    }

    function insertadmin($adminid,$name,$salary,$email,$gender,$birthday,$inputnationality,$inputreligion,$inputbloodgroup,$fathername,$mothername,$joiningdate,$leftdate,$qualificationsstring,$presentaddress,$parmanentaddress,$contactnumber,$filename){
        $query = "insert into admin values(Null,'$adminid','$name','$salary','$email','$gender','$birthday','$inputnationality','$inputreligion','$inputbloodgroup','$fathername','$mothername','$joiningdate','$leftdate','$qualificationsstring','$presentaddress','$parmanentaddress','$contactnumber','$filename')";
        return execute($query);
    }

    if(isset($_POST["enterforadminupdate"])){
        if(empty($_POST["adminid1"])){
			$error = true;
			$error_adminid1 = "Admin ID required.";
		}
		else if(strlen($_POST["adminid1"]) != 7){
			$error = true;
			$error_adminid1 = "Admin Id must be 7 character.";
		}
		else{
			$hypen = 0;
			$number = 0;
			$bug =0;
			$arr_adminid1 = str_split($_POST["adminid1"]);
            if(strlen($_POST["adminid1"]) == 7){
                if($arr_adminid1[2] == "-"){
                    foreach($arr_adminid1 as $aa){
                        if($aa == "-"){
                            $hypen++;
                        }
                        else if($aa >= 0){
                            $number++;
                        }
                        else{
                            $bug++;
                        }
                    }
                }
                else{
                    $error = true;
                    $error_adminid1 = "Admin Id like as (**-1***)";
                }
                if($arr_adminid1[3] != "1"){
                    $error = true;
                    $error_adminid1 = "Admin Id like as (**-1***)";
                }
            }
			if($hypen > 1 || $bug > 0){
				$error = true;
				$error_adminid1 = "User Id like as (**-1***)";
			}
			else{
				$adminid2 = $_POST["adminid1"];
			}	
		}
        if(!$error){
            if($au = authenticateforadmininfo($adminid2)){
                setcookie("adminidforinfo",$au["id"],time()+1200,"/");
                header("Location: admin_info_update_form.php");
            }
            else{
                $error_adminid1 = "invalid Admin ID.";
            }

        }
    }

    function authenticateforadmininfo($uname){
        $query = "select * from admin where userid = '$uname'";
        $data = get($query);
        if(count($data) > 0){
            return $data[0];
        }
        else{
            return false;
        }
    }

    function getadminupdate($adminidforinfo){
        $query =  "select * from admin where id = $adminidforinfo";
        $data = get($query); 
        if(count($data) > 0){
            global $adminid;
            global $name;
            global $salary;
            global $gender;
            global $email;
            global $birthday;
            global $birthdayarray;
            global $inputbdday;
            global $inputbdmonth;
            global $inputbdyear;
            global $inputnationality;
            global $inputreligion;
            global $inputbloodgroup;
            global $fathername;
            global $mothername;
            global $joiningdate;
            global $joiningdatearray;
            global $inputjday;
            global $inputjmonth;
            global $inputjyear;
            global $leftdate;
            global $leftdatearray;
            global $inputlday;
            global $inputlmonth;
            global $inputlyear;
            global $qualificationsarray;
            global $qualifications;
            global $presentaddress;
            global $parmanentaddress;
            global $contactnumber;
            global $image;

            
            $adminid = $data[0]["userid"];
            $name = $data[0]["name"];
            $salary = $data[0]["salary"];
            $gender = $data[0]["gender"];
            $birthday = $data[0]["birthday"];
            $birthdayarray = explode(" ",$birthday);
            $inputbdday = $birthdayarray[0];
            $inputbdmonth = $birthdayarray[1];
            $inputbdyear = $birthdayarray[2];
            $email = $data[0]["email"];
            $inputnationality = $data[0]["nationality"];
            $inputreligion = $data[0]["religion"];
            $inputbloodgroup = $data[0]["bloodgroup"];
            $fathername = $data[0]["fathername"];
            $mothername = $data[0]["mothername"];
            $joiningdate = $data[0]["joiningdate"];
            $joiningdatearray = explode(" ",$joiningdate);
            $inputjday = $joiningdatearray[0];
            $inputjmonth = $joiningdatearray[1];
            $inputjyear = $joiningdatearray[2];
            $leftdate = $data[0]["leftdate"];
            $leftdatearray = explode(" ",$leftdate);
            $inputlday = $leftdatearray[0];
            $inputlmonth = $leftdatearray[1];
            $inputlyear = $leftdatearray[2];
            $qualificationsarray = $data[0]["qualification"];
            $qualifications = explode(" ",$qualificationsarray);
            $presentaddress = $data[0]["presentaddress"];
            $parmanentaddress = $data[0]["parmanentaddress"];
            $contactnumber = $data[0]["contactnumber"];
            $image = $data[0]["img"];
            return $data[0];
        }
        else{
            return false;
        }
    }

    $studentid = "";
    $error_studentid = "";
    $teacherid = "";
    $error_teacherid = "";

    $error = false;

    if(isset($_POST["studentsearch"])){
        if(empty($_POST["studentid"])){
            $error = true;
            $error_studentid = "Student ID Required";
        }
        else{
            $arr_studentid = str_split($_POST["studentid"]);
            //courseid like C4001,c4,C40009,c400000002
            if($arr_studentid[0] == 'S' || $arr_studentid[0] == 's'){
                $counter1 = 0;
                $counter2 = 0;
                foreach($arr_studentid as $as){
                    if($as >= 'A' && $as <= 'Z'){
                        $counter1++;
                    }
                    else if($as >= 'a' && $as <= 'z'){
                        $counter1++;
                    }
                    else if(is_numeric($as)){
                        $counter2++;
                    }
                }
                if($counter1 > 1 || $counter2 < 1){
                    $error = true;
                    $error_studentid = "Invalid Student ID";
                }
                else{
                    $studentid = $_POST["studentid"];
                }
            }
            else{
                $error = true;
                $error_studentid = "Invalid Student ID";
            }
        }
    }
    if(isset($_POST["teachersearch"])){
        if(empty($_POST["teacherid"])){
            $error = true;
            $error_teacherid = "Teacher ID Required";
        }
        else{
            $arr_teacherid = str_split($_POST["teacherid"]);
            //courseid like C4001,c4,C40009,c400000002
            if($arr_teacherid[0] == 'T' || $arr_teacherid[0] == 't'){
                $counter3 = 0;
                $counter4 = 0;
                foreach($arr_teacherid as $at){
                    if($at >= 'A' && $at <= 'Z'){
                        $counter3++;
                    }
                    else if($at >= 'a' && $at <= 'z'){
                        $counter3++;
                    }
                    else if(is_numeric($at)){
                        $counter4++;
                    }
                }
                if($counter3 > 1 || $counter4 < 1){
                    $error = true;
                    $error_teacherid = "Invalid Teacher ID";
                }
                else{
                    $teacherid = $_POST["teacherid"];
                }
            }
            else{
                $error = true;
                $error_teacherid = "Invalid Teacher ID";
            }
        }
    }
    if(isset($_POST["adminsearch"])){
        if(empty($_POST["adminid1"])){
			$error = true;
			$error_adminid3 = "Admin ID Required.";
		}
		else if(strlen($_POST["adminid1"]) != 7){
			$error = true;
			$error_adminid3 = "Invalid Admin ID";
		}
		else{
			$hypen = 0;
			$number = 0;
			$bug =0;
			$arr_adminid = str_split($_POST["adminid1"]);
            if(strlen($_POST["adminid1"]) == 7){
                if($arr_adminid[2] == "-"){
                    foreach($arr_adminid as $aa){
                        if($aa == "-"){
                            $hypen++;
                        }
                        else if($aa >= 0){
                            $number++;
                        }
                        else{
                            $bug++;
                        }
                    }
                }
                else{
                    $error = true;
                    $error_adminid3 = "Invalid Admin ID";
                }
                if($arr_adminid[3] != "1"){
                    $error = true;
                    $error_adminid3 = "Invalid Admin ID";
                }
            }
			if($hypen > 1 || $bug > 0){
				$error = true;
				$error_adminid3 = "Invalid Admin ID";
			}
			else{
				$adminid3 = $_POST["adminid1"];
			}	
		}
        if(!$error){
            if($au = authenticateforadmininfo($adminid3)){
                    setcookie("__adminsearch",$au["id"],time()+1200,"/");
                    header("Location: home_admin_search_personal_info.php");
            }
            else{
                $error_adminid3 = "Not Match.";
            }
        }
    }

    if(isset($_POST["adminupdate"])){
        
        if(!empty($_POST["id"])){
            $id = $_POST["id"];
		}
        if(empty($_POST["adminid"])){
			$error = true;
			$error_adminid = "Admin ID required.";
		}
		else if(strlen($_POST["adminid"]) != 7){
			$error = true;
			$error_adminid = "Admin Id must be 7 character.";
		}
		else{
			$hypen = 0;
			$number = 0;
			$bug =0;
			$arr_adminid = str_split($_POST["adminid"]);
            if(strlen($_POST["adminid"]) == 7){
                if($arr_adminid[2] == "-"){
                    foreach($arr_adminid as $aa){
                        if($aa == "-"){
                            $hypen++;
                        }
                        else if($aa >= 0){
                            $number++;
                        }
                        else{
                            $bug++;
                        }
                    }
                }
                else{
                    $error = true;
                    $error_adminid = "Admin Id like as (**-1***)";
                }
                if($arr_adminid[3] != "1"){
                    $error = true;
                    $error_adminid = "Admin Id like as (**-1***)";
                }
            }
			if($hypen > 1 || $bug > 0){
				$error = true;
				$error_adminid = "User Id like as (**-1***)";
			}
			else{
				$adminid = $_POST["adminid"];
			}	
		}
        if(empty($_POST["name"])){
            $error = true;
            $error_name = "Must be need Name";
        }
        else if(strlen($_POST["name"]) < 3){
            $error = true;
            $error_name = "Name must be greater then 2 letter";
        }
        else{
            $letter=0;
            $number=0;
            $arr_name = str_split($_POST["name"]);
            foreach($arr_name as $an){
                if($an >= 'A' && $an <= 'Z')
                    $letter++;
                else if($an >= 'a' && $an <= 'z')
                    $letter++;
                else if(is_numeric($an))
                    $number++;
            }
            if($number >= 1){
                $error = true;
                $error_name = "Name must be contain only Letter";
            }
            else{
                $name = $_POST["name"];
            }
        }
        if(empty($_POST["salary"])){
            $error = true;
            $error_salary = "Must be need Salary";
        } 
        else if(is_numeric($_POST["salary"]) == false){
            $error = true;
            $error_salary = "Salary must be contain only number";
        }
        else{
            $salary = $_POST["salary"];
        }
        if(empty($_POST["email"])){
			$error = true;
			$error_email = "Must be need email";
		}
        else if(strpos($_POST["email"], "@gmail.com") == false){
            $error = true;
			$error_email = "Email must contain someone@gmail.com";
        }
        else{
            $letter4 = 0;
            $number4 = 0;
            $atsign = 0;
            $fullstop = 0;
            $bug = 0;
            $arr_email = str_split($_POST["email"]);
            foreach($arr_email as $ae){
                if($ae >= "a" && $ae <= "z")
                    $letter4++;
                else if(is_numeric($ae))
                    $number++;
                else if($ae == "@")
                    $atsign++;
                else if($ae == ".")
                    $fullstop++;
                else
                    $bug++;
            }
            if($atsign > 1 || $bug > 0){
                $error = true;
                $error_email = "Sorry, someone only letters (a-z), numbers (0-9), and periods (.) are allowed.";
            }
            else{  
                $email=$_POST["email"];
            }
        }
        if(!isset($_POST["gender"])){
			$error = true;
			$error_gender = "Gender Must be Required";
		}
		else{
			$gender = $_POST["gender"];
		}
        if (!isset($_POST["inputbdday"]) || !isset($_POST["inputbdmonth"]) || !isset($_POST["inputbdyear"])){
			$error = true;
			$error_inputbddaymonthyear = "Birth Date Required";
		}
		else{
			$inputbdday = $_POST["inputbdday"];
			$inputbdmonth = $_POST["inputbdmonth"];
			$inputbdyear = $_POST["inputbdyear"];
		}
        if(empty($_POST["inputnationality"])){
            $error = true;
            $error_nationality = "Must be need Nationality";
        }
        else{
            $inputnationality = $_POST["inputnationality"];
        }
        if(empty($_POST["inputreligion"])){
            $error = true;
            $error_religion = "Must be need religion";
        }
        else{
            $inputreligion = $_POST["inputreligion"];
        }
        
        if(!isset($_POST["inputbloodgroup"])){
			$error = true;
			$error_inputbloodgroup="Blood Group Must be Required";
		}
		else{
			$inputbloodgroup = $_POST["inputbloodgroup"];
		}
        if(empty($_POST["fathername"])){
            $error = true;
            $error_fathername = "Must be need Father Name";
        }
        else if(strlen($_POST["fathername"]) < 3){
            $error = true;
            $error_fathername = "Father Name must be greater then 2 letter";
        }
        else{
            $letter5=0;
            $number5=0;
            $arr_fathername = str_split($_POST["fathername"]);
            foreach($arr_fathername as $afn){
                if($afn >= 'A' && $afn <= 'Z')
                    $letter5++;
                else if($afn >= 'a' && $afn <= 'z')
                    $letter5++;
                else if(is_numeric($afn))
                    $number5++;
            }
            if($number5 >= 1){
                $error = true;
                $error_fathername = "Father Name must be contain only Letter";
            }
            else{
                $fathername = $_POST["fathername"];
            }
        }
        if(empty($_POST["mothername"])){
            $error = true;
            $error_mothername = "Must be need Mother Name";
        }
        else if(strlen($_POST["mothername"]) < 3){
            $error = true;
            $error_mothername = "Mother Name must be greater then 2 letter";
        }
        else{
            $letter6=0;
            $number6=0;
            $arr_mothername = str_split($_POST["mothername"]);
            foreach($arr_mothername as $amn){
                if($amn >= 'A' && $amn <= 'Z')
                    $letter6++;
                else if($amn >= 'a' && $amn <= 'z')
                    $letter6++;
                else if(is_numeric($amn))
                    $number6++;
            }
            if($number6 >= 1){
                $error = true;
                $error_mothername = "Mother Name must be contain only Letter";
            }
            else{
                $mothername = $_POST["mothername"];
            }
        }
        if (!isset($_POST["inputjday"]) || !isset($_POST["inputjmonth"]) || !isset($_POST["inputjyear"])){
			$error = true;
			$error_inputjdaymonthyear="Join Day, Month & Year Required";
		}
		else{
			$inputjday = $_POST["inputjday"];
			$inputjmonth = $_POST["inputjmonth"];
			$inputjyear = $_POST["inputjyear"];
		}
        if (!isset($_POST["inputlday"]) || !isset($_POST["inputlmonth"]) || !isset($_POST["inputlyear"])){
			$error = true;
			$error_inputldaymonthyear="Left Day, Month & Year Required";
		}
		else{
			$inputlday = $_POST["inputlday"];
			$inputlmonth = $_POST["inputlmonth"];
			$inputlyear = $_POST["inputlyear"];
		}
        if(empty($_POST["presentaddress"])){
			$error = true;
			$error_presentaddress ="Present Address Must be Required";
		}
		else{
			$presentaddress = $_POST["presentaddress"];
		}
        if(isset($_POST["sameaspresentaddress"])){
            $parmanentaddress = $_POST["presentaddress"];
		}
        if(empty($_POST["parmanentaddress"]) && !isset($_POST["sameaspresentaddress"])){
			$error = true;
			$error_parmanentaddress ="Parmanent Address Must be Required";
		}
        else if(!empty($_POST["parmanentaddress"]) && !isset($_POST["sameaspresentaddress"])){
			$parmanentaddress = $_POST["parmanentaddress"];
		}

        if(empty($_POST["contactnumber"])){
            $error = true;
            $error_contactnumber = "Contact Number Must be Required";
        }
        else if(!is_numeric($_POST["contactnumber"])){
            $error = true;
            $error_contactnumber = "Contact Number Must be Number";
        }
        else{
            $contactnumber = $_POST["contactnumber"];
        }
        if(empty($_POST["qualifications"])){
            $error = true;
            $error_qualifications = "Qualification must be Required";
        }
        else{
            $qualifications = $_POST["qualifications"];
        }
        if(isset($_FILES['image'])){
            $filename = $_FILES['image']['name'];
            $filesize =$_FILES['image']['size'];
            $filetmp =$_FILES['image']['tmp_name'];
            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $arr_ext = array("png","jpg","jpeg");

            if(empty($filename)){
                $filename = $_POST["image1"];
                $image = $filename;
            }
            else if (!in_array($ext,$arr_ext)) {
                $error = true;
                $error_img = "Please choose only png, jpg or jpeg file";
            }
            else if($filesize > 524288){
                $error = true;
                $error_img = 'File size must be excately .5 MB or 512 KB';
            }
            else{
                move_uploaded_file($filetmp,"image/admin/".$filename);
            }   
        }
        if(!$error){
            $birthday1 = $inputbdday." ".$inputbdmonth." ".$inputbdyear;
            $joiningdate1 = $inputjday." ".$inputjmonth." ".$inputjyear;
            $leftdate1 = $inputlday." ".$inputlmonth." ".$inputlyear;
            $qualificationsstring1 = implode(", ",$qualifications);
            $data = updateadmin($adminid,$name,$salary,$gender,$birthday1,$email,$inputnationality,$inputreligion,$inputbloodgroup,$fathername,$mothername,$joiningdate1,$leftdate1,$qualificationsstring1,$presentaddress,$parmanentaddress,$contactnumber,$filename);
            if($data === true){
                $error_massage2 = "Successfully update Admin ID ".$adminid;
                $adminid = "";
                $error_adminid = "";
                $name = "";
                $error_name = "";
                $salary = "";
                $error_salary = "";
                $email = "";
                $error_email = "";
                $gender ="";
                $error_gender = "";
                $inputbdday="";
                $inputbdmonth="";
                $inputbdyear="";
                $error_inputbddaymonthyear="";
                $inputnationality = "";
                $error_nationality = "";
                $inputreligion = "";
                $error_religion = "";
                $inputbloodgroup = "";
                $error_inputbloodgroup = "";
                $fathername = "";
                $error_fathername = "";
                $mothername = "";
                $error_mothername = "";
                $inputjday = "";
                $inputjmonth = "";
                $inputjyear = "";
                $error_inputjdaymonthyear = "";
                $inputlday = "";
                $inputlmonth = "";
                $inputlyear = "";
                $qualifications = array();
                $error_qualifications = "";
                $error_inputldaymonthyear = "";
                $presentaddress = "";
                $error_presentaddress = "";
                $parmanentaddress = "";
                $error_parmanentaddress = "";
                $contactnumber = "";
                $error_contactnumber = "";
                $filename= ""; 
            }
            else if($rs = 1062){
                $error_massage1 = "Admin ID ".$adminid." already exists";
            }
            
        }
    }
    if(isset($_POST["sameaspresentaddress"])){
        $hide = 1;
    }
    function updateadmin($adminid,$name,$salary,$gender,$birthday1,$email,$inputnationality,$inputreligion,$inputbloodgroup,$fathername,$mothername,$joiningdate1,$leftdate1,$qualificationsstring1,$presentaddress,$parmanentaddress,$contactnumber,$filename){
        global $adminidforinfo;
        $query = "update admin set userid='$adminid', name='$name', salary='$salary', gender='$gender', birthday='$birthday1', email='$email',nationality='$inputnationality', religion='$inputreligion', bloodgroup='$inputbloodgroup', fathername='$fathername', mothername='$mothername', joiningdate='$joiningdate1',leftdate='$leftdate1',qualification='$qualificationsstring1',presentaddress='$presentaddress',parmanentaddress='$parmanentaddress',contactnumber='$contactnumber', img='$filename' where id= $adminidforinfo";
        return execute($query);
    }

    if(isset($_POST["enterforadmindelete"])){
        if(empty($_POST["adminid1"])){
			$error = true;
			$error_adminid1 = "Admin ID required.";
		}
		else if(strlen($_POST["adminid1"]) != 7){
			$error = true;
			$error_adminid1 = "Admin Id must be 7 character.";
		}
		else{
			$hypen = 0;
			$number = 0;
			$bug =0;
			$arr_adminid1 = str_split($_POST["adminid1"]);
            if(strlen($_POST["adminid1"]) == 7){
                if($arr_adminid1[2] == "-"){
                    foreach($arr_adminid1 as $aa){
                        if($aa == "-"){
                            $hypen++;
                        }
                        else if($aa >= 0){
                            $number++;
                        }
                        else{
                            $bug++;
                        }
                    }
                }
                else{
                    $error = true;
                    $error_adminid1 = "Admin Id like as (**-1***)";
                }
                if($arr_adminid1[3] != "1"){
                    $error = true;
                    $error_adminid1 = "Admin Id like as (**-1***)";
                }
            }
			if($hypen > 1 || $bug > 0){
				$error = true;
				$error_adminid1 = "User Id like as (**-1***)";
			}
			else{
				$adminid2 = $_POST["adminid1"];
			}	
		}
        if(!$error){
            if($au = authenticateforadmininfo($adminid2)){
                setcookie("adminidforinfo",$au["id"],time()+1200,"/");
                header("Location: admin_info_delete_form.php");
            }
            else{
                $error_adminid1 = "invalid Admin ID.";
            }

        }
    }

    if(isset($_POST["deleteadmin"])){
        $data = deleteadmin();
        if($data === true){
            setcookie("successfullydeleteadmin","true",time()+1,"/");
            header("Location: admin_info_delete_entry_form.php"); 
        }
    }
    if(isset($_POST["sameaspresentaddress"])){
        $hide = 1;
    }

    function deleteadmin(){
        global $adminidforinfo;
        $query = "delete from admin where id= $adminidforinfo";
        return execute($query);
    }
    if(isset($_POST["backfordelete"])){
        header("Location: admin_info_delete_entry_form.php");
    }
    if(isset($_POST["backforupdate"])){
        header("Location: admin_info_update_entry_form.php");
    }




    //......................................................COURSE INSERT/UPDATE/DELETE....................................................

    $courseid = "";
    $error_courseid = "";
    $coursename = "";
    $error_coursename = "";
    $class = "";
    $error_class = "";
    $section = "";
    $error_section = "";
    $year = "";
    $error_year = "";
    $teacherid = "";
    $error_teacherid = "";

    $error = false;

    if(isset($_POST["courseinsert"])){
        if(empty($_POST["courseid"])){
			$error = true;
            $error_courseid = "Must Need Course ID";
		}
		else if(strlen($_POST["courseid"]) != 7){
			$error = true;
			$error_courseid = "Course ID must be 7 character.";
		}
		else{
			$hypen = 0;
			$number = 0;
			$bug =0;
			$arr_courseid = str_split($_POST["courseid"]);
            if(strlen($_POST["courseid"]) == 7){
                if($arr_courseid[2] == "-"){
                    foreach($arr_courseid as $aa){
                        if($aa == "-"){
                            $hypen++;
                        }
                        else if($aa >= 0){
                            $number++;
                        }
                        else{
                            $bug++;
                        }
                    }
                }
                else{
                    $error = true;
                    $error_courseid = "Course Id like as (**-4***)";
                }
                if($arr_courseid[3] != "4"){
                    $error = true;
                    $error_courseid = "Course Id like as (**-4***)";
                }
            }
			if($hypen > 1 || $bug > 0){
				$error = true;
				$error_courseid = "Course Id like as (**-4***)";
			}
			else{
				$courseid = $_POST["courseid"];
			}	
		}
        if(empty($_POST["coursename"])){
            $error = true;
            $error_coursename = "Must be need Course Name";
        }
        else if(strlen($_POST["coursename"]) < 2){
            $error = true;
            $error_coursename = "Course name must be greater then 1 letter";
        }
        else{
            $letter=0;
            $number=0;
            $arr = str_split($_POST["coursename"]);
            foreach($arr as $a){
                if($a >= 'A' && $a <= 'Z')
                    $letter++;
                else if($a >= 'a' && $a <= 'z')
                    $letter++;
                else if($a >= 0)
                    $number++;
            }
            if($number >= 1){
                $error_coursename = "Course name must be contain only Letter";
            }
            else{
                $coursename = $_POST["coursename"];
            }
        } 
        if(!$error){
            $data = courseinsert($courseid,$coursename);
            if($data === true){
                $error_massage2 = "Successfully added Admin ID ".$courseid;
                $courseid = "";
                $coursename = "";
            }
            else if($data = 1062){
                $error_massage1 = "Course ID ".$courseid." already exists";
            }
        }
    }

    function courseinsert($courseid,$coursename){
        $query = "insert into course values(Null,'$courseid','$coursename')";
        return execute($query);
    }

    if(isset($_POST["enterforcourseupdate"])){
        if(empty($_POST["courseid"])){
			$error = true;
            $error_courseid = "Must Need Course ID";
		}
		else if(strlen($_POST["courseid"]) != 7){
			$error = true;
			$error_courseid = "Course ID must be 7 character.";
		}
		else{
			$hypen = 0;
			$number = 0;
			$bug =0;
			$arr_courseid = str_split($_POST["courseid"]);
            if(strlen($_POST["courseid"]) == 7){
                if($arr_courseid[2] == "-"){
                    foreach($arr_courseid as $aa){
                        if($aa == "-"){
                            $hypen++;
                        }
                        else if($aa >= 0){
                            $number++;
                        }
                        else{
                            $bug++;
                        }
                    }
                }
                else{
                    $error = true;
                    $error_courseid = "Course Id like as (**-4***)";
                }
                if($arr_courseid[3] != "4"){
                    $error = true;
                    $error_courseid = "Course Id like as (**-4***)";
                }
            }
			if($hypen > 1 || $bug > 0){
				$error = true;
				$error_courseid = "Course Id like as (**-4***)";
			}
			else{
				$courseid = $_POST["courseid"];
			}	
		}
        if(!$error){
            if($cu = authenticateforcourseidforUD($courseid)){
                setcookie("courseidforUD",$cu["id"],time()+1200,"/");
                header("Location: course_update_form.php");
            }
            else{
                $error_courseid = "invalid Course ID.";
            }

        }
    }

    function authenticateforcourseidforUD($courseid){
        $query = "select * from course where courseid = '$courseid'";
        $data = get($query);
        if(count($data) > 0){
            return $data[0];
        }
        else{
            return false;
        }
    }

    if(!isset($_COOKIE["courseidforUD"])){
        $courseidforUD = "";
    }
    else{
        $courseidforUD = $_COOKIE["courseidforUD"];
    }

    function getcourseupdate($courseidforUD){
        $query =  "select * from course where id = $courseidforUD";
        $data = get($query); 
        if(count($data) > 0){
            global $courseid;
            global $coursename;

            $courseid = $data[0]["courseid"];
            $coursename = $data[0]["coursename"];
            return $data[0];
        }
        else{
            return false;
        }
    }

    if(isset($_POST["courseupdate"])){
        if(empty($_POST["courseid"])){
			$error = true;
            $error_courseid = "Must Need Course ID";
		}
		else if(strlen($_POST["courseid"]) != 7){
			$error = true;
			$error_courseid = "Course ID must be 7 character.";
		}
		else{
			$hypen = 0;
			$number = 0;
			$bug =0;
			$arr_courseid = str_split($_POST["courseid"]);
            if(strlen($_POST["courseid"]) == 7){
                if($arr_courseid[2] == "-"){
                    foreach($arr_courseid as $aa){
                        if($aa == "-"){
                            $hypen++;
                        }
                        else if($aa >= 0){
                            $number++;
                        }
                        else{
                            $bug++;
                        }
                    }
                }
                else{
                    $error = true;
                    $error_courseid = "Course Id like as (**-4***)";
                }
                if($arr_courseid[3] != "4"){
                    $error = true;
                    $error_courseid = "Course Id like as (**-4***)";
                }
            }
			if($hypen > 1 || $bug > 0){
				$error = true;
				$error_courseid = "Course Id like as (**-4***)";
			}
			else{
				$courseid = $_POST["courseid"];
			}	
		}
        if(empty($_POST["coursename"])){
            $error = true;
            $error_coursename = "Must be need Course Name";
        }
        else if(strlen($_POST["coursename"]) < 2){
            $error = true;
            $error_coursename = "Course name must be greater then 1 letter";
        }
        else{
            $letter=0;
            $number=0;
            $arr = str_split($_POST["coursename"]);
            foreach($arr as $a){
                if($a >= 'A' && $a <= 'Z')
                    $letter++;
                else if($a >= 'a' && $a <= 'z')
                    $letter++;
                else if($a >= 0)
                    $number++;
            }
            if($number >= 1){
                $error = true;
                $error_coursename = "Course name must be contain only Letter";
            }
            else{
                $coursename = $_POST["coursename"];
            }
        } 
        if(!$error){
            $data = courseupdate($courseid,$coursename);
            if($data === true){
                $error_massage2 = "Successfully updated Course ID ".$courseid;
                $courseid = "";
                $coursename = "";
            }
            else if($data = 1062){
                $error_massage1 = "Course ID ".$courseid." already exists";
            }
        }
    }

    function courseupdate($courseid,$coursename){
        global $courseidforUD;
        $query = "update course set courseid='$courseid', coursename='$coursename' where id= $courseidforUD";
        return execute($query);
    }

    if(isset($_POST["backcourseupdate"])){
        header("Location: course_update_entry_form.php");
    }

    if(isset($_POST["enterforcoursedelete"])){
        if(empty($_POST["courseid"])){
			$error = true;
            $error_courseid = "Must Need Course ID";
		}
		else if(strlen($_POST["courseid"]) != 7){
			$error = true;
			$error_courseid = "Course ID must be 7 character.";
		}
		else{
			$hypen = 0;
			$number = 0;
			$bug =0;
			$arr_courseid = str_split($_POST["courseid"]);
            if(strlen($_POST["courseid"]) == 7){
                if($arr_courseid[2] == "-"){
                    foreach($arr_courseid as $aa){
                        if($aa == "-"){
                            $hypen++;
                        }
                        else if($aa >= 0){
                            $number++;
                        }
                        else{
                            $bug++;
                        }
                    }
                }
                else{
                    $error = true;
                    $error_courseid = "Course Id like as (**-4***)";
                }
                if($arr_courseid[3] != "4"){
                    $error = true;
                    $error_courseid = "Course Id like as (**-4***)";
                }
            }
			if($hypen > 1 || $bug > 0){
				$error = true;
				$error_courseid = "Course Id like as (**-4***)";
			}
			else{
				$courseid = $_POST["courseid"];
			}	
		}
        if(!$error){
            if($cu = authenticateforcourseidforUD($courseid)){
                setcookie("courseidforUD",$cu["id"],time()+1200,"/");
                header("Location: course_delete_form.php");
            }
            else{
                $error_courseid = "invalid Course ID.";
            }

        }
    }

    if(isset($_POST["coursedelete"])){
        $data = coursedelete();
        if($data === true){
            setcookie("successfullycoursedelete","true",time()+1,"/");
            header("Location: course_delete_entry_form.php"); 
        }
    }

    function coursedelete(){
        global $courseidforUD;
        $query = "delete from course where id= $courseidforUD";
        return execute($query);
    }

    $successfullycoursedelete = "";
    if(!isset($_COOKIE["successfullycoursedelete"])){
        $successfullycoursedelete = "";
    }
    else{
        $successfullycoursedelete = "Successfully Delete";
    }

    if(isset($_POST["backcoursedelete"])){
        header("Location: course_delete_entry_form.php");
    }
?>