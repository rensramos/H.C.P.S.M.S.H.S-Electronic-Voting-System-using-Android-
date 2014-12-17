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
<title>Add Student</title>
<link rel="shortcut icon" href="../favicon.png" type="image/x-png" />
<link href="../css/main.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="../css/notifications.min.css">
</head>

<body>
	<div id="topcontainer">
    	<?php include('../include/menubar.php'); ?>
    </div> <!-- top container-->
    
    <div id="bodycontainer">
  		<div id="studbodybar">
        	<div id="bodytext">REGISTRATION OF STUDENT</div>
        </div>  	
    	<div id="studbodyruler"></div>
        <div id="bodycontent">
			<?php include('../include/add_Stud.php'); ?>
            <div id="ssglogostudent"></div>
            
        </div><!-- body content-->
    </div><!-- body container-->
    
    <script src="../javascript/jFlatStyle.min.js"></script>
	<script src="../javascript/notifications.min.js"></script> 
    <script>
		<?php
		if(!empty($_POST)){
			if($message==1){
				echo"displayNotification('sStud', 'Successfully registered!', 2000);";
				echo"e.preventDefault();";
			}
			else{
				echo"";
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
