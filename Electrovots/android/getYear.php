<?php
	$queryY="SELECT SY FROM tblyearselected";
	$query_paramsY = array();
	
	try {
    $stmtY   = $db->prepare($queryY); 
    $resultY = $stmtY->execute($query_paramsY);
	}
	catch (PDOException $ex) {
	}
	
	$rows = $stmtY->fetchAll();
	if ($rows) {
		foreach ($rows as $row) {
			$year = $row["SY"];
		}
	}
?>