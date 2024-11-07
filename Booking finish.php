<?php require_once('Connections/MEA.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}
$MM_authorizedUsers = "";
$MM_donotCheckaccess = "true";

// *** Restrict Access To Page: Grant or deny access to this page
function isAuthorized($strUsers, $strGroups, $UserName, $UserGroup) { 
  // For security, start by assuming the visitor is NOT authorized. 
  $isValid = False; 

  // When a visitor has logged into this site, the Session variable MM_Username set equal to their username. 
  // Therefore, we know that a user is NOT logged in if that Session variable is blank. 
  if (!empty($UserName)) { 
    // Besides being logged in, you may restrict access to only certain users based on an ID established when they login. 
    // Parse the strings into arrays. 
    $arrUsers = Explode(",", $strUsers); 
    $arrGroups = Explode(",", $strGroups); 
    if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "Login2.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($_SERVER['QUERY_STRING']) && strlen($_SERVER['QUERY_STRING']) > 0) 
  $MM_referrer .= "?" . $_SERVER['QUERY_STRING'];
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>
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

mysql_select_db($database_MEA, $MEA);
$query_Results = "SELECT * FROM reserve_tb ORDER BY DateCreated DESC";
$Results = mysql_query($query_Results, $MEA) or die(mysql_error());
$row_Results = mysql_fetch_assoc($Results);
$totalRows_Results = mysql_num_rows($Results);

mysql_select_db($database_MEA, $MEA);
$query_Recordset2 = "SELECT * FROM travel_tb ORDER BY `Date` DESC";
$Recordset2 = mysql_query($query_Recordset2, $MEA) or die(mysql_error());
$row_Recordset2 = mysql_fetch_assoc($Recordset2);
$totalRows_Recordset2 = mysql_num_rows($Recordset2);
?>
<?php $date = date('d-m-y');?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link type="text/css" rel="stylesheet" href="Mash_themes.css">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Booking results</title>
</head>

<body bgcolor="#CCCCCC">
<!--Header-->
<div class="Date_Space">
  <marquee>
  <p><?php echo $date; ?></p>
  </marquee>
</div>
<div class="Logo_Space">
  <div class="Site_logo"></div>
  <div class="face_logo">
  <table>
  <tr>
  <td>Welcome</td>
  </tr>
  <tr>
  <td><?php echo $_SESSION['MM_Username']?></td>
  </tr>
  <tr>
  <td><a href="Login2.php">Logout</a></td>
  </tr>
  </table>
  </div>
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
<!--End of header-->
<div class="Results_section">
<table>
<tr>
<td width="224" height="40">Passenger Id</td>
<td width="224" height="40">First Name</td>
<td width="224" height="40">Last Name</td>
<td width="224" height="40">Place of Departure</td>
<td width="224" height="40">Place of Arrival</td>
<td width="224" height="40">Traveling Schedule</td>
<td width="224" height="40">Option 1</td>
</tr>
<tr>
<td width="224" height="40"><strong><?php echo $row_Results['PASSENGER_ID']; ?></strong></td>
<td width="224" height="40"><strong><?php echo $row_Results['FIRST_NAME']; ?></strong></td>
<td width="224" height="40"><strong><?php echo $row_Results['LAST_NAME']; ?></strong></td>
<td width="224" height="40"><strong><?php echo $row_Recordset2['TRAVELING_FROM']; ?></strong></td>
<td width="224" height="40"><strong><?php echo $row_Recordset2['TRAVELING_TO']; ?></strong></td>
<td width="224"><strong><?php echo $row_Results['TRAVEL_SCHEDULE']; ?></strong></td>
<td width="224" height="40"><a href="Receipt.php?<?php echo $row_Results['PASSENGER_ID']; ?>=&<?php echo $row_Recordset2['TRAVEL_ID']; ?>=">View ticket</a></td>
</tr>
</table>
</div>
<footer>
<div class="Copyright_section"><marquee><p>COPYRIGHT © 2016 COMPANY NAME: <a href="http://www.masheaseatfrica.com">MASHEASTAFRICA</a> done by <a href="https://www.google.com/#q=Rukidi+Garcon">Roger Isingoma</a></p></marquee></div>
</footer>
</body>
</html>
<?php
mysql_free_result($Results);

mysql_free_result($Recordset2);
?>
