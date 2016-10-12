<?php
// Content of database.php
$mysqli = new mysqli('localhost', 'module3', '123456', 'module3');
if($mysqli->connect_errno) {
	printf("Connection Failed: %s\n", $mysqli->connect_error);
	exit;
}
?>