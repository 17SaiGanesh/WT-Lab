<?php
session_start();
if(empty($_SESSION['username']))
{
	header('Location:http://localhost/fb/fblogin.html');
}
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
			<!--<li><a href="view.php">Viewposts</a></li>-->
				<li><a href="view.php">MyUploads</a></li>
					<li><a href="profile.php">Profile</a></li>
          <li><a  type="submit" href="logout.php">Logout</a></li>
	</ul>
<!--
  <div align="right">
  
  <a  type="submit" href="logout.php">Logout</a>
</div> -->
  <?php

  // establish database connection
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "facebook";


  $conn = mysqli_connect($servername, $username, $password, $dbname);

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
    $uid=$_SESSION['username'];
     echo "Welcome....".$uid."!";
  ?>
</body>
</html>