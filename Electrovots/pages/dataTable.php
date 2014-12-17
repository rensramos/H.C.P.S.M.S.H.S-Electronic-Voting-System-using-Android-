<?php
session_start();
include('../include/connect_DB.php');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="shortcut icon" type="image/ico" href="http://www.datatables.net/favicon.ico">
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

<body class="dt-example">
	<div class="container">
		<section>
			<table id="example" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>First Name</th>
						<th>Middle Initial</th>
						<th>Last Name</th>
						<th>UserName</th>
						<th>Password</th>
						<th>Year</th>
                        <th>Status</th>
                        <th></th>
					</tr>
				</thead>

				<tfoot>
					<tr>
						<th>First Name</th>
						<th>Middle Initial</th>
						<th>Last Name</th>
						<th>UserName</th>
						<th>Password</th>
						<th>Year</th>
                        <th>Status</th>
                        <th></th>
					</tr>
				</tfoot>

				<tbody>
					<?php
						$query="select * from tblvoters";
						$res=mysql_query($query) or die (mysql_error());
						while($r=mysql_fetch_array($res)){
							echo "<tr>";
							echo "<td>" .$r['FirstName'] ."</td>";
							echo "<td>" .$r['MidInitial'] ."</td>";
							echo "<td>" .$r['LastName'] ."</td>";
							echo "<td>" .$r['UserName'] ."</td>";
							echo "<td>" .$r['Password'] ."</td>";
							echo "<td>" .$r['Year'] ."</td>";
							echo "<td>" .$r['Status'] ."</td>";
							echo "<td> <a href='EditStud.php?id=" .$r['VID'] ."'><img src='../photo/dataTable/edit.png'></a> </td>";
							echo "</tr>";
						}
					?>
				</tbody>
			</table>
		</section>
	</div>
</body>
</html>