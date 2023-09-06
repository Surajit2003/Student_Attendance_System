<?php
    // INSERT INTO `messages` (`sno`, `student_id`, `teacher_id`, `student_roll`, `student_message`, `teacher_message`, `message_time`) VALUES (NULL, '0', NULL, '66', 'hey this is a test message', NULL, '2023-09-05 18:59:25.000000');
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

    $sent = false;

    if(isset($_POST['sent']) && $_POST['sent'] == "sent"){
        $roll = $_POST["roll"];
        $message = $_POST["message"];

        $sql = "INSERT INTO `messages` (`student_roll`, `student_message`) VALUES ('$roll', '$message')";
        $result = mysqli_query($conn, $sql);
        if($result){
            $sent = true;
        }
    }
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
    <div class="container mt-3">
        <h2 class="text-center">Send a Message</h2>
        <form method="post">
            <div class="mb-3">
                <label for="userName" class="form-label">Your Roll</label>
                <input type="number" name="roll" class="form-control" id="exampleInputEmail1" placeholder="Enter Your Roll Here...."
                    aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="floatingTextarea" class="form-label">Message</label>
                <textarea class="form-control" name="message" placeholder="Enter Your Message Here...." id="floatingTextarea"></textarea>
            </div>
            <button type="submit" name="sent" value="sent" class="btn btn-primary">Send</button>
            <a href="readMessage.php" class="btn btn-secondary">Read Messages</a>
        </form>
        <?php
            if($sent){
                echo '<div class="mt-3 alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> Message sent successfully!<br>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"></script>
</body>

</html>