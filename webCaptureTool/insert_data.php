<?php

//This is to obtain information for the first dropdown

//Open connection
require 'openDB.php';

// Declare the SQL statement that will query the database
$query = "INSERT INTO experiments VALUES 
(NULL," .  $first_name . ",'" . (string)$start_time . "','" . (string)$end_time . "'," . $motor . "," . $tyre_ring . "," . $drive_pulley . "," . $drive_belt . ",'" . 
$comments . "', NULL)";

// Execute the SQL statement and return records
$result= mysqli_query($link, $query);

/*if (!$result)
    echo "fail"; 
else
	echo "success";
    
echo "</br>";
*/

//Close the connection
require 'closeDB.php';
 
?>