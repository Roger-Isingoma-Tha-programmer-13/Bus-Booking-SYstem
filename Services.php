<?php $date = date('d-m-y');?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<link type="text/css" rel="stylesheet" href="Mash_themes.css">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Services</title>
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
<div class="Pics_Space" id="Home" style="max-width:500px">
<img class="mySlides" src="Mash_Images.html/Parcel2.jpg" width="1331" height="468">
<img class="mySlides" src="Mash_Images.html/parcel3.jpg" width="1331" height="468">
<img class="mySlides" src="Mash_Images.html/Mash_image_2.jpg" width="1331" height="468">
<img class="mySlides" src="Mash_Images.html/Benefits2.jpg" width="1331" height="468">
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
  <div class="Services_Section" id="Services">
  <h1 align="center">Services</h1>
  <div class="Parcel_section_Section">
    <h2 align="center">Parcel Services:</h2>
    <p>We would like to welcome our esteemed customers to the newly designed MASH EAST AFRICA Parcel Bus. It has been constructed specifically with our customers in mind and has the capability of carrying up to a maximum of 10 tones luggage’s of different kinds.
      Our bus is built with features which guarantee safety and professional care of your valuable cargo to various destinations. All of our staff are well trained to ensure a safe and secure means of transporting your cargo in a stress-free environment.
      We are entrusted with cargo and mails to all major cities and towns in Kenya and Uganda (Kampala).</p>
  </div>
  <div class="Passenger_Section">
    <h2 align="center">Passenger Services:</h2>
    <p>The customers are welcome to the passenger service where they can enjoy their journey on the buses that have plasma television Sets on that which the passengers can use to watch their favourite tv programs during their journeys. The passengers can have a ride while they are charging their gadjets, taking some breakfast and having some time to sleep on the chairs that are comfortable for them for some period of hours during their journeys&nbsp;such as travel journey and the return journey back to their homes.</p>
  </div>
</div>
<footer>
<div class="Copyright_section"><marquee><p>COPYRIGHT © 2016 COMPANY NAME: <a href="http://www.masheaseatfrica.com">MASHEASTAFRICA</a> done by <a href="https://www.google.com/#q=Rukidi+Garcon">Roger Isingoma</a></p></marquee></div>
</footer>
</body>
</html>