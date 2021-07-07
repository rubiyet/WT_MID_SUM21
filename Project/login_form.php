<?php
    $userid = "";
    $password = "";
    $error_massage = "";
    $error_massage1 = "";

    $error = false;

    if(isset($_POST["login"])){
        if(empty($_POST["userid"]) || empty($_POST["password"])){
            $error = true;
            $error_massage = "Invalid User Id and Password.";
        }
        else{
                $userid = $_POST["userid"];
                $password = $_POST["password"];
        }
    }
    if(isset($_POST["contact"])){
        $error_massage1 = "Contact Your Administator";
    }
?>
<html>
    <head>
    
    </head>
    <body align="center">
        <form action="" method="POST">
            <table align="center">
                <tr>
                    <td><img src="resources/aisb_logo.png" alt="AISB logo" width="194" height="217"></td>
                    <td><img src="aisb_logo1.png" height="210"></td>
                    <td align="center">AMERICAN INTERNATIONAL<br>SCHOOL-BANGLADESH<br><span>- where leaders are created.</span></td>                  
                </tr>
                <tr>
                    <td colspan="5" align="center">Sign in with your organizational Id and Password</td>
                </tr>
                <tr>
                    <td colspan="5" align="center"><input type="text" name="userid" placeholder="User ID" value="<?php echo $userid?>"></td>
                </tr>
                <tr>
                    <td colspan="5"></td>
                </tr>
                <tr>
                    <td colspan="5" align="center"><input type="password" name="password" placeholder="Password" value="<?php echo $password?>"></td>
                </tr>
                <tr>
                    <td colspan="5" align="center"><?php echo $error_massage?></td>
                </tr>
                <tr>
                    <td colspan="5" align="center"><input type="submit" name="login" Value="LOGIN"></td>
                </tr>
                <tr>
                    <td colspan="5"></td>
                </tr>
                <tr>
                    <td colspan="5" align="center"><?php echo $error_massage1?></td>
                </tr>
                <tr>
                    <td colspan="5" align="center"><input type="submit" name="contact" Value="Can’t access your account?"></td>
                </tr>
                <tr>
                    <td colspan="5"></td>
                </tr>
            </table>
        </form>
        <a href="admin/admin.php">Admin</a>   <a href="teacher/teacher_home_page.php">Teacher</a>   <a href="student/student_home_page.php">Student</a>
    </body>
</html>