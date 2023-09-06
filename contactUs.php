<?php
    // INSERT INTO `contact_us` (`sno`, `name`, `phone_number`, `email`, `user_concern`, `query_time`) VALUES (NULL, 'Swagata Mukherjee', '1234567890', 'email@email.com', 'your website is not working properly, please fix it as soon as possible.', current_timestamp());
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
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $message = $_POST["message"];

        $sql = "INSERT INTO `contact_us` (`name`, `phone_number`, `email`, `user_concern`) VALUES ('$name', '$phone', '$email', '$message')";
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
        <h1 class="text-center">Contact Us</h1>
        <form method="post">
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Your Name Here...." id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Phone</label>
                <input type="tel" class="form-control" name="phone" placeholder="Enter Your Phone Number Here...." id="exampleInputPassword1">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email Address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" placeholder="Enter Your Email Address Here...." aria-describedby="emailHelp">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="floatingTextarea" class="form-label">Your Concern</label>
                <textarea class="form-control" name="message" placeholder="Enter Your Concern Here...." id="floatingTextarea"></textarea>
            </div>
            <button type="submit" name="sent" value="sent" class="btn btn-primary">Submit</button>
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