<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ontario Images</title>
    <style>
        section{
            position: fixed;
            bottom: 0;
            left: 0;
            margin: 5px;
        }

        .image-container {
            width: 33.33%;
            float: left;
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
    
    $sql = "SELECT * FROM images WHERE location = 'Ontario'";
    $result = mysqli_query($connect, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='image-container'>";
            echo "<img src='" . $row['picture_url'] . "' style='width: 100%;'>";
            echo "<figcaption class='image-caption'>Subject: " . $row['subject'] . "<br>" . "Location: " . $row['location'] . "</figcaption>";
            echo "</div>";
        }
    } else {
        echo "No images were taken in Ontario.";
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