<?php
include 'db.php';

if(isset($_POST['message'])) {
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $sql = "INSERT INTO confessions (message) VALUES ('$message')";

    if(mysqli_query($conn, $sql)) {
        // Use server-side redirect to avoid client-side JS navigation issues
        header('Location: flower_page.php');
        exit;
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    header("Location: index.php");
}
?>
