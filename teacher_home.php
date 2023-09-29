<?php
session_start();
include('partitions/_dbconnect.php');

// checking if a teacher has logged in
if (isset($_SESSION['teacher_loggedin']) && $_SESSION['teacher_loggedin'] == true) {
    $teacher_email = $_SESSION["teacher_email"];
    $getTeacherData = "SELECT * FROM `teacher_profile` WHERE `teacher_email`='$teacher_email'";
    $result = mysqli_query($conn, $getTeacherData);

    // checking if teacher has created a profile or not
    $numRows = mysqli_num_rows($result);
    if ($numRows == 1) {
        $teacher = mysqli_fetch_assoc($result);
        $_SESSION["teacher_id"] = $teacher['teacher_id'];
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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page (Teacher)</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="css/teacher_home.css">
</head>

<body>
    <?php require("partitions/_headers.php") ?>
    <div class="container">
        <?php require("partitions/_leftNavOptions.php") ?>
        <div class="container__rightMain">
            <div class="welcome-heading">
                <span class="welcome-text">
                    Welcome <i>'
                        <?php
                        if (isset($_SESSION["teacher_name"])) {
                            echo $_SESSION["teacher_name"];
                        } else {
                            echo "[Teacher Name]";
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
                <span class="warnings">No Unqualified Students</span>
                <span class="unread-messages">No unread messages</span>
            </section>
            <section class="essential_buttons">
                <button type="button" class="essential-button">
                    <span class="material-symbols-outlined">
                        edit_note
                    </span>
                    <span class="essential-btn-text">Edit Record</span>
                </button>
                <button type="button" class="essential-button">
                    <span class="material-symbols-outlined">
                        add_task
                    </span>
                    <span class="essential-btn-text">Set Goal</span>
                </button>
                <button type="button" class="essential-button">
                    <span class="material-symbols-outlined">
                        encrypted
                    </span>
                    <span class="essential-btn-text">Lock Attendance</span>
                </button>
                <button type="button" class="essential-button">
                    <span class="material-symbols-outlined">
                        edit_note
                    </span>
                    <span class="essential-btn-text">Edit Database</span>
                </button>
            </section>
        </div>
    </div>
</body>

</html>