<?php

    include 'header.php';

?>

<html>
    <head>
        <link rel="stylesheet" href="css/home.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
    </head>
    <body>
        <table width="100%">
            <tr>
                <td width="18.5%"></td>
                <td width="63">
                    <table width="100%" height="830" valign="top" >
                        <tr>
                            <td width="23%" valign="top">
                                <?php include 'navbar.php';?>
                            </td>
                            <td width="77%" valign="top">
                                <table id="frame">
                                    <tr>
                                        <td valign="top">
                                            <table align="center" id="frameitem">
                                                <form action = "" method = "POST" enctype="multipart/form-data">
                                                    <tr>
                                                        <td>
                                                            <img src="resources/student_logo.png" alt="Student logo" id="img">
                                                        </td>
                                                        <td>
                                                            <img src="resources/space.png">
                                                        </td>
                                                        <td>
                                                            <img src="resources/teacher_logo.png" alt="Teacher logo" id="img">
                                                        </td>
                                                        <td>
                                                            <img src="resources/space.png">
                                                        </td>
                                                        <td>
                                                            <img src="resources/admin_logo.png" alt="Admin logo" id="img">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td><input type="text" name="studentid" id="searchbox" placeholder="Enter Student ID" > <input type="submit" name="" id="searchbutton" value="Search"></td>
                                                        <td></td>
                                                        <td><input type="text" name="teacherid" id="searchbox" placeholder="Enter Teacher ID"> <input type="submit" name="" id="searchbutton" value="Search"></td>
                                                        <td></td>
                                                        <td><input type="text" name="adminid1" id="searchbox" placeholder="Enter Admin ID"> <input type="submit" name="adminsearch" id="searchbutton" value="Search"></td>
                                                    </tr>
                                                    <tr>
                                                        <td id="errormassagebox" align="center"><span id="errormassage"><?php echo $error_studentid;?></span></td>
                                                        <td></td>
                                                        <td id="errormassagebox"><span id="errormassage"><?php echo $error_teacherid;?></span></td>
                                                        <td></td>
                                                        <td id="errormassagebox"><span id="errormassage"><?php echo $error_adminid3;?></span></td>
                                                    </tr>
                                                </form>
                                            </table>
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
    </body>
</html>