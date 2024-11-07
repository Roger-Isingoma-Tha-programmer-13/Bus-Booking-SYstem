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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "Register")) {
  $insertSQL = sprintf("INSERT INTO register_tb (USERNAME, EMAIL, PASSWORD) VALUES (%s, %s, %s)",
                       GetSQLValueString($_POST['USERNAME'], "text"),
                       GetSQLValueString($_POST['EMAIL'], "text"),
                       GetSQLValueString($_POST['PASSWORD'], "text"));

  mysql_select_db($database_MEA, $MEA);
  $Result1 = mysql_query($insertSQL, $MEA) or die(mysql_error());

  $insertGoTo = "Login2.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}

mysql_select_db($database_MEA, $MEA);
$query_Recordset1 = "SELECT * FROM register_tb";
$Recordset1 = mysql_query($query_Recordset1, $MEA) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<?php $date = date('d-m-y');?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<link type="text/css" rel="stylesheet" href="Mash_themes.css">
<style type="text/css">
.User_section .Reg_Section form table tr td {
	color: #FFF;
}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Register</title>
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
  <div class="Reg_Section">
    <h2>Register:</h2>
<form method="POST" action="<?php echo $editFormAction; ?>" name="Register">
<table height="50">
   <tr>
   <td>USERNAME:</td>
   </tr>
   <tr><td><input type="text" name="USERNAME" required placeholder="USERNAME" title="Enter your Username here" class="field"></td></tr>
   <tr>
   <td>EMAIL:</td>
   </tr>
   <tr>
   <td><input type="email" name="EMAIL" value="" required placeholder="EMAIL" title="Enter your Email here" class="field"></td></tr>
   <tr>
   <td>PASSWORD:</td>
   </tr>
   <tr>
   <td><input type="password" name="PASSWORD" value="" required class="field"></td></tr>
   <tr>
   <td><input type="submit" value="Register" class="field"></td>
   </tr>
   </table>
<p>If you already have an account.<a href="Login2.php"> Login</a></p>
<input type="hidden" name="MM_insert" value="Register">
</form>

  </div>
  
</div>
<footer>
<div class="Copyright_section"><marquee><p>COPYRIGHT © 2016 COMPANY NAME: <a href="http://www.masheaseatfrica.com">MASHEASTAFRICA</a> done by <a href="https://www.google.com/#q=Rukidi+Garcon">Roger Isingoma</a></p></marquee></div>
</footer>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
