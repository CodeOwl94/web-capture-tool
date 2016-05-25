<?php

$debug=0;
//This code opens a connection to the relevant database
//You need to move this out of public access as it has login details!

$sqlDetails = file("../../../../login/sql.txt")

$hostname=$sqlDetails[0];
$username=$sqlDetails[1];
$password=$sqlDetails[2];
$dbname=$sqlDetails[3];
//$usertable='users';

$link = mysqli_connect($hostname,$username, $password, $dbname) OR DIE ('Unable to connect to database! Please try again later.');

if ($debug==1) {

	if (!$link) {
		die('Connect Error (' . mysqli_connect_errno() . ') '
			. mysqli_connect_error());
	}

	echo 'Success... ' . mysqli_get_host_info($link) . "\n";
	echo "</br>";
}

?>
