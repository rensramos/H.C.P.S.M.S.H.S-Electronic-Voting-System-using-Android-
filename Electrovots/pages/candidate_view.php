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
<title>View Candidates</title>
<link rel="shortcut icon" href="../favicon.png" type="image/x-png" />
<link href="../css/main.css" rel="stylesheet" type="text/css"/>
</head>

		
<body>
	<?php include('../include/scroll.php'); ?>
	<div id="topcontainer">
    	<?php include('../include/menubar.php'); ?>
        
    </div> <!-- top container-->
  	<section id="destination1"></section>
    <div id="bodycontainer">
   	    <div id="canbodybar">
        	<div id="bodytext">VIEWING OF CANDIDATE</div>
        </div> 	
    		<div id="canbodyruler"></div>
    	<div id="bodycontent">
        <br />
        	<?php include('../include/dataTable_Candi.php'); ?>
            <br />
          	
     	</div><!-- body content-->
    </div><!-- body container-->
    <?php include('../include/view_Image.php'); ?>
  

</body>
</html>
