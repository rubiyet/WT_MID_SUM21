<?php

    include 'header.php';
    
    $admin = getadminforsearch($adminidforsearch);

?>
<html>
    <head>
        <link rel="stylesheet" href="css/personal_info.css">
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
                                        <td colspan="3" id="title" valign="center">ADMIN PERSONAL INFORMATION (<?php if(!empty($admin["name"])){echo strtoupper($admin["name"]);}?>)</td>
                                    </tr>
                                    <tr>
                                        <td valign="top">
                                            <table id="frameitem">
                                                <tr>
                                                    <td align="right" width="40%" id="subtitle" height="30px">
                                                        Admin ID: 
                                                    </td>
                                                    <td >
                                                        <?php if(!empty($admin["userid"])){echo $admin["userid"];} ?>
                                                    </td>
                                                    <td rowspan="20" width="20%" id="imagebox">
                                                        <img src="<?php if(!empty($admin["img"])){ echo "image/admin/".$admin["img"];} else{ echo "";}?>" id="image">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="right" id="subtitle" height="30px">
                                                        Name: 
                                                    </td>
                                                    <td>
                                                        <?php if(!empty($admin["name"])){echo $admin["name"];} ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="right" id="subtitle" height="30px">
                                                        Salary: 
                                                    </td>
                                                    <td>
                                                        <?php if(!empty($admin["salary"])){echo $admin["salary"];} ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="right" id="subtitle" height="30px">
                                                        Email: 
                                                    </td>
                                                    <td>
                                                        <?php if(!empty($admin["email"])){echo $admin["email"];} ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="right" id="subtitle" height="30px">
                                                        Gender: 
                                                    </td>
                                                    <td>
                                                        <?php if(!empty($admin["gender"])){echo $admin["gender"];} ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="right" id="subtitle" height="30px">
                                                        Birth Date: 
                                                    </td>
                                                    <td>
                                                        <?php if(!empty($admin["birthday"])){echo $admin["birthday"];} ?>
                                                    </td>   
                                                <tr>
                                                <tr>
                                                    <td align="right" id="subtitle" height="30px">
                                                        Nationality: 
                                                    </td>
                                                    <td>
                                                        <?php if(!empty($admin["nationality"])){echo $admin["nationality"];} ?>  
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="right" id="subtitle" height="30px">
                                                        Religion: 
                                                    </td>
                                                    <td>
                                                        <?php if(!empty($admin["religion"])){echo $admin["religion"];} ?>  
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="right" id="subtitle" height="30px">
                                                        Blood Group:
                                                    </td>
                                                    <td>
                                                        <?php if(!empty($admin["bloodgroup"])){echo $admin["bloodgroup"];} ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="right" id="subtitle" height="30px">
                                                        Father Name: 
                                                    </td>
                                                    <td>
                                                        <?php if(!empty($admin["fathername"])){echo $admin["fathername"];} ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="right" id="subtitle" height="30px">
                                                        Mother Name: 
                                                    </td>
                                                    <td>
                                                        <?php if(!empty($admin["mothername"])){echo $admin["mothername"];} ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="right" id="subtitle" height="30px">
                                                    Joining Date:
                                                    </td>
                                                    <td>
                                                        <?php if(!empty($admin["joiningdate"])){echo $admin["joiningdate"];} ?>
                                                    </td>
                                                <tr>
                                                <tr>
                                                    <td align="right" id="subtitle" height="30px">
                                                        Left Date:
                                                    </td>
                                                    <td>
                                                        <?php if(!empty($admin["leftdate"])){echo $admin["leftdate"];} ?>
                                                    </td>   
                                                <tr>
                                                <tr>
                                                    <td align="right" id="subtitle" height="30px">
                                                        Qualification:
                                                    </td>
                                                    <td>
                                                        <?php if(!empty($admin["qualification"])){echo $admin["qualification"];} ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="right" id="subtitle" height="30px">
                                                        Present Address: 
                                                    </td>
                                                    <td colspan="2">
                                                        <?php if(!empty($admin["presentaddress"])){echo $admin["presentaddress"];} ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="right" id="subtitle" height="30px">
                                                        Parmanent address: 
                                                    </td>
                                                    <td colspan="2">
                                                        <?php if(!empty($admin["parmanentaddress"])){echo $admin["parmanentaddress"];} ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td align="right" id="subtitle" height="30px">
                                                        Contact Number: 
                                                    </td>
                                                    <td>
                                                        <?php if(!empty($admin["contactnumber"])){echo $admin["contactnumber"];} ?> 
                                                    </td>
                                                </tr>
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