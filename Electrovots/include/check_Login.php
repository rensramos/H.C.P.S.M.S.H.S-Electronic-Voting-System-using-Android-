<?php
if(isset($_POST['login'])){
$messageinfo = "..Failed!";
	
$uname = mysql_real_escape_string(stripslashes($_POST['uname']));
$pwd = md5(mysql_real_escape_string(stripslashes($_POST['pwd'])));
$query="SELECT * FROM tbladmin WHERE username='$uname' AND password='$pwd' AND status=1";
$res=mysql_query($query) or die (mysql_error());
	if(mysql_num_rows($res)==1){
		while($r1=mysql_fetch_array($res)){
			$name=$r1['Name'];
			$AID=$r1['AID'];
			$pwd=$r1['Password'];
		}
	$_SESSION['sess_AID']=$AID;
	$_SESSION['sess_name']=$name;
	$_SESSION['sess_pwd']=$pwd;
	}
	else{
		session_destroy();
		$messageinfo = "Invalid username/password!";
	}
}
?>