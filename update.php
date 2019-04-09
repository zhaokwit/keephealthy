<?php
session_start();

$db = mysqli_connect("localhost", "root", "wit123", "fooddb");

$weight = $_POST['weight'];
// To prevent mysql injection
$weight = stripcslashes($weight);
$weight = mysqli_real_escape_string($db, $weight);

$email = $_SESSION['email'];
$sql = "UPDATE users SET weight = '$weight' where email = '$email'";

if(mysqli_query($db, $sql)){
	echo "<script type = 'text/javascript'>alert('Update successfully!');window.location='mainPage.php';</script>";
}else{
	echo "<script type = 'text/javascript'>alert('Failed update');</script>";
}
?>