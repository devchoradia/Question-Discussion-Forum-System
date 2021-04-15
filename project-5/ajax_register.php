<?php 
	include "db.php";
	// echo "<pre>";
	// print_r($_POST);

	$name = $_POST['name'];
	$email = $_POST['email'];
	$psw = $_POST['psw'];
	$repsw = $_POST['repsw'];
//echo "INSERT INTO user(name,email,password) VALUES('".$name."','".$email."','".$psw."')";
	$sql = mysqli_query($con,"INSERT INTO user(name,email,password,status) VALUES('".$name."','".$email."','".$psw."','1')");
	if($sql){
		echo "1";
	}else{
		echo "0";
	}
?>