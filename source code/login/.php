<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="login_css.css">
        <title>LOGIN FORM</title>
    </head>
   <body>
       <div class="sign-up-form">
		<img src="../images/user.png">
		<h1>Login</h1>
                <form action='$_SERVER["PHP_SELF"]'  method="POST" id="frm" onsubmit="confirmation()">
                                                
			<input name="email" type="email" class="input-box" placeholder="email id"    required> 
			<input name="pass" type="password" class="input-box" placeholder="password" required>
             <input  name="submit" type="submit" class="reg-btn" value="LOGIN">
             </form>
          
                    <p><a href="forgot_pass.html">forgot password</a>/<a href="signup.html">sign up</a></p>
                    
	</div> 
    <?php
    $con= mysqli_connect("127.0.0.1","root","","pogo");
    if(!$con)
    {
        die("died");
        echo 'could not connect to server';
    }

    $Email= $_POST["email"];
    $Pass= $_POST["pass"];
    $query= "select * from user_data where email= '$Email' and pass= '$Pass'";
    $result =mysqli_query($con,$query);
    if(mysqli_num_rows($result) >0)
    {
        //$row= mysqli_fetch_assoc($result);
        header('refresh:-1; url= ../Searching/main.html');
    }
    else
    {
        echo "username or password is incoorect or try sign up";
           }
    
    mysqli_close($con);
    
?>
            <script>
                
                function confirmation()
                {
                    var f= "<%=session.getAttribute("username")%>";
                    alert(f);
                    if(f===null)
                    {
                        alert("Username or Password is Incorrect or try Sign up");
                    }
                }
            </script>
       
</body>
</html>