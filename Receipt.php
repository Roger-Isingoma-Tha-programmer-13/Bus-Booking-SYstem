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
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link type="text/css" rel="stylesheet" href="Mash_themes.css">
 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<title>Receipt</title>
</head>

<body>
<div class="Logo_banner">
<img src="Mash_Images.html/Mash_pic.jpg" style="width:auto">
</div>
<div class="Ticket_Infomation">
<table width="1340">
<tr>
<td height="40"><div align="center"><strong><h1>Ticket information</h1></strong></div></td>
</tr>
<tr>
<td><strong><h1>Passenger Details</h1></strong></td>
</tr>
<tr>
<td height="40" width="900"><strong><p>Passenger ID:</p></strong></td>
<td height="40" width="300"><?php echo $row_Results['PASSENGER_ID']; ?></td>
</tr>
<tr>
<td height="40" width="900"><strong><p>Passenger names:</p></strong></td>
<td height="40" width="300"><?php echo $row_Results['FIRST_NAME']; ?></td>
<td height="40" width="300"><?php echo $row_Results['LAST_NAME']; ?></td>
</tr>
<tr>
<td height="40" width="900"><strong><p>Traveling from:</p></strong>
</td>
<td height="40" width="600"><?php echo $row_Recordset2['TRAVELING_FROM']; ?></td>
</tr>
<tr>
<td height="40" width="900"><strong><p>Traveling to:</p></strong>
</td>
<td height="40" width="600"><?php echo $row_Recordset2['TRAVELING_TO']; ?></td>
</tr>
<tr>
<td height="40" width="900"><strong><p>Travel Date:</p></strong></td>
<td height="40" width="600"><?php echo $row_Recordset2['TRAVEL_DATE']; ?></td>
</tr>
<tr>
<td height="40" width="900"><strong><p>Return Date:</p></strong></td>
<td height="40" width="600"><?php echo $row_Recordset2['RETURN_DATE']; ?></td>
</tr>
<tr>
<td height="40" width="900"><strong><p>Travel Schedule:</p></strong></td>
<td height="40" width="900"><?php echo $row_Results['TRAVEL_SCHEDULE']; ?></td>
</tr>
<tr>
<td height="40" width="900"><strong><p>Seat Class:</p></strong></td>
<td height="40" width="600"><?php echo $row_Results['SEAT_CLASS']; ?></td>
</tr>
<tr>
<td height="40" width="900"><strong><p>Amount:</p></strong>
<td height="40" width="900"><strong><p>$:</p></strong>
<td height="40" width="600"><?php echo $row_Results['AMOUNT']; ?></td>
</tr>
<td height="40"><strong><p>This ticket will be valid from:</p></strong></td>
<td height="40" width="300"><?php echo $row_Results['DateCreated']; ?></td>
<td height="40" width="300"><strong><p>Up to</p></strong></td>
<td height="40" width="300"><strong><p>Depart time of the bus</p></strong></td>
<tr><td height="40" width="1000"><strong><p> You can check on the bus <a href="Bus Schedule.php">schedule page</a> to find the depart time of the bus</p></strong></td></tr>
<tr>
<td height="40" width="300"><strong><p>Thanks</p></strong></td>
</tr>
</tr>
</table>
</div>
</body>
</html>
<?php
mysql_free_result($Results);

mysql_free_result($Recordset2);
?>