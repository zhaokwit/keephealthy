<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Calorie Calculator</title>
	<link rel="stylesheet" href="calorie calculator.css">
	<script>
	function togglecheckboxes(master,group){
		var cbarray = document.getElementsByClassName(group);
		for(var i = 0; i < cbarray.length; i++){
			var cb = document.getElementById(cbarray[i].id);
			cb.checked = master.checked;
		}
	}
		<?php

		//get caloriesOfThe Meal from database
		$caloriesOfTheMeal = 1000;
		//calculate caloriesOfTotal
		$caloriesOfTotal=0;
		if($_SESSION['gen'] == 0)
		{
			//0 is male
			//age 18-30
			$currentYear = date("Y");
			$age = $currentYear - $_SESSION['year'];
			if($age >= 18 && $age <= 30)
			{
				$caloriesOfTotal = (15.2 * $_SESSION['weight'] +680) * 1000;
			}
			//age 31-60
			else if($age > 31 && $age <= 60)
			{
				$caloriesOfTotal = (11.5 * $_SESSION['weight'] +830) * 1000;
			}
			//age above 60
			else if($age > 60)
			{
				$caloriesOfTotal = (13.4 * $_SESSION['weight'] +490) * 1000;
			}
			//other age
			else
			{
				$caloriesOfTotal = ($_SESSION['weight'] * 10) *1000;
			}
		}
		else if($_SESSION['gen'] == 1)
		{
			//1 is female
			//age 18-30
			$currentYearF = date("Y");
			$ageF = $currentYearF - $_SESSION['year'];
			if($ageF >= 18 && $ageF <= 30)
			{
				$caloriesOfTotal = (14.6 * $_SESSION['weight'] + 450) * 1000;
			}
			//age 31-60
			else if($ageF >= 31 && $ageF <= 60)
			{
				$caloriesOfTotal = (8.6 * $_SESSION['weight'] + 830) * 1000;
			}
			//age above 60
			else if($ageF > 60)
			{
				$caloriesOfTotal = (10.4 * $_SESSION['weight'] +600) * 1000;
			}
			//other age
			else
			{
				$caloriesOfTotal = ($_SESSION['weight'] * 9) *1000;
			}
		}

		//result output
		if($caloriesOfTheMeal < $caloriesOfTotal)
		{
			$message1="The total calories that you have ate for the meal out of the total calories that you should have for your day based on your information is: ".$caloriesOfTheMeal."/".$caloriesOfTotal."Great job! keep healthy with Hot Pot";
			
		}
		else if($caloriesOfTheMeal == $caloriesOfTotal)
		{
			$message2="The total calories that you have ate for the meal out of the total calories that you should have for your day based on your information is: ".$caloriesOfTheMeal."/".$caloriesOfTotal." Keep it up! keep healthy with Hot Pot";
			echo "<script type = 'text/javascript'>alert('$message2')</script>"; 
		}
		else
		{
			$message3="The total calories that you have ate for the meal out of the total calories that you should have for your day based on your information is: ".$caloriesOfTheMeal. "/" . $caloriesOfTotal." Do better! keep healthy with Hot Pot";
			echo "<script type = 'text/javascript'>alert('$message3')</script>"; 
		}

		?>
	
	</script>
</head>
<body>

	<h2>
		<a href="#">Profile</a>
	</h2>

	<h1>
		Calorie Calculator
	</h1>

	<nav>
		<ul>
		  <li><a href="#">Home</a> <span>&#124;</span></li>
		  <li><a href="#">About Hot Pot</a> <span>&#124;</span></li>
		  <li><a href="#">Calories Calculator</a> <span>&#124;</span></li>
		  <li><a href="#">History Calories</a> </li><br/><br/>
		  </ul>
	</nav>


		
		<input type="checkbox" id="select_All" onchange="togglecheckboxes(this,'cbgroup1')" value="Select All">  
		<div id = "select_All_text"> Select All </div> <br/><br/>
	

		<div class="cc">
			
			<br/><br/>
			<input type="checkbox" id="cb1_1" class="cbgroup1" name="cbg1[]" value="1"> Item 1<br>
			<input type="checkbox" id="cb1_2" class="cbgroup1" name="cbg1[]" value="2"> Item 2<br>
			<input type="checkbox" id="cb1_3" class="cbgroup1" name="cbg1[]" value="3"> Item 3<br>
			<input type="checkbox" id="cb1_4" class="cbgroup1" name="cbg1[]" value="4"> Item 4<br>	
		</div>

		<form method = "post" action="Calories_Calculator.php">
         <input id = "calculate_button" type="submit" value="Calculate"/>
        </form>
   	


</body>
</html>
