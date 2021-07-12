<?php

    include '../db_config.php';

    if(!isset($_COOKIE["__RequestVerificationToken"])){
        header("Location: ../portal.php");
    }
    else{
        $id = $_COOKIE["__RequestVerificationToken"];
    }

    $query =  "select * from admin inner join alluser on admin.userid = alluser.userid where alluser.id = $id";
    $connectqurey = mysqli_query($connect,$query);
    $admin = mysqli_fetch_assoc($connectqurey);

    $iframesrc = "";

    if(isset($_POST["personalinfo"])){
        $iframesrc = "personal_info.php";
    }
    if(isset($_POST["home"])){
        $iframesrc = "search_form.php";
    }
    if(isset($_POST["notification"])){
        $iframesrc = "notification.php";
    }
    if(isset($_POST["adminpersonalinfoinsert"])){
        $iframesrc = "admin_info_insert_form.php";
    }
    if(isset($_POST["adminpersonalinfoupdate"])){
        $iframesrc = "admin_info_update_form.php";
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
    if(isset($_POST["logout"])){
        setcookie("__RequestVerificationToken","",time()-1,"/");
        header("Location: ../portal.php");
    }
    if(!isset($_COOKIE["__RequestVerificationToken"])){
        header("Location: ../portal.php");
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
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
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
                                            <span id="admindashboard"><b>Admin Dashboard</b></span><br><form action="" method="POST"><span id="welcome">Welcome </span><input type="submit" name="personalinfo" value="<?php if(!empty($admin["name"])){echo $admin["name"];} ?>" id="personalinfo"></form>
                                        </td>
                                        <td>        
                                            <form action="" method="POST"><button type="submit" name="notification" id="icon"><i class="fas fa-bell fa-lg"></i></button></form>  
                                        </td>  
                                        <td>
                                            <button onclick="myFunction()" id="icon1" class="dropbutton"><i class="fas fa-cog fa-lg"></i></button>
                                            <div id="myDropdown" class="dropdown-content">
                                            <form action="" method="POST"><button type="submit" name="passwordchange" id="settingsicon">Password Change</button></form>
                                            </div>
                                        </td>
                                        <td>
                                            <form action="" method="POST"><button type="submit" name="logout" id="logouticon"><i class="fas fa-sign-out-alt fa-lg"></i></button></form>
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
                                                <button type="submit" name="adminpersonalinfoinsert" id=button2><i class="fas fa-plus-square fa-lg"></i>&nbsp;&nbsp;Insert</button>
                                                <button type="submit" name="adminpersonalinfoupdate" id=button2><i class="fas fa-edit"></i>&nbsp;&nbsp;Update</button>
                                                <button type="submit" name="adminpersonalinfoinsert" id=button3><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;&nbsp;Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                    <div id="fulldropbox1">
                                        <button class="dropdownjs" id="button"><i class="fa fa-chalkboard-teacher fa-lg"></i>&nbsp;&nbsp;Teacher Personal Info Insert<i class="fa fa-caret-down fa-lg icon"></i></button>
                                        <div class="dropdowncontainer1">
                                            <form action="" method="POST">
                                                <button type="submit" name="teacherpersonalinfoinsert" id=button2><i class="fas fa-plus-square fa-lg"></i>&nbsp;&nbsp;Insert</button>
                                                <button type="submit" name="teacherpersonalinfoinsert" id=button2><i class="fas fa-edit"></i>&nbsp;&nbsp;Update</button>
                                                <button type="submit" name="teacherpersonalinfoinsert" id=button3><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;&nbsp;Delete</button>
                                        </form>
                                        </div>
                                    </div>
                                    <div id="fulldropbox2">
                                        <button class="dropdownjs" id="button">&nbsp;&nbsp;<i class="fa fa-user-graduate fa-lg"></i></i>&nbsp;&nbsp;Student Personal Info Insert<i class="fa fa-caret-down fa-lg icon"></i></button>
                                        <div class="dropdowncontainer2">
                                            <form action="" method="POST">
                                                <button type="submit" name="studentpersonalinfoinsert" id=button2><i class="fas fa-plus-square fa-lg"></i>&nbsp;&nbsp;Insert</button>
                                                <button type="submit" name="studentpersonalinfoinsert" id=button2><i class="fas fa-edit"></i>&nbsp;&nbsp;Update</button>
                                                <button type="submit" name="studentpersonalinfoinsert" id=button3><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;&nbsp;Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                    <form action="" method="POST">
                                        <button type="submit" name="useraccountinsert" id="button4">&nbsp;<i class="fa fa-user-circle fa-lg"></i>&nbsp;&nbsp;User Account Insert</button><br>
                                        <button type="submit" name="courseinsert" id="button4">&nbsp;<i class="fa fa-book fa-lg"></i>&nbsp;&nbsp;Course Insert</button><br>
                                        <button type="submit" name="studententryinthecourse" id="button4">&nbsp;<i class="fa fa-list-ul fa-lg"></i>&nbsp;&nbsp;Student Entry In The Course</button><br>
                                        <button type="submit" name="studententryintheresultsheet" id="button4">&nbsp;&nbsp;<i class="fa fa-clipboard-list fa-lg"></i>&nbsp;&nbsp;Student Entry In The Result Sheet</button><br>
                                        <button type="submit" name="passwordchange" id="button4">&nbsp;<i class="fa fa-key fa-lg"></i>&nbsp;&nbsp;Password Change</button><br> 
                                    </form>
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