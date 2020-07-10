<?php
session_start();
?>
<?php
if(isset($_POST["submit"]))
{
  $otp=$_POST["otp"];
  if($otp!=$_SESSION["otp"])
  {
    echo "<p style='color: red; text-align: center; margin-top: 20px; font-size: 30px;'>wrong otp!</p>";
  }
  else
  {
    header('location: set_password.html');
  }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="forgot_css.css">
        <title>Forgot Password</title>
    </head>
        <body >
 
    <div id="otp-container">
      <div id="disclaimer">
          <p id="para">Please enter the One Time Password that has been sent to your registered <span style="color: red;">email id. </span>
              This will remain valid for <span style="color: red;">60 seconds</span>. If you have not received the OTP yet then regenerate the 
              OTP by clicking the resend link. Have a nice day. Do not cut trees. Please SAVE THE NATURE.</p>
      </div>
      <div id="form">
          <form id="input_form" method="POST">
          <input id="otp" type="text" name="otp" placeholder="OTP" class="input-box">  
         <input class="reg-btn" name="submit" type="submit" value="VERIFY">
            </form>
      </div>

      <div id="send">
          <a href="../php/send_mail.php" id="resend">resend again</a>
        </div>
    </div> 

  </body>
</html>
