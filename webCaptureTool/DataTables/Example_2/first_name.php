<?php

//This is to obtain information for the first dropdown

//Open connection
require 'openDB.php';
  
// Declare the SQL statement that will query the database
$query = "SELECT 
experiments.id, experiments.comments, experiments.start_time, experiments.end_time, experiments.motor_number, experiments.tyre_ring_set_number, experiments.drive_pulley_number, 
experiments.drive_belt_number, users.first_name
FROM experiments
INNER JOIN users ON experiments.user_id = users.id
";

 
// Execute the SQL statement and return records
$result= mysqli_query($link, $query);

if (!$result)
 	echo "Didn't work";
    //print $conn->ErrorMsg();
 
else{

	$cats = array();
	$placeHolder = array(); 

	while($row = mysqli_fetch_array($result)){
        $placeHolder[0] = (string)$row[0];
        $placeHolder[1] = (string)$row[1];
        $placeHolder[2] = (string)$row[2];
        $placeHolder[3] = (string)$row[3];
        $placeHolder[4] = (string)$row[4];
        $placeHolder[5] = (string)$row[5];
        $placeHolder[6] = (string)$row[6];
        $placeHolder[7] = (string)$row[7];
        $placeHolder[8] = (string)$row[8];
        //$placeHolder[9] = (string)$row[9];
        
        $cats[] = $placeHolder;
    }

	$test = array("data"=>$cats);
	//Return the array in JSON format
	echo json_encode($test);
}
//Close the connection
require 'closeDB.php';
 
?>