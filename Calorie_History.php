<?php
session_start(); 
//index.php
$connect = mysqli_connect("localhost", "root","wit123", "fooddb");
$query = "SELECT * FROM cc";
$result = mysqli_query($connect, $query);
$chart_data = '';
while($row = mysqli_fetch_array($result))
{
 $chart_data .= "{calories:".$row["calories"].", date:".$row["date"]."}, ";
}
$chart_data = substr($chart_data, 0, -2);

?>


<!DOCTYPE html>
<html>
 <head>
  <title>Calories History </title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  <link rel="stylesheet" href="ch_css.css">
  <style type="text/css">
		.loginp
		{
			margin-left: 1500px;
			font-size:18px;
		}
	</style>
 </head>
 <body>
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
		<?php if(!isset($_SESSION['firstname'])){
		$message = "Please login first, if you dont have account please create an account. Thank you!";
		echo "<script type = 'text/javascript'>alert('$message'); window.location='mainPage.php'</script>";
		}
		if(isset($_SESSION['firstname'])){
			echo"<h4 class = 'loginp'>Welcome <a href='profile.php'>" .$_SESSION['firstname'] . "</a><h4>";
			echo "<a href='logout.php'><button id='myBtn2' class = 'loginp'>Login out</button></a>";
		}
	?>
	</h2>

	<h1 align="center">
		Calorie History Graph
	</h1>

   <div id="chart"></div>
 </body>
</html>

<script>
Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey: ['date'],
 ykeys:['calories'],
 labels:['calories'],
 hideHover:'auto',
 stacked:true
});
</script>