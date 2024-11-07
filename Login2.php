<?php require_once('Connections/MEA.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['USERNAME'])) {
  $loginUsername=$_POST['USERNAME'];
  $password=$_POST['PASSWORD'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "Travel Options.php";
  $MM_redirectLoginFailed = "Login2.php";
  $MM_redirecttoReferrer = false;
  mysql_select_db($database_MEA, $MEA);
  
  $LoginRS__query=sprintf("SELECT USERNAME, PASSWORD FROM register_tb WHERE USERNAME=%s AND PASSWORD=%s",
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query, $MEA) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
}
?>
<?php $date = date('d-m-y');?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<link type="text/css" rel="stylesheet" href="Mash_themes.css">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Login</title>
</head>

<body bgcolor="#CCCCCC">
<div class="Date_Space">
  <marquee>
  <p><?php echo $date; ?></p>
  </marquee>
</div>
<div class="Logo_Space">
  <div class="Site_logo"></div>
  <div class="Booking_logo"><a href="Login.html"><img src="Mash_Images.html/Booking_logo.jpg"></a></div>
</div>
<div class="Pics_Space" style="max-width:500px">
<img class="mySlides" src="Mash_Images.html/Travel_image.jpg" width="1331" height="468">
<img class="mySlides" src="Mash_Images.html/Travel_road.jpg" width="1331" height="468">
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
<div class="User_section">
  <div class="Login_Section">
    <h2>Login:</h2>
<form METHOD="POST" action="<?php echo $loginFormAction; ?>" name="Login">
   <table height="50">
   <tr>
   <td>USERNAME:</td>
   </tr>
   <tr><td><input type="text" name="USERNAME" required placeholder="USERNAME" title="Enter your Username here" class="field"></td></tr>
   <tr>
   <td>PASSWORD:</td>
   </tr>
   <tr>
   <td><input type="password" name="PASSWORD" value="" required placeholder="PASSWORD" title="Enter your Username here" class="field"></td></tr>
   <tr>
   <td><input type="submit" value="Login" class="field"></td>
   </tr>
   </table>
   <p>If you donot have an account. <a href="Register2.php">Register</a></p>
  </form>
  </div>
  
</div>
<footer>
<div class="Copyright_section"><marquee><p>COPYRIGHT © 2016 COMPANY NAME: <a href="http://www.masheaseatfrica.com">MASHEASTAFRICA</a> done by <a href="https://www.google.com/#q=Rukidi+Garcon">Roger Isingoma</a></p></marquee></div>>
</footer>
</body>
</html>

