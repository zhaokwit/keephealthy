<?php
session_start();

$db = mysqli_connect("localhost", "root", "wit123", "fooddb");

$weight = $_POST['weight'];
// To prevent mysql injection
$weight = stripcslashes($weight);
$weight = mysqli_real_escape_string($db, $weight);

$email = $_SESSION['email'];
$sql = "UPDATE users SET weight = '$weight' where email = '$email'";

// Query the database for user
	$result = mysqli_query($db, "select * from users where email ='$email'") or die("Failed to query database " .mysqli_error($db));

	$row = mysqli_fetch_array($result);
		$_SESSION['firstname'] = $row['firstname'];
		$_SESSION['middlename'] = $row['middlename'];
		$_SESSION['lastname'] = $row['lastname'];
		$_SESSION['gen'] = $row['gender'];
		$_SESSION['dob'] = $row['dob'];
		$_SESSION['year'] = date("Y", strtotime($_SESSION['dob']));
		$_SESSION['weight'] = $row['weight'];
		$_SESSION['email'] = $row['email'];

if(mysqli_query($db, $sql)){
	echo "<script type = 'text/javascript'>alert('Update successfully!');window.location='mainPage.php';</script>";
}else{
	echo "<script type = 'text/javascript'>alert('Failed update');</script>";
}
?>