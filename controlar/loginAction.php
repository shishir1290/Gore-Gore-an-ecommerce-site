<?php
session_start();

require "../model/connection.php";

// Check if form submitted with POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = $_POST["username"];
	$password = $_POST["password"];

	// Prepare SQL statement to check if username and password are correct
	$result = $conn->query("SELECT * FROM userinfo WHERE username = '$username' AND password = '$password'");
	

	// Check if username and password are correct
	if ($result->num_rows > 0) {
		$_SESSION['username'] = $username;
		header("Location: ../index.php");
		exit;
	} else {
		$error_message = "Invalid username or password!";
	}
}

// Close MySQL database connection
$mysqli->close();
?>
