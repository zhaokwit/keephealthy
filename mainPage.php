<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="utf-8">
	<title>Keep Healthy with Hot Pot</title>
	<link rel="stylesheet" type="text/css" href="styles.css">
	<script type="text/javascript" src="account.js"></script>
</head>

<body>
	<div class="cc">

	</div>
	<header>
		<h1 id="mainHeader">Keep Healthy with Hot Pot</h1>
		<nav role="mainMenu">
			<a href="#">Home</a> |
			<a href="#">About Hot Pot</a> |
			<a href="#">Calories Calculator</a> |
			<a href="#">Calories Graph</a>
		</nav>
	</header>

	<div>
	<!-- to open popup window -->
	<?php if(!isset($_SESSION['firstname'])){
		echo "<p>Please log in</p>";
		echo "<button id='myBtn1'>Login/Sign up</button>";
		} 
		if(isset($_SESSION['firstname'])){
			echo"<h4>Welcome <a href='profile.php'>" .$_SESSION['firstname'] . "</a><h4>";
			echo "<a href='logout.php'><button id='myBtn2'>Login out</button></a>";
		}
	?>
	

	<!-- background change User login and login content-->
	<div id="myModal" class = "modal">

		<div class = "modalcontent">
			<div id="close">+</div>
			 <form action="process.php" method="post">
				<input type="Email" placeholder="E-mail" name="Email">

				<input type="Password" placeholder="Password" name="password">

				<p><input type="submit" id="btn" value="Login"/></p>
				<a href="register.php" class="button">Sign up</a>
			 </form>
		</div>
	</div>

	<section id = "category">
		<div>
			<a href="Meat.html"> <img src="images/meat.png" /></a></br>
			<h2>Meat</h2><br/><br/>
		</div>

		<div>
			<a href="Seafood.html"> <img src="images/Seafood.png" /></a></br>
			<h2>Seafood</h2><br/><br/>
		</div>

		<div>
			<a href="Vegetable.html"> <img src="images/vegetable.png" /></a></br>
			<h2>Vegetable</h2><br/><br/>
		</div>

		<div>
			<a href="Noodle.html"> <img src="images/noodle.png" /></a></br>
			<h2>Noodle</h2><br/><br/>
		</div>
	</section>
</body>
</html>
