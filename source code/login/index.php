<?php
	if(isset($_POST["submit"]))
	{
		$con= mysqli_connect("127.0.0.1","root","","pogo");
	if(!$con)
	{
		die("died");
		echo 'could not connect to server';
	}

	$Email= $_POST["email"];
	$Pass= $_POST["pass"];
	$query= "select * from login where email= '$Email' and pass= '$Pass'";
	$result =mysqli_query($con,$query);
	if(mysqli_num_rows($result) >0)
	{
		$sql="select * from customers where email='$Email'";
		$data=mysqli_query($con,$sql);
		$row= mysqli_fetch_assoc($data);
		mysqli_close($con);
		session_start();
		$_SESSION["username"]= $row["name"];
		$_SESSION["usermail"]= $row["email"];
		$_SESSION["userphone"]= $row["phone"];
		$_SESSION["usercity"]= $row["city"];
		$_SESSION["userdesti"]= $row["destination"];
		$_SESSION["userbirth"]= $row["dob"];
		header('refresh:0; url= ../Searching/main.php');
	}
	else
	{
	echo "<p style='color: white; font-size:20px; text-align: center; margin-top: 20px;'>username or password is incorrect! try sign up</p>";
		mysqli_close($con);
	}
}
	
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="login_css.css">
        <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>LOGIN FORM</title>
    </head>
   <body>
       <div class="sign-up-form">
		<img src="../images/user.png">
		<h1>Login</h1>
                <form method="POST" id="frm">
                                                
			<input name="email" type="email" class="input-box" placeholder="email id"    required> 
			<input name="pass" type="password" class="input-box" placeholder="password" required>
             <input  name="submit" type="submit" class="reg-btn" value="LOGIN">
             </form>
          
                    <p><a href="../login/send_otp.html">forgot password</a>/<a href="signup_form.php">sign up</a></p>
                    
	</div>
	<div class="footer">
    <p><a href="https://www.facebook.com/" class="fa fa-facebook"></a>
      <a href="https://twitter.com/ShaliniKumariG4" class="fa fa-twitter"></a>
    <a href="#" class="fa fa-google"></a> </p>
<p>stay connected
<br>Reach us on 022-230365/66/67</p>
    </div>      
</body>
</html>