<?php
session_start();
?>
<?php
if(isset($_POST["submit"]))
{
   // echo '<script> alert("hghgf"); </script>';
    $val=intval($_POST["guestno"]);
    if(is_numeric($val))
    {
        if($val>0)
        {
            $_SESSION["roomtype"]=$_POST["roomtype"];
            $_SESSION["roomno"]=$_POST["roomno"];
            $_SESSION["guestno"]=$_POST["guestno"];
            $amount= intval($_POST["amount"])*$val*intval($_POST["roomno"]);
            if($_POST["roomtype"]=='Deluxe')
            {
                $amount+=1000;
            }
            else if($_POST["roomtype"]=='Super Deluxe')
            {
                $amount+=2000;
            }
            $_SESSION["amount"]=$amount;
            header('location: ../payment/payment.php');
        }
        else
        {
             echo "<script>alert('please enter valid number inn the guests field')</script>";
        }
    }
    else{
         echo "<script>alert('please enter valid number inn the guests field')</script>";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="confirm_css.css">
        <title>Booking Confirmation</title>
    </head>
   <body  >
<div class="center">
    <h3>BOOKING CONFIRMATION</h3>
<form action="#" id="frm" method="POST">
    <input name="name" type="text" placeholder="Name" readonly="true" value='<?php echo $_SESSION["username"]?>' class="input-box">
    <input name="hotel" type="text" placeholder="Hotel name" readonly="true" value='<?php echo $_SESSION["hotel"]?>' class="input-box">
    <input name="roomtype" list="room_type" placeholder="Room Type" type="search" required class="input-box">
    <datalist id="room_type">
        <option>Standard</option>
        <option>Deluxe</option>
        <option>Super Deluxe</option>
    </datalist>
    <input name="roomno" list="rooms" placeholder="No. of rooms" type="search" required class="input-box">
    <datalist id="rooms">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
    </datalist>
    <input id="guest" type="text"  name="guestno" placeholder="Number of Guests" required class="input-box">
    <input name="amount" type="text" placeholder="amount" value='<?php echo $_SESSION["price"]?>' readonly="true" class="input-box">
    <input name="check-in" type="text" placeholder="check-in" value='<?php echo $_SESSION["check-in"]?>' readonly="true" class="input-box">
    <input name="check-out" type="text" placeholder="check-out" value='<?php echo $_SESSION["check-out"]?>' readonly="true" class="input-box">
    <input type="submit" name="submit" value="CONFIRM" class="btn">
</form>
   <script>
    function validation()
    {
        var guests=document.getElementById("guest").value;
        var value= parseInt(guests);
        if(!isNaN(value))
        {
            if(value<1)
            {
                alert("pLease fill valid Number of guests");
                document.getElementById("guest").focus();
            }
        }
         else{
            alert("pLease fill valid Number of guests");
            document.getElementsByName("guests").focus();
    }
}
   </script>
 </div>
</body>
</html>
