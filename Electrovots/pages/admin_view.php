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
<title>HCPSMSHS</title>
<link rel="shortcut icon" href="../favicon.png" type="image/x-png" />
<link href="../css/main.css" rel="stylesheet" type="text/css"/>
	
    <!-- Attach necessary scripts -->
    <script type="text/javascript" src="../javascript/jquery.min.js"></script>
    <!-- script for up scroll button -->
    <script>      
	$(document).ready(function(){

	// hide #back-top first
	$("#back-top").hide();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 200) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('#back-top a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 1500);
			return false;
			});
		});

	});
	</script>
     <!-- End of our CSS -->
    
</head>

<body>
	<div id="topcontainer">
    	<?php include('../include/menubar.php'); ?>
    </div> <!-- top container-->
    <section id="destination1"></section>
    <div id="bodycontainer">
  		<div id="adbodybar">
        	<div id="bodytext">VIEWING OF ADMIN</div>
        </div>  	
    	<div id="adbodyruler"></div>
    	<div id="bodycontent">
        
        	<br />      
        	<?php
			require('../include/dataTable_Admin.php');
			?>     
            <br />        
            <!-- body content-->
        </div>
   
    </div><!-- body container-->
            
    <p id="back-top">
    <a href="#top"><span></span></a>
	</p>
</body>
</html>
