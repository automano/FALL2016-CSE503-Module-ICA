<?php

    if(isset($_GET['name'])){
            
    }
    
    //save picture
    $full_path = sprintf("../uploads/%s",$filename);
    if( move_uploaded_file($_FILES['uploadpicture']['tmp_name'], $full_path) ){
        exit;
    }
  
    $pictureUrl = sprintf("uploads/%s",$filename);
    //insert new rows
	$stmt = $mysqli->prepare("insert into users (name,email,age,description,pictureUrl) values (?,?,?,?,?)");
	if(!$stmt){
		printf("Query Prep Failed: %s\n", $mysqli->error);
	exit;
	}

	$stmt->bind_param('ssiss', $name, $email,$age,$description,$pictureUrl);
	$name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $description = $_POST['description'];
    $pictureUrl = sprintf("uploads/%s",$filename); 

	$stmt->execute();
	$stmt->close();
    header("Location: show-users.php");
?>