<?php

$debug=0;
//This code opens a connection to the relevant database
//You need to move this out of public access as it has login details for root! 

$hostname='systemhealthlab.ddns.net';
$username='experimenter';
$password='exp2016';
$dbname='systemhealthlab';
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
