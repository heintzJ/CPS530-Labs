<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
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

        #submit {
            background-color: #50C878;
            border: 1px #50C878;
            border-radius: 2px;
        }

        .form-container {
            margin: 0 auto;
            width: 200px;
            padding: 10px;
            border: 1px #d3d3d3;
            border-radius: 5px;
            background-color: #d3d3d3;
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

    <div class="form-container">
        <form action="lab09d.php" method="post">
            <h3>Select Location</h3>
            <label for="location">Ontario</label><br>
            <input type="radio" id="ontario" name="location" value="Ontario">
            <label for="location">Quebec</label><br>
            <input type="radio" id="quebec" name="location" value="Quebec">
            <label for="location">Florida</label>
            <input type="radio" id="florida" name="location" value="Florida">
            <br><br>

            <h3>Select Year</h3>
            <label for="year">2022</label><br>
            <input type="radio" id="2022" name="year" value="2022">
            <label for="year">2023</label>
            <input type="radio" id="2023" name="year" value="2023">
            <br><br>
            <input type="submit" id="submit" value="Submit">
        </form>
    </div>

    <?php
    $selectedLocation = $_POST["location"];
    $selectedYear = $_POST["year"];
    $sql = "SELECT * FROM images WHERE location = '$selectedLocation' AND YEAR(date_taken) = '$selectedYear'";
    $result = mysqli_query($connect, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='image-container'>";
            echo "<img src='" . $row['picture_url'] . "' style='width: 100%;'>";
            echo "<figcaption class='image-caption'>Subject: " . $row['subject'] . "<br>" . "Location: " . $row['location'] . "</figcaption>";
            echo "</div>";
        }
    } else {
        echo "<h1>No Image(s) Found!</h1>";
    }
    my_sqli_free_result($result);
    mysqli_close($connect);
    ?>
</body>
</html>