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
		$query = "SELECT *,
				  (SELECT CID from tblcandidate c where c.PositionID=0 and c.PartyListID=pl.PLID) p_id, 
				  (SELECT CID from tblcandidate c where c.PositionID=1 and c.PartyListID=pl.PLID) vp_id, 
				  (SELECT CID from tblcandidate c where c.PositionID=2 and c.PartyListID=pl.PLID) s_id, 
				  (SELECT CID from tblcandidate c where c.PositionID=3 and c.PartyListID=pl.PLID) t_id, 
				  (SELECT CID from tblcandidate c where c.PositionID=4 and c.PartyListID=pl.PLID) a_id, 
				  (SELECT CID from tblcandidate c where c.PositionID=5 and c.PartyListID=pl.PLID) pio_id, 
				  (SELECT CID from tblcandidate c where c.PositionID=6 and c.PartyListID=pl.PLID) po_id, 
				  (SELECT CID from tblcandidate c where c.PositionID=7 and c.PartyListID=pl.PLID) gr_id, 
				  (SELECT CONCAT(FirstName,' ',MidInitial,' ',LastName) from tblcandidate c where c.PositionID=0 and c.PartyListID=pl.PLID) p_name,
				  (SELECT CONCAT(FirstName,' ',MidInitial,' ',LastName) from tblcandidate c where c.PositionID=1 and c.PartyListID=pl.PLID) vp_name,
				  (SELECT CONCAT(FirstName,' ',MidInitial,' ',LastName) from tblcandidate c where c.PositionID=2 and c.PartyListID=pl.PLID) s_name,
				  (SELECT CONCAT(FirstName,' ',MidInitial,' ',LastName) from tblcandidate c where c.PositionID=3 and c.PartyListID=pl.PLID) t_name,
				  (SELECT CONCAT(FirstName,' ',MidInitial,' ',LastName) from tblcandidate c where c.PositionID=4 and c.PartyListID=pl.PLID) a_name,
				  (SELECT CONCAT(FirstName,' ',MidInitial,' ',LastName) from tblcandidate c where c.PositionID=5 and c.PartyListID=pl.PLID) pio_name,
				  (SELECT CONCAT(FirstName,' ',MidInitial,' ',LastName) from tblcandidate c where c.PositionID=6 and c.PartyListID=pl.PLID) po_name,
				  (SELECT CONCAT(FirstName,' ',MidInitial,' ',LastName) from tblcandidate c where c.PositionID=7 and c.PartyListID=pl.PLID) gr_name
				  FROM tblpartylist pl";
	}
	else if($_POST["gradeyear"] == 8){
		$query = "SELECT *,
				  (SELECT CID from tblcandidate c where c.PositionID=0 and c.PartyListID=pl.PLID) p_id, 
				  (SELECT CID from tblcandidate c where c.PositionID=1 and c.PartyListID=pl.PLID) vp_id, 
				  (SELECT CID from tblcandidate c where c.PositionID=2 and c.PartyListID=pl.PLID) s_id, 
				  (SELECT CID from tblcandidate c where c.PositionID=3 and c.PartyListID=pl.PLID) t_id, 
				  (SELECT CID from tblcandidate c where c.PositionID=4 and c.PartyListID=pl.PLID) a_id, 
				  (SELECT CID from tblcandidate c where c.PositionID=5 and c.PartyListID=pl.PLID) pio_id, 
				  (SELECT CID from tblcandidate c where c.PositionID=6 and c.PartyListID=pl.PLID) po_id, 
				  (SELECT CID from tblcandidate c where c.PositionID=8 and c.PartyListID=pl.PLID) gr_id, 
				  (SELECT CONCAT(FirstName,' ',MidInitial,' ',LastName) from tblcandidate c where c.PositionID=0 and c.PartyListID=pl.PLID) p_name,
				  (SELECT CONCAT(FirstName,' ',MidInitial,' ',LastName) from tblcandidate c where c.PositionID=1 and c.PartyListID=pl.PLID) vp_name,
				  (SELECT CONCAT(FirstName,' ',MidInitial,' ',LastName) from tblcandidate c where c.PositionID=2 and c.PartyListID=pl.PLID) s_name,
				  (SELECT CONCAT(FirstName,' ',MidInitial,' ',LastName) from tblcandidate c where c.PositionID=3 and c.PartyListID=pl.PLID) t_name,
				  (SELECT CONCAT(FirstName,' ',MidInitial,' ',LastName) from tblcandidate c where c.PositionID=4 and c.PartyListID=pl.PLID) a_name,
				  (SELECT CONCAT(FirstName,' ',MidInitial,' ',LastName) from tblcandidate c where c.PositionID=5 and c.PartyListID=pl.PLID) pio_name,
				  (SELECT CONCAT(FirstName,' ',MidInitial,' ',LastName) from tblcandidate c where c.PositionID=6 and c.PartyListID=pl.PLID) po_name,
				  (SELECT CONCAT(FirstName,' ',MidInitial,' ',LastName) from tblcandidate c where c.PositionID=8 and c.PartyListID=pl.PLID) gr_name
				  FROM tblpartylist pl";
	}
		else if($_POST["gradeyear"] == 9){
		$query = "SELECT *,
				  (SELECT CID from tblcandidate c where c.PositionID=0 and c.PartyListID=pl.PLID) p_id, 
				  (SELECT CID from tblcandidate c where c.PositionID=1 and c.PartyListID=pl.PLID) vp_id, 
				  (SELECT CID from tblcandidate c where c.PositionID=2 and c.PartyListID=pl.PLID) s_id, 
				  (SELECT CID from tblcandidate c where c.PositionID=3 and c.PartyListID=pl.PLID) t_id, 
				  (SELECT CID from tblcandidate c where c.PositionID=4 and c.PartyListID=pl.PLID) a_id, 
				  (SELECT CID from tblcandidate c where c.PositionID=5 and c.PartyListID=pl.PLID) pio_id, 
				  (SELECT CID from tblcandidate c where c.PositionID=6 and c.PartyListID=pl.PLID) po_id, 
				  (SELECT CID from tblcandidate c where c.PositionID=9 and c.PartyListID=pl.PLID) gr_id, 
				  (SELECT CONCAT(FirstName,' ',MidInitial,' ',LastName) from tblcandidate c where c.PositionID=0 and c.PartyListID=pl.PLID) p_name,
				  (SELECT CONCAT(FirstName,' ',MidInitial,' ',LastName) from tblcandidate c where c.PositionID=1 and c.PartyListID=pl.PLID) vp_name,
				  (SELECT CONCAT(FirstName,' ',MidInitial,' ',LastName) from tblcandidate c where c.PositionID=2 and c.PartyListID=pl.PLID) s_name,
				  (SELECT CONCAT(FirstName,' ',MidInitial,' ',LastName) from tblcandidate c where c.PositionID=3 and c.PartyListID=pl.PLID) t_name,
				  (SELECT CONCAT(FirstName,' ',MidInitial,' ',LastName) from tblcandidate c where c.PositionID=4 and c.PartyListID=pl.PLID) a_name,
				  (SELECT CONCAT(FirstName,' ',MidInitial,' ',LastName) from tblcandidate c where c.PositionID=5 and c.PartyListID=pl.PLID) pio_name,
				  (SELECT CONCAT(FirstName,' ',MidInitial,' ',LastName) from tblcandidate c where c.PositionID=6 and c.PartyListID=pl.PLID) po_name,
				  (SELECT CONCAT(FirstName,' ',MidInitial,' ',LastName) from tblcandidate c where c.PositionID=9 and c.PartyListID=pl.PLID) gr_name
				  FROM tblpartylist pl";
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
    $response["partylist_all"] = array();
    
    foreach ($rows as $row) {
        $post             		= array();
		$post["partylist_id"]  	= $row["PLID"];
        $post["partylist_name"] = $row["PLName"];
        $post["description"]	= $row["Description"];
        $post["partylist_ab"]	= $row["PLNameAb"];
		$post["p_id"] 			=$row["p_id"];
		$post["vp_id"] 			=$row["vp_id"];
		$post["s_id"] 			=$row["s_id"];
		$post["t_id"] 			=$row["t_id"];
		$post["a_id"] 			=$row["a_id"];
		$post["pio_id"] 		=$row["pio_id"];
		$post["po_id"] 			=$row["po_id"];
		$post["gr_id"] 			=$row["gr_id"];
		$post["p_name"] 		=$row["p_name"];
		$post["vp_name"] 		=$row["vp_name"];
		$post["s_name"] 		=$row["s_name"];
		$post["t_name"] 		=$row["t_name"];
		$post["a_name"] 		=$row["a_name"];
		$post["pio_name"] 		=$row["pio_name"];
		$post["po_name"] 		=$row["po_name"];
		$post["gr_name"] 		=$row["gr_name"];
		$post["logo"] 			= str_replace(array('\\','..'),'',$row['Logo']);
        
        //update our repsonse JSON data
        array_push($response["partylist_all"], $post);
    }
    
    // echoing JSON response
    echo json_encode($response);
    
    
} else {
    $response["success"] = 0;
    $response["message"] = "No PartyList Available!";
    die(json_encode($response));
}

} else {
?>
		<h1>Vote Straight</h1> 
		<form action="party_list.php" method="post"> 
		    GradeYear:<br /> 
		    <input type="text" name="gradeyear" placeholder="grade year" value="" /> 
		    <br /><br /> 
		    <input type="submit" value="Submit" /> 
		</form> 
	<?php
}

?>
