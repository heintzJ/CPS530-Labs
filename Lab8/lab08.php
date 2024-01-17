<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 8</title>
    <?php
    session_start();
    if(isset($_COOKIE["views"])){
        $count = $_COOKIE["views"] + 1;
        setcookie("views", $count);
    }
    else{
        $count = 1;
        setcookie("views", $count);
    }

    $time = date('H');
    $image = '';
    if ($time > 20 || $time < 5) {
        $greeting = "Good Night";
        $image = 'night.jpg';
    } elseif ($time > 17) {
        $greeting = "Good Evening";
        $image = 'evening.jpg';
    } elseif ($time > 12) {
        $greeting = "Good Afternoon";
        $image = 'afternoon.jpg';
    } elseif ($time > 5) {
        $greeting = "Good Morning";
        $image = 'morning.jpg';
    }

    $bat = "bat1.gif";
    $haunted_house = "haunted1.gif";
    $walkers = "walkers.gif";

    if(isset($_GET["image"])){
        $image_query = $_GET["image"];

        switch ($image_query) {
            case "bat1.gif":
                $current_gif = $bat;
                break;
    
            case "haunted1.gif":
                $current_gif = $haunted_house;
                break;
    
            case "walkers.gif":
                $current_gif = $walkers;
                break;
            default:
                break;
        }
    }
    ?>
    <style>
        body{
            margin: 0; padding: 0;
            text-align: center;
        }
        .background_image {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: url("<?php echo $image; ?>") no-repeat;
            background-size: cover;
            color: white;
            font-size: 2em;
        }

        .table_form {
            justify-content: center;
        }

        .view_count {
            position: fixed;
            margin: 5px;
            bottom: 0;
            left: 0;
            background-color: white;
            opacity: 0.5;
            border-radius: 5px;
            font-size: 24px;
        }

        .halloween {
            right: 0;
            top: 0;
            position: absolute;
            opacity: 0.7;
            max-width: 100%;
        }

        form {
            text-align: center;
        }

        #submit {
            background-color: #AAFF00;
            border-radius: 2px;
            border: solid black 1px;
            margin: 3px;
        }
    </style>
</head>
<body>
    <p class="view_count">Views: <?php echo $count ?></p>
    <img class="halloween" src=<?php echo $current_gif ?>>
    <div class="background_image">
        <h1><?php echo $greeting; ?></h1>
    </div>
    <div class="table_form">
        <p>Please enter two integers from 3 to 12 inclusive.</p>
        <form action="lab08b.php" method="post" target="_blank">
            <label for="rows">Rows:</label><br>
            <input type="text" name="rows" required pattern="[0-9]+" title="An integer from 3 to 12 inclusive"><br>
            <label for="columns">Columns:</label><br>
            <input type="text" name="columns" required pattern="[0-9]+" title="An integer from 3 to 12 inclusive"><br>
            <input type="submit" id="submit" value="Make Table">
        </form>
    </div>
    <div>
        <h2>Current gif is: <?php echo $current_gif ?></h2>
        <p>Select a different gif to display:</p>
        <li><a href="https://cs.torontomu.ca/~jheintz/Lab8/lab08.php?image=bat1.gif">bat1.gif</a></li>
        <li><a href="https://cs.torontomu.ca/~jheintz/Lab8/lab08.php?image=haunted1.gif">haunted1.gif</a></li>
        <li><a href="https://cs.torontomu.ca/~jheintz/Lab8/lab08.php?image=walkers.gif">walkers.gif</a></li>
    </div>
</body>
</html>