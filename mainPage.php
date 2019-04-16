<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta charset="utf-8">
<title>Keep Healthy with Hot Pot</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript" src="jquery.slidertron-1.1.js"></script>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600|Archivo+Narrow:400,700" rel="stylesheet" type="text/css" />
<link href="mp_css.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" type="text/css" href="styles.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" src="account.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<style>
		
.timers{
	background-color: transparent;
    width: 500px;
    height: 480px;		  
    overflow: scroll;
    margin: 0 auto;
    position:absolute;
	z-index: 5;
	margin-top: -480px;
	margin-left: 440px;
	color:white;
	font-size: 23px;

}

#timer1{
	text-align: center;
	white-space: 
}
/* Clear floats after the columns */
		.row:after {
		  content: "";
		  display: table;
		  clear: both;
		}

		.column{
		text-align: center;
		margin-top: 20px;
		margin-bottom:20px;
		}

.timer_center
{
	display: block;
	margin-left: auto;
	margin-right: auto;
}

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

			<div id="banner">
				<!-- to open popup window -->
		<?php if(!isset($_SESSION['firstname'])){
		echo "<p class = 'loginp'>Please log in</p>";
		echo "<button id='myBtn1' class = 'loginp'>Login/Sign up</button>";
		}
		if(isset($_SESSION['firstname'])){
			echo"<h4 class = 'loginp'>Welcome <a href='profile.php'>" .$_SESSION['firstname'] . "</a><h4>";
			echo "<a href='logout.php'><button id='myBtn2' class = 'loginp'>Login out</button></a>";
		}
	?>
	<div id="slider">
		<div class="viewer">
			<div class="reel">
				<div class="slide">
					<h2>Meat</h2>
					<a class="link" href="meat.php"></a> <img src="images/meat_main.jpg" alt="" /> </div>
				<div class="slide">
					<h2>Seafood</h2>
					<a class="link" href="seafood.php"></a> <img src="images/seafood_main.jpg" alt="" /> </div>
				<div class="slide">
					<h2>Vegetable</h2>
					<a class="link" href="vegetable.php"></a> <img src="images/vege_main.jpg" alt="" /> </div>
				<div class="slide">
					<h2>Noodle</h2>
					<a class="link" href="Noodle.php"></a> <img src="images/noodle_main.jpg" alt="" /> </div>	
			</div>
		</div>
		<div class="indicator">
			<ul>
				<li class="active">1</li>
				<li>2</li>
				<li>3</li>
				<li>4</li>
			</ul>
		</div>
	</div>
	<script type="text/javascript">
		$('#slider').slidertron({
			viewerSelector: '.viewer',
			reelSelector: '.viewer .reel',
			slidesSelector: '.viewer .reel .slide',
			advanceDelay: 3000,
			speed: 'slow',
			navPreviousSelector: '.previous-button',
			navNextSelector: '.next-button',
			indicatorSelector: '.indicator ul li',
			slideLinkSelector: '.link'
		});
	</script> 
</div>


	<!-- background change User login and login content-->
	<section class="sign-in">
		<div class="container">
			<div class="signin-content">
				<div id="myModal" class = "modal">

					<div class = "modalcontent">
                    <div class="signin-image">
                    	<figure><img src="images/signin-image.jpg" alt="sing up image"></figure>
                        <a href="#" class="signup-image-link">Create an account</a>
                    </div>

                    <div id="close">+</div>
                    <div class="signin-form">
                        <h2 class="form-title">Login</h2>
                        <form method="POST" action = process.php class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email zmdi-hc-2x"></i></label>
                                <input type="email" name="Email" id="email" placeholder="Your Email" required/>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock zmdi-hc-2x"></i></label>
                                <input type="password" name="password" id="Password" placeholder="Password"/>
                            </div>
                            
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                    </div>
                </div>
                    </div>

                    	<!--
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
						</div>-->
					</div>
				</div>
		</div>	
	</section>

	
