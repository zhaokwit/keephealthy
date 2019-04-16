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


if(isset($_POST['startbtn1'])){
	$minutes1 = mysqli_real_escape_string($db, $_POST['minutes1']);
	$second1 = mysqli_real_escape_string($db, $_POST['second1']);
	$time1 = $minutes1*60+$second1;
	$_SESSION['time1'] = $time1;
	$sql = "INSERT INTO usersfood(Email, Food, Calorie) values('$email', 'pork', '60')";
	mysqli_query($db,$sql);
	header("Location: mainPage.php");
}

if(isset($_POST['startbtn2'])){
	$minutes2 = mysqli_real_escape_string($db, $_POST['minutes2']);
	$second2 = mysqli_real_escape_string($db, $_POST['second2']);
	$time2 = $minutes2*60+$second2;
	$_SESSION['time2'] = $time2;
	$sql = "INSERT INTO usersfood(Email, Food, Calorie) values('$email', 'beef', '45')";
	mysqli_query($db,$sql);
	header("Location: mainPage.php");
}

if(isset($_POST['startbtn3'])){
	$minutes3 = mysqli_real_escape_string($db, $_POST['minutes3']);
	$second3 = mysqli_real_escape_string($db, $_POST['second3']);
	$time3 = $minutes3*60+$second3;
	$_SESSION['time3'] = $time3;
	$sql = "INSERT INTO usersfood(Email, Food, Calorie) values('$email', 'lamb', '51')";
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
	<title>Meat Section</title>
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
				<h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Category: <span>Meat</span></h2>
				<div class="row animate-box" data-animate-effect="fadeInLeft">

			<!--Pork-->
			<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">
				<figure >
					<p>
					<img src= "images/Pork.jpg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
				</p>
					<figcaption>
						<h2> Pork </h2>
						<?php $_SESSION['foodselect']='pork';?>
						<?php include 'grabfooddb.php';?>
						<h3>Calories: <?php echo $_SESSION['calories']; ?>/slice</h3>
					</figcaption>
				</figure>

				<form method="post" class="fh5co-work-title" action="Meat.php">
					<label>Quantity:</label>
					<input type="number" min="0" max="20" name="qty"><br/><br/>
					<label>Cook time:</label>
					<input type="number" min="0" max="59" placeholder="min" name="minutes1" value="00"><span>&#58;</span>
					<input type="number" min="0" max="59" placeholder="sec" name="second1" value="30"><br/><br/>
					<input id="start_timer1" type="submit" name="startbtn1" value="Start"><br/><br/>
				</form>
			</div>


			<!--Beef-->
			<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">
			<figure>
				<p>
				<img src= "images/Beef.png" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
				</p>

				<figcaption>
					<h2> Beef </h2>
					<?php $_SESSION['foodselect']='beef';?>
					<?php include 'grabfooddb.php';?>
					<h3>Calories:<?php echo $_SESSION['calories']; ?>/slice</h3>
				</figcaption>

			</figure>

			<form method="post" class="fh5co-work-title" action="Meat.php" >
				<label>Quantity:</label>
				<input type="number" min="0" max="20" name="qty"><br/><br/>
				<label>Cook time:</label>
				<input type="number" min="0" max="59" placeholder="min" name="minutes2" value="00"> <span>&#58;</span>
				<input type="number" min="0" max="59" placeholder="sec" name="second2" value="30"><br/><br/>
				<input id="start_timer2" type="submit" name="startbtn2" value="Start"><br/><br/>
			</form>
		</div>

		<!--lamb-->
		<div class="clearfix visible-sm-block"></div>
		<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">
		<figure>
			<p>
				<img src= "images/Lamb.jpg" alt="Free HTML5 Website Template by FreeHTML5.co" class="img-responsive">
			</p>
			<figcaption>
				<h2> Lamb </h2>
				<?php $_SESSION['foodselect']='lamb';?>
				<?php include 'grabfooddb.php';?>
				<h3>Calories:<?php echo $_SESSION['calories']; ?>/slice</h3>
			</figcaption>
		</figure>

		<form method="post" class="fh5co-work-title" action = "Meat.php">
			<label>Quantity:</label>
			<input type="number" min="0" max="20" name="qty"><br/><br/>
			<label>Cook time:</label>
			<input type="number" min="0" max="59" placeholder="min" name="minutes3" value="00"> <span>&#58;</span>
			<input type="number" min="0" max="59" placeholder="sec" name="second3" value="30"><br/><br/>
			<input id="start_timer3" type="submit" name="startbtn3" value="Start"><br/><br/>
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
