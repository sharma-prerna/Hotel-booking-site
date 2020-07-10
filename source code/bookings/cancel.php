<?php 
session_start();
if(isset($_POST["submit"]))
{
    $con=mysqli_connect("127.0.0.1","root","","pogo") or die("died");
    if(!$con)
        echo " not connected to server";
    else{
        $Email = $_SESSION["usermail"];
        $checkin= $_SESSION["checkin"];
        $checkout= $_SESSION["checkout"];
        $hotelname= $_SESSION["hotelname"];
        $query = "UPDATE bookings SET stat='cancelled' where email='$Email' AND checkin='$checkin' AND checkout='$checkout' AND hotelname='$hotelname' AND stat='success'";
        $result= mysqli_query($con,$query);
            header('location: ../bookings/cancel_confirm.html');
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" >
        <title>Cancellation</title>
        <link rel="stylesheet" type="text/css" href="cancel_css.css">
    </head>
    <body>
        <div class="form-container">
            <h3>CANCEL BOOKING</h3>
            <div class="form">
                <form method="POST" action="#">
                    <input id="name" name="name" type="text"  placeholder="user name" value='<?php echo $_SESSION["username"];?>' readonly="true" class="input-box"><br>
                    <input id="hotel" name="hotel" type="text" placeholder="hotel name" value='<?php echo $_SESSION["hotelname"];?>' readonly="true" class="input-box"><br>
                    <input id="room_type" name="room_type"type="text" value='<?php echo $_SESSION["roomtype"];?>' placeholder="Room type" readonly="true" class="input-box"><br>
                    <input id="guests"name="guests" type="text" placeholder="no. of guests" value='<?php echo $_SESSION["guestno"];?>' readonly="true" class="input-box"><br>
                    <input id="rooms" name="rooms" type="text" placeholder="no. of rooms" value='<?php echo $_SESSION["roomno"];?>' readonly="true" class="input-box"><br>
                    <input id="price" name="price" type="text" placeholder="Amount Paid" value='<?php echo $_SESSION["amount"];?>' readonly="true" class="input-box"><br>
                    <input id="check-in" name="check-in" type="text" placeholder="check-in" value='<?php echo $_SESSION["checkin"];?>' readonly="true" class="input-box"><br>
                    <input id="check-out" name="check-out" type="text" placeholder="check-out" value='<?php echo $_SESSION["checkout"];?>' readonly="true" class="input-box"><br>
                    <input id="account" name="account" type="text" placeholder="Account number" class="input-box"><br>
                    <input id="ifsc" name="ifsc" type="text" placeholder="IFSC CODE" class="input-box"><br>
                    <input type="submit" name="submit" value="CONFIRM CANCELLATION" class="reg-btn">
                </form>
                </div>
                <p>Please! enter your valid bank account number and corresponding IFSC code to get the refund 
                    directly into account .</p>
                    
        </div>
    </body>
</html>
