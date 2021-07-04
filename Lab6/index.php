<?php
    $username = "";
    $error_username = "";
    $password = "";
    $error_password = "";
    $error = false;
    $users = array("adi"=>"adi","rubiyet"=>"rubiyet","fardous"=>"fardous");
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["username"])){
            $error = true;
            $error_username = "Username Must be Need";
        }
        else{
            $username = $_POST["username"];
        }
        if(empty($_POST["password"])){
            $error = true;
            $error_password = "Password Must be Need";
        }
        else{
            $password = $_POST["password"];
        }
        if(!$error){
            foreach($users as $un=>$pw){
                if($username == $un && $password == $pw){
                    setcookie("loggeduser",$username,time()+300,"/");
                    header("Location: welcome.php");
                }
            }
            echo "Invalid User Account";
        }
    }
 
?>
<html>
    <body>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>Username: </td>
                    <td><input type="text" name="username" value="<?php echo $username;?>"></td>
                    <td><?php echo $error_username;?></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type="text" name="password" value="<?php echo $password;?>"></td>
                    <td><?php echo $error_password;?></td>
                </tr>
                <tr>
                    <td colspan="2" align=right><input type="submit" value= Login ></td>
                </tr>
            </table>
        </form>
    </body>
</html>