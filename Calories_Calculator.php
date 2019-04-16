<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Calorie Calculator</title>
	<link rel="stylesheet" href="calorie calculator.css">
	<style type="text/css">
		.loginp
		{
			margin-left: 1500px;
			font-size:18px;
		}
	</style>

	<script type="text/javascript">

		function togglecheckboxes(master,group){
		var cbarray = document.getElementsByClassName(group);
		for(var i = 0; i < cbarray.length; i++){
			var cb = document.getElementById(cbarray[i].id);
			cb.checked = master.checked;
			}
		if(!cb.checked){
			!master.checked;
		}
	}
	
	window.onload = function(){

	var calbtn = document.getElementById('calculate_button');
	calbtn.onclick = function(){
		//get caloriesOfThe Meal from database
		var caloriesOfTheMeal = 800;
		//get caloriesOfTotal after calculate
		var caloriesOfTotal = 0;

		var sessionGen =  <?php echo json_encode($_SESSION['gen']); ?>;
		var curretYear = new Date().getFullYear();
		var age = curretYear - <?php echo json_encode($_SESSION['year']); ?>;
		var weight = <?php echo json_encode($_SESSION['weight']); ?>;


		//calculate caloriesOfTotal
		if(sessionGen == 0)
		{
			//0 is male
			//age 3-9
			if(age >= 3 && age <=9){
				caloriesOfTotal=22.7 * weight + 495;
			}
			//age 10-17
			else if(age >= 10 && age <= 17)
			{
				caloriesOfTotal = 17.5 * weight + 651;
			}
			//age 18-29
			else if(age >= 18 && age <= 29)
			{
				caloriesOfTotal = 15.3 * weight + 679;
			}
			//age 30-60
			else if(age >= 30 && age <= 60)
			{
				caloriesOfTotal = 11.6 * weight + 879;
			}
			//over 60 and under 3
			else
			{
				caloriesOfTotal = 13.5 * weight + 487;
			}
		}
		else if(sessionGen == 1)
		{
			//1 is female
			//age 3-9
			if(age >= 3 && age <= 9)
			{
				caloriesOfTotal = 22.5 * weight + 499;
			}
			//age 10-17
			else if(age >= 10 && age <= 17)
			{
				caloriesOfTotal = 12.2 * weight + 746;
			}
			//age 18-29
			else if(age >= 18 && age <= 29)
			{
				caloriesOfTotal = 14.7 * weight + 496;
			}
			//age 30-60
			else if(age >= 30 && age <= 60)
			{
				caloriesOfTotal = 8.7 * weight + 829;
			}
			//
			//age 60 and under 3
			else
			{
				caloriesOfTotal = 10.5 * weight + 596;
			}
		}
	
		//result output
		if(caloriesOfTheMeal < caloriesOfTotal)
		{
			alert("The total calories that you have ate for the meal out of the total calories that you should have for your day based on your information is: " + caloriesOfTheMeal + "/" + caloriesOfTotal + " Do better! keep healthy with Hot Pot" + weight);
		
		}
		else if(caloriesOfTheMeal = caloriesOfTotal)
		{
			alert("The total calories that you have ate for the meal out of the total calories that you should have for your day based on your information is: " + caloriesOfTheMeal + "/" + caloriesOfTotal + " Keep it up! keep healthy with Hot Pot"+ weight);
		}
		else
		{
			alert("The total calories that you have ate for the meal out of the total calories that you should have for your day based on your information is: " + caloriesOfTheMeal + "/" + caloriesOfTotal + " Great job! keep healthy with Hot Pot"+ weight);
		}

		
	}
}


	</script>
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

	<h1>
		Calorie Calculator
	</h1>
		
		<input type="checkbox" id="select_All" onchange="togglecheckboxes(this,'cbgroup1')" value="Select All">  
		<div id = "select_All_text"> Select All </div> <br/><br/>
		
	

		<div class="cc">
			
			<br/><br/>
			<input type="checkbox" id="cb1_1" class="cbgroup1" name="cbg1[]" value="1"> Item 1<br>
			<input type="checkbox" id="cb1_2" class="cbgroup1" name="cbg1[]" value="2"> Item 2<br>
			<input type="checkbox" id="cb1_3" class="cbgroup1" name="cbg1[]" value="3"> Item 3<br>
			<input type="checkbox" id="cb1_4" class="cbgroup1" name="cbg1[]" value="4"> Item 4<br>	
		</div>

         <input id = "calculate_button" type="submit" value="Calculate"/>
   	


</body>
</html>
