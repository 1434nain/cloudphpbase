<?php
session_start();


define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "linux");
define("DB_NAME", "cloud");
$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (!$connection) {
	echo "Error: Unable to connect to MySQL." .PHP_EOL;
	echo "Debugging errno: " .mysqli_connect_errno() . PHP_EOL;
	echo "Debugging error: " .mysqli_error() . PHP_EOL;
}
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
mysqli_close($connection);

?>
