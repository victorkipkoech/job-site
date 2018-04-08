<?php

session_start();
if (empty($_SESSION['id_admin'])) {
	header("Location:index.php");
	exit();
}
require_once('../connection.php');

if (isset($_GET)) {
	$sql="DELETE from job_post where id_jobpost='$_GET[id]'";
	if ($conn->query($sql)) {
		$sql1="DELETE from apply_job_post where id_jobpost='$_GET[id]'";
		if ($conn->query($sql1)) {
		}
		header("Location:job_posts.php");
		exit();
	}else{
		echo "Error!";
	}
}
?>