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
        $iframesrc = "admin_info_insert_form.php";
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
<html>
    <head>
        <title>PORTAL | AISB</title>
        <link rel="icon" href="../resources/aisb_logo1.png" type="image/icon">
        <link rel="stylesheet" href="admin.css">
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <table width="100%">
            <tr>
                <td width="18.5%"></td>
                <td width="63%">
                    <table width="100%" id="table1">
                        <tr>
                            <td>
                                <table width="100%">
                                    <tr>
                                        <td align="left"><a href="admin.php"><img src="../resources/aisb_logo1.png" alt="AISB logo" id="logo1"></a></td>
                                        <td align="left"><img src="../resources/aisb_logo2.png" id="logo2"></td>
                                        <td align="left" width="50%"><a href="admin.php"><span id="aiubtitle1">AISB</span><br><span id="aiubtitle2">PORTAL</span></a></td>
                                        <td align="right" width="50%">
                                            <span id="admindashboard"><b>Admin Dashboard</b></span><br><form action="" method="POST"><span id="welcome">Welcome </span><input type="submit" name="personalinfo" value="RUBIYET FARDOUS" id="personalinfo"></form>
                                        </td>
                                        <td>        
                                            <form action="" method="POST"><button type="submit" name="notification" id="icon"><i class="fas fa-bell fa-lg"></i></button></form>   
                                        </td>  
                                        <td>
                                            <form action="" method="POST"><button type="submit" name="passwordchange" id="icon"><i class="fas fa-cog fa-lg"></i></button></form>
                                        </td>
                                        <td>
                                        <a href="../login_form.php" id="logouticon"><i class="fas fa-sign-out-alt fa-lg"></i></a>
                                        </td>
                                        <td>
                                            <form action="" method="POST"><button type="submit" name="home" id="icon"><i class="fas fa-home fa-lg"></i></button></form>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
                <td width="18.5%"></td>
            </tr>
        </table>
            <table width="100%">
                <tr>
                    <td width="18.5%"></td>
                    <td width="63">
                        <table width="100%" id="table2" height="815">
                            <tr>
                                <td width="23%" valign="top">
                                    <div id="fulldropbox">
                                        <button class="dropdownjs" id="button"><i class="fa fa-user-cog fa-lg"></i>&nbsp;&nbsp;Admin Personal Info Insert<i class="fa fa-caret-down fa-lg icon"></i></button>
                                        <div class="dropdowncontainer">
                                        <form action="" method="POST">
                                            <input type="submit" name="adminpersonalinfoinsert" value="admin" id=button2>
                                            <input type="submit" name="adminpersonalinfoinsert" value="admin" id=button2>
                                            <input type="submit" name="adminpersonalinfoinsert" value="admin" id=button3>
                                        </form>
                                        </div>
                                    </div>
                                    <div id="fulldropbox">
                                        <button class="dropdownjs" id="button"><i class="fa fa-user-cog fa-lg"></i>&nbsp;&nbsp;Admin Personal Info Insert<i class="fa fa-caret-down fa-lg icon"></i></button>
                                        <div class="dropdowncontainer">
                                        <form action="" method="POST">
                                            <input type="submit" name="adminpersonalinfoinsert" value="admin" id=button2>
                                            <input type="submit" name="adminpersonalinfoinsert" value="admin" id=button2>
                                            <input type="submit" name="adminpersonalinfoinsert" value="admin" id=button3>
                                        </form>
                                        </div>
                                    </div>

                                    <button type="submit" name="teacherpersonalinfoinsert" id="button1"><i class="fa fa-chalkboard-teacher fa-lg"></i>Teacher Personal Info Insert<i class="fa fa-caret-down fa-lg icon"></i></button><br>
                                    <button type="submit" name="studentpersonalinfoinsert" id="button">&nbsp;<i class="fa fa-user-graduate fa-lg"></i></i>&nbsp;&nbsp;Student Personal Info Insert&emsp;&emsp;&nbsp;<i class="fa fa-caret-down fa-lg"></i></button><br>
                                    <button type="submit" name="useraccountinsert" id="button">&nbsp;<i class="fa fa-user-circle fa-lg"></i>&nbsp;&nbsp;User Account Insert</button><br>
                                    <button type="submit" name="courseinsert" id="button">&nbsp;<i class="fa fa-book fa-lg"></i>&nbsp;&nbsp;Course Insert</button><br>
                                    <button type="submit" name="studententryinthecourse" id="button">&nbsp;<i class="fa fa-list-ul fa-lg"></i>&nbsp;&nbsp;Student Entry In The Course</button><br>
                                    <button type="submit" name="studententryintheresultsheet" id="button">&nbsp;&nbsp;<i class="fa fa-clipboard-list fa-lg"></i>&nbsp;&nbsp;Student Entry In The Result Sheet</button><br>
                                    <button type="submit" name="passwordchange" id="button">&nbsp;<i class="fa fa-key fa-lg"></i>&nbsp;&nbsp;Password Change</button><br> 
                                </td>
                                <td rowspan="2" colspan="2" width="80%">
                                    <table width="100%" height="815">
                                        <tr>
                                            <td width=".1%"></td>
                                            <td width="99.9%">
                                                <iframe src="<?php if(!empty($iframesrc)) echo $iframesrc; else echo "search_form.php"?>" id="iframe"></iframe>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td width="18.5%"></td>
                </tr>
            </table>
            <form action="" method="POST">
        </form>
        <script src="admin.js"></script>
    </body>
</html>