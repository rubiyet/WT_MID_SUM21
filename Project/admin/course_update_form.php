<?php

    include 'header.php';

    getcourseupdate($courseidforUD);

?>
<html>
    <head>
        <link rel="stylesheet" href="css/admin_info_insertupdatedelete_form.css">
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
                                        <td colspan="3" id="title" valign="center">COURSE UPDATE</td>
                                    </tr>
                                    <tr>
                                        <td valign="top">
                                            <table id="frameitem">  
                                                <form action="" method="POST">
                                                    <tr>
                                                        <td align="right" width="36%" id="subtitle">
                                                            Course ID<span id="star">* </span>: 
                                                        </td>
                                                        <td width="15%">
                                                            <input type="text" name="courseid" value="<?php echo $courseid?>">
                                                        </td>
                                                        <td width="49%"><span><?php echo $error_courseid;?></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" id="subtitle">
                                                            Course Name<span id="star">* </span>: 
                                                        </td>
                                                        <td>
                                                            <input type="text" name="coursename" value="<?php echo $coursename?>">
                                                        </td>
                                                        <td><?php echo $error_coursename;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td colspan="2" id="errormassage1"><?php if(!empty($error_massage1)){echo $error_massage1;}?></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td colspan="2" id="errormassage2"><?php if(!empty($error_massage2)){echo $error_massage2;}?></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td align="center">
                                                            <input type="Submit" name="courseupdate" value="Update" id="button10">&emsp;<input type="Submit" name="backcourseupdate" value="Back" id="button10">
                                                        </td>
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