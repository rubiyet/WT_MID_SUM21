<?php
    $userid = "";
    $password = "";
    $error_massage = "";

    $error = false;

    if(isset($_POST["submit"])){
        if(empty($_POST["userid"]) || empty($_POST["password"]) || is_numeric($_POST["userid"]) == false){
            $error = true;
            $error_massage = "Invalid User Id and Password.";
        }
        else{
            $userid = $_POST["userid"];
            $password = $_POST["password"];
        }
    }

?>
<html>
    <body>
        <form action="" method="POST">
                <table align="center">
                    <tr>
                        <td><img src="./Capture5.png" alt="AISB logo" width="194" height="217"></td>
                        <td><img src="./Capture2.png" height="210"></td>
                        <td style="width: 35px;"></td>
                        <td align="center">AMERICAN INTERNATIONAL<br>SCHOOL-BANGLADESH<br><span>- where leaders are created.</span></td>
                        <td style="width: 35px;"></td>                    
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
                        <td colspan="5" align="center"><input type="submit" name="submit" Value="LOGIN"></td>
                    </tr>
                    <tr>
                    <td colspan="5"></td>
                    </tr>
                    <tr>
                    <td colspan="5"></td>
                    </tr>
                    <tr>
                        <td colspan="5" align="center"><input type="submit" name="submit" Value="Can’t access your account?"></td>
                    </tr>
                    <tr>
                    <td colspan="5"></td>
                    </tr>
                </table>
        </form>
    </body>
</html>