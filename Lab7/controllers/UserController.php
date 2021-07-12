<?php
    include 'models/db_config.php';
    $name = "";
    $err_name = "";
    $uname = "";
    $err_uname = "";
    $email = "";
    $err_email = "";
    $pass = "";
    $err_pass = "";
    $err_db = "";
    $hasError = false;

    if(isset($_POST["sign_up"])){
        if(empty($_POST["name"])){
            $hasError = true;
            $err_name = "Name Required";
        }
        else{
            $name = $_POST["name"];
        }
        if(empty($_POST["uname"])){
            $hasError =  true;
            $err_uname = "Username Required";
        }
        else{
            $uname = $_POST["uname"];
        }
        if(empty($_POST["email"])){
            $hasError =  true;
            $err_email = "Email Required";
        }
        else{
            $email = $_POST["email"];
        }
        if(empty($_POST["pass"])){
            $hasError =  true;
            $err_pass = "Password Required";
        }
        else{
            $pass = $_POST["pass"];
        }
        if(!$hasError){
            $rs = insertUser($name,$uname,$email,$pass);
            if($rs === true){
                Header("Location: login.php");
            }
            $err_db = $rs;
        }
    }
    else if(isset($_POST["btn_login"])){
        if(empty($_POST["uname"])){
            $hasError =  true;
            $err_uname = "Username Required";
        }
        else{
            $uname = $_POST["uname"];
        }
        if(empty($_POST["pass"])){
            $hasError =  true;
            $err_pass = "Password Required";
        }
        else{
            $pass = $_POST["pass"];
        }
        if(!$hasError){
            if(authenticateUser($uname,$pass)){
                header("Location: addcategory.php");
            }
            $err_db = "Username password invalid";
        }
    }

    function insertUser($name,$uname,$email,$pass){
        $query = "insert into users values(NULL,'$name','$uname','$email','$pass')";
        return execute($query);
    }
    function authenticateUser($uname,$pass){
        $query = "select * from users where uname = '$uname' and pass = '$pass'";
        $rs = get($query);
        if(count($rs) > 0){
            return true;
        }
        return false;
    }
?>