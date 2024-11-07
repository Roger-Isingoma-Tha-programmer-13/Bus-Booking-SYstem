<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link type="text/css" rel="stylesheet" href="Mash_themes.css">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Frequently Asked Questions</title>
</head>

<body bgcolor="#CCCCCC">
<div class="Date_Space">
    <marquee>
    <p> <!-- #BeginDate format:En2 -->12-Dec-2016<!-- #EndDate --></p>
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
  <div class="FAQ_Section">
<h1 align="center">Frequently Asked Questions</h1>
<p><strong>Can I change a booking that has already been confirmed?</strong></p>
<p>It depends. You can request changes to your reservation—such as the dates or number of guests—but your changes will need to be approved by the bus operator. Most bus operators require adequate time notice for changes, and some of them have some charge for amending your booking.
</p>
<p><strong>Can i book multiple seats using one person's details?</strong></p>
<p>Yes, you may book multiple seats 
using one person's details if they are travelling together as a group. 
This is acceptable across most bus operators, but may vary depending on 
the bus operator.</p>
<p><strong>How do I book a bus ticket?</strong></p>
<p>To book your bus ticket you simply
 need to select the place of origin, the destination, date of travel and
 if required, the return date and search. We'll show you the options and
 you'll just need to choose the one that fits you best and proceed.</p>
 <p><strong>How do I know my booking was successful?</strong></p>
 <p>When the booking is finalized and 
approved, it means that your seat was successfully booked. After making 
payment, you will receive your travel details by Email. Remember
 to pay attention to the travel details on the ticket. If payment is not
 made on time , the reserved seat is released.</p>
 <p><strong>How do I board my bus?</strong></p>
 <p> Your SMS ticket is a valid ticket 
with a unique ID code that the bus operator will use to allow you to 
board. You only need to display your SMS ticket and once verified by the
 operator, you will board. This applies as well to all road pickups.</p>
 <p><strong>What documents do I need to book a bus ticket?</strong></p>
 <p>Kenyan, Ugandan and Rwandan 
nationals must provide either National ID's or Passport. Travellers of 
other Nationalities must provide their passport. A contact telephone 
number must also be provided for all travellers.</p>
<p><strong></strong></p>
</div>
<footer>
<div class="Copyright_section"><marquee><p>COPYRIGHT © 2016 COMPANY NAME: <a href="http://www.masheaseatfrica.com">MASHEASTAFRICA</a> done by <a href="https://www.google.com/#q=Rukidi+Garcon">Roger Isingoma</a></p></marquee></div>
</footer>
</body>
</html>