<!DOCTYPE html>
<head>
<meta charset="utf-8"/>
<title>Matches</title>
<style type="text/css">
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
$stmt = $mysqli->prepare("SELECT name,email,age,description,pictureUrl from users ");
    if (!$stmt) {
        printf("Query Prep Failed: %s\n", $mysqli->error);
    exit;
    }
$stmt->bind_param('ssiss', $name, $email,$age,$description,$pictureUrl);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($name, $email,$age,$description,$pictureUrl);
$stmt->fetch();
$stmt->close();

echo "-------------------";
echo "Name: ".$name;
echo "Email: ".$email;
echo "age: ".$age;
echo "Description: ".$description;
echo "Profile picture: ";
echo "<img src=".$pictureUrl." width=300px/>";
?>

<form action='age-range.php' method='POST'>
    <label>low:  <input type='number' name='low'/></label><br><br>
    <label>high: <input type='number' name='high'/></label><br><br>
    <input type='submit' value='Submit'/><br><br>
</form>
 
<!-- CONTENT HERE -->
 
</div></body>
</html>