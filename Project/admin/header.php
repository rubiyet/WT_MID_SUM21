<?php

    include '../controller/admin_controller.php';
    
    $admin = getadmin($userid);

?>
<html>
    <head>
        <title>PORTAL | AISB</title>
        <link rel="icon" href="../resources/aisb_logo1.png" type="image/icon">
        <link rel="stylesheet" href="css/header.css">
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
                    <table width="100%" id="headertable">
                        <tr>
                            <td align="left"><a href="home.php"><img src="../resources/aisb_logo1.png" alt="AISB logo" id="logo1"></a></td>
                            <td align="left"><img src="../resources/aisb_logo2.png" id="logo2"></td>
                            <td align="left" width="50%"><a href="home.php"><span id="aiubtitle1">AISB</span><br><span id="aiubtitle2">PORTAL</span></a></td>
                            <td align="right" width="50%">
                                <span id="admindashboard"><b>Admin Dashboard</b></span><br><form action="" method="POST"><span id="welcome">Welcome </span><a href="personal_info.php" id="personalinfo"><?php if(!empty($admin["name"])){echo $admin["name"];} ?></a>
                            </td>
                            <td id="">        
                                <form action="" method="POST"><button type="submit" name="notification" id="headericon"><i class="fas fa-bell fa-lg"></i></button></form>  
                            </td>  
                            <td id="">
                                <button onclick="myFunction()" id="headericon" class="dropbutton"><i class="fas fa-cog fa-lg"></i></button>
                                <div id="myDropdown" class="dropdown-content">
                                <a href="../16-31722-1/admin/passwordchange.php"><button type="submit" name="passwordchange" id="settingsicon">Password Change</button></a>
                                </div>
                            </td>
                            <td id="">
                                <form method="POST"><button type="submit" name="logout" id="headericon1"><i class="fas fa-sign-out-alt fa-lg"></i></button></form>
                            </td>
                            <td id="">
                                <a href="home.php"><button type="submit" name="home" id="headericon"><i class="fas fa-home fa-lg"></i></button></a>
                            </td>
                        </tr>
                    </table>
                </td>
                <td width="18.5%"></td>
            </tr>
        </table>
        <script src="js/header.js"></script>
    </body>
</html>