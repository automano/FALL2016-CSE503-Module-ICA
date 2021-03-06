<?php
require "database.php";
//error description
if(!isset($_POST['name'])){
    echo "Please input your name!<br>";
    exit;
}
if(!isset($_POST['email'])){
    echo "Please input your email!<br>";
    exit;
}
if(!isset($_POST['age'])){
    echo "Please input your age!<br>";
    exit;
}
if(!isset($_POST['description'])){
    echo "Please input your description!<br>";
    exit;
}
if(!isset($_FILES['fileToUpload'])){
    echo "Please upload your profile picture!<br>";
    exit;
}

//http://www.w3schools.com/php/php_file_upload.asp
$target_dir = "uploads/";
$filename = basename($_FILES['fileToUpload']['name']);
$target_file = $target_dir.$filename;
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST['submit'])&&isset($_FILES['fileToUpload'])){
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size  samller than 500kB
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
         //insert new rows
            $stmt = $mysqli->prepare("insert into users (name,email,age,description,pictureUrl) values (?,?,?,?,?)");
            if(!$stmt){
                printf("Query Prep Failed: %s\n", $mysqli->error);
            exit;
            }

            $stmt->bind_param('ssiss', $name, $email,$age,$description,$target_file);
            $name = $_POST['name'];
             $email = $_POST['email'];
            $age = (int)$_POST['age'];
            $description = $_POST['description'];
  
            $stmt->execute();
            $stmt->close();
             header("Location: show-users.php");
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>