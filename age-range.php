<!DOCTYPE html>
<head>
<meta charset="utf-8"/>
<title>Macthmaking Site - User by Age</title>
<style type="text/css">
h1{
     text-decoration: underline;
     text-align: center;
}
body{
	width: 760px; /* how wide to make your web page */
	background-color: teal; /* what color to make the background */
	margin: 0 auto;
	padding: 0;
	font:12px/16px Verdana, sans-serif; /* default font */
}
div#main{
	background-color: #FFF;
	margin: 0;
	padding: 10px;
}
</style>
</head>
<body><div id="main">
<h1>Users in Age Range</h1>
<?php
require "database.php";

$low = htmlspecialchars($_POST['low']);
$high = htmlspecialchars($_POST['high']);

$stmt = $mysqli->prepare("select name, email,age,description,pictureUrl from users WHERE age BETWEEN ? and ?");
    if (!$stmt) {
        printf("Query Prep Failed: %s\n", $mysqli->error);
    exit;
    }
$stmt->bind_param('ss', $low,$high);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($name, $email,$age,$dscription,$pictureUrl);
while ($stmt->fetch()) {
    echo "<fieldset>";
	echo "<ul>";
	echo "<li>Name: ".htmlspecialchars($name)."</li>"."<br>";
    echo "<li>Age: ".htmlspecialchars($age)."</li>"."<br>";
	echo "<li>Email: ".htmlspecialchars($email)."</li>"."<br>";
	echo "<img src='$pictureUrl' width = '300px'><br>";
	echo "<li>Description: ".htmlspecialchars($description)."</li>"."<br>";
	echo "</ul>";
    echo "</fieldset>";
}
$stmt->close();
?>
<!-- CONTENT HERE -->
<a href="show-users.php">See all Users</a>
</div></body>
</html>