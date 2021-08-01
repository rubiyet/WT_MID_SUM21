<?php

    include 'model/db_config.php';

    $uname = "";
    $error_uname = "";
    $pass = "";
    $error_pass = "";
    $error_contact = "";
    $error_authenticateUser = "";

    $error = false;

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST["login"])){
            if(empty($_POST["uname"])){
                $error = true;
                $error_uname = "The User Name field is required.";
            }
            else{
                    $uname = $_POST["uname"];
            }
            if(empty($_POST["pass"])){
                $error = true;
                $error_pass = "The Password field is required.";
            }
            else{
                    $pass = $_POST["pass"];
            }
            if(!$error){
                if($u = authenticateUser($uname,$pass)){
                    if($u["type"] == "Admin" && $u["status"] == "Active"){
                        setcookie("__RequestVerificationToken",$u["id"],time()+1200,"/");
                        header("Location: admin/home.php");
                    }
                    else if($u["type"] == "Teacher" && $u["status"] == "Active"){
                        setcookie("__RequestVerificationToken",$u["id"],time()+1200,"/");
                        header("Location: teacher/home.php");
                    }
                    else if($u["type"] == "Student" && $u["status"] == "Active"){
                        setcookie("__RequestVerificationToken",$u["id"],time()+1200,"/");
                        header("Location: student/home.php");
                    }
                    else{
                        $error_authenticateUser = "User Account Blocked, Contact Your Administator.";
                    }
                }
                else{
                    $error_authenticateUser = "Invalid Username or Password.";
                }
            }
        }
        if(isset($_POST["contact"])){
            $error_contact = "Contact Your Administator";
        }
    }

    function authenticateUser($uname,$pass){
        $query = "select * from users where uname = '$uname' and pass = '$pass'";
        $data = get($query);
        if(count($data) > 0){
            return $data[0];
        }
        else{
            return false;
        }
    }

?>