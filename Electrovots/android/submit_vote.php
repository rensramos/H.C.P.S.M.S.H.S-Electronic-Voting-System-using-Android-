<?php

//load and connect to MySQL database stuff
require("dbConfig.php");
include("getYear.php");

if (!empty($_POST)) {
	//initial query
	$query = "INSERT INTO tblvotes ( VoterID, CandidateID, SY) 
				VALUES ( :voterid, :presidentid, :year ),
						( :voterid, :vicepresidentid, :year ),
						( :voterid, :secretaryid, :year ),
			     		( :voterid, :treasurerid, :year ),
					    ( :voterid, :auditorid, :year ),
				    	( :voterid, :pioid, :year ),
					    ( :voterid, :peaceofficerid, :year ),
						( :voterid, :graderepid, :year )";

    //Update query
    $query_params = array(
        ':voterid' => $_POST['voterId'],
        ':presidentid' => $_POST['presidentId'],
        ':vicepresidentid' => $_POST['vice_presidentId'],
        ':secretaryid' => $_POST['secretaryId'],
        ':treasurerid' => $_POST['treasurerId'],
        ':auditorid' => $_POST['auditorId'],
        ':pioid' => $_POST['pioId'],
        ':peaceofficerid' => $_POST['peace_officerId'],
        ':graderepid' => $_POST['gradeId'],
		':year' => $year
    );
	
	$query2 = "UPDATE tblvoter SET Status = 1 WHERE VID = :voterid";
	$query_params2 = array(
        ':voterid' => $_POST['voterId']
	);
  
	//execute query
    try {
        $stmt   = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch (PDOException $ex) {
        // For testing, you could use a die and message. 
        //die("Failed to run query: " . $ex->getMessage());
        
        //or just use this use this one:
        $response["success"] = 0;
        $response["message"] = "Couldn't submit your votes!".mysql_error();
        die(json_encode($response));
    }
	
	try {
		$stmt2   = $db->prepare($query2);
        $result2 = $stmt2->execute($query_params2);
    }
    catch (PDOException $ex) {
        // For testing, you could use a die and message. 
        //die("Failed to run query: " . $ex->getMessage());
        
        //or just use this use this one:
        $response["success"] = 0;
        $response["message"] = "Couldn't submit your votes!";
        die(json_encode($response));
    }

    $response["success"] = 1;
    $response["message"] = "Your Vote has been officially counted!";
    echo json_encode($response);
   
} else {
?>
		<h1>Add Comment</h1> 
		<form action="submit_vote.php" method="post"> 
		    Voter's Name:<br /> 
		    <input type="text" name="voterName" placeholder="Voter's Name" /> 
		    <br /><br />
            Voter's ID:<br /> 
		    <input type="text" name="voterId" placeholder="Voter's Name" /> 
		    <br /><br />
            
            <br /><br />
            President's Choice Name:<br /> 
		    <input type="text" name="president name" placeholder="Candidate Name" /> 
		    <br /><br /> 
		    President's ID<br /> 
		    <input type="text" name="presidentId" placeholder="Candidate's ID" /> 
		    <br /><br />
            
            <br /><br />
            vice-president Choice Name:<br /> 
		    <input type="text" name="vice_president name" placeholder="Candidate Name" /> 
		    <br /><br /> 
		    vice-president ID<br /> 
		    <input type="text" name="vice_presidentId" placeholder="Candidate's ID" /> 
		    <br /><br />
			
            <br /><br />
    		secretary Choice Name:<br /> 
		    <input type="text" name="secretary name" placeholder="Candidate Name" /> 
		    <br /><br /> 
		    secretary ID<br /> 
		    <input type="text" name="secretaryId" placeholder="Candidate's ID" /> 
		    <br /><br />
			
            <br /><br />
			treasurer Choice Name:<br /> 
		    <input type="text" name="treasurer name" placeholder="Candidate Name" /> 
		    <br /><br /> 
		    treasurer ID<br /> 
		    <input type="text" name="treasurerId" placeholder="Candidate's ID" /> 
		    <br /><br />
			
            <br /><br />
            auditor Choice Name:<br /> 
		    <input type="text" name="auditor name" placeholder="Candidate Name" /> 
		    <br /><br /> 
		    auditor ID<br /> 
		    <input type="text" name="auditorId" placeholder="Candidate's ID" /> 
		    <br /><br />
			
            <br /><br />
            pio Choice Name:<br /> 
		    <input type="text" name="pio name" placeholder="Candidate Name" /> 
		    <br /><br /> 
		    pio ID<br /> 
		    <input type="text" name="pioId" placeholder="Candidate's ID" /> 
		    <br /><br />
            
            <br /><br />
            peace_officer Choice Name:<br /> 
		    <input type="text" name="peace_officer name" placeholder="Candidate Name" /> 
		    <br /><br /> 
		    peace_officer ID<br /> 
		    <input type="text" name="peace_officerId" placeholder="Candidate's ID" /> 
		    <br /><br />
            
            <br /><br />
            grade Representative Choice Name:<br /> 
		    <input type="text" name="grade name" placeholder="Candidate Name" /> 
		    <br /><br /> 
		    grade Representative ID<br /> 
		    <input type="text" name="gradeId" placeholder="Candidate's ID" /> 
		    <br /><br />
            
  
		    <input type="submit" value="Submit Vote" /> 
		</form> 
	<?php
}

?> 