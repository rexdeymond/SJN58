<?php
/*
$hostname="153.92.10.145";  
$username="u5611516_sj";
$password="Mult!L@y3r";
$database="u5611516_sjn";
*/
$hostname="localhost";  
$username="alig9546_sj";
$password="Mult!L@y3r";
$database="alig9546_sjn";

/*$hostname="103.56.149.64";  
$username="sjsu_sjn";
$password="S4tuj4l4n";
$database="sjsu_sjn";*/

if(isset($conn)){mysqli_close($conn);$conn=null;}

$conn = new mysqli($hostname, $username, $password, $database, 3306);
if ($conn->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}


?>
