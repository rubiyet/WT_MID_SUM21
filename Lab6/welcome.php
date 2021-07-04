<?php
    if(!isset($_COOKIE["loggeduser"])){
        header("Location: index.php");
    }
?>
<html>
    <body>
        Welcome
    </body>
</html>