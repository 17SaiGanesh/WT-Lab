<?php
	echo "Registration successful ";
	echo "<br>";
	$username = $_POST["uname"];
	$email    = $_POST["eid"];
	$dob      = $_POST["DOB"];
	$religion = $_POST["rel"];
	echo "Username is $username";
	echo "<br>";
	echo "Email is $email";
	echo "<br>";
	echo "DOB is $dob";
	echo "<br>";
	echo "Religion is $religion";
	echo "<br>";
	$host = 'localhost';
	$host_username = 'root';
	$host_password = '';
	$dbname = 'aasish';

	$conn = mysqli_connect($host, $host_username, $host_password, $dbname);

	if ($conn)
	{
		echo "Connection successful.";
	}
	else
	{
		echo "Connection Failed.";
		die("Connection Failed:".mysqli_connect_error());
	}
	
	$sql = "INSERT INTO student (name,email,dob,religion) VALUES('$username','$email', '$dob','$religion')";
	$upload = mysqli_query($conn,$sql);
	if($upload)
	{
		echo "New details have been entered!";
		echo "<script> alert('data saved successfully');</script>";
	}
	else
	{
		echo "Error:".$sql."".mysqli_error($conn);
	}

	$sql1 = "select * from student";
	$result = mysqli_query($conn,$sql1);
	if($sql1)
	{
		echo "<table border=1>
		<tr><th>name</th>
		<th>email</th>
		<th>dob</th>
		<th>religion</th>
		</tr>
		";
		$row = [];
		while($row = mysqli_fetch_assoc($result))
		{
			echo "<tr><td>".$row['name']."</td>";
			echo "<td>".$row['email']."</td>";
			echo "<td>".$row['dob']."</td>";
			echo "<td>".$row['religion']."</td></tr>";

		}
	
	}


?>