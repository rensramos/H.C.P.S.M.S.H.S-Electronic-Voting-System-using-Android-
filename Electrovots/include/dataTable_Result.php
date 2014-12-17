<?php
include('connect_DB.php');
include('getYear.php');
?>

<?php
	$pwin = array(0);
	$vpwin = array(0);
	$swin = array(0);
	$twin = array(0);
	$awin = array(0);
	$piowin = array(0);
	$powin = array(0);
	$g8win = array(0);
	$g9win = array(0);
	$g0win = array(0);

	$pquery="SELECT v1.candidateid,count(v1.candidateid) 
			FROM tblvotes v1 
			INNER JOIN tblcandidate c1 
			ON c1.CID = v1.CandidateID 
			AND c1.PositionID=0
			AND c1.SY='$year' 
			GROUP BY v1.candidateid 
			HAVING count(v1.candidateid) = 
					(SELECT MAX(remarks)
					FROM (SELECT v.candidateid candi, count(v.candidateid) remarks 
							FROM tblcandidate c 
							INNER JOIN tblvotes v 
							ON c.CID = v.CandidateID 
							AND c.PositionID=0
							AND c.SY='$year' 
							GROUP BY candidateid) tblres)";
	$pres=mysql_query($pquery) or die (mysql_error());
	while($r=mysql_fetch_array($pres)){
			array_push($pwin,$r[0]);
	}
	
	$vpquery="SELECT v1.candidateid,count(v1.candidateid) 
			FROM tblvotes v1 
			INNER JOIN tblcandidate c1 
			ON c1.CID = v1.CandidateID 
			AND c1.PositionID=1
			AND c1.SY='$year' 
			GROUP BY v1.candidateid 
			HAVING count(v1.candidateid) = 
					(SELECT MAX(remarks)
					FROM (SELECT v.candidateid candi, count(v.candidateid) remarks 
							FROM tblcandidate c 
							INNER JOIN tblvotes v 
							ON c.CID = v.CandidateID 
							AND c.PositionID=1
							AND c.SY='$year' 
							GROUP BY candidateid) tblres)";
	$vpres=mysql_query($vpquery) or die (mysql_error());
	while($r=mysql_fetch_array($vpres)){
			array_push($vpwin,$r[0]);
	}
	
	$squery="SELECT v1.candidateid,count(v1.candidateid) 
			FROM tblvotes v1 
			INNER JOIN tblcandidate c1 
			ON c1.CID = v1.CandidateID 
			AND c1.PositionID=2
			AND c1.SY='$year' 
			GROUP BY v1.candidateid 
			HAVING count(v1.candidateid) = 
					(SELECT MAX(remarks)
					FROM (SELECT v.candidateid candi, count(v.candidateid) remarks 
							FROM tblcandidate c 
							INNER JOIN tblvotes v 
							ON c.CID = v.CandidateID 
							AND c.PositionID=2
							AND c.SY='$year' 
							GROUP BY candidateid) tblres)";
	$sres=mysql_query($squery) or die (mysql_error());
	while($r=mysql_fetch_array($sres)){
			array_push($swin,$r[0]);
	}
	
	$tquery="SELECT v1.candidateid,count(v1.candidateid) 
			FROM tblvotes v1 
			INNER JOIN tblcandidate c1 
			ON c1.CID = v1.CandidateID 
			AND c1.PositionID=3
			AND c1.SY='$year' 
			GROUP BY v1.candidateid 
			HAVING count(v1.candidateid) = 
					(SELECT MAX(remarks)
					FROM (SELECT v.candidateid candi, count(v.candidateid) remarks 
							FROM tblcandidate c 
							INNER JOIN tblvotes v 
							ON c.CID = v.CandidateID 
							AND c.PositionID=3
							AND c.SY='$year' 
							GROUP BY candidateid) tblres)";
	$tres=mysql_query($tquery) or die (mysql_error());
	while($r=mysql_fetch_array($tres)){
			array_push($twin,$r[0]);
	}
	
	$aquery="SELECT v1.candidateid,count(v1.candidateid) 
			FROM tblvotes v1 
			INNER JOIN tblcandidate c1 
			ON c1.CID = v1.CandidateID 
			AND c1.PositionID=4
			AND c1.SY='$year' 
			GROUP BY v1.candidateid 
			HAVING count(v1.candidateid) = 
					(SELECT MAX(remarks)
					FROM (SELECT v.candidateid candi, count(v.candidateid) remarks 
							FROM tblcandidate c 
							INNER JOIN tblvotes v 
							ON c.CID = v.CandidateID 
							AND c.PositionID=4
							AND c.SY='$year' 
							GROUP BY candidateid) tblres)";
	$ares=mysql_query($aquery) or die (mysql_error());
	while($r=mysql_fetch_array($ares)){
			array_push($awin,$r[0]);
	}
	
	$pioquery="SELECT v1.candidateid,count(v1.candidateid) 
			FROM tblvotes v1 
			INNER JOIN tblcandidate c1 
			ON c1.CID = v1.CandidateID 
			AND c1.PositionID=5
			AND c1.SY='$year' 
			GROUP BY v1.candidateid 
			HAVING count(v1.candidateid) = 
					(SELECT MAX(remarks)
					FROM (SELECT v.candidateid candi, count(v.candidateid) remarks 
							FROM tblcandidate c 
							INNER JOIN tblvotes v 
							ON c.CID = v.CandidateID 
							AND c.PositionID=5
							AND c.SY='$year' 
							GROUP BY candidateid) tblres)";
	$piores=mysql_query($pioquery) or die (mysql_error());
	while($r=mysql_fetch_array($piores)){
			array_push($piowin,$r[0]);
	}
	
	$poquery="SELECT v1.candidateid,count(v1.candidateid) 
			FROM tblvotes v1 
			INNER JOIN tblcandidate c1 
			ON c1.CID = v1.CandidateID 
			AND c1.PositionID=6
			AND c1.SY='$year' 
			GROUP BY v1.candidateid 
			HAVING count(v1.candidateid) = 
					(SELECT MAX(remarks)
					FROM (SELECT v.candidateid candi, count(v.candidateid) remarks 
							FROM tblcandidate c 
							INNER JOIN tblvotes v 
							ON c.CID = v.CandidateID 
							AND c.PositionID=6
							AND c.SY='$year' 
							GROUP BY candidateid) tblres)";
	$pores=mysql_query($poquery) or die (mysql_error());
	while($r=mysql_fetch_array($pores)){
			array_push($powin,$r[0]);
	}
	
	$g8query="SELECT v1.candidateid,count(v1.candidateid) 
			FROM tblvotes v1 
			INNER JOIN tblcandidate c1 
			ON c1.CID = v1.CandidateID 
			AND c1.PositionID=7
			AND c1.SY='$year' 
			GROUP BY v1.candidateid 
			HAVING count(v1.candidateid) = 
					(SELECT MAX(remarks)
					FROM (SELECT v.candidateid candi, count(v.candidateid) remarks 
							FROM tblcandidate c 
							INNER JOIN tblvotes v 
							ON c.CID = v.CandidateID 
							AND c.PositionID=7
							AND c.SY='$year' 
							GROUP BY candidateid) tblres)";
	$g8res=mysql_query($g8query) or die (mysql_error());
	while($r=mysql_fetch_array($g8res)){
			array_push($g8win,$r[0]);
	}
	
	$g9query="SELECT v1.candidateid,count(v1.candidateid) 
			FROM tblvotes v1 
			INNER JOIN tblcandidate c1 
			ON c1.CID = v1.CandidateID 
			AND c1.PositionID=8
			AND c1.SY='$year' 
			GROUP BY v1.candidateid 
			HAVING count(v1.candidateid) = 
					(SELECT MAX(remarks)
					FROM (SELECT v.candidateid candi, count(v.candidateid) remarks 
							FROM tblcandidate c 
							INNER JOIN tblvotes v 
							ON c.CID = v.CandidateID 
							AND c.PositionID=8
							AND c.SY='$year' 
							GROUP BY candidateid) tblres)";
	$g9res=mysql_query($g9query) or die (mysql_error());
	while($r=mysql_fetch_array($g9res)){
			array_push($g9win,$r[0]);
	}
	
	$g0query="SELECT v1.candidateid,count(v1.candidateid) 
			FROM tblvotes v1 
			INNER JOIN tblcandidate c1 
			ON c1.CID = v1.CandidateID 
			AND c1.PositionID=9
			AND c1.SY='$year' 
			GROUP BY v1.candidateid 
			HAVING count(v1.candidateid) = 
					(SELECT MAX(remarks)
					FROM (SELECT v.candidateid candi, count(v.candidateid) remarks 
							FROM tblcandidate c 
							INNER JOIN tblvotes v 
							ON c.CID = v.CandidateID 
							AND c.PositionID=9
							AND c.SY='$year' 
							GROUP BY candidateid) tblres)";
	$g0res=mysql_query($g0query) or die (mysql_error());
	while($r=mysql_fetch_array($g0res)){
			array_push($g0win,$r[0]);
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
	$('#example').dataTable({
	"bSort":false,
	"order":[[0,"desc"]],
	"bPaginate":true,
	"pageLength": 50
	});
});


	</script>
