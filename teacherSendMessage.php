<?php
// message query
// INSERT INTO `messages` (`sno`, `student_id`, `teacher_id`, `student_roll`, `student_message`, `teacher_message`, `message_time`) VALUES (NULL, '0', NULL, '66', 'hey this is a test message', NULL, '2023-09-05 18:59:25.000000');

// teacher profile query
// INSERT INTO `teacher_profile` (`sno`, `teacher_id`, `teacher_name`, `teacher_phone`, `teacher_email`, `teacher_gender`, `registration_time`) VALUES (NULL, '100', 'Suman Das', '1231', 'emailteacher@teacher.com', 'M', current_timestamp());
$servername = "localhost";
$username = "root";
$password = "";
$database = "manageattendance";
// // Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// // Die if connection was not successful
if (!$conn) {
    echo '  <div class="alert alert-danger" role="alert">
                    Sorry we failed to connect:' . mysqli_connect_error() . '</div>';
}

// utility variables
$sent = false;
$accountCreated = false;

// if message is sent then
if (isset($_POST['sent']) && $_POST['sent'] == "sent") {
    $teacher_id = $_POST["teacher_id"];
    $message = $_POST["message"];

    $sql = "INSERT INTO `messages` (`teacher_id`, `teacher_message`) VALUES ($teacher_id, '$message')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $sent = true;
    }
}

// if account is created then
if (isset($_POST["createAccount"]) && $_POST["createAccount"] == "createAccount") {
    $teacher_id = $_POST['teacher_id'];
    $teacher_name = $_POST['teacher_name'];
    $teacher_phone = $_POST['teacher_phone'];
    $teacher_email = $_POST['teacher_email'];
    $gender = $_POST['gender'];

    $sql = "INSERT INTO `teacher_profile` (`teacher_id`, `teacher_name`, `teacher_phone`, `teacher_email`, `teacher_gender`) VALUES ('$teacher_id', '$teacher_name', '$teacher_phone', '$teacher_email', '$gender')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $accountCreated = true;
    }
}
?>

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
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="contactUs.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="studentSendMessage.php">Student Message</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="teacherSendMessage.php">Teacher Message</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Other Options
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="login.php">Login</a></li>
                            <li><a class="dropdown-item" href="register.php">Sign Up</a></li>
                            <li><a class="dropdown-item" href="readMessage.php">Messages</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="setup.php">Environment Set Up</a></li>
                        </ul>
                    </li>
                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search...." aria-label="Search">
                    <button class="btn btn-success" type="submit">Search</button>
                </form>
                <!-- Create account modal opener button -->
                <button type="button" class="btn btn-primary mx-2" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Create Account
                </button>
            </div>
        </div>
    </nav>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Your Account</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- create account form -->
                    <form method="post" id="teacherAccountCreate">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Teacher ID</label>
                            <input type="number" name="teacher_id" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Teacher Name</label>
                            <input type="text" name="teacher_name" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Teacher Phone</label>
                            <input type="tel" name="teacher_phone" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Teacher Email</label>
                            <input type="email" name="teacher_email" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <label class="form-check-label mb-2" for="gender">Select Your Gender</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="M">
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="F">
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="other" value="O">
                            <label class="form-check-label" for="other">Other</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="createAccount" form="teacherAccountCreate" value="createAccount"
                        class="btn btn-primary">Create Account</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <h2 class="text-center">Send a Message</h2>
        <form method="post">
            <div class="mb-3">
                <label for="userName" class="form-label">Your ID</label>
                <input type="number" name="teacher_id" class="form-control" id="exampleInputEmail1"
                    placeholder="Enter Your ID Here...." aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="floatingTextarea" class="form-label">Message</label>
                <textarea class="form-control" name="message" placeholder="Enter Your Message Here...."
                    id="floatingTextarea"></textarea>
            </div>
            <button type="submit" name="sent" value="sent" class="btn btn-primary">Send</button>
        </form>
        <?php
        if ($sent) {
            echo '<div class="mt-3 alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Message sent successfully!<br>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <?php
    if ($accountCreated) {
        echo '  <script>
                        alert("Your Account Is Created Successfully!")
                    </script>';
    }
    ?>

</body>

</html>