<?php
include 'db.php';

if(isset($_POST['message'])) {
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $sql = "INSERT INTO confessions (message) VALUES ('$message')";

    if(mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Sent to Idol successfully! ❤️');
                window.location.href='flower.html';
              </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    header("Location: index.php");
}
?>