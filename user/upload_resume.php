<?php

session_start();
if (empty($_SESSION['id_user'])) {
	header("Location: ..index.php");
	exit();
}
require_once("../connection.php");
if (isset($_POST)) {
	$uploadOk=true;

	$folder_dir="../uploads/resume/";
	$base=basename($_FILES['resume']['name']);
	$resumeFileType =pathinfo($base,PATHINFO_EXTENSION);
	$file =uniqid().".".$resumeFileType;
	$filename=$folder_dir.$file;//where our file will be saved;
	if (file_exists($_FILES['resume']['tmp_name'])) {//tmp_name is server temp location
		if ($resumeFileType=="pdf" || $resumeFileType ="doc" || $resumeFileType="docx") {
			if ($_FILES['resume']['size']<500000) {//file size less tha 5MB
				move_uploaded_file($_FILES["resume"]["tmp_name"], $filename);
			}else{
				$_SESSION['uploadError']="Wrong size.Maximum size Allowed :5MB";
				$uploadOk=false;

			}
		}else{
			$_SESSION['uploadError']="Wrong size format. Only PDF,docx Allowed";
				$uploadOk=false;			
		}
	}else{
		$_SESSION['uploadError']="Something went wrong.File not uploaded. Try Again";
				$uploadOk=false;
	}
	if ($uploadOk==false) {
		header("Location: resume_upload.php");
		exit();
	}
	$sql ="SELECT * FROM users where id_user='$_SESSION[id_user]'";
	$result =$conn->query($sql);
	if ($result->num_rows>0) {
		$row =$result->fetch_assoc();
		if ($row['resume'] !="") {
			unlink("../uploads/resume/".$row['resume']);
		}
	}
	$sql="UPDATE users set resume='$file' where id_user='$_SESSION[id_user]' ";
	if ($conn->query($sql)) {
		header("Location:resume.php");
		exit();
	}else{
		echo "Error: ".$sql ."<br>".$conn->error;
	}
	$conn->close();
}
?>