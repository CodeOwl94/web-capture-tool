<?php

//This is to obtain information for the first dropdown

//Open connection
require 'openDB.php';

// Declare the SQL statement that will query the database
$query = "SELECT MAX(id) FROM experiments";

// Execute the SQL statement and return records
$result= mysqli_query($link, $query);

$id = NULL;

if (!$result)
    //echo "fail"; 
    exit;
else{
	$row = mysqli_fetch_array($result);
	//echo "success";
	$id = $row[0];

}

//Upload the file
$target_dir = "../../../../uploads/";
$target_file = $target_dir . "DATALOG_" . $id . ".txt";

 if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) { //tmp_name is just the temporary name of the uploaded fioe for PHP
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

echo "</br>";

//Update the filePath field in the MySQL table
//Expand ../../ to the fullpath
$proper_path = realpath($target_file);
$proper_path = str_replace("\\", "\\\\", $proper_path);


$query = 'UPDATE experiments SET file_path="' . $proper_path . '" WHERE id=' . $id;
$result= mysqli_query($link, $query);    

//Close the connection
require 'closeDB.php';

?>