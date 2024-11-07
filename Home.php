<?php $date = date('d-m-y');?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<link type="text/css" rel="stylesheet" href="Mash_themes.css">
<script src="Date.js"></script>
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Home</title>
</head>

<body bgcolor="#CCCCCC">
<div class="Date_Space">
    <marquee>
    <p>
      <?php echo $date; ?>
    </p>
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
</body>
<footer>
<div class="Copyright_section"><marquee><p>COPYRIGHT © 2016 COMPANY NAME: <a href="http://www.masheaseatfrica.com">MASHEASTAFRICA</a> done by <a href="https://www.google.com/#q=Rukidi+Garcon">Roger Isingoma</a></p></marquee></div>
</footer>
</html>