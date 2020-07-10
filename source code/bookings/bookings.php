<?php
 session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="bookings_css.css"/>
        <title>My Bookings</title>
           <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js">  </script> 
           
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
                 <a href="../Searching/main.php">Home</a>
                <a href="../login/index.php">Sign out</a>
                 </div>
           </div>  
        </div>
        <div id="my_bookings">
            <?php
                $con=mysqli_connect("127.0.0.1","root","","pogo") or die("died");
                if(!$con)
                    {
                     echo "not connected to server";
                    }
                $Email=$_SESSION["usermail"];
                $query="SELECT * FROM booking where book IN(SELECT book from books where email='$Email') ORDER BY dat DESC";
                $result=mysqli_query($con,$query);
                 $rows=mysqli_num_rows($result);
                for($i=1;$i<=$rows;$i++)
                {
                    $row=mysqli_fetch_assoc($result);
                ?>
                 <hr>
                <div class="mybookings">
                    <strong><p style="color: navy; font-size: 20px; text-decoration: underline;">BOOKING :<?php echo $i;?></p></strong>
                    <p><strong>BOOKING DATE:</strong> <?php echo $row["dat"]; ?><p>
                    <p><strong>NAME:</strong> <?php echo $_SESSION["username"]; ?></p>
                    <p><strong>EMAIL:</strong><?php echo $Email ?></p>
                    <p><strong>STATUS:</strong><?php echo $row["stat"]; ?></p>

                    <?php 
                      $date_in=$row["checkin"];
                      $date_cur=$row["dat"];
                      if( ($date_in > $date_cur) && ($row["stat"]=="success"))
                        {
                          
                      ?>
                      <form action="../php/cancel_data.php" method="POST" >
                        <label>HOTEL NAME:</label><input type="text" name="hotelname" value='<?php echo$row["hotelname"]; ?>' readonly class="input-box"><br>
                        <label>ROOM TYPE:</label> <input type="text" name="roomtype" value='<?php echo $row["roomtype"]; ?>'readonly class="input-box"><br>
                        <label>NUMBER OF ROOMS:</label><input type="text" name="roomno" value='<?php echo $row["roomno"]; ?>' readonly class="input-box"><br>
                        <label>NUMBER OF GUESTS:</label><input type="text" name="guestno" value='<?php echo $row["guestno"]; ?>' readonly class="input-box"><br>
                        <label>PAID AMOUNT:</label><input type="text" name="price" value='<?php echo $row["amount"]; ?> Rs.' readonly class="input-box"><br>
                        <label>CHECK-IN DATE:</label><input type="text" name="checkin" value='<?php echo $row["checkin"]; ?>' readonly class="input-box"><br>
                        <label>CHECK-OUT DATE:</label><input type="text" name="checkout" value=' <?php echo $row["checkout"]; ?>' readonly class="input-box"><br>
                        <input type="submit" name="cancel_btn" value="CANCEL" class="cancel" readonly>
                    <?php
                     } 
                      else
                      {

                    ?>
                        <p><strong>HOTEL NAME:</strong><?php echo$row["hotelname"]; ?></p>
                        <p><strong>ROOM TYPE:</strong><?php echo $row["roomtype"]; ?></p>
                        <p><strong>NUMBER OF ROOMS: </strong><?php echo $row["roomno"]; ?></p>
                        <p><strong>NUMBER OF GUESTS: </strong><?php echo $row["guestno"]; ?></p>
                        <p><strong>PAID AMOUNT: </strong><?php echo $row["amount"]; ?> Rs.</p>
                        <p><strong>CHECK-IN DATE: </strong><?php echo $row["checkin"]; ?></p>
                        <p><strong>CHECK-OUT DATE: </strong><?php echo $row["checkout"]; ?></p>
                  <?php }?>
                </div>
            <?php }?>
        </div>
       
    </body>
</html>
