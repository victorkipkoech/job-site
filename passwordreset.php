<?php
session_start();
require_once('connection.php');

if (isset($_POST)) {
	//Escape special characters

	
	$email =mysqli_real_escape_string($conn,$_POST['email']);
	

	$sql ="SELECT email from users where email='$email'";
	$result =$conn->query($sql);

	if ($result->num_rows > 0) {

		// $bytes =openssl_random_pseudo_bytes(32);//This will generata a random pseudo string of bytes.
		// $hash=base64_encode($bytes);
		$newPass = rand(100,999);

		//Encrypt password
		$password=base64_encode(strrev(md5($newPass)));

		$sql ="UPDATE users SET password ='$password' WHERE email='$email'";
		if ($conn->query($sql)===TRUE) {

			//Send Email
			// $to =$email;
			// $subject ="iJob - Password Reset";
			// $message ='
			// 	<html>
			// 	<head>
			// 	<title>Your Password Has Been Reset</title>
			// 	<body>
			// 	<p>Your New Password Is - '.$newPass.'</p>
			// 	<a href="www.yourdomain.com/verify.php?token='.$hash.'&email='.$email.'">Verify Email</a>
			// </body>
			// 	</head>
			//  	</html>
			//  ';
			// $headers[]='MIME-VERSION: 1.0';
			// $headers[]='Content-type: text/html; charset=iso-8859-1';
			// $headers[]='To:'.$to;
			// $headers[]='From: victor.kipkoech94@gmail.com';
			// //You can add more headers like cc,Bcc.
			// $result =mail($to, $subject, $message,inplode("\r\n",$headers));//\r\n inplode will return new line.

			// if ($result===TRUE) {
			// 	$_SESSION['passwordChanged']=true;
			// 	header("Location:login.php");
			// 	exit();
			// }
			//If data inserted successfully the set some session variables for easy rference to login
			$_SESSION['passwordChanged']=$newPass;
			header("Location:forgot_password.php");
			exit();
		}else{
			//if data failed to insert
			echo "Error".$sql ."<br>".$conn->error;
		}
		}else{
			//if email found in  database
			$_SESSION['emailNotFoundError']=true;
			header("Location:forgot_password.php");
			exit();
		}
	$conn->close();

 }else{
	header("Location: forgot_password.php");
	exit();
}
?>