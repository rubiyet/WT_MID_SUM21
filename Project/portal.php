<?php

    include 'db_config.php';    
    
    $userid = "";
    $error_userid = "";
    $password = "";
    $error_password = "";
    $error_contact = "";
    $error_token = "";

    $error = false;

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST["login"])){
            if(empty($_POST["userid"])){
                $error = true;
                $error_userid = "The User Name field is required.";
            }
            else{
                    $userid = $_POST["userid"];
            }
            if(empty($_POST["password"])){
                $error = true;
                $error_password = "The Password field is required.";
            }
            else{
                    $password = $_POST["password"];
            }
            if(!$error){
                $query = "select * from alluser";
                $connectqurey = mysqli_query($connect,$query);
                while($alluser = mysqli_fetch_assoc($connectqurey)){
                    if($alluser["userid"] == $userid && $alluser["password"] == $password){
                        if($alluser["type"] == "Admin" && $alluser["status"] == "Active"){
                            setcookie("__RequestVerificationToken",$alluser["id"],time()+12000,"/");
                            header("Location: admin/admin.php");
                        }
                        else{
                            $error_token = "User Account Block, Contact your administator.";
                        }
                        if($alluser["type"] == "Teacher" && $alluser["status"] == "Active"){
                            setcookie("__RequestVerificationToken",$alluser["id"],time()+120,"/");
                            header("Location: teacher/teacher.php");
                        }
                        else{
                            $error_token = "User Account Block, Contact your administator.";
                        }
                        if($alluser["type"] == "Student" && $alluser["status"] == "Active"){
                            setcookie("__RequestVerificationToken",$alluser["id"],time()+120,"/");
                            header("Location: student/student.php");
                        }
                        else{
                            $error_token = "User Account Blocked, Contact Your Administator.";
                        }
                    }
                    else{
                        $error_token = "Invalid Username or Password.";
                    }
                }
            }
        }
        if(isset($_POST["contact"])){
            $error_contact = "Contact Your Administator";
        }
    }
?>
<html>
    <head>
        <title>PORTAL | AISB</title>
        <link rel="icon" href="resources/aisb_logo1.png" type="image/icon">
        <link rel="stylesheet" href="portal.css">
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
    </head>
    <body>
        <form action="" method="POST">
            <table id="table1">
                <tr>
                    <td id ="imgbox"><a href="website/web.html"><img src="resources/aisb_logo1.png" alt="AISB logo" id="aisb_logo1"></a></td>
                    <td id="titlebox" align="left" valign="top"><a href="website/web.html"><blockquote><span id="title1">AMERICAN INTERNATIONAL SCHOOL-BANGLADESH</span><br><span id="title2">-- where leaders are created.</span></blockquote></a></td>                  
                </tr>
                <tr>
                    <td colspan="5" align="center" id="errortokenbox" <?php if(!empty($error_token)){ echo "height=45px";}?>><?php echo $error_token?></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><span id="title3">Sign in with your organizational id number</span></td>
                </tr>
                <tr>
                    <td colspan="2" align="center" id="useridbox"><input type="text" autocomplete="off" name="userid" id="userid" placeholder="User Name" value="<?php echo $userid?>"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center" id="erroruseridbox"><span><?php echo $error_userid?></span></td>
                </tr>
                <tr>
                    <td colspan="2" align="center" id="passwordbox"><input type="password" name="password" id="password" placeholder="Password" value="<?php echo $password?>"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center" id="errorpasswordbox"><?php echo $error_password?></td>
                </tr>
                <tr>
                    <td colspan="2" align="center" id="loginbox"><input type="submit" name="login" id="login" Value="Log in"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center" id="errorcontactbox"><?php echo $error_contact?></td>
                </tr>
                <tr>
                    <td colspan="2" align="center" id="contactbox"><input type="submit" name="contact" id="contact" Value="Can’t access your account?"></td>
                </tr>
            </table>
        </form>
    </body>
</html>