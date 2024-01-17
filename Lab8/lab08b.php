<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiplication Table</title>
    <style>
        body {
            text-align: center;
        }
        table {
            border-collapse: collapse;
            width: 25%;
            margin: 20px auto;
            font-family: 'Courier New', monospace;
        }

        tr {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }

        td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
            width: 10%;
        }
    </style>
</head>
<body>
    <?php
    $rows = $_POST["rows"];
    $columns = $_POST["columns"];

    if ($rows < 3 || $rows > 12 || $columns < 3 || $columns > 12) {
        die("Invalid number of rows or columns. Ensure the values are between 3 and 12 inclusive");
    }

    echo "<table>";
    for ($r = 1; $r <= $rows; $r++){
        echo "<tr" . ($r == 1 ? " style='background:#0096FF;'" : " style='background:#F0FFFF;'") . ">";
        for ($c = 1; $c <= $columns; $c++){
            echo "<td" . ($c == 1 || $r == 1 ? " style='background:#0096FF;'" : " style='background:#F0FFFF;'") . ">" . $c * $r . "</td>";
        }
        echo "</tr>";
    }
    echo"</table>";
    ?>
</body>
</html>