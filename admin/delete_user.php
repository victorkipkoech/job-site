<?php
session_start();

if (empty($_SESSION['id_admin'])) {
	header("Location:index.php");
	exit();
}
require_once('../connection.php');
if (isset($_GET)) {
	$sql ="DELETE from users where id_user='$_GET[id]'";
	if ($conn->query($sql)) {
		header("Location:user.php");
		exit();
	}else{
		echo "Error";
	}
}
?>