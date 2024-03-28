<?php
$connection= new mysqli("localhost","root","","mytest");
if ($connection->connect_error) {
	die("connection failed:".$connection->connect_error);	
}
if ($_SERVER["REQUEST_METHOD"]=="POST") {
	$emai=$_POST['email'];
	$password=($_POST['password']);
	$sql="INSERT INTO user(email,password) VALUES('$emai','$password')";

	if ($connection->query($sql)==TRUE) {
		echo "registration successiful";
		header("location:login.html");
			exit();
	}
	else{
		echo "error:".sql."<br>".$connection->error;
	}}
	$connection->close();
?>