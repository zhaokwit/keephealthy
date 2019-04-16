<?php
session_start();
$db = mysqli_connect("localhost", "root", "wit123", "fooddb");

if(isset($_SESSION['email'])){
	$email=$_SESSION['email'];
}else{
	$email = "";
}

if(isset($_SESSION['foodselect'])){
	$foodname = $_SESSION['foodselect'];
}else{
	$foodname = "";
}

$result = mysqli_query($db, "select * from fooddetail where fooditem = '$foodname'") or die("Failed to query database " .mysqli_error($db));

$row = mysqli_fetch_array($result);
		$_SESSION['fooditem'] = $row['fooditem'];
        $_SESSION['category'] = $row['category'];
        $_SESSION['calories'] = $row['calories'];
        $_SESSION['cooktime'] = $row['cooktime'];


if(isset($_POST['startbtn7'])){
	$minutes7 = mysqli_real_escape_string($db, $_POST['minutes7']);
	$second7 = mysqli_real_escape_string($db, $_POST['second7']);
	$time7 = $minutes7*60+$second7;
	$_SESSION['time7'] = $time7;
	$sql = "INSERT INTO usersfood(Email, Food, Calorie) values('$email', 'Mashroom', '45')";
	mysqli_query($db,$sql);
	header("Location: mainPage.php");
}

if(isset($_POST['startbtn8'])){
	$minutes8 = mysqli_real_escape_string($db, $_POST['minutes8']);
	$second8 = mysqli_real_escape_string($db, $_POST['second8']);
	$time8 = $minutes8*60+$second8;
	$_SESSION['time8'] = $time8;
	$sql = "INSERT INTO usersfood(Email, Food, Calorie) values('$email', 'Lettuce', '13')";
	mysqli_query($db,$sql);

	header("Location: mainPage.php");
}

if(isset($_POST['startbtn9'])){
	$minutes9 = mysqli_real_escape_string($db, $_POST['minutes9']);
	$second9 = mysqli_real_escape_string($db, $_POST['second9']);
	$time9 = $minutes9*60+$second9;
	$_SESSION['time9'] = $time9;
	$sql = "INSERT INTO usersfood(Email, Food, Calorie) values('$email', 'Tofu', '45')";
	mysqli_query($db,$sql);

	header("Location: mainPage.php");
}


?>

<!DOCTYPE html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />
	<title>Vegetable Section</title>
	<script type="text/javascript" src="account.js"></script>
	<style type="text/css">
		.loginp
		{
		margin-left: 1500px;
		font-size:18px;
		}
	</style>
	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
</head>
<body>
	<div id="fh5co-page">
		<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
		<header id="header">
				<div class="inner">
					<a href="mainPage.php" class="logo">Keep Healthy with Hot Pot</a>
					<nav id="nav">
						<a href="mainPage.php">Home</a>
						<a href="About_Hot_Pot.html">About Hot Pot</a>
						<a href="Calories_Calculator.php">Calorie Calculater</a>
						<a href="Calorie_History.php">Calorie History Graph</a>
					</nav>
				</div>
			</header>
			<a href="#menu" class="navPanelToggle"><span class="fa fa-bars"></span></a>
			
	<h2>
			<!-- to open popup window -->
			<?php
			if(isset($_SESSION['firstname'])){
				echo"<h4 class = 'loginp'>Welcome <a href='profile.php'>" .$_SESSION['firstname'] . "</a><h4>";
				echo "<a href='logout.php'><button id='myBtn2' class = 'loginp'>Login out</button></a>";
			}
		?>
	</h2>

<!-- main content -->
	<div id="fh5co-main">

		<div class="fh5co-narrow-content">
			<h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Category: <span>Vegetable</span></h2>
			<div class="row animate-box" data-animate-effect="fadeInLeft">
		<!--Mushroom-->
		<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">
			<figure >
				<p>
					<img src= "images/Mushroom.jpg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
				</p>
				<figcaption>
					<h2> Mushroom </h2>
					<?php $_SESSION['foodselect']='mushroom';?>
					<?php include 'grabfooddb.php';?>
					<h3>Calories: <?php echo $_SESSION['calories']; ?>/handful</h3>
				</figcaption>
			</figure>

			<form method="post" class="fh5co-work-title" action="Vegetable.php">
				<label>Quantity:</label>
				<input type="number" min="0" max="20" name="qty"><br/><br/>
				<label>Cook time:</label>
				<input type="number" min="0" max="59" placeholder="min" name="minutes7" value="03"><span>&#58;</span>
				<input type="number" min="0" max="59" placeholder="sec" name="second7" value="00"><br/><br/>
				<input id="start_timer7" type="submit" name="startbtn7" value="Start"><br/><br/>
			</form>
		</div>

		<!--Lettuce-->
		<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">
			<figure >
				<p>
					<img src= "images/Lettuce.jpg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
				</p>
				<figcaption>
					<h2> Lettuce </h2>
					<?php $_SESSION['foodselect']='lettuce';?>
					<?php include 'grabfooddb.php';?>
					<h3>Calories: <?php echo $_SESSION['calories']; ?>/slice</h3>
				</figcaption>
			</figure>

			<form method="post" class="fh5co-work-title" action="Vegetable.php">
				<label>Quantity:</label>
				<input type="number" min="0" max="20" name="qty"><br/><br/>
				<label>Cook time:</label>
				<input type="number" min="0" max="59" placeholder="min" name="minutes8" value="01"><span>&#58;</span>
				<input type="number" min="0" max="59" placeholder="sec" name="second8" value="00"><br/><br/>
				<input id="start_timer8" type="submit" name="startbtn8" value="Start"><br/><br/>
			</form>
		</div>

		<!--Tofu-->
		<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">
			<figure >
				<p>
					<img src= "images/Tofu.jpg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
				</p>
				<figcaption>
					<h2> Tofu </h2>
					<?php $_SESSION['foodselect']='tofu';?>
					<?php include 'grabfooddb.php';?>
					<h3>Calories: <?php echo $_SESSION['calories']; ?>/piece</h3>
				</figcaption>
			</figure>

			<form method="post" class="fh5co-work-title" action="Vegetable.php">
				<label>Quantity:</label>
				<input type="number" min="0" max="20" name="qty"><br/><br/>
				<label>Cook time:</label>
				<input type="number" min="0" max="59" placeholder="min" name="minutes9" value="02"><span>&#58;</span>
				<input type="number" min="0" max="59" placeholder="sec" name="second9" value="00"><br/><br/>
				<input id="start_timer9" type="submit" name="startbtn9" value="Start"><br/><br/>
			</form>
		</div>

		<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Stellar -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Counters -->
	<script src="js/jquery.countTo.js"></script>
	
	
	<!-- MAIN JS -->
	<script src="js/main.js"></script>

</body>
</html>
