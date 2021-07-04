<?php
    $iframesrc = "";
    $personalinfo = "";

    if(isset($_POST["personalinfo"])){
        $iframesrc = "personal_info.php";
    }
    if(isset($_POST["home"])){
        $iframesrc = "course_details.php";
    }
    if(isset($_POST["coursesandresults"])){
        $iframesrc = "../16-31722-1/teacher/courseandresult.php";
    }
    if(isset($_POST["allstudentpersonalinformation"])){
        $iframesrc = "../18-37646-1/teacher/search_form.php";
    }
    if(isset($_POST["studentsgradereportsbyclassandyear"])){
        $iframesrc = "../16-31722-1/teacher/studentgrade.php";
    }
    if(isset($_POST["passwordchange"])){
        $iframesrc = "../18-37646-1/teacher/password_change.php";
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
                <td align="right" valign="bottom" width="68%"><span><b>Teacher Dashboard</b></span><br><form action="" method="POST"><input type="submit" name="personalinfo" value="Welcome, Rubiyet Fardous"></form><br><br><a href="../login_form.php"><input type="submit" name="logout" value="Logout"></a><br><br><form action="" method="POST"><input border=0 type="submit" name="home" value=" Home"></form></td>
            </tr>
        </table>
        <form action="" method="POST">
        <table width="100%" height="740">
            <tr>
                <td colspan="3"><hr></td>
            </tr>
            <tr height="100%">
                <td align="center" valign="top"><input type="submit" name="coursesandresults" value="          Courses And Results          "><br><hr>
                                                <input type="submit" name="allstudentpersonalinformation" value=" All Student Personal Information "><br><hr>
                                                <input type="submit" name="studentsgradereportsbyclassandyear" value="       Student's Grade Reports       "><br><hr>
                                                <input type="submit" name="passwordchange" value="             Password Change            "><br><hr></td>
                <td rowspan="2" colspan="2" width="100%"><iframe src="<?php if(!empty($iframesrc)) echo $iframesrc; else echo "course_details.php"?>" height="100%" width="100%" title="Iframe Example"></iframe></td>
            </tr>
        </table>
        </form>
    </body>
</html>