<?php 
	include "db.php";
	$qid   = $_POST['qid'];
	$uid   = $_POST['uid'];
	$uname = $_POST['uname'];
	//$status = $_POST['status'];
	//echo "SELECT * FROM upvote where qid='".$qid."' AND uid='".$uid."' AND status='1'";
	$sql_sql = mysqli_query($con,"SELECT * FROM upvote where qid='".$qid."' AND uid='".$uid."' AND status='1'");
	$cnt = mysqli_num_rows($sql_sql);
	if($cnt==0){
		$cnt1 = $cnt+1;
		//echo "INSERT INTO upvote(qid,uid,uname,status) VALUES('".$qid."','".$uid."','".$uname."','1')";
		$sql = mysqli_query($con,"INSERT INTO upvote(qid,uid,uname,status) VALUES('".$qid."','".$uid."','".$uname."','1')");
		//echo "UPDATE question SET up='".$cnt1."' WHERE qid='".$qid."'";
		$update = mysqli_query($con,"UPDATE question SET up='".$cnt1."' WHERE qid='".$qid."'");
		if($sql){
			echo "1";
		}else{
			echo "0";
		}
	}else{
		$cnt1 = $cnt-1;
		//echo "DELETE FROM upvote WHERE qid='".$qid."' AND uid='".$uid."'";
		$sql = mysqli_query($con,"DELETE FROM upvote WHERE qid='".$qid."' AND uid='".$uid."'");
		//echo "UPDATE question SET up='".$cnt1."' WHERE qid='".$qid."'";
		$update = mysqli_query($con,"UPDATE question SET up='".$cnt1."' WHERE qid='".$qid."'");
		if($sql){
			echo "2";
		}else{
			echo "0";
		}
	}
	
?>