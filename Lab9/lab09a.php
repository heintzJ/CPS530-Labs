<?php
$hostname = "localhost";
$username = "jheintz";
$password = "o4zhTI0z";
$database = "jheintz";

$connect = mysqli_connect($hostname, $username, $password, $database);

if($connect){
    echo "Connection Established Successfully";
}else{
    echo "Connection Failed";
}
// $sql = "DROP TABLE images";
$sql = "CREATE TABLE IF NOT EXISTS images (
    picture_number INT AUTO_INCREMENT PRIMARY KEY,
    subject VARCHAR(20) DEFAULT NULL,
    location VARCHAR(20) DEFAULT NULL,
    date_taken DATE,
    picture_url VARCHAR(100) DEFAULT NULL
    );";

// actually create the table by running the query
$created = mysqli_query($connect, $sql);
if($created){
    echo "<br>Table Created!";
} else{
    echo "<br>Table not create or table already exists";
}

// insert images into table
$sql = "INSERT INTO images (picture_number, subject, location, date_taken, picture_url)
    VALUES 
    ('1', 'City', 'Ontario', '2023-11-21', 'https://cs.torontomu.ca/~jheintz/Images/toronto.jpg'),
    ('2', 'Calf', 'Ontario', '2023-11-12', 'https://cs.torontomu.ca/~jheintz/Images/calf.jpg'),
    ('3', 'Lake', 'Ontario', '2023-08-18', 'https://cs.torontomu.ca/~jheintz/Images/lake.jpg'),
    ('4', 'Pool', 'Ontario', '2023-08-22', 'https://cs.torontomu.ca/~jheintz/Images/pool.jpg'),
    ('5', 'Farm', 'Ontario', '2023-08-01', 'https://cs.torontomu.ca/~jheintz/Images/farm.jpg'),
    ('6', 'Hike', 'Ontario', '2023-06-30', 'https://cs.torontomu.ca/~jheintz/Images/hike.jpg'),
    ('7', 'Mt. Tremblant', 'Quebec', '2023-02-20', 'https://cs.torontomu.ca/~jheintz/Images/tremblant.jpg'),
    ('8', 'Tortoise', 'Florida', '2023-01-07', 'https://cs.torontomu.ca/~jheintz/Images/tortoise.jpg'),
    ('9', 'Swamp', 'Florida', '2023-01-07', 'https://cs.torontomu.ca/~jheintz/Images/swamp.jpg'),
    ('10', 'Sunrise', 'Ontario', '2022-09-24', 'https://cs.torontomu.ca/~jheintz/Images/sunrise.jpg');";

if (mysqli_query($connect, $sql)) {
    echo "<br>New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connect);
}
?>