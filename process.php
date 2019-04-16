<?php
session_start();
	// connect to the server and select database
	$db = mysqli_connect("localhost", "root", "wit123", "fooddb");

	// Get values passe from mainPage.php
	$email = $_POST['Email'];
	$password = $_POST['password'];

	// To prevent mysql injection
	$email = stripcslashes($email);
	$password = stripcslashes($password);
	$email	= mysqli_real_escape_string($db, $email);
	$password	= mysqli_real_escape_string($db, $password);



	// Query the database for user
	$result = mysqli_query($db, "select * from users where email ='$email' and password = '$password'") or die("Failed to query database " .mysqli_error($db));

	$row = mysqli_fetch_array($result);
	if($row['email'] == $email && $row['password'] == $password){
		$_SESSION['firstname'] = $row['firstname'];
		$fname=$_SESSION['firstname'];
		$_SESSION['middlename'] = $row['middlename'];
		$_SESSION['lastname'] = $row['lastname'];
		$_SESSION['gen'] = $row['gender'];
		$_SESSION['dob'] = $row['dob'];
		$_SESSION['year'] = date("Y", strtotime($_SESSION['dob']));
		$_SESSION['weight'] = $row['weight'];
		$_SESSION['email'] = $row['email'];
		$message = "You have been log in successfully as " . $fname;

		echo "<script type = 'text/javascript'>alert('$message'); window.location='mainPage.php'</script>";
	}else{
		echo "<script type = 'text/javascript'>alert('Invalid E-mail or Password'); window.location='mainPage.php'</script>";
	}
?>