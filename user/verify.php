<?php
session_start();
require_once('connection.php');

if (isset($_GET)) {
	//Escape special characters
	$hash =mysqli_real_escape_string($conn,$_POST['token']);
	$email =mysqli_real_escape_string($conn,$_POST['email']);

	$sql ="SELECT * from users where email='$email' AND hash='$hash'";
	$result =$conn->query($sql);

	if ($result->num_rows == 0) {
?>