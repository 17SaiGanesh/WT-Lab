<?php
  session_start();

  // establish database connection
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "facebook";

  $conn = mysqli_connect($servername, $username, $password, $dbname);

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  // check if the form has been submitted
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uid = $_POST['username'];
    $pw = $_POST['pass'];
    // query the database for the user
    $sql = "SELECT * FROM users WHERE email='$uid' AND passwor='$pw'";
    $result = mysqli_query($conn, $sql);

    // check if user exists
    if (mysqli_num_rows($result) >0){
      // user found, create session and redirect to home page
      $_SESSION['username'] = $uid;
      echo "Welcome, " . $_SESSION['username'] . "!";
      //echo "$uid";
      $_SESSION['username'] = $uid;
      header("Location: home.php");
      //echo "logged in";
    } else {
      // user not found, display error message
      echo "Invalid username or password....please signup";
    }
  }

  mysqli_close($conn);
?>
