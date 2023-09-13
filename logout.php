<?php
session_start();
session_unset();
session_destroy();
    echo '<script>
    alert("Logged out successfully");
    window.location.replace("student_home.php");
</script>';

// header("Location: student_home.php");
// header("Location: main.php");
?>