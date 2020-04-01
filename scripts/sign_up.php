<?php
require_once("init.php");

try {
	$conn = new
		PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

	// set the PDO error mode to exception

	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	//Insert Data Into MySQL
	$firstname = $_POST['fname'];
	$lastname = $_POST['lname'];
	$fname = $lastname . " " . $firstname;
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$uname = $_POST['uname'];
	$password = $_POST['pswd'];
	$salt = "kdf84kh38" . $password . "khjsfiw97r924j";
	$password_hash = password_hash($salt, PASSWORD_DEFAULT);


	// prepare sql and bind parameters
	$stmt = $conn->prepare("INSERT INTO admin (name, email, phone_number, username, password) VALUES (:name, :email, :phone, :username, :password)");
	$stmt->bindParam(':name', $fname);
	$stmt->bindParam(':email', $email);
	$stmt->bindParam(':phone', $phone);
	$stmt->bindParam(':username', $uname);
	$stmt->bindParam(':password', $password_hash);

	//Execute Query
	$query = $stmt->execute();

	echo "<script> alert('Account has been created successfully');</script>";
	header("Refresh: 0.01; URL=/");
} catch (PDOException $e) {
	echo "Error: " . $e->getMessage();
}

$conn = null;
