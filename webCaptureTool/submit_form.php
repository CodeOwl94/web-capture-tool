<?php

if (empty($_POST['submit'])) {
	echo "Submit a form to make this script useful";
	exit;
}

//Pull out all the form data
$first_name = $_POST['first_name'];
$start_time = $_POST['start_time_proper'];
$end_time = $_POST['end_time_proper'];
$motor = $_POST['motor'];
$tyre_ring = $_POST['tyre_ring'];
$drive_pulley = $_POST['drive_pulley'];
$drive_belt = $_POST['drive_belt'];
$comments  = $_POST['comments'];

//Insert all this data into the MySQL table
require "insert_data.php";

//Now find the filepath we need and update the MySQL table
require "upload_file.php";

//require "upload.php";

//echo "Submission successful";

?>
