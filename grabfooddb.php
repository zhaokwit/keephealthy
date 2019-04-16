<?php
	$foodname = $_SESSION['foodselect'];
	$result = mysqli_query($db, "select * from fooddetail where fooditem = '$foodname'") or die("Failed to query database " .mysqli_error($db));

	$row = mysqli_fetch_array($result);
	$_SESSION['fooditem'] = $row['fooditem'];
    $_SESSION['category'] = $row['category'];
    $_SESSION['calories'] = $row['calories'];
    $_SESSION['cooktime'] = $row['cooktime'];
?>