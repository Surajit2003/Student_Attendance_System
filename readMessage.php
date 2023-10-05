<?php
// SELECT * FROM `messages`
$servername = "localhost";
$username = "root";
$password = "";
$database = "manageattendance";
// // Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// utility variables
$accountCreated = false;

// // Die if connection was not successful
if (!$conn) {
    echo '  <div class="alert alert-danger" role="alert">
                        Sorry we failed to connect:' . mysqli_connect_error() . '</div>';
}

$sql = "SELECT * FROM `messages`";
$result = mysqli_query($conn, $sql);


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Read Messages</title>
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
                        <a class="nav-link" href="teacherSendMessage.php">Teacher Message</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown"
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

    <?php require("partitions/_studentProfile.php"); ?>
    
    <div class="container text-center mt-3">
        <h1 class="text-center my-3">Unread Messages</h1>
        <div class="row">
            <div class="col">
                <h3><u>Send By</u></h3>
            </div>
            <div class="col">
                <h3><u>Sender ID</u></h3>
            </div>
            <div class="col">
                <h3><u>Message</u></h3>
            </div>
            <div class="col">
                <h3><u>Sent At</u></h3>
            </div>
        </div>

        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            if ($row["student_id"]) {
                echo '  <div class="row mt-2">
                            <div class="col">
                                ' . 'Student' . '
                            </div>
                            <div class="col">
                                ' . $row['student_id'] . '
                            </div>
                            <div class="col">
                                ' . $row["student_message"] . '
                            </div>
                            <div class="col">
                                ' . date("d/m/Y - h:i:s", strtotime($row["message_time"])) . '
                            </div>
                        </div>';
            } else {
                echo '  <div class="row mt-2">
                            <div class="col">
                                ' . 'Teacher' . '
                            </div>
                            <div class="col">
                                ' . $row['teacher_id'] . '
                            </div>
                            <div class="col">
                                ' . $row["teacher_message"] . '
                            </div>
                            <div class="col">
                                ' . date("d/m/Y - h:i:s", strtotime($row["message_time"])) . '
                            </div>
                        </div>';
            }
        }
        ?>




        <!-- <div class="row mt-2">
            <div class="col">
                Sender
            </div>
            <div class="col">
                Message
            </div>
        </div> -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>