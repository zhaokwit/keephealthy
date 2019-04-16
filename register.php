<?php
    session_start();

    $db = mysqli_connect('localhost','root', 'wit123','fooddb');

    if(isset($_POST['register_btn'])){
        $fname = mysqli_real_escape_string($db, $_POST['firstName']);
        $middlename = mysqli_real_escape_string($db, $_POST['mName']);
        $lastname = mysqli_real_escape_string($db, $_POST['lastName']);
        $gen = mysqli_real_escape_string($db, $_POST['gender']);
        $dob = mysqli_real_escape_string($db, $_POST['dob']);
        $weight = mysqli_real_escape_string($db, $_POST['weight']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        $password2 = mysqli_real_escape_string($db, $_POST['confirmPassword']);  

        $message1="Registration is Done!";
        $message2="The two password do not match!";

        if($password == $password2){
            $sql = "INSERT INTO users(firstname, middlename, lastname, gender, dob, weight, email, password) VALUES('$fname', '$middlename', '$lastname', '$gen', '$dob', '$weight', '$email', '$password')";
            mysqli_query($db,$sql);
            $_SESSION['firstname'] = $fname;
            $_SESSION['middlename'] = $middlename;
            $_SESSION['lastname'] = $lastname;
            $_SESSION['gen'] = $gen;
            $_SESSION['dob'] = $dob;
            $_SESSION['weight'] = $weight;
            $_SESSION['email'] = $email;

            echo "<script type = 'text/javascript'>alert('$message1'); window.location='mainPage.php'</script>";

        }else{
            echo "<script type = 'text/javascript'>alert('$message2');</script>";
        }
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register-KHWHP</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <!-- Main css -->
    <link rel="stylesheet" href="css/register css.css">
</head>
<body>
	<!--menu-->
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

	<div class="main">

        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" class="register-form" id="register-form">
                            <!--First Name-->
                            <span class="require">*</span>
                            <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name zmdi-hc-2x"></i></label>
                                <input type="text" name="name" id="firstName" placeholder="First Name" required/>
                            </div>
                            <!--Last Name-->
                            <span class="require">*</span>
                             <div class="form-group">
                                <label for="name"><i class="zmdi zmdi-account material-icons-name zmdi-hc-2x"></i></label>
                                <input type="text" name="name" id="lastName" placeholder="Last Name" required/>
                            </div>

                            <!--Gender-->
                            <span class="require" >*</span>
                            <div class="form-group">
                                <div class="gender-input">
                                    <label for="gender"><i class="zmdi zmdi-male-female zmdi-hc-2x"></i></label>
                                   <input type="radio" id="gender_male" class="genderinput" name="gender" value="0" required/>
                                   <label class="male">Male </label>
                                    <input type="radio" id="gender_female" class="genderinput" name="gender" value="1" required/>  
                                    <label class="female">FeMale</label> 
                                </div>
                            </div>

                            <!--DOB-->
                            <span class="require">*</span>
                            <div class="form-group">
                                <label for="dob"><i class="zmdi zmdi-cake zmdi-hc-2x"></i></label>
                                <div class="dob-input">
                                    <input type="date" id="dob" name="dob" required/>
                                </div>
                                </div>

                             <!--weight-->
                             <span class="require">*</span>
                            <div class="form-group">
                                <div class="weight-input">
                                    <label for="weight"><i class="zmdi zmdi-male zmdi-hc-2x"></i></label>
                                    <input type="number" id="weight" name="weight" placeholder="Weight (kg)" required/>
                                 </div>
                            </div>

                            <!--email-->
                            <span class="require">*</span>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email zmdi-hc-2x"></i></label>
                                <input type="email" name="email" id="email" placeholder="Your Email" required/>
                            </div>

                            <!--confirm Password-->
                            <span class="require">*</span>
                            <div class="form-group">
                                <label for="password"><i class="zmdi zmdi-lock zmdi-hc-2x"></i></label>
                                <input type="password" name="password" id="password" placeholder="Please enter your password" required/>
                            </div>
                            <!--confirm Password-->
                            <span class="require">*</span>
                            <div class="form-group">
                                <label for="confirmPassword"><i class="zmdi zmdi-lock-outline zmdi-hc-2x"></i></label>
                                <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Please confirm your password" required/>
                            </div>
                            
                            <div class="form-group form-button">
                                <input type="submit" name="register_btn" id="registerButton-button" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="images/hotpot.jpg" alt="sing up image"></figure>
                        <a href="mainPage.php" style="modal.style.display="flex" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main-signup.js"></script>



<!-- old
    <div class="container">
        <div class="register-box">
            <div class="title-box">
                <span>Reigster</span>
            </div>
            <nav>
                <ul>
                  <li><a href=" ">Home</a> <span>&#124;</span></li>
                  <li><a href="#">About Hot Pot</a> <span>&#124;</span></li>
                  <li><a href="#">Calories Calculator</a> <span>&#124;</span></li>
                  <li><a href="#">History Calories</a> </li>
                </ul>
                 <br/><br/>
            </nav>

            <form method="post" action="register.php" id="registerForm">
                <div class="firstName-box">
                    <span class="require">*</span>
                    <label for="firstName">First Name</label>
                    <div class="firstName-input">
                        <input type="text" id="firstName" name="firstName" placeholder="Please enter your first name" required />
                    </div>
                </div>

                <div class="mName-box">
                    <label for="mName">Middle Name</label>
                    <div class="mName-input">
                        <input type="text" id="mName" name="mName" placeholder="Please enter your middle name" />
                    </div>
                </div>

                <div class="lastName-box">
                <span class="require">*</span>
                        <label for="lastName">Last Name</label>
                    <div class="lastName-input">
                        <input type="text" id="lastName" name="lastName" placeholder="Please enter your last name" required/>
                    </div>
                </div>

                <div class="gender-box">
                    <span class="require">*</span>
                    <label for="gender">Gender</label>
                    <div class="gender-input">
                        <input type="radio" id="gender_male" class="genderinput" name="gender" value="0" required/>Male   
                        <input type="radio" id="gender_female" class="genderinput" name="gender" value="1" required/>Female
                    </div>
                </div>
                <div class="dob-box">
                    <span class="require">*</span>
                    <label for="dob">DOB</label>
                    <div class="dob-input">
                        <input type="date" id="dob" name="dob" required/>
                    </div>
                </div>

                <div class="weight-box">
                    <span class="require">*</span>
                    <label for="weight">Weight</label>
                    <div class="weight-input">
                        <input type="number" id="weight" name="weight" placeholder="please enter your weight by kg" required/>
                    </div>
                </div>

                <div class="email-box">
                    <span class="require">*</span>
                    <label for="email">Email</label>
                    <div class="email-input">
                        <input type="email" id="email" name="email" placeholder="please enter your email ex:xxx@xxx.xxx" required />
                    </div>
                </div>

                <div class="password-box">
                    <span class="require">*</span>
                    <label for="password">Password</label>
                    <div class="password-input">
                        <input type="password" id="password" name="password" placeholder="please enter your password" required/>
                    </div>
                </div>

                <div class="confirmPassword-box">
                    <span class="require">*</span>
                    <label for="confirmPassword">Confirm Password</label>
                    <div class="confirmPassword-input">
                        <input type="password" id="confirmPassword" name="confirmPassword" placeholder="make sure your password matches" required/>
                    </div>
                </div>


                <div class="registerButton-box">
                    <input id = "registerButton-button" type="submit" name="register_btn" value="Register">
                </div>

                <bn/>

                <div class="goLogin-box">
                    <a href="mainPage.php" style="modal.style.display="flex">Already Have an account? Go Login</a>
                </div>
            </form>
        
        </div>
    </div>-->
</body>
</html>
