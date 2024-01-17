<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Image</title>
    <style>
        body{
            display: block;
            align-items: center;
            justify-content: center;
        }

        section{
            position: fixed;
            bottom: 0;
            left: 0;
            margin: 5px;
        }

        figcaption {
            font-size: 36px;
        }

        p {
            font-size: 36px;
            margin: 0 auto;
            text-align: center;
        }

        .image-container {
            margin: 0 auto;
            width: 50%;
            box-sizing: border-box;
            padding: 10px;
        }

        .image-caption {
            text-align: center;
            margin-top: 5px;
        }
    </style>
</head>
<body>
<?php
    $hostname = "localhost";
    $username = "jheintz";
    $password = "o4zhTI0z";
    $database = "jheintz";
    
    $connect = mysqli_connect($hostname, $username, $password, $database);
    
    $sql = "SELECT * FROM images ORDER BY RAND() LIMIT 1";
    $result = mysqli_query($connect, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $image = mysqli_fetch_assoc($result);
        echo "<div class='image-container'>";
        echo "<img src='" . $image['picture_url'] . "' style='width: 100%;'>";
        echo "<figcaption class='image-caption'>Subject: " . $image['subject'] . "<br>" . "Location: " . $image['location'] . "</figcaption>";
        echo "</div>";
    } else {
        echo "No images found";
    }

    $sql = "SELECT COUNT(*) FROM images";
    $result = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result) > 0){
        $image_count = mysqli_fetch_assoc($result);
        echo "<div>";
        echo "<p>Total number of images in the database: " . $image_count['COUNT(*)'] . "</p>";
        echo "</div>";
    } else {
        echo "No images in database";
    }
    ?>

    <section>
        <?php
        if($connect){
            echo "Connection Established Successfully";
        }else{
            echo "Connection Failed";
        }
        ?>
    </section>
    <?php
    mysqli_close($connect);
    ?>
</body>
</html>