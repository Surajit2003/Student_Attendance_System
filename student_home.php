<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP and HTML</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="css/index.css">
    <!-- <link rel="stylesheet" href="css/utils.css"> -->
</head>
<body>
    <!-- including header for our html -->
    <?php require("partitions/headers.php") ?>
    <div class="container contents">
        <?php require("partitions/leftNavOptions.php") ?>
        <div class="container__rightMain"></div>
    </div>
    <!-- including footer for our html -->
    <?php require("partitions/footers.php") ?>
    <script src="js/script.js"></script>
</body>
</html>