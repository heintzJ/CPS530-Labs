<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Images Table</title>
    <style>
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 0 auto;
            text-align: center;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        section{
            position: fixed;
            bottom: 0;
            left: 0;
            margin: 5px;
        }
    </style>
</head>
<body>
    <?php
    $hostname = "localhost";
    $username = "";
    $password = "";
    $database = "";
    
    $connect = mysqli_connect($hostname, $username, $password, $database);
    
    $sql = "SELECT * FROM images ORDER BY date_taken DESC";
    $result = mysqli_query($connect, $sql);
    ?>

    <table>
        <thead>
            <tr>
                <th>Picture Number</th>
                <th>Subject</th>
                <th>Location</th>
                <th>Date Taken</th>
                <th>Picture URL</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$row['picture_number']}</td>";
                    echo "<td>{$row['subject']}</td>";
                    echo "<td>{$row['location']}</td>";
                    echo "<td>{$row['date_taken']}</td>";
                    echo "<td>{$row['picture_url']}</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No results.</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <section>
        <?php
        if($connect){
            echo "Connection Established Successfully<br><br>";
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
