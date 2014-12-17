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
	<link rel="stylesheet" type="text/css" href="../css/dataTable/demo.css">
	<style type="text/css" class="init">
	</style>
    
	<script type="text/javascript" language="javascript" src="../javascript/dataTable/jquery.js"></script>
	<script type="text/javascript" language="javascript" src="../javascript/dataTable/jquery.dataTables.js"></script>
	<script type="text/javascript" language="javascript" class="init">

	$(document).ready(function() {
		$('#example').dataTable({
			"pageLength": 50
		});
	} );
	</script>
</head>

<body>
	<div class="container">
		<section>
			<table id="example" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
                    	<th>Photo</th>
						<th>First Name</th>
						<th>Middle Initial</th>
						<th>Last Name</th>
						<th>Position</th>
						<th>Party List</th>
                        <th>S.Y.</th>
                        <th>Edit</th>
					</tr>
				</thead>

				<tbody>
					<?php
						$query="SELECT CID, 
								c.Photo,
								c.FirstName,
								c.MidInitial,
								c.LastName,
								(SELECT PositionName FROM tblposition p WHERE c.PositionID=p.PID),
								(SELECT PLNameAb FROM tblpartylist pl WHERE c.PartyListID=pl.PLID),
								c.PartyListID,
								c.SY
								FROM tblcandidate c where SY='$year'
								ORDER BY c.PartyListID ";
						$res=mysql_query($query) or die (mysql_error());
						$photo="../photo/Candidates/Unknown.jpg";
						while($r=mysql_fetch_array($res)){
							echo "<tr>";
							//echo "<a class='group1' href='".$r[1]."' title='hi'>Grouped Photo 1</a>";
							echo "<td><a href='?id=$r[1]#modal-show' title='hi' >
									<img src='".$r[1]."' height='30px' title='hi'></a></td>";
							echo "<td>".$r[2]."</td>";
							echo "<td>".$r[3]."</td>";
							echo "<td>".$r[4]."</td>";
							echo "<td>".$r[5]."</td>";
							if($r[7]==0){
								$pl = "--No Partylist--";
							}
							else{
								$pl = $r[6];
							}
							echo "<td>".$pl."</td>";
							echo "<td>".$r[8]."</td>";
							echo "<td> <a class='dt' href='../pages/candidate_edit.php?cid=" .$r['CID'] ."'><img src='../photo/dataTable/edit.png'></a> </td>";
							echo "</tr>";
						}
					?>
				</tbody>
			</table>
		</section>
	</div>
</body>
</html>