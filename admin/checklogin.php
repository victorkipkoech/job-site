<?php
session_start();
require_once('../connection.php');

//Iff user clicked login button
if (isset($_POST)) {
	//Escae special characters
	$username =mysqli_real_escape_string($conn,$_POST['username']);
	$password=mysqli_real_escape_string($conn,$_POST['password']);

	//Encrypt password
	// $password =base64_encode(strrev(md5($password)));


	$sql ="SELECT * from admin where username='$username' AND password='$password'";
	$result =$conn->query($sql);

	if ($result->num_rows > 0) {
		//output data
		while ($row =$result->fetch_assoc()) {
			
			$_SESSION['id_admin']=$row['id_admin'];
			header("Location: dashboard.php");
			exit();
		}
	}else{
		$_SESSION['loginError']=$conn->error;
		header("Location: index.php");
		exit();
	}
	$conn->close();
}else{
	header("Location: index.php");
	exit();
}
?>