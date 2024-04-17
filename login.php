<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $usersData = json_decode(file_get_contents('users.json'), true);

    foreach ($usersData as $userData) {
        if ($userData['username'] === $username && password_verify($password, $userData['password'])) {
            session_start();
            $_SESSION['username'] = $username;
            header("Location: profile.php");
            exit();
        }
    }

    $loginError = "Invalid username or password.";
                 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/cyborg/bootstrap.min.css">
    <?php include 'navigation.php'; ?>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Login</h2>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" id="username" name="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                        </div>
                    </form>

                    <?php
                    if (isset($loginError)) {
                        echo "<p class='text-danger'>$loginError</p>";
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