<div id="wrapper">
	<div id="featured" class="container">
		<h2 class="title">Timer</h2>

		<div class="timer_overlap">
			<img src="images/timer.jpg" alt="" class="timer_center"/>
			<div class= "timers">

			<div class="row">
				<div class="column" id="item1" style="display: none; margin-left:215px">
					Pork
				</div>
				<div class="column" id="timer1" >
				</div>

				<div class="column" id="item2" style="display: none; margin-left:215px" >
					Beef
				</div>
				<div class="column" id="timer2"  >
				</div>
				<div class="column" id="item3" style="display: none; margin-left:215px" >
					Lamb
				</div>
				<div class="column" id="timer3" >
				</div>
				<div class="column" id="item4" style="display: none; margin-left:215px" >
					Fish
				</div>
				<div class="column" id="timer4" >
				</div>
				<div class="column" id="item5" style="display: none; margin-left:215px" >
					Shrimp
				</div>
				<div class="column" id="timer5" >
				</div>
				<div class="column" id="item6" style="display: none; margin-left:215px" >
					Clam
				</div>
				<div class="column" id="timer6" >
				</div>
				<div class="column" id="item7" style="display: none; margin-left:215px" >
					Mushroom
				</div>
				<div class="column" id="timer7" >
				</div>
				<div class="column" id="item8" style="display: none; margin-left:215px" >
					Lettuce
				</div>
				<div class="column" id="timer8" >
				</div>
				<div class="column" id="item9" style="display: none; margin-left:215px" >
					Tofu
				</div>
				<div class="column" id="timer9" >
				</div>
				<div class="column" id="item10" style="display: none; margin-left:215px" >
					Rice noodle
				</div>
				<div class="column" id="timer10" >
				</div>
				<div class="column" id="item11" style="display: none; margin-left:215px" >
					Udon
				</div>
				<div class="column" id="timer11" >
				</div>
				<div class="column" id="item12" style="display: none; margin-left:215px" >
					Sweet potato noodle
				</div>
				<div class="column" id="timer12" >
				</div>

				

			</div>
		</div>
	</div>
	</div>

	
	
		<div id="page" class="container">
		
	</div>
</div>
<!--
		check if time is set
	-->

 	 <?php 
		if(isset($_SESSION['time1'])){
			$_SESSION['time1']=$_SESSION['time1'];
		}else{
			$_SESSION['time1']=0;
		}
		if(isset($_SESSION['time2'])){
			$_SESSION['time2']=$_SESSION['time2'];
		}else{
			$_SESSION['time2']=0;
		}
		if(isset($_SESSION['time3'])){
			$_SESSION['time3']=$_SESSION['time3'];
		}else{
			$_SESSION['time3']=0;
		}
		if(isset($_SESSION['time4'])){
			$_SESSION['time4']=$_SESSION['time4'];
		}else{
			$_SESSION['time4']=0;
		}
		if(isset($_SESSION['time5'])){
			$_SESSION['time5']=$_SESSION['time5'];
		}else{
			$_SESSION['time5']=0;
		}
		if(isset($_SESSION['time6'])){
			$_SESSION['time6']=$_SESSION['time6'];
		}else{
			$_SESSION['time6']=0;
		}
		if(isset($_SESSION['time7'])){
			$_SESSION['time7']=$_SESSION['time7'];
		}else{
			$_SESSION['time7']=0;
		}
		if(isset($_SESSION['time8'])){
			$_SESSION['time8']=$_SESSION['time8'];
		}else{
			$_SESSION['time8']=0;
		}
		if(isset($_SESSION['time9'])){
			$_SESSION['time9']=$_SESSION['time9'];
		}else{
			$_SESSION['time9']=0;
		}
		if(isset($_SESSION['time10'])){
			$_SESSION['time10']=$_SESSION['time10'];
		}else{
			$_SESSION['time10']=0;
		}
		if(isset($_SESSION['time11'])){
			$_SESSION['time11']=$_SESSION['time11'];
		}else{
			$_SESSION['time11']=0;
		}
		if(isset($_SESSION['time12'])){
			$_SESSION['time12']=$_SESSION['time12'];
		}else{
			$_SESSION['time12']=0;
		}
	?>
	
<div id="footer">
	
</div>

