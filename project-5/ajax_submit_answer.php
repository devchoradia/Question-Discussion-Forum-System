<?php 
	include "db.php";
	$answer = $_POST['answer'];
	$qid    = $_POST['qid'];
	$uid    = $_POST['uid'];
	$uname  = $_POST['uname'];
	$sql = mysqli_query($con,"INSERT INTO answer(qid,content,uid,uname,status) VALUES('".$qid."','".$answer."','".$uid."','".$uname."','1')");
	if($sql){
		echo "1";
	}else{
		echo "0";
	}
?>