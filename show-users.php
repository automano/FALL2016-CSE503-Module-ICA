<!DOCTYPE html>
<head>
<meta charset="utf-8"/>
<title>Matches</title>
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
<h1>All Users</h1>
<?php
require "database.php";
$stmt = $mysqli->prepare("select name, email,age,description,pictureUrl from users");
    if (!$stmt) {
        printf("Query Prep Failed: %s\n", $mysqli->error);
    exit;
    }
$stmt->execute();
$stmt->bind_result($name, $email,$age,$description,$pictureUrl);
while ($stmt->fetch()) {
    echo "<fieldset>";
	echo "<ul>";
	echo "<li>Name: ".htmlspecialchars($name)."</li>"."<br>";
    echo "<li>Age: ".htmlspecialchars($age)."</li>"."<br>";
	echo "<li>Email: ".htmlspecialchars($email)."</li>"."<br>";
	echo "<li><img src='$pictureUrl' width = '300px'></li><br>";
	echo "<li>Description: ".htmlspecialchars($description)."</li>"."<br>";
	echo "</ul>";
    echo "</fieldset>";
}
$stmt->close();
?>
<br><br>
Search for people in this age range:
<br>
<form action='age-range.php' method='POST'>
    <label>low:  <input type='number' name='low' min='18'/></label>
    <label>high: <input type='number' name='high' min='18'/></label><br><br>
    <input type='submit' value='Submit'/><br><br>
</form>
 
<!-- CONTENT HERE -->
 
</div></body>
</html>