<?php

//load and connect to MySQL database stuff
require("dbConfig.php");


if (!empty($_POST)) {
	$login_ok = false;
	$login_again = false;
    //gets user's info based off of a username.
    $query = " 
            SELECT 
                VID, 
                UserName, 
                Password,
				GradeYear,
				Status
            FROM tblvoter 
            WHERE 
                username = :username 
			AND
				GradeYear IN (7,8,9)
        ";
    
    $query_params = array(
        ':username' => $_POST['username']
    );
    
    try {
        $stmt   = $db->prepare($query);
        $result = $stmt->execute($query_params);
    }
    catch (PDOException $ex) {
        // For testing, you could use a die and message. 
        //die("Failed to run query: " . $ex->getMessage());
        
        //or just use this use this one to product JSON data:
        $response["success"] = 0;
        $response["message"] = "Database Error1. Please Try Again!#1";
        die(json_encode($response));
        
    }
    
    //This will be the variable to determine whether or not the user's information is correct.
    //we initialize it as false.
    $validated_info = false;
    
    //fetching all the rows from the query
    $row = $stmt->fetch();
    if ($row) {
        //if we encrypted the password, we would unencrypt it here, but in our case we just
        //compare the two passwords
        if ($_POST['password'] == $row['Password']) {
			if($row['Status'] == 0){
            	$login_ok = true;
				$response["voter_id"] = $row['VID'];
				$response["voter_gradeYear"] = $row['GradeYear'];
			}
			else{
				$login_again = true;
			}
        }
    }
    
    // If the user logged in successfully, then we send them to the private members-only page 
    // Otherwise, we display a login failed message and show the login form again 
    if ($login_ok) {
        $response["success"] = 1;
        $response["message"] = "Login successful!";
        die(json_encode($response));
	} else if($login_again){
		$response["success"] = 0;
		$response["message"] = "Sorry, Your vote was already counted.";
		die(json_encode($response));
    } else {
        $response["success"] = 0;
        $response["message"] = "Invalid Username or Password!";
        die(json_encode($response));
    }
} else {
?>
		<h1>Login</h1> 
		<form action="login.php" method="post"> 
		    Username:<br /> 
		    <input type="text" name="username" placeholder="username" /> 
		    <br /><br /> 
		    Password:<br /> 
		    <input type="password" name="password" placeholder="password" value="" /> 
		    <br /><br /> 
		    <input type="submit" value="Login" /> 
		</form> 
		<a href="register.php">Register</a>
	<?php
}

?> 
