<?php
 $conn_error='Could not connect to database';
$host ='localhost';
$user='root';
$pass='';

$db ='ijob';

$conn = new mysqli($host,$user,$pass,$db);
if ($conn->connect_error) {
	die("Connection Failed: ".$conn->connect_error);
}
?>