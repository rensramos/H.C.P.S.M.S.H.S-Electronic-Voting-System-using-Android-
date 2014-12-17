<?php
include('connect_DB.php');

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">

	<title>DataTables example - HTML (DOM) sourced data</title>
	<link rel="stylesheet" type="text/css" href="../css/dataTable/jquery.dataTables.css">
	<!--<link rel="stylesheet" type="text/css" href="../css/dataTable/shCore.css">-->
	<link rel="stylesheet" type="text/css" href="../css/dataTable/demo.css">
	<style type="text/css" class="init">

	</style>
	<script type="text/javascript" language="javascript" src="../javascript/dataTable/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="../javascript/dataTable/jquery.dataTables.js"></script>
	<!--<script type="text/javascript" language="javascript" src="../javascript/dataTable/shCore.js"></script>-->
	<!--<script type="text/javascript" language="javascript" src="../javascript/dataTable/demo.js"></script>-->
	<script type="text/javascript" language="javascript" class="init">


$(document).ready(function() {
	$('#example').dataTable();
} );


	</script>
</head>

<body class="dt">
	<div class="container">
		<section>
			<table id="example" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>Name</th>
						<th>User Name</th>
						<th>Password</th>
						<th>S.Y.</th>
                        <th>Status</th>
                        <th>Edit</th>
					</tr>
				</thead>

				<tbody>
					<?php
						$query="SELECT * FROM tbladmin WHERE SY<>'0000-0000'";
						$res=mysql_query($query) or die (mysql_error());
						$aid = $_SESSION['sess_AID'];
						while($r=mysql_fetch_array($res)){
							echo "<tr>";
							echo "<td>" .$r['Name'] ."</td>";
							echo "<td>" .$r['UserName'] ."</td>";
							echo "<td>" .$r['Password'] ."</td>";
							echo "<td>" .$r['SY'] ."</td>";
							if($r['Status']==0){
								$stat="Inactive";
							}
							else{
								$stat="Active";
							}
							echo "<td>" .$stat ."</td>";
							///////////////////////////////////////////////////////////////////
							if($r['AID']==$aid){
							echo "<td> <a class='dt' href='admin_edit.php?aid=" .$r['AID'] ."'><img src='../photo/dataTable/edit.png'></a> </td>";
							}
							else{
								echo"<td></td>";
							}
							echo "</tr>";
						}
					?>
				</tbody>
			</table>
		</section>
	</div>
</body>
</html>