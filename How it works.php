<?php $date = date('d-m-y');?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link type="text/css" rel="stylesheet" href="Mash_themes.css">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>How it works</title>
</head>

<body bgcolor="#CCCCCC">
<div class="Date_Space">
    <marquee>
    <p><?php echo $date; ?></p>
    </marquee>
  </div>
    <div class="Logo_Space">
   <div class="Site_logo"></div>
    <div class="Booking_logo"><a href="Login2.php"><img src="Mash_Images.html/Booking_logo.jpg"></a></div>
  </div>
<!--End of header-->
<div class="List_Space">
  <table width="1347" border="0">
    <tr>
      <td width="224"><a href="Home.php">Home</a></td>
      <td width="224"><a href="Services.php">Services</a></td>
      <td width="224"><a href="About.php">About</a></td>
      <td width="224"><a href="Contact.php">Contacts</a></td>
      <td width="224"><a href="How it works.php">How_it_works</a></td>
      <td width="199"><a href="FAQ.php">FAQ</a></td>
    </tr>
  </table>
</div>
<div class="Pics_Space" style="max-width:500px">
<img class="mySlides" src="Mash_Images.html/Mash_image.jpg" width="1331" height="468">
<img class="mySlides" src="Mash_Images.html/Mash_image_1.jpg" width="1331" height="468">
<img class="mySlides" src="Mash_Images.html/Mash_image_2.jpg" width="1331" height="468">
<img class="mySlides" src="Mash_Images.html/Benefits2.jpg" width="1331" height="468">
<img class="mySlides" src="Mash_Images.html/Responsibility.jpg" width="1331" height="468">
</div>
<script>
  var myIndex = 0;
  carousel();

  function carousel() {
      var i;
      var x = document.getElementsByClassName("mySlides");
      for (i = 0; i < x.length; i++) {
         x[i].style.display = "none";  
      }
      myIndex++;
      if (myIndex > x.length) {myIndex = 1}    
      x[myIndex-1].style.display = "block";  
      setTimeout(carousel, 10000); // Change image every 2 seconds
  }
  </script>
  <div class="How_it_works_section">
  <h1 align="center">How it works</h1>
  <strong>
  <p>Here are the following Steps that the customers need to follow when booking a bus ticket for a journey with masheastafrica and they include:</p>
  </strong>
  <ul>
    <li>Go to this website.</li>
    <li>Click the logo on your upper right corner of the masheastafrica home page and it directs you to the login/Register page.</li>
    <li>You login into your account. If you have not account to use to book a bus ticket then Register/create a new account</li>
    <li>After a successful login attempt, fill in the travel options form.</li>
    <li>Select the time you wish to travel. It can either be 5pm, 6pm 7pm depending on the destination you choose to go to.</li>
    <li>For any inquiry on the schedule info, you can visit the <a href="Bus Schedule.php">schedule page</a>.</li>
    <li>Enter your passenger dettails on the next form below.</li>
    <li>Confirm your payment method as paypal.This attempt can only be successful if you have an active paypal account.</li>
    <li>You proceed to the page where you find your bus ticket and you download it. This ticket can be inform of a PDF document with your travel options and passenger details in it.</li>
    <li>Print it and come with it to the bus park for approval before you board the bus.</li>
  </ul>
</div>
<footer>
<div class="Copyright_section"><marquee><p>COPYRIGHT © 2016 COMPANY NAME: <a href="http://www.masheaseatfrica.com">MASHEASTAFRICA</a> done by <a href="https://www.google.com/#q=Rukidi+Garcon">Roger Isingoma</a></p></marquee></div>
</footer>
</body>
</html>