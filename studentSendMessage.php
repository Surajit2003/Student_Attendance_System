<?php
// message query
// INSERT INTO `messages` (`sno`, `student_id`, `teacher_id`, `student_roll`, `student_message`, `teacher_message`, `message_time`) VALUES (NULL, '0', NULL, '66', 'hey this is a test message', NULL, '2023-09-05 18:59:25.000000');

// student profile query
// INSERT INTO `student_profile` (`sno`, `student_id`, `student_name`, `student_roll`, `student_phone`, `student_email`, `student_gender`, `student_stream`, `student_semester`, `registration`) VALUES (NULL, '110', 'Swagata Mukherjee', '66', '1234567890', 'email@email.com', 'M', 'BCA', '5', current_timestamp());
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
    $student_id = $_POST["student_id"];
    $roll = $_POST["roll"];
    $message = $_POST["message"];

    $sql = "INSERT INTO `messages` (`student_id`, `student_roll`, `student_message`) VALUES ('$student_id', '$roll', '$message')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $sent = true;
    }
}

// if account is created then
if (isset($_POST["createAccount"]) && $_POST["createAccount"] == "createAccount") {
    $student_id = $_POST['student_id'];
    $student_name = $_POST['student_name'];
    $student_roll = $_POST['student_roll'];
    $student_phone = $_POST['student_phone'];
    $student_email = $_POST['student_email'];
    $gender = $_POST['gender'];
    $stream = $_POST['stream'];
    $student_semester = $_POST['student_semester'];

    $sql = "INSERT INTO `student_profile` (`student_id`, `student_name`, `student_roll`, `student_phone`, `student_email`, `student_gender`, `student_stream`, `student_semester`) VALUES ('$student_id', '$student_name', '$student_roll', '$student_phone', '$student_email', '$gender', '$stream', '$student_semester');";
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
    <title>Send Message</title>
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
                        <a class="nav-link active" href="studentSendMessage.php">Student Message</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="teacherSendMessage.php">Teacher Message</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Other Options
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="loginStudent.php">Login as Student</a></li>
                            <li><a class="dropdown-item" href="loginTeacher.php">Login as Teacher</a></li>
                            <li><a class="dropdown-item" href="registerStudent.php">Sign Up as Student</a></li>
                            <li><a class="dropdown-item" href="registerTeacher.php">Sign Up as Teacher</a></li>
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
                    data-bs-target="#studentProfile">
                    Create Account
                </button>
            </div>
        </div>
    </nav>

    <?php require("partitions/_studentProfile.php") ?>

    <div class="container mt-3">
        <h2 class="text-center">Send a Message</h2>
        <form method="post">
            <div class="mb-3">
                <label for="userName" class="form-label">Your ID</label>
                <input type="number" name="student_id" class="form-control" id="exampleInputEmail1"
                    placeholder="Enter Your ID Here...." aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="userName" class="form-label">Your Roll</label>
                <input type="number" name="roll" class="form-control" id="exampleInputEmail1"
                    placeholder="Enter Your Roll Here...." aria-describedby="emailHelp">
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