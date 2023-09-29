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
                        if (isset($_SESSION["student_name"])) {
                            echo $_SESSION["student_name"];
                        } elseif (isset($_SESSION["teacher_name"])) {
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
                        edit_note
                    </span>
                    <span class="essential-btn-text">Edit Database</span>
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