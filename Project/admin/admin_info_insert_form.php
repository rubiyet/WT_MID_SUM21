<?php

    include 'header.php';
    
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
                                        <td colspan="3" id="title" valign="center">ADMIN PERSONAL INFORMATION INSERT</td>
                                    </tr>
                                    <tr>
                                        <td valign="top">
                                            <table id="frameitem">
                                                <form action = "" method = "POST" enctype="multipart/form-data">
                                                    <tr>
                                                        <td align="right" width="36%" id="subtitle">Admin ID<span id="star">* </span>: </td>
                                                        <td width="24%"><input type="text" name="adminid" placeholder="**-1***"value="<?php echo $adminid; ?>"></td>
                                                        <td width="40%"><?php echo $error_adminid?></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" id="subtitle">Name<span id="star">* </span>: </td>
                                                        <td><input type="text" name="name" value="<?php echo $name?>"></td>
                                                        <td><?php echo $error_name;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" id="subtitle">Salary<span id="star">* </span>: </td>
                                                        <td><input type="text" name="salary" value="<?php echo $salary?>"></td>
                                                        <td><?php echo $error_salary;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" id="subtitle">Email<span id="star">* </span>: </td>
                                                        <td><input type="text" name="email" placeholder="someone@gmail.com"value="<?php echo $email; ?>" ></td>
                                                        <td><?php echo $error_email;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" id="subtitle">Gender<span id="star">* </span>: </td>
                                                        <td><input type="radio" value="Male" <?php if($gender=="Male") echo "checked"; ?> name="gender"> <span id="subtitle1">Male</span> <input name="gender" <?php if($gender=="Female") echo "checked"; ?> value="Female" type="radio"> <span id="subtitle1">Female</span> </td>
                                                        <td><?php echo $error_gender;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" id="subtitle">Birth Date<span id="star">* </span>: </td>
                                                        <td>
                                                            <select name="inputbdday"><option disabled selected>Day</option><?php foreach($day as $d){if($d == $inputbdday) echo "<option selected>$d</option>"; else echo "<option>$d</option>";}?></select> <select name="inputbdmonth"><option disabled selected>Month</option><?php foreach($month as $m){if($m == $inputbdmonth) echo "<option selected>$m</option>"; else  echo "<option>$m</option>";}?></select> <select name="inputbdyear"><option disabled selected>Year</option><?php foreach($year as $y){if($y == $inputbdyear) echo "<option selected>$y</option>"; else  echo "<option>$y</option>";}?></select>
                                                        </td>   
                                                        <td><?php echo $error_inputbddaymonthyear;?></td>
                                                    <tr>
                                                    <tr>
                                                        <td align="right" id="subtitle">Nationality<span id="star">* </span>: </td>
                                                        <td><select name="inputnationality"><option disabled selected>Select</option><?php foreach($nationality as $n){if($n == $inputnationality) echo "<option selected>$n</option>"; else echo "<option>$n</option>";}?></select></td>
                                                        <td><?php echo $error_nationality;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" id="subtitle">Religion<span id="star">* </span>: </td>
                                                        <td>
                                                            <select name="inputreligion"><option disabled selected>Select</option><?php foreach($religion as $r){if($r == $inputreligion) echo "<option selected>$r</option>"; else echo "<option>$r</option>";}?></select>
                                                        </td>
                                                        <td><?php echo $error_religion;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" id="subtitle">
                                                            Blood Group<span id="star">* </span>:
                                                        </td>
                                                        <td>
                                                        <select name="inputbloodgroup"><option disabled selected>Select</option><?php foreach($bloodgroup as $bg){if($bg == $inputbloodgroup) echo "<option selected>$bg</option>"; else echo "<option>$bg</option>";}?></select>
                                                        </td>
                                                        <td><?php echo $error_inputbloodgroup;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" id="subtitle">
                                                            Father Name<span id="star">* </span>: 
                                                        </td>
                                                        <td>
                                                            <input type="text" name="fathername" value="<?php echo $fathername?>">
                                                        </td>
                                                        <td><?php echo $error_fathername;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" id="subtitle">
                                                            Mother Name<span id="star">* </span>: 
                                                        </td>
                                                        <td>
                                                            <input type="text" name="mothername" value="<?php echo $mothername?>">
                                                        </td>
                                                        <td><?php echo $error_mothername;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" id="subtitle">
                                                        Joining Date<span id="star">* </span>:
                                                        </td>
                                                        <td>
                                                            <select name="inputjday"><option disabled selected>Day</option><?php foreach($day as $d){if($d == $inputjday) echo "<option selected>$d</option>"; else echo "<option>$d</option>";}?></select> <select name="inputjmonth"><option disabled selected>Month</option><?php foreach($month as $m){if($m == $inputjmonth) echo "<option selected>$m</option>"; else  echo "<option>$m</option>";}?></select> <select name="inputjyear"><option disabled selected>Year</option><?php foreach($year as $y){if($y == $inputjyear) echo "<option selected>$y</option>"; else  echo "<option>$y</option>";}?></select>
                                                        </td>   
                                                        <td><?php echo $error_inputjdaymonthyear;?></td>
                                                    <tr>
                                                    <tr>
                                                        <td align="right" id="subtitle">
                                                        Left Date<span id="star">* </span>:
                                                        </td>
                                                        <td>
                                                            <select name="inputlday"><option disabled selected>Day</option><?php foreach($day as $d){if($d == $inputlday) echo "<option selected>$d</option>"; else echo "<option>$d</option>";}?></select> <select name="inputlmonth"><option disabled selected>Month</option><?php foreach($month as $m){if($m == $inputlmonth) echo "<option selected>$m</option>"; else  echo "<option>$m</option>";}?></select> <select name="inputlyear"><option disabled selected>Year</option><?php foreach($year as $y){if($y == $inputlyear) echo "<option selected>$y</option>"; else  echo "<option>$y</option>";}?></select>
                                                        </td>   
                                                        <td><?php echo $error_inputldaymonthyear;?></td>
                                                    <tr>
                                                    <tr>
                                                        <td align="right" id="subtitle">
                                                            Qualification<span id="star">* </span>:
                                                        </td>
                                                        <td><input type="checkbox" name="qualifications[]" value="SSC" <?php foreach($qualifications as $qu){if($qu == "SSC") echo "checked";} ?>> <span id="subtitle1">SSC</span> <input type="checkbox" name="qualifications[]" value="HSC" <?php foreach($qualifications as $qu){if($qu == "HSC") echo "checked";} ?>> <span id="subtitle1">HSC</span> <input type="checkbox" name="qualifications[]" value="Other" <?php foreach($qualifications as $qu){if($qu == "Other") echo "checked";} ?>> <span id="subtitle1">Other</span></td>
                                                        <td><?php echo $error_qualifications;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" id="subtitle">
                                                            Present Address<span id="star">* </span>: 
                                                        </td>
                                                        <td>
                                                            <input type="text" name="presentaddress" value="<?php echo $presentaddress?>">
                                                        </td>
                                                        <td><?php echo $error_presentaddress;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" id="subtitle">
                                                            Parmanent address<span id="star">* </span>: 
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="sameaspresentaddress" <?php if($presentaddress != ""){if($presentaddress == $parmanentaddress) echo "checked";}?>> <span id="sameaspresentaddress">Same as present address</span> <br>
                                                            <input type="text" name="parmanentaddress" value="<?php echo $parmanentaddress?>">
                                                        </td>
                                                        <td><?php echo $error_parmanentaddress;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" id="subtitle">
                                                            Contact Number<span id="star">* </span>: 
                                                        </td>
                                                        <td>
                                                            <input type="text" name="contactnumber" value="<?php echo $contactnumber?>">
                                                        </td>
                                                        <td><?php echo $error_contactnumber;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td align="right" id="subtitle">
                                                            Image<span id="star">* </span>: 
                                                        </td>
                                                        <td>
                                                            <input type="file" name="image" id="image">
                                                        </td>
                                                        <td><?php echo $error_img;?></td>
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
                                                            <input type="submit" name="admininsert" value="Insert" id="button10">&emsp;<input type="submit" name="clear" value="Clear" id="button10">
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