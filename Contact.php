<?php $date = date('d-m-y');?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link type="text/css" rel="stylesheet" href="Mash_themes.css">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Contact</title>
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
  <div class="Contacts_Section" id="Contact">
  <h1 align="center">Contact</h1>
  <div class="Tel_email_part">
    <h2>Contact us:</h2>
    <p>To contact us, you have to call this numbers such as:
    <ul>
      <li>+254 733 623 260</li>
      <li>+254 723 463 685</li>
    </ul>
    <p></p>
    <p>You can also email us at:
    <ul>
      <li><a href="info@masheastafrica.com">info@masheastafrica.com</a></li>
      <li><a href="nairobi@masheastafrica.com">nairobi@masheasafrica.com</a></li>
    </ul>
    <p></p>
    <p>You can also find us at out head office Mombasa Mash East Africa P.O.Box 80100-81613</p>
    <p>You can visit us in this links such as:</p>
    <nav>
      <ul>
        <li><a href="https://www.facebook.com/Masheastafrica"><img src="Mash_Images.html/Facebook_logo.png"></a></li>
        <li><a href="https://www.twitter.com/mashafrica"><img src="Mash_Images.html/Twitter_logo.png"></a></li>
        <li><a href="https://www.instagram.com/masheastafrica"><img src="Mash_Images.html/Youtube_logo.png"></a></li>
      </ul>
    </nav>
  </div>
  <div class="Contact_form_section">
    <h2>Contact Form:</h2>	
    <form action="send.php" name="Contact form">
      <table>
      <tr>
      <td><strong>NAME:</strong></td>
      <td><input type="text" name="NAME" title="Enter your name here" required placeholder="NAME" class="field"></td>
      </tr>
      <tr>
      </tr>
      <tr>
      <td><strong>EMAIL:</strong></td>
      <td><input type="email" name="EMAIL" title="Enter your email here" required placeholder="EMAIL" class="field"></td>
      </tr>
      <tr>
      <td><strong>TITLE:</strong></td>
      <td><input type="text" name="TITLE" title="Please enter your title here" required placeholder="TITLE" class="field"></td>
      </tr>
      <tr>
      <td><strong>TEL:</strong></td>
      <td><input type="tel" name="TEL" title="please enter your telephone number here" required placeholder="TELEPHONE NUMBER" class="field"></td>
      </tr>
      <tr>
      <td><strong>MESSAGE:</strong></td>
      <td><textarea name="MESSAGE" required placeholder="MESSAGE" title="please enter your message here" cols="45" rows="10" class="field"></textarea></td>
      </tr>
      <tr>
      <td><strong>SECURITY:</strong></td>
      <td>10+10=<input type="text" name="SECURITY" required placeholder="ANSWER" title="Please answer this calculation" class="field"></td>
      </tr>
      <tr>
      <td><input type="submit" value="Send" class="field"></td>
      </tr>
      </table>
    </form>
  </div>
</div>
<footer>
<div class="Copyright_section"><marquee><p>COPYRIGHT © 2016 COMPANY NAME: <a href="http://www.masheaseatfrica.com">MASHEASTAFRICA</a> done by <a href="https://www.google.com/#q=Rukidi+Garcon">Roger Isingoma</a></p></marquee></div>
</footer>
</body>
</html>