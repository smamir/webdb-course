<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registerDB";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS registerDB";
if (mysqli_query($conn, $sql)) {
//    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

  
$table = "CREATE TABLE IF NOT EXISTS user (
           userID int primary key auto_increment,
           username varchar(30) NOT NULL,
           password varchar(25) NOT NULL,
           email varchar(60) NOT NULL unique,
           gender varchar(10)
          )";



if (mysqli_query($conn, $table)) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>