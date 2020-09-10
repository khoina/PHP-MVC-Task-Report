<?php
$servername = "localhost";
$username = "sammy";
$password = "123456";

$conn = new mysqli($servername, $username, $password);

$sql = "CREATE DATABASE IF NOT EXISTS mvcdemo;
        USE mvcdemo;
        CREATE TABLE IF NOT EXISTS Games (
        GameID int NOT NULL,
        Name varchar(255),
        Developer varchar (255),
        Publisher varchar (255),
        Price float);
        INSERT INTO Games VALUES (1, 'ExampleGame1', 'ExampleDev1', 'ExamplePublisher1', 10);
        INSERT INTO Games VALUES (1, 'ExampleGame2', 'ExampleDev2', 'ExamplePublisher2', 3.99);";
if ($conn->multi_query($sql) === TRUE){
    echo "Task completed successful\n";
}
else echo "Error: " . $conn->error . "\n";

$conn->close();
