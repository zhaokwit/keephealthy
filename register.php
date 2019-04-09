<?php
require_once('config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register-KHWHP</title>
    <style type="text/css">
    body,input{
        margin: 0;
        padding: 0;
        background: pink;
    }
    input{
        display: inline-block;
        background: #fff;
    }
    .container{
        width: 100%;
    }
    .register-box{
        position: relative;
        height: 800px;
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
        color: #ff5000;
        line-height: 50px;
    }
    .firstName-box{
        position: absolute;
        width: 420px;
        height: 40px;
        line-height: 40px;
        margin-top:100px;
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
        margin-top:180px;
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
        margin-top:260px;
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
        margin-top:340px;
        margin-left:80px;
        font-weight: 700;
    }
    .gender-input{
        display: inline-block;
        margin-left: 28px;
    }
    #userPhone{
        height: 35px;
        width: 290px;
        border: 2px solid #ccc;
        border-radius: 5px;
    }
    .dob-box{
        position: absolute;
        width: 420px;
        height: 40px;
        line-height: 40px;
        margin-top:420px;
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
        margin-top:500px;
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
        margin-top:580px;
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
    .password-box{
        position: absolute;
        width: 420px;
        height: 40px;
        line-height: 40px;
        margin-top:660px;
        margin-left:80px;
        font-weight: 700;
    }
    .password-input{
        display: inline-block;
        margin-left: 28px;
    }
    #password{
        height: 35px;
        width: 290px;
        border: 2px solid #ccc;
        border-radius: 5px;
    }
    .confirmPassword-box{
        position: absolute;
        width: 600px;
        height: 40px;
        line-height: 40px;
        margin-top:740px;
        margin-left:80px;
        font-weight: 700;
    }
    .confirmPassword-input{
        display: inline-block;
        margin-left: 28px;
    }
    #confirmPassword{
        height: 35px;
        width: 290px;
        border: 2px solid #ccc;
        border-radius: 5px;
    }

    .require{
        color: red;
    }
    .registerButton-box{
        position:absolute;
        width: 80px;
        height: 40px;
        line-height: 40px;
        margin-top: 820px;
        margin-left:200px;
        border-radius: 5px;
        background: grey;

    }
    #registerButton-button{
        display: inline-block;
        width: 80px;
        height: 40px;
        border-radius: 5px;
        background: mistyrose;
        font-weight: 700;
    }
    .goLogin-box{
        position:absolute;
        width: 150px;
        height: 20px;
        margin-top: 820px;
        margin-left:320px;
    }

    </style>
</head>
<body>
    <div>
        <?php

        if(isset($_POST['register_btn'])){
            $firstname = $_POST['firstName'];
            $middlename = $_POST['mName'];
            $lastname = $_POST['lastName'];
            $gen = $_POST['gender'];
            $dob = $_POST['dob'];
            $weight = $_POST['weight'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password2 = $_POST['confirmPassword'];


            $message1="Registration is Done!";
            $message2="The two password do not match!";

            if($password == $password2){
            $sql = "INSERT INTO users (firstname, middlename, lastname, gender, dob, weight, email, password) VALUES(?,?,?,?,?,?,?,?)";
            $stmtinsert = $db->prepare($sql);

            $result = $stmtinsert->execute([$firstname, $middlename, $lastname, $gen, $dob, $weight, $email, $password]);

            if($result){
                echo "<script type = 'text/javascript'>alert('$message1');</script>";
            }
        }
            else{
                echo "<script type = 'text/javascript'>
                response.write(window.history.goback(-1));
                 </script>";


                echo "<script type = 'text/javascript'>alert('$message2');</script>";
            }
 }
?>
</div>
    <div class="container">
        <div class="register-box">
            <div class="title-box">
                <span>Reigster</span>
            </div>

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
                    <a href="#" style="text-decoration: none;">Already Have an account? Go Login</a>
                </div>
            </form>

        </div>
    </div>
</body>
</html>
