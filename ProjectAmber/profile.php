<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/cyborg/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'navigation.php'; ?>
    <div class="container mt-5">
        <h2 class="text-center">Profile</h2>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <p>Welcome, <?php echo $_SESSION['username']; ?>!</p>
                      <form method="post">
                    <button type="submit" class="btn btn-danger" name="logout">Logout</button>
            </div>
        </div>
    </div>
</body>
</html>
<?php
session_start();
include 'session.php';
if (!isLoggedIn()) {
    header("Location: login.php");
    exit;
}
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit;}
?>
