<?php
session_start();
include('../include/check_Login_Pages.php');
if(isset($_SESSION['sess_name'])){
	$name=$_SESSION['sess_name'];	
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>View Students</title>
<link rel="stylesheet" href="../css/notifications.min.css">
<link rel="shortcut icon" href="../favicon.png" type="image/x-png" />
<link href="../css/main.css" rel="stylesheet" type="text/css"/>
</head>

<script src="../javascript/jFlatStyle.min.js"></script>
<script src="../javascript/notifications.min.js"></script> 

<body>
	<?php include('../include/scroll.php'); ?>
	<div id="topcontainer">
    	<?php include('../include/menubar.php'); ?>
     
    </div> <!-- top container-->
    <section id="destination1"></section>
    <div id="bodycontainer">
  		<div id="studbodybar">
        	<div id="bodytext">VIEWING OF STUDENT</div>
        </div>  	
    	<div id="studbodyruler"></div>
    	<div id="bodycontent">
        
        	<br />      
        	<?php
			require('../include/dataTable_Stud.php');
			?>     
            <br />        
            <!-- body content-->
        </div>
   
    </div><!-- body container-->
  
  <script>
		<?php
		if(isset($_POST['increase']) || isset($_POST['decrease'])){
			echo"displayNotification('sStud', '$messageinfo', 2000);";
			echo"e.preventDefault();";
		}
		?>
        $('#showNothing').on('click', function(e) {
            displayNotification('unknown', 'This is an unknown notification', 2000);
            e.preventDefault();
        });
    </script>  
  
</body>
</html>
