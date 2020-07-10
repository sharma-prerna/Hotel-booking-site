<?php
session_start();
 $_SESSION["hotelname"]= $_POST["hotelname"];
 $_SESSION["roomtype"] = $_POST["roomtype"];
 $_SESSION["roomno"] = $_POST["roomno"];
 $_SESSION["guestno"] = $_POST["guestno"];
 $_SESSION["checkin"]=$_POST["checkin"];
 $_SESSION["checkout"]=$_POST["checkout"];
 $_SESSION["amount"]=$_POST["price"];
 header('location: ../bookings/cancel.php');
 /*echo  $_SESSION["hotelname"];
 echo  $_SESSION["roomtype"];
 echo  $_SESSION["roomno"];
 echo  $_POST["guestno"];
 echo  $_SESSION["checkin"];
 echo  $_SESSION["checkout"];
 echo  $_SESSION["amount"];
 echo  $amount;*/

?>