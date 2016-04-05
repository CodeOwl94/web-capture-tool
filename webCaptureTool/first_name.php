<?php

//This is to obtain information for the first dropdown

//Open connection
require 'openDB.php';
  
// Declare the SQL statement that will query the database
$query = "SELECT * FROM users";

 
// Execute the SQL statement and return records
$result= mysqli_query($link, $query);

if (!$result)
 	echo "Didn't work";
    //print $conn->ErrorMsg();
 
else{

	$cats = array();
	$placeHolder = array(); 

	while($row = mysqli_fetch_array($result)){
        $placeHolder[0] = (string)$row['id'];
        $placeHolder[1] = (string)$row['first_name'];
        
        $cats[] = $placeHolder;
    }

	
	//Return the array in JSON format
	echo json_encode($cats);
}
//Close the connection
require 'closeDB.php';
 
?>