<?php
session_start();
include('include/connect_DB.php');
include('include/check_Login.php');
if(isset($_SESSION['sess_AID'])){
	$messsage=1;
	header('location: pages/main.php');
	
}
//session_destroy();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>HCPSMSHS</title>
<link rel="shortcut icon" href="favicon.png" type="image/x-png" />
<link href="css/index.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="css/notifications.min.css">
</head>

<body bgcolor="#21ceb0">
<div id="whitehati">
    <div id="container">
        <div id="logo"></div>
        <div id="text"></div>
        <div id="button">
        <form method="POST" action="#">
            <table width="300" height="100" border="0">
                <tr>
                    <td colspan="2"><input type="text" name="uname" placeholder="Username" class="log"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="password" name="pwd" placeholder="Password" class="log"></td>
                </tr>
                <tr>
                	<td colspan="2">&nbsp;</td>
                </tr>
                <tr>
                    <td><input type="image" img="" src="photo/button.png" name="login" value="Login"></td>
                    <td><input type="image" img="" src="photo/reset.png" name="reset" value="reset"> </td>
                </tr>
            </table>
        </form>
        </div>
    </div>
</div>

    <script src="javascript/jFlatStyle.min.js"></script>
	<script src="javascript/notifications.min.js"></script> 
    <script>
		<?php
		$message=0;
		if(!empty($_POST)){
			if($message==0){
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
