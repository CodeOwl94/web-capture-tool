<?php
//Connect To Database
$hostname='localhost';
$username='root';
$password='shlWP2016';
$dbname='systemhealthlab';
$usertable='users';
$yourfield = 'first_name';

$link = mysqli_connect($hostname,$username, $password, $dbname) OR DIE ('Unable to connect to database! Please try again later.');
//mysqli_select_db($dbname);

if (!$link) {
    die('Connect Error (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}

echo 'Success... ' . mysqli_get_host_info($link) . "\n";


$query = "SELECT * FROM users";
//$query = 'SHOW DATABASES';
$result = mysqli_query($link, $query);

if($result) {

    while($row = mysqli_fetch_array($result)){
        print $name = $row[$yourfield];
        echo "</br>";
        echo 'Name ' . $name;
    }
}
else {
echo "</br>";
echo "Database NOT Found";
mysqli_close($link);
}
?>