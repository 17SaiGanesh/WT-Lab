<?php
// connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "facebook";
$conn = new mysqli($servername, $username, $password, $dbname);
session_start();
$name=$_SESSION['username'];
// check if the file was uploaded without errors
if(isset($_FILES["photo"]) && $_FILES["photo"]["error"] == 0){
    $filename = $_FILES["photo"]["name"];
    $tempname = $_FILES["photo"]["tmp_name"];
    $folder = "uploads/".$filename;
    
    // move the uploaded file to the uploads folder
    move_uploaded_file($tempname, $folder);
    
    // insert the filename into the database
    $sql = "INSERT INTO photos (filename,name) VALUES ('$filename','$name')";
    $result = $conn->query($sql);
    
    if($result){
        echo "File uploaded successfully.";
    }else{
        echo "Error uploading file.";
    }
}else{
    echo "Error: " . $_FILES["photo"]["error"];
}
?>
