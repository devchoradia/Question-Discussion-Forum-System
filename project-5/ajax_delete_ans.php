<?php 
	include "db.php";
	$qid    = $_POST['qid'];
	$aid    = $_POST['aid'];
	$sql = mysqli_query($con,"DELETE FROM answer where aid='".$aid."' AND qid='".$qid."'");
	if($sql){
		echo "1";
	}else{
		echo "0";
	}
?>