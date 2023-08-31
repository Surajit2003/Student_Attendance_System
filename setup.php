<?php
// this file will help to create the database and the tables into the database
$username = "root";
$server = "localhost";
$password = "";
$database = "manageattendance";
$conn = mysqli_connect($server, $username, $password);

if ($conn) {
    $isconnected = true;
} else {
    $isconnected = false;
}

// creating a database
$createDB = "CREATE DATABASE IF NOT EXISTS $database";
$result = mysqli_query($conn, $createDB);
if ($result) {
    $dbcreate = true;
} else {
    $dbcreate = false;
}

// closing the old connection
mysqli_close($conn);

// reconnecting mysql along with the database now

$conn = mysqli_connect($server, $username, $password, $database);
if ($conn) {
    $isdbconnect = true;
} else {
    $isdbconnect = false;
}
// writing sql query to make tables now

// table 1 - Student Registration
$sql = 'CREATE TABLE IF NOT EXISTS `student_registration` (`sno` INT(10) NOT NULL AUTO_INCREMENT , `student_roll` VARCHAR(20) NOT NULL , `student_email` VARCHAR(100) NULL DEFAULT NULL , `student_password` VARCHAR(255) NOT NULL , `registration_time` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`sno`), UNIQUE `student_registration_email_un` (`student_email`), UNIQUE `student_registration_roll_un` (`student_roll`)) ';
$result = mysqli_query($conn, $sql);
if ($result) {
    $tablecreated = true;
} else {
    $tablecreated = false;
}

// table 2 - Teacher Registration
$sql = 'CREATE TABLE IF NOT EXISTS `teacher_registration` (`sno` INT(10) NOT NULL AUTO_INCREMENT , `teacher_id` INT(20) NOT NULL , `teacher_email` VARCHAR(100) NULL DEFAULT NULL , `teacher_password` VARCHAR(255) NOT NULL , `registration_datetime` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`sno`, `teacher_id`), UNIQUE `teacher_register_em_un` (`teacher_email`)) ';
$result = mysqli_query($conn, $sql);
if ($result) {
    $tablecreated = true;
} else {
    $tablecreated = false;
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Set Up File</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>

    <h1 class="text-center my-5">Setting Up working environment<span id="dots"></span></h1>

    <?php
    if ($isconnected) {
        echo '<div class="alert-container my-5" id="connection_alert">
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Mysql Connected Successfully!</strong> Your Database is being created in a moment.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>';
    }
    else {
        echo '<div class="alert-container my-5" id="connection_alert_error">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>OOPS!</strong> Failed to connect to MySQL because - ['. mysqli_connect_error() .'].
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>';
    }

    ?>

    <?php
    if ($dbcreate) {
        echo '<div class="alert-container my-5" id="dbconnected_alert">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Database Created Successfully!</strong> Creating the tables now...
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                </div>';
    }
    else {
        echo '<div class="alert-container my-5" id="dbconnected_alert_error">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Failed to Create Database!</strong> Error - ['. mysqli_error($conn) .']
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            </div>';
    }
    ?>

    <?php
    if ($tablecreated) {
        echo '<div class="alert-container my-5" id="table_alert">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>All Tables Are Created Successfully!</strong> Your Set Up is ready to use.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>';
    }
    else {
        echo '<div class="alert-container my-5" id="table_alert_error">
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Failed to Create Tables!</strong> Error - ['. mysqli_error($conn) .']
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            </div>';
    }
    ?>

    <div class="alert-container my-5">
        <div class="alert alert-warning" role="alert">
            <strong>Don't Refresh this page!</strong> It may show some error. You will be redirected automatically.
        </div>
    </div>

    <?php
        header("refresh:12; URL=student_home.php");
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
    <script>
        const dots = document.getElementById('dots');
        const conn_alert = document.getElementById('connection_alert');
        const dbconnect_alert = document.getElementById('dbconnected_alert');
        const table_alert = document.getElementById('table_alert');
        let count = 0;

        conn_alert.style.display = "none";
        dbconnect_alert.style.display = "none";
        table_alert.style.display = "none";

        setInterval(() => {
            count++;
            if (dots.innerText.length < 6) {
                dots.innerText += '.';
            }
            if (count === 2) {
                conn_alert.style.display = "block";
            }
            if (count === 4) {
                dbconnect_alert.style.display = "block";
            }
            if (count === 6) {
                table_alert.style.display = "block";
            }
        }, 1500);
    </script>

</body>

</html>

<?php
mysqli_close($conn);
?>