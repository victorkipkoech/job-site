<?php
session_start();
require_once('../connection.php');

if (isset($_POST)) {

	$stmt =$conn ->prepare("INSERT into job_post (id_company,jobtitle,description,minimumsalary,maximumsalary,experience,qualification) values(?,?,?,?,?,?,?)");
	 $stmt ->bind_param("issssss",$_SESSION['id_user'],$jobtitle,$description,$minimumsalary,$maximumsalary,$experience,$qualification);

	//Escape special characters
	$jobtitle =mysqli_real_escape_string($conn,$_POST['jobtitle']);
	$description =mysqli_real_escape_string($conn,$_POST['jobdescription']);
	$minimumsalary =mysqli_real_escape_string($conn,$_POST['minsalary']);
	$maximumsalary =mysqli_real_escape_string($conn,$_POST['maxsalary']);
	$experience =mysqli_real_escape_string($conn,$_POST['experience']);
	$qualification =mysqli_real_escape_string($conn,$_POST['qualification']);
 

	if ($stmt ->execute()) {
			$_SESSION['jobPostSuccess']=true;
			header("Location:dashboard.php");
			exit();
		}else{
			echo "Error";
		}
		$stmt->close();

	// 	$sql ="INSERT into job_post (id_company,jobtitle,description,minimumsalary,maximumsalary,experience,qualification) values('$_SESSION[id_user]','$jobtitle','$description','$minimumsalary','$maximumsalary','$experience','$qualification')";
	// 	if ($conn->query($sql)===TRUE) {
	// 		$_SESSION['jobPostSuccess']=true;
	// 		header("Location:dashboard.php");
	// 		exit();
	// 	}else{
	// 		echo "Error".$sql ."<br>".$conn->error;
	// 	}
		
	 $conn->close();

 }else{
	header("Location: dashboard.php");
	exit();
}
?>