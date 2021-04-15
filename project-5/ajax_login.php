<?php 
	include "db.php";
	session_start();
	 $email = $_POST['email'];
	 $psw = $_POST['psw'];
	$sql = mysqli_query($con,"SELECT * FROM user where email='".$email."' AND password='".$psw."' AND status='1'");
	//echo mysqli_num_rows($sql);exit;
	if(mysqli_num_rows($sql) > 0){
		$fet_sql = mysqli_fetch_assoc($sql);
		
		$_SESSION["name"]  = $fet_sql['name'];
		$_SESSION["email"] = $fet_sql['email'];
		$_SESSION["id"]    = $fet_sql['uid'];
		echo "1";

	}else{
		echo "0";
	}
	
	//print_r($_SESSION);exit;
?>