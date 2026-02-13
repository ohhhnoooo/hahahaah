<?php
include 'db.php';

// Handle Delete Request
if (isset($_GET['delete'])) {
    $id = mysqli_real_escape_string($conn, $_GET['delete']);
    mysqli_query($conn, "DELETE FROM confessions WHERE id = $id");
    header("Location: admin.php");
}

$result = mysqli_query($conn, "SELECT * FROM confessions ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - View Confessions</title>
    <style>
        body { font-family: sans-serif; background-color: #f4f4f9; padding: 20px; color: #333; }
        .container { max-width: 800px; margin: auto; background: white; padding: 20px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        h2 { border-bottom: 2px solid #ff85a2; padding-bottom: 10px; color: #ff5c81; }
        .confession-box { border-bottom: 1px solid #eee; padding: 15px 0; position: relative; }
        .confession-box:last-child { border: none; }
        .message { font-size: 1.1rem; margin-bottom: 5px; white-space: pre-wrap; }
        .date { font-size: 0.8rem; color: #888; }
        .delete-btn { position: absolute; right: 0; top: 15px; color: #ff4d4d; text-decoration: none; font-weight: bold; border: 1px solid #ff4d4d; padding: 5px 10px; border-radius: 5px; }
        .delete-btn:hover { background: #ff4d4d; color: white; }
    </style>
</head>
<body>

<div class="container">
    <h2>📋 Confession Inbox</h2>

    <?php if(mysqli_num_rows($result) > 0): ?>
        <?php while($row = mysqli_fetch_assoc($result)): ?>
            <div class="confession-box">
                <div class="message"><?php echo htmlspecialchars($row['message']); ?></div>
                <div class="date">Received on: <?php echo $row['date_submitted']; ?></div>
                <a href="admin.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('Delete this confession?')">Delete</a>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No confessions yet. 💌</p>
    <?php endif; ?>

</div>

</body>
</html>