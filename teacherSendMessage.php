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
                    <form method="post">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Student ID</label>
                            <input type="number" name="student_id" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Student Name</label>
                            <input type="text" name="student_name" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Student Roll</label>
                            <input type="number" name="student_roll" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Student Phone</label>
                            <input type="tel" name="student_phone" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Student Email</label>
                            <input type="email" name="student_email" class="form-control" id="exampleInputEmail1"
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
                        </div><br>
                        <label class="form-check-label my-2" for="stream">Select Your Stream</label><br>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="stream" id="bca" value="BCA">
                            <label class="form-check-label" for="bca">BCA</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="stream" id="bba" value="BBA">
                            <label class="form-check-label" for="bba">BBA</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="stream" id="mca" value="MCA">
                            <label class="form-check-label" for="mca">MCA</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="stream" id="mba" value="MBA">
                            <label class="form-check-label" for="mba">MBA</label>
                        </div>
                        <select class="form-select mt-3" name="student_semester" aria-label="Default select example">
                            <option selected>Select Your Semester..</option>
                            <option value="1">First</option>
                            <option value="2">Second</option>
                            <option value="3">Third</option>
                            <option value="4">Fourth</option>
                            <option value="5">Fifth</option>
                            <option value="6">Sixth</option>
                        </select>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="createAccount" value="createAccount"
                                class="btn btn-primary">Create Account</button>
                        </div>
                    </form>
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