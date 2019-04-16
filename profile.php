<?php
session_start();
$db = mysqli_connect("localhost", "root", "wit123", "fooddb");

$email = $_SESSION['email'];
$result = mysqli_query($db, "select * from users where email ='$email'") or die("Failed to query database " .mysqli_error($db));

$row = mysqli_fetch_array($result);
$_SESSION['firstname'] = $row['firstname'];
        $_SESSION['middlename'] = $row['middlename'];
        $_SESSION['lastname'] = $row['lastname'];
        $_SESSION['gen'] = $row['gender'];
        $_SESSION['dob'] = $row['dob'];
        $_SESSION['year'] = date("Y", strtotime($_SESSION['dob']));
        $_SESSION['weight'] = $row['weight'];
        $_SESSION['email'] = $row['email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
    <script type="text/javascript" src="cancelbtn.js"></script>
    <style type="text/css">
    body,input{
        margin: 0;
        padding: 0;
        background: lightblue;
    }
    input{
        display: inline-block;
        background: #fff;
    }
    .container{
        width: 100%;
    }
    .profile-box{
        position: relative;
        height: 550px;
        width: 800px;
        top: 50px;
        margin: 0 auto;
        z-index: 99999;
        background:#ffffff;
        border: 7px solid #ccc;
    }
    .title-box{
        position: absolute;
        width: 300px;
        height: 50px;
        margin-left: 250px;
        margin-top: 5px;
        text-align: center;
        font-size: 28px;
        font-weight: 800;
        color: brown;
        line-height: 50px;
    }
    .firstName-box{
        position: absolute;
        width: 420px;
        height: 40px;
        line-height: 40px;
        margin-top:-20px;
        margin-left:80px;
        font-weight: 700;
    }
    .firstName-input{
        display: inline-block;
        margin-left: 28px;
    }
    #firstName{
        height: 35px;
        width: 290px;
        border: 2px solid #ccc;
        border-radius: 5px;
    }
     .mName-box{
        position: absolute;
        width: 420px;
        height: 40px;
        line-height: 40px;
        margin-top:50px;
        margin-left:80px;
        font-weight: 700;
    }
     .mName-input{
        display: inline-block;
        margin-left: 28px;
    }
     #mName{
        height: 35px;
        width: 290px;
        border: 2px solid #ccc;
        border-radius: 5px;
    }
    .lastName-box{
        position: absolute;
        width: 420px;
        height: 40px;
        line-height: 40px;
        margin-top:100px;
        margin-left:80px;
        font-weight: 700;
    }
    .lastName-input{
        display: inline-block;
        margin-left: 28px;
    }
    #lastName{
        height: 35px;
        width: 290px;
        border: 2px solid #ccc;
        border-radius: 5px;
    }
    .gender-box{
        position: absolute;
        width: 420px;
        height: 40px;
        line-height: 40px;
        margin-top:150px;
        margin-left:80px;
        font-weight: 700;
    }
    .gender-input{
        display: inline-block;
        margin-left: 28px;
    }
    .dob-box{
        position: absolute;
        width: 420px;
        height: 40px;
        line-height: 40px;
        margin-top:200px;
        margin-left:80px;
        font-weight: 700;
    }
    .dob-input{
        display: inline-block;
        margin-left: 28px;
    }
    #dob{
        height: 35px;
        width: 290px;
        border: 2px solid #ccc;
        border-radius: 5px;
    }
 
    .weight-box{
        position: absolute;
        width: 420px;
        height: 40px;
        line-height: 40px;
        margin-top:250px;
        margin-left:82px;
        font-weight: 700;
    }
    .weight-input{
        display: inline-block;
        margin-left: 28px;
    }
    #weight{
        height: 35px;
        width: 290px;
        border: 2px solid #ccc;
        border-radius: 5px;
    }
    .email-box{
        position: absolute;
        width: 420px;
        height: 40px;
        line-height: 40px;
        margin-top:300px;
        margin-left:80px;
        font-weight: 700;
    }
    .email-input{
        display: inline-block;
        margin-left: 28px;
    }
    #email{
        height: 35px;
        width: 290px;
        border: 2px solid #ccc;
        border-radius: 5px;
    }
    
    .saveButton-box{
        position:absolute;
        width: 80px;
        height: 40px;
        line-height: 40px;
        margin-top: 430px;
        margin-left:200px;
        margin-bottom: 40px;
        border-radius: 5px;
        background: grey;

    }
    #saveButton-button{
        display: inline-block;
        width: 80px;
        height: 40px;
        border-radius: 5px;
        background: mistyrose;
        font-weight: 700;
    }
    .cancelButton-box{
        position:absolute;
        width: 80px;
        height: 40px;
        line-height: 40px;
        margin-top: 430px;
        margin-left:400px;
        margin-bottom: 40px;
        border-radius: 5px;
        background: grey;       
    }
    #cancelButton-button{
        display: inline-block;
        width: 80px;
        height: 40px;
        border-radius: 5px;
        background: mistyrose;
        font-weight: 700;
    }

    nav ul li {
    display: inline;

    }

    nav ul {
    margin-top: 70px;
   
    list-style-type: none;
    text-align: center;
}
 
    </style>
</head>
<body>

    <div class="container">
        <div class="profile-box">
            <div class="title-box">
                <span>Profile</span>

            </div>
             <nav>
            <ul>
                  <li><a href="mainPage.php">Home</a> <span>&#124;</span></li>
                  <li><a href="About_Hot_Pot.html">About Hot Pot</a> <span>&#124;</span></li>
                  <li><a href="Calories_Calculator.php">Calories Calculator</a> <span>&#124;</span></li>
                  <li><a href="Calorie_History.php">History Calories</a> </li>
            </ul>
            <br/><br/>
        </nav>

       
            <form action="update.php" method="post">
                <div class="firstName-box">
                    <label for="firstName">First Name: </label>

                    <label for="firstName_data"><?php echo $_SESSION['firstname']; ?></label>
                </div>
 
                <div class="mName-box">
                    <label for="mName">Middle Name: </label>
                    <label for="mName_data"><?php echo $_SESSION['middlename']; ?></label>
                </div>
 
                <div class="lastName-box">
                        <label for="lastName">Last Name: </label>
                        <label for="lastName_data"><?php echo $_SESSION['lastname']; ?></label>
                </div>
 
                <div class="gender-box">
                    <label for="gender">Gender: </label>
                    <label for="gender_data"><?php $gender = $_SESSION['gen']; if($gender == 0){echo "Male";}else{echo "Female";}?></label>
                </div>
                <div class="dob-box">
                    <label for="dob">DOB: </label>
                    <label for="dob_data"><?php echo $_SESSION['dob']; ?></label>
                </div>
                
                <div class="weight-box">
                    <label for="weight">Weight: </label>
                    <div class="weight-input">
                        <input type="number" id="weight" name="weight" placeholder=<?php echo $_SESSION['weight']; ?> />
                    </div>
                </div>

                <div class="email-box">
                    <label for="email">Email: </label>
                    <label for="email_data"><?php echo $_SESSION['email']; ?></label>
                </div>

                
                
                <div class="saveButton-box">
                    <input id = "saveButton-button" type="submit" value="Save">
                </div>

                <bn/>
                
                <div class="cancelButton-box">
                    <input id = "cancelButton-button" type="reset" value="Cancel">
                </div>
                
            </form>
        </div>
    </div>
</body>
</html>