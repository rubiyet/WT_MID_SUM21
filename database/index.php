<?php
	$db_server="localhost";
	$db_uname="root";
	$db_pass="";
	$db_name="alluser";
	
	$connect = mysqli_connect($db_server,$db_uname,$db_pass,$db_name); 
	if($connect){
		echo "connected";
		$query = "insert into alluser1 values(Null,'1002','admin')";
		mysqli_query($connect,$query);
	}
	else{
		echo mysqli_error($connect);
	}
	
	$query = "select userid,password,type from alluser1";
	$accounts = mysqli_query($connect,$query);
	while($row = mysqli_fetch_assoc($accounts)){
		echo $row["userid"]."<br>";
	}
?>