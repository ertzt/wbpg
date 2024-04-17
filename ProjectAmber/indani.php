<?php 
include 'session.php'?>
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
    
<?php
        // Retrieve the anime name from the URL query parameter
        $animeName = isset($_GET['name']) ? $_GET['name'] : null;

        // Display the retrieved anime name for debugging
        echo "<p>Anime Name: $animeName</p>";
    ?>
    <?php
        // Retrieve the anime name from the URL query parameter
        $animeName = isset($_GET['name']) ? $_GET['name'] : null;

        // Check if the anime name is provided
        if ($animeName) {
            // Read the contents of the JSON file
            $json_data = file_get_contents('ani.json');

            // Decode the JSON data into a PHP array
            $animeList = json_decode($json_data, true);

            // Find the anime data based on the provided anime name
            $anime = array_filter($animeList, function($item) use ($animeName) {
                return $item['name'] === $animeName;
            });

            // Check if the anime data is found
            if (!empty($anime)) {
                // Display anime details
                foreach ($anime as $entry) {
                    echo "<h1>{$entry['name']} Episodes</h1>";
                    echo "<p>Episodes: {$entry['episodes']}</p>";
                    echo "<img src='{$entry['cover']}' alt='{$entry['name']} Cover' class='cover-img'>";
                }
            } else {
                // Anime not found
                echo "<p>Anime not found.</p>";
            }
        } else {
            // Anime name not provided
            echo "<p>Anime name not provided.</p>";
        }
    ?>

    <!-- Video Player Container -->
    <div id="videoPlayer" class="video-player-container"></div>

    <script src="script.js"></script>
</body>
</html>
