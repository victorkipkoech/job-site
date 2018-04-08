<?php
require_once('connection.php');
session_start();
if (isset($_POST)) {
	
	//escape special characters
	$name =mysqli_real_escape_string($conn,$_POST['companyname']);
	$location =mysqli_real_escape_string($conn,$_POST['headoffice']);
	$contactno =mysqli_real_escape_string($conn,$_POST['contactno']);
	$website =mysqli_real_escape_string($conn,$_POST['website']);
	$type =mysqli_real_escape_string($conn,$_POST['type']);
	$address =mysqli_real_escape_string($conn,$_POST['address']);
	$email =mysqli_real_escape_string($conn,$_POST['email']);
	$password =mysqli_real_escape_string($conn,$_POST['password']);

	$country =mysqli_real_escape_string($conn,$_POST['country']);
	$state =mysqli_real_escape_string($conn,$_POST['state']);
	$city =mysqli_real_escape_string($conn,$_POST['city']);
	//Encrypt password
	$password =base64_encode(strrev(md5($password)));
	
	$sql ="SELECT email from company where email='$email'";
	$result =$conn->query($sql);

	if ($result->num_rows == 0) {

	$sql ="INSERT into company (name,location,country,state,city,contactno,website,type,address,email,password) values('$name','$location','$country','$state','$city','$contactno','$website','$type','$address','$email','$password')";
	if ($conn->query($sql)===True) {
		$_SESSION['registerCompleted']=true;
			header("Location:companylogin.php");
			exit();
		} else { 
			echo "Error".$sql ."<br>".$conn->error;
		} 
	}else {
		$_SESSION['registerError']=true;
			header("Location: companyregister.php");
			exit();
	}

	$conn->close();

}else {
	header("Location: companyregister.php");
	exit();
}
?>