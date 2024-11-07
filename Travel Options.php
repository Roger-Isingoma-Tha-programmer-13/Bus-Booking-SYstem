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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "travel options")) {
  $insertSQL = sprintf("INSERT INTO travel_tb (TRAVELING_FROM, TRAVELING_TO, TRAVEL_DATE, RETURN_DATE) VALUES (%s, %s, %s, %s)",
                       GetSQLValueString($_POST['TRAVELING_FROM'], "text"),
                       GetSQLValueString($_POST['TRAVELING_TO'], "text"),
                       GetSQLValueString($_POST['TRAVEL_DATE'], "text"),
                       GetSQLValueString($_POST['RETURN_DATE'], "text"));
  $insertGoTo = "Reserve seat.php";
  mysql_select_db($database_MEA, $MEA);
  $Result1 = mysql_query($insertSQL, $MEA) or die(mysql_error());

  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>
<?php $date = date('d-m-y');?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<link type="text/css" rel="stylesheet" href="Mash_themes.css">
<style type="text/css">
.Logo_Space .face_logo table tr td {
	color: #FFF;
}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Travel Options</title>
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
<!--End of header-->
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
<div class="Travel_options_area">
<h1>Travel Options:</h1>
  <form method="POST" action="<?php echo $editFormAction; ?>" name="travel options">
<table height="50">
<tr>
<td>TRAVELING FROM:</td>
<td><input type="text" value="" required placeholder="TRAVELING FROM" name="TRAVELING_FROM" title="Enter your place of departure here" class="field"></td>
<td>TRAVELING TO:</td>
<td><input type="text" value="" required placeholder="TRAVELING TO" name="TRAVELING_TO" title="Enter your place of arrival here" class="field"></td>
<td>TRAVEL DATE:</td>
<td><input type="date" value="" required placeholder="TRAVEL DATE" name="TRAVEL_DATE" title="Enter your place of travel date here" class="field"></td>
<td>RETURN DATE:</td>
<td><input type="date" value="" required placeholder="RETURN DATE" name="RETURN_DATE" title="Enter your place of return date here" class="field"></td>
<td><input type="submit" value="Find Schedule" class="field"></td>
</tr>
</table>
<input type="hidden" name="MM_insert" value="travel options">
  </form>
</div>
<footer>
<div class="Copyright_section"><marquee><p>COPYRIGHT © 2016 COMPANY NAME: <a href="http://www.masheaseatfrica.com">MASHEASTAFRICA</a> done by <a href="https://www.google.com/#q=Rukidi+Garcon">Roger Isingoma</a></p></marquee></div>
</footer>
</body>
</html>