</head>

<body>
	<div class="container">
		<section>
			<table id="example" class="display" cellspacing="0" width="100%">
				<thead>
					<tr>
						<th>First Name</th>
                        <th>Middle Initial</th>
                        <th>Last Name</th>
						<th>Position</th>
						<th>Party List</th>
						<th>Number of Votes</th>
                        <th>Remarks</th>
					</tr>
				</thead>

				<tbody>
					<?php
						$query="SELECT c.CID,
								c.FirstName,
								c.MidInitial,
								c.LastName ,
								(SELECT PositionName FROM tblposition p WHERE c.PositionID=p.PID),
								(SELECT PLNameAb FROM tblpartylist pl WHERE c.PartyListID=pl.PLID), 
								COUNT(c.FirstName) count,
								c.PartylistID
							    FROM tblcandidate c
							    INNER JOIN tblvotes r ON c.CID = r.CandidateID
								AND c.SY='$year'
							    GROUP BY c.FirstName
							    ORDER BY c.PositionID ASC,COUNT(c.FirstName) DESC";
						$res=mysql_query($query) or die (mysql_error());
						while($r=mysql_fetch_array($res)){
							echo "<tr>";
							echo "<td>".$r[1]."</td>"; 
							echo "<td>".$r[2]."</td>"; 
							echo "<td>".$r[3]."</td>"; 
							echo "<td>".$r[4]."</td>"; // Position
							if($r[7]==0){
								$pl = "--No Partylist--";
							}
							else{
								$pl = $r[5];
							}
							echo "<td>".$pl."</td>"; //Party List
							echo "<td>".$r[6]."</td>"; //Number of Votes
							$remark=" ";
							/*if($pwin==$r[0] ||
								$vpwin==$r[0] ||
								$swin==$r[0] ||
								$twin==$r[0] ||
								$awin==$r[0] ||
								$piowin==$r[0] ||
								$powin==$r[0] ||
								$g8win==$r[0] ||
								$g9win==$r[0] ||
								$g0win==$r[0]){
								$remark="Winner";
							}*/
							foreach($pwin as $v){
								if($v==$r[0]){
									if(count($pwin)<=2){
										$remark="<mark class='win'>Winner</mark>";
									}
									else{
										$remark="<mark class='draw'>Draw</mark>";
									}
								}
							}
							foreach($vpwin as $v){
								if($v==$r[0]){
									if(count($vpwin)<=2){
										$remark="<mark class='win'>Winner</mark>";
									}
									else{
										$remark="<mark class='draw'>Draw</mark>";
									}
								}
							}
							foreach($swin as $v){
								if($v==$r[0]){
									if(count($swin)<=2){
										$remark="<mark class='win'>Winner</mark>";
									}
									else{
										$remark="<mark class='draw'>Draw</mark>";
									}
								}
							}
							foreach($twin as $v){
								if($v==$r[0]){
									if(count($twin)<=2){
										$remark="<mark class='win'>Winner</mark>";
									}
									else{
										$remark="<mark class='draw'>Draw</mark>";
									}
								}
							}
							foreach($awin as $v){
								if($v==$r[0]){
									if(count($awin)<=2){
										$remark="<mark class='win'>Winner</mark>";
									}
									else{
										$remark="<mark class='draw'>Draw</mark>";
									}
								}
							}
							foreach($piowin as $v){
								if($v==$r[0]){
									if(count($piowin)<=2){
										$remark="<mark class='win'>Winner</mark>";
									}
									else{
										$remark="<mark class='draw'>Draw</mark>";
									}
								}
							}
							foreach($powin as $v){
								if($v==$r[0]){
									if(count($powin)<=2){
										$remark="<mark class='win'>Winner</mark>";
									}
									else{
										$remark="<mark class='draw'>Draw</mark>";
									}
								}
							}
							foreach($g8win as $v){
								if($v==$r[0]){
									if(count($g8win)<=2){
										$remark="<mark class='win'>Winner</mark>";
									}
									else{
										$remark="<mark class='draw'>Draw</mark>";
									}
								}
							}
							foreach($g9win as $v){
								if($v==$r[0]){
									if(count($g9win)<=2){
										$remark="<mark class='win'>Winner</mark>";
									}
									else{
										$remark="<mark class='draw'>Draw</mark>";
									}
								}
							}
							foreach($g0win as $v){
								if($v==$r[0]){
									if(count($g0win)<=2){
										$remark="<mark class='win'>Winner</mark>";
									}
									else{
										$remark="<mark class='draw'>Draw</mark>";
									}
								}
							}
							echo "<td>".$remark."</td>"; //rank
							echo "</tr>";
						}
						
						/*select v1.candidateid,count(v1.candidateid) 
						from tblvotes v1 
						group by v1.candidateid 
						having count(v1.candidateid)= 
								select max(remarks) 
								from (select v.candidateid candi, count(v.candidateid) remarks 
									  FROM tblcandidate c 
									  NNER JOIN tblvotes v 
									  ON c.CID = v.CandidateID 
									  AND c.PositionID=1 
									  AND c.SY='2014-2015' 
									  group by candidateid) tblres)
						AND*/
						
					?>
				</tbody>
			</table>
		</section>
	</div>
</body>
</html>