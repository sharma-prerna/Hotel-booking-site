<?php
session_start();
?>
<?php
if(isset($_POST["submit"]))
{
  $con=mysqli_connect("127.0.0.1","root","","pogo") or die("died");
  if(!$con)
  {
    echo "not connected to server";
  }
  else{
  $dat =date("Y-m-d");
  $mail=$_SESSION["usermail"];
  $hotelname=$_SESSION["hotel"];
  $roomtype=$_SESSION["roomtype"];
  $roomno=$_SESSION["roomno"];
  $amount=$_SESSION["amount"];
  $checkin=$_SESSION["check-in"];
  $checkout=$_SESSION["check-out"];
  $guestno=$_SESSION["guestno"];
  $book_id=0;
  $query_getid="SELECT book from books order by book DESC";
  $res=mysqli_query($con,$query_getid);
  if(!$res)
  {
    $book_id=0;
  }
  else{
    $row=mysqli_fetch_assoc($res);
    $book_id=$row["book"];
    $book_id++;
  }
    $query_booking="INSERT INTO booking(book,stat,hotelname,dat,roomno,roomtype,guestno,amount,checkin,checkout) VALUES('$book_id','success','$hotelname','$dat','$roomno','$roomtype','$guestno','$amount','$checkin','$checkout')";
    $result=mysqli_query($con,$query_booking);
    echo $result;
    $query_books="INSERT INTO books(book,email) VALUES('$book_id','$mail')";
    $Result=mysqli_query($con,$query_books);
    //echo $Result;
    if(!$result||!$Result)
    {
      echo "\nnot inserted";
    }
    else
    { 
      header('location: ../payment/successful_pay.html');
    }
  }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Payment Form</title>
        <link rel="stylesheet" type="text/css" href="payment_css.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
       <script>
           $(document).ready(function(){
               $('#cvv').mask("000");
               $('#number').mask("0000 0000 0000 0000");
               $('#expiry').mask("00 / 00");
           }); 
       </script>
    </head>
    <body>
    <div class="form-container">
      <div class="cards">
          <i class="fa fa-cc-visa" style="color:navy;"></i>
            <i class="fa fa-cc-amex" style="color:blue;"></i>
            <i class="fa fa-cc-mastercard"  style="color:red;"></i>
           <i class="fa fa-cc-paypal" style="color:blue;"></i>
      </div>
        <div class="form">
           
        <form method="POST" action="#">
             <i class="fa fa-user" id="user"></i>
            <input id="name" type="text" name="name" placeholder="CARDHOLDER NAME" required="true" class="input-box">
            <i class="fa fa-credit-card" id="cc"></i>
          <input id="number" type="text" name="number" placeholder="CARD NUMBER" required="true" class="input-box">
          <i class="fa fa-calendar" id="cal"></i>
          <input id="expiry" type="text" name="expiry" placeholder="MM / YY" required="true" class="input-box">
            <i class="fa fa-lock" id="lock"></i>
          <input id="cvv" type="password" name="cvv" placeholder="CVV" required="true" class="input-box">
          <input type="submit" name="submit" class="btn" value="PAY NOW">
          
    </form>
            
        </div>
        <div class="amount">
           <h3> <span id="left">Total Amount</span> <span id="right"><?php echo $_SESSION["amount"];?> Rs.</span></h3>
        </div>
        <div class="saving">
            <form>
                <input type="checkbox" name="save_details" id="save_details" checked="true">
            <label for="save_details">save my details for future bookings.</label>
            </form>
        </div>
         
    </div>
    </body>
</html>
