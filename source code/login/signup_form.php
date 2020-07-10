<?php
session_start();
?>
<?php
if(isset($_POST["submit"]))
{
  $con= mysqli_connect("127.0.0.1","root","","pogo");
  if(!$con)
  {
    die("died");
    echo 'could not connect to server';
  }
  $Email=$_POST["email"];
  $Name=$_POST["name"];
  $Phone=$_POST["phone"];
  $Birth=$_POST["dob"];
  $City=$_POST["city"];
  $Pass=$_POST["pass"];
  $Desti=$_POST["desti"];
  $query_valid= "select * from login where email ='$Email'";
  $query_data="INSERT INTO customers(email,name,dob,phone,destination,city) VALUES('$Email','$Name','$Birth','$Phone','$Desti','$City')";
  $query_login="INSERT INTO login(email,pass) VALUES('$Email','$Pass')";
  $result= mysqli_query($con,$query_valid);
  if(mysqli_num_rows($result) >0)
  {
    echo "<p style='color: white; font-size: 20px; text-align:center; margin-top: 10px;'>Account already exist! try Login.</p>";
    mysqli_close($con);
  }
  else
  {
    $result=mysqli_query($con,$query_login);
    $res=mysqli_query($con,$query_data);
    //echo $result;
    if(!$result||!$res)
      echo "not inserted";
    else
      echo "<p style='color: white; font-size: 20px; text-align:center; margin-top: 10px;'>Account created successfully. Now Please login.</p>";
     mysqli_close($con);
  }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Sign Up form</title>
        <link rel="stylesheet" type="text/css" href="signup_css.css">
          <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
       <script>
           $(document).ready(function(){
               $('#mob').mask("0000000000");
           }); 
       </script>
    </head>
    <body>
	<div class="sign-up-form">
		<img src="../images/user.png">
		<h1>Sign Up Now</h1>
                <form method="POST" id="frm">
			<input name="name" type="text" class="input-box" placeholder="Full Name"  required>
			<input id="mob" name="phone" type="text" class="input-box" placeholder="Mobile no."   required>
			<input  name="email" type="email" class="input-box" placeholder="Email id"    required>
			
                        <input name="pass" type="password" class="input-box" placeholder="Password" required>
                        <input name="dob" type="date" class="input-box" placeholder="Date Of Birth" required>
                        <input name="city" type="text" class="input-box" placeholder="Current City">
                        <input name="desti" type="text" class="input-box" placeholder="Favourite Destination">
                                <p> <span><input type="checkbox" required checked="true"></span> I agree to the terms and conditions</p>
                              <input name="submit" type="submit" class="reg-btn" value="REGISTER">
                          </form>
              
	</div>

</body>
</html>
