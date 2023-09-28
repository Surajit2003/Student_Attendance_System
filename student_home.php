<?php
session_start();
include('partitions/_dbconnect.php');

// checking if a student has logged in
if (isset($_SESSION['student_loggedin']) && $_SESSION['student_loggedin'] == true) {
    $student_email = $_SESSION["student_email"];
    $getStudentData = "SELECT * FROM `student_profile` WHERE `student_email` ='$student_email'";
    $result = mysqli_query($conn, $getStudentData);

    // checking if student has created a profile or not
    $numRows = mysqli_num_rows($result);
    if ($numRows == 1) {
        $student = mysqli_fetch_assoc($result);
        $_SESSION["student_name"] = $student['student_name'];
    } else {
        unset($_SESSION['student_loggedin']);
        header("Location: /Minor_Project/Student_Attendance_System/?student_email=$student_email");
    }
}
// checking if a teacher has logged in
else if (isset($_SESSION['teacher_loggedin']) && $_SESSION['teacher_loggedin'] == true) {
    $teacher_email = $_SESSION["teacher_email"];
    $getTeacherData = "SELECT * FROM `teacher_profile` WHERE `teacher_email`='$teacher_email'";
    $result = mysqli_query($conn, $getTeacherData);

    // checking if student has created a profile or not
    $numRows = mysqli_num_rows($result);
    if ($numRows == 1) {
        $teacher = mysqli_fetch_assoc($result);
        $_SESSION["teacher_name"] = $teacher['teacher_name'];
    } else {
        unset($_SESSION['teacher_loggedin']);
        header("Location: /Minor_Project/Student_Attendance_System/?teacher_email=$teacher_email");
    }
}
// if no one has logged in then don't allow anyone to enter the student home page
else {
    header("Location: /Minor_Project/Student_Attendance_System/");
}



//UPDATE `student_attendance` SET `september` = '1' WHERE `student_attendance`.`student_id` = 2115230110;

// SELECT * FROM `student_attendance` WHERE student_id='2115230110';

include("partitions/_dbconnect.php");
$month = strtolower(date("F")); # this line of code gets current month
// $month = "april";   # uncomment this code for test purposes only.

$student_id = 2115230110;
$student_name = 'Swagata Mukherjee';
$student_roll = '15201221066';

$getStudent = "SELECT * FROM `student_attendance` WHERE student_id='$student_id'";
$result = mysqli_query($conn, $getStudent);
$studentData = mysqli_fetch_assoc($result);
$attendance = $studentData["$month"];

// post request handle
if (isset($_POST["scan"]) && $_POST["scan"] == "scan") {

    // checking if correct qr code is scanned or not
    if($_POST["secret_key"] == '$2y$10$b1PT6x2LheA3sS7UJjOUEeU1vHp/r1RRFdo/6PqM1ZJooCxHF4lvK'){
        $student_id = (int) $_POST["student_id"];
        $attendanceUpdate = (int) $_POST["student_attendance"];
        $updateQuery = "UPDATE `student_attendance` SET `$month` = $attendanceUpdate WHERE `student_id` = '$student_id'";
        $result = mysqli_query($conn, $updateQuery);
        header("refresh: 1; url=student_home.php");
    }
    else{
        header("Location: ScannerSystem.php");
    }
}

# TODO: add grading system and remarks calculation
# TODO: write sql query to update the remarks and grade


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <!-- including header for our html -->
    <?php require("partitions/_headers.php") ?>
    <div class="container">
        <!-- including left side navigation bar for our html -->
        <?php require("partitions/_leftNavOptions.php") ?>
        <div class="container__rightMain">
            <div class="welcome-heading">
                <span class="welcome-text">
                    Welcome <i>'
                        <?php
                        if (isset($_SESSION["student_name"])) {
                            echo $_SESSION["student_name"];
                        } elseif (isset($_SESSION["teacher_name"])) {
                            echo $_SESSION["teacher_name"];
                        } else {
                            echo "[Student Name]";
                        }
                        ?>'
                    </i>
                </span>
                <a href="logout.php" class="logout" id="logout">
                    <span class="material-symbols-outlined">
                        power_settings_new
                    </span>
                    <p>Logout</p>
                </a>
            </div>
            <section class="nofifications">
                <span class="warnings">0 Warnings</span>
                <!-- <form method="post" id="attendance"> -->
                    <?php
                    // echo '<input type="hidden" name="student_attendance" value="' . (int) $attendance + 1 . '">'
                        ?>
                <!-- </form> -->
                <!-- <button type="submit" name="scan" value="scan" form="attendance" class="scanner-button"> -->
                <a href="ScannerSystem.php" class="scanner-button">
                    <span class="material-symbols-outlined">qr_code_scanner</span>
                    <span class="scanner-text">Scanner</span>
                </a>
                <span class="unread-messages">No unread messages</span>
            </section>
            <section class="charts" id="progress">
                <div class="chart">
                    <p class="bar-chart-heading">Your Monthly Attendance Report</p>
                    <img src="https://www.pngall.com/wp-content/uploads/10/Bar-Chart-Vector-PNG-Photos.png"
                        alt="bar chart">
                </div>
                <div class="chart">
                    <p class="pie-chart-heading">Your Progress</p>
                    <img src="assets/progress.png" alt="pie chart">
                    <span class="result">80%</span>
                </div>
            </section>
        </div>
    </div>
    <!-- including footer for our html -->
    <?php require("partitions/_footers.php") ?>
    <script src="js/index.js"></script>
    <?php
    if (isset($_POST["scan"]) && $_POST["scan"] == "scan") {
        echo '<script>
        alert("Name : ' . $student_name . '\nRoll : ' . $student_roll . '\nAttendance Count : ' . $_POST["student_attendance"] . '");
    </script>';
    }
    ?>

</body>

</html>