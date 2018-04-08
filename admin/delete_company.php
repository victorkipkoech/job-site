<?php

session_start();

require_once("../connection.php");

if (isset($_GET)) {
	$sql ="DELETE from company where id_company='$_GET[id]'";
	if ($conn->query($sql)) {
		header("Location:company.php");
		exit();
	}else{
		echo "Error!";
	}
}
?>