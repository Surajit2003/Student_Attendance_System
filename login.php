<?php
// default bool variables
$submitted = false;

include('partitions/_dbconnect.php');
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $roll = $_POST['roll'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "INSERT INTO `student_registration` (`student_roll`, `student_email`, `student_password`) VALUES ('$roll', '$email', '$password' )";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $submitted = true;
        header('location: login.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login to MyLogin</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/login_register.css" type="text/css">
</head>

<body>
    <div class="wrapper">
        <span class="bg-animate"></span>
        <span class="bg-animate2"></span>
        <!-- this is login part -->
        <div class="form-box login">
            <h2 class="animation" style="--i:0; --j:21;">Login</h2>
            <form action="login.php" method="post" autocomplete="off">
                <div class="input-box animation" style="--i:1;  --j:22;">
                    <input type="email" name="email" required>
                    <label for="email">Email</label>
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="input-box animation" style="--i:2; --j:23;">
                    <input type="password" name="password" required>
                    <label for="password">Password</label>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <button type="submit" class="btn animation" style="--i:3; --j:24;">Login</button>
                <div class="logreg-link animation" style="--i:4; --j:25;">
                    <p>Don't have an account? <a href="#" class="register-link" title="Click Here to Sign Up">Sign
                            Up</a></p>
                </div>
            </form>
        </div>
        <div class="info-text login">
            <h2 class="animation" style="--i:0; --j:20;">Welcome Back!</h2>
            <p class="animation" style="--i:1; --j:21;">Lorem ipsum, dolor sit amet consectetur adipisicing.</p>
        </div>

        <!-- this is register part -->
        <div class="form-box register">
            <h2 class="animation" style="--i:17; --j:0;">Sign Up</h2>
            <form action="register.php" method="post" autocomplete="off" onsubmit="showAnimation()">
                <div class="input-box animation" style="--i:18; --j:1;">
                    <input type="text" name="roll" id="roll" required>
                    <label for="roll">University Roll</label>
                    <i class='bx bxs-registered'></i>
                </div>
                <div class="input-box animation" style="--i:19; --j:2;">
                    <input type="email" name="email" required>
                    <label for="email">Email</label>
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="input-box animation" style="--i:20; --j:3;">
                    <input type="password" name="password" required>
                    <label for="password">Password</label>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <button type="submit" class="btn animation" style="--i:21; --j:4;">Sign Up</button>
                <div class="logreg-link animation" style="--i:22; --j:5;">
                    <p>Already have an account? <a href="#" class="login-link" title="Click Here to Login">Login</a></p>
                </div>
            </form>
        </div>
        <div class="info-text register">
            <h2 class="animation" style="--i:17; --j:0;">Welcome!</h2>
            <p class="animation" style="--i:18; --j:1;">Lorem ipsum, dolor sit amet consectetur adipisicing.</p>
        </div>
    </div>

    <!-- <script src="js/script.js"></script> -->
    <script>
        const wrapper = document.querySelector('.wrapper');
        const registerLink = document.querySelector('.register-link');
        const loginLink = document.querySelector('.login-link');

        function showAnimation(){
            alert("Registration Successful! Click Ok to Login...");
        }

        registerLink.addEventListener('click', () => {
            wrapper.classList.add('active');
        });

        loginLink.addEventListener('click', () => {
            wrapper.classList.remove('active');
        });
    </script>
</body>

</html>