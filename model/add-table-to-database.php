<?php
$servername = "localhost";
$username = "sammy";
$password = "123456";

$conn = new mysqli($servername, $username, $password);

$sql = "USE mvcdemo;
        INSERT INTO Games 
        VALUES ('G0004', 'Don\'t Starve Together', 'Klei Entertainment', 'Klei Entertainment', 14.99, 'G0004.jpg');";
if ($conn->multi_query($sql) === TRUE){
    echo "Task completed successful\n";
}
else echo "Error: " . $conn->error . "\n";

$conn->close();
