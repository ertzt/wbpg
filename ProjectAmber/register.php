<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $username = $_POST['username'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password']; 
    $favalb = $_POST['favalb']; 

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $userData = [
        'username' => $username,
        'firstName' => $firstName,
        'lastName' => $lastName,
        'email' => $email,
        'favalb' => $favalb,
        'password' => $hashedPassword 
         ];

    $usersData = json_decode(file_get_contents('users.json'), true);
    $usersData[] = $userData;
    file_put_contents('users.json', json_encode($usersData));

    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/cyborg/bootstrap.min.css">
    <?php include 'navigation.php'; ?>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center">Register</h2>
                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" id="username" name="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="firstName">First Name:</label>
                            <input type="text" id="firstName" name="firstName" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name:</label>
                            <input type="text" id="lastName" name="lastName" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="favalb">Favourite Anime:</label>
                            <input type="text" id="favalb" name="favalb" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

