<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "facebook";
$conn = new mysqli($servername, $username, $password, $dbname);
session_start();
$name = $_SESSION['username'];
  //  $name=$_POST['uid'];
    $url= $_POST['iid'];
   // echo "$name";
    //cho "$url";
   // $host = 'localhost';
    $res = mysqli_query($conn,"select * from likes where user_id='$name' and post_id='$url'");
    if(mysqli_num_rows($res)>0){
        $res=mysqli_query($conn,"select * from photos where filename='$url'");
        $l = mysqli_fetch_assoc($res);
        $x=$l['likes'];
        //$x=$x-1;
        $a=mysqli_query($conn,"UPDATE photos SET likes='$x'-1 WHERE filename='$url'");
        $b=mysqli_query($conn,"DELETE FROM likes WHERE user_id='$name' and post_id='$url'");
    }
    else
	{
        $res = mysqli_query($conn,"select * from photos where filename='$url'");
        $l = mysqli_fetch_assoc($res);
        $x=$l['likes'];
        //$x=$x+1;
        $a=mysqli_query($conn,"UPDATE photos SET likes='$x'+1 WHERE filename='$url'");
        $b=mysqli_query($conn,"INSERT INTO likes(user_id,post_id)VALUES('$name','$url')");
        
    }
    header("Location:home1.php");
   
?>