<?php 
include 'session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AmberSub</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootswatch@4.5.2/dist/cyborg/bootstrap.min.css">
</head>
<body>
    <?php include 'navigation.php';?>
    <script src="button.js"></script>
    <div class="container mt-5">
        <h2 class="text-center">AmberSub, home of your favourites</h2>
        <div class="row">
            <?php 
            $aniData = json_decode(file_get_contents('ani.json'), true);
            foreach ($aniData as $ani){
                echo '<div class="col-md-4">';
                echo '<div class="ani">';
                echo '<img src="'. $ani['cover'] .'" class="img-fluid" alt="'. $ani['name'].'">';
                echo '<h3>' . $ani['name'] . '</h3>';
                echo '<p>Episodes:' .$ani['episodes'] . '</p>'; 
                // Modify the link to include the anime name as a query parameter
                echo '<a href="indani.php?name=' . urlencode($ani['name']) . '" class="btn btn-primary">View Details</a>';
                echo '</div>';
                echo '</div>';
            }
            ?> 
        </div>
    </div>
</body>
</html>
