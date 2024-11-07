<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<link type="text/css" rel="stylesheet" href="Mash_themes.css">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Select Schedule</title>
</head>
<body  bgcolor="#CCCCCC">
<!--Header-->
<div class="Date_Space">
  <marquee>
  <p>15-Oct-2016</p>
  </marquee>
</div>
<div class="Logo_Space">
  <div class="Site_logo"></div>
  <div class="face_logo">
  <table height="59">
  <tr>
  <td height="21">Welcome</td>
  </tr>
  <td height="21"></td>
  <tr>
  <td height="21"><a href="Login2.php">Logout</a></td>
  </tr>
  </table>
  </div>
</div>
<!--End of header-->
<div class="Pics_Space">
<img class="mySlides" src="Mash_Images.html/Travel_image.jpg" width="1331" height="468">
<img class="mySlides" src="Mash_Images.html/Travel_road.jpg" width="1331" height="468">
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
</div>
<div class="Results">
<div class="Day_results_Summary">
<form name="Schedule_form" method="POST">
<table width="1275" border="0" height="50">
<tr>
<td width="159.375">Place of departure</td>
<td width="159.375">Place of arrival</td>
<td width="159.375">Schedule type</td>
<td width="159.375">Option</td>
</tr>
<tr>
<td height="50"><input type="text" name="Place_of_Departure" class="field"></td>
<td height="50"><input type="text" name="Place_of_Arrival" class="field"></td>
<td><select name="Schedule_type" class="field">
<option value="Morning">Morning</option>
<option value="Evening">Evening</option>
</select></td>
<td height="50"><input type="submit" value="Select this Schedule" class="field"></td>
</tr>
</table>
</form>
</div>
<div class="Copyright_section"><marquee><p>COPYRIGHT © 2016 COMPANY NAME: <a href="http://www.masheaseatfrica.com">MASHEASTAFRICA</a></p></marquee></div>
</div>
</body>
</html>