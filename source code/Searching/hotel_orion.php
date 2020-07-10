<?php
session_start();
if(isset($_POST["submit"]))
{
$_SESSION["hotel"]=$_POST["hotel"];
$_SESSION["price"]=$_POST["price"]; 
$_SESSION["id"]=$_POST["id"]; 
header('location: ../payment/confirm_booking.php');
}

?>
<!DOCTYPE html>

<html>
    <head>
        <title>Orion</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="hotel_css.css">
         <style>
             .flex-container{
                 background-image: linear-gradient(0deg,rgba(0,0,0,0.7),rgba(0,0,0,0.7)), url("../images/orion/orion2.jpeg")
             }
    </style>
    </head>
    <body>
        <div class="header">
            <p>ORION</p>
        </div>
        <div class="gallery">
            <div id="img_slider"></div>
        </div>
            
             
        <div class="flex-container">
            <div id="payment">
               <form  method="POST">
                <input type="text" name="id" value="4" class="input-box" readonly="true"  disabled="true"><br>
                    <label>Hotel Name</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<input type="text" name="hotel" value="Orion" class="input-box" readonly="true"><br>
                    <label>Room Types</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:<input type="text" name="room" value="Deluxe,Super Deluxe and Standard" class="input-box" readonly="true"><br>
                    <label>Price per person(INR)</label>:<input type="text" name="price" value="1500" class="input-box" readonly="true"><br>
                    <input type="submit" name="submit" value="BOOK NOW" class="btn"><br>
                </form>
            <p>We provide the best facilities and services that are listed below. </p>
        </div>
        <div>
            <p> <strong>Hotel Facilities :</strong></p>
            <ul>
                <li>Spa</li>
                <li>Car parking</li>
                <li>Swimming pool</li>
                <li>Public computer</li>
                <li>24 Hour security</li>
                  <li>Quality and hygienic food</li>
                <li>Outside catering service</li>
                 <li> Water purification system</li>
                <li>100 Seating capacity restaurant</li>
                <li>Semi open & outdoor restaurant</li>
                <li>35 Seating private air-conditioning</li>
                 <li>clean  and hygienic rooms,bathrooms and washrooms </li>
            </ul>
        </div>
        <div>
            <p><strong>Guest Services:</strong></p>
            <ul>
                <li> Laundry service</li>
                <li>Airport transfers</li>
                <li>Meeting facilities</li>
               <li>Tour & excursions</li> 
               <li>24 Hour concierge</li>
               <li>24-Hour room service</li>
               <li>Babysitting on request</li>
               <li>24-Hour doctor on call</li>
               <li>E-Bike & horse cart rental</li>
               <li>Free wireless Internet access</li>
               <li>Complimentary use of hotel bicycle</li>
            </ul>
        </div>
        </div>
        
         <div class="footer">

            <p>Contact Us: +91-8588801234</p>
        </div
    </body>
</html>
