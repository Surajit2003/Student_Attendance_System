<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP and HTML</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="css/index.css">
    <!-- <link rel="stylesheet" href="css/utils.css"> -->
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
            <section class="charts">
                <div class="chart">
                    <p class="bar-chart-heading">Your Monthly Attendance Report</p>
                    <img src="https://www.amcharts.com/wp-content/uploads/2013/12/demo_7394_none-7-1024x690.png" alt="bar chart">
                </div>
                <div class="chart">
                    <p class="pie-chart-heading">Your Progress</p>
                    <img src="https://www.vhv.rs/dpng/d/362-3626442_90-progress-bar-circle-hd-png-download.png" alt="pie chart">
                </div>
            </section>
        </div>
    </div>
    <!-- including footer for our html -->
    <?php require("partitions/_footers.php") ?>
    <script src="js/index.js"></script>
</body>

</html>