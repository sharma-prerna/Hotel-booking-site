<?php
session_start();
$Email=$_SESSION["usermail"];
$array= range(0,5);
shuffle($array);
$otp=implode("",$array);
$_SESSION["otp"]=$otp;

//php mailer files
	require 'PHPMailer/PHPMailer.php';
	require 'PHPMailer/SMTP.php';
	require'PHPMailer/Exception.php';
//name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
//instance of mail
	$mail= new PHPMailer();
//use smptp
	$mail->isSMTP();
//name host
	$mail->Host="smtp.gmail.com";
//authentication
	$mail->SMTPAuth="true";
//encryption
	$mail->SMTPSecure="tls";
//port
	$mail->Port="587";
//gmail userbame
	$mail->Username="";
	$mail->Password="";
//subject
	$mail->Subject="POGO is our LOGO";
//sender
	$mail->setFrom("prernasharma788@gmail.com");
//email body
	$mail->isHTML(true);
// this is to send html mail 
//for attachemnet
//$mail->addAttachment('img url');
	$mail->Body="<h3>One time password is :</h3><br>".$otp."<p>Please! Save the nature because we don't want to lose you :(<p>";
//add reciever
	$mail->addAddress($Email);
//send mail
	if( $mail->send()){
		header('location: ../login/forgot_pass.php');
		
	}
	else{
		echo "couldn't send";
	}
	$mail->smtpClose();
 ?>