</body>
		<script type = 'text/javascript'>

		var time1 = <?php echo json_encode($_SESSION['time1']); ?>;	
		var time2 = <?php echo json_encode($_SESSION['time2']); ?>;	
		var time3 = <?php echo json_encode($_SESSION['time3']); ?>;
		var time4 = <?php echo json_encode($_SESSION['time4']); ?>;	
		var time5 = <?php echo json_encode($_SESSION['time5']); ?>;	
		var time6 = <?php echo json_encode($_SESSION['time6']); ?>;
		var time7 = <?php echo json_encode($_SESSION['time7']); ?>;	
		var time8 = <?php echo json_encode($_SESSION['time8']); ?>;	
		var time9 = <?php echo json_encode($_SESSION['time9']); ?>;
		var time10 = <?php echo json_encode($_SESSION['time10']); ?>;	
		var time11 = <?php echo json_encode($_SESSION['time11']); ?>;	
		var time12 = <?php echo json_encode($_SESSION['time12']); ?>;

	
		if(time1 == 0){
			document.getElementById('timer1').style.display='none';
		}else{
			document.getElementById('item1').style.display='inline';
		}
		if(time2 == 0){
			document.getElementById('timer2').style.display='none';
		}else{
			document.getElementById('item2').style.display='inline';
		}
		if(time3 == 0){
			document.getElementById('timer3').style.display='none';
		}else{
			document.getElementById('item3').style.display='inline';
		}
		if(time4 == 0){
			document.getElementById('timer4').style.display='none';
		}else{
			document.getElementById('item4').style.display='inline';
		}
		if(time5 == 0){
			document.getElementById('timer5').style.display='none';
		}else{
			document.getElementById('item5').style.display='inline';
		}
		if(time6 == 0){
			document.getElementById('timer6').style.display='none';
		}else{
			document.getElementById('item6').style.display='inline';
		}
		if(time7 == 0){
			document.getElementById('timer7').style.display='none';
		}else{
			document.getElementById('item7').style.display='inline';
		}
		if(time8 == 0){
			document.getElementById('timer8').style.display='none';
		}else{
			document.getElementById('item8').style.display='inline';
		}
		if(time9 == 0){
			document.getElementById('timer9').style.display='none';
		}else{
			document.getElementById('item9').style.display='inline';
		}
		if(time10 == 0){
			document.getElementById('timer10').style.display='none';
		}else{
			document.getElementById('item10').style.display='inline';
		}
		if(time11 == 0){
			document.getElementById('timer11').style.display='none';
		}else{
			document.getElementById('item11').style.display='inline';
		}
		if(time12 == 0){
			document.getElementById('timer12').style.display='none';
		}else{
			document.getElementById('item12').style.display='inline';
		}

		var addTimer = function () {     
        var list = [],     
            interval;     
    
        return function (id, time) {     
            if (!interval)     
                interval = setInterval(go, 1000);     
            list.push({ ele: document.getElementById(id), time: time });     
        }     
    
        function go() {     
            for (var i = 0; i < list.length; i++) { 
            	if(list[i]){
            		list[i].ele.innerHTML = getTimerString(list[i].time ? list[i].time -= 1 : 0);     
	                if (!list[i].time)     
	                    list.splice(i--, 1);	
            	}    
                     
            }     
        }     
    
        function getTimerString(time) {         
                m = Math.floor(((time % 86400) % 3600) / 60),     
                s = Math.floor(((time % 86400) % 3600) % 60);     
            if (time>0)     
                return   m + "m" + ":" + s + "s";       
            else return " is ready to eat! Enjoy :)";     
        }     
    }();
    


	//   // console.log(array[i]);
	// }

    addTimer("timer1", time1);  
    addTimer("timer2", time2); 
    addTimer("timer3", time3);
    addTimer("timer4", time4);  
    addTimer("timer5", time5); 
    addTimer("timer6", time6); 
    addTimer("timer7", time7);  
    addTimer("timer8", time8); 
    addTimer("timer9", time9); 
    addTimer("timer10", time10);  
    addTimer("timer11", time11); 
    addTimer("timer12", time12);     
  

</script>
</html>
