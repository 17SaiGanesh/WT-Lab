<!DOCTYPE html>
<html>
<head>
    <title>All posts</title>
    <style>
        h1 {
            text-align: center;
        }

       /* .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }*/

        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
            padding: 10px;
            margin: 10px;
            text-align: center;
            margin-top:100px;
        }

        .card img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
            margin-top:100px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }

        input[type="file"] {
            padding: 5px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            padding: 5px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #3e8e41;
        }
        .post{
            display:flex;
            flex-direction:column;
        }
        .right-column{
	margin-left:200px;
	margin-right:400px;
}

/* Posts */
.post {
    background-color: #fff;
    padding: 20px;
    border:2px solid black;
    border-radius: 10px;
    box-shadow: 0px 2px 10px rgba(0,0,0,0.1);
    margin-bottom: 20px;
	width:600px;
    height:300px;
    margin-left:300px;
}

.post h3 {
    font-size: 20px;
    margin-bottom: 10px;
}

.post p {
    font-size: 16px;
    color: #666;
    margin-bottom: 20px;
}

.post img {
    max-width: 100%;
    border-radius: 10px;
    margin-bottom: 10px;
	width:250px;
	height:250px;
}
.actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.actions a {
    color: #3b5998;
    text-decoration: none;
    margin-right: 10px;
}

.actions a:hover {
    text-decoration: underline;
}

.actions span {
    font-size: 14px;
    color: #666;
}
    </style>
</head>
<body>
    <h1>All posts:</h1>
    <div class="content">
     <div class="right-column">
    <?php
  session_start();

  // establish database connection
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "facebook";
// retrieve the user ID from the session or URL parameter
//esession_start();
// retrieve the user ID from the session or URL parameter
$name = $_SESSION['username'];
  $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }
                $sql = "SELECT * FROM photos order by likes desc limit 3";
                $result = mysqli_query($conn, $sql);
                 if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<form class='post' method='post' action='like.php' style='padding-top:2px;'>";
                    echo "<div style='width: 250px; height:500px;'>";
                    echo "<img src='uploads/" . $row['filename'] . "' alt='post'>";
                    echo "</div>";
                    echo "<div class='actions'>";
                    echo "<input name='uid' type='hidden' value=".$username.">";
                    echo "<button type='submit' name='iid'  style='font:size 5px;' value=".$row['filename'].">Like:<span id='out'>".$row['likes']."</span></button>";           
                    echo "</div>";
                    echo "<hr style='height:1px;border-width:0;background-color:lightgrey;'>";
                    echo "</form>";
                    echo "<form method='post' action='comment.php'>";
                    echo "<input type='hidden' name='uid' value='".$username."'>";
                    echo "<input type='hidden' name='filename' value='".$row['filename']."'>";
                     echo "<input type='text' name='comment' placeholder='Write a comment...'>";
                    echo "<button type='submit' name='submit'>Comment</button>";
                    echo "</form>";
                    $sql_comments = "SELECT * FROM comments WHERE filename='".$row['filename']."'";
                    $result_comments = mysqli_query($conn, $sql_comments);
                    if (mysqli_num_rows($result_comments) > 0) {
                        while($row_comments = mysqli_fetch_assoc($result_comments)) {
                        echo "<div>";
                        //echo "<p>".$row_comments['uid']."</p>";
                        echo "<p>".$row_comments['comment']."</p>";
                        echo "</div>";
                    }
                   }
                    } 
                }
                    else {
                    echo "No images found.";
                    }
                mysqli_close($conn);
                            ?>

    </div>
                </div>
</body>
</html>
<html>
<head>
  <title>Home Page</title>
  <style>
      #a:link, #a:visited {
  background-color: #f44336;
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

#a:hover, #a:active {
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
		width: 100%;
	}
	section{
		height:1200px;
		width: 1200px;
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
  <ul>
		<li><a  href="home1.php">Home</a></li>
			<li><a href="top.php">Top posts</a></li>
				<li><a href="view.php">MyUploads</a></li>
					<li><a  href="profile.php">Profile</a></li>
          <li><a  type="submit" href="logout.php">Logout</a></li>
	</ul>