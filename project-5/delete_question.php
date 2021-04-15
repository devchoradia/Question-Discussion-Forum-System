<?php 
	include "db.php";
	// echo "<pre>";
	// print_r($_POST);

	$qid  = $_POST['id'];
//echo "INSERT INTO user(name,email,password) VALUES('".$name."','".$email."','".$psw."')";
	$sql = mysqli_query($con,"DELETE FROM question where qid='".$qid."'");
	if($sql){
		echo "1";
	}else{
		echo "0";
	}
?>