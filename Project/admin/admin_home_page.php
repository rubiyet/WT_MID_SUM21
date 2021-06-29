<?php
    $iframesrc = "";
    $personalinfo = "";

    if(isset($_POST["personalinfo"])){
        $iframesrc = "personal_info.php";
    }
    if(isset($_POST["home"])){
        $iframesrc = "search_form.php";
    }
    if(isset($_POST["adminpersonalinfoinsert"])){
        $iframesrc = "admin_info_form.php";
    }
    if(isset($_POST["teacherpersonalinfoinsert"])){
        $iframesrc = "../18-37646-1/admin/teacher_info.php";
    }
    if(isset($_POST["studentpersonalinfoinsert"])){
        $iframesrc = "../17-35574-3/admin/student.php";
    }
    if(isset($_POST["useraccountinsert"])){
        $iframesrc = "../18-37646-1/admin/user_acc_insert_form.php";
    }
    if(isset($_POST["courseinsert"])){
        $iframesrc = "course_insert_form.php";
    }
    if(isset($_POST["studententryinthecourse"])){
        $iframesrc = "../16-31722-1/admin/studentEntry.php";
    }
    if(isset($_POST["studententryintheresultsheet"])){
        $iframesrc = "../17-35574-3/admin/studentUneroll.php";
    }
    if(isset($_POST["passwordchange"])){
        $iframesrc = "../16-31722-1/admin/passwordchange.php";
    }
?>
<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <table width="100%">
            <tr>
                <td align="left"><img src="../aisb_logo.png" alt="AISB logo" width="170" height="155"><img src="../aisb_logo1.png" height="155"></td>
                <td align="center">AMERICAN INTERNATIONAL SCHOOL-BANGLADESH<br>- where leaders are created.</td>
                <td align="right" valign="bottom" width="68%"><span><b>Admin Dashboard</b></span><br><form action="" method="POST"><input type="submit" name="personalinfo" value="Welcome, Rubiyet Fardous"></form><br><br><a href="../login_form.php"><input type="submit" name="logout" value="Logout"></a><br><br><form action="" method="POST"><input border=0 type="submit" name="home" value=" Home"></form></td>
            </tr>
        </table>
        <form action="" method="POST">
        <table width="100%" height="770">
            <tr>
                <td colspan="3"><hr></td>
            </tr>
            <tr height="100%">
                <td align="center" valign="top"><input type="submit" name="adminpersonalinfoinsert" value="      Admin Personal Info Insert      "><br><hr>
                                                <input type="submit" name="teacherpersonalinfoinsert" value="     Teacher Personal Info Insert     "><br><hr>
                                                <input type="submit" name="studentpersonalinfoinsert" value="     Student Personal Info Insert     "><br><hr>
                                                <input type="submit" name="useraccountinsert" value="            User Account Insert           "><br><hr>
                                                <input type="submit" name="courseinsert" value="                Course Insert                 "><br><hr>
                                                <input type="submit" name="studententryinthecourse" value="     Student Entry In The Course    "><br><hr>
                                                <input type="submit" name="studententryintheresultsheet" value="Student Entry In The Result Sheet"><br><hr>
                                                <input type="submit" name="passwordchange" value="             Password Change            "><br><hr></td>
                <td rowspan="2" colspan="2" width="100%"><iframe src="<?php if(!empty($iframesrc)) echo $iframesrc; else echo "search_form.php"?>" height="100%" width="100%"></iframe></td>
            </tr>
        </table>
        </form>
    </body>
</html>