<?php
$connection= new mysqli("localhost","root","","mytest");
if ($connection->connect_error) {
	die("connection failed:".$connection->connect_error);	
}
if ($_SERVER["REQUEST_METHOD"]=="POST") {
	$email=$_POST['email'];
	$password=($_POST['password']);
	$sql="SELECT * FROM user WHERE email='$email'";
	$result=$connection->query($sql);

	if ($result->num_rows==1) {
		$row=$result->fetch_assoc();
		//$hp=password_hash($password,PASSWORD_DEFAULT);                                                                                                                                                  
		if (password_verify($password,$row['password'])) {
			header("location:landing.php");
			exit();
		}
		else{
			echo "invalid email or password";
		}
	}
	else{
		echo "error:".sql."<br>".$connection->error;
	}}
	$connection->close();
?>