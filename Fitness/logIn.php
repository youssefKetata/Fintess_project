<!DOCTYPE html>
<html lang="en">

<head>
    <title>Log In</title>
    <link rel="stylesheet" href="logIn.css">
    <link rel="shortcut icon" href="images\logo.png">
    <script type="text/javascript" src="signUp.js"></script>


</head>

<body>
    <a href="index.php" class="logo" style="display: inline;"><img src="images/logo.png" width="75px" height="60px" style="margin: 10px -30px;"></a>
    <div class="register-form">
        <form action="fishier.php" method="post" onsubmit="return verifyAll2(this)">
            <div class="signup-field">
                <h1 class="signup">Log in</h1>
            </div>

            <div class="content">
                <div class="input-field">
                    <input class="input" id="email" name="mail" type="email" placeholder="Email" onblur="verifyMail(this)">
                </div>
                <div class="input-field">
                    <input class="input" id="password" name="pass" type="password" placeholder="Password" onblur="verifyPass
                    (this)">
                </div>

                <input class="input" id="submit" name="signUp" type="submit" value="Log In"><br><br>
        </form>
        <?php
            if(!empty($_GET['message'])) {
                echo "<p style='color:red; font-size:18px'>". "Please verify your email or password!". "</p>";
            }  
        ?>
        <a href="signUp2.php" class="link">Don't have an account?</a>

    </div>
    </div>
</body>


</html>