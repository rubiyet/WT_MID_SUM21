<?php

    include 'header.php';

    getadminupdate($adminidforinfo);

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
                                        <td colspan="3" id="title" valign="center">ADMIN PERSONAL INFORMATION DELETE</td>
                                    </tr>
                                    <tr>
                                        <td valign="top">
                                            <table id="frameitem">
                                                <form action = "" method = "POST" enctype="multipart/form-data">
                                                    <tr>
                                                        <td></td>
                                                        <td width="20%"><input type="hidden" name="id" placeholder="**-1***" value="<?php if(!empty($id)){echo $id;}?>"><input type="hidden" name="image1" value="<?php if(!empty($image)){echo $image;}?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" width="320px" id="subtitle" height="30px">Admin ID: </td>
                                                        <td width="50%" ><?php if(!empty($adminid)){echo $adminid;}?></td>
                                                        <td width="" align="right" rowspan="5" width="" id="imagebox11">
                                                            <img src="<?php if(!empty($image)){ echo "image/admin/".$image;} else{ echo "";}?><?php if(!empty($filename)){ echo "image/admin/".$filename;} else{ echo "";}?>" width="120px" height="120px">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" id="subtitle" height="30px">
                                                            Name: 
                                                        </td>
                                                        <td>
                                                            <?php if(!empty($name)){echo $name;} ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" id="subtitle" height="30px">
                                                            Salary: 
                                                        </td>
                                                        <td>
                                                            <?php if(!empty($salary)){echo $salary;} ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" id="subtitle" height="30px">
                                                            Email: 
                                                        </td>
                                                        <td>
                                                            <?php if(!empty($email)){echo $email;} ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" id="subtitle" height="30px">
                                                            Gender: 
                                                        </td>
                                                        <td>
                                                            <?php if(!empty($gender)){echo $gender;} ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" id="subtitle" height="30px">
                                                            Birth Date: 
                                                        </td>
                                                        <td>
                                                            <?php if(!empty($birthday)){echo $birthday;} ?>
                                                        </td>   
                                                    <tr>
                                                    <tr>
                                                        <td align="right" id="subtitle" height="30px">
                                                            Nationality: 
                                                        </td>
                                                        <td>
                                                            <?php if(!empty($inputnationality)){echo $inputnationality;} ?>  
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" id="subtitle" height="30px">
                                                            Religion: 
                                                        </td>
                                                        <td>
                                                            <?php if(!empty($inputreligion)){echo $inputreligion;} ?>  
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" id="subtitle" height="30px">
                                                            Blood Group:
                                                        </td>
                                                        <td>
                                                            <?php if(!empty($inputbloodgroup)){echo $inputbloodgroup;} ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" id="subtitle" height="30px">
                                                            Father Name: 
                                                        </td>
                                                        <td>
                                                            <?php if(!empty($fathername)){echo $fathername;} ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" id="subtitle" height="30px">
                                                            Mother Name: 
                                                        </td>
                                                        <td>
                                                            <?php if(!empty($mothername)){echo $mothername;} ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" id="subtitle" height="30px">
                                                        Joining Date:
                                                        </td>
                                                        <td>
                                                            <?php if(!empty($joiningdate)){echo $joiningdate;} ?>
                                                        </td>
                                                    <tr>
                                                    <tr>
                                                        <td align="right" id="subtitle" height="30px">
                                                            Left Date:
                                                        </td>
                                                        <td>
                                                            <?php if(!empty($leftdate)){echo $leftdate;} ?>
                                                        </td>   
                                                    <tr>
                                                    <tr>
                                                        <td align="right" id="subtitle" height="30px">
                                                            Qualification:
                                                        </td>
                                                        <td>
                                                            <?php if(!empty($qualificationsarray)){echo $qualificationsarray;} ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" id="subtitle" height="30px">
                                                            Present Address: 
                                                        </td>
                                                        <td colspan="2">
                                                            <?php if(!empty($presentaddress)){echo $presentaddress;} ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" id="subtitle" height="30px">
                                                            Parmanent address: 
                                                        </td>
                                                        <td colspan="2">
                                                            <?php if(!empty($parmanentaddress)){echo $parmanentaddress;} ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" id="subtitle" height="30px">
                                                            Contact Number: 
                                                        </td>
                                                        <td>
                                                            <?php if(!empty($contactnumber)){echo $contactnumber;} ?> 
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td id="errormassage1"><?php if(!empty($error_massage1)){echo $error_massage1;}?></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td id="errormassage2"><?php if(!empty($error_massage2)){echo $error_massage2;}?></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td id="buttonbox">
                                                            <input type="submit" name="deleteadmin" value="Delete" id="button10">&emsp;<input type="submit" name="backfordelete" value="Back" id="button10">
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