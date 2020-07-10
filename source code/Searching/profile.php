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
  else{
     echo "<p style='color:navy; font-size: 20px;'> Hurray! changes saved successfully</p>";
  }
  $Name= $_SESSION["username"];
  $Email= $_SESSION["usermail"];
  $Phone= $_POST["phone"];
  $Birth= $_SESSION["userbirth"];
  $Desti= $_POST["desti"];
  $City= $_POST["city"];
  $query= "update customers set phone= '$Phone',city='$City',destination='$Desti' where email='$Email'";
  mysqli_query($con,$query);
  session_unset();
    $_SESSION["username"]= $Name;
    $_SESSION["usermail"]= $Email;
    $_SESSION["userphone"]= $Phone;
    $_SESSION["usercity"]= $City;
    $_SESSION["userdesti"]= $Desti;
    $_SESSION["userbirth"]= $Birth;
   mysqli_close($con);
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style_profile.css" type="text/css">
        <title>Profile</title>
          <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
       <script>
           $(document).ready(function(){
               $('#mob').mask("0000000000");
           }); 
       </script>
              <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}
// Close the dropdown if the user clicks outside of it
window.onclick = function(e) 
{
  if (!e.target.matches('.dropbtn')) {
  var myDropdown = document.getElementById("myDropdown");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
};
</script>
    </head>
    <body>
        <div class="navbar">
          <div class="dropdown">
            <button onclick="myFunction()" class="dropbtn"> Hey! <?php echo $_SESSION["username"];?><img src="../images/user.png"> </button>
            <div id="myDropdown" class="dropdown-content">
                 <a href="main.php">Home</a>
                <a href="../login/index.php">Sign out</a>
                 </div>
           </div>  
        </div>
       
            
             <div class="flex-container">
            <form id="left" action="#">
                <label>Name:</label><br>
                <input name="user_name" id="name" type="text" placeholder="Name" readonly="true" value="<?php echo $_SESSION["username"];?>"><br>
                <label>Email  Id:</label><br>
                <input name="email" type="email" placeholder="Email" readonly="true" value="<?php echo $_SESSION['usermail'];?>"><br>
                 <label>Birth Date:</label><br>
                <input name="dob" type="date"  placeholder="Birth date" readonly=true" value="<?php echo $_SESSION['userbirth'];?>"><br>
  
            </form>     
            <form id="right" action="#" onsubmit="confirmation()" method="POST">
                <label>City:</label><br>
                <input name="city" type="text" placeholder="City" value="<?php echo $_SESSION['usercity'];?>"><br>
                <label>Phone  no:</label><br>
                <input id="mob" name="phone" type="text" placeholder="Phone" value="<?php echo $_SESSION['userphone'];?>"><br>
                <label>Favorite Destination</label><br>
                <input name="desti" type="text" placeholder="Destination" value="<?php echo $_SESSION['userdesti'];?>"><br>
                <input name="submit" type="submit"  value="SAVE CHANGES" id="btn">
            </form>
               
              <div class="footer"><p>thanks for visiting my page</p></div>
               </div>

    </body>
</html>
