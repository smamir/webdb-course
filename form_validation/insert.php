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


$name = mysqli_real_escape_string($conn, $_REQUEST['username']);

$pass = mysqli_real_escape_string($conn, $_REQUEST['password']);

$email = mysqli_real_escape_string($conn, $_REQUEST['email']);

$gender = mysqli_real_escape_string($conn, $_REQUEST['gender']);

$sql = "INSERT INTO user (username, password, email, gender) VALUES ('$name', '$pass', '$email' , '$gender' )";


if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>    