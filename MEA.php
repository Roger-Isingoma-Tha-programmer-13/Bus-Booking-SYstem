<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_MEA = "localhost";
$database_MEA = "mash_db";
$username_MEA = "Grip";
$password_MEA = "";
$MEA = mysql_pconnect($hostname_MEA, $username_MEA, $password_MEA) or trigger_error(mysql_error(),E_USER_ERROR); 
?>