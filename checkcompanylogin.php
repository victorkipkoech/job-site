<?php

session_start();
require_once('connection.php');

//If user clicked login button
if (isset($_POST)) {
	//Escae special characters
	$email =mysqli_real_escape_string($conn,$_POST['email']);
	$password=mysqli_real_escape_string($conn,$_POST['password']);

	//Encrypt password
	$password =base64_encode(strrev(md5($password)));


	$sql ="SELECT id_company,name,email,active from company where email='$email' AND password='$password'";
	$result =$conn->query($sql);

	if ($result->num_rows > 0) {
		//output data
		while ($row =$result->fetch_assoc()) {

			if ($row['active']=='2') {
				$_SESSION['companyloginError']= "Your Account Is Still Pending Approval.";
				header("Location: companylogin.php");
				exit();
			}else if ($row['active']=='0') {
				$_SESSION['companyloginError']= "Your Account Is Rejected. Please Contact For More Information.";
				header("Location: companylogin.php");
				exit();
			}else if ($row['active']=='1') {
			//active 1 means admin  has approved account. 
			//Set some session variables for easy reference
			$_SESSION['name']=$row['name'];
			$_SESSION['email']=$row['email'];
			$_SESSION['id_user']=$row['id_company'];
			$_SESSION['companylogged']=true;
			header("Location: company/dashboard.php");
			exit();	
			}
		}
	}else {
		$_SESSION['loginError']=$conn->error;
		header("Location: companylogin.php");
		exit();
	}

	$conn->close();

} else {
	header("Location: companylogin.php");
	exit();
}
?>