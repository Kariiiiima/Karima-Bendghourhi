<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['email']) && isset($_POST['password'])) {

	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$email = validate($_POST['email']);
	$pass = validate($_POST['password']);

	if (empty($email)) {
		header("Location: index.php?error=User Name is required");
		exit();
	} else if (empty($pass)) {
		header("Location: index.php?error=Password is required");
		exit();
	} else {

		$sql = "SELECT * FROM user WHERE Email='$email'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
			$storedHashedPassword = $row['Password'];

			if (md5($pass) === $storedHashedPassword) {
				$_SESSION['Email'] = $row['Email'];
				$_SESSION['Nom'] = $row['Nom'];
				$_SESSION['USER_ID'] = $row['USER_ID'];
				header("Location: blogy/blog.html");
				exit();
			} else {
				header("Location: index.php?error=Incorrect User name or password");
				exit();
			}
		} else {
			header("Location: index.php?error=Incorrect User name or password");
			exit();
		}
	}
	
} else {
	header("Location:home.php");
	exit();
}
