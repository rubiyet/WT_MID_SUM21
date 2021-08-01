<html>
    <head>
        <title>PORTAL | AISB</title>
        <link rel="icon" href="../resources/aisb_logo1.png" type="image/icon">
        <link rel="stylesheet" href="css/navbar.css">
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
    </head>
    <body>
        <table width="100%" id="navbartable">
            <tr>
                <td width="23%" valign="top">
                    <div id="fulldropbox">
                        <button class="dropdownjs" id="button"><i class="fa fa-user-cog fa-lg"></i>&nbsp;&nbsp;Admin Personal Info<i class="fa fa-caret-down fa-lg icon"></i></button>
                        <div id="dropdowncontainer">
                                <a href="admin_info_insert_form.php"><button id=button2><i class="fas fa-plus-square fa-lg"></i>&nbsp;&nbsp;Insert</button></a>
                                <a href="admin_info_update_entry_form.php"><button id=button2><i class="fas fa-edit"></i>&nbsp;&nbsp;Update</button></a>
                                <a href="admin_info_delete_entry_form.php"><button id=button3><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;&nbsp;Delete</button></a>
                        
                        </div>
                    </div>
                    <div id="fulldropbox1">
                        <button class="dropdownjs1" id="button"><i class="fa fa-chalkboard-teacher fa-lg"></i>&nbsp;&nbsp;Teacher Personal Info<i class="fa fa-caret-down fa-lg icon"></i></button>
                        <div id="dropdowncontainer1">
                            <form action="" method="POST">
                                <button type="submit" name="teacherpersonalinfoinsert" id=button2><i class="fas fa-plus-square fa-lg"></i>&nbsp;&nbsp;Insert</button>
                                <button type="submit" name="teacherpersonalinfoinsert" id=button2><i class="fas fa-edit"></i>&nbsp;&nbsp;Update</button>
                                <button type="submit" name="teacherpersonalinfoinsert" id=button3><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;&nbsp;Delete</button>
                        </form>
                        </div>
                    </div>
                    <div id="fulldropbox2">
                        <button class="dropdownjs2" id="button">&nbsp;&nbsp;<i class="fa fa-user-graduate fa-lg"></i></i>&nbsp;&nbsp;Student Personal Info<i class="fa fa-caret-down fa-lg icon"></i></button>
                        <div id="dropdowncontainer2">
                            <form action="" method="POST">
                                <button type="submit" name="studentpersonalinfoinsert" id=button2><i class="fas fa-plus-square fa-lg"></i>&nbsp;&nbsp;Insert</button>
                                <button type="submit" name="studentpersonalinfoinsert" id=button2><i class="fas fa-edit"></i>&nbsp;&nbsp;Update</button>
                                <button type="submit" name="studentpersonalinfoinsert" id=button3><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;&nbsp;Delete</button>
                            </form>
                        </div>
                    </div>
                    
                        <button type="submit" name="useraccountinsert" id="button4">&nbsp;<i class="fa fa-user-circle fa-lg"></i>&nbsp;&nbsp;User Account Insert</button><br>
                    <div id="fulldropbox">
                        <button class="dropdownjs3" id="button">&nbsp;<i class="fa fa-book fa-lg"></i>&nbsp;&nbsp;Course<i class="fa fa-caret-down fa-lg icon"></i></button>
                        <div id="dropdowncontainer3">
                            <a href="course_insert_form.php"><button id=button2><i class="fas fa-plus-square fa-lg"></i>&nbsp;&nbsp;Insert</button></a>
                            <a href="course_update_entry_form.php"><button id=button2><i class="fas fa-edit"></i>&nbsp;&nbsp;Update</button></a>
                            <a href="course_delete_entry_form.php"><button id=button3><i class="fas fa-trash-alt"></i>&nbsp;&nbsp;&nbsp;Delete</button></a>
                        </div>
                    </div>
                        <button type="submit" name="studententryinthecourse" id="button4">&nbsp;<i class="fa fa-list-ul fa-lg"></i>&nbsp;&nbsp;Student Entry In The Course</button><br>
                        <button type="submit" name="studententryintheresultsheet" id="button4">&nbsp;&nbsp;<i class="fa fa-clipboard-list fa-lg"></i>&nbsp;&nbsp;Student Entry In The Result Sheet</button><br>
                        <button type="submit" name="passwordchange" id="button4">&nbsp;<i class="fa fa-key fa-lg"></i>&nbsp;&nbsp;Password Change</button><br> 
                    
                </td>
            </tr>
        </table>
        <script src="js/navbar.js"></script>
    </body>
</html>