<?php

/*
Our "config.inc.php" file connects to database every time we include or require
it within a php script.  Since we want this script to add a new user to our db,
we will be talking with our database, and therefore,
let's require the connection to happen:
*/
require("dbConfig.php");
include("getYear.php");
	
if (!empty($_POST)) {
	//initial query
	if($_POST["gradeyear"] == 7){
		$query = "Select *,
				(SELECT PositionName FROM tblposition p WHERE c.PositionID=p.PID) PositionName,
				(SELECT PLNameAb FROM tblpartylist pl WHERE c.PartyListID=pl.PLID) PartyListName
				FROM tblcandidate c where PositionID=7 and SY='$year'";
	}
	else if($_POST["gradeyear"] == 8){
		$query = "Select *,
			(SELECT PositionName FROM tblposition p WHERE c.PositionID=p.PID) PositionName,
			(SELECT PLNameAb FROM tblpartylist pl WHERE c.PartyListID=pl.PLID) PartyListName
			FROM tblcandidate c where PositionID=8 and SY='$year'";
	}
	else if($_POST["gradeyear"] == 9){
		$query = "Select *,
			(SELECT PositionName FROM tblposition p WHERE c.PositionID=p.PID) PositionName,
			(SELECT PLNameAb FROM tblpartylist pl WHERE c.PartyListID=pl.PLID) PartyListName
			FROM tblcandidate c where PositionID=9 and SY='$year'";
	}
	
	
	
	$query_params = array();
	//execute query
	try {
		$stmt   = $db->prepare($query); 
		$result = $stmt->execute($query_params);
	}
	catch (PDOException $ex) {
		$response["success"] = 0;
		$response["message"] = "Database Error!";
		die(json_encode($response));
	}
	
	// Finally, we can retrieve all of the found rows into an array using fetchAll 
	$rows = $stmt->fetchAll();
	
	
	if ($rows) {
		$response["success"] = 1;
		$response["candidates"]   = array();
		
		foreach ($rows as $row) {
			$post             		= array();
			$post["candidate_id"]  	= $row["CID"];
			$post["name"] 	 		= $row["FirstName"]." ".$row["MidInitial"]." ".$row["LastName"];
			$post["position"]		= $row["PositionName"];
			$post["party_list"]		= $row["PartyListName"];
			$post["photo"] 			= str_replace(array('\\','..'),'',$row['Photo']);
			
			
			//update our repsonse JSON data
			array_push($response["candidates"], $post);
		}
		
		// echoing JSON response
		echo json_encode($response);
		
		
	} else {
		$response["success"] = 0;
		die(json_encode($response));
	}

} else {
?>
		<h1>Grade_Rep</h1> 
		<form action="grade_rep.php" method="post"> 
		    GradeYear:<br /> 
		    <input type="text" name="gradeyear" placeholder="grade year" value="" /> 
		    <br /><br /> 
		    <input type="submit" value="Submit" /> 
		</form> 
	<?php
}

?> 

