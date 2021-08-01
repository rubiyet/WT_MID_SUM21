<?php
	$db_server="localhost";
	$db_uname="root";
	$db_pass="";
	$db_name="aisbschoolportal";
	$connect = mysqli_connect($db_server,$db_uname,$db_pass,$db_name); 

	function execute($query){
        global $db_server, $db_uname, $db_pass, $db_name;
        $connect = mysqli_connect($db_server,$db_uname,$db_pass,$db_name);
        if($connect){
            if(mysqli_query($connect,$query)){
                return true;
            }
            else{
                return mysqli_errno($connect);
            }
        }
    }

    function get($query){
        global $db_server, $db_uname, $db_pass, $db_name;
        $connect = mysqli_connect($db_server,$db_uname,$db_pass,$db_name);
        $data = array();
        if($connect){
            $connectquery = mysqli_query($connect,$query);
            while($row = mysqli_fetch_assoc($connectquery)){
                $data[] = $row;
            }
        }
        return $data;
    }
	
?>
