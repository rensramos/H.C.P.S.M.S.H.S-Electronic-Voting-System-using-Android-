<?php
include('connect_DB.php');
?>

<?php
	if(isset($_POST['increase'])){
		$query="UPDATE tblvoter SET GradeYear=GradeYear+1";
		$res=mysql_query($query) or die (mysql_error());
		if($res){
			$messageinfo = "1 Year Added";
		}
	}
	
	if(isset($_POST['decrease'])){
		$query="UPDATE tblvoter SET GradeYear=GradeYear-1";
		$res=mysql_query($query) or die (mysql_error());
		if($res){
			$messageinfo = "1 Year Deducted";
		}
	}
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
                    <div id="buttoncontainer">
                        <form method="post" action="../pages/student_view.php">
                        <input id="buttonadd" type="image" value="increase" name="increase" title="Add 1 Year"/>
                        <input id="buttondec" type="image" value="decrease" name="decrease" title="Deduc 1 Year"/>
                        </form>
                    </div>
					<tr>
                   		
						<th>First Name</th>
						<th>Middle Initial</th>
						<th>Last Name</th>
						<th>UserID</th>
						<th>Password</th>
						<th>Year</th>
                        <th>Status</th>
                        <th>Edit</th>
					</tr>
				</thead>

				<tbody>
					<?php
						$query="SELECT *
								 FROM tblvoter";
						$res=mysql_query($query) or die (mysql_error());
						while($r=mysql_fetch_array($res)){
							echo "<tr>";
							echo "<td>" .$r['FirstName'] ."</td>";
							echo "<td>" .$r['MidInitial'] ."</td>";
							echo "<td>" .$r['LastName'] ."</td>";
							echo "<td>" .$r['UserName'] ."</td>";
							//echo "<td style='text-transform:password'>" .$r['Password'] ."</td>";
							//echo "<td>" .$r['Password'] ."-".md5($r['Password']) ."</td>";
							echo "<td>" .$r['Password'] ."</td>";
							if($r['GradeYear']>10){
								$grade = "-----";
							}
							else{
								$grade = "Grade".$r['GradeYear'];
							}
							echo "<td>" .$grade."</td>";
							$Status="Not Done";
							if($r['Status']==1){
								$Status="Done";
							}
							echo "<td>$Status</td>";
							///////////////////////////////////////////////////////////////////
							echo "<td> <a class='dt' href='../pages/student_edit.php?vid=" .$r['VID'] ."'><img src='../photo/dataTable/edit.png'></a> </td>";
							echo "</tr>";
						}
					?>
				</tbody>
			</table>
		</section>
	</div>
</body>
</html>