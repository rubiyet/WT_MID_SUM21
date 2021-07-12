<?php

    include '../db_config.php';

    $id = $_COOKIE["__RequestVerificationToken"];
    
    $query =  "select * from admin where id = $id";
    if($connect){
        if($connectqurey = mysqli_query($connect,$query)){
            $admin = mysqli_fetch_assoc($connectqurey);
        }
        else{
            echo mysqli_errno($connect);
        }
    }
    else{
        echo mysqli_errno($connect);
    }

?>
<html>
    <head>
        <link rel="stylesheet" href="personal_info.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
    </head>
    <body>
            <table id="table1">
                <tr>
                    <td colspan="3" id="title" valign="center">PERSONAL INFORMATION</td>
                </tr>
                <tr>
                    <td>
                    <table id="table2">
                        <tr>
                            <td align="right" width="40%" id="subtitle">
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
                            <td align="right" id="subtitle">
                                Name: 
                            </td>
                            <td>
                                <?php if(!empty($admin["name"])){echo $admin["name"];} ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" id="subtitle">
                                Salary: 
                            </td>
                            <td>
                                <?php if(!empty($admin["salary"])){echo $admin["salary"];} ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" id="subtitle">
                                Email: 
                            </td>
                            <td>
                                <?php if(!empty($admin["email"])){echo $admin["email"];} ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" id="subtitle">
                                Gender: 
                            </td>
                            <td>
                                <?php if(!empty($admin["gender"])){echo $admin["gender"];} ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" id="subtitle">
                                Birth Date: 
                            </td>
                            <td>
                                <?php if(!empty($admin["birthday"])){echo $admin["birthday"];} ?>
                            </td>   
                        <tr>
                        <tr>
                            <td align="right" id="subtitle">
                                Nationality: 
                            </td>
                            <td>
                                <?php if(!empty($admin["nationality"])){echo $admin["nationality"];} ?>  
                            </td>
                        </tr>
                        <tr>
                            <td align="right" id="subtitle">
                                Religion: 
                            </td>
                            <td>
                                <?php if(!empty($admin["religion"])){echo $admin["religion"];} ?>  
                            </td>
                        </tr>
                        <tr>
                            <td align="right" id="subtitle">
                                Blood Group:
                            </td>
                            <td>
                                <?php if(!empty($admin["bloodgroup"])){echo $admin["bloodgroup"];} ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" id="subtitle">
                                Father Name: 
                            </td>
                            <td>
                                <?php if(!empty($admin["fathername"])){echo $admin["fathername"];} ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" id="subtitle">
                                Mother Name: 
                            </td>
                            <td>
                                <?php if(!empty($admin["mothername"])){echo $admin["mothername"];} ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" id="subtitle">
                            Joining Date:
                            </td>
                            <td>
                                <?php if(!empty($admin["joiningdate"])){echo $admin["joiningdate"];} ?>
                            </td>
                        <tr>
                        <tr>
                            <td align="right" id="subtitle">
                                Left Date:
                            </td>
                            <td>
                                <?php if(!empty($admin["leftdate"])){echo $admin["leftdate"];} ?>
                            </td>   
                        <tr>
                        <tr>
                            <td align="right" id="subtitle">
                                Qualification:
                            </td>
                            <td>
                                <?php if(!empty($admin["qualification"])){echo $admin["qualification"];} ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" id="subtitle">
                                Present Address: 
                            </td>
                            <td colspan="2">
                                <?php if(!empty($admin["presentaddress"])){echo $admin["presentaddress"];} ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" id="subtitle">
                                Parmanent address: 
                            </td>
                            <td colspan="2">
                                <?php if(!empty($admin["parmanentaddress"])){echo $admin["parmanentaddress"];} ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" id="subtitle">
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
    </body>
</html>