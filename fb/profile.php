<?php
// Step 1: Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "facebook";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

session_start();

// Step 2: Check if the 'username' key exists in the $_SESSION array
if (isset($_SESSION['username'])) {
  // Step 3: Prepare the query
  $email = mysqli_real_escape_string($conn, $_SESSION['username']);
  $query = "SELECT * FROM users WHERE email='$email'";

  // Step 4: Execute the query
  $result = mysqli_query($conn, $query);

  // Step 5: Fetch the data
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $fname = $row['fn'];
    $lname = $row['ln'];
    $gmail = $row['email'];
    $pass = $row['passwor'];

    // Step 6: Display the data in a table format
    echo "
    <h1>Profile Details:</h1>
      <html>
      <style>
      table {
          width: 50%;
          margin: 0 auto; /* center the table */
          border-collapse: collapse;
      }
      th, td {
          padding: 8px;
          text-align: left;
          border-bottom: 1px solid #ddd;
      }
      th {
          background-color: #f2f2f2;
      }
      h1{
        position: relative;
        left: 40%;
      }
      </style>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <table>
          <tr>
              <th>First Name</th>
              <td>$fname</td>
          </tr>
          <tr>
              <th>Last Name</th>
              <td>$lname</td>
          </tr>
          <tr>
              <th>Mailid</th>
              <td>$gmail</td>
          </tr>
          <tr>
              <th>Password</th>
              <td>$pass</td>
          </tr>
          <tr>
              <th>Gender</th>
              <td>male</td>
          </tr>
      </table>
      </html>
    ";
  } else {
    echo "No records found with email: $email";
  }
} else {
  echo "Please enter an email address";
}

// Step 7: Close the connection
mysqli_close($conn);
?>
<html>
<head>
  <title>Home Page</title>
  <style>
      a:link, a:visited {
  background-color: #f44336;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:hover, a:active {
  background-color: red;
}
*{
            margin: 0;
            padding: 0;
        }
        html{
            scroll-behavior: smooth;
            font-family: tahoma;
        }
		h1{
			text-align:center;
			position: fixed;
			top:0;
			left: 35%;
			color:purple; 
		}
		ul{
			list-style: none;
			height:50px;
			width: 100%;
			position: fixed;
			top:0;
			left:0;
			background: crimson;
			box-shadow:2px 0px 5px black;
			display: flex;
			justify-content: space-around;
		}
		ul li{
			margin: 5px;
			padding: 5px;
			}
		ul li a{
			color:white;
			text-decoration:none;
			font-size: 20px;
			padding:5px; 
		}
	ul li a:hover
	{
		background: white;
		color:blue;
	}
	.content{
		display: flex;
		width: 500%;
	}
	section{
		height:100vh;
		width: 100vw;
		display: flex;
		align-items: center;
		justify-content: center;
		text-transform: uppercase;

	}
	#section1{
		background: linear-gradient(-45deg,white 30%,pink 0%);
	}
	#section2{
		background: linear-gradient(-45deg,white 30%,lightgreen 0%);
	}
	#section3{
		background: linear-gradient(-45deg,white 30%,lightblue 0%);
	}
	#section4{
		background: linear-gradient(-45deg,white 30%,tomato 0%);
	}
  </style>
</head>
<body>
  <!--<h1>Welcome to the Home Page</h1>-->
  <ul>
		<li><a href="home1.php">Home</a></li>
    <li><a href="top.php">Top posts</a></li>
				<li><a href="view.php">MyUploads</a></li>
					<li><a href="profile.php">Profile</a></li>
          <li><a  type="submit" href="logout.php">Logout</a></li>
	</ul>