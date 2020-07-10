<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="style_hotel.css"  type="text/css">
        <title>Hotels</title>
       <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js">  </script> 
       
       <script>
           function mySort()
           {
               document.getElementById("sortshow").classList.toggle("show"); 
           }
           function myFilter()
           {
               document.getElementById("filtershow").classList.toggle("show");
           }
                  
          window.onclick= (function(e) 
            {
              if (!e.target.matches('.dropbtn'))
              {
             if (document.getElementById("sortshow").classList.contains('show')) 
                 {
                  document.getElementById("sortshow").classList.remove('show');
                 }
             if(document.getElementById("filtershow").classList.contains('show'))
                 {
                     document.getElementById("filtershow").classList.remove('show');
                 }
                }
             });
    </script>
    </head>
    <body>
        <div id="header">
            <h1>WYSIWIG</h1>
        </div>   
        <div class="navigation">
            <div class="dropdown" id="filter">
                <button  onclick="myFilter()" class="dropbtn">Filter</button>
                <div id="filtershow" class="dropdown-content">
                    <form >
                        <input type="range" id="filter0" name="filter0" min="0" max="10000">
                        <label for="filter0">Price Range</label><br>
                        <input type="checkbox" id="filter1" name="filter1">
                        <label for="filter1">Parking facilities</label><br>
                        <input type="checkbox" id="filter2" name="filter2" >
                        <label for="filter2">Refrigerator</label><br>
                        <input type="checkbox" id="filter3" name="filter3">
                        <label for="filter3">Swimming pool</label><br>
                        <input type="checkbox" id="filter4" name="filter4">
                        <label for="filter4">Free Wifi</label><br>
                        <input type="checkbox" id="filter5" name="filter5">
                        <label for="filter5">TV</label><br>
                        <input type="checkbox" id="filter6" name="filter6">
                        <label for="filter6">AC</label><br>
                        <input type="checkbox" id="filter7" name="filter7">
                        <label for="filter7">Elevator</label><br>
                        <input type="checkbox" id="filter8" name="filter8">
                        <label for="filter8">Wheelchair Accessible</label><br>
                        <input type="checkbox" id="filter9" name="filter9">
                        <label for="filter9">Near Railway Stations</label><br>
                        <input type="checkbox" id="filter10" name="filter10">
                        <label for="filter10">Near Airport</label><br>
                        <input type="checkbox" id="filter11" name="filter11">
                        <label for="filter11">Near Bus Stop</label><br>
                        <input type="checkbox" id="filter12" name="filter12">
                        <label for="filter12">Library</label><br>
                        <input type="checkbox" id="filter13" name="filter13">
                        <label for="filter13">24/7 food service</label><br>
                    </form>
                </div>
            </div>
            <div class="dropdown" id="sortby">
                <button onclick="mySort()" class="dropbtn">Sort by</button>
                <div id="sortshow" class="dropdown-content">
                  <button id="alpha">Alphabetical order</button>
                   <button id="tohigh">Price low to high</button>
                   <button id="tolow">Price high to low</button>
                </div>
        </div>
        </div>
        <div id="hotel-container">
            <?php
                $con=mysqli_connect("127.0.0.1","root","","pogo") or die("died");
            if(!$con)
                {
                     echo "not connected to server";
                }
                $state=$_SESSION["state"];
                $city=$_SESSION["city"];
                $area=$_SESSION["area"];
                $query= "SELECT * FROM hotel WHERE state='$state' AND city='$city' AND area='$area'";
                $result=mysqli_query($con,$query);
               /* if(!$result)
                {
                	echo '<script>alert("no such entry exist. search again")</script>';
                	//header('location: main.php');
                }*/
                $rows=mysqli_num_rows($result);
              for($i=1;$i<=$rows;$i++)
                 {
                    $row=mysqli_fetch_assoc($result);
                ?>

                    <div class="hotels">
                        <h4 style="z-index:-1; position: absolute;"><?php echo $row["hotelname"];?></h4>
                        <h5 style="z-index:-1; position: absolute;"><?php echo $row["price"];?></h5>
                     <div id= '<?php echo $row["image"];?>'class="gallery"></div>
                    <div class="info">
                        Name: <?php echo $row["name"];?><br>
                        Room Types:Deluxe, Super Deluxe, Normal<br>
                        Price: <?php echo $row["price"];?><br>
                        Facilities:<br>
                    <ul>
                     <li>Television</li>
                        <li>24/7 Room services</li>
                        <li>Comfortable Bed</li>
                        <li>Quality food etc.</li>
                    </ul>
                <a href='<?php echo $row["page"];?>'><button class="view">View</button></a>
                </div>
            </div>
        <?php }?>
        </div>
    <div id="footer">Contact us never</div>
  </body>
</html>