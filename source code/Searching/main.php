<?php
 session_start();
?>
<?php
if(isset($_POST["submit"]))
{
  $_SESSION["state"]=$_POST["state"];
  $_SESSION["city"]=$_POST["city"];
  $_SESSION["area"]=$_POST["area"];
  $_SESSION["check-in"]=$_POST["check-in"];
  $_SESSION["check-out"]=$_POST["check-out"];
  $dat= date('Y-m-d');
  if($_SESSION["check-out"]<$_SESSION["check-in"])
  {
    echo "<script> alert('check-out date must come after check-in date');</script>";
  }
  else{
    if($_SESSION["check-in"]<$dat)
    {
      echo "<script> alert('check-in date must come after current date');</script>";
    }
    else{
      header('location: ../Searching/hotel_lists.php');
    }
    
  }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"mnbmbn>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="main_css.css">
         <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js">  </script> 
         <script type="text/javascript">
           $(document).ready(function(){
            var $list=$('#citylist');
            var alphabetical= $list.sort(function(a,b){
              alert($(a).text());
              alert($(b).text());
              return $(a).text() < $(b).text();
            });
            //alert(alphabetical);
           // alert(list[0]);
            $('#citylist').appendTo(alphabetical);
           });
         </script>
        <title>POGO</title>
        <script>


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
                 <a href="profile.php">Profile</a>
                <a href="../bookings/bookings.php">My Bookings</a>
                <a href="../login/set_password.html">Change Password</a>
                <a href="../login/index.php">Sign out</a>
                 </div>
           </div>     
        </div>
        <div class="flex-container">
                <form id="frm" method="POST">
                    <input  name="state" list="statelist" placeholder="State" type="search" required="true" class="input-box">
                  <datalist id="statelist">
                      <option value="Andhra Pradesh">Andhra Pradesh</option>
                      <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                      <option value="Assam">Assam</option>
                      <option value="Bihar">Bihar</option>
                      <option value="Chhattisgarh">Chhattisgarh</option>
                      <option value="Delhi">Delhi</option>
                      <option value="Goa">Goa</option>
                      <option value="Gujarat">Gujarat</option>
                      <option value="Haryana">Haryana</option>
                      <option value="Himachal Pradesh">Himachal Pradesh</option>
                      <option value="Jammu & Kashmir">Jammu & Kashmir</option>
                      <option value="Jharkhand">Jharkhand</option>
                      <option value="Karnataka">Karnataka</option>
                      <option value="Kerala">Kerala</option>
                      <option value="Madhya Pradesh">Madhya Pradesh</option>
                      <option value="Maharashtra">Maharashtra</option>
                      <option value="Manipur">Manipur</option>
                      <option value="Meghalaya">Meghalaya</option>
                      <option value="Mizoram">Mizoram</option>
                      <option value="Nagaland">Nagaland</option>
                      <option value="Odisha">Odisha</option>
                      <option value="Punjab">Punjab</option>
                      <option value="Rajasthan">Rajasthan</option>
                      <option value="Sikkim">Sikkim</option>
                      <option value="Tamil Nadu">Tamil Nadu</option>
                      <option value="Telangana">Telangana</option>
                      <option value="Tripura">Tripura</option>
                      <option value="Uttar Pradesh">Uttar Pradesh</option>
                      <option value="Uttarakhand">Uttarakhand</option>
                      <option value="West Bengal">West Bengal</option>

                  </datalist>
                    <input  name="city" list="citylist" placeholder="City" type="search" required="true" class="input-box">
                  <datalist id="citylist">
                    <option value="Hyderabad">Hyderabad</option>
                    <option value="Itanagar">Itanagar</option>
                    <option value="Dispur">Dispur</option>
                    <option value="Patna">Patna</option>
                    <option value="Raipur">Raipur</option>
                    <option value="Panji">Panji</option>
                    <option value="Gandhinagar">Gandhinagar</option>
                    <option value="Shimla">Shimla</option>
                    <option value="Ranchi">Ranchi</option>
                    <option value="Banglore">Banglore</option>
                    <option value="Tiruvanatpuram">Tiruvanatpuram</option>
                    <option value="Bhopal">Bhopal</option>
                    <option value="Mumbai">Mumbai</option>
                    <option value="Imphal">Imphal</option>
                    <option value="Shillong">Shillong</option>
                    <option value="Aizawal">Aizawal</option>
                    <option value="Kohima">Kohima</option>
                    <option value="Bhubaneswar">Bhubaneswar</option>
                    <option value="Chandigarh">Chandigarh</option>
                    <option value="Jaipur">Jaipur</option>
                    <option value="Gangtok">Gangtok</option>
                    <option value="Chennai">Chennai</option>
                    <option value="Agartala"></option>
                    <option value="Lucknow"></option>
                    <option value="Gairsain"></option>
                    <option value="Kolkata">Kolkata</option>
                    <option value="Delhi">Delhi</option>
                  </datalist>
                    <input  name="area" list="arealist" placeholder="Area" type="search" required="true" class="input-box">
                  <datalist id="arealist">
                    <option value="Ameenpur">Ameenpur</option>
                    <option value="Papum Pure">Papum Pure</option>
                    <option value="Dispur">Dispur</option>
                    <option value="Samanpura">Samanpura</option>
                    <option value="Budha Bihar">Budha Bihar</option>
                    <option value="Miramar Beach">Miramar Beach</option>
                    <option value="Dandi Kutir">Dandi Kutir</option>
                    <option value="New Shimla">New Shimla</option>
                    <option value="Lalpur">Lalpur</option>
                    <option value="Lalbagh">lalbagh</option>
                    <option value="Shanghumugham Beach">Shanghumugham Beach</option>
                    <option value="Bhel">Bhel</option>
                    <option value="Andheri west">Andheri west</option>
                    <option value="Navi Mumbai">Navi Mumbai</option>
                    <option value="khongnangh makhong">khongnangh makhong</option>
                    <option value="Pynthorumkharah">Pynthorumkharah</option>
                    <option value="Midland colony">Midland Colony</option>
                    <option value="Khandagiri">Khandagiri</option>
                    <option value="Jujhar Nagar">Jujhar Nagar</option>
                    <option value="Malviya Nagar">Malviya Nagar</option>
                    <option value="Marina Beach">Marina Beach</option>
                    <option value="Sowcarpet">Sowcarpet</option>
                    <option value="Venkatchala">Venkatchala</option>
                    <option value="Govindadappa">Govindadappa</option>
                    <option value="Rajarath">Rajarath</option>
                    <option value="Dwarka">Dwarka</option>
                    <option value="Vasant Kunj">Vasant Kunj</option>
                    <option value="New Ashok Nagar">New Ashok Nagar</option>
                    <option value="Mahrauli">Mahrauli</option>
                    <option value="Nehru Place">Nehru Place</option>
                    <option value="Saket">Saket</option>
                    <option value="Mahruali"></option>
                    <option value="South Delhi">South Delhi</option>
                    <option value="Tilaknagar">Tilaknagar</option>
                  </datalist>
               
            
                <input name="check-in" type="date" placeholder="check-in" required="true" class="input-box">
                <input name="check-out" type="date" placeholder="check-out" required="true" class="input-box">
                <input name="submit" type="submit" class="search-btn" value="SEARCH HOTEL">
                </form>
        </div>  
               <div class="center">
                   <div id="animation">
                   <div id="p">
                       <p>P</p>
                   </div>
                   <div id="o">
                       <p>O</p>
                   </div>
                   <div id="g">
                       <p>G</p>
                   </div>
                   <div id="oe">
                       <p>O</p>
                   </div>
                 </div>
              
                   
                    <div id="bottom">
                         
                    </div>
               </div>
      <div class="footer">
    <p><a href="https://www.facebook.com/" class="fa fa-facebook"></a>
      <a href="https://twitter.com/ShaliniKumariG4" class="fa fa-twitter"></a>
    <a href="#" class="fa fa-google"></a> </p>
<p>Stay connected to us<br>Reach us at 022-230365/66/67</p>
    </div>
    </body>
</html>
