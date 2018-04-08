<?php

session_start();

require_once("../connection.php");

if (isset($_GET)) {
	$sql ="UPDATE company SET active='1' where id_company='$_GET[id]'";
	if ($conn->query($sql)) {
		header("Location:dashboard.php");
		exit();
	}else{
		echo "Error!";
	}
}
?>