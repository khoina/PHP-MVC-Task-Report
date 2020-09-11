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
        Producer varchar (255),
        Price float,
        Image varchar(255));
        INSERT INTO Games VALUES ('G0001', 'ExampleGame1', 'ExampleBrand1', 'ExampleType1', 100, 'G0001');
        INSERT INTO Games VALUES ('G0002', 'ExampleGame2', 'ExampleBrand2', 'ExampleType2', 299.9, 'G0002');";
if ($conn->multi_query($sql) === TRUE){
    echo "Task completed successful\n";
}
else echo "Error: " . $conn->error . "\n";

$conn->close();
