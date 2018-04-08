<?php
session_start();
require_once('connection.php');

//Iff user clicked login button
if (isset($_POST)) {
	//Escae special characters
	$email =mysqli_real_escape_string($conn,$_POST['email']);
	$password=mysqli_real_escape_string($conn,$_POST['password']);

	//Encrypt password
	$password =base64_encode(strrev(md5($password)));


	$sql ="SELECT * from users where email='$email' AND password='$password'";
	$result =$conn->query($sql);

	if ($result->num_rows > 0) {
		//output data
		while ($row =$result->fetch_assoc()) {
			$_SESSION['fullname']=$row['fullname'];
			$_SESSION['email']=$row['email'];
			$_SESSION['dob'] =$row['dob'];
			$_SESSION['id_user']=$row['id_user'];

			if (isset($_SESSION['callFrom'])) {
				$location =$_SESSION['callFrom'];
				unset($_SESSION['callFrom']);
			
			//Redirecting
			header("Location: ".$location);
			exit();	
		}else{
			header("Location: user/dashboard.php");
			exit();	
			}
		}
	}else{
		$_SESSION['loginError']=$conn->error;
		header("Location: login.php");
		exit();
	}
	$conn->close();
}else{
	header("Location: login.php");
	exit();
}
?>