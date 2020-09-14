<?php
$servername = "localhost";
$username = "sammy";
$password = "123456";

$conn = new mysqli($servername, $username, $password);

$sql = "CREATE DATABASE IF NOT EXISTS mvcdemo;
        USE mvcdemo;
        CREATE TABLE IF NOT EXISTS Games (
        GameID varchar(255),
        Name varchar(255),
        Developer varchar (255),
        Publisher varchar (255),
        Price float,
        Image varchar(255));
        INSERT INTO Games VALUES ('G0001', 'Enter the Gungeon', 'Dodge Roll', 'Devolver Digital', 14.99, 'G0001.jpg');
        INSERT INTO Games VALUES ('G0002', 'Exit The Gungeon', 'Dodge Roll', 'Devolver Digital', 10, 'G0002.jpg');";
if ($conn->multi_query($sql) === TRUE){
    echo "Task completed successful\n";
}
else echo "Error: " . $conn->error . "\n";

$conn->close();
