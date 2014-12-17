<?php
$host="localhost";
$user="root";
$pwd="";
$db="dbelection";

$con=mysql_connect($host,$user,$pwd,$db) or die (mysql_error()."&nbsp;&nbsp;<h1><center>Sorry, You Are Not Connected to Database</center></h1>");

mysql_select_db($db ) or die (mysql_error()."&nbsp;&nbsp;<h1><center>Sorry, Cannot Select the Database</center></h1>");
?>