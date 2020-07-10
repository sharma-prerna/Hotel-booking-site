<?php
session_start();
$con=mysqli_connect("127.0.0.1","root","","pogo");
if(!$con)
{
	die("died");
	echo "couldn't connect to server";
}
	$Pass= $_POST["cpass"];
	$Email= $_SESSION["usermail"];
	echo $Pass;
	$query="update login set pass='$Pass' where email='$Email'";
	mysqli_query($con,$query);
	header('location: ../Searching/main.php');
?>