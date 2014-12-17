 
<form action="../pages/testSaveImage.php" enctype="multipart/form-data" method="post">

<table style="border-collapse: collapse; font: 12px Tahoma;" border="1" cellspacing="5" cellpadding="5">
<tbody><tr>
<td>
<input name="uploadedimage" type="file">
</td>

</tr>

<tr>
<td>
<input name="Upload Now" type="submit" value="Upload Image">
</td>
</tr>
	<?php
	include('../include/connect_DB.php');
 	$query="Select Photo from tblcandidate";
	$res=mysql_query($query) or die(mysql_error());
	while($r=mysql_fetch_array($res)){
		echo "<img src='".$r['Photo']."'>";
	}
	?>

</tbody></table>

</form>