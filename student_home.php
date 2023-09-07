<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP and HTML</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <!-- including header for our html -->
    <?php require("partitions/_headers.php") ?>
    <div class="container contents">
        <!-- including left side navigation bar for our html -->
        <?php require("partitions/_leftNavOptions.php") ?>
        <div class="container__rightMain">
            <div class="welcome-heading">
                <span class="welcome-text">
                    Welcome <i>'Swagata'</i>
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
                <span class="scanner-button">
                    <span class="material-symbols-outlined">
                        qr_code_scanner
                    </span>
                    <span class="scanner-text">Scanner</span>
                </span>
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
</body>

</html>