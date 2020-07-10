<?php
session_start();
$_SESSION["usermail"]="";
$con=mysqli_connect("127.0.0.1","root","","pogo");
if(!$con)
{
	die("died");
	echo "Not connected to server";
}
$Email=$_POST["email"];
$query="select * from customers where email='$Email'";
$result=mysqli_query($con,$query);
if(mysqli_num_rows($result) >0)
{
	$row= mysqli_fetch_assoc($result);
		$_SESSION["username"]= $row["name"];
		$_SESSION["usermail"]= $row["email"];
		$_SESSION["userphone"]= $row["phone"];
		$_SESSION["usercity"]= $row["city"];
		$_SESSION["userdesti"]= $row["destination"];
		$_SESSION["userbirth"]= $row["dob"];
	mysqli_close($con);
	header('location: ../php/send_mail.php');
}
else
{
	header('location: ../login/send_otp.html');
}
?>