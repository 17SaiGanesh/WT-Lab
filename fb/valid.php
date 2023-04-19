<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	// Get the values submitted in the form
	$fn = $_POST["fn"];
    $ln=$_POST["lastname"];
	$email = $_POST["email"];
	$passwor = $_POST["passwor"];
    $agree=$_POST['agree'];

    $c=0;
	if (empty($fn) || empty($email) || empty($passwor)) {
		echo "Please fill out all required fields";

	} else {
        if (empty($fn) || empty($ln)) {
            echo "Please fill out both first name and last name fields";
        } else {
            if (!preg_match("/^[a-zA-Z ]*$/", $fn) || !preg_match("/^[a-zA-Z ]*$/", $ln)) {
                echo "First name and last name should contain only letters and whitespace";
                $c=$c+1;
            } 
        }
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			echo "Invalid email format";
            $c=$c+1;
		} 
        if (!isset($_POST['agree'])) {
            echo '<script>alert("You must agree to the terms and conditions")</script>';
            $c=$c+1;
        }
        
        // Step 1: Open a database connection
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "facebook";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Step 2: Prepare an SQL query
        $fn = mysqli_real_escape_string($conn, $fn);
        $ln = mysqli_real_escape_string($conn, $ln);
        $email = mysqli_real_escape_string($conn, $email);
        $passwor = mysqli_real_escape_string($conn, $passwor);

        $sql = "INSERT INTO users (fn, ln, email,passwor) VALUES ('$fn','$ln','$email', '$passwor')";

        // Step 3: Execute the SQL query
        if (mysqli_query($conn, $sql)) {
            echo "Form submitted successfully. Redirecting to another page in 5 seconds...";
            header("refresh:5;url=fblogin.html");
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        // Step 4: Close the database connection
        mysqli_close($conn);
    }
}
?>
