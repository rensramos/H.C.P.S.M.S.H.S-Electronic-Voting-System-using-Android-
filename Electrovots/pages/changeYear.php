<?php
session_start();
include('../include/connect_DB.php');
include('../include/check_Login_Pages.php');
if(isset($_SESSION['sess_name'])){
	$name=$_SESSION['sess_name'];
	
}
?>
<?php
	$message = 0;
	$messageinfo = "..Failed";
	if(isset($_POST['changesave'])){
		$yr = mysql_real_escape_string(stripslashes($_POST['year']));
		$query="UPDATE tblyearselected SET SY = '$yr' where YID = 1 ";
		$res=mysql_query($query) or die (mysql_error());
		if($res){
			$message = 1;
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Year</title>
<link rel="shortcut icon" href="../favicon.png" type="image/x-png" />
<link href="../css/main.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="../css/notifications.min.css">
</head>

<body>
	<div id="topcontainer">
    	<?php include('../include/menubar.php'); ?>
    </div> <!-- top container-->
    
    <div id="bodycontainer">
    	<div id="adbodybar">
        	<div id="bodytext">CHANGE SCHOOL YEAR</div>
        </div>  	
    		<div id="adbodyruler"></div>
    	<div id="bodycontent">

        	<?php include('../include/edit_Year.php'); ?>
            <div id="ssglogochangeyear"></div>
           		
    	</div><!-- body content-->
    </div><!-- body container-->
    
    <script src="../javascript/jFlatStyle.min.js"></script>
	<script src="../javascript/notifications.min.js"></script> 
    <script>
		<?php
		if(!empty($_POST)){
			if($message==1){
				echo"displayNotification('sAdmin', 'Year Changed!', 2000);";
				echo"e.preventDefault();";
			}
			else{
				echo"displayNotification('fAll', '$messageinfo', 2000);";
				echo"e.preventDefault();";
			}
		}
		?>
        $('#showNothing').on('click', function(e) {
            displayNotification('unknown', 'This is an unknown notification', 2000);
            e.preventDefault();
        });
    </script>  
    
</body>
</html>