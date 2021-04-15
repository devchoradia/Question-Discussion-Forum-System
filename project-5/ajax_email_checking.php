<?php 
	include "db.php";
	
	$email = $_POST['email'];
//echo "INSERT INTO user(name,email,password) VALUES('".$name."','".$email."','".$psw."')";
	$sql = mysqli_query($con,"SELECT * FROM user where email='".$email."'");
	if(mysqli_num_rows($sql) > 1){
		echo "1";
	}
	
?>