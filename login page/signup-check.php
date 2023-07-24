<?php
session_start();
include "db_conn.php";

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['nom']) && isset($_POST['re_password'])) {

	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$email = validate($_POST['email']);
	$pass = validate($_POST['password']);
	$re_pass = validate($_POST['re_password']);
	$prenom = validate($_POST['prenom']);
	$nom = validate($_POST['nom']);

	$user_data = 'email='. $email. '&nom='. $nom. '&prenom='. $prenom;

	if (empty($email)) {
		header("Location: signup.php?error=Email is required&$user_data");
		exit();
	} else if (empty($pass)) {
		header("Location: signup.php?error=Password is required&$user_data");
		exit();
	} else if (empty($re_pass)) {
		header("Location: signup.php?error=Re Password is required&$user_data");
		exit();
	} else if (empty($nom)) {
		header("Location: signup.php?error=Name is required&$user_data");
		exit();
	} else if ($pass !== $re_pass) {
		header("Location: signup.php?error=The confirmation password does not match&$user_data");
		exit();
	} else {
		$sql = "SELECT * FROM user WHERE Email='$email'";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error= Email is taken. Please try another&$user_data");
			exit();
		} else {
			// Hash the password before storing it in the database
			$hashedPassword = md5($pass);

			$sql2 = "INSERT INTO user (Email, Password, Nom, Prenom) VALUES ('$email', '$hashedPassword', '$nom', '$prenom')";
			$result2 = mysqli_query($conn, $sql2);
			if ($result2) {
				header("Location: signup.php?success=Your account has been created successfully");
				exit();
			} else {
				header("Location: signup.php?error=Unknown error occurred&$user_data");
				exit();
			}
		}
	}
} else {
	header("Location: signup.php");
	exit();
}
?>
