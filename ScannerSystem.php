<?php
session_start();
include('partitions/_dbconnect.php');
// checking if a student has logged in
if (isset($_SESSION['student_loggedin']) && $_SESSION['student_loggedin'] == true) {
    $student_email = $_SESSION["student_email"];
    $getStudentData = "SELECT * FROM `student_profile` WHERE `student_email` ='$student_email'";
    $profileExist = mysqli_query($conn, $getStudentData);

    // checking if student has created a profile or not
    $numRows = mysqli_num_rows($profileExist);
    if ($numRows == 1) {
        $student = mysqli_fetch_assoc($profileExist);

        // setting up session variables
        $_SESSION["student_id"] = $student['student_id'];
        $_SESSION["student_name"] = $student['student_name'];
        $_SESSION["student_roll"] = $student['student_roll'];

        // getting student's attendance count
        $getStudent = "SELECT * FROM `student_attendance` WHERE student_id='" . $_SESSION["student_id"] . "'";
        $result = mysqli_query($conn, $getStudent);
        $studentData = mysqli_fetch_assoc($result);
        $_SESSION["student_attendance"] = $studentData[strtolower(date('F'))];

        // if attendance count is null in the databaes then it should be zero
        if ($_SESSION["student_attendance"] == null) {
            $_SESSION["student_attendance"] = 0;
        }
    } else {
        unset($_SESSION['student_loggedin']);
        header("Location: /Minor_Project/Student_Attendance_System/?student_email=$student_email");
    }
}
// if no one has logged in then don't allow anyone to enter the student home page
else {
    header("Location: /Minor_Project/Student_Attendance_System/");
}
?>
<html>

<head>
    <script type="text/javascript" src="assets/js/adapter.min.js"></script>
    <script type="text/javascript" src="assets/js/vue.min.js"></script>
    <script type="text/javascript" src="assets/js/instascan.min.js"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <style>
        html {
            font-size: unset;
        }

        .container {
            margin-top: 2rem;
        }
    </style>
</head>

<body>
    <?php require("partitions/_headers.php") ?>
    <div class="container">
        <!-- <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">WebSiteName</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Page 1 <span
                                class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Page 1-1</a></li>
                            <li><a href="#">Page 1-2</a></li>
                            <li><a href="#">Page 1-3</a></li>
                        </ul>
                    </li>
                    <li><a href="#">Page 2</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>
            </div>
        </nav> -->

        <div class="row mt-3">
            <div class="col-md-6">
                <video id="preview" width="100%"></video>

            </div>

            <div class="col-md-6">
                <form action="student_home.php" id="attendanceUpdate" method="post" class="form-horizontal">
                    <label>SCAN QR CODE</label>
                    <input type="text" name="secret_key" id="secret_key" readonly placeholder="scan qrcode" class="form-control">
                    <input type="hidden" name="student_id" <?php
                    if (isset($_SESSION["student_id"])) {
                        echo "Value = " . $_SESSION["student_id"];
                    }
                    ?>>
                    <input type="hidden" name="student_attendance" <?php
                    if (isset($_SESSION["student_attendance"])) {
                        echo "Value = " . $_SESSION["student_attendance"] + 1;
                    }
                    ?>>
                    <input type="hidden" name="scan" value="scan">
                </form>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <td>STUDENT ID</td>
                            <td>STUDENT Name</td>
                            <td>STUDENT Roll</td>
                            <td>STUDENT ATTENDANCE COUNT</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <!-- Student ID -->
                                <?php
                                if (isset($_SESSION['student_id'])) {
                                    echo $_SESSION['student_id'];
                                }
                                ?>
                            </td>
                            <td>
                                <!-- Student Name -->
                                <?php
                                if (isset($_SESSION['student_name'])) {
                                    echo $_SESSION['student_name'];
                                }
                                ?>
                            </td>
                            <td>
                                <!-- Student Roll -->
                                <?php
                                if (isset($_SESSION['student_roll'])) {
                                    echo $_SESSION['student_roll'];
                                }
                                ?>
                            </td>
                            <td>
                                <!-- Student Attendance -->
                                <?php
                                if (isset($_SESSION["student_attendance"])) {
                                    echo $_SESSION["student_attendance"];
                                }
                                ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
        Instascan.Camera.getCameras().then(function (cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                alert('No cameras found');
            }

        }).catch(function (e) {
            console.error(e);
        });

        scanner.addListener('scan', function (c) {
            document.getElementById('secret_key').value = c;
            document.getElementById('attendanceUpdate').submit(); // this line can submit a form without any submit button click.
            // document.forms[0].submit();  
        });
    </script>
</body>

</html>