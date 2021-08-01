<?php

    include 'controller/users_controller.php';   
    
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
                    <td colspan="5" align="center" id="errortokenbox" <?php if(!empty($error_authenticateUser)){ echo "height=45px";}?>><?php echo $error_authenticateUser?></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><span id="title3">Sign in with your organizational id number</span></td>
                </tr>
                <tr>
                    <td colspan="2" align="center" id="useridbox"><input type="text" autocomplete="off" name="uname" id="userid" placeholder="User Name" value="<?php echo $uname?>"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center" id="erroruseridbox"><span><?php echo $error_uname?></span></td>
                </tr>
                <tr>
                    <td colspan="2" align="center" id="passwordbox"><input type="password" name="pass" id="password" placeholder="Password" value="<?php echo $pass?>"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center" id="errorpasswordbox"><?php echo $error_pass?></td>
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