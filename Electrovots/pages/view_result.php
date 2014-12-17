<?php
session_start();
include('../include/check_Login_Pages.php');
if(isset($_SESSION['sess_name'])){
	$name=$_SESSION['sess_name'];
	
}
$page = $_SERVER['PHP_SELF'];
$sec = "60";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="refresh" content="<?php echo $sec?>; URL='<?php echo $page?>'; charset=utf-8"/>
<title>View Result</title>
<link rel="shortcut icon" href="../favicon.png" type="image/x-png" />
<link href="../css/main.css" rel="stylesheet" type="text/css"/>	
</head>

<?php //include('../include/barGraph_G8R.php'); ?>

<body>
	<?php include('../include/scroll.php'); ?>
	<div id="topcontainer">
    	<?php include('../include/menubar.php'); ?>
    </div> <!-- top container-->
    
    <div id="bodycontainer">
    <div id="viewbodybar">
        	<div id="bodytext">VIEWING OF RESULT</div>
        </div>  	
    		<div id="viewbodyruler"></div>
    	<div id="bodycontent">
			<br/>
        	<center>
            <table width="100%">
            	<tr>
                	<td colspan="2"><?php include('../include/dataTable_Result.php'); ?></td>
                </tr>
                <tr>
                	<td colspan="2" height="100px"></td>
                </tr>
                <tr>
                	<td align="center"><h1>President</h1><img src="../include/barGraph_Pres.php"></td>
                	<td align="center"><h1>Vice-President</h1><img src="../include/barGraph_ViceP.php"></td>
                </tr>
                <tr>
                	<td colspan="2" height="100px"></td>
                </tr>
                <tr>
                	<td align="center"><h1>Secretary</h1><img src="../include/barGraph_Sec.php"></td>
                	<td align="center"><h1>Treasurer</h1><img src="../include/barGraph_Tre.php"></td>
                </tr>
                <tr>
                	<td colspan="2" height="100px"></td>
                </tr>
                <tr>
                	<td align="center"><h1>Auditor</h1><img src="../include/barGraph_Auditor.php"></td>
                	<td align="center"><h1>PIO</h1><img src="../include/barGraph_PIO.php"></td>
                </tr>
                <tr>
                	<td colspan="2" height="100px"></td>
                </tr>
                <tr>
                	<td align="center"><h1>Peace Officer</h1><img src="../include/barGraph_Peace.php"></td>
                	<td align="center"><h1>Grade 8 Representative</h1><img src="../include/barGraph_G8R.php"></td>
                </tr>
                <tr>
                	<td colspan="2" height="100px"></td>
                </tr>
                <tr>
                	<td align="center"><h1>Grade 9 Representative</h1><img src="../include/barGraph_G9R.php"></td>
                	<td align="center"><h1>Grade 10 Representative</h1><img src="../include/barGraph_g10R.php"></td>
                </tr>
            </table>
    	</div><!-- body content-->
    </div><!-- body container-->
  
</body>
</html>
