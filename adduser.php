<?php
session_start();
require_once('connection.php');

if (isset($_POST)) {
	//Escape special characters
	$fullname =mysqli_real_escape_string($conn,$_POST['fullname']);
	$dob =mysqli_real_escape_string($conn,$_POST['dateofbirth']);
	$email =mysqli_real_escape_string($conn,$_POST['email']);
	$password =mysqli_real_escape_string($conn,$_POST['password']);
	//Encrypt password
	$password=base64_encode(strrev(md5($password)));

	$sql ="SELECT email from users where email='$email'";
	$result =$conn->query($sql);

	if ($result->num_rows == 0) {

		$bytes =openssl_random_pseudo_bytes(32);//This will generata a random pseudo string of bytes.
		$hash=base64_encode($bytes);

		$sql ="INSERT into users(fullname,dob,email,password,hash) values('$fullname','$dob','$email','$password','$hash')";
		if ($conn->query($sql)===TRUE) {

			//Send Email
			// $to =$email;
			// $subject ="iJob - Confirm Your Email Address";
			// $message ='
			// 	<html>
			// 	<head>
			// 	<title> Confirm Your Email</title>
			// 	<body>
			// 	<p>Click Limk To Confirm</p>
			// 	<a href="www.yourdomain.com/verify.php?token='.$hash.'&email='.$email.'">Verify Email</a>
			// 	</body>
			// 	</head> 
			// 	</html>
			// ';
			// $headers[]='MIME-VERSION: 1.0';
			// $headers[]='Content-type: text/html; charset=iso-8859-1';
			// $headers[]='To:'.$to;
			// $headers[]='From: victor.kipkoech94@gmail.com';
			// //You can add more headers like cc,Bcc.
			// $result =mail($to, $subject, $message,inplode("\r\n",$headers));//\r\n inplode will return new line.

			// if ($result===TRUE) {
			// 	$_SESSION['registerCompleted']=true;
			// 	header("Location:login.php");
			// 	exit();
			// }

			$_SESSION['registerCompleted']=true;
			header("Location:login.php");
			exit();
		}else{
			echo "Error".$sql ."<br>".$conn->error;
		}
		}else{
			$_SESSION['registerError']=true;
			header("Location:register.php");
			exit();
		}
	$conn->close();

 }else{
	header("Location: register.php");
	exit();
}
?>