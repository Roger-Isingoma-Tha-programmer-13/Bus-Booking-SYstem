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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "Reserve_form")) {
  $insertSQL = sprintf("INSERT INTO reserve_tb (FIRST_NAME, LAST_NAME, TELEPHONE_NUMBER, EMAIL_ADDRESS, PASSPORT_NUMBER, NUMBER_OF_TRAVELERS, TRAVEL_SCHEDULE, AMOUNT, SEAT_CLASS) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['FIRST_NAME'], "text"),
                       GetSQLValueString($_POST['LAST_NAME'], "text"),
                       GetSQLValueString($_POST['TELEPHONE_NUMBER'], "int"),
                       GetSQLValueString($_POST['EMAIL_ADDRESS'], "text"),
                       GetSQLValueString($_POST['PASSPORT_NUMBER'], "text"),
                       GetSQLValueString($_POST['NUMBER_OF_TRAVELERS'], "int"),
                       GetSQLValueString($_POST['TRAVEL_SCHEDULE'], "text"),
                       GetSQLValueString($_POST['AMOUNT'], "int"),
                       GetSQLValueString($_POST['SEAT_CLASS'], "text"));

  mysql_select_db($database_MEA, $MEA);
  $Result1 = mysql_query($insertSQL, $MEA) or die(mysql_error());

  $insertGoTo = "Booking finish.php";
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
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Reserve Seat</title>
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
<div class="Reserve_Section">
  <h1>Passenger Details:</h1>
  <div class="Instruction_section">
    <p1>Fields marked in
      *
      are mandatory. </p1>
  </div>
  <div class="Reserve_form">
  <form action="<?php echo $editFormAction; ?>" method="POST" name="Reserve_form">
      <table width="1018" border="0">
    <tr>
    <td width="306" height="40"><label class="Fname_Label">FIRST_NAME *</label></td>
    <td width="284" height="40"><label class="Lname_Label">LAST_NAME *</label> </td>
    </tr>
    <tr>
    <td height="40">
    <input type="text" name="FIRST_NAME" value="" required placeholder="FIRST_NAME" title="Enter your first name"  class="field">
    </td>
    <td height="40">
    <input type="text" name="LAST_NAME" value="" required placeholder="LAST_NAME" title="Enter your last name" class="field">
    </td>
    </tr>
    <tr>
    <td height="40">
    <label>TELEPHONE_NUMBER *</label> 
    </td>
    <td height="40"><label>EMAIL_ADDRESS *</label></td>
    </tr>
    <tr>
    <td height="40">
    <input type="tel" name="TELEPHONE_NUMBER" value="" required placeholder="TELEPHONE_NUMBER" title="Enter your telephone Number here" class="field">
    </td>
    <td height="40">
    <input type="email" name="EMAIL_ADDRESS" value="" required placeholder="EMAIL_ADDRESS" title="Enter your Address here" class="field">
    <td width="14">
    </td>
    </tr>
    <tr>
    <td height="40">
    <label>PASSPORT_NUMBER *</label>
    </td>
    <td height="40">
    <label>NUMBER_OF_TRAVELERS *</label>
    </td>
    </tr>
    <tr>
    <td height="40">
    <input type="text" name="PASSPORT_NUMBER" value="" required placeholder="PASSPORT_NUMBER" title="Enter your Passport Number here" class="field">
    </td>
    <td height="40">
      <input type="number" name="NUMBER_OF_TRAVELERS" value="" required placeholder="NUMBER_OF_TRAVELERS" title="Enter the number of travallers here" class="field">
    </td>
    </tr>
    <tr>
    <td height="40">
    <label>TRAVEL_SCHEDULE *</label>
    </td>
    <td height="40">
    <label>AMOUNT *</label>
    </td>
    </tr>
    <tr>
    <td height="40">
    <select name="TRAVEL_SCHEDULE" class="field">
    <option value="Morning">Morning</option>
    <option value="Evening">Evening</option>
    </select>
    </td>
    <td height="40">
    <strong>$:</strong><input type="number" name="AMOUNT" value="" required placeholder="AMOUNT" title="Enter your amount here" class="field">
    </td>
    </tr>
    <tr>
    <td height="40"><label>SEAT_CLASS</label></td>
    </tr>
    <tr>
    <td>
    <select name="SEAT_CLASS" class="field">
    <option value="VIP CLASS">VIP CLASS</option>
    <option value="BUSINESS CLASS">BUSINESS CLASS</option>
    <option value="NORMAL">NORMAL</option>
    <option value="MASH COOL GOLD CLASS">MASH COOL GOLD CLASS</option>
    </select>
    </td>
    </tr>
    <tr>
    <td height="40">
    <input type="submit" value="Reserve Seat" class="field">
    </td>
    </tr>
    </table>
      <input type="hidden" name="MM_insert" value="Reserve_form">
    </form>
  </div>
</div>
<footer>
<div class="Copyright_section"><marquee><p>COPYRIGHT © 2016 COMPANY NAME: <a href="http://www.masheaseatfrica.com">MASHEASTAFRICA</a> done by <a href="https://www.google.com/#q=Rukidi+Garcon">Roger Isingoma</a></p></marquee></div>
</footer>
</body>
</html>
