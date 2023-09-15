<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-dark navbar-expand-lg bg-dark mb-1">
        <div class="container-fluid">
            <a class="navbar-brand" href="https://getbootstrap.com/docs/5.3/getting-started/introduction/">
                <img src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg" alt="Logo" width="30"
                    height="24" class="d-inline-block align-text-top">
                Bootstrap
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="student_home.php">Home</a>
                    </li>
                    <li class="nav-item" style="cursor: not-allowed;">
                        <a class="nav-link disabled" aria-disabled="true" href="#">About</a>
                    </li>
                    <li class="nav-item" style="cursor: not-allowed;">
                        <a class="nav-link disabled" aria-disabled="true" href="#">Docs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="contactUs.php">Contact Us</a>
                    </li>
                </ul>
                <!-- Create account modal opener button -->
                <button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal"
                    data-bs-target="#studentLogin">
                    Login as Student
                </button>
                <button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal"
                    data-bs-target="#teacherLogin">
                    Login as Teacher
                </button>
                <a href="registerStudent.php" class="btn btn-primary mx-2">Sign Up as Student</a>
                <a href="registerTeacher.php" class="btn btn-primary mx-2">Sign Up as Teacher</a>
            </div>
        </div>
    </nav>

    <?php
    require("partitions/_loginStudent.php");
    require("partitions/_loginTeacher.php");
    require("partitions/_studentProfile.php");
    require("partitions/_teacherProfile.php");
    ?>

    <div class="container mt-4">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading text-center">Hello User!</h4>
            <p>Thanks for using our website. We appriciate your presence. If you encounter any technical issue please
                submit
                a query using <a href="contactUs.php">contact us</a> link.
            </p>
            <hr>
            <p class="mb-0">To ensure best user experience and secure environment we restricted unauthorized users from
                getting access of home page. You will be automatically redirected to home page once you successfully log
                in.</p>
        </div>
    </div>
    <?php
        if(isset($_GET["student_email"]) || isset($_GET["teacher_email"])){
            echo '<div class="container mt-4">
            <h3 class="text-center">Register if you haven\'t yet...</h3>
            <div class="container-fluid colunn text-center mt-4">
                <!-- Create account modal opener button -->
                <button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#studentProfile">
                    Create Student Profile
                </button>
                <!-- Create account modal opener button -->
                <button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal" data-bs-target="#teacherProfile">
                    Create Teacher Profile
                </button>
            </div>
        </div>';
        }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>