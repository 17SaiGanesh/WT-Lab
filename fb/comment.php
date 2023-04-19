<?php
session_start();
if (isset($_POST['submit'])) {
 //   $uid = $_POST["fn"];
  $uid = $_POST['uid'];
  $filename = $_POST['filename'];
  $comment = $_POST['comment'];
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "facebook";
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
  $sql = "INSERT INTO comments (uid, filename, comment) VALUES ('$uid', '$filename', '$comment')";
  if ($conn->query($sql) === TRUE) {
    echo "Comment added successfully.";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  mysqli_close($conn);
}
header("Location:home1.php");
   
?>
