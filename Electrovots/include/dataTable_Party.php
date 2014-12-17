<?php
include('connect_DB.php');
include('getYear.php');
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

<body>
	<div class="container">
		<section>
			<table id="example" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
                    	<th>Color</th>
						<th>PartyList Name</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>S.Y.</th>
                        <th>Edit</th>
					</tr>
				</thead>

				<tbody>
					<?php
						$query="SELECT * FROM tblpartylist where SY='$year'";
						$res=mysql_query($query) or die (mysql_error());
						while($r=mysql_fetch_array($res)){
							echo "<tr>";
							echo "<td><img src='".$r['Logo']."' height='30px'></td>"; 
							echo "<td>".$r['PLName']."</td>"; 
							echo "<td>".$r['PLNameAb']."</td>"; 
							echo "<td>".$r['Description']."</td>";
							echo "<td>".$r['SY']."</td>";
							echo "<td> <a class='dt' href='../pages/partylist_edit.php?plid=" .$r['PLID'] ."'><img src='../photo/dataTable/edit.png'></a> </td>";
							echo "</tr>";
						}
						
					?>
				</tbody>
			</table>
		</section>
	</div>
</body>
</html>