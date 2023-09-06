<?php
// SELECT * FROM `messages`
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

$sql = "SELECT * FROM `messages`";
$result = mysqli_query($conn, $sql);

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
    <h1 class="text-center mt-2">Unread Messages</h1>
    <div class="container text-center mt-3">
        <div class="row">
            <div class="col">
                <h3>Sender</h3>
            </div>
            <div class="col">
                <h3>Message</h3>
            </div>
            <div class="col">
                <h3>Sent At</h3>
            </div>
        </div>

        <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo '  <div class="row mt-2">
                            <div class="col">
                                '.$row["student_roll"].'
                                </div>
                            <div class="col">
                                '.$row["student_message"].'
                            </div>
                            <div class="col">
                                '.date("d/m/Y - h:i:s", strtotime($row["message_time"])).'
                            </div>
                        </div>';
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