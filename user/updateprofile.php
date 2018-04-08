<?php
session_start();
require_once('../connection.php');

//if user clicked update profile button
if (isset($_POST)) {
	
	//escape special characters
	$fullname=mysqli_real_escape_string($conn,$_POST['fullname']);
	$dob=mysqli_real_escape_string($conn,$_POST['dateofbirth']);
	$country=mysqli_real_escape_string($conn,$_POST['country']);
	$city =mysqli_real_escape_string($conn,$_POST['city']);
	$address=mysqli_real_escape_string($conn,$_POST['address']);
	$contact=mysqli_real_escape_string($conn,$_POST['contactno']);
	$qualification =mysqli_real_escape_string($conn,$_POST['qualification']);
	$stream =mysqli_real_escape_string($conn,$_POST['stream']);
	$passingyear=mysqli_real_escape_string($conn,$_POST['passingyear']);
	$age =mysqli_real_escape_string($conn,$_POST['age']);
	$course =mysqli_real_escape_string($conn,$_POST['course']);

	//update query


	$sql ="UPDATE users set fullname ='$fullname',dob='$dob', country='$country',city='$city',address='$address',contact='$contact',qualification='$qualification',stream='$stream',passingyear='$passingyear',age='$age',course='$course' where id_user ='$_SESSION[id_user]'";
	if ($conn->query($sql)===TRUE) {
		header("Location:dashboard.php");
		exit();

	}else{
		echo "Error". $sql ."<br>" .$conn->error;
	}
}else{
	header("Location:dashboard.php");
	exit();
}
?>