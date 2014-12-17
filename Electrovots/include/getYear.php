<?php
	include('connect_DB.php');
	$year="none";
	$query="SELECT SY FROM tblyearselected";
	$res=mysql_query($query) or die (mysql_error());
	if($r=mysql_fetch_array($res)){
		$year=$r[0];
	}
?>