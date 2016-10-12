<?php
// Content of database.php
$mysqli = new mysqli('localhost', 'module3', '123456', 'matchmaker');
if($mysqli->connect_errno) {
	printf("Connection Failed: %s\n", $mysqli->connect_error);
	exit;
}
?>